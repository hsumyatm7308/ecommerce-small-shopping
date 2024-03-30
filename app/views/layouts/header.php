<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        beige: '#fffdf6',
                        soft: '#949ab1',
                        bitstrong: '#7c7e9d',
                        actionbtn: '#4c5372',
                        tenpercent: '#e2d4e0'
                    }
                }
            }
        }
    </script>

</head>


<style>
    input[type=search]::-ms-clear {
        display: none;
        width: 0;
        height: 0;
    }

    input[type=search]::-ms-reveal {
        display: none;
        width: 0;
        height: 0;


    }

    input[type="search"]::-webkit-search-decoration,
    input[type="search"]::-webkit-search-cancel-button,
    input[type="search"]::-webkit-search-results-button,
    input[type="search"]::-webkit-search-results-decoration {
        display: none;
    }

    #search:focus .searchbox {
        border: 2px solid blue;
    }

    body {
        scroll-behavior: smooth;
    }
</style>