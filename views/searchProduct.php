<?php require_once("../App.php");?>
<?php require_once(ROOT."/private/models/dbFunctions.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

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
        <a href="#intro" class="navbar-brand">
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
            <a class="nav-link fw-bold" aria-current="page" href="#">Products</a>
        </li>
        <li class="nav-item">
            <a class="nav-link fw-bold" aria-current="page" href="#">Contact</a>
        </li>
        <li class="nav-item">
            <?php if($cartItem): ?>
            <a class="nav-link fw-bold" href="cart"><i class="bi bi-cart-fill"></i><sup><?=$cartItem?></sup></a>
            <?php else:?>
                <a class="nav-link fw-bold" href="cart"><i class="bi bi-cart-fill"></i><sup></sup></a>
            <?php endif;?>
        </li>
        <li class="nav-item">
            <a class="nav-link fw-bold" aria-current="page" href="#">Register</a>
        </li>
        <li class="nav-item">
        <?php if($cartPrice): ?>
            <span class="nav-link fw-bold" aria-current="page" href="#">Total Price: <?=$cartPrice?>/-</span>
            <?php else:?>
                <span class="nav-link fw-bold" aria-current="page" href="#">Total Price: 0/-</span>
            <?php endif;?>
        </li>
        </ul>
        <form class="d-flex" method="get" role="search">
        <input class="form-control me-2" value="<?=$search?>" name= "search" type="search" placeholder="Search" aria-label="Search">
        <button  class="btn btn-outline-success" type="submit">
            <a href="views/searchProduct">Search</a>
            </button>
        </form>
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


<div class="bg-light"> <!-- Description -->
    <h3 class="text-center">Best Store</h3>
    <p class="text-center">Communication is at the heart of a e-cormmerce and community</p>
</div> <!-- Description end -->

<div class="row">
    <div class="col-md-10">
        <!-- products -->
        <div class="row">
        <?php if($products):?>
        <?php foreach($products as $product):?>
            <div class="col-md-4 mb-2">
                <div class="card" >
                <img src="admin/product/<?=$product['image']?>" class="card-img-top" alt="...">
                <div class="card-body">
                <h5 class="card-title"><?=$product['name']?></h5>
                <p class="card-text"><?=$product['description']?></p>
                <p class="card-text">Price: <?=$product['price']?>/-</p>
                <a href="index?cart=<?=$product['slug']?>" class="btn btn-primary">Add To Cart</a>
                <a href="product-details?product=<?=$product['slug']?>" class="btn btn-secondary">Details</a>
                </div>
                </div>
            </div>
            <?php endforeach;?>
            <?php else:?>
            <h3 class="text-center">No Products Found!</h3>
            <?php endif;?>
        </div>
    </div> <!----End of products -->

    <!--Display brands and categorys  -->
<div class="col-md-2 bg-secondary p-0">
        <!-- Brands -->
        <ul class="navbar-nav me-auto text-center">
            <li class="nav-item bg-light">
                <a href="#" class="nav-link text-dark "><h4>Delivery Brands</h4></a>
            </li>
            <?php if($brands):?>
            <?php foreach($brands as $brand):?>
            <li class="nav-item">
                <a href="index?brand=<?=$brand['slug']?>" class="nav-link text-light "><?=$brand['name']?></a>
            </li>
            <?php endforeach;?>
            <?php else:?>
                <li class="nav-item">
                No Brand Found
            </li>
            <?php endif;?>
            
        </ul>
        <!-- categories -->
        <ul class="navbar-nav me-auto text-center">
            <li class="nav-item bg-light">
                <a href="#" class="nav-link text-dark "><h4>Delivery Brands</h4></a>
            </li>
            <?php if($categorys):?>
            <?php foreach($categorys as $category):?>
            <li class="nav-item">
                <a href="index?category=<?=$category['slug']?>" class="nav-link text-light "><?=$category['name']?></a>
            </li>
            <?php endforeach;?>
            <?php else:?>
                <li class="nav-item">
                No Category Found !
            </li>
            <?php endif;?>
            
        </ul>
    </div>
</div>

            <!-- Footer -->
                <div class="bg-light  p-2 text-center text-dark">
                        <p>Copyright &copy; Created By Quadri-PHP 2022</p>
                </div>
            <!-- End of Footer -->

<!-- javascript -->
<script src="<?= BASEURL ?>assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>

