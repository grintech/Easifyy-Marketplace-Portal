<?php 
$product_types = $this->Site->getAllProductTypes(); 
$units = $this->Site->getAllProductUnits(); 
?> 

<?php if (!empty($product->child_products)): ?>
    <?php foreach ($product->child_products as $product): ?>
        <div class="_simple-product-item row variable clear card-text">
            <div class="col input-field" data-order="2">
                
                <input name="_item_code[]" value="<?= ($product->_item_code)?:'' ?>" class=" " type="text" id="ProductMetaItemCode">
                <label for="ProductMetaItemCode"><?php echo __('Item Code'); ?></label>
            </div>
            <div class="col input-field" data-order="2">
                
                <input name="_bar_code[]" value="<?= ($product->_bar_code)?:'' ?>" class=" " type="text" id="ProductMetaBarCode">
                <label for="ProductMetaBarCode"><?php echo __('Bar Code'); ?></label>
            </div>
            <div class="col input-field" data-order="3">
                
                <select name="product_unit_id[]" label="Unit" value="<?= ($product->product_unit_id)?:'' ?>"  class=" " >
                    <option value=""><?php echo __('Unit'); ?></option>
                    <?php foreach ($units as $key=>$unit) : ?>
                    <option value="<?=$key; ?>"  <?= $key == $product->product_unit_id?'selected':''?> ><?=$unit; ?>
                    </option>
                    <?php endforeach; ?>
                </select>
                <label><?php echo __('Unit'); ?></label>
            </div>

            <div class="col input-field" data-order="4">
                
                <input name="_weight[]" value="<?= ($product->_weight)?:'' ?>" class=" " type="text" >
                <label for="ProductMetaWeight"><?php echo __('Weight'); ?></label>
            </div>
            <div class="col input-field" data-order="5">
                
                <input name="_price[]" value="<?= ($product->_price)?:'' ?>" class="  _price" type="text" >
                <label for="ProductMetaPrice"><?php echo __('MRP'); ?></label>
            </div>
            <div class="col input-field" data-order="6">
                
                <input name="_sale_price[]" value="<?= ($product->_sale_price)?:'' ?>" class="product-sale-price _sale_price" type="text" >
                <label for="ProductMetaSalePrice"><?php echo __('Sale Price'); ?></label>
            </div>
            <div class="col input-field" data-order="7">
                
                <input name="_stock[]" value="<?= ($product->_stock)?:'' ?>"  class="" type="text" >
                <label for="ProductMetaStock"><?php echo __('Stock'); ?></label>
            </div> <a class="remove-variation small-round-symbole-button">x</a>
        </div>

    <?php endforeach; ?>
<?php elseif(isset($product)): ?>

    <div class="_simple-product-item row simple clear card-text">
        <div class="col input-field" data-order="2">
            <input name="_item_code[]" value="<?= (@$product->_item_code)?:'' ?>" class="" type="text" >
            <label for="ProductMetaItemCode"><?php __echo ('Item Code'); ?></label>
        </div>
        <div class="col input-field" data-order="2">
            
            <input name="_bar_code[]" value="<?= (@$product->_bar_code)?:'' ?>" class="" type="text" >
            <label for="ProductMetaBarCode"><?php echo __('Bar Code'); ?></label>
        </div>
        <div class="col input-field" data-order="3">
            <select name="product_unit_id[]" label="Unit" value="<?= (@$product->product_unit_id)?:'' ?>"  class="" >
                <option value=""><?php echo __('Unit'); ?></option>
                <?php foreach ($units as $key=>$unit) : ?>
                <option value="<?=$key; ?>"  <?=$key ==@$product->product_unit_id?'selected':''?> ><?=$unit; ?>
                </option>
                <?php endforeach; ?>
            </select>
            <label for="product_unit_id[]"><?php echo __('Unit'); ?></label>
        </div>

        <div class="col input-field" data-order="4">
            
            <input name="_weight[]" value="<?= (@$product->_weight)?:'' ?>" class=" " type="text" >
            <label for="ProductMetaWeight"><?php echo __('Weight'); ?></label>
        </div>
        <div class="col input-field" data-order="5">
            
            <input name="_price[]" value="<?= (@$product->_price)?:'' ?>" class="  _price" type="text" >
            <label for="ProductMetaPrice"><?php echo __('MRP'); ?></label>
        </div>
        <div class="col input-field" data-order="6">
            
            <input name="_sale_price[]" value="<?= (@$product->_sale_price)?:'' ?>" class="product-sale-price _sale_price" type="text" >
            <label for="ProductMetaSalePrice"><?php echo __('Sale Price'); ?></label>
        </div>
        <div class="col input-field" data-order="7">
            
            <input name="_stock[]" value="<?= (@$product->_stock)?:'' ?>"  class=" " type="text" >
            <label for="ProductMetaStock"><?php echo __('Stock'); ?></label>
        </div> 
    </div>

<?php endif; ?>

           
        
            
        