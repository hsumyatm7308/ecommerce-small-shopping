<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shopping</title>
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        <style>.letter-history {
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

    </style>
</head>

<body class="">

    <!-- Start Header  -->
    <?php
    require_once "headersection.php";
    ?>


    <section class=" mt-6 mb-5">
        <div class=" grid grid-cols-2 p-2">
            <div class="flex justify-center">
                <h1 class=" text-3xl">MEN's FRAGRANCES</h1>
            </div>

            <div>
                <ul class="flex justify-center items-center">
                    <li class="font-bold mr-5">Sort by : </li>
                    <form action="" method="post" class="flex justify-center items-center">
                      
                        <li type="submit" class="mr-5" name="asc">
                           <button type="submit" name="asc">  Ascending price</button>
                        </li>
                        <li  class="mr-5" >
                           <button type="submit" name="dec"> Descending price</button>
                        </li>
                        <li type="submit" class="mr-5">
                           <button type="submit" name="rev">  Review</button>
                        </li>
                    </form>
                </ul>
            </div>
        </div>
    </section>


    <section class="">
        <div class="grid grid-cols-3">
            <div class=" flex  justify-end ">
                <div class="w-80">

                    <!-- <div class="h-auto mb-5">
                        <h1 class="font-[500] uppercase mb-1">Filter by</h1>
                        <div id="history" class=" flex flex-wrap leading-3 addingletterctn letter-history">
                            <span id=""
                                class=" bg-stone-100 text-stone-400 capitalize border rounded p-1 m-1 flex justify-center items-center">
                                <span> Unisex</span>
                                <span class="text-xs text-stone-500 font-sans mx-1">x</span>
                            </span>

                            <span
                                class=" bg-stone-100 text-stone-400 capitalize border rounded p-1 m-1 flex justify-center items-center">
                                <span> Women</span>
                                <span class="text-xs text-stone-500 font-sans mx-1">x</span>
                            </span>
 -->



                    <?php
                    // require_once "filterby/filterhistoryby.php";
                    ?>

                    <!-- </div> -->
                    <!-- </div> -->

                    <div class="h-auto mb-5">
                        <h1 class="uppercase mb-1">Brand</h1>
                        <span class="text-sm text-blue-300 ml-10">Click a letter to find a perfume</span>
                        <ul class="w-80  flex-wrap flex justify-start items-center mt-2">

                            <?php require_once "brandname/brandnamemen.php" ?>

                        </ul>
                    </div>



                    <div class="h-auto mb-5">
                        <h1 class="font-[500] uppercase mb-1">Price</h1>
                        <form action="menfrg.php" method="get">
                            <input type="text" name="startprice" placeholder=" Min" value="<?php if (isset($_GET['startprice'])) {
                                echo $_GET['startprice'];
                            } ?>" class="w-20 border border-2 rounded m-1 p-1 focus:ring-1 focus:outline-none">

                            <input type="text" name="endprice" placeholder=" Max" value="<?php if (isset($_GET['endprice'])) {
                                echo $_GET['endprice'];
                            } ?>" class="w-20 border border-2 rounded m-1 p-1 focus:ring-1 focus:outline-none">



                            <script>
                                function updatePrice() {
                                    var startprice = document.getElementsByName('startprice')[0].value;
                                    var endprice = document.getElementsByName('endprice')[0].value;
                                    var updateURL = "menfrg.php?menpage=1&startprice=" + startprice + "&endprice=" + endprice + "&price=1";
                                    document.getElementById('updateprice').href = updateURL;
                                }
                            </script>

                            <a href="#" type="text" id="updateprice" name="price" onclick="updatePrice()"
                                class="w-24 border border-2 rounded m-1 p-1">UPDATE</a>

                        </form>


                    </div>


                    <div>
                        <h1 class="font-[500] uppercase mb-1">Type</h1>
                        <form id="unisexForm" action="menfrg.php" method="get">
                            <label for="type" class="flex items-center">
                                <input type="checkbox" id="type" name="type" class="typecheckbox m-1">
                                Unisex
                            </label>
                        </form>

                        <form id="" action="" method="post">
                            <label for="mtype" class="flex items-center">
                                <input type="checkbox" id="mtype" name="type" class="m-1">
                                Men
                            </label>
                        </form>
                    </div>

                </div>
            </div>


            <div class="col-span-2 ">
                <div>
                    <span class="uppercase text-xs">Home <span class="m-1">|</span> Men's Fragrances</span>
                </div>

                <?php require_once "backendfunction/menbk.php"; ?>

            </div>

        </div>

        </div>
    </section>


</body>

</html>

