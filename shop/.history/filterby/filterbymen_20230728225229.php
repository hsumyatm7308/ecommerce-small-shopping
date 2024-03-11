<?php
require_once "database.php";

// Initialize the $selectedLetters array
$selectedLetters = array();

// Check if the 'letters' parameter exists in the GET request
// if (isset($_GET['letters'])) {
//     $letter = $_GET['letters'];

//     try {
//         global $conn;

//         // Prepare and execute the query
//         $menstmt = $conn->prepare("SELECT id, perfume_name, brand_name, category_name, price, imgurl, mili FROM perfume  WHERE category_name IN ('Men','Unisex') AND fsletter = :letter ORDER BY fsletter ASC");
//         $menstmt->bindParam(":letter", $letter);
//         $menstmt->execute();

//         // Add the selected letter to the $selectedLetters array using array_push()
//         array_push($selectedLetters, $letter);

//     } catch (Exception $e) {
//         echo "Error Found: " . $e->getMessage();
//     }
// }
?>


<!-- Add this script to your HTML page -->
<script>
    function handleLetterClick(letter) {
        // Get the current URL
        const currentURL = window.location.href;

        // Check if the URL already contains a query string
        const hasQuery = currentURL.includes('?');

        // Append the letter as a query parameter
        const newURL = hasQuery
            ? `${currentURL}&letters=${letter}`
            : `${currentURL}?letters=${letter}`;

        // Redirect to the new URL
        window.location.href = newURL;

        // Store the clicked letter in sessionStorage
        const clickedLetters = sessionStorage.getItem('clickedLetters') || '';
        const updatedLetters = clickedLetters + letter;
        sessionStorage.setItem('clickedLetters', updatedLetters);

        // Display the history of clicked letters
        const historyElement = document.getElementById('history');

// Clear any existing content
historyElement.innerHTML = '';

// Loop through each letter in 'updatedLetters'
for (const letter of updatedLetters) {
  // Create a new element to display the letter
  const letterElement = document.createElement('span');
  letterElement.textContent = letter;

  // Add any desired CSS class to the letter element
  letterElement.classList.add('letter-item');

  // Append the letter element to the history container
  historyElement.appendChild(letterElement);
}
    }

    // Retrieve the history of clicked letters on page load
    document.addEventListener('DOMContentLoaded', () => {
        const clickedLetters = sessionStorage.getItem('clickedLetters');
        if (clickedLetters) {
            const historyElement = document.getElementById('history');
            historyElement.textContent = `History: ${clickedLetters}`;
        }
    });
</script>