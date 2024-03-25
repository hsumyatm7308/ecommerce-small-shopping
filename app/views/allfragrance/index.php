<?php

ini_set('display_errors', 0);

require_once ('/opt/lampp/htdocs/mvcshop/app/views/layouts/header.php'); ?>
<?php
require_once ('/opt/lampp/htdocs/mvcshop/app/views/layouts/sidebar.php');


?>




<style>

</style>




<div class="col-span-3">



    <div class="flex justify-between items-center mb-10">
        <div class="">
            <span class="uppercase text-xs">Home <span class="m-1">|</span> All's Fragrances</span>
        </div>

        <div>
            <form id="" action="" method="POST">
                <label for="sortby">Sort by:</label>
                <select name="sortby" id="sortby">
                    <option value="price_asc">Price Low to High</option>
                    <option value="price_desc">Price High to Low</option>
                    <option value="name_asc">Name A to Z</option>
                    <option value="name_desc">Name Z to A</option>
                </select>

                <button type="submit">Submit</button>
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
                            <img src="<?php echo IMG_ROOT; ?><?php echo $item['image'] ?>" alt="">
                        </div>

                        <div class="w-full py-4">
                            <p class="mb-4">
                                <?php echo $item['name'] ?> By Blueprint EDT
                            </p>
                            <div class="w-full flex justify-between items-center">
                                <span class="font-bold text-[#4c5372]">$
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


<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script>
    const sortby = document.getElementById('sortby');

    // sortby.addEventListener('change', () => {
    //     const selectedValue = sortby.value;
    //     const geturl = 'http://localhost/mvcshop/allfragrance/sorting';
    //     axios.post(geturl, { sortBy: selectedValue })
    //         .then((response) => {
    //             console.log(response.data);
    //         })
    //         .catch((error) => {
    //             console.error('Error:', error);
    //         });
    // });




</script>


</body>

</html>