<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MerchantProduct[]|\Cake\Collection\CollectionInterface $merchantProducts
 */
use Cake\Routing\Router;
$path = 'img/product-images/';
$base_url = Router::url('/', true).$path ;
?>

<div class="card card-tabs">
    <div class="card-content">
    
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
                <?= $this->Paginator->first('<< ' . __('First')) ?>
                <?= $this->Paginator->prev('< ' . __('Previous')) ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next(__('Next') . ' >') ?>
                <?= $this->Paginator->last(__('Last') . ' >>') ?>
            </ul>
            <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
        </div>
    </div>
</div>
