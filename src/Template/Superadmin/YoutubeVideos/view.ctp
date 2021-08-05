<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\YoutubeVideo $youtubeVideo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Youtube Video'), ['action' => 'edit', $youtubeVideo->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Youtube Video'), ['action' => 'delete', $youtubeVideo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $youtubeVideo->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Youtube Videos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Youtube Video'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="youtubeVideos view large-9 medium-8 columns content">
    <h3><?= h($youtubeVideo->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($youtubeVideo->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('YoutubeLink') ?></th>
            <td><?= h($youtubeVideo->youtubeLink) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($youtubeVideo->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created At') ?></th>
            <td><?= h($youtubeVideo->created_at) ?></td>
        </tr>
    </table>
</div>
