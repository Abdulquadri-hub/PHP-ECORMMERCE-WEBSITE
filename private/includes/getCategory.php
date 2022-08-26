        <!-- category -->
        <select class="my-2 form-control"  name="category_id" id="">
        <option <?=getSelect("category_id","")?> value="">--select Category--</option>
        <?php  foreach($categorys as $category):?>
            <?php if(!empty($categoryId) && $categoryId == $category['id']):?>
            <option <?=getSelect("category_id",$category['id'])?> value="<?=$category['id']?>"><?=$category['name']?></option>
            <?php else:?>
            <option <?=getSelect("category_id","")?> value="<?=$category['id']?>"><?=$category['name']?></option>
        <?php endif;?>
        <?php endforeach; ?>
        </select>