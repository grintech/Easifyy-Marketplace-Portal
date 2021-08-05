<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrderPayment $orderPayment
 */
?>

<div class="orderPayments view large-9 medium-8 columns content">
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Order') ?></th>
            <td><?= $orderPayment->has('order') ? $this->Html->link($orderPayment->order->id, ['controller' => 'Orders', 'action' => 'view', $orderPayment->order->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Name') ?></th>
            <td><?= $orderPayment->has('user') ? $this->Html->link($orderPayment->user->first_name ." ". $orderPayment->user->last_name, ['controller' => 'Users', 'action' => 'view', $orderPayment->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('PSP Name') ?></th>
            <td><?= $orderPayment->has('merchant') ? $this->Html->link($orderPayment->merchant->store_name ." ".$orderPayment->merchant->last_name, ['controller' => 'Merchants', 'action' => 'view', $orderPayment->merchant->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Razorpay Payment Id') ?></th>
            <td><?= h($orderPayment->razorpay_payment_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('TransactionId') ?></th>
            <td><?= h($orderPayment->transactionId) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($orderPayment->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount') ?></th>
            <td><?= $this->Number->format($orderPayment->amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Transaction Status') ?></th>
            <td>
                <?php if($orderPayment->transaction_status==1): ?>
                    <span class="badge badge-success">Successful</span>
                <?php else: ?>
                    <span class="badge badge-secondary">Un-Successful</span>
                <?php endif ?>
            </td>
        </tr>
        <tr>
            <th scope="row"><?= __('Transaction Date') ?></th>
            <td><?= h($orderPayment->transaction_date) ?></td>
        </tr>
        <!--<tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($orderPayment->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($orderPayment->modified) ?></td>
        </tr>-->
    </table>
</div>
