<?php

class Pagination
{
    public $currenturl;

    public function getpage()
    {


        $this->currenturl = $_SERVER['REQUEST_URI'];

        $querystring = parse_url($this->currenturl);

        $page = explode('=', $querystring['query'])[0];

        return $page;

    }

    public function getparameter()
    {
        $this->currenturl = $_SERVER['REQUEST_URI'];
        $urlparts = parse_url($this->currenturl);
        parse_str($urlparts['query'], $queryparameters);

        return $queryparameters;


    }
}

?>