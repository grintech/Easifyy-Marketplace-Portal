<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Faq[]|\Cake\Collection\CollectionInterface $faq
 */
?>
<!--<nav class="large-3 medium-4 columns  px-3 " id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
    </ul>
</nav>-->

<div class="blogs index large-9 medium-8 columns content">
    <br><br>
    <div class="alert alert-primary" role="alert">
        <p><?= __('All FAQs') ?></p>
        <p><?= $this->Html->link(__('New Faq'), ['action' => 'add']) ?></p>
    </div>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('question') ?></th>
                <th scope="col"><?= $this->Paginator->sort('anwser') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_at') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($faq as $faq): ?>
                <tr>
                    <td><?= $this->Number->format($faq->id) ?></td>
                    <td><?= h($faq->question) ?></td>
                    <td><?php echo substr($faq->answer, 0, 75)."..."; ?></td>
                    <td><?= h($faq->created_at) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $faq->id], array('class' => 'btn')) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $faq->id], array('class' => 'btn')) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $faq->id], array('class' => 'btn'), ['confirm' => __('Are you sure you want to delete # {0}?', $faq->id)]) ?>
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
