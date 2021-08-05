<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductGallery[]|\Cake\Collection\CollectionInterface $productGalleries
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Product Gallery'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="productGalleries index large-9 medium-8 columns content">
    <h3><?= __('Product Galleries') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('url') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productGalleries as $productGallery): ?>
            <tr>
                <td><?= $this->Number->format($productGallery->id) ?></td>
                <td><?= $productGallery->has('product') ? $this->Html->link($productGallery->product->title, ['controller' => 'Products', 'action' => 'view', $productGallery->product->id]) : '' ?></td>
                <td><?= h($productGallery->type) ?></td>
                <td><?= h($productGallery->url) ?></td>
                <td><?= h($productGallery->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $productGallery->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $productGallery->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $productGallery->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productGallery->id)]) ?>
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
