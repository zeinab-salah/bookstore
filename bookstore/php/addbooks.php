<?php

    require('connection.php');
    $repeat_err = $success = $fail = $exist_err  = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // if ($_POST['passwd'] != $_POST['conpasswd']) {
        //     $repeat_err = '<span class="err">Password does not match with confirm</span>';
        // } else {
          
  
    // $sql = "SELECT * FROM books WHERE bookname = '$_POST[bookname]' ";
    // $result = mysqli_query($conn, $sql);
    // if ($result) {
    //     if (mysqli_num_rows($result) > 0) {
    //         $exist_err = '<span class="err">Data already exists</span>';
    //     } else {
           if(isset($_POST['save']))
           {
                 
             $file = rand(1000,100000)."-".$_FILES['file']['name'];
                $file_loc = $_FILES['file']['tmp_name'];
             $file_size = $_FILES['file']['size'];
             $file_type = $_FILES['file']['type'];
             $folder="upload/";
             
             /* new file size in KB */
             $new_size = $file_size/1024;  
             /* new file size in KB */
             
             /* make file name in lower case */
             $new_file_name = strtolower($file);
             /* make file name in lower case */
             
             $final_file=str_replace(' ','-',$new_file_name);
             
             if(move_uploaded_file($file_loc,$folder.$final_file))
             {
            //   $sql="INSERT INTO books(bookfile,formatt,weightt) VALUES('$final_file','$file_type','$new_size')";
            //   mysqli_query($conn,$sql);
              
             
              echo "File sucessfully upload";
                    
              
             }
             else
             {
              
              echo "Error.Please try again";
                    
                    }

                    // image for book cover

                    $file1 = rand(1000,100000)."-".$_FILES['file1']['name'];
                    $file_loc1 = $_FILES['file1']['tmp_name'];
                 $file_size1 = $_FILES['file1']['size'];
                 $file_type1 = $_FILES['file1']['type'];
                 $folder1="upload/";
                 
                 /* new file size in KB */
                 $new_size1 = $file_size1/1024;  
                 /* new file size in KB */
                 
                 /* make file name in lower case */
                 $new_file_name1 = strtolower($file1);
                 /* make file name in lower case */
                 
                 $final_file1=str_replace(' ','-',$new_file_name1);
                 
                 if(move_uploaded_file($file_loc1,$folder1.$final_file1))
                 {
                //   $sql="INSERT INTO books(bookfile,formatt,weightt) VALUES('$final_file1','$file_type1','$new_size1')";
                //   mysqli_query($conn,$sql);
                  
                 
                  echo "File sucessfully upload";
                        
                  
                 }
                 else
                 {
                  
                  echo "Error.Please try again";
                        
                }
            $sql = "INSERT INTO books (formatt , catrgory , author, bookname , releasedate , weightt , price , bookfile,imagecover)
            VALUES ( '$_POST[formatt]','$_POST[catrgory]', '$_POST[author]', '$_POST[bookname]', '$_POST[releasedate]','$new_size','$_POST[price]','$final_file','$final_file1') "; 
             if (mysqli_query($conn, $sql)) {
                header("Location:../html/admin.php") ;
            } else {
                
               echo "Error: " . $sql . "<br>" . mysqli_error($conn) ;
            }

                
            // }
 
    //     }
    }
    }
?>