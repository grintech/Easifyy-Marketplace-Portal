<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MerchantGallery $merchantGallery
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $merchantGallery->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $merchantGallery->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Merchant Galleries'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Merchants'), ['controller' => 'Merchants', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Merchant'), ['controller' => 'Merchants', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="merchantGalleries form large-9 medium-8 columns content">
    <?= $this->Form->create($merchantGallery) ?>
    <fieldset>
        <legend><?= __('Edit Merchant Gallery') ?></legend>
        <?php
            echo $this->Form->control('merchant_id', ['options' => $merchants]);
            echo $this->Form->control('type');
            echo $this->Form->control('url');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
