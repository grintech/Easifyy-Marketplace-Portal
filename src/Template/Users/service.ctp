<div class="container main-w3pvt main-cont">
  <div class="ty-mainbox-container clearfix">
    <form method="post" accept-charset="utf-8" id="product_form" action="#">
        <div class="row">
          <div class="col-md-9">
            <div class="card">
              <h5 class="card-header m-0 bg-lightpurple">Add Service Information</h5>
              <div class="card-body">
                <div class="form-group">
                    <label class="active">Service Title</label>
                    <input name="title" required="required" placeholder="Enter title" class="form-control form-control-lg" maxlength="100" type="text" id="ProductTitle" value="">        
                </div>
                <div class="form-group">
                    <label class="active">Service Description</label>
                    <textarea name="description" required="required" placeholder="" class="form-control" rows="5" id="ProductDescription"></textarea>    
                </div>
              </div>
            </div>
            <div class="card">
              <h5 class="card-header m-0 bg-lightpurple">Is addon ?</h5>
              <div class="card-body">
                <div class="form-group w-100 float-left p-1">
                  <label>Check if is addon.</label>
                  <input type="checkbox" id="vehicle1" name="is_addon" value="1">
                </div>
              </div>
            </div>
            <div class="card">
              <h5 class="card-header m-0 bg-lightpurple">Basic Plan</h5>
              <div class="card-body">
                <div class="form-group w-100 float-left p-1">
                  <label>Basic Price</label>
                  <span>
                    <input name="_basic_price" placeholder="Enter Basic Price" class="form-control " required="required" type="text">  
                  </span>
                </div>
                <div class="form-group w-100 float-left p-1">
                  <label class="active">Basic Plan Info</label>
                  <textarea name="_basic_price_desc" required="required" placeholder="" class="form-control" rows="7" id="ProductDescription"></textarea>    
                </div>
                <div class="form-group w-100 float-left p-1">
                  <label>Basic Plan Time</label>
                  <span>
                      <input name="_basic_plan_time" placeholder="Basic Plan Time" class="form-control " required="required" type="number">  
                  </span>
                </div>
              </div>
            </div>
            <div class="card">
              <h5 class="card-header m-0 bg-lightpurple">Check if add Standard Plan ?</h5>
              <div class="card-body">
                <div class="form-group w-100 float-left p-1">
                  <label>Check if add standard plan .</label>
                  <input type="checkbox" id="check_standardplan" name="is_addon" value="1">
                </div>
              </div>
            </div>
            <div class="card add_standardplan" style="display: none;">
              <h5 class="card-header m-0 bg-lightpurple">Standard Plan</h5>
              <div class="card-body">
                <div class="card-text w-100 float-left p-1">
                  <label>Standard Price</label>
                  <span>
                    <input name="_standard_price" placeholder="Enter Standard Price" class="form-control" type="text">
                  </span>
                </div>
                <div class="card-text w-100 float-left p-1">
                  <label>Standard Plan Info</label>
                  <span>
                    <textarea name="_standard_price_desc" placeholder="" class="form-control" rows="7" id="ProductDescription"></textarea>    
                  </span>
                </div>
                <div class="card-text w-100 float-left p-1">
                  <label>Standard Plan Time</label>
                  <span>
                      <input name="_standard_plan_time" placeholder="Standard Plan Time" class="form-control" type="number">  
                  </span>
                </div>
              </div>
            </div>
            <div class="card">
              <h5 class="card-header m-0 bg-lightpurple">Check if add Premium Plan ?</h5>
              <div class="card-body">
                <div class="form-group w-100 float-left p-1">
                  <label>Check if add Premium plan .</label>
                  <input type="checkbox" id="check_premiumplan" name="is_addon" value="1">
                </div>
              </div>
            </div>
            <div class="card add_premiumplan" style="display: none;">
              <h5 class="card-header m-0 bg-lightpurple">Premium Plan</h5>
              <div class="card-body">
                <div class="card-text w-100 float-left p-1">
                  <label>Premium Price</label>
                  <span>
                    <input name="_premium_price" placeholder="Enter Standard Price" class="form-control" type="text">
                  </span>
                </div>
                <div class="card-text w-100 float-left p-1">
                  <label>Premium Plan Info</label>
                  <span>
                    <textarea name="_premium_price_desc" placeholder="" class="form-control" rows="7" id="ProductDescription"></textarea>    
                  </span>
                </div>
                <div class="card-text w-100 float-left p-1">
                  <label>Premium Plan Time</label>
                  <span>
                    <input name="_premium_plan_time" placeholder="Premium Plan Time" class="form-control" type="number">  
                  </span>
                </div>
              </div>
            </div>
          </div>
          
      </div>
    </form>
  </div>
</div>

<style type="text/css">
  .card{
    margin-bottom: 20px;
  }
</style>