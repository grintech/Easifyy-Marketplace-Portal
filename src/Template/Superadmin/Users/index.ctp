
<link  href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" >
<link href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css" rel="stylesheet">
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
use Cake\Routing\Router;

$path = 'upload_dir/';
$base =Router::url('/', true);
$base_url = Router::url('/', true).$path ;

?>
<style>
table.responsive-table.bordered .btn {
    border-radius: 50%;
    width: 40px;
    height: 40px;
    padding: 0;
    line-height: 28px;
}

table.responsive-table.bordered td {
    font-size: 15px;
}
</style>
<div class="card card-tabs">
    <div class="card-content">
    
        <table class="responsive-table bordered" id="users-datatable">
            <thead>
                <tr class="row-bg">
                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('last_name') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('username') ?></th>
                    <!-- <th scope="col"><?= $this->Paginator->sort('user_profile_image') ?></th> -->
                    <th scope="col"><?= $this->Paginator->sort('role') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td>#<b><?= $this->Number->format($user->id) ?></b></td>
                    <td><?= h($user->first_name) ?></td>
                    <td><?= h($user->last_name) ?></td>
                    <td><?= h($user->username) ?></td>
                    
                    <td>
                        <?php if($user->role=='superadmin'): ?>
                            <span class="badge badge-primary"><?= strtoupper($user->role); ?></span>
                        <?php elseif($user->role=='admin'): ?>
                            <span class="badge badge-warning"><?= strtoupper($user->role); ?></span>
                        <?php else: ?>
                            <span class="badge badge-info"><?= strtoupper($user->role); ?></span>
                        <?php endif; ?>   
                    </td>
                    <td class="actions">
                        <a title="View" href="<?= $this->Url->build(['action' => 'view', $user->id] ) ?>" class="btn">
                            <i class="material-icons">remove_red_eye</i>
                        </a>
                        <a title="Edit" href="<?= $this->Url->build(['action' => 'edit', $user->id] ) ?>" class="btn">
                            <i class="material-icons">edit</i>
                        </a>
                        <a title="Delete" href="<?= $this->Url->build(['action' => 'delete', $user->id] ) ?>" class="btn" onclick="return confirm('Are you sure?')">
                            <i class="material-icons">delete</i>
                        </a>

                        
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <!--<div class="paginator">
            <ul class="pagination">
                <?= $this->Paginator->first('<< ' . __('first')) ?>
                <?= $this->Paginator->prev('< ' . __('previous')) ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next(__('next') . ' >') ?>
                <?= $this->Paginator->last(__('last') . ' >>') ?>
            </ul>
            <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
        </div>-->
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
<script src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js "></script>
<script>
    
    $('#users-datatable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
        }
    );
</script>
