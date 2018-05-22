<?php
function csmart_tilmelding_side() {
    if ( !current_user_can( 'manage_options' ) )  {
        wp_die( __( 'Du har ikke adgang til denne side.' ) );
    }
?>
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet">
<h1>Tilmeldinger</h1>
<table id="tilmeldinger">
    <thead>
        <th>ID</th>
        <th>Fornavn</th>
        <th>Efternavn</th>
        <th>E-mail</th>
        <th>Virksomhed</th>
        <th>CVR. Nr.</th>
        <th>Telefon nr.</th>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>Ismail</td>
            <td>Imanov</td>
            <td>ismail@imanov.dk</td>
            <td>AZ App</td>
            <td>12345678</td>
            <td>50501441</td>
        </tr>
    </tbody>
</table>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready( function () {
        $('#tilmeldinger').DataTable();
    } );
</script>
<?php
}