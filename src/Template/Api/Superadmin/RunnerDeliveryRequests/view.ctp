<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RunnerDeliveryRequest $runnerDeliveryRequest
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Runner Delivery Request'), ['action' => 'edit', $runnerDeliveryRequest->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Runner Delivery Request'), ['action' => 'delete', $runnerDeliveryRequest->id], ['confirm' => __('Are you sure you want to delete # {0}?', $runnerDeliveryRequest->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Runner Delivery Requests'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Runner Delivery Request'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Runners'), ['controller' => 'Runners', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Runner'), ['controller' => 'Runners', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="runnerDeliveryRequests view large-9 medium-8 columns content">
    <h3><?= h($runnerDeliveryRequest->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Runner') ?></th>
            <td><?= $runnerDeliveryRequest->has('runner') ? $this->Html->link($runnerDeliveryRequest->runner->id, ['controller' => 'Runners', 'action' => 'view', $runnerDeliveryRequest->runner->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Order') ?></th>
            <td><?= $runnerDeliveryRequest->has('order') ? $this->Html->link($runnerDeliveryRequest->order->id, ['controller' => 'Orders', 'action' => 'view', $runnerDeliveryRequest->order->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Request Status') ?></th>
            <td><?= h($runnerDeliveryRequest->request_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($runnerDeliveryRequest->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($runnerDeliveryRequest->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($runnerDeliveryRequest->modified) ?></td>
        </tr>
    </table>
</div>
