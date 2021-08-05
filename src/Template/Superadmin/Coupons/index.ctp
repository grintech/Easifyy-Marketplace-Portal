<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Coupon[]|\Cake\Collection\CollectionInterface $coupons
 */
?>

<div class="card card-tabs">
    <div class="card-content">
    
        <table class="responsive-table bordered">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('coupon_code') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('discount') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('discount_type') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('expire') ?></th>
                    <!-- <th scope="col"><?= $this->Paginator->sort('user_usage_limit') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('usage_limit') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('minimum_spend') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('maximum_spend') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('max_amount') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('usage_count') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('coupon_applicable') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('modified') ?></th> -->
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
                    <td><?= h($coupon->description) ?></td>
                    <td><?= h($coupon->expire) ?></td>
                    <!-- <td><?= $this->Number->format($coupon->user_usage_limit) ?></td>
                    <td><?= $this->Number->format($coupon->usage_limit) ?></td>
                    <td><?= $this->Number->format($coupon->minimum_spend) ?></td>
                    <td><?= $this->Number->format($coupon->maximum_spend) ?></td>
                    <td><?= $this->Number->format($coupon->max_amount) ?></td>
                    <td><?= $this->Number->format($coupon->usage_count) ?></td>
                    <td><?= $this->Number->format($coupon->coupon_applicable) ?></td>
                    <td><?= h($coupon->status) ?></td>
                    <td><?= h($coupon->created) ?></td>
                    <td><?= h($coupon->modified) ?></td> -->
                    <td class="actions">
                        <a title="Edit" href="<?= $this->Url->build(['action' => 'edit', $coupon->id] ) ?>" class="btn-floating mb-1 waves-effect waves-light amber darken-4">
                            <i class="material-icons">edit</i>
                        </a>
                        <a title="Delete" href="<?= $this->Url->build(['action' => 'delete', $coupon->id] ) ?>" class="btn-floating mb-1 waves-effect waves-light red accent-2" onclick="return confirm('Are you sure?')">
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
