<div>
    <div class="w-full border-2 border-gray-200 rounded-md px-5">
        <div class="py-5">
            <h1 class="text-2xl">Order Summary</h1>
        </div>
        <?php foreach ($data['cartitems'] as $cartitem): ?>
            <div class="w-full h-full border-b grid grid-cols-4 gap-5 py-5">

                <div class="col-span-3 w-full flex  items-center gap-2">
                    <!-- img  -->
                    <div class="w-full flex justify-center items-center grid grid-cols-2">
                        <div class="w-[75px] h-[75px] border bg-gray-500">
                            <img src="<?php echo IMG_ROOT; ?><?php echo $cartitem['image'] ?>" alt="" width="200px">
                        </div>

                        <!-- name  -->
                        <div class="">
                            <h1 class=""><?php echo $cartitem['itemname'] ?></h1>
                            <span class="text-slate-400 text-xs">by
                                <?php echo $cartitem['brandname'] ?>
                                EDT</span>
                        </div>


                    </div>

                    <!-- qty  -->
                    <div class="scale-75">
                        <form action="<?php echo URLROOT; ?>/checkouts/update" method="POST"
                            class="flex justify-start items-center">

                            <div>
                                <button type="submit" name="qty_decrease" id="qty_decrease"
                                    class="border rounded-md px-2 py-1 m-1 increase hover:bg-gray-200">
                                    <i class="fa-solid fa-chevron-down text-gray-300 hover:text-gray-500"></i>
                                </button>
                                <input type="hidden" name="cart_qty_dec" value="<?php echo $cartitem['oquantity'] - 1 ?>">

                            </div>

                            <input type="text" name="" id="cart_qty"
                                class="w-10 text-center rounded-md border border-2 inline-block bg-gray-200 px-2 py-1"
                                value="<?php echo $cartitem['oquantity'] ?>" min="1">

                            <div>
                                <button type="submit" name="qty_increase" id="qty_increase"
                                    class="border rounded-md px-2 py-1 m-1 increase hover:bg-gray-200">
                                    <i class="fa-solid fa-chevron-up text-gray-300 hover:text-gray-500"></i>
                                </button>
                                <input type="hidden" name="cart_qty_inc" id="cart_qty_inc"
                                    value="<?php echo $cartitem['oquantity'] + 1 ?>">
                            </div>

                            <input type="hidden" name="cart_qty_id" value="<?php echo $cartitem['cartorderid'] ?>">
                        </form>
                    </div>
                </div>


                <div class="flex items-center justify-center md:px-10 px-5 space-x-3">

                    <div class="flex md:justify-end justify-start items-center">

                        <div class="flex md:justify-end justify-start items-center ">
                            $ <span class="">
                                <?php echo $cartitem['price'] ?></span>

                        </div>
                    </div>


                    <div class="flex justify-center items-center">

                        <button type="button" name="cart_removebtn" id="cart_removebtn"
                            data-id="<?php echo $cartitem['cartorderid'] ?>" class="cart_removebtn"><i
                                class="fa-regular fa-circle-xmark"></i></button>
                    </div>

                </div>


                <div class="flex md:justify-end justify-start items-center hidden">
                    <!-- total price  -->
                    <div class="flex md:justify-end justify-start items-center ">
                        $ <span class="each_total_price">
                            <?php echo $cartitem['price'] * $cartitem['oquantity'] ?></span>

                    </div>
                </div>



            </div>
        <?php endforeach; ?>


        <div class="w-full h-full    pb-5 mb-5 ">



            <div class="flex justify-end items-center b grid grid-cols-2 gap-y-5 text-lg px-5 py-5">
                <div class="flex justify-start items-center">
                    <!-- subtotal  -->
                    <div class="flex justify-end items-center">
                        <span class="font-normal">Subtotal</span>
                    </div>



                </div>
                <div class="flex justify-end items-center">
                    <!-- subtotal price  -->
                    <div class="flex justify-end items-center">
                        $<span class="subtotalprice"> </span>

                    </div>
                </div>

                <div class="flex justify-start items-center">
                    <!-- sale tax  -->
                    <div class="flex justify-end items-center">
                        <span>Sales Tax</span>
                    </div>



                </div>
                <div class="flex justify-end items-center">
                    <!-- sale tax   -->
                    <div class="flex justify-end items-center">
                        $<span class="saletax"> </span>

                    </div>
                </div>

                <div class="flex justify-start items-center">
                    <!-- shipping  -->
                    <div class="flex justify-end items-center">
                        <span>Shipping</span>
                    </div>



                </div>
                <div class="flex justify-end items-center">
                    <!-- shipping  -->
                    <div class="flex justify-end items-center">
                        $<span class="shippingcost">
                            <?php echo ($data['shipmethod']['method'] == 0 ? 0 : (($data['shipmethod']['method'] == 1) ? 12 : (($data['shipmethod']['method'] == 2) ? 25 : ''))); ?>
                    </div>
                </div>

                <div class="col-span-2">
                    <div class="w-full border"></div>
                </div>


                <div class="flex justify-start items-center">
                    <!-- estimate  -->
                    <div class="flex justify-end items-center">
                        <span>Estimated Total</span>
                    </div>



                </div>
                <div class="flex justify-end items-center">
                    <!-- estimate price  -->
                    <div class="flex justify-end items-center">
                        $<span class="estimated font-medium text-2xl"></span>

                    </div>
                </div>



            </div>
        </div>




    </div>

    <div class="w-full  text-lg mt-5">
        <div class="w-full flex justify-center items-center">
            <form action="" method="post" class="w-full inline-block ">
                <button type="" id="complete_order" name="complete_order"
                    class="text-xl w-full h-14 bg-[#4c5372] text-white flex justify-center items-center rounded-md border hover:border-2">Complete
                    Order</button>
            </form>
        </div>
    </div>

</div>

<script type="text/javascript">
    const each_total_prices = document.querySelectorAll('.each_total_price');
    const estimated = document.querySelector('.estimated');

    let totalsum = 0;
    let totaltax = 0;
    let taxrate = 0.08;
    each_total_prices.forEach((ele) => {

        totalsum = totalsum + parseFloat(ele.textContent);

        const productprice = parseFloat(ele.textContent);
        document.querySelector('.saletax').innerHTML = caculatesaletax(productprice, taxrate);

        estimated.innerHTML = totalsum + parseFloat(document.querySelector('.saletax').innerHTML) + parseFloat(document.querySelector('.shippingcost').textContent)


    })

    document.querySelector('.subtotalprice').innerHTML = totalsum;


    function caculatesaletax(productprice, taxrate) {
        const taxamount = productprice * taxrate;
        totaltax += taxamount;

        return totaltax.toFixed(2);
    }

</script>