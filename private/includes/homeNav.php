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
            <a class="nav-link fw-bold" aria-current="page" href="contact">Contact</a>
        </li>
        <li class="nav-item">
            <?php if($cartItem): ?>
            <a class="nav-link fw-bold" href="cart"><i class="bi bi-cart-fill"></i><sup><?=$cartItem?></sup></a>
            <?php else:?>
                <a class="nav-link fw-bold" href="cart"><i class="bi bi-cart-fill"></i><sup></sup></a>
            <?php endif;?>
        </li>
        <?php if(isset($_SESSION['id'])): ?>
            <li class="nav-item">
            <a class="nav-link fw-bold" aria-current="page" href="<?=BASEURL?>user/account/home">My Account</a>
        </li>
        <?php else:?>
            <li class="nav-item">
            <a class="nav-link fw-bold" aria-current="page" href="register">Register</a>
        </li>
        <?php endif; ?>

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
            Search
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
