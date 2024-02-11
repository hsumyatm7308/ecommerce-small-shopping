<?php

ini_set('display_errors', 1);

echo "hello i am outside index mvcshop";

echo "<br>";
// Check if 'url' is set in the query string
if (isset($_GET['url'])) {
    echo $_GET['url'];
} else {
    echo "url parameter is not set.";
}

// Alternatively, you can use $_SERVER['QUERY_STRING'] directly
// echo $_SERVER['QUERY_STRING'];






?>