<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <link rel="stylesheet" href="auth.css">
    <meta name="description" content="Login">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap"
        rel="stylesheet">
</head>
<style>
    body {
        font-family: "Playfair Display", serif;
        font-optical-sizing: auto;
        font-weight: weight;
        font-style: normal;
        padding: 0;
        margin: 0;

    }

    .container {
        width: 100%;
        height: 100vh;
        background-color: #ffff;
        display: grid;
        grid-template-columns: 3fr 3fr;
        padding: 0;
        margin: 0;
    }

    .welcome {
        width: 100%;
        height: 100vh;
        background-image: url("../public/img/banner/authpage.jpg");
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        position: relative;
    }

    .welcome>.transparent {
        width: 100%;
        height: 100vh;
        background-image: linear-gradient(#001010, #0001);

        display: flex;
        justify-content: center;
        align-items: start;

        position: absolute;
        left: 0;
        top: 0;
    }

    .start_line {
        width: 35px;
        height: 2px;
        background-color: yellow;
    }

    .text1 {
        color: #efe0e0;
        font-size: 40px;
        margin-top: 100px;
    }

    .text2 {
        color: #efe0e0;
        font-size: 20px;
    }

    .login {
        width: 100%;
        height: 100vh;
        background-color: #ebf0f0;
        display: flex;
        justify-content: center;
        align-items: center;

    }

    .loginForm_ctn {
        width: 500px;
        height: 570px;
        border: solid 0.5px rgb(120, 120, 196);
        display: inline-block;
        justify-content: center;
        align-items: center;
        border-radius: 5px;
    }

    .loginForm_ctn2 {
        width: 100%;
        height: 90%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .loginForm {
        padding: 10px;
    }

    .form_inputs {
        margin: 15px;
    }

    #emailvalid,
    #pwvalid,
    #checkpw {
        display: none;
    }

    .login_h2,
    .register_h2 {
        width: 100%;
        height: 40px;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 50px;
        margin-top: -50px;
    }

    .login_h2>h2,
    .register_h2>h2 {
        font-size: 40px;
        font-weight: lighter;
    }



    .form_inputs>label>input {
        width: 350px;
        height: 35px;
        padding: 3px 8px;
        border-radius: 5px;
        border: solid rgb(120, 120, 196) 1px;
    }

    .form_inputs>label>input:focus {
        outline: 1px;
    }

    .forget_psw_btn {
        padding: 3px 5px;
        display: flex;
        justify-content: space-between;
        margin-top: -10px;

    }

    .loginregister_btn {
        width: 370px;
        height: 40px;
        color: #f4f4f4;
        background-color: rgb(120, 120, 196);
        border: none;
        border-radius: 5px;
        padding: 5px 8px;
        margin-top: 10px;
    }

    .loginregister_btn:hover {
        background-color: rgb(121, 121, 179);
    }

    .form_inputs>label>.error_alert_border {
        /* border-color: red; */
        border: solid rgb(120, 120, 196) 1px;

    }

    .psw_invalid_hide {
        display: none;
    }

    .psw_open_eye {
        display: none;
    }
</style>

<body>
    <div class="container">
        <div class="welcome">
            <div class="transparent">
                <div>
                    <h2 class="text1">
                        <div class="start_line"></div>
                        Welcome <span style="color: yellow;">.</span>
                    </h2>
                    <span class="text2">Fill with your wish with us</span>
                </div>

            </div>
        </div>

        <div class="login">
            <div class="loginForm_ctn">
                <div class="loginForm_ctn2">
                    <form action="" class="loginForm" enctype="multipart/form-data" method="post">

                        <div class="register_h2">
                            <h2>Login</h2>
                        </div>

                        <div class="form_inputs">
                            <label for="">
                                <span>Email</span><br>
                                <input type="email" placeholder="email" name="email" value=""
                                    class="error_alert_border">
                            </label>
                            <br>
                            <span class="emailvalid " id="emailvalid" style="color: red; font-size: 13px;">
                                email is incorrect.</span>
                        </div>
                        <div class="form_inputs">
                            <label for="" style="position: relative;">
                                <span>Password</span><br>
                                <input type="password" placeholder="password" name="password" id="password"
                                    value="1Aa@23456" class="error_alert_border">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6 psw_open_eye"
                                        style="width: 15px; position:absolute;right:15px; top:33px;">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6 psw_close_eye"
                                        style="width: 15px; position:absolute;right:15px; top:33px;">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                                    </svg>
                                </span>

                            </label>
                                <span class="pwvalid " id="pwvalid" style="color: red; font-size: 13px;">
                                password is incorrect.</span>
                            <br>
                            <span>Forget password</span>

                        </div>

                        <div class="form_inputs">
                            <label for="">
                                <button type="button" class="loginregister_btn">Login</button>
                            </label>
                        </div>
                    </form>
                </div>



                <div style="font-size: 13px; display: flex; justify-content: center; align-items: center;">
                    <span>Don't you have an account? <a href="">Register</a></span>
                </div>
            </div>

        </div>
    </div>

    <script>


        const password = document.getElementById("password");

        // show and hide password
        document.addEventListener("DOMContentLoaded", () => {
            const psw_open_eye = document.querySelectorAll('.psw_open_eye');
            const psw_close_eye = document.querySelectorAll('.psw_close_eye');
            const passwordFields = [
                document.getElementById("password")
            ];

            passwordFields.forEach((input, idx) => {
                const openEye = psw_open_eye[idx];
                const closeEye = psw_close_eye[idx];

                // Show password
                closeEye.addEventListener("click", () => {
                    input.setAttribute("type", "text");
                    closeEye.style.display = "none";
                    openEye.style.display = "inline";
                });

                // Hide password
                openEye.addEventListener("click", () => {
                    input.setAttribute("type", "password");
                    openEye.style.display = "none";
                    closeEye.style.display = "inline";
                });
            });
        });



        // all rules are completed ?
        document.addEventListener("DOMContentLoaded", () => {
            var inputs = document.getElementsByTagName('input');
            let loginregister_btn = document.querySelector(".loginregister_btn");
            let emailvalid = document.querySelector('.emailvalid');

            loginregister_btn.addEventListener("click", () => {
                for (var i = 0; i < inputs.length; i++) {
                    if (!inputs[i].value.trim() == "") {
                        inputs[i].style.border = "1px solid rgb(120, 120, 196)";
                    } else {
                        inputs[i].style.border = "1px solid red";
                    }

                }

                // fetch api
                const data = {
                    email: safeInput("email"),
                };
            

                fetch("http://localhost/perfumesite/mvcshop/users/login", {
                    method: "POST",
                    headers: { "Content-Type": "application/json" },
                    body: JSON.stringify(data),
                })
                    .then(res => res.json())
                    .then(res => {
                        if (res.challenge == false) {
                            emailvalid.style.display = 'block';
                        } 
                        else if (res.status == 'success') {
                            console.log(res);
                            const ccode = res.challenge.challenge;
                            handleLogin(ccode);
                        }

                    }

                    )
                    .catch(err => console.error("Fetch error:", err));

            });

        })

        // Handle Login 
        async function handleLogin(ccode){
            const password = safeInput("password");
            const pw_sha = await sha256(password);
            const challenge = pw_sha + ccode;
            const response = await sha256(challenge);
            const pwvalid = document.querySelector('#pwvalid');

            const data = {
                email: safeInput("email"),
                pw_sha: pw_sha,        
                res_code: response
            };

            fetch("http://localhost/perfumesite/mvcshop/users/verifyChallenge", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify(data),
            })
            .then(res => res.json())
            .then(res => {
                if(res.status == false){
                    console.log('hh')
                    pwvalid.style.display = 'block';
                }
            })
        }


        // input sanitization
        function encodeHTML(str) {
            return str.replace(/[&<>"']/g, function (char) {
                const entities = {
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                '"': '&quot;',
                "'": '&#39;'
                };
                return entities[char];
            });
        }

        function safeInput(name) {
            const el = document.querySelector(`input[name='${name}']`);
            return encodeHTML(el.value.trim());
        }

        // Web Crypto 
        async function sha256(message) {
            const msgBuffer = new TextEncoder().encode(message);
            const hashBuffer = await crypto.subtle.digest("SHA-256", msgBuffer);
            const hashArray = Array.from(new Uint8Array(hashBuffer));
            return hashArray.map(b => b.toString(16).padStart(2, '0')).join('');
        }


    </script>

</body>

</html>