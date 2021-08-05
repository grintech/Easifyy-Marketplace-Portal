<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Runner $runner
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Runner'), ['action' => 'edit', $runner->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Runner'), ['action' => 'delete', $runner->id], ['confirm' => __('Are you sure you want to delete # {0}?', $runner->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Runners'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Runner'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Runner Delivery Requests'), ['controller' => 'RunnerDeliveryRequests', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Runner Delivery Request'), ['controller' => 'RunnerDeliveryRequests', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="runners view large-9 medium-8 columns content">
    <h3><?= h($runner->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $runner->has('user') ? $this->Html->link($runner->user->id, ['controller' => 'Users', 'action' => 'view', $runner->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gender') ?></th>
            <td><?= h($runner->gender) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($runner->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Vehicle No') ?></th>
            <td><?= h($runner->vehicle_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Current Locatioin') ?></th>
            <td><?= h($runner->current_locatioin) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Loc Lat') ?></th>
            <td><?= h($runner->loc_lat) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Loc Long') ?></th>
            <td><?= h($runner->loc_long) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Profile Pic') ?></th>
            <td><?= h($runner->profile_pic) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($runner->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone No') ?></th>
            <td><?= $this->Number->format($runner->phone_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dob') ?></th>
            <td><?= h($runner->dob) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Login') ?></th>
            <td><?= h($runner->last_login) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($runner->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($runner->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $runner->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Orders') ?></h4>
        <?php if (!empty($runner->orders)): ?>
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
            <?php foreach ($runner->orders as $orders): ?>
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
    <div class="related">
        <h4><?= __('Related Runner Delivery Requests') ?></h4>
        <?php if (!empty($runner->runner_delivery_requests)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Runner Id') ?></th>
                <th scope="col"><?= __('Order Id') ?></th>
                <th scope="col"><?= __('Request Status') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($runner->runner_delivery_requests as $runnerDeliveryRequests): ?>
            <tr>
                <td><?= h($runnerDeliveryRequests->id) ?></td>
                <td><?= h($runnerDeliveryRequests->runner_id) ?></td>
                <td><?= h($runnerDeliveryRequests->order_id) ?></td>
                <td><?= h($runnerDeliveryRequests->request_status) ?></td>
                <td><?= h($runnerDeliveryRequests->created) ?></td>
                <td><?= h($runnerDeliveryRequests->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'RunnerDeliveryRequests', 'action' => 'view', $runnerDeliveryRequests->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'RunnerDeliveryRequests', 'action' => 'edit', $runnerDeliveryRequests->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'RunnerDeliveryRequests', 'action' => 'delete', $runnerDeliveryRequests->id], ['confirm' => __('Are you sure you want to delete # {0}?', $runnerDeliveryRequests->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
