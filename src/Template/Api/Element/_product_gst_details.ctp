<?php 
$options = [ 1 =>'Yes', 0 =>'No'];
?>
<!--<div class="card">
    <h5 class="card-header m-0">Taxes and Fees
        <i class="material-icons dp48 float-right show-card" style="display: none;">add_circle</i>
        <i class="material-icons dp48 float-right hide-card">do_not_disturb_on</i>
    </h5>
    <div class="card-body">
        <div class="card-text row w-100 float-left p-1">
            <div class="md-form col-md-6">
                <label>GST</label>
                <input name="_cgst" value="<?= ($product->_cgst)?:'' ?>" placeholder="GST" class="form-control col-md-12" type="text">  
            </div>
            <div class="md-form col-md-6">
                <label>Commission</label>
                <input name="_commission" value="<?= ($product->_commission)?:'' ?>" placeholder="Commission" class="form-control col-md-12" type="text">  
            </div>
        </div>
    </div>
</div>-->

<div class="card">
    <h5 class="card-header m-0 show-hide">
        Basic Plan 
        <i class="material-icons dp48 float-right show-card" >add_circle</i>
    </h5>
    <div class="card-body" style="display: none;">
        <div class="card-text row w-100 float-left p-1">
            <div class="md-form col-md-6">
                <label>Original Amount</label>
                <input name="_basic_price" value="<?= ($product->_basic_price)?:'' ?>" placeholder="Enter Original Amount" class="form-control col-md-12" required="required" type="text">  
            </div>
            <div class="md-form col-md-6">
                <label>Plan Amount</label>
                <input name="_basic_plan_price" value="<?= ($product->_basic_plan_price)?:'' ?>" placeholder="Enter Plan Amount" class="form-control col-md-12" required="required" type="text">  
            </div>
            <div class="md-form col-md-6">
                <label>Booking Amount</label>
                <input name="_basic_booking_price" value="<?= ($product->_basic_booking_price)?:'' ?>" placeholder="Enter Booking Amount" class="form-control col-md-12" required="required" type="text">  
            </div>
            <div class="md-form form-group col-md-6">
                <label for="inputEmail4MD">Commission</label>
                <input type="text" class="form-control" value="<?= ($product->_basic_commission)?:'' ?>" name="_basic_commission" placeholder="Enter Commission">
            </div>
            <div class="md-form form-group col-md-6">
                <label for="inputEmail4MD">GST</label>
                <input type="text" class="form-control" value="<?= ($product->_basic_gst)?:'' ?>" name="_basic_gst" placeholder="Enter GST">
            </div>
            <div class="form-check mb-2 py-4  col-md-6">
                <div class="custom-control custom-checkbox mb-3">
                    <?php echo $this->Form->checkbox('_basic_gst_show', ['class' => 'form-check-input']); ?>
                    <label  for="customCheck">Show GST </label>
                </div>
            </div>
        </div>

        <div class="card-text row w-100 float-left p-1">
            <div class="card w-100  text-center">
                <div class="card-header">
                    Taxable Amount
                </div>
                <div class="card-body plan_details" myType="1" istaxable="1">
                    <div class="row ">
                        <label class="col-md-5 px-2 mx-2">Heading</label>
                        <label class="col-md-5 px-2 mx-2">Amount</label>
                    </div>
                    <?php
                    if (!is_null($product->product_plans)){ 
                        foreach ($product->product_plans as $plans):
                            if ($plans->type==1 && $plans->taxable==1){?>
                                <div class="row ">
                                    <input name="heading[]" value="<?= ($plans->heading)?:'' ?>" placeholder="heading" class="form-control col-md-5 px-2 mx-2" type="text">  
                                    <input name="price[]" value="<?= ($plans->price)?:'' ?>" placeholder="Price" class="form-control col-md-5  px-2 mx-2" type="text">
                                    <input name="type[]" hidden value="<?= ($plans->type)?:'1' ?>" placeholder="Price" class="" type="text">
                                    <input name="taxable[]" hidden value="1" placeholder="Price" class="" type="text">
                                    <i class="material-icons dp48 remove-row">highlight_off</i>
                                </div>
                    <?php } endforeach;
                    }else{?>
                            <div class="row ">
                                    <input name="heading[]" value="" placeholder="heading" class="form-control col-md-5 px-2 mx-2" type="text">  
                                    <input name="price[]" value="" placeholder="Price" class="form-control col-md-5  px-2 mx-2" type="text">
                                    <input name="type[]" hidden value="" placeholder="Price" class="" type="text">
                                    <input name="taxable[]" hidden value="1" placeholder="Price" class="" type="text">
                                    <i class="material-icons dp48 remove-row">highlight_off</i>
                           </div>
                    <?php } ?>
                </div>
                <icons-image ><span _ngcontent-lbh-c19="" class="material-icons icon-image-preview">add_circle</span>                
            </div>
            <div class="card w-100  text-center">
                <div class="card-header">
                Non Taxable Amount
                        
                </div>
                <div class="card-body plan_details" myType="1" istaxable="0">
                    <div class="row ">
                        <label class="col-md-5 px-2 mx-2">Heading</label>
                        <label class="col-md-5 px-2 mx-2">Amount</label>
                    </div>
                    <?php
                    if (!is_null($product->product_plans)){ 
                        foreach ($product->product_plans as $plans):
                            if ($plans->type==1 && $plans->taxable==0){?>
                                <div class="row ">
                                    <input name="heading[]" value="<?= ($plans->heading)?:'' ?>" placeholder="heading" class="form-control col-md-5 px-2 mx-2" type="text">  
                                    <input name="price[]" value="<?= ($plans->price)?:'' ?>" placeholder="Price" class="form-control col-md-5  px-2 mx-2" type="text">
                                    <input name="type[]" hidden value="<?= ($plans->type)?:'1' ?>" placeholder="Price" class="" type="text">
                                    <input name="taxable[]" hidden value="1" placeholder="Price" class="" type="text">
                                    <i class="material-icons dp48 remove-row">highlight_off</i>
                                </div>
                    <?php } endforeach;
                    }else{?>
                            <div class="row ">
                                    <input name="heading[]" value="" placeholder="heading" class="form-control col-md-5 px-2 mx-2" type="text">  
                                    <input name="price[]" value="" placeholder="Price" class="form-control col-md-5  px-2 mx-2" type="text">
                                    <input name="type[]" hidden value="1" placeholder="Price" class="" type="text">
                                    <input name="taxable[]" hidden value="0" placeholder="Price" class="" type="text">
                                    <i class="material-icons dp48 remove-row">highlight_off</i>
                           </div>
                    <?php } ?>
                </div>
                <icons-image ><span _ngcontent-lbh-c19="" class="material-icons icon-image-preview">add_circle</span></icons-image>                
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
    <h5 class="card-header m-0 show-hide">
        Standard Plan
        <i class="material-icons dp48 float-right show-card" >add_circle</i>
    </h5>
    <div class="card-body" style="display: none;">
        <div class="card-text row w-100 float-left p-1">
            <div class="md-form col-md-6">
                <label>Original Amount</label>
                <input name="_standard_price" value="<?= ($product->_standard_price)?:'' ?>" placeholder="Enter Original Amount" class="form-control col-md-12" type="text">  
            </div>
            <div class="md-form col-md-6">
                <label>Plan Amount</label>
                <input name="_standard_plan_price" value="<?= ($product->_standard_plan_price)?:'' ?>" placeholder="Enter Plan Amount" class="form-control col-md-12"  type="text">  
            </div>
            <div class="md-form col-md-6">
                <label>Booking Amount</label>
                <input name="_standard_booking_price" value="<?= ($product->_standard_booking_price)?:'' ?>" placeholder="Enter Booking Amount" class="form-control col-md-12" type="text">  
            </div>
            <div class="md-form form-group col-md-6">
                <label for="inputEmail4MD">Commission</label>
                <input type="text" class="form-control" value="<?= ($product->_standard_commission)?:'' ?>" name="_standard_commission" placeholder="Enter Commission">
            </div>
            <div class="md-form form-group col-md-6">
                <label for="inputEmail4MD">GST</label>
                <input type="text" class="form-control" value="<?= ($product->_standard_gst)?:'' ?>" name="_standard_gst" placeholder="Enter GST">
            </div>
            <div class="form-check mb-2 py-4 col-md-6">
                <div class="custom-control custom-checkbox mb-3">
                    <?php echo $this->Form->checkbox('_standard_gst_show', ['class' => 'form-check-input']); ?>
                    <label  for="customCheck">Show GST </label>
                </div>
            </div>
        </div>
        <div class="card-text row w-100 float-left p-1">
            <div class="card w-100  text-center">
                <div class="card-header">
                    Taxable Amount
                </div>
                <div class="card-body plan_details" myType="2" istaxable="1">
                    <div class="row ">
                        <label class="col-md-5 px-2 mx-2">Heading</label>
                        <label class="col-md-5 px-2 mx-2">Amount</label>
                    </div>
                    <?php
                    if (!is_null($product->product_plans)){ 
                        foreach ($product->product_plans as $plans):
                            if ($plans->type==2 && $plans->taxable==1){?>
                                <div class="row ">
                                    <input name="heading[]" value="<?= ($plans->heading)?:'' ?>" placeholder="heading" class="form-control col-md-5 px-2 mx-2" type="text">  
                                    <input name="price[]" value="<?= ($plans->price)?:'' ?>" placeholder="Price" class="form-control col-md-5  px-2 mx-2" type="text">
                                    <input name="type[]" hidden value="<?= ($plans->type)?:'1' ?>" placeholder="Price" class="" type="text">
                                    <input name="taxable[]" hidden value="1" placeholder="Price" class="" type="text">
                                    <i class="material-icons dp48 remove-row">highlight_off</i>
                                </div>
                    <?php } endforeach;
                    }else{?>
                            <div class="row ">
                                    <input name="heading[]" value="" placeholder="heading" class="form-control col-md-5 px-2 mx-2" type="text">  
                                    <input name="price[]" value="" placeholder="Price" class="form-control col-md-5  px-2 mx-2" type="text">
                                    <input name="type[]" hidden value="2" placeholder="Price" class="" type="text">
                                    <input name="taxable[]" hidden value="1" placeholder="Price" class="" type="text">
                                    <i class="material-icons dp48 remove-row">highlight_off</i>
                           </div>
                    <?php } ?>
                </div>
                <icons-image ><span _ngcontent-lbh-c19="" class="material-icons icon-image-preview">add_circle</span></icons-image>                
            </div>
            <div class="card w-100  text-center">
                <div class="card-header">
                Non Taxable Amount
                </div>
                <div class="card-body plan_details" myType="2" istaxable="0">
                    <div class="row ">
                        <label class="col-md-5 px-2 mx-2">Heading</label>
                        <label class="col-md-5 px-2 mx-2">Amount</label>
                    </div>
                    <?php
                    if (!is_null($product->product_plans)){ 
                        foreach ($product->product_plans as $plans):
                            if ($plans->type==2 && $plans->taxable==0){?>
                                <div class="row ">
                                    <input name="heading[]" value="<?= ($plans->heading)?:'' ?>" placeholder="heading" class="form-control col-md-5 px-2 mx-2" type="text">  
                                    <input name="price[]" value="<?= ($plans->price)?:'' ?>" placeholder="Price" class="form-control col-md-5  px-2 mx-2" type="text">
                                    <input name="type[]" hidden value="<?= ($plans->type)?:'1' ?>" placeholder="Price" class="" type="text">
                                    <input name="taxable[]" hidden value="0" placeholder="Price" class="" type="text">
                                    <i class="material-icons dp48 remove-row">highlight_off</i>
                                </div>
                    <?php } endforeach;
                    }else{?>
                            <div class="row ">
                                    <input name="heading[]" value="" placeholder="heading" class="form-control col-md-5 px-2 mx-2" type="text">  
                                    <input name="price[]" value="" placeholder="Price" class="form-control col-md-5  px-2 mx-2" type="text">
                                    <input name="type[]" hidden value="2" placeholder="Price" class="" type="text">
                                    <input name="taxable[]" hidden value="0" placeholder="Price" class="" type="text">
                                    <i class="material-icons dp48 remove-row">highlight_off</i>
                           </div>
                    <?php } ?>
                </div>
                <icons-image ><span _ngcontent-lbh-c19="" class="material-icons icon-image-preview">add_circle</span></icons-image>                
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
    <h5 class="card-header m-0 show-hide">
        Premium Plan
        <i class="material-icons dp48 float-right show-card">add_circle</i>
    </h5>
    <div class="card-body" style="display: none;">
        <div class="card-text row w-100 float-left p-1">
            <div class="md-form col-md-6">
                <label>Original Amount</label>
                <input name="_premium_price" value="<?= ($product->_premium_price)?:'' ?>" placeholder="Enter Original Amount" class="form-control col-md-12" type="text">  
            </div>
            <div class="md-form col-md-6">
                <label>Plan Amount</label>
                <input name="_premium_plan_price" value="<?= ($product->_premium_plan_price)?:'' ?>" placeholder="Enter Plan Amount" class="form-control col-md-12"  type="text">  
            </div>
            <div class="md-form col-md-6">
                <label>Booking Amount</label>
                <input name="_premium_booking_price" value="<?= ($product->_premium_booking_price)?:'' ?>" placeholder="Enter Booking Amount" class="form-control col-md-12" type="text">  
            </div>
            <div class="md-form form-group col-md-6">
                <label for="inputEmail4MD">Commission</label>
                <input type="text" class="form-control" value="<?= ($product->_premium_commission)?:'' ?>"  name="_premium_commission" placeholder="Enter Commission">
            </div>
            <div class="md-form form-group col-md-6">
                <label for="inputEmail4MD">GST</label>
                <input type="text" class="form-control" value="<?= ($product->_premium_gst)?:'' ?>"   name="_premium_gst" placeholder="Enter GST">
            </div>
            <div class="form-check mb-2 py-4 col-md-6">
                <div class="custom-control custom-checkbox mb-3">
                    <?php echo $this->Form->checkbox('_premium_gst_show', ['class' => 'form-check-input']); ?>
                    <label  for="customCheck">Show GST </label>
                </div>
            </div>
        </div>
        <div class="card-text row w-100 float-left p-1">
            <div class="card w-100  text-center">
                <div class="card-header">
                    Taxable Amount
                </div>
                <div class="card-body plan_details" myType="3" istaxable="1">
                    <div class="row ">
                        <label class="col-md-5 px-2 mx-2">Heading</label>
                        <label class="col-md-5 px-2 mx-2">Amount</label>
                    </div>
                    <?php
                    if (!is_null($product->product_plans)){ 
                        foreach ($product->product_plans as $plans):
                            if ($plans->type==3 && $plans->taxable==1){?>
                                <div class="row ">
                                    <input name="heading[]" value="<?= ($plans->heading)?:'' ?>" placeholder="heading" class="form-control col-md-5 px-2 mx-2" type="text">  
                                    <input name="price[]" value="<?= ($plans->price)?:'' ?>" placeholder="Price" class="form-control col-md-5  px-2 mx-2" type="text">
                                    <input name="type[]" hidden value="<?= ($plans->type)?:'1' ?>" placeholder="Price" class="" type="text">
                                    <input name="taxable[]" hidden value="1" placeholder="Price" class="" type="text">
                                    <i class="material-icons dp48 remove-row">highlight_off</i>
                                </div>
                    <?php } endforeach;
                    }else{?>
                            <div class="row ">
                                    <input name="heading[]" value="" placeholder="heading" class="form-control col-md-5 px-2 mx-2" type="text">  
                                    <input name="price[]" value="" placeholder="Price" class="form-control col-md-5  px-2 mx-2" type="text">
                                    <input name="type[]" hidden value="3" placeholder="Price" class="" type="text">
                                    <input name="taxable[]" hidden value="1" placeholder="Price" class="" type="text">
                                    <i class="material-icons dp48 remove-row">highlight_off</i>
                           </div>
                    <?php } ?>
                </div>
                <icons-image ><span _ngcontent-lbh-c19="" class="material-icons icon-image-preview">add_circle</span></icons-image>                
            </div>
            <div class="card w-100  text-center">
                <div class="card-header">
                Non Taxable Amount
                </div>
                <div class="card-body plan_details" myType="3" istaxable="0">
                    <div class="row ">
                        <label class="col-md-5 px-2 mx-2">Heading</label>
                        <label class="col-md-5 px-2 mx-2">Amount</label>
                    </div>
                    <?php
                    if (!is_null($product->product_plans)){ 
                        foreach ($product->product_plans as $plans):
                            if ($plans->type==3 && $plans->taxable==0){?>
                                <div class="row ">
                                    <input name="heading[]" value="<?= ($plans->heading)?:'' ?>" placeholder="heading" class="form-control col-md-5 px-2 mx-2" type="text">  
                                    <input name="price[]" value="<?= ($plans->price)?:'' ?>" placeholder="Price" class="form-control col-md-5  px-2 mx-2" type="text">
                                    <input name="type[]" hidden value="<?= ($plans->type)?:'1' ?>" placeholder="Price" class="" type="text">
                                    <input name="taxable[]" hidden value="0" placeholder="Price" class="" type="text">
                                    <i class="material-icons dp48 remove-row">highlight_off</i>
                                </div>
                    <?php } endforeach;
                    }else{?>
                            <div class="row ">
                                    <input name="heading[]" value="" placeholder="heading" class="form-control col-md-5 px-2 mx-2" type="text">  
                                    <input name="price[]" value="" placeholder="Price" class="form-control col-md-5  px-2 mx-2" type="text">
                                    <input name="type[]" hidden value="3" placeholder="Price" class="" type="text">
                                    <input name="taxable[]" hidden value="0" placeholder="Price" class="" type="text">
                                    <i class="material-icons dp48 remove-row">highlight_off</i>
                           </div>
                    <?php } ?>
                </div>
                <icons-image ><span _ngcontent-lbh-c19="" class="material-icons icon-image-preview">add_circle</span></icons-image>                
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
<div class="card">
    <h5 class="card-header m-0 show-hide">
        FAQs
        <i class="material-icons dp48 float-right show-card">add_circle</i>
    </h5>
    <div class="card-body" style="display: none;">
        <div class="card-text row w-100 float-left p-1" id="faq-section">
            <?php
                if (!is_null($product->product_faq)){ 
                    foreach ($product->product_faq as $faq): ?>
                        <div class="md-form row w-100 border p-2 rounded my-1">
                            <label class="col-md-2 p-3">Question</label>
                            <input name="questions[]" value="<?= ($faq->question)?:'' ?>" placeholder="question" class="form-control col-md-10 " type="text">  
                            <label class="col-md-2 p-3 px-1">Answer</label>
                            <textarea name="answers[]" value="" placeholder="answer" class="form-control col-md-10 px-1" type="text"><?= ($faq->answer)?:'' ?></textarea>  
                            <i class="material-icons dp48 row remove-faq py-2">highlight_off</i>
                        </div>
                <?php  endforeach;
                }else{?>
                        <div class="md-form row w-100 border p-2 rounded my-1">
                            <label class="col-md-2 p-3">Question</label>
                            <input name="questions[]" value="" placeholder="question" class="form-control col-md-10" type="text">  
                            <label class="col-md-2 p-3 ">Answer</label>
                            <textarea name="answers[]" value="" placeholder="answer" class="form-control col-md-10 px-1" type="text"></textarea>  
                            <i class="material-icons dp48 row remove-faq py-2">highlight_off</i>
                        </div>
            <?php   } ?>
        </div>
        <center><span class="material-icons add-faq">add_circle</span></center>
    </div>
</div>
