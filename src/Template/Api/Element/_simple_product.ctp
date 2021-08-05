<?php 
$product_types = $this->Site->getAllProductTypes(); 
$units = $this->Site->getAllProductUnits(); 
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h5 class="panel-title"><strong>Product Details</strong></h5>
    </div>
    <div class="panel-body rnd-panelbody">
        <div class="col-md-3 rnd-panelbody-item" style="margin-bottom: 10px;">
            <label>Product type</label>
            <select name="product_type_id" class="form-control _variable-type" id="ProductProductType" value="<?= ($product->product_type_id)?:'' ?>" required="required">
                <option value="">Product type</option>
                <?php foreach ($product_types as $key=>$value):?>
                <option value="<?=$key; ?>"  <?=$key ==$product->product_type_id?'selected':''?> >
                    <?=$value; ?>
                </option>
                <?php endforeach ; ?>
            </select>
        </div>
        <div id="product_meta_container">
             

            <div class="_simple-product-info" style="display: block;">
                
                <div class="_simple-product-item product-meta-item clear">
                    <div class="product-variation-panel" data-order="2">
                        <label for="ProductMetaItemCode">Item Code</label>
                        <input name="_item_code[]" placeholder="Item Code" value="<?= ($product->_item_code)?:'' ?>" class="form-control" type="text" id="ProductMetaItemCode">
                    </div>
                    <div class="product-variation-panel" data-order="2">
                        <label for="ProductMetaBarCode">Bar Code</label>
                        <input name="_bar_code[]" placeholder="Bar Code"  value="<?= ($product->_bar_code)?:'' ?>" class="form-control" type="text" id="ProductMetaBarCode">
                    </div>
                    <div class="product-variation-panel" data-order="3">
                        <label>Unit</label>
                        <select name="_unit[]" label="Unit" value="<?= ($product->_unit)?:'' ?>"  class="form-control" id="ProductMetaUnit">
                            <option value="">Unit</option>
                            <?php foreach ($units as $key=>$unit) : ?>
                            <option value="<?=$key; ?>"  <?=$key ==$product->_unit?'selected':''?> >
                                <?=$unit; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="product-variation-panel" data-order="4">
                        <label for="ProductMetaWeight">Weight</label>
                        <input name="_weight[]" placeholder="Weight" value="<?= ($product->_weight)?:'' ?>" class="form-control" type="text" id="ProductMetaWeight">
                    </div>
                    <div class="product-variation-panel" data-order="5">
                        <label for="ProductMetaPrice">MRP</label>
                        <input name="_price[]" placeholder="MRP" value="<?= ($product->_price)?:'' ?>" class="form-control _price" type="text" id="ProductMetaPrice">
                    </div>
                    <div class="product-variation-panel" data-order="6">
                        <label for="ProductMetaSalePrice">Sale Price</label>
                        <input name="_sale_price[]" placeholder="Sale Price" value="<?= ($product->_sale_price)?:'' ?>" class="form-control product-sale-price _sale_price" type="text" id="ProductMetaSalePrice">
                    </div>
                    <div class="product-variation-panel" data-order="7">
                        <label for="ProductMetaStock">Stock</label>
                        <input name="_stock[]" placeholder="Stock" value="<?= ($product->_stock)?:'' ?>"  class="form-control" type="text" id="ProductMetaStock">
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>