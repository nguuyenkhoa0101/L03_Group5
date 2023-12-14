<?php
   include_once('views/main/navbar.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="assets/stylesheets/register.css">
    <script src="https://kit.fontawesome.com/4ccf3877a2.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="wrapper" style="margin-top:80px">
        <div class="box">
            <form action="index.php?page=main&controller=register&action=submit" method="POST" class="text-right">
                <div class="register-box" id="regUser">
                    <div class="top-header">
                        <img src="https://routine.vn/media/amasty/webp/logo/websites/1/logo-black-2x_png.webp" alt="">
                    </div>
                    <div class="input-group">
                        <div class="name-box">
                            <div class="input-field">
                                <input type="text" class="input-box" id="fname" name="fmane" required>
                                <label for="regUser">First Name</label>
                            </div>
                            <div class="input-field">
                                <input type="text" class="input-box" id="lname" name="lname" required>
                                <label for="regUser">Last Name</label>
                            </div>
                        </div>
                        <div class="name-box">
                            <div class="input-field">
                                <input type="number" class="input-box" id="age" name="age" required>
                                <label for="regUser">Age</label>
                            </div>
                            <div class="input-field">
                                <input type="text" class="input-box" id="phone" name="phone" required>
                                <label for="regUser">Tel</label>
                            </div>
                        </div>
                        <div class="input-field">
                            <label for="regUser">Email</label>
                            <input type="text" class="input-box" id="email" name="email" required>
                            
                        </div>
                        
                        <div class="input-field">
                            <label for="regPassword">Password</label>
                            <input type="password" class="input-box" id="pass" name="pass" required
                            pattern="^(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$"
                            title="Mật khẩu cần chứa ít nhất một chữ thường, một số và một ký tự đặc biệt.">
                            
                            
                        </div>
                        <div class="gender-box">
                            <div class="gender-container">
                                <input type="radio" class="gender-choice" name="gender" value="1" required>
                                <label>Male</label>
                            </div>
                            <div class="gender-container">
                                <input type="radio" class="gender-choice" name="gender" value="0" required>
                                <label>Female</label>
                            </div>
                        </div>
                    </div>
                    <div class="remember">
                        <input type="checkbox" id="formCheck-2" class="check">
                        <label for="formCheck-2">Tôi chấp nhận <a href="#">điều khoản riêng tư và bảo mật</a></label>
                    </div>
                    <div class="input-field">
                        <input type="submit" class="input-submit" value="Đăng Ký">
                    </div>
                    <p style="text-align:center;">Bạn đã có tài khoản? <a
                            href="index.php?page=main&controller=login&action=index">Đăng nhập</a></p>
                </div>
            </form>
        </div>

    </div>
    </div>
    <script>
    function myRegPassword() {
        var d = document.getElementById('regPassword');
        var b = document.getElementById("eye-2");
        var c = document.getElementById("eye-slash-2");
        if (d.type === "password") {
            d.type = "text"
            b.style.opacity = "0";
            c.style.opacity = "1";
        } else {
            d.type = "password"
            b.style.opacity = "1";
            c.style.opacity = "0";
        }
    }
    </script>
</body>

</html>