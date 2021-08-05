<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Runner $runner
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $runner->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $runner->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Runners'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Runner Delivery Requests'), ['controller' => 'RunnerDeliveryRequests', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Runner Delivery Request'), ['controller' => 'RunnerDeliveryRequests', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="runners form large-9 medium-8 columns content">
    <?= $this->Form->create($runner) ?>
    <fieldset>
        <legend><?= __('Edit Runner') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('gender');
            echo $this->Form->control('dob', ['empty' => true]);
            echo $this->Form->control('address');
            echo $this->Form->control('phone_no');
            echo $this->Form->control('vehicle_no');
            echo $this->Form->control('current_locatioin');
            echo $this->Form->control('loc_lat');
            echo $this->Form->control('loc_long');
            echo $this->Form->control('profile_pic');
            echo $this->Form->control('last_login', ['empty' => true]);
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
