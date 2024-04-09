<?php
session_start();
require_once '_db.php';
extract($_SESSION);

$sql= "SELECT termekek.kep, termekek.nev, termekek.id, felhasznalok.email, felhasznalok.vezeteknev, felhasznalok.keresztnev
FROM termekek, kedvencek, felhasznalok WHERE kedvencek.termek_id=termekek.id AND felhasznalok.email=kedvencek.email AND felhasznalok.email='{$email}' ORDER BY termekek.nev";

$stmt=$db->query($sql);

echo json_encode($stmt->fetchAll());
?>