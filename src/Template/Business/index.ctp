<div class="container main-w3pvt main-cont">
<div class="ty-mainbox-container clearfix"style="background-color:#ddd3ee">
     <div class="row text-center">
          <div class="col-md-12">
            <span class="heading">
                <span class="heading">
           Business Support</span>
            </span>
            <div class="description">
              <p>You select the package and we assign our top-rated website expert. Request for samples, Pay in instalments, track work delivery with 100% assurance.</p>
            </div>
            <ul class="list-inline stepper-horizontal">
              <li><span>100% Assured</span></li>
              <li><span><i class="fa fa-star"></i> 4.9 &nbsp;400+ Reviews</span>
              </li><li><span>Refund Protection </span></li>
              <li class="hidden-xs hidden-sm"><span>Dedicated Support</span></li>
              <li class="hidden-xs hidden-sm"><span>Secure</span></li>
            </ul>
          </div>
      </div>
    </div>
  <div class="ty-mainbox-container clearfix" style=" margin-top:0px;">
    <div class="tab-content" id="pills-tabContent">
        <div class="card bg-light px-4">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <!--<article class="card-body">-->
                    <br>
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
                            <span class="input-group-text"> <i class="fa fa-bars"></i> </span>
                            </div>
                            
							<select id="pet-select" class="form-control">
    <option value="">--Business Support--</option>
    <option value="">Business Funding</option>
    <option value="">Cross Border Structuring & Taxation</option>
    <option value="">Business Structuring</option>
    <option value="">Virtual CFO</option>
    <option value="">Asset Tracing</option>
    <option value="">Preserve Wealth/Money</option>	
    <option value="">Tax Planning</option>
    <option value="">Business Valuation</option>
    <option value="">Business & Investment Plan</option>	
    <option value="">Competitors' Strategy</option>
    <option value="">Financial Planning</option>	
    <option value="">Foreign Client Support</option>
    <option value="">Corporate Governance</option>
    <option value="">Business Analysis</option>
</select>
                        </div>
                         <div class="form-group input-group col-md-12 col-xs-12">
                            <div class="input-group-prepend">
                            </div>
							<textarea rows="4" class="form-control" cols="50" name="comment" form="usrform">
Enter text here...</textarea>
                        </div>  
                        <div class="form-group col-12">
                            <button type="submit" class="btn btn-primary btn-lg mx-auto d-block"> Submit  </button>
                        </div>
                    </div>
                    <?= $this->Form->end() ?>
                <!--</article> -->
            </div>
   
        </div> 
    </div>
  </div> 
  <section class="talk_us text-center py-5" style="background-image: url('../assets/images/purple.jpg');">
    <div class="container">
          <div class="row text-center">
         <a href="#" class="btn button-style mt-sm-4 mt-4 mb-4 mx-auto" style="padding: 12px 50px;">Talk to us</a>
      </div>
    </div>
  </section>
</div> 

