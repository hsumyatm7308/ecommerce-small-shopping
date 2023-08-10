<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["quantity"])) {
        $quantity = $_POST["quantity"];
        $id = $_GET['items'];

        echo $quantity, $id;

        $conn = new PDO("mysql:host=localhost;dbname=perumdej", "root", "");
        $stmt = $conn->prepare("SELECT * FROM perfume WERE id = :id");





    } else {
        echo "Quantity parameter is missing in the request.";
    }
}
?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping</title>
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

</head>

<body>

    <section>
        <div class="w-full h-52 bg-gray-100 flex justify-center itmes-center">
            <div class="flex justify-center itmes-center flex-col">
                <h1 class="text-4xl"> Your Shopping Cart</h1>

                <div class="mt-4">
                    <ul class="flex justify-center itmes-center text-sm">
                        <li class="p-1">Items |</li>
                        <li class="p-1 ">Information |</li>
                        <li class="p-1">Shipping |</li>
                        <li class="p-1 ">Payment</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="w-full p-8">
            <div class="grid grid-cols-3">
                <div class="col-span-2 flex justify-center items-start">

                    <div class="w-[90%] mt-10">

                        <div class=" grid grid-cols-6 justify-center items-center border-b mb-4">
                            <div class="col-span-2 flex justify-center items-center">
                                <img src="./assets/img/perfume/men/men1.jpg" alt="" class="" width="100px">
                                <span class="ml-10">Navy by Navy EDT 3.3 OZ 45ML spray for Women</span>
                            </div>

                            <div class="flex justify-center items-center">
                                <p>$30</p>
                            </div>

                            <div class=" flex justify-center items-center">

                                <div class="  flex justify-center items-center p-1">

                                    <div class="item flex justify-center items-center p-1">
                                        <div class="flex items-center">
                                            <span id="decrease" class="bg-gray-100 border px-2 py-1 m-1 decrease">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                                                </svg>
                                            </span>

                                            <span
                                                class="w-8 h-8 bg-gray-100 text-[#000] font-semibold shadow drop-shadow-md flex justify-center items-center">
                                                <input type="text" class="w-8 bg-gray-100 focus:outline-none valueInput"
                                                    value=" 1" style="text-align:center;">
                                            </span>

                                            <span id="increase" class="bg-gray-100 border px-2 py-1 m-1 increase">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M12 6v12m6-6H6" />
                                                </svg>
                                            </span>
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="flex justify-center items-center">
                                <p>$30</p>
                            </div>

                            <div class="flex justify-center items-center">
                                <button class="px-3 py-1 bg-gray-100">Remove</button>
                            </div>

                        </div>

                        <div class=" grid grid-cols-6 justify-center items-center border-b mb-4">
                            <div class="col-span-2 flex justify-center items-center">
                                <img src="./assets/img/perfume/men/men1.jpg" alt="" class="" width="100px">
                                <span class="ml-10">Davidoff Cool Water by Aidonull EDT 3.3 OZ 200ML spray for
                                    Men</span>
                            </div>

                            <div class="flex justify-center items-center">
                                <p>$30</p>
                            </div>

                            <div class=" flex justify-center items-center">

                                <div class="  flex justify-center items-center p-1">

                                    <div class="item flex justify-center items-center p-1">
                                        <div class="flex items-center">
                                            <span id="decrease" class="bg-gray-100 border px-2 py-1 m-1 decrease">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                                                </svg>
                                            </span>

                                            <span
                                                class="w-8 h-8 bg-gray-100 text-[#000] font-semibold shadow drop-shadow-md flex justify-center items-center">
                                                <input type="text" class="w-8 bg-gray-100 focus:outline-none valueInput"
                                                    value=" 1" style="text-align:center;">
                                            </span>

                                            <span id="increase" class="bg-gray-100 border px-2 py-1 m-1 increase">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M12 6v12m6-6H6" />
                                                </svg>
                                            </span>
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="flex justify-center items-center">
                                <p>$30</p>
                            </div>

                            <div class="flex justify-center items-center">
                                <button class="px-3 py-1 bg-gray-100">Remove</button>
                            </div>

                        </div>






                    </div>
                </div>
                <div class="w-full flex justify-start items-center flex-col">
                    <div class="w-[400px] min-h-[300px] bg-gray-100 mt-10 flex  items-center flex-col px-5 py-7">
                        <div class="w-full h-10 bg-gray-200 flex justify-between items-center">
                            <h1 class="text-lg ml-4">Product list</h1>
                            <h1 class="text-black mr-7">Subtotal : $100</h1>
                        </div>
                        <div class="w-[85%] flex items-center flex-col mt-3">

                            <li class="w-full flex justify-between mb-2"><span>Navy</span> <span>$30</span></li>
                            <li class="w-full flex justify-between  mb-2"><span>Davidoff Cool Water</span>
                                <span>$50</span>
                            </li>
                            <li class="w-full flex justify-between  mb-2"><span>Navy</span> <span>$30</span></li>
                            <li class="w-full flex justify-between  mb-2"><span>Davidoff Cool Water</span>
                                <span>$50</span>
                            </li>
                            <li class="w-full flex justify-between  mb-2"><span>Navy</span> <span>$30</span></li>
                            <li class="w-full flex justify-between  mb-2"><span>Davidoff Cool Water</span>
                                <span>$50</span>
                            </li>
                            <li class="w-full flex justify-between  mb-2"><span>Davidoff Cool Water</span>
                                <span>$50</span>
                            </li>
                            <li class="w-full flex justify-between  mb-2"><span>Navy</span> <span>$30</span></li>
                            <li class="w-full flex justify-between  mb-2"><span>Davidoff Cool Water</span>
                                <span>$50</span>
                            </li>



                        </div>
                    </div>

                    <div class="w-[400px] h-16 bg-gray-200 flex justify-center items-center mt-10 ">
                        <a href="./informationpage.html" class="text-xl">Checkout</a>
                    </div>
                </div>

            </div>

        </div>
    </section>




    <script>
        const items = document.querySelectorAll('.item');

        items.forEach(item => {
            const decreaseButton = item.querySelector('.decrease');
            const increaseButton = item.querySelector('.increase');
            const valueInput = item.querySelector('.valueInput');


            decreaseButton.addEventListener('click', () => {
                let currentValue = parseInt(valueInput.value);
                if (!isNaN(currentValue)) {
                    valueInput.value = Math.max(currentValue - 1, 0);
                }

                console.log(item)

            });

            increaseButton.addEventListener('click', () => {
                let currentValue = parseInt(valueInput.value);
                if (!isNaN(currentValue)) {
                    valueInput.value = currentValue + 1;
                }
            });
        });
    </script>

</body>

</html>



<!-- CREATE TABLE IF NOT EXISTS customers(

    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR (256),
    email VARCHAR (255),
    address VARCHAR(320),
    payment ENUM('COD','Paypal'),
    shipping ENUM('fast','faster','fastest'),
    perfume_id INT,
    FOREIGN KEY perfume_id REFERENCE BY perfume(id)

)

CREATE TABLE IF NOT EXISTS orderitems(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,

) -->