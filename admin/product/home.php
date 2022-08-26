<?php require_once("../../App.php");?>
<?php include(ROOT.'/private/includes/header.php'); ?>
<?php include(ROOT.'/private/includes/nav.php'); ?>
<?php include(ROOT.'/private/controllers/product.php'); ?>
<?php onlyAdmin(); ?>

    <div class="container-fluid shadow  mx-auto" style="max-width:1000px;">
    <h1>Product</h1>
<p>
    <a href="create">
        <button class="btn btn-success"><i class="bi bi-plus"></i>Add product</button>
    </a>
</p>
<form action="" method="get">
<div class="input-group">
    <input type="text" class="form-control" placeholder="Search for products" value="<?=$search?>" name="search">
    <div class="input-group-append">
        <button class="btn btn-outline-secondary" type="submit" >Search</button>
    </div>
</div>
</form>

<?php if($products):?>
<table class="table table-striped table-hover">
    <thead>
    <tr>
    <th scope="col">#</th>
    <th scope="col">Image</th>
    <th scope="col">Name</th>
    <th scope="col">Price</th>
    <th scope="col">Status</th>
    <th scope="col">Created_at</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($products as $i => $product):?>
    <tr>
        <th scope="row"><?= $i + 1?></th>
        <td>
            <img src="<?=$product['image']?>"alt="" style="width: 50px;">
        </td>
        <td><?=$product['name']?></td>
        <td><?=$product['price']?></td>
        <td><?=$product['status'] === 0 ? 'visible' : 'hidden' ?></td>
        <td><?=get_Date($product['created_at'])?></td>
    <td>
    <a href="edit?update=<?=$product['id']?>"><button class="btn btn-sm btn-outline-secondary">Edit</button></a>
        <form style="display:inline-block;" action="" method="post">
        <input type="hidden" name="delete" value="<?=$product['id']?>">
        <button type="submit" name="" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i>Delete</button>
        </form>
    </td>
    </tr>
    <?php endforeach; ?>
    <?php else: ?>
        <h3 class="text-center fw-bolder">No Product Found !</h3>
    <?php endif; ?>
    </tbody>
</table>
    </div>

<?php include(ROOT.'/private/includes/footer.php'); ?>
