<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!-- fontawesome link  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
* {
    padding: 0%;
    margin: 0%;
    box-sizing: border-box;
}

html {
    overflow-x: hidden;
}

body {
    background-color: rgb(249, 247, 254);
}

.page-container {
    width: 97%;
    margin: 18px auto;
    border-radius: 10px;
    background-color: #ffff;
    padding: 2% 3%;

}

ul {
    list-style: none;
}

.slect-area {
    flex-wrap: wrap;
}

.slect-area li {
    padding: 4px 8px;
}

.slect-area li button {
    padding: 4px 7px;
    border: none;
    background-color: #ffff;
    cursor: pointer;
    outline: none;
    color: #000;
}

.slect-area li button:focus {
    background-color: #8e43e7;
    border-radius: 46px;
    color: #fff;
}

ul.ex-area-select li {
    border-bottom: solid 1px #e8eef3;
    padding-bottom: 5px;
    margin-bottom: 10px;
}

ul.ex-area-select li a {
    cursor: pointer;
    color: #000;
    text-decoration: none;
    font-size: 13px;
}

.sel-table tr td {
    padding: 8px;
}

.sel-table a {
    color: #000;
}

.sel-table a:hover {
    color: #8e43e7;
}
.sel-table a{
    color:#5f6368;
}
input[type="checkbox"] {
    display: none;
}

.select-check {
    display: flex;
    align-items: center;
    padding: 3px 18px;
}

thead.sel-table-heading tr {
    border-width: 2px;
}

thead.sel-table-heading tr th {
    padding: 5px;
}

.nav-link{
    color: black; 
}
.nav-link:hover {
    color: #8e43e7 !important;
}
#v-pills-tab .active {
  background-color: #8e43e7 !important;
  color: white !important;;
}
</style>

