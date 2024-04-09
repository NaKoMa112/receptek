<?php

require_once "_db.php";
$sql= "SELECT termekek.kep, termekek.nev, termekek.id
    FROM termekek ORDER BY termekek.nev";

$stmt=$db->query($sql);

echo json_encode($stmt->fetchAll());
?>