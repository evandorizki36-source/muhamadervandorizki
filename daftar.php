<?php

require_once "database.php";
require_once "users.php";

$username = $_POST["username"] ?? "";
$email = $_POST["email"] ?? "";
$asal = $_POST["asal"] ?? "";
$password = $_POST["password"] ?? "";
$password_ulang = $_POST["password_ulang"] ?? "";

if (isset($_POST["setuju"])) {

    echo "Anda telah menyetujui form <br>";

    if ($password == $password_ulang) {

    
        $database = new Database();
        $conn = $database->connect();
        $user = new Users($conn);

    
        $user->create(
            $username,
            $email,
            $asal,
            $password,
            $password_ulang
        );

    } else {

        echo "Password tidak sama";

    }

} else {

    echo "Anda harus menyetujui form";

}

?>