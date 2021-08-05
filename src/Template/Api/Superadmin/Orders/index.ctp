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
<div class="card card-tabs">
    <div class="card-content">
        <!-- Orders Filters Start -->
            <?php
                $options = array();
                $options['1'] = 'Processing';
                $options['2'] = 'Accepted';
                $options['3'] = 'Completed';
                $options['4'] = 'On the way';
                $options['5'] = 'Pending';
                $options['6'] = 'Cancel';
                
                $date_options=array();
                $date_options['asc']='ASC';
                $date_options['desc']='DESC';
                
                $order_mode_filter=array();
                $order_mode_filter['asc']='Price Low to High';
                $order_mode_filter['desc']='Price High to Low'; 
                
            ?>
            <?= $this->Form->create() ?>
                        <div class="col-md-4 filters"><?= $this->Form->input('order_status_id', ['options' => $options, 'empty' => true, 'label' => __('Select Order Type')]) ?></div>
                        <div class="col-md-4 filters"><?= $this->Form->input('created', ['options' => $date_options, 'empty' => true, 'label' => __('Sort by Date')]) ?></div>
                          <div class="col-md-4 filters"><?= $this->Form->input('gross_total', ['options' => $order_mode_filter, 'empty' => true, 'label' => __('Price')]) ?></div>
                        <div class="col-xs-12" style="padding-top:25px;"><?= $this->Form->button(__('Submit')) ?></div>
            <?= $this->Form->end() ?>
            
        <!-- Orders Filters End -->

        </div>
        <table cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('merchant_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                    <!--<th scope="col"><?= $this->Paginator->sort('address_id') ?></th>-->
                    <th scope="col"><?= $this->Paginator->sort('coupon_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('runner_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('order_mode_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('order_status_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('gross_total') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                <tr>
                    <td><?= $this->Number->format($order->id) ?></td>
                    <td><?= $order->has('merchant') ? $this->Html->link($order->merchant->id, ['controller' => 'Merchants', 'action' => 'view', $order->merchant->id]) : '' ?></td>
                    <td><?= $order->has('user') ? $this->Html->link($order->user->first_name, ['controller' => 'Users', 'action' => 'view', $order->user->id]) : '' ?></td>
                    <!--<td><?= $order->has('address') ? $this->Html->link($order->address->name, ['controller' => 'Addresses', 'action' => 'view', $order->address->id]) : '' ?></td>-->
                    <td><?= $order->has('coupon') ? $this->Html->link($order->coupon->id, ['controller' => 'Coupons', 'action' => 'view', $order->coupon->id]) : '' ?></td>
                    <td><?= $order->has('runner') ? $this->Html->link($order->runner->id, ['controller' => 'Runners', 'action' => 'view', $order->runner->id]) : '' ?></td>
                    <td><?= $order->has('order_mode') ? $this->Html->link($order->order_mode->name, ['controller' => 'OrderModes', 'action' => 'view', $order->order_mode->id]) : '' ?></td>
                    <td><?= $order->has('order_status') ? $this->Html->link($order->order_status->name, ['controller' => '  ', 'action' => 'view', $order->order_status->id]) : '' ?></td>
                    
                    <td>₹ <?= h($order->gross_total) ?></td>
                    <td><?= h($order->created) ?></td>
                    <td class="actions">

                        <a title="View" href="<?= $this->Url->build(['action' => 'view', $order->id] ) ?>" class="btn-floating mb-1 waves-effect waves-light cyan">
                            <i class="material-icons">remove_red_eye</i>
                        </a>
                        <a title="Edit" href="<?= $this->Url->build(['action' => 'edit', $order->id] ) ?>" class="btn-floating mb-1 waves-effect waves-light amber darken-4">
                            <i class="material-icons">edit</i>
                        </a>
                        <a title="Delete" href="<?= $this->Url->build(['action' => 'delete', $order->id] ) ?>" class="btn-floating mb-1 waves-effect waves-light red accent-2" onclick="return confirm('Are you sure?')">
                            <i class="material-icons">delete</i>
                        </a>

                        
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="paginator">
            <ul class="pagination">
                <?= $this->Paginator->first('<< ' . __('first')) ?>
                <?= $this->Paginator->prev('< ' . __('previous')) ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next(__('next') . ' >') ?>
                <?= $this->Paginator->last(__('last') . ' >>') ?>
            </ul>
            <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
        </div>
    </div>
</div>
