<?php 
$checked=$merchant->status;
//dd($checked);
if($checked==True){
  $checked="Checked";
}else{
  $checked="";
}
?>

<style>
.btn:focus,
.btn-large:focus,
.btn-small:focus,
.btn-floating:focus {
    background-color: #8e43e7;
    box-shadow: none;
}

.d-parent-margin-top {
    margin-top: 10px;
    padding: 10px 0px;
}

i.fa.fa-envelope {
    padding-right: 10px;
}

.fa-question-circle {
    color: #8e43e7;
    font-size: 5em;
    padding: 10px 0px;
}

.new-dashboard-container {
    margin-top: 20px;
}

.d-sidebar-profile-box .blank-dp {
    line-height: 40px;
    margin-top: 15px !important;
}

.query1 {
    padding: 15px 10px;
    margin-top: 10px;
    margin-bottom: 10px;
    border-radius: 2px;
    box-shadow: 0 1px 5px 1px rgba(194, 189, 189, .5);
}

._1s7Acb ul li:after {
    content: " ";
    width: 1px;
    height: 30px;
    background: #ccc;
    display: block;
    margin: 0 -34px;
}

.mind-box {
    padding: 0;
}

._1s7Acb ul li:last-child:after {
    content: " ";
    width: 1px;
    height: 30px;
    background: #ccc;
    display: none;
    margin: 0 -34px;
}

.mind-box {
    padding: 0;
}

.qury ul li:nth-child(4) {
    list-style-image: none;
    list-style-type: none;
    background-image: url(/assets/images/down1.png) !important;
    background-size: 20px;
    background-repeat: no-repeat;
    line-height: 24px;
    padding-left: 43px;
    margin-bottom: 7px;
    font-size: 14px;
    font-weight: bold;
}

._1s7Acb ul li:nth-child(7) {
    list-style-image: none;
    list-style-type: none;
    background-image: url(/assets/images/down1.png);
    background-size: 20px;
    background-repeat: no-repeat;
    line-height: 24px;
    padding-left: 43px;
    margin-bottom: 7px;
    font-size: 14px;
    font-weight: bold;
}

._1s7Acb ul li {
    list-style-image: none;
    list-style-type: none;
    background-image: url("/assets/images/down.png");
    background-size: 20px;
    background-repeat: no-repeat;
    line-height: 24px;
    padding-left: 43px;
    margin-bottom: 7px;
    font-size: 14px;
    font-weight: bold;
}

.d-sidebar-profile-box {
    padding: 5px 10px 20px;
}

.d-sidebar-box,
.d-sidebar-profile-box {
    position: relative;
    box-shadow: 0 1px 5px 1px rgba(194, 189, 189, .5);
    background-color: #fff;
    border-radius: 4px;
    min-height: 200px;
    margin-bottom: 20px;
}

.d-update-profile-body {
    padding: 10px 15px;
    border-bottom: 1px solid #e8eef3;
}

.d-update-profile {
    box-sizing: border-box;
    box-shadow: 0 2px 5px 1px rgba(174, 170, 170, .5);
    background-color: #fff;
    margin-bottom: 20px;
}

.d-profile-heading {
    font-size: 18px;
    color: #000;
    font-weight: bold;
}

.date {
    font-size: 10px;
    color: #979797;
    text-align: left;
}

.para,
.para a {
    color: #000;
}

.d-sidebar-profile-box .fa-star,
.professional-rating .fa-star {
    color: gold;
    margin-left: 2px;
}

.d-report-panel {
    margin-top: 5px;
    margin-bottom: 20px;
    border-radius: 4px;
    min-height: 100px;
    box-shadow: 0 2px 5px 1px rgba(174, 170, 170, .5);
    background-color: #fff;
}

.d-report-panel .panel-body {
    padding: 10px 20px;
}

.heading-md {
    color: #000;
    font-size: 18px;
    text-align: center;
}

.d-report-panel .heading-md {
    padding-bottom: 2px;
}

.d-report-panel .text-number {
    margin-top: 20px;
    font-size: 24px;
}

.text-number {
    color: #8e43e7;
    font-weight: 700;
}

.list-unstyled {
    padding-left: 0;
    list-style: none;
}

.dashboard-banner ul>li {
    margin-left: 10px;
    margin-bottom: 15px;
    font-size: 16px;
}

.progress_bar {
    position: relative;
    height: 10px;
    width: 100%;
    border-radius: 50px;
    background-color: #efefef;
    border: 1px solid #efefef;
    margin: 15px auto auto;
}

.dash {
    padding: 0 1rem;
    padding: 0px 1rem;
    margin: 5px 0px;
    color: #fff !important;
}

.list-sec li::before {
    content: "✓";
    color: #8e43e7 !important;
    font-size: 16px;
    margin: 0px 5px 12px 0;
    float: left;
}

