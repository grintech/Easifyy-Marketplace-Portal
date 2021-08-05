<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MerchantKyc $merchantKyc
 */
?>

<style>
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
</style>

<div class="merchantKycs view large-9 medium-8 columns content">
    <h3><?= h($merchantKyc->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Merchant') ?></th>
            <td><?= $merchantKyc->has('merchant') ? $this->Html->link($merchantKyc->merchant->id, ['controller' => 'Merchants', 'action' => 'view', $merchantKyc->merchant->id]) : '' ?></td>
            <td>Documents</td>
        </tr>
        <tr>
            <th scope="row"><?= __('Govt Id') ?></th>
            <td><?= h($merchantKyc->govt_Id) ?></td>
            <td>
                <?php if($merchantKyc->govt_Id!="") {?>
                    <?php echo $this->Html->image("kyc-documents/$merchantKyc->govt_Id", ['id' => "myImg",'alt' => 'Govt. Id.', 'width'=>"200",'class'=>'nav-logo govt_Id doc-modal']);?>
                <?php }?>
            <td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address Id') ?></th>
            <td><?= h($merchantKyc->address_Id) ?></td>
            <td>
                <?php if($merchantKyc->address_Id!="") {?>
                    <?php echo $this->Html->image("kyc-documents/$merchantKyc->address_Id", ['alt' => 'Address Id', 'width'=>"200",'class'=>'nav-logo address_id doc-modal']);?>
                <?php }?>
            </td>
        </tr>
        <tr>
            <th scope="row"><?= __('Qualification Id') ?></th>
            <td><?= h($merchantKyc->qualification_Id) ?></td>
            <td>
                <?php if($merchantKyc->qualification_Id!="") {?>
                    <?php echo $this->Html->image("kyc-documents/$merchantKyc->qualification_Id", ['alt' => 'Qualification Document', 'width'=>"200",'class'=>'nav-logo qualification_Id doc-modal']);?>
                <?php }?>
            </td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gst Declarartion') ?></th>
            <td><?= h($merchantKyc->gst_declarartion) ?></td>
            <td>
                <?php if($merchantKyc->gst_declarartion!="") {?>
                    <?php echo $this->Html->image("kyc-documents/$merchantKyc->gst_declarartion", ['alt' => 'Gst Declarartion', 'width'=>"200",'class'=>'nav-logo gst_declarartion doc-modal']);?>
                <?php }?>
            </td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($merchantKyc->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $merchantKyc->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
<div id="myModal" class="modal">
    <span class="close">&times;</span>
    <img class="modal-content" id="img01">
    <div id="caption"></div>
</div>


<script>
// Get the modal
/*var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
//var img = document.getElementsByClassName("doc-modal");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}*/
</script>
