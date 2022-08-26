<?php require_once("../../App.php");?>
<?php include(ROOT.'/private/includes/header.php'); ?>
<?php include_once(ROOT.'/private/controllers/category.php'); ?>
<?php onlyAdmin()?>

    <div class="container-fluid">
        <form action="" method="post">
            <div class="p-4 mx-auto shadow rounded" style="width:100%;max-width:600px;">
            <h3>Edit Category</h3>

            <!-- Errors section -->
            <?php include_once(ROOT."/private/includes/errorsMessage.php") ?>

            <input type="hidden" name="id"  value="<?=$id?>">

        <div class="form-group mb-2">
            <input type="text" name="name" class="form-control" value="<?=$name?>" placeholder="category Name">
        </div>

        <div class="form-group mb-2">
            <input type="text" name="meta_title" class="form-control" value="<?=$metaTitle?>" placeholder="category Meta Title">
        </div>

        <div class="form-group mb-2">
            <textarea class="form-control" name="description" placeholder="category Description"><?=$description?></textarea>
        </div>

        <div class="form-group mb-2">
            <textarea class="form-control" name="meta_description" placeholder="category Meta Description"><?=$metaDescription?></textarea>
        </div>

        <div class="form-group mb-2">
            <input class="form-control" name="meta_keyword" value="<?=$metaKeyword?>" placeholder="Category Meta Keywords">
        </div>

        <div class="form-group mb-2">
            <input type="text" name="slug" class="form-control" placeholder="Category Slug(URL)" value="<?=$slug?>">
        </div>

        <div class="form-check mb-3">
        <?php if($category['status'] === 0): ?>
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
        <button class="btn btn-primary float-end" name="updateCategory" type="submit">Save</button>

        <a href="<?=BASEURL?>admin/category/home">
        <input class="btn btn-secondary text-white" type="button" value="Go Back">
        </a>
    </div>
    </form>
    </div>

<?php include(ROOT.'/private/includes/footer.php'); ?>

