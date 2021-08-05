<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Dashboard[]|\Cake\Collection\CollectionInterface $dashboard
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Dashboard'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="dashboard index large-9 medium-8 columns content">
    <h3><?= __('Dashboard') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('meta_key') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dashboard as $dashboard): ?>
            <tr>
                <td><?= $this->Number->format($dashboard->id) ?></td>
                <td><?= h($dashboard->meta_key) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $dashboard->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $dashboard->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $dashboard->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dashboard->id)]) ?>
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
