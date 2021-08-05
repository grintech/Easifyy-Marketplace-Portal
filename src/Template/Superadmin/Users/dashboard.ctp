 <style>
.d-report-panel {
    margin-top: 5px;
    margin-bottom: 20px;
    border-radius: 4px;
    min-height: 100px;
    box-shadow: 0 2px 5px 1px rgba(174, 170, 170, .5);
    background-color: #fff;
}
.page-footer.footer.footer-static.footer-light.navbar-border.navbar-shadow {
	display: none;
}
.d-report-panel .panel-body {
    padding: 10px 12px;
}

.d-report-panel .heading-md {
    padding-bottom: 2px;
}

.heading-md {
    color: #000;
    font-size: 18px;
    text-align: center;
}

.d-report-panel .text-number {
    margin-top: 20px;
    font-size: 24px;
}

.text-number {
    color: #8e43e7;
    font-weight: 700;
}

.preview-images-zone {
    width: 100%;
    border: 1px solid #ddd;
    min-height: 180px;
    /* display: flex; */
    padding: 5px 5px 0px 5px;
    position: relative;
    overflow:auto;
}
.preview-images-zone > .preview-image:first-child {
    height: 185px;
    width: 185px;
    position: relative;
    margin-right: 5px;
}
.preview-images-zone > .preview-image {
    height: 90px;
    width: 90px;
    position: relative;
    margin-right: 5px;
    float: left;
    margin-bottom: 5px;
}
.preview-images-zone > .preview-image > .image-zone {
    width: 100%;
    height: 100%;
}
.preview-images-zone > .preview-image > .image-zone > img {
    width: 100%;
    height: 100%;
}
.preview-images-zone > .preview-image > .tools-edit-image {
    position: absolute;
    z-index: 100;
    color: #fff;
    bottom: 0;
    width: 100%;
    text-align: center;
    margin-bottom: 10px;
    display: none;
}
.preview-images-zone > .preview-image > .image-cancel {
    font-size: 18px;
    position: absolute;
    top: 0;
    right: 0;
    font-weight: bold;
    margin-right: 10px;
    cursor: pointer;
    display: none;
    z-index: 100;
}
.preview-image:hover > .image-zone {
    cursor: move;
    opacity: .5;
}
.preview-image:hover > .tools-edit-image,
.preview-image:hover > .image-cancel {
    display: block;
}
.ui-sortable-helper {
    width: 90px !important;
    height: 90px !important;
}
 </style>
    
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <div class="row" style="height: 86vh;">
     <div class="col s12">
         <div class="container">
             <!--card stats start-->
             <div id="card-stats">
                 <div class="row">
                     <div class="col-sm-3 col-xs-6">
                         <a href="<?php echo BASE_URL; ?>superadmin/users">
                             <div class="panel panel-default d-report-panel"
                                 style="border-top: 4px solid rgb(142 67 231); border-bottom: 4px solid #8e43e7;">
                                 <div class="panel-body">
                                     <h4 class="heading-md">Customers</h4>
                                     <h4 class="text-number text-center"><?php echo $user_total; ?></h4>
                                 </div>
                             </div>
                         </a>
                     </div>
                     <div class="col-sm-3 col-xs-6">
                         <a href="<?php echo BASE_URL; ?>superadmin/merchants">
                             <div class="panel panel-default d-report-panel"
                                 style="border-top: 4px solid rgb(142 67 231); border-bottom: 4px solid #8e43e7;">
                                 <div class="panel-body">
                                     <h4 class="heading-md">PSP</h4>
                                     <h4 class="text-number text-center"><?php echo $vendor_total; ?></h4>
                                 </div>
                             </div>
                         </a>
                     </div>
                     <div class="col-sm-3 col-xs-6">
                         <a href="<?php echo BASE_URL; ?>superadmin/orders">
                             <div class="panel panel-default d-report-panel"
                                 style="border-top: 4px solid rgb(142 67 231); border-bottom: 4px solid #8e43e7;">
                                 <div class="panel-body">
                                     <h4 class="heading-md">Total Orders</h4>
                                     <h4 class="text-number text-center"><?php echo $order_total; ?></h4>
                                 </div>
                             </div>
                         </a>
                     </div>
                     <div class="col-sm-3 col-xs-6">
                        <a href="<?php echo BASE_URL; ?>superadmin/orders"> 
                            <div class="panel panel-default d-report-panel"
                                style="border-top: 4px solid rgb(142 67 231); border-bottom: 4px solid #8e43e7;">
                                <div class="panel-body">
                                    <h4 class="heading-md">PSP Payment Reqeusts</h4>
                                    <h4 class="text-number text-center"><?= $OrderNotifications; ?></h4>
                                </div>
                            </div>
                        </a> 
                     </div>
                     <div class="col-sm-3 col-xs-6">
                        <a href="<?php echo BASE_URL; ?>superadmin/orders"> 
                            <div class="panel panel-default d-report-panel"
                                style="border-top: 4px solid rgb(142 67 231); border-bottom: 4px solid #8e43e7;">
                                <div class="panel-body">
                                    <h4 class="heading-md">Processing Orders</h4>
                                    <h4 class="text-number text-center"><?=$processingOrders?></h4>
                                </div>
                            </div>
                        </a>
                     </div>
                     <div class="col-sm-3 col-xs-6">
                        <a href="<?php echo BASE_URL; ?>superadmin/orders"> 
                            <div class="panel panel-default d-report-panel"
                             style="border-top: 4px solid rgb(142 67 231); border-bottom: 4px solid #8e43e7;">
                             <div class="panel-body">
                                 <h4 class="heading-md">In Progress Orders</h4>
                                 <h4 class="text-number text-center"><?=$ongoingOrders?></h4>
                             </div>
                            </div>
                        </a>
                     </div>
                     <div class="col-sm-3 col-xs-6">
                        <a href="<?php echo BASE_URL; ?>superadmin/orders"> 
                         <div class="panel panel-default d-report-panel"
                             style="border-top: 4px solid rgb(142 67 231); border-bottom: 4px solid #8e43e7;">
                             <div class="panel-body">
                                 <h4 class="heading-md">Refunded Orders</h4>
                                 <h4 class="text-number text-center"><?=$refundedOrders?></h4>
                             </div>
                         </div>
                        </a>
                     </div>
                     <div class="col-sm-3 col-xs-6">
                        <a href="<?php echo BASE_URL; ?>superadmin/orders"> 
                         <div class="panel panel-default d-report-panel"
                             style="border-top: 4px solid rgb(142 67 231); border-bottom: 4px solid #8e43e7;">
                             <div class="panel-body">
                                 <h4 class="heading-md">Cancelled Orders</h4>
                                 <h4 class="text-number text-center"><?=$cancelOrders?></h4>
                             </div>
                         </div>
                        </a>
                     </div>
                     <div class="col-sm-3 col-xs-6">
                        <a href="<?php echo BASE_URL; ?>superadmin/orders"> 
                         <div class="panel panel-default d-report-panel"
                             style="border-top: 4px solid rgb(142 67 231); border-bottom: 4px solid #8e43e7;">
                             <div class="panel-body">
                                 <h4 class="heading-md">Completed Orders</h4>
                                 <h4 class="text-number text-center"><?=$completedOrders?></h4>
                             </div>
                         </div>
                        </a>
                     </div>
                     <div class="col-sm-3 col-xs-6">
                        <a href="<?php echo BASE_URL; ?>superadmin/orders"> 
                         <div class="panel panel-default d-report-panel"
                             style="border-top: 4px solid rgb(142 67 231); border-bottom: 4px solid #8e43e7;">
                             <div class="panel-body">
                                 <h4 class="heading-md">Order Amount</h4>
                                 <h4 class="text-number text-center">₹<?=$totalPaymentRecieved?></h4>
                             </div>
                         </div>
                        </a>
                     </div>
                     <div class="col-sm-3 col-xs-6">
                        <a href="<?php echo BASE_URL; ?>superadmin/orders"> 
                         <div class="panel panel-default d-report-panel"
                             style="border-top: 4px solid rgb(142 67 231); border-bottom: 4px solid #8e43e7;">
                             <div class="panel-body">
                                 <h4 class="heading-md">Cancelled Amount</h4>
                                 <h4 class="text-number text-center">₹<?=$ctotalPaymentRecieved?></h4>
                             </div>
                         </div>
                        </a>
                     </div>
                     <div class="col-sm-3 col-xs-6">
                        <a href="<?php echo BASE_URL; ?>superadmin/orders"> 
                         <div class="panel panel-default d-report-panel"
                             style="border-top: 4px solid rgb(142 67 231); border-bottom: 4px solid #8e43e7;">
                             <div class="panel-body">
                                 <h4 class="heading-md">Refunded Amount</h4>
                                 <h4 class="text-number text-center">₹<?=$rtotalPaymentRecieved?></h4>
                             </div>
                         </div>
                        </a>
                     </div>
                     <!-- <div class="col-md-3">
                         <div class="panel panel-default d-report-panel"
                             style="border-top: 4px solid rgb(142 67 231); border-bottom: 4px solid #8e43e7;">
                             <div class="panel-body">
                                 <h4 class="heading-md">Tot Payment Rec.-2021</h4>
                                 <h4 class="text-number text-center">Rs. <?=$totalPaymentRecieved?></h4>
                             </div>
                         </div>
                     </div> -->
                     <?php $fee_to_psp=$fee_to_kisten=0; foreach($orderfinal as $orders): ?>
                                <?php
                                    $fee_to_psp= $fee_to_psp + $orders->fee_to_psp; 
                                    $fee_to_kisten= $fee_to_kisten + $orders->fee_to_kisten;
                                ?>
                            <?php endforeach; ?>
                     <div class="col-md-3">
                         <div class="panel panel-default d-report-panel"
                             style="border-top: 4px solid rgb(142 67 231); border-bottom: 4px solid #8e43e7;">
                             <div class="panel-body">
                                 <h4 class="heading-md">PSP Payments</h4>
                                 <h4 class="text-number text-center">₹<?=$fee_to_psp?></h4>
                             </div>
                         </div>
                     </div>

                     <div class="col-md-3">
                         <div class="panel panel-default d-report-panel"
                             style="border-top: 4px solid rgb(142 67 231); border-bottom: 4px solid #8e43e7;">
                             <div class="panel-body">
                                 <h4 class="heading-md">Total Profit</h4>
                                 <h4 class="text-number text-center">₹<?=$fee_to_kisten?></h4>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <!--card stats end-->
            <div class="card" style="width: 100%;">
                <div class="card-body">
                    <form name="homePageBanner" class="homePageBanner" id="homePageBanner"  method="post" enctype="multipart/form-data">
                        <h4 class="text-danger">Upload Banner Images</h4>
                        <div class="form-group hide">
                            <label><b>Banner Heading Text</b></label>
                            <input type="text" class="form-control" id="bannerHeading" name="bannerHeading" value="<?= $bannerData['heading']; ?>"/>
                        </div>
                        <div class="form-group hide">
                            <label><b>Banner Description</b></label>
                            <textarea class="form-control" id="bannerDescription" name="bannerDescription"><?= $bannerData['description']; ?></textarea>
                        </div>
                        <!--<div class="form-group">
                            <label><b>Banner Image</b></label>
                            <input type="file" class="form-control" id="bannerImage" name="bannerImage" /> 
                            <input type="file" id="file" name="file" class="form-control"/>
                            <div class='preview'>
                                <img src="<?= $bannerData['image']; ?>" id="img" width="100" height="100">
                            </div>
                        </div>-->
                        <div class="form-group">
                            <label><b>Main Banner Slider Images</b></label>
                            <input type="file" id="bannerfile" name="file" class="form-control" multiple/>
                            <input type="text" id="bannerfileImages" name="bannerfileImages" hidden value="<?= $bannerData['image']; ?>" class="getworkdonefileImages">
                            <div class='banner-preview row'>
                                <?php 
                                    $imgUrl=$bannerData['image'];
                                    $images=explode("|",$imgUrl);
                                    foreach ($images as $image) {
                                        if($image!=""){?>
                                    <div class ="col-md-3" ><span class="row justify-content-center"><i class="fa fa-close removeMainBannerFile" imgURl="<?=$image?>"></i></span><img src="<?=$image?>" id="sub-heading-2-img" width="100" height="100"></div>
                                <?php    }
                                    }
                                ?>
                            </div>
                        </div>
                    </form>
                    <div class="form-group">
                            <button class="btn btn-success savehomebanner">Save</button>
                        </div>
                </div>
            </div>

            <!--card stats end-->
            <div class="card" style="width: 100%; display: none !important;">
                <div class="card-body">
                    <script src="https://cdn.ckeditor.com/4.16.0/standard-all/ckeditor.js"></script>
                    <form name="homePageBanner" class="homePageBanner" id="homePageBanner"  method="post" enctype="multipart/form-data">
                        <h4 class="text-danger">Home Page Sections</h4>
                        <div class="form-group">
                            <textarea cols="80" id="editor1" name="editor1" rows="10" data-sample-short><?php echo $home_page_sectionsData; ?></textarea>
                        </div>
                    </form>
                    <script>
                        CKEDITOR.replace('editor1', {
                          //width: '70%',
                          //height: 500
                        });
                      </script>
                    <div class="form-group">
                            <button class="btn btn-success savehomesections">Save</button>
                        </div>
                </div>
            </div>

            <div class="card" style="width: 100%;">
                <div class="card-body">
                    <form name="homePageBanner" class="homePageBanner" id="homePageBanner"  method="post" enctype="multipart/form-data">
                        <h4 class="text-danger">Find the talent needed</h4>
                        <div class="form-group hide">
                            <label><b>Heading</b></label>
                            <input type="text" class="form-control" id="talentHeading" name="talentHeading" value="<?= $talentData['talentheading']; ?>"/>
                        </div>
                        <div class="form-group">
                            <label><b>Button Label</b></label>
                            <input type="text" class="form-control" id="talentButtonLabel" name="talentButtonLabel" value="<?= $talentData['talentButtonLabel']; ?>"/>
                        </div>
                        <div class="form-group">
                            <label><b>Button Link</b></label>
                            <input type="text" class="form-control" id="talentButtonLink" name="talentButtonLink" value="<?= $talentData['talentButtonLink']; ?>"/>
                        </div>
                        
                        <div class="form-group">
                            <label><b>Section Image</b></label>
                            <input type="file" id="talentfile" name="file" class="form-control"/>
                            <div class='talentpreview'>
                                <img src="<?= $talentData['image']; ?>" id="talentimg" width="100" height="100" >
                            </div>
                        </div>
                    </form>
                    <div class="form-group">
                        <button class="btn btn-success savetalent">Save</button>
                    </div>
                </div>
            </div>

            <div class="card" style="width: 100%;">
                <div class="card-body">
                    <form name="homePageBanner" class="homePageBanner" id="homePageBanner"  method="post" enctype="multipart/form-data">
                        <h4 class="text-danger">Get work done</h4>
                        <div class="form-group">
                            <label><b>Section Main Heading</b></label>
                            <input type="text" class="form-control" id="workdoneMainHeading" name="workdoneMainHeading" value="<?= $workdoneData['MainHeading']; ?>"/>
                        </div>
                        <div class="form-group">
                            <label><b>Section Sub Heading</b></label>
                            <input type="text" class="form-control" id="workdoneSubHeading" name="workdoneSubHeading" value="<?= $workdoneData['SubHeading']; ?>"/>
                        </div>
                        
                        <div class="form-group">
                            <input type="text" class="form-control" id="workheadsubonehead" name="workheadsubonehead" placeholder="Enter First heading" value="<?= $workdoneData['workheadsubonehead']; ?>"/>
                            <input type="text" class="form-control" id="workheadsubonedesc" name="workheadsubonedesc" placeholder="Enter First Description" value="<?= $workdoneData['workheadsubonedesc']; ?>"/>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" id="workheadsubtwohead" name="workheadsubtwohead" placeholder="Enter Second heading" value="<?= $workdoneData['workheadsubtwohead']; ?>"/>
                            <input type="text" class="form-control" id="workheadsubtwodesc" name="workheadsubtwodesc" placeholder="Enter Second Description" value="<?= $workdoneData['workheadsubtwodesc']; ?>"/>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" id="workheadsubthreehead" name="workheadsubthreehead" placeholder="Enter Third heading" placeholder="" value="<?= $workdoneData['workheadsubthreehead']; ?>"/>
                            <input type="text" class="form-control" id="workheadsubthreedesc" name="workheadsubthreedesc" placeholder="Enter Third Description" value="<?= $workdoneData['workheadsubthreedesc']; ?>"/>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" id="workheadsubfourhead" name="workheadsubfourhead" placeholder="Enter Fourth heading" placeholder="" value="<?= $workdoneData['workheadsubfourhead']; ?>"/>
                            <input type="text" class="form-control" id="workheadsubfourdesc" name="workheadsubfourdesc" placeholder="Enter Fourth Description" value="<?= $workdoneData['workheadsubfourdesc']; ?>"/>
                        </div>

                        
                        <!-- <div class="form-group">
                            <label><b>Description</b></label>
                            <textarea class="form-control" rows="5" id="workdonedescription"><?= $workdoneData['description']; ?></textarea>
                        </div> -->

                        <div class="form-group">
                            <label><b>Slider Images</b></label>
                            <input type="file" id="workdonefile" name="file" class="form-control" multiple/>
                            <input type="text" id="getworkdonefileImages" name="getworkdonefileImages" hidden value="<?= $workdoneData['image']; ?>" class="getworkdonefileImages">
                            <div class='workdone-preview row'>
                                <?php 
                                    $imgUrl=$workdoneData['image'];
                                    $images=explode("|",$imgUrl);
                                    foreach ($images as $image) {
                                        if($image!=""){?>
                                    <div class ="col-md-3" ><span class="row justify-content-center"><i class="fa fa-close removebannerFile" imgURl="<?=$image?>"></i></span><img src="<?=$image?>" id="sub-heading-2-img" width="100" height="100"></div>
                                <?php    }
                                    }
                                ?>
                            </div>
                        </div>
                        
                    </form>
                    <div class="form-group">
                        <button class="btn btn-success saveworkdone">Save</button>
                    </div>
                </div>
            </div>

            <div class="card" style="width: 100%;">
                <div class="card-body">
                    <form name="homePageBanner" class="homePageBanner" id="homePageBanner"  method="post" enctype="multipart/form-data">
                        <h4 class="text-danger">How it works  Section</h4>
                        <div class="form-group">
                            <label><b>Main Heading</b></label>
                            <input type="text" class="form-control" id="mainHeading" name="mainHeading" value="<?= $howItWorks['mainHeading']; ?>"/>
                        </div>

                        <div class="sub-heading-1-container">
                            <div class="form-group">
                                <label><b>Sub-Heading 1</b></label>
                                <input type="text" class="form-control" id="subHeading1" name="subHeading1" value="<?= $howItWorks['subHeading1']; ?>"/>
                            </div>
                            <div class="form-group pl-5">
                                <label><b>Sub-Heading 1 Container Heading</b></label>
                                <input type="text" class="form-control" id="subContainerHeading1" name="subContainerHeading1" value="<?= $howItWorks['subContainerHeading1']; ?>"/>
                            </div>
                            <div class="form-group pl-5">
                                <label><b>Sub-Heading 1 Container Description</b></label>
                                <input type="text" class="form-control" id="subContainerDescription1" name="subContainerDescription1" value="<?= $howItWorks['subContainerDescription1']; ?>"/>
                            </div>
                        </div>

                        <div class="sub-heading-2-container">
                            <div class="form-group">
                                <label><b>Sub-Heading 2</b></label>
                                <input type="text" class="form-control" id="subHeading2" name="subHeading2" value="<?= $howItWorks['subHeading2']; ?>"/>
                            </div>
                            <div class="form-group pl-5">
                                <label><b>Sub-Heading 2 Container Heading</b></label>
                                <input type="text" class="form-control" id="subContainerHeading2" name="subContainerHeading2" value="<?= $howItWorks['subContainerHeading2']; ?>"/>
                            </div>
                            <div class="form-group pl-5">
                                <label><b>Sub-Heading 2 Container Description</b></label>
                                <input type="text" class="form-control" id="subContainerDescription2" name="subContainerDescription2" value="<?= $howItWorks['subContainerDescription2']; ?>"/>
                            </div>
                            <div class="form-group pl-5">
                                <label><b>Sub-Heading 2 Container Image</b></label>
                                <input type="text" name="fileName" hidden value="<?= $howItWorks['subheading2img']; ?>" class="sub-heading-2-img">
                                <input type="file" id="sub-heading-2-file" previewImg="sub-heading-2-img" name="file" class="form-control sub-heading-file-upload" multiple/>
                                <div class='affilate-preview'>
                                    <img src="<?= $howItWorks['subheading2img']; ?>" id="sub-heading-2-img" width="100" height="100" >
                                </div>
                            </div>
                        </div>

                        <div class="sub-heading-2-container">
                            <div class="form-group">
                                <label><b>Sub-Heading 3</b></label>
                                <input type="text" class="form-control" id="subHeading3" name="subHeading3" value="<?= $howItWorks['subHeading3']; ?>"/>
                            </div>
                            <div class="form-group pl-5">
                                <label><b>Sub-Heading 3 Container Heading</b></label>
                                <input type="text" class="form-control" id="subContainerHeading3" name="subContainerHeading3" value="<?= $howItWorks['subContainerHeading3']; ?>"/>
                            </div>
                            <div class="form-group pl-5">
                                <label><b>Sub-Heading 3 Container Description</b></label>
                                <input type="text" class="form-control" id="subContainerDescription3" name="subContainerDescription3" value="<?= $howItWorks['subContainerDescription3']; ?>"/>
                            </div>
                            <div class="form-group pl-5">
                                <label><b>Sub-Heading 3 Container Image</b></label>
                                <input type="text" name="fileName" hidden value="<?= $howItWorks['subheading3img']; ?>" class="sub-heading-3-img">
                                <input type="file" id="sub-heading-3-file" previewImg="sub-heading-3-img" name="file" class="form-control sub-heading-file-upload" multiple/>
                                <div class='affilate-preview'>
                                    <img src="<?= $howItWorks['subheading3img']; ?>" id="sub-heading-3-img" width="100" height="100" >
                                </div>
                            </div>
                        </div>

                        <div class="sub-heading-2-container">
                            <div class="form-group">
                                <label><b>Sub-Heading 4</b></label>
                                <input type="text" class="form-control" id="subHeading4" name="subHeading4" value="<?= $howItWorks['subHeading4']; ?>"/>
                            </div>
                            <div class="form-group pl-5">
                                <label><b>Sub-Heading 4 Container Heading</b></label>
                                <input type="text" class="form-control" id="subContainerHeading4" name="subContainerHeading4" value="<?= $howItWorks['subContainerHeading4']; ?>"/>
                            </div>
                            <div class="form-group pl-5">
                                <label><b>Sub-Heading 4 Container Description</b></label>
                                <input type="text" class="form-control" id="subContainerDescription4" name="subContainerDescription4" value="<?= $howItWorks['subContainerDescription4']; ?>"/>
                            </div>
                            <div class="form-group pl-5">
                                <label><b>Sub-Heading 4 Container Image</b></label>
                                <input type="text" name="fileName" hidden value="<?= $howItWorks['subheading4img']; ?>" class="sub-heading-4-img">
                                <input type="file" id="sub-heading-4-file" previewImg="sub-heading-4-img"  name="file" class="form-control sub-heading-file-upload" multiple/>
                                <div class='affilate-preview'>
                                    <img src="<?= $howItWorks['subheading4img']; ?>" id="sub-heading-4-img" width="100" height="100" >
                                </div>
                            </div>
                        </div>
                        <!--<div class="form-group">
                            <label><b>Affiliate Image</b></label>
                            <input type="text" name="fileName" hidden value="<?= $affiliateData['image']; ?>" class="file-name">
                            <input type="file" id="affilatefile" name="file" class="form-control" multiple/>
                            <div class='affilate-preview'>
                                <img src="<?= $affiliateData['image']; ?>" id="affliateImg" width="100" height="100" >
                            </div>
                        </div>-->
                    </form>
                    <div class="form-group">
                        <button class="btn btn-success howItWorksData">Save</button>
                    </div>
                </div>
            </div>

            <div class="card" style="width: 100%;">
                <div class="card-body">
                    <form name="homePageBanner" class="homePageBanner" id="homePageBanner"  method="post" enctype="multipart/form-data">
                        <h4 class="text-danger">Affiliate  Section</h4>
                        <div class="form-group">
                            <label><b>Affiliate Heading</b></label>
                            <input type="text" class="form-control" id="affilateHeading" name="affilateHeading" value="<?= $affiliateData['MainHeading']; ?>"/>
                        </div>
                        <div class="form-group">
                            <label><b>Affiliate Tag Line</b></label>
                            <input type="text" class="form-control" id="affilateTagLine" name="affilateTagLine" value="<?= $affiliateData['SubHeading']; ?>"/>
                        </div>
                        <div class="form-group">
                            <label><b>Affiliate Button Label</b></label>
                            <input type="text" class="form-control" id="affilateButtonLabel" name="affilateTagLine" value="<?= $affiliateData['description']; ?>"/>
                        </div>
                        <div class="form-group">
                            <label><b>Affiliate Image</b></label>
                            <input type="text" name="fileName" hidden value="<?= $affiliateData['image']; ?>" class="file-name">
                            <input type="file" id="affilatefile" name="file" class="form-control" multiple/>
                            <div class='affilate-preview'>
                                <img src="<?= $affiliateData['image']; ?>" id="affliateImg" width="100" height="100" >
                            </div>
                        </div>
                    </form>
                    <div class="form-group">
                        <button class="btn btn-success affiliateData">Save</button>
                    </div>
                </div>
            </div>
         </div>
     </div>
    
