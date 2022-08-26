<?php require_once("../../App.php");?>
<?php include(ROOT.'/private/includes/header.php'); ?>
<?php include(ROOT.'/private/includes/nav.php'); ?>
<?php include(ROOT.'/private/controllers/category.php'); ?>
<?php onlyAdmin()?>

    <div class="container-fluid shadow  mx-auto" style="max-width:1000px;">
    <h1>Category</h1>
<p>
    <a href="create">
        <button class="btn btn-success"><i class="bi bi-plus"></i>Add Category</button>
    </a>
</p>
<?php if($categorys):?>
<table class="table table-striped table-hover">
    <thead>
    <tr>
    <th scope="col">#</th>
    <th scope="col">Name</th>
    <th scope="col">Status</th>
    <th scope="col">Created_at</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($categorys as $i => $category):?>
    <tr>
        <th scope="row"><?= $i + 1?></th>
        <td><?=$category['name']?></td>
        <td><?=$category['status'] === 0 ? 'visible' : 'hidden' ?></td>
        <td><?=get_Date($category['created_at'])?></td>
    <td>
    <a href="edit?update=<?=$category['id']?>"><button class="btn btn-sm btn-outline-secondary">Edit</button></a>
        <form style="display:inline-block;" action="" method="post">
        <input type="hidden" name="delete" value="<?=$category['id']?>">
        <button type="submit" name="" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i>Delete</button>
        </form>
    </td>
    </tr>
    <?php endforeach; ?>
    <?php else: ?>
        <h3 class="text-center fw-bolder">No Category Found !</h3>
    <?php endif; ?>
    </tbody>
</table>
    </div>

<?php include(ROOT.'/private/includes/footer.php'); ?>
