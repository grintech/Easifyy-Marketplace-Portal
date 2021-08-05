<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrderPayment[]|\Cake\Collection\CollectionInterface $orderPayments
 */
?>

<div class="card card-tabs">
    <div class="card-content">
    
        <table class="responsive-table bordered">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('order_id', [__('Order id')]) ?></th>
                    <th scope="col"><?= $this->Paginator->sort('transactionId', [__('Transaction id')]) ?></th>
                    <th scope="col"><?= $this->Paginator->sort('amount', [__('Amout')]) ?></th>
                    <th scope="col"><?= $this->Paginator->sort('transaction_date', [__('Transaction date')]) ?></th>
                    <th scope="col"><?= $this->Paginator->sort('transaction_status', [__('Transaction status')]) ?></th>
                    <th scope="col"><?= $this->Paginator->sort('created', [__('Created')]) ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orderPayments as $orderPayment): ?>
                <tr>
                    <td><?= $orderPayment->has('order') ? $this->Html->link($orderPayment->order->id, ['controller' => 'Orders', 'action' => 'view', $orderPayment->order->id]) : '' ?></td>
                    <td><?= h($orderPayment->transactionId) ?></td>
                    <td><?= $this->Number->format($orderPayment->amount) ?></td>
                    <td><?= h($orderPayment->transaction_date) ?></td>
                    <td><?= $this->Number->format($orderPayment->transaction_status) ?></td>
                    <td><?= h($orderPayment->created) ?></td>
                    <td class="actions">
                        
                        <a title="View" href="<?= $this->Url->build(['action' => 'view', $orderPayment->id] ) ?>" class="btn-floating mb-1 waves-effect waves-light cyan">
                            <i class="material-icons">remove_red_eye</i>
                        </a>
                        <a title="Edit" href="<?= $this->Url->build(['action' => 'edit', $orderPayment->id] ) ?>" class="btn-floating mb-1 waves-effect waves-light amber darken-4">
                            <i class="material-icons">edit</i>
                        </a>
                        <a title="Delete" href="<?= $this->Url->build(['action' => 'delete', $orderPayment->id] ) ?>" class="btn-floating mb-1 waves-effect waves-light red accent-2" onclick="return confirm('Are you sure?')">
                            <i class="material-icons">delete</i>
                        </a>

                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="paginator">
            <ul class="pagination">
                <?= $this->Paginator->first('<< ' . __('First')) ?>
                <?= $this->Paginator->prev('< ' . __('Previous')) ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next(__('Next') . ' >') ?>
                <?= $this->Paginator->last(__('Last') . ' >>') ?>
            </ul>
            <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
        </div>
    </div>
</div>
