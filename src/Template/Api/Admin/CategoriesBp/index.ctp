<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CategoriesBp[]|\Cake\Collection\CollectionInterface $categoriesBp
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Categories Bp'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="categoriesBp index large-9 medium-8 columns content">
    <h3><?= __('Categories Bp') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('parent_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('slug') ?></th>
                <th scope="col"><?= $this->Paginator->sort('image') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categoriesBp as $categoriesBp): ?>
            <tr>
                <td><?= $this->Number->format($categoriesBp->id) ?></td>
                <td><?= $categoriesBp->has('parent_categories_bp') ? $this->Html->link($categoriesBp->parent_categories_bp->name, ['controller' => 'CategoriesBp', 'action' => 'view', $categoriesBp->parent_categories_bp->id]) : '' ?></td>
                <td><?= h($categoriesBp->name) ?></td>
                <td><?= h($categoriesBp->slug) ?></td>
                <td><?= h($categoriesBp->image) ?></td>
                <td><?= h($categoriesBp->status) ?></td>
                <td><?= h($categoriesBp->created) ?></td>
                <td><?= h($categoriesBp->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $categoriesBp->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $categoriesBp->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $categoriesBp->id], ['confirm' => __('Are you sure you want to delete # {0}?', $categoriesBp->id)]) ?>
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
