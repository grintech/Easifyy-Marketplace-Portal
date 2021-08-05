<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CouponRedeem $couponRedeem
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $couponRedeem->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $couponRedeem->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Coupon Redeems'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Coupons'), ['controller' => 'Coupons', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Coupon'), ['controller' => 'Coupons', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="couponRedeems form large-9 medium-8 columns content">
    <?= $this->Form->create($couponRedeem) ?>
    <fieldset>
        <legend><?= __('Edit Coupon Redeem') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('coupon_id', ['options' => $coupons]);
            echo $this->Form->control('order_id', ['options' => $orders, 'empty' => true]);
            echo $this->Form->control('coupon_code');
            echo $this->Form->control('usage_count');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
