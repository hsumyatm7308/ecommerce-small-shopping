<?php
require_once "database.php";

// Initialize the $selectedLetters array
$selectedLetters = array();

  }
}
?>

<?php foreach ($selectedLetters as $letter): ?>
    <span class="bg-stone-100 text-stone-400 capitalize border rounded p-1 m-1 flex justify-center items-center">
        <span><?php echo $letter; ?></span>
        <span class="text-xs text-stone-500 font-sans mx-1">x</span>
    </span>
<?php endforeach; ?>


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
    }
</script>