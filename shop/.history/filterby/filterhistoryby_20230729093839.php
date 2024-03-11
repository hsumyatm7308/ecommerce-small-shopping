<?php
require_once "database.php";
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

<!-- Add this script to  HTML page -->
<script>
    function handleLetterClick(letter) {
        const currentURL = window.location.href;

        const hasQuery = currentURL.includes('?');

        const newURL = hasQuery
            ? `${currentURL}&letters=${letter}`
            : `${currentURL}?letters=${letter}`;

        // history.pushState({ path: newURL }, '', newURL);
        window.location.href =newURL

        // const clickedLetters = sessionStorage.getItem('clickedLetters') || '';
        // const updatedLetters = clickedLetters + letter;
        // sessionStorage.setItem('clickedLetters', updatedLetters);







    }

    document.addEventListener('DOMContentLoaded', () => {
        const clickedLetters = sessionStorage.getItem('clickedLetters');
        if (clickedLetters) {
            const historyElement = document.getElementById('history');
            historyElement.textContent = ` ${clickedLetters}`;


        }
    });
</script>