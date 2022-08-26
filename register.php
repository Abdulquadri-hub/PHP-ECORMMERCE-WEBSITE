<?php require_once("App.php");?>
<?php include(ROOT.'/private/includes/header.php'); ?>
<?php require_once(ROOT."/private/controllers/user.php"); 
require_once(ROOT.'/private/core/middleware.php');
onlyUser();
?>


    <div class="container-fluid">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="p-4 mx-auto shadow rounded bg-light" style="width:100%;margin-top:50px;max-width:340px;">
            <h3 class="text-center">E-COMMERCE</h3>
            <img src="" class="d-block mx-auto" style="width:100px;" alt="image">
            <h3>Sign Up</h3>
            <!-- Errors section -->
            <?php include_once(ROOT."/private/includes/errorsMessage.php") ?>

            <!-- inputs -->
            <input type="text" name="firstname" value="<?=getValue("firstname")?>" class="my-2 form-control" placeholder="First Name">
            <input type="text" name="lastname" value="<?=getValue("lastname")?>" class="my-2 form-control" placeholder="last Name">
            <input type="email" name="email" value="<?=getValue("email")?>" class="my-2 form-control" placeholder="E-Mail">

        <select class="my-2 form-control"  name="gender" id="">
            <option <?=getSelect("gender","")?> value="">--Select a Gender--</option>
            <option <?=getSelect("gender","male")?> value="male">Male</option>
            <option <?=getSelect("gender","female")?>  value="female">Female</option>
        </select>

        <input class="my-2 form-control" value="<?=getValue("password")?>"  type="text" name="password" placeholder="Password" id="">
        <input class="my-2 form-control" value="<?=getValue("password2")?>" type="text" name="password2" placeholder="Retype Password" id="">
        <br>
        <!-- buttons -->
        <button class="btn btn-success float-end" type="submit" name="signup">Sign Up</button>
        <div class="text-start fw-bold">Already Register ? <a href="<?=BASEURL?>login" style="text-decoration: none;">Login</a></div>
            </div>
        </form>
    </div>

<?php include(ROOT.'/private/includes/footer.php'); ?>

