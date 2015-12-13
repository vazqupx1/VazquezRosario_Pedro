<?php
session_start();
?>

<?php
include('mysql.php');
mysql_select_db($database_connection) or die ("unable to connect to the database");
?>

<?php

$full_name = $_REQUEST['full_name'];
$email = $_REQUEST['email'];
$password = $_REQUEST['password'];
$company_name = $_REQUEST['company_name'];
$type = $_REQUEST['type'];

$query = "INSERT INTO profile (full_name, email, password,company_name,account_type) Values ('$full_name','$email','$password','$company_name','$type');";
mysql_query($query) or die(mysql_error());


    echo"<script type = 'text/javascript' language='javascript'>
        location.replace('index.php');</script>";

 ?>