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
        const currentURL = window.location.href;

        const hasQuery = currentURL.includes('?');

        const newURL = hasQuery
            ? `${currentURL}&letters=${letter}`
            : `${currentURL}?letters=${letter}`;

        history.pushState({ path: newURL }, '', newURL);

        const clickedLetters = sessionStorage.getItem('clickedLetters') || '';
        const updatedLetters = clickedLetters + letter;
        sessionStorage.setItem('clickedLetters', updatedLetters);

  


        const historyElement = document.getElementById('history');

        historyElement.innerHTML = '';

        for (const letter of updatedLetters) {

            const letterElement = document.createElement('span');
            letterElement.id = letter; 
            letterElement.classList.add('bg-stone-100', 'text-stone-400', 'capitalize', 'border', 'rounded', 'p-1', 'm-1', 'flex', 'justify-center', 'items-center');

            const letterContent = document.createElement('span');
            letterContent.textContent = letter;

            const deleteIcon = document.createElement('span');
            deleteIcon.textContent = 'x';
            deleteIcon.classList.add('text-xs', 'text-stone-500', 'font-sans', 'mx-1');

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