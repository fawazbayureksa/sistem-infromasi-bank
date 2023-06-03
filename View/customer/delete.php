<?php
include './koneksi.php';

$id = $_GET['id'];

mysqli_query($db, "DELETE FROM customers WHERE id = '$id'");
echo "<script>alert('Data berhasil dihapus')</script>";
echo "<script>location='?Page=customers'</script>";
