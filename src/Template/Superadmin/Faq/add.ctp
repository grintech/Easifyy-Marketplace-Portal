<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Faq $faq
 */
?>
<style type="text/css">
    .select-dropdown.dropdown-trigger {
        display: none !important;
    }
    .purple-bg{
        background: #2e2e2e !important
    }
</style>

<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Faq'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="faq form large-9 medium-8 columns content">
    <?= $this->Form->create($faq) ?>
    <fieldset>
        <legend><?= __('Add Faq') ?></legend>
        <?php
            echo $this->Form->control('question');
            echo $this->Form->control('answer');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>-->


<div class="container">
    <?= $this->Form->create($faq) ?>
        <div class="row">    
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">FAQs</div>
                    <div class="card-body">
                        <br>
                        <?php
                            echo $this->Form->control('question');
                            echo $this->Form->control('answer');
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

