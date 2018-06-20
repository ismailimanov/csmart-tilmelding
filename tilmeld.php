<?php require_once('config.php'); ?>
<!doctype html>
<html>
    <head>
        <title>C-Smart Tilmelding</title>
        <link href="css/style.css" type="text/css" rel="stylesheet">
    </head>
    <body>
    
            <form action="charge.php" method="post">
                <table style="width: 100%; border: none;" cellspacing="2">
                    <tr>
                        <td>
                            <label for="fornavn">Fornavn</label>
                            <input type="text" name="fornavn" class="StripeElement" placeholder="Fornavn" id="fornavn">
                        </td>
                        <td>
                            <label for="efternavn">Efternavn</label>
                            <input type="text" name="efternavn" class="StripeElement" placeholder="Efternavn" id="efternavn">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="email">E-mail Adresse</label>
                            <input type="text" name="email" class="StripeElement" placeholder="E-mail Adresse" id="email">
                        </td>
                        <td>
                            <label for="virksomhed">Virksomhed Navn</label>
                            <input type="text" name="virksomhed" class="StripeElement" placeholder="Virksomhed Navn" id="virksomhed">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="cvr">CVR. Nummer</label>
                            <input type="number" name="cvr" class="StripeElement" placeholder="CVR. Nr." id="cvr">
                        </td>
                        <td>
                            <label for="telefon">Telefon Nummer</label>
                            <input type="number" name="telefon" class="StripeElement" placeholder="Telefon Nr." id="telefon">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <label for="hjemmeside">Hjemmeside</label>
                            <input type="text" name="hjemmeside" class="StripeElement" placeholder="Hjemmeside Link" id="hjemmeside">
                        </td>
                    </tr>
                </table>
                <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                        data-key="<?php echo $stripe['publishable_key']; ?>"
                        data-description="C-Smart Tilmelding"
                        data-amount="700000"
                        data-locale="da" data-label="Betal" data-currency="dkk"></script>
            </form>
        

        <!-- The needed JS files -->
        <!-- JQUERY File -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- Stripe JS -->
        <script src="https://js.stripe.com/v3/"></script>
        <!-- Your JS File -->
        <script src="./charge.js"></script>
        
    </body>
</html>