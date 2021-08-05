<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DeliveryAddress $deliveryAddress
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Delivery Address'), ['action' => 'edit', $deliveryAddress->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Delivery Address'), ['action' => 'delete', $deliveryAddress->id], ['confirm' => __('Are you sure you want to delete # {0}?', $deliveryAddress->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Delivery Addresses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Delivery Address'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List States'), ['controller' => 'States', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New State'), ['controller' => 'States', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="deliveryAddresses view large-9 medium-8 columns content">
    <h3><?= h($deliveryAddress->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $deliveryAddress->has('user') ? $this->Html->link($deliveryAddress->user->id, ['controller' => 'Users', 'action' => 'view', $deliveryAddress->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('City') ?></th>
            <td><?= $deliveryAddress->has('city') ? $this->Html->link($deliveryAddress->city->name, ['controller' => 'Cities', 'action' => 'view', $deliveryAddress->city->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('State') ?></th>
            <td><?= $deliveryAddress->has('state') ? $this->Html->link($deliveryAddress->state->name, ['controller' => 'States', 'action' => 'view', $deliveryAddress->state->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($deliveryAddress->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address Line 1') ?></th>
            <td><?= h($deliveryAddress->address_line_1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address Line 2') ?></th>
            <td><?= h($deliveryAddress->address_line_2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Latitude') ?></th>
            <td><?= h($deliveryAddress->latitude) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Longitude') ?></th>
            <td><?= h($deliveryAddress->longitude) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Zip Code') ?></th>
            <td><?= h($deliveryAddress->zip_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone 1') ?></th>
            <td><?= h($deliveryAddress->phone_1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($deliveryAddress->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($deliveryAddress->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($deliveryAddress->modified) ?></td>
        </tr>
    </table>
</div>
