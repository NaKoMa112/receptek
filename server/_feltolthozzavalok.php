<?php

require_once "db.php";
echo json_encode($_POST);
/*$hozzavalok=json_decode($_POST);
if ($hozzavalok) {
    foreach($hozzavalok as $hozzavalo){
        print_r($hozzavalo);
    }
}
/*$sql="";
$stmt= $db->exec($sql);
if ($stmt){
    $id= $db->lastInsertId();

    echo $id;
}
else
    echo false;
$sql="INSERT INTO hozzavalok VALUES (null, 7, 'liszt', '200', 'gramm');
    INSERT INTO hozzavalok VALUES (null, 7, 'só', '10', 'gramm')";

    */
?>