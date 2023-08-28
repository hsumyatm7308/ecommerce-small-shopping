<div class="col-span-2 w-[80%] min-h-[50vh] bg-gray-200 mt-20">

<div class="w-full border-b  mt-[6px]">

    <?php while ($row = $stmt->fetch()): ?>

        <div class="w-full min-h-[100px] takenitems px-5">
            <div class="grid grid-cols-3 border-b border-b-solid border-b-gray-300">
                <div class="col-span-2 flex justify-between items-center">
                    <div class="w-[100px] h-[100px]  flex justify-center items-center ml-4 relative">
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
                <div class="flex justify-center items-center">
                    <p class="text-sm">$
                        <?= $row['totalprice'] ?>
                    </p>
                </div>
            </div>

        </div>


    <?php endwhile; ?>

</div>


<div class="w-full h-auto  px-5 mt-5">
    <div class="flex justify-end ">
        <div class="col-span-2 flex justify-between items-center">
            <h1 class="mr-10">Subtotal</h1>
        </div>
        <div class="flex justify-center items-center mr-10">
            <p class="font-semibold infosubtotal"> </p>
        </div>
    </div>

    <div class="flex justify-end ">
        <div class="col-span-2 flex justify-between items-center">
            <h1 class="mr-10">Shiping</h1>
        </div>
        <div class="flex justify-center items-center mr-10">
            <p class="font-semibold infosubtotal"> </p>
        </div>
    </div>

</div>



<div>

</div>



</div>


<!-- 
 -->