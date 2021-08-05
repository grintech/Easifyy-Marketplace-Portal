<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Merchant $merchant
 */
?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Merchants'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List States'), ['controller' => 'States', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New State'), ['controller' => 'States', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Bank Accounts'), ['controller' => 'BankAccounts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bank Account'), ['controller' => 'BankAccounts', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cart Items'), ['controller' => 'CartItems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cart Item'), ['controller' => 'CartItems', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Coupons'), ['controller' => 'Coupons', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Coupon'), ['controller' => 'Coupons', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Merchant Payouts'), ['controller' => 'MerchantPayouts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Merchant Payout'), ['controller' => 'MerchantPayouts', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Merchant Products'), ['controller' => 'MerchantProducts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Merchant Product'), ['controller' => 'MerchantProducts', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Merchant Transactions'), ['controller' => 'MerchantTransactions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Merchant Transaction'), ['controller' => 'MerchantTransactions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Order Payments'), ['controller' => 'OrderPayments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order Payment'), ['controller' => 'OrderPayments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Purchases'), ['controller' => 'Purchases', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Purchase'), ['controller' => 'Purchases', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reviews'), ['controller' => 'Reviews', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Review'), ['controller' => 'Reviews', 'action' => 'add']) ?></li>
    </ul>
</nav> -->
<div class="merchants form large-9 medium-8 columns content">
    <?= $this->Form->create($merchant) ?>
    <fieldset>
        <legend><?= __('Add Merchant') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('store_name');
            echo $this->Form->control('slug');
            echo $this->Form->control('state_id', ['options' => $states, 'empty' => true]);
            echo $this->Form->control('city_id', ['options' => $cities, 'empty' => true]);
            echo $this->Form->control('gst_number');
            echo $this->Form->control('pan_number');
            echo $this->Form->control('license_number');
            echo $this->Form->control('address_line_1');
            echo $this->Form->control('address_line_2');
            echo $this->Form->control('locality');
            echo $this->Form->control('zip_code');
            echo $this->Form->control('latitude');
            echo $this->Form->control('longitude');
            echo $this->Form->control('store_pic');
            echo $this->Form->control('phone_1');
            echo $this->Form->control('phone_2');
            echo $this->Form->control('phone_3');
            echo $this->Form->control('fax');
            echo $this->Form->control('open_time');
            echo $this->Form->control('close_time');
            echo $this->Form->control('minimum_order');
            echo $this->Form->control('delivery_charges');
            echo $this->Form->control('deliver_time');
            echo $this->Form->control('deliver_radius');
            echo $this->Form->control('payment_method');
            echo $this->Form->control('commission');
            echo $this->Form->control('delivery_type');
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
