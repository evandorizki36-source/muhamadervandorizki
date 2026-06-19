<?php

require_once '../database.php';
require_once '../users.php';

$database = new Database();
$db = $database->connect();

$User = new Users($db); 
$id = $_GET['id'] ?? '';

$user_data = null;  
if (!empty($id)) {
    $user_data = $User->ambilUserdariId($id); 
}
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h1 class="mt-4">Edit User</h1>
    <hr />
    <div class="table-responsive small">
        <form action="proses_edit_user.php" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="Username" name="Username" value="<?php echo $user_data['Username'] ?? ''; ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $user_data['email'] ?? ''; ?>" required>
            </div>
            <div class="mb-3">
                <label for="asal" class="form-label">Asal</label>
                <input type="text" class="form-control" id="Asal" name="Asal" value="<?php echo $user_data['Asal'] ?? ''; ?>" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" value="<?php echo $user_data['password'] ?? ''; ?>" required>
            </div>
            
            <input type="hidden" name="id" value="<?php echo $user_data['ID'] ?? ''; ?>">
            
            <button type="submit" class="btn btn-primary">Edit User</button>
        </form>
    </div>
</main>