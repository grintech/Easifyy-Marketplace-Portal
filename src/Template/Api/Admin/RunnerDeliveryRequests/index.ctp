<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RunnerDeliveryRequest[]|\Cake\Collection\CollectionInterface $runnerDeliveryRequests
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Runner Delivery Request'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Runners'), ['controller' => 'Runners', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Runner'), ['controller' => 'Runners', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="runnerDeliveryRequests index large-9 medium-8 columns content">
    <h3><?= __('Runner Delivery Requests') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('runner_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('order_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('request_status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($runnerDeliveryRequests as $runnerDeliveryRequest): ?>
            <tr>
                <td><?= $this->Number->format($runnerDeliveryRequest->id) ?></td>
                <td><?= $runnerDeliveryRequest->has('runner') ? $this->Html->link($runnerDeliveryRequest->runner->id, ['controller' => 'Runners', 'action' => 'view', $runnerDeliveryRequest->runner->id]) : '' ?></td>
                <td><?= $runnerDeliveryRequest->has('order') ? $this->Html->link($runnerDeliveryRequest->order->id, ['controller' => 'Orders', 'action' => 'view', $runnerDeliveryRequest->order->id]) : '' ?></td>
                <td><?= h($runnerDeliveryRequest->request_status) ?></td>
                <td><?= h($runnerDeliveryRequest->created) ?></td>
                <td><?= h($runnerDeliveryRequest->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $runnerDeliveryRequest->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $runnerDeliveryRequest->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $runnerDeliveryRequest->id], ['confirm' => __('Are you sure you want to delete # {0}?', $runnerDeliveryRequest->id)]) ?>
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
