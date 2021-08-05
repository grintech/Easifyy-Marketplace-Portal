<?php 
  //dd($amountType);
  $sType="";
  switch ($serviceType){
  case 1:
    $servicePrice=$service[0]['_basic_price']; echo '<br>';
    $servicePlanPrice=$service[0]['_basic_plan_price']; echo '<br>';
    $serviceBookingPrice=$service[0]['_basic_booking_price']; 
    $serviceGst=$service[0]['_basic_gst']; 
    $serviceGstShow=$service[0]['_basic_gst_show'];
    $serviceDesc=$service[0]['_basic_price_desc'];
    $serviceTime=$service[0]['_basic_plan_time']; 
    $sType="Standard Plan";
    //dd($service[0]['product_plans']);
    break;
  case 2:
    $servicePrice=$service[0]['_standard_price'];
    $servicePlanPrice=$service[0]['_standard_plan_price']; 
    $serviceBookingPrice=$service[0]['_standard_booking_price']; 
    $serviceGst=$service[0]['_standard_gst']; 
    $serviceGstShow=$service[0]['_standard_gst_show'];
    $serviceDesc=$service[0]['_standard_price_desc'];
    $serviceTime=$service[0]['_standard_plan_time']; 
    $sType="Pro Plan";
    break;
  case 3:
    $servicePrice=$service[0]['_premium_price'];
    $servicePlanPrice=$service[0]['_premium_plan_price'];
    $serviceBookingPrice=$service[0]['_premium_booking_price'];  
    $serviceGst=$service[0]['_premium_gst']; 
    $serviceGstShow=$service[0]['_premium_gst_show'];
    $serviceDesc=$service[0]['_premium_price_desc'];
    $serviceTime=$service[0]['_premium_plan_time']; 
    $sType="Premium Plan";  
    break;
  }
  //$amountType=0 //Booking Amount 
  //$amountType=1 //Full Amount 
  $isBooking=0;
  switch ($amountType) {
    case 0:
      $booking_charges=$serviceBookingPrice;
      $isBooking=1;
      break;
    case 1:
      $booking_charges=$servicePlanPrice;
      $isBooking=0;
      break;  
    default:
      # code...
      break;
  }


  $percentage=round((($servicePrice-$servicePlanPrice)/$servicePrice)*100,2);
  foreach ($service[0]['product_plans'] as $product_plans){ 
    if($product_plans->type == $serviceType){
      if($product_plans->taxable==1){
        $product_plans->price;
      }else{
        $product_plans->price;
      }
    }
  }

  // echo '<pre>'; print_r($loguser); echo '</pre>';
  // die();
