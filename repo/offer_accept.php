<?php
session_start();


include ('mysql.php');
mysql_select_db($database_connection) or die ("unable to connect to the database");


$decision = $_REQUEST['status'];
$comment = $_REQUEST['comment'];
if(isset($_REQUEST['offer_id'])){
        $offer_id = $_REQUEST['offer_id'];
     }else if(isset($_SESSION['offer_id'])){
         $offer_id = $_SESSION['offer_id'];
     }
$query = "Update offer set offer_accept = '$decision', comments='$comment' where offer_id = $offer_id;";
        mysql_query($query) or die(mysql_error());

$query_offer = "Select * from offer where offer_id = $offer_id";
$query_result = mysql_query($query_offer);
$row_offer = mysql_fetch_array($query_result);

$quantity = $row_offer['offer_quantity'];
$product_id = $row_offer['production_id'];

$query_prod = "Update product_line set quantity = quantity-'$quantity' where production_id = $product_id;";
mysql_query($query_prod) or die(mysql_error());

        echo "<script type='text/javascript' language='javascript'> location.replace('profile.php');</script>";


?>
