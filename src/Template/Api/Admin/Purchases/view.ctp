<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Purchase $purchase
 */
?>

<div class="purchases view large-9 medium-8 columns content">
    <h3><?= h($purchase->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Supplier') ?></th>
            <td><?= $purchase->has('supplier') ? $this->Html->link($purchase->supplier->id, ['controller' => 'Suppliers', 'action' => 'view', $purchase->supplier->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Merchant') ?></th>
            <td><?= $purchase->has('merchant') ? $this->Html->link($purchase->merchant->id, ['controller' => 'Merchants', 'action' => 'view', $purchase->merchant->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mode') ?></th>
            <td><?= h($purchase->mode) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Bank Details') ?></th>
            <td><?= h($purchase->bank_details) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Invoice Number') ?></th>
            <td><?= h($purchase->invoice_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($purchase->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount') ?></th>
            <td><?= $this->Number->format($purchase->amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Paid') ?></th>
            <td><?= $this->Number->format($purchase->paid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Unpaid') ?></th>
            <td><?= $this->Number->format($purchase->unpaid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Invoice Date') ?></th>
            <td><?= h($purchase->invoice_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($purchase->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($purchase->updated) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Purchase Items') ?></h4>
        <?php if (!empty($purchase->purchase_items)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Purchase Id') ?></th>
                <th scope="col"><?= __('Merchant Product Id') ?></th>
                <th scope="col"><?= __('Quantity') ?></th>
                <th scope="col"><?= __('Purchase Price') ?></th>
                <th scope="col"><?= __('Price') ?></th>
                <th scope="col"><?= __('Sale Price') ?></th>
                <th scope="col"><?= __('Expiry') ?></th>
                <th scope="col"><?= __('Margin') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Updated') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($purchase->purchase_items as $purchaseItems): ?>
            <tr>
                <td><?= h($purchaseItems->id) ?></td>
                <td><?= h($purchaseItems->purchase_id) ?></td>
                <td><?= h($purchaseItems->merchant_product_id) ?></td>
                <td><?= h($purchaseItems->quantity) ?></td>
                <td><?= h($purchaseItems->purchase_price) ?></td>
                <td><?= h($purchaseItems->price) ?></td>
                <td><?= h($purchaseItems->sale_price) ?></td>
                <td><?= h($purchaseItems->expiry) ?></td>
                <td><?= h($purchaseItems->margin) ?></td>
                <td><?= h($purchaseItems->status) ?></td>
                <td><?= h($purchaseItems->created) ?></td>
                <td><?= h($purchaseItems->updated) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PurchaseItems', 'action' => 'view', $purchaseItems->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PurchaseItems', 'action' => 'edit', $purchaseItems->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PurchaseItems', 'action' => 'delete', $purchaseItems->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchaseItems->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
