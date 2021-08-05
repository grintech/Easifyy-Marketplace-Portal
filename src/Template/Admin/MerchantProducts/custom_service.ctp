<?php
 /*** @var \App\View\AppView $this * @var \App\Model\Entity\Product $product */ 
?>
<style>
    .box-ani-bounce-7 {
        margin: 0 auto 0 auto !important;
        width: 200px !important;
    }
    </style>

<div class="row" >
    <input type="hidden" id="counter" value="1"> 

    <div class="col-md-12 px-2 py-2" id="product_form">
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
                <h5><strong>Make  Custom Professional Service</strong></h5>
                <!--<p>Select fields to go to next step</p>-->
                <div class="row mx-0">
                    <div class="col-md-12 mx-0">
                        <?= $this->Form->create(null,array('url'=>'/admin/merchant-products/custom-service','id' => 'custom-product')) ?>
                            <!-- progressbar -->
                            <ul id="CustomServiceBar">
                                <li class="active" id="account" style="width: 20%;"><strong>Select Service Category</strong></li>
                                <li id="SInclusion" style="width: 20%;"><strong>Service Inclusions</strong></li>
                                <li id="payment" style="width: 20%;"><strong>Service Pricing</strong></li>
                                <li id="personal" style="width: 20%;"><strong>Service Portfolio</strong></li>
                                <li id="confirm" style="width: 20%;"><strong>Submit</strong></li>
                                <!--<li id="confirm"><strong>Success</strong></li>-->
                            </ul> 
                            <!-- fieldsets -->
                            <fieldset>
                                <h5 class="text-voilet-dark m-0 font-weight-bold">Select Service Category & Create Unique Service you can provide to clients</h5>
                                <p style="color:gray">Add your Own New/Unique Services (which is not available in Easifyy   )</p>
                                <div class="form-card service-select-form">
                                    <!--<h2 class="fs-title">Service</h2>--> 
                                    <label>Select Category</label>
                                    <?php echo $this->Form->control('category_id', array('type'=>'select', 'id'=>'category_id','required' => "required",'div' => false, 'label' => false,'class' => "",'options'=>$categories, 'empty' => '--Select Category--') ); ?> 
                                    <input class="form-control hide mb-3" name='category_name' id='category_name' Placeholder="Enter Custom Category">
                                    <label>Sub-Category Name</label>
                                    <input class="form-control" name='subCategory-name' id='subCategory-name' placeholder="Enter Sub-Category Name"/>
                                    <label>Service Title</label>
                                    <input class="form-control" name='title' id='service-title'  placeholder="Enter Service Title" />                                    
                                    <label>Service Headline</label>
                                    <input name="_title_desc"  required="required" placeholder="Enter title Description" class="form-control" maxlength="200" type="text" id="ProductTitle" value="" />        
                                    <div style="position:relative;"><label class="toolhover"> About this Plan <i class="fa fa-info-circle themtext-c" aria-hidden="true"></i></label>
                                    <span class="tooltip1 right">
                                                        <span class="tringle">
                                                        </span>
                                                           Lorem ipsum dolor sit, amet consectetur adipisicing elit. Rem obcaecati ad, ratione ut vero dolor porro dignissimos? Debitis iste eius, unde perspiciatis aliquam cumque, temporibus voluptatem hic sapiente nisi maiores.
                                                    </span>
</div>
                                    <textarea name="description" id='service_description' required="required" placeholder="Describe about the Service" class="form-control" rows="4"></textarea>    
                                    <div style="position:relative;"><label class="toolhover"> Service Inclusions <i class="fa fa-info-circle themtext-c" aria-hidden="true"></i></label>
                                    <span class="tooltip1 right">
                                                        <span class="tringle">
                                                        </span>
                                                           Lorem ipsum dolor sit, amet consectetur adipisicing elit. Rem obcaecati ad, ratione ut vero dolor porro dignissimos? Debitis iste eius, unde perspiciatis aliquam cumque, temporibus voluptatem hic sapiente nisi maiores.
                                                    </span>
</div>
                                    <textarea name="service_coverd" id='service_coverd' required="required" placeholder="Write Point wise Service Inclusions" class="form-control" rows="4"></textarea>    
                                    <div style="position:relative;"><label class="toolhover"> Who Should take Services <i class="fa fa-info-circle themtext-c" aria-hidden="true"></i></label>
                                    <span class="tooltip1 right">
                                                        <span class="tringle">
                                                        </span>
                                                           Lorem ipsum dolor sit, amet consectetur adipisicing elit. Rem obcaecati ad, ratione ut vero dolor porro dignissimos? Debitis iste eius, unde perspiciatis aliquam cumque, temporibus voluptatem hic sapiente nisi maiores.
                                                    </span>
