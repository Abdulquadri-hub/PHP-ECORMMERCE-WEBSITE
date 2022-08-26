
<select class="my-2 form-control"  name="brand_id" id="">
        <option <?=getSelect("brand_id","")?> value="">--select Brand--</option>
        <?php  foreach($brands as $brand):?>
            <?php if(!empty($brandId) && $brandId == $brand['id']):?>
            <option <?=getSelect("brand_id",$brand['id'])?> value="<?=$brand['id']?>"><?=$brand['name']?></option>
            <?php else:?>
            <option <?=getSelect("brand_id","")?> value="<?=$brand['id']?>"><?=$brand['name']?></option>
        <?php endif;?>
        <?php endforeach; ?>
        </select>