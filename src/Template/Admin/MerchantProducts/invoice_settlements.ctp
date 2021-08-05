<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MerchantProduct[]|\Cake\Collection\CollectionInterface $merchantProducts
 */
use Cake\Routing\Router;
$path = 'img/product-images/';
$base_url = Router::url('/', true).$path ;
?>
<style>
    tr.row-bg {
	    font-size: 1.00rem !important;
    }
    </style>
<div class="card card-tabs">
    <div class="card-content">
    <div class="row pb-1">
        <h5 class="text-center col-12">Invoice & Settlements Details</h5>
    </div>
    <table class="responsive-table bordered">
            <thead>
                <tr class="row-bg">
                    <th scope="col">S.No.</th>
                    <th scope="col"><?= $this->Paginator->sort('Order ID') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Service Name') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Total Amount') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Professional Fee - PSP') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Txn Charges') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Referral') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('GST') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Fee Payable - PSP') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Fee Retained') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
            <?php $i=1; foreach($order as $orders): ?>
                <?php if($orders->order_pdf): ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $orders->id; ?></td>
                    <td><?= $orders->product['title']; ?></td>
                    <?php
                        $commission=30;
                        $planType=$orders->order_mode_id;
                        switch ($planType) {
                            case 1:
                                $commission=$orders->product['_basic_commission'];
                                $commissionOprator=$orders->product["b_commssion_oprator"];
                                $commissionAdd=$orders->product["b_commssion_add"];
                                break;
                            case 2:
                                $commission=$orders->product['_standard_commission'];
                                $commissionOprator=$orders->product["s_commssion_oprator"];
                                $commissionAdd=$orders->product["s_commssion_add"];
                                break;
                            case 3:
                                $commission=$orders->product['_premium_commission'];
                                $commissionOprator=$orders->product["p_commssion_oprator"];
                                $commissionAdd=$orders->product["p_commssion_add"];
                                break;
                        }
                        $commission;
                        $taxable=$orders->taxable_amount;
                        $commissionAmt=($taxable * $commission)/100;
                        if($commissionOprator!=""){
                            switch ($commissionOprator) {
                                case "+":
                                    $commissionAmt=$commissionAmt + $commissionAdd;
                                    break;
                                case "-":
                                    $commissionAmt=$commissionAmt - $commissionAdd;
                                    break;
                                case "*":
                                    //echo "in * Case ----".$commissionAdd."-------";
                                    if($commissionAdd!=0){
                                        $commissionAmt=$commissionAmt * $commissionAdd;
                                    }
                                    break;
                                case "/":
                                    if($commissionAdd!=0){
                                        $commissionAmt=$commissionAmt / $commissionAdd;
                                    }
                                    break;
                            }
                        }
                    ?>
                    <td>₹&nbsp;<?= $orders->total; ?></td>
                    <td>₹&nbsp;<?= $commissionAmt; ?></td>
                    <td>₹&nbsp;<?= $orders->transaction_charges + $orders->other_charges ?></td>
                    <?php 
                        if($orders->coupon_discount==''):
                            $orders->coupon_discount=0;
                        endif;
                    ?>
                    
                    <td>₹&nbsp;<?= $orders->coupon_discount; ?></td>
                    <?php if($orders->gst_no): ?>
                        <td>₹&nbsp;<?= $orders->total_tax; ?></td>
                    <?php else: ?>
                        <td>₹&nbsp;0</td>
                    <?php endif; ?>
                    <td>₹&nbsp;<?= $orders->fee_to_psp; ?></td>
                    <td>₹&nbsp;<?= $orders->fee_to_kisten; ?></td>
                    <?php
                        if($orders->order_pdf) {
                            ?><td><a href="<?= Router::url('/', true); ?>/pdf/<?= $orders->order_pdf; ?>">Download Invoice</a></td><?php
                        } else {
                            ?><td><a onclick="alert('Order in progress');">Download Invoice</a></td><?php
                        }
                    ?>
                    
                </tr>
                <?php endif;?>
                <?php $i++; endforeach; ?>
            </tbody>
        </table>
        <div class="paginator">
            <ul class="pagination">
                <?= $this->Paginator->first('<< ' . __('First')) ?>
                <?= $this->Paginator->prev('< ' . __('Previous')) ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next(__('Next') . ' >') ?>
                <?= $this->Paginator->last(__('Last') . ' >>') ?>
            </ul>
            <!--<p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>-->
        </div>
    </div>
</div>
