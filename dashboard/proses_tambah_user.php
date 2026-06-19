<?php

require_once '../database.php';
require_once '../users.php';

// 1. TETAP HURUF KECIL: Karena mengambil dari <input name="username"> dan name="asal" di form HTML Anda
$username = $_POST['username'] ?? '';
$email = $_POST['email'] ?? '';
$asal = $_POST['asal'] ?? '';
$password = $_POST['password'] ?? '';
$password_ulang = $password; // Menyamakan password ulang agar lolos validasi di class Users

$database = new Database();
$db = $database->connect();
$user = new Users($db);

// 2. DI SINI VARIABEL DIKIRIM: Fungsi create akan membaca variabel $username dan $asal ini 
// untuk dimasukkan ke kolom database Anda yang berhuruf besar (Username & Asal)
$result = $user->create($username, $email, $asal, $password, $password_ulang);
    
header("Location: index.php");
exit();
?>