<?php
define('ProPayPal', 0);
if(ProPayPal){
    define("PayPalClientId", "*********************");
    define("PayPalSecret", "*********************");
    define("PayPalBaseUrl", "https://api.paypal.com/v1/");
    define("PayPalENV", "production");
} else {
    define("PayPalClientId", "AQcZr5WRRBJngYpIRHW87ze8yWXt0bcl2uaHDE6wiOnSh2_rE9abRs4kthstyD4l3nGyelGkQa6i5pJw");
    define("PayPalSecret", "EAetlGiqDA0FAjcsraxFkML2boH4ciweqYAINRo1TukKd2VYPmSJxBubYmFgHePBNqOXxmWMlBEEDAHC");
    define("PayPalBaseUrl", "https://api.sandbox.paypal.com/v2/");
    define("PayPalENV", "sandbox");
}
?>
