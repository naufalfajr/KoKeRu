<?php
require_once('functions/db_login.php');

$i = 0;
$j = 1;
$tanggal = '2020-12-';
echo $tanggal;
for ($k=0; $k < 3; $k++) { 
    for ($l=1; $l < 10; $l++) { 
        $query = " INSERT INTO trx (idruang, nama_ruang, idcs, nama_cs, bukti1, bukti2, bukti3, bukti4, bukti5, status, tanggal) VALUES (1, 'Anggrek', 1, 'Doni Hermawan', '', '', '', '', '', 0, '".$tanggal.$k.$l."') ";
        $result = $db->query($query);
    }
}
if (!$result) {
    die ("Could not query the database: <br>".$db->error."<br>Query: ".$query);
}
$result->free();
$db->close();
?>