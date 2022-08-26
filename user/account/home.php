<?php require_once("../../App.php");?>
<?php include(ROOT.'/private/includes/userHeader.php'); ?>
<?php include(ROOT.'/private/includes/userNav.php'); ?>
<?php include(ROOT.'/private/controllers/account.php'); ?>


    <div class="container-fluid shadow  mx-auto" style="max-width:1000px;">
    <h1>Account</h1>
    <div class="container-fluid p-4 shadow mx-auto" style="max-width:1000px;">
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
        <div class="container-fluid">
            <form action="" method="post">
                <input type="hidden" name="id" value="<?=$id?>">
            <button class="btn btn-sm btn-danger mb-3" type="submit" name="delete">
            <i class="fa fa-plus"></i>
            Delete Account
            </button>
            </form>
        <a href="edit?userId=<?=$accounts['id']?>">
            <button class="btn btn-sm btn-primary">
            <i class="fa fa-plus"></i>
            Edit Account
            </button>
        </a>
        </div>
    </div>
    <?php else: ?>
        <center><h6>That account was not found!</h6></center>
    <?php endif; ?>
    </div>


    <?php include(ROOT.'/private/includes/userFooter.php');?>
 