<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 */
?>

<!-- <div class="orders form large-9 medium-8 columns content">
    <?= $this->Form->create($order) ?>
    <fieldset>
        <legend><?= __('Edit Order') ?></legend>
        <?php
            // echo $this->Form->control('merchant_id', ['options' => $merchants]);
            // echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
            // echo $this->Form->control('address_id', ['options' => $addresses, 'empty' => true]);
            // echo $this->Form->control('coupon_id', ['options' => $coupons, 'empty' => true]);
            // echo $this->Form->control('runner_id', ['options' => $runners, 'empty' => true]);
            // echo $this->Form->control('order_mode_id', ['options' => $orderModes, 'empty' => true]);
            // echo $this->Form->control('order_status_id', ['options' => $orderStatuses, 'empty' => true]);
            // echo $this->Form->control('igst');
            // echo $this->Form->control('cgst');
            // echo $this->Form->control('sgst');
            // echo $this->Form->control('shipping');
            // echo $this->Form->control('delivery_time');
            // echo $this->Form->control('gross_total');
            // echo $this->Form->control('total');
            // echo $this->Form->control('order_notes');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div> -->

<?= $this->Form->create($order) ?>
<div class="row">
    <input type="hidden" id="counter" value="1"> 

    <div class="col-md-9">
        <div class="card">
            <!-- <h5 class="card-header m-0">Product Information</h5> -->
            <div class="card-body">
                <div class="card-text">
                    <h5>Order #23211 details</h5>
                    <label>Payment via CCAvenue. Paid on March 12, 2020 @ 6:42 am. Customer IP: 157.39.100.132</label>
                </div>
                <div class="card-text">
                    <label>Description</label>
                    <textarea name="description" required="required" placeholder="" class="form-control" rows="20" id="ProductDescription" ><?= ($product->description)?:'' ?></textarea>    
                </div>
                
            </div>
            
        </div>

        <?=$this->element('_product_gst_details'); ?>

        <div class="card">
            <h5 class="card-header m-0">Product Information</h5>
            <div class="card-body">
                <div class="card-text">
                    <?php
                    // echo "<pre>";
                    // print_r($product_types);
                    // echo "</pre>";
                    ?>
                    <label>Product type</label>
                    <span>
                        <select name="product_type_id" class="dd-product-type" id="ProductProductType" value="<?= ($product->product_type_id)?:'' ?>" required="required">
                            <option value="">Product type</option>
                            <?php foreach ($product_types as $key=>$value):?>
                            <option value="<?=$key; ?>"  <?= $key == $product->product_type_id?'selected':'' ?> ><?= $value; ?></option>
                            <?php endforeach ; ?>
                        </select>
                    </span>     
                </div>
                <div class="card-text">
                    
                     <?php if($this->request->getParam('action') ==='add'): ?>
                    
                    <div class="product-info-row">                     
                            <?=$this->element('_product-info'); ?>
                    </div>
                    <div class="add-more-button-container" style="display: none;">
                        <button type="button" class="btn-floating btn-large gradient-45deg-light-blue-cyan gradient-shadow" id="add-more-button-container"><i class="material-icons">add</i></button>
                    </div>
                <?php elseif($this->request->getParam('action') === 'edit' && $product->product_type_id == '2' ): ?>
                    <?php echo $this->element('_variable-product'); ?>
                <?php endif; ?>

         


                </div>          
            </div>          
        </div>
        <?=$this->element('_bundled_product'); ?>
        <?php //if($this->request->getParam('action') ==='edit'): ?>
        <?=$this->element('_product_gallery'); ?>
        <?php //endif; ?>
        
    </div>



    <div class="col-md-3">
        <div class="card">
            <h5 class="card-header m-0">Product Status</h5>
            <div class="card-body mt-2">
                <div class="card-text">
                    <div class="input-field col s12">
                        <select name="status" class="" required="required" id="ProductStatus">
                            <option value="">Status</option>
                            <?php foreach ($product_statuses as $key=>$status) : ?>
                            <option value="<?=$key?>"  <?= ($key == $product->status)?'selected':''?> ><?=$status?></option>
                            <?php endforeach; ?>
                        </select>        
                        
                    </div>
                </div>
                <div class="card-text">
                    <button id="product_save" class="btn waves-effect waves-light" type="submit">Save Product</button>
                </div>
            </div>
        </div>
       
        <?php //$this->element('_product_brands'); ?>
        <?php //$this->element('_product_categories'); ?>
        <?=$this->element('_product_featured'); ?>
        <?=$this->element('_gallery'); ?>

    </div>
</div>
<?=$this->Form->end() ?>
