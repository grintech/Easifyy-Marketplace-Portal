<?php
use Cake\Routing\Router;
$path = 'img/product-images/';
$base =Router::url('/', true);
$base_url = Router::url('/', true).$path ;
$delete_link = Router::url(['controller' =>'Base','action' =>'deleteProductImage', 'prefix' => false]);
$model ='product_galleries';
if (!empty($product->product_galleries)){
    foreach ($product->product_galleries as $productGalleries){
        if($productGalleries->type =='Featured'){
            $image = $productGalleries->url;
        }else{
            $image='';  
        }
    }
    $model ='product_galleries';
    $delete_link = Router::url(['controller' =>'Base','action' =>'deleteProductImage', 'prefix' => false]);
}
if (!empty($product->merchant_product_galleries)){
    foreach ($product->merchant_product_galleries as $productGalleries){
        if($productGalleries->type =='Featured'){
            $image = $productGalleries->url;
        }else{
            $image='';  
        }
    }
     $model ='merchant_product_galleries';
     $delete_link = Router::url(['controller' =>'Base','action' =>'deleteMerchantProductImage', 'prefix' => false]);
}
?>
<?php  if (!empty($product->{$model}) ){  ?>
<div class="card col-md-12">
    <!-- <h5 class="card-header m-0">Product Gallery</h5> -->
    <h5 class="card-header m-0"><?php echo __('Service Images'); ?></h5>
    <div class="">
        <?php
   
        foreach ($product->{$model} as $productGalleries){
            $image = $base_url . $productGalleries->url;
            $id =$productGalleries->id;
        ?>
            <div class="col s3" id="image<?=$id ?>">
                <div class="card card-border z-depth-2 image-holder">
                    <div class="card-image">
                        <img src="<?=$image ?>">
                    </div>
                    <div class="card-body">
                        
                        <?php if($productGalleries->type =='Featured'){  ?>
                            <span class="new badge red" data-badge-caption=""><?php echo __('Featured'); ?></span>
                        <?php } else { ?>
                            <span class="new badge blue" data-badge-caption=""><?php echo __('Gallery'); ?></span>
                        <?php } ?>&nbsp;
                        <a href="javascript:void(0)" ajax-url="<?=$delete_link ?>" class="delete-product-image text-danger" data-id="<?=$id ?>" role="button"><?php echo __('Delete'); ?></a> 
                        <a href="<?= $image; ?>" download>Download Image</a>    
                    </div>
                </div>    
            </div>
            
                
<?php   }  ?>
        
    </div>
   
</div>
<?php } ?>

