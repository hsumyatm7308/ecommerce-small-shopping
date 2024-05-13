<?php

ini_set('display_errors', 0);

require_once ('/opt/lampp/htdocs/mvcshop/app/views/layouts/header.php');
require_once ('/opt/lampp/htdocs/mvcshop/app/views/layouts/navbar.php');
?>


<section class="container mx-auto text-[#4c5372] mt-20 mb-20 px-2 py-10">
    <div class="grid grid-cols-2 gap-12">
        <!-- sign in  -->
        <div id="signin" class="w-full mx-auto p-10 space-y-10">
            <div class="border-b border-b-[#415a77] pb-5 ">
                <h1 class="text-2xl text">Log In</h1>
            </div>

            <form action="" method="POST" class="space-y-10">
                <div class="space-y-4">



                    <div>
                        <label for="email" class="font-medium">Email</label>
                        <div class="border border-[#4c5372] rounded-lg mt-3">
                            <input type="email" name="email" id="email"
                                class="w-full bg-transparent rounded-lg placeholder:text-[#415a77] focus:bg-transparent focus:ring focus:outline-none p-3 forminputs"
                                placeholder="Your Email" value="<?php echo $data['email'] ?>" />
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


                <div class="pt-5 mt-5 ">
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
                <div class="text-center  mt-20 change_mode">
                    <button>Don't you have an account ? <span class="font-medium">Register
                            Here</span></button>
                </div>

            </form>
        </div>


        <!-- register  -->
        <div id="register" class="w-full mx-auto p-10 space-y-10 hidden">
            <div class="border-b border-b-[#415a77] pb-5 ">
                <h1 class="text-2xl text">Register </h1>
            </div>

            <form action="" method="POST" class="space-y-10">
                <div class="  space-y-4">


                    <div>
                        <label for="fullname" class="font-medium">Name</label>

                        <div class="border border-[#4c5372] rounded-lg mt-3">
                            <input type="text" name="fullname" id="fullname"
                                class="w-full bg-transparent rounded-lg placeholder:text-[#415a77] focus:bg-transparent focus:ring focus:outline-none p-3 forminputs"
                                placeholder="Enter your password" value="<?php echo $data['fullname'] ?>" />
                        </div>
                        <span
                            class="text-xs text-red-500 <?php echo !empty($data['fullnameerr']) ? '' : 'hidden' ?> errmessage">
                            <?php echo $data['fullnameerr'] ?>
                        </span>

                    </div>


                    <div>
                        <label for="r_email" class="font-medium">Email</label>
                        <div class="border border-[#4c5372] rounded-lg mt-3">
                            <input type="email" name="r_email" id="r_email"
                                class="w-full bg-transparent rounded-lg placeholder:text-[#415a77] focus:bg-transparent focus:ring focus:outline-none p-3 forminputs"
                                placeholder="Enter your email" value="<?php echo $data['r_email'] ?>" />
                        </div>
                        <span
                            class="text-xs text-red-500 <?php echo !empty($data['r_emailerr']) ? '' : 'hidden' ?> errmessage">
                            <?php echo $data['r_emailerr'] ?>
                        </span>

                    </div>

                    <div>
                        <label for="r_password" class="font-medium">Password</label>

                        <div class="border border-[#4c5372] rounded-lg mt-3">
                            <input type="password" name="r_password" id="r_password"
                                class="w-full bg-transparent rounded-lg placeholder:text-[#415a77] focus:bg-transparent focus:ring focus:outline-none p-3 forminputs"
                                placeholder="Enter your password" value="<?php echo $data['r_password'] ?>" />
                        </div>
                        <span
                            class="text-xs text-red-500 <?php echo !empty($data['r_passworderr']) ? '' : 'hidden' ?> errmessage">
                            <?php echo $data['r_passworderr'] ?>
                        </span>

                    </div>

                    <div>
                        <label for="comfirmpassword" class="font-medium">Comfirm</label>

                        <div class="border border-[#4c5372] rounded-lg mt-3">
                            <input type="password" name="comfirmpassword" id="comfirmpassword"
                                class="w-full bg-transparent rounded-lg placeholder:text-[#415a77] focus:bg-transparent focus:ring focus:outline-none p-3 forminputs"
                                placeholder="Comfirm your password" value="<?php echo $data['comfirmpassword'] ?>" />
                        </div>
                        <span
                            class="text-xs text-red-100 <?php echo !empty($data['comfirmpassworderr']) ? '' : 'hidden' ?> errmessage">
                            <?php echo $data['comfirmpassworderr'] ?>
                        </span>

                    </div>




                </div>

                <div class="border-t border-t-[#415a77] pt-5 ">
                    <div class="border border-[#778da9] rounded-lg text-white bg-[#1b263b]">
                        <button type="submit" name="checkregister" class="w-full p-3">Register</button>
                    </div>
                </div>
            </form>

            <div class="text-center text-[#778da9] change_mode">
                <button>Already have an account ? <span class="text-[#4c5372]">Login Here</span></button>
            </div>
        </div>



        <!-- guest  -->
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

<script>
    const change_modes = document.querySelectorAll('.change_mode');
    change_modes.forEach((ele, idx) => {
        ele.addEventListener('click', (e) => {
            e.preventDefault();

            if (idx == 0) {
                window.location.href = "http://localhost/mvcshop/checkouts/authcheck?register";

            } else if (idx == 1) {
                window.location.href = "http://localhost/mvcshop/checkouts/authcheck?signin";

            }
        });
    });

    const cururl = window.location.href;
    if (cururl.includes('signin')) {
        document.getElementById('register').classList.add('hidden');
        document.getElementById('signin').classList.remove('hidden');
    } else if (cururl.includes('register')) {
        document.getElementById('signin').classList.add('hidden');
        document.getElementById('register').classList.remove('hidden');
    }
</script>



<?php
require_once ('/opt/lampp/htdocs/mvcshop/app/views/layouts/footer.php');
?>

<!-- console cloud google -->