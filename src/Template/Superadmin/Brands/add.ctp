<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Brand $brand
 */
$myTemplates = [
    'inputContainer' => '{{content}}',
];
$this->Form->setTemplates($myTemplates);
?>
<?= $this->Form->create($brand) ?>
<div class="row">
    
    <div class="col-md-9">
        <div class="card">
            <h5 class="card-header m-0">Brand Information</h5>
            <div class="card-body">
                <div class="card-text p-1">
                    <span>
                        <?= $this->Form->control('name', [ 'placeholder' => "Name" ]); ?>
                    </span>
                </div>
                <div class="card-text p-1">
                    <span>
                        <?= $this->Form->control('slug', [ 'placeholder' => "Slug" ]); ?>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <h5 class="card-header m-0">Action</h5>
            <div class="card-body">
                <div class="card-text">
                    <?= $this->Form->button(__('Submit'), [ "class" => "waves-effect waves-light btn-small mb-1" ]) ?>
                </div>
                
            </div>
            
        </div>
    </div>
    
</div>
<?= $this->Form->end() ?>