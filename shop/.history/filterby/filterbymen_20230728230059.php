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


<style>
    .letter-history {
        display: flex;
        flex-wrap: wrap;
        margin-top: 10px;
    }

    .letter-item {
        background-color: #f0f0f0;
        color: #333;
        padding: 4px 8px;
        margin: 4px;
        border-radius: 4px;
    }
</style>

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

        // Update the URL without a full page reload
        history.pushState({ path: newURL }, '', newURL);

        // Store the clicked letter in sessionStorage
        const clickedLetters = sessionStorage.getItem('clickedLetters') || '';
        const updatedLetters = clickedLetters + letter;
        sessionStorage.setItem('clickedLetters', updatedLetters);

        // Assume you have the 'updatedLetters' variable with the history of clicked letters

        // Get the parent element where you want to append the history


        const historyElement = document.getElementById('history');

        // Clear any existing content
        historyElement.innerHTML = '';

        // Loop through each letter in 'updatedLetters'
        for (const letter of updatedLetters) {
            // Create the entire HTML structure for the letter item
            const letterElement = document.createElement('span');
            letterElement.id = letter; // Set the id of the letter element to the letter itself
            letterElement.classList.add('bg-stone-100', 'text-stone-400', 'capitalize', 'border', 'rounded', 'p-1', 'm-1', 'flex', 'justify-center', 'items-center');

            const letterContent = document.createElement('span');
            letterContent.textContent = letter;

            const deleteIcon = document.createElement('span');
            deleteIcon.textContent = 'x';
            deleteIcon.classList.add('text-xs', 'text-stone-500', 'font-sans', 'mx-1');

            // Append the letter content and delete icon to the letter element
            letterElement.appendChild(letterContent);
            letterElement.appendChild(deleteIcon);

            // Append the entire letter element to the history container
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