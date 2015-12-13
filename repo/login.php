<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Log in....</title>
<?php
include("mysql.php");

?>
</head>

<body>
<?php


$email = $_POST['email'];
$password = $_POST['password'];
$year = time() + 31536000;

if($_POST['remember']){
    setcookie('remember_me', $_POST['email'],$year);
    setcookie('remember_pass', $_POST['password'],$year);
}elseif(!$_POST['remember']){
    $past=time()-100;
    setcookie(remember_me, gone, $past);
}


if($email && $password){	
mysql_select_db($database_connection) or die ("unable to connect to the database");
$query = mysql_query("SELECT * FROM profile WHERE email='$email'");
$numrows = mysql_num_rows($query);

if ($numrows !=0){
	while ($row = mysql_fetch_assoc($query)){
	$dbemail = $row['email'];
	$dbpassword = $row['password'];
	$id=$row['profile_id'];	
        $type=$row['account_type'];
        $company_name=$row['company_name'];
}
if ( $email == $dbemail && $password == $dbpassword)
{

if ( $type == 'farmer') {
	$_SESSION['email'] = $dbemail; 
	$_SESSION['profile_id'] = $id;
	$_SESSION['type']=$type;
        $_SESSION['company_name']=$company_name;
	
	echo "<script type='text/javascript' language='javascript'>location.replace('profile.php');</script>";
	}elseif ( $type == 'manufacturer') {
		$_SESSION['email'] = $dbemail;
		$_SESSION['profile_id'] = $id;
		$_SESSION['type']=$type;
                $_SESSION['company_name']=$company_name;

		echo "<script type='text/javascript' language='javascript'>location.replace('profile.php');</script>";
		}elseif( $type == 'distributor') { 
			$_SESSION['email'] = $dbemail;
			$_SESSION['profile_id'] = $id;
			$_SESSION['type']=$type;
                        $_SESSION['company_name']=$company_name;

			echo "<script type='text/javascript' language='javascript'>location.replace('profile.php');</script>";
			}
                        elseif ($type == 'buyer') {
                            $_SESSION['email'] = $dbemail;
                            $_SESSION['profile_id'] = $id;
                            $_SESSION['type'] = $type;
                            $_SESSION['company_name']=$company_name;

                            echo"<script type = 'text/javascript' language='javascript'>location.replace('profile.php');</script>";
                            
                        }
	
}else
die('<script type="text/javascript" language="javascript">alert("Incorrect Password");location.replace("index.php");
</script>');

}else 
	
	die ('<script type="text/javascript" language="javascript">alert("User Does Not Exist");location.replace("index.php");</script>');

}else
	die ('<script type="text/javascript" language="javascript">alert("Enter username and password");location.replace("index.php");</script>');

?>
</body>
</html>