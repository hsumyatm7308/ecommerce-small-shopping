<?php
if (isset($_GET['letters'])) {
    $letter = $_GET['letters'];
    setcookie('cookiename', $letter); // Set the cookie with the value of 'letters'
    echo "setcookie successful";
}
?>
<!-- HTML content goes here -->
