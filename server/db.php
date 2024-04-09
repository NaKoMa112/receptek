<?php
$host = 'localhost';
$db_name = 'sutemenyek';
$db_username = 'sutemenyek'; 
$db_password = 'sutemenyek'; 

$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC];     
try{
    $db = new PDO("mysql:host=$host;dbname=$db_name; charset=utf8",$db_username,$db_password,$options);
    //echo 'sikeres kapcsolódás';
}catch(PDOException $e)	{
    echo "hiba: az adatbazis kapcsolodas sikertelen !!!".$e->getMessage();
    exit;
}		
?>