<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Borrando Favorito....</title>
<?php
include('mysql.php');
mysql_select_db($database_connection) or die ("unable to connect to the database");
$profile_id=$_SESSION['profile_id'];
$fav_id=$_REQUEST['favorite_id'];
$query="DELETE FROM favorite WHERE favorite_id='$fav_id';";
mysql_query($query) or die(mysql_error());
echo "<script type='text/javascript' language='javascript'>location.replace('profile.php');</script>"
?>
</head>

<body>
</body>
<!-- Javascript-->
    <!--================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
</html>