<body>
    <div class="page-container">
        <div class="row">
            <div class="col-sm-3">
                <p>
                    <a style="color: #8e43e7; cursor: pointer;" href="https://easifyy.com/admin/users/dashboard">
                        <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
                        Go Back to Dashboard
                    </a>
                </p>
                <h4 class="pb-md-3">Expertise Areas</h4>
                <ul class="ex-area-select">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <?php foreach ( $categories as $key => $brand ){
                                if ($brand->parent_id ==null){
                                    $myNavClass="";
                                    if($brand->id==1){
                                       $myNavClass= "active";
                                    }
                            ?>
                                <!--<li><a href="#"><?=trim($brand->name)?></a></li>-->
                                <a class="nav-link <?=$myNavClass?>" id="v-pills-<?=trim($brand->id)?>-tab" data-toggle="pill" href="#v-pills-<?=trim($brand->id)?>" role="tab" aria-controls="v-pills-<?=trim($brand->id)?>" aria-selected="true">
                                    <?=trim($brand->name)?>
                                </a>
                        <?php   } 
                            }?>
                    </div>
                </ul>
            </div>
            <div class="col-sm-8">
                <!--<h4 class="heading-md">Select Expertise Area</h4>
                <div>
                    <div>
                        <label class="select-check">
                            <input type="checkbox"><span class="pl-md-4">
                                <i class="cr-icon glyphicon-ok glyphicon"></i></span>
                            Select
                            All
                        </label>
                    </div>
                    <ul class="d-flex slect-area">
                        <li><button>Incorporate Your Business</button></li>
                        <li><button>Special Entity(MSME/SSI)</button></li>
                        <li><button>Company Conversion</button></li>
                        <li><button>Others</button></li>
                        <li><button>GST Registration</button></li>
                        <li><button>Accounting</button></li>
                        <li><button>Income Tax Case</button></li>
                    </ul>
                </div>-->
                <div>
                    <h4>Easifyy Services, Price and Scope of Work:</h4>
                        <div class="row">
                            <p style="color: #8e43e7;" class="col-md-7">
                                If you provide the services mentioned below and
                                agree on the prices and scope of work, please tick mark the service. This helps us assign the
                                right service to you.
                            </p>
                            <div class="col-md-5">
                                <button class="btn btn-save-profile" id="btn-activate-multiple-services">Save Services</button>
                            </div>
                        </div>
                        <div class="tab-content" id="v-pills-tabContent">
                            <?php 
                                foreach ( $categories as $key => $brand ){
                                    //echo "<pre>".print_r( $brand);echo "</pre>"; 
                                    if ($brand->parent_id == NULL){
                                        $myClass="";
                                        if($brand->id==1){
                                           $myClass= "show active";
                                        }
                                        ?>
                                        <div class="tab-pane fade <?=$myClass?>" 
                                            id="v-pills-<?=trim($brand->id)?>" 
                                            role="tabpanel" aria-labelledby="v-pills-<?=trim($brand->id)?>" >
                                            <table class="sel-table">
                                                <thead class="sel-table-heading">
                                                    <tr>
                                                        <th>Service Id</th>
                                                        <th>Service Name</th>
                                                        <th>Price</th>
                                                        <th>Timeline</th>
                                                        <th>See Scope of Work</th>
                                                        <th>I Agree</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach( $brand->child_categories as $key1 => $subCate ){
                                                            foreach( $subCate->product_categories as $key1 => $products ){ 
                                                                if($products->product->delete_status==1 and $products->product->status==1 and $products->product->author==1){ 
                                                                    if (!in_array($products->product->id, $selectedServices)){
                                                                    ?>
                                                                        <tr>
                                                                            <td>#<?php echo $products->product->id?></td>
                                                                            <td><a href="https://easifyy.com/service-details/<?php echo urlencode($products->product->slug)?>"  target="_blank"><?php echo trim($products->product->title)?></a></td>
                                                                            <td><span style="color: #8e43e7;">Rs. <?php echo sprintf("%.2f", $products->product->_basic_plan_price);?></span></td>
                                                                            <td><?php echo $products->product->_basic_plan_time?> Days</td>
                                                                            <td>
                                                                                <!-- Button trigger modal -->
                                                                                <a  class=""  style="cursor: pointer;" data-toggle="modal" data-target="#exampleModalLong<?php echo urlencode($products->product->slug)?>">
                                                                                    See Scope of Work
                                                                                </a>

                                                                                <!-- Modal -->
                                                                                <div class="modal fade mt-8" id="exampleModalLong<?php echo urlencode($products->product->slug)?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                                                    <div class="modal-dialog" role="document">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header">
                                                                                                <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $products->product->title?></h5>
                                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                <span aria-hidden="true">&times;</span>
                                                                                                </button>
                                                                                            </div>
                                                                                            <div class="modal-body">
                                                                                                <div class="row services">
                                                                                                    <div class="col-md-12">
                                                                                                        <ul class="list-checkmarks">
                                                                                                        <?php $incPoints = explode("\n", trim($products->product->service_coverd));
                                                                                                        foreach ($incPoints as $incPoint) : ?>
                                                                                                            <li><i class="fa fa-angle-right about-list-arrows"></i><?= $incPoint ?></li>
                                                                                                        <?php endforeach; ?>
                                                                                                        </ul>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="modal-footer">
                                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <!--Model End here-->
                                                                            </td>
                                                                            <td>
                                                                                <div>
                                                                                    <label class="m-auto">
                                                                                    <input type="checkbox"  myProduct-id="<?=$products->product->id?>" class="activate-service"><span>
                                                                                    <i class="cr-icon glyphicon-ok glyphicon"></i></span></label>
                                                                                </div>
                                                                            </td>
                                                                        </tr> 
                                                                    
                                                        <?php 
                                                                    }else{?>
                                                                        <tr>
                                                                        <td>#<?php echo $products->product->id?></td>
                                                                        <td><a href="https://easifyy.com/service-details/<?php echo urlencode($products->product->slug)?>"  target="_blank"><?php echo trim($products->product->title)?></a></td>
                                                                        <td><span style="color: #8e43e7;">Rs. <?php echo sprintf("%.2f", $products->product->_basic_plan_price);?></span></td>
                                                                        <td><?php echo $products->product->_basic_plan_time?> Days</td>
                                                                        <td>
                                                                                <!-- Button trigger modal -->
                                                                                <a  class=""  style="cursor: pointer;" data-toggle="modal" data-target="#exampleModalLong<?php echo urlencode($products->product->slug)?>">
                                                                                    See Scope of Work
                                                                                </a>

                                                                                <!-- Modal -->
                                                                                <div class="modal fade mt-8" id="exampleModalLong<?php echo urlencode($products->product->slug)?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                                                    <div class="modal-dialog" role="document">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header">
                                                                                                <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $products->product->title?></h5>
                                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                <span aria-hidden="true">&times;</span>
                                                                                                </button>
                                                                                            </div>
                                                                                            <div class="modal-body">
                                                                                                <div class="row services">
                                                                                                    <div class="col-md-12">
                                                                                                        <ul class="list-checkmarks">
                                                                                                        <?php $incPoints = explode("\n", trim($products->product->service_coverd));
                                                                                                        foreach ($incPoints as $incPoint) : ?>
                                                                                                            <li><i class="fa fa-angle-right about-list-arrows"></i><?= $incPoint ?></li>
                                                                                                        <?php endforeach; ?>
                                                                                                        </ul>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="modal-footer">
                                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <!--Model End here-->
                                                                            </td>
                                                                            <td>
                                                                            <div>
                                                                                <label class="m-auto">
                                                                                    <input type="checkbox" checked myProduct-id="<?=$products->product->id?>" class="activate-service" disabled readonly>
                                                                                    <span>
                                                                                        <i class="cr-icon glyphicon-ok glyphicon"></i>
                                                                                    </span>
                                                                                </label>
                                                                            </div>
                                                                        </td>
                                                                    </tr> 
                                                        <?php       }
                                                                }
                                                            }
                                                        } ?>
                                                </tbody>
                                            </table>
                                        </div>
                            <?php      
                                    } 
                                }
                            ?>
                        </div>
                </div>
                <p>&nbsp;</p>
                <div class="text-center">
                    <!--<button class="btn btn-save-profile" id="btn-activate-multiple-services">Save Services</button>-->
                    <div class="col-sm-12 mt-md-3">
                        <p>By clicking here you agree to our<br><a style="color: #8e43e7;" href="https://easifyy.com/pages/termsOfService"
                                target="_blank">Terms of
                                Service</a> &amp; <a style="color: #8e43e7;" href="https://easifyy.com/pages/privacyPolicy" target="_blank"
                                style="margin-left: 5px;">Privacy policy</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
-->