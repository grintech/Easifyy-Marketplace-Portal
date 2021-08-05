<style type="text/css">
    

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
use Cake\Routing\Router; 
$this->Form->templates([
    'inputContainer' => '{{content}}'
]);
?>
<?= $this->Form->create($MerchantKycs,array('enctype'=>'multipart/form-data')); ?>
<div class="row">
    <div class="col-md-9">
        <input type="hidden" name="merchant_id" value="<?= $id?>">
        <div class="card">
            <h5 class="card-header m-0">Please upload your documents here</h5>
            <div class="card-body">
                    <div class="card-text w-100 float-left p-1">
                        <label>Identity verification Proof</label>
                        <p>Passport, Aadhar, Voter ID, or driving license</p>
                        <span>
                            <input type="file" name="govt_Id" required>
                        </span>
                    </div>

                    <div class="card-text w-100 float-left p-1">
                        <label>Address verification proof</label>
                        <p>( Utility bill, rent agreement etc. )</p>
                        <span>
                            <input type="file" name="address_Id" required>
                        </span>
                    </div>

                    <div class="card-text w-100 float-left p-1">
                        <label>Education Qualification verification proof</label>
                        <p>(COP, Member Id card , Degree copy )</p>
                        <span>
                            <input type="file" name="qualification_Id" required>
                        </span>
                    </div>

                    <div class="card-text w-100 float-left p-1">
                        <label>GST Declaration Proof</label>
                        <p></p>
                        <span>
                            <input type="file" name="gst_declarartion" required>
                        </span>
                    </div>
            </div>
        </div>

       </div> 

    <div class="col-md-3">
        <div class="card">
            <h5 class="card-header m-0"><?php __('Update Profile'); ?></h5>
            <div class="card-body text-center">
                <?= $this->Form->submit(__('Save settings'), array( 'class' => 'btn d-btn-ui' ) ); ?>
            </div>
        </div>  
    </div>
</div>
    
<?= $this->Form->end(); ?>            
