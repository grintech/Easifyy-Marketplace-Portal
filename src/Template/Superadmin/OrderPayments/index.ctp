<?php
//dd('s');
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrderPayment[]|\Cake\Collection\CollectionInterface $orderPayments
 */
?>

<div class="card card-tabs">
    <div class="card-content">
        <table class="responsive-table bordered">
            <thead>
                <tr class="row-bg">
                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('order_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('merchant_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('transactionId') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('amount') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('transaction_date') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('transaction_status') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                    <th scope="col" class="actions" width="15%"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orderPayments as $orderPayment): ?>
                <tr>
                    <td><?= $this->Number->format($orderPayment->id) ?></td>
                    <td><?= $orderPayment->has('order') ? $this->Html->link($orderPayment->order->id, ['controller' => 'Orders', 'action' => 'view', $orderPayment->order->id]) : '' ?></td>
                    <td>
                        <?= $orderPayment->has('user') ? $this->Html->link($orderPayment->user->first_name ." ". $orderPayment->user->last_name, ['controller' => 'Users', 'action' => 'view', $orderPayment->user->id ]) : '' ?>
                    </td>
                    <td>
                        <?= $orderPayment->has('merchant') ? $this->Html->link($orderPayment->merchant->store_name ." ".$orderPayment->merchant->last_name, ['controller' => 'Merchants', 'action' => 'view',$orderPayment->merchant->id ]) : '' ?>
                    </td>
                    <td><?= h($orderPayment->transactionId) ?></td>
                    <td><?= $this->Number->format($orderPayment->amount) ?></td>
                    <td><?= h($orderPayment->transaction_date) ?></td>
                    <td>
                        <?php if($orderPayment->transaction_status==1): ?>
                            <span class="badge badge-success">Successful</span>
                        <?php else: ?>
                            <span class="badge badge-secondary">Un-Successful</span>
                        <?php endif ?>
                    </td>
                    <td><?= h($orderPayment->created) ?></td>
                    <td><?= h($orderPayment->modified) ?></td>
                    <td class="actions">
                        
                        <a title="View" href="<?= $this->Url->build(['action' => 'view', $orderPayment->id] ) ?>" class="btn">
                            <i class="material-icons">remove_red_eye</i>
                        </a>
                        <!--<a title="Edit" href="<?= $this->Url->build(['action' => 'edit', $orderPayment->id] ) ?>" class="btn">
                            <i class="material-icons">edit</i>
                        </a>-->
                        <!--<a title="Delete" href="<?= $this->Url->build(['action' => 'delete', $orderPayment->id] ) ?>" class="btn">
                            <i class="material-icons">delete</i>
                        </a>-->
                        
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="paginator">
            <ul class="pagination">
                <?= $this->Paginator->first('<< ' . __('first')) ?>
                <?= $this->Paginator->prev('< ' . __('previous')) ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next(__('next') . ' >') ?>
                <?= $this->Paginator->last(__('last') . ' >>') ?>
            </ul>
            <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
        </div>
    </div>    
</div>
