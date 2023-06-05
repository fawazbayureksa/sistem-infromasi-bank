<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN - BANK BMH (Baitul Maal Hidayatullah) Makassar</title>
    <link rel="stylesheet" href="styles/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-header bg-F48020 text-center">
                        <!-- <img src="assets/img/logo.png" width="50px"> -->
                        <h3 style="color: white;">Login</h3>
                    </div>
                    <div class="card p-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10">
                                <form method="post">
                                    <div class="form-group">
                                        <label>email</label>
                                        <input type="email" name="user" class="form-control" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="pass" class="form-control" autocomplete="off">
                                    </div>
                                    <div class="mt-3 text-center">
                                        <button class="btn btn-primary btn-md" name="login"><i class="fa fa-paper-plane"></i> Masuk</button>
                                        <a href="welcome_page.php" class="btn btn-danger btn-md">Kembali</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="styles/js/bootstrap.min.js"></script>

</html>

<?php

include 'koneksi.php';

if (isset($_POST['login'])) {

    $pass = sha1($_POST['pass']);

    $query = mysqli_query($db, "SELECT * FROM users WHERE email='$_POST[user]' and password='$pass'");
    $cek = mysqli_num_rows($query);

    if ($cek == 1) {

        $_SESSION['admin'] = mysqli_fetch_assoc($query);

        echo "<script>alert('Login Berhasil');</script>";
        echo "<script>location='index.php?Page=dashboard'</script>";
    } else {
        echo  "<script>alert('Login Gagal , Masukkan Data Yang Benar!!!');</script>";
        echo "<meta http.equiv='refresh' content='1;url=login.php'>";
    }
}
?>