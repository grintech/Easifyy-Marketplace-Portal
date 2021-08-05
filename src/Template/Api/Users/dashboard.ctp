<?php 
  switch ($serviceType){
  case 1:
    $servicePrice=$service[0]['_basic_price'];
    $serviceTime=$service[0]['_basic_plan_time']; 
    break;
  case 2:
    $servicePrice=$service[0]['_standard_price'];
    $serviceTime=$service[0]['_standard_plan_time'];  
    break;
  case 3:
    $servicePrice=$service[0]['_premium_price'];
    $serviceTime=$service[0]['_premium_plan_time'];  
    break;
  }
?>
<head>
<link rel="stylesheet" href="/hopperstock/dev/marketplace/assets/css/font-awesome.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="/hopperstock/dev/marketplace/assets/css/bootstrap.min.css">
<!-- jQuery library -->
</head>
<style>
.container-fluid, .container-lg, .container-md, .container-sm, .container-xl {
    width: 100%;
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
}
   .global-top-margin {
    margin-top: 200px;
    margin-bottom: 150px;
}
   .d-earn-cash-text, .d-side-heading {
    font-family: EinaBold;
    text-align: center;
    color: red;
    font-weight: 800;
    font-size: 20px;
}
   .new-dashboard-container {
   margin-top: 30px;
   padding-top: 20px;
   padding-bottom: 30px;
   }
   .d-common-padding {
   padding-right: 25px;
   padding-left: 25px;
   }
   .d-parent-margin-top {
   margin-top: 30px;
   padding-right: 0;
   }
   .img-responsive {
   width: 100%;
   }
   .d-sidebar-box img {
   margin: auto;
   }
   .text-center {
   text-align: center;
   }
   .dashboard-header-box, .new-dashboard-container {
   box-sizing: border-box;
   box-shadow: 0 2px 5px 1px rgba(174,170,170,.5);
   background-color: #fff;
   border-radius: 4px;
   }
   .d-sidebar-box, .d-sidebar-profile-box {
    position: relative;
    box-shadow: 0 1px 5px 1px rgba(194,189,189,.5);
    background-color: #fff;
    border-radius: 4px;
    padding: 15px 10px;
    min-height: 200px;
    margin-bottom: 20px;
}
   .heading-sm {
    font-size: 30px;
    line-height: 1.3em;
    margin-top: 0;
    margin-bottom: 30px;
}
.d-small-para {
    margin-top: 15px;
    margin-bottom: 20px;
    font-size: 16px;
    font-family: SofiaLight;
    color: #000;
}
.date {
    font-size: 10px;
    color: #979797;
    text-align: left;
}

