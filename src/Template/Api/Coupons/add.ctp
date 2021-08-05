<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Coupon $coupon
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Coupons'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Merchants'), ['controller' => 'Merchants', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Merchant'), ['controller' => 'Merchants', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="coupons form large-9 medium-8 columns content">
    <?= $this->Form->create($coupon) ?>
    <fieldset>
        <legend><?= __('Add Coupon') ?></legend>
        <?php
            echo $this->Form->control('merchant_id', ['options' => $merchants, 'empty' => true]);
            echo $this->Form->control('coupon_code');
            echo $this->Form->control('discount');
            echo $this->Form->control('discount_type');
            echo $this->Form->control('description');
            echo $this->Form->control('expire', ['empty' => true]);
            echo $this->Form->control('user_usage_limit');
            echo $this->Form->control('usage_limit');
            echo $this->Form->control('minimum_spend');
            echo $this->Form->control('maximum_spend');
            echo $this->Form->control('max_amount');
            echo $this->Form->control('usage_count');
            echo $this->Form->control('coupon_applicable');
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
