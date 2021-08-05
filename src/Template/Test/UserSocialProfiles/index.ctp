<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserSocialProfile[]|\Cake\Collection\CollectionInterface $userSocialProfiles
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New User Social Profile'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="userSocialProfiles index large-9 medium-8 columns content">
    <h3><?= __('User Social Profiles') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('social_network_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('social_networkID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('display_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('link') ?></th>
                <th scope="col"><?= $this->Paginator->sort('picture') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($userSocialProfiles as $userSocialProfile): ?>
            <tr>
                <td><?= $this->Number->format($userSocialProfile->id) ?></td>
                <td><?= $userSocialProfile->has('user') ? $this->Html->link($userSocialProfile->user->id, ['controller' => 'Users', 'action' => 'view', $userSocialProfile->user->id]) : '' ?></td>
                <td><?= h($userSocialProfile->social_network_name) ?></td>
                <td><?= h($userSocialProfile->social_networkID) ?></td>
                <td><?= h($userSocialProfile->email) ?></td>
                <td><?= h($userSocialProfile->display_name) ?></td>
                <td><?= h($userSocialProfile->first_name) ?></td>
                <td><?= h($userSocialProfile->last_name) ?></td>
                <td><?= h($userSocialProfile->link) ?></td>
                <td><?= h($userSocialProfile->picture) ?></td>
                <td><?= h($userSocialProfile->status) ?></td>
                <td><?= h($userSocialProfile->created) ?></td>
                <td><?= h($userSocialProfile->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $userSocialProfile->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userSocialProfile->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userSocialProfile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userSocialProfile->id)]) ?>
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
