<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Blog[]|\Cake\Collection\CollectionInterface $blogs
 */
?>

<div class="blogs index large-9 medium-8 columns content p-3">
    <br><br>
    <div class="alert alert-primary" role="alert">
        <?= __('All Blog Posts') ?>
        <!-- <a class="add-blogs" href="<?php echo $this->Url->build(['controller' => 'Blogs', 'action' => 'add']) ?>"> add Blog</a> -->
    </div>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('image') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($blogs as $blog): ?>
            <tr>
                <td><?= $this->Number->format($blog->id) ?></td>
                <td><?= h($blog->title) ?></td>
                <td><img src="https://easifyy.com/img/blogs/<?= h($blog->image) ?>" alt="Not Found" width="100" height="100"></td>
                <td><?= h($blog->created) ?></td>
                <td class="actions">
                    <?php //$this->Html->link(__('View'), ['action' => 'view', $blog->id], array('class' => 'btn')) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $blog->id], array('class' => 'btn')) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $blog->id], array('class' => 'btn'), ['confirm' => __('Are you sure you want to delete # {0}?', $blog->id)]) ?>
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
