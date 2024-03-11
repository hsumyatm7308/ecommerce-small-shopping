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
        historyElement.textContent = `History: ${updatedLetters}`;

        const addingletterctn = document.getElementsByClassName('addingletterctn')[0];
addingletterctn.innerHTML = ''; // Clear the previous content, if any

for (const letter of updatedLetters) {
  let newele = document.createElement('li');
  numberitems = `
    <span class="bg-stone-100 text-stone-400 capitalize border rounded p-1 m-1 flex justify-center items-center">
      <span>${letter}</span>
      <span class="text-xs text-stone-500 font-sans mx-1">x</span>
    </span>
  `;
  newele.innerHTML = numberitems;
  addingletterctn.appendChild(newele);
}
In this code, after displaying the history of clicked letters in the element with the ID "history," we create a new list item (<li>) for each letter in the updatedLetters string using a loop. We iterate over each letter in updatedLetters and create a new list item for it, and then append that list item to the parent element with the class "addingletterctn." This way, the history will be displayed as a list of items on your page.

Please note that you might want to add additional styling or layout adjustments to the list items to make them look as desired on your page. Additionally, make sure that the parent element with the class "addingletterctn" exists in your HTML where you want to display the history.






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