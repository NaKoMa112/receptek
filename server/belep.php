<?php
session_start();
require_once '_db.php';
extract($_POST);

$sql = "SELECT jelszo,email FROM felhasznalok WHERE email ='{$email}'";

$stmt = $db->query($sql);
if ($stmt->rowCount()==1) {
    $row=$stmt->fetch();
    extract($row);
    $isValid=password_verify($pw, $jelszo);
    if($isValid) {
        $_SESSION["email"]=$email;
        //echo json_encode(["msg"=>"ok"]);
        echo true;
    }else{
        echo json_encode(["msg"=>"hibás jelszó vagy email cím"]);
    }
}else{
    echo json_encode(["msg"=>"nem létező email cím"]);
}


?>