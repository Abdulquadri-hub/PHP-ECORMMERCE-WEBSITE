<style>
    nav ul li a {
        width: 110px;
        text-align: center;
        border-left: solid thin #eee;
        border-left: solid thin #fff;
    }
        nav ul li a:hover {
        background-color: grey;
        color: white !important;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-light bg-light p-2">
<div class="container-fluid">
    <a class="navbar-brand" href="#">
    <img src="<?=ROOT?>/asset/logo2.png" alt="Image" class="" style="width:50px">
    </a>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav"> 
        <li class="nav-item fw-bold">
    <a class="nav-link active" aria-current="page" href="<?=BASEURL?>admin/dashboard">DASHBOARD</a>
        </li>
        <li class="nav-item fw-bold">
        <a class="nav-link" href="<?=BASEURL?>admin/product/home">Products</a>
        </li>
        <li class="nav-item fw-bold">
        <a class="nav-link" href="<?=BASEURL?>admin/category/home">Category</a>
        </li>
        <li class="nav-item fw-bold">
        <a class="nav-link" href="<?=BASEURL?>admin/brand/home">Brands</a>
        </li>
        <li class="nav-item fw-bold">
        <a class="nav-link fw-bold" href="<?=BASEURL?>admin/customer/home">Customers</a>
        </li>
        <li class="nav-item fw-bold">
        <a class="nav-link fw-bold" href="<?=BASEURL?>admin/order/home">Orders</a>
        </li>
        <li class="nav-item fw-bold">
        <a class="nav-link fw-bold" href="<?=BASEURL?>admin/payment/home">Payments</a>
        </li>
        </ul>


        <?php if(isset($_SESSION['id'])): ?>
        <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown dropdown-menu-end">
        <a class="nav-link dropdown-toggle fw-bold" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?=$_SESSION['firstname']?>
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item fw-bold" href="<?=BASEURL?>admin/dashboard">Profile</a></li>
            <li><a class="dropdown-item fw-bold" href="<?=BASEURL?>Home">Dashboard</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item fw-bold" href="<?=BASEURL?>logout">Logout</a></li>
        </ul>
        </li>
    </ul>
    <?php else: ?>
        <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown dropdown-menu-end">
        <a class="nav-link dropdown-toggle fw-bold" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item fw-bold" href="<?=BASEURL?>"></a></li>
            <li><a class="dropdown-item fw-bold" href="<?=BASEURL?>Home">Dashboard</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item fw-bold" href="<?=BASEURL?>logout">Logout</a></li>
        </ul>
        </li>
    </ul>
    <?php endif; ?>
    </div>
</div>
</nav> 
