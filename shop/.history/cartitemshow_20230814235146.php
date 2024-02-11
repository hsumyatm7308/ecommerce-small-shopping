<?php

require_once "database.php";

try {

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


    <div id="<?= $row['perfume_id'] ?>" class="cart-item grid grid-cols-6 justify-center items-center border-b mb-4">
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
                            <span id="decrease-<?= $row['perfume_id'] ?>" class="bg-gray-100 border px-2 py-1 m-1 decrease">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                                </svg>
                            </span>

                            <span
                                class="w-8 h-8 bg-gray-100 text-[#000] font-semibold shadow drop-shadow-md flex justify-center items-center">
                                <input type="text" id="quantity-<?= $row['perfume_id'] ?>"
                                    class="w-8 bg-gray-100 focus:outline-none valueinput " name="quantity"
                                    value="<?= $row['quantity'] ?>" style="text-align:center;">
                            </span>

                            <button type="submit" name="increase" id="increase-<?= $row['perfume_id'] ?>"
                                class="bg-gray-100 border px-2 py-1 m-1 increase">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <div class="flex justify-center items-center">

            <input type="text" id="totalprice-<?= $row['perfume_id'] ?>" class="w-20 p-1 focus:outline-none totalprice"
                value="$<?= $row['totalprice'] ?>" readonly>
        </div>

        <form action="shopcartpage.php?remove=<?= $row['perfume_id'] ?>" method="post">
            <div class="flex justify-center items-center">
                <div class="flex justify-center items-center">
                    <button type="submit" name="remove" id="remove-<?= $row['perfume_id'] ?>" class="px-3 py-1 bg-gray-100 remove-item"
                        data-item-id="<?= $row['perfume_id'] ?>">Remove</button>
                </div>
            </div>
        </form>


        <script type="text/javascript">
            const qtyinput<?= $row['perfume_id'] ?> = document.querySelector("#quantity-<?= $row['perfume_id'] ?>");
            const price<?= $row['perfume_id'] ?> = <?= $row['perfumeprice'] ?>;
            const totalpriceinput<?= $row['perfume_id'] ?> = document.querySelector('#totalprice-<?= $row['perfume_id'] ?>');

            const increasebtn<?= $row['perfume_id'] ?> = document.querySelector("#increase-<?= $row['perfume_id'] ?>");
            const decreasebtn<?= $row['perfume_id'] ?> = document.querySelector("#decrease-<?= $row['perfume_id'] ?>");

            const savedquantity<?= $row['perfume_id'] ?> = localStorage.getItem(`qty-<?= $row['perfume_id'] ?>`);
            const savedprice<?= $row['perfume_id'] ?> = localStorage.getItem(`price-<?= $row['perfume_id'] ?>`);

            if (savedquantity<?= $row['perfume_id'] ?> !== null) {
                qtyinput<?= $row['perfume_id'] ?>.value = savedquantity<?= $row['perfume_id'] ?>;
            }

            if (savedprice<?= $row['perfume_id'] ?> !== null) {
                totalpriceinput<?= $row['perfume_id'] ?>.value = savedprice<?= $row['perfume_id'] ?>;
            }

            increasebtn<?= $row['perfume_id'] ?>.addEventListener('click', function () {
                qtyinput<?= $row['perfume_id'] ?>.value++;
                updateTotalPrice<?= $row['perfume_id'] ?>();
                savetolocalstorage<?= $row['perfume_id'] ?>();
                savepricetolocalstorage<?= $row['perfume_id'] ?>()
            });

            decreasebtn<?= $row['perfume_id'] ?>.addEventListener('click', function () {
                if (qtyinput<?= $row['perfume_id'] ?>.value > 1) {
                    qtyinput<?= $row['perfume_id'] ?>.value--;
                    updateTotalPrice<?= $row['perfume_id'] ?>();
                    savetolocalstorage<?= $row['perfume_id'] ?>();
                    savepricetolocalstorage<?= $row['perfume_id'] ?>()
                }
            });

            function savetolocalstorage<?= $row['perfume_id'] ?>() {
                localStorage.setItem(`qty-<?= $row['perfume_id'] ?>`, qtyinput<?= $row['perfume_id'] ?>.value);
            }

            function updateTotalPrice<?= $row['perfume_id'] ?>() {
                totalpriceinput<?= $row['perfume_id'] ?>.value = "$" + (qtyinput<?= $row['perfume_id'] ?>.value * price<?= $row['perfume_id'] ?>).toFixed(2);
            }

            function savepricetolocalstorage<?= $row['perfume_id'] ?>() {
                localStorage.setItem(`price-<?= $row['perfume_id'] ?>`, totalpriceinput<?= $row['perfume_id'] ?>.value);
            }



            const removeitem<?= $row['perfume_id'] ?>  =document.querySelector('#remove-<?= $row['perfume_id'] ?>');
            removeitem<?= $row['perfume_id'] ?>.addEventListener('click',function(){
                localStorage.removeItem(`price-<?= $row['perfume_id'] ?>`);
                localStorage.removeItem(`qty-<?= $row['perfume_id'] ?>`);

            })
        </script>


    </div>


<?php endwhile; ?>