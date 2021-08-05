<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
$myTemplates = [
    'inputContainer' => '{{content}}',
];
$this->Form->setTemplates($myTemplates);
?>

<?= $this->Form->create($category,['type' => 'file']) ?>
<div class="row">
    
    <div class="col-md-9">
        <div class="card">
            <h5 class="card-header m-0">Add Service Category</h5>
            <div class="card-body">
                <div class="card-text w-100 float-left p-1">
                    <span>
                        <?= $this->Form->control('parent_id', ['options' => $parentCategories, 'empty' => true]); ?>
                    </span>
                </div>
                <div class="card-text w-100 float-left p-1">
                    <span>
                        <?= $this->Form->control('name', [ 'placeholder' => "Name" ]); ?>
                    </span>
                </div>
            </div>
            <div class="card-body">
                <div class="card-text w-100 float-left p-1" style="display: none;">
                    <span>
                        <?= $this->Form->control('slug', [ 'placeholder' => "Slug" ]); ?>
                    </span>
                </div>
                <div class="card-text w-100 float-left p-1">
                    <span>
                        <?= $this->Form->control('description', [ 'placeholder' => "description" ]); ?>
                    </span>
                </div>
            </div>
            <div class="card-body">
                <div class="card-text w-100 float-left p-1">
                    <span>
                        <?= $this->Form->control('image', [ 'type' => 'file','placeholder' => "Image" ]); ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1" style="display: none;">
                    <span>
                        <?= $this->Form->control('status', [ 'placeholder' => " Status" ]); ?>
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
                    <label><b>Show in our service section?</b></label>
                    <?= $this->Form->checkbox('show_in_our_service', ['value' => 1]); ?>
                    
                    <label><b>Show in footer?</b></label>
                    <?= $this->Form->checkbox('show_in_footer', ['value' => 1]); ?>
                    

                    <?= $this->Form->button(__('Submit'), [ "class" => "waves-effect waves-light btn-small mb-1" ]) ?>
                </div>
                
            </div>
            
        </div>
    </div>    
    
</div>
<style>
#image {
    width: 100% !important;
}
label {
  font-size: 20px;
  font-weight: 600;
}
</style>
<?= $this->Form->end() ?>
