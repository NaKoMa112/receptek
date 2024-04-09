<?php

require_once "_db.php";
extract($_POST);
$sql="INSERT INTO termekek VALUES (null, '{$nev}', '{$leiras}', '{$kep}')";
$stmt= $db->exec($sql);
if ($stmt){
    $id= $db->lastInsertId();

    echo $id;
}
else
    echo false;
?>