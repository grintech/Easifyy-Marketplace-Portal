<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Coupon $coupon
 */
$this->Form->setTemplates([
    'inputContainer' => '{{content}}'
]);

$this->Form->create($coupon);
?>
<div class="row">
    <div class="col-md-9">
        <div class="card">
            <h5 class="card-header m-0"><?php echo __('Basic Details'); ?></h5>
            <div class="card-body">
                <div class="card-text w-50 float-left p-1">
                    <label><?php echo __('Coupon code'); ?></label>
                    <span>
                        <?php echo $this->Form->control('coupon_code', ['label' => false]); ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <label><?php echo __('Discount'); ?></label>
                    <span>
                        <?php echo $this->Form->control('discount', ['label' => false]); ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <label><?php echo __('Discount Type'); ?></label>
                    <span>
                        <?php echo $this->Form->select('discount_type',array('Fixed' => 'Fixed', 'Percentage' => 'Percentage, '), ['label' => false, 'class' => 'datepicker']); ?>
                    </span>
                </div>

                <div class="card-text w-50 float-left p-1">
                    <label><?php echo __('Description'); ?></label>
                    <span>
                        <?php echo $this->Form->control('description', ['label' => false]); ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <label><?php echo __('Expired'); ?></label>
                    <span>
                        <?php echo $this->Form->control('expire', ['type' => 'text', 'class' => 'datepicker', 'label' => false]); ?>
                    </span>
                </div>

                <div class="card-text w-50 float-left p-1">
                    <label><?php echo __('Usage per user'); ?></label>
                    <span>
                        <?php echo $this->Form->control('user_usage_limit', ['label' => false]); ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <label><?php echo __('Usage limit'); ?></label>
                    <span>
                        <?php echo $this->Form->control('usage_limit', ['label' => false]); ?>
                    </span>
                </div>

                <div class="card-text w-50 float-left p-1">
                    <label><?php echo __('Minimum spend'); ?></label>
                    <span>
                        <?php echo $this->Form->control('minimum_spend', ['label' => false]); ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <label><?php echo __('Maximum spend'); ?></label>
                    <span>
                        <?php echo $this->Form->control('maximum_spend', ['label' => false]); ?>
                    </span>
                </div>

                <div class="card-text w-50 float-left p-1">
                    <label><?php echo __('Maximum discount'); ?></label>
                    <span>
                        <?php echo $this->Form->control('max_amount', ['label' => false]); ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <label><?php echo __('Usage count'); ?></label>
                    <span>
                        <?php echo $this->Form->control('usage_count', ['label' => false]); ?>
                    </span>
                </div>

                <div class="card-text w-50 float-left p-1">
                    <label><?php echo __('Coupon applicable'); ?></label>
                    <span>
                        <?php echo $this->Form->control('coupon_applicable', ['label' => false]); ?>
                    </span>
                </div>
                
            </div>
        </div>


    </div>

    <div class="col-md-3">
        <div class="card">
            <h5 class="card-header m-0"><?php echo __('Save'); ?></h5>
            <div class="card-body">
                <div class="card-text">
                    <label><?php echo __('Status'); ?></label>
                    <div class="switch">
                        <label>
                          <?php echo __('Inactive'); ?>
                          <?php echo $this->Form->control('status', ['label' => false]); ?>
                          <span class="lever"></span>
                          <?php echo __('Active'); ?>
                          
                        </label>
                    </div>
                </div><br>

                <div class="card-text">
                    <?php echo $this->Form->submit(__('Save'), array( 'class' => 'btn btn-primary' ) ); ?>
                </div>    
            </div>
            
        </div>   
    </div>
</div>
<?= $this->Form->end() ?>
