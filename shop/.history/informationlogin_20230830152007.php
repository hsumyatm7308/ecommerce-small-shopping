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



?>


<style>
    .guestinfo {
        /* display: none; */
    }

    .logininfo {
        display: none;
    }

    .registerinfo {
        display: none;
    }
</style>

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

                <h1 class="text-3xl font-semibold mt-7 ml-28 self-start">Information</h1>



                <section class="w-full flex justify-center ">
                    <div class="w-full min-h-[500px] flex justify-center items-center flex-col">


                        <form action="" method="post" class="w-[80%]">

                            <div class="w-full">





                                <div class="w-full  p-5">

                                    <h1 class="text-lg self-start mb-5 -mt-10">As a Guest</h1>
                                    


                                    <div class="w-full border-b inputval mb-2">
                                        <input type="text" name="loginemail" class="w-full focus:outline-none p-4 val"
                                            placeholder="Email">
                                    </div>

                                    <div class="w-full border-b inputval mb-2">
                                        <input type="password" name="loginpassword"
                                            class="w-full focus:outline-none p-4 val" placeholder="Password">
                                    </div>

                                    <div class="w-full flex justify-end items-center">
                                        <button class=" focus:outline-none p-4">
                                            <a href="informationregister.php" id="registerbtn"
                                                class="text-indigo-500 registerbtn"> Register</a>


                                        </button>
                                        <button class=" focus:outline-none p-4">
                                            <a href="informationpage.php" class="text-indigo-500 gotoguest">Cancle</a>

                                        </button>

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
                                    <a href="shopcartpage.php">Return to your cart</a>
                                </div>

                                <div class="">
                                    <form action="" method="post">
                                        <button type="submit" name="loginctn"
                                            class="bg-gray-500 uppercase p-2 ctntoshipbtn">
                                            <h1 class="text-sm text-white p-1 rounded">Continue</h1>
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

function textfilter($data)
{
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {



    if (isset($_POST['loginctn'])) {

        $email = filter_var($_POST['loginemail'], FILTER_SANITIZE_EMAIL);
        $password = textfilter($_POST['loginpassword']);







        try {

            if ($email === '' || $password === '') {
                // echo "you need to fill";

                echo '
                <script> 
                document.addEventListener("DOMContentLoaded", function() {
                    var ctntoshipbtn = document.querySelector(".ctntoshipbtn");
                    var val = document.querySelectorAll(".val");
                    var inputval = document.querySelectorAll(".inputval");
                
                        var hasValue = false;
                        for (var i = 0; i < val.length; i++) {
                            if (val[i].value.trim() === "") {
                                hasValue = true;
                                inputval[i].classList.add("border", "border-dashed", "border-red-500");
                            } else {
                                inputval[i].classList.remove("border", "border-dashed", "border-red-500");
                            }
                        }
                
                        if (hasValue) {
                            event.preventDefault();
                        }
                });
                

             
                 </script>';

            } else {

                $conn = $GLOBALS['conn'];



                $stmt = $conn->prepare('SELECT email, password FROM customerinfo WHERE email = :email');
                $stmt->bindParam(":email", $email);
                $stmt->execute();

                if ($stmt->rowCount() === 0) {
                    // echo "No Data";
                } else {
                    $row = $stmt->fetch();
                    $hashedPasswordFromDatabase = $row['password'];

                    if (password_verify($password, $hashedPasswordFromDatabase)) {
                        // echo "Yes Data";
                        $_SESSION['loginemail'] = $email;
                        header('Location: shippinginfo.php');
                        exit;
                    } else {
                        echo "Password is incorrect";
                    }
                }



            }


        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }

    }
}


ob_end_flush();

?>




<!-- 
CREATE TABLE IF NOT EXISTS customerinfo(
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email  VARCHAR(255) NOT NULL UNIQUE,
    address VARCHAR(255) NOT NULL,
    temporary_id INT ,
     
)

CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    customer_id INT,
    order_date DATE DEFAULT CURRENT_DATE(),
    status ENUM('pending', 'processing', 'shipped') DEFAULT 'pending',
    total_price FLOAT,
    FOREIGN KEY (customer_id) REFERENCES customers(id) ON UPDATE CASCADE ON DELETE CASCADE
); 


CREATE TABLE IF NOT EXISTS ordersitem (
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    order_id INT,
    FOREIGN KEY(order_id)REFERENCES orders(id) ON UPDATE CASCADE ON DELETE CASCADE,
    perfume_id INT,
    FOREIGN KEY (perfume_id)REFERENCES perfume(id) ON UPDATE CASCADE ON DELETE CASCADE,
    quantity INT,
    price float
)


CREATE TABLE IF NOT EXISTS cart (
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    customer_id INT,
    FOREIGN KEY(customer_id) REFERENCES customers(id) ON UPDATE CASCADE ON DELETE CASCADE,
    perfume_id INT,
    FOREIGN KEY (perfume_id) REFERENCES perfume(id) ON UPDATE CASCADE ON DELETE CASCADE,
    temporary_id INT,
    FOREIGN KEY (temporary_id) REFERENCES addtocart(temporaryid) ON UPDATE CASCADE ON DELETE CASCADE,
    quantity INT,
    price float
)

-->