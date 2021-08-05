<?php
use Cake\Routing\Router;
?>
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
                
                <?php if( $products_list != '' ): ?>

                    <div class="row category-list main-cats" data-call-type="product-list">
                        
                        <?php foreach( $products_list as $pl_key => $pl_value ): 

                                if($pl_value['product']['product_galleries'] !=''){
                                    $productimages = '/img/product-images/'.$pl_value['product']['product_galleries'][0]['url'];
                                }else{
                                    $productimages =  '/img/product-images/no-product-image.png';
                                }
                        ?>

                            <div class="col col-md-3 grid category-list-item main-category mb-1 pl-0" class="category-list-item">
                                <a href="<?php echo Router::url( array( 'action' => 'add', base64_encode( $pl_value['product']['id'] ) ) ); ?>">
                                    <figure class="effect-lily card p-2 text-center m-0 p-0">
                                        <div class="rnd-cat-image-container">
                                            <?= $this->Html->image($productimages, [ 'class' => 'w-100' ]); ?>    
                                        </div>
                                         
                                        <figcaption>
                                            <h6>
                                                <?php echo $pl_value['product']['title']; ?>
                                            </h6>
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
