<div class="container main-w3pvt main-cont">
    <div class="span8 main-content-grid ">
      <div class="ty-mainbox-container clearfix">
          <h3 class="ty-mainbox-title">Profile details</h3>
        <div class="ty-mainbox-body">
          <form>
            <div class="row">
              <div class="col-md-6">
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
            </div>                 
            <div class="row">
              <div class="col-md-6">
                <div class="form-group input-group">
                  <input type="text" class="form-control" placeholder="First name" value="<?php echo $loguser['first_name']?>">
                  <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group input-group">
                  <input type="text" class="form-control" placeholder="Last name" value="<?php echo $loguser['last_name']?>">
                  <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group input-group">
                  <input type="email" class="form-control" placeholder="E-mail" value="<?php echo $loguser['username']?>">
                  <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                  </div>
                </div>
              </div>  
              <div class="col-md-6">
                <div class="form-group input-group">
                  <input type="text" class="form-control" placeholder="Phone Number" value="<?php echo $loguser['phone']?>">
                  <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <input type="submit" class="btn btn-lg btn-save btn-block" value="E-mail Unverified" disabled="">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group ">
                  <button type="submit" class="btn btn-lg btn-save">Save</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
