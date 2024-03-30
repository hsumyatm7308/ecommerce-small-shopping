<?php
require_once ('/opt/lampp/htdocs/mvcshop/app/views/layouts/header.php');

?>


<body class="w-srceen bg-[#fffdf6] text-[#4c5372]">


    <section class="w-screen h-screen flex justify-center items-center">
        <div class="w-[500px] border mx-auto p-10 space-y-10">
            <div class="border-b border-b-[#415a77] pb-5 ">
                <h1 class="text-2xl text">Register Form</h1>
            </div>

            <form action="<?php echo URLROOT; ?>/users/register" method="POST" class="space-y-10">
                <div class="text-[#e0e1dd]  space-y-4">

                    <div>
                        <div class="border border-[#778da9] rounded-lg">
                            <label for="fullname"></label>
                            <input type="text" name="fullname" id="fullname"
                                class="w-full bg-transparent rounded-lg text-[#7c7e9d] placeholder:text-[#415a77] focus:bg-transparent focus:ring focus:outline-none p-3 forminputs"
                                placeholder="Hsu Myat Rain" value="<?php echo $data['fullname'] ?>" />
                        </div>
                        <span
                            class="text-xs text-red-100 <?php echo !empty($data['fullnameerr']) ? '' : 'hidden' ?> errmessage">
                            <?php echo $data['fullnameerr'] ?>
                        </span>

                    </div>

                    <div>
                        <div class="border border-[#778da9] rounded-lg">
                            <label for="email"></label>
                            <input type="email" name="email" id="email"
                                class="w-full bg-transparent text-[#7c7e9d] rounded-lg placeholder:text-[#415a77] focus:bg-transparent focus:ring focus:outline-none p-3 forminputs"
                                placeholder="hsumyatrain@gmail.com" value="<?php echo $data['email'] ?>" />
                        </div>
                        <span
                            class="text-xs text-red-100 <?php echo !empty($data['emailerr']) ? '' : 'hidden' ?> errmessage">
                            <?php echo $data['emailerr'] ?>
                        </span>

                    </div>

                    <div>
                        <div class="border border-[#778da9] rounded-lg">
                            <label for="password"></label>
                            <input type="password" name="password" id="password"
                                class="w-full bg-transparent text-[#7c7e9d] rounded-lg placeholder:text-[#415a77] focus:bg-transparent focus:ring focus:outline-none p-3 forminputs"
                                placeholder="Enter your password" value="<?php echo $data['password'] ?>" />
                        </div>
                        <span
                            class="text-xs text-red-100 <?php echo !empty($data['passworderr']) ? '' : 'hidden' ?> errmessage">
                            <?php echo $data['passworderr'] ?>
                        </span>

                    </div>

                    <div>
                        <div class="border border-[#778da9] rounded-lg">
                            <label for="comfirmpassword"></label>
                            <input type="password" name="comfirmpassword" id="comfirmpassword"
                                class="w-full bg-transparent text-[#7c7e9d] rounded-lg placeholder:text-[#415a77] focus:bg-transparent focus:ring focus:outline-none p-3 forminputs"
                                placeholder="Confirm your password" value="<?php echo $data['comfirmpassword'] ?>" />
                        </div>
                        <span
                            class="text-xs text-red-100 <?php echo !empty($data['comfirmpassworderr']) ? '' : 'hidden' ?> errmessage">
                            <?php echo $data['comfirmpassworderr'] ?>
                        </span>
                    </div>



                </div>

                <div class="border-t border-t-[#415a77] pt-5 ">
                    <div class="border border-[#778da9] rounded-lg text-white bg-[#1b263b]">
                        <button type="submit" class="w-full p-3">Register</button>
                    </div>
                </div>
            </form>

            <div class="text-center text-[#778da9]">
                <a href="<?php echo URLROOT; ?>/users/login">Already have an account ? <span
                        class="text-[#4c5372]">Login
                        Here</span></a>
            </div>
        </div>
    </section>
</body>
<!-- 
<script>

    var forminputs = document.querySelectorAll('.forminputs');
    var errmessages = document.querySelectorAll('.errmessage');

    forminputs.forEach((forminput, idx) => {
        forminput.addEventListener('input', function () {
            if (this.value.trim() === '') {
                errmessages[idx].classList.remove('hidden');
            } else {
                errmessages[idx].classList.add('hidden');
            }
        });
    });


</script> -->