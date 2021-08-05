<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Purchase[]|\Cake\Collection\CollectionInterface $purchases
 */
?>

<div class="card card-tabs">
    <div class="card-content">
    
        <table class="responsive-table bordered">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('supplier_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('amount', [ __('Amount') ]) ?></th>
                    <th scope="col"><?= $this->Paginator->sort('mode', [ __('Mode') ]) ?></th>
                    <th scope="col"><?= $this->Paginator->sort('invoice_number', [ __('Invoice number') ]) ?></th>
                    <th scope="col"><?= $this->Paginator->sort('paid', [ __('Paid') ]) ?></th>
                    <th scope="col"><?= $this->Paginator->sort('unpaid', [ __('Unpaid') ]) ?></th>
                    <th scope="col"><?= $this->Paginator->sort('invoice_date', [ __('Invoice Date') ]) ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($purchases as $purchase): ?>
                <tr>
                    <td><?= $this->Number->format($purchase->id) ?></td>
                    <td><?= $purchase->has('supplier') ? $this->Html->link($purchase->supplier->id, ['controller' => 'Suppliers', 'action' => 'view', $purchase->supplier->id]) : '' ?></td>
                    <td><?= $this->Number->format($purchase->amount) ?></td>
                    <td><?= h($purchase->mode) ?></td>
                    <td><?= h($purchase->invoice_number) ?></td>
                    <td><?= $this->Number->format($purchase->paid) ?></td>
                    <td><?= $this->Number->format($purchase->unpaid) ?></td>
                    <td><?= h($purchase->invoice_date) ?></td>
                    <td class="actions">
                        
                        <a title="View" href="<?= $this->Url->build(['action' => 'view', $purchase->id] ) ?>" class="btn-floating mb-1 waves-effect waves-light cyan">
                            <i class="material-icons">remove_red_eye</i>
                        </a>
                        <a title="Edit" href="<?= $this->Url->build(['action' => 'edit', $purchase->id] ) ?>" class="btn-floating mb-1 waves-effect waves-light amber darken-4">
                            <i class="material-icons">edit</i>
                        </a>
                        <a title="Delete" href="<?= $this->Url->build(['action' => 'delete', $purchase->id] ) ?>" class="btn-floating mb-1 waves-effect waves-light red accent-2" onclick="return confirm('Are you sure?')">
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
