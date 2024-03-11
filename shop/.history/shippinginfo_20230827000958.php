<?php

require_once "database.php";
require_once "temporaryid.php";
$temp_customer_id = $_SESSION['id'];


try {

    $stmt = $conn->prepare("SELECT * FROM addtocart WHERE temporaryid = :temp");
    $stmt->bindParam(":temp", $temp_customer_id);
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
    <title>Shipping Information</title>
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
                <?php require_once "shiphead.php"; ?>






                <section class="w-full flex justify-center ">
                    <div class="w-full min-h-[500px] flex justify-center items-center flex-col">


                        <form action="" method="post" class="w-[80%]">

                            <div class="w-full">
                                <div class="flex  mb-5 mt-5">
                                    <h1>Shipping Address</h1>

                                </div>

                                <div class="w-full border border-2 p-5 guestinfo">
                                    <div class="w-full bg-gray-100 mb-3">
                                        <!-- <h1 class="p-2">Customer</h1> -->
                                    </div>

                                    <div class="w-full grid grid-cols-2">

                                        <div class="w border-b inputval mb-2 mr-5">
                                                <input type="text" name="firstname"
                                                    class="w- focus:outline-none p-4 val" placeholder="First Name">
                                        </div>

                                        <div class="w border-b inputval mb-2 ml-5">
                                            <input type="text" name="lastname" class="w- focus:outline-none p-4 val"
                                                placeholder="Last Name">
                                        </div>

                                    </div>


                                    <div class="w-full border-b inputval mb-2">
                                        <input type="text" name="company" class="w-full focus:outline-none p-4 val"
                                            placeholder="Company (Option)">
                                    </div>


                                    <div class="w-full border-b inputval mb-2">
                                        <input type="text" name="phone" class="w-full focus:outline-none p-4 val"
                                            placeholder="Phone Number (Option)">
                                    </div>


                                    <div class="w-full border-b inputval mb-2">
                                        <input type="text" name="address" class="w-full focus:outline-none p-4 val"
                                            placeholder="Address">
                                    </div>


                                    <div class="w-full border-b inputval mb-2">
                                        <input type="text" name="city" class="w-full focus:outline-none p-4 val"
                                            placeholder="City">
                                    </div>





                                    <div class="w-full">

                                        <button class="w-full focus:outline-none p-4">Use your account
                                            <a href="informationlogin.php" class="text-indigo-500"> Login</a>
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
                                        <button type="submit" name="ctmregister"
                                            class="bg-gray-500 uppercase p-2 ctntoshipbtn">
                                            <h1 class="text-sm text-white p-1 rounded">Continue to shipping</h1>
                                        </button>
                                    </form>
                                </div>
                            </div>

                        </form>



                    </div>
                </section>



            </div>


            <?php
            require_once "orderinformation.php";
            ?>



        </div>
    </section>


    <script>
        var infosubtotal = document.querySelector('.infosubtotal');
        infosubtotal.innerHTML = localStorage.getItem('subtotal');
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

    if (isset($_POST['ctntoship'])) {
        $email = filter_var($_POST['customeremail'], FILTER_SANITIZE_EMAIL);


        $temp_customer_id = $_SESSION['id'];


        try {

            if ($email === '') {
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



                try {

                    if ($temp_customer_id) {
                        $selectStmt = $conn->prepare('SELECT COUNT(*) FROM customerinfo WHERE temporary_id = :tempid');
                        $selectStmt->bindParam(":tempid", $temp_customer_id);
                        $selectStmt->execute();
                        $rowCount = $selectStmt->fetchColumn();

                        if ($rowCount > 0) {
                            // Temporary ID exists in the database
                            $updateStmt = $conn->prepare('UPDATE customerinfo SET email = :email WHERE temporary_id = :tempid');
                            $updateStmt->bindParam(":tempid", $temp_customer_id);
                            $updateStmt->bindParam(":email", $email);
                            $updateStmt->execute();
                            echo "Updated $rowCount records with temporary ID:" . $temp_customer_id;
                            echo "Temporary ID $temp_customer_id already exists in the database.";
                        } else {
                            // Temporary ID does not exist in the database
                            $insertStmt = $conn->prepare('INSERT INTO customerinfo (email, temporary_id) VALUES (:email, :tempid)');
                            $insertStmt->bindParam(":email", $email);
                            $insertStmt->bindParam(":tempid", $temp_customer_id);
                            $insertStmt->execute();
                            echo "Inserted a new record with temporary ID: $temp_customer_id";
                        }
                    }



                } catch (PDOException $e) {
                    // Handle any database errors that occur
                    echo "Database Error: " . $e->getMessage();
                }








            }


        } catch (Exception $e) {
            // die('Error:' . $e->getMessage());
        }

    }
}

?>