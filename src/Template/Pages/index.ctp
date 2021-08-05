<!-- banner -->
<style>
.service_section .service_icon img {
    position: relative;
}

.service_icon {
    /*height: 50px;
      width: 50px;
      border-radius: 50px;
      display: flex;
      justify-content: center;
      align-items: center;
      margin: auto;
      background: #FDF8FF;
      */
    border: none !important;
    /*margin-left: 5px;
      overflow: hidden;*/
}

.purple-background {
    background: #8e43e7;
}
</style>
<div class="main-w3pvt main-cont">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
            <!-- Slide One - Set the background image for this slide in the line below -->
            <div class="carousel-caption">
                <h2 class="text-white font-weight-bold">
                    <?= $bannerData['heading']; ?>
                </h2>
                <p class="mt-3 text-white">
                    <?= $bannerData['description']; ?>
                </p>
                <!-- <div class="search-container">
               <form action="/search" method="post">
                  <div class="search toggle-off">
                     <span class="fa fa-search searchicon" aria-hidden="true"></span>
                     <input type="text" id="search" name="search" placeholder="Search...">
                  </div>
               </form>
            </div> -->
                <!-- <a href="#" class="btn button-style mt-sm-3 mt-3">Seller and Customer</a> -->
                <!-- <div class="popular">
               Popular:
               <ul>
                  <?php foreach ($ourFeaturedProfessionalServices as $ourFeaturedProfessionalService): ?>
                        <li><a href="./service-details/<?= $ourFeaturedProfessionalService['slug']; ?>" class="text-body-2"><?= $ourFeaturedProfessionalService['title']; ?></a></li>   
                  <?php endforeach; ?>
               </ul>
            </div>-->
            </div>
            <?php 
            $count = 0;
               $imgUrl=$bannerData['image'];
               $images=explode("|",$imgUrl);
               foreach ($images as $image) {
                  if($image!=""){
                     $count++; ?>
            <div class="carousel-item <?php if($count == 1){echo ' active';}?>"
                style="background-image: url('<?= $image; ?>')">
            </div>
            <?php    }
               }
         ?>
            <!--<div class="carousel-item active" style="background-image: url('<?= $bannerData['image']; ?>')"></div>-->
            <!-- Slide Two - Set the background image for this slide in the line below -->
            <!-- <div class="carousel-item" style="background-image: url('assets/images/bg3.jpg')"></div> -->
            <!-- Slide Three - Set the background image for this slide in the line below -->
            <!-- <div class="carousel-item" style="background-image: url('assets/images/bg2.jpg')"></div> -->
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
<div class="secspace"></div>
<!--Popular services Starts here-->
<div class="popular purple-background mb-2" style="background:#2e2e2e">
    <div class="container">
        <div class="">
            <h3 style="color:#fff" class="title-w3 text-center mb-4">
                Popular Services
            </h3>
            <ul>
                <?php foreach ($ourFeaturedProfessionalServices as $ourFeaturedProfessionalService): ?>
                <li><a href="./service-details/<?= $ourFeaturedProfessionalService['slug']; ?>"
                        class="text-body-2"><?= $ourFeaturedProfessionalService['title']; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
<!--Popular services Ends here-->


<div class="secspace"></div>
<!-- //banner -->
<!-- //banner -->
<!-- services -->
<section class="banner-bottom-w3layouts py-5" id="services">
    <div class="container">
        <h3 class="title-w3 pt-3 mb-sm-5 mb-4 text-dark text-center font-weight-bold">Our Services at a glance</h3>
        <p class="title-para text-center mx-auto mb-sm-3 mb-3">Digitally Get Our Professional Services with full Trust &
            Satisfaction.</p>
        <div class="row">
            <?php
            foreach ($ourServiceCategory as $ourServiceCategorys) {
               
               ?>
            <div class="col-md-3" style="padding-top: 20px;">
                <div class="service_section">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="service_icon">
                                <img src="./catimage/<?= $ourServiceCategorys['image']; ?>">
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="service_title">
                                <a href="./service-plan/<?= $ourServiceCategorys['slug']; ?>">
                                    <p><?= $ourServiceCategorys['name']; ?></p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            }
         ?>

        </div>
    </div>
