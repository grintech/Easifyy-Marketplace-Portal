<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MerchantProductCategory[]|\Cake\Collection\CollectionInterface $merchantProductCategories
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Merchant Product Category'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Merchant Products'), ['controller' => 'MerchantProducts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Merchant Product'), ['controller' => 'MerchantProducts', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="merchantProductCategories index large-9 medium-8 columns content">
    <h3><?= __('Merchant Product Categories') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('merchant_product_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('category_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($merchantProductCategories as $merchantProductCategory): ?>
            <tr>
                <td><?= $this->Number->format($merchantProductCategory->id) ?></td>
                <td><?= $merchantProductCategory->has('merchant_product') ? $this->Html->link($merchantProductCategory->merchant_product->title, ['controller' => 'MerchantProducts', 'action' => 'view', $merchantProductCategory->merchant_product->id]) : '' ?></td>
                <td><?= $merchantProductCategory->has('category') ? $this->Html->link($merchantProductCategory->category->name, ['controller' => 'Categories', 'action' => 'view', $merchantProductCategory->category->id]) : '' ?></td>
                <td><?= h($merchantProductCategory->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $merchantProductCategory->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $merchantProductCategory->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $merchantProductCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $merchantProductCategory->id)]) ?>
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
