<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Addresses'), ['controller' => 'Addresses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Address'), ['controller' => 'Addresses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cart Items'), ['controller' => 'CartItems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cart Item'), ['controller' => 'CartItems', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Coupon Redeems'), ['controller' => 'CouponRedeems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Coupon Redeem'), ['controller' => 'CouponRedeems', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Merchants'), ['controller' => 'Merchants', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Merchant'), ['controller' => 'Merchants', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Order Notifications'), ['controller' => 'OrderNotifications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order Notification'), ['controller' => 'OrderNotifications', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Order Payments'), ['controller' => 'OrderPayments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order Payment'), ['controller' => 'OrderPayments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reviews'), ['controller' => 'Reviews', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Review'), ['controller' => 'Reviews', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reward Points'), ['controller' => 'RewardPoints', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Reward Point'), ['controller' => 'RewardPoints', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Runners'), ['controller' => 'Runners', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Runner'), ['controller' => 'Runners', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Suppliers'), ['controller' => 'Suppliers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Supplier'), ['controller' => 'Suppliers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Supports'), ['controller' => 'Supports', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Support'), ['controller' => 'Supports', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Logs'), ['controller' => 'UserLogs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Log'), ['controller' => 'UserLogs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Social Profiles'), ['controller' => 'UserSocialProfiles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Social Profile'), ['controller' => 'UserSocialProfiles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->control('first_name');
            echo $this->Form->control('last_name');
            echo $this->Form->control('username');
            echo $this->Form->control('password');
            echo $this->Form->control('role');
            echo $this->Form->control('user_profile_image');
            echo $this->Form->control('reset_password_token');
            echo $this->Form->control('token_created_at', ['empty' => true]);
            echo $this->Form->control('email_verification_token');
            echo $this->Form->control('email_token_created_at', ['empty' => true]);
            echo $this->Form->control('email_verify_status');
            echo $this->Form->control('status');
            echo $this->Form->control('device_token');
            echo $this->Form->control('fcm_token');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
