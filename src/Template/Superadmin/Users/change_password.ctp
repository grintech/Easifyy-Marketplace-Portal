<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<div class="users view large-9 medium-8 columns content p-5">
<?= $this->Form->create(); ?>    
  <div class="col-md-6 border rounded p-5">
    <div class="form-group">
      <label for="exampleInputEmail1">New Password</label>
      <input type="text" class="form-control" name="newPassword" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="New Password">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Confirm New Password</label>
      <input type="text" class="form-control" name="confirmPassword" id="exampleInputPassword1" placeholder="Confirm New Password">
    </div>
    <button type="submit" class="btn btn-primary">Change</button>
  </div>
<?= $this->Form->end(); ?>    
</div>
