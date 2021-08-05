<?php 
$options = [ 1 =>'Yes', 0 =>'No'];

?>

<div class="card">
    <h5 class="card-header m-0">Is addon ?</h5>
    <div class="card-body">
        <div class="card-text w-100 float-left p-1">
            <label>Check if is addon.</label>
            <input type="checkbox" id="vehicle1" name="is_addon" value="1">
        </div>
    </div>
</div>


<div class="card">
    <h5 class="card-header m-0">Basic Plan</h5>
    <div class="card-body">
        <div class="card-text w-100 float-left p-1">
            <label>Basic Price</label>
            <span>
                <input name="_basic_price" value="<?= ($product->_basic_price)?:'' ?>" placeholder="Enter Basic Price" class="form-control " required="required"type="text">  
            </span>
        </div>
        <div class="card-text w-100 float-left p-1">
            <label>Basic Plan Info</label>
            <textarea name="_basic_price_desc" required="required" placeholder="" class="form-control" rows="7" id="ProductDescription" >
                <?= ($product->_basic_price_desc)?:'' ?>
            </textarea>    
       </div>
        <div class="card-text w-100 float-left p-1">
            <label>Basic Plan Time</label>
            <span>
                <input name="_basic_plan_time" value="<?= ($product->_basic_plan_time)?:'' ?>" placeholder="Basic Plan Time" class="form-control " required="required"type="number">  
            </span>
         </div>
    </div>
</div>

<div class="card">
    <h5 class="card-header m-0">Standard Plan</h5>
    <div class="card-body">
        <div class="card-text w-100 float-left p-1">
            <label>Standard Price</label>
            <span>
                <input name="_standard_price" value="<?= ($product->_standard_price)?:'' ?>" placeholder="Enter Standard Price" class="form-control" type="text">
            </span>
        </div>
        <div class="card-text w-100 float-left p-1">
            <label>Standard Plan Info</label>
            <span>
                <textarea name="_standard_price_desc" placeholder="" class="form-control" rows="7" id="ProductDescription" >
                    <?= ($product->_standard_price_desc)?:'' ?>
                </textarea>    
            </span>
        </div>
        <div class="card-text w-100 float-left p-1">
            <label>Standard Plan Time</label>
            <span>
                <input name="_standard_plan_time" value="<?= ($product->_standard_plan_time)?:'' ?>" placeholder="Standard Plan Time" class="form-control" type="number">  
            </span>
         </div>
    </div>
</div>

<div class="card">
    <h5 class="card-header m-0">Premium Plan</h5>
    <div class="card-body">
        <div class="card-text w-100 float-left p-1">
            <label>Premium Price</label>
            <span>
                <input name="_premium_price" value="<?= ($product->_premium_price)?:'' ?>" placeholder="Enter Standard Price" class="form-control" type="text">
            </span>
        </div>
        <div class="card-text w-100 float-left p-1">
            <label>Premium Plan Info</label>
            <span>
                <textarea name="_premium_price_desc" placeholder="" class="form-control" rows="7" id="ProductDescription" >
                    <?= ($product->_premium_price_desc)?:'' ?>
                </textarea>    
            </span>
        </div>
        <div class="card-text w-100 float-left p-1">
            <label>Premium Plan Time</label>
            <span>
                <input name="_premium_plan_time" value="<?= ($product->_premium_plan_time)?:'' ?>" placeholder="Premium Plan Time" class="form-control" type="number">  
            </span>
         </div>
    </div>
</div>
