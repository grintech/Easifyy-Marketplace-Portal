<?php
 /*** @var \App\View\AppView $this * @var \App\Model\Entity\Product $product */ 
?>
<style>

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
    width: auto;
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
    width: 33%;
    float: left;
    position: relative
}

#progressbar #account:before {
    font-family: FontAwesome;
    content: "\f007"
}

#progressbar #personal:before {
    font-family: FontAwesome;
    content: "\f19c"
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
</style>
<?php 
//dd($states);
?>
<div class="row" >
<!-- MultiStep Form -->
<div class="container-fluid" id="grad1">
    <div class="row justify-content-center mt-0">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center pt-3 mt-0 mb-2">
            <div class="card px-0 pt-0 pb-0 mt-0 mb-0">
                <h5><strong>Edit My Profile</strong></h5>
                <!--<p>Select fields to go to next step</p>-->
                <div class="row mx-0">
                    <div class="col-md-12 mx-0">
                        <!-- progressbar -->
                        <ul id="progressbar">
                            <li class="active" id="account"><strong>Personal /Business Details</strong></li>
                            <li id="personal"><strong>Bank Details</strong></li>
                            <li id="payment"><strong>KYC Details</strong></li>
                            <!--<li id="personal"><strong>SOP & Mandatory Guidelines</strong></li>
                            <li id="confirm"><strong>Finish</strong></li>-->
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
                                    <?php echo $this->Form->control('phone_1', array('id'=>'phone_1', 'class' => 'form-control col-md-12', 'placeholder' => __('Phone number'), 'label' => 'Phone Number', 'div' => false , 'required')); ?>
                                    <?php echo $this->Form->control('phone_2', array( 'class' => 'form-control col-md-12', 'placeholder' => __(''), 'label' => 'Alternate Number', 'div' => false , 'required')); ?>
                                    <h5 class="col-md-12 text-center text-voilet-dark">Billing Business Details</h5>
                                    <?php echo $this->Form->control('service_profession', array('id'=>'service_profession', 'class' => 'form-control col-md-12', 'placeholder' => __(''), 'label' => 'Profession', 'div' => false )); ?>
                                    <?php echo $this->Form->control('billing_name', array( 'id'=>'billing_name','class' => 'form-control col-md-12', 'placeholder' => __(''), 'label' => "Service Provider/Firm Name *", 'div' => false )); ?>
                                    <?php echo $this->Form->control('address_line_1', array( 'id'=>'address_line_1','class' => 'form-control col-md-12', 'placeholder' => __(''), 'label' => 'Address line 1 *', 'div' => false , 'required')); ?>
                                    <?php echo $this->Form->control('address_line_2', array( 'class' => 'form-control col-md-12', 'placeholder' => __(''), 'label' => 'Address line 2', 'div' => false )); ?>
                                    <?php echo $this->Form->control('state_id', array('type'=>'select', 'id'=>'states','required' => "required",'div' => false, 'label' => 'State *','class' => "browser-default",'empty' => 'Select State','options'=>$states ) ); ?>
                                    <?php echo $this->Form->control('city_id', array('type'=>'select', 'id'=>'city-id','required' => "required",'label' => 'City *','div' => false, 'class' => "browser-default",'options'=>$cities) ); ?>
                                    <?php echo $this->Form->control('zip_code', array('id'=>'zip_code', 'class' => 'form-control col-md-12 onlyNo', 'placeholder' => __(''), 'label' => 'PIN Code *', 'div' => false , 'required')); ?>

                                    <?php echo $this->Form->control('pan_number', array('id'=>'pan_number', 'class' => 'form-control col-md-12', 'placeholder' => __(''), 'label' => 'Pan Number *', 'div' => false )); ?>
                                    <?php echo $this->Form->control('gst_number', array('id'=>'gst_number', 'class' => 'form-control col-md-12', 'placeholder' => __(''), 'label' => 'GSTIN Number', 'div' => false )); ?>
                                    <?php echo $this->Form->control('license_number', array('id'=>'license_number', 'class' => 'form-control col-md-12', 'placeholder' => __(''), 'label' => 'Practising Reg./Licence No.', 'div' => false )); ?>
                                    <?php echo $this->Form->control('cin_number', array( 'class' => 'form-control col-md-12', 'placeholder' => __(''), 'label' => 'CIN Number', 'div' => false )); ?>
                                    <?php echo $this->Form->control('institute_name', array('id'=>'institute_name', 'class' => 'form-control col-md-12', 'placeholder' => __(''), 'label' => 'Name of Institute', 'div' => false )); ?>

                                    <?= $this->Form->end() ?>
                            </div> 
                            <button type="button" id="profile-settings-btn" name="next" class="action-button">  Save & Continue <i class="fa fa-angle-right" aria-hidden="true"></i></button>
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
                            <button type="button" id="bank-settings-btn" name="next" class="action-button">  Save & Continue <i class="fa fa-angle-right" aria-hidden="true"></i></button>
                        </fieldset>
                        <fieldset>
                            <div class="form-card service-select-form">
                                <?= $this->Form->create($merchantKyc, array('url'=>'/admin/merchant-kycs/kyc','id' => 'kyc-details','enctype'=>'multipart/form-data')) ?>
                                    <h5 class="col-md-12 text-center text-voilet-dark mt-0">KYC Details</h5>
                                    <input hidden name="profile-edit" value="modify-profile" />
                                    <div class="row">
                                        <div class="card-text w-80 col-md-9 float-left p-1">
                                            <label>Identity Verification Proof *</label>
                                            <p>Passport, Aadhar, Voter ID, or Driving License</p>
                                            <span>
                                                <input class="text-voilet-dark" type="file" name="govt_Id"  value="<?= ($merchantKyc->govt_Id)?:'' ?>" <?php if($merchantKyc->govt_Id==""){echo "required";}?> >
                                            </span>
                                        </div>
                                        <?php if($merchantKyc->govt_Id!="") {?>
                                            <!--<img class="w-20 col-md-2 px-0 py-4" src="../../img/kyc-documents/<?=$merchantKyc->govt_Id?>" width="200px"></img>-->
                                            <a class=" col-md-3 py-5" href="https://easifyy.com/img/kyc-documents/<?=$merchantKyc->merchant_id?>/<?=$merchantKyc->govt_Id?>" download><i class="fa fa-download"></i> <?=$merchantKyc->govt_Id?></a>
                                        <?php }?>
                                    </div>
                                    <div class="row">
                                        <div class="card-text w-80 col-md-9 float-left p-1">
                                            <label>Address Verification Proof </label>
                                            <p>( Utility Bill, Rent Agreement etc. )</p>
                                            <span>
                                                <input class="text-voilet-dark" type="file" name="address_Id" value="<?= ($merchantKyc->address_Id)?:'' ?>">
                                            </span>
                                        </div>
                                        <?php if($merchantKyc->address_Id!="") {?>
                                            <!--<img class="w-20 col-md-2 px-0 py-4" src="../../img/kyc-documents/<?=$merchantKyc->address_Id?>" width="200px"></img>-->
                                            <a class=" col-md-3 py-5" href="https://easifyy.com/img/kyc-documents/<?=$merchantKyc->merchant_id?>/<?=$merchantKyc->address_Id?>" download><i class="fa fa-download"></i> <?=$merchantKyc->address_Id?></a>
                                        <?php }?>
                                    </div>
                                    <div class="row">
                                        <div class="card-text w-80 col-md-9 float-left p-1">
                                            <label>Education Qualification Verification Proof</label>
                                            <p>(COP, Member Id card , Degree copy )</p>
                                            <span>
                                                <input class="text-voilet-dark" type="file" name="qualification_Id" value="<?= ($merchantKyc->qualification_Id)?:'' ?>" >
                                            </span>
                                        </div>  
                                        <?php if($merchantKyc->qualification_Id!="") {?>
                                            <!--<img class="w-20 col-md-2 px-0 py-4" src="../../img/kyc-documents/<?=$merchantKyc->qualification_Id?>" width="200px"></img>-->
                                            <a class=" col-md-3 py-5" href="https://easifyy.com/img/kyc-documents/<?=$merchantKyc->merchant_id?>/<?=$merchantKyc->qualification_Id?>" download><i class="fa fa-download"></i> <?=$merchantKyc->qualification_Id?></a>
                                        <?php }?>
                                    </div>
                                    <div class="row">
                                        <div class="card-text w-80 col-md-9 float-left p-1">
                                            <label>GST Certificate</label>
                                            <p></p>
                                            <span>
                                                <input class="text-voilet-dark" type="file" name="gst_declarartion"  value="<?= ($merchantKyc->gst_declarartion)?:'' ?>" >
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
                                                <input class="text-voilet-dark" type="file" name="bank_cheque"  value="<?= ($merchantKyc->bank_cheque)?:'' ?>" >
                                            </span>
                                        </div>
                                        <?php if($merchantKyc->bank_cheque!="") {?>
                                            <!--<img class="w-20 col-md-2 px-0 py-4" src="../../img/kyc-documents/<?=$merchantKyc->bank_cheque ?>" src="" width="200px"></img>-->                      
                                            <a class=" col-md-3 py-5" href="https://easifyy.com/img/kyc-documents/<?=$merchantKyc->merchant_id?>/<?=$merchantKyc->bank_cheque?>" download><i class="fa fa-download"></i> <?=$merchantKyc->bank_cheque?></a>
                                        <?php }?>
                                    </div>
                                    <div class="row">
                                        <div class="card-text w-80 col-md-9 float-left p-1">
                                            <label>Signature</label>
                                            <p></p>
                                            <span>
                                                <input class="text-voilet-dark" type="file" name="signature"  value="<?= ($merchantKyc->signature)?:'' ?>" >
                                            </span>
                                        </div>
                                        <?php if($merchantKyc->signature!="") {?>
                                            <!--<img class="w-20 col-md-2 px-0 py-4" src="../../img/kyc-documents/<?=$merchantKyc->signature ?>" src="" width="200px"></img>-->                      
                                            <a class=" col-md-3 py-5" href="https://easifyy.com/img/kyc-documents/<?=$merchantKyc->merchant_id?>/<?=$merchantKyc->signature?>" download><i class="fa fa-download"></i> <?=$merchantKyc->signature?></a>
                                        <?php }?>
                                    </div>
                                <div class="col-md-12">
                                    <button type="submit" name="upload_documents" class="btn d-btn-ui">Upload Documents </button>
                                </div>
                                <?= $this->Form->end() ?>

                            </div>
                            <button type="button" name="previous" class="previous action-button-previous"><i class="fa fa-angle-left" aria-hidden="true"></i> Previous</button>
                            <button type="button" name="next" class="action-button" onclick="location.href='/admin/users/dashboard'"> Save & Continue </button>
                        </fieldset>
                    <!--<fieldset>
                            <div class="w-100 row">
                            <div class="row ui-white-box">
                                <div class="col-sm-12 job_title">
                                <?= $this->Form->create($merchant, array('url'=>'/admin/merchants/sop-agree','id' => 'sop-agree')) ?>
                                    <div class="col-sm-12 col-sm-offset-2 text-justify">
                                        <p class="agreed-t-and-c-p">Easifyy is a managed marketplace for Consumers &amp; Small Businesses to buy and sell digital services. Easifyy is owned and operated by blizzcraft Infotech Private Limited.</p>
                                        <p class="agreed-t-and-c-p">Easifyy does not just operate like a directory platform. We thrive on enriching the user experience right from the point the Buyer books a service with the Seller till the time service is delivered completely.</p>
                                        <p class="agreed-t-and-c-p">This standard operating procedure is compulsorily required to be agreed on and adhered to while selling, delivering and taking 100% responsibility of services sold by Sellers on Easifyy.</p>
                                        <p class="agreed-t-and-c-p">This would help Easifyy as a Company and you as an Expert get maximum business opportunities, provide optimum customer satisfaction, increase customer retention and maintain transparency and integrity at all levels while dealing with Clients and operating with Easifyy Team.</p>
                                        <h6 class="agreed-t-and-c-h1">Standard Operating Procedure</h6>
                                        <p class="agreed-t-and-c-p">Compulsory procedure to follow when you are hired on Easifyy or a job is assigned to you on Easifyy while operating on 
                                        <a href="/" target="_blank" class="text-voilet-dark">Easifyy.com</a> or any of its mobile applications or websites.
                                        </p>
                                        <h6 class="agreed-t-and-c-h3 text-voilet-dark font-weight-bold">1. Standard Response time:</h6>
                                        <h6 class="agreed-t-and-c-h4 ">Moment you are hired or assigned a job on Easifyy, you have to respond within:</h6>
                                        <ul class="help-ul">
                                        <li>4 hours if hired before 7 PM</li>
                                        <li>18 hours if hired after 7 PM</li>
                                        </ul>
                                        <p class="help-faq-para">If you fail to reply, then the job is transferred to a different expert.</p>
                                        <h6 class="agreed-t-and-c-h3 text-voilet-dark font-weight-bold">2. Standard First Message: Greeting the Client</h6>
                                        <p class="para">A standard greeting text is pre-filled in the chat text box. You have to always send that greeting to the client who has hired you or assigned it to you.</p>
                                        <h6 class="agreed-t-and-c-h3 text-voilet-dark font-weight-bold">3. Standard Second Message </h6>
                                        <h6 class="agreed-t-and-c-h4">Share Documents checklist or Ask for Information:</h6>
                                        <p class="para">Create a document checklist or information checklist and send it to the Client on chat window.</p>
                                        <h6 class="agreed-t-and-c-h3 text-voilet-dark font-weight-bold">4. Standard Third Message: Mention Delivery Time</h6>
                                        <ul class="help-ul">
                                        <li>Mention delivery time in days after complete submission of information required. Example: This work will be completed in 10 days after complete submission of all documents and information.</li>
                                        <li>In case of Gigs, the delivery time mentioned at the time of gig creation and displaying on your gig shall be considered as the delivery time.</li>
                                        <li>In case of Custom Gigs, the delivery time mentioned at the time of Gig Creation shall be considered and displayed and the Delivery Time.</li>
                                        </ul>
                                        <h6 class="agreed-t-and-c-h3 text-voilet-dark font-weight-bold">5. Next step is Creating Milestones:</h6>
                                        <ul class="help-ul">
                                        <li>Create different milestones with due dates and balance fee amount breakup</li>
                                        <li>Check first milestone</li>
                                        <li>Put a delivery deadline to last milestone</li>
                                        </ul>
                                        <h6 class="agreed-t-and-c-h3 text-voilet-dark font-weight-bold">6. Regular Updates on Work Progress:</h6>
                                        <p class="para">Provide regular updates on Work Progress every day or every second day.</p>
                                        <h6 class="agreed-t-and-c-h3 text-voilet-dark font-weight-bold">7. Send Job Completion Request and ask for feedback:</h6>
                                        <ul class="help-ul">
                                        <li>Once the job is completed from your end, send a job completion request to the client from your app or dashboard.</li>
                                        <li>When you click on “Request Completion Button” you will be asked to enter the work delivered.</li>
                                        <li>Also ask for positive feedback for your work. Client rates on responsiveness, meeting deadlines and overall performance and also gives written review.</li>
                                        </ul>
                                        <h6 class="agreed-t-and-c-h3 text-voilet-dark font-weight-bold">8. Extension of Delivery Time and Cost:</h6>
                                        <h6 class="agreed-t-and-c-h4">In case where in the middle of a running job, the delivery date and/or cost is increased due to any reasons:</h6>
                                        <ul class="help-ul">
                                        <li>Due to increase in scope of work by client</li>
                                        <li>Due to any unforeseen event</li>
                                        </ul>
                                        <h6 class="agreed-t-and-c-h4">Following steps are needed to be taken mandatorily:</h6>
                                        <ul class="help-ul">
                                        <li>Increase Delivery Time on Dashboard and mention reason for same</li>
                                        <li>Mention on Chat</li>
                                        <li>Increase Cost on Job and mention reason</li>
                                        </ul>
                                        <h6 class="agreed-t-and-c-h3 text-voilet-dark font-weight-bold">9. Standard Replies to Client Problems or Queries about Easifyy:</h6>
                                        <ul >
                                        <li>
                                            <b>When Client asks for Mobile Number or Personal Contact Info:</b>
                                        </li>
                                        <li>You have to reply saying all communication needs to be done on Easifyy. Guide the client to call you using the top Call Button at top right corner or message you. In case it is urgent and the calling is not working, contact Easifyy team and take permission for communicating outside of Easifyy.</li>
                                        <li>
                                            <b>When Client reports problem in sending files &amp; documents:</b>
                                        </li>
                                        <li>You have to guide the client to check their internet connection and to resend the files on chat. Alternatively, guide the client to upload documents under the files tab.</li>
                                        <li>
                                            <b>When Client asks for a refund: </b>
                                        </li>
                                        <li>You have to reply saying that the client needs to write to 
                                            <a class="text-voilet-dark" href="mailto:support@Easifyy.com">support@Easifyy.com</a> to claim a refund.
                                        </li>
                                        </ul>
                                        <h6 class="agreed-t-and-c-h1 text-voilet-dark font-weight-bold">10. Sellers providing Website Development, Hosting, SSL, Domain and other related</h6>
                                        <p class="agreed-t-and-c-p">
                                        <b>services:</b> The Seller agrees to transfer the website hosting, SSL, Domain and other related services  in the Buyer’s Name using Buyer’s Email Id and Password on third party hosting, SSL &amp; Domain Providers <i>after the Buyer has made complete payment</i>. The Seller in no case shall keep hosting, SSL and Domain Services in his or her own name using personal email id and credentials after the payment is made by the Buyer. The Seller should ask buyer to buy the hosting, SSL and Domain Services himself or herself.  In case, there is a dispute or a conflict with respect to purchasing hosting, SSL and domain services, The Seller shall communicate to Easifyy via an email to <a class="text-voilet-dark" href="mailto:support@Easifyy.com">support@Easifyy.com</a>. Easifyy in certain cases shall create a fresh Email Id which will be used to purchase the hosting services, SSL services and Domain and other related Services. The Hosting and Domain Services are the intellectual property of the Buyer once the buyer has paid for such services. The Seller agrees to provide the Website URL of the developed website to the Buyer on Mindzpro’s Website and Mobile Applications.<br> <b>App Publishing:</b>  A Seller cannot publish Mobile Apps on playstore and IOS Store using their personal or their Business Email ids and Accounts. All Mobile Apps need to be published using Email and Account Credentials of the Buyer. Where a Buyer does not have AppStore Credentials, Sellers need to report the same to Easifyy. Easifyy will create a separate Email Id for Buyer using which Mobile applications can be published on the playstore.<br> <b>30 Days Compulsory Maintenance and Training:</b> The Seller shall provide compulsory free and complimentary Website and/or App maintenance and training for 30 days along for all Website and/or App developments Gigs/Services. The Sellers are free to adjust their prices based on the same. The maintenance period would start from the date when the Order for website development is completed.
                                        </p>
                                        <h6 class="agreed-t-and-c-h1 text-voilet-dark font-weight-bold">11. Sellers providing Web Designing, Video Animation and other related services:</h6>
                                        <p class="agreed-t-and-c-p">Seller agrees to assign commercial license of the designs to the Buyer after the Buyer has made the Order Payment. The Design is the intellectual Property of the Buyer once the Buyer has paid for it. The Seller agrees to provide the Completed Designs along with committed file extensions  of the finished designs to the Buyer on Mindzpro’s Website and Mobile Applications.</p>
                                        <h6 class="agreed-t-and-c-h1 text-voilet-dark font-weight-bold">12. Sellers providing Business, Tax &amp; license Registrations, Tax Filing &amp; Compliances and other related services:</h6>
                                        <p class="agreed-t-and-c-p">The Seller agrees to not apply for any type of Business Registration, Licences and other type of government registrations in his or her own name using his or her personal email id and/or phone number. The Seller shall communicate and update  the application acknowledgement receipt and/or number to the Buyer on Mindzpro’s Website and Mobile Applications. The Seller agrees to provide the Government issued Business Registration and/or License to the Buyer on Mindzpro’s Website and Mobile Applications.</p>
                                        <h6 class="agreed-t-and-c-h1 text-voilet-dark font-weight-bold">13.</h6>
                                        <p class="agreed-t-and-c-p">Easifyy reserves the right to forfeit full Seller Fees and even initiate legal proceedings against Sellers who try or attempt to forge or have forged and sabotaged hosting accounts and AppStore publishing Accounts of Buyers, GST Accounts, Domains, Income tax Accounts, MCA Accounts etc.</p>
                                        <h6 class="agreed-t-and-c-h1">Be kind and Responsive:</h6>
                                        <p class="agreed-t-and-c-p">This is the foremost SOP which we Sellers have to follow. Sellers agree that the will be kind and courteous in their dealings and communications with Buyers. Any unethical, abusive, rude or offensive behaviour from Sellers shall lead to suspension of account along with Fee Forfeiture. Where a Buyer communicates in manner which is unethical, abusive, rude or offensive, Sellers agree to report the same via an email to <a class="text-voilet-dark" href="mailto:support@Easifyy.com">support@Easifyy.com</a>.</p>
                                        <h6 class="agreed-t-and-c-h1">Easifyy Disclaimer</h6>
                                        <p class="agreed-t-and-c-p">In jobs in progress, where Experts don’t agree and follow our SOP we cannot be responsible for recovering any amount from clients on any grounds.</p>
                                        <p class="agreed-t-and-c-p">Only if these SOPs are followed, we can reimburse the experts for their cost and as well try to recover amounts from clients.</p>
                                        <h6 class="agreed-t-and-c-h3">Easifyy does not promise any settlement, reimbursement and fees recovery in case of  Experts who do not do the following:</h6>
                                        <ul class="help-ul">
                                        <li>create proper milestones with dates and milestone amount</li>
                                        <li>track milestones completed</li>
                                        <li>Ask clients to deposit escrow payments for milestones</li>
                                        <li>Set a delivery date</li>
                                        <li>In case delivery date and Cost is extended by means of discussion with the Client over a call or a chat,  reasons for the extension have to be mentioned and agreed upon on the Chat window. </li>
                                        <li>Attach the evidence of service delivered on the dashboard. Example: Website URL in case of Website Developed, GST Number &amp; ARN in case of GST Registration, Blog Copy in case of Content Writing, Design with all files format in case of design, Reports in case of Marketing &amp; SEO. </li>
                                        </ul>
                                        <h6 class="agreed-t-and-c-h4"><i>If you have any issues with respect to these guidelines, please write to us at <a class="text-voilet-dark" href="mailto:support@Easifyy.com">support@Easifyy.com</a>.</i></h6>
                                        <hr>
                                    </div>
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
                            <button type="button" name="previous" class="previous action-button-previous"><i class="fa fa-angle-left" aria-hidden="true"></i> Back</button>
                            <button type="button" id="sop-agree-btn" name="make_payment" class="action-button"> Agree <i class="fa fa-angle-right" aria-hidden="true"></i></button>
                        </fieldset>
                        <fieldset>
                            <div class="form-card col-md-6 ml-auto mr-auto">
                                <h4 class="fs-title text-center">Success !</h4> <br><br>
                                <div class="row justify-content-center">                                   
                                        <div class="col-md-12 text-center"><div class="box-ani bounce-7"><img src="https://mindzpro.com/img/ok--v2.gif" class="fit-image"></div></div>
                                </div> <br><br>
                                <div class="row justify-content-center">
                                    <div class="col-7 text-center">
                                        <h5>You Can Choose Services Now !!!!</h5>
                                    </div>
                                </div>
                            </div>
                        </fieldset>-->
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