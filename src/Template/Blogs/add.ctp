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
<div class="container">
    <?= $this->Form->create($blog, ['type' => 'file']) ?>
        <div class="row">    
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Blog Information</div>
                    <div class="card-body">
                        <br>
                        <?php
                            // Add a template with the help placeholder.
                            $this->Form->setTemplates([
                                'inputContainer' => '<div class="input {{type}}{{required}}">
                                    {{content}} <span class="help float-right">{{help}}</span></div>'
                            ]);
                            echo $this->Form->control('blog_category_id', array('type'=>'select', 'id'=>'blog_category_id','required' => "required",'div' => false, 'label' => 'Blog Category *','empty' => 'Select Blog Category','class' => "browser-default",'options'=>$blogCategories ) );

                            echo $this->Form->control('title');
                    
                            echo $this->Form->control('description');
                            
                            echo $this->Form->control('image',['type' => 'file']);
                    
                            echo $this->Form->control('meta_title');
                            
                            echo $this->Form->control('meta_description');

                            echo $this->Form->control('meta_keywords',[
                                'templateVars' => ['help' => 'Add comma seperated Values for keywords']
                            ]);
                            //echo $this->Form->control('slug');
                        
                        ?>
                    </div>
                    <input name="user_id" hidden value="<?=$user_id?>"/>
                    <input name="status" hidden value="0"/>
                </div>    
            </div>
            
            <div class="col-md-3">
                 <div class="card">
                    <div class="card-header p-2">Post Status</div>
                    <div class="card-body text-center">
                        <label><b> Cornerstone Content (Mark yes or no)?</b></label>
                        <?= $this->Form->checkbox('cornerstone_content', ['value' => 1]); ?>
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

