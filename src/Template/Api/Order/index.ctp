<?php 
  switch ($serviceType){
  case 1:
    $servicePrice=$service[0]['_basic_price'];
    $servicePlanPrice=$service[0]['_basic_plan_price']; 
    $serviceGst=$service[0]['_basic_gst']; 
    $serviceGstShow=$service[0]['_basic_gst_show'];
    $serviceDesc=$service[0]['_basic_price_desc'];
    $serviceTime=$service[0]['_basic_plan_time']; 
    //dd($service[0]['product_plans']);
    break;
  case 2:
    $servicePrice=$service[0]['_standard_price'];
    $servicePlanPrice=$service[0]['_standard_plan_price']; 
    $serviceGst=$service[0]['_standard_gst']; 
    $serviceGstShow=$service[0]['_standard_gst_show'];
    $serviceDesc=$service[0]['_standard_price_desc'];
    $serviceTime=$service[0]['_standard_plan_time']; 
    break;
  case 3:
    $servicePrice=$service[0]['_premium_price'];
    $servicePlanPrice=$service[0]['_premium_plan_price']; 
    $serviceGst=$service[0]['_premium_gst']; 
    $serviceGstShow=$service[0]['_premium_gst_show'];
    $serviceDesc=$service[0]['_premium_price_desc'];
    $serviceTime=$service[0]['_premium_plan_time'];   
    break;
  }
  foreach ($service[0]['product_plans'] as $product_plans){ 
    if($product_plans->type == $serviceType){
      if($product_plans->taxable==1){
        $product_plans->price;
      }else{
        $product_plans->price;
      }
    }
  }
?>
<div class="container main-w3pvt main-cont" >
  <div class="ty-mainbox-container clearfix">
  <div class="row py-4">
    <?php //print_r($loguser);echo $loguser['first_name']?>
    <div class="col-md-7" style="padding-bottom: 20px;">
      <div class="col-sm-12 col-sm-offset-1">
          <?= $this->Form->create(NULL, array('url'=>'/Order/add')) ?>
          <input type='text' name='product_id' value="<?php echo $service[0]['id']?>" hidden>
          <input type='text' name='merchant_id' value="0" hidden>
          <input type='text' name='total' value="<?php echo $servicePrice?>" hidden>
          <input type='text' name='gross_total' value="<?php echo $servicePrice?>" hidden>
          <input type='text' name='delivery_time' value="<?php echo $serviceTime?>" hidden>
          <input type='text' name='order_status_id' value="1" hidden>
          <input type='text' name='merchant_product_id' value="<?php echo $service[0]['id']?>" hidden>
          <input type='text' name='quantity' value="1" hidden>
          <input type='text' name='price' value="<?php echo $servicePrice?>" hidden>
          
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
              <?php echo $this->Form->text('phoneNo',['class' => 'form-control', 'placeholder' => "Mobile No.",'value'=>$loguser['phone'],'required'=>'required' ]);?>
            </div>
          </div>

          <div class="form-group ">
            <?php echo $this->Form->email('username',['class' => 'form-control', 'placeholder' => "Email",'id' =>"username",'value'=>$loguser['username'],'required'=>'required' ]);?>
          </div>

          <div class="form-group ">
            <?php echo $this->Form->text('password',['class' => 'form-control', 'placeholder' => "password",'id' =>"password",'value'=>$loguser['password'],'required'=>'required' ]);?>
          </div> 

          <?= $this->Form->button('Place Order', ['type' => 'submit',"class" => "btn btn-primary mb-1"]);//$this->Form->button(__('Submit'), [ "class" => "btn btn-primary mb-1","value"=>'Place Order' ]) ?>
          
          <?= $this->Form->end() ?>
    </div>
  </div>
    <div class="col-md-5">
      <div class="col-sm-12 col-sm-offset-1">
        <div class="selected-professional-card bg-lightpurple" style="position: relative;box-shadow: 0 2px 10px rgba(0,0,0,.1);transition: box-shadow .3s ease 0s;min-height: 260px;padding: 15px 25px;border:1px solid #eee;">
          <h5 class="xs-heading text-center" style="margin-top: 0px;">Order Summary</h5>
          <hr>
          <p class="para"><?php echo $service[0]['title']?> </p>
          <h6 class="text-bold">Original Amount
            <span class="pull-right" style="color: rgb(44, 22, 220);">₹ <del><?= $servicePrice?></del></span>
          </h6>
          <h6 class="text-bold">Plan Amount
            <span class="pull-right" style="color: rgb(44, 22, 220);">₹ <?= $servicePlanPrice?></span>
          </h6>
          <?php
            $tHeading=0;$ntHeading=0;$taxableAmt=0;
            foreach ($service[0]['product_plans'] as $product_plans){ 
              if($product_plans->type == $serviceType){
                if($product_plans->taxable==1){
                  if($tHeading==0){
                    echo '<h4 class="side-card-heading">Taxable Amount</h4>';
                    $tHeading++;
                  }
                  echo '<h6 class="text-bold">'.$product_plans->heading.'
                          <span class="pull-right" style="color: rgb(44, 22, 220);">₹  '.$product_plans->price.'</del></span>
                        </h6>';
                  $taxableAmt=$taxableAmt+$product_plans->price;
                }else{
                  if($ntHeading==0){
                    echo '<h4 class="side-card-heading">Non Taxable Amount</h4>';
                    $ntHeading++;
                  }
                  echo '<h6 class="text-bold">'.$product_plans->heading.'
                          <span class="pull-right" style="color: rgb(44, 22, 220);">₹  '.$product_plans->price.'</del></span>
                        </h6>';
                }
              }
            }
          ?>
          <hr>
          <h6 class="text-bold my-3">Gross Total
            <span class="pull-right" style="color: rgb(44, 22, 220);">₹ <?= $servicePlanPrice?></span>
          </h6>
          <h6 class="text-bold my-3">Goods and Services Tax @ <?=$serviceGst?>%
            <span class="pull-right" style="color: rgb(44, 22, 220);">₹ <?php echo $taxes=ceil(($taxableAmt * $serviceGst)/100) ?></span>
          </h6>
          <hr>
          <h6 class="text-bold my-3">Total
            <span class="pull-right" style="color: rgb(44, 22, 220);">₹ <?= $servicePlanPrice+$taxes?></span>
          </h6>         
          <p class="text-note text-right text-danger">* Inclusive of all Taxes &amp; Fees.</p>
        </div>
      </div>
    </div>
  </div>
</div>
</div>