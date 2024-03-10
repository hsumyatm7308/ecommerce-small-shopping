<?php

ini_set('display_errors', 0);

require_once('/opt/lampp/htdocs/mvcshop/app/views/layouts/header.php'); ?>
<?php
require_once('/opt/lampp/htdocs/mvcshop/app/views/layouts/sidebar.php');


?>




<style>
    .hover-overlay {
        display: none;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(rgba(0, 0, 0, 0.1), #fffdf6);
    }

    .product-item:hover .hover-overlay {
        display: block;
    }
</style>




<div class="col-span-3">


    <div class="flex justify-between items-center">
        <div class="mb-10">
            <span class="uppercase text-xs">Home <span class="m-1">|</span> All's Fragrances</span>
        </div>

        <div>
            <form action="">
                <section>
                    <option value="">Price</option>
                    <option value="">Review</option>
                </section>
            </form>
        </div>
    </div>




    <div class="grid grid-cols-4 gap-10">


        <?php if ($data['totalitems'] == 0): ?>

            <div class="w-full border p-3">
                <div>No Data</div>
            </div>


        <?php else: ?>


            <?php foreach ($data['items'] as $item): ?>
                <div class="w-full border border-[#949ab1] border-1 rounded-md relative p-3 product-item">
                    <a href="">
                        <div class="w-full h-[250px] bg-gray-100">
                            <img src="" alt="">
                        </div>

                        <div class="w-full py-4">
                            <p class="mb-4">
                                <?php echo $item['name'] ?> By Blueprint EDT
                            </p>
                            <div class="w-full flex justify-between items-center">
                                <span class="font-bold">$
                                    <?php echo $item['price'] ?>
                                </span>
                            </div>
                        </div>

                        <div class="hover-overlay">
                            <div class="w-full flex justify-center items-center">
                                <div class="mt-20 flex flex-col justify-center items-center space-y-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" class="w-6 h-6 ">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                    </svg>
                                    <span>ADD</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>


            <?php endforeach; ?>
        <?php endif; ?>




    </div>

    <!-- pagination  -->
    <?php
    $newpagination = new Pagination();
    $newpagination->pagination($data);
    ?>

</div>

</div>


</div>
</section>


</body>

</html>