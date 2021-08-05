<style>
    .ty-mainbox-container {
        padding: 20px;
        box-shadow: none;
        margin-top: 12em;
        margin-bottom: 25px;
    }

    /*--------------------
Text
---------------------*/
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        margin: 0;
        line-height: 1.4;
    }

    h1 {
        font-size: 35px;
        color: #8e43e7;
        text-align: left;
    }

    h2 {
        font-size: 28px;
        letter-spacing: -2px;
        color: #000000;
        text-align: center;
        line-height: 2.8;
    }

    h3 {
        font-size: 16px;
        color: #dddfe6;
        letter-spacing: 1px;
        text-align: left;
    }

    h4 {
        font-size: 26px;
        color: #8e43e7;
        letter-spacing: 1px;
        text-align: left;
        line-height: 2;
        /* list-style: none !important; */
    }

    h5 {
        font-size: 20px;
        font-weight: 700;
        color: #000000;
        letter-spacing: 1px;
        text-align: left;
        text-transform: uppercase;
    }

    h5>span {
        margin-left: 87px;
    }

    h5.total {
        margin-top: 20px;
    }

    /*--------------------
Checkout
---------------------*/

    .checkout {
        width: 470px;
        height: auto;
        position: relative;
        top: 1em !important;
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
        height: 365px;
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
                        <?= $this->Form->create(NULL, array('url' => $this->Url->build(['controller' => 'Order', 'action' => 'checkPaymentStatus']))) ?>
                        <!--<form action="<?php echo $this->Url->build(['controller' => 'Order', 'action' => 'checkPaymentStatus']) ?>" method="POST">-->
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