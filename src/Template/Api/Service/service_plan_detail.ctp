<?php
    /**
     * @var \App\View\AppView $this
     * @var \App\Model\Entity\Product[]|\Cake\Collection\CollectionInterface $products
     */
    //if($loggedIn){
        $mymodal='';
        $myUrl='../order/'.base64_encode($service[0]->id);
        $myUrlBas=$myUrl.'/'.base64_encode("1");
        $myUrlStd=$myUrl.'/'.base64_encode("2");
        $myUrlPre=$myUrl.'/'.base64_encode("3");

        //$myUrlBas='onclick="location.href='."'".$myUrl."/1'".'"';
        //$myUrlStd='onclick="location.href='."'".$myUrl."/2'".'"';
        //$myUrlPre='onclick="location.href='."'".$myUrl."/3'".'"';

    //}else{
    //    $mymodal='data-toggle="modal" data-target="#modalSignup" ';
    //    $myUrlBas='';$myUrlStd='';$myUrlPre='';
   //}
    $basicPoints=0;
    $stPoints=0;
    $prPints=0;
?>

<div class="main-w3pvt main-cont">
  <div class="ty-mainbox-container clearfix"style="background-color:#ddd3ee">
     <div class="row text-center">
          <div class="col-md-12">
            <span class="heading">
            <?php echo h($service[0]->title)?>
            </span>
            <div class="description">
              <p><?php echo h($service[0]->title_description)?></p>
            </div>
            <ul class="list-inline stepper-horizontal">
              <li><span>100% Assured</span></li>
              <li><span><i class="fa fa-star"></i> 4.9 &nbsp;400+ Reviews</span>
              </li><li><span>Refund Protection </span></li>
              <li class="hidden-xs hidden-sm"><span>Dedicated Support</span></li>
              <li class="hidden-xs hidden-sm"><span>Secure</span></li>
            </ul>
          </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-7">
       <div>
        <ul class="nav nav-tabs tabs-dark " id="myTab" role="tablist">
          <li class="nav-item">
           <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About this Plan</a>
          </li>
          <li class="nav-item">
           <a class="nav-link" id="work-tab" data-toggle="tab" href="#work" role="tab" aria-controls="home" aria-selected="true">How It's Done</a>
          </li>
          <li class="nav-item">
           <a class="nav-link" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">Infomation Guide</a>
          </li>
            <li class="nav-item">
           <a class="nav-link" id="faq-tab" data-toggle="tab" href="#faq" role="tab" aria-controls="faq" aria-selected="false">FAQs</a>
          </li>
        </ul>
      </div>
        <div class="tab-content">
          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <span class="heading"><img src="../images/care-about-planet.png" class="section_img">About This Plan</span><br><br>
            <p>
              <!--Get your private limited company incorporated at the lowest price with compliance to regulatory requirements of Ministry of Corporate Affairs-->
              <?php echo h($service[0]->description)?>
            </p>
            <div class="row services">
              <div class="col-md-3">
                <b>Services Covered</b>
              </div>
              <div class="col-md-9">
                <ul class="list-checkmarks">
                  <?php $incPoints = explode("\n", trim($service[0]->service_coverd));
                    foreach ($incPoints as $incPoint): ?>
                      <li><i class="fa fa-angle-right about-list-arrows"></i><?= h($incPoint) ?></li>
                  <?php endforeach; ?>
              </ul>
            </div>
             </div>
             <div class="row services">
            <div class="col-md-3">
                <b>Who Should Buy</b>
              </div>
              <div class="col-md-9">
                <ul class="list-checkmarks">
                <?php $incPoints = explode("\n", trim($service[0]->service_target));
                    foreach ($incPoints as $incPoint): ?>
                      <li><i class="fa fa-angle-right about-list-arrows"></i><?= h($incPoint) ?></li>
                  <?php endforeach; ?>
             </ul>
            </div>
          </div>
          </div>
          <div class="tab-pane" id="work" role="tabpanel" aria-labelledby="info-tab">
            <span class="heading"><img src="../images/settings.png" class="section_img"> How It's Done</span>
            
            <div class="_1s7Acb">
              <ul>
                  <?php $incPoints = explode("\n", trim($service[0]->service_process));
                    foreach ($incPoints as $incPoint): ?>
                      <li><?= h($incPoint) ?></li>
                  <?php endforeach; ?>
              </ul>
            </div>
         
          </div>
          <div class="tab-pane" id="info" role="tabpanel" aria-labelledby="info-tab">
            <span class="heading"><img src="../images/notebook.png" class="section_img">Information Guide</span><br><br>
            <b>Documents To Be Submitted</b>
            <div class="col-md-6">
            <ol class="list-numbers">
              <?php $incPoints = explode("\n", trim($service[0]->service_guide));
                    foreach ($incPoints as $incPoint): ?>
                      <li><?= h($incPoint) ?></li>
              <?php endforeach; ?>
            </ol>
          </div>
          </div>
          <div class="tab-pane" id="faq" role="tabpanel" aria-labelledby="contact-tab">
          <span class="heading"><img src="../images/conversation.png"class="section_img">FAQs</span><br><br>
          <ul class="faq_que">
            <?php
                if (!is_null($service[0]->product_faq )){ 
                  foreach ($service[0]->product_faq  as $faq):?>
                  <li>
                    <p class="faq_question"><?=h($faq->question)?>?</p>
                    <p class="faq_answer"><?=h($faq->answer)?>.</p>
                    <br>
                  </li>
            <?php endforeach; }?>                  
          </ul>
      </div>
    </div>
    <div class="review_section mt-3 mb-3">
        <span class="heading">Review<span class="dot-pink">.</span></span><br>
        <b>Vikram singh</b><br><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span>
        <p class="text-para-reviews">Excellent Ashish.. very humble and responsive..</p>
        <b>Vikram chhetri</b><br><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span>
        <p class="text-para-reviews">Very helpful and completed my work before deadline.</p>
        <b>Ankit Agarwal</b><br><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span>
        <p class="text-para-reviews">Quick and great service</p>
    </div>
    </div>      
      <div class="col-md-5 card-body" style="padding: 0;">
        
            <?php //print_r($service) ?>    
            <ul class="nav nav-pills  col-12" id="pills-tab" role="tablist"  style="background-color: #eee;padding-right:0;text-align: center;">
                <li class="nav-item col-md px-0">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Basic</a>
                </li>
                <?php if($service[0]->_standard_price!=''){?>
                  <li class="nav-item col-md px-0">
                      <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Standard</a>
                  </li>
                <?php } ?> 
                <?php if($service[0]->_premium_price!=''){?>
                  <li class="nav-item col-md px-0">
                      <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Premium</a>
                  </li>
                <?php } ?>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active px-2" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <p class="d-inline-text d-flex pr-5">
                        <span class='flex-grow-1 '><?php echo h($service[0]->title)?></span>
                        <span class='flex-grow-1' style="width: 30%; text-align: right;">Rs. <?php echo h($service[0]->_basic_price)?></span>
                    </p>
                    <span>
                        <ul class='px-4 py-2 income_points'>
                            <?php $incPoints = explode("\n", trim($service[0]->_basic_price_desc));?>
                            <?php foreach ($incPoints as $incPoint): ?>
                                <li><?= h($incPoint) ?></li>
                            <?php $basicPoints++;
                                   endforeach; ?>
                        </ul>
                    </span>
                    <p class="text-timer time_style"><i class="fa fa-clock-o"></i> <?php echo h($service[0]->_basic_plan_time)?> Days Delivery time</p>
                    <p class="d-flex pr-5"><span class='flex-grow-1'>Total</span><span class='flex-grow-1' style="width: 30%; text-align: right;">Rs. <?php echo h($service[0]->_basic_price)?></span></p>
                    <p class="d-flex pr-5">
                        <span  class='flex-grow-1'>First Instalment</span>
                        <span class='flex-grow-1' style="width: 30%; text-align: right;">Rs. <?php echo h($service[0]->_basic_price)?></span>
                    </p>
                    <p class="d-flex pr-5" style="border-bottom: 1px solid #e8eef3; border-top: 1px solid #e8eef3;padding: 5px 0;"><span class='flex-grow-1'>Increase Qty:-</span><span class='flex-grow-1' style="width: 30%; text-align: right;"> <button type="button" class="sub" class="sub">-</button>
                        <input type="text" id="qty" value="1" style="" />
                        <button type="button" class="add" class="add">+</button></span>
                    </p>
                    <!--<button <?php echo $myUrlBas?> class="btn btn-primary btn-block" <?php echo $mymodal ?> >
                      <span style="font-weight:700;">Make Payment Rs.</span><span class="service-price" price="<?php echo h($service[0]->_basic_price)?>">
                      <?php echo h($service[0]->_basic_price)?></span>
                    </button>-->
                    <a class="btn btn-primary btn-block" href="<?=$myUrlBas?>">
                      <span style="font-weight:700;">Make Payment Rs.</span><span class="service-price" price="<?php echo h($service[0]->_basic_price)?>">
                      <?php echo h($service[0]->_basic_price)?></span>
                    </a>
                    <p class="para text-center" style="margin: 0px;"><b>Or</b></p>
                    <button class="btn btn-share-expert-chat chat_box btn-block" style="color: #000;font-weight:700;">Chat &amp; Discuss before booking</button>
                    <p class="para" style="color: #0062cc;margin-top: 10px;">* Get instant Cashback Rewards up to 100%</p>
                    <p class="para" style="color: #0062cc;">* 100% Refunds on Non Delivery</p>
                </div>
                <?php if($service[0]->_standard_price!=''){?>
                    <div class="tab-pane fade px-2" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <p class="d-flex pr-5"><span class='flex-grow-1'><?php echo h($service[0]->title)?></span>
                        <span class='flex-grow-1' style="width: 30%; text-align: right;">Rs. <?php echo h($service[0]->_standard_price  )?></span></p>
                        <span>
                            <ul class='px-4 py-2 income_points'>
                                <?php $incPoints = explode("\n", trim($service[0]->_standard_price_desc));?>
                                <?php foreach ($incPoints as $incPoint): ?>
                                        <li><?php
                                          if($stPoints>=$basicPoints){
                                            echo "<b>".$incPoint."</b>" ;
                                          }else{
                                            echo $incPoint ;
                                          }
                                          ?></li>
                                <?php   $stPoints++;
                                      endforeach; ?>
                            </ul>
                        </span>
                        <p class="text-timer"> <i class="fa fa-clock-o"></i> <?php echo h($service[0]->_standard_plan_time)?> Days Delivery time</p>
                        <p class="d-flex pr-5"><span class='flex-grow-1'>Total</span><span style="width: 30%; text-align: right;">Rs. <?php echo h($service[0]->_standard_price)?></span></p>
                        <p class="d-flex pr-5"><span class='flex-grow-1'>First Instalment Rs. <?php echo h($service[0]->_standard_price)?></span></p>
                        <div class="product-increase d-flex flex-grow-1 row">
                            <div  class="col-md-8">
                                <span class="q-increase  flex-grow-1">Increase Qty:-</span>
                            </div>
                            <div class="input-group col-md-4">
                                <div id="field1">
                                    <button type="button" class="sub" class="sub">-</button>
                                    <input type="text" id="1" value="1" style="width:30px; text-align: center;" />
                                    <button type="button" class="add" class="add">+</button>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-pay-installment btn-track-pay btn-primary btn-block" href="<?=$myUrlStd?>">
                          <span style="font-weight:700;">Make Payment Rs.</span><span class="service-price" price="<?php echo h($service[0]->_standard_price)?>">
                          <?php echo h($service[0]->_standard_price)?></span>
                        </a>
                        <p class="para text-center" style="margin: 0px;"><b>Or</b></p>
                        <button class="btn btn-share-expert-chat">Chat &amp; Discuss before booking</button>
                        <p class="para" style="color: rgb(63, 79, 224);">* Get instant Cashback Rewards up to 100%</p>
                        <p class="para" style="color: rgb(63, 79, 224);">* 100% Refunds on Non Delivery</p>
                    </div>
                <?php }?>

                <?php if($service[0]->_premium_price!=''){?>
                    <div class="tab-pane fade px-2" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <p class="d-flex pr-5"><span class='flex-grow-1'> <?php echo h($service[0]->title)?></span>
                        <span class='flex-grow-1' style="width: 30%; text-align: right;">Rs. <?php echo h($service[0]->_premium_price)?></span></p>
                        <span>
                            <ul class='px-4 py-2 income_points'>
                                <?php $incPoints = explode("\n", trim($service[0]->_premium_price_desc));?>
                                <?php foreach ($incPoints as $incPoint): ?>
                                    <li>
                                      <?php
                                        if($prPints>=$stPoints){
                                          echo "<b>".$incPoint."</b>" ;
                                        }else{
                                          echo $incPoint ;
                                        }
                                      ?>
                                    </li>
                                <?php $prPints++; endforeach; ?>
                            </ul>
                        </span>
                        <p class="text-timer"><i class="fa fa-clock-o"></i> <?php echo h($service[0]->_premium_plan_time )?> Days Delivery time</p>
                        <p class="d-flex pr-5"><span class='flex-grow-1'>Total</span><span style="width: 30%; text-align: right;">Rs. <?php echo h($service[0]->_premium_price)?></span></p>
                        <p class="d-flex pr-5"><span class='flex-grow-1'>First Instalment Rs. </span><span class="price"> <?php echo h($service[0]->_premium_price)?></span></p>
                        <div class="product-increase d-flex flex-grow-1 row">
                            <div class="col-md-8">
                                <span class="q-increase flex-grow-1">Increase Qty:-</span>
                            </div>
                            <div class="input-group col-md-4">
                                <div id="field1">
                                    <button type="button" class="sub" class="sub">-</button>
                                    <input type="text" id="0" value="1" style="width:30px; text-align: center;" />
                                    <button type="button" class="add" class="add">+</button>
                                </div>
                            </div>
                        </div>                        
                        <a class="btn btn-pay-installment btn-track-pay btn-primary btn-block" href="<?=$myUrlPre?>">
                          <span style="font-weight:700;">Make Payment Rs.</span><span class="service-price" price="<?php echo h($service[0]->_premium_price)?>">
                          <?php echo h($service[0]->_premium_price)?></span>
                        </a>
                        <p class="para text-center" style="margin: 0px;"><b>Or</b></p>
                        <button class="btn btn-share-expert-chat" style="font-weight: 700;">Chat &amp; Discuss before booking</button>
                        <p class="para" style="color: rgb(63, 79, 224);">* Get instant Cashback Rewards up to 100%</p>
                        <p class="para" style="color: rgb(63, 79, 224);">* 100% Refunds on Non Delivery</p>
                    </div>
                <?php } ?>
           
        </div>
      </div>
    </div>
     <section class="talk_us text-center py-5" style="background-image: url('../assets/images/purple.jpg');">
    <div class="container">
          <div class="row text-center">
         <a href="#" class="btn button-style mt-sm-4 mt-4 mb-4 mx-auto" style="padding: 12px 50px;">Talk to us</a>
      </div>
    </div>
  </section>
  </div>


