<?php
 /*** @var \App\View\AppView $this * @var \App\Model\Entity\Product $product */ 
?>
<style>

* {
    margin: 0;
    padding: 0
}

html {
    height: 100%
}

#grad1 {
    background-color: #ddd3ee;
    /*background-image: linear-gradient(120deg, #ddd3ee, #81D4FA)*/
}

 {
    text-align: center;
    position: relative;
    margin-top: 20px
}

 fieldset .form-card {
    background: white;
    border: 1px solid rgba(0, 0, 0, 0.3);
    border-radius: 10px;
    /*box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);*/
    padding: 20px 40px 30px 40px;
    box-sizing: border-box;
    width: 94%;
    margin: 0 3% 20px 3%;
    position: relative
}

 fieldset {
    background: white;
    border: 0 none;
    border-radius: 0.5rem;
    box-sizing: border-box;
    width: 100%;
    margin: 0;
    padding-bottom: 20px;
    position: relative
}

 fieldset:not(:first-of-type) {
    display: none
}

 fieldset .form-card {
    text-align: left;
    color: #9E9E9E
}

 input,
 textarea {
    padding: 0px 8px 4px 8px;
    border: none;
    border-bottom: 1px solid #ccc;
    border-radius: 0px;
    margin-bottom: 25px;
    margin-top: 2px;
    width: 100%;
    box-sizing: border-box;
    letter-spacing: 1px
}

 input:focus,
 textarea:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: none;
    border-bottom: 2px solid #8e43e7;
    outline-width: 0
}

.action-button {
    width: 100px;
    background: #8e43e7;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 0px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 5px
}

.action-button:hover,
.action-button:focus {
    box-shadow: 0 0 0 2px white, 0 0 0 3px #8e43e7
}

.action-button-previous {
    width: 100px;
    background: #616161;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 0px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 5px
}

.action-button-previous:hover,
.action-button-previous:focus {
    box-shadow: 0 0 0 2px white, 0 0 0 3px #616161
}

select.list-dt {
    border: none;
    outline: 0;
    border-bottom: 1px solid #ccc;
    padding: 2px 5px 3px 5px;
    margin: 2px
}

select.list-dt:focus {
    border-bottom: 2px solid #8e43e7
}

.card {
    z-index: 0;
    border: none;
    border-radius: 0.5rem;
    position: relative
}

.fs-title {
    font-size: 25px;
    color: #2C3E50;
    margin-bottom: 10px;
    font-weight: bold;
    text-align: left
}

#progressbar {
    margin-bottom: 30px;
    overflow: hidden;
    color: lightgrey
}

#progressbar .active {
    color: #000000
}

#progressbar li {
    list-style-type: none;
    font-size: 12px;
    width: 25%;
    float: left;
    position: relative
}

#progressbar #account:before {
    font-family: FontAwesome;
    content: "\f023"
}

#progressbar #personal:before {
    font-family: FontAwesome;
    content: "\f007"
}

#progressbar #payment:before {
    font-family: FontAwesome;
    content: "\f09d"
}

#progressbar #confirm:before {
    font-family: FontAwesome;
    content: "\f00c"
}

#progressbar li:before {
    width: 50px;
    height: 50px;
    line-height: 45px;
    display: block;
    font-size: 18px;
    color: #ffffff;
    background: #ddd3ee;
    border-radius: 50%;
    margin: 0 auto 10px auto;
    padding: 2px
}

#progressbar li:after {
    content: '';
    width: 100%;
    height: 2px;
    background: #ddd3ee;
    position: absolute;
    left: 0;
    top: 25px;
    z-index: -1
}

#progressbar li.active:before,
#progressbar li.active:after {
    background: #8e43e7
}

.radio-group {
    position: relative;
    margin-bottom: 25px
}

.radio {
    display: inline-block;
    width: 204;
    height: 104;
    border-radius: 0;
    background: lightblue;
    box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
    box-sizing: border-box;
    cursor: pointer;
    margin: 8px 2px
}

.radio:hover {
    box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.3)
}

