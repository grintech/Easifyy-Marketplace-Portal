<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order[]|\Cake\Collection\CollectionInterface $orders
 */
?>
<style>
.filters .input.select {
    max-width: 100% !important;
}
.filters {
    float:left;
}
</style>
<div class="row">
    <div class="col-12">
        <div class="card card-tabs">
            <div class="card-content">
                 <!-- Orders Filters Start -->
                    <?php
                        $options = array();
                        $options['1'] = __('Processing');
                        $options['2'] = __('Accepted');
                        $options['3'] = __('Completed');
                        $options['4'] = __('On the way');
                        $options['5'] = __('Pending');
                        $options['6'] = __('Cancel');
                        
                        $date_options=array();
                        $date_options['asc']='ASC';
                        $date_options['desc']='DESC';
                        
                        $order_mode_filter=array();
                        $order_mode_filter['asc']=__('Price Low to High');
                        $order_mode_filter['desc']=__('Price High to Low'); 
                        
                    ?>
                    <?= $this->Form->create() ?>
                                <div class="col-md-3 filters"><?= $this->Form->control('order_status_id', ['options' => $options, 'empty' => true, 'label' => __('Select Order Type')]) ?></div>
                                <div class="col-md-3 filters"><?= $this->Form->control('created', ['options' => $date_options, 'empty' => true, 'label' => __('Sort by Date')]) ?></div>
                                  <div class="col-md-3 filters"><?= $this->Form->control('gross_total', ['options' => $order_mode_filter, 'empty' => true, 'label' => __('Price')]) ?></div>
                                <div class="col-xs-3" style="padding-top:25px;"><?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?></div>
                    <?= $this->Form->end() ?>
                    
                <!-- Orders Filters End -->
                <div class="responsive">
                    <table class="responsive-table bordered">
                        <thead>
                            <tr>
                                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                                <th scope="col"><?php echo __('Name'); ?></th>
                                <th scope="col"><?php echo __('Order status'); ?></th>
                                <th scope="col"><?php echo __('Total'); ?></th>
                                <th scope="col"><?php echo __('Order Date'); ?></th>
                                <th scope="col"></th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($orders as $order): ?>
                            <tr>
                                <td>
                                    <a title="Edit" href="<?= $this->Url->build(['action' => 'view', base64_encode($order->id)] ) ?>" class="">
                                        <?= $this->Number->format($order->id) ?>
                                    </a>
                                </td>
                                <td><?= @$order->address->name." @ ". @$order->user->username ?></td>
                                <td><?= $order->has('order_status') ? $this->Html->link($order->order_status->name, ['controller' => 'OrderStatuses', 'action' => 'view', $order->order_status->id]) : '' ?></td>
                                <td><?= $this->Number->format($order->total) ?></td>
                                <td><?= h($order->created) ?></td>
                                <td class="actions">
                                    
                                    <a title="Edit" href="<?= $this->Url->build(['action' => 'view', base64_encode($order->id)] ) ?>" class="">
                                        <i class="material-icons">remove_red_eye</i>
                                    </a>
                                    
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                
                <div class="paginator">
                    <ul class="pagination">
                        <?= $this->Paginator->first('<< ' . __('First')) ?>
                        <?= $this->Paginator->prev('< ' . __('Previous')) ?>
                        <?= $this->Paginator->numbers() ?>
                        <?= $this->Paginator->next(__('Next') . ' >') ?>
                        <?= $this->Paginator->last(__('Last') . ' >>') ?>
                    </ul>
                    <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
                </div>
            </div>
        </div>        
    </div>    
</div>

