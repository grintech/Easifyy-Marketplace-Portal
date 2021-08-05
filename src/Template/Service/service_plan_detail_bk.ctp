<style type="text/css">
#home p{
  font-size: 14px;
  line-height: 1.4;
}
#home h3, #info h3 ,#faq h3{
  padding-top: 1.5rem;
   padding-bottom: 1.5rem;
    
}
#faq b ,#faq p{
  font-size: 14px;
  line-height: 1.4;
}
#faq .faq_answer{
  color: #666;
}

.description p{
  color: #98a4aa;
    text-rendering: optimizeLegibility;
    font-size: 14px;
  line-height: 1.4;
}
.heading{
  font-size: 24px;
}

@media(min-width: 768px){
  .main-cont{
    padding: 0 50px;
  }
  .view-details .btn-save{
  float: right;
  margin-top: 0px;
}


}

@media(max-width: 767px){
  .query{
    display: none;
  }
  .main-cont{
    padding: 0 10px;
  }

}

@media(min-width: 768px) and (max-width: 1200px){
  .query .btn,.query h5, .query label{
  font-size: 12px;
}
}

.nav-tabs {
  /*box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 3px 1px -2px rgba(0,0,0,0.12), 0 1px 5px 0 rgba(0,0,0,0.2);*/
  border-top: 1px solid #dee2e6;
}
.nav-tabs .nav-link{
  border: none;
  border-radius: 0;
  transition: color .2s ease-out;
}
.tabs-dark .nav-link {
  color: #000;
  padding: 15px;
}
.tabs-light .nav-link {
  color: rgba(0,0,0,.5);
}
.tabs-dark .nav-link:not(.active):hover {
  color: #aeb0b3;
}
.tabs-light .nav-link:not(.active):hover {
  color: #495057;
}

.nav-pills .nav-link{
  border-radius: 2px;
  color: #495057;
  transition: color .2s ease-out, box-shadow .2s;
}


