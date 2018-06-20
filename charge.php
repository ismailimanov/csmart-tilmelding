<?php
require_once('config.php');

$fornavn        = $_POST["fornavn"];
$efternavn      = $_POST["efternavn"];
$emailadresse   = $_POST["email"];
$virksomhed     = $_POST["virksomhed"];
$cvr            = $_POST["cvr"];
$telefon        = $_POST["telefon"];
$hjemmeside     = $_POST["hjemmeside"];

$hentData = mysqli_query($link, "SELECT * FROM tilmeldinger WHERE email='{$emailadresse}'");

if(mysqli_num_rows($hentData) > 0){
    die("E-mail adressen findes allerede. Prøv venligst igen.");
} else {
    mysqli_query($link, "INSERT INTO tilmeldinger (fornavn, efternavn, email, virksomhed, cvr, telefon, hjemmeside) VALUES ('{$fornavn}', '{$efternavn}', '{$emailadresse}', '{$virksomhed}', '{$cvr}', '{$telefon}', '{$hjemmeside}')");
    
    if(mysqli_affected_rows($link) > 0){
        $token  = $_POST['stripeToken'];
        $email  = $_POST['stripeEmail'];

        $customer = \Stripe\Customer::create(array(
            'email' => $email,
            'source'  => $token
        ));

        $charge = \Stripe\Charge::create(array(
            'customer' => $customer->id,
            'amount'   => 700000,
            'currency' => 'dkk'
        ));
        
        header("Location: tilmeld.php?tilmeldt");
    }
}
?>