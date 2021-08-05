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
    width: 100%;
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
                <!--<h5><strong>Edit My Profile</strong></h5>-->
                <!--<p>Select fields to go to next step</p>-->
                <div class="row mx-0">
                    <div class="col-md-12 mx-0">
                        <!-- progressbar -->
                        <ul id="progressbar">
                            <li class="active" id="account"><strong>Change Password</strong></li>
                        </ul> 
                        <!-- fieldsets -->
                        <fieldset>
                            <div class="form-card service-select-form">
                                <?= $this->Form->create('',array('url'=>'/admin/users/changePassword','id' => 'profile-settings' ,'class'=>'row')) ?>
                                    <h5 class="col-md-12 text-center text-voilet-dark">Personal Details</h5>
                                    <?php //echo $this->Form->control('prePassword', array( 'id'=>'previousPassword','class' => 'form-control col-md-12', 'placeholder' => __('Current Password'), 'label' => "Current Password", 'div' => true,'type'=>'password' )); ?>
                                    <?php echo $this->Form->control('newPassword', array( 'id'=>'newPassword','class' => 'form-control col-md-12', 'placeholder' => __('New Password'), 'label' => "New Password", 'div' => false )); ?>
                                    <?php echo $this->Form->control('confirmPassword', array( 'id'=>'confirmPassword','class' => 'form-control col-md-12', 'placeholder' => __('Confirm New Password'), 'label' => "Confirm New Password", 'div' => false )); ?>
                                </div> 
                            <button type="submit" id="" name="next" class="action-button"> 
                                Change Password 
                            </button>
                            <?= $this->Form->end() ?>

                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!--  -->