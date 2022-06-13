<?php

    require('connection.php');
    $repeat_err = $success = $fail = $exist_err  = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // if ($_POST['passwd'] != $_POST['conpasswd']) {
        //     $repeat_err = '<span class="err">Password does not match with confirm</span>';
        // } else {
        $userimage = rand(1000,100000)."-".$_FILES['userimage']['name'];
        $file_loc = $_FILES['userimage']['tmp_name'];
         $file_size = $_FILES['userimage']['size'];
         $file_type = $_FILES['userimage']['type'];
         $folder="upload/";
         
         /* new file size in KB */
         $new_size1 = $file_size1/1024;  
         /* new file size in KB */
         
         /* make file name in lower case */
         $new_file_name = strtolower($userimage);
         /* make file name in lower case */
         
         $final_file=str_replace(' ','-',$new_file_name1);
         
         if(move_uploaded_file($file_loc,$folder.$final_file))
         {
        //   $sql="INSERT INTO books(bookfile,formatt,weightt) VALUES('$final_file1','$file_type1','$new_size1')";
        //   mysqli_query($conn,$sql);
          
         
          echo "File sucessfully upload";
                
          
         }
         else
         {
          
          echo "Error.Please try again";
                
        }

  
    $sql = "SELECT * FROM users WHERE email = '$_POST[email]' or phone='$_POST[phone]' or username='$_POST[username]' ";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $exist_err = '<span class="err">Data already exists</span>';
        } else {
            if($_POST['username']=="admin")
            {
                $sql = "INSERT INTO users (groupid,userimage,username, phone, email, passwd)
                VALUES ('1','$final_file', '$_POST[username]', '$_POST[phone]', '$_POST[email]', '$_POST[passwd]') "; 
                if (mysqli_query($conn, $sql)) {
                    header("Location:../html/index.php") ;
                } else {
                    header("Location:../html/register.php") ;
                   // echo "Error: " . $sql . "<br>" . mysqli_error($conn) ;
                }
                
            }
            else{
                $sql = "INSERT INTO users (groupid,userimage,username, phone, email, passwd)
                VALUES ('0','$final_file', '$_POST[username]', '$_POST[phone]', '$_POST[email]', '$_POST[passwd]') ";
                  if (mysqli_query($conn, $sql)) {
                    header("Location:../html/index.php") ;
                } else {
                    header("Location:../html/register.php") ;
                   // echo "Error: " . $sql . "<br>" . mysqli_error($conn) ;
                }
                
            }
        }
    }
}
    
    
?>