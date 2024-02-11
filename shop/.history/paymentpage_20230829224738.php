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

                                    <div class="flex justify-center items-start flex-col mb-7 inputval">
                                        <label for="" class="mb-2">Name on Card</label>
                                        <input type="text" name="namecard"
                                            class="w-full bg-transparent rounded border-2 border-gray-400 focus:outline-none focus:ring-1 p-3 val"
                                            placeholder="As shown on the card">
                                    </div>

                                    <div class="flex justify-center items-start flex-col mb-7 inputval">
                                        <label for="" class="mb-2">Card Number</label>
                                        <input type="text" name="cardnumber"
                                            class="w-full bg-transparent rounded border-2 border-gray-400 focus:outline-none focus:ring-1 p-3 val"
                                            placeholder="Your card number">
                                    </div>


                                    <div class="grid grid-cols-2">
                                        <div class=" flex justify-center items-start flex-col mr-5 inputval">
                                            <label for="" class="mb-2">Expired Date</label>
                                            <input type="date" name="expiredate"
                                                class="w-full bg-transparent rounded border-2 border-gray-400 focus:outline-none focus:ring-1 p-3 val"
                                                placeholder="Month">
                                        </div>



                                        <div class="flex justify-center items-start flex-col inputval">
                                            <label for="" class="mb-2">CVC</label>
                                            <input type="text" name="cvc"
                                                class="w-full bg-transparent rounded border-2 border-gray-400 focus:outline-none focus:ring-1 p-3 val"
                                                placeholder="">
                                        </div>
                                    </div>








                                    <div class="mt-16">
                                        <h1 class="text-lg mb-7">Billing Address</h1>

                                        <hr class="border-b border-dashed border-gray-400 mb-5">

                                        <div>
                                            <span class="flex justify-start items-center">
                                                <input type="checkbox" class="mr-2" checked>
                                                <p> Same as shipping address </p>
                                            </span>
                                            <div class="w-[250px] ml-5 mt-2 text-[#01125f]">
                                                <?php echo $rowaddr['address'] ?>
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
                                    <a href="informationpage.php" class="text-[#1c2e7e] font-semibold">Return to
                                        information</a>
                                </div>

                                <div class="">
                                    <form action="" method="post">
                                        <button type="submit" name="paymentsubmit"
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


<?php


if (isset($_POST['paymentsubmit'])) {

    $name = textfileter($_POST['namecard']);
    $number = textfileter($_POST['cardnumber']);
    $expiredate = textfileter($_POST['expiredate']);
    $cvc = textfileter($_POST['cvc']);

    if ($name === '' || $number === '' || $expiredate === '' || $cvc === '') {
        echo '
            <script> 
            document.addEventListener("DOMContentLoaded", function() {
                var val = document.querySelectorAll(".val");
                var inputval = document.querySelectorAll(".inputval");
            
                    var hasValue = false;
                    for (var i = 0; i < val.length; i++) {
                        if (val[i].value.trim() === "") {
                            hasValue = true;
                            val[i].classList.add("border", "border-dashed", "border-red-500");
                        } else {
                            val[i].classList.remove("border", "border-dashed", "border-red-500");
                        }
                    }
            
                    if (hasValue) {
                        event.preventDefault();
                    } 
            });
            
    
         
             </script>';
    } else {


        if ($temp_customer_id) {

            $seletemp = $conn->prepare("SELECT id FROM tempidtable WHERE tempid = :temp");
            $seletemp->bindParam(":temp", $temp_customer_id);
            $seletemp->execute();

            $row = $seletemp->fetch();


            $selectStmt = $conn->prepare('SELECT COUNT(*) FROM customerinfo WHERE temporary_id = :tempid');
            $selectStmt->bindParam(":tempid", $row['id']);
            $selectStmt->execute();
            $rowCount = $selectStmt->fetchColumn();

            if ($rowCount > 0) {

                $update = $conn->prepare("UPDATE creditcard SET name=:name,number=:num,cvv=:cvv,expdate=:exp WHERE temporary_id = :temp");
                $update->bindParam(":name", $name);
                $update->bindParam(":num", $number);
                $update->bindParam(":cvv", $cvc);
                $update->bindParam(":exp", $expiredate);
                $update->execute();

            } else {






                $insertced = $conn->prepare("INSERT INTO creditcard (name,number,cvv,expdate,temporary_id) VALUES (:name,:num,:cvv,:exp,:temp)");
                $insertced->bindParam(":name", $name);
                $insertced->bindParam(":num", $number);
                $insertced->bindParam(":cvv", $cvc);
                $insertced->bindParam(":exp", $expiredate);
                $insertced->bindParam(":temp", $temp['id']);
                $insertced->execute();

                echo "hello";
            }
        }

    }

}









function textfileter($data)
{
    $data = trim(stripslashes(strip_tags(htmlspecialchars($data))));
    return $data;
}


?>






<!-- 

CREATE TABLE IF NOT EXISTS creditcard(
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    name VARCHAR (250),
    number VARCHAR(50) UNIQUE,
    cvv VARCHAR(16),
    expdate DATE,

    temporary_id INT,
    FOREIGN KEY (temporary_id) REFERENCES tempidtable(id) ON UPDATE CASCADE ON DELETE CASCADE 

) -->