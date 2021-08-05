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
table.responsive-table.bordered .btn {
    border-radius: 50%;
    width: 40px;
    height: 40px;
    padding: 0;
    line-height: 40px;
}

table.responsive-table.bordered td {
    font-size: 15px;
}
</style>
<div class="card card-tabs">
    <div class="card-content">
        <div class="row pb-1">
            <h5>Order In-Progress</h5>
        </div>
        <table class="responsive-table bordered">
            <thead>
                <tr class="row-bg">
                    <th scope="col">SNo.</th>
                    <th scope="col"><?= $this->Paginator->sort('Order ID') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Client Name') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Service Name') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Plan') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Order Status') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Total Amount') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Paid Amount') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Pending Amount') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Coupon Code') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Order Date') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; foreach($order as $orders): ?>
                <tr class="<?php echo $orders->id; ?>">
                    <td><?php echo $i; ?></td>
                    <td><b>#<?php echo $orders->id; ?></b></td>
                    <td><b><?php echo $orders->user->first_name." ".$orders->user->last_name; ?></b></td>
                    <td><a target="_blank" href="https://easifyy.com/service-details/<?php echo $orders->product['slug']; ?>"><?php echo $orders->product['title']; ?></a></td>
                    <td><span class="badge badge-primary"><?php echo strtoupper($orders->order_mode['name']); ?></span></td>
                    <td>
                        <?php if($orders->order_status['name']=='In Progress'): ?>
                            <span class="badge badge-warning"><?php echo strtoupper($orders->order_status['name']); ?></span>
                        <?php else: ?>
                            <span class="badge badge-secondary"><?php echo strtoupper($orders->order_status['name']); ?></span>
                        <?php endif; ?>    
                        
                    </td>
                    <td>₹ <?php echo $orders->gross_total; ?></td>
                    
                    <td>₹ 
                        <?php 
                            if($orders->is_booking==0) {
                                echo $paidamount =  $orders->gross_total;
                            } else {
                                echo $paidamount =  $orders->booking_amount;
                            }
                        ?>
                    </td>
                    <td>₹ 
                            <?php
                                if($orders->is_booking==0) {
                                    echo 0;
                                } else {
                                    echo $orders->gross_total- $orders->total;
                                }
                            ?>
                    </td>
                    
                    <?php //echo $orders->gross_total- $orders->total; ?>
                    <!-- <td>₹ 0</td> -->
                    <?php if($orders->coupon['coupon_code'] == ''): ?>
                            <td>Not Used</td>
                        <?php else: ?>
                            <td><?= $orders->coupon['coupon_code'] ?></td>
                        <?php endif; ?> 
                    <td>
                        <?php 
                            echo date_format($orders->created,"d M Y h:i a");
                        ?>
                    </td>
                    <td>
                        <a title="view" class="btn" href="<?= $this->Url->build(['action' => 'view', base64_encode($orders->id)] ) ?>" class="">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                       
                        <!--<a href="https://easifyy.com/admin/orders/summery?user=<?= base64_encode($orders->user_id); ?>&order=<?= base64_encode($orders->id); ?>&type=delete"
                            class="btn"><i class="fa fa-trash" aria-hidden="true"></i></a>-->
                        
                    </td>
                </tr>
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
            <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?>
            </p>
        </div>
    </div>
</div>