<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ContactU $contactU
 */
?>
<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Contact U'), ['action' => 'edit', $contactU->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Contact U'), ['action' => 'delete', $contactU->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contactU->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Contact Us'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Contact U'), ['action' => 'add']) ?> </li>
    </ul>
</nav>-->
<div class="contactUs view large-9 medium-8 columns content p-3">
    <!--<h3><?= h($contactU->id) ?></h3>-->
    <table class="vertical-table">
        <?php if($contactU->business_support==1){?>
            <tr>
                <th scope="row"><?= __('Business Name') ?></th>
                <td><?= h($contactU->business_name) ?></td>
            </tr>
        <?php }?>
        <tr>
            <th scope="row"><?= __('First Name') ?></th>
            <td><?= h($contactU->first_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Name') ?></th>
            <td><?= h($contactU->last_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($contactU->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= h($contactU->Phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Message') ?></th>
            <td><?= $this->Text->autoParagraph(h($contactU->message)); ?></td>
        </tr>
        <!--<tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($contactU->id) ?></td>
        </tr>-->
        <tr>
            <th scope="row"><?= __('Query At') ?></th>
            <td><?= h($contactU->created_at) ?></td>
        </tr>

        <!--<tr>
            <th scope="row"><?= __('Updated At') ?></th>
            <td><?= h($contactU->updated_at) ?></td>
        </tr>-->

    </table>
    <!--<div class="row">
        <h4><?= __('Message') ?></h4>
        <?= $this->Text->autoParagraph(h($contactU->message)); ?>
    </div>-->
</div>
