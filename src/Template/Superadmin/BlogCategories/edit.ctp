<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BlogCategory $blogCategory
 */
?>
<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Blog Categories'), ['action' => 'index']) ?></li>
    </ul>
</nav>-->
<div class="container">
    <?= $this->Form->create($blogCategory) ?>
    <div class="row">    
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Update Blog Category</div>
                    <div class="card-body">
                        <br>
                        <?php
                            echo $this->Form->control('name');
                            //echo $this->Form->control('slug');
                            //echo $this->Form->control('status');
                            //echo $this->Form->control('created_at');
                        ?>
                        <input type="hidden" name="status" value="1"/>
                    </div>
                </div>    
            </div>
            
            <div class="col-md-3">
                 <div class="card">
                    <div class="card-header p-2">Add Blog Category </div>
                    <div class="card-body text-center">
                        <?= $this->Form->button(__('Submit'),['class'=>'btn']) ?>
                    </div>
                </div>    
            </div>
        </div>
    <?= $this->Form->end() ?>
</div>
