<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MerchantProduct $merchantProduct
 */
$_basic_commission=$merchantProduct->parent_product->_basic_commission;
$_standard_commission=$merchantProduct->parent_product->_standard_commission;
$_premium_commission=$merchantProduct->parent_product->_premium_commission;
?>
<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Merchant Product'), ['action' => 'edit', $merchantProduct->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Merchant Product'), ['action' => 'delete', $merchantProduct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $merchantProduct->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Merchant Products'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Merchant Product'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Merchants'), ['controller' => 'Merchants', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Merchant'), ['controller' => 'Merchants', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Product Types'), ['controller' => 'ProductTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Type'), ['controller' => 'ProductTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Parent Merchant Products'), ['controller' => 'MerchantProducts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parent Merchant Product'), ['controller' => 'MerchantProducts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Merchant Product Brands'), ['controller' => 'MerchantProductBrands', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Merchant Product Brand'), ['controller' => 'MerchantProductBrands', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Merchant Product Bundled Items'), ['controller' => 'MerchantProductBundledItems', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Merchant Product Bundled Item'), ['controller' => 'MerchantProductBundledItems', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Merchant Product Categories'), ['controller' => 'MerchantProductCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Merchant Product Category'), ['controller' => 'MerchantProductCategories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Merchant Product Galleries'), ['controller' => 'MerchantProductGalleries', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Merchant Product Gallery'), ['controller' => 'MerchantProductGalleries', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Child Merchant Products'), ['controller' => 'MerchantProducts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Child Merchant Product'), ['controller' => 'MerchantProducts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Purchase Items'), ['controller' => 'PurchaseItems', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Purchase Item'), ['controller' => 'PurchaseItems', 'action' => 'add']) ?> </li>
    </ul>
