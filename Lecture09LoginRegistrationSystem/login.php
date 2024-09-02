<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require 'base/connection.php';


    $useremail = $_POST["useremail"];
    $password = $_POST["userpass"];




    $sqlemail = "select * from info where Email='$useremail'";

    $result = mysqli_query($connection, $sqlemail);

    $row = mysqli_num_rows($result); //1


    if ($row ==1) {
       

     while ($item = mysqli_fetch_assoc($result)) {
            


           password_verify($password,$item["Password"]);
           session_start();

           $_SESSION["login"]=true;

           $_SESSION["email"]=$useremail;

           header("location:welcome.php");



        }



    } 

    
       
}


?>





<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <style>
        .form-container {
            background-color: #fff;
            font-family: 'Poppins', sans-serif;
            font-size: 0;
            box-shadow: 0 0 25px -15px rgba(0, 0, 0, 0.3);
        }

        .form-container .left-content {
            background-color: #2E323B;
            font-family: 'Oswald', sans-serif;
            width: 40%;
            padding: 66px 50px;
            display: inline-block;
            vertical-align: top;
        }

        .form-container .left-content .title {
            color: #FF97A8;
            font-size: 20px;
            font-weight: 300;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin: 0 0 55px;
        }

        .form-container .left-content .sub-title {
            color: #fff;
            font-size: 60px;
            font-weight: 300;
            text-transform: uppercase;
            margin: 0;
        }

        .form-container .right-content {
            text-align: center;
            width: 60%;
            padding: 30px 50px;
            display: inline-block;
        }

        .form-container .right-content .form-title {
            color: #888;
            font-family: 'Oswald', sans-serif;
            font-size: 40px;
            font-weight: 400;
            text-align: left;
            text-transform: uppercase;
            padding: 0 0 2px;
            margin: 0 0 30px;
            border-bottom: 2px solid #FF97A8;
        }

        .form-container .right-content .form-horizontal {
            color: #999;
            font-size: 14px;
            text-align: left;
            margin: 0 0 15px;
        }

        .form-container .form-horizontal .form-group {
            margin: 0 0 20px;
        }

        .form-container .form-horizontal .form-group:nth-of-type(2) {
            margin-bottom: 35px;
        }

        .form-container .form-horizontal .form-group label {
            font-weight: 500;
        }

        .form-container .form-horizontal .form-control {
            color: #888;
            background: #f9f9f9;
            font-weight: 400;
            letter-spacing: 1px;
            height: 40px;
            padding: 6px 12px;
            border-radius: 5px;
            border: none;
            box-shadow: none;
        }

        .form-container .form-horizontal .form-control:focus {
            box-shadow: 0 0 5px #FF97A8;
        }

        .form-container .form-horizontal .signin {
            color: #fff;
            background: linear-gradient(to right, #FF638E, #FF97A8);
            font-size: 15px;
            font-weight: 500;
            letter-spacing: 0.5px;
            text-transform: capitalize;
            width: 100%;
            padding: 9px 11px;
            margin: 0 0 20px;
            border-radius: 50px;
            transition: all 0.3s ease 0s;
        }

        .form-container .form-horizontal .btn:hover,
        .form-container .form-horizontal .btn:focus {
            box-shadow: 0 0 10px #FF97A8;
            outline: none;
        }

        .form-container .form-horizontal .remember-me {
            width: calc(100% - 105px);
            display: inline-block;
        }

        .form-container .form-horizontal .remember-me .check-label {
            color: #999;
            font-size: 12px;
            font-weight: 400;
            vertical-align: top;
            display: inline-block;
        }

        .form-container .form-horizontal .remember-me .checkbox {
            height: 17px;
            width: 17px;
            min-height: auto;
            margin: 0 1px 0 0;
            border: 2px solid #FF97A8;
            border-radius: 5px;
            cursor: pointer;
            display: inline-block;
            position: relative;
            appearance: none;
            -moz-appearance: none;
            -webkit-appearance: none;
            transition: all 0.3s ease 0s;
        }

        .form-container .form-horizontal .remember-me .checkbox:before {
            content: '';
            height: 5px;
            width: 10px;
            border-bottom: 2px solid #fff;
            border-left: 2px solid #fff;
            transform: rotate(-45deg);
            position: absolute;
            left: 2px;
            top: 2.5px;
            transition: all 0.3s ease;
        }

        .form-container .form-horizontal .remember-me .checkbox:checked {
            background-color: #FF97A8;
        }

        .form-container .form-horizontal .remember-me .checkbox:checked:before {
            opacity: 1;
        }

        .form-container .form-horizontal .remember-me .checkbox:not(:checked):before {
            opacity: 0;
        }

        .form-container .form-horizontal .remember-me .checkbox:focus {
            outline: none;
        }

        .form-container .form-horizontal .forgot {
            color: #999;
            font-size: 12px;
            text-align: right;
            width: 100px;
            vertical-align: top;
            display: inline-block;
            transition: all 0.3s ease 0s;
        }

        .form-container .form-horizontal .forgot:hover {
            text-decoration: underline;
        }

        .form-container .right-content .separator {
            color: #999;
            font-size: 15px;
            text-align: center;
            margin: 0 0 15px;
            display: block;
        }

        .form-container .right-content .social-links {
            text-align: center;
            padding: 0;
            margin: 0 0 25px;
            list-style: none;
        }

        .form-container .right-content .social-links li {
            margin: 0 2px 5px;
            display: inline-block;
        }

        .form-container .right-content .social-links li a {
            color: #fff;
            background-color: #F16262;
            font-size: 12px;
            padding: 9px 12px;
            border-radius: 5px;
            display: block;
            transition: all 0.3s ease 0s;
        }

        .form-container .right-content .social-links li:nth-child(2) a {
            background-color: #3B5897;
        }

        .form-container .right-content .social-links li a i {
            margin-right: 10px;
        }

        .form-container .right-content .social-links li a:hover {
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
        }

        .form-container .right-content .signup-link {
            color: #999;
            font-size: 13px;
        }

        .form-container .right-content .signup-link a {
            color: #F16262;
            transition: all 0.3s ease 0s;
        }

        .form-container .right-content .signup-link a:hover {
            text-decoration: underline;
        }

        @media only screen and (max-width:767px) {

            .form-container .left-content,
            .form-container .right-content {
                width: 100%;
                padding: 30px;
            }

            .form-container .left-content .title {
                margin: 0 0 20px;
            }

            .form-container .left-content .sub-title {
                font-size: 40px;
            }
        }
    </style>

</head>

<body>

<?php include "base/navbar.php"; ?>
    <div class="form-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-container">
                        <div class="left-content">
                            <h3 class="title">Aptech GLS 02 </h3>
                            <h4 class="sub-title">Aptech ke engineers

                                hum site bana rahy hen kesi lag rahi hai site
                            </h4>
                        </div>
                        <div class="right-content">
                            <h3 class="form-title">Login</h3>
                            <form class="form-horizontal" action="login.php" method="post">

                                <div class="form-group">
                                    <label> Email</label>
                                    <input type="email" name="useremail" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="userpass" class="form-control">
                                </div>


                                <input type="submit" class="btn signin" value="signup" />

                                <a href="" class="forgot">Forgot Password</a>
                            </form>
                            <span class="separator">OR</span>
                            <ul class="social-links">
                                <li><a href=""><i class="fab fa-google"></i> Login with Google</a></li>
                                <li><a href=""><i class="fab fa-facebook-f"></i> Login with Facebook</a></li>
                            </ul>
                            <span class="signup-link">Don't have an account? Sign up <a href="">here</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div






        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>