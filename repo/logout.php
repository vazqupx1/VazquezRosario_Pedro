<?php
session_start();

session_destroy();

echo '<script type="text/javascript" language="javascript">location.replace("index.php");</script>';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Loggin out...</title>
<!--  <link href="css/layout.css" rel="stylesheet" type="text/css" />  -->
</head>

<body>
</body>
</html>