?>
<div class="container main-w3pvt main-cont" >
  <div class="ty-mainbox-container clearfix"><h3 class="title-w3 pt-3 mb-sm-5 mb-4 text-dark text-center font-weight-bold">ORDER SUMMARY</h3>
   <div class="row py-1">
    <?php //print_r($loguser);echo $loguser['first_name']?>
    <div class="col-md-6 box-w" style="padding-bottom: 20px;">
      <div class="col-sm-12 col-sm-offset-1">
	  <div class="selected-professional-card bg-lightpurple" style="position: relative;box-shadow: 0 2px 10px rgba(0,0,0,.1);transition: box-shadow .3s ease 0s;min-height: 260px;padding: 15px 25px;border:1px solid #eee; background: #f8f8f8;">
          <p class="head-title">ORDER DETAILS</p>
          <h5 class="py-2 font-weight-bold"><?php echo $service[0]['title']?> (Plan ID:MIN-PLC-<?php echo $service[0]['id'].'-'.$sType?>)</h5>
          <?= $this->Form->create(NULL, array('url'=>'/Order/add')) ?>
          <input type='hidden' name='product_id' value="<?php echo $service[0]['id']?>">
          <input type='hidden' name='merchant_id' value="0" >
          <input type='hidden' name='total' value="<?php echo $booking_charges?>">
          <input type='hidden' name='booking_amount' class="booking_amount" id="booking_amount" value="<?php echo $booking_charges?>">
          <input type='hidden' name='gross_total' class="gross_total" id="gross_total" value="<?php echo $servicePlanPrice?>">
          <input type='hidden' name='delivery_time' value="<?php echo $serviceTime?>">
          <input type="hidden" name='taxable_amount' value="">
          <input type='hidden' name='order_mode_id' value="<?php echo $serviceType?>">
          <input type='hidden' name='order_status_id' value="5">
          <input type='hidden' name='merchant_product_id' value="<?php echo $service[0]['id']?>">
          <input type='hidden' name='quantity' value="1">
          <input type='hidden' name='price' value="<?php echo $servicePrice?>">
          <input type='hidden' name='amountType' value="<?php echo $amountType?>">
          <input type='hidden' name='is_booking' value="<?php echo $isBooking?>"?>
          <input type='hidden' name='couponinUse' value="">
          <input type='hidden' name='coupon_id' value="">
          <input type='hidden' name='coupon_discount' value="">



          <div class="form-row">
            <div class="form-group col-md-6">
              <?php echo $this->Form->text('first_name',['class' => 'form-control', 'placeholder' => "First Name",'value'=>$loguser['first_name'],'required'=>'required' ]);?>
            </div>
            <div class="form-group col-md-6">
              <?php echo $this->Form->text('last_name',['class' => 'form-control', 'placeholder' => "Last Name",'value'=>$loguser['last_name'],'required'=>'required' ]);?>

            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <?php echo $this->Form->text('phone',['class' => 'form-control', 'placeholder' => "Mobile No.",'value'=>$loguser['phone'],'required'=>'required' ]);?>
            </div>
          </div>

          <div class="form-group ">
            <?php echo $this->Form->email('username',['class' => 'form-control', 'placeholder' => "Email",'id' =>"username",'value'=>$loguser['username'],'required'=>'required' ]);?>
          </div>
          <?php if(empty($loguser)): ?>
              <div class="form-group ">
                  <?php echo $this->Form->password('password',['class' => 'form-control', 'placeholder' => "password",'id' =>"password",'value'=>$loguser['password'] ]);?>
              </div> 
          <?php endif; ?>
          
          
          <?php if($serviceGstShow==1){?>
          <div class="col-md-12 row gst-box border rounded my-3 py-3" >
            <div class="col-md-8">Do you want GST enabled Invoice?</div>
            <fieldset class="col-md-4 columns text-right activeNo">
              <!-- Default switch -->
              <div class="custom-control custom-switch">
			  <label class="switch-label no">No</label>
                <input type="checkbox" class="custom-control-input gst-check" id="customSwitches">
                <label class="custom-control-label" for="customSwitches">Yes</label>
              </div>
            </fieldset>
            <!--p class="col-md-12 Gstin font-weight-light text-left">
              If you are registered as a business, we will need your GSTIN so that you can claim Input Tax Credit under the GST Regulations
            </p-->
            <div class="row details gst-details my-2"  style="display: none;">
              <div class="col-md-12 columns">
                <div class="form-input-field ">
                  <label class="col-md-12 gst-txt">GSTIN *
                    <input type="text" id="gstin" name="gst_no" class="col-md-12 gst-input" placeholder="Please enter your company / firm's GSTIN here">
                  </label>
                  <span></span>
                </div>
              </div>
              <div class="col-md-12 columns">
                <div class="form-input-field ">
                  <label class="col-md-12 gst-txt">Company / Firm's Name (as per GSTIN) *
                  <input type="text" id="companyName" name="gst_name" class="col-md-12 gst-input" placeholder="Please enter your company / firm's name here"></label>
                  <span></span>
                </div>
              </div>
              <div class="col-md-12 columns">
                <label class="col-md-12 gst-txt">Company / Firm Address (as per GSTIN) *
                  <textarea id="address" name="gst_address" placeholder="Please enter your company / firm's address here" class="gstin-address col-md-12 gstin-address" rows="3" type="text"></textarea>
                </label>
              </div>
			  <div class="col-md-12 columns">
			  <div class="col-md-12 mt-2">
              State *
			  <select name="gst_state" id="state" class="form-control col-md-12 in-tex">
              <option value="">Please select your state of residence / operation</option>
              <option value="Andhra Pradesh">Andhra Pradesh</option>
              <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
              <option value="Arunachal Pradesh">Arunachal Pradesh</option>
              <option value="Assam">Assam</option>
              <option value="Bihar">Bihar</option>
              <option value="Chandigarh">Chandigarh</option>
              <option value="Chhattisgarh">Chhattisgarh</option>
              <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
              <option value="Daman and Diu">Daman and Diu</option>
              <option value="Delhi">Delhi</option>
              <option value="Lakshadweep">Lakshadweep</option>
              <option value="Puducherry">Puducherry</option>
              <option value="Goa">Goa</option>
              <option value="Gujarat">Gujarat</option>
              <option value="Haryana">Haryana</option>
              <option value="Himachal Pradesh">Himachal Pradesh</option>
              <option value="Jammu and Kashmir">Jammu and Kashmir</option>
              <option value="Jharkhand">Jharkhand</option>
              <option value="Karnataka">Karnataka</option>
              <option value="Kerala">Kerala</option>
              <option value="Madhya Pradesh">Madhya Pradesh</option>
              <option value="Maharashtra">Maharashtra</option>
              <option value="Manipur">Manipur</option>
              <option value="Meghalaya">Meghalaya</option>
              <option value="Mizoram">Mizoram</option>
              <option value="Nagaland">Nagaland</option>
              <option value="Odisha">Odisha</option>
              <option value="Punjab">Punjab</option>
              <option value="Rajasthan">Rajasthan</option>
              <option value="Sikkim">Sikkim</option>
              <option value="Tamil Nadu">Tamil Nadu</option>
              <option value="Telangana">Telangana</option>
              <option value="Tripura">Tripura</option>
              <option value="Uttar Pradesh">Uttar Pradesh</option>
              <option value="Uttarakhand">Uttarakhand</option>
              <option value="West Bengal">West Bengal</option>
            </select>
            </div>
            </div>
            </div>
            
          </div>
          <?php }?>
    </div>
	</div>	
  </div>
    <div class="col-md-6 box-w">
      <div class="col-sm-12 col-sm-offset-1">
        <div class="selected-professional-card bg-lightpurple" style="position: relative;box-shadow: 0 2px 10px rgba(0,0,0,.1);transition: box-shadow .3s ease 0s;min-height: 260px;padding: 15px 25px;border:1px solid #eee;">
          <p class="head-title">PAYMENT DETAILS</p>
          <h6 class="text-bold">Original Amount
              <span class="pull-right  del-amt" style="color: #6610f2;">₹ <del class="font-weight-bold"><?= $servicePrice?></del>
                <br />
              <p class="order-summ-pricechnge">
                (<span class="font-weight-bold"><?=$percentage?></span>% OFF)
              </p>
              </span>
          </h6>
          <h6 class="text-bold">Plan Amount
            <span class="pull-right font-weight-bold" style="color: #333;">₹ <?= $servicePlanPrice?></span>
          </h6>
          <?php
            $tHeading=0;$ntHeading=0;$taxableAmt=0;
            foreach ($service[0]['product_plans'] as $product_plans){ 
              if($product_plans->type == $serviceType){
                if($product_plans->taxable==1){
                  if($tHeading==0){
                    echo '<h4 class="side-card-heading font-weight-bold">Taxable Amount</h4>';
                    $tHeading++;
                  }
                  echo '<h5 class="text-bold">'.$product_plans->heading.'
                          <span class="pull-right" style="color: #333; font-weight: 500;">₹  '.$product_plans->price.'</del></span>
                        </h5>';
                  $taxableAmt=$taxableAmt+$product_plans->price;
                }else{
                  if($ntHeading==0){
                    echo '<h4 class="side-card-heading mt-3 font-weight-bold">Non Taxable Amount</h4>';
                    $ntHeading++;
                  }
                  echo '<h5 class="text-bold">'.$product_plans->heading.'
                          <span class="pull-right" style="color: #333; font-weight: 500;">₹  '.$product_plans->price.'</del></span>
                        </h5>';
                }
              }
            }
          ?>
          <hr>
          <input type="text" name='taxable_amount' value="<?=$taxableAmt?>" hidden >
          <?php $taxes=ceil(($taxableAmt * $serviceGst)/100) ?>
          <h5 class="text-bold my-1" style=" color: #333;font-size: 1.125rem ; font-weight: 500;">Total
            <input class="gst-calc" value="<?= $taxes?>" hidden />
            <span class="pull-right total-amount withgst font-weight-bold" style="color: #333 ">₹ <?= $servicePlanPrice?></span>
          </h5>  
          <?php if($amountType==0){?>
            <h5 class="text-bold my-1">Booking Amount
              <span class="pull-right" style="color: rgb(44, 22, 220); font-weight: 500;">₹ <?= $serviceBookingPrice?></span>
            </h5>            
          <?php }?> 
          <hr>
          
          <?php if($serviceGstShow==1){?>
            <h5 class="text-bold my-1 gst-section" style="display: none;">Goods and Services Tax @ <?=$serviceGst?>%
              <span class="pull-right gst-amount" style="color: #333;">₹ <?php echo $taxes ?></span>
            </h5>
            <input type='hidden' name='gst' value="<?php echo $taxes; ?>">
          <?php }?>

          <h6 class="text-bold my-1" id="couponcodeapplied" style="display: none;">Coupon Code (<b>APRIL500</b>)
            <span class="pull-right font-weight-bold" style="color: #333;">- ₹ <span id="totalPricecoupon">800 </span></span>
          </h6>
		      <h6 class="text-bold my-1">Gross Total
            <span class="pull-right font-weight-bold" style="color: #333;">₹ <span id="totalPrice"><?= $servicePlanPrice?></span></span>
          </h6>
	  
          <!--p class="text-note text-right text-danger">* Inclusive of all Taxes &amp; Fees.</p-->
          <p class="gst">By clicking on Proceed to Payment, you have accepted our
          <a href="https://easifyy.com/terms-of-service">Terms of Service</a> includes
          <a href="https://easifyy.com/terms-of-service">Refund Policy</a></p>
          <div class="row coupon py-3">
              <?php if($amountType == 1): ?>
                <div class="input-group col-md-12">
                    <div class="form-input-field ">
                        <label>
                            <input type="text" id="coupon_code" name="coupon_code" class="coupon_cod col-md-12" placeholder="Coupon Code" maxlength="10" style="text-transform:uppercase">
                        </label>
                    </div>
                    <div class="input-group-button coupon-btn col-md-4">
                        <button type="button" class="btn btn-lg btn-search apply col-md-12" id="couponCode">Apply</button>
                    </div>
                </div>
              <?php endif; ?>
          </div>
            <input type="text" hidden value="<?php echo $service[0]['title']?>" name="serviceName">
          <?= $this->Form->button('Make Payment', ['type' => 'submit',"class" => "mak-btn btn btn-primary mb-1 payment-btn font-weight-bold"]);//$this->Form->button(__('Submit'), [ "class" => "btn btn-primary mb-1","value"=>'Place Order' ]) ?>
        <?= $this->Form->end() ?>

        </div>
      </div>
    </div>
  </div>
  <div class="col-md-12 main-acc">
	
    <h4>Let's clear your doubts!</h4>
    <div class="accordion" id="accordionExample">
        <?php
          foreach ($faqs as $faq){    ?>
            <div class="card">
            <div class="card-header" id="headingOne-<?=$faq->id?>">
                <h2 class="mb-0">
                    <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne-<?=$faq->id?>"><i class="fa fa-plus"></i> 
                        <?php echo($faq->question)?>
                    </button>									
                </h2>
            </div>
            <div id="collapseOne-<?=$faq->id?>" class="collapse" aria-labelledby="headingOne-<?=$faq->id?>" data-parent="#accordionExample">
                <div class="card-body">
                    <p><?php echo ($faq->answer)?></p>
                </div>
            </div>
        </div>
        <?php }?>
    </div>
</div>
<style>
    .bs-example{
        margin: 20px;
    }
    .accordion .fa{
        margin-right: 0.5rem;
    }
</style>
<script>
    $(document).ready(function(){
        // Add minus icon for collapse element which is open by default
        $(".collapse.show").each(function(){
        	$(this).prev(".card-header").find(".fa").addClass("fa-minus").removeClass("fa-plus");
        });
        
        // Toggle plus minus icon on show hide of collapse element
        $(".collapse").on('show.bs.collapse', function(){
        	$(this).prev(".card-header").find(".fa").removeClass("fa-plus").addClass("fa-minus");
        }).on('hide.bs.collapse', function(){
        	$(this).prev(".card-header").find(".fa").removeClass("fa-minus").addClass("fa-plus");
        });
    });
</script>
</div>

</div>