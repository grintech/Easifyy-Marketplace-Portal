<?php 
$options = [ 1 =>'Yes', 0 =>'No'];
?>
<?php
    $prePoints='';
    $_standard_commission=0;$_basic_commission=0;$_premium_commission=0;
    if ($product->parent_product){ 
        $basicPoints = explode("\n", trim($product->parent_product->_basic_price_desc));
        $stdPoints = explode("\n", trim($product->parent_product->_standard_price_desc));
        $prePoints = explode("\n", trim($product->parent_product->_premium_price_desc));
        $_basic_commission=$product->parent_product->_basic_commission;
        $_standard_commission=$product->parent_product->_standard_commission;
        $_premium_commission=$product->parent_product->_premium_commission;
    }
?>

<!-- Working Code-->
<div class="card">
    <h6 class="card-header  m-0">
        <div class="container">
            <div class="row">
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
<div class="card">
    <h6 class="card-header m-0 show-hide text-center">
        SERVICE PACKAGE PRICING DETAILS 
    </h6>
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
			   title="Professional fee, DSC, DIN & Others .You need to write all amount which will 
                        under Tax (GST)either you will generate invoice Service & Consultation fee to 
			            easifyy with or without GST"> Taxable Amount
                </a>
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
all amount which will be under non taxable,all fee paid to Govt. 
for any processing.">  Non Taxable Amount</a>
			   
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
