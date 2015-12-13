<?php
$hostname_sql ="localhost";
$username_sql = "root";
$password_sql = "go2ooguG";
$database_connection = "agrowebpr";
$sql = mysql_pconnect($hostname_sql, $username_sql, $password_sql) or trigger_error(mysql_error(),E_USER_ERROR); 

?>