<?php 
$options = [ 1 =>'Yes', 0 =>'No'];

?>

<div class="card">
    <h5 class="card-header m-0">Is addon ?</h5>
    <div class="card-body">
        <div class="card-text w-100 float-left p-1">
            <label>Check if is addon.</label>
            <input type="checkbox" id="vehicle1" name="is_addon" value="1">
        </div>
    </div>
</div>

<div class="card">
    <h5 class="card-header m-0">Taxes and Fees</h5>
    <div class="card-body">
        <div class="card-text row w-100 float-left p-1">
            <div class="md-form col-md-6">
                <label>GST</label>
                <input name="_cgst" value="<?= ($product->_cgst)?:'' ?>" placeholder="GST" class="form-control col-md-12" type="text">  
            </div>
            <div class="md-form col-md-6">
                <label>Commission</label>
                <input name="_basic_plan_price" value="<?= ($product->Commission)?:'' ?>" placeholder="Commission" class="form-control col-md-12" type="text">  
            </div>
        </div>
    </div>
</div>

<div class="card">
    <h5 class="card-header m-0">Basic Plan</h5>
    <div class="card-body">
        <div class="card-text row w-100 float-left p-1">
            <div class="md-form col-md-6">
                <label>Original Amount</label>
                <input name="_basic_price" value="<?= ($product->_basic_price)?:'' ?>" placeholder="Original Amount" class="form-control col-md-12" required="required" type="text">  
            </div>
            <div class="md-form col-md-6">
                <label>Plan Amount</label>
                <input name="_basic_plan_price" value="<?= ($product->_basic_plan_price)?:'' ?>" placeholder="Plan Amount" class="form-control col-md-12" required="required" type="text">  
            </div>
        </div>

        <div class="card-text row w-100 float-left p-1">
            <div class="card w-100  text-center">
                <div class="card-header">
                    Price Details
                </div>
                <div class="card-body plan_details">
                    <?php
                    if (!is_null($product->product_plans)){ 
                        foreach ($product->product_plans as $plans):
                            if ($plans->type==1){?>
                                <div class="row ">
                                    <input name="heading[]" value="<?= ($plans->heading)?:'' ?>" placeholder="heading" class="form-control col-md-4 px-2" type="text">  
                                    <input name="price[]" value="<?= ($plans->price)?:'' ?>" placeholder="Price" class="form-control col-md-4  px-2" type="text">
                                    <input name="type[]" hidden value="<?= ($plans->type)?:'1' ?>" placeholder="Price" class="form-control col-md-1 px-2" type="text">
                                    <!-- Default switch -->
                                    <!-- Material switch -->
                                    <div class="switch">
                                        <label>
                                            Non Taxable<input type="checkbox" class="chk-Switch" name="texable[]" checked>
                                            <span class="lever"></span> Taxable
                                        </label>
                                    </div>
                                </div>
                    <?php } endforeach;
                    }else{?>
                            <div class="row ">
                                    <input name="heading[]" value="" placeholder="heading" class="form-control col-md-4 px-2" type="text">  
                                    <input name="price[]" value="" placeholder="Price" class="form-control col-md-4  px-2" type="text">
                                    <input name="type[]" hidden value="" placeholder="Price" class="form-control col-md-1 px-2" type="text">
                                    <div class="switch">
                                        <label>
                                            Non Taxable<input type="checkbox" class="chk-Switch" name="texable[]" checked>
                                            <span class="lever"></span> Taxable
                                        </label>
                                    </div>
                            </div>
                    <?php } ?>
                </div>
                <icons-image _ngcontent-lbh-c22="" _nghost-lbh-c19=""><span _ngcontent-lbh-c19="" class="material-icons icon-image-preview">add_circle</span></icons-image>                
            </div>
        </div>

        <div class="card-text w-100 float-left p-1">
            <label>Basic Plan Info</label>
            <textarea name="_basic_price_desc" required="required" placeholder="" class="form-control" rows="7" id="_basic_price_desc" ><?= ($product->_basic_price_desc)?:'' ?></textarea>    
        </div>
        <div class="card-text w-100 float-left p-1">
            <label>Basic Plan Time</label>
            <span>
                <input name="_basic_plan_time" value="<?= ($product->_basic_plan_time)?:'' ?>" placeholder="Basic Plan Time" class="form-control " required="required" type="number">  
            </span>
         </div>
    </div>
</div>