</nav>-->
<div class="merchantProducts view large-9 medium-8 columns content">
    <h4><?= h($merchantProduct->title) ?></h4>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($merchantProduct->title) ?></td>
            <th scope="row"><?= __('Slug') ?></th>
            <td><?= h($merchantProduct->slug) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Basic Plan Price') ?></th>
            <td>Rs. <?= $this->Number->format($merchantProduct->_basic_plan_price) ?></td>
            <th scope="row"><?= __('Basic Plan Time') ?></th>
            <td><?= $this->Number->format($merchantProduct->_basic_plan_time) ?> Days</td>
        </tr>
        <tr>
            <th scope="row"><?= __('Standard Plan Price') ?></th>
            <td>Rs. <?= $this->Number->format($merchantProduct->_standard_plan_price) ?></td>
            <th scope="row"><?= __('Standard Plan Time') ?></th>
            <td><?= $this->Number->format($merchantProduct->_standard_plan_time) ?> Days</td>
        </tr>
        <tr>
            <th scope="row"><?= __('Premium Plan Price') ?></th>
            <td>Rs. <?= $this->Number->format($merchantProduct->_premium_plan_price) ?></td>
            <th scope="row"><?= __('Premium Plan Time') ?></th>
            <td><?= $this->Number->format($merchantProduct->_premium_plan_time) ?> Days</td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($merchantProduct->created) ?></td>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($merchantProduct->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $merchantProduct->status ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td colspan="3"><?= h($merchantProduct->description)?></td>
        </tr>
    </table>

    <div class="card">
        <h5 class="card-header m-0 show-hide text-center">
            SERVICE PACKAGE PRICING DETAILS 
        </h5>
        <div class="card-body" >
            <div class="card-text row w-100 float-left bg-light">
                <h5 class="col-md-3">
                    Pricing Details
                </h5>
                <h5 class="col-md-3">
                    Basic Price
                    <input id="_basic_commission" value="<?= ($_basic_commission)?:'0' ?>" hidden>
                </h5>
                <h5 class="col-md-3">
                    Standard Price
                    <input id="_standard_commission" value="<?= ($_standard_commission)?:'0' ?>" hidden>
                </h5>
                <h5 class="col-md-3">
                    Premium Price
                    <input id="_premium_commission" value="<?= ($_premium_commission)?:'0' ?>"" hidden>
                </h5>
            </div>
            <div class="card-text row w-100 float-left">
                <div class="col-md-3 py-3 font-weight-bold">
                    Plan Amount 
                </div>
                <div class="col-md-3 px-1">
                    <input readonly name="_basic_plan_price" value="<?= ($merchantProduct->_basic_plan_price)?:'' ?>" placeholder="Basic Plan Amount" class="form-control col-md-12 _basic_plan_price" required="required" type="text">  
                </div>
                <div class="col-md-3 px-1">
                    <input readonly name="_standard_plan_price"  value="<?= ($merchantProduct->_standard_plan_price)?:'' ?>" placeholder="Standard Plan Amount" class="form-control col-md-12 _standard_plan_price" required="required" type="text">  
                </div>
                <div class="col-md-3 px-1">
                    <input readonly name="_premium_plan_price" value="<?= ($merchantProduct->_premium_plan_price)?:'' ?>" placeholder="Premium Plan Amount" class="form-control col-md-12 _premium_plan_price" required="required" type="text">  
                </div>
            </div>
            <div class="card-text row w-100 float-left">
                <div class="col-md-3 py-3 font-weight-bold">
                    Booking Amount 
                </div>
                <div class="col-md-3 px-1">
                    <input name="_basic_booking_price" value="<?= ($merchantProduct->_basic_booking_price)?:'' ?>" placeholder="Enter Basic Booking Amount" class="form-control col-md-12" required="required" type="text">  
                </div>
                <div class="col-md-3 px-1">
                    <input name="_standard_booking_price"  value="<?= ($merchantProduct->_standard_booking_price)?:'' ?>" placeholder="Enter Standard Booking Amount" class="form-control col-md-12" required="required" type="text">  
                </div>
                <div class="col-md-3 px-1">
                    <input name="_premium_booking_price" value="<?= ($merchantProduct->_premium_booking_price)?:'' ?>" placeholder="Enter Premium Booking Amount" class="form-control col-md-12" required="required" type="text">  
                </div>
            </div>
            <div class="card-text row w-100 float-left bg-light">
                <h5 class="col-md-12 text-center " >
                    Taxable Amount
                </h5>
            </div>
            <div class="card-text row w-100 float-left texable-data">
                <?php if (!is_null($merchantProduct->product_seller_plans)){ 
                        foreach ($merchantProduct->product_seller_plans as $plans):
                            if ($plans->taxable==1){?>
                                <div class="col-md-3">
                                    <input name="heading[]" value="<?= ($plans->heading)?:'' ?>" placeholder="Enter heading" class="form-control col-md-12" required="required" type="text">  
                                </div>
                                <div class="col-md-3 px-1">
                                    <input name="basic_price[]" value="<?= ($plans->basic_price)?:'' ?>" placeholder="Enter Amount" class="form-control col-md-12 basic-tax-price"  type="text">  
                                </div>
                                <div class="col-md-3 px-1">
                                    <input name="std_price[]"  value="<?= ($plans->std_price)?:'' ?>" placeholder="Enter  Amount" class="form-control col-md-12 std-tax-price"  type="text">  
                                </div>
                                <div class="col-md-3 px-1">
                                    <input name="pre_price[]" value="<?= ($plans->pre_price)?:'' ?>" placeholder="Enter Amount" class="form-control col-md-12 pre-tax-price"  type="text">  
                                </div>
                                <input name="taxable[]" value="1" hidden type="text">  
                <?php       } 
                        endforeach;
                    }else?>
            </div>
            <div class="card-text row w-100 float-left bg-light">
                <div class="col-md-3 py-3 font-weight-bold">
                    Total Taxable Amount 
                </div>
                <div class="col-md-3 px-1">
                    <input readonly name="total_basic" value="" placeholder="0" class="form-control col-md-12 total-taxable-basic"  type="text">  
                </div>
                <div class="col-md-3 px-1">
                    <input readonly name="total_std"  value="" placeholder="0" class="form-control col-md-12 total-taxable-std"  type="text">  
                </div>
                <div class="col-md-3 px-1">
                    <input readonly name="total_pre" value="" placeholder="0" class="form-control col-md-12 total-taxable-pre"  type="text">  
                </div>
            </div>
            <div class="card-text row w-100 float-left bg-light mt-1">
                <h5 class="col-md-12 text-center">
                    Non Taxable Amount
                </h5>
            </div>
            <div class="card-text row w-100 float-left non-texable-data">
            <?php if (!is_null($merchantProduct->product_seller_plans)){ 
                        foreach ($merchantProduct->product_seller_plans as $plans):
                            if ($plans->taxable==0){?>
                                <div class="col-md-3">
                                    <input name="heading[]" value="<?= ($plans->heading)?:'' ?>" placeholder="Enter heading" class="form-control col-md-12 " required="required" type="text">  
                                </div>
                                <div class="col-md-3 px-1">
                                    <input name="basic_price[]" value="<?= ($plans->basic_price)?:'' ?>" placeholder="Enter Amount" class="form-control col-md-12 basic-nontax-price"  type="text">  
                                </div>
                                <div class="col-md-3 px-1">
                                    <input name="std_price[]"  value="<?= ($plans->std_price)?:'' ?>" placeholder="Enter  Amount" class="form-control col-md-12 std-nontax-price"  type="text">  
                                </div>
                                <div class="col-md-3 px-1">
                                    <input name="pre_price[]" value="<?= ($plans->pre_price)?:'' ?>" placeholder="Enter Amount" class="form-control col-md-12 pre-nontax-price"  type="text">  
                                </div>
                                <input name="taxable[]" value="0" hidden type="text">  
                <?php       } 
                        endforeach;
                    } ?>

            </div>

            <div class="card-text row w-100 float-left bg-light">
                <div class="col-md-3 py-3 bold font-weight-bold">
                    Total Non Taxable Amount 
                </div>
                <div class="col-md-3 px-1">
                    <input readonly name="total_basic" value="" placeholder="0" class="form-control col-md-12 total-nontaxable-basic"  type="text">  
                </div>
                <div class="col-md-3 px-1">
                    <input readonly name="total_std"  value="" placeholder="0" class="form-control col-md-12 total-nontaxable-std"  type="text">  
                </div>
                <div class="col-md-3 px-1">
                    <input readonly name="total_pre" value="" placeholder="0" class="form-control col-md-12 total-nontaxable-pre"  type="text">  
                </div>
            </div>
            <div class="card-text row w-100 float-left bg-light mt-1">
                <div class="col-md-3 py-3 font-weight-bold">
                    Total Plan Amount 
                </div>
                <div class="col-md-3 px-1">
                    <input readonly name="total_basic_amt" value="" placeholder="0" class="form-control col-md-12 total_basic_amt"  type="text">  
                </div>
                <div class="col-md-3 px-1">
                    <input readonly name="total_std_amt"  value="" placeholder="0" class="form-control col-md-12 total_std_amt"  type="text">  
                </div>
                <div class="col-md-3 px-1">
                    <input readonly name="total_pre_amt" value="" placeholder="0" class="form-control col-md-12 total_pre_amt"  type="text">  
                </div>
            </div>
            <div class="card-text row w-100 float-left bg-light mt-1 py-2">
                <div class="col-md-12 text-center font-weight-bold" >
                    GST @ 18 % (If yes, Provide Compulsory GST Invoice to Customer)
                </div>
            </div>
            <div class="card-text row w-100 float-left mt-1">
                <div class="col-md-3 py-3 font-weight-bold">
                    GST @ 18 %
                </div>
                <div class="col-md-3 px-1">
                    <input readonly name="gst_basic" value="" placeholder="0" class="form-control col-md-12 gst_basic"  type="text">  
                </div>
                <div class="col-md-3 px-1">
                    <input readonly name="gst_std"  value="" placeholder="0" class="form-control col-md-12 gst_std"  type="text">  
                </div>
                <div class="col-md-3 px-1">
                    <input readonly name="gst_pre" value="" placeholder="0" class="form-control col-md-12 gst_pre"  type="text">  
                </div>
            </div>
            <div class="card-text row w-100 float-left bg-light mt-1">
                <div class="col-md-3 py-3 font-weight-bold">
                    Grand Total
                </div>
                <div class="col-md-3 px-1">
                    <input readonly name="basic_gst_total" value="" placeholder="0" class="form-control col-md-12 basic_gst_total"  type="text">  
                </div>
                <div class="col-md-3 px-1">
                    <input readonly name="std_gst_total"  value="" placeholder="0" class="form-control col-md-12 std_gst_total"  type="text">  
                </div>
                <div class="col-md-3 px-1">
                    <input readonly name="pre_gst_total" value="" placeholder="0" class="form-control col-md-12 pre_gst_total"  type="text">  
                </div>
            </div>
            <div class="card-text row w-100 float-left bg-light mt-1 py-2">
                <div class="col-md-12 text-center font-weight-bold" >
                    Service & Consultation Fee of easifyy
                </div>
            </div>
            <div class="card-text row w-100 float-left mt-1">
                <div class="col-md-3 py-3 font-weight-bold">
                    Fee Payable to easifyy
                </div>
                <div class="col-md-3 px-1">
                    <input readonly name="total_basic_fee" value="" placeholder="0" class="form-control col-md-12 total_basic_fee"  type="text">  
                </div>
                <div class="col-md-3 px-1">
                    <input readonly name="total_std_fee"  value="" placeholder="0" class="form-control col-md-12 total_std_fee"  type="text">  
                </div>
                <div class="col-md-3 px-1">
                    <input readonly name="total_pre_fee" value="" placeholder="0" class="form-control col-md-12 total_pre_fee"  type="text">  
                </div>
            </div>
            <div class="card-text row w-100 float-left mt-1">
                <div class="col-md-3 py-3 font-weight-bold">
                    TCS @ 1% of Total Amount
                </div>
                <div class="col-md-3 px-1">
                    <input name="total_basic_tcs" value="" placeholder="0" class="form-control col-md-12 total_basic_tcs"  type="text">  
                </div>
                <div class="col-md-3 px-1">
                    <input name="total_std_tcs"  value="" placeholder="0" class="form-control col-md-12 total_std_tcs"  type="text">  
                </div>
                <div class="col-md-3 px-1">
                    <input name="total_pre_tcs" value="" placeholder="0" class="form-control col-md-12 total_pre_tcs"  type="text">  
                </div>
            </div>
            <div class="card-text row w-100 float-left bg-light mt-1">
                <div class="col-md-3 py-3 font-weight-bold">
                    Net Receivable to PSP (subject to TDS, if any)
                </div>
                <div class="col-md-3 px-1">
                    <input readonly name="total_basic_payable" value="" placeholder="0" class="form-control col-md-12 total_basic_payable"  type="text">  
                </div>
                <div class="col-md-3 px-1">
                    <input readonly name="total_std_payable"  value="" placeholder="0" class="form-control col-md-12 total_std_payable"  type="text">  
                </div>
                <div class="col-md-3 px-1">
                    <input readonly name="total_pre_payable" value="" placeholder="0" class="form-control col-md-12 total_pre_payable"  type="text">  
                </div>
            </div>
        </div>
    </div>
</div>
