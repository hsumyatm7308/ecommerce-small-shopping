
<h1 class="text-2xl mt-7 font-semibold">Order Summary</h1>

<div class="col-span-2 w-[80%] h-[50vh]   ">

    <div class="w-full min-h-[300px]  mt-10 mb-8">


        <div class="w-full border-b  mt-[6px]">

            <?php while ($row = $stmt->fetch()): ?>

                <div class="w-full min-h-[100px] takenitems">
                    <div class="grid grid-cols-3 border-b border-b-solid border-b-gray-300">
                        <div class="col-span-2 flex justify-between items-center">
                            <div class="w-[100px] h-[100px]  flex justify-center items-center relative">
                                <img src="./assets/img/perfume/men/men1.jpg" alt="" width="150px">
                                <span
                                    class="w-5 h-5 absolute -right-3 top-3 text-sm bg-gray-400 flex justify-center items-center rounded-full">
                                    <span class="text-white">
                                        <?= $row['quantity'] ?>
                                        <!-- <script>
                            sessionStorage.getItem('qty'+)
                         </script> -->
                                    </span>
                                </span>
                            </div>


                            <div class="flex justify-center items-center ml-5">
                                <p class="text-sm">
                                    <?= $row['perfumename'] ?> by
                                    <?= $row['brandname'] ?> EDT 3.3 OZ
                                    <?= $row['mili'] ?> spray for
                                    <?= $row['category'] ?>
                                </p>
                            </div>

                        </div>
                        <div class="flex justify-end items-center">
                            <p class="text-sm">$
                                <?= $row['totalprice'] ?>
                            </p>
                        </div>
                    </div>

                </div>


            <?php endwhile; ?>

        </div>


        <div class="w-full h-auto  mt-5 ml-4">
            <div class="flex justify-end ">
                <div class="w-[100%] grid grid-cols-3">
                    <div class="col-span-2 flex justify-start items-center">
                        <h1 class="">Subtotal</h1>
                    </div>
                    <div class="col-span-1 flex justify-end items-center mr-5">
                        <p class="font-semibold infosubtotal"> </p>
                    </div>
                </div>
            </div>

            <div class="flex justify-end mt-3">
                <div class="w-[100%] grid grid-cols-3">
                    <div class="col-span-2 flex justify-start items-center">
                        <h1 class="">Shiping Cost</h1>
                    </div>
                    <div class="col-spans-1 flex justify-end items-center mr-5">
                        <p class="font-semibold">
                            
                            <?php
                            ini_set('display_errors',0);
                            $seletemp = $conn->prepare("SELECT id FROM tempidtable WHERE tempid = :temp");
                            $seletemp->bindParam(":temp", $temp_customer_id);
                            $seletemp->execute();

                            $shiprowtemp = $seletemp->fetch();

                            if ($shiprowtemp !== false) {
                                $shipcoststmt = $conn->prepare("SELECT shipcost FROM shippingaddress WHERE temporaryid = :tempid");
                                $shipcoststmt->bindParam(":tempid", $shiprowtemp['id']);
                                $shipcoststmt->execute();

                                $cost = $shipcoststmt->fetch();
                                $shopcost = $cost['shipcost'];

                                if ($shopcost === NULL) {
                                    echo "---";
                                } else {
                                    echo "$". $shopcost;
                                }
                            } else {
                                echo "---"; // Handle the case where no record was found
                            }
                            ?>
                        </p>

                    </div>
                </div>
            </div>

            <div class="flex justify-end mt-3">
                <div class="w-[100%] grid grid-cols-3">
                    <div class="col-span-2 flex justify-start items-center">
                        <h1 class="">Total</h1>
                    </div>
                    <div class="col-span-1 flex justify-end items-center mr-5">
                        <p class="font-semibold text-2xl" id="subtotal">


                        </p>
                    </div>
                </div>
            </div>



        </div>






    </div>




</div>

<script>
    var getsubtotal = sessionStorage.getItem('subtotal');

    var numericpart = getsubtotal.replace(/[^0-9.]/g, "");

    var numericvalue = parseFloat(numericpart);

    console.log(numericvalue);


    var shipcost = <?php echo intval($cost['shipcost']) ?>

    console.log(numericvalue + shipcost)
    document.getElementById('subtotal').innerHTML = "$" + (numericvalue + shipcost);


</script>


<?php
// if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["subtotal"])) {
//     $subtotal = intval($_POST["subtotal"]);

//     $total = intval($cost['shipcost']) + $subtotal;


//     echo $subtotal;
// }
?>


<!-- 29CA  -->