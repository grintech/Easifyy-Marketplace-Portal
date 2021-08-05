<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\YoutubeVideo $youtubeVideo
 */
?>
<style>
    .select-dropdown.dropdown-trigger {
        display: none !important;
    }
    .light-purple-background{
      background-color: #E2DBFF; !important;
   }
</style>
<!--<nav class="large-3 medium-4 columns light-purple-background" id="actions-sidebar">
    <ul class="side-nav  ">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Youtube Videos'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="youtubeVideos form large-9 medium-8 columns content">
    <?= $this->Form->create($youtubeVideo) ?>
    <fieldset>
        <legend><?= __('Add Youtube Video') ?></legend>
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
                    <div class="card-header"><?= __('Add Youtube Video') ?></div>
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
                    <div class="card-header">FAQ Status</div>
                    <div class="card-body text-center">
                        <?= $this->Form->button(__('Submit'),['class'=>'btn']) ?>
                    </div>
                </div>    
            </div>
        </div>
    <?= $this->Form->end() ?>
</div>

