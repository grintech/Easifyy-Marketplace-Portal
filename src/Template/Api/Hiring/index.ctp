<div class="container main-w3pvt main-cont" >
  <div class="row py-4">
    <div class="col-md-8">
    <?= $this->Form->create(NULL, array('url'=>'/hiring/add')) ?>
          <div class="form-row">
            <div class="form-group col-md-6">
              <?php echo $this->Form->text('first_name',['class' => 'form-control', 'placeholder' => "First Name" ]);?>
            </div>
            <div class="form-group col-md-6">
              <?php echo $this->Form->text('last_name',['class' => 'form-control', 'placeholder' => "Last Name" ]);?>

            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <?php echo $this->Form->text('phoneNo',['class' => 'form-control', 'placeholder' => "Mobile No." ]);?>
            </div>
            <div class="form-group col-md-6">
                <!--<select id="state" name="state" class="form-control">
                  <option value="-1" id="court_state_text" class="hidden">Select City</option><option value="4508" id="Agartala">Agartala</option><option value="4536" id="Agra">Agra</option><option value="783" id="Ahmedabad">Ahmedabad</option><option value="3295" id="Ajmer">Ajmer</option><option value="2482" id="Akola">Akola</option><option value="4545" id="Aligarh">Aligarh</option><option value="4546" id="Allahabad">Allahabad</option><option value="2494" id="Amravati">Amravati</option><option value="3134" id="Amritsar">Amritsar</option>
                </select>-->
                <?php $options= array('Agra'=>'Agra','Ahmedabad'=>'Ahmedabad','Agartala'=>'Agartala')?>
                <?= $this->Form->control('role',[ 'options'=>$options, 'class' => 'form-control','label'=>false]); ?>
            </div>
          </div>

          <div class="form-group ">
            <?php echo $this->Form->email('username',['class' => 'form-control', 'placeholder' => "Email",'id' =>"email" ]);?>
          </div>
          <div class="form-group">
            <?php echo $this->Form->password('password',['class' => 'form-control', 'placeholder' => "Password",'id' =>"password" ]);?>
          </div>

          <div class="form-group">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="remember_me">
              <label class="form-check-label" for="remember_me">
                Remember Email and Password
              </label>
            </div>
          </div>
          <!--<button type="submit" class="btn btn-primary">Send a Request</button>-->
          <?= $this->Form->button(__('Submit'), [ "class" => "btn btn-primary mb-1" ]) ?>

          <?= $this->Form->end() ?>
    </div>
    <div class="col-md-4">
      <div class="col-sm-12 col-sm-offset-1">
        <div class="selected-professional-card" style="position: relative;box-shadow: 0 2px 10px rgba(0,0,0,.1);transition: box-shadow .3s ease 0s;min-height: 260px;padding: 15px 25px">
          <h6 class="xs-heading text-center" style="margin-top: 0px;">Order Summary</h6>
          <hr>
          <h4 class="side-card-heading">Professional Service</h4>
          <p class="para">Pvt. Ltd. Company Registration Plan : Basic </p>
          <p class="text-bold">Quantity <span class="pull-right" style="color: rgb(44, 22, 220);">1</span></p>
          <h6 class="text-bold">Amount
            <span class="pull-right" style="color: rgb(44, 22, 220);">Rs. 5900</span>
          </h6>
          <p class="text-note text-right text-danger">* Inclusive of all Taxes &amp; Fees.</p>
        </div>
      </div>
    </div>
  </div>
</div>