<?php
 /*** @var \App\View\AppView $this * @var \App\Model\Entity\Product $product */ 
?>
<style>
    #Service {
	display: none;
}
    span.more {
    color: #8e43e7;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor:pointer;
    }
    span.less {
    color: #8e43e7;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor:pointer;
    }
    span.more i {
    font-size: 32px;
    padding-left: 4px;
}
span.less i {
    font-size: 32px;
    padding-left: 4px;
}
a{
    color: #8e43e7;
}
a:hover{
    color: #8e43e7;
}
* {
    margin: 0;
    padding: 0
}

html {
    height: 100%
}

#grad1 {
    background-color: #ddd3ee;
    /*background-image: linear-gradient(120deg, #ddd3ee, #81D4FA)*/
}

 {
    text-align: center;
    position: relative;
    margin-top: 20px
}

 fieldset .form-card {
    background: white;
    border: 1px solid rgba(0, 0, 0, 0.3);
    border-radius: 10px;
    /*box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);*/
    padding: 20px 40px 30px 40px;
    box-sizing: border-box;
    width: 94%;
    margin: 0 3% 20px 3%;
    position: relative
}

 fieldset {
    background: white;
    border: 0 none;
    border-radius: 0.5rem;
    box-sizing: border-box;
    width: 100%;
    margin: 0;
    padding-bottom: 20px;
    position: relative
}

 fieldset:not(:first-of-type) {
    display: none
}

 fieldset .form-card {
    text-align: left;
    color: #9E9E9E
}

 input,
 textarea {
    padding: 0px 8px 4px 8px;
    border: none;
    border-bottom: 1px solid #ccc;
    border-radius: 0px;
    margin-bottom: 18px;
    margin-top: 2px;
    width: 100%;
    box-sizing: border-box;
    letter-spacing: 1px
}

 input:focus,
 textarea:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: none;
    border-bottom: 2px solid #8e43e7;
    outline-width: 0
}

.action-button {
    width: 100px;
    background: #8e43e7;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 0px;
    cursor: pointer;    
	padding: 6px;
    margin: 10px 5px;
    line-height: 2em;
}

.action-button:hover,
.action-button:focus {
    box-shadow: 0 0 0 2px white, 0 0 0 3px #8e43e7
}

.action-button-previous {
    width: 100px;
    background: #616161;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 0px;
    cursor: pointer;
	padding: 6px;
    margin: 10px 5px;
    line-height: 2em;
}

.action-button-previous:hover,
.action-button-previous:focus {
    box-shadow: 0 0 0 2px white, 0 0 0 3px #616161
}

select.list-dt {
    border: none;
    outline: 0;
    border-bottom: 1px solid #ccc;
    padding: 2px 5px 3px 5px;
    margin: 2px
}

select.list-dt:focus {
    border-bottom: 2px solid #8e43e7
}

.card {
    z-index: 0;
    border: none;
    border-radius: 0.5rem;
    position: relative
}

.fs-title {
    font-size: 25px;
    color: #2C3E50;
    margin-bottom: 10px;
    font-weight: bold;
    text-align: left
}

#progressbar {
    margin-bottom: 30px;
    overflow: hidden;
    color: lightgrey
}

#progressbar .active {
    color: #000000
}

#progressbar li {
    list-style-type: none;
    font-size: 12px;
    width: 20%;
    float: left;
    position: relative
}

#progressbar #account:before {
    font-family: FontAwesome;
    content: "\f023"
}

#progressbar #personal:before {
    font-family: FontAwesome;
    content: "\f007"
}

#progressbar #payment:before {
    font-family: FontAwesome;
    content: "\f09d"
}

#progressbar #confirm:before {
    font-family: FontAwesome;
    content: "\f00c"
}

#progressbar li:before {
    width: 50px;
    height: 50px;
    line-height: 45px;
    display: block;
    font-size: 18px;
    color: #ffffff;
    background: #ddd3ee;
    border-radius: 50%;
    margin: 0 auto 10px auto;
    padding: 2px
}

#progressbar li:after {
    content: '';
    width: 100%;
    height: 2px;
    background: #ddd3ee;
    position: absolute;
    left: 0;
    top: 25px;
    z-index: -1
}

#progressbar li.active:before,
#progressbar li.active:after {
    background: #8e43e7
}

.radio-group {
    position: relative;
    margin-bottom: 25px
}

.radio {
    display: inline-block;
    width: 204;
    height: 104;
    border-radius: 0;
    background: lightblue;
    box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
    box-sizing: border-box;
    cursor: pointer;
    margin: 8px 2px
}

.radio:hover {
    box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.3)
}

.radio.selected {
    box-shadow: 1px 1px 2px 2px rgba(0, 0, 0, 0.1)
}

.bg-voilet{
    background-color:  #ddd3ee !important;
    padding-left: .25rem !important;
    padding-right: .25rem !important;
} 
.bg-voilet-dark{
    background-color:  #8e43e7 !important;
}

.text-voilet-dark{
    color:  #8e43e7 !important;
}
.text-white{
    color:white !important;
}
.service-select-form{
    width: 50% !important;
    margin-left: auto !important;
    margin-right: auto !important;
}

