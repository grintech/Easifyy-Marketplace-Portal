<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RewardPoint $rewardPoint
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Reward Point'), ['action' => 'edit', $rewardPoint->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Reward Point'), ['action' => 'delete', $rewardPoint->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rewardPoint->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Reward Points'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reward Point'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="rewardPoints view large-9 medium-8 columns content">
    <h3><?= h($rewardPoint->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $rewardPoint->has('user') ? $this->Html->link($rewardPoint->user->id, ['controller' => 'Users', 'action' => 'view', $rewardPoint->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($rewardPoint->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Coins') ?></th>
            <td><?= $this->Number->format($rewardPoint->coins) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Last Change') ?></th>
            <td><?= h($rewardPoint->date_last_change) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Added') ?></th>
            <td><?= h($rewardPoint->date_added) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Expire') ?></th>
            <td><?= h($rewardPoint->date_expire) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($rewardPoint->created) ?></td>
        </tr>
    </table>
</div>
