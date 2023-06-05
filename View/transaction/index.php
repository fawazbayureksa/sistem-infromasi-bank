<?php
date_default_timezone_set('Asia/Jakarta');
include './koneksi.php';
?>

<div>
    <h3>Transaction</h3>
    <form method="POST">
        <div class="row mb-3">
            <div class="col-md-6 form-group">
                <label for="">Nama</label>
                <input type="text" class="form-control" id="" name="nama">
            </div>
            <div class="col-md-6 form-group">
                <label for="">No Rekening</label>
                <input type="text" class="form-control" id="" name="no_rek">
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 mb-3">
                <label for="startDate">Tanggal Awal</label>
                <input type="date" class="form-control" id="startDate" name="startDate">
            </div>
            <div class="col-md-5 mb-3">
                <label for="endDate">Tanggal Akhir</label>
                <input type="date" class="form-control" id="endDate" name="endDate">
            </div>
            <div class="col-md-2 align-self-center">
                <button type="submit" class="btn btn-primary" id="cari" name="cari">Cari</button>
            </div>
        </div>
    </form>
    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Nama</th>
                <th>No Rekening</th>
                <th>Keterangan</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $id = $_SESSION['admin']['nik'];

            $no = 1;
            if ($_SESSION['admin']['is_type'] == 0) {
                if (isset($_POST['cari'])) {
                    $start = $_POST['startDate'];
                    $end = $_POST['endDate'];
                    $name = $_POST['nama'];
                    $number = $_POST['no_rek'];

                    echo "Data berhasil difilter dengan: $name $start $end ";
                    $query = mysqli_query($db, "SELECT * FROM transactions JOIN customers ON transactions.nik = customers.nik WHERE time_transaction BETWEEN '$start' AND '$end' OR customers.full_name ='$name' OR customers.account_number = '$number' ");
                } else {
                    $query = mysqli_query($db, "SELECT * FROM transactions JOIN customers ON transactions.nik = customers.nik");
                }
            } else {
                if (isset($_POST['cari'])) {
                    $start = $_POST['startDate'];
                    $end = $_POST['endDate'];
                    $name = $_POST['nama'];
                    $number = $_POST['no_rek'];

                    echo "Data berhasil difilter dengan: $name $start $end ";
                    $query = mysqli_query($db, "SELECT * FROM transactions JOIN customers ON transactions.nik = customers.nik WHERE  transactions.nik='$id' AND time_transaction BETWEEN '$start' AND '$end' OR customers.full_name ='$name' OR customers.account_number = '$number'   ");
                } else {
                    $query = mysqli_query($db, "SELECT * FROM transactions JOIN customers ON transactions.nik = customers.nik WHERE transactions.nik='$id'");
                }
            }

            while ($data = mysqli_fetch_assoc($query)) {
            ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data['time_transaction'] ?></td>
                    <td><?= $data['full_name'] ?></td>
                    <td><?= $data['account_number'] ?></td>
                    <td><?= $data['type_transaction'] == 0 ? 'Setoran Tunai' : 'Tarik Tunai' ?></td>
                    <td>Rp<?= number_format($data['withdrawal_amount']) ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <div>
        <a href="" id="cetak" onclick="" class="btn btn-secondary">Cetak</a>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#cetak').click(function() {
            $("#sidebar").css("display", "none");
            $("#cari").css("display", "none");
            $("#cetak").css("display", "none");
            window.print();
        });
    });
</script>