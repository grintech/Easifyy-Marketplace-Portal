<?php
use Cake\Routing\Router;
// echo '<pre>';
// print_r($product_categories);
// echo '</pre>';
?>
<input type="hidden" id="category-ajax-url" value="<?php echo Router::url(array("controller"=> "MerchantProducts", "action" => "admin_get_product") ); ?>">

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-content">
				 <input id="myInput" type="text" placeholder="<?php echo __('Type to search'); ?>...">
			</div>
		</div>
	</div>

	
	<div class="col-12">
		<div class="card">
			<div class="card-content">
				
				<?php if( $product_categories != ''): ?>

					<div class="row category-list main-cats">
						
						<?php foreach( $product_categories as $pl_key => $pl_value ): ?>

							<div class="col col-md-3 grid category-list-item main-category mb-1 pl-0" data-type="category" data-cat-id="<?php echo $pl_value['category']['id']; ?>">
				            	<a href="<?php echo Router::url(array('controller' => 'MerchantProducts', 'action' => 'selectProductByCategory',$pl_value['category']['id'] )); ?>">
				            	<figure class="effect-lily card  text-center">
				            		<div class="rnd-cat-image-container">
				            			<?php
					            			$image =  Router::url('/webroot/images/cat-images/'.$pl_value['category']['image'], true);
					      					echo $this->Html->image($image); 
				            			?> 	
				            		</div>
				            		
				            		<figcaption>
				            			<h6>
				            				<?php echo $pl_value['category']['name']; ?>	
				            			</h6>
				            			<p>
				            				(<?php echo $pl_value['count']; ?>) 
				            			</p>

						            	
						            	
				            		</figcaption>
				            	</figure>
				            	</a>
				            </div>


						<?php endforeach; ?>
					</div>

				<?php endif; ?>
			</div>
		</div>		
	</div>

	
</div>


<?php /*
<div class="merchantProducts form large-9 medium-8 columns content">


<div class="row"><br />
	<div class="col-sm-12">
		<div class="search-pro-ajax">
			
		</div>
	</div>
    <div class="col-lg-12 col-md-12 main-categories">
		<?php if( $product_categories != ''){ ?>
		<ul class="category-list main-cats">
            <?php 
            foreach( $product_categories as $pl_key => $pl_value ): ?>
            	<?php  //print_r($pl_value) ?>
				
	            <li class="category-list-item main-category" data-type="category" data-cat-id="<?php echo $pl_value['category']['id']; ?>">
	            	<a href="<?php echo Router::url(array('controller' => 'MerchantProducts', 'action' => 'selectProductByCategory',$pl_value['category']['id'] )); ?>">
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
    <button class="btn btn-success" onclick="javascript:window.location = '<?php echo Router::url( array('controller'=> 'MerchantProducts', 'action' => 'add' ) ); ?>';">Add An Unlisted Product</button>
</div>

</div>

*/ ?>