.nav-pills.pills-dark .nav-link.active {
  background-color: #343a40!important;
  box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 3px 1px -2px rgba(0,0,0,0.12), 0 1px 5px 0 rgba(0,0,0,0.2);
}
.nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
  background-color: #d3baf1;
  padding: 15px;
}
.nav-pills.pills-dark .nav-link:not(.active):hover {
  color: #1d1e22;
}
.tabs-marker .nav-link {
  position: relative;
}
.tabs-marker .nav-link.active .marker {
  height: 30px;
  width: 30px;
  left: 50%;
  bottom: -30px;
  transform: translatex(-50%);
  position: absolute;
  overflow: hidden;
}
.tabs-marker .nav-link.active .marker:after {
  content: "";
  height: 15px;
  width: 15px;
  top: -8px;
  left: 50%;
  transform: rotate(45deg) translatex(-50%);
  transform-origin: left;
  background-color: #fff;
  box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 3px 1px -2px rgba(0,0,0,0.12), 0 1px 5px 0 rgba(0,0,0,0.2);
  position: absolute;
}
.list-display li {
    margin-bottom:.4rem;
    font-size:1.1rem;
  }
  .list-display{
    padding-left:1.5rem;
  }
  .services{
   padding-top:2rem; 
   padding-bottom: 2rem;
  }
   .list-numbers
   {
    padding-top: 1rem;
    padding-left: 1rem;
   }
    .list-numbers li{
      font-size: 14px;
          border-bottom: 1px solid #ededed;
          padding: 15px 5px;
    }
  .list-checkmarks {
    padding-left:1.5rem;
    padding-top: 0.3rem;
    padding-right: 1.5rem;
  }
  .list-checkmarks li,.list-display li {
    list-style-type:none;
    font-size: 14px;
    margin-bottom:.4rem;
  }
  .list-checkmarks li:before {
   font-family: 'FontAwesome';
    content: "\f00c";
    margin: 0 10px 0 -28px;
    color: #fff;
    border: 1px solid #17aa1c;
    border-radius: 50%;
    padding: 2px;
    font-size: 10px;
    background: #17aa1c;
  } 
  .list-display li:before {
     font-family: 'FontAwesome';
    content: "\f00c";
    margin: 0 10px 0 -28px;
    color: #fff;
    border: 1px solid #17aa1c;
    border-radius: 50%;
    padding: 2px;
    font-size: 10px;
    background: #17aa1c;
  }
  .faq-list {
    padding-left: 1rem;
    font-size: 14px;
  }
  .buy_list{
    list-style: none;
    padding-left: 1.6rem;
  }
  .buy_list li{
    font-size: 14px;
  }
  .buy_list li::before {
    content: "\2022";
    color: #8e43e7;
    font-weight: bold;
    display: inline-block; 
    width: 1em;
    margin-left: -1em;
    font-size:32px;
    margin-top:-5px;
    vertical-align:middle
  }
  .faq_que li .faq_question:before {
    background-image: url(https://d494qy7qcliw5.cloudfront.net/s/images/faq_question_2.png);
    margin: 0;
    padding: 0;
    left: 15px;
    width: 20px;
    height: 20px;
    content: " ";
    position: absolute;
    background-size: 100%;
    background-repeat: no-repeat;
  }
  .faq_que{
    list-style: none;
    padding-left: 2rem;
  }
  .faq_que li .faq_answer:before{
    background-image: url(https://d494qy7qcliw5.cloudfront.net/s/images/faq_answer.png);
    margin: 0;
    padding: 0;
    left: 15px;
    width: 20px;
    height: 20px;
    content: " ";
    position: absolute;
    background-size: 100%;
    background-repeat: no-repeat;
  }
  .faq_answer{
    list-style: none;
  }
  .faq_question{
    font-weight: 600;
    color: #000;
    padding-bottom: 15px;
  }

</style>
<div class="main-w3pvt main-cont">
  <div class="ty-mainbox-container clearfix" style="box-shadow: none;">
    <div class="row service">
      <div class="col-md-7">
        <span class="heading">
          Private Limited Company ( PLC ) Registration
        </span>
        <div class="description">
          <p>Get your private limited company registered in the fastest possible manner.</p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-7">
       <div style="margin-top: 50px">
        <ul class="nav nav-tabs tabs-dark " id="myTab" role="tablist">
          <li class="nav-item">
           <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About this Plan</a>
          </li>
          <li class="nav-item">
           <a class="nav-link" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">Infomation Guide</a>
          </li>
            <li class="nav-item">
           <a class="nav-link" id="faq-tab" data-toggle="tab" href="#faq" role="tab" aria-controls="faq" aria-selected="false">FAQs</a>
          </li>
        </ul>
      </div>
        <div class="tab-content">
          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <h3>About This Plan</h3>
            <p>Get your private limited company incorporated at the lowest price with compliance to regulatory requirements of Ministry of Corporate Affairs
            </p>
            <div class="row services">
              <div class="col-md-3">
                <b>Services Covered</b>
              </div>
              <div class="col-md-9">
                <ul class="list-checkmarks">
                <li>Name approval in RUN (Reserve your unique Name)</li>
                <li>DSC (2 nos)</li>
                <li>Filing of SPICe form</li>
                <li>Issue of Incorporation Certificate along with PAN and TAN</li>
                <li>Includes Govt Fees & Stamp duty for Authorized Capital upto Rs. 1 Lakh except for the states of Punjab, Madhya Pradesh and Kerala</li>
                <li>Excludes foreign national / Body Corporate as director or business needing RBI/SEBI approval</li>
                <li>App to manage your business Khata On the Go - <a href="#">Clear App</a></li>
                <li>Exclusive offers from our Partner</li>
                <ul class="list-display">
                  <li>ICICI Bank-<a href="#">Account Opening Offer</a></li>
                    <li>Freshworks-<a href="#">Offers</a></li>
                </ul>
              </ul>
            </div>
             </div>
             <div class="row services">
            <div class="col-md-3">
                <b>Who Should Buy</b>
              </div>
              <div class="col-md-9">
                <ul class="buy_list">
                <li>Businesses looking to expand or scale operations</li>
                <li>Startups looking to raise capital and issue ESOPs</li>
                <li>Businesses looking to convert their existing firm structure into private limited company</li>
              </ul>
            </div>
          </div>
          </div>
          <div class="tab-pane" id="info" role="tabpanel" aria-labelledby="info-tab">
            <h3>Information Guide</h3>
            <b>Documents To Be Submitted</b>
            <div class="col-md-6">
            <ol class="list-numbers">
              <li>Passport size photos of directors</li>
              <li>Address proof of directors</li>
              <li>Photo ID proof of directors</li>
              <li>Specimen signature</li>
              <li>Self declaration about your directorship in other companies</li>
              <li>Rent agreement of your registered office</li>
              <li>No objection certificate from the owner of the property of the property</li>
              <li>Aadhaar card</li>
              <li>PAN card</li>
            </ol>
          </div>
          </div>
          <div class="tab-pane" id="faq" role="tabpanel" aria-labelledby="contact-tab">
            <h3>FAQs</h3>
            <ul class="faq_que">
              <li>
            <p class="faq_question">What is SPICe- process of company incorporation?</p>
            
            <p class="faq_answer">Simplified Proforma for Incorporating Company electronically (SPICe) is a fast track registration procedure initiated by Ministry of Corporate Affairs which enables a single form application process of company registration.<br>
           The normal registration route can take up to thirty days but if SPICe is followed the whole process can be closed within 7 days.
            <br>
           ClearTax aims at rendering premium services and delivering it in a speedy manner. The incorporation services shall be delivered following the SPICe route.</p>
            <br>
          </li>
          <li>
            <p class="faq_question">How can I become eligible to get benefits under the Startup India Initiative?</p>
            <p class="faq_answer">Only the below stated entities qualify as a “Startup” for the purpose of Government schemes
            </p><br>
            <ul class="faq-list"style="color: #666;">
              <li>Private Limited Company</li>
              <li>Registered Partnership Firm</li>
              <li>Limited Liability Partnership Further conditions are:</li>
              <li>Not more than 5 years have passed from the date of its incorporation/ registration</li>
              <li>Turnover for any of the financial years has not exceeded INR 25 crore</li>
              <li>It is working towards innovation, development, deployment or commercialization of new products, processes or services driven by technology or intellectual property</li>
            </ul>
            <br>
          </li>
          <li>
            <p class="faq_question">I want to start a business in app development. What other registrations will apply to me?</p>
            <p class="faq_answer">Apart from getting your GST registration, you must also consider protecting your brand by registering the trademark for your brand. Also, if you are building any proprietary software or any other intellectual property, you must secure a copyright. Our experts can assist you with trademark and copyright registration</p><br>
            <p class="faq_question">I need to raise capital from external sources. I am considering approaching Investors. Do i get any advantage on getting registered as a private limited company over other forms?</p>
            <ul class="faq-list"style="color: #666;">
              <li>The capital structure of a private limited company can easily accommodate equity funding. So Venture Capitalists prefer pvt. Ltd. over any other structure</li>
              <li>Being a regulations compliant entity, it becomes easy to attract capital infusion from financial institutions like banks, NBFCs etc.</li>
            </ul>
            <br>
          </li>
          <li>
           <p class="faq_question">Do I need to be physically present during this process?</p>
           <p class="faq_answer">No, your physical presence is not required during the process.</p>
           <br>
         </li>
         <li>
          <p class="faq_question">Is stamp duty payable during incorporation process?</p>
          <p class="faq_answer">Yes, Stamp duty charges are imposed by the state in which the registered office is proposed to be located. The charges are on MOA, AOA & form INC 32. These charges are covered under the plan for all the states except Punjab & Madhya Pradesh. Our experts will guide you on additional charges if any for Punjab & Madhya Pradesh.</p>
          <br>
        </li>
        <li>
          <p class="faq_question">How much time is needed to set up a private limited company?</p>
          <p class="faq_answer">The registration process gets completed when you get a certificate of incorporation(COI) issued by the registrar. The application can processed within 7 working days.</p>
           <br>
         </li>
         <li>
          <p class="faq_question">I already have my digital signature certificate and DIN. Will the package value remain the same?</p>
          <p class="faq_answer">In Expert'se, you already have a DSC and DIN, our experts will offer you some concession accordingly on the above package.</p>
          <br>
        </li>
        <li>
          <p class="faq_question">What is the government fee applicable for a Plc incorporation?</p>
          <p class="faq_answer">Below are the charges applicable for DIN and other government forms:</p>
          <br>
          <ul class="faq-list"style="color: #666;">
              <li>DIN (2 Nos): Rs.1000</li>
              <li>RUN Form: Rs.1000</li>
              <li>AoA: Rs.1000 (up to Rs.10 lakh of authorized capital)</li>
              <li>MoA: Rs.1000</li>
            </ul>
            <br>
          </li>
          <li>
            <p class="faq_question">What is the stamp duty payable for company incorporation?</p>
            <p class="faq_answer">Below is the stamp duty payable, depends on the state you incorporate and your authorized share capital up to Rs. 10 Lakh: These are the charges in Karnataka:</p>
            <br>
             <ul class="faq-list" style="color: #666;">
              <li>AoA: Rs.1000</li>
              <li>Moa: Rs.1000</li>
              <li>Form 32: Rs.20</li>
            </ul>
            <p style="color: #666;">Apart from this, notary charges of Rs.340 will apply for two director affidavits and related stamp duty.</p>
          </li>
        </ul>
          </div>
           
  </div>
     
      </div>      
      <div class="col-md-5 card-body">
        
            <?php //print_r($service) ?>    
            <ul class="nav nav-pills mb-3 mt-3 col-12" id="pills-tab" role="tablist"  style="background-color: #eee;padding-right:0;text-align: center;">
                <li class="nav-item col-4" style="padding-left: 0;padding-right: 0;">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Basic</a>
                </li>
                <li class="nav-item col-4"  style="padding-left: 0;padding-right: 0;">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Standard</a>
                </li>
                <li class="nav-item col-4"  style="padding-left: 0;padding-right: 0;">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Premium</a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active px-2" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <p class="d-inline-text d-flex pr-5">
                        <span class='flex-grow-1 '>Income Tax Filing  - Salaried Income</span>
                        <span class='flex-grow-1' style="width: 30%; text-align: right;">Rs. <?php echo h($service[0]->_basic_price)?></span>
                    </p>
                    <span>
                        <ul class='px-4 py-2 income_points'>
                            <li><?php echo h($service[0]->_basic_price_desc )?></li>
                        </ul>
                    </span>
                    <p class="text-timer time_style"><i class="fa fa-clock-o"></i> <?php echo h($service[0]->_basic_plan_time)?> Days Delivery time</p>
                    <p class="d-flex pr-5"><span class='flex-grow-1'>Total</span><span class='flex-grow-1' style="width: 30%; text-align: right;">Rs. <?php echo h($service[0]->_basic_price)?></span></p>
                    <p class="d-flex pr-5">
                        <span  class='flex-grow-1'>First Instalment</span>
                        <span class='flex-grow-1' style="width: 30%; text-align: right;">Rs. <?php echo h($service[0]->_basic_price)?></span>
                    </p>
                    <p class="d-flex pr-5" style="border-bottom: 1px solid #e8eef3; border-top: 1px solid #e8eef3;padding: 5px 0;"><span class='flex-grow-1'>Increase Qty:-</span><span class='flex-grow-1' style="width: 30%; text-align: right;"> <button type="button" class="sub" class="sub">-</button>
                        <input type="text" id="qty" value="1" style="" />
                        <button type="button" class="add" class="add">+</button></span>
                    </p>
                    <button <?php echo $myUrlBas?> class="btn btn-pay-installment btn-track-pay" <?php echo $mymodal ?> ><span>Make Payment Rs. </span><span class="service-price" price="<?php echo h($service[0]->_basic_price)?>"><?php echo h($service[0]->_basic_price)?></span></button>
                    <p class="para text-center" style="margin: 0px;"><b>Or</b></p>
                    <button class="btn btn-share-expert-chat chat_box" style="color: #000;">Chat &amp; Discuss before booking</button>
                    <p class="para" style="color: rgb(63, 79, 224);">* Get instant Cashback Rewards up to 100%</p>
                    <p class="para" style="color: rgb(63, 79, 224);">* 100% Refunds on Non Delivery</p>
                </div>
                <?php if($service[0]->_standard_price!=''){?>
                    <div class="tab-pane fade px-2" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <p class="d-flex pr-5"><span class='flex-grow-1'>Income Tax Filing  - Salaried Income</span><span class='flex-grow-1' style="width: 30%; text-align: right;">Rs. <?php echo h($service[0]->_standard_price  )?></span></p>
                        <span>
                            <ul class='px-4 py-2 income_points'>
                                <li><?php echo h($service[0]->_standard_price_desc)?></li>
                            </ul>
                        </span>
                        <p class="text-timer"> <i class="fa fa-clock-o"></i> <?php echo h($service[0]->_standard_plan_time)?> Days Delivery time</p>
                        <p class="d-flex pr-5"><span class='flex-grow-1'>Total</span><span style="width: 30%; text-align: right;">Rs. <?php echo h($service[0]->_standard_price)?></span></p>
                        <p class="d-flex pr-5"><span class='flex-grow-1'>First Instalment Rs. <?php echo h($service[0]->_standard_price)?></span></p>
                        <div class="product-increase d-flex flex-grow-1 row">
                            <div  class="col-md-8">
                                <span class="q-increase  flex-grow-1">Increase Qty:-</span>
                            </div>
                            <div class="input-group col-md-4">
                                <div id="field1">
                                    <button type="button" class="sub" class="sub">-</button>
                                    <input type="text" id="1" value="1" style="width:30px; text-align: center;" />
                                    <button type="button" class="add" class="add">+</button>
                                </div>
                            </div>
                        </div>
                        <button <?php echo $myUrlStd?> class="btn btn-pay-installment btn-track-pay" <?php echo $mymodal ?> ><span>Make Payment Rs. </span><span class="service-price" price="<?php echo h($service[0]->_standard_price)?>"><?php echo h($service[0]->_standard_price)?></span></button>
                        <p class="para text-center" style="margin: 0px;"><b>Or</b></p>
                        <button class="btn btn-share-expert-chat">Chat &amp; Discuss before booking</button>
                        <p class="para" style="color: rgb(63, 79, 224);">* Get instant Cashback Rewards up to 100%</p>
                        <p class="para" style="color: rgb(63, 79, 224);">* 100% Refunds on Non Delivery</p>
                    </div>
                <?php }?>

                <?php if($service[0]->_premium_price!=''){?>
                    <div class="tab-pane fade px-2" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <p class="d-flex pr-5"><span class='flex-grow-1'> Income Tax Filing  - Salaried Income</span><span class='flex-grow-1' style="width: 30%; text-align: right;">Rs. <?php echo h($service[0]->_premium_price)?></span></p>
                        <span>
                            <ul class='px-4 py-2 income_points'>
                                <li><?php echo h($service[0]->_premium_price_desc)?></li>
                            </ul>
                        </span>
                        <p class="text-timer"><i class="fa fa-clock-o"></i> <?php echo h($service[0]->_premium_plan_time )?> Days Delivery time</p>
                        <p class="d-flex pr-5"><span class='flex-grow-1'>Total</span><span style="width: 30%; text-align: right;">Rs. <?php echo h($service[0]->_premium_price)?></span></p>
                        <p class="d-flex pr-5"><span class='flex-grow-1'>First Instalment Rs. </span><span class="price"> <?php echo h($service[0]->_premium_price)?></span></p>
                        <div class="product-increase d-flex flex-grow-1 row">
                            <div class="col-md-8">
                                <span class="q-increase flex-grow-1">Increase Qty:-</span>
                            </div>
                            <div class="input-group col-md-4">
                                <div id="field1">
                                    <button type="button" class="sub" class="sub">-</button>
                                    <input type="text" id="0" value="1" style="width:30px; text-align: center;" />
                                    <button type="button" class="add" class="add">+</button>
                                </div>
                            </div>
                        </div>
                        <button <?php echo $myUrlPre?> class="btn btn-pay-installment btn-track-pay" <?php echo $mymodal ?> ><span>Make Payment Rs. </span><span class="service-price" price="<?php echo h($service[0]->_premium_price)?>"><?php echo h($service[0]->_premium_price)?></span></button>
                        <p class="para text-center" style="margin: 0px;"><b>Or</b></p>
                        <button class="btn btn-share-expert-chat">Chat &amp; Discuss before booking</button>
                        <p class="para" style="color: rgb(63, 79, 224);">* Get instant Cashback Rewards up to 100%</p>
                        <p class="para" style="color: rgb(63, 79, 224);">* 100% Refunds on Non Delivery</p>
                    </div>
                <?php } ?>
           
        </div>
      </div>
    </div>
  </div>
</div>

