<?php
 /*** @var \App\View\AppView $this * @var \App\Model\Entity\Product $product */ 
?>

<?= $this->Form->create() ?>
<div class="row">
    <input type="hidden" id="counter" value="1"> 

    <div class="col-md-9">
        <div class="card">
            <h5 class="card-header m-0"><?php echo __('Product Information'); ?></h5>
            <div class="card-body">
                <div class="card-text">
                    <label>
                        <?php echo __('Category'); ?>
                    </label>
                    <?php echo $this->Form->control('category_id', array('type'=>'select', 'id'=>'category_id','required' => "required",'div' => false, 'label' => false,'class' => "",'options'=>$categories) ); ?>
                </div>
                <div class="card-text">
                    <label>
                        <?php echo __('Select Sub Category'); ?>
                    </label>
                    <span>
                        <?php echo $this->Form->control('subCategory_id', array('type'=>'select', 'id'=>'Subcategory_id','required' => "required",'div' => false, 'label' => false,'class' => "",'options'=>$subCategories) ); ?>
                    </span>
                </div>
                <div class="card-text">
                    <label><?php echo __('Service Name'); ?></label>
                    <?php echo $this->Form->control('title', array('type'=>'select', 'id'=>'title','required' => "required",'div' => false, 'label' => false,'class' => "",'options'=>$subCategories) ); ?>
                </div>
                <div class="card-text">
                    <label><?php echo __('Description'); ?></label>
                    <textarea name="description" required="required" placeholder="" class="form-control" rows="20" id="ProductDescription" ></textarea>    
                </div>
            </div>
            
        </div>

        <?=$this->element('_product_gst_details'); ?>

        <?=$this->element('_bundled_product'); ?>
        <?php //if($this->request->getParam('action') ==='edit'): ?>
        <?=$this->element('_product_gallery'); ?>
        <?php //endif; ?>
        
    </div>



    <div class="col-md-3">
    <div class="card">
            <h5 class="card-header m-0"><?php echo __('Product Status'); ?></h5>
            <div class="card-body mt-2">
                <!--<div class="card-text">
                    <div class="input-field col s12">
                        <select name="status" class="" required="required" id="ProductStatus">
                            <option value="">Status</option>
                            <?php foreach ($product_statuses as $key=>$status) : ?>
                            <option value="<?=$key?>"  <?= ($key == $product->status)?'selected':''?> ><?=$status?></option>
                            <?php endforeach; ?>
                        </select>        
                        
                    </div>
                </div>-->
                <div class="card-text">
                    <button id="product_save" class="btn waves-effect waves-light" type="submit"><?php echo __('Save Product'); ?></button>
                </div>
            </div>
        </div>     
        <?=$this->element('_product_featured'); ?>
        <?=$this->element('_gallery'); ?>

    </div>
</div>
<?=$this->Form->end() ?>
<!--  -->