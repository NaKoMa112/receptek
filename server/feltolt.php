<?php

require_once "db.php";
extract($_POST);
$sql="INSERT INTO termekek VALUES (null, '{$nev}', '{$leiras}', '')";
$stmt= $db->exec($sql);
if ($stmt){
    $id= $db->lastInsertId();

    echo $id;
}
else
    echo false;
?>