<?php require_once("../../App.php");?>
<?php include(ROOT.'/private/includes/header.php'); ?>
<?php include(ROOT.'/private/includes/nav.php'); ?>
<?php include(ROOT.'/private/controllers/user.php'); ?>


    <div class="container-fluid shadow  mx-auto" style="max-width:1000px;">
    <h1>Customers</h1>
<p>
    <a href="create">
        <button class="btn btn-success"><i class="bi bi-plus"></i> Add Customers</button>
    </a>
</p>
<table class="table table-striped table-hover">
<thead>
    <tr>
    <th scope="col">#</th>
    <th scope="col">FirstName</th>
    <th scope="col">LastName</th>
    <th scope="col">Image</th>
    <th scope="col">Product</th>
    </tr>
    </thead>
    <tbody>
        <?php if($customers): ?>
    <tr>
        <?php foreach($customers as $i => $customer):?>
        <th scope="row"><?=$i + 1?></th>
        <td><?=esc($customer['firstname'])?></td>
        <td><?=esc($customer['lastname'])?></td>
        <td>image</td>
        <td>product</td>
    <td>
    <a href="edit?id=<?=$customer['id']?>"><button class="btn btn-sm btn-outline-secondary">Edit</button></a>
        <form style="display:inline-block;" action="delete.php" method="post">
        <input type="hidden" name="id" value="">
        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
        </form>
    </td>
    </tr>
    <?php endforeach;?>
    <?php else:?>
        <h3 class="text-center fw-bolder">No Customer Found !</h3>
    <?php endif;?>
    </tbody>
</table>
    </div>

<?php include(ROOT.'/private/includes/footer.php'); ?>

<thead>
    <tr>

    </tr>
    </thead>
 