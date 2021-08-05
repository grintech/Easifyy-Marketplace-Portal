<?php
   //customer id
    $user_id=base64_decode($_GET['user']);
   // vendor id $merchant_id;
   ?>
<style>
.input-field.col label {
    left: 1.2em;
    top: -10px;
}

input:not([type]),
input[type=text]:not(.browser-default) {
    font-size: 1rem;
    -webkit-box-sizing: content-box;
    -moz-box-sizing: content-box;
    box-sizing: content-box;
    width: 100%;
    height: 2.5rem;
    margin: 0px 0 10px 0;
    padding: 0;
    -webkit-transition: border .3s, -webkit-box-shadow .3s;
    -moz-transition: box-shadow .3s, border .3s;
    -o-transition: box-shadow .3s, border .3s;
    transition: border .3s, -webkit-box-shadow .3s;
    transition: box-shadow .3s, border .3s;
    transition: box-shadow .3s, border .3s, -webkit-box-shadow .3s;
    border: none;
    border-bottom: 1px solid #9e9e9e;
    border-radius: 0;
    outline: none;
    background-color: transparent;
    -webkit-box-shadow: none;
    box-shadow: none;
}

.input-field.col.s4 .s-l-mr {
    margin-top: 6%;
}

.card-t-area textarea {
    padding-top: 7px;
    border: 1px solid;
    height: 35px;
}

.summery-amount input {
    width: 46% !important;
}

.summery-prefix input {
    width: 72% !important;
}

.attache-file {
    display: flex;
    height: 62px;
}

.attache-file label{
left: 7px !important;
}

.ser-paymnt-stus p {
   text-align: center;
    border: solid 1px #ccc;
    padding: 7px 5px;
    background-color: #FDF8FF;
    width: 89px;
    margin: 8px !important;
}

.ser-paymnt-stus {
    margin-left: 25px;
    margin-left: 25px;
    display: flex;
    align-items: center;
}

.ser-paymnt-stus h5 {
    margin: 0;
    font-size: 16px;
    font-weight: 600;
}

.field_wrappers {
    border-bottom: solid 1px #ccc;
    margin-bottom: 40px;
    padding-bottom: 10px;
}

h4.stp {
    font-size: 24px;
}
</style>

