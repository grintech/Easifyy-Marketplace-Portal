<?php
use Cake\Routing\Router;
$this->Form->setTemplates([
    'inputContainer' => '{{content}}'
]);
 
?>
<div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 login-card bg-opacity-8">
	
    <?= $this->Form->create() ?>
      <div class="row">
        <div class="input-field col s12">
          <h5 class="ml-4">Forgot Password</h5>
        </div>
      </div>
      <div class="row margin">
        <p><?= $this->Flash->render() ?></p>
      </div>
      <div class="row margin">
        <div class="input-field col s12">
          <i class="material-icons prefix pt-2">lock_outline</i>
          <!-- <input id="username" type="text"> -->
          <?= $this->Form->control('new_password', [ 'label' => false, 'div' => false, 'id' => 'new_password', 'autocomplete' =>'off' ] ) ?>
          <label for="new_password" class="center-align">New Password</label>

        </div>
      </div>

      <div class="row margin">
        <div class="input-field col s12">
          <i class="material-icons prefix pt-2">lock_outline</i>
          <!-- <input id="username" type="text"> -->
          <?= $this->Form->control('confirm_password', [ 'label' => false, 'div' => false, 'id' => 'confirm_password', 'autocomplete' =>'off' ] ) ?>
          <label for="confirm_password" class="center-align">Confirm Password</label>

        </div>
      </div>
      
      <div class="row">
        <div class="input-field col s12">
          
          <?= $this->Form->button(__('Reset'), [ 'class' => "btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12" ] ); ?>
        </div>
      </div>
      
      <hr>
      <div class="row">
        <div class="col s12 m12 l12 ml-2 mt-1">
          <p class="text-center">
            <a href="<?= $this->Url->build([ 'controller' => 'Users', 'action' => 'login' ]) ?>">Login</a>
            
          </p>
        </div>
      </div>
      
    <?= $this->Form->end() ?>
  </div>