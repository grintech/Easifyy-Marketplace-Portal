<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article[]|\Cake\Collection\CollectionInterface $articles
 */
?>
<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Article'), ['action' => 'add']) ?></li>
    </ul>
</nav>-->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="articles index large-9 medium-8 columns content">
    <br><br>
    <!--<div class="alert alert-primary" role="alert">
        <?= __('All Articles') ?>
    </div>-->
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('slug') ?></th>
                <th scope="col"><?= $this->Paginator->sort('meta_title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('meta_description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('image') ?></th>
                <!--<th scope="col"><?= $this->Paginator->sort('updated_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_at') ?></th>-->
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($articles as $article): ?>
            <tr>
                <td><?= $this->Number->format($article->id) ?></td>
                <td><?= h($article->title) ?></td>
                <td><?= h($article->slug) ?></td>
                <td><?= h($article->meta_title) ?></td>
                <td><?= h($article->meta_description) ?></td>
                <td><img src="https://easifyy.com/img/articles/<?= h($article->image) ?>" alt="Not Found" width="100" height="100"></td>

                <!--<td><?= h($article->updated_at) ?></td>
                <td><?= h($article->created_at) ?></td>-->
                <td class="actions">
                    <!--<?= $this->Html->link(__('View'), ['action' => 'view', $article->id], array('class' => 'btn')) ?>-->
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $article->id], array('class' => 'btn')) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $article->id], ['class' => 'btn','confirm' => __('Are you sure you want to delete # {0}?', $article->id)]) ?>
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
