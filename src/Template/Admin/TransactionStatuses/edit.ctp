<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TransactionStatus $transactionStatus
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $transactionStatus->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $transactionStatus->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Transaction Statuses'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Merchant Transactions'), ['controller' => 'MerchantTransactions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Merchant Transaction'), ['controller' => 'MerchantTransactions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="transactionStatuses form large-9 medium-8 columns content">
    <?= $this->Form->create($transactionStatus) ?>
    <fieldset>
        <legend><?= __('Edit Transaction Status') ?></legend>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
