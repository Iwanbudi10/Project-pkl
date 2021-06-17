<?php
// deklarasi parameter koneksi database
$server   = "localhost";
$username = "root";
$password = "d4t4ut4M4";
$database ="tiketdesk";

// koneksi database
$mysqli = new mysqli($server, $username, $password, $database);

// cek koneksi
if ($mysqli->connect_error) {
    die('Koneksi Database Gagal : '.$mysqli->connect_error);
}
?>
