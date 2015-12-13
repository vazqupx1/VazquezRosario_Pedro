<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Borrando Cultivo....</title>
<?php
include('mysql.php');
mysql_select_db($database_connection) or die ("unable to connect to the database");
$profile_id=$_SESSION['profile_id'];
$production_id=$_REQUEST['production_id'];
$query="DELETE FROM production WHERE production_id='$production_id' AND profile_id='$profile_id';";
mysql_query($query) or die(mysql_error());
echo "<script type='text/javascript' language='javascript'>location.replace('farmer.php');</script>"
?>
</head>

<body>
</body>
</html>