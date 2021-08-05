<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrderPayment $orderPayment
 */
?>
<?= $this->Form->create($orderPayment) ?>
<div class="row">
    <div class="col-md-9">
        <div class="card">
            <h5 class="card-header m-0">Order Payment Information</h5>
            <div class="card-body">
                <div class="card-text w-50 float-left p-1">
                    <span>
                        <?= $this->Form->control('order_id', ['options' => $orders]) ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <span>
                        <?= $this->Form->control('user_id', ['options' => $users]) ?>
                    </span>
                </div>
            </div>
            <div class="card-body">
                <div class="card-text w-50 float-left p-1">
                    <span>
                        <?= $this->Form->control('merchant_id', ['options' => $merchants]) ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <span>
                        <?= $this->Form->control('transactionId') ?>
                    </span>
                </div>
            </div>
            <div class="card-body">
                <div class="card-text w-50 float-left p-1">
                    <span>
                        <?= $this->Form->control('amount') ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <span>
                        <?= $this->Form->control('transaction_date', ['empty' => true]) ?>
                    </span>
                </div>
            </div>
            <div class="card-body">
                <div class="card-text w-50 float-left p-1">
                    <span>
                        <?= $this->Form->control('transaction_status') ?>
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