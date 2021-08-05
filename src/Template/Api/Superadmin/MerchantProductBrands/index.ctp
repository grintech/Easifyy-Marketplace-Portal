<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MerchantProductBrand[]|\Cake\Collection\CollectionInterface $merchantProductBrands
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Merchant Product Brand'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Merchant Products'), ['controller' => 'MerchantProducts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Merchant Product'), ['controller' => 'MerchantProducts', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Brands'), ['controller' => 'Brands', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Brand'), ['controller' => 'Brands', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="merchantProductBrands index large-9 medium-8 columns content">
    <h3><?= __('Merchant Product Brands') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('merchant_product_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('brand_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($merchantProductBrands as $merchantProductBrand): ?>
            <tr>
                <td><?= $this->Number->format($merchantProductBrand->id) ?></td>
                <td><?= $merchantProductBrand->has('merchant_product') ? $this->Html->link($merchantProductBrand->merchant_product->title, ['controller' => 'MerchantProducts', 'action' => 'view', $merchantProductBrand->merchant_product->id]) : '' ?></td>
                <td><?= $merchantProductBrand->has('brand') ? $this->Html->link($merchantProductBrand->brand->name, ['controller' => 'Brands', 'action' => 'view', $merchantProductBrand->brand->id]) : '' ?></td>
                <td><?= h($merchantProductBrand->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $merchantProductBrand->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $merchantProductBrand->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $merchantProductBrand->id], ['confirm' => __('Are you sure you want to delete # {0}?', $merchantProductBrand->id)]) ?>
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
