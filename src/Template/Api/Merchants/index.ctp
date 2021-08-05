<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Merchant[]|\Cake\Collection\CollectionInterface $merchants
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Merchant'), ['action' => 'add']) ?></li>
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
</nav>
<div class="merchants index large-9 medium-8 columns content">
    <h3><?= __('Merchants') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('store_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('slug') ?></th>
                <th scope="col"><?= $this->Paginator->sort('state_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('city_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('gst_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pan_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('license_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address_line_1') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address_line_2') ?></th>
                <th scope="col"><?= $this->Paginator->sort('locality') ?></th>
                <th scope="col"><?= $this->Paginator->sort('zip_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('latitude') ?></th>
                <th scope="col"><?= $this->Paginator->sort('longitude') ?></th>
                <th scope="col"><?= $this->Paginator->sort('store_pic') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phone_1') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phone_2') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phone_3') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fax') ?></th>
                <th scope="col"><?= $this->Paginator->sort('open_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('close_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('minimum_order') ?></th>
                <th scope="col"><?= $this->Paginator->sort('delivery_charges') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deliver_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deliver_radius') ?></th>
                <th scope="col"><?= $this->Paginator->sort('payment_method') ?></th>
                <th scope="col"><?= $this->Paginator->sort('commission') ?></th>
                <th scope="col"><?= $this->Paginator->sort('delivery_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($merchants as $merchant): ?>
            <tr>
                <td><?= $this->Number->format($merchant->id) ?></td>
                <td><?= $merchant->has('user') ? $this->Html->link($merchant->user->id, ['controller' => 'Users', 'action' => 'view', $merchant->user->id]) : '' ?></td>
                <td><?= h($merchant->store_name) ?></td>
                <td><?= h($merchant->slug) ?></td>
                <td><?= $merchant->has('state') ? $this->Html->link($merchant->state->name, ['controller' => 'States', 'action' => 'view', $merchant->state->id]) : '' ?></td>
                <td><?= $merchant->has('city') ? $this->Html->link($merchant->city->name, ['controller' => 'Cities', 'action' => 'view', $merchant->city->id]) : '' ?></td>
                <td><?= h($merchant->gst_number) ?></td>
                <td><?= h($merchant->pan_number) ?></td>
                <td><?= h($merchant->license_number) ?></td>
                <td><?= h($merchant->address_line_1) ?></td>
                <td><?= h($merchant->address_line_2) ?></td>
                <td><?= h($merchant->locality) ?></td>
                <td><?= h($merchant->zip_code) ?></td>
                <td><?= h($merchant->latitude) ?></td>
                <td><?= h($merchant->longitude) ?></td>
                <td><?= h($merchant->store_pic) ?></td>
                <td><?= h($merchant->phone_1) ?></td>
                <td><?= h($merchant->phone_2) ?></td>
                <td><?= h($merchant->phone_3) ?></td>
                <td><?= h($merchant->fax) ?></td>
                <td><?= h($merchant->open_time) ?></td>
                <td><?= h($merchant->close_time) ?></td>
                <td><?= $this->Number->format($merchant->minimum_order) ?></td>
                <td><?= $this->Number->format($merchant->delivery_charges) ?></td>
                <td><?= h($merchant->deliver_time) ?></td>
                <td><?= $this->Number->format($merchant->deliver_radius) ?></td>
                <td><?= h($merchant->payment_method) ?></td>
                <td><?= $this->Number->format($merchant->commission) ?></td>
                <td><?= h($merchant->delivery_type) ?></td>
                <td><?= h($merchant->status) ?></td>
                <td><?= h($merchant->created) ?></td>
                <td><?= h($merchant->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $merchant->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $merchant->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $merchant->id], ['confirm' => __('Are you sure you want to delete # {0}?', $merchant->id)]) ?>
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
