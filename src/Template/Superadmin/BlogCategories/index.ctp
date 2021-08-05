<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BlogCategory[]|\Cake\Collection\CollectionInterface $blogCategories
 */
?>
<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Blog Category'), ['action' => 'add']) ?></li>
    </ul>
</nav>-->
<div class="blogCategories index large-9 medium-8 columns content">
    <br><br>
    <div class="p-3 mb-2 bg-info text-white">
        <?= __('All Blog Posts') ?>
    <a href="<?php echo $this->Url->build([ 'controller' => 'BlogCategories', 'action' => 'add']) ?>" class="btn">Add Blog Category</a>
    </div>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('slug') ?></th>
                <!--<th scope="col"><?= $this->Paginator->sort('status') ?></th>-->
                <th scope="col"><?= $this->Paginator->sort('created_at') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($blogCategories as $blogCategory): ?>
            <tr>
                <td><?= $this->Number->format($blogCategory->id) ?></td>
                <td><?= h($blogCategory->name) ?></td>
                <td><?= h($blogCategory->slug) ?></td>
                <!--<td><?= $this->Number->format($blogCategory->status) ?></td>-->
                <td><?= h($blogCategory->created_at) ?></td>
                <td class="actions">
                    <!--<?= $this->Html->link(__('View'), ['action' => 'view', $blogCategory->id]) ?>-->
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $blogCategory->id], array('class' => 'btn btn-sm')) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $blogCategory->id], ['class' => 'btn btn-sm','confirm' => __('Are you sure you want to delete # {0}?', $blogCategory->id)]) ?>
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