.radio.selected {
    box-shadow: 1px 1px 2px 2px rgba(0, 0, 0, 0.1)
}

.fit-image {
    width: 100%;
    object-fit: cover
}  
.bg-voilet{
    background-color:  #ddd3ee;
} 
.bg-voilet-dark{
    background-color:  #8e43e7;
}
</style>
<?= $this->Form->create() ?>
<div class="row" >
    <input type="hidden" id="counter" value="1"> 

    <div class="col-md-10 px-2 py-2" id="product_form">
        <!--<div class="card">
            <h6 class="card-header m-0"><?php echo __('Service Detail'); ?></h6>
            
            <div class="card-body">
                <div class="card-text">
                    <label class="col-md-3">
                        <?php echo __('Category'); ?>
                    </label>
                    <?php echo $this->Form->control('category_id', array('type'=>'select', 'id'=>'category_id','required' => "required",'div' => false, 'label' => false,'class' => "",'options'=>$categories, 'empty' => '--Select Category--') ); ?>
                </div>
                <div class="card-text">
                    <label class="col-md-3">
                        <?php echo __('Select Sub Category'); ?>
                    </label>
                    <span>
                        <?php echo $this->Form->control('subCategory_id', array('type'=>'select', 'id'=>'Subcategory_id','required' => "required",'div' => false, 'label' => false,'class' => "",'options'=>$subCategories) ); ?>
                    </span>
                </div>
                <div class="card-text">
                    <label class="col-md-3"><?php echo __('Service Name'); ?></label>
                    <?php echo $this->Form->control('title', array('type'=>'select', 'id'=>'title','required' => "required",'div' => false, 'label' => false,'class' => "",'options'=>$subCategories) ); ?>
                </div>
                <div class="card-text">
                    <label class="col-md-3"><?php echo __('Description'); ?></label>
                    <textarea name="description" required="required" placeholder="" class="form-control" rows="5" id="ProductDescription" ></textarea>    
                </div>
            </div>
            
        </div>-->



