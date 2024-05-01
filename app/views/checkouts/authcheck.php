<?php

ini_set('display_errors', 0);

require_once ('/opt/lampp/htdocs/mvcshop/app/views/layouts/header.php');
require_once ('/opt/lampp/htdocs/mvcshop/app/views/layouts/navbar.php');
?>


<section class="container mx-auto text-[#4c5372] mt-20 mb-20 px-2 py-10">
    <div class="grid grid-cols-2 gap-12">
        <div class="w-full">
            <div class="mb-10">
                <h1 class="text-2xl font-medium">Sign In</h1>
            </div>

            <form action="" method="POST" class="">
                <div class="space-y-8">



                    <div>
                        <label for="email" class="font-medium">Email</label>
                        <div class="border border-[#4c5372] rounded-lg mt-3">
                            <input type="email" name="email" id="email"
                                class="w-full bg-transparent rounded-lg placeholder:text-[#415a77] focus:bg-transparent focus:ring focus:outline-none p-3 forminputs"
                                placeholder="hsumyatrain@gmail.com" value="<?php echo $data['email'] ?>" />
                        </div>
                        <span
                            class="text-xs text-red-500 <?php echo !empty($data['emailerr']) ? '' : 'hidden' ?> errmessage">
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
                            class="text-xs text-red-500 <?php echo !empty($data['passworderr']) ? '' : 'hidden' ?> errmessage">
                            <?php echo $data['passworderr'] ?>
                        </span>

                    </div>


                    <div class="flex justify-between items-center">
                        <div>
                            <a href="">Forget password</a>

                        </div>

                    </div>


                </div>


                <div class="pt-5 mt-5">
                    <button type="submit" id="" name="authchecksubmit"
                        class="text-xl w-full h-14 bg-[#4c5372] text-white flex justify-center items-center border hover:border-2 rounded-md">Sign
                        In</button>
                </div>





                <div class="border-t border-t-[#415a77] pt-5 space-y-5 mt-10">

                    <button type="" id="googlelogin" name="googlelogin"
                        class="text-normal w-full h-14  bg-yellow-500 flex justify-center items-center border hover:border-2 rounded-md">
                        <i class="fa-brands fa-google"></i>
                        <span class="ml-3">Google</span>
                    </button>





                    <button type="" id="facebooklogin" name="facebooklogin"
                        class="text-normal w-full h-14 bg-blue-500 text-white flex justify-center items-center border hover:border-2 rounded-md">


                        <i class="fa-brands fa-facebook"></i>
                        <span class="ml-3">Facebook</span>
                    </button>
                </div>
                <div class="text-start  mt-20">
                    <a href="<?php echo URLROOT; ?>/users/register">Don't you have an account ? <span
                            class="font-medium">Register
                            Here</span></a>
                </div>

            </form>
        </div>


        <div class="w-full flex flex-col justify-center items-center border-l-2 ">
            <div class="mb-10">
                <h1 class="text-2xl font-medium">Guest Checkout</h1>
            </div>
            <div class="w-full flex justify-center items-center">
                <div class="w-[70%] ">
                    <span>
                        You can checkout without creating an account. You will have a chance to create an account
                        later.
                    </span>


                    <div class="pt-5 ">
                        <button type="" id="shipping_ctn" name="shipping_ctn"
                            class="text-xl w-full h-14 bg-[#4c5372] text-white flex justify-center items-center border hover:border-2 rounded-md">
                            Checkout As Guest
                        </button>
                    </div>
                </div>
            </div>

        </div>

    </div>



</section>



<?php
require_once ('/opt/lampp/htdocs/mvcshop/app/views/layouts/footer.php');
?>

<!-- console cloud google -->