<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DeliveryAddress[]|\Cake\Collection\CollectionInterface $deliveryAddresses
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Delivery Address'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List States'), ['controller' => 'States', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New State'), ['controller' => 'States', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="deliveryAddresses index large-9 medium-8 columns content">
    <h3><?= __('Delivery Addresses') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('city_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('state_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address_line_1') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address_line_2') ?></th>
                <th scope="col"><?= $this->Paginator->sort('latitude') ?></th>
                <th scope="col"><?= $this->Paginator->sort('longitude') ?></th>
                <th scope="col"><?= $this->Paginator->sort('zip_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phone_1') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($deliveryAddresses as $deliveryAddress): ?>
            <tr>
                <td><?= $this->Number->format($deliveryAddress->id) ?></td>
                <td><?= $deliveryAddress->has('user') ? $this->Html->link($deliveryAddress->user->id, ['controller' => 'Users', 'action' => 'view', $deliveryAddress->user->id]) : '' ?></td>
                <td><?= $deliveryAddress->has('city') ? $this->Html->link($deliveryAddress->city->name, ['controller' => 'Cities', 'action' => 'view', $deliveryAddress->city->id]) : '' ?></td>
                <td><?= $deliveryAddress->has('state') ? $this->Html->link($deliveryAddress->state->name, ['controller' => 'States', 'action' => 'view', $deliveryAddress->state->id]) : '' ?></td>
                <td><?= h($deliveryAddress->first_name) ?></td>
                <td><?= h($deliveryAddress->address_line_1) ?></td>
                <td><?= h($deliveryAddress->address_line_2) ?></td>
                <td><?= h($deliveryAddress->latitude) ?></td>
                <td><?= h($deliveryAddress->longitude) ?></td>
                <td><?= h($deliveryAddress->zip_code) ?></td>
                <td><?= h($deliveryAddress->phone_1) ?></td>
                <td><?= h($deliveryAddress->created) ?></td>
                <td><?= h($deliveryAddress->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $deliveryAddress->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $deliveryAddress->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $deliveryAddress->id], ['confirm' => __('Are you sure you want to delete # {0}?', $deliveryAddress->id)]) ?>
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
