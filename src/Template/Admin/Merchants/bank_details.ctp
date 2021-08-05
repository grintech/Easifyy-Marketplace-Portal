 
<?php 
$this->Form->templates([
    'inputContainer' => '{{content}}'
]);
echo $this->Form->create($bankAccount); 
?>

<div class="row">
    <div class="col-md-9">
        <div class="card">
            <!-- <h5 class="card-header m-0"><?php __('Basic Details'); ?></h5> -->
             <h5 class="card-header m-0">Bank Details</h5>
            
            <div class="card-body">

                <div class="card-text w-50 float-left p-1">
                    <label><?php __('Account number'); ?></label>
                    <span>
                        <?php echo $this->Form->control('account_number', array( 'class' => 'form-control', 'placeholder' => __('Account number'), 'label' => false, 'div' => false , 'required')); ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">

                    <label><?php __('Account type'); ?></label>
                    <span>
                        <?php echo $this->Form->select('account_type', array('Saving' => __('Saving'), 'Current' => __('Current') ), array( 'class' => '', 'empty' => __('Select account type'), 'label' => false, 'div' => false )); ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <label><?php __('Bank name'); ?></label>
                    <span>
                        <?php echo $this->Form->control('bank_name', array( 'class' => 'form-control', 'placeholder' => __('Bank name'), 'label' => false, 'div' => false , 'required')); ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">

                    <label><?php __('Bank branch'); ?></label>
                    <span>
                        <?php echo $this->Form->control('bank_branch', array( 'class' => 'form-control', 'placeholder' => __('Bank branch'), 'label' => false, 'div' => false )); ?>
                    </span>
                </div>

                <div class="card-text w-50 float-left p-1">
                    <label><?php __('IFSC code'); ?></label>
                    <span>
                        <?php echo $this->Form->control('ifsc_code', array( 'class' => 'form-control', 'placeholder' => __('IFSC code'), 'label' => false, 'div' => false , 'required')); ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">

                    <label><?php __('MICR code'); ?></label>
                    <span>
                        <?php echo $this->Form->control('micr_code', array( 'class' => 'form-control', 'placeholder' => __('MICR code'), 'label' => false, 'div' => false )); ?>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <h5 class="card-header m-0"><?php __('Save'); ?></h5>
            <div class="card-body text-center">
                <?php echo $this->Form->submit(__('Save settings'), array( 'class' => 'btn d-btn-ui' ) ); ?>
            </div>
        </div>     
    </div>
</div>
 
 <?php $this->Form->end(); ?> 