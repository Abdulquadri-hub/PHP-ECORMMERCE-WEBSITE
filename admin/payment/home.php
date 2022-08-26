<?php require_once("../../App.php");?>
<?php include(ROOT.'/private/includes/header.php'); ?>
<?php include(ROOT.'/private/includes/nav.php'); ?>
<?php include(ROOT.'/private/controllers/payment.php'); ?>
<?php onlyAdmin()?>


    <div class="container-fluid shadow  mx-auto" style="max-width:1000px;">
    <h1>Payment</h1>
<table class="table table-striped table-hover">
<thead>
    <tr>
    <th scope="col">#</th>
    <th scope="col">Invoice Number</th>
    <th scope="col">Amount</th>
    <th scope="col">payment_mode</th>
    <th scope="col">Date</th>
    </tr>
    </thead>
    <tbody>
        <?php if($users): ?>
    <tr>
        <?php foreach($users as $i => $user):?>
        <th scope="row"><?=$i + 1?></th>
        <td><?=esc($user['invoice_number'])?></td>
        <td><?=esc($user['amount'])?></td>
        <td><?=esc($user['payment_mode'])?></td>
        <td><?=get_Date($user['date'])?></td>
    </tr>
    <?php endforeach;?>
    <?php else:?>
        <h3 class="text-center fw-bolder">No Payment Found !</h3>
    <?php endif;?>
    </tbody>
</table>
    </div>

<?php include(ROOT.'/private/includes/footer.php'); ?>

<thead>
    <tr>

    </tr>
    </thead>
 