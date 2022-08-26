<?php require_once("../App.php");?>
<?php require_once(ROOT."/private/controllers/payment.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>

    <!-- css -->
    <link rel="stylesheet" href="<?=BASEURL?>assets/css/main.css">
    
    <!-- bootstrap CDN -->
    <link rel="stylesheet" href="<?= BASEURL ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
</head>
<body>
<style>
    section{
        padding: 60px 0;
    }
</style>


<div class="container-fluid">
<div class="container-lg">
    <div class="row justify-content-center align-items-center mb-4">
    <div class="col-md-5 text-center text-md-start">
        <!-- form  -->
        <form id="paymentForm" action="" method="post">
        <div class="p-4 mx-auto shadow rounded" style="width:100%;margin-top:50px;max-width:340px;">

                <!-- message -->
                <div></div>

        <h2 class="text-center">Payment Options</h2>
    <div class="form-submit">
        <button class="btn btn-secondary" type="submit" onclick="payWithPaystack()">
        Pay-Online
        </button>
        <a href="order?userId=<?=$user['id']?>" class="text-center text-decoration-none">
            <h3 class="float-end mt-0">Pay-Offline</h3>
        </a>
    </div>
    </form>
    </div>
    </div>
</div>
</div>


