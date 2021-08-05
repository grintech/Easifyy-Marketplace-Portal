<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrderPayment $orderPayment
 */
?>

<div class="orderPayments form large-9 medium-8 columns content">
    <?= $this->Form->create($orderPayment) ?>
    <fieldset>
        <legend><?= __('Edit Order Payment') ?></legend>
        <?php
            echo $this->Form->control('order_id', ['options' => $orders]);
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('merchant_id', ['options' => $merchants]);
            echo $this->Form->control('transactionId');
            echo $this->Form->control('amount');
            echo $this->Form->control('transaction_date', ['empty' => true]);
            echo $this->Form->control('transaction_status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
