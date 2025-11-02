<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <meta name="description" content="Register">
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

    .register {
        width: 100%;
        height: 100vh;
        background-color: #ebf0f0;
        display: flex;
        justify-content: center;
        align-items: center;

    }

    .registerForm_ctn {
        width: 500px;
        height: 800px;
        border: solid 0.5px rgb(120, 120, 196);
        display: inline-block;
        justify-content: center;
        align-items: center;
        border-radius: 5px;
    }

    .registerForm_ctn2 {
        width: 100%;
        height: 90%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .registerForm {
        padding: 10px;
    }

    .form_inputs {
        margin: 15px;
    }

    #emailvalid {
        display: none;
    }

    .register_h2,
    .register_h2 {
        width: 100%;
        height: 40px;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 50px;
        margin-top: -50px;
    }

    .register_h2>h2,
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

    .registerregister_btn {
        width: 370px;
        height: 40px;
        color: #f4f4f4;
        background-color: rgb(120, 120, 196);
        border: none;
        border-radius: 5px;
        padding: 5px 8px;
        margin-top: 10px;

    }

    .registerregister_btn:hover {
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

        <div class="register">
            <div class="registerForm_ctn">
                <div class="registerForm_ctn2">
                    <form action="" class="registerForm" enctype="multipart/form-data" method="post">

                        <div class="register_h2">
                            <h2>Register</h2>
                        </div>
                        <div class="form_inputs ">
                            <label for="">
                                <span>Username</span><br>

                                <input type="text" placeholder="username" name="username" value=""
                                    class="error_alert_border" autofocus>

                            </label>
                        </div>
                        <div class="form_inputs">
                            <label for="">
                                <span>Email</span><br>
                                <input type="email" placeholder="email" name="email" value=""
                                    class="error_alert_border">
                            </label>
                            <br>
                            <span class="emailvalid " id="emailvalid" style="color: red; font-size: 13px;">Email
                                is already exist.</span>
                        </div>
                        <div class="form_inputs">
                            <label for="" style="position: relative;">
                                <span>Password</span><br>
                                <input type="password" placeholder="password" name="password" id="password" value="1Aa@23456"
                                    class="error_alert_border">
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
                            <br>
                            <div class="psw_invalid_ctn psw_invalid_hide">
                                <span class="psw_invalid_txt " id="specialchar"
                                    style="color: red; font-size: 13px;">Specialcase
                                    character</span>
                                <br>
                                <span class="psw_invalid_txt" id="upperchar"
                                    style="color: red; font-size: 13px;">Uppercase
                                    character</span>
                                <br>
                                <span class="psw_invalid_txt" id="lowerchar"
                                    style="color: red; font-size: 13px;">Lowercase
                                    character</span>
                                <br>
                                <span class="psw_invalid_txt" id="numberchar"
                                    style="color: red; font-size: 13px;">Numbers</span>
                                <br>
                                <span class="psw_invalid_txt" id="pwlength"
                                    style="color: red; font-size: 13px;">password
                                    must be 8</span>

                            </div>
                        </div>

                        <div class="form_inputs">
                            <label for="" style="position: relative;">
                                <span>Comfirm</span><br>
                                <input type="password" placeholder="comfirm password" name="compassword"
                                    id="compassword" value="1Aa@23456" class="error_alert_border">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6 psw_open_eye"
                                        style="width: 15px; position:absolute;right:15px; top:33px;">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                    <!-- close eye  -->
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6 psw_close_eye"
                                        style="width: 15px; position:absolute;right:15px; top:33px;">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                                    </svg>
                                </span>



                            </label>
                            <br>
                            <span id="matchornot" style="font-size: 13px;color: red;"></span>
                        </div>
                        <div class="form_inputs">
                            <label for="">
                                <button type="button" class="registerregister_btn">Register</button>
                            </label>
                        </div>
                    </form>
                </div>



                <div style="font-size: 13px; display: flex; justify-content: center; align-items: center;">
                    <span>Don't you have an account? <a href="">register</a></span>
                </div>
            </div>

        </div>
    </div>

    <script>


        const password = document.getElementById("password");
        const compassword = document.getElementById("compassword");
        const specialchar = document.getElementById("specialchar");
        const upperchar = document.getElementById("upperchar");
        const lowerchar = document.getElementById("lowerchar");
        const numberchar = document.getElementById("numberchar");
        const pwlength = document.getElementById("pwlength");
        const invalid = document.getElementById("invalidinput");
        const psw_invalid_ctn = document.querySelector(".psw_invalid_ctn");
        const matchornot = document.getElementById("matchornot");
        let isStrongPw = false;



        // password validate
        password.addEventListener("input", () => {
            const pw = password.value;
            validatePassword(pw);
            psw_invalid_ctn.classList.remove("psw_invalid_hide");
        });

        function validatePassword(pw) {
            const rules = [
                { test: /[a-z]/, element: lowerchar },
                { test: /[A-Z]/, element: upperchar },
                { test: /[0-9]/, element: numberchar },
                { test: /[~!@#$%^&*()]/, element: specialchar },
                { test: /.{8,}/, element: pwlength }
            ];

            const invalidChars = /[`\-\+<>?|]/;
            if (invalidChars.test(pw)) {
                alert("Input contains invalid characters.");
                console.log("Invalid characters detected.");
                return;
            }

            rules.forEach(rule => {
                const pass = rule.test.test(pw);
                rule.element.style.color = pass ? "green" : "red";
                if (!pass) {
                    isStrongPw = false;
                } else{
                    isStrongPw = true;
                }
            });
        }



        // password match ?
        compassword.addEventListener("input", () => {
            checkPasswordMatch();

        });


        function checkPasswordMatch() {
            if (password.value === compassword.value) {
                matchornot.textContent = "password match!";
                matchornot.style.color = "green";
                password.style.border = "1px solid rgb(120, 120, 196)";
                compassword.style.border = "1px solid rgb(120, 120, 196)";
                return true;
            } else {
                matchornot.textContent = "password doesn't match!!";
                matchornot.style.color = "red";
                compassword.style.border = "1px solid red";
                return false;
            }
        }

        // show and hide password
        document.addEventListener("DOMContentLoaded", () => {
            const psw_open_eye = document.querySelectorAll('.psw_open_eye');
            const psw_close_eye = document.querySelectorAll('.psw_close_eye');
            const passwordFields = [
                document.getElementById("password"),
                document.getElementById("compassword")
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
            const inputs = document.getElementsByTagName('input');
            const register_btn = document.querySelector(".registerregister_btn");
            const emailvalid = document.querySelector('.emailvalid');

            register_btn.addEventListener("click", () => {
                for (let i = 0; i < inputs.length; i++) {
                    if (!inputs[i].value.trim() == "") {
                        inputs[i].style.border = "1px solid rgb(120, 120, 196)";
                    } else {
                        inputs[i].style.border = "1px solid red";
                    }
                }
                if (isStrongPw && checkPasswordMatch()) {
                    psw_invalid_ctn.classList.add("psw_invalid_hide");

                    // fetch api
                    const data = {
                        username: safeInput("username"),
                        email: safeInput("email"),
                        password: safeInput("password"),
                        compassword: safeInput("compassword"),
                    };

                    fetch("http://localhost/perfumesite/mvcshop/users/register", {
                        method: "POST",
                        headers: { "Content-Type": "application/json" },
                        body: JSON.stringify(data),
                    })
                        .then(res => res.json())
                        .then(res => {
                            if (res.email == 'true') {
                                emailvalid.style.display = "block";
                            } else if (res.status == 'success') {
                                window.location.href = res.redirect;
                            }
                        }

                        )
                        .catch(err => console.error("Fetch error:", err));
                } else {
                    console.log("It's not strong pw or pw doesn't match")
                }

                    

            });

        })


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


    </script>

</body>

</html>