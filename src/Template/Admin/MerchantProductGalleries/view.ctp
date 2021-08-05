<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MerchantProductGallery $merchantProductGallery
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Merchant Product Gallery'), ['action' => 'edit', $merchantProductGallery->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Merchant Product Gallery'), ['action' => 'delete', $merchantProductGallery->id], ['confirm' => __('Are you sure you want to delete # {0}?', $merchantProductGallery->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Merchant Product Galleries'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Merchant Product Gallery'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Merchant Products'), ['controller' => 'MerchantProducts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Merchant Product'), ['controller' => 'MerchantProducts', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="merchantProductGalleries view large-9 medium-8 columns content">
    <h3><?= h($merchantProductGallery->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Merchant Product') ?></th>
            <td><?= $merchantProductGallery->has('merchant_product') ? $this->Html->link($merchantProductGallery->merchant_product->title, ['controller' => 'MerchantProducts', 'action' => 'view', $merchantProductGallery->merchant_product->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($merchantProductGallery->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Url') ?></th>
            <td><?= h($merchantProductGallery->url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($merchantProductGallery->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($merchantProductGallery->created) ?></td>
        </tr>
    </table>
</div>
