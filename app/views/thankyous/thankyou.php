<?php

ini_set('display_errors', 0);

require_once ('/opt/lampp/htdocs/mvcshop/app/views/layouts/header.php');
require_once ('/opt/lampp/htdocs/mvcshop/app/views/layouts/navbar.php');


?>



<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>
    <section class="container mx-auto text-[#4c5372] mt-20 mb-20  px-2">
        <div class="w-full flex justify-center items-center mb-20">
            <div class="w-[800px] text-center flex justify-center items-center flex-col space-y-5">
                <h1 class="text-3xl">Thanks For Your Order</h1>
                <span>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                    the
                    industry's standard dummy text ever since the 1500s, </span>
            </div>
        </div>

        <div class="flex justify-between text-lg mb-20">
            <div>
                <p>Order Number</p>
                <span></span>
            </div>
            <div>
                <p>Order Date</p>
                <span></span>
            </div>
        </div>

        <div>

            <?php foreach ($data['cartitems'] as $cartitem): ?>

                <div class="w-full h-full border-b grid md:grid-cols-2 grid-cols-3  md:gap-12 gap-1 py-5">

                    <div
                        class="md:col-span-1 col-span-2 w-full flex items-center b grid md:grid-cols-2 grid-cols-3 md:gap-32 gap-3 ">
                        <div class="md:col-span-1 col-span-2 w-full flex items-center grid grid-cols-2  md:gap-12 gap-2">
                            <!-- img  -->
                            <div class="md:w-[100px] md:h-[100px] w-[75px] h-[75px] border rounded-md bg-gray-500">
                                <img src="<?php echo IMG_ROOT; ?><?php echo $cartitem['image'] ?>" alt="" width="200px">
                            </div>
                            <!-- name  -->
                            <div class="bg-red-00">
                                <div>
                                    <h1 class=""><?php echo $cartitem['itemname'] ?></h1>
                                    <span class="text-slate-400">by <?php echo $cartitem['brandname'] ?> EDT</span>

                                </div>

                            </div>
                        </div>
                        <div class="flex justify-start translate scale-95">
                            <form action="<?php echo URLROOT; ?>/cartsummarys/update" method="POST"
                                class="flex  justify-start items-center space-x-3">

                                <label for="">Qty : </label>


                                <input type="text" name="" id="cart_qty"
                                    class="w-10 text-center rounded-md border border-2 inline-block bg-gray-200 px-2 py-1"
                                    value="<?php echo $cartitem['oquantity'] ?>" min="1">



                                <input type="hidden" name="cart_qty_id" value="<?php echo $cartitem['cartorderid'] ?>">
                            </form>
                        </div>
                    </div>

                    <div class="flex items-center justify-end grid grid-cols-2 md:px-10 px-5 ">
                        <div class="flex md:justify-end justify-start items-center">
                            <!-- price  -->
                            <div class="flex md:justify-end justify-start items-center">
                                <span>$ <?php echo $cartitem['price'] ?></span>
                            </div>

                        </div>
                        <div class="flex md:justify-end justify-start items-center">
                            <!-- total price  -->
                            <div class="flex md:justify-end justify-start items-center ">
                                $ <span class="each_total_price">
                                    <?php echo $cartitem['price'] * $cartitem['oquantity'] ?></span>

                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>


            <div class="w-full h-full  grid md:grid-cols-3 grid-cols-1  gap-12  pb-5 mb-5 ">



                <div class="flex justify-end items-center b grid grid-cols-2 gap-y-5 text-lg px-10 py-5">
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
    </section>


    <?php
    require_once ('/opt/lampp/htdocs/mvcshop/app/views/layouts/footer.php');
    ?>

    <script>
        const cart_removebtns = document.querySelectorAll('.cart_removebtn');
        cart_removebtns.forEach((ele, idx) => {
            ele.addEventListener('click', function () {
                document.getElementById('deletemodal').classList.toggle('hidden')
                const orderid = ele.getAttribute('data-id');

                document.getElementById('delete_id').value = orderid;


            })
        })

        const each_total_prices = document.querySelectorAll('.each_total_price');
        const estimated = document.querySelector('.estimated');

        let totalsum = 0;
        let totaltax = 0;
        let taxrate = 0.08;
        each_total_prices.forEach((ele) => {

            totalsum += parseFloat(ele.textContent);

            console.log(totalsum)
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




        const shippingbtn = document.querySelectorAll('.ships-radio')
        const shipform = document.getElementById('ship-form');
        for (let i = 0; i < shippingbtn.length; i++) {
            shippingbtn[i].addEventListener('change', function () {
                shipform.submit()
            })
        }





    </script>
</body>

</html>