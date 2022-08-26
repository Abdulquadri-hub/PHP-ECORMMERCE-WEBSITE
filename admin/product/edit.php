<?php require_once("../../App.php");?>
<?php include(ROOT.'/private/includes/header.php'); ?>
<?php include_once(ROOT.'/private/controllers/product.php'); ?>
<?php onlyAdmin(); ?>

    <div class="container-fluid">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="p-4 mx-auto shadow rounded" style="width:100%;max-width:600px;">
            <h3>Edit product <?=$product['name']?></h3>

            <!-- Errors section -->
            <?php include_once(ROOT."/private/includes/errorsMessage.php") ?>

            <?php if($product['image']): ?>
            <img src="<?=$product['image']?>" alt="" style="width:50px;">
            <?php endif; ?>

            <input type="hidden" name="id"  value="<?=$id?>">

        <div class="form-group mb-2">
            <label>product Image</label>
            <br>
            <input type="file" value="<?=$image?>" name="image">
        </div>

        <div class="form-group mb-2">
            <input type="text" name="name" class="form-control" value="<?=$name?>" placeholder="product Name">
        </div>

        <!-- get Category -->
        <?php include(ROOT."/private/includes/getCategory.php"); ?>

        <!--get brand -->
        <?php include(ROOT."/private/includes/getBrand.php"); ?>



        <div class="form-group mb-2">
            <input type="number" name="price" class="form-control" value="<?=$price?>" placeholder="Product Price">
        </div>

        <div class="form-group mb-2">
            <input type="text" name="meta_title" class="form-control" value="<?=$metaTitle?>" placeholder="product Meta Title">
        </div>

        <div class="form-group mb-2">
            <textarea class="form-control" name="description" placeholder="product Description"><?=$description?></textarea>
        </div>

        <div class="form-group mb-2">
            <textarea class="form-control" name="meta_description" placeholder="product Meta Description"><?=$metaDescription?></textarea>
        </div>

        <div class="form-group mb-2">
            <input class="form-control" name="meta_keyword" value="<?=$metaKeyword?>" placeholder="product Meta Keywords">
        </div>

        <div class="form-group mb-2">
            <input type="text" name="slug" class="form-control" placeholder="product Slug(URL)" value="<?=$slug?>">
        </div>

        <div class="form-check mb-3">
        <?php if($product['status'] === 0): ?>
        <input class="form-check-input" name="status"  type="checkbox" id="gridCheck">
        <label class="form-check-label" for="gridCheck">
        Status
        </label>
        <?php else: ?>
        <input class="form-check-input" name="status"  type="checkbox" id="gridCheck" checked>
        <label class="form-check-label" for="gridCheck">
        Status
        </label>
        <?php endif;?>
        </div>

        <!-- buttons -->
        <button class="btn btn-primary float-end" name="updateProduct" >Save</button>

        <a href="<?=BASEURL?>admin/product/home">
        <input class="btn btn-secondary text-white" type="button" value="Go Back">
        </a>
    </div>
    </form>
    </div>

<?php include(ROOT.'/private/includes/footer.php'); ?>

