<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BusinessSupport[]|\Cake\Collection\CollectionInterface $businessSupport
 */
?>
<nav class="large-3 medium-4 columns " id="actions-sidebar" style="background: #E2DBFF;color:#2e2e2e">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Business Support'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="businessSupport index large-9 medium-8 columns content">
    <h3><?= __('Business Support') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_at') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($businessSupport as $businessSupport): ?>
            <tr>
                <td><?= $this->Number->format($businessSupport->id) ?></td>
                <td><?= h($businessSupport->name) ?></td>
                <td><?= h($businessSupport->description) ?></td>
                <td><?= h($businessSupport->created_at) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $businessSupport->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $businessSupport->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $businessSupport->id], ['confirm' => __('Are you sure you want to delete # {0}?', $businessSupport->id)]) ?>
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