<div class="col-lg-12">
    <div class="card">
        <div class="row">
            <div class="input-field col s12">
                <div class="alert alert-success" style="display: none;">
                    <strong>Success!</strong> Indicates a successful or positive action.
                </div>
                <div class="alert alert-danger" style="display: none;">
                    <strong>Danger!</strong> Indicates a dangerous or potentially negative action.
                </div>
            </div>
        </div>
        <h5 class="center text-voilet-dark m-0 font-weight-bold">Select Service Category &amp; Create Unique Service you
            can provide to clients</h5>
        <div class="card-content m-services">
            <form class="col s12">
                <div class="field_wrapper">
                    <div>
                        <input type="hidden" value="<?= $merchant_id; ?>">
                        <input type="hidden" value="<?= $_GET['user']; ?>" id="_user_id">
                        <input type="hidden" value="<?= $_GET['order']; ?>" id="_order_id">
                        <input type="hidden" value="<?= $token; ?>" name="_csrfToken" id="_csrfToken">

                        <?php
                        $status='empty';
                        foreach ($order_notes as $order_note) {
                           $status='notempty'; 
                        }
                        
                    ?>
                        <?php if($status=='notempty'):?>

                        <?php $i=1; foreach ($order_notes as $order_note) : ?>

                        <?php $data=unserialize($order_note->message); ?>

                        <div class="field_wrappers">
                            <div class="row main-row">
                                <div class="col-md-12">
                                    <h4 class="stp">Note <?= $i; ?></h4>
                                    <input type="hidden" name="notecount" id="notecount-<?= $i; ?>" class="notecount">
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s4">
                                    <label for="first_name">Current Status</label>
                                    <input id="status" name="status" type="text" class=""
                                        value="<?= $data['status']; ?>" disabled>
                                </div>
                                <div class="col s4 card-t-area input-field">
                                    <textarea id="comment" name="comment" placeholder="Comment"
                                        cols="30" rows="10" disabled><?= $data['comment']; ?></textarea>
                                </div>
                                <div class="col s4 attache-file input-field">
                                        <label><i class="fa fa-paperclip" aria-hidden="true"></i></label>
                                        <input type="file" name="file">
                                    </div>
                                <div class="col 4 card-t-area input-field">
                                    <a class="btn btn-view-profile save-notes"
                                        style="pointer-events: none;cursor: default;">Submit</a>
                                    <?php if($i==1) { ?>
                                    <a href="javascript:void(0);" class="add_button" title="Add field">
                                        <span class="pl-md-4"><i class="plu fa fa-plus"></i></span>
                                    </a>
                                    <?php } ?>
                                    <!-- <input type="hidden" value="1" class="field-count"> -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col-md-12 mt-md-0">
                                    <?php if(isset($data['prefix'])) { ?>
                                    <input type="checkbox" class="form-check-input"
                                        id="indeterminate-checkbox-<?= $i; ?>" data-note="<?= $i; ?>"
                                        style="width: auto !important;" checked="checked">
                                    <?php } else { ?>
                                    <input type="checkbox" class="form-check-input"
                                        id="indeterminate-checkbox-<?= $i; ?>" data-note="<?= $i; ?>"
                                        style="width: auto !important;">

                                    <?php } ?>
                                    <label class="form-check-label" for="exampleCheck1" style="left:2%">Request for
                                        payment</label>
                                    <br><br>
                                </div>
                                <?php if(isset($data['prefix'])) :?>
                                <div class="request-payment-<?= $i; ?>" style="width: 100%;">
                                    <?php else: ?>
                                    <div class="request-payment-<?= $i; ?>" style="display: none;width: 100%;">
                                        <?php endif; ?>


                                        <div class="input-field col s3 summery-prefix">
                                            <input id="prefix" type="text" class="" value="<?= $data['prefix']; ?>">
                                            <label for="first_name">Prefix</label>
                                        </div>
                                        <div class="input-field col s3 summery-amount">
                                            <input id="amount" type="text" class="validate"
                                                value="<?= $data['amount']; ?>">
                                            <label for="website">Amount</label>
                                        </div>
                                        <div class="input-field col s5 d-flex">
                                            <div>
                                                <a class="btn btn-view-profile btn-request-payment"
                                                    data-id="<?= $order_note->id; ?>">Send</a>
                                            </div>
                                            <div class="ser-paymnt-stus">
                                                <h5>Payment Status</h5>
                                                <?php if($i==1) { ?>
                                                   <p>Approved</p>
                                                   <?php } else { ?>
                                                      <p>Pending</p> 
                                                   <?php } ?>       
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php $i++; endforeach; ?> <input type="hidden" value="<?= $i-1; ?>" class="field-count">

                            <?php else: ?>

                            <div class="field_wrappers">
                                <div class="row main-row">
                                    <div class="col-md-12">
                                        <h4 class="stp">Note 1</h4>
                                        <input type="hidden" name="notecount" id="notecount-1" class="notecount">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s4">
                                        <label for="first_name">Current Status</label>
                                        <input id="status" name="status" type="text" class="">
                                    </div>
                                    <div class="col s4 card-t-area input-field">
                                        <textarea id="comment" name="comment" placeholder="Comment"
                                            cols="30" rows="10"></textarea>
                                    </div>              
                                    <div class="col s4 attache-file input-field">
                                        <label><i class="fa fa-paperclip" aria-hidden="true"></i></label>
                                        <input type="file" name="file">
                                    </div>
                                    <div class="col 4 card-t-area input-field">
                                        <a class="btn btn-view-profile save-notes">Submit</a>
                                        <a href="javascript:void(0);" class="add_button" title="Add field">
                                            <span class="pl-md-4"><i class="plu fa fa-plus"></i></span>
                                        </a>
                                        <input type="hidden" value="1" class="field-count">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col-md-12 mt-md-0">
                                        <input type="checkbox" class="form-check-input" id="indeterminate-checkbox-1"
                                            data-note="1" style="width: auto !important;">
                                        <label class="form-check-label" for="exampleCheck1" style="left:2%">Request for
                                            payment</label>
                                        <br><br>
                                    </div>
                                    <div class="request-payment-1" style="display: none;width: 100%;">
                                        <div class="input-field col s3 summery-prefix">
                                            <input id="prefix" type="text" class="">
                                            <label for="first_name">Prefix</label>
                                        </div>
                                        <div class="input-field col s3 summery-amount">
                                            <input id="amount" type="text" class="validate">
                                            <label for="website">Amount</label>
                                        </div>
                                        <div class="input-field col s5 d-flex">
                                            <div>
                                                <a class="btn btn-view-profile btn-request-payment">Send</a>
                                            </div>
                                            <div class="ser-paymnt-stus">
                                                <h5>Payment Status</h5>
                                                <p>Pending</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>


                        </div>
                    </div>
            </form>
            <div class="clearBoth"></div>
        </div>
    </div>
</div>