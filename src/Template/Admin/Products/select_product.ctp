<?php
use Cake\Routing\Router;
define('BASE_URL',Router::url('/', true));
// echo '<pre>';
// print_r($product_categories);
// echo '</pre>';
?>

<div class="merchantProducts form large-9 medium-8 columns content">

<input type="hidden" id="category-ajax-url" value="<?php echo Router::url(array("controller"=> "Products", "action" => "admin_get_product") ); ?>">
<div class="row"><br />
	<div class="col-sm-12">
		<div class="search-pro-ajax">
			<input id="myInput" type="text" placeholder="Search..">
		</div>
	</div>
    <div class="col-lg-12 col-md-12 main-categories">
		<?php if( $product_categories != ''){ ?>
		<ul class="category-list main-cats">
            <?php 
            foreach( $product_categories as $pl_key => $pl_value ): ?>
            	<?php  //print_r($pl_value) ?>
				
	            <li class="category-list-item main-category" data-type="category" data-cat-id="<?php echo $pl_value['category']['id']; ?>">
	            	<a href="<?php echo Router::url(array('controller' => 'Products', 'action' => 'selectProductByCategory',$pl_value['category']['id'] )); ?>">
	            	<figure>
	            		<div class="product-img-main">
	            			<?php

	            			$image =  $this->Url->image('images/cat-images/'.$pl_value['category']['image'], ['fullBase'=>true]);
	            			if (file_exists($image)) {
								 $image ='/images/cat-images/.'.$pl_value['category']['image'];
								} else {
								    $image ='/images/cat-images/category.jpg';
								}
	            			?>
	            			 <?= $this->Html->image($image); ?> 

	            		</div>
	            		<figcaption>
			            	<?php echo $pl_value['category']['name']; ?>
			            	(<?php echo $pl_value['count']; ?>) 
	            		</figcaption>
	            	</figure>
	            	</a>
	            </li>
	            
			<?php endforeach; ?>
        </ul>
        <?php }  ?>
   
        
             <!-- List of Sub category of selected category -->
        <ul class="category-list sub-category-block" data-call-type="sub-category"></ul>
    </div>
    <a class="btn btn-warning step-back" href="<?php echo $this->request->referer(); ?>" >Back</a>
    <button class="btn btn-success" onclick="javascript:window.location = '<?php echo Router::url( array( 'action' => 'select_product' ) ); ?>';">Add An Unlisted Product</button>
</div>

</div>

