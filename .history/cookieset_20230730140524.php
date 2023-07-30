<?php
// brandnamemen.php file remains the same

require_once "brandname/brandnamemen.php";

if (isset($_GET['letters'])) {
    // Sanitize the input to prevent XSS attacks
    $letter = htmlspecialchars($_GET['letters']);

    // Set an expiration time for the cookie (e.g., 1 day from now)
    $expiration = time() + (86400); // 86400 seconds = 1 day

    // Set the cookie with the value of 'letters', specifying the expiration time and path
    setcookie('cookiename', $letter, $expiration, '/');

    echo "setcookie successful";
}
?>
<!-- HTML content goes here -->
<?php
// database.php file remains the same

// The rest of the code remains the same
?>
