<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Coupon[]|\Cake\Collection\CollectionInterface $coupons
 */
?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __( 'Actions') ?></li>
        <li><?= $this->Html->link(__('New Coupon'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Merchants'), ['controller' => 'Merchants', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Merchant'), ['controller' => 'Merchants', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?></li>
    </ul>
</nav> -->
<div class="card card-tabs">
    <div class="card-content">
    
        <table class="responsive-table bordered">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('coupon_code', [__('Coupon code')]) ?></th>
                    <th scope="col"><?= $this->Paginator->sort('discount', [ __('Discount') ] ) ?></th>
                    <th scope="col"><?= $this->Paginator->sort('discount_type', [ __('Discount type') ]) ?></th>
                    <th scope="col"><?= $this->Paginator->sort('expire', [ __('Expire on') ]) ?></th>
                    <th scope="col"><?= $this->Paginator->sort('status', [ __('Status') ]) ?></th>
                    <th scope="col"><?= $this->Paginator->sort('created', [ __('Created on') ]) ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($coupons as $coupon): ?>
                <tr>
                    <td><?= $this->Number->format($coupon->id) ?></td>
                    <td><?= h($coupon->coupon_code) ?></td>
                    <td><?= h($coupon->discount) ?></td>
                    <td><?= h($coupon->discount_type) ?></td>
                    <td><?= h($coupon->expire) ?></td>
                    <td><?= h($coupon->status) ?></td>
                    <td><?= h($coupon->created) ?></td>
                    <td class="actions">
                        
                        <a title="View" href="<?= $this->Url->build(['action' => 'view', $coupon->id] ) ?>" class="btn-floating mb-1 waves-effect waves-light cyan">
                            <i class="material-icons">remove_red_eye</i>
                        </a>
                        <a title="Edit" href="<?= $this->Url->build(['action' => 'edit', $coupon->id] ) ?>" class="btn-floating mb-1 waves-effect waves-light amber darken-4">
                            <i class="material-icons">edit</i>
                        </a>
                        <a title="Delete" href="<?= $this->Url->build(['action' => 'delete', $coupon->id] ) ?>" class="btn-floating mb-1 waves-effect waves-light red accent-2" onclick="return confirm('Are you sure?')" >
                            <i class="material-icons">delete</i>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
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
            <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
        </div>
    </div>
</div>
