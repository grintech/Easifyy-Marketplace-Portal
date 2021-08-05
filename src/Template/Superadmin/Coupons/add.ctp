<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Coupon $coupon
 */
$myTemplates = [
    'inputContainer' => '{{content}}',
];
$this->Form->setTemplates($myTemplates);
?>

<?= $this->Form->create($coupon) ?>
<div class="row">

    <div class="col-md-9">
        <div class="card">
            <h5 class="card-header m-0">Coupon Information</h5>
            <div class="card-body">
                <div class="card-text w-50 float-left p-1" style="display: none;">
                    <span>
                        <?= $this->Form->control('merchant_id', ['options' => $merchants, 'empty' => true]) ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <span>
                        <?= $this->Form->control('coupon_code', [ 'placeholder' => "First Name" ]) ?>
                    </span>
                </div>
            </div>

            <div class="card-body">
                <div class="card-text w-50 float-left p-1">
                    <span>
                        <?= $this->Form->control('discount', [ 'placeholder' => "Discount" ]) ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <span>
                        <?php
                            $options=array('percentage'=>'percentage','fixed'=>'fixed');
                        ?>
                        <?= $this->Form->control('discount_type', [ 'options' => $options, 'placeholder' => "Discount Type" ]) ?>
                    </span>
                </div>
            </div>

            <div class="card-body">
                <div class="card-text w-50 float-left p-1">
                    <span>
                        <?= $this->Form->control('description', [ 'placeholder' => "Description" ]) ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <span>
                        <?= $this->Form->control('expire', [ 'placeholder' => "Expire"]) ?>
                    </span>
                </div>
            </div>

            <div class="card-body">
                <div class="card-text w-50 float-left p-1">
                    <span>
                        <?= $this->Form->control('user_usage_limit', [ 'placeholder' => "User usage limit" ]) ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <span>
                        <?= $this->Form->control('usage_limit', [ 'placeholder' => "Usage limit" ]) ?>
                    </span>
                </div>
            </div>

            <div class="card-body">
                <div class="card-text w-50 float-left p-1">
                    <span>
                        <?= $this->Form->control('minimum_spend', [ 'placeholder' => "Minimum spend" ]) ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <span>
                        <?= $this->Form->control('maximum_spend', [ 'placeholder' => "Maximum Spend" ]) ?>
                    </span>
                </div>
            </div>

            <div class="card-body">
                <div class="card-text w-50 float-left p-1">
                    <span>
                        <?= $this->Form->control('max_amount', [ 'placeholder' => "Max amount" ]) ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <span>
                        <?= $this->Form->control('usage_count', [ 'placeholder' => "Usage count" ]) ?>
                    </span>
                </div>
            </div>

            <div class="card-body">
                <div class="card-text w-50 float-left p-1">
                    <span>
                        <?= $this->Form->control('coupon_applicable', [ 'placeholder' => "Coupon applicable" ]) ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <span>
                        <?= $this->Form->control('status', [ 'placeholder' => "Status" ]) ?>
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
