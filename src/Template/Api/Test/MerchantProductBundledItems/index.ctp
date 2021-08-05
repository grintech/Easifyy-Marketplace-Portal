<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MerchantProductBundledItem[]|\Cake\Collection\CollectionInterface $merchantProductBundledItems
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Merchant Product Bundled Item'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Merchant Products'), ['controller' => 'MerchantProducts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Merchant Product'), ['controller' => 'MerchantProducts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="merchantProductBundledItems index large-9 medium-8 columns content">
    <h3><?= __('Merchant Product Bundled Items') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('bundled_parent') ?></th>
                <th scope="col"><?= $this->Paginator->sort('merchant_product_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mrp') ?></th>
                <th scope="col"><?= $this->Paginator->sort('price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total_price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($merchantProductBundledItems as $merchantProductBundledItem): ?>
            <tr>
                <td><?= $this->Number->format($merchantProductBundledItem->id) ?></td>
                <td><?= $this->Number->format($merchantProductBundledItem->bundled_parent) ?></td>
                <td><?= $merchantProductBundledItem->has('merchant_product') ? $this->Html->link($merchantProductBundledItem->merchant_product->title, ['controller' => 'MerchantProducts', 'action' => 'view', $merchantProductBundledItem->merchant_product->id]) : '' ?></td>
                <td><?= $this->Number->format($merchantProductBundledItem->mrp) ?></td>
                <td><?= $this->Number->format($merchantProductBundledItem->price) ?></td>
                <td><?= $this->Number->format($merchantProductBundledItem->quantity) ?></td>
                <td><?= $this->Number->format($merchantProductBundledItem->total_price) ?></td>
                <td><?= h($merchantProductBundledItem->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $merchantProductBundledItem->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $merchantProductBundledItem->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $merchantProductBundledItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $merchantProductBundledItem->id)]) ?>
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
