<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MerchantGallery $merchantGallery
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Merchant Gallery'), ['action' => 'edit', $merchantGallery->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Merchant Gallery'), ['action' => 'delete', $merchantGallery->id], ['confirm' => __('Are you sure you want to delete # {0}?', $merchantGallery->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Merchant Galleries'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Merchant Gallery'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Merchants'), ['controller' => 'Merchants', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Merchant'), ['controller' => 'Merchants', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="merchantGalleries view large-9 medium-8 columns content">
    <h3><?= h($merchantGallery->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Merchant') ?></th>
            <td><?= $merchantGallery->has('merchant') ? $this->Html->link($merchantGallery->merchant->id, ['controller' => 'Merchants', 'action' => 'view', $merchantGallery->merchant->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($merchantGallery->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Url') ?></th>
            <td><?= h($merchantGallery->url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($merchantGallery->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($merchantGallery->created) ?></td>
        </tr>
    </table>
</div>
