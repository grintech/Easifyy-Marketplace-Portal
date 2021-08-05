<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Faq $faq
 */
?>
<style type="text/css">
    .select-dropdown.dropdown-trigger {
        display: none !important;
    }
    .grey-bg{
        background: #2e2e2e !important
    }
</style>
<nav class="large-3 medium-4 columns px-3 grey-bg" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Faq'), ['action' => 'edit', $faq->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Faq'), ['action' => 'delete', $faq->id], ['confirm' => __('Are you sure you want to delete # {0}?', $faq->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Faq'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Faq'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="faq view large-9 medium-8 columns content">
    <h3><?= h($faq->id) ?></h3>
    <table class="vertical-table table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($faq->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><h4><?= __('Question') ?></h4></th>
            <td><?= $this->Text->autoParagraph(h($faq->question)); ?></td>
        </tr>
        <tr>
            <th scope="row"><h4><?= __('Answer') ?></h4></th>
            <td><?= $this->Text->autoParagraph(h($faq->answer)); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created At') ?></th>
            <td><?= h($faq->created_at) ?></td>
        </tr>
    </table>
    <!--<div class="row">
        <h4><?= __('Question') ?></h4>
        <?= $this->Text->autoParagraph(h($faq->question)); ?>
    </div>
    <div class="row">
        <h4><?= __('Answer') ?></h4>
        <?= $this->Text->autoParagraph(h($faq->answer)); ?>
    </div>-->
</div>
