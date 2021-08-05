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
<?=$this->Form->create($product,['id' =>'product_form']) ?>
<div class="row">
    <input type="hidden" id="counter" value="1"> 

    <div class="col-md-9">
        <div class="card">
            <h5 class="card-header m-0 show-hide">
                <?php echo __('Product Information'); ?>        
                <i class="material-icons dp48 float-right show-card" >add_circle</i>
            </h5>
            <div class="card-body" style="display: none;">
                <div class="card-text">
                    <label><?php echo __('Title'); ?></label>
                    <input name="title" required="required" placeholder="<?php echo __('Enter title'); ?>" class="form-control form-control-lg" maxlength="100" type="text" id="ProductTitle" value="<?= ($product->title)?:'' ?>">        
                </div>
                <div class="card-text">
                    <label><?php echo __('Description'); ?></label>
                    <textarea name="description" required="required" placeholder="" class="form-control" rows="10" id="ProductDescription" ><?= ($product->description)?:'' ?></textarea>    
                </div>
                
            </div>
            
        </div>

        <?=$this->element('_product_plan_details'); ?>
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
                            <option value="">Status</option>
                            <?php foreach ($product_statuses as $key=>$status) : ?>
                            <option value="<?=$key?>"  <?= ($key == $product->status)?'selected':''?> ><?=$status?></option>
                            <?php endforeach; ?>
                        </select>        
                        
                    </div>
                </div>
                <div class="card-text">
                    <button id="product_save" class="btn waves-effect waves-light" type="submit"><?php echo __('Save Product'); ?></button>
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
<!--  -->