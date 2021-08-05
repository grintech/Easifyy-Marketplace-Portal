<?php
// echo '<pre>'; print_r($merchant); echo '</pre>';
// die();
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
.emp-profile {
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
}

.profile-img {
    text-align: center;
}

.profile-img img {
    width: 70%;
    height: 100%;
}

.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}

.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}

.profile-head h5 {
    color: #333;
}

.profile-edit-btn {
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
}

.proile-rating {
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}

.proile-rating span {
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}

.profile-head .nav-tabs {
    margin-bottom: 5%;
}

.profile-head .nav-tabs .nav-link {
    font-weight: 600;
    border: none;
    color: #495057;
}

.profile-head .nav-tabs .nav-link.active {
    border: none;
    border-bottom: 2px solid #8e43e7;
    color: #8e43e7;
}

/* .profile-work {
        padding: 14%;
        margin-top: -15%;
    } */

.profile-work p {
    font-size: 12px;
    color: #818182;
    font-weight: 600;
    margin-top: 10%;
}

.profile-work a {
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 14px;
}

.profile-work ul {
    list-style: none;
}

.profile-tab label {
    font-weight: 600;
}

.profile-tab p {
    font-weight: 600;
}

.psp-tabs {}
</style>
<div class="container emp-profile">
    <br>
    <h3 class="text-center">PSP Detail</h3><br>
    <form method="post">
        <div class="row">
            <div class="col-md-3">
                <div class="profile-img">
                    <?php $vName= substr( $merchant->store_name,0,1) ."".substr( $merchant->last_name,0,1)?>
                    <img src="https://dummyimage.com/200x200/000/fff&text=<?=$vName?>" alt="" />
                    <!--<div class="file btn btn-lg btn-primary">
                        Change Photo
                        <input type="file" name="file" />
                    </div>-->
                </div>
                <div class="text-center">
                    <a style="width:70%;" href="<?php BASE_URL; ?>/superadmin/merchants/edit/<?= $merchant->id; ?>"
                        class="btn" name="btnAddMore" /> Edit Profile</a>
                </div>
                <div class="row">
                    <div class="profile-work col-md-9 mx-auto pt-md-4">
                        <div>
                            <h5>SKILLS</h5>
                            <a href=""><?=$merchant->service_profession;?></a><br>
                            <!--<a href="">Web Developer</a><br>
                    <a href="">WordPress</a><br>
                    <a href="">WooCommerce</a><br>
                    <a href="">PHP, .Net</a><br>-->

                            <!--<h5 class="pt-md-3">WORK LINK</h5>
                    <a href="">Website</a><br>
                    <a href="">Facebook</a><br>
                    <a href="">Twitter</a><br>
                    <a href="">Phone</a><br>-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="profile-head row m-0">
                    <div class="col-md-8">
                        <h5>
                            <?= $merchant->name_prefix . ' ' . $merchant->store_name . ' ' . $merchant->last_name; ?>
                        </h5>
                        <h6>
                            <?= $merchant->service_profession; ?>
                        </h6>
                    </div>
                    <div class="col-md-4">
                        <?php if ($merchant->status == 1) : ?>
                        <p class="proile-rating">STATUS : <span class="badge badge-success"
                                style="float: inherit;color: #fff;">Active</span></p>
                        <?php else : ?>
                        <p class="proile-rating">STATUS : <span class="badge badge-danger"
                                style="float: inherit;color: #fff;">In Active</span></p>
                        <?php endif; ?>
                    </div>


                    <ul class="nav nav-tabs col-md-12" id="myTab" role="tablist">
                        <li class="nav-item psp-tabs">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                aria-controls="home" aria-selected="true">About</a>
                        </li>
                        <li class="nav-item psp-tabs">
                            <a class="nav-link" id="kyc-tab" data-toggle="tab" href="#kyc" role="tab"
                                aria-controls="kyc" aria-selected="false">KYC Details</a>
                        </li>
                        <li class="nav-item psp-tabs">
                            <a class="nav-link" id="service-tab" data-toggle="tab" href="#service" role="tab"
                                aria-controls="service" aria-selected="false">Services</a>
                        </li>
                        <li class="nav-item psp-tabs">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                aria-controls="profile" aria-selected="false">Order Details</a>
                        </li>
                    </ul>
                    <?php //dd($merchant->merchant_kycs[0]->govt_Id);?>
                    <div class="col-md-12">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>User Name</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?= $merchant->username; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Phone</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?= $merchant->phone_1; ?></p>
                                    </div>
                                </div>
                                <!--<div class="row">
                                    <div class="col-md-6">
                                        <label>Profession</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?= $merchant->service_profession; ?></p>
                                    </div>
                                </div>-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Account Number</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?= $merchant->bank_accounts[0]['account_number']; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Account Holder Name</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?= $merchant->bank_accounts[0]['account_holder']; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Account Type</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?= $merchant->bank_accounts[0]['account_type']; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Bank Name</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?= $merchant->bank_accounts[0]['bank_name']; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Bank Branch</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?= $merchant->bank_accounts[0]['bank_branch']; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>IFSC Code</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?= $merchant->bank_accounts[0]['ifsc_code']; ?></p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label>MICR Code</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?= $merchant->bank_accounts[0]['micr_code']; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="kyc" role="tabpanel" aria-labelledby="kyc-tab">
                                <div class="row">
                                    <table class="responsive-table bordered data-table" id="kyc-tbl-PSP">
                                        <tr>
                                            <th scope="row"><?= __('Identity Verification Proof') ?></th>
                                            <td><!--<?= h($merchant->merchant_kycs[0]->govt_Id) ?>-->
                                                <?php if($merchant->merchant_kycs[0]->govt_Id!="") {?>
                                                    <a href="https://easifyy.com/img/kyc-documents/<?=$merchant->merchant_kycs[0]->merchant_id?>/<?=$merchant->merchant_kycs[0]->govt_Id?>" download><i class="fa fa-download"></i> <?= h($merchant->merchant_kycs[0]->govt_Id) ?></a>
                                                <?php }?>
                                            </td>
                                            <td>
                                                <?php if($merchant->merchant_kycs[0]->govt_Id!="") {?>
                                                <iframe
                                                    src="/img/kyc-documents/<?=$merchant->merchant_kycs[0]->merchant_id?>/<?=$merchant->merchant_kycs[0]->govt_Id?>"></iframe>
                                                <?php }?>
                                            <td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><?= __(' Address Verification Proof') ?></th>
                                            <td>
                                                <?php if($merchant->merchant_kycs[0]->address_Id!="") {?>
                                                    <a href="https://easifyy.com/img/kyc-documents/<?=$merchant->merchant_kycs[0]->merchant_id?>/<?=$merchant->merchant_kycs[0]->address_Id?>" download><i class="fa fa-download"></i> <?= h($merchant->merchant_kycs[0]->address_Id) ?></a>
                                                <?php }?>
                                            </td>
                                            <td>
                                                <?php if($merchant->merchant_kycs[0]->address_Id!="") {?>
                                                <iframe
                                                    src="/img/kyc-documents/<?=$merchant->merchant_kycs[0]->merchant_id?>/<?=$merchant->merchant_kycs[0]->address_Id?>"></iframe>
                                                <?php }?>
                                            <td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><?= __('Education Qualification Verification Proof') ?></th>
                                            <td>
                                                <?php if($merchant->merchant_kycs[0]->qualification_Id!="") {?>
                                                    <a href="https://easifyy.com/img/kyc-documents/<?=$merchant->merchant_kycs[0]->merchant_id?>/<?=$merchant->merchant_kycs[0]->qualification_Id?>" download><i class="fa fa-download"></i> <?= h($merchant->merchant_kycs[0]->qualification_Id) ?></a>
                                                <?php }?>
                                            </td>
                                            <td>
                                                <?php if($merchant->merchant_kycs[0]->qualification_Id!="") {?>
                                                <iframe
                                                    src="/img/kyc-documents/<?=$merchant->merchant_kycs[0]->merchant_id?>/<?=$merchant->merchant_kycs[0]->qualification_Id?>"></iframe>
                                                <?php }?>
                                            <td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><?= __('GST Certificate') ?></th>
                                            <td>
                                                <?php if($merchant->merchant_kycs[0]->gst_declarartion!="") {?>
                                                    <a href="https://easifyy.com/img/kyc-documents/<?=$merchant->merchant_kycs[0]->merchant_id?>/<?=$merchant->merchant_kycs[0]->gst_declarartion?>" download><i class="fa fa-download"></i> <?= h($merchant->merchant_kycs[0]->gst_declarartion) ?></a>
                                                <?php }?>
                                            </td>
                                            <td>
                                                <?php if($merchant->merchant_kycs[0]->gst_declarartion!="") {?>
                                                <iframe
                                                    src="/img/kyc-documents/<?=$merchant->merchant_kycs[0]->merchant_id?>/<?=$merchant->merchant_kycs[0]->gst_declarartion?>"></iframe>
                                                <?php }?>
                                            <td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><?= __(' Bank Cancel Cheque ') ?></th>
                                            <td>
                                                <?php if($merchant->merchant_kycs[0]->bank_cheque!="") {?>
                                                    <a href="https://easifyy.com/img/kyc-documents/<?=$merchant->merchant_kycs[0]->merchant_id?>/<?=$merchant->merchant_kycs[0]->bank_cheque?>" download><i class="fa fa-download"></i> <?= h($merchant->merchant_kycs[0]->bank_cheque) ?></a>
                                                <?php }?>
                                            </td>
                                            <td>
                                                <?php if($merchant->merchant_kycs[0]->bank_cheque!="") {?>
                                                <iframe
                                                    src="/img/kyc-documents/<?=$merchant->merchant_kycs[0]->merchant_id?>/<?=$merchant->merchant_kycs[0]->bank_cheque?>"></iframe>
                                                <?php }?>
                                            <td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><?= __(' PSP Signature ') ?></th>
                                            <td>
                                                <?php if($merchant->merchant_kycs[0]->signature!="") {?>
                                                    <a href="https://easifyy.com/img/kyc-documents/<?=$merchant->merchant_kycs[0]->merchant_id?>/<?=$merchant->merchant_kycs[0]->signature?>" download><i class="fa fa-download"></i> <?= h($merchant->merchant_kycs[0]->signature) ?></a>
                                                <?php }?>
                                            </td>
                                            <td>
                                                <?php if($merchant->merchant_kycs[0]->signature!="") {?>
                                                <iframe
                                                    src="/img/kyc-documents/<?=$merchant->merchant_kycs[0]->merchant_id?>/<?=$merchant->merchant_kycs[0]->signature?>"></iframe>
                                                <?php }?>
                                            <td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="service" role="tabpanel" aria-labelledby="service-tab">
                                <div class="row">
                                    <table class="responsive-table bordered data-table" id="products-tbl-PSP">
                                        <tr class="row-bg">
                                            <th scope="col">Title</th>
                                            <th scope="col">Standard Plan Price</th>
                                            <th scope="col">Pro Plan Price</th>
                                            <th scope="col">Premium Plan Price</th>
                                            <th scope="col">Service Status</th>
                                            <th scope="col" width="14%" class="actions"><?= __('Actions') ?></th>
                                        </tr>
                                        <?php $i=1; foreach ($services as $service) : ?>
                                        <?php //print_r($services);
                                                    if($service->status==3){
                                                        $myStatus='Draft';
                                                    }elseif($service->status==2){
                                                        $myStatus='Pending';
                                                    }elseif($service->status==1){
                                                        $myStatus='Publish';
                                                    }elseif($service->status==4){
                                                        $myStatus='Approved';
                                                    }
                                                ?>
                                        <tr>
                                            <td><?= h($service->title) ?></td>
                                            <td>Rs. <?= $this->Number->format($service->_basic_plan_price) ?></td>
                                            <td>Rs. <?= $this->Number->format($service->_standard_plan_price) ?></td>
                                            <td>Rs. <?= $this->Number->format($service->_premium_plan_price) ?></td>
                                            <td><?=$myStatus?></td>
                                            <td class="actions">
                                                <a title="Edit"
                                                    href="<?= $this->Url->build(['controller'=>'Products','action' => 'edit', base64_encode($service->id) ] ) ?>"
                                                    class="btn">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                <a title="Delete"
                                                    href="<?= $this->Url->build(['controller'=>'Products','action' => 'delete', $service->id] ) ?>"
                                                    class="btn" onclick="return confirm('Are you sure?')">
                                                    <i class="material-icons">delete</i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php $i++; endforeach; ?>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <?php //echo "<pre>";print_r($merchant->orders);echo "</pre>"; ?>
                                <?php $inProgress=0;$completed=0; ?>
                                <?php foreach ($merchant->orders as $order) : ?>
                                <?php // echo "<hr>"; print_r($order);
                                            if($order->order_status_id==2){
                                                $inProgress=$inProgress+1;
                                            }elseif($order->order_status_id==3){
                                                $completed=$completed+1;
                                            }
                                        ?>

                                <?php endforeach; ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Order</label>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="<?= BASE_URL; ?>superadmin/orders?search=<?= $merchant->store_name; ?>">
                                            <p><?php echo count($merchant->orders); ?></p>
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Success</label>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="<?= BASE_URL; ?>superadmin/orders?search=<?= $merchant->store_name; ?>&status=completed">
                                            <p><?=$completed?></p>
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>In Progress</label>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="<?= BASE_URL; ?>superadmin/orders?search=<?= $merchant->store_name; ?>&status=progress">
                                            <p><?=$inProgress?></p>
                                        </a>
                                    </div>
                                </div>
                                <!--<div class="row">
                                    <div class="col-md-6">
                                        <label>On Hold</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>0</p>
                                    </div>
                                </div>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>