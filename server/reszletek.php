<?php

require_once "_db.php";
extract($_GET);
$sql= "SELECT termekek.kep, termekek.nev AS tnev, hozzavalok.nev AS hnev, hozzavalok.mennyiseg, hozzavalok.mertekegyseg, termekek.leiras
FROM termekek, hozzavalok
    WHERE hozzavalok.termek_id=termekek.id AND termekek.id={$id}";
$stmt=$db->query($sql);

echo json_encode($stmt->fetchAll());
?>