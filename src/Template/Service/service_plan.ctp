<div class="main-w3pvt main-cont">
    <div class="ty-mainbox-container clearfix" style="background-color:#ddd3ee">
        <div class="row text-center">
            <div class="col-md-12">
                <span class="heading">
                    <?php echo $categoryName; ?>
                </span>
                <div class="description">
                    <p>Get your business running. Launch your Startup at the lowest price. Pay just Rs 5,999 and get
                        your private limited company incorporated.</p>
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
        <div class="col-lg-8">
            <div class="row">
                <?php $count=1; foreach ($services as $service): ?>
                <?php if($service->product->delete_status==1 && $service->product->author==1){?>
                <div class="col-md-6">
                    <div class="plan_section">
                        <b><?php  echo $service->product->title?></b><br>
                        <?php 
                    $totalPrice=$service->product->_basic_price;
                    $discountedPrice=$service->product->_basic_plan_price;
                    $service_INC=$service->product->service_coverd;
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
                        <!--<p class="plan_price"><b>Rs <?=h($service->product->_basic_price)?>/-</b> <span class="_content-text">Original <strike>Rs 17,000</strike>(41.18% OFF)</span></p>-->
                        <ul class="list-checkmarks term-list">
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
                            <?php 
                      $rIncPoints = explode("\n", trim($service_INC));
                      foreach ($rIncPoints as $rIncPoint) : ?>
                            <li><i class="fa fa-angle-right about-list-arrows"></i><?= $rIncPoint ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <div class="view-details">
                            <a href="../service-details/<?php echo urlencode($service->product->slug)?>"
                                class=" btn btn-save btn-block">View Packages</a>
                        </div>
                    </div>
                </div>
                <?php  $count++;
              } endforeach; ?>

            </div>
        </div>
        <div class="col-lg-4 ">
            <div class="query bg-lightpurple">
                <b> Have queries?<br> Talk to an Expert</b>
                <?= $this->Form->create(); ?>
                <div class="form-group">
                    <label>E-mail</label>
                    <input type="email" class="form-control" name="E-mail" id="emailInput" placeholder="Enter E-mail"
                        required>
                </div>
                <div class="form-group">
                    <label>Phone-Number</label>
                    <input type="text" class="form-control" name="phone" id="phoneInput"
                        placeholder="Enter Phone-Number" required>
                </div>
                <div class="form-group">
                    <a href="#" id="callBackRequest" class="btn btn-callback btn-default btn-block">Request a
                        callback</a>
                </div>
                <?= $this->Form->end(); ?>
                <span class="form-respone"></span>
            </div>
            <div class="row mx-lg-0">
                <div class="col-lg-12 col-md-6 col-sm-12 px-lg-0">
                    <div class="query1">
                        <b class="query_1">Easifyy Assurance</b>
                        <div class="_1s7Acb">
                            <ul>
                                <li>100% Payment Protection</li>
                                <li>Verified &Interviewed Experts</li>
                                <li>Escrow Payments and Instalments</li>
                                <li>Track Work Delivery</li>
                                <li>Easifyy Dedicated Support</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-6 col-sm-12 px-lg-0">
                    <div class="query1">
                        <b class="query_1">How it Works</b>
                        <div class="_1s7Acb">
                            <ul>
                                <li>Pay Booking Amount & Book Service</li>
                                <li>Communicate with Expert</li>
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
    <section class="talk_us text-center py-5" style="background-image: url('assets/images/purple.jpg');">
        <div class="container">
            <div class="row text-center">
                <a href="<?php echo BASE_URL; ?>pages/contactUs" class="btn button-style mt-sm-4 mt-4 mb-4 mx-auto"
                    style="padding: 12px 50px;">Talk to us</a>
            </div>
        </div>
    </section>
    <!--<section class="banner-bottom-w3layouts py-5" id="services">
    <div class="container">
      <h3 class="title-w3 pt-3 mb-sm-5 mb-4 text-dark text-center font-weight-bold">Related Services</h3>
      <p class="title-para text-center mx-auto mb-sm-3 mb-3">Book Services with Confidence from one place.</p>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="plan_section">
          <b>Private Limited Company ( PLC )</b><br>
          <p class="plan_price"><b>Rs 9999/-</b> <span class="_content-text">Original <strike>Rs 17,000</strike>(41.18% OFF)</span></p>
          <ul class="list-checkmarks term-list">
            <li><i class="fa fa-angle-right about-list-arrows"></i>Name approval in RUN (Reserve your unique Name)</li>
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
            </ul>
          </ul>
          <div class="view-details">
            <a href="#" class=" btn btn-save btn-block">View Packages</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
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
      </div>
    </div>
  </section>-->
</div>