</section>
<div class="secspace"></div>
<!-- //services -->
<!-- Popular services -->
<section class="banner-bottom-w3layouts bg-gray py-5" id="popular-services">
    <div class="container">
        <h3 class="title-w3 pt-3 mb-sm-5 mb-4 text-dark text-center font-weight-bold">Popular Professional Services</h3>
        <div class="row">
            <div class="carousel-wrap">
                <div class="owl-carousel">
                    <?php
                  $count=1;
                  foreach ($ourProfessionalServices as $ourProfessionalServicess) {

                     ?>
                    <div class="item">
                        <div class="custom_overlay_wrapper">
                            <a href="./service-details/<?= $ourProfessionalServicess['slug']; ?>">
                                <img src="/img/product-images/<?= $ourProfessionalServicess['product_galleries'][0]['url']; ?>"
                                    alt="slide1" width="200" height="200">
                                <div class="custom_overlay">
                                    <span class="custom_overlay_inner">
                                        <h4><?= $ourProfessionalServicess['title']; ?></h4>
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php
                     $count++;
                  }
               ?>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="secspace"></div>
<style>
.custom_overlay_wrapper {
    position: relative;
}

.custom_overlay {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    text-align: center;
    background-color: rgba(255, 255, 255, .9);
    opacity: 0;
    -webkit-transition: all 400ms ease-in-out;
    -moz-transition: all 400ms ease-in-out;
    -o-transition: all 400ms ease-in-out;
    transition: all 400ms ease-in-out;
}

.custom_overlay:hover {
    opacity: 0.9;
}

.custom_overlay_inner {
    position: absolute;
    top: 50%;
    left: 10px;
    right: 10px;
    transform: translateY(-50%);
}

.custom_overlay h4 {
    position: relative;
    margin-bottom: 4px;
    color: #000000;
}

.custom_overlay p {
    color: #000;
    line-height: 1.4em;
}

/*------------------- TABLET ------------------*/
@media only screen and (min-width: 600px) and (max-width: 999px) {
    .custom_overlay h4 {
        font-size: 80%;
    }

    .custom_overlay p {
        font-size: 85%;
        line-height: 1.2em;
    }
}

/*------------------- MOBILE ------------------*/
@media only screen and (max-width: 599px) {
    .custom_overlay h4 {
        font-size: 100%;
    }

    .custom_overlay p {
        font-size: 100%;
    }
}
</style>
<!-- Popular services -->
<!-- Get Started -->
<section class="banner-bottom-w3layouts" id="get-started" style="background-image:url('<?= $talentData['image']?>');">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-7 col-sm-7 image-cont">
                <h4 class="text-white font-weight-bold"><?= $talentData['talentheading']; ?></h4>
                <a href="<?= $talentData['talentButtonLink']; ?>"
                    class="btn button-style mt-sm-5 mt-5"><?= $talentData['talentButtonLabel']; ?></a>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-5 image-content">
                <!-- <img src="<//?= $talentData['image']; ?>" class="img-fluid" alt="get started"> -->
            </div>
        </div>
    </div>
</section>
<div class="secspace"></div>
<!-- Get Started -->
<!-- Get Work Done -->
<section class="banner-bottom-w3layouts bg-gray py-5" id="get-work">
    <div class="container">
        <h3 class="title-w3 pt-3 mb-sm-5 mb-4 text-dark text-center font-weight-bold">
            <?= $workdoneData['MainHeading']; ?></h3>
        <div class="row py-3">
            <div class="col-lg-6">
                <h4><?= $workdoneData['SubHeading']; ?></h4>
                <div class="work-area">
                    <?= $workdoneData['description']; ?>
                </div>
                <div class="work-area">
                    <h5 class="work-heading">
                        <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                        <?= $workdoneData['workheadsubonehead']; ?>
                    </h5>
                    <p>
                        <?= $workdoneData['workheadsubonedesc']; ?>
                    </p>
                    <h5 class="work-heading">
                        <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                        <?= $workdoneData['workheadsubtwohead']; ?>
                    </h5>
                    <p>
                        <?= $workdoneData['workheadsubtwodesc']; ?>
                    </p>
                    <h5 class="work-heading">
                        <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                        <?= $workdoneData['workheadsubthreehead']; ?>
                    </h5>
                    <p>
                        <?= $workdoneData['workheadsubthreedesc']; ?>
                    </p>
                    <h5 class="work-heading">
                        <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                        <?= $workdoneData['workheadsubfourhead']; ?>
                    </h5>
                    <p>
                        <?= $workdoneData['workheadsubfourdesc']; ?>
                    </p>
                </div>
            </div>
            <div id="carousel1" class="col-lg-6 carousel slide pop carousel-fade" data-ride="carousel"
                data-interval="3000">
                <div class="carousel-inner">
                    <?php 
                  $count = 0;
                     $imgUrl=$workdoneData['image'];
                     $images=explode("|",$imgUrl);
                     foreach ($images as $image) {
                        if($image!=""){
                           $count++; ?>
                    <div class="carousel-item <?php if($count == 1){echo ' active';} ?>">
                        <div class="slide-box1">
                            <img src="<?=$image?>" alt="first slide">
                        </div>
                    </div>
                    <?php    }
                     }
               ?>
                    <!--<div class="carousel-item active">
                  <div class="slide-box1">
                     <img src="assets/images/g1.jpg" alt="first slide">
                  </div>
               </div>
               <div class="carousel-item">
                  <div class="slide-box1">
                     <img src="assets/images/g2.jpg" alt="second slide">
                  </div>
               </div>
               <div class="carousel-item">
                  <div class="slide-box1">
                     <img src="assets/images/g3.jpg" alt="third slide">
                  </div>
               </div>-->


                </div>
            </div>
        </div>
    </div>
