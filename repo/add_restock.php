<?php
session_start();
?>
<?php
include('mysql.php');
mysql_select_db($database_connection) or die ("unable to connect to the database");

if($_SESSION['profile_id']){
    $profile_id=$_SESSION['profile_id'];
}

if(isset($_REQUEST['production_id'])){
        $production_id = $_REQUEST['production_id'];
     }else if(isset($_SESSION['production_id'])){
         $production_id = $_SESSION['production_id'];
     }

    $data_cult = $_REQUEST['date_started'];
    $date_exp = $_REQUEST['date_ended'];
    $quantity = $_REQUEST['quantity'];

    $query = "UPDATE product_line set quantity ='$quantity', date_started = '$data_cult', expected_finish ='$date_exp' where profile_id = $profile_id and production_id = $production_id;";

    mysql_query($query) or die(mysql_error());

     echo"<script type = 'text/javascript' language='javascript'>
        location.replace('profile.php');</script>";




  ?>
    <!-- Javascript-->
	    <!--================================================== -->
	    <!-- Placed at the end of the document so the pages load faster -->
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
