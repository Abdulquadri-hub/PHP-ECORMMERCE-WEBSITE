<ul class="navbar-nav me-auto text-center">
            <li class="nav-item bg-light">
                <a href="#" class="nav-link text-dark "><h4>Delivery Brands</h4></a>
            </li>
            <?php if($brands):?>
            <?php foreach($brands as $brand):?>
            <li class="nav-item">
                <a href="index?brand=<?=$brand['slug']?>" class="nav-link text-light "><?=$brand['name']?></a>
            </li>
            <?php endforeach;?>
            <?php else:?>
                <li class="nav-item">
                No Brand Found
            </li>
            <?php endif;?>
            
        </ul>