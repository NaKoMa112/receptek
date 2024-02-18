<?php
require_once "db.php";

// A php://input streamből olvassuk be az adatokat
$postdata = file_get_contents("php://input");

// Ellenőrizzük, hogy valóban vannak adatok
if ($postdata) {
    // JSON dekódolás
    $hozzavalok = json_decode($postdata, true);
    if ($hozzavalok) {
        $sql = "";
        foreach ($hozzavalok as $hozzavalo) {
            extract($hozzavalo);
            $sql .= "INSERT INTO hozzavalok VALUES (null, {$termekid}, '{$kep}', '{$nev}', '{$mennyiseg}', '{$mertekegyseg}');";
        }
        $stmt = $db->exec($sql);
        if ($stmt) {
            // Ha az INSERT műveletek sikeresek voltak, akkor valamit vissza kell küldenünk
            echo "Success";
        } else {
            // Ha valami hiba történt, akkor azt is jelzni kell
            echo "Error";
        }
    } else {
        // Ha nem sikerült a JSON dekódolás
        echo "Invalid JSON data";
    }
} else {
    // Ha nincsenek adatok a POST kérésben
    echo "No data received";
}
?>
