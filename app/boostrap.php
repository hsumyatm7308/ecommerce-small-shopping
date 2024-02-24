<?php

require_once 'config/config.php';


spl_autoload_register(function ($class) {
    require_once('libraries/' . $class . '.php');
});


echo $_GET['types'];

?>