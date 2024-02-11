<?php
ob_start();

require_once "database.php";
require_once "temporaryid.php";
$tempid = $_SESSION['id'];
$temp_customer_id = $_COOKIE["tempid" . $tempid];

try {


    $seletemp = $conn->prepare("SELECT id FROM tempidtable WHERE tempid = :temp");
    $seletemp->bindParam(":temp", $temp_customer_id);
    $seletemp->execute();

    $row = $seletemp->fetch();

    $stmt = $conn->prepare("SELECT * FROM addtocart WHERE temporaryid = :temp");
    $stmt->bindParam(":temp", $row['id']);
    $stmt->execute();
} catch (Exception $e) {
    echo "error found: " . $e->getMessage();
}


try {
    $seletemp = $conn->prepare("SELECT id FROM tempidtable WHERE tempid = :temp");
    $seletemp->bindParam(":temp", $temp_customer_id);
    $seletemp->execute();

    $row = $seletemp->fetch();

    $contact = $conn->prepare("SELECT email FROM customerinfo WHERE temporary_id = :temp");
    $contact->bindParam('temp', $row['id']);
    $contact->execute();

    $address = $conn->prepare("SELECT address FROM shippingaddress WHERE temporaryid = :temp");
    $address->bindParam('temp', $row['id']);
    $address->execute();

    $row = $contact->fetch();
    $rowaddr = $address->fetch();
} catch (Exception $e) {
    echo "error found: " . $e->getMessage();
}


?>


<!DOCTYPE html>
<html>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Information</title>
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
        <div class="grid grid-cols-6">

            <div class="col-span-4 w-full flex justify-start items-center flex-col">
                <!-- head  -->
                <?php require_once "shiphead.php" ?>





                <section class="w-full flex justify-center ">
                    <div class="w-full min-h-[700px] flex justify-center items-center flex-col">


                        <form action="" method="post" class="w-[80%]">
                            <div class="w-full">
                                <div class="w-full border border-2 p-5 ">
                                    <div class="grid grid-cols-4 border-b border-b-solid border-b-gray-300 px-3 py-2">
                                        <div class="p-2">
                                            <p class="text-gray-400">Contact</p>
                                        </div>
                                        <div class="col-span-2 flex justify-start items-center">
                                            <span class=" value">
                                                <?php echo $row['email'] ?>
                                            </span>

                                            <input type="hidden" name="emailvalue"
                                                class="p-2 border border-2 border-b-gray-300 rounded  inputtype"
                                                value="<?php echo $row['email'] ?>" autofocus>
                                        </div>



                                        <div class="flex justify-center items-center">
                                            <span class="font-semibold changebtn ">Change</span>
                                            <input type="submit" name="submit" class="font-semibold text-red-500 changeinput hidden" value="Update">

                                        </div>

                                    </div>



                                    <div class="grid grid-cols-4  p-3">
                                        <div class="p-2">
                                            <p class="text-gray-400">Ship to</p>
                                        </div>
                                        <div class="col-span-2 flex justify-start items-center">
                                            <span class=" value ">
                                                <?php echo $rowaddr['address'] ?>
                                            </span>

                                            <input type="hidden"
                                                class="p-2 border border-2 border-b-gray-300 rounded inputtype"
                                                value="<?php echo $rowaddr['address'] ?>" autofocus>

                                        </div>
                                        <div class="flex justify-center items-center">
                                            <span class="font-semibold changebtn">Change</span>
                                            <input type="submit" name="submit" class="font-semibold text-red-500 changeinput hidden" value="Update">

                                        </div>

                                    </div>



                                </div>


                                <div class="mt-10">
                                    <h1 class="mb-3">Shipping method</h1>

                                    <div class="w-full border border-2 p-5 shipmethodctn">


                                        <div
                                            class="grid grid-cols-4 border-b border-b-solid border-b-gray-300 px-3 py-2">
                                            <div class="col-span-3">
                                                <input type="radio" name="shipcost" value="0" id="shipcost_free"
                                                    class="mycheckbox">
                                                <label for="shipcost_free">
                                                    <span> Fast shipping (Delivered in 5-10 Business Days, include
                                                        2-4 Days processing)</span>
                                                </label>
                                            </div>
                                            <div class="flex justify-center items-center">
                                                <span class="font-semibold text-lg">Free</span>
                                            </div>
                                        </div>

                                        <div
                                            class="grid grid-cols-4 border-b border-b-solid border-b-gray-300 px-3 py-3">
                                            <div class="col-span-3">
                                                <input type="radio" name="shipcost" value="12" id="shipcost_fast">
                                                <label for="shipcost_fast">
                                                    <span> Faster shipping (Delivered in 2 Business Days if Ordered
                                                        by 12:30 EST)</span>
                                                </label>
                                            </div>
                                            <div class="flex justify-center items-center">
                                                <span class="font-semibold">$ 12</span>
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-4 px-3 py-2">
                                            <div class="col-span-3">
                                                <input type="radio" name="shipcost" value="25" id="shipcost_fastest">
                                                <label for="shipcost_fastest">
                                                    <span> Fastest shipping (Delivered in 1 Business Days if Ordered
                                                        by 12:30 EST)</span>
                                                </label>
                                            </div>
                                            <div class="flex justify-center items-center">
                                                <span class="font-semibold">$ 25</span>
                                            </div>
                                        </div>






                                    </div>
                                </div>
                            </div>



                            <div class="w-full flex justify-between items-center mt-5">
                                <div class="flex justify-center items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M18.75 19.5l-7.5-7.5 7.5-7.5m-6 15L5.25 12l7.5-7.5" />
                                    </svg>
                                    <span>Return to information</span>
                                </div>

                                <div class="">
                                    <form action="" method="post">
                                        <button type="submit" name="ctnshipmethod"
                                            class="bg-gray-500 uppercase p-2 ctntoshipbtn">
                                            <h1 class="text-sm text-white p-1 rounded">Continue to payment</h1>
                                        </button>
                                    </form>
                                </div>
                            </div>


                        </form>
                    </div>
                </section>



            </div>

            <?php require_once "orderinformation.php" ?>



        </div>
    </section>




    <script>
        var infosubtotal = document.querySelector('.infosubtotal');
        infosubtotal.innerHTML = localStorage.getItem('subtotal');

        const changebtn = document.querySelectorAll('.changebtn');
        const value = document.querySelectorAll('.value');
        const inputtype = document.querySelectorAll('.inputtype');
        const changeinput =document.querySelectorAll('.changeinput');

        for (let i = 0; i < changebtn.length; i++) {
            changebtn[i].addEventListener('click', function () {
                value[i].classList.add('hidden');

                changeinput[i].classList.remove('hidden');
                inputtype[i].type = "text";
                // inputtype[i]. = "text";

                console.log();
            });
        }

    </script>





</body>

</html>


<?php
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['ctnshipmethod'])) {
        if (isset($_POST['shipcost'])) {
            $selectedvalue = $_POST['shipcost'];
            echo $selectedvalue;
        } else {
            echo '
            <script> 
            document.addEventListener("DOMContentLoaded", function() {
                var shipmethodctn = document.querySelector(".shipmethodctn");
          
                shipmethodctn.classList.add("border-red-200");
            
                 
            });
            </script>';
        }

    }


    if(isset($_POST['submit'])){
        $emailvalue = $_POST['emailvalue'];
        echo $emailvalue;
    }
}
?>