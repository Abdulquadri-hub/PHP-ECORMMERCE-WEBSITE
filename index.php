<?php require_once("App.php");?>
<?php require_once(ROOT."/private/models/dbFunctions.php");?>
<?php require_once(ROOT."/private/controllers/cart.php");?>
<?php include(ROOT."/private/includes/homeHeader.php");?>
<?php include(ROOT."/private/includes/homeNav.php"); ?>

<div class="bg-light"> <!-- Description -->
    <h3 class="text-center">Best Store</h3>
    <p class="text-center">Communication is at the heart of a e-cormmerce and community</p>
</div> <!-- Description end -->

<div class="row">
    <div class="col-md-10">
        <!-- products -->
        <div class="row">
        <?php include(ROOT."/private/includes/displayProduct.php"); ?>

    <!--Display brands and categorys  -->
<div class="col-md-2 bg-secondary p-0">
        <!-- Brands -->
        <?php include(ROOT."/private/includes/displayBrand.php"); ?>
        <!-- categories -->
        <?php include(ROOT."/private/includes/displayCategory.php"); ?>
    </div>
</div>

<?php include(ROOT."/private/includes/homeFooter.php"); ?>