.para, .para a {
    color: #000;
}
.text-empty-space {
    color: #000;
    font-family: system-ui;
    font-size: 15px;
    font-weight: 600;
    margin-top: 25px;
    text-align: center;
}
.para {
    font-size: 16px;
    font-family: system-ui;
    line-height: 1.5em;
    font-weight: 600;
}
.sidbox-btn {
    padding: 8px 20px;
    background-color: #8e43e7;
    color: #fff;
    font-size: 14px;
    font-family: SofiaMedium;
    bottom: 15px;
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
}
.carousel-inner>.item>a>img, .carousel-inner>.item>img, .img-responsive, .thumbnail a>img, .thumbnail>img {
    display: block;
    max-width: 100%;
    height: auto;
}
.d-sidebar-box .blank-dp {
    padding-top: 18px!important;
}
.d-side-heading {
    font-size: 16px;
    color: #000;
}
.d-earn-cash-text, .d-side-heading {
    font-family: EinaBold;
    text-align: center;
}
.d-side-heading {
    font-size: 16px;
    color: #000;
}
</style>
<div class="container-fluid display-table">
      <div class="row global-top-margin">
         <div class="col-sm-12 no-padding">
            <!--<button type="button" class="slide-toggle">Slide Toggle</button> -->
            <div class="col-md-9 col-sm-8 new-dashboard-container" style="min-height: 650px;">
               <div class="row" style="border-bottom: 1px solid rgb(232, 238, 243);">
                  <div class="d-common-padding">
                     <div class="col-sm-12">
                        <h4 class="heading-sm" style="margin-bottom: 0px;">Hi Hitesh <span class="date" id="contracted_job_date" style="font-family: SofiaLight; margin-left: 20px; font-size: 14px;">OCTOBER 30TH  2020</span></h4>
                        <p class="para">Hope you’re doing great today. We have got everything in place for you.</p>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-12 no-padding">
                     <div class="col-sm-12 text-center">
                        <p>&nbsp;</p>
                        <p class="text-empty-space">You are yet to take a service on Marketplace.</p>
                        <p>&nbsp;</p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-3 col-sm-4 d-parent-margin-top no-padding">
               <div class="d-sidebar-box visible-xs" style="line-height: 1.4em; position: relative; padding: 5px; min-height: auto;">
                  <div class="app-img-banner">
                     <h4 class="scope-heading">Use Market Place Website for a better experience</h4>
                     <ul class="list-inline app-button">
                        <li><a href="https://itunes.apple.com/us/app/wizcounsel/id1458978743?ls=1&amp;mt=8" target="_blank"><img src="/static/media/Ios-Button.4433652d.png" alt=""></a></li>
                        <li><a href="" target="_blank"><img src="/static/media/Android-Button.d5dd1d59.png" alt=""></a></li>
                     </ul>
                  </div>
                  <img src="/static/media/app-install-banner.ff32ef7b.png" class="img-responsive" alt="image">
                  <div id="refer_and_earn" class="modal fade" role="dialog">
                     <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                           <div class="modal-body">
                              <div id="snackbar" class="snackbar" style="bottom: 60px;"></div>
                              <h4 class="d-modal-heading">Refer &amp; Earn</h4>
                              <p class="d-modal-para">Invite people you know to use market - for every person who pays and hires an expert, you and your friend will get a reward worth Rs. 100.</p>
                              <div class="text-center invite-link-box">
                                 <p class="d-modal-para"><b>Copy and Share your invite link</b></p>
                                 <div>
                                    <a class="btn-default btn-block btn-lg" id="copy"></a>
                                    <p class="text-bold">Or</p>
                                    <a class="btn-default btn-block btn-lg" id="copy">Give this code to your friends. <b>HITESH7381</b></a>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-sm-12">
                                    <h4 class="d-sub-heading">How invite works?</h4>
                                 </div>
                                 <p>&nbsp;</p>
                                 <div class="col-sm-4 work-box-padding">
                                    <div class="work-icon-box"><img src="/static/media/refer-heart.543710d9.png" alt="icon" style="width: 70px;"></div>
                                    <p class="d-small-para">Invite friends to join  using your unique link.</p>
                                 </div>
                                 <div class="col-sm-4 work-box-padding">
                                    <div class="work-icon-box"><img src="" alt="icon" style="width: 60px;"></div>
                                    <p class="d-small-para">When your friend pays &amp; hires an expert using your link, you’ll earn worth Rs. 100 cash.</p>
                                 </div>
                                 <div class="col-sm-4 work-box-padding">
                                    <div class="work-icon-box"><img src="" alt="icon" style="width: 60px;"></div>
                                    <p class="d-small-para">Friends who pays &amp; hires an expert with your link will also earn worth Rs. 100 cash.</p>
                                 </div>
                              </div>
                           </div>
                           <div class="modal-footer" style="text-align: center; padding: 20px;"><button type="button" class="btn btn-login" data-dismiss="modal">Close</button></div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="d-sidebar-box text-center" style="line-height: 1.3em;">
                  <div class="text-center">
                     <div class="blank-dp" style="width: 55px; height: 55px; border-radius: 50%; background: #8e43e7; padding: 7px 5px 5px; color: rgb(255, 255, 255); text-align: center; vertical-align: bottom; margin: auto;"><span style="font-size: 20px; margin-top: 20px;">HS</span><img id="update-profile" src="" class="img-circle hidden"></div>
                     <p class="d-small-para text-center">Please complete your profile. This helps us in billing and support.</p>
                     <br><br>
                  </div>
                  <a class="btn sidbox-btn" href="/user-profile">Complete Profile</a>
               </div>
               <div class="d-sidebar-box text-center hidden-xs" style="line-height: 1.4em;">
                  <img src="https://clipartion.com/wp-content/uploads/2015/11/teamwork-quotes-free-clipart-images.jpg" class="img-responsive" alt="image"><button class="btn sidbox-btn" data-toggle="modal" data-target="#refer_and_earn">Refer &amp; Earn</button>
                  <div id="refer_and_earn" class="modal fade" role="dialog">
                     <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                           <div class="modal-body">
                              <div id="snackbar" class="snackbar" style="bottom: 60px;"></div>
                              <h4 class="d-modal-heading">Refer &amp; Earn</h4>
                              <p class="d-modal-para">Invite people you know to use - for every person who pays and hires an expert, you and your friend will get a reward worth Rs. 100.</p>
                              <div class="text-center invite-link-box">
                                 <p class="d-modal-para"><b>Copy and Share your invite link</b></p>
                                 <div>
                                    <a class="btn-default btn-block btn-lg" id="copy"></a>
                                    <p class="text-bold">Or</p>
                                    <a class="btn-default btn-block btn-lg" id="copy">Give this code to your friends. <b>HITESH7381</b></a>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-sm-12">
                                    <h4 class="d-sub-heading">How invite works?</h4>
                                 </div>
                                 <p>&nbsp;</p>
                                 <div class="col-sm-4 work-box-padding">
                                    <div class="work-icon-box"><img src="/static/media/refer-heart.543710d9.png" alt="icon" style="width: 70px;"></div>
                                    <p class="d-small-para">Invite friends to join using your unique link.</p>
                                 </div>
                                 <div class="col-sm-4 work-box-padding">
                                    <div class="work-icon-box"><img src="A" alt="icon" style="width: 60px;"></div>
                                    <p class="d-small-para">Friends who pays &amp; hires an expert with your link will also earn worth Rs. 100 cash.</p>
                                 </div>
                              </div>
                           </div>
                           <div class="modal-footer" style="text-align: center; padding: 20px;"><button type="button" class="btn btn-login" data-dismiss="modal">Close</button></div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="d-sidebar-box" style="min-height: 100px; line-height: 60px;">
                  <h4 class="d-side-heading">Cash Earned from Referrals</h4>
                  <p class="d-earn-cash-text">Rs. 0</p>
               </div>
            </div>
         </div>
      </div>
   </div>