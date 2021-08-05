<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\YoutubeVideo $youtubeVideo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $youtubeVideo->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $youtubeVideo->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Youtube Videos'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<!--<div class="youtubeVideos form large-9 medium-8 columns content">
    <?= $this->Form->create($youtubeVideo) ?>
    <fieldset>
        <legend><?= __('Edit Youtube Video') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('youtubeLink');
            //echo $this->Form->control('created_at');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>-->

<div class="container">
    <?= $this->Form->create($youtubeVideo) ?>
        <div class="row">    
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header"><?= __('Edit Youtube Video') ?></div>
                    <div class="card-body">
                        <br>
                        <?php
                            echo $this->Form->control('name');
                            echo $this->Form->control('youtubeLink');
                        ?>
                    </div>
                </div>    
            </div>
            
            <div class="col-md-3">
                 <div class="card">
                    <div class="card-header">Youtube Video </div>
                    <div class="card-body text-center">
                        <?= $this->Form->button(__('Submit'),['class'=>'btn']) ?>
                    </div>
                </div>    
            </div>
        </div>
    <?= $this->Form->end() ?>
</div>
