<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>BANK BMH (Baitul Maal Hidayatullah) Makassar || Buka Rekening</title>
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,600;1,600&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,600;1,700&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,400;1,400&amp;display=swap" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="styles/styles.css" rel="stylesheet" />
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm" id="mainNav">
        <div class="container px-5">
            <a class="navbar-brand fw-bold" href="welcome_page.php">BANK BMH</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="bi-list"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto me-4 my-3 my-lg-0">
                    <li class="nav-item"><a class="nav-link me-lg-3" href="./antrian/index.php">Tentang Kami</a></li>
                    <li class="nav-item"><a class="nav-link me-lg-3" href="#features">Galery</a></li>
                    <li class="nav-item"><a class="nav-link me-lg-3" href="#download">Karir</a></li>
                </ul>
                <a href="login.php" class="btn btn-success rounded-pill px-3 mb-2 mb-lg-0">
                    <span class="d-flex align-items-center">
                        <!-- <i class="fa fa-user me-2"></i> -->
                        <span class="small">Login</span>
                    </span>
                </a>
            </div>
        </div>
    </nav>
    <div class="container px-5 mb-5">
        <h1 style="margin-top:100px">Formulir Pembukaan Rekening</h1>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST">
                            <div class="row">
                                <h3>Data Diri</h3>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">NIK</label>
                                        <input type="text" class="form-control" name="nik" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Nama</label>
                                        <input type="text" class="form-control" name="full_name" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Nomor Telepon</label>
                                        <input type="text" class="form-control" name="phone_number" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Nama Ibu Kandung</label>
                                        <input type="text" class="form-control" name="mother_name" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Jenis Kelamin</label>
                                        <select class="form-control" name="jenis_kelamin">
                                            <option value="">--Pilih--</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Wanita">Wanita</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Umur</label>
                                        <input type="number" class="form-control" name="age" value="<?= $data["age"] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">jobs</label>
                                        <input type="text" class="form-control" name="jobs">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Setoran Awal</label>
                                        <input type="text" class="form-control" name="initial_deposit">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Jenis Tabungan</label>
                                        <select class="form-control" name="type_of_savings">
                                            <option value="">--Pilih--</option>
                                            <option value="0">Tabungan Biasa</option>
                                            <option value="1">Deposito</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Alamat</label>
                                        <textarea name="address" id="" cols="20" rows="5" class="form-control"></textarea>
                                    </div>
                                </div>

                                <div class="float-end mt-2">
                                    <button class="btn btn-primary btn-md" name="submit">Daftar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>

</html>


<?php
include 'koneksi.php';

$randomNumber = random_int(1, 10000);

if (isset($_POST['submit'])) {

    $nik = $_POST['nik'];
    $nama = $_POST['full_name'];
    $phone_number = $_POST['phone_number'];
    $mother_name = $_POST['mother_name'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $umur = $_POST['age'];
    $jobs = $_POST['jobs'];
    $initial_deposit = $_POST['initial_deposit'];
    $type_of_savings = $_POST['type_of_savings'];
    $alamat = $_POST['address'];
    $id = $randomNumber;


    mysqli_query($db, "INSERT INTO customers(id,nik,full_name,phone_number, mother_name,gender,age,jobs,initial_deposit,type_of_savings,address) VALUES ('$id','$nik','$nama','$phone_number','$mother_name','$jenis_kelamin','$umur','$jobs','$initial_deposit','$type_of_savings','$alamat')");


    echo "<script>alert('Berhasil Mendaftar')</script>";
    // echo "<script>location='index.php?Page=dashboard'</script>";
    echo "<script>location='login.php'</script>";
}

?>