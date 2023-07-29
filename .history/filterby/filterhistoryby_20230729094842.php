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

<!-- Add this element to your HTML page where you want to display the history -->
