<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
use Cake\Routing\Router;

$path = '/catimage/';
$base =Router::url('/', true);
$base_url = Router::url('/', true).$path ;

$myTemplates = [
    'inputContainer' => '{{content}}',
];
$this->Form->setTemplates($myTemplates);
$image= $base_url.$category->image;
?>

<?= $this->Form->create($category,['type' => 'file']) ?>
<div class="row">
    
    <div class="col-md-9">
        <div class="card">
            <h5 class="card-header m-0">Category Information</h5>
            <div class="card-body">
                <div class="card-text w-50 float-left p-1">
                    <span>
                        <?= $this->Form->control('parent_id', ['options' => $parentCategories, 'empty' => true]); ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <span>
                        <?= $this->Form->control('name', [ 'placeholder' => "Name" ]); ?>
                    </span>
                </div>
            </div>
            <div class="card-body">
                <div class="card-text w-50 float-left p-1">
                    <span>
                        <?= $this->Form->control('slug', [ 'placeholder' => "Slug" ]); ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <span>
                        <?= $this->Form->control('description', [ 'placeholder' => "description" ]); ?>
                    </span>
                </div>
            </div>
            <div class="card-body">
                <div class="card-text w-50 float-left p-1">
                    <div class="product-image">
                        <?php if($category->image): ?>
                        
                        <img src="<?= $image; ?>" alt="Not Found" width="100"/>
                        
                        <a title="Delete" href="<?= $this->Url->build(['action' => 'deletecategroyimage', $category->id, $category->image] ) ?>" class="btn-floating mb-1 waves-effect waves-light red accent-2" onclick="return confirm('Are you sure?')">
                            <i class="material-icons">delete</i>
                        </a>
                        <?php endif; ?>
                    </div>  
                    
                    <span>
                        <?= $this->Form->control('image', [ 'type' => 'file','placeholder' => "Image",'required' =>false ]); ?>
                    </span>

                </div>
                <div class="card-text w-50 float-left p-1">
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
</style>
<?= $this->Form->end() ?>
