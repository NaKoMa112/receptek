<?php 
session_start();
require_once '_db.php';
extract($_GET);
extract($_SESSION);

$sql="INSERT INTO kedvencek VALUES (NULL, '{$email}', {$termek_id})";

$stmt= $db->exec($sql);
if ($stmt){
    $id= $db->lastInsertId();

    echo $id;
}
else
    echo false;
?>