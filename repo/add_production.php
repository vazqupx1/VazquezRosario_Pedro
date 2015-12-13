<?php
session_start();
?>
<?php
//This is the directory where images will be saved
 $target = "img/";
 $target = $target . basename( $_FILES['product_img']['name']);

include('mysql.php');
mysql_select_db($database_connection) or die ("unable to connect to the database");

if($_SESSION['profile_id']){
    $profile_id=$_SESSION['profile_id'];
}

    $product = $_REQUEST['product'];
    $variedad=$_REQUEST['variedad'];
    $data_cult = $_REQUEST['starting_date'];
    $date_exp = $_REQUEST['finished_date'];
    $quantity = $_REQUEST['quantity'];
    $sell_price = $_REQUEST['sell_price'];
    $type = $_REQUEST['type'];
    $unit = $_REQUEST['unit_select'];
    $product_img = ($_FILES['product_img']['name']);

    $query = "INSERT INTO product_line(profile_id,product_name, variedad_name, sell_price, unit, quantity, date_started, expected_finish, product_type) VALUES('$profile_id',
            '$product','$variedad','$sell_price', '$unit', '$quantity', '$data_cult', '$date_exp', '$type');";

    mysql_query($query) or die(mysql_error());

     //Writes the photo to the server
  echo"<script type = 'text/javascript' language='javascript'>
        location.replace('profile.php');</script>";




  ?>

    <!-- Javascript-->
	    <!--================================================== -->
	    <!-- Placed at the end of the document so the pages load faster -->
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript">





