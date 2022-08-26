<?php require_once("../App.php");?>
<?php include(ROOT.'/private/includes/userHeader.php'); ?>
<?php include(ROOT.'/private/includes/userNav.php'); ?>
<?php require_once(ROOT."/private/controllers/myOrder.php"); ?>

<div class="container-fluid shadow  mx-auto" style="max-width:1000px;">
    <h1>All My Orders</h1>
<p>
    <a href="<?=BASEURL?>">
        <button class="btn btn-success"><i class="bi bi-plus"></i>Order More..</button>
    </a>
</p>
<?php if($getOrders):?>
<table class="table table-striped table-hover">
    <thead>
    <tr>
    <th scope="col">#</th>
    <th scope="col">Amount Due</th>
    <th scope="col">Total-Products</th>
    <th scope="col">Invoice Number</th>
    <th scope="col">Created_at</th>
    <th scope="col">Status</th>
    <th scope="col">State</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($getOrders as $i => $getOrder):?>
    <tr>
        <th scope="row"><?= $i + 1?></th>
        <td><?=$getOrder['amount_due']?></td>
        <td><?=$getOrder['total_products']?></td>
        <td><?=$getOrder['invoice_number']?></td>
        <td><?=get_Date($getOrder['date']);?></td>
        <?php if($getOrder['status'] == 'complete'): ?>
        <td><?=$getOrder['status']?></td>
        <?php else: ?>
        <td><?=$getOrder['status']?></td>
        <?php endif;?>
        <td>
            <a href="confirm-payment?orderId=<?=$getOrder['id']?>" class="text-decoration-none text-success fw-bold">Confirm</a>
        </td>
    </tr>
    <?php endforeach; ?>
    <?php else: ?>
        <h3 class="text-center fw-bolder">No Orders Found !</h3>
    <?php endif; ?>
    </tbody>
</table>
    </div>

    <?php include(ROOT.'/private/includes/userfooter.php'); ?>
