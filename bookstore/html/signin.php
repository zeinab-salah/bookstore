<?php
session_start();
if ( isset( $_SESSION['email'] ))  {
    header('Location: index.php');
}
require '../php/connection.php';
$repeat_err = $success = $fail = $exist_err  = $login_failed = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $sql = "SELECT * FROM users WHERE email = '$_POST[email]' and passwd = '$_POST[passwd]'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['email'] = $_POST['email'];
        if(strpos($_POST['email'], 'admin') !== false)
        header("Location: admin.php");
        else
        header("Location: index.php");
    } else {
        $login_failed = '<span class="err">Incorrect Email or Password</span>';
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            .form-content{
                width:500px;
                height: 500px;
                margin: auto;
                margin-top: 90px;
                background-color: rgb(220, 229, 247);
                padding: 7px;
                border-radius: 5px;
            }
            h2{
               margin-left: 80px;
            }
            form{
                margin-left: 50px;
                margin-top: 50px;
            }
            input{
                width: 75%;
                height:40px;
                padding: 5px;
                margin: 5px;
                border: none;
                outline: none;
                border-radius: 10px;
            }
            .btn-signin{
                height:40px;
                background-color: #04AA6D;
                border: none;
                font-weight: bolder;
                margin-left: 10px;
                border-radius: 20px;
                margin-top: 15px;
               margin-bottom: 30px;
            }
            input[type=password]{
                margin-bottom: 20px;
            }
            .f-for-a1{
               margin-left: 100px;
            }
            img{
                width:150px;
                height: 120px;
                border-radius: 50%;
                margin-left: 100px;
                margin-bottom: 20px;
            }
            .f-for-a{
               margin-left: 10px;
            }
        </style>
    </head>
    <body>
        <section class="form-content">
        <?= $login_failed ?>
            <form action="signin.php" method="post" >
                <img src="../image/user.png">
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="passwd" placeholder="Password" required>
                <a href="#" class="f-for-a1">Forget Your Password</a>
                <input type="submit" name="sign-in" value="Singing In" class="btn-signin"><br/>
                <a href="register.php" class="f-for-a">Create An Account</a>
            </form>
        </section>
    </body>
</html>