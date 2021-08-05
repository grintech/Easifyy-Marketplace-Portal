<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MerchantKyc $merchantKyc
 */
?>
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
<div class="merchantKycs form large-9 medium-8 columns content">
    <?= $this->Form->create($merchantKyc,array('enctype'=>'multipart/form-data')) ?>
    <fieldset>
        <legend><?= __('Add Merchant Kyc') ?></legend>
        <?php
           // echo $this->Form->control('merchant_id', ['options' => $merchants]);
            //echo $this->Form->control('status');
        ?>
        <input type="text" name="merchant_id" value="<?=$id?>" hidden>
        <div class="card-text w-100 float-left p-1">
            <label>Identity verification Proof</label>
            <p>Passport, Aadhar, Voter ID, or driving license</p>
            <span>
                <input type="file" name="govt_Id">
            </span>
        </div>
        <div class="card-text w-100 float-left p-1">
            <label>Address verification proof</label>
            <p>( Utility bill, rent agreement etc. )</p>
            <span>
                <input type="file" name="address_Id">
            </span>
        </div>
        <div class="card-text w-100 float-left p-1">
            <label>Education Qualification verification proof</label>
            <p>(COP, Member Id card , Degree copy )</p>
            <span>
                <input type="file" name="qualification_Id">
            </span>
        </div>

        <div class="card-text w-100 float-left p-1">
            <label>GST Declaration Proof</label>
            <p></p>
            <span>
                <input type="file" name="gst_declarartion">
            </span>
        </div>
    </fieldset>
    <?= $this->Form->button(__('Submit'), array( 'class' => 'btn d-btn-ui' )) ?>
    <?= $this->Form->end() ?>
</div>
