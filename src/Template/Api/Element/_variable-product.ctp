<?php 
$product_types = $this->Site->getAllProductTypes(); 
$units = $this->Site->getAllProductUnits(); 
$child_model ='child_products';
//print_r($product);
if (!empty($product->child_merchant_products)){
    $child_model ='child_merchant_products';
 
}
?> 
            <?php if (!empty($product->{$child_model})): ?>
                 <?php foreach ($product->{$child_model} as $product): ?>
                    <div class="variable-row clear product-meta-item">
                    <div class="product-variation-panel" data-order="2">
                        <label for="ProductMetaItemCode"><?php echo __('Item Code'); ?></label>
                        <input name="_item_code[]" placeholder="<?php echo __('Item Code'); ?>" value="<?= ($product->_item_code)?:'' ?>" class="form-control" type="text" id="ProductMetaItemCode">
                        <input type="hidden"  name="_product[]" value="<?=$product->id ?>" >
                    </div>
                    <div class="product-variation-panel" data-order="2">
                        <label for="ProductMetaBarCode"><?php echo __('Bar Code'); ?></label>
                        <input name="_bar_code[]" placeholder="<?php echo __('Bar Code'); ?>"  value="<?= ($product->_bar_code)?:'' ?>" class="form-control" type="text" id="ProductMetaBarCode">
                    </div>
                    <div class="product-variation-panel" data-order="3">
                        <label><?php echo __('Unit'); ?></label>
                        <select name="product_unit_id[]" label="Unit" value="<?= ($product->product_unit_id)?:'' ?>" >
                            <option value=""><?php echo __('Unit'); ?></option>
                            <?php foreach ($units as $key=>$unit) : ?>
                            <option value="<?=$key; ?>"  <?=$key ==$product->product_unit_id?'selected':''?> ><?=$unit; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="product-variation-panel" data-order="4">
                        <label for="ProductMetaWeight"><?php echo __('Weight'); ?></label>
                        <input name="_weight[]" placeholder="<?php echo __('Weight'); ?>" value="<?= ($product->_weight)?:'' ?>" class="form-control" type="text" id="ProductMetaWeight">
                    </div>
                    <div class="product-variation-panel" data-order="5">
                        <label for="ProductMetaPrice"><?php echo __('MRP'); ?></label>
                        <input name="_price[]" placeholder="<?php echo __('MRP'); ?>" value="<?= ($product->_price)?:'' ?>" class="form-control _price" type="text" id="ProductMetaPrice">
                    </div>
                    <div class="product-variation-panel" data-order="6">
                        <label for="ProductMetaSalePrice"><?php echo __('Sale Price'); ?></label>
                        <input name="_sale_price[]" placeholder="<?php echo __('Sale Price'); ?>" value="<?= ($product->_sale_price)?:'' ?>" class="form-control product-sale-price _sale_price" type="text" id="ProductMetaSalePrice">
                    </div>
                    <div class="product-variation-panel" data-order="7">
                        <label for="ProductMetaStock"><?php echo __('Stock'); ?></label>
                        <input name="_stock[]" placeholder="<?php echo __('Stock'); ?>" value="<?= ($product->_stock)?:'' ?>"  class="form-control" type="text" id="ProductMetaStock">
                    </div> <a class="remove-variation small-round-symbole-button">x</a>
                </div>

                          <?php endforeach; ?>
            <?php elseif( isset($product) ): ?>

                           

                <div class="simple-row clear product-meta-item">
                    <div class="product-variation-panel" data-order="2">
                        <label for="ProductMetaItemCode"><?php echo __('Item Code'); ?></label>
                        <input name="_item_code[]" placeholder="<?php echo __('Item Code'); ?>" value="<?= (@$product->_item_code)?:'' ?>" class="form-control" type="text" id="ProductMetaItemCode">
                    </div>
                    <div class="product-variation-panel" data-order="2">
                        <label for="ProductMetaBarCode"><?php echo __('Bar Code'); ?></label>
                        <input name="_bar_code[]" placeholder="<?php echo __('Bar Code'); ?>"  value="<?= (@$product->_bar_code)?:'' ?>" class="form-control" type="text" id="ProductMetaBarCode">
                    </div>
                    <div class="product-variation-panel" data-order="3">
                        <label><?php echo __('Unit'); ?></label>
                        <select name="product_unit_id[]" label="Unit" value="<?= (@$product->product_unit_id)?:'' ?>"  class="form-control" id="ProductMetaUnit">
                            <option value=""><?php echo __('Unit'); ?></option>
                            <?php foreach ($units as $key=>$unit) : ?>
                            <option value="<?=$key; ?>"  <?=$key ==@$product->product_unit_id?'selected':''?> ><?=$unit; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="product-variation-panel" data-order="4">
                        <label for="ProductMetaWeight"><?php echo __('Weight'); ?></label>
                        <input name="_weight[]" placeholder="<?php echo __('Weight'); ?>" value="<?= (@$product->_weight)?:'' ?>" class="form-control" type="text" id="ProductMetaWeight">
                    </div>
                    <div class="product-variation-panel" data-order="5">
                        <label for="ProductMetaPrice"><?php echo __('MRP'); ?></label>
                        <input name="_price[]" placeholder="<?php echo __('MRP'); ?>" value="<?= (@$product->_price)?:'' ?>" class="form-control _price" type="text" id="ProductMetaPrice">
                    </div>
                    <div class="product-variation-panel" data-order="6">
                        <label for="ProductMetaSalePrice"><?php echo __('Sale Price'); ?></label>
                        <input name="_sale_price[]" placeholder="<?php echo __('Sale Price'); ?>" value="<?= (@$product->_sale_price)?:'' ?>" class="form-control product-sale-price _sale_price" type="text" id="ProductMetaSalePrice">
                    </div>
                    <div class="product-variation-panel" data-order="7">
                        <label for="ProductMetaStock"><?php echo __('Stock'); ?></label>
                        <input name="_stock[]" placeholder="<?php echo __('Stock'); ?>" value="<?= (@$product->_stock)?:'' ?>"  class="form-control" type="text" id="ProductMetaStock">
                    </div> <a class="remove-variation small-round-symbole-button">x</a>
                </div>

            <?php endif; ?>

            <div class="add-more-button-container" style="<?php echo isset($product) ? 'display:block;': 'display:none;'; ?>">
                        <button type="button" class="btn-floating btn-large gradient-45deg-light-blue-cyan gradient-shadow" id="add-more-button-container"><i class="material-icons">add</i></button>
            </div>
          
        
            
        