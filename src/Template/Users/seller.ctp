  <div class="container main-w3pvt main-cont">
    <div class="ty-mainbox-container clearfix">
      <div class="card bg-light">
        <article class="card-body mx-auto">
          <h4 class="card-title mt-3 text-center">Create a Seller Account</h4>
          <p class="text-center">Get started with your free account</p><br>
          <form action="#" method="post" class="form-horizontal" id="sign_up_seller">
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                  </div>
                  <input name="name" class="form-control" placeholder="Full name" type="text">
                </div>
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                </div>
                <input name="phone" class="form-control" placeholder="Phone number" type="text">
                </div> 
                 <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-building-o"></i> </span>
                </div>
                <input name="phone" class="form-control" placeholder="Store Name" type="text">
                </div>
              <!--   <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-building"></i> </span>
                  </div>
                  <select class="form-control">
                    <option selected=""> Select Catgeory</option>
                    <option>Designer</option>
                    <option>Manager</option>
                    <option>Accounting</option>
                  </select>
                </div> -->
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-home"></i> </span>
                </div>
                <input name="phone" class="form-control" placeholder="Address Line1" type="text">
                </div> 
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-map-marker"></i> </span>
                  </div>
                  <select name="state" id="state" class="form-control">
                    <option>Select State</option>
                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                    <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                    <option value="Assam">Assam</option>
                    <option value="Bihar">Bihar</option>
                    <option value="Chandigarh">Chandigarh</option>
                    <option value="Chhattisgarh">Chhattisgarh</option>
                    <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                    <option value="Daman and Diu">Daman and Diu</option>
                    <option value="Delhi">Delhi</option>
                    <option value="Lakshadweep">Lakshadweep</option>
                    <option value="Puducherry">Puducherry</option>
                    <option value="Goa">Goa</option>
                    <option value="Gujarat">Gujarat</option>
                    <option value="Haryana">Haryana</option>
                    <option value="Himachal Pradesh">Himachal Pradesh</option>
                    <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                    <option value="Jharkhand">Jharkhand</option>
                    <option value="Karnataka">Karnataka</option>
                    <option value="Kerala">Kerala</option>
                    <option value="Madhya Pradesh">Madhya Pradesh</option>
                    <option value="Maharashtra">Maharashtra</option>
                    <option value="Manipur">Manipur</option>
                    <option value="Meghalaya">Meghalaya</option>
                    <option value="Mizoram">Mizoram</option>
                    <option value="Nagaland">Nagaland</option>
                    <option value="Odisha">Odisha</option>
                    <option value="Punjab">Punjab</option>
                    <option value="Rajasthan">Rajasthan</option>
                    <option value="Sikkim">Sikkim</option>
                    <option value="Tamil Nadu">Tamil Nadu</option>
                    <option value="Telangana">Telangana</option>
                    <option value="Tripura">Tripura</option>
                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                    <option value="Uttarakhand">Uttarakhand</option>
                    <option value="West Bengal">West Bengal</option>
                  </select>
                </div> 
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-flag"></i> </span>
                </div>
                <input name="phone" class="form-control" placeholder="Locality" type="text">
                </div> 
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-credit-card"></i> </span>
                </div>
                <input name="phone" class="form-control" placeholder="Pan Number" type="text">
                </div> 
                
                 <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                </div>
                    <input class="form-control"  name="password" placeholder="Create password" type="password">
                </div>
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
              </div>
              <div class="col-lg-6 col-md-6">
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                  </div>
                  <input name="email" class="form-control" placeholder="Email address" type="email" required>
                </div>
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                </div>
                <input name="phone" class="form-control" placeholder="Alternate Number" type="text">
                </div> 
                  <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-credit-card"></i> </span>
                </div>
                <input name="phone" class="form-control" placeholder="GST Number" type="text">
                </div> 
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-home"></i> </span>
                </div>
                <input name="phone" class="form-control" placeholder="Address Line2" type="text">
                </div> 
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-building"></i> </span>
                </div>
                <input name="phone" class="form-control" placeholder="City" type="text">
                </div> 
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-globe"></i> </span>
                </div>
                <input name="phone" class="form-control" placeholder="Zip code" type="text">
                </div> 
              <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-credit-card"></i> </span>
                </div>
                <input name="phone" class="form-control" placeholder="License Number" type="text">
                </div>
                
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                  </div>
                  <input class="form-control"  name="con_password" placeholder="Repeat password" type="password">
                </div>

              </div>
              <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary"> Create Account  </button>
                </div>
                </div> 
              </div>                                 
            </div>                                                                 
          </form>
        </article>
      </div>
    </div> 
  </div> 
