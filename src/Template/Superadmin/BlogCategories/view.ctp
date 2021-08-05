<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BlogCategory $blogCategory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Blog Category'), ['action' => 'edit', $blogCategory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Blog Category'), ['action' => 'delete', $blogCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $blogCategory->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Blog Categories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Blog Category'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="blogCategories view large-9 medium-8 columns content">
    <h3><?= h($blogCategory->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($blogCategory->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Slug') ?></th>
            <td><?= h($blogCategory->slug) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($blogCategory->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($blogCategory->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created At') ?></th>
            <td><?= h($blogCategory->created_at) ?></td>
        </tr>
    </table>
</div>