<!-- MultiStep Form -->
<div class="container-fluid" id="grad1">
    <div class="row justify-content-center mt-0">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center pt-3 mt-0 mb-2">
            <div class="card px-0 pt-0 pb-0 mt-0 mb-0">
                <h5><strong>Select a Service</strong></h5>
                <!--<p>Select fields to go to next step</p>-->
                <div class="row">
                    <div class="col-md-12 mx-0">
                        <form id="msform" >
                            <!-- progressbar -->
                            <ul id="progressbar">
                                <li class="active" id="account"><strong>Service</strong></li>
                                <li id="personal"><strong>Service Information</strong></li>
                                <li id="payment"><strong>SERVICE PACKAGE PRICING DETAILS</strong></li>
                                <li id="confirm"><strong>Finish</strong></li>
                            </ul> 
                            <!-- fieldsets -->
                            <fieldset>
                                <div class="form-card">
                                    <!--<h2 class="fs-title">Service</h2>--> 
                                    <?php echo $this->Form->control('category_id', array('type'=>'select', 'id'=>'category_id','required' => "required",'div' => false, 'label' => false,'class' => "",'options'=>$categories, 'empty' => '--Select Category--') ); ?> 
                                    <?php echo $this->Form->control('subCategory_id', array('type'=>'select', 'id'=>'Subcategory_id','required' => "required",'div' => false, 'label' => false,'class' => "",'options'=>$subCategories) ); ?>
                                    <?php echo $this->Form->control('title', array('type'=>'select', 'id'=>'title','required' => "required",'div' => false, 'label' => false,'class' => "",'options'=>$subCategories) ); ?>
                                    <textarea name="description" required="required" placeholder="" class="form-control" rows="5" id="ProductDescription" ></textarea>    
                                </div> 
                                <input type="button" name="next" class="next action-button" value="Next Step" />
                            </fieldset>
                            <fieldset>
                                <div class="form-card py-1 px-2">
                                    <div class="card my-1">
                                        <h6 class="card-header  m-0 bg-voilet-dark">
                                            <div class="container">
                                                <div class="row ">
                                                    <div class="col-sm">
                                                    Basic Plan 
                                                    </div>
                                                    <div class="col-sm">
                                                    Standard Plan
                                                    </div>
                                                    <div class="col-sm">
                                                    Premium Plan
                                                    </div>
                                                </div>
                                            </div>
                                        </h6>
                                        <div class="card-body py-1">
                                            <div class="container" id="incTable">
                                                <?php if($prePoints!=''){
                                                    foreach ($prePoints as $key => $value): ?>
                                                    <div class="row">
                                                        <?php 
                                                            $basicVal='-';
                                                            $stdVal='-';
                                                            if (array_key_exists($key,$basicPoints)) {
                                                                $basicVal=$basicPoints[$key];
                                                            }
                                                            if (array_key_exists($key,$stdPoints)) {
                                                                $stdVal=$stdPoints[$key];
                                                            }
                                                        ?>
                                                        <div class="col-sm border-bottom py-1 "><?=$basicVal?></div>
                                                        <div class="col-sm border-bottom py-1"><?=$stdVal?></div>
                                                        <div class="col-sm border-bottom py-1"><?=$value?></div>
                                                    </div>
                                                <?php endforeach;
                                                } ?>
                                            </div>        
                                        </div>
                                    </div>
                                </div> 
                                <input type="button" name="previous" class="previous action-button-previous" value="Previous" /> 
                                <input type="button" name="next" class="next action-button" value="Next Step" />
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <div class="card">
                                        <div class="card-body py-1" >
                                            <div class="card-text row w-100 float-left bg-light">
                                                <h6 class="col-md-3">
                                                    Pricing Details
                                                </h6>
                                                <h6 class="col-md-3">
                                                    Standard Price
                                                    <input id="_basic_commission" value="<?= ($_basic_commission)?:'0' ?>" hidden >
                                                    <input id="b_commssion_oprator" value="<?= ($b_commssion_oprator)?:'0' ?>" hidden>
                                                    <input id="b_commssion_add" value="<?= ($b_commssion_add)?:'0' ?>" hidden >
                                                </h6>
                                                <h6 class="col-md-3">
                                                    Pro Price
                                                    <input id="_standard_commission" value="<?= ($_standard_commission)?:'0' ?>" hidden >
                                                    <input id="s_commssion_oprator" value="<?= ($s_commssion_oprator)?:'0' ?>" hidden>
                                                    <input id="s_commssion_add" value="<?= ($s_commssion_add)?:'0' ?>" hidden >
                                                </h6>
                                                <h6 class="col-md-3">
                                                    Premium Price
                                                    <input id="_premium_commission" value="<?= ($_premium_commission)?:'0' ?>" hidden >
                                                    <input id="p_commssion_oprator" value="<?= ($p_commssion_oprator)?:'0' ?>"  hidden>
                                                    <input id="p_commssion_add" value="<?= ($p_commssion_add)?:'0' ?>" hidden>
                                                </h6>
                                            </div>
                                            <div class="card-text row w-100 float-left">
                                                <div class="card-text row w-100 float-left">
                                                    <div class="col-md-3 py-2 font-weight-bold">
                                                        Booking Amount 
                                                    </div>
                                                    <div class="col-md-3 px-1">
                                                        <input name="_basic_booking_price" value="<?= ($product->_basic_booking_price)?:'' ?>" placeholder="Enter Booking Amount" class="form-control col-md-12" required="required" type="text">  
                                                    </div>
                                                    <div class="col-md-3 px-1">
                                                        <input name="_standard_booking_price"  value="<?= ($product->_standard_booking_price)?:'' ?>" placeholder="Enter Booking Amount" class="form-control col-md-12" required="required" type="text">  
                                                    </div>
                                                    <div class="col-md-3 px-1">
                                                        <input name="_premium_booking_price" value="<?= ($product->_premium_booking_price)?:'' ?>" placeholder="Enter Booking Amount" class="form-control col-md-12" required="required" type="text">  
                                                    </div>
                                                </div>
                                                <div class="card-text row w-100 float-left">
                                                    <div class="col-md-3 py-2 font-weight-bold">
                                                        Deliver Time 
                                                    </div>
                                                    <div class="col-md-3 px-1">
                                                        <input name="_basic_plan_time" value="<?= ($product->_basic_plan_time)?:'' ?>" placeholder="Enter Deliver Time" class="form-control col-md-12" required="required" type="text">  
                                                    </div>
                                                    <div class="col-md-3 px-1">
                                                        <input name="_standard_plan_time"  value="<?= ($product->_standard_plan_time)?:'' ?>" placeholder="Enter Deliver Time" class="form-control col-md-12" required="required" type="text">  
                                                    </div>
                                                    <div class="col-md-3 px-1">
                                                        <input name="_premium_plan_time" value="<?= ($product->_premium_plan_time)?:'' ?>" placeholder="Enter Deliver Time" class="form-control col-md-12" required="required" type="text">  
                                                    </div>
                                                </div>
                                                <div class="col-md-3 py-2 font-weight-bold">
                                                    Plan Amount 
                                                </div>
                                                <div class="col-md-3 px-1">
                                                    <input readonly name="_basic_plan_price" value="<?= ($product->_basic_plan_price)?:'' ?>" placeholder="Plan Amount" class="form-control col-md-12 _basic_plan_price" required="required" type="text">  
                                                </div>
                                                <div class="col-md-3 px-1">
                                                    <input readonly name="_standard_plan_price"  value="<?= ($product->_standard_plan_price)?:'' ?>" placeholder="Plan Amount" class="form-control col-md-12 _standard_plan_price" required="required" type="text">  
                                                </div>
                                                <div class="col-md-3 px-1">
                                                    <input readonly name="_premium_plan_price" value="<?= ($product->_premium_plan_price)?:'' ?>" placeholder="Plan Amount" class="form-control col-md-12 _premium_plan_price" required="required" type="text">  
                                                </div>
                                            </div>
                                        
                                            <div class="card-text row w-100 float-left bg-light">
                                                <h6 class="col-md-12 text-center " >
                                                <a  class="tax-amt" href="#"  data-container="body" data-toggle="tooltip" data-placement="top"
                                                title=" Professional fee, DSC, DIN & Others .You need to write all amount which will 
                                                    under Tax (GST)either you will generate invoice Service & Consultation fee to 
                                                easifyy with or without GST"> Taxable Amount</a>
                                                </h6>
                                            </div>

                                            <div class="card-text row w-100 float-left texable-data">
                                                <?php if (!is_null($product->product_seller_plans)){ 
                                                        foreach ($product->product_seller_plans as $plans):
                                                            if ($plans->taxable==1){?>
                                                                <div class="col-md-3">
                                                                    <input name="heading[]" value="<?= ($plans->heading)?:'' ?>" placeholder="Enter heading" class="form-control col-md-12" required="required" type="text">  
                                                                </div>
                                                                <div class="col-md-3 px-1">
                                                                    <input name="basic_price[]" value="<?= ($plans->basic_price)?:'' ?>" placeholder="Enter Amount" class="form-control col-md-12 basic-tax-price"  type="text">  
                                                                </div>
                                                                <div class="col-md-3 px-1">
                                                                    <input name="std_price[]"  value="<?= ($plans->std_price)?:'' ?>" placeholder="Enter  Amount" class="form-control col-md-12 std-tax-price"  type="text">  
                                                                </div>
                                                                <div class="col-md-3 px-1">
                                                                    <input name="pre_price[]" value="<?= ($plans->pre_price)?:'' ?>" placeholder="Enter Amount" class="form-control col-md-12 pre-tax-price"  type="text">  
                                                                </div>
                                                                <input name="taxable[]" value="1" hidden type="text">  
                                                <?php       } 
                                                        endforeach;
                                                    }else { ?>
                                                        <div class="col-md-3">
                                                            <input name="heading[]" value="" placeholder="Enter heading" class="form-control col-md-12" required="required" type="text">  
                                                        </div>
                                                        <div class="col-md-3 px-1">
                                                            <input name="basic_price[]" value="" placeholder="Enter Amount" class="form-control col-md-12 basic-tax-price"  type="text">  
                                                        </div>
                                                        <div class="col-md-3 px-1">
                                                            <input name="std_price[]"  value="" placeholder="Enter  Amount" class="form-control col-md-12 std-tax-price"  type="text">  
                                                        </div>
                                                        <div class="col-md-3 px-1">
                                                            <input name="pre_price[]" value="" placeholder="Enter Amount" class="form-control col-md-12 pre-tax-price"  type="text">  
                                                        </div>
                                                        <input name="taxable[]" value="1" hidden type="text">  
                                                <?php } ?>
                                            </div>
                                            <?php if($product->_basic_plan_price=="") {?>
                                                <div class="card-text row w-100 float-left px-3">
                                                    <button type="button" class="col-md-2 btn btn-sm waves-effect waves-light px-1 add-texable-field">Add New Field</button>
                                                </div>
                                            <?php } ?>
                                            <div class="card-text row w-100 float-left bg-light">
                                                <div class="col-md-3 py-2 font-weight-bold">
                                                    Total Taxable Amount 
                                                </div>
                                                <div class="col-md-3 px-1">
                                                    <input readonly name="total_basic" value="" placeholder="0" class="form-control col-md-12 total-taxable-basic"  type="text">  
                                                </div>
                                                <div class="col-md-3 px-1">
                                                    <input readonly name="total_std"  value="" placeholder="0" class="form-control col-md-12 total-taxable-std"  type="text">  
                                                </div>
                                                <div class="col-md-3 px-1">
                                                    <input readonly name="total_pre" value="" placeholder="0" class="form-control col-md-12 total-taxable-pre"  type="text">  
                                                </div>
                                            </div>
                                        
                                            <div class="card-text row w-100 float-left bg-light">
                                                <h6 class="col-md-12 text-center " >
                                                <a class="tax-amt" href="#" data-container="body" data-toggle="tooltip" data-placement="top" title=" Govt. Fee, Form Fee , Licence Fee &amp; Others .You need to write  
                                                    all amount which will be under non taxable,all fee paid to Govt. for any processing.">  Non Taxable Amount</a>
                                                </h6>
                                            </div>
                                            
                                            <div class="card-text row w-100 float-left non-texable-data">
                                            <?php if (!is_null($product->product_seller_plans)){ 
                                                        foreach ($product->product_seller_plans as $plans):
                                                            if ($plans->taxable==0){?>
                                                                <div class="col-md-3">
                                                                    <input name="heading[]" value="<?= ($plans->heading)?:'' ?>" placeholder="Enter heading" class="form-control col-md-12 " required="required" type="text">  
                                                                </div>
                                                                <div class="col-md-3 px-1">
                                                                    <input name="basic_price[]" value="<?= ($plans->basic_price)?:'' ?>" placeholder="Enter Amount" class="form-control col-md-12 basic-nontax-price"  type="text">  
                                                                </div>
                                                                <div class="col-md-3 px-1">
                                                                    <input name="std_price[]"  value="<?= ($plans->std_price)?:'' ?>" placeholder="Enter  Amount" class="form-control col-md-12 std-nontax-price"  type="text">  
                                                                </div>
                                                                <div class="col-md-3 px-1">
                                                                    <input name="pre_price[]" value="<?= ($plans->pre_price)?:'' ?>" placeholder="Enter Amount" class="form-control col-md-12 pre-nontax-price"  type="text">  
                                                                </div>
                                                                <input name="taxable[]" value="0" hidden type="text">  
                                                <?php       } 
                                                        endforeach;
                                                    }else { ?>
                                                        <div class="col-md-3">
                                                            <input name="heading[]" value="" placeholder="Enter heading" class="form-control col-md-12" required="required" type="text">  
                                                        </div>
                                                        <div class="col-md-3 px-1">
                                                            <input name="basic_price[]" value="" placeholder="Enter Amount" class="form-control col-md-12 basic-nontax-price"  type="text">  
                                                        </div>
                                                        <div class="col-md-3 px-1">
                                                            <input name="std_price[]"  value="" placeholder="Enter  Amount" class="form-control col-md-12 std-nontax-price"  type="text">  
                                                        </div>
                                                        <div class="col-md-3 px-1">
                                                            <input name="pre_price[]" value="" placeholder="Enter Amount" class="form-control col-md-12 pre-nontax-price"  type="text">  
                                                        </div>
                                                        <input name="taxable[]" value="0" hidden type="text">  
                                                <?php } ?>

                                            </div>
                                            <?php if($product->_basic_plan_price=="") {?>
                                                <div class="card-text row w-100 float-left px-3">
                                                    <button type="button" class="col-md-2 btn  btn-sm waves-effect waves-light px-1 add-nontexable-field">Add New Field</button>
                                                </div>
                                            <?php } ?>

                                            <div class="card-text row w-100 float-left bg-light">
                                                <div class="col-md-3 py-2 bold font-weight-bold">
                                                    Total Non Taxable Amount 
                                                </div>
                                                <div class="col-md-3 px-1">
                                                    <input readonly name="total_basic" value="" placeholder="0" class="form-control col-md-12 total-nontaxable-basic"  type="text">  
                                                </div>
                                                <div class="col-md-3 px-1">
                                                    <input readonly name="total_std"  value="" placeholder="0" class="form-control col-md-12 total-nontaxable-std"  type="text">  
                                                </div>
                                                <div class="col-md-3 px-1">
                                                    <input readonly name="total_pre" value="" placeholder="0" class="form-control col-md-12 total-nontaxable-pre"  type="text">  
                                                </div>
                                            </div>
                                            <div class="card-text row w-100 float-left bg-light mt-1">
                                                <div class="col-md-3 py-2 font-weight-bold">
                                                    Total Plan Amount 
                                                </div>
                                                <div class="col-md-3 px-1">
                                                    <input readonly name="total_basic_amt" value="" placeholder="0" class="form-control col-md-12 total_basic_amt"  type="text">  
                                                </div>
                                                <div class="col-md-3 px-1">
                                                    <input readonly name="total_std_amt"  value="" placeholder="0" class="form-control col-md-12 total_std_amt"  type="text">  
                                                </div>
                                                <div class="col-md-3 px-1">
                                                    <input readonly name="total_pre_amt" value="" placeholder="0" class="form-control col-md-12 total_pre_amt"  type="text">  
                                                </div>
                                            </div>
                                            <div class="card-text row w-100 float-left bg-light mt-1 py-2">
                                                <div class="col-md-12 text-center font-weight-bold" >
                                                    GST @ 18 % (If yes, Provide Compulsory GST Invoice to Customer)
                                                </div>
                                            </div>
                                            <div class="card-text row w-100 float-left mt-1">
                                                <div class="col-md-3 py-2 font-weight-bold">
                                                    GST @ 18 %
                                                </div>
                                                <div class="col-md-3 px-1">
                                                    <input readonly name="gst_basic" value="" placeholder="0" class="form-control col-md-12 gst_basic"  type="text">  
                                                </div>
                                                <div class="col-md-3 px-1">
                                                    <input readonly name="gst_std"  value="" placeholder="0" class="form-control col-md-12 gst_std"  type="text">  
                                                </div>
                                                <div class="col-md-3 px-1">
                                                    <input readonly name="gst_pre" value="" placeholder="0" class="form-control col-md-12 gst_pre"  type="text">  
                                                </div>
                                            </div>
                                            <div class="card-text row w-100 float-left bg-light mt-1">
                                                <div class="col-md-3 py-2 font-weight-bold">
                                                    Grand Total
                                                </div>
                                                <div class="col-md-3 px-1">
                                                    <input readonly name="basic_gst_total" value="" placeholder="0" class="form-control col-md-12 basic_gst_total"  type="text">  
                                                </div>
                                                <div class="col-md-3 px-1">
                                                    <input readonly name="std_gst_total"  value="" placeholder="0" class="form-control col-md-12 std_gst_total"  type="text">  
                                                </div>
                                                <div class="col-md-3 px-1">
                                                    <input readonly name="pre_gst_total" value="" placeholder="0" class="form-control col-md-12 pre_gst_total"  type="text">  
                                                </div>
                                            </div>
                                            <div class="card-text row w-100 float-left bg-light mt-1 py-2">
                                                <div class="col-md-12 text-center font-weight-bold" >
                                                    Service & Consultation Fee of easifyy
                                                </div>
                                            </div>
                                            <div class="card-text row w-100 float-left mt-1">
                                                <div class="col-md-3 py-2 font-weight-bold">
                                                    Fee Payable to easifyy
                                                </div>
                                                <div class="col-md-3 px-1">
                                                    <input readonly name="total_basic_fee" value="" placeholder="0" class="form-control col-md-12 total_basic_fee"  type="text">  
                                                </div>
                                                <div class="col-md-3 px-1">
                                                    <input readonly name="total_std_fee"  value="" placeholder="0" class="form-control col-md-12 total_std_fee"  type="text">  
                                                </div>
                                                <div class="col-md-3 px-1">
                                                    <input readonly name="total_pre_fee" value="" placeholder="0" class="form-control col-md-12 total_pre_fee"  type="text">  
                                                </div>
                                            </div>
                                            <div class="card-text row w-100 float-left mt-1">
                                                <div class="col-md-3 py-2 font-weight-bold">
                                                    TCS @ 1% of Total Amount
                                                </div>
                                                <div class="col-md-3 px-1">
                                                    <input name="total_basic_tcs" value="" placeholder="0" class="form-control col-md-12 total_basic_tcs"  type="text">  
                                                </div>
                                                <div class="col-md-3 px-1">
                                                    <input name="total_std_tcs"  value="" placeholder="0" class="form-control col-md-12 total_std_tcs"  type="text">  
                                                </div>
                                                <div class="col-md-3 px-1">
                                                    <input name="total_pre_tcs" value="" placeholder="0" class="form-control col-md-12 total_pre_tcs"  type="text">  
                                                </div>
                                            </div>
                                            <div class="card-text row w-100 float-left bg-light mt-1">
                                                <div class="col-md-3 py-2 font-weight-bold">
                                                    Net Receivable to PSP (subject to TDS, if any)
                                                </div>
                                                <div class="col-md-3 px-1">
                                                    <input readonly name="total_basic_payable" value="" placeholder="0" class="form-control col-md-12 total_basic_payable"  type="text">  
                                                </div>
                                                <div class="col-md-3 px-1">
                                                    <input readonly name="total_std_payable"  value="" placeholder="0" class="form-control col-md-12 total_std_payable"  type="text">  
                                                </div>
                                                <div class="col-md-3 px-1">
                                                    <input readonly name="total_pre_payable" value="" placeholder="0" class="form-control col-md-12 total_pre_payable"  type="text">  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <input type="button" name="previous" class="previous action-button-previous" value="Previous" /> 
                                <input type="button" id="product_save" name="make_payment" class="next action-button" value="Confirm" />
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title text-center">Success !</h2> <br><br>
                                    <div class="row justify-content-center">
                                        <div class="col-3"> <img src="https://img.icons8.com/color/96/000000/ok--v2.png" class="fit-image"> </div>
                                    </div> <br><br>
                                    <div class="row justify-content-center">
                                        <div class="col-7 text-center">
                                            <h5>Service Saved Successfully!!!!</h5>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



        <?=$this->element('_bundled_product'); ?>
        <?php //if($this->request->getParam('action') ==='edit'): ?>
        <?=$this->element('_product_gallery'); ?>
        <?php //endif; ?>
        
    </div>



    <div class="col-md-2">
        <!--<div class="card">
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
        </div>-->     
        <?=$this->element('_product_featured'); ?>
        <?=$this->element('_gallery'); ?>

    </div>
</div>
<?=$this->Form->end() ?>
<!--  -->