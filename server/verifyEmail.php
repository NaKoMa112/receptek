<?php
session_start();
require_once '_db.php';
extract($_GET);

$sql = "SELECT COUNT(*) NR FROM felhasznalok WHERE email='{$email}'";

    $stmt = $db->query($sql);
    echo json_encode($stmt->fetch());

?>