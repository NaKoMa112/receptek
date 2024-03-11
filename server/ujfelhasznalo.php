<?php
session_start();
require_once 'db.php';
extract($_POST);

$pwh =password_hash($pw, PASSWORD_DEFAULT);
$sql = "INSERT INTO felhasznalok VALUES (null, '{$vnev}', '{$knev}', '{$email}', '{$pwh}')";

$stmt=$db->exec($sql);
echo json_encode(["msg"=>"sikeres bejelentkezés"]);

?>