<?php 
session_start();
require_once 'db.php';
extract($_GET);
extract($_SESSION);

$sql="SELECT kedvencek.termek_id FROM kedvencek, felhasznalok WHERE felhasznalok.email=kedvencek.email";

$stmt=$db->query($sql);

echo json_encode($stmt->fetchAll());
?>