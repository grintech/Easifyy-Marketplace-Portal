<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RunnerDeliveryRequest $runnerDeliveryRequest
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $runnerDeliveryRequest->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $runnerDeliveryRequest->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Runner Delivery Requests'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Runners'), ['controller' => 'Runners', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Runner'), ['controller' => 'Runners', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="runnerDeliveryRequests form large-9 medium-8 columns content">
    <?= $this->Form->create($runnerDeliveryRequest) ?>
    <fieldset>
        <legend><?= __('Edit Runner Delivery Request') ?></legend>
        <?php
            echo $this->Form->control('runner_id', ['options' => $runners]);
            echo $this->Form->control('order_id', ['options' => $orders]);
            echo $this->Form->control('request_status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
