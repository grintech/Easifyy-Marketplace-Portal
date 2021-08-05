<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
   //customer id
    $user_id=base64_decode($_GET['user']);
    $order_id=base64_decode($_GET['order']);
   // vendor id $merchant_id;
   ?>
<style>
   #alerts {
      display:none;
   }
   #alertd {
      display:none;
   }
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
    height: 65px;
    border-radius: 4px;
    position: relative;
    margin-bottom: 0 !important;
    top: 15px;
    left: 0;
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
   .attache-file label {
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
   border-bottom: solid 0px #ccc;
   margin-bottom: 20px;
   padding-bottom: 10px;
   }
   h4.stp {
   font-size: 24px;
   }
   .breadcrumbs-trail li {
  float: left;
  padding-left: 10px;
  font-size: 15px;
}
.swal-button-container{
   display:none;
}
.stp {
   display: none;
}
</style>
<div class="card card-tabs">
   <div class="card-content">
      <div class="row pb-1">
         <div class="col-md-6">
            <?php
            $this->Breadcrumbs->add(
                  'Home',
            );
            $this->Breadcrumbs->add([
                  ['title' => 'Dashboard', 'url' => ['controller' => 'users', 'action' => 'dashboard']],
                  ['title' => 'In Progress Order', 'url' => ['controller' => 'orders', 'action' => 'inProgress']],
                  ['title' => 'Order', 'url' => ['controller' => 'orders', 'action' => 'view', $_GET['order']]]
            ]);
            $this->Breadcrumbs->add(
                  'Summery',
            );
            echo $this->Breadcrumbs->render(
                  ['class' => 'breadcrumbs-trail'],
                  ['separator' => '<i class="fa fa-angle-right"></i>']
            );
            ?>
         </div>
         <div class="col-md-6 row">

            <div class="col-6 ">
               <a href="https://easifyy.com/admin/orders/payment?user=<?= base64_encode($user_id); ?>&order=<?= base64_encode($order_id); ?>" class="btn btn col-12 p-0" id="completeStatus" data-value="<?php echo $order->id; ?>">
                  REQUEST PAYMENT TO EASIFYY
               </a>
            </div>
            <?php
               $btnText="Complete Order"; 
               if($orderCompleted == true){
                  $btnText="View Order Documents"; 
               }
            ?>
               <?php if($dueAmount!=0){?>
                  <div class="col-6">
                     <a class="btn btn col-12 p-0" id="beforeCompleteStatus" data-value="<?php echo  $order->id; ?>">
                        <?=$btnText?>
                     </a>
                  </div>
               <?php }else{?>
                  <div class="col-6">
                     <a class="btn btn col-12 p-0" id="beforeCompleteStatus1" data-value="<?= $order->id; ?>" href="https://easifyy.com/admin/orders/review?user=<?= base64_encode($user_id); ?>&order=<?= base64_encode($order_id); ?>">
                        <?=$btnText?>
                     </a>
                  </div>
               <?php }?>
            <!--<div class="col-6">
               <a href="https://easifyy.com/admin/orders/review?user=<?= base64_encode($user_id); ?>&order=<?= base64_encode($order_id); ?>" class="btn btn col-12 p-0" id="completeStatus" data-value="<?php echo $order->id; ?>">
                  Complete Order 
               </a>
            </div>-->
         </div>
      </div>
   </div>