<script>

    function handleCheckboxClick() {
        const checkbox = document.getElementById("type");
        if (checkbox.checked) {
            window.location.href = "menfrg.php?menpage=1&type=on&unisexquery=1";
        } else {
            window.location.href = "menfrg.php?menpage=1";
        }

    }

    function handleCheckboxClickmen() {
        const mcheckbox = document.getElementById('mtype');
        if (mcheckbox.checked) {
            window.location.href = "menfrg.php?menpage=1&type=mon&menquery=1";
        } else {
            window.location.href = "menfrg.php?menpage=1";
        }
    }

    document.getElementById("type").addEventListener("click", handleCheckboxClick);
    document.getElementById("mtype").addEventListener("click", handleCheckboxClickmen);



    const urlParams = new URLSearchParams(window.location.search);
    const typeParam = urlParams.get("type");
    const checkbox = document.getElementById("type");
    const mcheckbox = document.getElementById('mtype');

    if (typeParam === "on") {
        checkbox.checked = true;
    } else {
        checkbox.checked = false;
    }

    if (typeParam === "mon") {
        mcheckbox.checked = true;
    } else {
        mcheckbox.checked = false;
    }
</script>


<!-- 
 <script>
    function handleLetterClick(letter) {
        // Get the current URL
        const currentURL = window.location.href;

        const hasQuery = currentURL.includes('?');

        const newURL = hasQuery
            ? `${currentURL}&letters=${letter}`
            : `${currentURL}?letters=${letter}`;

        window.history.pushState({ path: newURL }, '', newURL);

        const clickedLetters = sessionStorage.getItem('clickedLetters') || '';
        const updatedLetters = clickedLetters + letter;
        sessionStorage.setItem('clickedLetters', updatedLetters);

        const historyElement = document.getElementById('history');
        historyElement.innerHTML = '';

        for (const letter of updatedLetters) {
            const outerSpan = document.createElement('span');
            outerSpan.textContent = letter;
            outerSpan.classList.add('bg-stone-100', 'text-stone-400', 'capitalize', 'border', 'rounded', 'p-1', 'm-1', 'flex', 'justify-center', 'items-center');

            const innerSpan = document.createElement('span');
            innerSpan.textContent = 'x';
            innerSpan.classList.add('text-xs', 'text-stone-500', 'font-sans', 'mx-1');

            outerSpan.appendChild(innerSpan);
            historyElement.appendChild(outerSpan);

            // Use a separate function to handle the click event for each innerSpan
            innerSpan.addEventListener('click', createInnerSpanClickHandler(letter));
        }

        function createInnerSpanClickHandler(letter) {
            return function () {
                console.log('hi');
                let lettersToRemove = this.parentElement.remove();

                const clickedLetters = sessionStorage.getItem('clickedLetters') || '';
                const updatedLetters = clickedLetters.replace(letter, ''); // Remove the clicked letter from clickedLetters
                sessionStorage.setItem('clickedLetters', updatedLetters);
            };
        }






    }



    document.addEventListener('DOMContentLoaded', () => {
        const clickedLetters = sessionStorage.getItem('clickedLetters');

        if (clickedLetters) {
            const historyElement = document.getElementById('history');
            historyElement.innerHTML = '';

            for (const letter of clickedLetters) {
                const outerSpan = document.createElement('span');
                outerSpan.textContent = letter;
                outerSpan.classList.add(
                    'bg-stone-100',
                    'text-stone-400',
                    'capitalize',
                    'border',
                    'rounded',
                    'p-1',
                    'm-1',
                    'flex',
                    'justify-center',
                    'items-center'
                );

                const innerSpan = document.createElement('span');
                innerSpan.textContent = 'x';
                innerSpan.classList.add('text-xs', 'text-stone-500', 'font-sans', 'mx-1');

                outerSpan.appendChild(innerSpan);
                historyElement.appendChild(outerSpan);

                // Use a separate function to handle the click event for each innerSpan
                innerSpan.addEventListener('click', createInnerSpanClickHandler(letter));

              
            }
        }
    });

    function createInnerSpanClickHandler(letter) {
        return function () {
            console.log('hi');
            let lettersToRemove = this.parentElement.remove();

            const clickedLetters = sessionStorage.getItem('clickedLetters') || '';
            const updatedLetters = clickedLetters.replace(letter, ''); // Remove the clicked letter from clickedLetters
            sessionStorage.setItem('clickedLetters', updatedLetters);
        };
    }


</script> 

 -->


<script>
    // function isCookieSet(cookieName) {
    //     const cookies = document.cookie.split('; ');
    //     for (const cookie of cookies) {
    //         const [name, value] = cookie.split('=');
    //         if (name === cookieName) {
    //             return true;
    //         }
    //     }
    //     return false;
    // }

    // const cookieName = 'myCookie';
    // if (isCookieSet(cookieName)) {
    //     console.log(`${cookieName} is set.`);
    // } else {
    //     console.log(`${cookieName} is not set.`);
    // }

</script>



<?php
// menfrg.php

// ob_start(); // Start output buffering

// if (isset($_GET['letters'])) {
//     $letter = htmlspecialchars($_GET['letters']);
//     setcookie('name', $letter, time() + (86400 * 30), '/'); // Set the cookie with the value of 'letters' for 30 days and specify the path as the root of the website
//     echo "setcookie successful";
// }

// ob_end_flush(); // Send the output to the browser

// setcookie('name', 'abc'); // Set the cookie with the value of 'letters'

?>




<!-- URL.createObjectURL() -->