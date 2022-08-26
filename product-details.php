<?php require_once("App.php");?>
<?php require_once(ROOT."/private/models/dbFunctions.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products-Details</title>

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
            <a class="nav-link fw-bold" href="<?=BASEURL?>cart"><i class="bi bi-cart-fill"></i></a>
        </li>
        <li class="nav-item">
            <a class="nav-link fw-bold" aria-current="page" href="<?=BASEURL?>register">Register</a>
        </li>
        <li class="nav-item">
            <span class="nav-link fw-bold" aria-current="page" href="#">Total Price 500/-</span>
        </li>
        </ul>
        <form class="d-flex" method="get" role="search">
        <input class="form-control me-2" value="<?=$search?>" name= "search" type="search" placeholder="Search" aria-label="Search">
        <button  class="btn btn-outline-success" type="submit">Search</button>
        </form>
        </div>
    </div>
</div> <!-- Nav Finished -->

<nav class="navbar navbar-light bg-secondary">
<div class="container-fluid">
    <span class="navbar-text text-light fw-bold">
    <?php if(isset($_SESSION['id'])): ?>
    <?=$_SESSION['firstname']?>  
    <a href="" class="navbar-text text-light fw-light" style="text-decoration: none;">Logout</a>
    <?php else: ?>
        <a href="" class="navbar-text text-light fw-light" style="text-decoration: none;">Login</a>
    <?php endif; ?>
    </span>
</div>
</nav>


<div class="bg-light"> <!-- Description -->
    <h3 class="text-center">Best Store</h3>
    <p class="text-center">Communication is at the heart of a e-cormmerce and community</p>
</div> <!-- Description end -->

<div class="row">
    <div class="col-md-10">
        <!-- products -->
        <div class="row">
        <?php if($productDetails):?>
        <?php foreach($productDetails as $productDetail):?>
            <div class="col-md-4 mb-2">
                <div class="card" >
                <img src="admin/product/<?=$productDetail['image']?>" class="card-img-top" alt="...">
                <div class="card-body">
                <h5 class="card-title"><?=$productDetail['name']?></h5>
                <p class="card-text"><?=$productDetail['description']?></p>
                <p class="card-text"><?=$productDetail['price']?>/-</p>
                <a href="views/addCart.view" class="btn btn-primary">Add To Cart</a>
                <a href="index" class="btn btn-secondary">Go Back</a>
                </div>
                </div>
            </div>

            <!-- related product -->
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="text-center">Related Products</h4>
                    </div>
                </div>
                <!-- images -->
                <div class="col-md-6">
                <img src="admin/product/<?=$productDetail['image']?>" class="card-img-top" alt="...">
                </div>
                <div class="col-md-6">
                <img src="admin/product/<?=$productDetail['image']?>" class="card-img-top" alt="...">
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

<?php include(ROOT."/private/includes/homeFooter.php"); ?>


