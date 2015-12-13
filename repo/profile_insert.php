<?php
session_start();

//This is the directory where images will be saved


include('mysql.php');
mysql_select_db($database_connection) or die ("unable to connect to the database");
if($_SESSION['profile_id']){
    $profile_id = $_SESSION['profile_id'];
}

function is_valid_type($image){
    $valid_types = array("image/jpg","image/jpeg","image/bmp", "image /gif");
    if(in_array($image['type'], $valid_types))
            return 1;
    return 0;
}

$TARGET_PATH = "/var/www/img/";
$image=  $_FILES['upload']['name'];
$phone = $_REQUEST['phone'];
$description = $_REQUEST['description'];
$street_address = $_REQUEST['street_address'];
$town = $_REQUEST['town'];
$zip = $_REQUEST['zip'];

$TARGET_PATH = $image['name'];

/*if(!is_valid_type($image))
{
    $_SESSION['error'] = "You must upload a jpeg, gif, or bmp";
    header("Location: index.php");
    exit;
}

if(file_exists($TARGET_PATH)){

    $_SESSION['error'] = "A file with that name already exists";
    header("Location: index.php");
    exit;
}

if(move_uploaded_file($image['tmp_name'], $TARGET_PATH))
{
    
}
 */
    $query = "Update profile set phone = '$phone', street_address = '$street_address', town = '$town',zip='$zip',
            description = '$description', img_path = '$image' where profile_id = $profile_id;";
 
        mysql_query($query) or die(mysql_error());
        echo "<script type='text/javascript' language='javascript'> location.replace('profile.php');</script>";



        

                




?>







