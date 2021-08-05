<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CouponRedeem[]|\Cake\Collection\CollectionInterface $couponRedeems
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Coupon Redeem'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="couponRedeems index large-9 medium-8 columns content">
    <h3><?= __('Coupon Redeems') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('coupon_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('usage_count') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($couponRedeems as $couponRedeem): ?>
            <tr>
                <td><?= $this->Number->format($couponRedeem->id) ?></td>
                <td><?= $couponRedeem->has('user') ? $this->Html->link($couponRedeem->user->id, ['controller' => 'Users', 'action' => 'view', $couponRedeem->user->id]) : '' ?></td>
                <td><?= h($couponRedeem->coupon_code) ?></td>
                <td><?= $this->Number->format($couponRedeem->usage_count) ?></td>
                <td><?= h($couponRedeem->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $couponRedeem->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $couponRedeem->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $couponRedeem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $couponRedeem->id)]) ?>
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
