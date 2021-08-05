<?php
use Cake\Routing\Router;
$image='';	
if (!empty($product->product_galleries)){
	
	foreach ($product->product_galleries as $productGalleries){
		if($productGalleries->type =='Featured'){
			$image = $productGalleries->url;
		}
	}
}
if (!empty($product->merchant_product_galleries)){
	
	foreach ($product->merchant_product_galleries as $productGalleries){
		if($productGalleries->type =='Featured'){
			$image = $productGalleries->url;
		}
	}
}
// echo '<pre>';
//  print_r($image);
// echo '</pre>';
?>
<div class="card">
	<h5 class="card-header m-0"><?php echo __('Featured Image'); ?></h5>
		
	<div class="card-body">
		<div  class="dropzone dz-clickable" id="my-awesome-dropzone">
			<div class="dz-default dz-message"><span><?php echo __('Drop files here to upload'); ?></span>
			</div>
		</div>
		<input type="hidden" id="product-image" name="url" value="<?=$image ?>">
	</div>
</div>