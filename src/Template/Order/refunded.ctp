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
            'Order Completed',
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
            <h5>Refunded Order</h5>
        </div>
        <table class="responsive-table bordered">
            <thead>
                <tr class="row-bg">
                    <th scope="col">SNo.</th>
                    <th scope="col"><?= $this->Paginator->sort('Order id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Service Name') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Plan Name') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Total Amt') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Refund Amt') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Due Amt') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Refund Issue') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('PSP Name') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Work Status') ?></th>
                    
                </tr>
            </thead>
            <tbody>
                <?php $i=1; foreach ($order as $orders) { ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td>#<?= $orders->id; ?></td>
                        <td><?= $orders->product->title; ?></td>
                        <td><span class="badge badge-success"><?= strtoupper($orders->order_mode->name); ?></span></td>
                        <td>₹<?= $orders->gross_total; ?></td>
                        <td>₹<?= $orders->refund; ?></td>
                        <td>₹<?= $orders->gross_total-$orders->refund; ?></td>
                        <td><?= date_format($orders->modified, "d/m/Y h:i:A"); ?></td>
                        <td><?= $orders->merchant->store_name ." ".$orders->merchant->last_name; ?></td>
                        <td><span class="badge badge-info"><?= $orders->order_status->name ?></span></td>
                        
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