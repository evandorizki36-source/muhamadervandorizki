 <?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include '../users.php';
include '../database.php';

$db = new Database();
$conn = $db->connect();
$users = new Users($conn);

$result = $users->getAllUsers();
$daftar_user = [];

if ($result) {
    $daftar_user = $result->fetch_all(MYSQLI_ASSOC);
}
?>
 <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          <h1 class="mt-4">Daftar User</h1><hr  />
<div class="alert alert-success">
    Selamat Datang
    <?php echo $_SESSION['username']; ?>,
    Anda telah login sebanyak
    <?php echo $_SESSION['login_count']; ?>
    kali.
</div>
<a href="index.php?halaman=tambah_users_form.php" class="btn btn-primary mb-3">Tambah User</a>
          <div class="table-responsive small">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Username</th>
                  <th scope="col">Email</th>
                  <th scope="col">Asal</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
              <?php
              foreach ($daftar_user as $user) {
              ?>
              <tr>
                <td><?php echo $user['ID']; ?></td>
                <td><?php echo $user['Username']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td><?php echo $user['Asal']; ?></td>
                <td>
                <a href="delete_users.php?id=<?php echo $user['ID']; ?>"
   class="btn btn-danger btn-sm"
   onclick="return confirm('Yakin ingin menghapus data ini?')">
   Delete</a> | <a href=index.php?halaman=edit_user_form.php&id=<?php echo $user['ID'];?>>edit</a>
              </td>
              </tr>
              <?php
  
              }
              ?>
              </tbody>
            </table>
          </div>
        </main>