.bg-dark-gray{
    background-color: #eee;
}
#incTable .border-bottom::before {
	content: "✓";
    color:  #8e43e7 !important;
	font-size: 16px;
	margin: 5px;
}
.custom-border{
    border: 1px solid #000000 !important;
}
div.input{
    width:50% !important;
}
#navbarNavAltMarkup a {
	pointer-events: none !important;
	cursor: default !important;
	text-decoration: none !important;
}
</style>
<div class="row" >
<!-- MultiStep Form -->
<div class="container-fluid" id="grad1">
    <div class="row justify-content-center mt-0">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center pt-3 mt-0 mb-2">
            <div class="card px-0 pt-0 pb-0 mt-0 mb-0">
                <h5><strong>Complete Your Profile</strong></h5>
                <!--<p>Select fields to go to next step</p>-->
                <div class="row mx-0">
                    <div class="col-md-12 mx-0">
                        <!-- progressbar -->
                        <ul id="progressbar">
                            <li class="active" id="account"><strong>Personal /Business Details</strong></li>
                            <li id="personal"><strong>Bank Details</strong></li>
                            <li id="payment"><strong>Kyc Details</strong></li>
                            <li id="personal"><strong>SOP & Mandatory Guidelines</strong></li>
                            <li id="confirm"><strong>Finish</strong></li>
                        </ul> 
                        <!-- fieldsets -->
                        <fieldset>
                            <div class="form-card service-select-form">
                                <?= $this->Form->create($merchant, array('url'=>'/admin/merchants/store-settings','id' => 'profile-settings' ,'class'=>'row')) ?>
                                    <h5 class="col-md-12 text-center text-voilet-dark">Personal Details</h5>
                                    <?php echo $this->Form->control('name_prefix', array( 'id'=>'name_prefix','class' => 'form-control col-md-12', 'placeholder' => __('Gender'), 'label' => "Gender", 'div' => false ,'readonly')); ?>
                                    <?php echo $this->Form->control('store_name', array( 'id'=>'store_name','class' => 'form-control col-md-12', 'placeholder' => __('First Name'), 'label' => "First Name", 'div' => false,'readonly' )); ?>
                                    <?php echo $this->Form->control('last_name', array( 'id'=>'last_name','class' => 'form-control col-md-12', 'placeholder' => __('Last Name'), 'label' => "Last Name", 'div' => false ,'readonly')); ?>
                                    <?php echo $this->Form->control('username', array( 'id'=>'username','class' => 'form-control col-md-12', 'placeholder' => __('E-Mail'), 'label' => 'E-Mail', 'div' => false,'readonly' )); ?>
                                    <?php echo $this->Form->control('phone_1', array('id'=>'phone_1', 'class' => 'form-control col-md-12', 'placeholder' => __('Phone number'), 'label' => 'Phone Number', 'div' => false , 'required','readonly')); ?>
                                    <?php echo $this->Form->control('phone_2', array( 'class' => 'form-control col-md-12', 'placeholder' => __(''), 'label' => 'Alternate Number', 'div' => false , 'required')); ?>
                                    <h5 class="col-md-12 text-center text-voilet-dark">Billing Business Details</h5>
                                    <?php //echo $this->Form->control('service_profession', array('id'=>'service_profession', 'class' => 'form-control col-md-12', 'placeholder' => __(''), 'label' => 'Profession', 'div' => false )); ?>
                                    <select name="service_profession" id="Service" class="form-control">
                                        <option>Select Profession</option>
                                        <option value="Chartered Accountancy">Chartered Accountancy</option>
                                        <option value="Legal">Legal</option>
                                        <option value="Roc & Secretarial Compliance">Roc & Secretarial Compliance</option>
                                        <option value="Finance">Finance</option>
                                        <option value="Accounting & Bookeeping">Accounting & Bookeeping</option>
                                        <option value="Contents & Digital Marketing">Contents & Digital Marketing</option>
                                        <option value="Graphics & UI Design">Graphics & UI Design</option>
                                        <option value="Website & App Development">Website & App Development</option>
                                        <option value="E-Commerce Management">E-Commerce Management</option>
                                        <option value="Audio/Video & Photography">Audio/Video & Photography</option>
                                        <option value="Animation">Animation</option>
                                        <option value="Gaming Development">Gaming Development</option>
                                        <option value="Business Management">Business Management</option>
                                        <option value="IT Support">IT Support</option>
                                    </select>
                                    <?php echo $this->Form->control('billing_name', array( 'id'=>'billing_name','class' => 'form-control col-md-12', 'placeholder' => __(''), 'label' => "Service Provider/Firm Name *", 'div' => false )); ?>
                                    <?php echo $this->Form->control('address_line_1', array( 'id'=>'address_line_1','class' => 'form-control col-md-12', 'placeholder' => __(''), 'label' => 'Address line 1 *', 'div' => false , 'required')); ?>
                                    <?php echo $this->Form->control('address_line_2', array( 'class' => 'form-control col-md-12', 'placeholder' => __(''), 'label' => 'Address line 2', 'div' => false )); ?>
                                    <?php echo $this->Form->control('state_id', array('type'=>'select', 'id'=>'states','required' => "required",'div' => false, 'label' => 'State *','empty' => 'Select State','class' => "browser-default",'options'=>$states ) ); ?>
                                    <?php echo $this->Form->control('city_id', array('type'=>'select', 'id'=>'city-id','required' => "required",'label' => 'City *','div' => false, 'class' => "browser-default",'options'=>$cities) ); ?>
                                    <?php echo $this->Form->control('zip_code', array('id'=>'zip_code', 'class' => 'form-control col-md-12 onlyNo', 'placeholder' => __(''), 'label' => 'PIN Code *', 'div' => false , 'required')); ?>

                                    <?php echo $this->Form->control('pan_number', array('id'=>'pan_number', 'class' => 'form-control col-md-12', 'placeholder' => __(''), 'label' => 'Pan Number *', 'div' => false )); ?>
                                    <?php echo $this->Form->control('gst_number', array('id'=>'gst_number', 'class' => 'form-control col-md-12', 'placeholder' => __(''), 'label' => 'GSTIN Number', 'div' => false )); ?>
                                    <?php echo $this->Form->control('license_number', array('id'=>'license_number', 'class' => 'form-control col-md-12', 'placeholder' => __(''), 'label' => 'Practising Reg./Licence No.', 'div' => false )); ?>
                                    <?php echo $this->Form->control('cin_number', array( 'class' => 'form-control col-md-12', 'placeholder' => __(''), 'label' => 'CIN Number', 'div' => false )); ?>
                                    <?php echo $this->Form->control('institute_name', array('id'=>'institute_name', 'class' => 'form-control col-md-12', 'placeholder' => __(''), 'label' => 'Name of Institute', 'div' => false )); ?>

                                    <?= $this->Form->end() ?>
                            </div> 
                            <button type="button" id="profile-settings-btn" name="next" class="action-button"> Save <i class="fa fa-angle-right" aria-hidden="true"></i></button>
                        </fieldset>
                        <fieldset>
                            <div class="form-card service-select-form">
                                <?= $this->Form->create($bankAccount, array('url'=>'/admin/merchants/store-settings','id' => 'bank-settings','class'=>'row')) ?>
                                    <h5 class="col-md-12 text-center text-voilet-dark mt-0">Bank Details</h5>
                                    <?php echo $this->Form->control('account_number', array( 'class' => 'form-control col-md-12 onlyNo', 'placeholder' => __('Account Number'), 'label' => 'Account Number *', 'div' => false , 'required')); ?>
                                    <?php echo $this->Form->control('account_number_confirm', array( 'class' => 'form-control col-md-12 onlyNo', 'placeholder' => __('Confirm Account Number'), 'label' => 'Confirm Account Number *', 'div' => false , 'required')); ?>
                                    <?php echo $this->Form->control('account_holder', array( 'class' => 'form-control col-md-12', 'placeholder' => __('Account Holder Name'), 'label' => 'Account Holder Name *', 'div' => false , 'required')); ?>
                                    <?php echo $this->Form->control('account_type', array('type'=>'select', 'id'=>'account_type','required' => "required",'div' => false, 'label' => 'Select Account Type *','class' => "",'options'=>array('Saving' => __('Saving'), 'Current' => __('Current') ) ) ); ?>
                                    <?php echo $this->Form->control('bank_name', array( 'class' => 'form-control col-md-12', 'placeholder' => __('Bank Name'), 'label' => 'Bank Name *', 'div' => false , 'required')); ?>
                                    <?php echo $this->Form->control('bank_branch', array( 'class' => 'form-control col-md-12', 'placeholder' => __('Branch Address'), 'label' => 'Branch Address *', 'div' => false )); ?>
                                    <?php echo $this->Form->control('ifsc_code', array( 'class' => 'form-control col-md-12', 'placeholder' => __('IFSC Code'), 'label' => 'IFSC Code *', 'div' => false , 'required')); ?>
                                    <?php echo $this->Form->control('micr_code', array( 'class' => 'form-control col-md-12', 'placeholder' => __('MICR Code'), 'label' => 'MICR Code', 'div' => false )); ?>
                                <?= $this->Form->end() ?>
                            </div>

                            <button type="button" name="previous" class="previous action-button-previous"><i class="fa fa-angle-left" aria-hidden="true"></i> Previous</button>
                            <button type="button" id="bank-settings-btn" name="next" class="action-button"> Save <i class="fa fa-angle-right" aria-hidden="true"></i></button>
                        </fieldset>
                        <fieldset>
                            <div class="form-card service-select-form">
                                <?= $this->Form->create($merchantKyc, array('url'=>'/admin/merchant-kycs/kyc','id' => 'kyc-details','enctype'=>'multipart/form-data')) ?>
                                    <h5 class="col-md-12 text-center text-voilet-dark mt-0">Kyc Details</h5>
                                    <div class="row">
                                        <div class="card-text w-80 col-md-9 float-left p-1">
                                            <label>Identity verification Proof *</label>
                                            <p>Passport, Aadhar, Voter ID, or driving license</p>
                                            <span>
                                                <input type="file" name="govt_Id"  value="" <?php if($merchantKyc->govt_Id==""){echo "required";}?> >
                                            </span>
                                        </div>
                                        <?php if($merchantKyc->govt_Id!="") {?>
                                            <!--<img class="w-20 col-md-2 px-0 py-4" src="../../img/kyc-documents/<?=$merchantKyc->govt_Id?>" width="200px"></img>-->
                                            <a class=" col-md-3 py-5" href="https://easifyy.com/img/kyc-documents/<?=$merchantKyc->merchant_id?>/<?=$merchantKyc->govt_Id?>" download><i class="fa fa-download"></i> <?=$merchantKyc->govt_Id?></a>
                                        <?php }?>
                                    </div>
                                    <div class="row">
                                        <div class="card-text w-80 col-md-9 float-left p-1">
                                            <label>Address verification proof </label>
                                            <p>( Utility bill, rent agreement etc. )</p>
                                            <span>
                                                <input type="file" name="address_Id" value="<?= ($merchantKyc->address_Id)?:'' ?>" <?php //if($merchantKyc->address_Id==""){echo "required";}?> >
                                            </span>
                                        </div>
                                        <?php if($merchantKyc->address_Id!="") {?>
                                            <!--<img class="w-20 col-md-2 px-0 py-4" src="../../img/kyc-documents/<?=$merchantKyc->address_Id?>" width="200px"></img>-->
                                            <a class=" col-md-3 py-5" href="https://easifyy.com/img/kyc-documents/<?=$merchantKyc->merchant_id?>/<?=$merchantKyc->address_Id?>" download><i class="fa fa-download"></i> <?=$merchantKyc->address_Id?></a>
                                        <?php }?>
                                    </div>
                                    <div class="row">
                                        <div class="card-text w-80 col-md-9 float-left p-1">
                                            <label>Education Qualification verification proof</label>
                                            <p>(COP, Member Id card , Degree copy )</p>
                                            <span>
                                                <input type="file" name="qualification_Id" value="<?= ($merchantKyc->qualification_Id)?:'' ?>" <?php //if($merchantKyc->qualification_Id==""){echo "required";}?> >
                                            </span>
                                        </div>  
                                        <?php if($merchantKyc->qualification_Id!="") {?>
                                            <!--<img class="w-20 col-md-2 px-0 py-4" src="../../img/kyc-documents/<?=$merchantKyc->qualification_Id?>" width="200px"></img>-->
                                            <a class=" col-md-3 py-5" href="https://easifyy.com/img/kyc-documents/<?=$merchantKyc->merchant_id?>/<?=$merchantKyc->qualification_Id?>" download><i class="fa fa-download"></i> <?=$merchantKyc->qualification_Id?></a>
                                        <?php }?>
                                    </div>
                                    <div class="row">
                                        <div class="card-text w-80 col-md-9 float-left p-1">
                                            <label>GST Declaration Proof</label>
                                            <p></p>
                                            <span>
                                                <input type="file" name="gst_declarartion"  value="<?= ($merchantKyc->gst_declarartion)?:'' ?>" <?php //if($merchantKyc->gst_declarartion==""){echo "required";}?> >
                                            </span>
                                        </div>
                                        <?php if($merchantKyc->gst_declarartion!="") {?>
                                            <!--<img class="w-20 col-md-2 px-0 py-4" src="../../img/kyc-documents/<?=$merchantKyc->gst_declarartion ?>" width="200px"></img>-->
                                            <a class=" col-md-3 py-5" href="https://easifyy.com/img/kyc-documents/<?=$merchantKyc->merchant_id?>/<?=$merchantKyc->gst_declarartion?>" download><i class="fa fa-download"></i> <?=$merchantKyc->gst_declarartion?></a>
                                        <?php }?>
                                    </div>
                                    <div class="row">
                                        <div class="card-text w-80 col-md-9 float-left p-1">
                                            <label>Bank Cancel Cheque</label>
                                            <p></p>
                                            <span>
                                                <input type="file" name="bank_cheque"  value="<?= ($merchantKyc->bank_cheque)?:'' ?>" >
                                            </span>
                                        </div>
                                        <?php if($merchantKyc->bank_cheque!="") {?>
                                            <!--<img class="w-20 col-md-2 px-0 py-4" src="../../img/kyc-documents/<?=$merchantKyc->merchant_id?>/<?=$merchantKyc->bank_cheque ?>" width="200px"></img>-->
                                            <a class=" col-md-3 py-5" href="https://easifyy.com/img/kyc-documents/<?=$merchantKyc->merchant_id?>/<?=$merchantKyc->bank_cheque?>" download><i class="fa fa-download"></i> <?=$merchantKyc->bank_cheque?></a>
                                        <?php }?>
                                    </div>
                                    <div class="row">
                                        <div class="card-text w-80 col-md-9 float-left p-1">
                                            <label>Signature</label>
                                            <p></p>
                                            <span>
                                                <input type="file" name="signature"  value="<?= ($merchantKyc->signature)?:'' ?>" >
                                            </span>
                                        </div>
                                        <?php if($merchantKyc->signature!="") {?>
                                            <!--<img class="w-20 col-md-2 px-0 py-4" src="../../img/kyc-documents/<?=$merchantKyc->merchant_id?>/<?=$merchantKyc->signature ?>" width="200px"></img>-->
                                            <a class=" col-md-3 py-5" href="https://easifyy.com/img/kyc-documents/<?=$merchantKyc->merchant_id?>/<?=$merchantKyc->signature?>" download><i class="fa fa-download"></i> <?=$merchantKyc->signature?></a>
                                        <?php }?>
                                    </div>
                                <button type="submit" name="upload_documents" class="btn d-btn-ui">Upload Documents </button>
                                <?= $this->Form->end() ?>

                            </div>
                            <button type="button" name="previous" class="previous action-button-previous"><i class="fa fa-angle-left" aria-hidden="true"></i> Previous</button>
                            <button type="button" id="kyc-details-btn" name="next" class="profile-next action-button"> Save <i class="fa fa-angle-right" aria-hidden="true"></i></button>
                        </fieldset>
                        <fieldset>
                            <div class="w-100 row">
                            <div class="row ui-white-box">
                                <div class="col-sm-12 job_title">
                                <?= $this->Form->create($merchant, array('url'=>'/admin/merchants/sop-agree','id' => 'sop-agree')) ?>
                                <div class="col-sm-12 col-sm-offset-2 text-justify">
                                                <h5 class="text-center">E-COMMERCE PROFESSIONAL SERVICE PROVIDER
                                                    AGREEMENT</h5>
                                                <h6 class="agreed-t-and-c-h3 text-voilet-dark font-weight-bold text-center">
                                                    Welcome to Easifyy</h6>
                                                <p class="agreed-t-and-c-p">This is an E-commerce Professional Service
                                                    Provider agreement between the Professional Service Provider and the
                                                    Company. Please read the following E-commerce Professional Service
                                                    Provider Agreement alongwith Standing Operating Procedure (Sop) &amp;
                                                    Mandatory Guidelines (To Be Read As Part And Annexure of this E-
                                                    Commerce Professional Service Provider Agreement) that shall govern
                                                    the Professional Service Provider’s obligations, representations,
                                                    undertakings and warranties related to the Professional Services
                                                    offered and provisioned by the Professional Service Provider through
                                                    this Portal as they constitute a legally binding agreement between
                                                    the Professional Service Provider and the Company. Please note that
                                                    the Professional Service Provider’s Use of this portal including
                                                    accessing, browsing or framing and/or linking or otherwise using the
                                                    Portal indicates the Professional Service Provider’s agreement to
                                                    all the terms and conditions under the E-commerce Professional
                                                    Service Provider Agreement. By impliedly or expressly accepting the
                                                    Agreement, The Professional Service Provider also accepts and agrees
                                                    to be bound by the Company’s Policies and terms of service including
                                                    but not limited to Privacy Policy available on the Portal as amended
                                                    from time to time.</p>
                                                <p class="agreed-t-and-c-p">This document is an electronic record in
                                                    terms of Information Technology Act, 2000 including all its
                                                    amendments and rules made thereunder as applicable and the amended
                                                    provisions pertaining to electronic records in various statutes as
                                                    amended by the Information Technology Act, 2000. This electronic
                                                    record is generated by a computer system and does not require any
                                                    physical or digital signatures. </p>
                                                <p class="agreed-t-and-c-p">The Company, in its sole discretion, change
                                                    or modify this Agreement at any time, with or without notice. Such
                                                    changes or modifications shall be made effective for all
                                                    Professional Service Providers (whether previous, existing or
                                                    prospective) posting of the modified Agreement to this web address
                                                    (URL): https://www.Easifyy.com. The Professional Service Provider is
                                                    responsible to read this document from time to time to ensure that
                                                    the Professional Service Provider’s use of the Service remains in
                                                    compliance with this Agreement. In the case of any violation of
                                                    these terms and conditions, the Company reserves the right to seek
                                                    all remedies available by law and in equity for such violations
                                                    under the E-Commerce Professional Service Provider Agreement.</p>
                                                <p class="agreed-t-and-c-p">This would help Easifyy as a Company and you
                                                    as an Expert get maximum business opportunities, provide optimum
                                                    customer satisfaction, increase customer retention and maintain
                                                    transparency and integrity at all levels while dealing with Clients
                                                    and operating with Easifyy Team.</p>
                                                <p class="agreed t-and-c-p">NOW THEREFORE, BY VIRTUE OF THE PROFESSIONAL
                                                    SERVICE PROVIDER HAVING USE THE WESBITE, IT IS AGREED AS UNDER:</p>

                                                <h6 class="agreed-t-and-c-h3 text-voilet-dark font-weight-bold">
                                                    <b>1.</b> Definitions :- </h6>
                                                <p class="agreed t-and-c-p"><b>1.1</b>&nbsp;&nbsp; For the purpose of
                                                    this Agreement, the following words and phrases shall have the
                                                    meaning assigned to them under this Article.</p>
                                                <p class="agreed notes-p"><b>1.2</b>&nbsp;&nbsp;“The Company” shall mean
                                                    Kisten Education Pvt. Ltd., having its Registered Office at
                                                    H-16/A/947, Sangam Vihar, New Delhi- 110062 and shall include it’s
                                                    successors, legal representatives, administrators, executors,
                                                    nominees and assigns.</p>
                                                <p class="agreed notes-p"><b>1.3</b>&nbsp;&nbsp;“Customer” shall mean
                                                    any individual, group of individuals, firm, corporate or any other
                                                    entity/person placing an order for himself/herself/itself or on
                                                    behalf of other for the Professional Service on/through the Portal.
                                                </p>
                                                <p class="agreed notes-p"><b>1.4</b>&nbsp;&nbsp;“Confidential
                                                    Information” means shall include, but shall not be limited to all
                                                    tangible and intangible information, data documents, drawings,
                                                    blueprints, illustration, models, designs, specifications, diagrams,
                                                    flowcharts, computer programs, marketing plans, technical
                                                    methodology, technical know - how and other technical or business
                                                    information, regardless of the media in or on which it is rendered,
                                                    stored, recorded or transmitted, including without limitation, all
                                                    Proprietary Matters and Trade Secrets ( as hereinafter defined ),
                                                    intellectual property and all other information which may be
                                                    disclosed to the Professional Service Provider or to which the
                                                    Professional Service Provider may be provided access in accordance
                                                    with this Agreement, or which is generated as a result of or in
                                                    connection with the purpose of this Agreement and which is not
                                                    available to the public. As used herein, "Proprietary Matters " may
                                                    include, but shall not be limited to, any invention, technical
                                                    methodology, technical know-how, expertise, system, process
                                                    technology, design or concept (whether or not registered or
                                                    registerable), hardware specifications, software in both source and
                                                    object code, computer outputs, computer interfaces, application
                                                    programs interfaces, computer calls, flow charts, data, drawings and
                                                    know - how and any information or data or compilation thereof which,
                                                    in each case is proprietary or otherwise protected under applicable
                                                    law. As used herein, "Trade Secret " may include, but shall not be
                                                    limited to, system design, modular program structure, system logic
                                                    flow, file content, video and report format, coding techniques and
                                                    routines, file handling, video screen and data handling, and report
                                                    and / or form generation</p>
                                                <p class="agreed notes-p"><b>1.5</b>&nbsp;&nbsp;“Effective Date” shall
                                                    mean the date on which The Professional Service Provider impliedly
                                                    or expressly accepting this Agreement.</p>
                                                <p class="agreed notes-p"><b>1.6</b>&nbsp;&nbsp;“Form” shall mean Form
                                                    for E- commerce Professional Service Provider Agreement to be filled
                                                    in and executed by the Professional Service Provider before/at the
                                                    time of/after execution of this Agreement .</p>
                                                <p class="agreed notes-p"><b>1.7</b>&nbsp;&nbsp;‘Intellectual Property
                                                    Rights’ (IPRs) means shall mean and include website, portals
                                                    patents, trademarks, domain names, service marks, trade names,
                                                    registered or unregistered designs, copyrights (including revision
                                                    rights, rights in derivative works, and other rights), rights of
                                                    privacy and publicity and other forms of intellectual or industrial
                                                    property, know how, data base, information, Confidential
                                                    Information, inventions, formulae, confidential or secret processes,
                                                    trade secrets, processes including business processes, domain names,
                                                    inventions, discoveries and ideas, databases, programs, source
                                                    codes, software, algorithms, trade secrets, know how, concepts,
                                                    creations, improvements upon, additions or any research effort
                                                    relating to any of the foregoing; utility models, including design
                                                    rights, trademark rights, trade secret rights, and other rights,
                                                    including moral rights and any similar rights, and any other
                                                    protected rights or assets and any licenses and permissions in
                                                    connection therewith, in each and any part of the world and whether
                                                    or not registered or registrable and for the full period thereof,
                                                    and all extensions and renewals thereof, and all applications for
                                                    registration in connection with the foregoing.</p>
                                                <p class="agreed notes-p"><b>1.8</b>&nbsp;&nbsp;“The Professional
                                                    Service Provider” shall mean and include any individual, company,
                                                    firm or any person whether incorporated or not, who displays, books
                                                    or sells its Professional Services to the customers on the Portal
                                                    and more particularly described in the attached “Form” and shall
                                                    include his/her/it’s successors, legal heirs, executors and
                                                    permitted assigns.</p>
                                                <p class="agreed notes-p"><b>1.9</b>&nbsp;&nbsp;“Website”, “Portal”,
                                                    “e-commerce Portal”, “Online Store” or other “virtual
                                                    applications/platforms” shall mean and include virtual electronic
                                                    commerce platform owned, designed, developed, created, updated,
                                                    collaborated and maintained by the Company for display and sale of
                                                    various Professional Services including the Professional Service
                                                    Provider’s Professional Services and for other gains.</p>
                                                <p class="agreed notes-p"><b>1.10</b>&nbsp;&nbsp;“Order” shall mean a
                                                    confirmed online order for purchase of Professional Services by the
                                                    customer upon the prices and other terms &amp; conditions mentioned on
                                                    the Portal.</p>
                                                <p class="agreed notes-p"><b>1.11</b>&nbsp;&nbsp;“Professional Service”
                                                    shall mean and include professional services of all kinds and
                                                    description put up for display and sale on the Portal.</p>
                                                <p class="agreed notes-p"><b>1.12</b>&nbsp;&nbsp;“Price” shall mean the
                                                    sale price of a Professional Service as displayed on each
                                                    Professional.</p>
                                                <p class="agreed notes-p"><b>1.13</b>&nbsp;&nbsp;"Shipping Charges”
                                                    shall mean the logistics, courier, postal charges etc. including all
                                                    taxes incurred for delivering the Professional Service(s) to the
                                                    Customer.</p>
                                                <p class="agreed notes-p"><b>1.14</b>&nbsp;&nbsp;“Handling charges”
                                                    shall mean the cost and taxes to be recovered by the Company from
                                                    the Professional Service Provider per transaction for handling the
                                                    logistics.</p>
                                                <p class="agreed notes-p"><b>1.15</b>&nbsp;&nbsp;“Sign-up/registration
                                                    Fee” shall mean the non-refundable fees payable by the Professional
                                                    Service Provider at the time of accepting this Agreement towards the
                                                    initial creation of virtual account on the Portal.</p>
                                                <p class="agreed notes-p"> <b>1.16</b>&nbsp;&nbsp;“Service Fee” shall
                                                    mean the fee and applicable taxes per Order to be charged by the
                                                    Company from the Professional Service Provider at the rates agreed
                                                    to between the parties, upon the sale of Professional Service on the
                                                    Portal.</p>



                                                <h6 class="agreed-t-and-c-h3 text-voilet-dark font-weight-bold">
                                                    <b>2.</b> Arrangement </h6>
                                                <p class="agreed notes-p"><b>2.1</b>&nbsp;&nbsp;The Company shall offer
                                                    to the Professional Service Provider its services for facilitating
                                                    and administering online sale of the Professional Service Provider’s
                                                    Professional Service which shall include hosting and technology,
                                                    customer support, logistics services (if availed by the Professional
                                                    Service Provider), payment services and all the other related
                                                    services to ensure customer satisfaction on behalf of the
                                                    Professional Service Provider. For this arrangement, the
                                                    Professional Service Provider shall pay service fee as specified
                                                    under these presents, to the Company for the sale being affected
                                                    through the Portal.</p>
                                                <p class="agreed notes-p"><b>2.2</b>&nbsp;&nbsp;Based on mutual
                                                    discussions, it is agreed by and between the parties hereto that the
                                                    Professional Service Provider shall put up for sale its Professional
                                                    Services on the said Portal, subject to the terms and conditions
                                                    hereinafter contained. The Professional Service Provider further
                                                    agrees and acknowledges that the service transaction shall be
                                                    governed by the “Terms and Conditions”, Privacy policy and other
                                                    instructions mentioned at the Portal. </p>


                                                <h6 class="agreed-t-and-c-h3 text-voilet-dark font-weight-bold">
                                                    <b>3.</b>Consideration and Payment Terms :-</h6>
                                                <p class="agreed notes-p"><b>3.1</b>&nbsp;&nbsp;Professional Service
                                                    Provider shall make to the Company a one time non- refundable
                                                    Sign-up/registration fee as specified in Seller Registration Form
                                                    for the creation of Virtual account on the Portal at the time of
                                                    execution of this Agreement. Payment of Sign up/registration fee
                                                    shall be made 100% in advance unless specified. The GST if any shall
                                                    be charged by the Company, at the applicable rates.</p>
                                                <p class="agreed notes-p"><b>3.2</b>&nbsp;&nbsp;The Company shall
                                                    collect the Payment from Customer (with or without deduction of TDS,
                                                    as the case may be) on behalf of the Professional Service Provider
                                                    in respect of the Orders received through Portal. In consideration
                                                    of the services and consultation to be rendered by the Company to
                                                    the Professional Service Provider under these presents, the Company
                                                    shall charge the Service fee per order from the Professional Service
                                                    Provider which shall not be more than 30% (Thirty percent) of the
                                                    sale value of the Professional Service before taxes, govt. fee and
                                                    discounts, if any, of such order or Rs. 1,00,000/- per order;
                                                    whichever is less, and the Professional Service Provider agrees to
                                                    it. The Professional Service Provider hereby also authorises the
                                                    Company to accordingly raise the Invoice/Bill with special series
                                                    for such order to the Customer through the Portal, as if it is
                                                    issued by the Professional Service Provider. GST shall be extra as
                                                    applicable. After the Customer’s satisfaction of rendered/delivered
                                                    Professional Service by the Professional Service Provider, the
                                                    Company shall pay the Professional Service Provider an amount
                                                    received from Customer after deduction of Company’s Service Fee as
                                                    mentioned above and other charges i.e. shipping charges, handling
                                                    charges etc., if any in respect of approved order(s) through the
                                                    Portal. The handling charges will be levied at Rs. 20.00 per payment
                                                    transaction made by the customer. The said Handling charges will be
                                                    independent of the Quantity shipped for a transaction made by a
                                                    particular customer. </p>
                                                <p class="agreed notes-p"><b>3.3</b>&nbsp;&nbsp;In the event any order
                                                    is reversed/disputed/cancelled by the Customer due to
                                                    “Unsatisfactory/Insufficient Professional Service”, “Quality Issue”,
                                                    “Not delivered” or “Wrongly delivered”, “Wrong quantity of service
                                                    output”, “Wrong specifications/sizes of service output”, the
                                                    Professional Service Provider agrees that the Company shall levy the
                                                    Service fee and handling charges and in addition shall also levy a
                                                    penalty upto a maximum limit of Rs.1000.00 and the said charges, fee
                                                    and penalty will be deducted from the amount due and payable to the
                                                    Professional Service Provider and in such an event the Professional
                                                    Service Provider shall also be solely liable to bear all the cost
                                                    and claims (including cost of legal proceedings, cost of attorneys,
                                                    claims, etc.) raised against the Company by the customer.</p>
                                                <p class="agreed notes-p"><b>3.4</b>&nbsp;&nbsp;The above said payment
                                                    to the Professional Service Provider shall be done by Company in the
                                                    following manner:</p>
                                                <p class="agreed notes-p"><b>3.5</b>&nbsp;&nbsp;he Professional Service
                                                    Provider shall prepare and send to company a consolidated advice
                                                    list of all orders delivered to the customer along with payment due
                                                    from company on such orders as per this agreement every Friday.</p>
                                                <p class="agreed notes-p"><b>3.6</b>&nbsp;&nbsp;The Company shall within
                                                    5 working days from receipt of advice, process the amount due to The
                                                    Professional Service Provider as per this agreement and make the
                                                    payment to the Professional Service Provider through banking
                                                    channels.</p>
                                                <p class="agreed notes-p"><b>3.7</b>&nbsp;&nbsp;The Professional Service
                                                    Provider agrees to bear and pay all the applicable taxes (including
                                                    GST, TCS etc.), duties, or other payments arising out of the sales
                                                    transaction of the Professional Service through the Portal and the
                                                    company shall not be responsible to collect, report, or remit any
                                                    taxes arising from any transaction.
                                                    <br>
                                                    If the Company is reasonably satisfied that the actions and/or
                                                    performance of the Professional Service Provider in connection with
                                                    this Agreement results in customer disputes, chargebacks or other
                                                    claims in connection with this agreement and the Professional
                                                    Services supplied by the Professional Service Provider , than in the
                                                    sole discretion and subject to applicable Law, Company reserves the
                                                    right to setoff, withhold and delay initiating any payments to be
                                                    made or that are otherwise due to the Professional Service Provider
                                                    under this Agreement until the Professional Service Provider
                                                    rectifies its actions subject to the satisfaction of the Company.
                                                </p>



                                                <h6 class="agreed-t-and-c-h3 text-voilet-dark font-weight-bold">
                                                    <b>4.</b>Obligations of the Professional Service Provider :-</h6>
                                                <p class="agreed notes-p"><b>4.1</b>&nbsp;&nbsp;4.1 Through the
                                                    interface provided by the Company on the creation on Portal of the
                                                    Professional Service Provider, the Professional Service Provider
                                                    shall upload the Professional Service description, images,
                                                    disclaimer, delivery time lines, price and such other details for
                                                    the Professional Services to be displayed and offered for sale
                                                    through the said Portal.</p>
                                                <p class="agreed notes-p"><b>4.2</b>&nbsp;&nbsp;4.2 The Professional
                                                    Service Provider shall upload the Professional Service description
                                                    and image only for the Professional Service which is offered for
                                                    sale through the Portal and for which the said Portal is created.
                                                    However, the Professional Service Provider shall not upload or
                                                    support any description/image/text/graphic which is unlawful,
                                                    illegal, objectionable, obscene, vulgar, against the interest of the
                                                    country, opposed to public policy, prohibited or is in violation of
                                                    intellectual property rights including but not limited to Trademark
                                                    and copyright of any third party. </p>
                                                <p class="agreed notes-p"><b>4.3</b>&nbsp;&nbsp;4.3 The Professional
                                                    Service Provider shall provide full, correct, accurate and true
                                                    description of the Professional Service so as to enable the
                                                    customers to make an informed decision.</p>
                                                <p class="agreed notes-p"><b>4.4</b>&nbsp;&nbsp;4.4 The Professional
                                                    Service Provider shall always be and be solely responsible for the
                                                    satisfactory Quality, Quantity, Merchantability, Guarantee, Fitness,
                                                    Security, Non-infringement of third party rights, Title,
                                                    Integration, Completeness, Accuracy, Availability, Reliability,
                                                    Condition, Warranties whether expressed or implied in respect of the
                                                    Professional Services offered for sale through the Portal.</p>
                                                <p class="agreed notes-p"><b>4.5</b>&nbsp;&nbsp;4.5 The Professional
                                                    Service Provider shall at all times have access to the Internet and
                                                    its email account to check the status of booking/approved orders.
                                                </p>
                                                <p class="agreed notes-p"><b>4.6</b>&nbsp;&nbsp;4.6 On receipt of the
                                                    approved order, the Professional Service Provider shall dispatch
                                                    /deliver the Professional Services within a period not exceeding the
                                                    time as specified in the Professional Service description on the
                                                    Portal.</p>
                                                <p class="agreed notes-p"><b>4.7</b>&nbsp;&nbsp;4.7 In the event the
                                                    Professional Services are not accepted by the Customer due to
                                                    Substandard including but not limited to/unsatisfactory/ wrong /
                                                    Faulty/ damaged Professional Services, dispatch then the same shall
                                                    be replaced by the Professional Service Provider at no extra cost to
                                                    the aggrieved customer. Since the Company is a Facilitator, the
                                                    Professional Service Provider hereby authorizes the Company to
                                                    entertain all claims of return of the Professional Service on behalf
                                                    of the Professional Service Provider in the mutual interest of the
                                                    Professional Service Provider as well as the Customer. </p>
                                                <p class="agreed notes-p"><b>4.8</b>&nbsp;&nbsp;4.8 The Professional
                                                    Service Provider shall not send any of its promotional or any other
                                                    information with the Professional Services ordered by the customer
                                                    and also shall ensure that no material or literature is sent which
                                                    may be detrimental to the business/commercial interests of the
                                                    Company.</p>
                                                <p class="agreed notes-p"><b>4.9</b>&nbsp;&nbsp;4.9 The Professional
                                                    Service Provider shall dispatch the Professional Services of same
                                                    description, quality and quantity and price as are described and
                                                    displayed on the Portal and for which the Customer has placed the
                                                    order. </p>
                                                <p class="agreed notes-p"><b>4.10</b>&nbsp;&nbsp;4.10 The Professional
                                                    Service Provider acknowledges and covenants that time is the essence
                                                    to perform its obligations and that the Professional Service
                                                    Provider shall begin to render Services on the effective date of
                                                    this Agreement and shall continue to render the Services in a prompt
                                                    and timely manner. </p>
                                                <p class="agreed notes-p"><b>4.11</b>&nbsp;&nbsp;4.11 The Professional
                                                    Service Provider agrees to be solely liable to the Company for any
                                                    loss, costs or damages arising from and/or related to any failure of
                                                    and/or delay in the delivery of the Professional Services regardless
                                                    of the reason(s) for such failure or delay in delivery save for
                                                    force majeure reasons as detailed herein under.</p>
                                                <p class="agreed notes-p"><b>4.12</b>&nbsp;&nbsp;4.12 The Professional
                                                    Service Provider shall not offer any Professional Services for Sale
                                                    on the Portal, which are prohibited for sale, dangerous, against the
                                                    public policy, banned, unlawful, illegal or prohibited under the
                                                    Indian laws.</p>
                                                <p class="agreed notes-p"><b>4.13</b>&nbsp;&nbsp;4.13 The Professional
                                                    Service Provider shall ensure that the Professional Service Provider
                                                    holds all the legal rights in the Professional Services that are
                                                    offered for sale on the Portal.</p>
                                                <p class="agreed notes-p"><b>4.14</b>&nbsp;&nbsp;4.14 The Professional
                                                    Service Provider shall pass on the legal title, rights and ownership
                                                    in/of the Professional Service sold to the Customer.</p>
                                                <p class="agreed notes-p"><b>4.15</b>&nbsp;&nbsp;4.15 The Professional
                                                    Service Provider shall be solely responsible for any dispute that
                                                    may be raised by the customer relating to the services provided by
                                                    the Professional Service Provider.</p>
                                                <p class="agreed notes-p"><b>4.16</b>&nbsp;&nbsp;4.16 The Professional
                                                    Service Provider shall at all time during the pendency of this
                                                    agreement endeavour to protect and promote the interests of the
                                                    Company and ensure that third parties rights including intellectual
                                                    property rights are not infringed.</p>
                                                <p class="agreed notes-p"><b>4.17</b>&nbsp;&nbsp;4.17 The Professional
                                                    Service Provider shall at all times be responsible for compliance of
                                                    all applicable laws and regulations including but not limited to
                                                    Intellectual Property Rights, GST, The Contract Act, Excise and
                                                    Import duties, Drugs and Cosmetics Act, Drugs and Remedial Magic
                                                    Act, Code of Advertising Ethics, Code of Conduct of specified
                                                    profession, guidelines related to services etc.</p>
                                                <p class="agreed notes-p"><b>4.18</b>&nbsp;&nbsp;4.18 The Professional
                                                    Service Provider shall not contact the customer directly or
                                                    indirectly or deal in any manner for sale of its Professional
                                                    Service other than the sale through the Portal. Violation of this
                                                    provision shall be deemed as a serious material breach of the
                                                    agreement. </p>
                                                <p class="agreed notes-p"><b>4.19</b>&nbsp;&nbsp;4.19 The Professional
                                                    Service Provider, directly or indirectly, shall never misuse the
                                                    information gathered/received during the processes about the
                                                    Customer/company.</p>
                                                <p class="agreed notes-p"><b>4.20</b>&nbsp;&nbsp;4.20 The Professional
                                                    Service Provider, directly or indirectly, shall never use the
                                                    information gathered/received during the processes against the
                                                    Customer/company, except specifically required by any Court.</p>
                                            <div id="show" style="display: none;">
                                                <h6 class="agreed-t-and-c-h3 text-voilet-dark font-weight-bold">
                                                    <b>5.</b>Warranties, Representations and Undertakings of the
                                                    Professional Service Provider :- </h6>
                                                <p class="notes-n-p"> The Professional Service Provider warrants,
                                                    represents and undertakes that:</p>
                                                <p class="agreed notes-p"><b>5.1</b>&nbsp;&nbsp;The Professional Service
                                                    Provider has the right and full authority to enter into this
                                                    Agreement with the Company.</p>
                                                <p class="agreed notes-p"><b>5.2</b>&nbsp;&nbsp;All their obligations
                                                    under this Agreement are legal, valid and binding obligations
                                                    enforceable in law.</p>
                                                <p class="agreed notes-p"><b>5.3</b>&nbsp;&nbsp;There are no legal or
                                                    any institutional proceedings pending, which may have a material
                                                    adverse effect on their ability to perform and meet their
                                                    obligations under this Agreement;</p>
                                                <p class="agreed notes-p"><b>5.4</b>&nbsp;&nbsp;The Professional Service
                                                    Provider holds all the requisite permissions, authorities, approvals
                                                    and sanctions to conduct their business and to enter into an
                                                    arrangement with the Company. The Professional Service Provider
                                                    shall at all times ensure compliance with all the requirements
                                                    applicable to respective business and for the purposes of this
                                                    arrangement and confirms that the Professional Service Provider
                                                    shall continue to discharge all their obligations towards statutory
                                                    authorities.</p>
                                                <p class="agreed notes-p"><b>5.5</b>&nbsp;&nbsp;The Professional Service
                                                    Provider shall be solely responsible for the acts of its personnel
                                                    and shall ensure that none of its personnel are indulging in any
                                                    acts which would be harmful to the reputation of the Company and/or
                                                    indulging in any acts detrimental to the business of the Company
                                                    and/or involved in any unlawfully activity. </p>
                                                <p class="agreed notes-p"><b>5.6</b>&nbsp;&nbsp;The Professional Service
                                                    Provider shall provide the Company with copies of any document
                                                    required by the Company for the purposes of the Performance of its
                                                    obligations under this arrangement within 24 hours of getting a
                                                    written notice from the Company.</p>
                                                <p class="agreed notes-p"><b>5.7</b>&nbsp;&nbsp;During the term hereof,
                                                    Professional Service Provider shall not, without the prior written
                                                    approval of the Company, make any press release or other public
                                                    announcement concerning the Agreement, Documents or the transactions
                                                    contemplated by the Agreement. That the complete Professional
                                                    Service responsibility and liability shall solely vest with The
                                                    Professional Service Provider and that the Professional Service
                                                    Provider shall be solely responsible to the Customer for the sale of
                                                    the Professional Service by The Professional Service Provider
                                                    including but not limited to its delivery to the Customer and that
                                                    The Professional Service Provider shall not raise any claim on the
                                                    Company in this regard.</p>
                                                <p class="agreed notes-p"><b>5.8</b>&nbsp;&nbsp;The Professional Service
                                                    Provider shall bear all the cost and related expenses to settle any
                                                    Customer dispute or claims including but not limited to legal
                                                    proceedings, compensation, fines, penalties, charges, towards any
                                                    such claim, damages, action or allegation incurred by the Company
                                                    from the Customer related to the Professional Services and its
                                                    usage. </p>
                                                <p class="agreed notes-p"><b>5.9</b>&nbsp;&nbsp;The Professional Service
                                                    Provider agrees and undertakes not to upload any text, images,
                                                    graphics (for description and display of Professional Service on the
                                                    Portal) that is but with limitation vulgar, Obnoxious, inaccurate,
                                                    false, incorrect, misleading, intimidating, against the public
                                                    policy.</p>
                                                <p class="agreed notes-p"><b>5.10</b>&nbsp;&nbsp;The Professional
                                                    Service Provider shall undertake to observe, adhere to, abide by,
                                                    comply with and notify the Company about all laws and acts in force
                                                    or as are or as made applicable in future, pertaining to or
                                                    applicable to them, their business, their employees or their
                                                    obligations towards them and all purposes of this Agreement and
                                                    shall indemnify, keep indemnified, hold harmless, defend and protect
                                                    the Company and its employees/officers/staff
                                                    personnel/representatives/ from any failure or omission or violation
                                                    or default or breach on its part to do so and against all claims or
                                                    demands of liability and all consequences that may occur or arise
                                                    for any default or failure on its part to conform or comply with the
                                                    above and all other statutory obligations arising there from. </p>
                                                <p class="agreed notes-p"><b>5.11</b>&nbsp;&nbsp;The Professional
                                                    Service Provider shall pay the Company the service fee without any
                                                    demur, counterclaim, setoff or delay and handling charge as
                                                    specified by the Company on every transaction and that the
                                                    Professional Service Provider shall provide all transaction details
                                                    to the Company for record keeping and Reconciliation.</p>
                                                <p class="agreed notes-p"><b>5.12</b>&nbsp;&nbsp;The Professional
                                                    Service Provider shall prior to release of any
                                                    promotion/advertisement material seek prior written approval that
                                                    may be withheld, delayed or refused for the same from the Company,
                                                    in so far as the same relates to services offered pursuant to the
                                                    terms of this Agreement.</p>
                                                <p class="agreed notes-p"><b>5.13</b>&nbsp;&nbsp;The Agreement Documents
                                                    and the rights and duties arising hereunder shall not be assigned,
                                                    and the work to be provided by Professional Service Provider
                                                    thereunder shall not be subcontracted, without the Company’s prior
                                                    written consent that may be refused or withheld. Any attempted sale,
                                                    assignment, transfer, conveyance or delegation of duties in
                                                    violation of this section will be void. All provisions of the
                                                    Agreement Documents will bind and inure to the benefit of the
                                                    parties hereto and their respective heirs, personal representatives,
                                                    successors and assigns, whether so expressed or not. </p>
                                                <p class="agreed notes-p"><b>5.14</b>&nbsp;&nbsp;The Professional
                                                    Service Provider shall not use the customer details other than to
                                                    execute the transaction under this agreement and the Professional
                                                    Service Provider shall not share the same with any other party.</p>
                                                <p class="agreed notes-p"><b>5.15</b>&nbsp;&nbsp;The Professional
                                                    Service Provider shall ensure that descriptions, images and other
                                                    contents pertaining to professional services on portal is accurate
                                                    and corresponds directly with the appearance, nature, quality,
                                                    purpose and other general features of such professional service.</p>
                                                <p class="agreed notes-p"><b>5.16</b>&nbsp;&nbsp;The execution, delivery
                                                    and performance of this Agreement by the Professional Service
                                                    Provider does not and will not: (1) require the consent of any
                                                    undisclosed person or entity, (2) violate any legal requirement or
                                                    (3) conflict with, or constitute a breach or violation of (a) its
                                                    entity’s organizational documents, if any, or (b) the terms or
                                                    provisions of any other agreement, instrument or understanding by
                                                    which the Professional Service Provider is bound or affected.</p>

                                                
                                                    <h6 class="agreed-t-and-c-h3 text-voilet-dark font-weight-bold">
                                                        <b>6.</b>Company Reserves the Right:- </h6>
                                                    <p class="agreed notes-p"><b>6.1</b>&nbsp;&nbsp;The Professional
                                                        Service Provider agrees and acknowledges that the Company, at
                                                        all times during the continuance of this Agreement, shall have
                                                        the right to remove/block/delete/alter any text, graphic,
                                                        image(s) uploaded on the Portal by the Professional Service
                                                        Provider without any prior intimation to the Professional
                                                        Service Provider in the event the said text, image, graphic is
                                                        found to be in violation of law, breach of any of the terms of
                                                        this Agreement, terms and conditions of Company/Portal or
                                                        harmful to the interest and goodwill of the Company. In such an
                                                        event, the Company reserves the right to forthwith remove/close
                                                        the account of the Professional Service Provider on the Portal
                                                        without any prior intimation or liability to the Professional
                                                        Service Provider and without fastening any liability whatsoever
                                                        upon the Company</p>
                                                    <p class="agreed notes-p"><b>6.2</b>&nbsp;&nbsp;Company reserves the
                                                        right to provide and display appropriate disclaimers and terms
                                                        of use on the Portal.</p>
                                                    <p class="agreed notes-p"><b>6.3</b>&nbsp;&nbsp;At any time if the
                                                        Company believes that the services are being utilized by the
                                                        Professional Service Provider or its Customer in contravention
                                                        of the terms and provisions of this Agreement or Terms and
                                                        conditions of use of the Portal, the Company shall have the
                                                        right either at its sole discretion or upon the receipt of a
                                                        request from the legal / statutory authorities or a court order
                                                        to discontinue/terminate the said service(s) to Customer or the
                                                        End user as the case may be, without liability to refund the
                                                        amount to the Professional Service Provider, to forthwith
                                                        remove/block/close the account of the Professional Service
                                                        Provider on the Portal and furnish such details about the
                                                        Professional Service Provider and/or its customers upon a
                                                        request received from the Legal/ Statutory Authorities or under
                                                        a Court order.</p>
                                                    <p class="agreed notes-p"><b>6.4</b>&nbsp;&nbsp;The Company reserves
                                                        its right to impose the cost, penalty, damages and compensation
                                                        as per its own calculation upon the Professional Service
                                                        Provider due to non compliance/breach of any term &amp; condition by
                                                        the Professional Service Provider and the Professional Service
                                                        Provider agrees to pay immediately without any objection.</p>



                                                    <h6 class="agreed-t-and-c-h3 text-voilet-dark font-weight-bold">
                                                        <b>7.</b></h6>
                                                    <p class="agreed notes-p">&nbsp;&nbsp;Professional Services
                                                        Returns/Refund: Parties unconditionally agree that the Company
                                                        may return or dispose of at the Professional Service Provider’s
                                                        expense, and Professional Service Provider will accept and
                                                        refund/ reimburse the amount paid in full the Company for, any
                                                        Professional Services (a) that is defective, deficient,
                                                        substandard, faulty (b) that does not conform to agreed service,
                                                        (c) that is subject to recall or safety alert by a government
                                                        authority or that the Company otherwise reasonably determine
                                                        poses a safety risk to customers, (d) that was not ordered by
                                                        the Customer, (e) for which the Professional Service Provider
                                                        fail to promptly provide Service Safety Information upon
                                                        reasonable request, or (f) that does not comply with this
                                                        Agreement. The Professional Service Provider will cooperate with
                                                        the return or disposal of any Professional Services under this
                                                        Section without any demur or objection whatsoever. The Company
                                                        may also return or dispose of any Professional Services that is
                                                        damaged; Professional Service Provider will accept any such
                                                        return and reimburse the Company for the Professional Services
                                                        and any cost of return or disposal. Payment of an invoice does
                                                        not limit the remedies of the Company. The Professional Service
                                                        Provider shall always be responsible for costs incurred by the
                                                        Company in a recall or refund and for providing any required
                                                        notices, information, and documents to applicable authorities or
                                                        that are otherwise necessary for carrying out the refund
                                                        procedures.</p>



                                                    <h6 class="agreed-t-and-c-h3 text-voilet-dark font-weight-bold">
                                                        <b>8.</b>Indemnity</h6>
                                                    <p class="agreed notes-p"><b>8.1</b>&nbsp;&nbsp;Professional Service
                                                        Provider shall release and always keep the Company indemnified,
                                                        and defend and hold harmless the Company, its parents,
                                                        affiliates, subsidiaries, related entities, and their officers,
                                                        directors, employees, agents, successors and assigns
                                                        (collectively, “Indemnified Party”) from and against any
                                                        Customer inducing but not limited to third party claims,
                                                        demands, compensation, liabilities or losses, damages, and legal
                                                        expenses (including reasonable attorneys’ fees and costs)
                                                        related to the including, without limitation, claims based upon:
                                                        (i) any Professional Services liability or similar claims
                                                        arising or resulting from the use or consumption of any services
                                                        , including claims seeking damages for personal injury or
                                                        property or goodwill damage arising from or in relation
                                                        toservices; (ii) any breach, misconduct, misfeasance, default,
                                                        delay, refusal , fraud, crime or negligence by Professional
                                                        Service Provider or its employees or agents or its
                                                        subcontractors in performing its obligations under this
                                                        Agreement; (iii) any third party claim that a Professional
                                                        Services, or any part thereof, infringes or misappropriates any
                                                        Intellectual Property Right of a third party; (iv) the failure
                                                        or alleged failure of Professional Services to comply with any
                                                        express or implied warranties of Professional Service Provider;
                                                        (v) the violation or alleged violation of any law, statute or
                                                        governmental ordinances, acts including but not limited to the
                                                        Consumer protection act 2019 and related laws or related to the
                                                        manufacture, possession, use or sale of any services; (vi) any
                                                        actual or alleged unfair business practices, false advertising,
                                                        misrepresentation or fraud resulting from the Services materials
                                                        related to the Services and provided by Professional Service
                                                        Provider including services; (vii) any breach or alleged breach
                                                        of a Professional Service Provider representation or warranty or
                                                        any other provision of this Agreement by Professional Service
                                                        Provider including but not limited to Confidentiality and IPR
                                                        warranties; ( viii) against any wilful non-availability, error,
                                                        defect, deficiency, malfunction, fault, delay, refusal related
                                                        to the Professional Services.
                                                        <br>
                                                        Professional Service Provider hereby agree that no proof of such
                                                        damages shall be necessary for the enforcement of the rights
                                                        under this clause and the indemnification amount shall be solely
                                                        at the discretion of the Company. The above shall be without
                                                        prejudice to any other right available to the Company.
                                                    </p>
                                                    <p class="agreed notes-p"><b>8.2</b>&nbsp;&nbsp;This article shall
                                                        survive the termination or expiration of this Agreement.</p>



                                                    <h6 class="agreed-t-and-c-h3 text-voilet-dark font-weight-bold">
                                                        <b>10.</b> Term, Termination and effects of Termination :-</h6>
                                                    <p class="agreed notes-p"><b>10.1</b>&nbsp;&nbsp;Term:
                                                        TAs mentioned above, the Term of this Agreement shall commence
                                                        on the date of accepting of this Agreement and shall continue
                                                        for a period of 12 months unless terminated earlier. The
                                                        Agreement may be extended for such further period as may be
                                                        mutually agreed by and between the parties hereto in writing to
                                                        this effect, however, the decision of the Company shall be final
                                                        and binding</p>
                                                    <p class="agreed notes-p"><b>10.2</b>&nbsp;&nbsp;This Agreement may
                                                        be terminated forthwith by the Company in the Event :-</p>
                                                    <p class="agreed notes-p"><b>10.2.1</b>&nbsp;&nbsp;The Professional
                                                        Service Provider fails to make payment of the agreed signup
                                                        amount, by giving 48 hours written notice.</p>
                                                    <p class="agreed notes-p"><b>10.2.2</b>&nbsp;&nbsp;The Professional
                                                        Service Provider commits any or all material breach of its
                                                        representation, obligations, covenants, warranties or term of
                                                        this agreement and the same is not rectified within 15 days
                                                        after written notice given by the Company.</p>
                                                    <p class="agreed notes-p"><b>10.2.3</b>&nbsp;&nbsp;If a Petition for
                                                        insolvency is filed against the Professional Service Provider or
                                                        as a result of any governmental Directive</p>
                                                    <p class="agreed notes-p"><b>10.2.4</b>&nbsp;&nbsp;For any reason as
                                                        deemed fit by the Company</p>
                                                    <p class="agreed notes-p"><b>10.2.5</b>&nbsp;&nbsp;This Agreement
                                                        may be terminated by either party giving the other 30 days
                                                        written notice.</p>
                                                    <p class="agreed notes-p"><b>10.3</b>&nbsp;&nbsp;Effect of
                                                        Termination :-</p>
                                                    <p class="notes-n-p"> In the event of termination/expiry of this
                                                        Agreement, the Company shall immediately remove the links and
                                                        account of the Professional Service Provider on the Portal.
                                                        During the period under notice both the parties shall be bound
                                                        to perform its obligations incurred under this agreement and
                                                        this sub-clause shall survive the termination of this agreement.
                                                        Post Termination or early expiry, Company will not be liable to
                                                        the Professional Service Provider for any loss or damage of any
                                                        nature irrespective of the nature of its origin, arising from or
                                                        as a result of the nonrenewal or termination of this Agreement
                                                        in accordance with its terms. The Professional Service Provider
                                                        hereby releases the Company and waives any and all compensation
                                                        or damages relating to or arising from, directly or indirectly,
                                                        such termination and agrees that it will have no rights to
                                                        damages or indemnification of any nature, specifically including
                                                        any commercial severance pay related to loss of future profits,
                                                        expenditure for promotion of the Professional Services, or
                                                        payment of goodwill or other commitments in connection with the
                                                        business and goodwill of the Professional Service Provider. The
                                                        termination of this Agreement shall not affect the rights of the
                                                        Company to recover damages it has suffered as a result of any
                                                        breach of this Agreement by the Professional Service Provider,
                                                        nor shall it affect the rights of the Company with respect to
                                                        liabilities or claims accrued, or arising out of events
                                                        occurring, prior to the date of termination.</p>


                                                    <h6 class="agreed-t-and-c-h3 text-voilet-dark font-weight-bold">
                                                        <b>11.</b>Arbitration :</h6>
                                                    <p class="notes-n-p">&nbsp;&nbsp;That in case of any disputes and
                                                        /or differences arising between the parties in relation to any
                                                        of the terms and conditions of this agreement and its annexures,
                                                        then the same shall be resolved by the parties with mutual
                                                        consent. Unresolved/unsettled issues will be referred to the
                                                        Sole Arbitrator to be appointed by the Company at its sole
                                                        discretion under the provisions of the Arbitration and
                                                        Conciliation Act, 2019 and the Professional Service Provider
                                                        shall have no objection to the appointment of such Sole
                                                        Arbitrator appointed by the Company. The Venue of the
                                                        Arbitration shall be held at Delhi and the proceedings of the
                                                        Arbitration shall be in English only. The award of such
                                                        arbitrator shall be final and binding and conclusive between the
                                                        parties.</p>



                                                    <h6 class="agreed-t-and-c-h3 text-voilet-dark font-weight-bold">
                                                        <b>12.</b>Jurisdiction and Governing law :- This Agreement and
                                                        any dispute or claim arising out of or in connection with this
                                                        Agreement shall be governed by and construed in accordance with
                                                        the laws of India. </h6>
                                                    <p class="notes-n-p">&nbsp;&nbsp;That in case of any disputes and
                                                        /or differences arising between the parties in relation to any
                                                        of the terms and conditions of this agreement and its annexures,
                                                        then the same shall be resolved by the parties with mutual
                                                        consent. Unresolved/unsettled issues will be referred to the
                                                        Sole Arbitrator to be appointed by the Company at its sole
                                                        discretion under the provisions of the Arbitration and
                                                        Conciliation Act, 2019 and the Professional Service Provider
                                                        shall have no objection to the appointment of such Sole
                                                        Arbitrator appointed by the Company. The Venue of the
                                                        Arbitration shall be held at Delhi and the proceedings of the
                                                        Arbitration shall be in English only. The award of such
                                                        arbitrator shall be final and binding and conclusive between the
                                                        parties.</p>



                                                    <h6 class="agreed-t-and-c-h3 text-voilet-dark font-weight-bold">
                                                        <b>13.</b>Notices :-</h6>
                                                    <p class="notes-n-p">&nbsp;&nbsp; All notices and other
                                                        communication under this Agreement shall be in writing and in
                                                        English and either delivered by hand or sent by registered/speed
                                                        post/mail in each case to the addresses set out at the beginning
                                                        of this Agreement.</p>


                                                    <h6 class="agreed-t-and-c-h3 text-voilet-dark font-weight-bold">
                                                        <b>14.</b> Intellectual Property Rights</h6>
                                                    <p class="notes-n-p"><b>a)</b>&nbsp;&nbsp;. The Professional Service
                                                        Provider agrees that all rights (including Intellectual
                                                        Property) developed or owned by the Company (“COMPANY’s
                                                        Materials) under this Agreement shall be vested with the company
                                                        only. All Intellectual property rights created during the course
                                                        of this agreement will, automatically vest with company and the
                                                        Professional Service Provider absolutely and unconditionally
                                                        assigns to the Company all IPR in any under usage and developed
                                                        one. </p>
                                                    <p class="agreed notes-p"><b>b)</b>&nbsp;&nbsp;The Professional
                                                        Service Provider shall not transfer, sell or license the
                                                        Company’s Materials and/or third party material.</p>
                                                    <p class="agreed notes-p"><b>c)</b>&nbsp;&nbsp;The Professional
                                                        Service Provider agrees that it will not gain any Intellectual
                                                        Property Rights by virtue of this Agreement. </p>
                                                    <p class="agreed notes-p"><b>d)</b>&nbsp;&nbsp; Each party will
                                                        retain its pre-existing Intellectual Property Rights and nothing
                                                        in this agreement assigns or transfers the pre-existing
                                                        Intellectual Property Rights of one party to the other. Neither
                                                        party may assert or bring any claim for ownership of any or all
                                                        of the other party’s pre-existing Intellectual Property Rights.
                                                    </p>



                                                    <h6 class="agreed-t-and-c-h3 text-voilet-dark font-weight-bold">
                                                        <b>15.</b>Entire Agreement</h6>
                                                    <p class="notes-n-p">&nbsp;&nbsp;This Agreement embodies the entire
                                                        agreement and understanding of the Parties and supersedes any
                                                        and all other prior and contemporaneous agreements, arrangements
                                                        and understandings (whether written or oral) between the Parties
                                                        with respect to its subject matter.</p>

                                                    <h6 class="agreed-t-and-c-h3 text-voilet-dark font-weight-bold">
                                                        <b>16.</b>Assignment :-</h6>
                                                    <p class="notes-n-p">&nbsp;&nbsp; Neither this Agreement nor any
                                                        part of it is assignable, transferable, sub-licensable,
                                                        subcontract able or conveyable by the Professional Service
                                                        Provider, either by operation of law or otherwise. The Company
                                                        shall have the right to assign such portion of the agreement to
                                                        any other Professional Service Provider or any third party, at
                                                        its sole option, upon the occurrence of the following: (i)
                                                        Professional Service Provider refuses to perform; (ii)
                                                        Professional Service Provider is unable to perform; (iii)
                                                        termination of the contract with the Professional Service
                                                        Provider for any reason whatsoever; (iv) expiry of the contract.
                                                        Such right shall be without prejudice to the rights and
                                                        remedies, which the Company may have against the Professional
                                                        Service Provider.</p>

                                                    <h6 class="agreed-t-and-c-h3 text-voilet-dark font-weight-bold">
                                                        <b>17.</b>Confidentiality:</h6>
                                                    <p class="notes-n-p">&nbsp;&nbsp;The Professional Service Provider
                                                        agrees and undertakes to maintain the confidentiality of the
                                                        information and user/customer data disclosed, generated or made
                                                        available to the Professional Service Provider under this
                                                        Agreement. The said information shall not be used by the
                                                        Professional Service Provider for any purpose other than for the
                                                        performance of its obligations under this Agreement. The
                                                        Professional Service Provider agrees that the unauthorized
                                                        disclosure or use of such Information would cause irreparable
                                                        harm and
                                                        significant injury, the degree of which may be difficult to
                                                        ascertain. Accordingly, Professional Service Provider agrees
                                                        that the Company shall have the right to obtain an immediate
                                                        injunction from any court of competent jurisdiction enjoining
                                                        breach of this Agreement and/or disclosure of the Confidential
                                                        Information. The Company shall also have the right to pursue any
                                                        other rights or remedies available at law or equity for such a
                                                        breach.
                                                        The Professional Service Provider shall ensure that all personal
                                                        information of the Company and Company’s employees and
                                                        customers, if any and data (excluding those available in public
                                                        domain) to which it has access or which comes to its possession
                                                        in connection with this agreement, is protected against loss or
                                                        against unauthorized access, use, modification, disclosure or
                                                        other misuse. Violation of this clause will be considered a
                                                        material breach of this Agreement. The Professional Service
                                                        Provider must maintain and enforce safety, call monitoring and
                                                        security procedures and safeguards including procedures and
                                                        safeguards to do with the retention of the personal information
                                                        of the Company, its employees, customers and data available at
                                                        the website of the Company in relation to this agreement.
                                                    </p>

                                                    <h6 class="agreed-t-and-c-h3 text-voilet-dark font-weight-bold">
                                                        <b>18.</b>Limitation of liability: -</h6>
                                                    <p class="notes-n-p">&nbsp;&nbsp;Under no circumstances, except in
                                                        case of breach of contract, will the Company be liable to the
                                                        Professional Service Provider for lost profits, or for any
                                                        direct indirect, incidental, consequential, special or exemplary
                                                        damages, costs, compensation etc. arising from the subject
                                                        matter of this Agreement, regardless of the type of claim and
                                                        even if the Professional Service Provider has been advised of
                                                        the possibility of such damages, such as, but not limited to
                                                        loss of revenue or anticipated profits or loss business,
                                                        pecuniary losses, loss of goodwill . </p>
                                                    <p class="notes-n-p">&nbsp;&nbsp;The Professional Service Provider
                                                        unconditionally and irrevocably warrants that, under normal use
                                                        and service and when used in accordance with specifications
                                                        supplied by the Professional Service Provider, the Professional
                                                        Services will be of sound fitness, including but not limited to
                                                        merchantable and good quality and free from title, infringement
                                                        claims. If any Professional Services do not comply with such
                                                        warranty or the Customer complain or claims or any issue or any
                                                        dispute related to the performance of the Professional Services,
                                                        Professional Service Provider will be solely liable and
                                                        subsequently, at its cost and expense, correct, repair, or
                                                        replace any defect, malfunction or deficiency in the
                                                        Professional Services or any other malfunction provided, that,
                                                        in all such cases that sufficient evidence is produced from the
                                                        customer to establish that the Professional Services are
                                                        defective or substandard or malfunctioned. </p>
                                                    <p class="notes-n-p">&nbsp;&nbsp;The Professional Service Provider
                                                        unconditionally and irrevocably further agrees, promises and
                                                        covenants that neither itself, nor any person, organization, or
                                                        any other entity acting on its behalf will file, charge, claim,
                                                        sue or cause or permit to be filed, charged or claimed, any
                                                        legal suit, including but not limited to action for damages or
                                                        other relief (including injunctive, declaratory, monetary relief
                                                        or other) against the Company including its directors, employees
                                                        involving any matter or dispute related to any customer related
                                                        issue under this agreement or involving any continuing effects
                                                        of actions or practices which arose prior to the Effective Date
                                                        of this agreement or during the pendency of this agreement or
                                                        the termination of this agreement. </p>

                                                    <h6 class="agreed-t-and-c-h3 text-voilet-dark font-weight-bold">
                                                        <b>19.</b>Relationship of Parties :-</h6>
                                                    <p class="notes-n-p">&nbsp;&nbsp;Nothing in this Agreement will be
                                                        construed as creating a relationship of partnership, agency,
                                                        affiliation, joint venture, agency or employment between the
                                                        Parties. The Company shall not be responsible for the acts or
                                                        omissions of the Professional Service Provider, and the
                                                        Professional Service Provider shall not represent neither has,
                                                        any power or authority to speak for, represent, bind or assume
                                                        any obligation on behalf of the Company. The Professional
                                                        Service Provider shall be the principal employer of the
                                                        employees, agents, contractors, subcontractors engaged by
                                                        Professional Service Provider and shall be vicariously liable
                                                        for all the acts, deeds or things, whether the same is within
                                                        the scope or outside the scope of this agreement, vested under
                                                        this Agreement. No right of any employment shall accrue or
                                                        arise, by virtue of engagement of employees, agents,
                                                        contractors, subcontractors by the Professional Service
                                                        Provider, for any assignment of Professional Services under this
                                                        Agreement. All remuneration, claims, wages, dues etc. of such
                                                        employees, agents, contractors, subcontractors etc. of
                                                        Professional Service Provider shall be paid by Professional
                                                        Service Provider alone and the Company shall not have any direct
                                                        or indirect liability or obligation, to pay any charges, claims
                                                        or wages of any of the Professional Service Provider’s
                                                        employees, agents, and contractors.</p>

                                                    <h6 class="agreed-t-and-c-h3 text-voilet-dark font-weight-bold">
                                                        <b>20.</b>Waiver and Amendment :- </h6>
                                                    <p class="notes-n-p"><b>20.1</b>&nbsp;&nbsp;No waiver of any breach
                                                        of any provision of this Agreement constitutes a waiver of any
                                                        prior, concurrent or subsequent breach of the same or any other
                                                        provisions, and will not be effective unless made in writing and
                                                        signed by an authorised representative of the waiving Party.</p>
                                                    <p class="notes-n-p"><b>20.2</b>&nbsp;&nbsp;Except as expressly set
                                                        out in this Agreement, no amendment or modification is binding
                                                        on the Parties unless it is in writing and signed by a duly
                                                        authorized representative of each of the Parties.</p>

                                                    <h6 class="agreed-t-and-c-h3 text-voilet-dark font-weight-bold">
                                                        <b>21.</b>Force Majeure :-</h6>
                                                    <p class="notes-n-p">&nbsp;&nbsp;For purposes of this Clause, “Force
                                                        Majeure” mean by reason of any event or condition which is
                                                        beyond the control of the Professional Service Provider, like an
                                                        Act of God, pandemics and epidemics, war, civil commotion,
                                                        terrorist act, destruction of facilities or materials by fire,
                                                        earthquake, and failure of systems / machinery including
                                                        hardware/software (provided that such failure could not have
                                                        been prevented by the exercise of skill, diligence and prudence
                                                        that would be reasonably and ordinarily expected from a skilled
                                                        and experienced person engaged in the same type of undertaking
                                                        under the same or similar circumstances). </p>
                                                    <p class="notes-n-p">&nbsp;&nbsp;If a Force Majeure situation
                                                        arises, the Professional Service Provider shall promptly notify
                                                        the Company in writing of such conditions and the cause thereof
                                                        within fifteen calendar days. Unless otherwise directed by the
                                                        Company in writing, the Professional Service Provider shall
                                                        continue to perform its obligations under the Contract as far as
                                                        is reasonably practical, and shall seek all reasonable
                                                        alternative means for performance not prevented by the Force
                                                        Majeure event. </p>
                                                    <p class="notes-n-p">&nbsp;&nbsp;In such a case the time for
                                                        performance shall be extended by a period not less than duration
                                                        of such delay. If the duration of delay continues beyond a
                                                        period of three months, the Company and the Professional Service
                                                        Provider shall hold performance in an endeavour to find a
                                                        solution to the problem. </p>
                                                    <p class="notes-n-p">&nbsp;&nbsp;Notwithstanding the above, the
                                                        decision of the Company shall be final and binding on the
                                                        Professional Service Provider as far as it is reasonably
                                                        practicable. . </p>

                                                    <h6 class="agreed-t-and-c-h3 text-voilet-dark font-weight-bold">
                                                        <b>22.</b>Corrupt and fraudulent practices</h6>
                                                    <p class="notes-n-p">&nbsp;&nbsp;As per Central Vigilance Commission
                                                        (CVC) directives, it is required that Professional Service
                                                        Provider Reseller observe the highest standard of ethics during
                                                        the procurement and execution of such contracts in pursuance of
                                                        this policy:</p>
                                                    <p class="notes-n-p">&nbsp;&nbsp;“Corrupt Practice” means the
                                                        offering, giving, receiving or soliciting of anything of values
                                                        to influence the action of an official in the procurement
                                                        process or in contract execution.</p>
                                                    <p class="notes-n-p">&nbsp;&nbsp;“Fraudulent Practice” means a
                                                        misrepresentation of facts in order to influence a procurement
                                                        process or the execution of contract to the detriment of the
                                                        Company and includes collusive practice among Professional
                                                        Service Providers (prior to or after bid submission) designed to
                                                        establish bid prices at artificial non-competitive levels and to
                                                        deprive the Company of the benefits of free and open
                                                        competition.</p>
                                                    <p class="notes-n-p">&nbsp;&nbsp;The Company reserves the right to
                                                        reject a proposal for award if it determines that the
                                                        Professional Service Provider recommended for award has engaged
                                                        in corrupt or fraudulent practices in competing for the contract
                                                        in question.</p>
                                                    <p class="notes-n-p">&nbsp;&nbsp;The Company reserves the right to
                                                        declare a Professional Service Provider ineligible, either
                                                        indefinitely or for a stated period of time, to be awarded a
                                                        contract if at any time it determines that the firm has engaged
                                                        in corrupt or fraudulent practices in competing for or in
                                                        executing the contract.</p>

                                                    <h6 class="agreed-t-and-c-h3 text-voilet-dark font-weight-bold">
                                                        <b>23.</b></h6>
                                                    <p class="notes-n-p">&nbsp;&nbsp;Any provision or covenant of the
                                                        Agreement, which expressly, or by its nature, imposes
                                                        obligations on Professional Service Provider shall so survive
                                                        beyond the expiration, or termination of this Agreement The
                                                        invalidity of one or more provisions contained in this Agreement
                                                        shall not affect the remaining portions of this Agreement or any
                                                        part thereof; and in the event that one or more provisions shall
                                                        be declared void or unenforceable by any court of competent
                                                        jurisdiction, this Agreement shall be construed as if any such
                                                        provision had not been inserted herein. </p>

                                                    <h6 class="agreed-t-and-c-h3 text-voilet-dark font-weight-bold">
                                                        <b>24.</b></h6>
                                                    <p class="notes-n-p"><b>Counterparts- </b>&nbsp;&nbsp;This Agreement
                                                        may be executed in any number of counterparts by the parties,
                                                        each of which when executed and delivered shall constitute an
                                                        original, but all of which shall together constitute one and the
                                                        same instrument.</p>

                                                    <h6 class="agreed-t-and-c-h3 text-voilet-dark font-weight-bold">
                                                        <b>25.</b></h6>
                                                    <p class="notes-n-p"><b> Violation of terms- </b>&nbsp;&nbsp;The
                                                        Company clarifies that the Company shall be entitled to an
                                                        injunction, restraining order, right for recovery, suit for
                                                        specific performance or such other equitable relief from as a
                                                        court of competent jurisdiction as it may deem necessary or
                                                        appropriate to restrain the Professional Service Provider from
                                                        committing any violation or enforce the performance of the
                                                        covenants, obligations and representations contained in this
                                                        Agreement. These injunctive remedies are cumulative and are in
                                                        addition to any other rights and remedies the Company may have
                                                        at law or in equity, including without limitation a right for
                                                        recovery of any amounts and related costs and a right for
                                                        damages. </p>


                                                    <h6 class="agreed-t-and-c-h3 text-voilet-dark font-weight-bold text-center mt-4 mb-4">
                                                        SOP &amp; MANDATORY GUIDELINES (TO BE READ AS PART AND ANNEXURE OF
                                                        E- COMMERCE PROFESSIONAL SERVICE PROVIDER AGREEMENT)</h6>

                                                    <p class="notes-n-p">&nbsp;&nbsp; The Portal is a well-designed
                                                        marketplace for Customers, Businesses and Professional Service
                                                        providers to digitally buy and sell all Professional Services
                                                        needed for timely compliances, smooth operations and better
                                                        growth of businesses. The Portal does not just operate like a
                                                        directory platform. We thrive on enriching the user experience
                                                        right from the point the Buyer books a Professional Service with
                                                        the Professional Service Provider till the time Professional
                                                        Service is delivered completely.</p>
                                                    <p class="notes-n-p">&nbsp;&nbsp;This standard operating procedure
                                                        is compulsorily required to be agreed on and adhered to while
                                                        selling, delivering and taking 100% responsibility of
                                                        Professional Services sold by Professional Service Providers on
                                                        the Portal.</p>
                                                    <p class="notes-n-p">&nbsp;&nbsp;This would help the Portal and you
                                                        as an Expert get maximum business opportunities, provide optimum
                                                        customer satisfaction, increase customer retention and maintain
                                                        transparency and integrity at all levels while dealing with
                                                        Clients and operating with the Portal Team.</p>
                                                    <p class="notes-n-p text-left">&nbsp;&nbsp;Standard Operating
                                                        Procedure</p>
                                                    <p class="notes-n-p">&nbsp;&nbsp;Compulsory procedure to follow when
                                                        you are hired on the Portal or a job/order is assigned to you on
                                                        the Portal while operating on the Portal or any of its mobile
                                                        applications or websites.</p>
                                                    <p class="notes-n-p"><b>1.</b>&nbsp;&nbsp;Standard Response time:
                                                    </p>
                                                    <p class="notes-n-p">&nbsp;&nbsp;Moment you are hired or assigned a
                                                        job/order on the Portal, you have to respond within:</p>
                                                    <ul>
                                                        <li>3 hours if hired before 7 PM</li>
                                                        <li>15 hours if hired after 7 PM</li>
                                                    </ul>
                                                    <p class="notes-n-p">&nbsp;&nbsp;If you fail to reply, then the job
                                                        is transferred to a different expert.</p>

                                                    <p class="notes-n-p"><b>2.</b>&nbsp;&nbsp;Standard First Message:
                                                        Greeting the Client</p>
                                                    <p class="notes-n-p">&nbsp;&nbsp;You have to always send the “Hello”
                                                        greeting to the client who has hired you or assigned it to you.
                                                    </p>
                                                    <p class="notes-n-p"><b>3</b>&nbsp;&nbsp;Standard Second Message</p>
                                                    <p class="notes-n-p">&nbsp;&nbsp;Create a document checklist or
                                                        information checklist and send it to the Client on chat window.
                                                    </p>
                                                    <p class="notes-n-p"><b>4</b>&nbsp;&nbsp;</p>
                                                    <ul>
                                                        <li>In case of Professional Services, the delivery time
                                                            mentioned at the time of Professional Service creation and
                                                            displaying on your Professional Service shall be considered
                                                            as the delivery time. However, if not mentioned at the time
                                                            of Professional Service creation, then mention delivery time
                                                            in days after complete submission of information required.
                                                            Example: This work will be completed in 10 days after
                                                            complete submission of all documents and information.</li>
                                                        <li>In case of Customized Professional Service requirement, the
                                                            delivery time mentioned at the time of Professional Service
                                                            Creation shall be considered as the Delivery Time.</li>
                                                    </ul>
                                                    <p class="notes-n-p"><b>5.</b>&nbsp;&nbsp;Next step is Creating
                                                        Milestones/Status:</p>
                                                    <ul>
                                                        <li>Create different milestones/Status with due dates and
                                                            balance fee amount breakup</li>
                                                        <li>Check first milestone/Status</li>
                                                        <li>Put a delivery deadline to last milestone/Status</li>
                                                    </ul>
                                                    <p class="notes-n-p"><b>6.</b>&nbsp;&nbsp;Regular Updates on Work
                                                        Progress:</p>
                                                    <p class="notes-n-p">&nbsp;&nbsp;Provide regular updates on Work
                                                        Progress every day, if the delivery time is less than 6 days
                                                        otherwise every second day.</p>
                                                    <p class="notes-n-p"><b>7.</b>&nbsp;&nbsp;Send Job Completion
                                                        Request and ask for feedback:</p>
                                                    <ul>
                                                        <li>Once the job is completed from your end, send a job
                                                            completion request to the client from your dashboard.</li>
                                                        <li>When you click on “Complete Order Button” you will be asked
                                                            to enter the work delivered.</li>
                                                        <li>Also ask for positive feedback for your work. Client rates
                                                            on responsiveness, meeting deadlines and overall performance
                                                            and also gives written review (except by CA and Advocate)
                                                        </li>
                                                    </ul>
                                                    <p class="notes-n-p"><b>8.</b>&nbsp;&nbsp;. Extension of Delivery
                                                        Time and Cost:</p>
                                                    <p class="notes-n-p">&nbsp;&nbsp;In the middle of a running job, the
                                                        delivery date and/or cost may be increased only due to the
                                                        following reasons:</p>
                                                    <ul>
                                                        <li>Due to increase in scope of work by client and/or</li>
                                                        <li>Due to any unforeseen event</li>
                                                    </ul>

                                                    <p class="notes-n-p">&nbsp;&nbsp;Following steps are needed to be
                                                        taken mandatorily after approval of Easifyy:</p>
                                                    <ul>
                                                        <li>Increase Delivery Time on Dashboard and mention reason for
                                                            same</li>
                                                        <li>Mention on Chat</li>
                                                        <li>Increase Cost on Job and mention reason</li>
                                                    </ul>
                                                    <p class="notes-n-p"><b>9.</b>&nbsp;&nbsp;Standard Replies to Client
                                                        Problems or Queries about the Portal:</p>
                                                    <ul>
                                                        <li>When Client asks for Mobile Number or Personal Contact Info:
                                                        </li>
                                                        <li>You have to reply saying all communication needs to be done
                                                            on the Portal. In case it is urgent and the chat window is
                                                            not working, contact the Portal team and take written
                                                            permission for communicating outside of the Portal.</li>
                                                        <li>When Client reports problem in sending files &amp; documents:
                                                        </li>
                                                        <li>You have to guide the client to check their internet
                                                            connection and to resend the files on chat. Alternatively,
                                                            guide the client to upload documents under the Order
                                                            Completion page</li>
                                                        <li>When Client asks for a refund:</li>
                                                        <li>You have to reply saying that the client needs to write to
                                                            <a href="mailto:welcome@easifyy.com">welcome@easifyy.com</a>
                                                            to claim a refund.</li>
                                                    </ul>
                                                    <p class="notes-n-p"><b>10.</b>&nbsp;&nbsp;Professional Service
                                                        Providers providing Website Development, Hosting, SSL, Domain
                                                        and other related Professional Services</p>
                                                    <p class="notes-n-p">&nbsp;&nbsp;The Professional Service Provider
                                                        agrees to transfer the website hosting, SSL, Domain and other
                                                        related Professional Services in the Buyer’s Name using Buyer’s
                                                        Email Id and Password on third party hosting, SSL &amp; Domain
                                                        providers after the Buyer has made complete payment. The
                                                        Professional Service Provider in no case shall keep hosting, SSL
                                                        and Domain Professional Services in his or her own name using
                                                        personal email id and credentials after the payment is made by
                                                        the Buyer. The Professional Service Provider should ask buyer to
                                                        buy the hosting, SSL and Domain Professional Services himself or
                                                        herself. In case, there is a dispute or a conflict with respect
                                                        to purchasing hosting, SSL and domain Professional Services, The
                                                        Professional Service Provider shall communicate to the Portal
                                                        via an email to <a href="mailto:welcome@easifyy.com">welcome@easifyy.com</a>
                                                        the Portal. The Portal in certain cases shall create a fresh
                                                        Email Id which will be used to purchase the hosting Professional
                                                        Services, SSL Professional Services and Domain and other related
                                                        Professional Services. The Hosting and Domain Professional
                                                        Services are the intellectual property of the Buyer once the
                                                        buyer has paid for such Professional Services. The Professional
                                                        Service Provider agrees to provide the Website URL of the
                                                        developed website to the Buyer on the Company’s Portal/Website
                                                        and Mobile Applications.</p>
                                                    <p class="notes-n-p">&nbsp;&nbsp;App Publishing: A Professional
                                                        Service Provider cannot publish Mobile Apps on playstore and IOS
                                                        Store using their personal or their Business Email ids and
                                                        Accounts. All Mobile Apps need to be published using Email and
                                                        Account Credentials of the Buyer. Where a Buyer does not have
                                                        AppStore Credentials, Professional Service Providers need to
                                                        report the same to the Portal. The Portal will create a separate
                                                        Email Id for Buyer using which Mobile applications can be
                                                        published on the playstore.</p>
                                                    <p class="notes-n-p">&nbsp;&nbsp;30 Days Compulsory Maintenance and
                                                        Training: The Professional Service Provider shall provide
                                                        compulsory free and complimentary Website and/or App maintenance
                                                        and training for 30 days along for all Website and/or App
                                                        developments Gigs/Professional Services. The Professional
                                                        Service Providers are free to adjust their prices based on the
                                                        same. The maintenance period would start from the date when the
                                                        Order for website development is completed.</p>
                                                    <p class="notes-n-p"><b>11.</b>&nbsp;&nbsp;Service Providers
                                                        providing Web Designing, Video Animation and other related
                                                        Professional Services:</p>
                                                    <p class="notes-n-p">&nbsp;&nbsp;Professional Service Provider
                                                        agrees to assign commercial license of the designs to the Buyer
                                                        after the Buyer has made the Order Payment. The Design is the
                                                        intellectual Property of the Buyer once the Buyer has paid for
                                                        it. The Professional Service Provider agrees to provide the
                                                        Completed Designs along with committed file extensions of the
                                                        finished designs to the Buyer on the Company’s Portal/Website
                                                        and Mobile Applications.</p>
                                                    <p class="notes-n-p"><b>12.</b>&nbsp;&nbsp;Professional Service
                                                        Providers providing Business, Tax &amp; license Registrations, Tax
                                                        Filing &amp; Compliances and other related Professional Services:
                                                    </p>
                                                    <p class="notes-n-p">&nbsp;&nbsp;The Professional Service Provider
                                                        agrees to not apply for any type of Business Registration,
                                                        Licences and other type of government registrations in his or
                                                        her own name using his or her personal email id and/or phone
                                                        number. The Professional Service Provider shall communicate and
                                                        update the application acknowledgement receipt and/or number to
                                                        the Buyer on the Company’s Portal/Website and Mobile
                                                        Applications. The Professional Service Provider agrees to
                                                        provide the Government issued Business Registration and/or
                                                        License to the Buyer on the Company’s Portal/Website and Mobile
                                                        Applications.</p>
                                                    <p class="notes-n-p"><b>13.</b>&nbsp;&nbsp;The Company/Portal
                                                        reserves the right to forfeit full Professional Service Provider
                                                        Fees and even initiate legal proceedings against Professional
                                                        Service Providers who try or attempt to forge or have forged and
                                                        sabotaged hosting accounts and AppStore publishing Accounts of
                                                        Buyers, GST Accounts, Domains, Income tax Accounts, MCA Accounts
                                                        etc.</p>
                                                    <p class="notes-n-p">&nbsp;&nbsp;Be kind and Responsive:</p>
                                                    <p class="notes-n-p">&nbsp;&nbsp;Be kind and Responsive:</p>
                                                    <p class="notes-n-p">&nbsp;&nbsp;This is the foremost SOP which
                                                        Professional Service Providers have to follow. Professional
                                                        Service Providers agree that they will be kind and courteous in
                                                        their dealings and communications with Buyers. Any unethical,
                                                        abusive, rude or offensive behaviour from Professional Service
                                                        Providers shall lead to suspension of account along with Fee
                                                        Forfeiture. Where a Buyer communicates in manner which is
                                                        unethical, abusive, rude or offensive, Professional Service
                                                        Providers agree to report the same via an email to <a href="mailto:welcome@easifyy.com">welcome@easifyy.com</a> .
                                                    </p>
                                                    <p class="notes-n-p">&nbsp;&nbsp;</p>
                                                    <p class="notes-n-p">&nbsp;&nbsp;In jobs in progress, where
                                                        Professional Service Providers don’t agree and follow our SOP we
                                                        cannot be responsible for recovering any amount from clients on
                                                        any grounds.</p>
                                                    <p class="notes-n-p">&nbsp;&nbsp;Only if these SOPs are followed, we
                                                        will best try to recover amounts from clients.</p>
                                                    <p class="notes-n-p">&nbsp;&nbsp; The Company/Portal does not
                                                        promise any settlement, reimbursement and fees recovery in case
                                                        of Professional Service Providers who do not follow the above
                                                        SOPs.</p>
                                                    <p class="notes-n-p">&nbsp;&nbsp;If you have any issues with respect
                                                        to these guidelines, please write to us at <a href="mailti:welcome@easifyy.com">welcome@easifyy.com</a> .
                                                    </p>


                                                    <p class="notes-n-p mt-4">&nbsp;&nbsp;Declaration by Professional
                                                        Service Provider:</p>
                                                    <p class="notes-n-p">&nbsp;&nbsp;I hereby agree to the Terms of Use,
                                                        Standard Operating Procedure, Mandatory Guidelines and the
                                                        Portal Disclaimer.</p>






                                                </div>











                                              <div class="text-center">
                                                  <span class="more" style="">Show more <i class="fa fa-angle-down" aria-hidden="true"></i></span>
                                                  <span class="less" style="display: none;">Show less <i class="fa fa-angle-up" aria-hidden="true"></i></span>
                                              </div>
                                                <hr>
                                            </div>
                                            <script>
                                                $(".more").click(function(){
                                                $("#show").show();
                                                $(".more").hide();
                                                $(".less").show();
                                                });
                                                $(".less").click(function(){
                                                $("#show").hide();
                                                $(".more").show();
                                                $(".less").hide();
                                                });
                                            </script>
                                    </div>
                                    <div class="col-sm-12 col-sm-offset-2">
                                    <h6 class="agreed-t-and-c-h1">Declaration by Expert:</h6>
                                    <div class="checkbox" style="margin-top: 25px;">
                                    <label style="font-size: 16px; color: #000;">
                                    <?php echo $this->Form->checkbox('sop',['hiddenField' => false,'id'=>'sop','onclick'=>"$(this).attr('value', this.checked ? 1 : 0)"]);?>
                                    I here by agree to the Terms of Use, Standard Operating Procedure, Mandatory Guidelines and Easifyy Disclaimer.</label></div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" name="previous" class="previous action-button-previous"><i class="fa fa-angle-left" aria-hidden="true"></i> Previous</button>
                            <button type="button" id="sop-agree-btn" name="make_payment" class="action-button"> Agree <i class="fa fa-angle-right" aria-hidden="true"></i></button>
                        </fieldset>
                        <fieldset>
                            <div class="form-card col-md-6 ml-auto mr-auto">
                                <h4 class="fs-title text-center">Success !</h4> <br><br>
                                <div class="row justify-content-center">                                   
                                    <div class="col-md-12 text-center">
                                        <div class="box-ani bounce-7">
                                            <a href="https://easifyy.com/admin/users/dashboard">
                                                <img src="../../img/ok--v2.gif" class="fit-image" />
                                            </a>
                                        </div>
                                    </div>
                                </div> 
                                <br><br>
                                <div class="row justify-content-center">
                                    <div class="col-7 text-center">
                                        <h5>You Can Choose Services Now !!!!</h5>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



        <?=$this->element('_bundled_product'); ?>
        <?php //if($this->request->getParam('action') ==='edit'): ?>
        <?=$this->element('_product_gallery'); ?>
        <?php //endif; ?>
        
    </div>



    <!--<div class="col-md-2">
        <div class="card">
            <h5 class="card-header m-0"><?php echo __('Product Status'); ?></h5>
            <div class="card-body mt-2">
                <div class="card-text">
                    <div class="input-field col s12">
                        <select name="status" class="" required="required" id="ProductStatus">
                            <option value="">Status</option>
                            <?php foreach ($product_statuses as $key=>$status) : ?>
                            <option value="<?=$key?>"  <?= ($key == $product->status)?'selected':''?> ><?=$status?></option>
                            <?php endforeach; ?>
                        </select>        
                        
                    </div>
                </div>
                <div class="card-text">
                    <button id="product_save" class="btn waves-effect waves-light" type="submit"><?php echo __('Save Product'); ?></button>
                </div>
            </div>
        </div>    
        <?=$this->element('_product_featured'); ?>
        <?=$this->element('_gallery'); ?>

    </div>-->
</div>
<!--  -->