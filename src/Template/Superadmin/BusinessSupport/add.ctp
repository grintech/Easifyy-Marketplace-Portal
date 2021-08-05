<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BusinessSupport $businessSupport
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar" style="background: #E2DBFF;color:#2e2e2e">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Business Support'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="businessSupport form large-9 medium-8 columns content">
    <?= $this->Form->create($businessSupport) ?>
    <fieldset>
        <legend><?= __('Add Business Support') ?></legend>
        <?php
            echo $this->Form->control('name', ['required' => true]);
            //echo $this->Form->control('slug');
            echo $this->Form->control('description',['required' => true]);
            //echo $this->Form->control('created_at');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
