<?php 
session_start();
require_once '_db.php';
extract($_GET);
extract($_SESSION);

$sql="SELECT kedvencek.termek_id FROM kedvencek, felhasznalok WHERE felhasznalok.email=kedvencek.email AND felhasznalok.email='{$email}'";

$stmt=$db->query($sql);

echo json_encode($stmt->fetchAll());
?>