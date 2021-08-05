<?php
$categories =$this->Site->getAllCategories();

$class=$checked ='';



//Create Product Categories array
$output=array();
if(!empty($product->product_categories)) {
	foreach ($product->product_categories as $productCategories){
		$output[]= $productCategories->category_id;
	}	
}
?>
<div class="card">
	<h5 class="card-header m-0"><strong><?php echo __('Service Category'); ?></strong></h5>
	<ul class="list-group list-group-flush" style="max-height: 300px; overflow: auto;">
		<li class="list-group-item">
			<input type="text" class="form-control" id="search-catego	ry" placeholder="<?php echo __('Search category'); ?>">
		</li>
		<?php foreach($categories as  $category): ?>
			<?php 
			if (!empty($product->product_categories)){
				if (in_array($category->id, $output)) {
  					$checked ='checked';
  				} else {
  					$checked ='';
  				}
			}	
		
			if (!empty($product->merchant_product_categories)){
				if (in_array($category->id, $output)) {
  					$checked ='checked';
  				} else {
  					$checked ='';
  				}

			}
			
			?>
		<?php if($category->parent_id !=null) {?>
		
		<?php } else { ?>	
			<li class="checkbox parent-checkbox list-group-item">
				<input class="input-checkbox main-cat" data-value="<?= $category->name ;?>" name="category_id[]" type="checkbox" value="<?= $category->id ;?>" <?= $checked ?> >&nbsp;&nbsp;&nbsp;<?= $category->name ; ?>
		<?php } ?>	
			



			<?php if (!empty($category->child_categories)): ?>
			<ul>
				<?php foreach($category->child_categories as $category): ?>
					<?php 
					if (!empty($product->product_categories)){
						$checked ='';
						// foreach ($product->product_categories as $productCategories){
						// 	if($category->id == $productCategories->id){
						// 		$checked ='checked';
						// 		$class ='ffff';
						// 	}else{
						// 		$checked ='';
						// 		$class ='ggg';
						// 	}
						// }
						if (in_array($category->id, $output)) {
		  					$checked ='checked';
		  				} else {
		  					$checked ='';
		  				}
					}

					?>
				<li class="checkbox child-checkbox list-group-item">
					<input class="input-checkbox sub-cat" name="category_id[]" data-value="<?= $category->name ;?>" type="checkbox" value="<?= $category->id ;?>" <?= $checked ?> > <?= $category->name ;?></li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>
		</li>
		
		<?php endforeach; ?>

	</ul>
	
</div>