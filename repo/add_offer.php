<?php
session_start();
?>

<?php
include('mysql.php');
mysql_select_db($database_connection) or die ("unable to connect to the database");
?>

<?php
//Busca la informacion que el usario ingreso y lo guarda en estas variables
$quantity = $_REQUEST['quantity'];
$need_date = $_REQUEST['need_date'];
$company_id = $_SESSION['profile_id'];
 if(isset($_REQUEST['production_id'])){
        $production_id = $_REQUEST['production_id'];
     }else if(isset($_SESSION['production_id'])){
         $production_id = $_SESSION['production_id'];
     }
//Query para insertar una nueva offerta
$query = "INSERT INTO offer (production_id, company_id, offer_quantity,need_date) Values ('$production_id','$company_id','$quantity','$need_date');";
mysql_query($query) or die(mysql_error());

//Lo envia luego del query ejecutar a la pagina de offers
    echo"<script type = 'text/javascript' language='javascript'>
        location.replace('offers.php');</script>";

 ?>
 <!-- Javascript-->
     <!--================================================== -->
     <!-- Placed at the end of the document so the pages load faster -->
 	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
 	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript">