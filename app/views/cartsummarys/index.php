<?php

ini_set('display_errors', 0);

require_once ('/opt/lampp/htdocs/mvcshop/app/views/layouts/header.php');
require_once ('/opt/lampp/htdocs/mvcshop/app/views/layouts/navbar.php');
?>




<section class="container mx-auto text-[#4c5372] mt-20  px-2">
    <div class="mb-20">
        <div class="w-full flex flex-col justify-center items-center">
            <h1 class="text-3xl">Your Cart</h1>
            <div class="w-20 h-1 bg-yellow-500"></div>
        </div>

    </div>
    <div class="w-full py-5">

        <div class="w-full h-full font-medium grid grid-cols-2  gap-12 border-b pb-5 mb-5 ">

            <div class="w-full flex items-center b grid grid-cols-2 gap-32 text-lg">
                <div class="w-full flex items-center grid grid-cols-2">
                    <span>Product</span>
                </div>
                <div>
                    Quantity
                </div>
            </div>

            <div class="flex justify-end items-center b grid grid-cols-2 text-lg px-10">
                <div class="flex justify-end items-center">
                    <!-- price  -->
                    <div class="flex justify-end items-center">
                        <span>Price</span>
                    </div>

                </div>
                <div class="flex justify-end items-center">
                    <!-- total price  -->
                    <div class="flex justify-end items-center">
                        <span>Total Price</span>

                    </div>
                </div>
            </div>
        </div>

        <div class="w-full h-full border-b grid grid-cols-2  gap-12 pb-5">

            <div class="w-full flex items-center b grid grid-cols-2 gap-32">
                <div class="w-full flex items-center grid grid-cols-2 gap-12">
                    <!-- img  -->
                    <div class="w-[150px] h-[150px] border bg-gray-500">
                        <img src="" alt="" width="200px">
                    </div>
                    <!-- name  -->
                    <div>
                        <h1>Brit CHANNEl</h1>
                        <span class="text-slate-400">by CK Edt 60 OTD blah 30 OZ</span>

                    </div>
                </div>
                <div>
                    <form action="">
                        <input type="number" class="w-20 rounded-md border border-2 inline-block bg-gray-200 pl-3"
                            value="1" min="1">

                    </form>
                </div>
            </div>

            <div class="flex items-center justify-end grid grid-cols-2 px-10">
                <div class="flex justify-end items-center">
                    <!-- price  -->
                    <div class="flex justify-end items-center">
                        <span>$ 100</span>
                    </div>

                </div>
                <div class="flex justify-end items-center">
                    <!-- total price  -->
                    <div class="flex justify-end items-center">
                        <span>$ 200</span>

                    </div>
                </div>
            </div>
        </div>



        <div class="w-full h-full  grid md:grid-cols-3 grid-cols-1  gap-12  pb-5 mb-5 ">

            <div class="md:col-span-2 col-span-1 w-full flex flex-col justify-center items-start text-lg  py-5">
                <div class="w-full flex items-center">
                    <span class="font-medium">Shipping Method</span>
                </div>

                <div class="mt-5">
                    <form action="">
                        <div class=" flex justify-between py-1">
                            <div class="col-span-3">
                                <input type="radio" name="shipcost" value="0" id="shipcost_free" class="mycheckbox">
                                <label for="shipcost_free">
                                    <span class="text-md font-normal"> Fast shipping </span>
                                </label>
                            </div>
                            <div class="flex justify-center items-center ml-24">
                                <span class="font-medium text-lg">Free</span>
                            </div>
                        </div>

                        <div class=" flex justify-between py-1">
                            <div class="col-span-3">
                                <input type="radio" name="shipcost" value="12" id="shipcost_fast">
                                <label for="shipcost_fast">
                                    <span class="font-normal"> Standard shipping </span>
                                </label>
                            </div>
                            <div class="flex justify-center items-center ml-24">
                                <span class="font-medium">$ 12.00</span>
                            </div>
                        </div>

                        <div class=" flex justify-between py-1">
                            <div class="col-span-3">
                                <input type="radio" name="shipcost" value="25" id="shipcost_fastest">
                                <label for="shipcost_fastest">
                                    <span class="font-normal"> Fastest shipping</span>
                                </label>
                            </div>
                            <div class="flex justify-center items-center ml-24">
                                <span class="font-medium">$ 25.00</span>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

            <div class="flex justify-end items-center b grid grid-cols-2 gap-y-5 text-lg px-10 py-5">
                <div class="flex justify-start items-center">
                    <!-- price  -->
                    <div class="flex justify-end items-center">
                        <span class="font-normal">Subtotal</span>
                    </div>



                </div>
                <div class="flex justify-end items-center">
                    <!-- total price  -->
                    <div class="flex justify-end items-center">
                        <span>$ 100</span>

                    </div>
                </div>

                <div class="flex justify-start items-center">
                    <!-- price  -->
                    <div class="flex justify-end items-center">
                        <span>Sales Tax</span>
                    </div>



                </div>
                <div class="flex justify-end items-center">
                    <!-- total price  -->
                    <div class="flex justify-end items-center">
                        <span>$ 100</span>

                    </div>
                </div>

                <div class="flex justify-start items-center">
                    <!-- price  -->
                    <div class="flex justify-end items-center">
                        <span>Shipping</span>
                    </div>



                </div>
                <div class="flex justify-end items-center">
                    <!-- total price  -->
                    <div class="flex justify-end items-center">
                        <span>$ 100</span>

                    </div>
                </div>

                <div class="col-span-2">
                    <div class="w-full border"></div>
                </div>


                <div class="flex justify-start items-center">
                    <!-- price  -->
                    <div class="flex justify-end items-center">
                        <span>Estimated Total</span>
                    </div>



                </div>
                <div class="flex justify-end items-center">
                    <!-- total price  -->
                    <div class="flex justify-end items-center">
                        <span>$ 100</span>

                    </div>
                </div>



            </div>
        </div>


        <div class="w-full  justify-self-end  text-lg px-10 ">


            <form action="" method="post" class="inline-block w-full flex flex-col items-end justify-center">
                <div class="flex flex-col justify-center items-center">
                    <button type="" id="checkout" name="checkout"
                        class="text-xl w-[400px] h-16 bg-gray-400 text-white flex justify-center items-center border hover:border-2">Checkout</button>

                    <div class="w-full flex justify-center items-center py-3">
                        <a href="" class="w-full flex justify-center items-center inline-block">Continue
                            Shopping</a>
                    </div>
                </div>

            </form>



        </div>
    </div>
</section>