<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MerchantKyc[]|\Cake\Collection\CollectionInterface $merchantKycs
 */
?>
<div class="merchantKycs index large-9 medium-8 columns content">
    <h5><?= __('Seller Kycs') ?></h5>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('govt_Id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address_Id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('qualification_Id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('gst_declarartion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($merchantKycs as $merchantKyc): ?>
            <tr>
                <td><?= $this->Number->format($merchantKyc->id) ?></td>
                <td><?= h($merchantKyc->govt_Id) ?></td>
                <td><?= h($merchantKyc->address_Id) ?></td>
                <td><?= h($merchantKyc->qualification_Id) ?></td>
                <td><?= h($merchantKyc->gst_declarartion) ?></td>
                <td><?= h($merchantKyc->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $merchantKyc->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $merchantKyc->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $merchantKyc->id], ['confirm' => __('Are you sure you want to delete # {0}?', $merchantKyc->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
