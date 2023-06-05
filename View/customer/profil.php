<?php

include './koneksi.php';

$id = isset($_GET['id']) ? $_GET['id'] : $_SESSION['admin']['id'];

$query = "SELECT * FROM customers WHERE id ='$id'";


$data = mysqli_query($db, $query);

$datas = mysqli_fetch_assoc($data);

// print_r($datas);
?>

<div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="container">
                    </div>
                    <form method="POST">
                        <div class="row">
                            <h4 class="">Profil <?= $datas['full_name'] ?></h4>
                            <?php if ($datas['is_verified'] == 1) {
                                echo '<span class="text-success">Verified</span>';
                            } else {
                                echo '<span class="text-danger">Not Verified</span>';
                            } ?>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="">NIK</label>
                                    <input type="text" class="form-control" value="<?= $datas['nik'] ?>" name="nik" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="">Nama</label>
                                    <input type="text" class="form-control" value="<?= $datas['full_name'] ?>" name="full_name" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="">No Rekening</label>
                                    <input type="text" class="form-control" value="<?= $datas['account_number'] ?>" name="account_number" disabled />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="">Nomor Telepon</label>
                                    <input type="text" class="form-control" value="<?= $datas['phone_number'] ?>" name="phone_number" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="">Nama Ibu Kandung</label>
                                    <input type="text" class="form-control" value="<?= $datas['mother_name'] ?>" name="mother_name" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="">Jenis Kelamin</label>
                                    <select class="form-control" name="jenis_kelamin">
                                        <option value="">--Pilih--</option>
                                        <option value="Laki-Laki" <?php if ($datas['gender'] == 'Laki-laki') echo 'selected'; ?>>Laki-laki</option>
                                        <option value="Wanita" <?php if ($datas['gender'] == 'Wanita') echo 'selected'; ?>>Wanita</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="">Umur</label>
                                    <input type="number" class="form-control" name="age" value="<?= $datas["age"] ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="">jobs</label>
                                    <input type="text" class="form-control" name="jobs" value="<?= $datas['jobs'] ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="">Setoran Awal</label>
                                    <input type="number" class="form-control" name="initial_deposit" value="<?= $datas['initial_deposit'] ?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="">Saldo</label>
                                    <input type="number" class="form-control" name="balance" value="<?= $datas['balance'] ?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="">Jenis Tabungan</label>
                                    <select class="form-control" name="type_of_savings">
                                        <option value="">--Pilih--</option>
                                        <option value="0" <?php if ($datas['type_of_savings'] == '0') echo 'selected'; ?>>Tabungan Biasa</option>
                                        <option value="1" <?php if ($datas['type_of_savings'] == '1') echo 'selected'; ?>>Deposito</option>

                                    </select>
                                </div>
                            </div>
                            <?php if ($datas['type_of_savings'] == '1') { ?>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label for="">Bunga Deposito</label>
                                        <input type="text" class="form-control" name="" value="0,8% / Bulan" disabled>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="col-md-12">
                                <div class="form-group mb-2">
                                    <label for="">Alamat</label>
                                    <textarea name="address" class="form-control"><?= $datas['address'] ?></textarea>
                                </div>
                            </div>

                            <div class="mt-2">
                                <button class="btn btn-warning btn-md" name="submit">Edit</button>
                                <?php if ($datas['is_verified'] == 0) { ?>
                                    <button class="btn btn-success btn-md" name="verify">Verifikasi</button>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
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

        mysqli_query($db, "UPDATE customers 
        SET 
        nik = '$nik' ,
        full_name ='$nama',
        phone_number = '$phone_number' ,
        mother_name = '$mother_name' ,
        gender = '$jenis_kelamin' ,
        age = '$umur',
        jobs = '$jobs',
        initial_deposit = '$initial_deposit' ,
        type_of_savings = '$type_of_savings',
        address = '$alamat'  
        WHERE 
        id='$ids'");



        echo "<script>alert('Berhasil di edit')</script>";
        echo "<script>location='?Page=customer-profil'</script>";
    }

    function generateAccountNumber()
    {
        $prefix = "1122"; // Awalan nomor rekening
        $randomDigits = rand(10000000, 99999999); // Menghasilkan angka acak antara 10 juta hingga 99 juta

        $accountNumber = $prefix . $randomDigits;
        return $accountNumber;
    }

    $number = generateAccountNumber();


    if (isset($_POST['verify'])) {

        mysqli_query($db, "UPDATE customers SET is_verified= 1, account_number='$number' WHERE id='$id'");

        echo "<script>alert('Berhasil di Verfikasi')</script>";
        echo "<script>location='?Page=customer-profil&id=$id'</script>";
    }




    ?>
</div>