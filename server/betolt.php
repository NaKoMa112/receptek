<?php

require_once "db.php";
$sql= "SELECT termekek.kep, termekek.nev, termekek.id
    FROM termekek ORDER BY termekek.nev DESC";

$stmt=$db->query($sql);

echo json_encode($stmt->fetchAll());
?>