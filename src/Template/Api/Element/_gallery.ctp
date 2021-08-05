<?php
use Cake\Routing\Router;
$imagess ='';
$images = [];
if (!empty($product->product_galleries)){
	
    foreach ($product->product_galleries as $productGalleries){
        if($productGalleries->type =='Featured'){
            $image = $productGalleries->url;
        }else{
            $images[]=$productGalleries->url;;  
        }
    }
    if(!empty($images)){
    	if(count($images) == 1){
    		$imagess = $images[0];
    	}else{
    		$imagess = implode(',', $images);
    	}
    }
}
if (!empty($product->merchant_product_galleries)){
    
    foreach ($product->merchant_product_galleries as $productGalleries){
        if($productGalleries->type =='Featured'){
            $image = $productGalleries->url;
        }else{
            $images[]=$productGalleries->url;;  
        }
    }
    if(!empty($images)){
        if(count($images) == 1){
            $imagess = $images[0];
        }else{
            $imagess = implode(',', $images);
        }
    }
}
?>
<div class="card">
	<h5 class="card-header m-0"><?php echo __('Gallery'); ?></h5>
	<div class="card-body">
		<div  class="dropzone dz-clickable" id="my-gallery-dropzone">
            <div class="dz-default dz-message"><span><?php echo __('Drop files here to upload'); ?></span>
            </div>
        </div>
        <input type="hidden" id="product-gallery" name="urls" value="<?=$imagess ?>">
	</div>
</div>