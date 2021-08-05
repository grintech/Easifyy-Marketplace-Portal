<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Merchant $merchant
 */
?>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */

$myTemplates = [
    'inputContainer' => '{{content}}',

];
$this->Form->setTemplates($myTemplates);

?>
<?= $this->Form->create($merchant, ['type' => 'file']) ?>
<div class="row">
    <input type="hidden" id="counter" value="1"> 

    <div class="col-md-9">
        <div class="card">
            <h5 class="card-header m-0">User Information</h5>
            <div class="card-body">
                <div class="card-text w-50 float-left p-1">
                    <span>
                        <?= $this->Form->control('user_id', ['options' => $users]) ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <span>
                        <?= $this->Form->control('store_name') ?>
                    </span>
                </div>
                
            </div>
            <div class="card-body">
                <div class="card-text w-50 float-left p-1">
                    <span>
                        <?= $this->Form->control('slug') ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <span>
                        <?= $this->Form->control('state_id', ['options' => $states, 'empty' => true]) ?>
                    </span>
                </div>
                
            </div>

            <div class="card-body">
                
                <div class="card-text w-50 float-left p-1">
                    <span>
                        <?= $this->Form->control('status') ?>
                    </span>
                </div>
                
            </div>
        </div>
    
        <div class="card">
            <h5 class="card-header m-0">Tax and Registration Information</h5>
            

            <div class="card-body">
                <div class="card-text w-50 float-left p-1">
                    <span>
                        <?= $this->Form->control('city_id', ['options' => $cities, 'empty' => true]) ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <span>
                        <?= $this->Form->control('gst_number') ?>
                    </span>
                </div>
                
            </div>

            <div class="card-body">
                <div class="card-text w-50 float-left p-1">
                    <span>
                        <?= $this->Form->control('pan_number') ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <span>
                        <?= $this->Form->control('license_number') ?>
                    </span>
                </div>
                
            </div>
        </div>

        <div class="card">
            <h5 class="card-header m-0">Address Information</h5>

            <div class="card-body">
                <div class="card-text w-50 float-left p-1">
                    <span>
                        <?= $this->Form->control('address_line_1') ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <span>
                        <?= $this->Form->control('address_line_2') ?>
                    </span>
                </div>
                
            </div>

            <div class="card-body">
                <div class="card-text w-50 float-left p-1">
                    <span>
                        <?= $this->Form->control('locality') ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <span>
                        <?= $this->Form->control('zip_code') ?>
                    </span>
                </div>
                
            </div>
        </div>

        <div class="card">
            <h5 class="card-header m-0">Geo tagging Information</h5>

            <div class="card-body">
                <div class="card-text w-50 float-left p-1">
                    <span>
                        <?= $this->Form->control('latitude') ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <span>
                        <?= $this->Form->control('longitude') ?>
                    </span>
                </div>
                
            </div>
        </div>

        <div class="card">
            <h5 class="card-header m-0">Contact Information</h5>

            <div class="card-body">
                <div class="card-text w-50 float-left p-1">
                    <span>
                        <?= $this->Form->control('store_pic') ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <span>
                        <?= $this->Form->control('phone_1') ?>
                    </span>
                </div>
                
            </div>

            <div class="card-body">
                <div class="card-text w-50 float-left p-1">
                    <span>
                        <?= $this->Form->control('phone_2') ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <span>
                        <?= $this->Form->control('phone_3') ?>
                    </span>
                </div>
                
            </div>
            <div class="card-body">
                <div class="card-text w-50 float-left p-1">
                    <span>
                        <?= $this->Form->control('fax') ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <span>
                        <?= $this->Form->control('open_time') ?>
                    </span>
                </div>
                
            </div>
        </div>
        <div class="card">
            <h5 class="card-header m-0">Time and Delivery Information</h5>

            <div class="card-body">
                <div class="card-text w-50 float-left p-1">
                    <span>
                        <?= $this->Form->control('close_time') ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <span>
                        <?= $this->Form->control('minimum_order') ?>
                    </span>
                </div>
                
            </div>

            <div class="card-body">
                <div class="card-text w-50 float-left p-1">
                    <span>
                        <?= $this->Form->control('minimum_order') ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <span>
                        <?= $this->Form->control('delivery_charges') ?>
                    </span>
                </div>
                
            </div>

            <div class="card-body">
                <div class="card-text w-50 float-left p-1">
                    <span>
                        <?= $this->Form->control('deliver_time') ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <span>
                        <?= $this->Form->control('deliver_radius') ?>
                    </span>
                </div>
                
            </div>
            <div class="card-body">
                <div class="card-text w-50 float-left p-1">
                    <span>
                        <?= $this->Form->control('delivery_type') ?>
                    </span>
                </div>
                
            </div>
        </div>

        <div class="card">
            <h5 class="card-header m-0">Payment Information</h5>

            <div class="card-body">
                <div class="card-text w-50 float-left p-1">
                    <span>
                        <?= $this->Form->control('payment_method') ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <span>
                        <?= $this->Form->control('commission') ?>
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
