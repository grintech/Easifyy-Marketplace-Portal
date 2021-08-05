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
    <div class="row pb-1">
        <h5>Order History</h5>
    </div>
    <table class="responsive-table bordered">
            <thead>
                <tr class="row-bg">
                    <th scope="col"><?= $this->Paginator->sort('Service Name') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('PSP Name') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Plan Name') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Price') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Deadline') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): 
                    //$imgPath=$base_url.'/'.'logo.png';
                    //$featured_key = array_search('Featured', $product->product_galleries);
                    //if(!empty($product->product_galleries)){
                    //    $imgPath=$base_url.'/app-images/'.$product->product_galleries[0]['url'];
                    //}
                    //dd($product);
                    //dd($product->product_categories[0]->category->name);
                    $myId=0;
                    $myId= $product->parent_id; 
                    if(is_null($myId)){
                        $myClass='bg-success text-white custom-service';
                    }else{
                        $myClass="bg-info text-white actived-service";
                    }
                ?>
                <tr class="<?=$myClass?>" myattr="<?=$myId?>">
                    <td>
                        <!--<img src="<?php echo $imgPath ?>" alt="dummy">-->
                        <?php echo $product->product_categories[0]->category->name ?>
                    </td>
                    <td><?= h($product->title) ?></td>
                    <td><?= $this->Number->format($product->_basic_plan_price) ?></td>
                    <td><?= $this->Number->format($product->_standard_plan_price) ?></td>
                    <td><?= $this->Number->format($product->_premium_plan_price) ?></td>
                    <td><?= 'Pending' ?></td>
                    <td class="actions">
                        <a title="View" href="<?= $this->Url->build(['action' => 'view', base64_encode($product->id) ] ) ?>" class="btn-floating mb-1 waves-effect waves-light amber darken-4">
                            <i class="material-icons">remove_red_eye</i>
                        </a>
                        <a title="Edit" href="<?= $this->Url->build(['action' => 'edit', base64_encode($product->id) ] ) ?>" class="btn-floating mb-1 waves-effect waves-light amber darken-4">
                            <i class="material-icons">edit</i>
                        </a>
                        <a title="Delete" href="<?= $this->Url->build(['action' => 'delete',base64_encode($product->id) ] ) ?>" class="btn-floating mb-1 waves-effect waves-light red accent-2" onclick="return confirm('Are you sure?')">
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