<div class="card">
    <h5 class="card-header m-0">Standard Plan</h5>
    <div class="card-body">
        <div class="card-text row w-100 float-left p-1">
            <input name="_standard_price" value="<?= ($product->_standard_price)?:'' ?>" placeholder="Original Amount" class="form-control col-md-5 mx-2" type="text">  
            <input name="_standard_plan_price" value="<?= ($product->_standard_plan_price)?:'' ?>" placeholder="Plan Amount" class="form-control col-md-5 mx-2" type="text">  
        </div>
        <div class="card-text row w-100 float-left p-1">
            <div class="card w-100  text-center">
                <div class="card-header">
                    Price Details
                </div>
                <div class="card-body plan_details">
                    <?php
                    if (!is_null($product->product_plans)){ 
                        foreach ($product->product_plans as $plans):
                            if ($plans->type==2){?>
                                <div class="row ">
                                    <input name="heading[]" value="<?= ($plans->heading)?:'' ?>" placeholder="heading" class="form-control col-md-4 px-2" type="text">  
                                    <input name="price[]" value="<?= ($plans->price)?:'' ?>" placeholder="Price" class="form-control col-md-4  px-2" type="text">
                                    <input name="type[]" hidden value="<?= ($plans->type)?:'1' ?>" placeholder="Price" class="form-control col-md-1 px-2" type="text">
                                    <div class="switch">
                                        <label>
                                            Non Taxable<input type="checkbox" class="chk-Switch" name="texable[]" checked>
                                            <span class="lever"></span> Taxable
                                        </label>
                                    </div>
                                </div>
                    <?php } endforeach;
                    }else{?>
                            <div class="row ">
                                    <input name="heading[]" value="" placeholder="heading" class="form-control col-md-4 px-2" type="text">  
                                    <input name="price[]" value="" placeholder="Price" class="form-control col-md-4  px-2" type="text">
                                    <input name="type[]" hidden value="" placeholder="Price" class="form-control col-md-1 px-2" type="text">
                                    <div class="switch">
                                        <label>
                                            Non Taxable<input type="checkbox" class="chk-Switch" name="texable[]" checked>
                                            <span class="lever"></span> Taxable
                                        </label>
                                    </div>
                            </div>
                    <?php } ?>
                </div>
                <icons-image _ngcontent-lbh-c22="" _nghost-lbh-c19=""><span _ngcontent-lbh-c19="" class="material-icons icon-image-preview">add_circle</span></icons-image>                
            </div>
        </div>
        <div class="card-text w-100 float-left p-1">
            <label>Standard Plan Info</label>
            <span>
                <textarea name="_standard_price_desc" placeholder="" class="form-control" rows="7" id="_standard_price_desc" ><?= ($product->_standard_price_desc)?:'' ?></textarea>    
            </span>
        </div>
        <div class="card-text w-100 float-left p-1">
            <label>Standard Plan Time</label>
            <span>
                <input name="_standard_plan_time" value="<?= ($product->_standard_plan_time)?:'' ?>" placeholder="Standard Plan Time" class="form-control" type="number">  
            </span>
         </div>
    </div>
</div>

<div class="card">
    <h5 class="card-header m-0">Premium Plan</h5>
    <div class="card-body">
        <div class="card-text row w-100 float-left p-1">
            <input name="_premium_price" value="<?= ($product->_premium_price)?:'' ?>" placeholder="Original Amount" class="form-control col-md-5 mx-2" type="text">  
            <input name="_premium_plan_price" value="<?= ($product->_premium_plan_price)?:'' ?>" placeholder="Plan Amount" class="form-control col-md-5 mx-2" type="text">  
        </div>
        <div class="card-text row w-100 float-left p-1">
            <div class="card w-100  text-center">
                <div class="card-header">
                    Price Details
                </div>
                <div class="card-body plan_details">
                    <?php
                    if (!is_null($product->product_plans)){ 
                        foreach ($product->product_plans as $plans):
                            if ($plans->type==3){?>
                                <div class="row ">
                                    <input name="heading[]" value="<?= ($plans->heading)?:'' ?>" placeholder="heading" class="form-control col-md-4 px-2" type="text">  
                                    <input name="price[]" value="<?= ($plans->price)?:'' ?>" placeholder="Price" class="form-control col-md-4  px-2" type="text">
                                    <input name="type[]" hidden value="<?= ($plans->type)?:'1' ?>" placeholder="Price" class="form-control col-md-1 px-2" type="text">
                                    <div class="switch">
                                        <label>
                                            Non Taxable<input type="checkbox" class="chk-Switch" name="texable[]" checked>
                                            <span class="lever"></span> Taxable
                                        </label>
                                    </div>
                                </div>
                    <?php } endforeach;
                    }else{?>
                            <div class="row ">
                                    <input name="heading[]" value="" placeholder="heading" class="form-control col-md-4 px-2" type="text">  
                                    <input name="price[]" value="" placeholder="Price" class="form-control col-md-4  px-2" type="text">
                                    <input name="type[]" hidden value="" placeholder="Price" class="form-control col-md-1 px-2" type="text">
                                    <div class="switch">
                                        <label>
                                            Non Taxable<input type="checkbox" class="chk-Switch" name="texable[]" checked>
                                            <span class="lever"></span> Taxable
                                        </label>
                                    </div>
                            </div>
                    <?php } ?>
                </div>
                <icons-image _ngcontent-lbh-c22="" _nghost-lbh-c19=""><span _ngcontent-lbh-c19="" class="material-icons icon-image-preview">add_circle</span></icons-image>                
            </div>
        </div>
        <div class="card-text w-100 float-left p-1">
            <label>Premium Plan Info</label>
            <span>
                <textarea name="_premium_price_desc" placeholder="" class="form-control" rows="7" id="_premium_price_desc" ><?= ($product->_premium_price_desc=='')? '' : trim($product->_premium_price_desc) ?></textarea>    
            </span>
        </div>
        <div class="card-text w-100 float-left p-1">
            <label>Premium Plan Time</label>
            <span>
                <input name="_premium_plan_time" value="<?= ($product->_premium_plan_time)?:'' ?>" placeholder="Premium Plan Time" class="form-control" type="number">  
            </span>
         </div>
    </div>
</div>
