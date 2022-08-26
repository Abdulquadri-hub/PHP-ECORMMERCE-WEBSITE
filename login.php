<?php require_once("App.php");?>
<?php include(ROOT.'/private/includes/header.php'); ?>
<?php require_once(ROOT."/private/controllers/user.php"); 
require_once(ROOT.'/private/core/middleware.php');
onlyUser();
?>

    <div class="container-fluid">
        <form action="" method="post">
            <div class="p-4 mx-auto shadow rounded bg-light" style="width:100%;margin-top:50px;max-width:340px;">
            <h3 class="text-center">E-COMMERCE</h3>
            <img src="" class="d-block mx-auto" style="width:100px;" alt="image">
            <h3>Sign In</h3>
            <!-- Errors section -->
            <?php include_once(ROOT."/private/includes/errorsMessage.php") ?>

            <!-- inputs -->
            <input type="email" name="email" value="<?=getValue("email")?>" class="my-2 form-control" placeholder="E-Mail">
            <input class="my-2 form-control" value="<?=getValue("password")?>"  type="text" name="password" placeholder="Password" id="">
            <br>
        <!-- buttons -->
        <button class="btn btn-success float-end" name="signin">Sign In</button>
        <div class="text-start fw-bold">Not Yet Registered ? <a href="<?=BASEURL?>register" style="text-decoration: none;">Register</a></div>
            </div>        
        </form>
    </div>

<?php include(ROOT.'/private/includes/footer.php'); ?>