</div>
                                    <textarea name="service_target" id='service_target' required="required" placeholder="Write Point wise Who should buy the Service" class="form-control" rows="4" ></textarea>
                                    <label> How It's Works</label>
                                    <textarea name="service_process" id='service_process' required="required" placeholder="Write Point wise Work Flow to Complete the Service" class="form-control" rows="4" ></textarea>
                                    <label> FAQ's</label>
                                    <div class="" style="">
                                        <div class="card-text row w-100 float-left p-1" id="faq-section">
                                            <div class="md-form row w-100 border pt-1 pb-3 rounded my-1">
                                                <label class="col-md-2 p-1">Question</label>
                                                <input name="questions[]" value="" placeholder="" class="col-md-10 mb-1" type="text">
                                                <label class="col-md-2 p-1 ">Answer</label>
                                                <textarea name="answers[]" value="" placeholder="" class="form-control col-md-10 px-1 mb-1" type="text"></textarea>   
                                                <i class="material-icons dp48 row remove-faq py-2">highlight_off</i>
                                            </div>
                                        </div>
                                        <center><span class="material-icons add-faq">add_circle</span></center>
                                    </div>
                                </div> 
                                <button type="button" name="next" class="custom-service-next action-button"> Save & Continue  <i class="fa fa-angle-right" aria-hidden="true"></i></button>
                            </fieldset>
                            <fieldset>
                                <div class="d-flex justify-content-center">
                                    <h5 class="text-voilet-dark mb-2 py-2 font-weight-bold custom-border rounded col-md-6 serviceName" >Selected Service Name</h5>
                                </div>
                                <div class="form-card py-1 px-2">
                                    <div class="card my-1">
                                        <h6 class="card-header m-0 bg-voilet-dark text-white">
                                            <div class="container">
                                                <div class="row ">
                                                    <div class="col-sm">
                                                    <span class="toolhover"> Standard Plan <i class="fa fa-info-circle white-c" aria-hidden="true"></i></span>
                                                    <span class="tooltip1 right">
                                                        <span class="tringle">
                                                        </span>
                                                            Professional fee, DSC, DIN &amp; Others .You need to write all amount
                                                            Which will under Tax (GST)either you will generate invoice Service
                                                            &amp; Consultation fee to easifyy with or without GST
                                                    </span> 
                                                    </div>
                                                    <div class="col-sm">
                                                    <span class="toolhover"> Pro Plan <i class="fa fa-info-circle white-c" aria-hidden="true"></i></span>
                                                    <span class="tooltip1 right">
                                                        <span class="tringle">
                                                        </span>
                                                            Professional fee, DSC, DIN &amp; Others .You need to write all amount
                                                            Which will under Tax (GST)either you will generate invoice Service
                                                            &amp; Consultation fee to easifyy with or without GST
                                                    </span>
                                                    </div>
                                                    <div class="col-sm">
                                                    <span class="toolhover"> Premium Plan <i class="fa fa-info-circle white-c" aria-hidden="true"></i></span>
                                                    <span class="tooltip1 right">
                                                        <span class="tringle">
                                                        </span>
                                                            Professional fee, DSC, DIN &amp; Others .You need to write all amount
                                                            Which will under Tax (GST)either you will generate invoice Service
                                                            &amp; Consultation fee to easifyy with or without GST
                                                    </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </h6>
                                        <div class="card-body py-1">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-sm border-bottom py-1">
                                                        <textarea id ="_basic_price_desc" name="_basic_price_desc" required="required" placeholder="Write Point wise Standard Plan Inclusions" class="form-control" rows="8"></textarea>    
                                                    </div>
                                                    <div class="col-sm border-bottom py-1">
                                                        <textarea id ="_standard_price_desc" name="_standard_price_desc" required="required" placeholder="Write Point wise Pro Plan Inclusions" class="form-control" rows="8"></textarea>    
                                                    </div>
                                                    <div class="col-sm border-bottom py-1">
                                                        <textarea id ="_premium_price_desc" name="_premium_price_desc" required="required" placeholder="Write Point wise Premium Plan Inclusions" class="form-control" rows="8"></textarea>    
                                                    </div>
                                                </div>
                                            </div>        
                                        </div>
                                    </div>
                                </div> 
                                <button type="button" name="previous" class="previous action-button-previous"><i class="fa fa-angle-left" aria-hidden="true"></i> Previous</button>
                                <button type="button" name="next" class="service-inc-next action-button"> Save & Continue <i class="fa fa-angle-right" aria-hidden="true"></i></button>
                            </fieldset>
                            <fieldset>
                                <div class="d-flex justify-content-center">
                                    <h5 class="text-voilet-dark mb-2 py-2  font-weight-bold custom-border rounded col-md-6 serviceName" >Selected Service Name</h5>
                                </div>
                                <p style="color:gray">
                                    PSP (Professional Service Provider) needs to write Service Provider Fee &amp; Charges and Any amount for Govt. Payments with bifurcate of amounts, system will automatic calculate all things for you for easy Processing.
                                </p>                                
                                <div class="form-card py-1 px-2" id="service-Pricing">
                                    <div class="card my-1">
                                        <div class="card-body py-1" >
                                            <div class="card-text row w-100 float-left bg-voilet-dark text-white">
                                                <h6 class="col-md-3 text-center text-white">
                                                    Pricing Details
                                                </h6>
                                                <h6 class="col-md-2 text-center px-2 mx-5 text-white">
                                                    Standard Price
                                                    <input id="_basic_commission" value="<?= ($_basic_commission)?:'0' ?>" hidden >
                                                    <input id="b_commssion_oprator" value="<?= ($b_commssion_oprator)?:'-' ?>" hidden>
                                                    <input id="b_commssion_add" value="<?= ($b_commssion_add)?:'0' ?>" hidden >
                                                </h6>
                                                <h6 class="col-md-2 text-center px-2 mx-5 text-white">
                                                    Pro Price
                                                    <input id="_standard_commission" value="<?= ($_standard_commission)?:'0' ?>" hidden >
                                                    <input id="s_commssion_oprator" value="<?= ($s_commssion_oprator)?:'-' ?>" hidden>
                                                    <input id="s_commssion_add" value="<?= ($s_commssion_add)?:'0' ?>" hidden >
                                                </h6>
                                                <h6 class="col-md-2 text-center px-2 mx-4 text-white">
                                                    Premium Price
                                                    <input id="_premium_commission" value="<?= ($_premium_commission)?:'0' ?>" hidden >
                                                    <input id="p_commssion_oprator" value="<?= ($p_commssion_oprator)?:'-' ?>"  hidden>
                                                    <input id="p_commssion_add" value="<?= ($p_commssion_add)?:'0' ?>" hidden>
                                                </h6>
                                            </div>

                                            <div class="card-text row w-100 float-left border rounded p-2 bg-dark-gray">
                                                <div class="card-text row w-100 float-left ">
                                                    <h6 class="col-md-12 text-center " >
                                                    <a  class="tax-amt text-voilet-dark toolhover" href="#"> 
                                                        Service Provider Fee & Charges <i class="fa fa-info-circle themtext-c" aria-hidden="true"></i>
                                                    </a>
                                                    <span class="tooltip1 right">
                                                        <span class="tringle">
                                                        </span>
                                                            Professional fee, DSC, DIN &amp; Others .You need to write all amount
                                                            Which will under Tax (GST)either you will generate invoice Service
                                                            &amp; Consultation fee to easifyy with or without GST
                                                    </span>
                                                    </h6>
                                                </div>

                                                <div class="card-text row w-100 float-left texable-data" id="texable-data">
                                                    <?php if (!is_null($product->product_seller_plans)){ 
                                                            foreach ($product->product_seller_plans as $plans):
                                                                if ($plans->taxable==1){?>
                                                                    <div class="col-md-3">
                                                                        <input name="heading[]" value="<?= ($plans->heading)?:'' ?>" placeholder="Enter heading" class="form-control col-md-12" required="required" type="text">  
                                                                    </div>
                                                                    <div class="col-md-3 px-1">
                                                                        <input name="basic_price[]" value="<?= ($plans->basic_price)?:'' ?>" placeholder="Enter Amount" class="form-control col-md-12 basic-tax-price bg-voilet"  type="text">  
                                                                    </div>
                                                                    <div class="col-md-3 px-1">
                                                                        <input name="std_price[]"  value="<?= ($plans->std_price)?:'' ?>" placeholder="Enter  Amount" class="form-control col-md-12 std-tax-price bg-voilet"  type="text">  
                                                                    </div>
                                                                    <div class="col-md-3 px-1">
                                                                        <input name="pre_price[]" value="<?= ($plans->pre_price)?:'' ?>" placeholder="Enter Amount" class="form-control col-md-12 pre-tax-price bg-voilet"  type="text">  
                                                                    </div>
                                                                    <input name="taxable[]" value="1" hidden type="text">  
                                                    <?php       } 
                                                            endforeach;
                                                        }else { ?>
                                                            <div class="taxable-row row w-100">
                                                                <div class="col-md-3">
                                                                    <input readonly name="heading[]" value="Professional Fee *" placeholder="Enter heading" class="form-control col-md-12 input-sm-height bg-voilet" type="text">  
                                                                </div>
                                                                <div class="col-md-2 px-2 mx-5">
                                                                    <input id="basic_service_price" name="basic_price[]" value="" placeholder="Enter Amount" class="form-control col-md-12 basic-tax-price input-sm-height bg-voilet onlyNo"  type="text">  
                                                                </div>
                                                                <div class="col-md-2 px-2 mx-5">
                                                                    <input name="std_price[]"  value="" placeholder="Enter  Amount" class="form-control col-md-12 std-tax-price input-sm-height bg-voilet onlyNo"  type="text">  
                                                                </div>
                                                                <div class="col-md-2 px-2 mx-4">
                                                                    <input name="pre_price[]" value="" placeholder="Enter Amount" class="form-control col-md-12 pre-tax-price input-sm-height bg-voilet onlyNo"  type="text">  
                                                                </div>
                                                                <!--<i class="material-icons dp48 remove-texable-row">highlight_off</i>-->
                                                                <input name="taxable[]" value="1" hidden type="text">  
                                                            </div>
                                                    <?php } ?>
                                                </div>
                                                <?php if($product->_basic_plan_price=="") {?>
                                                    <div class="card-text row w-100 float-left px-3">
                                                        <!--<button type="button" class="btn btn-sm waves-effect waves-light px-1 add-texable-field"><span _ngcontent-lbh-c19="" class="material-icons icon-image-preview">add_circle</span></button>-->
                                                        <span _ngcontent-lbh-c19="" class="material-icons  add-texable-field">add_circle</span>
                                                    </div>
                                                <?php } ?>
                                                <div class="card-text row w-100 float-left ">
                                                    <div class="col-md-3 py-2 font-weight-bold">
                                                        Total Amount 
                                                    </div>
                                                    <div class="col-md-2 px-2 mx-5">
                                                        <input readonly name="total_basic" value="" placeholder="0" class="form-control col-md-12 total-taxable-basic input-sm-height"  type="text">  
                                                    </div>
                                                    <div class="col-md-2 px-2 mx-5">
                                                        <input readonly name="total_std"  value="" placeholder="0" class="form-control col-md-12 total-taxable-std input-sm-height "  type="text">  
                                                    </div>
                                                    <div class="col-md-2 px-2 mx-4">
                                                        <input readonly name="total_pre" value="" placeholder="0" class="form-control col-md-12 total-taxable-pre input-sm-height"  type="text">  
                                                    </div>
                                                </div>
                                        
                                                <div class="card-text row w-100 float-left ">
                                                    <h6 class="col-md-12 text-center " >
                                                    <a class="tax-amt non-taxable-heading text-voilet-dark toolhover" href="#">Any Amount For Govt. Payments <i class="fa fa-info-circle themtext-c" aria-hidden="true"></i></a>
                                                        <span class="tooltip1 right">
                                                        <span class="tringle">
                                                        </span>
                                                        Govt. Fee, Form Fee , Licence Fee &amp; Others .You need to write all amount which will be under non taxable,all fee paid to Govt. for any processing.
                                                    </span>
                                                    </h6>
                                                    <div class="col-md-12 text-center font-weight-bold" >
                                                        <div class="custom-control custom-switch">
                                                            <label class="switch-label no" style="position: inherit;right: 2.5em;">No</label>
                                                            <input type="checkbox" class="custom-control-input" id="non-texable-toggle" name="example12">
                                                            <label class="custom-control-label" for="non-texable-toggle">Yes</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="non-texable-div hide">
                                                    <div class="card-text row w-100 float-left non-texable-data" id="non-texable-data">
                                                        <?php if (!is_null($product->product_seller_plans)){ 
                                                                foreach ($product->product_seller_plans as $plans):
                                                                    if ($plans->taxable==0){?>
                                                                        <div class="col-md-3">
                                                                            <input name="heading[]" value="<?= ($plans->heading)?:'' ?>" placeholder="Enter Heads for Govt." class="form-control col-md-12" type="text">  
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
                                                        <?php } 
                                                                endforeach;
                                                            }else { ?>
                                                                <div class="non-taxable-row row w-100">
                                                                    <div class="col-md-3">
                                                                        <input name="heading[]" value="" placeholder="Enter Heads for Govt." class="form-control col-md-12 input-sm-height bg-voilet" required="required" type="text">  
                                                                    </div>
                                                                    <div class="col-md-2 px-2 mx-5">
                                                                        <input name="basic_price[]" value="" placeholder="Enter Amount" class="form-control col-md-12 basic-nontax-price input-sm-height bg-voilet onlyNo"  type="text">  
                                                                    </div>
                                                                    <div class="col-md-2 px-2 mx-5">
                                                                        <input name="std_price[]"  value="" placeholder="Enter  Amount" class="form-control col-md-12 std-nontax-price input-sm-height bg-voilet onlyNo"  type="text">  
                                                                    </div>
                                                                    <div class="col-md-2 px-2 mx-4">
                                                                        <input name="pre_price[]" value="" placeholder="Enter Amount" class="form-control col-md-12 pre-nontax-price input-sm-height bg-voilet onlyNo"  type="text">  
                                                                    </div>
                                                                    <i class="material-icons dp48 remove-nontexable-row">highlight_off</i>
                                                                    <input name="taxable[]" value="0" hidden type="text"> 
                                                                </div>
                                                        <?php } ?>

                                                    </div>
                                                    <?php if($product->_basic_plan_price=="") {?>
                                                        <div class="card-text row w-100 float-left px-3">
                                                            <!--<button type="button" class="col-md-2 btn  btn-sm waves-effect waves-light px-1 add-nontexable-field">Add New Field</button>-->
                                                            <span _ngcontent-lbh-c19="" class="material-icons  add-nontexable-field">add_circle</span>
                                                        </div>
                                                    <?php } ?>

                                                    <div class="card-text row w-100 float-left bg-light1">
                                                        <div class="col-md-3 py-2 bold font-weight-bold">
                                                            Total Amount 
                                                        </div>
                                                        <div class="col-md-2 px-2 mx-5">
                                                            <input readonly name="total_basic" value="" placeholder="0" class="form-control col-md-12 total-nontaxable-basic input-sm-height"  type="text">  
                                                        </div>
                                                        <div class="col-md-2 px-2 mx-5">
                                                            <input readonly name="total_std"  value="" placeholder="0" class="form-control col-md-12 total-nontaxable-std input-sm-height"  type="text">  
                                                        </div>
                                                        <div class="col-md-2 px-2 mx-4">
                                                            <input readonly name="total_pre" value="" placeholder="0" class="form-control col-md-12 total-nontaxable-pre input-sm-height"  type="text">  
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-text row w-100 float-left  mt-1">
                                                <div class="col-md-3 py-2 font-weight-bold">
                                                    Total Plan Amount 
                                                </div>
                                                <div class="col-md-2 px-2 mx-5">
                                                    <input id="_basic_plan_times" readonly name="_basic_plan_price" value="" placeholder="0" class="form-control col-md-12 total_basic_amt input-sm-height"  type="text">  
                                                </div>
                                                <div class="col-md-2 px-2 mx-5">
                                                    <input readonly name="_standard_plan_price"  value="" placeholder="0" class="form-control col-md-12 total_std_amt input-sm-height"  type="text">  
                                                </div>
                                                <div class="col-md-2 px-2 mx-4">
                                                    <input readonly name="_premium_plan_price" value="" placeholder="0" class="form-control col-md-12 total_pre_amt input-sm-height"  type="text">  
                                                </div>
                                            </div>
                                            <div class="card-text row w-100 float-left  mt-1 py-2">
                                                <div class="col-md-12 text-center font-weight-bold" >
                                                    GST @ 18 % (If yes, Provide Compulsory GST Invoice to Customer)
                                                    <div class="custom-control custom-switch">
                                                        <label class="switch-label no" style="position: inherit;right: 2.5em;">No</label>
                                                        <input type="checkbox" class="custom-control-input gst-add" id="customSwitches">
                                                        <label class="custom-control-label" for="customSwitches">Yes</label>
                                                    </div>
                                                </div>
                                                <input id="_is_taxable" name="_is_taxable" class="_is_taxable" value="0" hidden >
                                            </div>
                                            <div class="card-text row w-100 float-left border rounded p-2 bg-dark-gray">
                                                <div class="card-text row w-100 float-left mt-1 gst-div hide">
                                                    <div class="col-md-3 py-2 font-weight-bold">
                                                        GST @ 18 %
                                                    </div>
                                                    <div class="col-md-2 px-2 mx-5">
                                                        <input readonly name="gst_basic" value="" placeholder="0" class="form-control col-md-12 gst_basic input-sm-height"  type="text">  
                                                    </div>
                                                    <div class="col-md-2 px-2 mx-5">
                                                        <input readonly name="gst_std"  value="" placeholder="0" class="form-control col-md-12 gst_std input-sm-height"  type="text">  
                                                    </div>
                                                    <div class="col-md-2 px-2 mx-4">
                                                        <input readonly name="gst_pre" value="" placeholder="0" class="form-control col-md-12 gst_pre input-sm-height"  type="text">  
                                                    </div>
                                                </div>
                                                <div class="card-text row w-100 float-left  mt-1">
                                                    <div class="col-md-3 py-2 font-weight-bold">
                                                        Grand Total
                                                    </div>
                                                    <div class="col-md-2 px-2 mx-5">
                                                        <input readonly name="basic_gst_total" value="" placeholder="0" class="form-control col-md-12 basic_gst_total input-sm-height"  type="text">  
                                                    </div>
                                                    <div class="col-md-2 px-2 mx-5">
                                                        <input readonly name="std_gst_total"  value="" placeholder="0" class="form-control col-md-12 std_gst_total input-sm-height"  type="text">  
                                                    </div>
                                                    <div class="col-md-2 px-2 mx-4">
                                                        <input readonly name="pre_gst_total" value="" placeholder="0" class="form-control col-md-12 pre_gst_total input-sm-height"  type="text">  
                                                    </div>
                                                </div>
                                                <div class="card-text row w-100 float-left">
                                                    <!--<div class="col-md-3 py-2 font-weight-bold">
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
                                                    </div>-->
                                                    <div class="card-text row w-100 float-left">
                                                        <div class="col-md-3 py-2 font-weight-bold">
                                                            Booking Amount 
                                                        </div>
                                                        <div class="col-md-2 px-2 mx-5">
                                                            <input name="_basic_booking_price" value="<?= ($product->_basic_booking_price)?:'' ?>" placeholder="Enter Booking Amt." class="form-control col-md-12 input-sm-height bg-voilet _basic_booking_price onlyNo"  type="text">  
                                                        </div>
                                                        <div class="col-md-2 px-2 mx-5">
                                                            <input name="_standard_booking_price"  value="<?= ($product->_standard_booking_price)?:'' ?>" placeholder="Enter Booking Amt." class="form-control col-md-12 input-sm-height bg-voilet _standard_booking_price onlyNo" type="text">  
                                                        </div>
                                                        <div class="col-md-2 px-2 mx-4">
                                                            <input name="_premium_booking_price" value="<?= ($product->_premium_booking_price)?:'' ?>" placeholder="Enter Booking Amt." class="form-control col-md-12 input-sm-height bg-voilet _premium_booking_price onlyNo" type="text">  
                                                        </div>
                                                    </div>
                                                    <div class="card-text row w-100 float-left">
                                                        <div class="col-md-3 py-2 font-weight-bold">
                                                            Delivery Time 
                                                        </div>
                                                        <div class="col-md-2 px-2 mx-5">
                                                            <input id="_basic_plan_time" name="_basic_plan_time" maxlength="3" pattern="\d{3}" value="<?= ($product->_basic_plan_time)?:'' ?>" placeholder="Enter Delivery Time" class="form-control col-md-12 input-sm-height bg-voilet onlyNo" required="required" type="text">  
                                                        </div>
                                                        <div class="col-md-2 px-2 mx-5">
                                                            <input id="_standard_plan_time" name="_standard_plan_time" maxlength="3" pattern="\d{3}"  value="<?= ($product->_standard_plan_time)?:'' ?>" placeholder="Enter Delivery Time" class="form-control col-md-12 input-sm-height bg-voilet onlyNo" required="required"  type="text">  
                                                        </div>
                                                        <div class="col-md-2 px-2 mx-4">
                                                            <input id="_premium_plan_time" name="_premium_plan_time" maxlength="3" pattern="\d{3}" value="<?= ($product->_premium_plan_time)?:'' ?>" placeholder="Enter Delivery Time" class="form-control col-md-12 input-sm-height bg-voilet onlyNo" required="required"  type="text">  
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-text row w-100 float-left  mt-1 py-2">
                                                <div class="col-md-12 text-center font-weight-bold" >
                                                    Service & Consultation Fee of easifyy
                                                </div>
                                            </div>
                                            <div class="card-text row w-100 float-left border rounded p-2 bg-dark-gray">
                                                <div class="card-text row w-100 float-left mt-1">
                                                    <div class="col-md-3 py-2 font-weight-bold">
                                                        Fee Payable to easifyy(Subject to GST if applicable)
                                                    </div>
                                                    <div class="col-md-2 px-2 mx-5">
                                                        <input readonly name="total_basic_fee" value="" placeholder="0" class="form-control col-md-12 total_basic_fee input-sm-height"  type="text">  
                                                    </div>
                                                    <div class="col-md-2 px-2 mx-5">
                                                        <input readonly name="total_std_fee"  value="" placeholder="0" class="form-control col-md-12 total_std_fee input-sm-height"  type="text">  
                                                    </div>
                                                    <div class="col-md-2 px-2 mx-4">
                                                        <input readonly name="total_pre_fee" value="" placeholder="0" class="form-control col-md-12 total_pre_fee input-sm-height"  type="text">  
                                                    </div>
                                                </div>
                                                <!-- <div class="card-text row w-100 float-left mt-1">
                                                    <div class="col-md-3 py-2 font-weight-bold">
                                                        TCS @ 1% of Total Amount
                                                    </div>
                                                    <div class="col-md-2 px-2 mx-5">
                                                        <input readonly name="total_basic_tcs" value="" placeholder="0" class="form-control col-md-12 total_basic_tcs input-sm-height"  type="text">  
                                                    </div>
                                                    <div class="col-md-2 px-2 mx-5">
                                                        <input readonly name="total_std_tcs"  value="" placeholder="0" class="form-control col-md-12 total_std_tcs input-sm-height"  type="text">  
                                                    </div>
                                                    <div class="col-md-2 px-2 mx-4">
                                                        <input readonly name="total_pre_tcs" value="" placeholder="0" class="form-control col-md-12 total_pre_tcs input-sm-height"  type="text">  
                                                    </div>
                                                </div> -->
                                                <div class="card-text row w-100 float-left mt-1">
                                                    <div class="col-md-3 py-2 font-weight-bold">
                                                    Transaction Charges & Other Charges @ 2% of Total Amount
                                                    </div>
                                                    <div class="col-md-2 px-2 mx-5">
                                                        <input readonly name="total_basic_tcs" value="" placeholder="0" class="form-control col-md-12 total_basic_tcs input-sm-height"  type="text">  
                                                    </div>
                                                    <div class="col-md-2 px-2 mx-5">
                                                        <input readonly name="total_std_tcs"  value="" placeholder="0" class="form-control col-md-12 total_std_tcs input-sm-height"  type="text">  
                                                    </div>
                                                    <div class="col-md-2 px-2 mx-4">
                                                        <input readonly name="total_pre_tcs" value="" placeholder="0" class="form-control col-md-12 total_pre_tcs input-sm-height"  type="text">  
                                                    </div>
                                                </div>
                                                <div class="card-text row w-100 float-left mt-1">
                                                    <div class="col-md-3 py-2 font-weight-bold">
                                                    GST Charges @ 18% 
                                                    </div>
                                                    <div class="col-md-2 px-2 mx-5">
                                                        <input readonly name="total_basic_tcs" value="" placeholder="0" class="form-control col-md-12 total_payable_gst input-sm-height"  type="text">  
                                                    </div>
                                                    <div class="col-md-2 px-2 mx-5">
                                                        <input readonly name="total_std_tcs"  value="" placeholder="0" class="form-control col-md-12 total_std_payable_gst input-sm-height"  type="text">  
                                                    </div>
                                                    <div class="col-md-2 px-2 mx-4">
                                                        <input readonly name="total_pre_tcs" value="" placeholder="0" class="form-control col-md-12 total_pre_payable_gst input-sm-height"  type="text">  
                                                    </div>
                                                </div>
                                                <div class="card-text row w-100 float-left  mt-1 bg-voilet-dark text-white">
                                                    <div class="col-md-3 py-2 font-weight-bold">
                                                        Net Receivable by PSP (subject to TDS, if any)
                                                    </div>
                                                    <div class="col-md-2 px-2 mx-5">
                                                        <input readonly name="total_basic_payable" value="" placeholder="0" class="form-control  text-white border-bottom-white col-md-12 total_basic_payable input-sm-height"  type="text">  
                                                    </div>
                                                    <div class="col-md-2 px-2 mx-5">
                                                        <input readonly name="total_std_payable"  value="" placeholder="0" class="form-control  text-white border-bottom-white col-md-12 total_std_payable input-sm-height"  type="text">  
                                                    </div>
                                                    <div class="col-md-2 px-2 mx-4">
                                                        <input readonly name="total_pre_payable" value="" placeholder="0" class="form-control border-bottom-white text-white col-md-12 total_pre_payable input-sm-height"  type="text">  
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-text row w-100 float-left ">
                                                <p class="col-md-12" style="color:red" >*You will get the settlement after deduction of Easifyy Service Fee and TDS and completion of Service. </p>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <button type="button" name="previous" class="previous action-button-previous"><i class="fa fa-angle-left" aria-hidden="true"></i> Previous</button>
                                <button type="button" name="next" class="service-pricing-next action-button"> Save & Continue  <i class="fa fa-angle-right" aria-hidden="true"></i></button>
                            </fieldset>
                            <fieldset>
                                <div class="d-flex justify-content-center">
                                    <h5 class="text-voilet-dark mb-2 py-2 font-weight-bold custom-border rounded col-md-6 serviceName" >Selected Service Name</h5>
                                </div>
								<div class="upload-txt">
								   <strong>Upload your best Media Samples, Portfolio samples</strong>
								   <p>Upload photos in JPEG, JPG, PNG and ensure they're at least 600 pixels width x 400 pixels height.<br>
								   We suggest uploading them in landscape format to make better use of the space.</p>
								</div>
								<div class="upload-txt2">
								  <ul>
								   <li>Upload your original work. Faking someone else's work is strictly not allowed.</li>
								   <li>Upload trademark & copyright free images.</li>
								   <li>Upload screenshots of work done by you.</li>
								  </ul>
								</div>
                                <div class="w-100 row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <?=$this->element('_product_featured'); ?>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <?=$this->element('_gallery'); ?>
                                    </div>
                                </div>
                                <button type="button" name="previous" class="previous action-button-previous"><i class="fa fa-angle-left" aria-hidden="true"></i> Previous</button>
                                <button id="custom-product-save" class="action-button" type="submit">Save & Continue</button>
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <h4 class="fs-title text-center">Hello, PSP - We hope you have created great service !!</h4> <br><br>
                                    <div class="fs-title text-center"> <a name="previous" id="preview-Service" href="#" class="btn">Preview Service</a></div> 
                                  &nbsp; &nbsp;
                                    <div class="row justify-content-center top-bon">&nbsp; &nbsp;
                                        <input hidden type="taxt" id="productId" value="" />
                                        <div class="col-md-12 text-center"><div class="box-ani-bounce-7">
                                            <a id="custom-product-submit" href="#">
                                                <img src="../../img/ok--v2.gif" class="fit-image">
                                            </a>
                                        </div>
                                    </div>
                                    </div>  &nbsp; &nbsp;<div class="row justify-content-center">
                                       
                                    </div><br>
                                    <div class="row justify-content-center">
                                        <h6>Easifyy quality checks the service for samples, grahics and price and we than make it live for public</h6>
                                        <!--<div class="col-7 text-center">
                                            <h5>Service Saved Successfully!!!!</h5>
                                        </div>-->
                                    </div>
                                </div>
                                <button type="button" name="previous" class="previous action-button-previous"><i class="fa fa-angle-left" aria-hidden="true"></i> Previous</button>
                            </fieldset>
                            <!--<fieldset>
                                <div class="form-card" style="background-color: #d3baf1;">
                                    <h1 class="text-center">Thank You</h1>
                                    </br></br>
                                    <h4 class="fs-title text-center">Service Has been Submitted Sucessfully !!! </h4>
                                </div>
                            </fieldset>-->
                        <?=$this->Form->end() ?>
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



    <!--<div class="col-md-2">
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
        <?=$this->element('_product_featured'); ?>
        <?=$this->element('_gallery'); ?>

    </div>-->
</div>
<!--  -->