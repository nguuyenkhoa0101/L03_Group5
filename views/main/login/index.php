<?php
   include_once('views/main/navbar.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login for Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/stylesheets/login.css">
    <script src="https://kit.fontawesome.com/4ccf3877a2.js" crossorigin="anonymous"></script>
</head>

<body>
    <section class="wrapper">
        <div class="box">
            <form method="POST">
                <div class="register-box" id="regUser">
                    <div class="top-header">
                        <img src="https://pubcdn.ivymoda.com/ivy2/images/logo.png" alt="">
                    </div>
                    <?php
			            if (isset($err)) {
				        echo '<p class="login-box-msg" style="color: red">' . $err . '</p>';
				        unset($err);
			            }
			        ?>
                    <div class="input-field">
                        <label for="regUser">Email</label>
                        <input type="text" class="input-box" id="username" name="username" required>
                        
                    </div>
                    <div class="input-field">
                        <label for="regPassword">Password</label>
                        <input type="password" class="input-box" id="password" name="password" required>
                        
                    </div>
                    <div class="remember">
                        <input type="checkbox" id="formCheck-2" class="check">
                        <label for="formCheck-2">Ghi nhớ đăng nhập</label>
                    </div>
                    <div class="input-field">
                        <input type="submit" class="input-submit" value="Đăng Nhập" name="submit-btn">
                    </div>
                    <p style="text-align:center;">Bạn chưa có tài khoản? <a
                            href="index.php?page=main&controller=register&action=index">Đăng ký</a></p>
                </div>
            </form>
        </div>

    </section>

</body>

</html>