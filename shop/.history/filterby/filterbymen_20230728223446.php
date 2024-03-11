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


        let newele = document.createElement('li');
        const addingletterctn = document.getElementsByClassName('addingletterctn');
        numberitems = `
                             <span
                                class=" bg-stone-100 text-stone-400 capitalize border rounded p-1 m-1 flex justify-center items-center">
                                <span> Unisex</span>
                                <span class="text-xs text-stone-500 font-sans mx-1">x</span>
                            </span>`;
                            cartshopbox.innerHTML = itemsbox;
    cartitems.appendChild(cartshopbox);
    }
</script>