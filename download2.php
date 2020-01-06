<?php
include "conn.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    echo $id.'<br>';
    $sql="select * from upload where id= '$id'";
    $q= mysqli_query($connection, $sql);;
    $res = mysqli_fetch_assoc($q);
    echo $res['fileName']."  res".'<br>';
    $file_val = $res['fileName'];
    echo $file_val."file value".'<br>';
    
    $handle = opendir('doc/');
    
    while ($entry = readdir($handle)){
        if($entry != '.' && $entry != '..'){    
            echo $entry.'<br>';
            if($entry == $file_val){
                echo "file found";
                ?>
                <!--<a href="download.php?file=<?php echo $entry; ?>">ddown</a>-->
                <?php
                $file = basename($file_val);
                $file_path = 'doc/'.$file;

                if(!file_exists($file_path)){
                    die("file not found");
                    header('location:search.php');
                } else {
                    header('Content-Description: File Transfer');
                    header('Content-type: application/octet-stream');
                    header('Expires: 0');
                    header('Last-Modified:'.gmdate("D,d M Y H:i:s").'GMT');
                    header('Cache-Control: must-revalidate');
                    header('Pragma: public');
                    header('Content-Transfer-Encoding: binary');
                    header('Content-length:'.filesize($file_path));
                    header('Content-disposition: attachment; filename='.basename($file_path));
                    ob_clean();
                    flush();
                    readfile($file_path);
                    exit;
                }
                exit;
            }
        }
    }
    closedir($handle);
        
}

?>