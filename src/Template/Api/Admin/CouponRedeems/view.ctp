<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CouponRedeem $couponRedeem
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Coupon Redeem'), ['action' => 'edit', $couponRedeem->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Coupon Redeem'), ['action' => 'delete', $couponRedeem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $couponRedeem->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Coupon Redeems'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Coupon Redeem'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="couponRedeems view large-9 medium-8 columns content">
    <h3><?= h($couponRedeem->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $couponRedeem->has('user') ? $this->Html->link($couponRedeem->user->id, ['controller' => 'Users', 'action' => 'view', $couponRedeem->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Coupon Code') ?></th>
            <td><?= h($couponRedeem->coupon_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($couponRedeem->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Usage Count') ?></th>
            <td><?= $this->Number->format($couponRedeem->usage_count) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($couponRedeem->created) ?></td>
        </tr>
    </table>
</div>
