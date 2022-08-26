<?php require_once("../App.php");?>
<?php include(ROOT.'/private/includes/userHeader.php'); ?>
<?php include(ROOT.'/private/includes/userNav.php'); ?>
<?php require_once(ROOT."/private/controllers/confirm-payment.php"); ?>

<div class="p-4 mx-auto shadow rounded bg-light" style="width:100%;margin-top:50px;max-width:340px;">
<form action="" method="post" enctype="multipart/form-data">
            <h3 class="text-center">E-COMMERCE</h3>
            <img src="" class="d-block mx-auto" style="width:100px;" alt="image">
            <h3>CONFIRM PAYMENT</h3>
            <!-- Errors section -->

            <!-- inputs -->
            <input type="text" name="invoice_number" value="<?=$invoice_number?>" class="my-2 form-control" placeholder="Invoice Number">
            <input class="my-2 form-control" value="<?=$amount_due?>"  type="text" name="amount" placeholder="Amount" id="">
            
            <!-- select payment method -->
        <select class="my-2 form-control"  name="payment_mode" id="">
            <option  value="">--Select a payment method</option>
            <option value="netbanking">Netbanking</option>
            <option value="paypal">Paypal</option>
            <option value="cashapp">Cashapp</option>
            <option value="payoffline">Pay-Offline</option>
        </select>
            <br>
        <!-- buttons -->
        <button class="btn btn-success float-center" type="submit" name="pay">Pay</button>      
        </form>
    </div>



    <?php include(ROOT.'/private/includes/userfooter.php'); ?>
