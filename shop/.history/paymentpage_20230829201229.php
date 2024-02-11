<?php 
require_once "database.php";
require_once "temporaryid.php";
$tempid = $_SESSION['id'];
$temp_customer_id = $_COOKIE["tempid" . $tempid];

try {


    $seletemp = $conn->prepare("SELECT id FROM tempidtable WHERE tempid = :temp");
    $seletemp->bindParam(":temp", $temp_customer_id);
    $seletemp->execute();

    $rowtemp = $seletemp->fetch();

    $stmt = $conn->prepare("SELECT * FROM addtocart WHERE temporaryid = :temp");
    $stmt->bindParam(":temp", $rowtemp['id']);
    $stmt->execute();
} catch (Exception $e) {
    echo "error found: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
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

<body class="bg-gray-100">

    <section class="p-10">
        <!-- <?php require_once "shiphead.php"; ?> -->

        <div class="grid grid-cols-6">

            <div class="col-span-4 w-full flex justify-start items-center flex-col">
                <!-- head  -->






                <section class="w-full flex justify-center ">
                    <div class="w-full min-h-[500px] flex justify-center items-center flex-col">


                        <form action="" method="post" class="w-[80%] ">

                            <div class="w-full">
                                <div class="flex   mt-7 ">
                                    <h1 class="text-3xl font-semibold">Payment</h1>

                                </div>

                                <div class="w-full mt-10 bg-[#ffffff] p-14 rounded shadow">
                                    <h1 class="text-xl mb-7">Credit Cart Information</h1>

                                    <hr class="border-b border-dashed border-gray-400 mb-10">

                                    <div class="flex justify-center items-start flex-col mb-7">
                                        <label for="" class="mb-2">Number on Card</label>
                                        <input type="text"
                                            class="w-full bg-transparent rounded border-2 border-gray-400 focus:outline-none focus:ring-1 p-3"
                                            placeholder="As shown on the card">
                                    </div>

                                    <div class="flex justify-center items-start flex-col mb-7">
                                        <label for="" class="mb-2">Card Number</label>
                                        <input type="text"
                                            class="w-full bg-transparent rounded border-2 border-gray-400 focus:outline-none focus:ring-1 p-3"
                                            placeholder="Your card number">
                                    </div>


                                    <div class="grid grid-cols-2">
                                        <div class=" flex justify-center items-start flex-col mr-5">
                                            <label for="" class="mb-2">Expired Date</label>
                                            <input type="date"
                                                class="w-full bg-transparent rounded border-2 border-gray-400 focus:outline-none focus:ring-1 p-3"
                                                placeholder="Month">
                                        </div>



                                        <div class="flex justify-center items-start flex-col">
                                            <label for="" class="mb-2">CVC</label>
                                            <input type="text"
                                                class="w-full bg-transparent rounded border-2 border-gray-400 focus:outline-none focus:ring-1 p-3"
                                                placeholder="">
                                        </div>
                                    </div>








                                    <div class="mt-16">
                                        <h1 class="text-lg mb-7">Billing Address</h1>

                                        <hr class="border-b border-dashed border-gray-400 mb-5">

                                        <div>
                                             <span ><input type="checkbox" class="" checked> Same as shipping address</span>
                                            <div class="w-[250px] ml-5 mt-2 text-[#01125f]">
                                                3678, 9th Avenue, New York City, USA
                                            </div>
                                        </div>
                                    </div>




                                </div>


                            </div>



                            <div class="w-full flex justify-between items-center mt-10">
                                <div class="flex justify-center items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M18.75 19.5l-7.5-7.5 7.5-7.5m-6 15L5.25 12l7.5-7.5" />
                                    </svg>
                                    <a href="informationpage.php" class="text-[#1c2e7e] font-semibold">Return to information</a>
                                </div>

                                <div class="">
                                    <form action="" method="post">
                                        <button type="submit" name="shipaddress"
                                            class="bg-[#1c2e7e] uppercase p-2 ctntoshipbtn">
                                            <h1 class="text-sm text-white p-1 rounded">Continue to shipping</h1>
                                        </button>
                                    </form>
                                </div>
                            </div>

                        </form>



                    </div>
                </section>



            </div>



            <?php require_once "orderinformation.php"; ?>






        </div>
    </section>





    <script>
        var infosubtotal = document.querySelector('.infosubtotal');
        infosubtotal.innerHTML = sessionStorage.getItem('subtotal');
    </script>




</body>

</html>