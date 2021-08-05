<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\YoutubeVideo[]|\Cake\Collection\CollectionInterface $youtubeVideos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Youtube Video'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="youtubeVideos index large-9 medium-8 columns content">
    <h3><?= __('Youtube Videos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('youtubeLink') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_at') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($youtubeVideos as $youtubeVideo): ?>
            <tr>
                <td><?= $this->Number->format($youtubeVideo->id) ?></td>
                <td><?= h($youtubeVideo->name) ?></td>
                <td><?= h($youtubeVideo->youtubeLink) ?></td>
                <td><?= h($youtubeVideo->created_at) ?></td>
                <td class="actions">
                    <?php // $this->Html->link(__('View'), ['action' => 'view', $youtubeVideo->id], array('class' => 'btn')) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $youtubeVideo->id], array('class' => 'btn')) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $youtubeVideo->id], array('class' => 'btn'), ['confirm' => __('Are you sure you want to delete # {0}?', $youtubeVideo->id)]) ?>
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
