<?php
require_once('vendor/autoload.php');

$stripe = array(
    "secret_key"      => "sk_test_JnHmQq7ihocwvCz60XfU8QWp",
    "publishable_key" => "pk_test_pasfP0kB5emHjd48EFsJeVl3"
);

\Stripe\Stripe::setApiKey($stripe['secret_key']);

$link = mysqli_connect("localhost","csmart","Lx?E?IJ6B4,IzRz},Gs8uoY+%y}NCT%p","csmart");

// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>