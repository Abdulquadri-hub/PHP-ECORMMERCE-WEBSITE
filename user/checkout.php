<?php require_once("../App.php");?>
<?php ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>

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


<div class="navbar navbar-expand-md navbar-light bg-light"> <!-- nav bar start-->
    <div class="container-xxl">
        <a href="<?=BASEURL?>" class="navbar-brand">
            <span class="fw-bold text-secondary mx-4">
                E-COMMERCE WEBSITE
            </span>
        </a>

        <!-- toggle button for mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-nav" aria-controls="main-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- End of button for mobile -->

        <!-- navbar-links -->
        <div class="collapse navbar-collapse justify-content-end align-center" id="main-nav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link active fw-bold" aria-current="page" href="<?=BASEURL?>">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link fw-bold" aria-current="page" href="<?=BASEURL?>contact">Contact</a>
        </li>
        <li class="nav-item">
            <a class="nav-link fw-bold" aria-current="page" href="<?=BASEURL?>register">Register</a>
        </li>
        </ul>
        </div>
    </div>
</div> <!-- Nav Finished -->

<nav class="navbar navbar-light bg-secondary">  <!-- Sub Nav  -->
<div class="container-fluid">
    <span class="navbar-text text-light fw-bold">
    <?php if(isset($_SESSION['id'])): ?>
    <?=$_SESSION['firstname']?>  
    <a href="<?=BASEURL?>logout" class="navbar-text text-light fw-light" style="text-decoration: none;">Logout</a>
    <?php else: ?>
        <a href="" class="navbar-text text-light fw-light" style="text-decoration: none;">Login</a>
    <?php endif; ?>
    </span>
</div>
</nav><!-- End Sub Nav  -->


<div class="row px-1">
    <div class="col-md-12">
        <!-- products -->
        <div class="row">
        <?php include(ROOT."/private/controllers/checkout.php"); ?>
    </div> 
</div>

<?php include(ROOT."/private/includes/homeFooter.php"); ?>


