<!--<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>-->
<style>
    ol {
        list-style: none;
    }

    .cmnt {
        border: solid 1px;
        height: 55px;
        line-height: 3;
    }

    .progtrckr {
        display: flex;
    }

    ol.progtrckr li {
        display: inline-block;
        text-align: center;
        line-height: 16px;
    }

    ol.progtrckr .progtrckr-todo {
        color: #000;
        border-bottom: 12px solid #d3baf1;
        padding: 8px 0;
        width: 291px;
    }

    ol.progtrckr .done:before {
        background-color: #8e43e7 !important;
    }

    ol.progtrckr .progtrckr-todo:before {
        position: relative;
        bottom: -2.5em;
        float: left;
        left: 50%;
        line-height: 1em;
    }

    ol.progtrckr .progtrckr-done:before {
        position: relative;
        bottom: -2.5em;
        float: left;
        left: 50%;
        line-height: 1em;
    }

    ol.progtrckr .progtrckr-done:before {
        content: "\2713";
        color: white;
        background-color: #8e43e7;
        height: 40px;
        width: 40px;
        line-height: 40px;
        border: none;
        border-radius: 50%;
        top: 48px;
    }

    ol.progtrckr .progtrckr-todo:before {
        content: "\2713";
        color: white;
        background-color: #d3baf1;
        height: 40px;
        width: 40px;
        line-height: 40px;
        border: none;
        border-radius: 50%;
        top: 48px;
        z-index: 999;
    }

    .bar-progress {

        color: #000;
        border-bottom: 12px solid #8e43e7;
        padding: 4px 0;
        position: absolute;
        z-index: 99;
        width: 43%;
    }
    .step-content {
        padding: 55px 0px 0px 38px;
        opacity: 0;
    }

    .cmnt-show:hover .step-content {
        opacity: 9;
        transition: 1s;
    }

    .step-content:before {
        content: "\f0d8";
        font-family: 'FontAwesome';
        font-size: 32px;
        position: relative;
        top: 12px;
        color: #d4edda
    }

    .step-content .alert-success{
        border: none;
    }
    

    .top {
        padding-top: 40px;
        padding-left: 13% !important;
        padding-right: 13% !important
    }

    #progressbar {
        margin-bottom: 30px;
        overflow: hidden;
        color: #455A64;
        padding-left: 0px;
        margin-top: 30px
    }

    #progressbar li {
        list-style-type: none;
        font-size: 13px;
        width: 25%;
        float: left;
        position: relative;
        font-weight: 400
    }

    #progressbar .step0:before {
        font-family: FontAwesome;
        content: "\f10c";
        color: #fff
    }

    #progressbar li:before {
        width: 40px;
        height: 40px;
        line-height: 45px;
        display: block;
        font-size: 20px;
        background: #C5CAE9;
        border-radius: 50%;
        margin: auto;
        padding: 0px
    }

    #progressbar li:after {
        content: '';
        width: 100%;
        height: 12px;
        background: #C5CAE9;
        position: absolute;
        left: 0;
        top: 16px;
        z-index: -1
    }

    #progressbar li:last-child:after {
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
        position: absolute;
        left: -50%
    }

    #progressbar li:nth-child(2):after,
    #progressbar li:nth-child(3):after {
        left: -50%
    }

    #progressbar li:first-child:after {
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px;
        position: absolute;
        left: 50%
    }

    #progressbar li:last-child:after {
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px
    }

    #progressbar li:first-child:after {
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px
    }

    #progressbar li.active:before,
    #progressbar li.active:after {
        background: #651FFF
    }

    #progressbar li.active:before {
        font-family: FontAwesome;
        content: "\f00c"
    }

    .icon {
        width: 60px;
        height: 60px;
        margin-right: 15px
    }

    .icon-content {
        padding-bottom: 20px
    }

    @media screen and (max-width: 992px) {
        .icon-content {
            width: 50%
        }
    }
    .breadcrumbs-trail li {
      float: left;
      padding-left: 10px;
      font-size: 15px;
    }
    .swal-button-container{
        display:none;
    }

        /*--------------------
Checkout
---------------------*/

.checkout {
        width: 470px;
        height: auto;
        position: relative;
        top: 12em !important;
        bottom: 0;
        left: 50%;
        background-color: #8e43e7;
        overflow: hidden;
        -webkit-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        -webkit-border-radius: 12px;
        -moz-border-radius: 12px;
        border-radius: 12px;
        -webkit-box-shadow: 0 30px 48px rgba(37, 44, 65, 0.32);
        -moz-box-shadow: 0 30px 48px rgba(37, 44, 65, 0.32);
        box-shadow: 0 4px 17px #d3baf1;
        padding: 12px !important;
    }

    .order {
        width: 100%;
        height: 425px;
        padding: 0 30px;
        float: left;
        background-color: #ffffff;
        z-index: 1;
        -webkit-box-shadow: 0 15px 24px rgba(37, 44, 65, 0.16);
        -moz-box-shadow: 0 15px 24px rgba(37, 44, 65, 0.16);
        box-shadow: 0 15px 24px rgba(37, 44, 65, 0.16);
    }

    /*--------------------
Payment
---------------------*/

    .payment img {
        width: 100%;
        max-width: 116px;
        margin: 0px auto 17px;
    }

    .razorpay-payment-button {
        text-align: center;
        float: left;
        width: 100%;
        max-width: 175px;
        position: relative;
        left: 20%;
        top: 2em;
        padding: 8px;
        border-radius: 4px !important;
        color: #fff;
        font-size: 18px;
        text-transform: none;
        background-color: #8e43e7;
        border: 0px
    }

    ul.order-list li {
        list-style: none;
    }

    ul.order-list {
        padding: 0px 10px;
    }

    .checkout.ty-mainbox-container .order h5 {
        font-size: 16px;
    }

    .checkout.ty-mainbox-container .order h2 {
        font-size: 24px;
        font-weight: 700;
    }

    .chck-btn-input {
        /* float: left;
        position: relative;
        top: 60px;
        left: 10px; */
    }

    .btn-check-chrckout input {
        top: 13px;
        max-width: 230px;
    }

    .pay-secure {
        display: inline-block;
        width: 100%;
        text-align: center;
        position: relative;
    }
    .order h1,h5,h2,h6{
        text-align: center;
    }

