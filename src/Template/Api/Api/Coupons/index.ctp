<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Coupon[]|\Cake\Collection\CollectionInterface $coupons
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Coupon'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Merchants'), ['controller' => 'Merchants', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Merchant'), ['controller' => 'Merchants', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="coupons index large-9 medium-8 columns content">
    <h3><?= __('Coupons') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('merchant_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('coupon_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('discount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('discount_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('expire') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_usage_limit') ?></th>
                <th scope="col"><?= $this->Paginator->sort('usage_limit') ?></th>
                <th scope="col"><?= $this->Paginator->sort('minimum_spend') ?></th>
                <th scope="col"><?= $this->Paginator->sort('maximum_spend') ?></th>
                <th scope="col"><?= $this->Paginator->sort('max_amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('usage_count') ?></th>
                <th scope="col"><?= $this->Paginator->sort('coupon_applicable') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($coupons as $coupon): ?>
            <tr>
                <td><?= $this->Number->format($coupon->id) ?></td>
                <td><?= $coupon->has('merchant') ? $this->Html->link($coupon->merchant->id, ['controller' => 'Merchants', 'action' => 'view', $coupon->merchant->id]) : '' ?></td>
                <td><?= h($coupon->coupon_code) ?></td>
                <td><?= h($coupon->discount) ?></td>
                <td><?= h($coupon->discount_type) ?></td>
                <td><?= h($coupon->description) ?></td>
                <td><?= h($coupon->expire) ?></td>
                <td><?= $this->Number->format($coupon->user_usage_limit) ?></td>
                <td><?= $this->Number->format($coupon->usage_limit) ?></td>
                <td><?= $this->Number->format($coupon->minimum_spend) ?></td>
                <td><?= $this->Number->format($coupon->maximum_spend) ?></td>
                <td><?= $this->Number->format($coupon->max_amount) ?></td>
                <td><?= $this->Number->format($coupon->usage_count) ?></td>
                <td><?= $this->Number->format($coupon->coupon_applicable) ?></td>
                <td><?= h($coupon->status) ?></td>
                <td><?= h($coupon->created) ?></td>
                <td><?= h($coupon->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $coupon->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $coupon->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $coupon->id], ['confirm' => __('Are you sure you want to delete # {0}?', $coupon->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
