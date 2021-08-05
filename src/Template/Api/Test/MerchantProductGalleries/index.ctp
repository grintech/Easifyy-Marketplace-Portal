<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MerchantProductGallery[]|\Cake\Collection\CollectionInterface $merchantProductGalleries
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Merchant Product Gallery'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Merchant Products'), ['controller' => 'MerchantProducts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Merchant Product'), ['controller' => 'MerchantProducts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="merchantProductGalleries index large-9 medium-8 columns content">
    <h3><?= __('Merchant Product Galleries') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('merchant_product_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('url') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($merchantProductGalleries as $merchantProductGallery): ?>
            <tr>
                <td><?= $this->Number->format($merchantProductGallery->id) ?></td>
                <td><?= $merchantProductGallery->has('merchant_product') ? $this->Html->link($merchantProductGallery->merchant_product->title, ['controller' => 'MerchantProducts', 'action' => 'view', $merchantProductGallery->merchant_product->id]) : '' ?></td>
                <td><?= h($merchantProductGallery->type) ?></td>
                <td><?= h($merchantProductGallery->url) ?></td>
                <td><?= h($merchantProductGallery->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $merchantProductGallery->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $merchantProductGallery->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $merchantProductGallery->id], ['confirm' => __('Are you sure you want to delete # {0}?', $merchantProductGallery->id)]) ?>
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
