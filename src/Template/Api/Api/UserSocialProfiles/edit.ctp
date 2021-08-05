<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserSocialProfile $userSocialProfile
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $userSocialProfile->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $userSocialProfile->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List User Social Profiles'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="userSocialProfiles form large-9 medium-8 columns content">
    <?= $this->Form->create($userSocialProfile) ?>
    <fieldset>
        <legend><?= __('Edit User Social Profile') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->control('social_network_name');
            echo $this->Form->control('social_networkID');
            echo $this->Form->control('email');
            echo $this->Form->control('display_name');
            echo $this->Form->control('first_name');
            echo $this->Form->control('last_name');
            echo $this->Form->control('link');
            echo $this->Form->control('picture');
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
