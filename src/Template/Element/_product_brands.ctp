<?php
$brands =$this->Site->getAllBrands();
?>
  <?php 
  $brand_id = '';
  
  if (!empty($product->product_brands)){
   $brand_id =$product->product_brands[0]->brand_id;
  }
  
   if (!empty($product->merchant_product_brands)){
   $brand_id =$product->merchant_product_brands[0]->brand_id;
  }
  ?>
  
<div class="card">
	<h5 class="card-header m-0"><strong><?php echo __('Brands'); ?></strong></h5>
	<ul class="list-group list-group-flush" style="max-height: 300px; overflow: auto;">
		<li class="list-group-item">
			<input type="text" class="form-control" id="search-brand" placeholder="<?php echo __('Search brand'); ?>">
		</li>
		<?php  foreach( $brands as $key => $brand ) :?>
		<li class="checkbox parent-checkbox list-group-item" data-selected="0">
			<input data-value="<?=$brand ?>" class="input-checkbox sub-cat" name="brand_id" type="radio" value="<?=$key ?>" <?= $key == $brand_id?'checked':''?> > <?=$brand ?></li>

			<?php endforeach; ?>
	</ul>
	
</div>

