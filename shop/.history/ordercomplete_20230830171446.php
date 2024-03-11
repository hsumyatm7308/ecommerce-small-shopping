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



try {
    $seletemp = $conn->prepare("SELECT id FROM tempidtable WHERE tempid = :temp");
    $seletemp->bindParam(":temp", $temp_customer_id);
    $seletemp->execute();

    $temp = $seletemp->fetch();



    $address = $conn->prepare("SELECT address FROM shippingaddress WHERE temporaryid = :temp");
    $address->bindParam('temp', $temp['id']);
    $address->execute();

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

    <section class="w-full flex justify-center items-center">
        <div class="w-[50%]">
            <div class="flex   mt-7 ">

            </div>

            <div
                class="w-full min-h-[90vh] mt-10 bg-[#ffffff] p-14 rounded shadow flex justify-center items-center flex-col">

                <?php require_once "orderinformation.php"; ?>



            </div>

            <h1 class="text-xl font- mt-10">Thank you for your order!</h1>


        </div>

    </section>






    <script>
        var infosubtotal = document.querySelector('.infosubtotal');
        infosubtotal.innerHTML = sessionStorage.getItem('subtotal');
    </script>

</body>

</html>