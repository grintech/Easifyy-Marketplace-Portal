<?php
    /**
     * @var \App\View\AppView $this
     * @var \App\Model\Entity\Product[]|\Cake\Collection\CollectionInterface $products
     */
    if($loggedIn){
        $mymodal='';
        $myUrl='../order/'.($service[0]->id);
        $myUrlBas='onclick="location.href='."'".$myUrl."/1'".'"';
        $myUrlStd='onclick="location.href='."'".$myUrl."/2'".'"';
        $myUrlPre='onclick="location.href='."'".$myUrl."/3'".'"';

    }else{
        $mymodal='data-toggle="modal" data-target="#modalSignup" ';
        $myUrlBas='';$myUrlStd='';$myUrlPre='';
    }
?>

<style type="text/css">
    .income_points li::before{
    content: "✓";
    color: rgb(57, 206, 130);
    font-size: 16px;
    margin: 5px;
    }
    .income_points li{
    list-style: none;
    }
    .income_points{
    padding-left: 0px !important;
    }
    .flex-grow-1{
    font-weight: 700;
    }
    .card-body{
    border:1px solid #eee;
    margin-top: 10px;
    }
    .add{
    border:1px solid #fff;
    background-color: #fff;
    font-weight: 600;
    width: 0px;
    color:#979797;
    }
    .add:hover , .sub:hover{
    color: #000;
    }
    .add:focus{
    outline: none;
    }
    .sub:focus{
    outline: none;
    }
    .sub{
    border:1px solid #fff;
    background-color: #fff;
    font-weight: 600;
    width:22px;
    color:#979797;
    }
    #qty{
    border:1px solid #eee;
    width:45px; 
    height: 25px;
    text-align: center;
    }
    #qty:focus{
    outline: none;
    }
    .time_style{
    color:#929292;
    font-size: 14px;
    }
    .chat_box:hover{
    background-color: #8E43E7;
    color: #fff !important;
    }
    .image-gallery-slide img{
    max-width: 100%;
    height: 100%;
    object-fit: contain;
    margin: auto;
    }
    .image-gallery-slide.center {
    position: relative;
    }
    .image-gallery-slide {
    background: 0 0!important;
    }
    .image-gallery-slide {
    background: #fff;
    left: 0;
    position: absolute;
    top: 0;
    width: 100%;
    }
    [role=button] {
    cursor: pointer;
    }
    .image-gallery-fullscreen-button {
    right: 0;
    }
    .image-gallery-fullscreen-button, .image-gallery-play-button {
    bottom: 0;
    }
    .image-gallery-fullscreen-button, .image-gallery-left-nav, .image-gallery-play-button, .image-gallery-right-nav {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    background-color: transparent;
    border: 0;
    cursor: pointer;
    outline: none;
    position: absolute;
    z-index: 4;
    }
    .image-gallery-slide img {
    width: 100%;
    }
    img {
    vertical-align: middle;
    }
    img {
    border: 0;
    }
    @media (max-width: 768px){
    .flex-grow-1{
    line-height: 1.8 !important;
    }
    .image-gallery-image {
    height: 220px;
    line-height: 220px;
    overflow: hidden;
    }
    }
    .heading{
    margin-bottom: 20px;
    margin-top: 20px;
    font-size: 24px;
    font-weight: 700;
    }
    .about_section{
    font-size: 22px;
    font-weight: 800;
    float: left;
    }
    .gig-panel{
    background-color: #fff;
    border: 1px solid #fff;
    box-shadow: 0 2px 10px rgba(0,0,0,.1);
    text-align: left;
    }
    .nav-link{
    border-radius: 0 !important;
    color: #000;
    }
    .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
        color: #fff;
        background-color: #6610f2;
    }
