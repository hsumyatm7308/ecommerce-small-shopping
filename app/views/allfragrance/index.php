<?php

ini_set('display_errors', 0);

require_once ('/opt/lampp/htdocs/mvcshop/app/views/layouts/header.php');
require_once ('/opt/lampp/htdocs/mvcshop/app/views/layouts/navbar.php');
require_once ('/opt/lampp/htdocs/mvcshop/app/views/layouts/sidebar.php');
?>


<?php
$currentURL = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$urlparts = parse_url($currentURL);
parse_str($urlparts['query'], $parameter);

?>



<style>

</style>




<div class="col-span-3 md:py-0 mt-10 py-10">



    <div class="flex justify-between items-center mb-10">
        <div class="">
            <span class="uppercase text-xs">Home <span class="m-1">|</span> All's Fragrances</span>
        </div>

        <div>
            <form id="" action="" method="GET">
                <label for="sortby">Sort by:</label>
                <select name="sortby" id="sortby">
                    <option value="random">Choose..</option>
                    <option value="price_asc" <?php echo $parameter['sortby'] == 'price_asc' ? 'selected' : ''; ?>>
                        Price Low to High</option>
                    <option value="price_desc" <?php echo $parameter['sortby'] == 'price_desc' ? 'selected' : ''; ?>>Price
                        High to Low</option>
                </select>

            </form>

        </div>
    </div>





    <?php if ($data['totalitems'] == 0): ?>

        <div class="w-full h-[50vh] border p-3">
            <div>No Data</div>
        </div>


    <?php else: ?>

        <div class="w-full grid md:grid-cols-4 grid-cols-2 gap-10 place-content-center">

            <?php foreach ($data['items'] as $item): ?>

                <div class="w-full border  border-1 rounded-md relative p-3 product-item">
                    <a href="">
                        <div class="w-full h-[250px] bg-gray-100">
                            <img src="<?php echo IMG_ROOT; ?><?php echo $item['image'] ?>" alt=""
                                class="object-fit w-full h-full">
                        </div>

                        <div class="w-full py-4 text-[#4c5372]">
                            <p class="mb-4">
                                <?php echo $item['name'] ?> By <?php echo $item['brandname'] ?> EDT
                            </p>
                            <div class="w-full flex justify-between items-center">
                                <span class="font-bold text-[#4c5372]">$
                                    <?php echo $item['price'] ?>
                                </span>
                            </div>


                            <?php if ($item['discount']): ?>

                                <div class=" bg-yellow-500 text-white rounded-md px-2 py-1  absolute right-5 z-20 mt-2">
                                    <div class="flex justify-center items-center">
                                        Discount - <span class="text-2xl font-bold">
                                            <?php echo $item['discount'] ?>%
                                        </span>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div
                            class="tiny-box-<?php echo $item['id'] ?> absolute top-[45%] left-[0%] z-30 bg-black text-white text-xs p-1 rounded-md hidden">
                            Copied!
                        </div>

                        <div class="hover-overlay">
                            <div class="w-full h-full flex flex-col justify-center items-center space-y-1">
                                <div class="flex justify-center items-center space-x-1">
                                    <!-- show  -->
                                    <?php
                                    $curmethodmodal = new Curitemid();
                                    $curmethod = $curmethodmodal->getmethod();

                                    ?>
                                    <div class="">
                                        <a href="<?php echo URLROOT; ?>/allfragrance/show/<?php echo $item['id'] . '&' . $curmethod ?>"
                                            class="flex justify-center items-center bg-[#4c5372] text-white hover:opacity-80 rounded-sm px-3 py-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            </svg>
                                        </a>

                                    </div>

                                    <!-- save  -->
                                    <div>
                                        <div
                                            class="flex justify-center items-center bg-[#4c5372] text-white hover:opacity-80 rounded-sm px-3 py-2">

                                            <form action="" id="add_form" method="POST"
                                                class="flex justify-center items-center inline-block">

                                                <button type="submit" name="addtowish_index" id="addtowish">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                                    </svg>

                                                </button>

                                                <input type="hidden" name="addtowish_itemid" value="<?php echo $item['id'] ?>">
                                            </form>
                                        </div>


                                    </div>


                                </div>
                                <div class="flex justify-center items-center space-x-1">
                                    <!-- share  -->
                                    <div>
                                        <div class="flex justify-center items-center bg-[#4c5372] text-white hover:opacity-80 rounded-sm px-3 py-2 copy_link_item"
                                            data-id="<?php echo $item['id'] ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />
                                            </svg>
                                        </div>
                                    </div>
                                    <!-- add to card  -->
                                    <div>

                                        <?php $getallmodal = new Cart();
                                        ?>
                                        <div
                                            class="flex justify-center items-center bg-[#4c5372] <?php echo $getallmodal->hasitem($item['id']) ? 'opacity-50 ' : '' ?>  text-white hover:opacity-80 rounded-sm px-3 py-2">
                                            <form action="" id="add_form" method="POST"
                                                class="flex justify-center items-center inline-block">

                                                <button name="addtocart_index" id="addtocart">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                                    </svg>
                                                </button>

                                                <input type="hidden" name="singleid" value="<?php echo $item['id']; ?>">
                                                <input type="hidden" name="singlebrand"
                                                    value=" <?php echo $item['brand_id'] ?>">
                                                <input type="hidden" name="singleprice" value="<?php echo $item['price']; ?>">
                                                <input type="hidden" name="singlequantity" value="1">


                                                <!-- for cookie  -->
                                                <input type="hidden" name="single_ck_img" value="<?php echo $item['image'] ?>">
                                                <input type="hidden" name="single_ck_name" value="<?php echo $item['name']; ?>">
                                                <input type="hidden" name="single_ck_brand"
                                                    value=" <?php echo $item['brandname'] ?>">

                                            </form>



                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

            <?php endforeach; ?>
        </div>

    <?php endif; ?>





    <div class="py-10">
        <!-- pagination  -->
        <?php
        $newpagination = new Pagination();
        $newpagination->pagination($data);
        ?>

    </div>
</div>

</div>


</div>
</section>


<?php
require_once ('/opt/lampp/htdocs/mvcshop/app/views/layouts/footer.php');
?>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script>
    const sortby = document.getElementById('sortby');

    const options = sortby.children;
    sortby.addEventListener('change', function () {
        sortby.form.submit();

        window.location.href = window.location.href + "&sortby=" + sortby.value;





    })


    const copy_link_items = document.querySelectorAll('.copy_link_item');

    copy_link_items.forEach((element) => {
        element.addEventListener('click', function (event) {
            event.preventDefault();

            const getid = element.getAttribute('data-id');

            const cururl = window.location.href;

            const copylink = cururl.split('?')[0] + '/show/' + getid;
            const tinybox = document.querySelector('.tiny-box-' + getid)

            navigator.clipboard.writeText(copylink)
                .then(() => {
                    tinybox.classList.toggle('hidden')
                    setTimeout(() => {
                        tinybox.classList.toggle('hidden')
                    }, 250);
                })
                .catch((error) => {
                    console.error('Unable to copy link to clipboard:', error);
                });


        });
    });


</script>


</body>

</html>