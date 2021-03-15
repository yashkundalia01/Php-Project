<?php
try{
	$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=net_Banking','root','yash123');
	$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 	
}
catch(PDOException $e){
	echo $e->getMessage();
	die();
}

?>