</style>
<div class="container main-w3pvt main-cont" >
    <div class="row my-2">
                <div class="col-sm-4 col-md-5 card-body">
            <?php //print_r($service) ?>    
            <ul class="nav nav-pills mb-3 col-12" id="pills-tab" role="tablist"  style="background-color: #eee;padding-right:0;text-align: center;">
                <li class="nav-item col-4" style="padding-left: 0;padding-right: 0;">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Basic</a>
                </li>
                <li class="nav-item col-4"  style="padding-left: 0;padding-right: 0;">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Standard</a>
                </li>
                <li class="nav-item col-4"  style="padding-left: 0;padding-right: 0;">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Premium</a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active px-2" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <p class="d-inline-text d-flex pr-5">
                        <span class='flex-grow-1 '>Income Tax Filing  - Salaried Income</span>
                        <span class='flex-grow-1' style="width: 30%; text-align: right;">Rs. <?php echo h($service[0]->_basic_price)?></span>
                    </p>
                    <span>
                        <ul class='px-4 py-2 income_points'>
                            <li><?php echo h($service[0]->_basic_price_desc )?></li>
                            <!--<li>Filing of Tax Return</li>
                            <li>Interest &amp; Other Source Income</li>
                            <li><b>1</b> No. of Form 16</li>-->
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
                    <button <?php echo $myUrlBas?> class="btn btn-pay-installment btn-track-pay" <?php echo $mymodal ?> ><span>Make Payment Rs. </span><span class="service-price" price="<?php echo h($service[0]->_basic_price)?>"><?php echo h($service[0]->_basic_price)?></span></button>
                    <p class="para text-center" style="margin: 0px;"><b>Or</b></p>
                    <button class="btn btn-share-expert-chat chat_box" style="color: #000;">Chat &amp; Discuss before booking</button>
                    <p class="para" style="color: rgb(63, 79, 224);">* Get instant Cashback Rewards up to 100%</p>
                    <p class="para" style="color: rgb(63, 79, 224);">* 100% Refunds on Non Delivery</p>
                </div>
                <div class="tab-pane fade px-2" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <p class="d-flex pr-5"><span class='flex-grow-1'>Income Tax Filing  - Salaried Income</span><span class='flex-grow-1' style="width: 30%; text-align: right;">Rs. <?php echo h($service[0]->_standard_price  )?></span></p>
                    <span>
                        <ul class='px-4 py-2 income_points'>
                            <li><?php echo h($service[0]->_standard_price_desc)?></li>
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
                    <button <?php echo $myUrlStd?> class="btn btn-pay-installment btn-track-pay" <?php echo $mymodal ?> ><span>Make Payment Rs. </span><span class="service-price" price="<?php echo h($service[0]->_standard_price)?>"><?php echo h($service[0]->_standard_price)?></span></button>
                    <p class="para text-center" style="margin: 0px;"><b>Or</b></p>
                    <button class="btn btn-share-expert-chat">Chat &amp; Discuss before booking</button>
                    <p class="para" style="color: rgb(63, 79, 224);">* Get instant Cashback Rewards up to 100%</p>
                    <p class="para" style="color: rgb(63, 79, 224);">* 100% Refunds on Non Delivery</p>
                </div>
                <div class="tab-pane fade px-2" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                    <p class="d-flex pr-5"><span class='flex-grow-1'> Income Tax Filing  - Salaried Income</span><span class='flex-grow-1' style="width: 30%; text-align: right;">Rs. <?php echo h($service[0]->_premium_price)?></span></p>
                    <span>
                        <ul class='px-4 py-2 income_points'>
                            <li><?php echo h($service[0]->_premium_price_desc)?></li>
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
                    <button <?php echo $myUrlPre?> class="btn btn-pay-installment btn-track-pay" <?php echo $mymodal ?> ><span>Make Payment Rs. </span><span class="service-price" price="<?php echo h($service[0]->_premium_price)?>"><?php echo h($service[0]->_premium_price)?></span></button>
                    <p class="para text-center" style="margin: 0px;"><b>Or</b></p>
                    <button class="btn btn-share-expert-chat">Chat &amp; Discuss before booking</button>
                    <p class="para" style="color: rgb(63, 79, 224);">* Get instant Cashback Rewards up to 100%</p>
                    <p class="para" style="color: rgb(63, 79, 224);">* 100% Refunds on Non Delivery</p>
                </div>
            </div>
        </div>
        <div class="col-sm-8 col-md-7">
            <h2 class="heading">
                <?php echo h($service[0]->title)?>
            </h2>
            <div class="image-gallery " aria-live="polite">
                <div class="image-gallery-content">
                    <div class="image-gallery-slide-wrapper bottom ">
                        <button type="button" class="image-gallery-fullscreen-button" aria-label="Open Fullscreen"></button>
                        <div class="image-gallery-slides">
                            <div class="image-gallery-slide center" role="button" style="transform: translate3d(0%, 0px, 0px);">
                                <div class="image-gallery-image">
                                    <?php 
                                        $imgLink='product-images/'.$service[0]['product_galleries'][0]->url;
                                        echo $this->Html->image(($imgLink), ['alt' => 'CakePHP']);
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <p>&nbsp;</p>
            <div class="hidden-xs">
                <div class="panel panel-default gig-panel">
                    <div class="panel-body">
                        <h1 class="d-designer-heading about_section">About the Service</h1>
                        <br>
                        <p class="xs-para"> 
                        <br>Hi, <br>
                        <?php echo h($service[0]->description)?>
                    </div>
                </div>
            </div>
            <?php //print_r($service) ?>
        </div>

    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $('.add').click(function () {
        if ($(this).prev().val() <10) {
            var n=Number($(this).prev().val())+1;
            $(this).prev().val(n);
            var sPrice=$( "div.active" ).find('.service-price').attr('price');
            sPrice= Number(sPrice) * n;
            $( "div.active" ).find('.service-price').text(sPrice);
        }
    });
    $('.sub').click(function () {
        if ($(this).next().val() > 1) {
            var n=Number($(this).next().val())-1;
            if ($(this).next().val() > 1) 
            $(this).next().val(n);
            var sPrice=$( "div.active" ).find('.service-price').attr('price');
            sPrice= Number(sPrice) * n;
            $( "div.active" ).find('.service-price').text(sPrice);
        }
    });
</script>

