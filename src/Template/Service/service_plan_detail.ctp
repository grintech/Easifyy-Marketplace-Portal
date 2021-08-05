<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product[]|\Cake\Collection\CollectionInterface $products
 */
//if($loggedIn){
//dd($service[0]);
$mymodal = '';
$myUrl = '../order/' . base64_encode($service[0]->id);
$myUrlBas = $myUrl . '/' . base64_encode("1");
$myUrlStd = $myUrl . '/' . base64_encode("2");
$myUrlPre = $myUrl . '/' . base64_encode("3");
$bkAmount = base64_encode("0");
$fullAmount = base64_encode("1");
//$myUrlBas='onclick="location.href='."'".$myUrl."/1'".'"';
//$myUrlStd='onclick="location.href='."'".$myUrl."/2'".'"';
//$myUrlPre='onclick="location.href='."'".$myUrl."/3'".'"';
//}else{
//    $mymodal='data-toggle="modal" data-target="#modalSignup" ';
//    $myUrlBas='';$myUrlStd='';$myUrlPre='';
//}
$basicPoints = 0;
$stPoints = 0;
$prPints = 0;
?>
<div class="main-w3pvt main-cont">
    <div class="ty-mainbox-container clearfix" style="background-color:#ddd3ee">
        <div class="row text-center">
            <div class="col-md-12">
                <span class="heading">
                    <?php echo h($service[0]->title) ?>
                </span>
                <div class="description">
                    <p><?php echo h($service[0]->_title_desc) ?></p>
                </div>
                <ul class="list-inline stepper-horizontal">
                    <li><span>100% Assured</span></li>
                    <li><span><i class="fa fa-star"></i> 4.9 &nbsp;400+ Reviews</span>
                    </li>
                    <li><span>Refund Protection </span></li>
                    <li class="hidden-xs hidden-sm"><span>Dedicated Support</span></li>
                    <li class="hidden-xs hidden-sm"><span>Secure</span></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-7">
            <div>
                <ul class="nav nav-tabs tabs-dark " id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                            aria-controls="home" aria-selected="true">About this Plan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="work-tab" data-toggle="tab" href="#work" role="tab" aria-controls="home"
                            aria-selected="true">How It's Works</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info"
                            aria-selected="false">Infomation Guide</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="faq-tab" data-toggle="tab" href="#faq" role="tab" aria-controls="faq"
                            aria-selected="false">FAQs</a>
                    </li>
                    <li class="nav-item">
                        <a class=" chat-btn btn btn-share-product pull-right hidden-xs"
                            href="javascript:void(Tawk_API.toggle())">Chat</a>
                    </li>

                    <li class="nav-item">
                    </li><button class="share-btn" onclick="document.getElementById('id01').style.display='block'"
                        style="width:auto;"><a class="icon-shr btn btn-link pull-right"
                            style="color: rgb(140 81 255); font-size: 16px;" href="#"><i class="fa fa-share-alt"
                                aria-hidden="true"></i></a></button>
                    </li>

                </ul>
            </div>
            <!--model-login-->

            <script>
            // Get the modal
            var modal = document.getElementById('id01');

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
            </script>
            <div id="id01" class="modal">
                <div class="service-popup">
                    <form class="modal-dialog modal-frame modal-content animate share-Modal" action="/action_page.php"
                        method="post" style="margin: 0px;">
                        <div class="imgcontainer">
                            <span onclick="document.getElementById('id01').style.display='none'" class="close"
                                title="Close Modal">&times;</span>

                        </div>

                        <div class="container main-share">
                            <div class="text-center">
                                <h4 class="modal-heading" style="margin: 10px 0px;">Share and show some love.</h4>
                                <p class="hidden-xs">&nbsp;</p>
                                <ul class="list-inline">


                                    <li
                                        style="width: 44px; height: 44px; background-color: #3b5998;  border-radius: 50%;  line-height: 42px; overflow: hidden;  padding: 0px 2px;">
                                        <a style="color: #fff;"
                                            href="https://www.facebook.com/share.php?u=https://easifyy.com/service-details/<?php echo h($service[0]->slug) ?>&title=Easifyy"
                                            target="blank" id="copy">
                                            <span class="link-icon"><i class="fa fa-facebook" aria-hidden="true"></i>
                                            </span>
                                        </a>
                                    </li>
                                    <li
                                        style="width: 44px; height: 44px; background-color: #7f7f7f;  border-radius: 50%;  line-height: 42px; overflow: hidden;  padding: 0px 2px;">
                                        <a style="color: #fff;"
                                            href="https://plus.google.com/share?url=https://easifyy.com/service-details/<?php echo h($service[0]->slug) ?>&title=Easifyy"
                                            target="blank" id="copy">
                                            <span class="link-icon"><i class="fa fa-google-plus"
                                                    aria-hidden="true"></i></span>
                                        </a>
                                    </li>
                                    <li
                                        style="width: 44px; height: 44px; background-color: #007fb1;  border-radius: 50%;  line-height: 42px; overflow: hidden;  padding: 0px 2px;">
                                        <a style="color: #fff;"
                                            href="https://www.linkedin.com/shareArticle?mini=true&url=https://easifyy.com/service-details/<?php echo h($service[0]->slug) ?>&title=Easifyy&title={{Easifyy}}&source={{wwe.easifyy.com}}"
                                            target="blank" id="copy">
                                            <span class="link-icon"><i class="fa fa-linkedin"
                                                    aria-hidden="true"></i></span>
                                        </a>
                                    </li>
                                    <li
                                        style="width: 44px; height: 44px; background-color: #e8eef3;  border-radius: 50%;  line-height: 42px; overflow: hidden;  padding: 0px 2px;">
                                        <a style="color: #8c52ff;"
                                            href="https://twitter.com/intent/tweet?status=Easifyy+https://easifyy.com/service-details/<?php echo h($service[0]->slug) ?>"
                                            target="blank" id="copy">
                                            <span class="link-icon"><i class="fa fa-twitter"
                                                    aria-hidden="true"></i></span>
                                        </a>
                                    </li>
                                    <li
                                        style="width: 44px; height: 44px; background-color: #e8eef3;  border-radius: 50%;  line-height: 42px; overflow: hidden;  padding: 0px 2px;">
                                        <a style="color: #8c52ff;" href="#" target="blank" id="copy">
                                            <span class="link-icon"><i class="fa fa-instagram"
                                                    aria-hidden="true"></i></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
            <?php //dd($service[0]);
      ?>
            <!--model-login-->
            <div class="tab-content">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <span class="heading"><img src="../images/care-about-planet.png" class="section_img">About This
                        Plan</span><br><br>
                    <p>
                        <!--Get your private limited company incorporated at the lowest price with compliance to regulatory requirements of Ministry of Corporate Affairs-->
                        <?php echo h($service[0]->description) ?>
                    </p>
                    <?php if (trim($service[0]->service_coverd) != "") { ?>
                    <div class="row services">
                        <div class="col-md-3">
                            <b>Services Inclusions</b>
                        </div>
                        <div class="col-md-9">
                            <ul class="list-checkmarks">
                                <?php $incPoints = explode("\n", trim($service[0]->service_coverd));
                  foreach ($incPoints as $incPoint) : ?>
                                <li><i class="fa fa-angle-right about-list-arrows"></i><?= $incPoint ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if (trim($service[0]->service_target)) { ?>
                    <div class="row services">
                        <div class="col-md-3">
                            <b>Who Should take Services</b>
                        </div>
                        <div class="col-md-9">
                            <ul class="list-checkmarks">
                                <?php $incPoints = explode("\n", trim($service[0]->service_target));
                  foreach ($incPoints as $incPoint) : ?>
                                <li><i class="fa fa-angle-right about-list-arrows"></i><?= $incPoint ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <div class="tab-pane" id="work" role="tabpanel" aria-labelledby="info-tab">
                    <span class="heading"><img src="../images/settings.png" class="section_img"> How It's Works</span>
                    <div class="_1s7Acb">
                        <ul>
                            <?php $incPoints = explode("\n", trim($service[0]->service_process));
              foreach ($incPoints as $incPoint) : ?>
                            <li><?= $incPoint ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div class="tab-pane" id="info" role="tabpanel" aria-labelledby="info-tab">
                    <span class="heading"><img src="../images/notebook.png" class="section_img">Information
                        Guide</span><br><br>
                    <b>Documents To Be Submitted</b>
                    <div class="col-md-6">
                        <ol class="list-numbers">
                            <?php $incPoints = explode("\n", trim($service[0]->service_guide));
              foreach ($incPoints as $incPoint) : ?>
                            <li><?= h($incPoint) ?></li>
                            <?php endforeach; ?>
                        </ol>
                    </div>
                </div>
                <div class="tab-pane" id="faq" role="tabpanel" aria-labelledby="contact-tab">
                    <span class="heading"><img src="../images/conversation.png" class="section_img">FAQs</span><br><br>
                    <ul class="faq_que">
                        <?php
            if (!is_null($service[0]->product_faq)) {
              foreach ($service[0]->product_faq  as $faq) : ?>
                        <li>
                            <p class="faq_question"><?= h($faq->question) ?>?</p>
                            <p class="faq_answer"><?= h($faq->answer) ?>.</p>
                            <br>
                        </li>
                        <?php endforeach;
            } ?>
                    </ul>
                </div>
            </div>
            <div class="review_section mt-3 mb-3">
                <span class="heading">
                    Review
                    <span class="dot-pink">.</span>
                </span>
                <br>
                <?php if (!is_null($service[0]->product_reviews)) {
          foreach ($service[0]->product_reviews as $review) : ?>
                <b><?= $review->reviewer_name ?></b><br>
                <?php if ($review->rating == 1) { ?>
                <span class="fa fa-star"></span>
                <?php } elseif ($review->rating == 2) { ?>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <?php } elseif ($review->rating == 3) { ?>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <?php } elseif ($review->rating == 4) { ?>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <?php } elseif ($review->rating == 5) { ?>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <?php } ?>
                <p class="text-para-reviews"><?= $review->review_text ?></p>
                <?php endforeach;
        } ?>
                <!--
                    <b>Vikram singh</b><br>
          <span class="fa fa-star"></span>
          <span class="fa fa-star"></span>
          <span class="fa fa-star"></span>
          <span class="fa fa-star"></span>
          <span class="fa fa-star"></span>
          <p class="text-para-reviews">Excellent Ashish.. very humble and responsive..</p><b>Vikram chhetri</b><br><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span>
        <p class="text-para-reviews">Very helpful and completed my work before deadline.</p>
        <b>Ankit Agarwal</b><br><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span>
        <p class="text-para-reviews">Quick and great service</p>-->
            </div>
        </div>
        <div class="col-lg-5 card-body p-lg-0">
            <?php //print_r($service) 
      ?>
            <ul class="nav nav-pills  col-12" id="pills-tab" role="tablist"
                style="background-color: #eee;padding-right:0;text-align: center;">
                <li class="nav-item col-md px-0">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                        aria-controls="pills-home" aria-selected="true">Standard</a>
                </li>
                <?php if ($service[0]->_standard_price != '') { ?>
                <li class="nav-item col-md px-0">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                        aria-controls="pills-profile" aria-selected="false">Pro</a>
                </li>
                <?php } ?>
                <?php if ($service[0]->_premium_price != '') { ?>
                <li class="nav-item col-md px-0">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab"
                        aria-controls="pills-contact" aria-selected="false">Premium</a>
                </li>
                <?php } ?>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active px-2" id="pills-home" role="tabpanel"
                    aria-labelledby="pills-home-tab">
                    <p class="d-inline-text d-flex pr-2">
                        <span class='flex-grow-1 '><?php echo h($service[0]->title) ?></span>
                        <span class='flex-grow-1 servi-pric-chng'>
                            Rs. <?php echo h($service[0]->_basic_plan_price) ?>
                            <br>
                            <span>
                                <strike style="color: #6610f2;" ;>Rs.
                                    <?php echo h($service[0]->_basic_price) ?></strike>
                                (<?php echo round((($service[0]->_basic_price - $service[0]->_basic_plan_price) / $service[0]->_basic_price) * 100, 2) ?>%
                                OFF)
                            </span>
                        </span>
                    </p>
                    <span>
                        <ul class='px-4 py-2 income_points'>
                            <?php $incPoints = explode("\n", trim($service[0]->_basic_price_desc)); ?>
                            <?php foreach ($incPoints as $incPoint) : ?>
                            <li><?= $incPoint ?></li>
                            <?php $basicPoints++;
              endforeach; ?>
                        </ul>
                    </span>
                    <p class="text-timer time_style"><i class="fa fa-clock-o"></i>
                        <?php echo h($service[0]->_basic_plan_time) ?> Days Delivery time</p>
                    <?php if ($service[0]->offer_box != "") { ?>
                    <p class="text-timer" style="color:#6610f2;"><i class="fa fa-gift"></i>
                        <?php echo h($service[0]->offer_box) ?></p>
                    <?php } ?>
                    <p class="d-flex">
                        <!--bootstrap padding right remove -->
                        <span class='flex-grow-1'>Total</span>
                        <span class='flex-grow-1' style="width: 30%; text-align: right;">
                            Rs. <?php echo h($service[0]->_basic_plan_price) ?>
                        </span>
                    </p>
                    <div class="btn-sec">
                        <?php if ($service[0]->is_active == 1) { ?>
                        <?php if ($service[0]->_basic_booking_price != 0) { ?>
                        <a align="left" class="btn btn-primary btn-block btn-price"
                            href="<?= $myUrlBas . '/' . $bkAmount ?>">

                            <span style="font-weight:600;">Booking Amount Rs.</span><span class="service-price"
                                price="<?php echo h($service[0]->_basic_booking_price) ?>">
                                <?php echo h($service[0]->_basic_booking_price) ?></span>
                        </a>
                        <p class="para text-center" style="margin: 0px; font-size: 14px; width: 100%; float: left;">
                            <b>Or</b>
                        </p>
                        <?php } ?>
                        <a align="right" class="btn btn-primary btn-block btn-price"
                            href="<?= $myUrlBas . '/' . $fullAmount ?>">
                            <span style="font-weight:600;">Full Amount Rs.</span><span class="service-price"
                                price="<?php echo h($service[0]->_basic_plan_price) ?>">
                                <?php echo h($service[0]->_basic_plan_price) ?></span>
                        </a>
                        <?php }else{?>
                        <a align="left" class="btn btn-primary btn-block btn-price"
                            href="https://easifyy.com/pages/contactUs">
                            Contact Us
                        </a>
                        <?php }?>
                    </div>
                    <!--button class="btn btn-share-expert-chat chat_box btn-block" style="color: #000;font-weight:700;">Chat &amp; Discuss before booking</button-->

                    <div class="payment-icon">
                        <img src="../assets/images/paymen-img.jpg" alt="signup">
                    </div>
                    <p class="para" style="color: #000000; font-size: 16px;"><img src="../assets/images/squr.png"
                            alt="signup" style=" width: 22px; margin: 10px 4px;"> Get instant Cashback Rewards up to
                        100%</p>
                    <p class="para" style="color: #000000; font-size: 16px;"><img src="../assets/images/squr.png"
                            alt="signup" style=" width: 22px; margin: 5px 4px;"> 100% Refunds on Non Delivery</p>
                    <p class="para" style="color: #000000; font-size: 16px;   margin-top: 5px;"><img
                            src="../assets/images/lock.png" alt="signup" style=" width: 20px; margin: 5px 6px;"> 256
                        -Bit SSL Encryption & ISO 27001 Datacenter</p>
                </div>

                <?php if ($service[0]->_standard_price != '') { ?>
                <div class="tab-pane fade px-2" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <p class="d-flex pr-2">
                        <span class='flex-grow-1'><?php echo h($service[0]->title) ?></span>
                        <span class='flex-grow-1 servi-pric-chng'>
                            Rs. <?php echo h($service[0]->_standard_plan_price) ?>
                            <br>
                            <span>
                                <strike style="color: #6610f2;" ;>Rs.
                                    <?php echo h($service[0]->_standard_price) ?></strike>
                                (<?php echo round((($service[0]->_standard_price - $service[0]->_standard_plan_price) / $service[0]->_standard_price) * 100, 2) ?>%
                                OFF)
                            </span>
                        </span>

                    </p>
                    <span>
                        <ul class='px-4 py-2 income_points'>
                            <?php $incPoints = explode("\n", trim($service[0]->_standard_price_desc)); ?>
                            <?php foreach ($incPoints as $incPoint) : ?>
                            <li><?php
                      if ($stPoints >= $basicPoints) {
                        echo "<b>" . $incPoint . "</b>";
                      } else {
                        echo $incPoint;
                      }
                      ?></li>
                            <?php $stPoints++;
                endforeach; ?>
                        </ul>
                    </span>
                    <p class="text-timer time_style"> <i class="fa fa-clock-o"></i>
                        <?php echo h($service[0]->_standard_plan_time) ?> Days Delivery time</p>
                    <?php if ($service[0]->offer_box != "") { ?>
                    <p class="text-timer" style="color:#6610f2;"><i class="fa fa-gift"></i>
                        <?php echo h($service[0]->offer_box) ?></p>
                    <?php } ?>

                    <p class="d-flex pr-5">
                        <span class='flex-grow-1'>Total</span>
                        <span class='flex-grow-1' style="width: 30%; text-align: right;">
                            Rs. <?php echo h($service[0]->_standard_plan_price) ?>
                        </span>
                    </p>

                    <div class="btn-sec">
                        <?php if ($service[0]->is_active == 1) { ?>
                        <?php if ($service[0]->_standard_booking_price != 0) { ?>
                        <a align="left" class="btn btn-primary btn-block btn-price"
                            href="<?= $myUrlStd . '/' . $bkAmount ?>">
                            <span style="font-weight:600; ">Booking Amount Rs.</span><span class="service-price"
                                price="<?php echo h($service[0]->_standard_booking_price) ?>">
                                <?php echo h($service[0]->_standard_booking_price) ?></span>
                        </a>
                        <p class="para text-center" style="margin: 0px;"><b>Or</b></p>
                        <?php } ?>
                        <a align="right" class="btn btn-primary btn-block btn-price"
                            href="<?= $myUrlStd . '/' . $fullAmount ?>">
                            <span style="font-weight:600;">Full Amount Rs.</span><span class="service-price"
                                price="<?php echo h($service[0]->_standard_plan_price) ?>">
                                <?php echo h($service[0]->_standard_plan_price) ?></span>
                        </a>
                        <?php }else{?>
                        <a align="left" class="btn btn-primary btn-block btn-price"
                            href="https://easifyy.com/pages/contactUs">
                            Contact Us
                        </a>
                        <?php }?>
                    </div>
                    <div class="payment-icon">
                        <img src="../assets/images/paymen-img.jpg" alt="signup">
                    </div>
                    <p class="para" style="color: #000000; font-size: 16px;"><img src="../assets/images/squr.png"
                            alt="signup" style=" width: 22px; margin: 10px 4px;"> Get instant Cashback Rewards up to
                        100%</p>
                    <p class="para" style="color: #000000; font-size: 16px;"><img src="../assets/images/squr.png"
                            alt="signup" style=" width: 22px; margin: 5px 4px;"> 100% Refunds on Non Delivery</p>
                    <p class="para" style="color: #000000; font-size: 16px; margin-top: 5px;"><img
                            src="../assets/images/lock.png" alt="signup" style=" width: 20px; margin: 5px 6px;"> 256
                        -Bit SSL Encryption & ISO 27001 Datacenter</p>
                </div>
                <?php } ?>
                <?php if ($service[0]->_premium_price != '') { ?>
                <div class="tab-pane fade px-2" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                    <p class="d-flex pr-2"><span class='flex-grow-1'> <?php echo h($service[0]->title) ?></span>
                        <span class='flex-grow-1 servi-pric-chng'>
                            Rs. <?php echo h($service[0]->_premium_plan_price) ?>
                            <br>
                            <span>
                                <strike style="color: #6610f2;" ;>Rs.
                                    <?php echo h($service[0]->_premium_price) ?></strike>
                                (<?php echo round((($service[0]->_premium_price - $service[0]->_premium_plan_price) / $service[0]->_premium_price) * 100, 2) ?>%
                                OFF)
                            </span>
                        </span>
                    </p>
                    <span>
                        <ul class='px-4 py-2 income_points'>
                            <?php $incPoints = explode("\n", trim($service[0]->_premium_price_desc)); ?>
                            <?php foreach ($incPoints as $incPoint) : ?>
                            <li>
                                <?php
                    if ($prPints >= $stPoints) {
                      echo "<b>" . $incPoint . "</b>";
                    } else {
                      echo $incPoint;
                    }
                    ?>
                            </li>
                            <?php $prPints++;
                endforeach; ?>
                        </ul>
                    </span>
                    <p class="text-timer time_style"><i class="fa fa-clock-o"></i>
                        <?php echo h($service[0]->_premium_plan_time) ?> Days Delivery time</p>
                    <?php if ($service[0]->offer_box != "") { ?>
                    <p class="text-timer" style="color:#6610f2;"><i class="fa fa-gift"></i>
                        <?php echo h($service[0]->offer_box) ?></p>
                    <?php } ?>
                    <p class="d-flex pr-5">
                        <span class='flex-grow-1'>Total</span>
                        <span class='flex-grow-1' style="width: 30%; text-align: right;">
                            Rs. <?php echo h($service[0]->_premium_plan_price) ?>
                        </span>
                    </p>
                    <div class="btn-sec">
                        <?php if ($service[0]->is_active == 1) { ?>
                        <?php if ($service[0]->_premium_booking_price != 0) { ?>
                        <a align="left" class="btn btn-primary btn-block btn-price"
                            href="<?= $myUrlPre . '/' . $bkAmount ?>">
                            <span style="font-weight:600;">Booking Amount Rs.</span><span class="service-price"
                                price="<?php echo h($service[0]->_premium_booking_price) ?>">
                                <?php echo h($service[0]->_premium_booking_price) ?></span>
                        </a>
                        <p class="para text-center" style="margin: 0px;"><b>Or</b></p>
                        <?php } ?>
                        <a align="right" class="btn btn-primary btn-block btn-price"
                            href="<?= $myUrlPre . '/' . $fullAmount ?>">
                            <span style="font-weight:600;">Full Amount Rs.</span><span class="service-price"
                                price="<?php echo h($service[0]->_premium_plan_price) ?>">
                                <?php echo h($service[0]->_premium_plan_price) ?></span>
                        </a>
                        <?php }else{?>
                        <a align="left" class="btn btn-primary btn-block btn-price"
                            href="https://easifyy.com/pages/contactUs">
                            Contact Us
                        </a>
                        <?php }?>
                    </div>
                    <div class="payment-icon">
                        <img src="../assets/images/paymen-img.jpg" alt="signup">
                    </div>
                    <p class="para" style="color: #000000; font-size: 16px;"><img src="../assets/images/squr.png"
                            alt="signup" style=" width: 22px; margin: 10px 4px;"> Get instant Cashback Rewards up to
                        100%</p>
                    <p class="para" style="color: #000000; font-size: 16px;"><img src="../assets/images/squr.png"
                            alt="signup" style=" width: 22px; margin: 5px 4px;"> 100% Refunds on Non Delivery</p>
                    <p class="para" style="color: #000000; font-size: 16px;  margin-top: 5px;"><img
                            src="../assets/images/lock.png" alt="signup" style=" width: 20px; margin: 5px 6px;"> 256
                        -Bit SSL Encryption & ISO 27001 Data center</p>
                </div>
                <?php } ?>
            </div>
            <div class="col-md-12 mind-box">
                <div class="row m-lg-0">
                    <div class="col-lg-12 col-md-6 col-sm-12 px-lg-0">
                        <div class="query1">
                            <div class="query_1 " style=" font-weight: bold; font-size: 16px; text-align: center;">
                                Easifyy
                                Assurance</div>
                            <div class="_1s7Acb">
                                <ul>
                                    <li>100% Payment Protection</li>
                                    <li>Verified &Interviewed PSP</li>
                                    <li>Escrow Payments and Instalments</li>
                                    <li>Track Work Delivery</li>
                                    <li>Easifyy Dedicated Support</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-6 col-sm-12 px-lg-0">
                        <div class="query1">
                            <div class="query_1 " style=" font-weight: bold; font-size: 16px; text-align: center;">How
                                it
                                Works</div>
                            <div class="_1s7Acb">
                                <ul>
                                    <li>Pay Booking Amount & Book Service</li>
                                    <li>Communicate with PSP</li>
                                    <li>Track Work Delivery with Milestones</li>
                                    <li>Pay Balance Payments as per Milestones</li>
                                    <li>Get work Done!</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="banner-bottom-w3layouts py-5" id="services">
        <div class="container">
            <h3 class="title-w3 pt-3 mb-sm-5 mb-4 text-dark text-center font-weight-bold">Related Services</h3>
            <p class="title-para text-center mx-auto mb-sm-3 mb-3">Book Services with Confidence from one place.</p>
        </div>
        <div class="row">
            <?php $count=1; foreach ($relatedServices as $rService):
        if(is_null($rService->product->parent_id) && $count<=3 && $rService->product->delete_status==1){ 
        ?>
            <div class="col-md-6 col-lg-4">
                <div class="plan_section">
                    <b><?= $rService->product->title?></b><br>
                    <?php 
              $totalPrice=$rService->product->_basic_price;
              $discountedPrice=$rService->product->_basic_plan_price;
              $service_INC=$rService->product->service_coverd;
              //dd($service_INC);
              if($totalPrice==0){
                $totalPrice=$discountedPrice;
              }
              if($discountedPrice==0){
                $discountedPrice=$totalPrice;
              }
            ?>
                    <p class="plan_price"><b>Rs <?=$discountedPrice?>/-</b>
                        <span class="_content-text">Original
                            <strike>Rs <?=$totalPrice?></strike>
                            (<?php echo round((($totalPrice - $discountedPrice) / $totalPrice) * 100, 2) ?>% OFF)
                        </span>
                    </p>
                    <ul class="list-checkmarks term-list">
                        <?php 
                    $rIncPoints = explode("\n", trim($service_INC));
                    foreach ($rIncPoints as $rIncPoint) : ?>
                        <li><i class="fa fa-angle-right about-list-arrows"></i><?= $rIncPoint ?></li>
                        <?php endforeach; ?>
                        <!--<li><i class="fa fa-angle-right about-list-arrows"></i>Name approval in RUN (Reserve your unique Name)</li>
              <li><i class="fa fa-angle-right about-list-arrows"></i>DSC (2 nos)</li>
              <li><i class="fa fa-angle-right about-list-arrows"></i>Filing of SPICe form</li>
              <li><i class="fa fa-angle-right about-list-arrows"></i>Issue of Incorporation Certificate along with PAN and TAN</li>
              <li><i class="fa fa-angle-right about-list-arrows"></i>Includes Govt Fees & Stamp duty for Authorized Capital upto Rs. 1 Lakh except for the states of Punjab, Madhya Pradesh and Kerala</li>
              <li><i class="fa fa-angle-right about-list-arrows"></i>Excludes foreign national / Body Corporate as director or business needing RBI/SEBI approval</li>
              <li><i class="fa fa-angle-right about-list-arrows"></i>App to manage your business Khata On the Go</li>
              <li><i class="fa fa-angle-right about-list-arrows"></i>Exclusive offers from our Partner</li>
              <ul class="list-display">
                <li><i class="fa fa-angle-right about-list-arrows"></i>ICICI Bank-Account Opening Offer</li>
                <li><i class="fa fa-angle-right about-list-arrows"></i>Freshworks-Offers</li>
              </ul>-->
                    </ul>
                    <div class="view-details">
                        <a href="../service-details/<?=$rService->product->slug?>" class=" btn btn-save btn-block">View
                            Packages</a>
                    </div>
                </div>
            </div>
            <?php $count++;}
         endforeach; ?>
            <!--<div class="col-md-4">
        <div class="plan_section">
          <b>Incorporate a Subsidiary</b><br>
            <p class="plan_price"><b>Rs 14999/-</b></p>
          <ul class="list-checkmarks term-list">
            <li><i class="fa fa-angle-right about-list-arrows"></i>Name approval in RUN (Reserve your unique Name)</li>
            <li><i class="fa fa-angle-right about-list-arrows"></i>DSC (2 nos)</li>
            <li><i class="fa fa-angle-right about-list-arrows"></i>Filing of SPICe form</li>
            <li><i class="fa fa-angle-right about-list-arrows"></i>Issue of Incorporation Certificate along with PAN and TAN</li>
            <li><i class="fa fa-angle-right about-list-arrows"></i>Includes Govt Fees & Stamp duty for Authorized Capital upto Rs. 1 Lakh except for the states of Punjab, Madhya Pradesh and Kerala</li>
            <li><i class="fa fa-angle-right about-list-arrows"></i>Excludes foreign national / Body Corporate as director or business needing RBI/SEBI approval</li>
            <li>App to manage your business Khata On the Go -Clear App</li>
            <li><i class="fa fa-angle-right about-list-arrows"></i>Exclusive offers from our Partner</li>
            <ul class="list-display">
              <li><i class="fa fa-angle-right about-list-arrows"></i>ICICI Bank-Account Opening Offer</li>
              <li><i class="fa fa-angle-right about-list-arrows"></i>Freshworks-Offers</li>
            </ul>
          </ul>
          <div class="view-details">
            <a href="#" class=" btn btn-save btn-block">View Packages</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="plan_section">
          <b>Incorporate a Subsidiary of Foreign Company</b><br>
            <p class="plan_price"><b>Rs 14999/-</b></p> 
          <ul class="list-checkmarks term-list">
            <li><i class="fa fa-angle-right about-list-arrows"></i>Name approval in RUN (Reserve your unique Name)</li>
            <li><i class="fa fa-angle-right about-list-arrows"></i>DSC (2 nos)</li>
            <li><i class="fa fa-angle-right about-list-arrows"></i>Filing of SPICe form</li>
            <li><i class="fa fa-angle-right about-list-arrows"></i>Issue of Incorporation Certificate along with PAN and TAN</li>
            <li><i class="fa fa-angle-right about-list-arrows"></i>Includes Govt Fees & Stamp duty for Authorized Capital upto Rs. 1 Lakh except for the states of Punjab, Madhya Pradesh and Kerala</li>
            <li><i class="fa fa-angle-right about-list-arrows"></i>Excludes foreign national / Body Corporate as director or business needing RBI/SEBI approval</li>
            <li><i class="fa fa-angle-right about-list-arrows"></i>App to manage your business Khata On the Go -Clear App</li>
            <li><i class="fa fa-angle-right about-list-arrows"></i>Exclusive offers from our Partner</li>
            <ul class="list-display">
              <li><i class="fa fa-angle-right about-list-arrows"></i>ICICI Bank-Account Opening Offer</li>
                <li><i class="fa fa-angle-right about-list-arrows"></i>Freshworks-Offers</li>
            </ul>
          </ul>
          <div class="view-details">
            <a href="#" class=" btn btn-save btn-block">View Packages</a>
          </div>  
        </div>
      </div>-->
        </div>
    </section>
    <section class="talk_us text-center py-5" style="background-image: url('../assets/images/purple.jpg');">
        <div class="container">
            <div class="row text-center">
                <a href="<?php echo BASE_URL; ?>pages/contactUs" class="btn button-style mt-sm-4 mt-4 mb-4 mx-auto"
                    style="padding: 12px 50px;">Talk to us</a>
            </div>
        </div>
    </section>
</div>