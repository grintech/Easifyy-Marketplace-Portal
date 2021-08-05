<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Merchant[]|\Cake\Collection\CollectionInterface $merchants
 */
?>

<div class="card card-tabs">
    <div class="card-content">
        <table  class="responsive-table bordered">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Name') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Email') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($merchants as $merchant): ?>
                <tr>
                    <td><?= $this->Number->format($merchant->id) ?></td>
                    <!--<td><?//= $merchant->has('user') ? $this->Html->link($merchant->user->id, ['controller' => 'Users', 'action' => 'view', $merchant->user->id]) : '' ?></td>-->
                    <td><?= h($merchant->first_name) ?></td>
                    <td><?= h($merchant->username) ?></td>
                    <td><?=($merchant->status)==1 ? 'Active' : 'In-Active' ?></td>
                    <td><?= h($merchant->created) ?></td>
                    <td><?= h($merchant->modified) ?></td>
                    <td class="actions">
                        <a title="View" href="<?= $this->Url->build(['action' => 'view', $merchant->id] ) ?>" class="btn-floating mb-1 waves-effect waves-light cyan">
                            <i class="material-icons">remove_red_eye</i>
                        </a>
                        <a title="Edit" href="<?= $this->Url->build(['action' => 'edit', $merchant->id] ) ?>" class="btn-floating mb-1 waves-effect waves-light amber darken-4">
                            <i class="material-icons">edit</i>
                        </a>
                        <a title="Delete" href="<?= $this->Url->build(['action' => 'delete', $merchant->id] ) ?>" class="btn-floating mb-1 waves-effect waves-light red accent-2" onclick="return confirm('Are you sure?')">
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
