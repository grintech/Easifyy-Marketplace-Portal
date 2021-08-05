<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
use Cake\Routing\Router;

$path = 'upload_dir/';
$base =Router::url('/', true);
$base_url = Router::url('/', true).$path ;

$myTemplates = [
    'inputContainer' => '{{content}}',
];
$this->Form->setTemplates($myTemplates);
$image= $base_url.$user->user_profile_image;

?>
<?= $this->Form->create($user, ['type' => 'file']) ?>
<div class="row">
    <input type="hidden" id="counter" value="1"> 

    <div class="col-md-9">
        <div class="card">
            <h5 class="card-header m-0">User Information</h5>
            <div class="card-body">
                <div class="card-text w-50 float-left p-1">
                    <span>
                        <?= $this->Form->control('first_name', [ 'placeholder' => "First Name" ]); ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <span>
                        <?= $this->Form->control('last_name', [ 'placeholder' => "First Name" ]); ?>
                    </span>
                </div>
                
            </div>
            <div class="card-body">
                <div class="card-text w-50 float-left p-1">
                    <span>
                        <?= $this->Form->control('username', [ 'placeholder' => "Email" ]); ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <span>
                        <?= $this->Form->control('phone', [ 'placeholder' => "Enter Phone Number" ]); ?>
                    </span>
                </div> 
            </div>

            <div class="card-body">
                <div class="card-text w-50 float-left p-1">
                    <span>
                        <?= $this->Form->control('role'); ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1">
                    <span>
                        Status <?php echo $this->Form->checkbox('status');?>
                        <?php //$this->Form->control('status') ?>
                    </span>
                </div>
                <div class="card-text w-50 float-left p-1 hide">
                    <div class="product-image">
                        <?php if($user->user_profile_image): ?>
                        <img src="<?= $image; ?>" alt="Not Found" width="100"/>
                        <a title="Delete" href="<?= $this->Url->build(['action' => 'deleteuserimage', $user->id] ) ?>" class="btn-floating mb-1 waves-effect waves-light red accent-2" onclick="return confirm('Are you sure?')">
                            <i class="material-icons">delete</i>
                        </a>
                        <?php endif; ?>
                    </div>  
                    
                    <span>
                        <?= $this->Form->control('user_profile_image' ,['type' => 'file']); ?>
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
<style>
 #user_profile_image {
    width: 100% !important;
}
</style>

<?= $this->Form->end() ?>