</section>
<div class="secspace"></div>
<!-- Get Work Done -->
<!-- How it Works -->
<section class="join-w3l11 py-5" id="how-it-work">
    <div class="container">
        <h3 class="title-w3 pt-3 title-w3-3 mb-sm-3 mb-3 text-dark text-center font-weight-bold">
            <?= $howItWorksData['mainHeading']?></h3>
        <div class="row join-agile2 text-center pt-md-5 pt-4 mb-4">
            <div class="col-md-3 steps-reach-w3l" id="first" data-toggle="modal" data-target="#myModal1">
                <span>
                    <span class="fa fa-gift" aria-hidden="true"></span>
                    <p class="mt-3"><?= $howItWorksData['subHeading1']?></p>
                </span>
                <div class="style-agile-border">
                    <img src="assets/images/sty1.png" alt="" />
                </div>
            </div>
            <div class="col-md-3 steps-reach-w3l" id="second" data-toggle="modal" data-target="#myModal2">
                <span>
                    <span class="fa fa-check-square-o" aria-hidden="true"></span>
                    <p class="mt-3"><?= $howItWorksData['subHeading2']?></p>
                </span>
                <div class="style-agile-border">
                    <img src="assets/images/sty2.png" alt="" />
                </div>
            </div>
            <div class="col-md-3 steps-reach-w3l" id="third" data-toggle="modal" data-target="#myModal3">
                <span>
                    <span class="fa fa-volume-control-phone" aria-hidden="true"></span>
                    <p class="mt-3"><?= $howItWorksData['subHeading3']?></p>
                </span>
                <div class="style-agile-border second-border">
                    <img src="assets/images/sty1.png" alt="" />
                </div>
            </div>
            <div class="col-md-3 steps-reach-w3l" id="fourth" data-toggle="modal" data-target="#myModal4">
                <span>
                    <span class="fa fa-comments" aria-hidden="true"></span>
                    <p class="mt-3"><?= $howItWorksData['subHeading4']?></p>
                </span>
                <!-- <div class="style-agile-border">
               <img src="assets/images/sty2.png" alt="" />
            </div> -->
            </div>
            <!-- <div class="w-20 steps-reach-w3l" id="fifth" data-toggle="modal" data-target="#myModal5">
            <span>
               <span class="fa fa-calendar" aria-hidden="true"></span>
               <p class="mt-3">Join our MSME Community</p>
            </span>
         </div> -->
            <!-- The Modal 1 -->
            <div class="modal fade pt-md-0" id="myModal1" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="card-body bg-gray arrow-top div1">
                                <div class="blog-w3ls clps">
                                    <h4 class="title-w3 mb-sm-3 text-dark text-center font-weight-bold">
                                        <?= $howItWorksData['subContainerHeading1']?></h4>
                                    <p class="title-para text-center mx-auto mb-sm-3 mb-3">
                                        <?= $howItWorksData['subContainerDescription1']?>
                                    </p>
                                    <!-- <div class="row package-grids">
                              <div class="col-md-4 blog-w3">
                                 <div class="pcolumns">
                                    <ul class="price">
                                       <li class="header">Basic</li>
                                       <li class="grey">$ 9.99 / year</li>
                                       <li>10GB Storage</li>
                                       <li>10 Emails</li>
                                       <li>10 Domains</li>
                                       <li>1GB Bandwidth</li>
                                       <li class="grey"><a href="#" class="pbutton">Sign Up</a></li>
                                    </ul>
                                 </div>
                              </div>
                              <div class="col-md-4 blog-w3">
                                 <div class="pcolumns">
                                    <ul class="price">
                                       <li class="header" style="background-color:#8e43e7">Pro</li>
                                       <li class="grey">$ 24.99 / year</li>
                                       <li>25GB Storage</li>
                                       <li>25 Emails</li>
                                       <li>25 Domains</li>
                                       <li>2GB Bandwidth</li>
                                       <li class="grey"><a href="#" class="pbutton">Sign Up</a></li>
                                    </ul>
                                 </div>
                              </div>
                              <div class="col-md-4 blog-w3">
                                 <div class="pcolumns">
                                    <ul class="price">
                                       <li class="header">Premium</li>
                                       <li class="grey">$ 49.99 / year</li>
                                       <li>50GB Storage</li>
                                       <li>50 Emails</li>
                                       <li>50 Domains</li>
                                       <li>5GB Bandwidth</li>
                                       <li class="grey"><a href="#" class="pbutton">Sign Up</a></li>
                                    </ul>
                                 </div>
                              </div>
                           </div> -->
                                    <div class="col-md-12 card-body" style="padding: 0;">

                                        <ul class="nav nav-pills  col-12" id="pills-tab" role="tablist"
                                            style="background-color: #eee;padding-right:0;text-align: center;">
                                            <li class="nav-item col-md px-0">
                                                <a class="nav-link" id="pills-home-tab" data-toggle="pill"
                                                    href="#pills-home" role="tab" aria-controls="pills-home"
                                                    aria-selected="false">Standard</a>
                                            </li>
                                            <li class="nav-item col-md px-0">
                                                <a class="nav-link active" id="pills-profile-tab" data-toggle="pill"
                                                    href="#pills-profile" role="tab" aria-controls="pills-profile"
                                                    aria-selected="true">Pro</a>
                                            </li>

                                            <li class="nav-item col-md px-0">
                                                <a class="nav-link" id="pills-contact-tab" data-toggle="pill"
                                                    href="#pills-contact" role="tab" aria-controls="pills-contact"
                                                    aria-selected="false">Premium</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="pills-tabContent">
                                            <div class="tab-pane fade px-2" id="pills-home" role="tabpanel"
                                                aria-labelledby="pills-home-tab">
                                                <p class="d-inline-text d-flex pr-2">
                                                    <span class="flex-grow-1 ">Public Limited Company
                                                        Registration</span>
                                                    <span class="flex-grow-1 servi-pric-chng">
                                                        Rs. 13000
                                                        <br>
                                                        <span>
                                                            <strike style="color: #6610f2;" ;="">Rs. 15000</strike>
                                                            (13.33% OFF)
                                                        </span>
                                                    </span>
                                                </p>
                                                <span>
                                                    <ul class="px-4 py-2 income_points">
                                                        <li>1 DSCs Included
                                                        </li>
                                                        <li>2 DINs Included
                                                        </li>
                                                        <li><b>5 Paid Up Capital Limit in Lakhs</b>
                                                        </li>
                                                        <li><b>Issue of Incorporation Certificate, EMOA, EAOA</b>
                                                        </li>
                                                        <li><i>PAN &amp; TAN Included</i>
                                                        </li>
                                                        <li>Name in Run Form Approval
                                                        </li>
                                                        <li>Filing of ESpice Form
                                                        </li>
                                                        <li>2 No. of Directors / Partners
                                                        </li>
                                                        <li>Does not include : Accounting and Auditing, Preperation of
                                                            Financial Statements</li>
                                                    </ul>
                                                </span>
                                            </div>

                                            <div class="tab-pane fade px-2 active show" id="pills-profile"
                                                role="tabpanel" aria-labelledby="pills-profile-tab">
                                                <p class="d-flex pr-2">
                                                    <span class="flex-grow-1">Public Limited Company Registration</span>
                                                    <span class="flex-grow-1 servi-pric-chng">
                                                        Rs. 12500 <br>
                                                        <span>
                                                            <strike style="color: #6610f2;" ;="">Rs. 20000</strike>
                                                            (37.5% OFF)
                                                        </span>
                                                    </span>

                                                </p>
                                                <span>
                                                    <ul class="px-4 py-2 income_points">
                                                        <li>1 DSCs Included
                                                        </li>
                                                        <li>2 DINs Included
                                                        </li>
                                                        <li>5 Paid Up Capital Limit in Lakhs
                                                        </li>
                                                        <li>Issue of Incorporation Certificate, EMOA, EAOA
                                                        </li>
                                                        <li>PAN &amp; TAN Included
                                                        </li>
                                                        <li>Name in Run Form Approval
                                                        </li>
                                                        <li>Filing of ESpice Form
                                                        </li>
                                                        <li>2 No. of Directors / Partners
                                                        </li>
                                                        <li>Does not include : Accounting and Auditing, Preperation of
                                                            Financial Statements
                                                        </li>
                                                        <li><b>xyz</b></li>
                                                    </ul>
                                                </span>
                                            </div>
                                            <div class="tab-pane fade px-2" id="pills-contact" role="tabpanel"
                                                aria-labelledby="pills-contact-tab">
                                                <p class="d-flex pr-2"><span class="flex-grow-1"> Public Limited Company
                                                        Registration</span>
                                                    <span class="flex-grow-1 servi-pric-chng">
                                                        Rs. 10000 <br>
                                                        <span>
                                                            <strike style="color: #6610f2;" ;="">Rs. 20000</strike>
                                                            (50% OFF)
                                                        </span>
                                                    </span>
                                                </p>
                                                <span>
                                                    <ul class="px-4 py-2 income_points">
                                                        <li>
                                                            1 DSCs Included
                                                        </li>
                                                        <li>
                                                            2 DINs Included
                                                        </li>
                                                        <li>
                                                            5 Paid Up Capital Limit in Lakhs
                                                        </li>
                                                        <li>
                                                            Issue of Incorporation Certificate, EMOA, EAOA
                                                        </li>
                                                        <li>
                                                            PAN &amp; TAN Included
                                                        </li>
                                                        <li>
                                                            Name in Run Form Approval
                                                        </li>
                                                        <li>
                                                            Filing of ESpice Form
                                                        </li>
                                                        <li>
                                                            2 No. of Directors / Partners
                                                        </li>
                                                        <li>
                                                            Does not include : Accounting and Auditing, Preperation of
                                                            Financial Statements
                                                        </li>
                                                        <li>
                                                            assdsadak dkfdsfs
                                                        </li>
                                                        <li>
                                                            <b>fddf fsdfdfsd fsdfs
                                                            </b>
                                                        </li>
                                                    </ul>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>
            <!-- The Modal 1 -->
            <!-- The Modal 2 -->
            <div class="modal fade" id="myModal2" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="card-body bg-gray arrow-top1 div2">
                                <div class="blog-w3ls clps py-3">
                                    <h4 class="title-w3 mb-sm-5 mb-4 text-dark text-center font-weight-bold">
                                        <?= $howItWorksData['subContainerHeading2']?></h4>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <img class="img-fluid" src="<?= $howItWorksData['subheading2img']?>"
                                                alt="communication">
                                        </div>
                                        <div class="col-lg-6">
                                            <p class="text-left"><?= $howItWorksData['subContainerDescription2']?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>
            <!-- The Modal 2 -->
            <!-- The Modal 3 -->
            <div class="modal fade" id="myModal3" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="card-body bg-gray arrow-top2 div3">
                                <div class="blog-w3ls clps py-3">
                                    <h3 class="title-w3 mb-sm-5 mb-4 text-dark text-center font-weight-bold">
                                        <?= $howItWorksData['subContainerHeading3']?></h3>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <p class="text-left"><?= $howItWorksData['subContainerDescription3']?></p>
                                        </div>
                                        <div class="col-lg-6">
                                            <img class="img-fluid" src="<?= $howItWorksData['subheading3img']?>"
                                                alt="milestone">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>
            <!-- The Modal 3 -->
            <!-- The Modal 4 -->
            <div class="modal fade" id="myModal4" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="card-body bg-gray arrow-top3 div4">
                                <div class="blog-w3ls clps py-3">
                                    <h3 class="title-w3 mb-sm-5 mb-4 text-dark text-center font-weight-bold">
                                        <?= $howItWorksData['subContainerHeading4']?></h3>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <img class="img-fluid" src="<?= $howItWorksData['subheading4img']?>"
                                                alt="msme">
                                        </div>
                                        <div class="col-lg-6 text-left">
                                            <p class="text-left"><?= $howItWorksData['subContainerDescription4']?></p>
                                            <h5 class="font-weight-bold py-3">Join Now</h5>
                                            <!--<form name="" action="" class="form-horizontal" method="post">-->
                                            <?= $this->Form->create(); ?>
                                            <input name="newsletter_email" id="howItWorks_newsletter_email"
                                                class="form-control hastip" placeholder="Enter your e-mail address">
                                            <a class="btn button-style mt-sm-4 mt-4 howItWorksNewsletter"
                                                id="howItWorksNewsletter">Subscribe</a>
                                            <?= $this->Form->end(); ?>
                                            <span class="howItWorks_newsletter-form-respone"></span>
                                            <!-- Begin Mailchimp Signup Form
                                 <link href="//cdn-images.mailchimp.com/embedcode/horizontal-slim-10_7.css" rel="stylesheet" type="text/css">
                                 <style type="text/css">
                                    #mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; width:100%;}
                                    /* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
                                       We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
                                 </style>
                                 <div id="mc_embed_signup">
                                 <form action="https://easifyy.us1.list-manage.com/subscribe/post?u=32afee2d99f80eea8d5a7d889&amp;id=25d0851c82" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                                    <div id="mc_embed_signup_scroll">
                                    <label for="mce-EMAIL">Subscribe</label>
                                    <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>
                                    real people should not fill this in and expect good things - do not remove this or risk form bot signups
                                    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_32afee2d99f80eea8d5a7d889_25d0851c82" tabindex="-1" value=""></div>
                                    <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
                                    </div>
                                 </form>
                                 </div>

                                 End mc_embed_signup-->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer" role="dialog">
                        </div>
                    </div>
                </div>
            </div>
            <!-- The Modal 4 -->
            <!-- The Modal 5 -->
            <div class="modal fade" id="myModal5">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="card-body bg-gray arrow-top4 div5">
                                <div class="blog-w3ls clps py-3">
                                    <h3 class="title-w3 mb-sm-5 mb-4 text-dark text-center font-weight-bold">Join our
                                        MSME Community</h3>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <img class="img-fluid" src="assets/images/msme-img.png" alt="msme">
                                        </div>
                                        <div class="col-lg-6 text-left">
                                            <p class="text-left">Book Services, Ask Free Questions, share knowledge with
                                                Verified Experts.</p>
                                            <h5 class="font-weight-bold py-3">Join Now</h5>
                                            <form name="" action="" class="form-horizontal" method="post">
                                                <input name="newsletter_email" class="form-control hastip"
                                                    placeholder="Enter your e-mail address">
                                                <button type="submit" name="submit"
                                                    class="btn button-style mt-sm-4 mt-4">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>
            <!-- The Modal 5 -->
        </div>
    </div>
</section>
<div class="secspace"></div>
<!-- How it Works -->

<!-- testimonials -->
<section class="testimonials text-center py-5" id="testi"
    style="background-image: url('<?= $affiliateData['image']; ?>')">
    <div class="container">
        <h3 class="title-w3 pt-3 mb-3 text-white text-center font-weight-bold"><?= $affiliateData['MainHeading']; ?>
        </h3>
        <div class="text-center">
            <h4 class="mx-auto mt-2 text-light"><?= $affiliateData['SubHeading']; ?></h4>
            <a href="#" class="btn button-style mt-sm-4 mt-4 mb-4 mx-auto"><?= $affiliateData['description']; ?></a>
        </div>
    </div>
</section>
<div class="secspace"></div>
<!-- //testimonials -->

<!-- blog -->
<section class="blog-w3ls py-5 bg-light" id="blog">
    <div class="container">
        <h3 class="title-w3 pt-3 mb-sm-5 mb-5 text-dark text-center font-weight-bold">Our Blog</h3>
        <div class="f-rt f-rt1">
            <a href="blogs" class="button-style1">See More Blogs <i class='fa fa-angle-right'></i></a>
        </div>
        <div class="row package-grids">
            <?php foreach ($ourBlogs as $ourBlog): ?>
            <div class="col-md-4  blog-w3">
                <div class="blogs-top">
                    <a href="<?= BASE_URL; ?>blogs/<?= $ourBlog['slug']; ?>">
                        <img src="<?= BASE_URL; ?>/img/blogs/<?= $ourBlog['image']; ?>" alt="blog1" class="img-fluid" />
                    </a>
                </div>
                <div class="blogs-bottom p-2 bg-white">
                    <h4 class="text-dark"><?php echo $ourBlog['title'];?> <a
                            href="<?= BASE_URL; ?>blogs/<?= $ourBlog['slug']; ?>"></a></h4>
                    <a>Posted by Easifyy</a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<div class="secspace"></div>
<!-- Popular services -->
<!-- //blog -->