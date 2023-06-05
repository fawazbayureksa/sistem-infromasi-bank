<?php
include './koneksi.php';

$ids = $_SESSION['admin']['id'];
$query = "SELECT * FROM customers WHERE id ='$ids'";

$data = mysqli_query($db, $query);

$datas = mysqli_fetch_assoc($data);

?>

<div>
    <h3 class="" style="font-weight: 600;">Transaksi</h3>
    <br />
    <div>
        <form method="POST">
            <div class="row mb-3">
                <!-- <div class="form-group">
                    <label for="noRekening">Nomor Rekening Tujuan</label>
                    <input type="text" class="form-control mb-3" id="noRekening" placeholder="Masukkan Nomor rekening Tujuan">
                </div> -->
                <div class="form-group">
                    <label for="noHP">Nama</label>
                    <input type="text" class="form-control mb-3" id="nama" placeholder="Masukkan Nama">
                </div>
                <div class="form-group">
                    <label for="noHP">Nomor Handphone</label>
                    <input type="text" class="form-control mb-3" id="noHP" placeholder="Masukkan nomor HP">
                </div>
                <div class="form-group">
                    <label for="">Jenis Transaksi</label>
                    <select class="form-control mb-3" name="type" id="mySelect">
                        <option value="">--Pilih--</option>
                        <option value="0">Setoran</option>
                        <option value="1">Penarikan</option>
                        <option value="2">Deposito</option>
                    </select>
                    <div style="font-size: 12px;color:red;" id="selectedText"></div>
                </div>
                <div class="form-group mb-3" id="periode" style="display: none;">
                    <label for="jumlahPenarikan">Periode</label>
                    <input type="number" class="form-control" id="period" name="period" placeholder="Masukkan jumlah bulan">
                    <small class="text-danger">Bonus perbulan 0,8%</small>
                </div>
                <div class="form-group">
                    <label for="jumlahPenarikan" id="text">Jumlah</label>
                    <input type="number" class="form-control mb-3" id="jumlahPenarikan" name="total" placeholder="Masukkan jumlah">
                </div>
                <div class="form-group">
                    <label for="jumlahPenarikan">Saldo</label>
                    <input type="number" class="form-control mb-3" id="" value="Rp<?= number_format($datas['balance']) ?>" disabled>
                </div>
            </div>
            <button type="submit" name="simpan" class="btn btn-primary">Kirim</button>
        </form>
    </div>
</div>

<?php

function generateAccountNumber()
{
    $prefix = "99"; // Awalan nomor rekening
    $randomDigits = rand(100000, 99999); // Menghasilkan angka acak antara 10 juta hingga 99 juta

    $accountNumber = $prefix . $randomDigits;
    return $accountNumber;
}


if (isset($_POST['simpan'])) {


    $id = generateAccountNumber();

    $number = $datas['account_number'];
    $nik = $datas['nik'];
    $total = $_POST['total'];
    $type = $_POST['type'];
    $period = $_POST['period'];

    $balance = 0;
    if ($type == '0') {
        $balance = $total + $datas['balance'];
    } else {
        $balance = $datas['balance'] - $total;
    }

    mysqli_query($db, "INSERT INTO transactions(id,account_number,nik,withdrawal_amount,type_transaction,period) VALUES ('$id','$number','$nik','$total','$type','$period') ");
    mysqli_query($db, "UPDATE customers SET balance = '$balance' WHERE id='$ids'");

    echo "<script>alert('Transaksi Berhasil')</script>";
    echo "<script>location='?Page=report-transaction'</script>";
}

?>



<script>
    $(document).ready(function() {
        $('#mySelect').change(function() {
            var selectedOption = $(this).val();
            var textToShow = "";

            if (selectedOption === "0") {
                textToShow = "Jumlah Setoran";
                $("#periode").css("display", "none");
            } else if (selectedOption === "1") {
                textToShow = "Jumlah Penarikan";
                $("#periode").css("display", "none");
            } else if (selectedOption === "2") {
                $("#periode").css("display", "block");
            }

            $('#text').text(textToShow);
        });
    });
</script>