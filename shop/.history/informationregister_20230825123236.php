<?php

require_once "database.php";
require_once "temporaryid.php";


try {

    $stmt = $conn->prepare("SELECT * FROM addtocart");
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
        <div class="grid grid-cols-5">

            <div class="col-span-3 w-full flex justify-start items-center flex-col">
                <!-- head  -->
                <div class="w-full h-52 bg-gray-100 flex justify-center items-center flex-col">
                    <a href="index.php?page=1">
                        <h1 class="text-4xl"> Your Shopping Cart</h1>
                    </a>

                    <div class="mt-4">
                        <ul class="text-sm flex justify-center items-center">
                            <li class="p-1">Items |</li>
                            <li class="p-1 ">Information |</li>
                            <li class="p-1">Shipping |</li>
                            <li class="p-1 ">Payment</li>
                        </ul>
                    </div>
                </div>





                <section class="w-full flex justify-center ">
                    <div class="w-full min-h-[500px] flex justify-center items-center flex-col">


                        <form action="" method="post" class="w-[80%]">

                            <div class="w-full">
                                <div class="flex  mb-5 mt-5">
                                    <h1>Information</h1>

                                </div>




                                <div class="w-full border border-2 p-5">
                                    <div class="w-full bg-gray-100 mb-3">
                                        <h1 class="p-2">Customer Register</h1>
                                    </div>

                                    <div class="w-full border-b inputval mb-2">
                                        <input type="text" name="regname" class="w-full focus:outline-none p-4 val"
                                            placeholder="Name">
                                    </div>

                                    <div class="w-full border-b inputval mb-2">
                                        <input type="text" name="regemail" class="w-full focus:outline-none p-4 val"
                                            placeholder="Email">
                                    </div>

                                    <div class="w-full border-b inputval mb-2">
                                        <input type="password" name="regpassword"
                                            class="w-full focus:outline-none p-4 val" placeholder="Password">
                                    </div>

                                    <div class="w-full flex justify-end items-center">
                                        <button class=" focus:outline-none p-4">
                                            <a href="informationlogin.php" id="loginfromreg" class="text-indigo-500">
                                                Login</a>


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
                                    <span>Return to your cart</span>
                                </div>

                                <div class="">
                                    <form action="" method="post">
                                        <button type="submit" name="ctmregister"
                                            class="bg-gray-300 uppercase p-2 ctntoshipbtn">
                                            <h1 class="text-sm p-1 rounded">Continue to shipping</h1>
                                        </button>
                                    </form>
                                </div>
                            </div>

                        </form>



                    </div>
                </section>



            </div>


            <div class="col-span-2 w-full min-h-[100vh] bg-gray-200">

                <div class="w-full border-b  mt-[6px]">

                    <?php while ($row = $stmt->fetch()): ?>

                        <div class="w-full h-auto takenitems px-5">
                            <div class="grid grid-cols-3 border-b border-b-solid border-b-gray-300">
                                <div class="col-span-2 flex justify-between items-center">
                                    <div class="w-[100px] h-[100px]  flex justify-center items-center ml-4 relative">
                                        <img src="./assets/img/perfume/men/men1.jpg" alt="" width="150px">
                                        <span
                                            class="w-5 h-5 absolute -right-3 top-3 text-sm bg-gray-400 flex justify-center items-center rounded-full">
                                            <span class="text-white">
                                                <?= $row['quantity'] ?>
                                            </span>
                                        </span>
                                    </div>


                                    <div class="flex justify-center items-center ml-5">
                                        <p>
                                            <?= $row['perfumename'] ?>by
                                            <?= $row['brandname'] ?> EDT 3.3 OZ
                                            <?= $row['mili'] ?> spray for
                                            <?= $row['category'] ?>
                                        </p>
                                    </div>

                                </div>
                                <div class="flex justify-center items-center">
                                    <p class="font-semibold">$
                                        <?= $row['totalprice'] ?>
                                    </p>
                                </div>
                            </div>

                        </div>


                    <?php endwhile; ?>

                </div>

                <div class="flex justify-center items-center p-5">
                    <div class="w-full border-b border-b-solid border-b-gray-300 py-3">
                        <input type="text" class="w-[70%] focus:outline-none ml-4  p-4"
                            placeholder="Give card (remark)">
                        <button class="bg-gray-300 uppercase text-sm ml-4 py-4 px-6">Apply</button>
                    </div>
                </div>




                <div class="w-full h-auto  px-5">
                    <div class="grid grid-cols-3 ">
                        <div class="col-span-2 flex justify-between items-center">
                            <h1 class="ml-4">Subtotal</h1>
                        </div>
                        <div class="flex justify-center items-center">
                            <p> $30</p>
                        </div>
                    </div>

                </div>

                <div>

                </div>



            </div>



        </div>
    </section>








</body>

</html>



<?php

function textfilter($data)
{
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $name = textfilter($_POST['regname']);
    echo $name;


    if (isset($_POST['ctmregister'])) {
        $name = textfilter($_POST['regname']);
        $email = filter_var($_POST['regemail'], FILTER_SANITIZE_EMAIL);
        $password = textfilter($_POST['regpassword']);
        $temp_customer_id = $_SESSION['id'];



        try {

            if ($name === '' || $email === '' || $password === '') {
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

                if ($temp_customer_id) {

                    $registerstmt = $conn->prepare('UPDATE customerinfo SET name = :name, email = :email, password = :password WHERE temporary_id = :tempid');
                    $registerstmt->bindParam(":name", $name);
                    $registerstmt->bindParam(":email", $email);
                    $registerstmt->bindParam(":password", $password);
                    $registerstmt->bindParam(":tempid", $temp_customer_id);

                } else {
                    $registerstmt = $conn->prepare('INSERT INTO customerinfo (name,email,password,temporary_id) VALUES (:name,:email,:password,:tempid)');
                    $registerstmt->bindParam(":name", $name);
                    $registerstmt->bindParam(":email", $email);
                    $registerstmt->bindParam(":password", $password);
                    $registerstmt->bindParam(":tempid", $temp_customer_id);
                    $registerstmt->execute();
                }




                echo "helo";
            }


        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }

    }
}

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