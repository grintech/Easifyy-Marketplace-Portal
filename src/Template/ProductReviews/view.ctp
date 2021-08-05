<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductReview $productReview
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Product Review'), ['action' => 'edit', $productReview->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Product Review'), ['action' => 'delete', $productReview->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productReview->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Product Reviews'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Review'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="productReviews view large-9 medium-8 columns content">
    <h3><?= h($productReview->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Product') ?></th>
            <td><?= $productReview->has('product') ? $this->Html->link($productReview->product->title, ['controller' => 'Products', 'action' => 'view', $productReview->product->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($productReview->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rating') ?></th>
            <td><?= $this->Number->format($productReview->rating) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created At') ?></th>
            <td><?= h($productReview->created_at) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Reviewer Name') ?></h4>
        <?= $this->Text->autoParagraph(h($productReview->reviewer_name)); ?>
    </div>
    <div class="row">
        <h4><?= __('Review Text') ?></h4>
        <?= $this->Text->autoParagraph(h($productReview->review_text)); ?>
    </div>
</div>
