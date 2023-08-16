<?php

session_start();
$conn = new PDO("mysql:host=localhost;dbname=perumdej", "root", "");

if (isset($_POST['addtocart'])) {


    if (isset($_SESSION['cart'])) {

        $sessionarrayid = array_column($_SESSION['cart'], "id");

        if (!in_array($_POST['id'], $sessionarrayid)) {
            $id = $_POST['id'];

            $sessionarray = array(
                "id" => $id,
                "name" => $_POST['name'],
                "brandname" => $_POST['brandname'],
                "price" => $_POST['price'],
                "category" => $_POST['categoryname'],
                "quantity" => $_POST['quantity']
            );
            $_SESSION['cart'][] = $sessionarray;
            // var_dump($_SESSION['cart']);
        }


    } else {
        echo "Session cart doesn't exist. ";

        $sessionarray = array(
            "id" => $id,
            "name" => $_POST['name'],
            "brandname" => $_POST['brandname'],
            "price" => $_POST['price'],
            "category" => $_POST['categoryname'],
            "quantity" => $_POST['quantity']
        );


        echo "After setting cart: ";
        $_SESSION['cart'][] = $sessionarray;
        // var_dump($_SESSION['cart']);
    }
    // echo "hello";

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

        <div>
            <a href="index.php?page=1" class="ml-10">back to shop</a>
        </div>
    </section>

    <section>
        <div class="w-full p-8">
            <div class="grid grid-cols-3">
                <div class="col-span-2 flex justify-center items-start">

                    <div class="w-[90%] mt-10">

                        <?php

                        $total = 0;

                        if (!empty($_SESSION['cart'])) {
                            foreach ($_SESSION['cart'] as $key => $value) {
                                echo '
                            <div class="cart-item grid grid-cols-6 justify-center items-center border-b mb-4">
                            <div class="col-span-2 flex justify-center items-center">
                                <img src="./assets/img/perfume/men/men1.jpg" alt="" class="" width="100px">
                                <span class="ml-10">' . $value['name'] . ' by ' . $value['brandname'] . ' EDT 3.3 OZ 45ML spray for Women</span>
                            </div>

                            <div class="flex justify-center items-center">
                                <p> $' . $value['price'] . '</p>
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
                                                    value="' . $value['quantity'] . '" style="text-align:center;">
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
                                <p class="totalprice">$' . number_format($value['quantity'] * $value['price'], 2) . '</p>
                            </div>

                            <div class="flex justify-center items-center">
                            <a href="shopcartpage.php?action=remove&id='.$value['id'].'" class="remove-link">
                                <button class="px-3 py-1 bg-gray-100 remove-btn" data-id="'.$value['id'].'">Remove</button>
                            </a>
                        </div>
                        

                           

                        </div>';
                                $total = $total + ($value['quantity'] * $value['price']);

                            }

                            echo '
                            <div class="flex justify-center items-center">
                            <a href="shopcartpage.php?action=clearall" >
                            <button class="px-3 py-1 bg-gray-100">Clear </button>
                            </a>
                        </div>
                            ';

                        }


                        ?>



                    </div>
                </div>
                <div class="w-full flex justify-start items-center flex-col">
                    <div class="w-[400px] min-h-[300px] bg-gray-100 mt-10 flex  items-center flex-col px-5 py-7">
                        <div class="w-full h-10 bg-gray-200 flex justify-between items-center">
                            <h1 class="text-lg ml-4">Product list</h1>

                            <?php

                            if (!empty($_SESSION['cart'])) {
                                echo '
                                        <h1 class="text-black mr-7">Subtotal : $' . number_format($total, 2) . '</h1>
                                         ';

                            }
                            ?>
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

    <?php

    // if (isset($_GET['action']) && $_GET['action'] === "remove") {
    //     foreach ($_SESSION["cart"] as $key => $value) {
    //         if ($value['id'] === $_GET['id']) {
    //             unset($_SESSION["cart"][$key]);
    //             break;
    //         }
    //     }
    // }
    
    // if (isset($_GET['action']) && $_GET['action'] === "clearall") {
    
    //     unset($_SESSION["cart"]);
    
    // }
    
    ?>



    <?php

    if (isset($_GET['action']) && $_GET['action'] === "remove") {
        $itemIdToRemove = $_GET['id'];

        foreach ($_SESSION["cart"] as $key => $value) {
            if ($value['id'] === $itemIdToRemove) {
                unset($_SESSION["cart"][$key]);
                break;
            }
        }

        // Assuming the server responds with success
        echo json_encode(["status" => "success"]);
    } else {
        // Handle other cases or errors
        echo json_encode(["status" => "error"]);
    }
    ?>



    <script>
        const items = document.querySelectorAll('.item');

        items.forEach(item => {
            const decreaseButton = item.querySelector('.decrease');
            const increaseButton = item.querySelector('.increase');
            const valueInput = item.querySelector('.valueInput');
            const totalprice = item.querySelector('.totalprice');


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

                console.log("hi")
            });
        });
    </script>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function () {
            $(".remove-link").click(function (event) {
                event.preventDefault(); // Prevent the link from redirecting

                var itemId = $(this).find(".remove-btn").data("id"); // Get the item ID from the button's data attribute
                var removeUrl = "remove_from_cart.php?action=remove&id=" + itemId;

                // Send AJAX request to remove the item
                $.ajax({
                    url: removeUrl,
                    method: "GET",
                    success: function (data) {
                        // Assuming the server returns success after removing the item
                        // Update the cart display or any relevant UI here
                        $(this).closest(".cart-item").remove(); // Remove the item from the UI
                    },
                    error: function () {
                        console.log("Error removing item from cart.");
                    }
                });
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
    FOREIGN KEY perfume_id REFERENCE  perfume(id)

)
-->
<!-- CREATE TABLE IF NOT EXISTS addtocart (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    perfumeimg BLOB,
    perfumename VARCHAR(255),
    perfumeprice FLOAT,
    quantity INT NOT NULL DEFAULT 1,
    totalprice FLOAT,
    perfume_id INT,
    FOREIGN KEY (perfume_id) REFERENCES perfume(id)
); -->