<?php
/*
Plugin Name: C-Smart Tilmelding
Plugin URI: https://csmart.imanov.io
Description: Tilmeldingssystem til C-Smart
Version: 1.0
Author: Ismail og Kevin
Author URI: https://imanov.io
*/

add_action( 'admin_menu', 'csmart_tilmelding_menu' );

function csmart_tilmelding_menu(){

    $page_title = 'Tilmeldinger';
    $menu_title = 'C-Smart';
    $capability = 'manage_options';
    $menu_slug  = 'csmart-tilmelding';
    $function   = 'csmart_tilmelding_side';
    $icon_url   = 'dashicons-media-code';
    $position   = 2;

    add_menu_page( $page_title,
        $menu_title,
        $capability,
        $menu_slug,
        $function,
        $icon_url,
        $position );
    
    add_submenu_page( $menu_slug, "Betalinger", "Betalinger", $capability, "csmart-betalinger", $function);
}

function csmart_tilmelding_side() {
    include("config.php");
    if ( !current_user_can( 'manage_options' ) )  {
        wp_die( __( 'Du har ikke adgang til denne side.' ) );
    }
    
    $hentData = mysqli_query($link, "SELECT * FROM tilmeldinger ORDER BY id DESC");
?>
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet">
<div class="wrap">
    <h1>Tilmeldinger</h1>
    <table id="tilmeldinger" class="dataTable">
        <thead>
            <th>ID</th>
            <th>Fornavn</th>
            <th>Efternavn</th>
            <th>E-mail</th>
            <th>Virksomhed</th>
            <th>CVR. Nr.</th>
            <th>Telefon nr.</th>
            <th>Oprettelse</th>
        </thead>
        <tbody>
            <?php
                while($row = mysqli_fetch_array($hentData)){
                    ?>
            <tr>
                <td><?=$row["id"]?></td>
                <td><?=$row["fornavn"]?></td>
                <td><?=$row["efternavn"]?></td>
                <td><?=$row["email"]?></td>
                <td><?=$row["virksomhed"]?></td>
                <td><?=$row["cvr"]?></td>
                <td><?=$row["telefon"]?></td>
                <td><?=date("d.m.Y H:i", strtotime($row["oprettelse"]))?></td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</div>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#tilmeldinger').DataTable( {
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Danish.json"
            }
        } );
    } );
</script>
<?php
}