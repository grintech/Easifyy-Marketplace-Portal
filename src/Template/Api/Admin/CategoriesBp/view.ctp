<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CategoriesBp $categoriesBp
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Categories Bp'), ['action' => 'edit', $categoriesBp->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Categories Bp'), ['action' => 'delete', $categoriesBp->id], ['confirm' => __('Are you sure you want to delete # {0}?', $categoriesBp->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Categories Bp'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Categories Bp'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Parent Categories Bp'), ['controller' => 'CategoriesBp', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parent Categories Bp'), ['controller' => 'CategoriesBp', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Child Categories Bp'), ['controller' => 'CategoriesBp', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Child Categories Bp'), ['controller' => 'CategoriesBp', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="categoriesBp view large-9 medium-8 columns content">
    <h3><?= h($categoriesBp->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Parent Categories Bp') ?></th>
            <td><?= $categoriesBp->has('parent_categories_bp') ? $this->Html->link($categoriesBp->parent_categories_bp->name, ['controller' => 'CategoriesBp', 'action' => 'view', $categoriesBp->parent_categories_bp->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($categoriesBp->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Slug') ?></th>
            <td><?= h($categoriesBp->slug) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image') ?></th>
            <td><?= h($categoriesBp->image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($categoriesBp->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($categoriesBp->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($categoriesBp->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $categoriesBp->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($categoriesBp->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Categories Bp') ?></h4>
        <?php if (!empty($categoriesBp->child_categories_bp)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Parent Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Slug') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Image') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($categoriesBp->child_categories_bp as $childCategoriesBp): ?>
            <tr>
                <td><?= h($childCategoriesBp->id) ?></td>
                <td><?= h($childCategoriesBp->parent_id) ?></td>
                <td><?= h($childCategoriesBp->name) ?></td>
                <td><?= h($childCategoriesBp->slug) ?></td>
                <td><?= h($childCategoriesBp->description) ?></td>
                <td><?= h($childCategoriesBp->image) ?></td>
                <td><?= h($childCategoriesBp->status) ?></td>
                <td><?= h($childCategoriesBp->created) ?></td>
                <td><?= h($childCategoriesBp->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'CategoriesBp', 'action' => 'view', $childCategoriesBp->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'CategoriesBp', 'action' => 'edit', $childCategoriesBp->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'CategoriesBp', 'action' => 'delete', $childCategoriesBp->id], ['confirm' => __('Are you sure you want to delete # {0}?', $childCategoriesBp->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
