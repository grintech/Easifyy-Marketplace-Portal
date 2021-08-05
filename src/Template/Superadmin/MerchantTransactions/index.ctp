<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MerchantTransaction[]|\Cake\Collection\CollectionInterface $merchantTransactions
 */
?>

<div class="card card-tabs">
    <div class="card-content">  
    
        <table class="responsive-table bordered">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('merchant_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('total_orders_amount') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('admin_coupon_discount', 'Discount Coupon') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('merchant_coupon_discount', 'Merchant Coupon') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('commission') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('amount_payable') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('notes') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('transaction_status_id', 'Status') ?></th>
                    
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($merchantTransactions as $merchantTransaction): ?>
                <tr>
                    <td><?= $this->Number->format($merchantTransaction->id) ?></td>
                    <td><?= $merchantTransaction->has('merchant') ? $this->Html->link($merchantTransaction->merchant->id, ['controller' => 'Merchants', 'action' => 'view', $merchantTransaction->merchant->id]) : '' ?></td>
                    
                    <td><?= $this->Number->format($merchantTransaction->total_orders_amount) ?></td>
                    <td><?= $this->Number->format($merchantTransaction->admin_coupon_discount) ?></td>
                    <td><?= $this->Number->format($merchantTransaction->merchant_coupon_discount) ?></td>
                    <td><?= $this->Number->format($merchantTransaction->commission) ?></td>
                    <td><?= $this->Number->format($merchantTransaction->amount_payable) ?></td>
                    <td><?= h($merchantTransaction->notes) ?></td>
                    <td><?= $merchantTransaction->has('transaction_status') ? $this->Html->link($merchantTransaction->transaction_status->name, ['controller' => 'TransactionStatuses', 'action' => 'view', $merchantTransaction->transaction_status->id]) : '' ?></td>
                    
                    <td class="actions">
                        
                        <a title="View" href="<?= $this->Url->build(['action' => 'view', $merchantTransaction->id] ) ?>" class="btn-floating mb-1 waves-effect waves-light cyan">
                            <i class="material-icons">remove_red_eye</i>
                        </a>
                        <a title="Edit" href="<?= $this->Url->build(['action' => 'edit', $merchantTransaction->id] ) ?>" class="btn-floating mb-1 waves-effect waves-light amber darken-4">
                            <i class="material-icons">edit</i>
                        </a>
                        <a title="Delete" href="<?= $this->Url->build(['action' => 'delete', $merchantTransaction->id] ) ?>" class="btn-floating mb-1 waves-effect waves-light red accent-2" onclick="return confirm('Are you sure?')">
                            <i class="material-icons">delete</i>
                        </a>
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
