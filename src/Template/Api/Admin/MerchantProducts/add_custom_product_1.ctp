<?php
 /*** @var \App\View\AppView $this * @var \App\Model\Entity\Product $product */ 
//print_r($this->Site->getAllCategories()); 
$product_statuses =$this->Site->getAllProductStatuses(); 
$product_types = $this->Site->getAllProductTypes(); 
$units = $this->Site->getAllProductUnits(); 

//$this->Form->templates([
    //'inputContainer' => '{{content}}'
//]);
?>

<?= $this->Form->create() ?>
<div class="row">
    <input type="hidden" id="counter" value="1"> 

    <div class="col-md-9">
        <div class="card">
            <h5 class="card-header m-0"><?php echo __('Product Information'); ?></h5>
            <div class="card-body">
                <div class="card-text">
                    <label><?php echo __('Title'); ?></label>
                    <input name="title" required="required" placeholder="<?php echo __('Enter title'); ?>" class="form-control form-control-lg" maxlength="100" type="text" id="ProductTitle" value="">        
                </div>
                <div class="card-text">
                    <label><?php echo __('Description'); ?></label>
                    <textarea name="description" required="required" placeholder="" class="form-control" rows="20" id="ProductDescription" ></textarea>    
                </div>
                
            </div>
            
        </div>

        <?=$this->element('_product_gst_details'); ?>

        <div class="card">
            <h5 class="card-header m-0"><?php echo __('Product Information'); ?></h5>
            <div class="card-body">
                <div class="card-text">
                    <label><?php echo __('Product type'); ?></label>
                    <span>
                        <select name="product_type_id" class="dd-product-type" id="ProductProductType" required="required">
                            <option value=""><?php echo __('Product type'); ?></option>
                            <?php foreach ($product_types as $key=>$value):?>
                                <option value="<?=$key; ?>"><?=$value; ?></option>
                            <?php endforeach ; ?>
                        </select>
                    </span>     
                </div>
                <div class="card-text">
                    <div class="product-info-row">                     
                        <?=$this->element('_product-info'); ?>
                    </div>
                    <!-- <div class="add-more-button-container" style="display: none;">
                        <button type="button" class="btn-floating btn-large gradient-45deg-light-blue-cyan gradient-shadow" id="add-more-button-container"><i class="material-icons">add</i></button>
                    </div> -->
                    <?php echo $this->element('_variable-product'); ?>


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
            <h5 class="card-header m-0"><?php echo __('Product Status'); ?></h5>
            <div class="card-body mt-2">
                <div class="card-text">
                    <div class="input-field col s12">
                        <select name="status" class="" required="required" id="ProductStatus">
                            <option value=""><?php echo __('Status'); ?></option>
                            <?php foreach ($product_statuses as $key=>$status) : ?>
                            <option value="<?=$key?>"  <?= ($key == $product->status)?'selected':''?> ><?=$status?></option>
                            <?php endforeach; ?>
                        </select>        
                        
                    </div>
                </div>
                <div class="card-text text-center">
                    <button id="product_save" class="btn d-btn-ui" type="submit"><?php echo __('Save Product'); ?></button>
                </div>
            </div>
        </div>
       
        <?= $this->element('_product_brands'); ?>
        <?= $this->element('_product_categories'); ?>
        <?=$this->element('_product_featured'); ?>
        <?=$this->element('_gallery'); ?>

    </div>
</div>
<?=$this->Form->end() ?>
<!--  -->