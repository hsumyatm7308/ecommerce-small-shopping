<?php

require_once "database.php";

try {

    $stmt = $conn->prepare('SELECT * FROM addtocart');
    $stmt->execute();



} catch (Exception $e) {
    echo 'Error:' . $e->getMessage();
}

?>

<?php while ($row = $stmt->fetch()): ?>

        <div id="" class="cart-item grid grid-cols-6 justify-center items-center border-b mb-4">
        <div class="col-span-2 flex justify-center items-center">
            <img src="./assets/img/perfume/men/men1.jpg" alt="" class="" width="100px">
            <span class="ml-10"><?= $row['perfumename'] ?> by <?= $row['brandname'] ?> EDT 3.3 OZ
               <?= $row['mili'] ?> spray for <?=  $row['category']?></span>
        </div>

        <div class="flex justify-center items-center">
            <p> $<?= $row['perfumeprice']?> </p>
        </div>

        <div class=" flex justify-center items-center">
            <div class="flex justify-center items-center p-1">
                <div class="item flex justify-center items-center p-1">
                    <div class="flex items-center">
                        <span id="decrease-<?= $row['id'] ?>'" class="bg-gray-100 border px-2 py-1 m-1 decrease">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                            </svg>
                        </span>

                        <span
                            class="w-8 h-8 bg-gray-100 text-[#000] font-semibold shadow drop-shadow-md flex justify-center items-center">
                            <input type="text" class="w-8 bg-gray-100 focus:outline-none valueInput"
                                value="<?= $row['quantity'] ?>" style="text-align:center;">
                        </span>

                        <span id="increase-<?= $row['id'] ?>" name="increase" class="bg-gray-100 border px-2 py-1 m-1 increase">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                            </svg>
                        </span>
                    </div>
                </div>
            </div>

        </div>

        <div class="flex justify-center items-center">

            <input type="text" id="totalprice-' . $id . '" class="w-20 p-1 focus:outline-none totalprice"
                value="$<?= $row['totalprice'] ?>" readonly>
        </div>

        <div class="flex justify-center items-center">
            <div class="flex justify-center items-center">
                <button type="submit" name="remove" class="remove-item" data-item-id="' . $id . '">Remove</button>
            </div>
        </div>






    </div>


<?php endwhile; ?>



<script>
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



            });
        });

    </script>
