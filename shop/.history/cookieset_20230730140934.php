
<?php

require_once "brandname/brandnamemen.php";

if (isset($_GET['letters'])) {
    $letter = $_GET['letters'];
    setcookie('cookiename', $letter); // Set the cookie with the value of 'letters'
    echo "setcookie successful";
}

setcookie('cookiename', 'abc'); // Set the cookie with the value of 'letters'


?>
<!-- HTML content goes here -->
