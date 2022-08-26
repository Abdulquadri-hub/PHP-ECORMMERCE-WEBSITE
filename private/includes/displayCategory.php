<ul class="navbar-nav me-auto text-center">
            <li class="nav-item bg-light">
                <a href="#" class="nav-link text-dark "><h4>Delivery Brands</h4></a>
            </li>
            <?php if($categorys):?>
            <?php foreach($categorys as $category):?>
            <li class="nav-item">
                <a href="index?category=<?=$category['slug']?>" class="nav-link text-light "><?=$category['name']?></a>
            </li>
            <?php endforeach;?>
            <?php else:?>
                <li class="nav-item">
                No Category Found !
            </li>
            <?php endif;?>
            
        </ul>