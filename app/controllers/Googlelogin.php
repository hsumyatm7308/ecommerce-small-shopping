<?php

require_once ('/opt/lampp/htdocs/mvcshop/vendorfolder/google/vendor/autoload.php');

class Googlelogin
{




    public function createclient()
    {

        $client_id = '1007973019775-vt9m4ufg8v5qfjk56eto4ehsbvtdev7j.apps.googleusercontent.com';
        $client_secret = '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';
        $redirecturl = 'http://localhost/mvcshop/checkouts/authcheck';

        $client = new Google_Client();
        $client->setClientId($client_id);
        $client->setClientSecret($client_secret);
        $client->setRedirectUri($redirecturl);

        $client->addScope("email");
        $client->addScope("profile");



        return $client;

    }






}
?>