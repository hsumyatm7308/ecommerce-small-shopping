<?php
    require_once ('/Applications/XAMPP/htdocs/perfumesite/mvcshop/app/views/layouts/header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP</title>
</head>
<body>
    <section class="w-full h-[100vh] bg-gray-200 flex justify-center items-center">
        <div class="w-[600px] h-[500px] bg-gray-100 rounded-lg px-10 py-5">
            <h3 class="text-cyan-800 text-2xl mb-4">OTP Verification</h3>
            <span class="text-gray-500">Please enter the OTP [One Time Password] sent to your
                registered email number to commplete your verification. </span>
            
            <div class="w-full flex justify-center mt-10">
                <input type="text" maxlength="1" class="w-14 h-14 shadow rounded-lg p-5 m-2 focus:outline focus:border focus:border-cyan-200" value="" >
                <input type="text" maxlength="1" class="w-14 h-14 shadow rounded-lg p-5 m-2 focus:outline focus:border focus:border-cyan-200"  value="">
                <input type="text" maxlength="1" class="w-14 h-14 shadow rounded-lg p-5 m-2 focus:outline focus:border focus:border-cyan-200" value="">
                <input type="text" maxlength="1" class="w-14 h-14 shadow rounded-lg p-5 m-2 focus:outline focus:border focus:border-cyan-200" value="">
                <input type="text" maxlength="1" class="w-14 h-14 shadow rounded-lg p-5 m-2 focus:outline focus:border focus:border-cyan-200" value="">
                <input type="text" maxlength="1" class="w-14 h-14 shadow rounded-lg p-5 m-2 focus:outline focus:border focus:border-cyan-200" value="">
            </div>

            <div class="w-full text-center mt-5">
                <p class="text-cyan-800">00:00</p>
                <p class="text-gray-500">Resent OTP code</p>
                <span class="text-xs text-red-500">You tried to attempt over 3 times</span>
            </div>
            <div class="w-full flex justify-center mt-14">
                <button class="w-full bg-cyan-700 text-gray-200 rounded-md py-2">Next</button>
            </div>
        </div>
    </section>
    <script>
        const inputs = document.querySelectorAll("input");
        console.log(inputs)
        inputs.forEach((input, index) => {
            input.addEventListener('input', (e) => {
                const value = e.target.value;

                // Move to next box when typing a digit
                if (value.length === 1 && index < inputs.length - 1) {
                inputs[index + 1].focus();
                }
                
                // Move to previous box when deleting
                if (value.length === 0 && index > 0 && e.inputType === 'deleteContentBackward') {
                inputs[index - 1].focus();
                }
                
            });
        });
    </script>
</body>
</html>