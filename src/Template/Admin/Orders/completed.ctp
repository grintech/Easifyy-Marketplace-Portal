<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MerchantProduct[]|\Cake\Collection\CollectionInterface $merchantProducts
 */
use Cake\Routing\Router;
$path = 'img/product-images/';
$base_url = Router::url('/', true).$path ;
?>

<div class="card card-tabs">
    <div class="card-content">
    <div class="row pb-1">
        <h5>Order Completed</h5>
    </div>
    <table class="responsive-table bordered">
            <thead>
                <tr class="row-bg">
                    <th scope="col"><?= $this->Paginator->sort('Order ID') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Service Name') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Plan Name') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Status') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Total Amount') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Order Date') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
            <?php $i=1; foreach($order as $orders): ?>
                <tr>
                    <td><b>#<?php echo $orders->id; ?></b></td>
                    <td><a target="_blank" href="https://easifyy.com/service-details/<?php echo $orders->product['slug']; ?>"><?php echo $orders->product['title']; ?></a></td>
                    <td><span class="badge badge-primary"><?php echo strtoupper($orders->order_mode['name']); ?></span></td>
                    <td>
                        <?php if($orders->order_status['name']=='In Progress'): ?>
                            <span class="badge badge-warning"><?php echo strtoupper($orders->order_status['name']); ?></span>
                        <?php else: ?>
                            <span class="badge badge-primary"><?php echo strtoupper($orders->order_status['name']); ?></span>
                        <?php endif; ?>    
                        
                    </td>
                    <td>₹ <?php echo $orders->gross_total; ?></td>
                    <!-- <td>₹ 0</td> -->
                    <td>
                        <?php 
                            echo date_format($orders->created,"d M Y h:i a");
                        ?>
                    </td>
                    <td>
                        <a title="view" class="btn" href="<?= $this->Url->build(['action' => 'view', base64_encode($orders->id)] ) ?>" class="">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                       
                        <a href="https://easifyy.com/admin/orders/summery?user=<?= base64_encode($orders->user_id); ?>&order=<?= base64_encode($orders->id); ?>&type=delete"
                            class="btn"><i class="fa fa-bars" aria-hidden="true"></i></a>
                        
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
            <!--<p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>-->
        </div>
    </div>
</div>
