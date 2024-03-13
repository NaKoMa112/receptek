<?php
session_start();
require_once 'db.php';
extract($_SESSION);

$sql= "SELECT felhasznalok.email, felhasznalok.vezeteknev, felhasznalok.keresztnev
FROM felhasznalok WHERE felhasznalok.email='{$email}'";

$stmt=$db->query($sql);

echo json_encode($stmt->fetchAll());
?>