</div>  
<div class="col-lg-12">
<div class="card">
   <div class="row">
      <div class="input-field col s12">
         <!-- <div class="alert alert-success"  id="alerts">
            <strong>Success!</strong> Thanks For Creating the Request Note to User.
         </div>
         <div class="alert alert-danger" id="alertd">
            <strong>Failure!</strong> Due to Network issue there is some Problem.Please try again.
         </div> -->
      </div>
   </div>
   <h5 class="center text-voilet-dark m-0 font-weight-bold">Create Status For On Going Job
   </h5>
   <div class="card-content m-services">
      <form class="col s12">
         <div class="field_wrapper">
            <div>
               <input type="hidden" value="<?= $merchant_id; ?>">
               <input type="hidden" value="<?= $_GET['user']; ?>" id="_user_id">
               <input type="hidden" value="<?= $_GET['order']; ?>" id="_order_id">
               <input type="hidden" value="" id="_doc_name">
               <input type="hidden" value="<?= $token; ?>" name="_csrfToken" id="_csrfToken">
               <?php
                  $status='empty';
                  foreach ($order_notes as $order_note) {
                     $status='notempty'; 
                  }
                  
                  ?>
               <?php 
                    $i=1; 
                     if($status=='notempty'):
                        foreach ($order_notes as $order_note) : 
                        $data=unserialize($order_note->message); //echo $i; ?>
                        <div class="field_wrappers">
                           <!--<div class="row main-row">
                             <div class="col-md-12">
                                <h6 class="stp">Step <?= $i; ?></h6>
                                <input type="hidden" name="notecount" id="notecount-<?= $i; ?>" class="notecount">
                             </div>
                           </div>-->
                           <div class="row align-item-flex-end">
                              <!--<div class="input-field col s4">
                                <label for="first_name">Current Status</label>
                                <input id="status" name="status" type="text" class=""
                                   value="<?= $data['status']; ?>" disabled>
                              </div>
                              <div class="col s4 card-t-area input-field">
                                <textarea id="comment" name="comment" placeholder="Comment" cols="30" rows="10"
                                   disabled><?= $data['comment']; ?></textarea>
                              </div>
                              <div class="col s4 attache-file input-field">
                                 <label><i class="fa fa-paperclip" aria-hidden="true"></i></label>
                                 <?php if($data['doc_name']!=""){?>
                                    <a class="px-2 mx-2" href="https://easifyy.com/order_docs/<?=$data['doc_name']?>" download>
                                       <i class="fa fa-download" aria-hidden="true"></i> <?php echo explode("_",$data['doc_name'])[1];?>
                                    </a>
                                 <?php }?>
                              </div>-->
                              <div class="col-md-12 msg-box">
                                 <div class="col-md-6">
                                    <div class="card w-75 p-3">
                                       <p class="card-header py-1 px-2">PSP reply: Step <?= $i; ?></p>
                                       <p class="px-2"><?php echo $data['comment'];?></p>
                                       <!--<iframe src="https://easifyy.com/order_docs/<?= $data['doc_name']; ?>" frameborder="0"></iframe>-->
                                       <?php if($data['doc_name']!=""){?>
                                             <a class="p-2 mx-2" href="https://easifyy.com/order_docs/<?=$data['doc_name']?>" download>
                                                <i class="fa fa-download" aria-hidden="true"></i> <?php echo explode("_",$data['doc_name'])[1];?>
                                             </a>
                                       <?php }?>
                                       <!--<p>PSP: <?php echo $order_note->merchant->store_name;?></p>-->
                                    </div>
                                 </div>
                              </div>
                              <?php if($i==1): ?>
                                 <?php if($orderCompleted == false){?>
                                    <div class="col 4 card-t-area input-field">
                                       <div class="float-icons fixed-action-btn">
                                          <a href="javascript:void(0);" class="add_button btn px-2" title="Add Status field">
                                             <i class="material-icons">add</i> Add Status
                                          </a>
                                          <a href="javascript:void(0);" class="remove_button btn px-2" title="Remove Status">
                                             <i class="material-icons">close</i> Remove Status
                                          </a>
                                       </div>
                                    </div>
                                 <?php }?>
                              <?php endif; ?>
                           </div>
                           
                           <div class="row">
                              <?php if($order_note->payment_reply!=""){?>
                                 <!--<div class="col-md-8 row">
                                       <h6 class="col-md-12">User Reply</h6>
                                       <textarea class="col-md-6" name="comment" placeholder="Comment" cols="5" rows="5"><?=$order_note->payment_reply?></textarea>
                                       <?php if($orders->link!=""){?>
                                          <a class="px-2 mx-2" href="https://easifyy.com/order_docs/<?=$orders->link?>" download>
                                             <i class="fa fa-download" aria-hidden="true"></i> <?php echo explode("_",$orders->link)[1];?>
                                          </a>
                                       <?php }?>
                                 </div>-->
                                 <div class="col-md-12 msg-box">
                                    <div class="col-md-6 float-right">
                                       <div class="card w-75 float-right p-3">
                                          <p class="card-header py-1 px-2">User Reply : Step <?= $i; ?></p>
                                          <?php if($order_note->payment_reply!=""){?>
                                                <p><?php echo $order_note->payment_reply?></p>
                                                <?php if($order_note->link!=""){?>
                                                   <a class="p-2 mx-2" href="https://easifyy.com/order_docs/<?=$order_note->link?>" download>
                                                      <i class="fa fa-download" aria-hidden="true"></i> <?php echo explode("_",$order_note->link)[1];?>
                                                   </a>
                                                <?php }?>
                                                <!--<p> User's Reply <?php echo $order_note->user->first_name;?></p>-->
                                          <?php }else{?>
                                                <p>waiting for user reply </p>
                                          <?php }?>
                                       </div>
                                    </div>
                                 </div>
                              <?php }else{?>
                                 <div class="col-md-12 msg-box">
                                    <div class="col-md-6 float-right">
                                       <div class="card w-75 float-right p-3">
                                          <p class="card-header py-1 px-2">User Reply : Step <?= $i; ?></p>
                                          <p>waiting for User reply </p>
                                       </div>
                                    </div>
                                 </div>
                              <?php }?>
                           </div>
                    <?php $i++; 
                        endforeach; ?> 
                    <input type="hidden" value="<?= $i-1; ?>" class="field-count">
                    <input type="hidden" value="<?= $i-1; ?>" class="total-count">
                <?php else: ?>
                  <div class="field_wrappers">
                     <div class="row main-row">
                        <div class="col-md-12">
                           <h4 class="stp">STEP 1</h4>
                           <input type="hidden" name="notecount" id="notecount-1" class="notecount">
                        </div>
                     </div>
                     <div class="row align-item-flex-end">
                        <div class="input-field col s4">
                           <label for="first_name">Current Status</label>
                           <input id="status" name="status" type="text" class="" value="STEP 1" readonly>
                        </div>
                        <div class="col s4 card-t-area input-field mb-0">
                           <textarea id="comment" name="comment" placeholder="Write your requirements to Customer " cols="30"
                              rows="10"></textarea>
                        </div>
                        <div class="col s4 attache-file input-field">
                           <label><i class="fa fa-paperclip" aria-hidden="true"></i></label>
                           <input type="file" name="notesFile" class="notesFile uploadNotesDoc">
                        </div>
                        <div class="col 4 card-t-area input-field">
                           <a class="btn btn-view-profile save-notes">Submit</a>
                              <div class="float-icons fixed-action-btn">
                                    <a href="javascript:void(0);" class="add_button btn px-2" title="Add field">
                                       <i class="material-icons">add</i> Add Status
                                    </a>
                                    <a href="javascript:void(0);" class="remove_button btn px-2" title="Remove">
                                       <i class="material-icons">close</i> Remove Status
                                    </a>
                              </div>
                           <input type="hidden" value="1" class="field-count">
                           <input type="hidden" value="1" class="total-count">
                        </div>
                     </div>
                  </div>
                  <?php endif; ?>
               </div>
            </div>
      </form>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
      <script>
         $(function() {
             // Multiple images preview in browser
             var imagesPreview = function(input, placeToInsertImagePreview) {
                 if (input.files) {
                     var filesAmount = input.files.length;
                     for (i = 0; i < filesAmount; i++) {
                         var reader = new FileReader();
                         reader.onload = function(event) {
                             $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(
                                 placeToInsertImagePreview);
                         }
                         reader.readAsDataURL(input.files[i]);
                     }
                 }
             };
         
             $('#gallery-photo-add').on('change', function() {
                 imagesPreview(this, 'div.mlti-upld-gallery');
             });
         });
         $("#beforeCompleteStatus").on('click',function(){
            const el = document.createElement('div')
            el.innerHTML = "Ask for pending amount from user to clear , Rs. <?=$dueAmount?> <a href='https://easifyy.com/admin/orders/sendReminderMail?orderId=<?php echo $order_id; ?>'>click here to notify</a> him to clear dues to the easifyy!<br>"
            el.innerHTML =el.innerHTML +  '<a href="https://easifyy.com/admin/orders/in-progress?orderId=<?php echo $order_id; ?>" target="_blank" class="btn btn col-12 p-0 my-2 checkPayment hide" id="completeStatus" data-value="<?php echo $order->id; ?>">Check Payment </a> <br> Thanks from Easiffy';
            el.innerHTML =el.innerHTML +  '<a href="https://easifyy.com/admin/orders/review?user=<?= base64_encode($user_id); ?>&order=<?= base64_encode($order_id); ?>" class="btn btn col-12 p-0 my-2 orderCompleteBtn hide" id="completeStatus" data-value="<?php echo $order->id; ?>">Complete Order </a>';
            swal({
               showConfirmButton:false,
               title: "Important Note !",
               content: el,
            })

         });

      </script>
      <div class="clearBoth"></div>
      </div>
   </div>
</div>

