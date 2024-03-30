<?php
require_once ('/opt/lampp/htdocs/mvcshop/app/views/layouts/header.php');

?>

<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
</head>

<body class="w-srceen bg-[#fffdf6] text-[#4c5372]">

    <section class="w-screen h-screen flex justify-center items-center">
        <div class="w-[500px] border mx-auto p-10 space-y-10">
            <div class="border-b border-b-[#415a77] pb-5 ">
                <h1 class="text-2xl text-">Login Form</h1>
            </div>

            <form action="<?php echo URLROOT; ?>/users/login" method="POST" class="space-y-10">
                <div class="text-[#e0e1dd]  space-y-4">



                    <div>
                        <div class="border border-[#778da9] rounded-lg">
                            <label for="email"></label>
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
                        <div class="border border-[#778da9] rounded-lg">
                            <label for="password"></label>
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

                <div class="border-t border-t-[#415a77] pt-5 ">
                    <div class="border border-[#778da9] rounded-lg text-white bg-[#1b263b]">
                        <button type="submit" class="w-full p-3">Login</button>
                    </div>
                </div>
            </form>

            <div class="text-center text-[#778da9]">
                <a href="<?php echo URLROOT; ?>/users/register">Already have an account ? <span
                        class="text-white">Register
                        Here</span></a>
            </div>
        </div>
    </section>

</body>

</html>

<?php require APPROOT . '/views/layouts/footer.php'; ?>