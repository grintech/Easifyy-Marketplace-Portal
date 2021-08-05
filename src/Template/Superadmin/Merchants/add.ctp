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
<?= $this->Form->create(NULL,  array('url'=>'/superadmin/merchants/add')) ?>
<div class="row justify-content-center mt-0">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center pt-3 mt-0 mb-2">
        <div class="card px-0 pt-0 pb-0 mt-0 mb-0 super-seller-pro">
            <h5><strong>Add New PSP </strong></h5>
            <!--<p>Select fields to go to next step</p>-->
            <div class="row mx-0">
                <div class="col-md-12 mx-0">
                    <!-- progressbar -->
                    <ul id="progressbar">
                        <li class="active" id="account" style="width: 100%;"><strong>Personal Details</strong></li>
                    </ul>
                    <!-- fieldsets -->
                    <fieldset>
                        <div class="form-card service-select-form">
                            <h5 class="col-md-12 text-center text-voilet-dark">Personal Details</h5>
                                <div class="input text">
                                    <label for="name_prefix" class="active">Gender</label>
                                    <select name="name_prefix" id="name_prefix" class="col-12">
                                        <option value="Mr.">Mr.</option>
                                        <option value="Ms.">Ms.</option>
                                    </select>
                                </div>
                                <div class="input text required">
                                    <label for="first_name" class="active">FirstName</label>
                                    <input type="text" name="first_name" id="first_name"
                                    class="form-control col-md-12" placeholder="First Name" required="required"
                                    maxlength="200" >
                                </div>
                                <div class="input text">
                                    <label for="last_name" class="active">Last Name</label>
                                    <input type="text" name="last_name" id="last_name" class="form-control col-md-12"
                                        placeholder="Last Name" maxlength="50">
                                </div>
                                <div class="input text required">
                                    <label for="username" class="active">E-Mail</label>
                                    <input type="text" name="username" id="username"
                                        class="form-control col-md-12" placeholder="E-Mail" required="required"
                                        maxlength="100"></div>
                                <div class="input text">
                                    <label for="phone_1" class="active">Phone Number</label>
                                    <input type="text" name="phone" id="phone" class="form-control col-md-12"
                                        placeholder="Phone number" maxlength="15">
                                </div>
                                <div class="input text">
                                    <label for="phone-2" class="active">Alternate Number</label>
                                    <input type="text" name="phone_2" class="form-control col-md-12"
                                        required="required" maxlength="15" id="phone-2" >
                                </div>
                                <div class="input text">
                                    <label for="phone-2" class="active">Password</label>
                                    <input type="password" name="password" class="form-control col-md-12" placeholder="Password" required="required">
                                </div>
                                
                                <!--<h5 class="col-md-12 text-center text-voilet-dark">Billing Business Details</h5>
                                <div class="input text"><label for="service_profession"
                                        class="active">Profession</label><input type="text" name="service_profession"
                                        id="service_profession" class="form-control col-md-12" maxlength="100"
                                         &amp; App Development"></div>
                                <div class="input text"><label for="billing_name" class="active">Service Provider/Firm
                                        Name *</label><input type="text" name="billing_name" id="billing_name"
                                        class="form-control col-md-12" maxlength="150"
                                        ></div>
                                <div class="input text"><label for="address_line_1" class="active">Address line 1
                                        *</label><input type="text" name="address_line_1" id="address_line_1"
                                        class="form-control col-md-12" required="required" maxlength="255"
                                        ></div>
                                <div class="input text"><label for="address-line-2">Address line 2</label><input
                                        type="text" name="address_line_2" class="form-control col-md-12" maxlength="255"
                                        id="address-line-2" ></div>
                                <div class="input select required"><label for="states">State *</label>
                                    <div class="select-wrapper"><input class="select-dropdown dropdown-trigger"
                                            type="text" readonly="true"
                                            data-target="select-options-47a87a50-0f97-1548-5f60-aa125b36867d">
                                        <ul id="select-options-47a87a50-0f97-1548-5f60-aa125b36867d"
                                            class="dropdown-content select-dropdown">
                                            <li id="select-options-47a87a50-0f97-1548-5f60-aa125b36867d0"><span>Andaman
                                                    &amp; Nicobar Islands</span></li>
                                            <li id="select-options-47a87a50-0f97-1548-5f60-aa125b36867d1"><span>Andhra
                                                    Pradesh</span></li>
                                            <li id="select-options-47a87a50-0f97-1548-5f60-aa125b36867d2">
                                                <span>Arunachal Pradesh</span>
                                            </li>
                                            <li id="select-options-47a87a50-0f97-1548-5f60-aa125b36867d3">
                                                <span>Assam</span>
                                            </li>
                                            <li id="select-options-47a87a50-0f97-1548-5f60-aa125b36867d4">
                                                <span>Bihar</span>
                                            </li>
                                            <li id="select-options-47a87a50-0f97-1548-5f60-aa125b36867d5">
                                                <span>Chandigarh</span>
                                            </li>
                                            <li id="select-options-47a87a50-0f97-1548-5f60-aa125b36867d6">
                                                <span>Chhattisgarh</span>
                                            </li>
                                            <li id="select-options-47a87a50-0f97-1548-5f60-aa125b36867d7"><span>Dadra
                                                    &amp; Nagar Haveli</span></li>
                                            <li id="select-options-47a87a50-0f97-1548-5f60-aa125b36867d8"><span>Daman
                                                    &amp; Diu</span></li>
                                            <li id="select-options-47a87a50-0f97-1548-5f60-aa125b36867d9"
                                                class="selected"><span>Delhi</span></li>
                                            <li id="select-options-47a87a50-0f97-1548-5f60-aa125b36867d10">
                                                <span>Goa</span>
                                            </li>
                                            <li id="select-options-47a87a50-0f97-1548-5f60-aa125b36867d11">
                                                <span>Gujarat</span>
                                            </li>
                                            <li id="select-options-47a87a50-0f97-1548-5f60-aa125b36867d12">
                                                <span>Haryana</span>
                                            </li>
                                            <li id="select-options-47a87a50-0f97-1548-5f60-aa125b36867d13">
                                                <span>Himachal Pradesh</span>
                                            </li>
                                            <li id="select-options-47a87a50-0f97-1548-5f60-aa125b36867d14"><span>Jammu
                                                    &amp; Kashmir</span></li>
                                            <li id="select-options-47a87a50-0f97-1548-5f60-aa125b36867d15">
                                                <span>Jharkhand</span>
                                            </li>
                                            <li id="select-options-47a87a50-0f97-1548-5f60-aa125b36867d16">
                                                <span>Karnataka</span>
                                            </li>
                                            <li id="select-options-47a87a50-0f97-1548-5f60-aa125b36867d17">
                                                <span>Kerala</span>
                                            </li>
                                            <li id="select-options-47a87a50-0f97-1548-5f60-aa125b36867d18">
                                                <span>Lakshadweep</span>
                                            </li>
                                            <li id="select-options-47a87a50-0f97-1548-5f60-aa125b36867d19"><span>Madhya
                                                    Pradesh</span></li>
                                            <li id="select-options-47a87a50-0f97-1548-5f60-aa125b36867d20">
                                                <span>Maharashtra</span>
                                            </li>
                                            <li id="select-options-47a87a50-0f97-1548-5f60-aa125b36867d21">
                                                <span>Manipur</span>
                                            </li>
                                            <li id="select-options-47a87a50-0f97-1548-5f60-aa125b36867d22">
                                                <span>Meghalaya</span>
                                            </li>
                                            <li id="select-options-47a87a50-0f97-1548-5f60-aa125b36867d23">
                                                <span>Mizoram</span>
                                            </li>
                                            <li id="select-options-47a87a50-0f97-1548-5f60-aa125b36867d24">
                                                <span>Nagaland</span>
                                            </li>
                                            <li id="select-options-47a87a50-0f97-1548-5f60-aa125b36867d25">
                                                <span>Odisha</span>
                                            </li>
                                            <li id="select-options-47a87a50-0f97-1548-5f60-aa125b36867d26">
                                                <span>Puducherry</span>
                                            </li>
                                            <li id="select-options-47a87a50-0f97-1548-5f60-aa125b36867d27">
                                                <span>Punjab</span>
                                            </li>
                                            <li id="select-options-47a87a50-0f97-1548-5f60-aa125b36867d28">
                                                <span>Rajasthan</span>
                                            </li>
                                            <li id="select-options-47a87a50-0f97-1548-5f60-aa125b36867d29">
                                                <span>Sikkim</span>
                                            </li>
                                            <li id="select-options-47a87a50-0f97-1548-5f60-aa125b36867d30"><span>Tamil
                                                    Nadu</span></li>
                                            <li id="select-options-47a87a50-0f97-1548-5f60-aa125b36867d31">
                                                <span>Telangana</span>
                                            </li>
                                            <li id="select-options-47a87a50-0f97-1548-5f60-aa125b36867d32">
                                                <span>Tripura</span>
                                            </li>
                                            <li id="select-options-47a87a50-0f97-1548-5f60-aa125b36867d33"><span>Uttar
                                                    Pradesh</span></li>
                                            <li id="select-options-47a87a50-0f97-1548-5f60-aa125b36867d34">
                                                <span>Uttarakhand</span>
                                            </li>
                                            <li id="select-options-47a87a50-0f97-1548-5f60-aa125b36867d35"><span>West
                                                    Bengal</span></li>
                                            <li id="select-options-47a87a50-0f97-1548-5f60-aa125b36867d36"><span>Andhra
                                                    Pradesh (New)</span></li>
                                        </ul><svg class="caret" height="24" viewBox="0 0 24 24" width="24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7 10l5 5 5-5z"></path>
                                            <path d="M0 0h24v24H0z" fill="none"></path>
                                        </svg><select name="state_id" id="states" required="required" class=""
                                            tabindex="-1">
                                            <option value="1">Andaman &amp; Nicobar Islands</option>
                                            <option value="2">Andhra Pradesh</option>
                                            <option value="3">Arunachal Pradesh</option>
                                            <option value="4">Assam</option>
                                            <option value="5">Bihar</option>
                                            <option value="6">Chandigarh</option>
                                            <option value="7">Chhattisgarh</option>
                                            <option value="8">Dadra &amp; Nagar Haveli</option>
                                            <option value="9">Daman &amp; Diu</option>
                                            <option value="10" selected="selected">Delhi</option>
                                            <option value="11">Goa</option>
                                            <option value="12">Gujarat</option>
                                            <option value="13">Haryana</option>
                                            <option value="14">Himachal Pradesh</option>
                                            <option value="15">Jammu &amp; Kashmir</option>
                                            <option value="16">Jharkhand</option>
                                            <option value="17">Karnataka</option>
                                            <option value="18">Kerala</option>
                                            <option value="19">Lakshadweep</option>
                                            <option value="20">Madhya Pradesh</option>
                                            <option value="21">Maharashtra</option>
                                            <option value="22">Manipur</option>
                                            <option value="23">Meghalaya</option>
                                            <option value="24">Mizoram</option>
                                            <option value="25">Nagaland</option>
                                            <option value="26">Odisha</option>
                                            <option value="27">Puducherry</option>
                                            <option value="28">Punjab</option>
                                            <option value="29">Rajasthan</option>
                                            <option value="30">Sikkim</option>
                                            <option value="31">Tamil Nadu</option>
                                            <option value="32">Telangana</option>
                                            <option value="33">Tripura</option>
                                            <option value="34">Uttar Pradesh</option>
                                            <option value="35">Uttarakhand</option>
                                            <option value="36">West Bengal</option>
                                            <option value="37">Andhra Pradesh (New)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="input select required"><label for="city-id">City *</label>
                                    <div class="select-wrapper"><input class="select-dropdown dropdown-trigger"
                                            type="text" readonly="true"
                                            data-target="select-options-034e94d9-6e21-19ea-247a-d19e1e92f164">
                                        <ul id="select-options-034e94d9-6e21-19ea-247a-d19e1e92f164"
                                            class="dropdown-content select-dropdown">
                                            <li id="select-options-034e94d9-6e21-19ea-247a-d19e1e92f1640"
                                                class="selected"><span>Delhi</span></li>
                                        </ul><svg class="caret" height="24" viewBox="0 0 24 24" width="24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7 10l5 5 5-5z"></path>
                                            <path d="M0 0h24v24H0z" fill="none"></path>
                                        </svg><select name="city_id" id="city-id" required="required" class=""
                                            tabindex="-1">
                                            <option value="135" selected="selected">Delhi</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="input text"><label for="zip_code" class="active">PIN Code *</label><input
                                        type="text" name="zip_code" id="zip_code" class="form-control col-md-12 onlyNo"
                                        required="required" maxlength="6" ></div>
                                <div class="input text"><label for="pan_number" class="active">Pan Number
                                        *</label><input type="text" name="pan_number" id="pan_number"
                                        class="form-control col-md-12" maxlength="10" ></div>
                                <div class="input text"><label for="gst_number" class="active">GSTIN
                                        Number</label><input type="text" name="gst_number" id="gst_number"
                                        class="form-control col-md-12" maxlength="10" ></div>
                                <div class="input text"><label for="license_number" class="active">Practising
                                        Reg./Licence No.</label><input type="text" name="license_number"
                                        id="license_number" class="form-control col-md-12" maxlength="50"
                                        ></div>
                                <div class="input text"><label for="cin-number" class="active">CIN Number</label><input
                                        type="text" name="cin_number" class="form-control col-md-12" maxlength="30"
                                        id="cin-number" ></div>
                                <div class="input text"><label for="institute_name" class="active">Name of
                                        Institute</label><input type="text" name="institute_name" id="institute_name"
                                        class="form-control col-md-12" maxlength="255"></div>-->
                            </form>
                        </div>
                        <button type="submit" id="profile-settings-btn" name="next" class="action-button"> Add New PSP <i class="fa fa-angle-right" aria-hidden="true"></i></button>
                    </fieldset>
                    <!--<fieldset>
                        <div class="form-card service-select-form">
                            <form method="post" accept-charset="utf-8" id="bank-settings" class="row"
                                action="/admin/merchants/store-settings">
                                <div style="display:none;"><input type="hidden" name="_method" value="PUT"><input
                                        type="hidden" name="_csrfToken" autocomplete="off"
                                        value="d32c4501340f20353a82d7677c40a535f854955c9dd97c8c033da73f7caac7cc7c7b549e4cac561f4bb4982fc427b717916fc916565039ed3adbc9b5ad898e3f">
                                </div>
                                <h5 class="col-md-12 text-center text-voilet-dark mt-0">Bank Details</h5>
                                <div class="input text"><label for="account-number" class="active">Account Number
                                        *</label><input type="text" name="account_number"
                                        class="form-control col-md-12 onlyNo" placeholder="Account Number"
                                        required="required" maxlength="20" id="account-number" value="1234567890"></div>
                                <div class="input text"><label for="account-number-confirm" class="active">Confirm
                                        Account Number *</label><input type="text" name="account_number_confirm"
                                        class="form-control col-md-12 onlyNo" placeholder="Confirm Account Number"
                                        required="required" id="account-number-confirm"></div>
                                <div class="input text"><label for="account-holder" class="active">Account Holder Name
                                        *</label><input type="text" name="account_holder" class="form-control col-md-12"
                                        placeholder="Account Holder Name" required="required" maxlength="100"
                                        id="account-holder" value="Nitin Maheshwari"></div>
                                <div class="input select required"><label for="account_type">Select Account Type
                                        *</label>
                                    <div class="select-wrapper"><input class="select-dropdown dropdown-trigger"
                                            type="text" readonly="true"
                                            data-target="select-options-79ae9cfc-1b5a-1459-514c-5162cb36c670">
                                        <ul id="select-options-79ae9cfc-1b5a-1459-514c-5162cb36c670"
                                            class="dropdown-content select-dropdown">
                                            <li id="select-options-79ae9cfc-1b5a-1459-514c-5162cb36c6700">
                                                <span>Saving</span>
                                            </li>
                                            <li id="select-options-79ae9cfc-1b5a-1459-514c-5162cb36c6701"
                                                class="selected"><span>Current</span></li>
                                        </ul><svg class="caret" height="24" viewBox="0 0 24 24" width="24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7 10l5 5 5-5z"></path>
                                            <path d="M0 0h24v24H0z" fill="none"></path>
                                        </svg><select name="account_type" id="account_type" required="required" class=""
                                            tabindex="-1">
                                            <option value="Saving">Saving</option>
                                            <option value="Current" selected="selected">Current</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="input text"><label for="bank-name" class="active">Bank Name *</label><input
                                        type="text" name="bank_name" class="form-control col-md-12"
                                        placeholder="Bank Name" required="required" maxlength="50" id="bank-name"
                                        value="PNB"></div>
                                <div class="input text"><label for="bank-branch" class="active">Branch Address
                                        *</label><input type="text" name="bank_branch" class="form-control col-md-12"
                                        placeholder="Branch Address" maxlength="255" id="bank-branch" value="banch2">
                                </div>
                                <div class="input text"><label for="ifsc-code" class="active">IFSC Code *</label><input
                                        type="text" name="ifsc_code" class="form-control col-md-12"
                                        placeholder="IFSC Code" required="required" maxlength="20" id="ifsc-code"
                                        value="uco123456"></div>
                                <div class="input text"><label for="micr-code" class="active">MICR Code</label><input
                                        type="text" name="micr_code" class="form-control col-md-12"
                                        placeholder="MICR Code" maxlength="50" id="micr-code" value="009876W"></div>
                            </form>
                        </div>

                        <button type="button" name="previous" class="previous action-button-previous"><i
                                class="fa fa-angle-left" aria-hidden="true"></i> Previous</button>
                        <button type="button" id="bank-settings-btn" name="next" class="action-button"> Save &amp;
                            Continue <i class="fa fa-angle-right" aria-hidden="true"></i></button>
                    </fieldset>
                    <fieldset>
                        <div class="form-card service-select-form">
                            <form method="post" enctype="multipart/form-data" accept-charset="utf-8" id="kyc-details"
                                action="/admin/merchant-kycs/kyc">
                                <div style="display:none;"><input type="hidden" name="_method" value="PUT"><input
                                        type="hidden" name="_csrfToken" autocomplete="off"
                                        value="d32c4501340f20353a82d7677c40a535f854955c9dd97c8c033da73f7caac7cc7c7b549e4cac561f4bb4982fc427b717916fc916565039ed3adbc9b5ad898e3f">
                                </div>
                                <h5 class="col-md-12 text-center text-voilet-dark mt-0">KYC Details</h5>
                                <input hidden="" name="profile-edit" value="modify-profile">
                                <div class="row">
                                    <div class="card-text w-80 col-md-10 float-left p-1">
                                        <label>Identity Verification Proof *</label>
                                        <p>Passport, Aadhar, Voter ID, or Driving License</p>
                                        <span>
                                            <input class="text-voilet-dark" type="file" name="govt_Id"
                                                value="easifyy-logo.png" required="">
                                        </span>
                                    </div>
                                    <img class="w-20 col-md-2 px-0 py-4" src="../../img/kyc-documents/easifyy-logo.png"
                                        width="200px">
                                </div>
                                <div class="row">
                                    <div class="card-text w-80 col-md-10 float-left p-1">
                                        <label>Address Verification Proof </label>
                                        <p>( Utility Bill, Rent Agreement etc. )</p>
                                        <span>
                                            <input class="text-voilet-dark" type="file" name="address_Id"
                                                value="easifyy-logo.png">
                                        </span>
                                    </div>
                                    <img class="w-20 col-md-2 px-0 py-4" src="../../img/kyc-documents/easifyy-logo.png"
                                        width="200px">
                                </div>
                                <div class="row">
                                    <div class="card-text w-80 col-md-10 float-left p-1">
                                        <label>Education Qualification Verification Proof</label>
                                        <p>(COP, Member Id card , Degree copy )</p>
                                        <span>
                                            <input class="text-voilet-dark" type="file" name="qualification_Id"
                                                value="logo.png">
                                        </span>
                                    </div>
                                    <img class="w-20 col-md-2 px-0 py-4" src="../../img/kyc-documents/logo.png"
                                        width="200px">
                                </div>
                                <div class="row">
                                    <div class="card-text w-80 col-md-10 float-left p-1">
                                        <label>GST Certificate</label>
                                        <p></p>
                                        <span>
                                            <input class="text-voilet-dark" type="file" name="gst_declarartion"
                                                value="">
                                        </span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="card-text w-80 col-md-10 float-left p-1">
                                        <label>Bank Cancel Cheque</label>
                                        <p></p>
                                        <span>
                                            <input class="text-voilet-dark" type="file" name="bank_cheque" value="">
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" name="upload_documents" class="btn d-btn-ui">Upload Documents
                                    </button>
                                </div>
                            </form>
                        </div>
                        <button type="button" name="previous" class="previous action-button-previous"><i
                                class="fa fa-angle-left" aria-hidden="true"></i> Previous</button>
                        <button type="button" name="next" class="action-button"
                            onclick="location.href='/admin/users/dashboard'"> Save &amp; Continue </button>
                    </fieldset>-->
                    <!--<fieldset>
                            <div class="w-100 row">
                            <div class="row ui-white-box">
                                <div class="col-sm-12 job_title">
                                <form method="post" accept-charset="utf-8" id="sop-agree" action="/admin/merchants/sop-agree"><div style="display:none;"><input type="hidden" name="_method" value="PUT"/><input type="hidden" name="_csrfToken" autocomplete="off" value="d32c4501340f20353a82d7677c40a535f854955c9dd97c8c033da73f7caac7cc7c7b549e4cac561f4bb4982fc427b717916fc916565039ed3adbc9b5ad898e3f"/></div>                                    <div class="col-sm-12 col-sm-offset-2 text-justify">
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
                                    <input type="checkbox" name="sop" value="1" id="sop" onclick="$(this).attr(&#039;value&#039;, this.checked ? 1 : 0)" checked="checked">                                    I here by agree to the Terms of Use, Standard Operating Procedure, Mandatory Guidelines and Easifyy Disclaimer.</label></div>
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

<?= $this->Form->end() ?>