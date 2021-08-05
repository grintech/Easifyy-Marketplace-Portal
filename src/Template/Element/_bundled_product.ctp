<?php
$products = $this->Site->getAllProducts();
// echo '<pre>';
// print_r($product);
// echo '</pre>';

//merchant_product_bundled_items
$bundled_model ='product_bundled_items';
$product_field ='product_id';
if(!empty($product->merchant_product_bundled_items)){
  $bundled_model ='merchant_product_bundled_items';
  $product_field ='merchant_product_id';
}

if(!empty($product->{$bundled_model}) ){
    $display="display:block;";
}else{
     $display="display:none;";
}
?>
<?php //if(!empty($product->{$bundled_model})) { ?>

<div class="card bundled-info-row" style="<?=$display ?>">
    
    <h5 class="card-header m-0">Products in bundle</h5>
    <div class="card-body">
        <p class="card-text">
            Press CTRL+ENTER for list or use barcode reader.
        </p>
        <div class="card-text">
          <div class="row">
            <div class="col" id="igst">IGST: INR.0.00</div>
            <div class="col" id="cgst">CGST: INR.0.00</div>
            <div class="col" id="sgst">SGST: INR.0.00</div>
            <div class="col" id="price">Total: INR.0.00</div>
          </div>    
        </div>
        
        <table class="responsive-table" id="new-order-book">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Bar Code</th>
                    <th>P. Name</th>
                    <th>MRP</th>
                    <th>SP</th>
                    <th>Quantity</th>
                    <th>IGST</th>
                    <th>CGST</th>
                    <th>SGST</th>
                    <th> Amount</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php 
                for($i =0; $i < 6; $i++){ 
                    if (!empty($product->{$bundled_model})){
                        if(array_key_exists($i, $product->{$bundled_model})){                       
                           $product_id =$product->{$bundled_model}[$i]->{$product_field};
                           if( $bundled_model =='merchant_product_bundled_items'){
                             $product_data =$this->Site->getMerchantProduct( $product_id);
                           }else{
                             $product_data =$this->Site->getAllProducts( $product_id);
                           }
                          
                           //print_r($product_data);
                           $bar_code =$product_data->_bar_code?:'';
                           $product_name =$product_data->title;
                           $sgst =$product_data->_sgst?:0;
                           $igst =$product_data->_igst?:0;
                           $cgst =$product_data->_cgst?:0;
                           $price =$product->{$bundled_model}[$i]->price;;
                           $quantity =$product->{$bundled_model}[$i]->quantity;
                           $total_price =$product->{$bundled_model}[$i]->total_price;

                        }else{
                               $product_data='';
                               $product_id ='';
                               $bar_code = '';
                               $product_name ='';
                               $price ='';
                               $quantity ='';
                               $sgst ='';
                               $igst ='';
                               $cgst ='';
                               $total_price = '';
                        }
                    
                 }else{
                   $product_data='';
                   $product_id ='';
                   $bar_code = '';
                   $product_name ='';
                   $price ='';
                   $quantity ='';
                   $sgst ='';
                   $igst ='';
                   $cgst ='';
                   $total_price = '';
                 }
                    ?>

                <tr class="item-row" data-product-json-key="<?=$product_id ?>" data-product="<?=json_encode($product_data) ?>">
                    <td class="item-id">
                        <input readonly="readonly" class="form-control" type="text" name="bundled[<?=$i?>][product_id]" value="<?=$product_id ?>">
                    </td>
                    <td class="bar-code p-0">
                        <input class="" type="text" name="bundled[<?=$i?>][bar_code]" value="<?=$bar_code ?>">
                    </td>
                    <td class="product-name p-0">
                        <input readonly="readonly" class="form-control" type="text" name="bundled[<?=$i?>][product_name]" value="<?=$product_name ?>">
                    </td>
                    <td class="mrp p-0">
                        <input readonly="readonly" class="form-control" type="text" name="bundled[<?=$i?>][mrp]" value="<?=$price ?>">
                    </td>
                    <td class="rate p-0">
                        <input readonly="readonly" class="form-control" type="text" name="bundled[<?=$i?>][price]" value="<?=$price ?>">
                    </td>
                    <td class="quantity p-0">
                        <input
                         class="form-control" type="text" name="bundled[<?=$i?>][quantity]" value="<?=$quantity ?>">
                    </td>
                     <td class="igst p-0">
                        <input readonly="readonly" class="form-control" type="text" name="bundled[<?=$i?>][igst]" value="<?=$igst ?>">
                    </td>
                    <td class="cgst p-0">
                        <input readonly="readonly" class="form-control" type="text" name="bundled[<?=$i?>][cgst]" value="<?=$cgst ?>">
                    </td>
                    <td class="sgst p-0">
                        <input readonly="readonly" class="form-control" type="text" name="bundled[<?=$i?>][sgst]" value="<?=$sgst ?>">
                    </td>
                   
                    
                    <td class="amount p-0">
                        <input readonly="readonly" class="form-control" type="text" name="bundled[<?=$i?>][total_price]" value="<?=$total_price ?>">
                    </td>
                    
                </tr>
            <?php } ?>
            </tbody>
        </table>

    </div>
</div>


<?php //} ?>

<div class="modal modal-fixed-footer" id="product_search_modal">
    <div class="modal-content">
        <h4 class="modal-title">Search Product</h4> 
        <p><input type="text" id="product-search-input" placeholder="Enter product name here..." class="form-control" name=""> </p>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Sale Price</th>
                </tr>
            </thead>
        
        
            <tbody class="product-list body" id="product-list">
            </tbody>
        </table>

    </div>
    <div class="modal-footer">
        <button type="button" class="modal-action modal-close waves-effect waves-green btn-flat" data-dismiss="modal">Close</button>&nbsp;
        <button type="button" class="modal-action modal-close waves-effect waves-green btn-flat">Accept</button>
    </div>
    
</div>