</style>
<?php

use Razorpay\Api\Api;

$api_key = 'rzp_test_u7RqiXzsDwDofk';
$api_secret = 'NYACLkyP2nxkT7g9AVvQNfnj';
$api = new Api($api_key, $api_secret);
$orderData = [
    'receipt'         => 3456,
    'amount'          => $price * 100, // 2000 rupees in paise
    'currency'        => 'INR',
    'payment_capture' => 1 // auto capture
];


$razorpayOrder = $api->order->create($orderData);
$razorpayOrderId = $razorpayOrder['id'];
$_SESSION['razorpay_order_id'] = $razorpayOrderId;
$displayAmount = $amount = $orderData['amount'];

$data = [
    "key"               => $api_key,
    "amount"            => $amount,
    "name"              => $authUser['first_name'],
    "description"       => " ",
    "image"             => "https://easifyy.com/img/logo.png",
    "prefill"           => [
        "name"              => $authUser['first_name'],
        "email"             => $authUser['username'],
        "contact"           => $authUser['phone'],
    ],
    "notes"             => [
        "address"           => " ",
        "merchant_order_id" => " ",
    ],
    "theme"             => [
        "color"             => "#F37254"
    ],
    "order_id"          => $razorpayOrderId,
];

?>
<body>
    <div class="card card-tabs">
        <div class="card-content">
            <div class="row pb-1">
          <?php
            $this->Breadcrumbs->add(
                'Home',
            );
            $this->Breadcrumbs->add([
                ['title' => 'Dashboard', 'url' => ['controller' => 'users', 'action' => 'dashboard']],
                ['title' => 'In Progress Order', 'url' => ['controller' => 'order', 'action' => 'inProgress']],
            ]);
            $this->Breadcrumbs->add(
                'Pending Payment',
            );
            echo $this->Breadcrumbs->render(
                ['class' => 'breadcrumbs-trail'],
                ['separator' => '<i class="fa fa-angle-right"></i>']
            );
          ?>
        </div>
      </div>
    </div> 
    <div class="container pt-md-5">
        <div class="container main-w3pvt main-cont">
            <div class="ty-mainbox-container clearfix">
                <div class='checkout ty-mainbox-container '>
                    <div class='order'>
                        <h2>Checkout</h2>
                        <h5>Order </h5>
                        <ul class='order-list'>
                            <li>
                                <h6><?= $service ?></h6>
                            </li>
                        </ul>
                        <h5 class='total'>Total</h5>
                        <h1 style="font-size:18px;">INR <?= $price ?></h1>
                        <div class="pay-secure">
                            <h2>Pay Securely with</h2>
                            <div id='payment' class='payment'>
                                <img src="https://techstory.in/wp-content/uploads/2015/10/razorpay.png">
                            </div>
                            <div class="btn-check btn-check-chrckout">
                                <?= $this->Form->create(NULL, array('url' => $this->Url->build(['controller' => 'Order', 'action' => 'recievePendingPayment']))) ?>
                                <!--<form action="<?php echo $this->Url->build(['controller' => 'Order', 'action' => 'recievePendingPayment']) ?>" method="POST">-->
                                <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="<?php echo $data['key'] ?>" data-amount="<?php echo $data['amount'] ?>" data-currency="INR" data-name="<?php echo $data['name'] ?>" data-image="<?php echo $data['image'] ?>" data-description="<?php echo $data['description'] ?>" data-prefill.name="<?php echo $data['prefill']['name'] ?>" data-prefill.email="<?php echo $data['prefill']['email'] ?>" data-prefill.contact="<?php echo $data['prefill']['contact'] ?>" data-notes.shopping_order_id="3456" data-order_id="<?php echo $data['order_id'] ?>" <?php if ($displayCurrency !== 'INR') { ?> data-display_amount="<?php echo $data['display_amount'] ?>" <?php } ?> <?php if ($displayCurrency !== 'INR') { ?> data-display_currency="<?php echo $data['display_currency'] ?>" <?php } ?>>
                                </script>
                                <!-- Any extra fields to be submitted with the form but not sent to Razorpay -->
                                <input type="hidden" name="shopping_order_id" value="3456">
                                <input type="number" hidden name="order_id" value="<?php echo $order['id']; ?>">

                                <?= $this->Form->end() ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
