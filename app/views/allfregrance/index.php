<?php

ini_set('display_errors', 0);

require_once('/opt/lampp/htdocs/mvcshop/app/views/layouts/header.php'); ?>
<?php
require_once('/opt/lampp/htdocs/mvcshop/app/views/layouts/sidebar.php');


?>









<div class="col-span-3">
    <div class="mb-10">
        <span class="uppercase text-xs">Home <span class="m-1">|</span> All's Fragrances</span>
    </div>


    <div class="grid grid-cols-4 gap-4">


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




    </div>

    <!-- pagination  -->
    <div class="flex justify-end items-center mt-10 mb-10 space-x-3">
        <?php if ($data['currentPage'] > 1): ?>
            <a href="?page=<?php echo $data['currentPage'] - 1; ?>"><span
                    class="border-2 bg-gray-200 hover:bg-gray-300 px-4 py-2">Prev</span></a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $data['totalPages']; $i++): ?>
            <a href="?page=<?php echo $i; ?>"><span
                    class="border px-4 py-2 <?php echo $i == $data['currentPage'] ? 'bg-gray-200' : ''; ?>">
                    <?php echo $i; ?>
                </span></a>
        <?php endfor; ?>

        <?php if ($data['currentPage'] < $data['totalPages']): ?>
            <a href="?page=<?php echo $data['currentPage'] + 1; ?>"><span
                    class="border-2 bg-gray-200 hover:bg-gray-300 px-4 py-2">Next</span></a>
        <?php endif; ?>
    </div>





</div>

</div>


</div>
</section>


</body>

</html>