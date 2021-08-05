<div class="container main-w3pvt main-cont">
  <div class="ty-mainbox-container clearfix">
    <div class="card bg-light">
      <article class="card-body mx-auto">
        <h4 class="card-title mt-3 text-center">Create a Seller Account</h4>
        <p class="text-center">Get started with your free account</p><br>
        <?= $this->Form->create(NULL, array('url'=>'/users/seller')) ?>
          <div class="row">
              <div class="col-lg-6 col-md-6">
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">  <i class="fa fa-user"></i> </span>
                  </div>
                  <select name="provider" id="provider" class="form-control">
                    <option>Service provider</option>
                    <option value="Mr">Mr.</option>
                    <option value="Mr">Ms.</option>
                    <option value="Mr">M/S</option>
                  </select>
                </div> 
                
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                    </div>
                    <input name="phone_Code_1" class="form-control col-2" placeholder="+91" type="text"  value="+91">
                    <input name="phone_1" class="form-control" placeholder="Phone number" type="text">
                </div> 
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                  </div>
                  <input name="username" class="form-control" placeholder="Email address" type="email" required>
                </div>
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-home"></i> </span>
                  </div>
                  <input name="address_line_2" class="form-control" placeholder="Address Line2" type="text">
                </div>                
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-globe"></i> </span>
                  </div>
                  <select name="state" id="state" class="form-control">
                    <option>Select Country</option>
                    <option value="Afganistan">Afghanistan</option>
                    <option value="Albania">Albania</option>
                    <option value="Algeria">Algeria</option>
                    <option value="American Samoa">American Samoa</option>
                    <option value="India">India</option>
                  </select>
                </div>
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-building"></i> </span>
                  </div>
                  <?php echo $this->Form->control('city_id', array('type'=>'select', 'id'=>'city-id','required' => "required",'label' => false,'div' => false, 'class' => "form-control",'options'=>$cities) ); ?>
                </div>

                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-credit-card"></i> </span>
                  </div>
                  <input name="pan_number" class="form-control" placeholder="Pan Number" type="text">
                </div> 
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"> <i class="fa fa-university"></i> </span>
                    </div>
                    <input name="institute_name" class="form-control" placeholder="Name of Institute" type="text">
                </div>
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                  </div>
                  <input class="form-control"  name="con_password" placeholder="Create password" type="password">
                </div>
              </div>
              <div class="col-lg-6 col-md-6">
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                  </div>
                  <input name="store_name" class="form-control" placeholder="Full name" type="text">
                </div>
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                  </div>
                  <input name="phone_Code_2" class="form-control col-2" placeholder="+91" type="text" value="+91">
                  <input name="phone_2" class="form-control" placeholder="Alternate Number" type="text">
                </div> 
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-home"></i> </span>
                  </div>
                  <input name="address_line_1" class="form-control" placeholder="Address Line1" type="text">
                </div> 
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-flag"></i> </span>
                  </div>
                  <input name="locality" class="form-control" placeholder="Locality" type="text">
                </div> 
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-map-marker"></i> </span>
                  </div>
                  <!--<?//$this->Form->control('state_id', ['options' => $states,'class' => 'form-control','div' => false, 'label' => false, ]) ?>-->
                  <?php echo $this->Form->control('state_id', array('type'=>'select', 'id'=>'states','required' => "required",'div' => false, 'label' => false,'class' => "form-control",'options'=>$states ) ); ?>
                </div> 
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-globe"></i> </span>
                  </div>
                  <input name="zip_code" class="form-control" placeholder="Zip code" type="text">
                </div> 
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-credit-card"></i> </span>
                  </div>
                  <input name="gst_number" class="form-control" placeholder="GST Number" type="text">
                </div>  
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-credit-card"></i> </span>
                  </div>
                  <input name="license_number" class="form-control" placeholder="Practising Registration/License Number" type="text">
                </div>
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                  </div>
                  <input class="form-control"  name="password" placeholder="Repeat password" type="password">
                </div>
              </div>
              <div class="col-lg-6 col-md-6">
                <div class="form-group">
                  <img id="user_image" style="width:100px;" src="../img/avatar.jpg" alt="...">
                  <div style="position:relative;">
                    <a class='' href='javascript:;'>
                     Upload File
                      <input type="file"  id="profile_img" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="file_source" size="40"  onchange='$("#upload-file-info").html($(this).val());'>
                    </a>
                    &nbsp;
                    <span class='label label-info' id="upload-file-info"></span>
                  </div>
                </div>  
                <div class="form-group">
                  <button type="submit" class="btn btn-primary"> Create Account  </button>
                </div>
              </div> 
            </div>
        <?= $this->Form->end() ?>
      </article>                                 
      </div>                                                                 
    </div>
  </div> 
</div> 

