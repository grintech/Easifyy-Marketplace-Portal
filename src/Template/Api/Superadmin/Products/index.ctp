<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product[]|\Cake\Collection\CollectionInterface $products
 */
use Cake\Routing\Router;
$path = 'img/product-images/';
$csvpath = 'sample/';
$base =Router::url('/', true);
$base_url = Router::url('/', true).$path ;
$base_csv_url = Router::url('/', true).$csvpath ;

?>

<div class="card card-tabs">
    <div class="card-content">
        
        
        <!--<button data-target="importProductCSV" type="button" class="btn gradient-45deg-light-blue-cyan gradient-shadow modal-trigger">Import Product CSV</button>
        <a type="button" href="<?=$base_csv_url.'product-import.csv' ?>" download="download" class="btn gradient-45deg-light-blue-cyan gradient-shadow modal-trigger">Donwload sample</a>
        <hr>-->
        <?php
            echo $this->Form->create('Post',array('action'=>'search'));
            echo $this->Form->control('search_key');
            echo $this->Form->submit('Search',array('class'=>'btn gradient-45deg-light-blue-cyan gradient-shadow modal-trigger','div'=>false));
            echo $this->Form->end();
        ?>
        <hr>
        <table class="responsive-table bordered">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('_basic_price') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('_basic_plan_time') ?></th>
                   <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): 
                    $imgPath=$base_url.'/'.'logo.png';
                    //$featured_key = array_search('Featured', $product->product_galleries);
                    if(!empty($product->product_galleries)){
                        $imgPath=$base_url.'/app-images/'.$product->product_galleries[0]['url'];
                    }
                ?>
                <tr>
                    <td>
                        <img src="<?php echo $imgPath ?>" alt="dummy">

                        <?php //echo  ?>
                    </td>
                    <td><?= h($product->title) ?></td>
                    <td><?= $this->Number->format($product->_basic_price) ?></td>
                    <td><?= $this->Number->format($product->_basic_plan_time) ?> days</td>
                   
                    <td class="actions">

                        <a title="Edit" href="<?= $this->Url->build(['action' => 'edit', base64_encode($product->id) ] ) ?>" class="btn-floating mb-1 waves-effect waves-light amber darken-4">
                            <i class="material-icons">edit</i>
                        </a>
                        <a title="Delete" href="<?= $this->Url->build(['action' => 'delete', $product->id] ) ?>" class="btn-floating mb-1 waves-effect waves-light red accent-2" onclick="return confirm('Are you sure?')">
                            <i class="material-icons">delete</i>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="paginator">
            <ul class="pagination">
                <?= $this->Paginator->first('<< ' . __('first')) ?>
                <?= $this->Paginator->prev('< ' . __('previous')) ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next(__('next') . ' >') ?>
                <?= $this->Paginator->last(__('last') . ' >>') ?>
            </ul>
            <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
        </div>
    </div>
</div>

<div id="importProductCSV" class="modal modal-fixed-footer ">
    <?=$this->Form->create($uploadCSV, ['type' => 'file']) ?>
    <div class="modal-content">
      <h5>Select a CSV file</h5>
      <p>
            
            <div class="file-field input-field">
                <div class="btn">
                    <span>File</span>
                    <!-- <input type="file" name="productCSV"> -->
                    <?php echo $this->Form->control('file', ['type' => 'file', 'class' => false, 'label' => false, 'div' => false]); ?>
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>
            
      </p>
    </div>
    <div class="modal-footer">
        <button type="submit" class="modal-close waves-effect waves-green btn-flat">Upload & import</button>
      
    </div>
    <?=$this->Form->end() ?>
</div>

