<?php
session_start();
if ( $_SESSION['email'] )  {
    header('Location: index.php');
}
require 'connect.php';
$repeat_err = $success = $fail = $exist_err  = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if ($_POST['passwd'] != $_POST['conpasswd']) {
        $repeat_err = '<span class="err">Password does not match with confirm</span>';
    } else {
        $sql = "SELECT * FROM users WHERE email = '$_POST[email]' AND username='admin' ";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $exist_err = '<span class="err">Email already exists</span>';
            } else {
                // $sql = "INSERT INTO users ( groupid,userimage,username,phone, email, passwd ) VALUES (  0 , '$_POST[userimage]',
                //  '$_POST[username]','$_POST[phone]', '$_POST[email]', '$_POST[passwd]')";
                // $result = mysqli_query($conn, $sql);
                // if ($result) {
                //     $success = '<span class="success">1 row added successfuly</span>';
                // } else {
                //     $fail = '<span class="err">Failed to insert</span>';
                // }
                if($_POST['username']=="admin")
                {
                    $sql = "INSERT INTO users (groupid,userimage,username, phone, email, passwd)
                    VALUES ('1','$final_file', '$_POST[username]', '$_POST[phone]', '$_POST[email]', '$_POST[passwd]') "; 
                    if (mysqli_query($conn, $sql)) {
                        header("Location:../html/index.php") ;
                    } else {
                        $fail = '<span class="err">Failed to insert</span>';
                    }
                    
                }
                else{
                    $sql = "INSERT INTO users (groupid,userimage,username, phone, email, passwd)
                    VALUES ('0','$final_file', '$_POST[username]', '$_POST[phone]', '$_POST[email]', '$_POST[passwd]') ";
                      if (mysqli_query($conn, $sql)) {
                        header("Location:../html/index.php") ;
                    } else {
                        $fail = '<span class="err">Failed to insert</span>';
                    }
                    
                }
            }
        }
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
                height:auto;
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
            .btn-signup{
                height:40px;
                background-color: #04AA6D;
                border: none;
                font-weight: bolder;
                margin-left: 10px;
                border-radius: 20px;
            }
            .btn-signin{  
                margin-left:280px;
                width:70px;
                height:40px;
                margin-bottom: 10px;
                background-color: #04AA6D;
                border: none;
                font-weight: bolder;
                display: block;
                border-radius: 20px;
            }
            label{
                font-weight: bolder;
                margin-left: 20px;
                cursor:pointer;
                padding: 3px;
                margin-bottom:10px;
            }
            #inputTag{
                 display: none;
                }
            i {
                margin-left: 50px;
            }
            .error {
                color: red;
                font-size: 90%;
            }
        </style>
    </head>
    <body>
        <section class="form-content">
        <?= $fail ?>
            <form action="register.php" method="post" >
                <h2>Create An account</h2>
                <button class="btn-signin" ><a href="signin.php">Sign In</a></button>
                <label for="inputTag">
                    Select Image
                    <br/>
                    <i class="fa fa-2x fa-camera" class="fa-m"></i><br/>
                    <input id="inputTag" type="file" name="userimage" accept="image/png, image/jpg, image/gif, image/jpeg"/>
                    <br/>
                    <span id="imageName"></span>
                  </label>
                <input type="text" name="username" placeholder="User Name" required>
                <div class="error" id="nameErr"></div>
                <input type="number" name="phone" placeholder="Phone Number" required>
                <div class="error" id="phoneErr"></div>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="passwd" placeholder="Password" required>
                <div class="error" id="passwdErr"></div>
                <input type="password" name="conpasswd" placeholder="Confirm Password" required>
                <div class="error" id="conpasswdErr"></div>
                <input type="submit" name="signup" value="Sing Up" class="btn-signup">
            </form>
        </section>

        <script>
            let input = document.getElementById("inputTag");
            let imageName = document.getElementById("imageName")
    
            input.addEventListener("change", ()=>{
                let inputImage = document.querySelector("input[type=file]").files[0];
    
                imageName.innerText = inputImage.name;
            })
        </script>

        <script>
            // Defining a function to display error message
            function printError(elemId, hintMsg) {
                  document.getElementById(elemId).innerHTML = hintMsg;
                }

            // Defining a function to validate form 
            function validateForm() {
            // Retrieving the values of form elements 
                var username = document.contactForm.username.value;
                var email = document.contactForm.email.value;
                var phone = document.contactForm.phone.value;
                var passwd = document.contactForm.passwd.value;
                var conpasswd = document.contactForm.conpasswd.value;
   
	        // Defining error variables with a default value
            var nameErr = emailErr = phoneErr = passwdErr = conpasswdErr = true;
    
            // Validate name
            if(username == "") {
                 printError("nameErr", "Please enter your name");
            } else {
                var regex = /^[a-zA-Z\s]+$/;                
                if(regex.test(username) === false) {
                     printError("nameErr", "Please enter a valid name");
                } else {
                    printError("nameErr", "");
                     nameErr = false;
                }
            }
    
            // Validate email address
            if(email == "") {
                 printError("emailErr", "Please enter your email address");
            } else {
                 // Regular expression for basic email validation
                var regex = /^\S+@\S+\.\S+$/;
                if(regex.test(email) === false) {
                    printError("emailErr", "Please enter a valid email address");
                } else{
                     printError("emailErr", "");
                    emailErr = false;
                }
            }
    
             // Validate mobile number
             if(phone == "") {
                    printError("phoneErr", "Please enter your mobile number");
            } else {
                 var regex = /^[1-9]\d{9}$/;
                 if(regex.test(phone) === false) {
                 printError("phoneErr", "Please enter a valid 10 digit mobile number");
                } else{
                    printError("phoneErr", "");
                    mobileErr = false;
                }
            }
    
            // Prevent the form from being submitted if there are any errors
            if((nameErr || emailErr || phoneErr || passwdErr || conpasswdErr) == true) {
                return false;
            } else {
            // Creating a string from input data for preview
                var dataPreview = "You've entered the following details: \n" +
                          "User Name: " + username + "\n" +
                          "Email Address: " + email + "\n" +
                          "Phone Number: " + phone + "\n" +
                          "passwd: " + passwd + "\n" +
                          "conpasswd: " + conpasswd + "\n";
        // Display input data in a dialog box before submitting the form
                alert(dataPreview);
        }
}
</script>
    </body>
</html>