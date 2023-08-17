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
                        // require_once "cartitemshow.php";
                        

                        ?>

                        <?php

                        require_once "database.php";

                        try {
                            global $conn;

                            $stmt = $conn->prepare('SELECT * FROM addtocart');
                            $stmt->execute();

                            if (isset($_POST['remove'])) {
                                $id = $_GET['remove'];
                                echo $id;
                                $stmt = $conn->prepare('DELETE FROM addtocart WHERE perfume_id = :id');
                                $stmt->bindParam(':id', $id);
                                $stmt->execute();



                                header("Location: shopcartpage.php");
                                exit;
                            }


                        } catch (Exception $e) {
                            echo 'Error:' . $e->getMessage();
                        }

                        ?>


                        <?php while ($row = $stmt->fetch()): ?>


                            <?php
                            $price = $row['perfumeprice'];
                            ?>


                            <div id="<?= $row['perfume_id'] ?>"
                                class="cart-item grid grid-cols-6 justify-center items-center border-b mb-4">
                                <div class="col-span-2 flex justify-center items-center">
                                    <img src="./assets/img/perfume/men/men1.jpg" alt="" class="" width="100px">
                                    <span class="ml-10">
                                        <?= $row['perfumename'] ?> by
                                        <?= $row['brandname'] ?> EDT 3.3 OZ
                                        <?= $row['mili'] ?> spray for
                                        <?= $row['category'] ?>
                                    </span>
                                </div>

                                <div class="flex justify-center items-center">
                                    <p class="<?= $row['perfumeprice'] ?>"> $
                                        <?= $row['perfumeprice'] ?>
                                    </p>
                                </div>

                                <input type="hidden" name="perfume_id" value="<?= $row['perfume_id'] ?>">
                                <div class=" flex justify-center items-center">


                                    <div class=" flex justify-center items-center">
                                        <div class="flex justify-center items-center p-1">
                                            <div class="item flex justify-center items-center p-1">
                                                <div class="flex items-center">
                                                    <span id="decrease-<?= $row['perfume_id'] ?>"
                                                        class="bg-gray-100 border px-2 py-1 m-1 decrease">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="w-4 h-4">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M18 12H6" />
                                                        </svg>
                                                    </span>

                                                    <span
                                                        class="w-8 h-8 bg-gray-100 text-[#000] font-semibold shadow drop-shadow-md flex justify-center items-center">
                                                        <input type="text" id="quantity-<?= $row['perfume_id'] ?>"
                                                            class="w-8 bg-gray-100 focus:outline-none valueinput "
                                                            name="quantity" value="<?= $row['quantity'] ?>"
                                                            style="text-align:center;">
                                                    </span>

                                                    <button type="submit" name="increase"
                                                        id="increase-<?= $row['perfume_id'] ?>"
                                                        class="bg-gray-100 border px-2 py-1 m-1 increase">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="w-4 h-4">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M12 6v12m6-6H6" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                                <div class="flex justify-center items-center">

                                    <input type="text" id="totalprice-<?= $row['perfume_id'] ?>"
                                        class="w-20 p-1 focus:outline-none totalprice" value="$<?= $row['totalprice'] ?>"
                                        readonly>
                                </div>

                                <form action="shopcartpage.php?remove=<?= $row['perfume_id'] ?>" method="post">
                                    <div class="flex justify-center items-center">
                                        <div class="flex justify-center items-center">
                                            <button type="submit" name="remove" id="remove-<?= $row['perfume_id'] ?>"
                                                class="px-3 py-1 bg-gray-100 remove-item"
                                                data-item-id="<?= $row['perfume_id'] ?>">Remove</button>
                                        </div>
                                    </div>
                                </form>




                            </div>


                        <?php endwhile; ?>







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

                                $totalamount = 0;



                                echo '';

                            } catch (Exception $e) {
                                echo 'Error: ' . $e->getMessage();
                            }
                            ?>

                            <?php while ($row = $stmt->fetch()): ?>
                                <?php
                                $subtotal = $row['quantity'] * $row['perfumeprice'];

                                $totalamount += $subtotal;
                                ?>



                            <?php endwhile; ?>
                            <h1 class="text-black mr-7">Subtotal: <span class="text-indigo-500 ml-2 totalmount">
                                    <input type="text" id="subtotal" class="w-20 p-1 bg-blue-100 focus:outline-none "
                                        value="$<?php echo $totalamount; ?>" readonly>
                                </span>
                            </h1>

                        </div>

                        <div class="w-[85%] flex items-center flex-col mt-3">


                            <?php
                            require_once "database.php";

                            try {
                                global $conn;

                                $stmt = $conn->prepare('SELECT * FROM addtocart');
                                $stmt->execute();

                                $totalamount = 0;




                            } catch (Exception $e) {
                                echo 'Error: ' . $e->getMessage();
                            }


                            ?>
                            <?php while ($row = $stmt->fetch()): ?>
                                <?php
                                $total = $row['quantity'] * $row['perfumeprice'];
                                ?>
                                <li class="w-full flex justify-between mb-2">
                                    <span>
                                        <?php echo $row['perfumename']; ?>
                                    </span>
                                    <input type="text" id="totallist-<?php echo $row['perfume_id']; ?>"
                                        class="w-20 p-1 focus:outline-none " value="$ <?php echo $total; ?>" readonly>
                                </li>



                                <script type="text/javascript">
                                    const qtyinput<?= $row['perfume_id'] ?> = document.querySelector("#quantity-<?= $row['perfume_id'] ?>");
                                    const price<?= $row['perfume_id'] ?> = <?= $row['perfumeprice'] ?>;
                                    const totalpriceinput<?= $row['perfume_id'] ?> = document.querySelector('#totalprice-<?= $row['perfume_id'] ?>');

                                    var totallist<?php echo $row['perfume_id']; ?> = document.getElementById("totallist-<?php echo $row['perfume_id']; ?>");



                                    const increasebtn<?= $row['perfume_id'] ?> = document.querySelector("#increase-<?= $row['perfume_id'] ?>");
                                    const decreasebtn<?= $row['perfume_id'] ?> = document.querySelector("#decrease-<?= $row['perfume_id'] ?>");

                                    const savedquantity<?= $row['perfume_id'] ?> = localStorage.getItem(`qty-<?= $row['perfume_id'] ?>`);
                                    const savedprice<?= $row['perfume_id'] ?> = localStorage.getItem(`price-<?= $row['perfume_id'] ?>`);

                                    if (savedquantity<?= $row['perfume_id'] ?> !== null) {
                                        qtyinput<?= $row['perfume_id'] ?>.value = savedquantity<?= $row['perfume_id'] ?>;
                                    }

                                    if (savedprice<?= $row['perfume_id'] ?> !== null) {
                                        totalpriceinput<?= $row['perfume_id'] ?>.value = savedprice<?= $row['perfume_id'] ?>;
                                        totallist<?php echo $row['perfume_id']; ?>.value = savedprice<?= $row['perfume_id'] ?>;
                                    }

                                    increasebtn<?= $row['perfume_id'] ?>.addEventListener('click', function () {
                                        qtyinput<?= $row['perfume_id'] ?>.value++;
                                        updateTotalPrice<?= $row['perfume_id'] ?>();
                                        savetolocalstorage<?= $row['perfume_id'] ?>();
                                        savepricetolocalstorage<?= $row['perfume_id'] ?>();

                                        window.location.reload();


                                    });

                                    decreasebtn<?= $row['perfume_id'] ?>.addEventListener('click', function () {
                                        if (qtyinput<?= $row['perfume_id'] ?>.value > 1) {
                                            qtyinput<?= $row['perfume_id'] ?>.value--;
                                            updateTotalPrice<?= $row['perfume_id'] ?>();
                                            savetolocalstorage<?= $row['perfume_id'] ?>();
                                            savepricetolocalstorage<?= $row['perfume_id'] ?>();
                                            window.location.reload();

                                        }
                                    });

                                    function savetolocalstorage<?= $row['perfume_id'] ?>() {
                                        localStorage.setItem(`qty-<?= $row['perfume_id'] ?>`, qtyinput<?= $row['perfume_id'] ?>.value);
                                    }

                                    function updateTotalPrice<?= $row['perfume_id'] ?>() {
                                        totalpriceinput<?= $row['perfume_id'] ?>.value = "$" + (qtyinput<?= $row['perfume_id'] ?>.value * price<?= $row['perfume_id'] ?>).toFixed(2);
                                        totallist<?= $row['perfume_id'] ?>.value = "$" + (qtyinput<?= $row['perfume_id'] ?>.value * price<?= $row['perfume_id'] ?>).toFixed(2);


                                    }

                                    function savepricetolocalstorage<?= $row['perfume_id'] ?>() {
                                        localStorage.setItem(`price-<?= $row['perfume_id'] ?>`, totalpriceinput<?= $row['perfume_id'] ?>.value);
                                        localStorage.setItem(`price-<?= $row['perfume_id'] ?>`, totallist<?= $row['perfume_id'] ?>.value);
                                    }



                                    const removeitem<?= $row['perfume_id'] ?> = document.querySelector('#remove-<?= $row['perfume_id'] ?>');
                                    removeitem<?= $row['perfume_id'] ?>.addEventListener('click', function () {
                                        localStorage.removeItem(`price-<?= $row['perfume_id'] ?>`);
                                        localStorage.removeItem(`qty-<?= $row['perfume_id'] ?>`);

                                    })







                                </script>




                            <?php endwhile; ?>
                            <script>

                                var qtyinput = document.querySelectorAll('.valueinput');
                                var totalprice = document.querySelectorAll('.totalprice');
                                var subtotal = document.getElementById('subtotal');
                                var increase = document.querySelectorAll('.increase');
                                var decrease = document.querySelectorAll('.decrease');




                                var subtotalist = 0;




                                for (var i = 0; i < totalprice.length; i++) {



                                    var curqty = qtyinput[i].value;
                                    var curprice = totalprice[i].value;

                                    var curpricevalue = parseFloat(curprice.replace('$', ''));

                                    subtotalist += curpricevalue;





                                    subtotal.value = "$" + subtotalist.toFixed(2, 0);
                                }





                            </script>



                        </div>
                        <span>--------------------------------------------------</span>

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