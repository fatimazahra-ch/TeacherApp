<?php
    session_start();
    if(isset($_SESSION['login'])){
        header('Location: ../Bonjour.php');
    }
    include 'database.php';
    include 'usermodel.php';
    include 'usercontroller.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<meta http-equiv="X-UA-compatible" content="ie=edge"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<link
rel="stylesheet"
    href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhnd0JK28anvf"
            crossorigin="anonymous"/>
            <link rel="stylesheet" href="loginn.css">
            <link rel="stylesheet" href="https://fontawesome.com/">
            </head>
            <body>
            
            <div class="container" id="container" class="nav1">
            <div class="form-container sign-in-container" class="nav2">
            <form action="" method="POST">
            <h1>Sign in</h1>
            <div class="social-container">
            <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
            <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <span class="create">or use your account</span>
            <input type="text" placeholder="login" name="login" />
            <input type="password" placeholder="Password" name="Password" />
            <a class="create" href="#">Forgot your password?</a>
            <button type='submit' name='submit'>Sign In</button>
            </form>
            </div>
            <div class="form-container sign-in-container" class="nav3">
            <form action="" method="POST">
            <h1>Sign in</h1>
            <div class="social-container">
            <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
            <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <span class="create">or use your account</span>
            <input type="text" placeholder="login" name="login"/>
            <input type="password" placeholder="Password" name="Password"/>
            <a class="create" href="#">Forgot your password?</a>
            <button type='submit' name='submit'>Sign In</button>
            </form>
            </div>
            <div class="overlay-container" class="nav4">
            <div class="overlay">
            <div class="overlay-panel overlay-left">
            <h1>Welcome Back!</h1>
            <p>To keep connected with us please login with your personal info</p>
            <button class="ghost" id="signIn">Sign In</button>
            </div>
            <div class="overlay-panel overlay-right">
            <h1 class="hellomember">Hello,Member!</h1>
            <p>Enter your personal details and start journey with us</p>
            <button class="ghost" id="signUp">Sign In</button>
            </div>
            </div>
            </div>
           
            
            
            <script src="main.js"></script>
            
            
            
            </body>
            </html>