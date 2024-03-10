<?php

ini_set('display_errors', 0);

require_once('/opt/lampp/htdocs/mvcshop/app/views/layouts/header.php'); ?>
<?php
require_once('/opt/lampp/htdocs/mvcshop/app/views/layouts/sidebar.php');


?>









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




    <div class="grid grid-cols-4 gap-4">


        <?php if ($data['totalitems'] == 0): ?>

            <div class="w-full border p-3">
                <div>No Data</div>
            </div>


        <?php else: ?>


            <?php foreach ($data['items'] as $item): ?>

                <div class="w-full border p-3">
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
                            <button type="button" class="px-3 py-2 bg-yellow-600">Add</button>
                        </div>
                    </div>
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