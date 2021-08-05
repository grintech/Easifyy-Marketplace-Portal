<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RewardPoint[]|\Cake\Collection\CollectionInterface $rewardPoints
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Reward Point'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="rewardPoints index large-9 medium-8 columns content">
    <h3><?= __('Reward Points') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('coins') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_last_change') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_added') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_expire') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rewardPoints as $rewardPoint): ?>
            <tr>
                <td><?= $this->Number->format($rewardPoint->id) ?></td>
                <td><?= $rewardPoint->has('user') ? $this->Html->link($rewardPoint->user->id, ['controller' => 'Users', 'action' => 'view', $rewardPoint->user->id]) : '' ?></td>
                <td><?= $this->Number->format($rewardPoint->coins) ?></td>
                <td><?= h($rewardPoint->date_last_change) ?></td>
                <td><?= h($rewardPoint->date_added) ?></td>
                <td><?= h($rewardPoint->date_expire) ?></td>
                <td><?= h($rewardPoint->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $rewardPoint->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $rewardPoint->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $rewardPoint->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rewardPoint->id)]) ?>
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
