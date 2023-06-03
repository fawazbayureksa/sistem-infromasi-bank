<?php
include './koneksi.php';

?>

<div class="">
    <h3 class="">
        Daftar Nasabah
    </h3>
    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>No Rekening</th>
                <th>Verifikasi</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $query = mysqli_query($db, "SELECT * FROM customers");
            while ($data = mysqli_fetch_assoc($query)) {
            ?>
                <tr class="">
                    <td><?= $no++ ?></td>
                    <td><?= $data["nik"] ?></td>
                    <td><?= $data["full_name"] ?></td>
                    <td><?= $data["account_number"] ?></td>
                    <td><?= $data['is_verified'] == 1 ? 'Verified' : 'Belum diverifikasi' ?></td>
                    <td width="20%">
                        <a href="?Page=customer-profil-delete&id=<?= $data['id'] ?>" class="btn btn-danger btn-xs">Delete</a>
                        <a href="?Page=customer-profil&id=<?= $data['id'] ?>" class="btn btn-warning btn-xs">Edit</a>
                        <a href="?Page=customer-profil&id=<?= $data['id'] ?>" class="btn btn-success btn-xs">Lihat</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</div>