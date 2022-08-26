<?php require_once("../../App.php");?>
<?php include(ROOT.'/private/includes/header.php'); ?>
<?php include_once(ROOT.'/private/controllers/brand.php'); ?>
<?php onlyAdmin()?>

    <div class="container-fluid">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="p-4 mx-auto shadow rounded" style="width:100%;max-width:600px;">
            <h3>Add New Brand</h3>

            <!-- Errors section -->
            <?php include_once(ROOT."/private/includes/errorsMessage.php") ?>

        <div class="form-group mb-2">
            <input type="text" name="name" class="form-control" value="<?=getValue("name")?>" placeholder="brand Name">
        </div>

        <div class="form-group mb-2">
            <input type="text" name="meta_title" class="form-control" value="<?=getValue("meta_title")?>" placeholder="brand Meta Title">
        </div>

        <div class="form-group mb-2">
            <textarea class="form-control" name="description" placeholder="brand Description"><?=getValue("description")?></textarea>
        </div>

        <div class="form-group mb-2">
            <textarea class="form-control" name="meta_description" placeholder="brand Meta Description"><?=getValue("meta_description")?></textarea>
        </div>

        <div class="form-group mb-2">
            <input class="form-control" name="meta_keyword" value="<?=getValue("meta_keyword")?>" placeholder="brand Meta Keywords">
        </div>

        <div class="form-group mb-2">
            <input type="text" name="slug" class="form-control" placeholder="brand Slug(URL)" value="<?=getValue("slug")?>">
        </div>

        <div class="form-check mb-3">
        <input class="form-check-input" name="status"  type="checkbox" id="gridCheck">
        <label class="form-check-label" for="gridCheck">
        Status
        </label>
        </div>

        <!-- buttons -->
        <input class="btn btn-primary float-end" name="addBrand" type="submit" value="Create">

        <a href="<?=BASEURL?>admin/brand/home">
        <input class="btn btn-secondary text-white" type="button" value="Go Back">
        </a>
    </div>
    </form>
    </div>

<?php include(ROOT.'/private/includes/footer.php'); ?>

