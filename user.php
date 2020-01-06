<?php
session_start();
include("conn.php");
$username = $_SESSION['username'];
$sql = "select * from upload where authors_name = 'fdfd'";
$q = mysqli_query($connection, $sql);
$row = mysqli_num_rows($q);
$res = mysqli_fetch_assoc($q);

?><h3><?php echo("hello ".$_SESSION['username']."!"); ?></h3>
<a href = "lgt.php"><button>log out</button></a>
<?php

if($row != 0){
   ?>
      <table border 1px>
         <thead>
            <td>File Name</td>
            <td>Delete</td>
         </thead>
   <?php
   do{
      ?>
         <tbody>
            <tr>
               <td><?php echo ($res['fileName']."<br>"); ?></td>
               <td><a href="delete.php"><button>delete</button></a></td>
            </tr>
         </tbody>
      <?php
   } while($res = mysqli_fetch_assoc($q));
   ?></table><?php
} else{
   echo("you have not uploaded any files yet");
}


?>