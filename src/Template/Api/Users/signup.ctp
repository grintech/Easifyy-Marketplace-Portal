<div class="container main-w3pvt main-cont">
  <div class="ty-mainbox-container clearfix">
    <ul class="nav nav-pills mb-3 nav-fill mx-5" id="pills-tab" role="tablist">
        <li class="nav-item col-md-6 col-xs-12 px-0">
            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Register As User</a>
        </li>
        <li class="nav-item col-md-6 col-xs-12 px-0">
            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Register As Service Provider</a>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="card bg-light px-4">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <!--<article class="card-body">-->
                    <h4 class="card-title mt-3 text-center">Register As User</h4>
                    <p class="text-center">Get started with your free account</p><br>
                    <?= $this->Form->create(NULL, array('url'=>'/users/seller')) ?>
                    <div class="row">
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
                            <input name="phone_Code_1" class="form-control col-2" placeholder="+91" type="text" value="+91">
                            <input name="phone" class="form-control" placeholder="Mobile Number" type="text" required>
                        </div>
                        <div class="form-group input-group col-md-6 col-xs-12">
                            <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                            </div>
                            <input name="username" class="form-control" placeholder="Email address" type="email" required>
                        </div>                
                        <div class="form-group input-group col-md-6 col-xs-12" >
                            <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                            </div>
                            <input class="form-control"  name="con_password" placeholder="Create password" type="password" required>
                        </div>
                        <div class="form-group input-group col-md-6 col-xs-12" >
                            <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                            </div>
                            <input class="form-control"  name="con_password" placeholder="Confirm password" type="password" required>
                        </div>
                        <div class="form-group input-group col-md-6 col-xs-12">
                            <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-globe"></i> </span>
                            </div>
                            <input name="referral_code" class="form-control" placeholder="Referral Code (optional)" type="text">
                            <button type="button" class="btn btn-outline-info">Apply</button>
                        </div>
                        <div class="form-group col-12">
                            <button type="submit" class="btn btn-primary btn-lg mx-auto d-block"> Create Account  </button>
                            <p class="text-center mt-2">By Signing up you agree to our Terms of Service & Privacy Policy</p>
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
                    <?= $this->Form->create(NULL, array('url'=>'/users/seller')) ?>
                    <div class="row">
                        <div class="form-group input-group col-md-6 col-xs-12">
                            <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                            </div>
                            <input name="first_name" class="form-control" placeholder="First Name" type="text">
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
                            <input name="phone_Code_1" class="form-control col-2" placeholder="+91" type="text" value="+91">
                            <input name="phone" class="form-control" placeholder="Mobile Number" type="text">
                        </div>
                        <div class="form-group input-group col-md-6 col-xs-12">
                            <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-university"></i> </span>
                            </div>
                            <?php //echo $this->Form->control('category_id', array('type'=>'select', 'id'=>'categories','required' => "required",'div' => false, 'label' => false,'class' => "form-control",'options'=>$categories ) ); ?>
                            <select name="Service" id="Service" class="form-control">
                                <option>Select Profession</option>
                                <option value="1">Chartered Accountancy</option>
                                <option value="2">Legal</option>
                                <option value="3">Roc & Secretarial Compliance</option>
                                <option value="4">Finance</option>
                                <option value="5">Accounting & Bookeeping</option>
                                <option value="6">Contents & Digital Marketing</option>
                                <option value="7">Graphics & UI Design</option>
                                <option value="8">Website & App Development</option>
                                <option value="9">E-Commerce Management</option>
                                <option value="10">Audio/Video & Photography</option>
                                <option value="11">Animation</option>
                                <option value="12">Gaming Development</option>
                                <option value="13">Business Management</option>
                                <option value="14">IT Support</option>
                            </select>
                        </div>  
                        <div class="form-group input-group col-md-6 col-xs-12">
                            <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                            </div>
                            <input name="username" class="form-control" placeholder="Email address" type="email" required>
                        </div>
                        <div class="form-group input-group col-md-6 col-xs-12">
                            <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-globe"></i> </span>
                            </div>
                            <input name="referral_code" class="form-control" placeholder="Referral Code (optional)" type="text">
                            <button type="button" class="btn btn-outline-info">Apply</button>
                        </div>                
                        <div class="form-group input-group col-md-6 col-xs-12" >
                            <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                            </div>
                            <input class="form-control"  name="con_password" placeholder="Create password" type="password">
                        </div>
                        <div class="form-group input-group col-md-6 col-xs-12" >
                            <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                            </div>
                            <input class="form-control"  name="con_password" placeholder="Confirm password" type="password">
                        </div>
                        <div class="form-group col-12">
                            <button type="submit" class="btn btn-primary btn-lg mx-auto d-block"> Create Account  </button>
                            <p class="text-center mt-2">By Signing up you agree to our Terms of Service & Privacy Policy</p>
                        </div>
                    </div>
                    <?= $this->Form->end() ?>
                <!--</article> -->
            </div>
        </div> 
    </div>
  </div> 
</div> 

