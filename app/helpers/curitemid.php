<?php

class Curitemid
{
    public function getitemid()
    {
        $currentURL = $_SERVER['REQUEST_URI'];
        $urlparts = parse_url($currentURL);
        $path = $urlparts['path'] ? $urlparts['path'] : "";
        $item_id = explode('/', $path);

        return end($item_id);
    }


}



?>