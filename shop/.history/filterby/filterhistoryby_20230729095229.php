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

    const history =document.getElementById('history');
    var newele = document.createElement('li');
    newele.innerHTML= `
                            <span
                                class=" bg-stone-100 text-stone-400 capitalize border rounded p-1 m-1 flex justify-center items-center">
                                <span> ${letter}</span>
                                <span class="text-xs text-stone-500 font-sans mx-1">x</span>
                            </span>`
    
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
