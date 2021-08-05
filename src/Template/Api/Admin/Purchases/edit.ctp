<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Purchase $purchase
 */
$this->Form->templates([
    'inputContainer' => '{{content}}'
]);
?>
<?= $this->Form->create($purchase) ?>
<div class="row">
    <div class="col-md-9">
        <div class="card">
            <h5 class="card-header m-0"><?php echo __('Basic Details'); ?></h5>
            <div class="card-body">
                <div class="card-text w-50 float-left p-1">
                    <label><?php echo __('Supplier'); ?></label>
                    <span>
                        <?= $this->Form->control('supplier_id', ['options' => $suppliers]) ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <label><?php echo __('Merchant'); ?></label>
                    <span>
                        <?= $this->Form->control('merchant_id', ['options' => $merchants]) ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <label><?php echo __('Amount'); ?></label>
                    <span>
                        <?= $this->Form->control('amount') ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <label><?php echo __('Mode'); ?></label>
                    <span>
                        <?= $this->Form->control('mode') ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <label><?php echo __('Bank details'); ?></label>
                    <span>
                        <?= $this->Form->control('bank_details') ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <label><?php echo __('Invoice number'); ?></label>
                    <span>
                        <?= $this->Form->control('invoice_number') ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <label><?php echo __('Paid'); ?></label>
                    <span>
                        <?= $this->Form->control('paid') ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <label><?php echo __('Unpaid'); ?></label>
                    <span>
                        <?= $this->Form->control('unpaid') ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <label><?php echo __('Invoice Date'); ?></label>
                    <span>
                        <?= $this->Form->control('invoice_date', ['type' => 'text']) ?>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card">
            <h5 class="card-header m-0"><?php echo __('Save'); ?></h5>
            <div class="card-body">
                <?php echo $this->Form->submit(__('Save'), array( 'class' => 'btn btn-primary' ) ); ?>
            </div>
        </div>   
    </div>
</div>
<?= $this->Form->end() ?>
