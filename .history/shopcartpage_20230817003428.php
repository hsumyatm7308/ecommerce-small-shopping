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

                    <div class="w-[90%] mt-10 itemscontainer">

                        <?php
                        require_once "cartitemshow.php";


                        ?>


                    </div>
                </div>
                <div class="w-full flex justify-start items-center flex-col">
                    <div class="w-[400px] min-h-[300px] bg-gray-100 mt-10 flex  items-center flex-col px-5 py-7">
                        <div class="w-full h-10 bg-gray-200 flex justify-between items-center">
                            <h1 class="text-lg ml-4">Product list</h1>


                            <?php

                            require_once "database.php";

                            try {
                                global $conn;

                                $stmt = $conn->prepare('SELECT * FROM addtocart');
                                $stmt->execute();

                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
                                    ;

                            } catch (Exception $e) {
                                echo 'Error:' . $e->getMessage();
                            }

                            ?>

                            <h1 class="text-black mr-7 ">Subtotal : <span class="subtotalPrice">
                                    <?= $row['perfumeprice'] ?>
                                </span></h1>';


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


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script type="text/javascript">


        $(document).ready(function () {
            var itemscontainer = document.querySelector('.itemscontainer');

            var itemscount = itemscontainer.childElementCount;
            console.log(itemscount);

            localStorage.setItem("countitem", itemscount);


        });







    </script>





    <!-- <script>
        document.addEventListener("DOMContentLoaded", function () {

            const subtotalPrice = document.querySelector('.subtotalPrice');
            const baseSubtotal = <?= $total ?>;

            const items = document.querySelectorAll('.cart-item');

            items.forEach(item => {
                const decreaseButton = item.querySelector(".decrease");
                const increaseButton = item.querySelector(".increase");
                const quantityInput = item.querySelector(".valueInput");
                const price = <?= $value['price'] ?>;
                const totalpriceInput = item.querySelector(".totalprice");




                const savedQuantity = localStorage.getItem(`qty-${item.id}`);
                const savedPrice = localStorage.getItem(`price-${item.id}`);
                if (savedQuantity !== null) {
                    quantityInput.value = savedQuantity;
                }
                if (savedPrice !== null) {
                    totalpriceInput.value = savedPrice;
                }

                decreaseButton.addEventListener("click", function () {
                    if (quantityInput.value > 1) {
                        quantityInput.value--;
                        updateTotalPrice();
                        saveQuantityToLocalStorage();
                        updateSubtotal();
                    }
                });

                increaseButton.addEventListener("click", function () {
                    quantityInput.value++;
                    updateTotalPrice();
                    saveQuantityToLocalStorage();
                    updateSubtotal();
                });

                quantityInput.addEventListener("input", function () {
                    updateTotalPrice();
                    saveQuantityToLocalStorage();
                    updateSubtotal()
                });

                function updateTotalPrice() {
                    totalpriceInput.value = "$" + (quantityInput.value * price).toFixed(2);

                }

                function updateSubtotal() {
                    let newSubtotal = baseSubtotal;
                    items.forEach(item => {
                        const itemTotalPrice = parseFloat(item.querySelector(".totalprice").value.substring(1));
                        newSubtotal += itemTotalPrice;
                    });
                    subtotalPrice.textContent = "$" + newSubtotal.toFixed(2);
                }

                function saveQuantityToLocalStorage() {
                    localStorage.setItem(`qty-${item.id}`, quantityInput.value);
                    localStorage.setItem(`price-${item.id}`, totalpriceInput.value);
                }


            });
        });

    </script> -->



    <!-- <script>
        document.querySelectorAll('.remove-item').forEach(button => {
            button.addEventListener('click', function () {


                this.closest('form').submit();

            });
        });


    </script> -->


</body>

</html>