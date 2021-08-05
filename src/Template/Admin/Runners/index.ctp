<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Runner[]|\Cake\Collection\CollectionInterface $runners
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Runner'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Runner Delivery Requests'), ['controller' => 'RunnerDeliveryRequests', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Runner Delivery Request'), ['controller' => 'RunnerDeliveryRequests', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="runners index large-9 medium-8 columns content">
    <h3><?= __('Runners') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('gender') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dob') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phone_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('vehicle_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('current_locatioin') ?></th>
                <th scope="col"><?= $this->Paginator->sort('loc_lat') ?></th>
                <th scope="col"><?= $this->Paginator->sort('loc_long') ?></th>
                <th scope="col"><?= $this->Paginator->sort('profile_pic') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_login') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($runners as $runner): ?>
            <tr>
                <td><?= $this->Number->format($runner->id) ?></td>
                <td><?= $runner->has('user') ? $this->Html->link($runner->user->id, ['controller' => 'Users', 'action' => 'view', $runner->user->id]) : '' ?></td>
                <td><?= h($runner->gender) ?></td>
                <td><?= h($runner->dob) ?></td>
                <td><?= h($runner->address) ?></td>
                <td><?= $this->Number->format($runner->phone_no) ?></td>
                <td><?= h($runner->vehicle_no) ?></td>
                <td><?= h($runner->current_locatioin) ?></td>
                <td><?= h($runner->loc_lat) ?></td>
                <td><?= h($runner->loc_long) ?></td>
                <td><?= h($runner->profile_pic) ?></td>
                <td><?= h($runner->last_login) ?></td>
                <td><?= h($runner->status) ?></td>
                <td><?= h($runner->created) ?></td>
                <td><?= h($runner->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $runner->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $runner->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $runner->id], ['confirm' => __('Are you sure you want to delete # {0}?', $runner->id)]) ?>
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
