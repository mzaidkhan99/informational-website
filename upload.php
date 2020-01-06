<html>
<head>
   <title>upload</title>
</head>
<body>
<?php

   if(!isset($_SESSION['username'])){
      ?> <script> alert("login to upload") </script> <?php
      sleep(10);
      header('location:scr.php');
   } else{

      if (isset($_POST['btn_3'])){
         
         $file = $_FILES['file_upload'];
         
         $fileName = $_FILES['file_upload']['name'];
         $fileSize = $_FILES['file_upload']['size'];
         $fileError = $_FILES['file_upload']['error'];
         $fileTmpName = $_FILES['file_upload']['tmp_name'];
         $fileType = $_FILES['file_upload']['type'];
         
         if ($fileName == "") {
            header('location: scr.php');
         }
         else{
         
            if ($fileName != ""){
               $fileExt = explode('.', $fileName);
               $fileActualExt = strtolower(end($fileExt));

               $allowedExt = array('jpg', 'html', 'php', 'txt', 'jpeg', 'pdf', 'doc', 'docx', 'ppt', 'pptx', 'png', 'xlsx');

               if (in_array($fileActualExt, $allowedExt)){
                  if ($fileError === 0){
                     if ($fileSize < 500000){
                        $fileNameNew = uniqid('', true).".".$fileActualExt;
                        echo "$fileNameNew";
                        
                        // path to store the files. 
                        $target = "doc/".basename($_FILES['file_upload']['name']);
                        
                        
                        include("conn.php");
                        
                        $authors_name = $_POST['authors_name'];
                        $u_name = $_POST['u_name'];
                        $sub_name = $_POST['sub_name'];
                        $sub_code = $_POST['sub_code'];
                        $year = $_POST['year'];
                        
                        mysqli_select_db($connection,"db_web");
                        
                        $sql = "insert into upload (fileName, fileSize, fileType, fileActualExt, fileNameNew, authors_name, u_name, sub_name, sub_code, year) values ('$fileName', '$fileSize', '$fileType', '$fileActualExt', '$fileNameNew','$authors_name', '$u_name', '$sub_name', '$sub_code', '$year')";
                        $q = mysqli_query($connection,$sql);

                        // moving files into the folder.
                        if (move_uploaded_file($_FILES['file_upload']['tmp_name'], $target)) {
                           //$msg = "file stored";
                           header('location:scr.php');
                        }
                        else {
                           header('location:scr.php');
                        }

                     }
                     else{
                        echo ("File size is too big");
                     }
                  }
                  else{
                     echo ("There is an error uploading your file");
                  }
               }
               else{
                  echo ("You can't upload files of this type");
               }
            }
            else{
               header('location: scr.php');
               
            }
         }
      }
      else{
         echo ("Can't upload due to some problem");
      }
   }
   
?>
</body>
</html>
