<?php
 /*** @var \App\View\AppView $this * @var \App\Model\Entity\Product $product */ 

    $_basic_commission=$product->_basic_commission;
    if($_basic_commission =='') {
        $_basic_commission=$parent_product_data->_basic_commission;
    }

    $b_commssion_oprator=$product->b_commssion_oprator;
    if($b_commssion_oprator =='') {
        $b_commssion_oprator=$parent_product_data->b_commssion_oprator;
    }
    $b_commssion_add=$product->b_commssion_add;
    if($b_commssion_add =='') {
        $b_commssion_add=$parent_product_data->b_commssion_add;
    }

    $_standard_commission=$product->_standard_commission;
    if($_standard_commission =='') {
        $_standard_commission=$parent_product_data->_standard_commission;
    }

    $s_commssion_oprator=$product->s_commssion_oprator;
    if($s_commssion_oprator =='') {
        $s_commssion_oprator=$parent_product_data->s_commssion_oprator;
    }
    $s_commssion_add=$product->s_commssion_add;
    if($s_commssion_add =='') {
        $s_commssion_add=$parent_product_data->s_commssion_add;
    }

    $_premium_commission=$product->_premium_commission;
    if($_premium_commission =='') {
        $_premium_commission=$parent_product_data->_premium_commission;
    }
    $p_commssion_oprator=$product->p_commssion_oprator;
    if($p_commssion_oprator =='') {
        $p_commssion_oprator=$parent_product_data->p_commssion_oprator;
    }
    $p_commssion_add=$product->p_commssion_add;
    if($p_commssion_add =='') {
        $p_commssion_add=$parent_product_data->p_commssion_add;
    }

    if($serviceType=='activated'){
        $pageTitle="Edit Activate Existing Professional Service";
        $readOnly='readonly';
        $product_faq=$activatedFaq;
    }else{
        $pageTitle="Edit Custom Professional Service";
        $readOnly='';
        $product_faq=$product->product_faq;
    }


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
<!-- MultiStep Form -->
<div class="container-fluid" id="grad1">
    <div class="row justify-content-center mt-0">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center pt-3 mt-0 mb-2">
            <div class="card px-0 pt-0 pb-0 mt-0 mb-0">
                <h5><strong><?=$pageTitle?></strong></h5>
                <!--<p>Select fields to go to next step</p>-->
                <div class="row mx-0">
                    <div class="col-md-12 mx-0">
                        <?= $this->Form->create() ?> 
                            <!-- progressbar -->
                            <ul id="progressbar">
                                <li class="active" id="account"><strong>Service Details</strong></li>
                                <li id="SInclusion"><strong>Service Inclusions</strong></li>
                                <li id="payment"><strong>Service Pricing</strong></li>
                                <li id="personal"><strong>Service Portfolio</strong></li>
                                <li id="confirm"><strong>Submit</strong></li>
                            </ul> 
                            <!-- fieldsets -->
                            <fieldset>
                                <h5 class="text-voilet-dark m-0 font-weight-bold"><?= $product->title?></h5>
                                <!--<p style="color:gray">Apni service banaye ek click me, sirf price or portfolio save karein</p>-->
                                <div class="form-card service-select-form">
                                    <label class=""> Service name</label>
                                    <input name="title" id="product-title" readonly required="required" placeholder="" class="form-control" value="<?= $mainCategory?>"  />
                                    <label class=""> Service name</label>
                                    <input name="title" id="product-title" readonly required="required" placeholder="" class="form-control" value="<?= $subCategory?>"  />
                                    <label class=""> Service name</label>
                                    <input name="title" id="product-title" readonly required="required" placeholder="" class="form-control" value="<?= $product->title?>"  />
                                    <label class=""> Service Headline</label>
                                    <input name="_title_desc" id="_title_desc" <?=$readOnly?> required="required" placeholder="" class="form-control" value="<?= $product->_title_desc?>"  />
                                    <label class="">About the Service</label>
                                    <textarea name="description" required="required" <?=$readOnly?> placeholder="Describe about the Service" class="form-control" rows="5" id="ProductDescription" ><?= $product->description?:$product->parent_product->description?></textarea>    
                                    <label class="">Services Inclusions</label>
                                    <textarea name="inclusions" required="required" <?=$readOnly?> placeholder="Write Point wise Service Inclusions" class="form-control" rows="5" id="ProductInclusions" ><?= $product->service_coverd?:$product->parent_product->service_coverd?></textarea>
                                    <label class="">Who Should take Services</label>
                                    <textarea name="service_target" required="required" <?=$readOnly?> placeholder="Write Point wise Who should buy the Service" class="form-control" rows="5" id="ProductInclusions" ><?= $product->service_target?:$product->parent_product->service_target?></textarea>
                                    <label> How It's Works</label>
                                    <textarea name="service_process" id='service_process' <?=$readOnly?> required="required" placeholder="Write Point wise Work Flow to Complete the Service" class="form-control" rows="4" ><?= $product->service_process?:$product->parent_product->service_process?></textarea>
                                    <div class="card">
                                        <h6 class="card-header m-0 show-hide">
                                            FAQs
                                            <i class="material-icons dp48 float-right show-card">add_circle</i>
                                        </h6>
                                        <div class="card-body p-0" style="display: none;">
                                            <div class="card-text row w-100 float-left p-1" id="faq-section">
                                                <?php
                                                    if (!is_null($product_faq)){ 
                                                        foreach ($product_faq as $faq): ?>
                                                            <div class="md-form row w-100 border pt-1 pb-1  rounded my-1">
                                                                <label class="col-md-2 p-1">Question</label>
                                                                <input readonly name="questions[]" value="<?= ($faq->question)?:'' ?>" placeholder="question" class="col-md-10 " type="text">  
                                                                <label class="col-md-2 p-1">Answer</label>
                                                                <textarea readonly name="answers[]" value="" placeholder="answer" class="form-control col-md-10 px-1 mb-1" type="text"><?= ($faq->answer)?:'' ?></textarea>  
                                                                <!--<i class="material-icons dp48 row remove-faq py-2">highlight_off</i>-->
                                                            </div>
                                                    <?php  endforeach;
                                                }?>
                                            </div>
                                            <!--<center><span class="material-icons add-faq">add_circle</span></center>-->
                                        </div>
                                    </div>
                                </div> 
                                <button type="button" name="next" class="next action-button">Save & Continue <i class="fa fa-angle-right" aria-hidden="true"></i></button>
                            </fieldset>
                            <fieldset>
                                <div class="d-flex justify-content-center">
                                    <h5 class="text-voilet-dark mb-2 py-2 font-weight-bold custom-border rounded col-md-6 serviceName" ><?= $product->title?></h5>
                                </div>
                                <div class="form-card py-1 px-2">
                                    <div class="card my-1">
                                        <h6 class="card-header m-0 bg-voilet-dark text-white">
                                            <div class="container">
                                                <div class="row ">
                                                    <div class="col-sm">
                                                    Standard Plan 
                                                    </div>
                                                    <div class="col-sm">
                                                    Pro Plan
                                                    </div>
                                                    <div class="col-sm">
                                                    Premium Plan
                                                    </div>
                                                </div>
                                            </div>
                                        </h6>
                                        <div class="card-body py-1">
                                            <div class="row">
                                                <div class="col-sm border-bottom py-1">
                                                    <textarea <?=$readOnly?> name="_basic_price_desc" required="required" placeholder="Standard Plan Inclusions" class="form-control" rows="8"><?= $product->_basic_price_desc?:$product->parent_product->_basic_price_desc?></textarea>    
                                                </div>
                                                <div class="col-sm border-bottom py-1">
                                                    <textarea <?=$readOnly?> name="_standard_price_desc" required="required" placeholder="Pro Plan Inclusions" class="form-control" rows="8"><?= $product->_standard_price_desc?:$product->parent_product->_standard_price_desc?></textarea>    
                                                </div>
                                                <div class="col-sm border-bottom py-1">
                                                    <textarea <?=$readOnly?> name="_premium_price_desc" required="required" placeholder="Premium Plan Inclusions" class="form-control" rows="8"><?= $product->_premium_price_desc?:$product->parent_product->_premium_price_desc?></textarea>    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <button type="button" name="previous" class="previous action-button-previous"><i class="fa fa-angle-left" aria-hidden="true"></i> Previous</button>
                                <button type="button" name="next" class="next action-button">Save & Continue <i class="fa fa-angle-right" aria-hidden="true"></i></button>
                            </fieldset>
                            <fieldset>
                                <div class="d-flex justify-content-center">
                                    <h5 class="text-voilet-dark mb-2 py-2  font-weight-bold custom-border rounded col-md-6 serviceName" ><?= $product->title?></h5>
                                </div>
                                <p style="color:gray">
                                    PSP (Professional Service Provider) needs to write Service Provider Fee & Charges and Any amount for Govt. Payments with bifurcate of amounts, system will automatic calculate all things for you for easy Processing.
                                </p>
                                <div class="form-card py-1 px-2">
                                    <div class="card my-1">
                                        <div class="card-body py-1" >
                                            <div class="card-text row w-100 float-left bg-voilet-dark text-white">
                                                <h6 class="col-md-3 text-center text-white">
                                                    Pricing Details
                                                </h6>
                                                <h6 class="col-md-2 text-center px-2 mx-5 text-white">
                                                    Standard Price
                                                    <input id="_basic_commission" value="<?= ($_basic_commission)?:'0' ?>" hidden >
                                                    <input id="b_commssion_oprator" value="<?= ($b_commssion_oprator)?:'0' ?>" hidden>
                                                    <input id="b_commssion_add" value="<?= ($b_commssion_add)?:'0' ?>" hidden >
                                                </h6>
                                                <h6 class="col-md-2 text-center px-2 mx-5 text-white">
                                                    Pro Price
                                                    <input id="_standard_commission" value="<?= ($_standard_commission)?:'0' ?>" hidden >
                                                    <input id="s_commssion_oprator" value="<?= ($s_commssion_oprator)?:'0' ?>" hidden>
                                                    <input id="s_commssion_add" value="<?= ($s_commssion_add)?:'0' ?>" hidden >
                                                </h6>
                                                <h6 class="col-md-2 text-center px-2 mx-4 text-white">
                                                    Premium Price
                                                    <input id="_premium_commission" value="<?= ($_premium_commission)?:'0' ?>" hidden >
                                                    <input id="p_commssion_oprator" value="<?= ($p_commssion_oprator)?:'0' ?>"  hidden>
                                                    <input id="p_commssion_add" value="<?= ($p_commssion_add)?:'0' ?>" hidden>
                                                </h6>
                                            </div>

                                            <div class="card-text row w-100 float-left border rounded p-2 bg-dark-gray">
                                                <div class="card-text row w-100 float-left ">
                                                    <h6 class="col-md-12 text-center " >
                                                   <a class="tax-amt text-voilet-dark" href="#" data-container="body" data-toggle="tooltip" data-placement="top" title=" Professional fee, DSC, DIN &amp; Others .You need to write all amount
