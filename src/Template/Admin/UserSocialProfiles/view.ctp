<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserSocialProfile $userSocialProfile
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User Social Profile'), ['action' => 'edit', $userSocialProfile->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User Social Profile'), ['action' => 'delete', $userSocialProfile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userSocialProfile->id)]) ?> </li>
        <li><?= $this->Html->link(__('List User Social Profiles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Social Profile'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="userSocialProfiles view large-9 medium-8 columns content">
    <h3><?= h($userSocialProfile->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $userSocialProfile->has('user') ? $this->Html->link($userSocialProfile->user->id, ['controller' => 'Users', 'action' => 'view', $userSocialProfile->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Social Network Name') ?></th>
            <td><?= h($userSocialProfile->social_network_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Social NetworkID') ?></th>
            <td><?= h($userSocialProfile->social_networkID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($userSocialProfile->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Display Name') ?></th>
            <td><?= h($userSocialProfile->display_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('First Name') ?></th>
            <td><?= h($userSocialProfile->first_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Name') ?></th>
            <td><?= h($userSocialProfile->last_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Link') ?></th>
            <td><?= h($userSocialProfile->link) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Picture') ?></th>
            <td><?= h($userSocialProfile->picture) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($userSocialProfile->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($userSocialProfile->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($userSocialProfile->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $userSocialProfile->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
