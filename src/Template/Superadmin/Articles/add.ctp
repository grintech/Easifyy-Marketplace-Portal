<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article $article
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Articles'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="container">
    <?= $this->Form->create($article, ['type' => 'file']) ?>
        <div class="row">    
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Article Information</div>
                    <div class="card-body">
                        <div class="input text required">
                            <label for="title">Title</label>
                            <input type="text" name="title" required="required" maxlength="255" id="abc-title">
                        </div>
                        <?php
                            echo $this->Form->control('description');
                            echo $this->Form->control('image',['type' => 'file']);
                            echo $this->Form->control('meta_title');
                            echo $this->Form->control('meta_description');
                            //echo $this->Form->control('updated_at');
                            //echo $this->Form->control('created_at');
                        ?>
                    </div>
                </div>    
            </div>
            
            <div class="col-md-3">
                 <div class="card">
                    <div class="card-header p-2">Article Status</div>
                    <div class="card-body text-center">
                        <?= $this->Form->button(__('Submit'),['class'=>'btn']) ?>
                    </div>
                </div>    
            </div>
        </div>
    <?= $this->Form->end() ?>
</div>
<script>
    CKEDITOR.replace( 'description' );
</script>