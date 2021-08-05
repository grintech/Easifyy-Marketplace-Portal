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
<style>
.breadcrumbs-trail li {
   float: left;
   padding-left: 10px;
   font-size: 15px;
}
</style>
<div class="card card-tabs">
    <div class="card-content">
        <div class="row pb-1">
      <?php
        // $this->Breadcrumbs->add(
        //     'Home',
        // );
        $this->Breadcrumbs->add([
            ['title' => 'Home', 'url' => ['controller' => 'Pages', 'action' => 'index']],
            ['title' => 'Dashboard', 'url' => ['controller' => 'users', 'action' => 'dashboard']],
        ]);

        $this->Breadcrumbs->add(
            'In-Progress',
        );
        echo $this->Breadcrumbs->render(
            ['class' => 'breadcrumbs-trail'],
            ['separator' => '<i class="fa fa-angle-right"></i>']
        );
      ?>
    </div>
  </div>
</div> 
<div class="card card-tabs">
    <div class="card-content">
        <div class="row pb-1">
            <h5>Order In-Progress</h5>
        </div>
        <table class="responsive-table bordered">
            <thead>
                <tr class="row-bg">
                    <th scope="col">SNo.</th>
                    <th scope="col"><?= $this->Paginator->sort('Order id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Service Name') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Plan Name') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Total Amt') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Paid Amt') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Due Amt') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Created') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('PSP Name') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Work Status') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; foreach ($order as $orders) { 
                    if($orders->is_booking==0) {
                        $totalAmount =$orders->gross_total ;
                    } else {
                        $totalAmount =$orders->total;
                    }
                    
                    if($orders->gst_name!=""){
                        //$totalAmount= $totalAmount + round(($orders->taxable_amount * 18)/100);
                    }
                    ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td>#<?= $orders->id; ?></td>
                        <td><?= $orders->product->title; ?></td>
                        <td><span class="badge badge-success"><?= strtoupper($orders->order_mode->name); ?></span></td>
                        <td>₹<?= $orders->gross_total; ?></td>
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
                        <td><?= date_format($orders->created, "d/m/Y h:i:A"); ?></td>
                        <td><?= $orders->merchant->store_name ." ".$orders->merchant->last_name; ?></td>
                        <td><span class="badge badge-info"><?= $orders->order_status->name ?></span></td>
                        <td>
                            <a href="https://easifyy.com/order/summery/?order_id=<?= base64_encode($orders->id); ?>&p=<?= base64_encode($orders->gross_total-$totalAmount); ?>&s=<?= base64_encode($orders->product->title); ?>" class="btn">
                                <i class="fa fa-tasks" aria-hidden="true"></i>
                            </a>
                            <a href="https://easifyy.com/order/view/<?= base64_encode($orders->id); ?>" class="btn">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr> 
                <?php $i++; } ?>
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