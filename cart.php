<?php require_once("App.php");?>
<?php require_once(ROOT."/private/models/dbFunctions.php");?>
<?php require_once(ROOT."/private/controllers/cart.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>

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
            <?php if($cartItem): ?>
            <a class="nav-link fw-bold" href="<?=BASEURL?>cart"><i class="bi bi-cart-fill"></i><sup><?=$cartItem?></sup></a>
            <?php endif;?>
        </li>
        <li class="nav-item">
            <a class="nav-link fw-bold" aria-current="page" href="<?=BASEURL?>register">Register</a>
        </li>
        </ul>
        </div>
    </div>
</div> <!-- Nav Finished -->

<nav class="navbar navbar-light bg-secondary">
<div class="container-fluid">
    <span class="navbar-text text-light fw-bold">
    <?php if(isset($_SESSION['id'])): ?>
    <?=$_SESSION['firstname']?>  
    <a href="<?=BASEURL?>logout" class="navbar-text text-light fw-light" style="text-decoration: none;">Logout</a>
    <?php else: ?>
        <a href="<?=BASEURL?>login" class="navbar-text text-light fw-light" style="text-decoration: none;">Login</a>
    <?php endif; ?>
    </span>
</div>
</nav>


<div class="bg-light"> <!-- Description -->
    <h3 class="text-center">Best Store</h3>
    <p class="text-center">Communication is at the heart of a e-cormmerce and community</p>
</div> <!-- Description end -->

<form action="" method="post">
<div class="container shadow">
    <div class="row">
    <table class="table table-bordered table-striped table-hover" >
    <thead>
    <tr>
    <th scope="col">Name</th>
    <th scope="col">Image</th>
    <th scope="col">Quantity</th>
    <th scope="col">Price</th>
    <th scope="col">Remove</th>
    </tr>
    </thead>
    <tbody>
    <?php if($allCarts): ?>
    <?php foreach($allCarts as $allCart): ?>
    <tr>
        <th scope="row"><?=$allCart['name']?></th>
        <td><img src="admin/product/<?=$allCart['image']?>" alt="" style="width:50px;"></td>
        <td><input type="text" name="qty"  class="form-control w-50"></td>
        <td><?=$allCart['price']?></td>
        <td><input type="checkbox" name="removeCart[]" value="<?=$allCart['product_slug']?>"></td>
    <td>
    <input type="hidden" name="" value="">
    <button class="btn btn-sm btn-outline-secondary" name="updateCart">Update</button>
    <button type="submit" name="remove" class="btn btn-sm btn-outline-danger" style="display:inline-block;"><i class="bi bi-trash"></i>Delete</button>
    </td>
    </tr>
    <?php endforeach; ?>
    <?php else: ?>
        <h3 class="text-center fw-bolder">No Cart Found !</h3>
    <?php endif;  ?>
    </tbody>
</table>
<div class="d-flex mb-3">
    <h4 class="px-4">Subtotal: <strong class="text-info"><?=$cartPrice?></strong></h4>
    <a href="index" class="bg-info px-3 mx-3 py-2 border-0 text-light" style="text-decoration: none;">Continue Shopping</a>
    <a href="<?=BASEURL?>user/checkout" class="bg-secondary px-3 py-2 border-0 text-light" style="text-decoration: none;">Checkout</a>
</div>
    </div>
</div>
</form>
<?php include(ROOT."/private/includes/homeFooter.php"); ?>


