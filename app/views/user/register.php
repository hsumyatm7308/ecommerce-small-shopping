<?php require APPROOT . '/views/layouts/header.php'; ?>



<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
</head>

<body>

    <section class="w-screen h-screen flex justify-center items-center">
        <div class="w-[500px] border mx-auto p-10 space-y-10">
            <div class="border-b border-b-[#415a77] pb-5 ">
                <h1 class="text-2xl text-white">Register Form</h1>
            </div>

            <form action="http://localhost/mvc/mvcdashboard/user/register" method="POST" class="space-y-10">
                <div class="text-[#e0e1dd]  space-y-4">

                    <div class="border border-[#778da9] rounded-lg">
                        <label for="fullname"></label>
                        <input type="text" name="fullname" id="fullname"
                            class="w-full bg-transparent rounded-lg placeholder:text-[#415a77] focus:bg-transparent focus:ring focus:outline-none p-3"
                            placeholder="Hsu Myat Rain" />
                    </div>

                    <div class="border border-[#778da9] rounded-lg">
                        <label for="email"></label>
                        <input type="email" name="email" id="email"
                            class="w-full bg-transparent rounded-lg placeholder:text-[#415a77] focus:bg-transparent focus:ring focus:outline-none p-3"
                            placeholder="hsumyatrain@gmail.com" />
                    </div>


                    <div class="border border-[#778da9] rounded-lg">
                        <label for="password"></label>
                        <input type="password" name="password" id="password"
                            class="w-full bg-transparent rounded-lg placeholder:text-[#415a77] focus:bg-transparent focus:ring focus:outline-none p-3"
                            placeholder="Enter your password" />
                    </div>

                    <div class="border border-[#778da9] rounded-lg">
                        <label for="comfirmpassword"></label>
                        <input type="password" name="comfirmpassword" id="comfirmpassword"
                            class="w-full bg-transparent rounded-lg placeholder:text-[#415a77] focus:bg-transparent focus:ring focus:outline-none p-3"
                            placeholder="Comfirm your password" />
                    </div>


                </div>

                <div class="border-t border-t-[#415a77] pt-5 ">
                    <div class="border border-[#778da9] rounded-lg text-white bg-[#1b263b]">
                        <button class="w-full p-3">Register</button>
                    </div>
                </div>
            </form>

            <div class="text-center text-[#778da9]">
                <a href="<?php echo URLROOT; ?>/user/login">Already have an account ? Login Here</a>
            </div>
        </div>
    </section>

</body>

</html>

<?php require APPROOT . '/views/layouts/footer.php'; ?>