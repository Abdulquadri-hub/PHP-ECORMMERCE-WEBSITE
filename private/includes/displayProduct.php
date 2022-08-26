<?php if($products):?>
        <?php foreach($products as $product):?>
            <div class="col-md-4 mb-2">
                <div class="card" >
                <img src="admin/product/<?=$product['image']?>" class="card-img-top" alt="...">
                <div class="card-body">
                <h5 class="card-title"><?=$product['name']?></h5>
                <p class="card-text"><?=$product['description']?></p>
                <p class="card-text">Price: <?=$product['price']?>/-</p>
                <a href="index?cart=<?=$product['slug']?>" class="btn btn-primary">Add To Cart</a>
                <a href="product-details?product=<?=$product['slug']?>" class="btn btn-secondary">Details</a>
                </div>
                </div>
            </div>
            <?php endforeach;?>
            <?php else:?>
            <h3 class="text-center">No Products Found!</h3>
            <?php endif;?>
        </div>
    </div> <!----End of products -->