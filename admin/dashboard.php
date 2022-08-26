<?php require_once("../App.php");?>
<?php include(ROOT.'/private/includes/header.php'); ?>
<?php include(ROOT.'/private/includes/nav.php'); ?>
<?php require(ROOT.'/private/controllers/user.php'); ?>
<?php loginFirst(); ?>
<?php onlyAdmin(); ?>


    <div class="container-fluid">
    <div class="container-fluid p-4 shadow mx-auto" style="max-width:1000px;">
    <h1>My - Profile</h1>
        <?php if($accounts):?>
        <div class="row">
            <div class="col-sm-4 col-md-3">
    <img src="<?=$image?>" alt="Image" class="d-block mx-auto rounded-circle" style="width:160px">
                <h5 class="text-center"><?=$accounts['firstname'] . " ". $accounts['lastname']?></h5>
            </div>
            <div class="col-sm-3 col-md-9 bg-light p-2">
                <table class="table table-hover table-striped table-bordered">
                <tr><th>First Name:</th><td><?=$accounts['firstname']?></td></tr>
                <tr><th>Last Name:</th><td><?=$accounts['lastname']?></td></tr>
                <tr><th>E-mail:</th><td><?=$accounts['email']?></td></tr>
                <tr><th>Gender:</th><td><?=$accounts['gender']?></td></tr>
                </table>
            </div>
        </div>
        <br>
    </div>
    <?php else: ?>
        <center><h6>That account was not found!</h6></center>
    <?php endif; ?>
    </div>

<?php include(ROOT.'/private/includes/footer.php'); ?>



