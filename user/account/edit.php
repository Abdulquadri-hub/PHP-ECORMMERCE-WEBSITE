<?php require_once("../../App.php");?>
<?php include(ROOT.'/private/includes/header.php'); ?>
<?php require_once(ROOT."/private/controllers/account.php"); ?>


    <div class="container-fluid">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="p-4 mx-auto shadow rounded bg-light" style="width:100%;margin-top:50px;max-width:340px;">
            <h3 class="text-center">E-COMMERCE</h3>
            <h3>Edit Account</h3>
            <!-- Errors section -->

            <!-- inputs -->
            <input type="text" name="firstname" value="<?=$firstname?>" class="my-2 form-control" placeholder="First Name">
            <input type="text" name="lastname" value="<?=$lastname?>" class="my-2 form-control" placeholder="last Name">
            <input type="email" name="email" value="<?=$email?>" class="my-2 form-control" placeholder="E-Mail">
        <br>
        <!-- buttons -->
        <button class="btn btn-success float-end" type="submit" name="editAccount">
            Save
        </button>
        <a href="home">
        <button class="btn btn-secondary float-center">
            Go Back
        </button>
        </a>
            </div>
        </form>
    </div>

<?php include(ROOT.'/private/includes/userfooter.php'); ?>

