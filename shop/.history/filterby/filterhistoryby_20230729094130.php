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

        // Create a new list item
        let newele = document.createElement('li');
        newele.textContent = letter;

        // Find the parent element where you want to append the new list item
        let letterList = document.getElementById('letterList');

        // Append the new list item to the parent element
        letterList.appendChild(newele);
    }
</script>
