<?php
session_start();

require_once "database.php";
require_once "users.php";

$username = $_POST['input_username'] ?? '';
$password = $_POST['input_password'] ?? '';

$db = new Database();
$conn = $db->connect();

$users = new Users($conn);

$ditemukan = $users->login($username, $password);

if ($ditemukan == false) {
    $_SESSION['pesan_kesalahan'] = "login gagal";
    header("Location: index.php");
    exit();
} else {
    $_SESSION['is_logged_in'] = true;
    $_SESSION['username'] = $username;

    if (!isset($_SESSION['login_count'])) {
        $_SESSION['login_count'] = 1;
    } else {
        $_SESSION['login_count']++;
    }

    header("Location: dashboard/index.php");
    exit();
}
?>