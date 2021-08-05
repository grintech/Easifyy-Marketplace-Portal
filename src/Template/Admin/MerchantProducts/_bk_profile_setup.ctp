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
    margin-bottom: 25px;
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
    padding: 10px 5px;
    margin: 10px 5px
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
    padding: 10px 5px;
    margin: 10px 5px
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

.fit-image {
    width: 100%;
    object-fit: cover
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
                                <?= $this->Form->create($merchant, array('url'=>'admin/merchants/store-settings')) ?>
                                    <?php echo $this->Form->control('store_name', array( 'class' => 'form-control', 'placeholder' => __('Name'), 'label' => false, 'div' => false )); ?>
                                    <?php echo $this->Form->control('username', array( 'class' => 'form-control', 'placeholder' => __('E-Mail'), 'label' => false, 'div' => false )); ?>
                                    <?php echo $this->Form->control('phone_1', array( 'class' => 'form-control', 'placeholder' => __('Phone number'), 'label' => false, 'div' => false , 'required')); ?>
                                    <?php echo $this->Form->control('phone_2', array( 'class' => 'form-control', 'placeholder' => __('Alternate Number'), 'label' => false, 'div' => false , 'required')); ?>
                                    <hr>
                                    <?php echo $this->Form->control('gst_number', array( 'class' => 'form-control', 'placeholder' => __('GST no.'), 'label' => false, 'div' => false )); ?>
                                    <?php echo $this->Form->control('pan_number', array( 'class' => 'form-control', 'placeholder' => __('PAN no.'), 'label' => false, 'div' => false )); ?>
                                    <?php echo $this->Form->control('license_number', array( 'class' => 'form-control', 'placeholder' => __('License no.'), 'label' => false, 'div' => false )); ?>
                                    <?php echo $this->Form->control('institute_name', array( 'class' => 'form-control', 'placeholder' => __('Name of Institute'), 'label' => false, 'div' => false )); ?>
                                    <?php echo $this->Form->control('address_line_1', array( 'class' => 'form-control', 'placeholder' => __('Address line 1'), 'label' => false, 'div' => false , 'required')); ?>
                                    <?php echo $this->Form->control('address_line_2', array( 'class' => 'form-control', 'placeholder' => __('Address line 2'), 'label' => false, 'div' => false )); ?>
                                    
                                    <?php echo $this->Form->control('city_id', array('type'=>'select', 'id'=>'city-id','required' => "required",'label' => false,'div' => false, 'class' => "",'options'=>$cities) ); ?>
                                    <?php echo $this->Form->control('state_id', array('type'=>'select', 'id'=>'states','required' => "required",'div' => false, 'label' => false,'class' => "",'options'=>$states ) ); ?>
                                    <?php echo $this->Form->control('zip_code', array( 'class' => 'form-control', 'placeholder' => __('PIN Code'), 'label' => false, 'div' => false , 'required')); ?>
                                    <button type="submit" name="next" class="profile-next action-button"> Next <span class="material-icons">navigate_next</span></button>
                                <?= $this->Form->end() ?>
                            </div> 
                        </fieldset>
                        <fieldset>
                            <div class="d-flex justify-content-center">
                                <h5 class="text-voilet-dark mb-2 py-2 font-weight-bold custom-border rounded col-md-6 serviceName" >Bank Details</h5>
                            </div>
                            <?php echo $this->Form->control('account_number', array( 'class' => 'form-control', 'placeholder' => __('Account number'), 'label' => false, 'div' => false , 'required')); ?>
                            <?php echo $this->Form->select('account_type', array('Saving' => __('Saving'), 'Current' => __('Current') ), array( 'class' => '', 'empty' => __('Select account type'), 'label' => false, 'div' => false )); ?>
                            <?php echo $this->Form->control('bank_name', array( 'class' => 'form-control', 'placeholder' => __('Bank name'), 'label' => false, 'div' => false , 'required')); ?>
                            <?php echo $this->Form->control('bank_branch', array( 'class' => 'form-control', 'placeholder' => __('Bank branch'), 'label' => false, 'div' => false )); ?>
                            <?php echo $this->Form->control('ifsc_code', array( 'class' => 'form-control', 'placeholder' => __('IFSC code'), 'label' => false, 'div' => false , 'required')); ?>
                            <?php echo $this->Form->control('micr_code', array( 'class' => 'form-control', 'placeholder' => __('MICR code'), 'label' => false, 'div' => false )); ?>

                            <input type="button" name="previous" class="previous action-button-previous" value="Previous" /> 
                            <input type="button" name="next" class="profile-next action-button" value="Next Step" />
                        </fieldset>
                        <fieldset>
                            <div class="d-flex justify-content-center">
                                <h5 class="text-voilet-dark mb-2 py-2  font-weight-bold custom-border rounded col-md-6 serviceName" >Kyc Details</h5>
                            </div>
                            <div class="form-card py-1 px-2">
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
                            <input type="button" name="previous" class="previous action-button-previous" value="Previous" /> 
                            <input type="button" name="next" class="profile-next action-button" value="Next Step" />
                        </fieldset>
                        <fieldset>
                            <div class="d-flex justify-content-center">
                                <h5 class="text-voilet-dark mb-2 py-2 font-weight-bold custom-border rounded col-md-6 serviceName" >Selected Service Name</h5>
                            </div>
                            <div class="w-100 row">
                            <div class="row ui-white-box">
                                <div class="col-sm-12 job_title">
                                    <div class="col-sm-12 col-sm-offset-2">
                                        <!-- <p class="para">
                                        <a style="font-size: 14px; color: rgb(255, 51, 102);">
                                        <i class="fa fa-long-arrow-left"></i> Go Back</a>
                                        </p> -->
                                        <p class="agreed-t-and-c-p">Mindzpro is a managed marketplace for Consumers &amp; Small Businesses to buy and sell digital services. Mindzpro is owned and operated by blizzcraft Infotech Private Limited.</p>
                                        <p class="agreed-t-and-c-p">Mindzpro does not just operate like a directory platform. We thrive on enriching the user experience right from the point the Buyer books a service with the Seller till the time service is delivered completely.</p>
                                        <p class="agreed-t-and-c-p">This standard operating procedure is compulsorily required to be agreed on and adhered to while selling, delivering and taking 100% responsibility of services sold by Sellers on Mindzpro.</p>
                                        <p class="agreed-t-and-c-p">This would help Mindzpro as a Company and you as an Expert get maximum business opportunities, provide optimum customer satisfaction, increase customer retention and maintain transparency and integrity at all levels while dealing with Clients and operating with Mindzpro Team.</p>
                                        <h5 class="agreed-t-and-c-h1">Standard Operating Procedure</h5>
                                        <p class="agreed-t-and-c-p">Compulsory procedure to follow when you are hired on Mindzpro or a job is assigned to you on Mindzpro while operating on 
                                        <a href="/" target="_blank" style="color: rgb(255, 51, 102);">Mindzpro.com</a> or any of its mobile applications or websites.
                                        </p>
                                        <h5 class="agreed-t-and-c-h3">1. Standard Response time:</h5>
                                        <h5 class="agreed-t-and-c-h4">Moment you are hired or assigned a job on Mindzpro, you have to respond within:</h5>
                                        <ul class="help-ul">
                                        <li>4 hours if hired before 7 PM</li>
                                        <li>18 hours if hired after 7 PM</li>
                                        </ul>
                                        <p class="help-faq-para">If you fail to reply, then the job is transferred to a different expert.</p>
                                        <h5 class="agreed-t-and-c-h3">2. Standard First Message: Greeting the Client</h5>
                                        <p class="para">A standard greeting text is pre-filled in the chat text box. You have to always send that greeting to the client who has hired you or assigned it to you.</p>
                                        <h5 class="agreed-t-and-c-h3">3. Standard Second Message </h5>
                                        <h5 class="agreed-t-and-c-h4">Share Documents checklist or Ask for Information:</h5>
                                        <p class="para">Create a document checklist or information checklist and send it to the Client on chat window.</p>
                                        <h5 class="agreed-t-and-c-h3">4. Standard Third Message: Mention Delivery Time</h5>
                                        <ul class="help-ul">
                                        <li>Mention delivery time in days after complete submission of information required. Example: This work will be completed in 10 days after complete submission of all documents and information.</li>
                                        <li>In case of Gigs, the delivery time mentioned at the time of gig creation and displaying on your gig shall be considered as the delivery time.</li>
                                        <li>In case of Custom Gigs, the delivery time mentioned at the time of Gig Creation shall be considered and displayed and the Delivery Time.</li>
                                        </ul>
                                        <h5 class="agreed-t-and-c-h3">5. Next step is Creating Milestones:</h5>
                                        <ul class="help-ul">
                                        <li>Create different milestones with due dates and balance fee amount breakup</li>
                                        <li>Check first milestone</li>
                                        <li>Put a delivery deadline to last milestone</li>
                                        </ul>
                                        <h5 class="agreed-t-and-c-h3">6. Regular Updates on Work Progress:</h5>
                                        <p class="para">Provide regular updates on Work Progress every day or every second day.</p>
                                        <h5 class="agreed-t-and-c-h3">7. Send Job Completion Request and ask for feedback:</h5>
                                        <ul class="help-ul">
                                        <li>Once the job is completed from your end, send a job completion request to the client from your app or dashboard.</li>
                                        <li>When you click on “Request Completion Button” you will be asked to enter the work delivered.</li>
                                        <li>Also ask for positive feedback for your work. Client rates on responsiveness, meeting deadlines and overall performance and also gives written review.</li>
                                        </ul>
                                        <h5 class="agreed-t-and-c-h3">8. Extension of Delivery Time and Cost:</h5>
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
                                        <h5 class="agreed-t-and-c-h3">9. Standard Replies to Client Problems or Queries about Mindzpro:</h5>
                                        <ul >
                                        <li>
                                            <b>When Client asks for Mobile Number or Personal Contact Info:</b>
                                        </li>
                                        <li>You have to reply saying all communication needs to be done on Mindzpro. Guide the client to call you using the top Call Button at top right corner or message you. In case it is urgent and the calling is not working, contact Mindzpro team and take permission for communicating outside of Mindzpro.</li>
                                        <li>
                                            <b>When Client reports problem in sending files &amp; documents:</b>
                                        </li>
                                        <li>You have to guide the client to check their internet connection and to resend the files on chat. Alternatively, guide the client to upload documents under the files tab.</li>
                                        <li>
                                            <b>When Client asks for a refund: </b>
                                        </li>
                                        <li>You have to reply saying that the client needs to write to 
                                            <a href="mailto:support@Mindzpro.com">support@Mindzpro.com</a> to claim a refund.
                                        </li>
                                        </ul>
                                        <h5 class="agreed-t-and-c-h1">10. Sellers providing Website Development, Hosting, SSL, Domain and other related</h5>
                                        <p class="agreed-t-and-c-p">
                                        <b>services:</b> The Seller agrees to transfer the website hosting, SSL, Domain and other related services  in the Buyer’s Name using Buyer’s Email Id and Password on third party hosting, SSL &amp; Domain Providers <i>after the Buyer has made complete payment</i>. The Seller in no case shall keep hosting, SSL and Domain Services in his or her own name using personal email id and credentials after the payment is made by the Buyer. The Seller should ask buyer to buy the hosting, SSL and Domain Services himself or herself.  In case, there is a dispute or a conflict with respect to purchasing hosting, SSL and domain services, The Seller shall communicate to Mindzpro via an email to <a href="mailto:support@Mindzpro.com">support@Mindzpro.com</a>. Mindzpro in certain cases shall create a fresh Email Id which will be used to purchase the hosting services, SSL services and Domain and other related Services. The Hosting and Domain Services are the intellectual property of the Buyer once the buyer has paid for such services. The Seller agrees to provide the Website URL of the developed website to the Buyer on Mindzpro’s Website and Mobile Applications.<br> <b>App Publishing:</b>  A Seller cannot publish Mobile Apps on playstore and IOS Store using their personal or their Business Email ids and Accounts. All Mobile Apps need to be published using Email and Account Credentials of the Buyer. Where a Buyer does not have AppStore Credentials, Sellers need to report the same to Mindzpro. Mindzpro will create a separate Email Id for Buyer using which Mobile applications can be published on the playstore.<br> <b>30 Days Compulsory Maintenance and Training:</b> The Seller shall provide compulsory free and complimentary Website and/or App maintenance and training for 30 days along for all Website and/or App developments Gigs/Services. The Sellers are free to adjust their prices based on the same. The maintenance period would start from the date when the Order for website development is completed.
                                        </p>
                                        <h5 class="agreed-t-and-c-h1">11. Sellers providing Web Designing, Video Animation and other related services:</h5>
                                        <p class="agreed-t-and-c-p">Seller agrees to assign commercial license of the designs to the Buyer after the Buyer has made the Order Payment. The Design is the intellectual Property of the Buyer once the Buyer has paid for it. The Seller agrees to provide the Completed Designs along with committed file extensions  of the finished designs to the Buyer on Mindzpro’s Website and Mobile Applications.</p>
                                        <h5 class="agreed-t-and-c-h1">12. Sellers providing Business, Tax &amp; license Registrations, Tax Filing &amp; Compliances and other related services:</h5>
                                        <p class="agreed-t-and-c-p">The Seller agrees to not apply for any type of Business Registration, Licences and other type of government registrations in his or her own name using his or her personal email id and/or phone number. The Seller shall communicate and update  the application acknowledgement receipt and/or number to the Buyer on Mindzpro’s Website and Mobile Applications. The Seller agrees to provide the Government issued Business Registration and/or License to the Buyer on Mindzpro’s Website and Mobile Applications.</p>
                                        <h5 class="agreed-t-and-c-h1">13.</h5>
                                        <p class="agreed-t-and-c-p">Mindzpro reserves the right to forfeit full Seller Fees and even initiate legal proceedings against Sellers who try or attempt to forge or have forged and sabotaged hosting accounts and AppStore publishing Accounts of Buyers, GST Accounts, Domains, Income tax Accounts, MCA Accounts etc.</p>
                                        <h5 class="agreed-t-and-c-h1">Be kind and Responsive:</h5>
                                        <p class="agreed-t-and-c-p">This is the foremost SOP which we Sellers have to follow. Sellers agree that the will be kind and courteous in their dealings and communications with Buyers. Any unethical, abusive, rude or offensive behaviour from Sellers shall lead to suspension of account along with Fee Forfeiture. Where a Buyer communicates in manner which is unethical, abusive, rude or offensive, Sellers agree to report the same via an email to <a href="mailto:support@Mindzpro.com">support@Mindzpro.com</a>.</p>
                                        <h5 class="agreed-t-and-c-h1">Mindzpro Disclaimer</h5>
                                        <p class="agreed-t-and-c-p">In jobs in progress, where Experts don’t agree and follow our SOP we cannot be responsible for recovering any amount from clients on any grounds.</p>
                                        <p class="agreed-t-and-c-p">Only if these SOPs are followed, we can reimburse the experts for their cost and as well try to recover amounts from clients.</p>
                                        <h5 class="agreed-t-and-c-h3">Mindzpro does not promise any settlement, reimbursement and fees recovery in case of  Experts who do not do the following:</h5>
                                        <ul class="help-ul">
                                        <li>create proper milestones with dates and milestone amount</li>
                                        <li>track milestones completed</li>
                                        <li>Ask clients to deposit escrow payments for milestones</li>
                                        <li>Set a delivery date</li>
                                        <li>In case delivery date and Cost is extended by means of discussion with the Client over a call or a chat,  reasons for the extension have to be mentioned and agreed upon on the Chat window. </li>
                                        <li>Attach the evidence of service delivered on the dashboard. Example: Website URL in case of Website Developed, GST Number &amp; ARN in case of GST Registration, Blog Copy in case of Content Writing, Design with all files format in case of design, Reports in case of Marketing &amp; SEO. </li>
                                        </ul>
                                        <h6 class="agreed-t-and-c-h4"><i>If you have any issues with respect to these guidelines, please write to us at <a href="mailto:support@Mindzpro.com">support@Mindzpro.com</a>.</i></h6>
                                        <hr>
                                    </div>
                                    </div>
                                    <div class="col-sm-12 col-sm-offset-2">
                                    <h5 class="agreed-t-and-c-h1">Declaration by Expert:</h5>
                                    <div class="checkbox" style="margin-top: 25px;"><label style="font-size: 16px; color: #000;"><input type="checkbox"> I here by agree to the Terms of Use, Standard Operating Procedure, Mandatory Guidelines and Mindzpro Disclaimer.</label></div>
                                    <p>&nbsp;</p>
                                    <div class="text-center"><button class="btn d-btn-ui">Agree</button></div>
                                    </div>
                                </div>
                            </div>
                            <input type="button" name="previous" class="previous action-button-previous" value="Previous" /> 
                            <button type="submit" id="product_save" name="make_payment" class="next action-button">Confirm </button>
                        </fieldset>
                        <fieldset>
                            <div class="form-card">
                                <h2 class="fs-title text-center">Success !</h2> <br><br>
                                <div class="row justify-content-center">
                                    <div class="col-3"><a href=""> <img src="https://img.icons8.com/color/96/000000/ok--v2.png" class="fit-image"></a> </div>
                                </div> <br><br>
                                <div class="row justify-content-center">
                                    <div class="col-7 text-center">
                                        <h5>Service Saved Successfully!!!!</h5>
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