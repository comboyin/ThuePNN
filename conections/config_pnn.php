<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_config = "localhost";
$database_config = "phinongnghiep";
$username_config = "root";
$password_config = "root";
$config=mysql_connect($hostname_config, $username_config, $password_config) or die("Loi mysql");
mysql_select_db($database_config, $config);
//$config = mysql_pconnect($hostname_config, $username_config, $password_config) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_query("set names 'utf8'");

?>