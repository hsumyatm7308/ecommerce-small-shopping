<?php

ini_set('display_errors', 0);

require_once ('/opt/lampp/htdocs/mvcshop/app/views/layouts/header.php');
require_once ('/opt/lampp/htdocs/mvcshop/app/views/layouts/navbar.php');
?>

<section class="container mx-auto text-[#4c5372] mt-20 mb-20  px-2">
    <div>
        <div class="grid grid-cols-2 gap-14">
            <div class="">
                <div class="mb-10">
                    <h1 class="text-2xl font-medium">Sign In</h1>
                </div>

                <form action="<?php echo URLROOT; ?>/users/login" method="POST" class="space-y-10">
                    <div class="space-y-8">



                        <div>
                            <label for="email" class="font-medium">Email</label>
                            <div class="border border-[#4c5372] rounded-lg mt-3">
                                <input type="email" name="email" id="email"
                                    class="w-full bg-transparent rounded-lg placeholder:text-[#415a77] focus:bg-transparent focus:ring focus:outline-none p-3 forminputs"
                                    placeholder="hsumyatrain@gmail.com" value="<?php echo $data['email'] ?>" />
                            </div>
                            <span
                                class="text-xs text-red-100 <?php echo !empty($data['emailerr']) ? '' : 'hidden' ?> errmessage">
                                <?php echo $data['emailerr'] ?>
                            </span>

                        </div>

                        <div>
                            <label for="password" class="font-medium">Password</label>

                            <div class="border border-[#4c5372] rounded-lg mt-3">
                                <input type="password" name="password" id="password"
                                    class="w-full bg-transparent rounded-lg placeholder:text-[#415a77] focus:bg-transparent focus:ring focus:outline-none p-3 forminputs"
                                    placeholder="Enter your password" value="<?php echo $data['password'] ?>" />
                            </div>
                            <span
                                class="text-xs text-red-100 <?php echo !empty($data['passworderr']) ? '' : 'hidden' ?> errmessage">
                                <?php echo $data['passworderr'] ?>
                            </span>

                        </div>




                    </div>

                    <div class="pt-5 ">
                        <button type="" id="shipping_ctn" name="shipping_ctn"
                            class="text-xl w-full h-14 bg-[#4c5372] text-white flex justify-center items-center border hover:border-2 rounded-md">Sign
                            In</button>
                    </div>


                    <div class="border-t border-t-[#415a77] pt-5 space-y-5">
                        <button type="" id="shipping_ctn" name="shipping_ctn"
                            class="text-normal w-full h-14  bg-yellow-500 flex justify-center items-center border hover:border-2 rounded-md">
                            <i class="fa-brands fa-google"></i>
                            <span class="ml-3">Google</span>
                        </button>


                        <button type="" id="shipping_ctn" name="shipping_ctn"
                            class="text-normal w-full h-14 bg-blue-500 text-white flex justify-center items-center border hover:border-2 rounded-md">
                            <i class="fa-brands fa-facebook"></i>
                            <span class="ml-3">Facebook</span>
                        </button>
                    </div>


                </form>
            </div>

            <div>
                <div class="mb-10">
                    <h1 class="text-2xl font-medium">Guest Checkout</h1>
                </div>
                <div>
                    <div class="w-[70%]">
                        <span>
                            You can checkout without creating an account. You will have a chance to create an account
                            later.
                        </span>


                        <div class="pt-5 ">
                            <button type="" id="shipping_ctn" name="shipping_ctn"
                                class="text-xl w-full h-14 bg-[#4c5372] text-white flex justify-center items-center border hover:border-2 rounded-md">Sign
                                In</button>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>