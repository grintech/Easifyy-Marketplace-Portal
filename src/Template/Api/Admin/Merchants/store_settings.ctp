<style type="text/css">
    [type="file"] {
  height: 0;
  overflow: hidden;
  width: 0;
}

[type="file"] + label {
    background: #03a9f4;
    border: none;
    color: #fff;
    cursor: pointer;
    display: inline-block;
    font-weight: 500;
    margin-bottom: 1rem;
    outline: none;
    position: relative;
    transition: all 0.3s;
    vertical-align: middle;
  }
  [type="file"] + label:hover {
    background-color: darken(#03a9f4, 10%);
  }
  .btn-2 {
    background-color: #03a9f4;
    border-radius: 50px;
    overflow: hidden;
    
   
    
  }


</style>
<?php 
//print_r($merchant); 
use Cake\Routing\Router; 

$this->Form->templates([
    'inputContainer' => '{{content}}'
]);
?>
<?php echo $this->Form->create($merchant); ?>
<div class="row">
    <div class="col-md-9">
        
        <div class="card">
            <h5 class="card-header m-0">Basic and Tax Details</h5>
            <div class="card-body">
                <div class="card-text w-50 float-left p-1" style="display: none;">
                    <label><?php __('Store Status'); ?></label>
                    <span>
                        <?php echo $this->Form->select('status', array( '0' => 'Close', '1' => 'Open') , array( 'class' => '', 'empty' => __('Select Store Status'), 'label' => false, "placeholder" => __("Store Status"), 'div' => false , 'required')); ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <label>Name</label>
                    <span>
                        <?php echo $this->Form->control('store_name', array( 'class' => 'form-control', 'placeholder' => __('Name'), 'label' => false, 'div' => false )); ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <label>E-Mail</label>
                    <span>
                        <?php echo $this->Form->control('username', array( 'class' => 'form-control', 'placeholder' => __('E-Mail'), 'label' => false, 'div' => false )); ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <label>GST no.</label>
                    <span>
                        <?php echo $this->Form->control('gst_number', array( 'class' => '', 'placeholder' => __('GST no.'), 'label' => false, 'div' => false )); ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <label>PAN no.</label>
                    <span>
                        <?php echo $this->Form->control('pan_number', array( 'class' => '', 'placeholder' => __('PAN no.'), 'label' => false, 'div' => false )); ?>
                    </span>
                </div>

                <div class="card-text w-50 float-left p-1">
                    <label>License no.</label>
                    <span>
                        <?php echo $this->Form->control('license_number', array( 'class' => 'form-control', 'placeholder' => __('License no.'), 'label' => false, 'div' => false )); ?>
                    </span>
                </div>

                <div class="card-text w-50 float-left p-1">
                    <label>Name of Institute</label>
                    <span>
                        <?php echo $this->Form->control('institute_name', array( 'class' => 'form-control', 'placeholder' => __('Name of Institute'), 'label' => false, 'div' => false )); ?>
                    </span>
                </div>
            </div>
        </div>

        <div class="card">
            <h5 class="card-header m-0">Address Details</h5>
            <div class="card-body">
                <div class="card-text w-50 float-left p-1">
                    <label>Address line 1</label>
                    <span>
                        <?php echo $this->Form->control('address_line_1', array( 'class' => 'form-control', 'placeholder' => __('Address line 1'), 'label' => false, 'div' => false , 'required')); ?>
                    </span>
                </div>

                <div class="card-text w-50 float-left p-1">
                    <label><?php __('Address line 2'); ?></label>
                    <span>
                        <?php echo $this->Form->control('address_line_2', array( 'class' => 'form-control', 'placeholder' => __('Address line 2'), 'label' => false, 'div' => false )); ?>
                    </span>
                </div>

                <div class="card-text w-50 float-left p-1">
                    <label><?php __('State'); ?></label>
                    <span>
                        <?php echo $this->Form->control('state_id', array('type'=>'select', 'id'=>'states','required' => "required",'div' => false, 'label' => false,'class' => "",'options'=>$states ) ); ?>
                    </span>
                </div>

                <div class="card-text w-50 float-left p-1">
                    <label><?php __('City'); ?></label>
                    <span>
                        <?php echo $this->Form->control('city_id', array('type'=>'select', 'id'=>'city-id','required' => "required",'label' => false,'div' => false, 'class' => "",'options'=>$cities) ); ?>
                    </span>
                </div>

                <div class="card-text w-50 float-left p-1">
                    <label><?php __('PIN code'); ?></label>
                    <span>
                        <?php echo $this->Form->control('zip_code', array( 'class' => 'form-control', 'placeholder' => __('PIN Code'), 'label' => false, 'div' => false , 'required')); ?>
                    </span>
                </div>

                <div class="card-text w-50 float-left p-1">
                    <label><?php __('Mobile'); ?></label>
                    <span>
                        <?php echo $this->Form->control('phone_1', array( 'class' => 'form-control', 'placeholder' => __('Phone number'), 'label' => false, 'div' => false , 'required')); ?>
                    </span>
                </div>

                <div class="card-text w-50 float-left p-1">
                    <label><?php __('Landline'); ?></label>
                    <span>
                        <?php echo $this->Form->control('phone_2', array( 'class' => 'form-control', 'placeholder' => __('Alternate Number'), 'label' => false, 'div' => false , 'required')); ?>
                    </span>
                </div>

                <div class="card-text w-50 float-left p-1">
                    <label><?php __('Fax'); ?></label>
                    <span>
                        <?php echo $this->Form->control('fax', array( 'class' => 'form-control', 'placeholder' => __('Fax'), 'label' => false, 'div' => false , 'required')); ?>
                    </span>
                </div>
            </div>
        </div>
    
        
        <div class="card" style="display: none;">
            <h5 class="card-header m-0"><?php __('Store Timings'); ?></h5>
            <div class="card-body">

                <div class="card-text w-50 float-left p-1">
                    <label><?php __('Store open time'); ?> <em>(<?php __('24 hours format'); ?> )</em></label>
                    <span>
                        <?php echo $this->Form->control('open_time', array( 'class' => 'form-control timepicker', 'placeholder' => __('Store open time'), 'label' => false, 'div' => false , 'required')); ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <label><?php __('Store close time');?> <em>(<?php __('24 hours format'); ?>)</em></label>
                    <span>
                        <?php echo $this->Form->control('close_time', array( 'class' => 'form-control timepicker', 'placeholder' => __('Store close time'), 'label' => false, 'div' => false )); ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    
                    <label><?php __('Minium order'); ?> <em>(<?php __('In Rupees');?> )</em></label>
                    <span>
                        <?php echo $this->Form->control('minimum_order', array( 'class' => 'form-control', 'placeholder' => __('Minium order'), 'label' => false, 'div' => false , 'required')); ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <label><?php __('Delivery charges'); ?> <em>(<?php __("if doesn't meet min. order value"); ?></em></label>
                    <span>
                        <?php echo $this->Form->control('delivery_charges', array( 'class' => 'form-control', 'placeholder' => __('Delivery charges'), 'label' => false, 'div' => false )); ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    
                    <label><?php __('Delivery time'); ?> <em>(<?php __('in minutes'); ?> )</em></label>
                    <span>
                        <?php echo $this->Form->control('deliver_time', array( 'class' => 'form-control', 'placeholder' => 'Delivery time', 'label' => false, 'div' => false )); ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    
                    <label><?php __('Delivery radius'); ?> <em>(<?php __('in Kms.');?>)</em></label>
                    <span>
                        <?php echo $this->Form->control('deliver_radius', array( 'class' => 'form-control', 'placeholder' => __('Delivery radius'), 'label' => false, 'div' => false , 'required')); ?>
                    </span>

                </div>

                <div class="card-text w-50 float-left p-1">
                    
                    <label><?php __('Payment method'); ?></label>
                    <span>
                        <?php echo $this->Form->select('payment_method', array( 'Online' => __('Online'), 'COD' => __('COD'), 'Online and COD' => __('Online and COD' ) ) , array( 'class' => '', 'empty' => __('Select payment method'), 'label' => false, 'div' => false , 'required')); ?>
                    </span>
                </div>

                <div class="card-text w-50 float-left p-1">
                    <label><?php __('Delivery types');  ?> </label>
                    <span>
                        <?php echo $this->Form->select('delivery_type', array( 'Pick up' => __('Pick up'), 'Delivery' => __('Delivery'), 'Pick up and Delivery' => __('Pick up and Delivery') ) , array( 'class' => '', 'empty' => __('Select delivery types'), 'label' => false, 'div' => false , 'required')); ?>
                    </span>
                </div>

                <div class="card-text w-50 float-left p-1">
                    
                    <label><?php __('Select Delivery Slots');?></label>
                    <span>
                        <?php 
                        $delivery_slot = array( '1 Hour' => __('1 Hour'), '2 Hours' => __('2 Hours'), '3 Hours' => __('3 Hours'), '4 Hours' => __('4 Hours') );
                        echo $this->Form->select('delivery_slot', $delivery_slot , array( 'class' => '', 'empty' => __('Select delivery slots'), 'label' => false, 'div' => false , 'required')); ?>
                    </span>
                </div>

            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card">
            <h5 class="card-header m-0"><?php __('Update Profile'); ?></h5>
            <div class="card-body text-center">
                <?php echo $this->Form->submit(__('Save settings'), array( 'class' => 'btn d-btn-ui' ) ); ?>
            </div>
        </div>  
        <div class="card">
            <h5 class="card-header m-0">Upload profile picture</h5>
            <div class="card-body text-center">
                <div class="card-text p-1">
                    <div class="form-group">
                        <img id="user_image" style="width:100px;" src="../../img/avatar.jpg" alt="...">
                    </div>
                    <input type="file" id="file" />
                    <label for="file" class="btn d-btn-ui">Upload</label>
                    <?php if ( $merchant['store_pic'] ) : ?>
                    <div class="card card-border z-depth-2 image-holder">
                        <div class="card-image">
                            <img src="<?php echo BASE_URL . 'images' .DS. 'store_pics' .DS. $merchant['store_pic']; ?>">
                        </div>
                    </div>
                    <?php endif; ?>
                    <!-- <div class="card card-border z-depth-2"> -->
                        <!-- <div  class="dropzone" id="my-store-dropzone"></div> -->
                        <!-- <input type="hidden" id="store-image" name="store_pic" value="<?=$merchant['store_pic']?:'';?>"> -->
                        <?php echo $this->Form->control('store_pic', array( 'type' => 'hidden', 'id' => 'store-image' )); ?>

                    <!-- </div> -->
                </div>
            </div>
        </div>
    </div>
</div>
    
<?php echo $this->Form->end(); ?>            
