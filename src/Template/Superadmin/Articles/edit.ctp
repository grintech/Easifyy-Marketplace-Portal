<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Blog $blog
 */
?>
<style type="text/css">
    .select-dropdown.dropdown-trigger {
        display: none !important;
    }
</style>
<div class="articles form large-9 medium-8 columns content">
    <?= $this->Form->create($article, ['type' => 'file']) ?>
    <div class="row">    
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Blog Information</div>
                    <div class="card-body">
                        <br>
                        <?php
                            echo $this->Form->control('title');
                            echo $this->Form->control('slug');
                            echo $this->Form->control('description');
                            echo $this->Form->control('image',['type' => 'file','required' => false,]);
                            echo $this->Form->control('meta_title');
                            echo $this->Form->control('meta_description');
                            //echo $this->Form->control('updated_at');
                            //echo $this->Form->control('created_at');
                        ?>
                        <input type="text" hidden name="pre_image" value="<?php echo $article->image; ?>" />
                    </div>
                </div>    
            </div>
            
            <div class="col-md-3">
                 <div class="card">
                    <div class="card-header">Status</div>
                    <div class="card-body text-center">
                        <?= $this->Form->button(__('Update'),['class'=>'btn']) ?>
                    </div>
                </div>  
                <!--<div class="card">
                    <div class="card-header">Article Status</div>
                    <div class="card-body text-center">
                        <label><b> Active or UnActive?</b></label>
                        <?= $this->Form->checkbox('status', ['value' => 1]); ?>
                    </div>
                </div> --> 
                <div class="card">
                    <div class="card-header p-2">Image</div>
                    <div class="card-body text-center">
                        <img src="https://easifyy.com/img/articles/<?= h($article->image) ?>" alt="Not Found" width="100" height="100">
                    </div>
                </div>    
            </div>
        </div>
    <?= $this->Form->end() ?>
</div>
<script>
    CKEDITOR.replace( 'description' );
</script>
