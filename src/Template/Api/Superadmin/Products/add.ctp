<?php
 /*** @var \App\View\AppView $this * @var \App\Model\Entity\Product $product */ 
//print_r($this->Site->getAllCategories()); 
$product_statuses =$this->Site->getAllProductStatuses(); 
$product_types = $this->Site->getAllProductTypes();  
$units = $this->Site->getAllProductUnits(); 
?>
<?=$this->Form->create($product,['id' =>'product_form']) ?>

<div class="row">
    <input type="hidden" id="counter" value="1"> 

    <div class="col-md-9">
        <div class="card">
            <h5 class="card-header m-0 show-hide">
                Add Service Information
                <i class="material-icons dp48 float-right show-card">add_circle</i>
            </h5>
            <div class="card-body" style="display: none;">
                <div class="card-text">
                    <label>Service Title For Menu</label>
                    <input name="menu_title" required="required" placeholder="Enter Menu title" class="form-control form-control-lg" maxlength="100" type="text" id="ProductTitle" value="<?= ($product->menu_title)?:'' ?>">        
                </div>
                <div class="card-text">
                    <label>Service Title</label>
                    <input name="title" required="required" placeholder="Enter title" class="form-control form-control-lg" maxlength="100" type="text" id="ProductTitle" value="<?= ($product->title)?:'' ?>">        
                </div>
                <div class="card-text">
                    <label>Title Description</label>
                    <input name="_title_desc" required="required" placeholder="Enter title Description" class="form-control form-control-lg" maxlength="200" type="text" id="ProductTitle" value="<?= ($product->_title_desc)?:'' ?>">        
                </div>
                <div class="card-text my-1">
                    <label>Service Description</label>
                    <textarea name="description" required="required" placeholder="" class="form-control" rows="8" id="ProductDescription" ><?= ($product->description)?:'' ?></textarea>    
                </div>
                <div class="card-text my-1">
                    <label>Services Covered</label>
                    <textarea name="service_coverd" required="required" placeholder="" class="form-control" rows="8" id="service_coverd" ><?= ($product->service_coverd)?:'' ?></textarea>    
                </div>
                <div class="card-text my-1">
                    <label>Who Should Buy</label>
                    <textarea name="service_target" required="required" placeholder="" class="form-control" rows="8" id="service_target" ><?= ($product->service_target)?:'' ?></textarea>    
                </div>                
                <div class="card-text my-1">
                    <label>How It's Done</label>
                    <textarea name="service_process" required="required" placeholder="" class="form-control" rows="8" id="service_process" ><?= ($product->service_process)?:'' ?></textarea>    
                </div>                
                <div class="card-text my-1">
                    <label>Information Guide</label>
                    <textarea name="service_guide" required="required" placeholder="" class="form-control" rows="8" id="service_guide" ><?= ($product->service_guide)?:'' ?></textarea>    
                </div>  
            </div> 
        </div>

        <?=$this->element('_product_gst_details'); ?>

        <?php if($this->request->getParam('action') ==='edit'): ?>
            <?=$this->element('_product_gallery'); ?>
        <?php endif; ?>
        
    </div>



    <div class="col-md-3">
        <div class="card">
            <h5 class="card-header m-0">Service Status</h5>
            <div class="card-body mt-2">
                <div class="card-text">
                    <div class="input-field col s12">
                        <select name="status" class="" required="required" id="ProductStatus">
                            <?php foreach ($product_statuses as $key=>$status) : ?>
                            <option value="<?=$key?>"  <?=$key ==$product->status?'selected':''?> ><?=$status?>
                            </option>
                            <?php endforeach; ?>
                        </select>        
                        
                    </div>
                </div>
                <div class="card-text">
                    <button id="product_save" class="btn waves-effect waves-light" type="submit">Save Service</button>
                </div>
            </div>
        </div>
       
        <?=$this->element('_product_categories'); ?>
        <div class="card">
            <h5 class="card-header m-0">Is addon ?</h5>
            <div class="card-body">
                <div class="card-text w-100 float-left p-1">
                    <label>Check if is addon.</label>
                    <input type="checkbox" id="is_addon" name="is_addon" value="1">
                </div>
            </div>
        </div>
        <?=$this->element('_product_featured'); ?>
        <?=$this->element('_gallery'); ?>
    </div>
</div>
<?=$this->Form->end() ?>
<!--  -->
