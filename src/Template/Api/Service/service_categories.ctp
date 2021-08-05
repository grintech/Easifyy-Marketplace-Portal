<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product[]|\Cake\Collection\CollectionInterface $products
 */
?>

<div class="container main-w3pvt main-cont" >
  <div class="row pt-sm-4 d-flex flex-wrap">  
    <?php $count=1; foreach ($services as $service): ?>
      <div class="w-16 about-in text-center">
          <div class="card h-100">
            <div class="card-body">
              <i class="fa fa-gavel mb-4" aria-hidden="true"></i>
              <h5 class="card-title mb-3">
                <?php  echo $this->Html->link(
                    $service->name,
                    '/services/'.urlencode($service->slug),
                    ['class' => '']
                );?>
              </h5>
            </div>
            <div class="description"><?=h($service->description)?></div>
          </div>
      </div>
    <?php $count++; endforeach; ?>
  </div>

  <div id="Info_guide ">
    <div class="panel panel-default my-3">
      <div class="panel-body">
        <h2 class="heading-sm mb-2">Information Guide</h2>
        <div class="panel-group accordion" id="accordionExample">
          <div class="panel panel-default">
            <div class="panel-heading collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              <h4 class="panel-title text-left">Documents required for Private Limited Company Registration<i class="fa fa-angle-down pull-right"></i></h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
              <div class="panel-body text-left">
                <ul>
                  <li>ID Proof in form of Scanned copy of PAN Card and Aadhar Card (Self attested) of Directors</li>
                  <li>Scanned copy of Voter’s ID/Passport/Driver’s License (Self attested) of Directors</li>
                  <li>Address proof of Directors: Scanned copy of Latest Bank Statement/Telephone or Mobile Bill/Electricity or Gas Bill, not older than 2 months (Self attested)</li>
                  <li>Scanned passport-sized photograph of Directors</li>
                  <li>Specimen signature (blank document with signature [directors only]</li>
                  <li>Address proof of place of Business - Rent agreement with NOC from the owner if rented property or Sale Deed if self owned with latest utility bill copy.</li>
                </ul>
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              <h4 class="panel-title text-left">Registration Process of a Private Limited Company <i class="fa fa-angle-down pull-right"></i></h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
              <div class="panel-body text-left">
                <p class="text-bold">RUN Name Approval</p>
                <ul>
                  <li>Name approval is obtained for the proposed company names from Ministry of Corporate Affairs.</li>
                  <li>Two names can be provided.</li>
                  <li>If both the names get rejected, there is an opportunity given for the resubmission of the form with two more new names.</li>
                  <li>The name should be acceptable by the MCA.</li>
                </ul>
                <p class="text-bold">Digital Signature</p>
                <ul>
                  <li>A digital signature must be acquired for all the proposed Directors of the Company.</li>
                  <li>Digital signature is needed to sign the incorporation application and forms.</li>
                  <li>Whereas, the digital signature isn't needed for obtaining name approval.</li>
                  <li>Therefore, this process of obtaining Digital signature can run side by side to the name approval process.</li>
                </ul>
                <p class="text-bold">Incorporation Application Submission</p>
                <p class="para">On obtaining the Digital Signature, the incorporation application can be submitted in SPICe Form with the MCA. In case of non-availability of name, the incorporation documents must be resubmitted. Hence, it's advisable to obtain RUN name approval before submission of SPICe Form.</p>
                <p class="para"><b>Timeline:</b> 12 -15 days.</p>
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading collapsed" type="button" data-toggle="collapse" data-target="#collapsethree" aria-expanded="false" aria-controls="collapsethree">
              <h4 class="panel-title text-left">Advantages of a Private Limited Company<i class="fa fa-angle-down pull-right"></i></h4>
            </div>
            <div id="collapsethree" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
              <div class="panel-body text-left">
                <p class="para">You'd be contented to learn that a Private Limited Company has prodigious advantages, being the most famous form of business entity in India as mentioned earlier. Let's take a peek at some distinguished ones: </p>
                <p class="para"><b>Transfer of Shares is Easy -</b> which which means that the shares of the company, if any, can be transferred to anybody by the shareholder.</p>
                <p class="para"><b>There's Separate Legal Entity -</b> Which Which means that the directors and the members are a part of the company but none of their personal assets are at risk. The company can take a loan on its name and no members or directors are liable in case the company can't pay off the capital.</p>
                <p class="para"><b>The Borrowing Capacity is Higher -</b> the liability of the members is very limited since the company is a separate entity. There is a high borrowing capacity, which means that the company can issue debentures and take help from the venture capital and financial sectors and also accept deposits from outsiders and boost its capital.</p>
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading collapsed" type="button" data-toggle="collapse" data-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
              <h4 class="panel-title text-left">What is DIN?<i class="fa fa-angle-down pull-right"></i></h4>
            </div>
            <div id="collapsefour" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
              <div class="panel-body text-left">
                <p class="para">DIN, Director Identification Number, is a unique 8 digit number required by any person proposed to be a Director in the Company.</p>
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading collapsed" type="button" data-toggle="collapse" data-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive">
              <h4 class="panel-title text-left">What is DSC?<i class="fa fa-angle-down pull-right"></i></h4>
            </div>
            <div id="collapsefive" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
              <div class="panel-body text-left">
                <p class="para">DSC, Digital Signature Certificate is the electronic format of physical or paper certificate such as a passport, driving License etc. A DSC is similar to a handwritten signature which builds up the identity of the sender filing the documents through the web. The sender can't repudiate or deny.</p>
                <p class="para">A DSC isn't just a digital equivalent of a handwritten signature it adds additional information electronically to any document or a message where it is utilized to make it more genuine, secure and more anchored.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

