<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Supplier $supplier
 */
?>

<div class="suppliers view large-9 medium-8 columns content">
    <h3><?= h($supplier->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Merchant') ?></th>
            <td><?= $supplier->has('merchant') ? $this->Html->link($supplier->merchant->id, ['controller' => 'Merchants', 'action' => 'view', $supplier->merchant->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('State') ?></th>
            <td><?= $supplier->has('state') ? $this->Html->link($supplier->state->name, ['controller' => 'States', 'action' => 'view', $supplier->state->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('City') ?></th>
            <td><?= $supplier->has('city') ? $this->Html->link($supplier->city->name, ['controller' => 'Cities', 'action' => 'view', $supplier->city->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __(' Name') ?></th>
            <td><?= h($supplier->_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($supplier->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gst No') ?></th>
            <td><?= h($supplier->gst_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('License Number') ?></th>
            <td><?= h($supplier->license_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pan') ?></th>
            <td><?= h($supplier->pan) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($supplier->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($supplier->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($supplier->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $supplier->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Address') ?></h4>
        <?= $this->Text->autoParagraph(h($supplier->address)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Purchases') ?></h4>
        <?php if (!empty($supplier->purchases)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Supplier Id') ?></th>
                <th scope="col"><?= __('Merchant Id') ?></th>
                <th scope="col"><?= __('Amount') ?></th>
                <th scope="col"><?= __('Mode') ?></th>
                <th scope="col"><?= __('Bank Details') ?></th>
                <th scope="col"><?= __('Invoice Number') ?></th>
                <th scope="col"><?= __('Paid') ?></th>
                <th scope="col"><?= __('Unpaid') ?></th>
                <th scope="col"><?= __('Invoice Date') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Updated') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($supplier->purchases as $purchases): ?>
            <tr>
                <td><?= h($purchases->id) ?></td>
                <td><?= h($purchases->supplier_id) ?></td>
                <td><?= h($purchases->merchant_id) ?></td>
                <td><?= h($purchases->amount) ?></td>
                <td><?= h($purchases->mode) ?></td>
                <td><?= h($purchases->bank_details) ?></td>
                <td><?= h($purchases->invoice_number) ?></td>
                <td><?= h($purchases->paid) ?></td>
                <td><?= h($purchases->unpaid) ?></td>
                <td><?= h($purchases->invoice_date) ?></td>
                <td><?= h($purchases->created) ?></td>
                <td><?= h($purchases->updated) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Purchases', 'action' => 'view', $purchases->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Purchases', 'action' => 'edit', $purchases->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Purchases', 'action' => 'delete', $purchases->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchases->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
