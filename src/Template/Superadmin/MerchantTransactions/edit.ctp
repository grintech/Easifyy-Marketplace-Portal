<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MerchantTransaction $merchantTransaction
 */
$myTemplates = [
    'inputContainer' => '{{content}}',
];
$this->Form->setTemplates($myTemplates);
?>

<?= $this->Form->create($merchantTransaction) ?>
<div class="row">
    <div class="col-md-9">
        <div class="card">
            <h5 class="card-header m-0">Transaction Information</h5>
            <div class="card-body">
                <div class="card-text w-50 float-left p-1">
                    <span>
                        <?= $this->Form->control('merchant_id', ['options' => $merchants]) ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <span>
                        <?= $this->Form->control('bank_account_id', ['options' => $bankAccounts]) ?>
                    </span>
                </div>
                
            </div>
            <div class="card-body">
                <div class="card-text w-50 float-left p-1">
                    <span>
                        <?= $this->Form->control('total_orders_amount') ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <span>
                        <?= $this->Form->control('admin_coupon_discount') ?>
                    </span>
                </div>
                
            </div>
            <div class="card-body">
                <div class="card-text w-50 float-left p-1">
                    <span>
                        <?= $this->Form->control('merchant_coupon_discount') ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <span>
                        <?= $this->Form->control('commission') ?>
                    </span>
                </div>
                
            </div>
            <div class="card-body">
                <div class="card-text w-50 float-left p-1">
                    <span>
                        <?= $this->Form->control('amount_payable') ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <span>
                        <?= $this->Form->control('notes') ?>
                    </span>
                </div>
                
            </div>
            <div class="card-body">
                <div class="card-text w-50 float-left p-1">
                    <span>
                        <?= $this->Form->control('transaction_status_id', ['options' => $transactionStatuses, 'empty' => true]) ?>
                    </span>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="card">
            <h5 class="card-header m-0">Action</h5>
            <div class="card-body">
                <div class="card-text">
                    <?= $this->Form->button(__('Submit'), [ "class" => "waves-effect waves-light btn-small mb-1" ]) ?>
                </div>
                
            </div>
            
        </div>
    </div>
</div>
<?= $this->Form->end() ?>