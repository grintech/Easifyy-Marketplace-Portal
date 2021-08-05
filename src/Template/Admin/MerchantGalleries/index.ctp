<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MerchantGallery[]|\Cake\Collection\CollectionInterface $merchantGalleries
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Merchant Gallery'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Merchants'), ['controller' => 'Merchants', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Merchant'), ['controller' => 'Merchants', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="merchantGalleries index large-9 medium-8 columns content">
    <h3><?= __('Merchant Galleries') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('merchant_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('url') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($merchantGalleries as $merchantGallery): ?>
            <tr>
                <td><?= $this->Number->format($merchantGallery->id) ?></td>
                <td><?= $merchantGallery->has('merchant') ? $this->Html->link($merchantGallery->merchant->id, ['controller' => 'Merchants', 'action' => 'view', $merchantGallery->merchant->id]) : '' ?></td>
                <td><?= h($merchantGallery->type) ?></td>
                <td><?= h($merchantGallery->url) ?></td>
                <td><?= h($merchantGallery->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $merchantGallery->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $merchantGallery->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $merchantGallery->id], ['confirm' => __('Are you sure you want to delete # {0}?', $merchantGallery->id)]) ?>
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
