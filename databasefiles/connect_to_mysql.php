<?php  
/*  
1: "die()" will exit the script and show an error statement if something goes wrong with the "connect" or "select" functions. 
2: A "mysql_connect()" error usually means your username/password are wrong  
3: A "mysql_select_db()" error usually means the database does not exist. 
*/ 

$db_host = "localhost"; 
$db_username = "root";  
$db_pass = "";  
$db_name = "gamestoredb"; 

@mysql_connect("$db_host","$db_username","$db_pass") or die ("could not connect to mysql");
@mysql_select_db("$db_name") or die ("no database");              
?>
