<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Supplier $supplier
 */
$this->Form->templates([
    'inputContainer' => '{{content}}'
]);
?>
<?= $this->Form->create($supplier) ?>
<div class="row">
    <div class="col-md-9">
        <div class="card">
            <h5 class="card-header m-0"><?php echo __('Basic Details'); ?></h5>
            <div class="card-body">
                <div class="card-text w-50 float-left p-1">
                    <label><?php echo __('State'); ?></label>
                    <span>
                        <?= $this->Form->control('state_id', ['options' => $states, 'empty' => true, 'label' => true]) ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <label><?php echo __('City'); ?></label>
                    <span>
                        <?= $this->Form->control('city_id', ['options' => $cities, 'empty' => true,'label' => true]) ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <label><?php echo __('Name'); ?></label>
                    <span>
                        <?= $this->Form->control('_name', ['label' => true]) ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <label><?php echo __('Email'); ?></label>
                    <span>
                        <?= $this->Form->control('email',['label' => true]) ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <label><?php echo __('GST Number'); ?>GST Number</label>
                    <span>
                        <?= $this->Form->control('gst_no', ['label' => true]) ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <label><?php echo __('License Number'); ?></label>
                    <span>
                        <?= $this->Form->control('license_number', ['label' => true]) ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <label><?php echo __('Address'); ?></label>
                    <span>
                        <?= $this->Form->control('address',['label' => true]) ?>
                    </span>
                </div>
                

            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card">
            <h5 class="card-header m-0">Save</h5>
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