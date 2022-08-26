<?php require_once("../App.php");?>
<?php include(ROOT.'/private/includes/userHeader.php'); ?>
<?php include(ROOT.'/private/includes/userNav.php'); ?>
<?php include(ROOT.'/private/controllers/pending.php'); ?>

    <div class="container-fluid mt">
        <div class="text-center text-secondary mt-5"><h3>Welcome</h3></div>
        <?php if($getPendingOrders): ?>
        <div class="text-center text-secondary mt-5">
            <h3>You have <span class="text-danger"><?=getPendingOrder()?></span> pending Order</h3>
            <p>
                <a href="myOrder" class="text-dark text-decoration-none fw-bold">Order Details</a>
            </p>
        </div>
        <?php else: ?>
        <div class="text-center text-success mt-5">
            <h3>You have zero pending Order</h3>
            <p>
                <a href="<?=BASEURL?>" class="text-dark text-decoration-none fw-bold">
                Explore Products
                </a>
            </p>
        </div>
        <?php endif;?>
    </div>

<?php include(ROOT.'/private/includes/userFooter.php');?>



