<style>
    .sign-gmail-or {
	cursor: pointer !important;
}
.g-signin2 {
	width: 100%;
	float: none !important;
	margin-top: 2%;
}
.loadergif {
    left : 40%;
    top : 50%;
    position : absolute;
    z-index : 101;
    width : 32px;
    height : 32px;
    margin-left : -16px;
    margin-top : -16px;
}

</style>
<script src="https://apis.google.com/js/platform.js" async defer></script>
<meta name="google-signin-client_id" content="839894906232-87o6qqjg8a5oo7mkvp1vnic24leofrs0.apps.googleusercontent.com">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/validate-js/2.0.1/validate.min.js" integrity="sha512-8GLIg5ayTvD6F9ML/cSRMD19nHqaLPWxISikfc5hsMJyX7Pm+IIbHlhBDY2slGisYLBqiVNVll+71CYDD5RBqA==" crossorigin="anonymous"></script>

<div class="loadergif" style="display:none;">
    <img src=" https://easifyy.com/images/loader-orange.gif">
</div>
<div class="container main-w3pvt main-cont">
    <div class="ty-mainbox-container clearfix">
        <ul class="nav nav-pills mb-3 nav-fill mx-5" id="pills-tab" role="tablist">
            <li class="nav-item col-md-6 col-xs-12 px-0">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                    aria-controls="pills-home" aria-selected="true">Register As User</a>
            </li>
            <li class="nav-item col-md-6 col-xs-12 px-0">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                    aria-controls="pills-profile" aria-selected="false">Register As Professional Service Provider</a>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="card bg-light px-4">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <!--<article class="card-body">-->
                    <h4 class="card-title mt-3 text-center">Register As User</h4>
                    <p class="text-center">Get started with your free account</p><br>
                    <div class="sign-gmail-in">
                        <!-- <a href="/users/loginWithGoogle" class="btn btn-primary">
                            <span class="signup-img-icon">
                                <img src="/img/googlei.png" height="18px" alt="google">
                            </span>
                            <span>Login with Google</span>
                        </a> -->
                        <div class="g-signin2"  onclick="ClickLogin()"  data-onsuccess="onSignIn"></div>

                    </div>
                    <div class="sign-gmail-or">
                        <p>OR</p>
                    </div>
                    <?= $this->Form->create(NULL, array('url'=>'/users/add','id'=>'UsersSignUp','name'=>'UsersSignUp','id'=>'my_captcha_form_user')) ?>
                    <div class="row icon-f">
                        <div class="form-group input-group col-md-6 col-xs-12">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                            </div>
                            <input name="first_name" class="form-control" placeholder="First Name" type="text" required>
                        </div>
                        <div class="form-group input-group col-md-6 col-xs-12">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                            </div>
                            <input name="last_name" class="form-control" placeholder="Last Name" type="text">
                        </div>
                        <div class="form-group input-group col-md-6 col-xs-12">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                            </div>
                            <input id="userPhone" name="phone" class="form-control onlyNo" placeholder="Mobile Number" type="text" required>
                        </div>
                        <div class="form-group input-group col-md-6 col-xs-12">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                            </div>
                            <input name="username" class="form-control" placeholder="Email address" type="email"
                                required>
                        </div>
                        <div class="form-group input-group col-md-6 col-xs-12">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                            </div>
                            <input id="userPassword" class="form-control" name="password" placeholder="Create password"
                                type="password" required>
                        </div>
                        <div class="form-group input-group col-md-6 col-xs-12">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                            </div>
                            <input id="confirmUserPassword" class="form-control" name="con_password" placeholder="Confirm password"
                                type="password" required>
                        </div>
                        <div class="form-group input-group col-md-6 col-xs-12">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-globe"></i> </span>
                            </div>
                            <input name="referral_code" class="form-control" placeholder="Referral Code (optional)"
                                type="text">
                            <button type="button" class="btn btn-outline-info">Apply</button>
                        </div>
                        <?php if($usecaptcha==1) { ?>
                              <div class="form-group col-12">
                                    <div class="g-recaptcha" id="g-recaptcha-response" data-sitekey="6Lcih9QaAAAAAP1WyO5yInLxZhIA4S8p72nA3KWl"></div>
                           </div>
                        <?php } ?>
                        <div class="form-group col-12">
                            <button id="userSubmit" type="submit" class="btn btn-primary btn-lg mx-auto d-block"> Create Account
                            </button>
                            <p class="text-center mt-2">By Signing up you agree to our
                                <span><a style="color:#9854e9;" href="#"> Terms of Service</a></span>
                                 & <span> <a style="color:#9854e9;" href="#"> Privacy Policy </a></span>
                            </p>
                        </div>
                    </div>
                    <?= $this->Form->end() ?>
                    <!--</article> -->
                </div>
                <div class="tab-pane fade " id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <!-- <article class="card-body">-->
                    <h4 class="card-title mt-3 text-center">PROFESSIONAL SERVICE PROVIDER</h4>
                    <p class="text-center font-weight-bold mb-2">Join Our Professional Service Provider Community</p>
                    <p class="text-center">Get started with your free account</p><br>
                    <div class="sign-gmail-in">
                        <!--<button href="#" class="btn">
                            <span class="signup-img-icon">
                                <img src="/img/googlei.png" height="18px" alt="google">
                            </span>
                            <span>Login with Google</span>
                        </button>-->
                        <!-- <div class="g-signin2"  onclick="ClickLogin()"  data-onsuccess="onSignIn"></div> -->
                        <div class="g-signin2"  onclick="ClickLoginPSP()"  data-onsuccess="onSignInPSP"></div>

                    </div>
                    <div class="sign-gmail-or">
                        <p>OR</p>
                    </div>
                    <?= $this->Form->create(NULL, array('url'=>'/users/seller','id'=>'my_captcha_form')) ?>
                    <div class="row icon-f">
                        <div class="form-group input-group col-md-6 col-xs-12">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                            </div>
                            <select name="name_prefix" id="name_prefix" class="form-control col-2">
                                <option value="Mr.">Mr.</option>
                                <option value="Ms.">Ms.</option>
                                <!--<option value="M/s">M/s</option>-->
                            </select>
                            <input name="first_name" id="first_name" class="form-control" placeholder="First Name"
                                type="text" required>
                            <input name="store_name" hidden id="store_name" class="form-control" placeholder=""
                                type="text" required>
                        </div>
                        <div class="form-group input-group col-md-6 col-xs-12">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                            </div>
                            <input name="last_name" class="form-control" placeholder="Last Name" type="text" required>
                        </div>
                        <div class="form-group input-group col-md-6 col-xs-12">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                            </div>
                            <input name="phone_Code_1" class="form-control col-2" placeholder="+91" type="text"
                                value="+91">
                            <input name="phone" class="form-control onlyNo" placeholder="Mobile Number" type="text" required>
                        </div>
                        <div class="form-group input-group col-md-6 col-xs-12">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-university"></i> </span>
                            </div>
                            <?php //echo $this->Form->control('category_id', array('type'=>'select', 'id'=>'categories','required' => "required",'div' => false, 'label' => false,'class' => "form-control",'options'=>$categories ) ); ?>
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
                        </div>
                        <div class="form-group input-group col-md-6 col-xs-12">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                            </div>
                            <input name="username" class="form-control" placeholder="Email address" type="email"
                                required>
                        </div>
                        <div class="form-group input-group col-md-6 col-xs-12">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-globe"></i> </span>
                            </div>
                            <input name="referral_code" class="form-control" placeholder="Referral Code (optional)"
                                type="text">
                            <button type="button" class="btn btn-outline-info">Apply</button>
                        </div>
                        <div class="form-group input-group col-md-6 col-xs-12">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                            </div>
                            <input id="pspPass" class="form-control" name="password" placeholder="Create password" type="password"
                                required>
                        </div>
                        <div class="form-group input-group col-md-6 col-xs-12">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                            </div>
                            <input id="pspConfirmPass" class="form-control" name="password_confirm" placeholder="Confirm password"
                                type="password" required>
                        </div>
                        <?php if($usecaptcha==1) { ?>
                            <div class="form-group col-12">
                                <div class="g-recaptcha" id="g-recaptcha-responsepsp" data-sitekey="6Lcih9QaAAAAAP1WyO5yInLxZhIA4S8p72nA3KWl"></div>
                            </div>
                        <?php } ?>
                        <div class="form-group col-12">
                            <button id="pspSubmit" type="submit" class="btn btn-primary btn-lg mx-auto d-block"> Create Account
                            </button>
                            <p class="text-center mt-2">By Signing up you agree to our
                                <span><a style="color:#9854e9;" href="#"> Terms of Service</a></span>
                                 & <span><a style="color:#9854e9;" href="#"> Privacy Policy</a></span>
                                    
                            </p>
                        </div>
                    </div>
                    <?= $this->Form->end() ?>
                    <!--</article> -->
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mb-md-3">
            <div class="col-md-7 signup-footer">
                <div>
                    <p>Easify is a product of kisten Education Pvt. Ltd.</p>
                    <div align="center"><a href="#">Need Help?</a></div>
                </div>
            </div>

            <div class="col-md-2 signup-footer-side">
                <i class="fa fa-globe" aria-hidden="true"></i>
                <p>ISO 27001 datacenter</p>
            </div>
            <div class="col-md-3 signup-footer-side pr-md-0">
                <i class="fa fa-lock" aria-hidden="true"></i>
                <p>SSL certified site <br> 128-bit encryption</p>
            </div>

        </div>
    </div>
    <script>
    const queryString = window.location.search;
    console.log(queryString);
    const urlParams = new URLSearchParams(queryString);
    const type = urlParams.get('type')
    console.log(type);
    if(type=="psp"){
        console.log(type);
        document.getElementById("pills-home-tab").classList.remove("active");
        document.getElementById("pills-profile-tab").classList.add("active");

        document.getElementById("pills-home").classList.remove("active");
        document.getElementById("pills-home").classList.remove("show");
        document.getElementById("pills-profile").classList.add("active");
        document.getElementById("pills-profile").classList.add("show");
    }
    document.getElementById("userPhone").addEventListener("focusout", myFunction);

    function myFunction() {
        var fn = document.getElementById("userPhone").value;
        var n = fn.length;
        if(n!=10){
            alert("Phone Number must be of 10 digits!!");
            document.getElementById("userSubmit").setAttribute("disabled", "true");  
        }else{
            document.getElementById("userSubmit").removeAttribute("disabled");  
        }
    }
   
    document.getElementById("confirmUserPassword").addEventListener("focusout", passCheck);

    function passCheck() {
        console.log("in pass check");
        var userPassword = document.getElementById("userPassword").value;
        var confirmUserPassword = document.getElementById("confirmUserPassword").value;
        if(userPassword!=confirmUserPassword){
            alert("Password and Confirm Password should match!!");
            //document.getElementById("confirmUserPassword").focus(); 
            //is-invalid
            document.getElementById("confirmUserPassword").classList.add("is-invalid");
            document.getElementById("userSubmit").setAttribute("disabled", "true");  
        }else{
            document.getElementById("confirmUserPassword").classList.remove("is-invalid");
            document.getElementById("userSubmit").removeAttribute("disabled");  
        }
    }
    //PSP VALIDATIONS
    document.getElementById("first_name").addEventListener("focusout", nameFunction);

    function nameFunction() {
        var fn = document.getElementById("first_name");
        var sn = document.getElementById("store_name");
        sn.value = fn.value;
    }

    document.getElementById("pspConfirmPass").addEventListener("focusout", pspPassCheck);

    function pspPassCheck() {
        var pspPass = document.getElementById("pspPass").value;
        var pspConfirmPass = document.getElementById("pspConfirmPass").value;
        if(pspPass!=pspConfirmPass){
            alert("Password and Confirm Password should match!!");
            //document.getElementById("pspConfirmPass").focus(); 
            document.getElementById("pspConfirmPass").classList.add("is-invalid");
            document.getElementById("pspSubmit").setAttribute("disabled", "true");  
        }else{
            document.getElementById("pspConfirmPass").classList.remove("is-invalid");
            document.getElementById("pspSubmit").removeAttribute("disabled");  
        }
    }


    var validator = new FormValidator('UsersSignUp', [{
        name: 'first_name',
        display: 'required',
        rules: 'required'
    }, {
        name: 'password',
        rules: 'required'
    }, {
        name: 'con_password',
        display: 'password confirmation',
        rules: 'required|matches[password]'
    }, {
        name: 'email',
        rules: 'valid_email'
    },{
        names: ['first_name', 'last_name'],
        rules: 'required|alpha'
    }], function(errors) {
        if (errors.length > 0) {
            alert("Please check your enter data.");
        }
    });

    var clicked=false;//Global Variable
    function ClickLogin()
    {
        clicked=true;
    }

    function onSignIn(googleUser) {
        
        if (clicked) {
            jQuery(".loadergif").css("display","block");
            jQuery(".container").css("background","#e9e9e9");
            jQuery(".container").css("opacity","0.1");
        
            var csrfToken = <?php echo json_encode($this->request->param('_csrfToken')) ?>;
            var profile = googleUser.getBasicProfile();
            
            if(profile.getId()!=""){
                console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
                console.log('Name: ' + profile.getName());
                console.log('token :' + csrfCustomerToken);
                console.log('Image URL: ' + profile.getImageUrl());
                console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
                jQuery.ajax({
                    type: "POST",
                    headers: {
                        'X-CSRF-Token': csrfToken,
                    },
                    url: 'https://easifyy.com/users/googlelogin',
                    data: {
                        id: profile.getId(),
                        first_name:profile.getName(),
                        username:profile.getEmail(),
                    },
                    success: function (data, textStatus){
                        jQuery(".loadergif").css("display","none");
                        console.log('finalData',data);
                        if(data=="Already"){
                            //location.reload();
                            alert('Email Already Registerd');
                        } else if(data=="new User") {
                            alert("User Registerd Successfully");
                            window.location.replace("https://easifyy.com/users/profile");
                        } else if(data=="success") {
                            alert('Logged In Successfully 1');
                            window.location.replace("https://easifyy.com/users/dashboard");
                        } else {
                            alert('Logged In Successfully');
                            window.location.replace("https://easifyy.com/users/profile");
                        }
                       //location.reload();
                    },
                });
            }else{
                console.log('not Logged IN ');
            }
        }
    }

    var clicked=false;//Global Variable
    function ClickLoginPSP()
    {
        clicked=true;
    }

    function onSignInPSP(googleUser) {
        
        if (clicked) {
            jQuery(".loadergif").css("display","block");
            jQuery(".container").css("background","#e9e9e9");
            jQuery(".container").css("opacity","0.1");
            var csrfToken = <?php echo json_encode($this->request->param('_csrfToken')) ?>;
            var profile = googleUser.getBasicProfile();
            
            if(profile.getId()!=""){
                console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
                console.log('Name: ' + profile.getName());
                console.log('token :' + csrfCustomerToken);
                console.log('Image URL: ' + profile.getImageUrl());
                console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
                jQuery.ajax({
                    type: "POST",
                    headers: {
                        'X-CSRF-Token': csrfToken,
                    },
                    url: 'https://easifyy.com/users/googleloginpsp',
                    data: {
                        id: profile.getId(),
                        first_name:profile.getName(),
                        username:profile.getEmail(),
                    },
                    success: function (data, textStatus){
                        console.log('finalData',data);
                        if(data=="Already"){
                            alert('Email Already Registerd');
                        } else if(data=="new User") {
                            alert("User Registerd Successfully");
                            window.location.replace("https://easifyy.com/admin/merchants/profile-setup");
                        
                        } else if(data=="success") {
                            alert('Logged In Successfully');
                            window.location.replace("https://easifyy.com/admin/users/dashboard");
                        } else {
                            alert('Logged In Successfully');
                            window.location.replace("https://easifyy.com/admin/merchants/profile-setup");
                        }
                       
                    },
                });
            }else{
                console.log('not Logged IN ');
            }
        }
    }

    </script>