<?php

// require 'vendor/autoload.php';

require_once ('/opt/lampp/htdocs/mvcshop/vendor/autoload.php');


class Payment
{
    private $stripeSecretKey;

    public function __construct()
    {
        $this->stripeSecretKey = 'sk_test_51PKbnxJwO61ZtmdY4Rdi1CVidAJP4kzxHyOVVkUH0tSQAZaVIWofeLWUhLzSGPIDer8xTXNYwjcmXDWZql5ooI2H008C5sXvX4';
        \Stripe\Stripe::setApiKey($this->stripeSecretKey);
    }

    public function processPayment($token, $amount)
    {
        try {
            $charge = \Stripe\Charge::create([
                'amount' => $amount * 100, // Amount in cents
                'currency' => 'mmk',
                'source' => $token,
            ]);
            return $charge;
        } catch (\Stripe\Exception\CardException $e) {
            throw new Exception('Payment failed: ' . $e->getMessage());
        }
    }
}
