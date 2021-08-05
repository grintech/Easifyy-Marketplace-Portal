<div class="container main-w3pvt main-cont">
  <div class="ty-mainbox-container clearfix">
    <div class="card bg-light">
      <article class="card-body">
        <h4 class="card-title mt-3 text-center">PROFFESSIONAL SERVICE PROVIDER</h4>
        <p class="text-center font-weight-bold mb-2">Join Our Proffessional Service Provider Community</p>
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
            <?php echo $this->Form->control('category_id', array('type'=>'select', 'id'=>'categories','required' => "required",'div' => false, 'label' => false,'class' => "form-control",'options'=>$categories ) ); ?>
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
          </div>
        </div>
        <?= $this->Form->end() ?>
      </article>                                 
      </div>                                                                 
    </div>
  </div> 
</div> 

