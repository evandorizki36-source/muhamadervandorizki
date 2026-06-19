<?php

require_once '../database.php';
require_once '../users.php';

$username = $_POST['Username'];
$email = $_POST['email'];
$asal = $_POST['Asal'];
$password = $_POST['password'];
$id = $_POST["id"];

$database = new Database();
$db = $database->connect();

$user = new Users($db);
$user -> update($id, $username, $email, $asal, $password);

header("Location: index.php");
