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
		
        <?php if( $products_list != '') { ?>
   
        <!-- List of products from selected category -->
        <ul class="category-list main-products-block" data-call-type="product-list">
        	<?php 
			foreach( $products_list as $pl_key => $pl_value ){ 

				if($pl_value['product']['product_galleries'] !=''){
					//echo 'here';
					$productimages = '/img/product-images/'.$pl_value['product']['product_galleries'][0]['url'];
				}else{
					$productimages =  '/img/product-images/no-product-image.png';
				}
 			?>
 			 <?php  //echo '<pre>'; print_r($pl_value['product']['product_galleries'][0]['url']); echo '</pre>'; ?>	
			<li class="category-list-item">
				<a href="<?php echo Router::url( array( 'action' => 'add', base64_encode( $pl_value['product']['id'] ) ) ); ?>">
    			<figure>
    				<div class="product-img-main">
        				
        				 <?= $this->Html->image($productimages); ?> 
        			</div>
        			<figcaption>
        				<?php echo $pl_value['product']['title']; ?>
        			</figcaption>
    			</figure>
    			</a>
			</li>
        	<?php }  ?>
        </ul>
        <?php } ?>
             
    </div>
    <a class="btn btn-warning step-back" href="<?php echo $this->request->referer(); ?>" >Back</a>
    <button class="btn btn-success" onclick="javascript:window.location = '<?php echo Router::url( array( 'action' => 'select_product' ) ); ?>';">Add An Unlisted Product</button>
</div>

</div>

