<?php
session_start();
// print_r($_SESSION);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>
    <?php
    include './template/sidebar.php';
    ?>
    <div class="col py-3">
        <?php
        if (isset($_GET['Page'])) {
            if ($_GET['Page'] == "dashboard") {
                include 'home.php';
            } elseif ($_GET['Page'] == "customers") {
                include './View/customer/index.php';
            } elseif ($_GET['Page'] == "customer-profil") {
                include './View/customer/profil.php';
            } elseif ($_GET['Page'] == "customer-profil-delete") {
                include './View/customer/delete.php';
            } elseif ($_GET['Page'] == "transaction") {
                include './View/transaction/transaction.php';
            } elseif ($_GET['Page'] == "report-transaction") {
                include './View/transaction/index.php';
            }
        }
        // print_r($_GET['Page']);

        ?>
    </div>
    </div>
    </div>

</body>


</html>