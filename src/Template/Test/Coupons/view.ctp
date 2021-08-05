<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Coupon $coupon
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Coupon'), ['action' => 'edit', $coupon->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Coupon'), ['action' => 'delete', $coupon->id], ['confirm' => __('Are you sure you want to delete # {0}?', $coupon->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Coupons'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Coupon'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Merchants'), ['controller' => 'Merchants', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Merchant'), ['controller' => 'Merchants', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Coupon Redeems'), ['controller' => 'CouponRedeems', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Coupon Redeem'), ['controller' => 'CouponRedeems', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="coupons view large-9 medium-8 columns content">
    <h3><?= h($coupon->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Merchant') ?></th>
            <td><?= $coupon->has('merchant') ? $this->Html->link($coupon->merchant->id, ['controller' => 'Merchants', 'action' => 'view', $coupon->merchant->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Coupon Code') ?></th>
            <td><?= h($coupon->coupon_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Discount') ?></th>
            <td><?= h($coupon->discount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Discount Type') ?></th>
            <td><?= h($coupon->discount_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($coupon->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($coupon->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Usage Limit') ?></th>
            <td><?= $this->Number->format($coupon->user_usage_limit) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Usage Limit') ?></th>
            <td><?= $this->Number->format($coupon->usage_limit) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Minimum Spend') ?></th>
            <td><?= $this->Number->format($coupon->minimum_spend) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Maximum Spend') ?></th>
            <td><?= $this->Number->format($coupon->maximum_spend) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Max Amount') ?></th>
            <td><?= $this->Number->format($coupon->max_amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Usage Count') ?></th>
            <td><?= $this->Number->format($coupon->usage_count) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Coupon Applicable') ?></th>
            <td><?= $this->Number->format($coupon->coupon_applicable) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Expire') ?></th>
            <td><?= h($coupon->expire) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($coupon->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($coupon->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $coupon->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Coupon Redeems') ?></h4>
        <?php if (!empty($coupon->coupon_redeems)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Coupon Id') ?></th>
                <th scope="col"><?= __('Order Id') ?></th>
                <th scope="col"><?= __('Coupon Code') ?></th>
                <th scope="col"><?= __('Usage Count') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($coupon->coupon_redeems as $couponRedeems): ?>
            <tr>
                <td><?= h($couponRedeems->id) ?></td>
                <td><?= h($couponRedeems->user_id) ?></td>
                <td><?= h($couponRedeems->coupon_id) ?></td>
                <td><?= h($couponRedeems->order_id) ?></td>
                <td><?= h($couponRedeems->coupon_code) ?></td>
                <td><?= h($couponRedeems->usage_count) ?></td>
                <td><?= h($couponRedeems->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'CouponRedeems', 'action' => 'view', $couponRedeems->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'CouponRedeems', 'action' => 'edit', $couponRedeems->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'CouponRedeems', 'action' => 'delete', $couponRedeems->id], ['confirm' => __('Are you sure you want to delete # {0}?', $couponRedeems->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Orders') ?></h4>
        <?php if (!empty($coupon->orders)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Merchant Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Address Id') ?></th>
                <th scope="col"><?= __('Coupon Id') ?></th>
                <th scope="col"><?= __('Runner Id') ?></th>
                <th scope="col"><?= __('Order Mode Id') ?></th>
                <th scope="col"><?= __('Order Status Id') ?></th>
                <th scope="col"><?= __('Igst') ?></th>
                <th scope="col"><?= __('Cgst') ?></th>
                <th scope="col"><?= __('Sgst') ?></th>
                <th scope="col"><?= __('Shipping') ?></th>
                <th scope="col"><?= __('Delivery Time') ?></th>
                <th scope="col"><?= __('Gross Total') ?></th>
                <th scope="col"><?= __('Total') ?></th>
                <th scope="col"><?= __('Order Notes') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($coupon->orders as $orders): ?>
            <tr>
                <td><?= h($orders->id) ?></td>
                <td><?= h($orders->merchant_id) ?></td>
                <td><?= h($orders->user_id) ?></td>
                <td><?= h($orders->address_id) ?></td>
                <td><?= h($orders->coupon_id) ?></td>
                <td><?= h($orders->runner_id) ?></td>
                <td><?= h($orders->order_mode_id) ?></td>
                <td><?= h($orders->order_status_id) ?></td>
                <td><?= h($orders->igst) ?></td>
                <td><?= h($orders->cgst) ?></td>
                <td><?= h($orders->sgst) ?></td>
                <td><?= h($orders->shipping) ?></td>
                <td><?= h($orders->delivery_time) ?></td>
                <td><?= h($orders->gross_total) ?></td>
                <td><?= h($orders->total) ?></td>
                <td><?= h($orders->order_notes) ?></td>
                <td><?= h($orders->created) ?></td>
                <td><?= h($orders->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Orders', 'action' => 'view', $orders->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Orders', 'action' => 'edit', $orders->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Orders', 'action' => 'delete', $orders->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orders->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