Which will under Tax (GST)either you will generate invoice Service
&amp; Consultation fee to easifyy with or without GST"> 
                                                        Service Provider Fee &amp; Charges
                                                    </a>
                                                    </h6>
                                                </div>

                                                <div class="card-text row w-100 float-left texable-data" id="texable-data">
                                                    <?php if (!empty($product->product_seller_plans)){
                                                            foreach ($product->product_seller_plans as $plans):
                                                                if ($plans->taxable==1){
                                                                    ?>
                                                                    <div class="col-md-3">
                                                                        <input name="heading[]" value="<?= ($plans->heading)?:'' ?>" placeholder="Enter heading" class="form-control col-md-12"  type="text">  
                                                                    </div>
                                                                    <div class="col-md-2 px-2 mx-5">
                                                                        <input name="basic_price[]" value="<?= ($plans->basic_price) ?>" placeholder="<?= ($plans->basic_price)? 'Enter Value' :'-' ?>" class="form-control  basic-tax-price col-md-12 input-sm-height bg-voilet"  type="text">  
                                                                    </div>
                                                                    <div class="col-md-2 px-2 mx-5">
                                                                        <input name="std_price[]"  value="<?= ($plans->std_price) ?>" placeholder="<?= ($plans->std_price)? 'Enter Value' :'-' ?>" class="form-control std-tax-price col-md-12 input-sm-height bg-voilet"  type="text">  
                                                                    </div>
                                                                    <div class="col-md-2 px-2 mx-4">
                                                                        <input name="pre_price[]" value="<?= ($plans->pre_price)?>" placeholder="<?= ($plans->pre_price)? 'Enter Value' :'-' ?>" class="form-control pre-tax-price col-md-12 input-sm-height bg-voilet"  type="text">  
                                                                    </div>
                                                                    <input name="taxable[]" value="1" hidden type="text">  
                                                    <?php       } 
                                                            endforeach;
                                                        }elseif(!is_null($parentProductPlans)){
                                                            //dd("as");

                                                            //echo "parentProductPlans";
                                                            $totalBasic=0;$totalPremium=0;$totalPro=0;
                                                            foreach ($parentProductPlans as $plans):
                                                                $bPrice=$sPrice=$pPrice=0;

                                                                if($plans->taxable==1){ //Taxable amount;
                                                                    switch($plans->type){
                                                                        case 1:
                                                                            $bPrice=$plans->price;
                                                                            break;
                                                                        case 2:
                                                                            $sPrice=$plans->price;
                                                                            break;
                                                                        case 3:
                                                                            $pPrice=$plans->price;
                                                                            break;    
                                                                    }
                                                                    //$plans_taxable_array[$plans->heading]=[];
                                                                    //echo "<pre>";
                                                                    //print_r($plans_taxable_array);
                                                                    //echo "</pre>";
                                                                    //echo "----".$bPrice;

                                                                    //array_push($plans_taxable_array[$plans->heading],$bPrice);
                                                                      
                                                                    if($plans_taxable_array[$plans->heading][0]==0 ){
                                                                        $plans_taxable_array[$plans->heading][0]=$bPrice;
                                                                        $totalBasic=$totalBasic+$bPrice;
                                                                    }
                                                                    if($plans_taxable_array[$plans->heading][1]==0 ){
                                                                        $plans_taxable_array[$plans->heading][1]=$sPrice;
                                                                        $totalPremium=$totalPremium+$sPrice;
                                                                    }
                                                                    if($plans_taxable_array[$plans->heading][2]==0 ){
                                                                        $plans_taxable_array[$plans->heading][2]=$pPrice;
                                                                        $totalPro=$totalPro+$pPrice;
                                                                    }
                                                                    //$plans_taxable_array[$plans->heading][1]=$sPrice;
                                                                    //$plans_taxable_array[$plans->heading][2]=$pPrice;

                                                                    /*if($sPrice!=0){
                                                                        //array_push($plans_taxable_array[$plans->heading],$sPrice);
                                                                        $plans_taxable_array[$plans->heading][1]=$sPrice;
                                                                    }
                                                                    if($pPrice!=0){
                                                                        //array_push($plans_taxable_array[$plans->heading],$pPrice);

                                                                        $plans_taxable_array[$plans->heading][2]=$pPrice;
                                                                    } */                                                                       
                                                                    //$plans_array[$plans->heading][1]=$sPrice;
                                                                    //$plans_array[$plans->heading][2]=$pPrice;
                                                                    
                                                                }                                                                    
                                                            endforeach;
                                                            //echo "<pre>";print_r($plans_taxable_array);echo "</pre>";
                                                            foreach($plans_taxable_array as $key => $planName):
                                                                //echo "<pre>";print_r($planName);echo "</pre>";
                                                            ?>
                                                                    <div class="col-md-3">
                                                                        <input readonly  name="heading[]" value="<?= ($key)?:'' ?>" placeholder="Enter heading" class=" col-md-12" required="required" type="text">  
                                                                    </div>
                                                                    <div class="col-md-2 px-2 mx-5">
                                                                        <input <?php if($planName[0] == 0){ echo "readonly";}?> name="basic_price[]" value="<?= ($planName[0])?:'' ?>" placeholder="<?= ($planName[0])? 'Enter Value' :'-' ?>" class="col-md-12 basic-tax-price bg-voilet"  type="text">  
                                                                    </div>
                                                                    <div class="col-md-2 px-2 mx-5">
                                                                        <input <?php if($planName[1] == 0){ echo "readonly";}?> name="std_price[]"  value="<?= ($planName[1])?:'' ?>" placeholder="<?= ($planName[1])? 'Enter Value' :'-' ?>" class="col-md-12 std-tax-price bg-voilet"  type="text">  
                                                                    </div>
                                                                    <div class="col-md-2 px-2 mx-4">
                                                                        <input <?php if($planName[2] == 0){ echo "readonly";}?> name="pre_price[]" value="<?= ($planName[2])?:'' ?>" placeholder="<?= ($planName[2])? 'Enter Value' :'-' ?>" class="col-md-12 pre-tax-price bg-voilet"  type="text">  
                                                                    </div>
                                                                    <input name="taxable[]" value="1" hidden type="text">  
                                                       <?php 
                                                            endforeach;
                                                        }else { ?>
                                                            <div class="taxable-row row w-100">
                                                                <div class="col-md-3">
                                                                    <input readonly name="heading[]" value="Professional Fee *" placeholder="Enter heading" class="form-control col-md-12 input-sm-height bg-voilet" required="required" type="text">  
                                                                </div>
                                                                <div class="col-md-2 px-2 mx-5">
                                                                    <input name="basic_price[]" value="" placeholder="Enter Amount" class="form-control col-md-12 basic-tax-price input-sm-height bg-voilet"  type="text">  
                                                                </div>
                                                                <div class="col-md-2 px-2 mx-5">
                                                                    <input name="std_price[]"  value="" placeholder="Enter  Amount" class="form-control col-md-12 std-tax-price input-sm-height bg-voilet"  type="text">  
                                                                </div>
                                                                <div class="col-md-2 px-2 mx-4">
                                                                    <input name="pre_price[]" value="" placeholder="Enter Amount" class="form-control col-md-12 pre-tax-price input-sm-height bg-voilet"  type="text">  
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
                                                <div class="card-text row w-100 float-left " style="display:none;">
                                                    <div class="col-md-3 py-2 font-weight-bold">
                                                        Total Amount 
                                                    </div>
                                                    <div class="col-md-2 px-2 mx-5">
                                                        <input readonly name="total_basic"  value="" placeholder="0" class="form-control col-md-12 total-taxable-basic input-sm-height"  type="text">  
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
                                                    <a grid="" background="#000000" title=" Govt. Fee, Form Fee , Licence Fee &amp; Others.You need to
write all amount which will be under non taxable,all fee
paid to Govt. for any processing." style="" data-placement="top" data-toggle="tooltip" data-container="body" href="#" class="tax-amt non-taxable-heading text-voilet-dark">  
                                                        Any Amount For Govt. Payments
                                                    </a>
                                                    </h6>
                                                    <div class="col-md-12 text-center font-weight-bold" >
                                                        <div class="custom-control custom-switch">
                                                            <label class="switch-label no" style="position: inherit;right: 2.5em;">No</label>
                                                            <input type="checkbox" checked class="custom-control-input" id="non-texable-toggle" name="example12">
                                                            <label class="custom-control-label" for="non-texable-toggle">Yes</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="non-texable-div">
                                                    <div class="card-text row w-100 float-left non-texable-data" id="non-texable-data">
                                                        <?php if (!empty($product->product_seller_plans)){ 
                                                                foreach ($product->product_seller_plans as $plans):
                                                                    if ($plans->taxable==0){?>
                                                                        <div class="col-md-3">
                                                                            <input name="heading[]" value="<?= ($plans->heading)?:'' ?>" placeholder="Enter Heads for Govt." class="form-control col-md-12" type="text">  
                                                                        </div>
                                                                        <div class="col-md-2 px-2 mx-5">
                                                                            <input name="basic_price[]" value="<?= ($plans->basic_price)?:'' ?>" placeholder="Enter Amount" class="form-control col-md-12 basic-nontax-price input-sm-height bg-voilet"  type="text">  
                                                                        </div>
                                                                        <div class="col-md-2 px-2 mx-5">
                                                                            <input name="std_price[]"  value="<?= ($plans->std_price)?:'' ?>" placeholder="Enter  Amount" class="form-control col-md-12 std-nontax-price input-sm-height bg-voilet"  type="text">  
                                                                        </div>
                                                                        <div class="col-md-2 px-2 mx-4">
                                                                            <input name="pre_price[]" value="<?= ($plans->pre_price)?:'' ?>" placeholder="Enter Amount" class="form-control col-md-12 pre-nontax-price input-sm-height bg-voilet"  type="text">  
                                                                        </div>
                                                                        <input name="taxable[]" value="0" hidden type="text">  
                                                        <?php } 
                                                                endforeach;
                                                            }elseif(!is_null($parentProductPlans)){
                                                                foreach ($parentProductPlans as $plans):
                                                                    if($plans->taxable==0){ //Non-Taxable amount;
                                                                        $bPrice=$sPrice=$pPrice=0;
                                                                        switch($plans->type){
                                                                            case 1:
                                                                                $bPrice=$plans->price;
                                                                                break;
                                                                            case 2:
                                                                                $sPrice=$plans->price;
                                                                                break;
                                                                            case 3:
                                                                                $pPrice=$plans->price;
                                                                                break;    
                                                                        }
                                                                        if($plans_nontaxable_array[$plans->heading][0]==0){
                                                                            $plans_nontaxable_array[$plans->heading][0]=$bPrice;
                                                                        }
                                                                        if($plans_nontaxable_array[$plans->heading][1]==0){
                                                                            $plans_nontaxable_array[$plans->heading][1]=$sPrice;
                                                                        }
                                                                        if($plans_nontaxable_array[$plans->heading][2]==0){
                                                                            $plans_nontaxable_array[$plans->heading][2]=$pPrice;
                                                                        }                                                                        
                                                                        //$plans_array[$plans->heading][1]=$sPrice;
                                                                        //$plans_array[$plans->heading][2]=$pPrice;
                                                                    }                                                                    
                                                                endforeach;
                                                                //echo "<pre>";print_r($plans_nontaxable_array);echo "</pre>";
                                                                foreach($plans_nontaxable_array as $key1 => $planName1):
                                                            ?>
                                                                            <div class="col-md-3">
                                                                                <input readonly  name="heading[]" value="<?= ($key1)?:'' ?>" placeholder="Enter heading" class=" col-md-12" required="required" type="text">  
                                                                            </div>
                                                                            <div class="col-md-2 px-2 mx-5">
                                                                                <input <?php if($planName1[0] == 0){ echo "readonly";}?> name="basic_price[]" value="<?= ($planName1[0])?:'' ?>" placeholder="<?= ($planName1[0])? 'Enter Value' :'-' ?>" class="col-md-12 basic-tax-price bg-voilet"  type="text">  
                                                                            </div>
                                                                            <div class="col-md-2 px-2 mx-5">
                                                                                <input <?php if($planName1[1] == 0){ echo "readonly";}?> name="std_price[]"  value="<?= ($planName1[1])?:'' ?>" placeholder="<?= ($planName1[1])? 'Enter Value' :'-' ?>" class="col-md-12 std-tax-price bg-voilet"  type="text">  
                                                                            </div>
                                                                            <div class="col-md-2 px-2 mx-4">
                                                                                <input <?php if($planName1[2] == 0){ echo "readonly";}?> name="pre_price[]" value="<?= ($planName1[2])?:'' ?>" placeholder="<?= ($planName1[2])? 'Enter Value' :'-' ?>" class="col-md-12 pre-tax-price bg-voilet"  type="text">  
                                                                            </div>
                                                                            <input name="taxable[]" value="0" hidden type="text">  
                                                               <?php 
                                                                    endforeach;
                                                                }else { ?>
                                                                <div class="non-taxable-row row w-100">
                                                                    <div class="col-md-3">
                                                                        <input name="heading[]" value="" placeholder="Enter Heads for Govt." class="form-control col-md-12 input-sm-height bg-voilet"  type="text">  
                                                                    </div>
                                                                    <div class="col-md-2 px-2 mx-5">
                                                                        <input name="basic_price[]" value="" placeholder="Enter Amount" class="form-control col-md-12 basic-nontax-price input-sm-height bg-voilet"  type="text">  
                                                                    </div>
                                                                    <div class="col-md-2 px-2 mx-5">
                                                                        <input name="std_price[]"  value="" placeholder="Enter  Amount" class="form-control col-md-12 std-nontax-price input-sm-height bg-voilet"  type="text">  
                                                                    </div>
                                                                    <div class="col-md-2 px-2 mx-4">
                                                                        <input name="pre_price[]" value="" placeholder="Enter Amount" class="form-control col-md-12 pre-nontax-price input-sm-height bg-voilet"  type="text">  
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

                                                    <div class="card-text row w-100 float-left bg-light1" style="display:none;">
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
                                                    <input readonly name="_basic_plan_price" value="" placeholder="0" class="form-control col-md-12 total_basic_amt input-sm-height"  type="text">  
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
                                                        <input type="checkbox" <?php echo $product->_is_taxable==0? '' : 'checked'  ?>  class="custom-control-input gst-add" id="customSwitches">
                                                        <label class="custom-control-label" for="customSwitches">Yes</label>
                                                    </div>
                                                </div>
                                                <input id="_is_taxable" name="_is_taxable" class="_is_taxable" value="0" hidden >
                                            </div>

                                            <div class="card-text row w-100 float-left border rounded p-2 bg-dark-gray">
                                                <div class="card-text row w-100 float-left mt-1 gst-div <?php echo $product->_is_taxable==0? 'hide' : 'show'  ?>">
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
                                                            <input name="_basic_booking_price" value="<?= ($product->_basic_booking_price)?:'' ?>" placeholder="Enter Booking Amt." class="form-control col-md-12 input-sm-height bg-voilet " required="required" type="text">  
                                                        </div>
                                                        <div class="col-md-2 px-2 mx-5">
                                                            <input name="_standard_booking_price"  value="<?= ($product->_standard_booking_price)?:'' ?>" placeholder="Enter Booking Amt." class="form-control col-md-12 input-sm-height bg-voilet" required="required" type="text">  
                                                        </div>
                                                        <div class="col-md-2 px-2 mx-4">
                                                            <input name="_premium_booking_price" value="<?= ($product->_premium_booking_price)?:'' ?>" placeholder="Enter Booking Amt." class="form-control col-md-12 input-sm-height bg-voilet" required="required" type="text">  
                                                        </div>
                                                    </div>
                                                    <div class="card-text row w-100 float-left">
                                                        <div class="col-md-3 py-2 font-weight-bold">
                                                            Delivery Time 
                                                        </div>
                                                        <div class="col-md-2 px-2 mx-5">
                                                            <input name="_basic_plan_time" value="<?= ($product->_basic_plan_time)?:'' ?>" placeholder="Enter Delivery Time" class="form-control col-md-12 input-sm-height bg-voilet" required="required" type="text">  
                                                        </div>
                                                        <div class="col-md-2 px-2 mx-5">
                                                            <input name="_standard_plan_time"  value="<?= ($product->_standard_plan_time)?:'' ?>" placeholder="Enter Delivery Time" class="form-control col-md-12 input-sm-height bg-voilet" required="required" type="text">  
                                                        </div>
                                                        <div class="col-md-2 px-2 mx-4">
                                                            <input name="_premium_plan_time" value="<?= ($product->_premium_plan_time)?:'' ?>" placeholder="Enter Delivery Time" class="form-control col-md-12 input-sm-height bg-voilet" required="required" type="text">  
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
                                                        <input readonly name="total_std_fee"  value="0" placeholder="0" class="form-control col-md-12 total_std_fee input-sm-height"  type="text">  
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
                                                        <input readonly name="total_basic_payable" value="" placeholder="0" class=" text-white border-bottom-white col-md-12 total_basic_payable input-sm-height"  type="text">  
                                                    </div>
                                                    <div class="col-md-2 px-2 mx-5">
                                                        <input readonly name="total_std_payable"  value="" placeholder="0" class=" text-white border-bottom-white col-md-12 total_std_payable input-sm-height"  type="text">  
                                                    </div>
                                                    <div class="col-md-2 px-2 mx-4">
                                                        <input readonly name="total_pre_payable" value="" placeholder="0" class=" border-bottom-white text-white col-md-12 total_pre_payable input-sm-height"  type="text">  
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
                                <button type="button" name="next" class="next action-button">Save & Continue <i class="fa fa-angle-right" aria-hidden="true"></i></button>
                            </fieldset>
                            <fieldset>
                                <div class="d-flex justify-content-center">
                                    <h5 class="text-voilet-dark mb-2 py-2 font-weight-bold custom-border rounded col-md-6 serviceName" ><?= $product->title?></h5>
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
                                    <hr>
                                    <?=$this->element('_bundled_product'); ?>
                                    <?php //if($this->request->getParam('action') ==='edit'): ?>
                                    <?=$this->element('_product_gallery'); ?>
                                    <?php //endif; ?>
                                </div>
                                <button type="button" name="previous" class="previous action-button-previous"><i class="fa fa-angle-left" aria-hidden="true"></i> Previous</button>
                                <!-- <button type="button" name="make_payment" class="next action-button">Save & Continue <i class="fa fa-angle-right" aria-hidden="true"></i></button> -->
                                <button type="submit" id="product_save" name="submit" class="action-button waves-effect waves-light">Save & Continue <i class="fa fa-angle-right" aria-hidden="true"></i></button>
                                <img id="submitloader" src="https://easifyy.com/images/loader-orange.gif" width="50" height="50" style="display:none;">
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <h4 class="fs-title text-center">Hello, PSP - We hope you have created great service !!</h4> <br><br>
                                    <div class="fs-title text-center"> 
                                        <a name="previous" id="preview-Service" href="<?= $this->Url->build(['action' => 'view', base64_encode($product->id) ] ) ?>" class="btn">
                                            Preview Service
                                        </a>
                                    </div> 
                                    &nbsp; &nbsp;
                                    <div class="row justify-content-center top-bon">&nbsp; &nbsp;
                                        <div class="col-md-12 text-center">
                                            <div class="box-ani-bounce-7">
                                                <!-- <button type="submit" style="background-color: white;border: none;"> -->
                                                <input type="hidden" id="productId" value="<?php echo $productid; ?>" />
                                                <span id="custom-product-submit" style="cursor: pointer;" >
                                                    <img src="/img/ok--v2.gif" class="fit-image">
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    &nbsp; &nbsp;<div class="row justify-content-center">
                                       
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
                        <?=$this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
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