<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 */
?>

<div class="orders form large-9 medium-8 columns content">
    <?= $this->Form->create($order) ?>
    <fieldset>
        <legend><?= __('Add Order') ?></legend>
        <?php
            echo $this->Form->control('merchant_id', ['options' => $merchants]);
            echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->control('address_id', ['options' => $addresses, 'empty' => true]);
            echo $this->Form->control('coupon_id', ['options' => $coupons, 'empty' => true]);
            echo $this->Form->control('runner_id', ['options' => $runners, 'empty' => true]);
            echo $this->Form->control('order_mode_id', ['options' => $orderModes, 'empty' => true]);
            echo $this->Form->control('order_status_id', ['options' => $orderStatuses, 'empty' => true]);
            echo $this->Form->control('igst');
            echo $this->Form->control('cgst');
            echo $this->Form->control('sgst');
            echo $this->Form->control('shipping');
            echo $this->Form->control('delivery_time');
            echo $this->Form->control('gross_total');
            echo $this->Form->control('total');
            echo $this->Form->control('order_notes');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
