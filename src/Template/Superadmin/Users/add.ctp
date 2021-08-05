<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */

$myTemplates = [
    'inputContainer' => '{{content}}',
];
$this->Form->setTemplates($myTemplates);

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
                        <?= $this->Form->control('last_name', [ 'placeholder' => "Last Name" ]); ?>
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
                        <?= $this->Form->control('password', [ 'placeholder' => "Password" ]); ?>
                    </span>
                </div>

            </div>

            <div class="card-body">
                <div class="card-text w-50 float-left p-1">
                    <span>
                        <?php $options= array('user'=>'User','superadmin'=>'Superadmin')?>
                        <?= $this->Form->control('role',[ 'options'=>$options]); ?>
                    </span>
                </div>
                <!--<div class="card-text w-50 float-left p-1">
                    <span>
                        <?= $this->Form->control('user_profile_image' ,['type' => 'file','id' => 'upimg' ]); ?>
                    </span>
                </div>-->

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
        <!--<div class="card">
            <div class="uploded-img-viewer">
                <img src="#" id="inptimgv" width="100%" alt="your image">
            </div>
        </div>-->
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#inptimgv').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}

$("#upimg").change(function() {
    readURL(this);
});
</script>
<?= $this->Form->end() ?>