.d-update-profile.dashboard-banner {
    display: flex;
    flex-wrap: wrap;
    min-height: 200px;
    background: linear-gradient(40deg, #fff, #fff, #fff, #8e43e759, #8e43e7);
}

.dashboard-banner-img {
    width: 35%;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
}

.btn {
    text-transform: capitalize;
}

.filler {
    height: 10px;
    border-radius: 50px;
    background-color: #8e43e7;
}
</style>
<div class="row">
    <div class="col-md-12 card animate fadeUp px-0 px-lg-3">
        <div class="container">
            <!--yearly & weekly revenue chart start-->
            <div id="sales-chart">
                <div class="row">
                    <div class="col-lg-9 new-dashboard-container px-0 pl-lg-0 pr-lg-3">
                        <div class="d-update-profile">
                            <div class="d-update-profile-body">
                                <h4 class="d-profile-heading">Welcome ! <?php echo ucwords($loguser['first_name']);?>
                                </h4>
                                <h4 class="d-profile-heading" style=" color: #8e43e7; margin-bottom: 10px;">
                                    Hi <?php echo ucwords($loguser['first_name']);?>
                                    <span class="date" id="contracted_job_date"
                                        style="margin-left: 20px; font-size: 14px;">
                                        <?php echo date("l jS \of F Y ");?>
                                    </span>
                                </h4>
                                <p class="para">We Hope you're doing great today.We have got everything in place for
                                    you.</p>
                            </div>
                        </div>
                        <div class="d-update-profile">
                            <div class="d-update-profile-body">
                                <div class="row">
                                    <div class="col-md-4 no-padding">
                                        <h4 class="d-profile-heading" style="">Profile Completion percentage</h4>
                                    </div>
                                    <div class="col-md-6 col-xs-10">
                                        <div class="progress_bar">
                                            <div class="filler" style="width: <?=$profileStatus?>%;"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-xs-1">
                                        <div class="bar-count"><?=$profileStatus?>%</div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-update-profile-body">
                                <div class="row">
                                    <div class="col-lg-8 col-md-8 no-padding">
                                        <h4 class="d-profile-heading">Keep a check on how your profile looks</h4>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <a class="btn btn-view-profile"
                                            href="<?php echo $this->Url->build([ 'controller' => 'Users', 'action' => 'profileView']) ?>">Profile
                                            Preview</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-4 col-xs-6">
                                <a>
                                    <div class="panel panel-default d-report-panel"
                                        style="border-top: 4px solid rgb(142 67 231); border-bottom: 4px solid #8e43e7;">
                                        <div class="panel-body">
                                            <h4 class="heading-md"> My Orders</h4>
                                            <h4 class="text-number text-center"><?=$order_total?></h4>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-4 col-xs-6">
                                <a href="../order/in-progress">
                                    <div class="panel panel-default d-report-panel"
                                        style="border-top: 4px solid rgb(142 67 231); border-bottom: 4px solid #8e43e7;">
                                        <div class="panel-body">
                                            <h4 class="heading-md">Total Orders</h4>
                                            <h4 class="text-number text-center">Rs. <?php echo sprintf("%.2f", $totalPaymnt);?></h4>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-sm-4 col-xs-6">
                                
                                    <div class="panel panel-default d-report-panel"
                                        style="border-top: 4px solid rgb(142 67 231); border-bottom: 4px solid #8e43e7;">
                                        <div class="panel-body">
                                            <h4 class="heading-md">Cancelled Orders</h4>
                                            <h4 class="text-number text-center">
                                            <?php echo $cancelOrders; ?></h4>
                                        </div>
                                    </div>
                                
                            </div>

                            <div class="col-sm-4 col-xs-6">
                                <a href="../order/refunded">
                                    <div class="panel panel-default d-report-panel"
                                        style="border-top: 4px solid rgb(142 67 231); border-bottom: 4px solid #8e43e7;">
                                        <div class="panel-body">
                                            <h4 class="heading-md">Refunded Orders</h4>
                                            <h4 class="text-number text-center"><?php echo $refundedOrders; ?></h4>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-4 col-xs-6">
                                <a href="../order/completed">
                                    <div class="panel panel-default d-report-panel"
                                        style="border-top: 4px solid rgb(142 67 231); border-bottom: 4px solid #8e43e7;">
                                        <div class="panel-body">
                                            <h4 class="heading-md">Download Invoices</h4>
                                            <h4 class="text-number text-center"><?=$completeOrders?></h4>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-sm-4 col-xs-6">
                                <a href="../order/completed">
                                    <div class="panel panel-default d-report-panel"
                                        style="border-top: 4px solid rgb(142 67 231); border-bottom: 4px solid #8e43e7;">
                                        <div class="panel-body">
                                            <h4 class="heading-md">Download Order Documents</h4>
                                            <br>
                                            <br>
                                        </div>
                                    </div>
                                </a>
                            </div>

                        </div>
                        <div class="">
                            <div class="col-sm-12 no-padding">
                                <div class="d-update-profile dashboard-banner">
                                    <div class="d-update-profile-body dashboard-banner-text">
                                        <h4 class="d-profile-heading">Refer &amp; Bring Buyers and Get 10% Commission on
                                            All Orders !</h4>
                                        <ul class="list-unstyled list-sec">
                                            <li>Refer paid Customers to Easifyy to book Professional Services </li>
                                            <li>Easifyy will give 10% Commission on all Orders</li>
                                            <li>Earn Recognition from Easifyy</li>
                                        </ul>
                                        <a class="dash btn btn-see-skill" data-target="#refer_and_earn">Get Referral
                                            code</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-update-profile dashboard-banner">
                            <div class="d-update-profile-body dashboard-banner-text">
                                <h4 class="d-profile-heading">Easifyy Affiliate Program - Where all your efforts are
                                    rewarded !</h4>
                                <ul class="list-unstyled list-sec">
                                    <li>High Paying Commission - We offer industry best affiliate Commission among all
                                        Service Providers</li>
                                    <li>Earn Your Pace - You are a SUPER affiliate ? <br>Our customized affiliate
                                        commission structure will keep you on the top-earning tier.</li>
                                    <li>Dedicated Affiliate Support - Dedicated account managers and resources to make
                                        sure you earn high commission regularly.</li>
                                </ul>
                                <a class="dash btn btn-see-skill" data-target="#refer_and_earn">Become An Affiliate</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 d-parent-margin-top">
                        <div class="d-sidebar-profile-box">
                            <div class="text-center">
                                <div class="blank-dp"
                                    style="width: 55px; height: 55px; border-radius: 50%; background: #8e43e7; padding: 7px 5px 5px; color: rgb(255, 255, 255); text-align: center; vertical-align: bottom; margin: auto;">
                                    <span><?php echo ucwords(substr( $loguser['first_name'],0,1)) ."".ucwords(substr( $loguser['last_name'],0,1));?></span>
                                    <img id="update-profile" src="" class="img-circle hidden">
                                </div>
                                <p class="professional-name">
                                    <?php echo  ucwords($loguser['first_name'])." ".ucwords($loguser['last_name']);?>
                                </p>
                                <p class="professional-rating"><span>4.5 </span><span class="fa fa-star"></span></p>
                            </div>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Responsiveness</td>
                                        <td>5.0 <span class="fa fa-star"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Reviews</td>
                                        <td>0</td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                        <div class="col-md-12 mind-box">
                            <!-- <div class="query1">
                <div class="query_1 " style=" margin-bottom: 20px; font-weight: bold; font-size: 16px; text-align: center;">Profile Approval Procedure<br><small>3-4 Working Days</small></div>
                <div class="_1s7Acb qury">
                  <ul>
                    
                    <li>Complete your Profile & Submit</li>
                    <li>Go through (SOP) & Follow</li>
                    <li>Make Call to Understand better</li>
                    <li>Approved PSP on Easifyy</li>
                  </ul>
                </div>
              </div>
              <div class="query1">
                <div class="query_1 " style=" margin-bottom: 20px; font-weight: bold; font-size: 16px; text-align: center;">How it Works</div>
                <div class="_1s7Acb">
                  <ul>
                    <li>Activate Services as per your expertise</li>
                    <li>Get Orders assigned from Easifyy</li>
                    <li>Communicate with Customer</li>
                    <li>Process the service from your end</li>
                    <li>Collect Payment as per Milestone</li>
                    <li>Earn Review from Customer</li>
                    <li>Get Work Done</li>
                  </ul>
                </div>
              </div> -->
                            <!-- <div class="col-md-4"> -->
                            <div class="row">
                                <div class="col-lg-12 col-md-6 px-lg-0">
                                    <div class="query1">
                                        <div class="text-center">
                                            <b class="query_1">Easifyy Assurance</b>
                                        </div>
                                        <div class="_1s7Acb my-4">
                                            <ul>
                                                <li>100% Payment Protection</li>
                                                <li>Verified & Interviewed Experts</li>
                                                <li>Escrow Payments and Instalments</li>
                                                <li>Track Work Delivery</li>
                                                <li>Easifyy Dedicated Support</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6 px-lg-0">
                                    <div class="query1">
                                        <div class="text-center">
                                            <b class="query_1">How it Works</b>
                                        </div>
                                        <div class="_1s7Acb my-4">
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
                                <!-- </div> -->
                            </div>
                            <div class="d-sidebar-box" style="line-height: normal; height: auto;">
                                <div class="text-center"><i class="fa fa-question-circle" aria-hidden="true"></i>
                                </div>
                                <p class="d-small-para text-center">Read FAQs, watch tutorials , read articles and
                                    learn to
                                    sell better.</p>
                                <div class="text-center"><a class="btn btn-see-profile"
                                        href="<?php echo $this->Url->build([ 'controller' => 'Users', 'action' => 'helpCenter']) ?>">Help
                                        Center</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--yearly & weekly revenue chart end-->
                <!--end container-->
            </div>
        </div>
    </div>