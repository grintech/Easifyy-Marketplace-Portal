<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MerchantTransaction $merchantTransaction
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header m-0">Basic Details</h5>
            <div class="card-body">
                <div class="card-text w-50 float-left p-1">
                    <label><?= __('Merchant') ?></label>
                    <span>
                        <?= $merchantTransaction->has('merchant') ? $this->Html->link($merchantTransaction->merchant->id, ['controller' => 'Merchants', 'action' => 'view', $merchantTransaction->merchant->id]) : '' ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <label><?= __('Bank Account') ?></label>
                    <span>
                        <?= $merchantTransaction->has('bank_account') ? $this->Html->link($merchantTransaction->bank_account->id, ['controller' => 'BankAccounts', 'action' => 'view', $merchantTransaction->bank_account->id]) : '' ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <label><?= __('Notes') ?></label>
                    <span>
                        <?= h($merchantTransaction->notes) ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <label><?= __('Transaction Status') ?></label>
                    <span>
                        <?= $merchantTransaction->has('transaction_status') ? $this->Html->link($merchantTransaction->transaction_status->name, ['controller' => 'TransactionStatuses', 'action' => 'view', $merchantTransaction->transaction_status->id]) : '' ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <label><?= __('Id') ?></label>
                    <span>
                        <?= $this->Number->format($merchantTransaction->id) ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <label><?= __('Total Orders Amount') ?></label>
                    <span>
                        <?= $this->Number->format($merchantTransaction->total_orders_amount) ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <label><?= __('Admin Coupon Discount') ?></label>
                    <span>
                        <?= $this->Number->format($merchantTransaction->admin_coupon_discount) ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <label><?= __('Merchant Coupon Discount') ?></label>
                    <span>
                        <?= $this->Number->format($merchantTransaction->merchant_coupon_discount) ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <label><?= __('Commission') ?></label>
                    <span>
                        <?= $this->Number->format($merchantTransaction->commission) ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <label><?= __('Amount Payable') ?></label>
                    <span>
                        <?= $this->Number->format($merchantTransaction->commission) ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <label><?= __('Created') ?></label>
                    <span>
                        <?= h($merchantTransaction->created) ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <label><?= __('Modified') ?></label>
                    <span>
                        <?= h($merchantTransaction->modified) ?>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header m-0"><?= __('Payout') ?></h5>
            <div class="card-body">
                
                <?php if (!empty($merchantTransaction->merchant_payouts)): ?>
                <table cellpadding="0" cellspacing="0">
                    <tr>
                        <th scope="col"><?= __('Id') ?></th>
                        <th scope="col"><?= __('Merchant Transaction Id') ?></th>
                        <th scope="col"><?= __('Order Id') ?></th>
                        <th scope="col"><?= __('Is Admin Copoun') ?></th>
                        <th scope="col"><?= __('Coupon Discount') ?></th>
                        <th scope="col"><?= __('Created') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                    <?php foreach ($merchantTransaction->merchant_payouts as $merchantPayouts): ?>
                    <tr>
                        <td><?= h($merchantPayouts->id) ?></td>
                        <td><?= h($merchantPayouts->merchant_transaction_id) ?></td>
                        <td><?= h($merchantPayouts->order_id) ?></td>
                        <td><?= h($merchantPayouts->is_admin_copoun) ?></td>
                        <td><?= h($merchantPayouts->coupon_discount) ?></td>
                        <td><?= h($merchantPayouts->created) ?></td>
                        <td class="actions">
                            
                            <a title="View" href="<?= $this->Url->build(['controller' => 'MerchantPayouts', 'action' => 'view', $merchantPayouts->id] ) ?>" class="btn-floating mb-1 waves-effect waves-light cyan">
                                <i class="material-icons">remove_red_eye</i>
                            </a>
                            <a title="Edit" href="<?= $this->Url->build(['controller' => 'MerchantPayouts', 'action' => 'edit', $merchantPayouts->id] ) ?>" class="btn-floating mb-1 waves-effect waves-light amber darken-4">
                                <i class="material-icons">edit</i>
                            </a>
                            <a title="Delete" href="<?= $this->Url->build(['controller' => 'MerchantPayouts', 'action' => 'delete', $merchantPayouts->id] ) ?>" class="btn-floating mb-1 waves-effect waves-light red accent-2">
                                <i class="material-icons">delete</i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
                <?php endif; ?>    
            </div>
            
        </div>
    </div>
</div>