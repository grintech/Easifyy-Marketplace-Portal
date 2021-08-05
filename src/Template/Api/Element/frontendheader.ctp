<style type="text/css">
    .dropdown-submenu {
    position: relative;
    }
    body.modal-open {
    height:100%;
    overflow:hidden;
    }
    .modal-open .modal {
    overflow-x: hidden;
    overflow-y: hidden !important;
    }
    .dropdown-menu{
    box-shadow: 0 2px 10px rgba(0,0,0,.1);
    }
    .dropdown-submenu>.dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: -6px;
    }
    .dropdown-menu a, .dropdown-menu ul li a {
    text-decoration: none;
    font-size: 14px;
    color: #5f6368!important;
    }
    .cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
    }
    /* Center the image and position the close button */
    .imgcontainer {
    text-align: center;
    position: relative;
    }
    img.avatar {
    width: 40%;
    border-radius: 50%;
    }
    span.psw {
    float: right;
    padding-top: 16px;
    }
    /* The Modal (background) */
    .modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1050; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
    }
    /* Modal Content/Box */
    .modal-content {
    background-color: #fefefe;
    border:unset;
    padding: 10px;
    }
    /* The Close Button (x) */
    .close {
    position: absolute;
    right: 0;
    top: -27px;
    color: #000;
    font-size: 35px;
    font-weight: bold;
    }
    .close:hover,
    .close:focus {
    color:  #8E43E7;
    cursor: pointer;
    }
    /* Add Zoom Animation */
    .animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
    }
    @-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
    }
    @keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
    }
    /* Change styles for span and cancel button on extra small screens */
    @media screen and (max-width: 300px) {
    span.psw {
    display: block;
    float: none;
    }
    .cancelbtn {
    width: 100%;
    }
    }
    .btn-login{
    font-family: 'Poppins', sans-serif;
    background: #8E43E7;
    color: #fff;
    padding: 0 1rem;
    outline: none;
    box-shadow: 0;
    font-size: 14px;
    font-weight: normal;
    width:90px;
    }
    .btn-login:hover{
    background: #d3baf1;
    color: #000;
    }
    .imgcontainer h2 {
    color: #9D369B;
    text-shadow:  0 0 5px #9E389C;
    font-weight: bold;
    margin-top: 0;
    }
    .imgcontainer p{
    color: #8E43E7;
    margin-bottom: 30px;
    }
    .dropdown-efilling{
    margin-left: 258px !important;
    }
    @media(min-width:1520px){
    .dropdown-efilling{
    margin-left: 346px !important;
    }
    }
    .signup_account{
    margin-bottom: 10px;
    text-align: center;
    }
    .btn-default{
    border: 1px solid lightgray;
    border-radius: 0;
    padding: 10px 40px;
    }
    .btn-default:hover{
    background: #AA72ED;
    color: #fff;
    }
    /* .navbar-collapse{
    margin-right:-65px;
    }*/
</style>
<?php //$mbaseUrl="http://localhost/marketplace/";
    $mbaseUrl=BASE_URL;?>
<!--Modal: Login-->
<div class="modal fade top" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" data-backdrop="true">
    <div class="modal-dialog modal-frame modal-top modal-notify modal-success" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Body-->
            <div class="modal-body">
                <div class="row d-flex justify-content-center align-items-center">
                    <?= $this->Form->create(NULL, array('url'=>'/users/chklogin','class'=>'modal-content animate')) ?>
                    <div class="imgcontainer">
                        <span data-dismiss="modal" class="close" title="Close Modal">&times;</span>
                        <!--<img src="../assets/images/login.jpg" alt="Avatar" width="100">-->
                        <?php echo $this->Html->image('login.jpg', ['alt' => 'mindzpro', 'width'=>"100"]);?>
                    </div>
                    <div class="form-group"> 
                        <?php echo $this->Form->text('username',['class' => 'form-control', 'placeholder' => "E-mail" ]);?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->password('password',['class' => 'form-control', 'placeholder' => "Password",'id' =>"password" ]);?>
                    </div>
                    <button type="submit" class="form-control btn btn-sm btn-login ">Login</button>
                    <label>
                    <span class="psw">Forgot <a href="#">password?</a></span>
                    </form>
                </div>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!--Modal: SignUp-->
<div class="modal fade top" id="modalSignup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" data-backdrop="true">
    <div class="modal-dialog modal-frame modal-top modal-notify modal-success" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Body-->
            <div class="modal-body">
                <div class="row d-flex justify-content-center align-items-center">
                    <?= $this->Form->create(NULL, array('url'=>'/users/add','class'=>'modal-content animate')) ?>
                    <div class="imgcontainer">
                        <span data-dismiss= "modal" class="close" title="Close Modal">&times;</span>
                        <h2 class="text">Sign Up</h2>
                        <p>Please fill in this form to create an account!</p>
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                        </div>
                        <!--<input type="text" name="" class="form-control" placeholder="Username"/>-->
                        <?php echo $this->Form->text('first_name',['class' => 'form-control', 'placeholder' => "Name" ]);?>
                    </div>
                    <br />
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                        </div>
                        <?php echo $this->Form->text('username',['type' => 'email','class' => 'form-control', 'placeholder' => "E-mail" ]);?>
                    </div>
                    <br />
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-lock"></i></span>
                        </div>
                        <!--<input type="text" name="" class="form-control" placeholder="password"/>-->
                        <?php echo $this->Form->password('password',['class' => 'form-control', 'placeholder' => "Password" ]);?>
                    </div>
                    <br />
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-phone"></i></span>
                        </div>
                        <?php echo $this->Form->text('phone',['class' => 'form-control', 'placeholder' => "Phone Number" ]);?>
                    </div>
                    <br />
                    <div class="signup_account">
                        <a href="#" class="btn btn-default">Sign-Up as a User</a><a href="#" class="btn btn-default">Sign-Up as a Seller</a>
                    </div>
                    <button type="submit" class="form-control btn btn-sm btn-login ">Sign Up</button>
                    <!-- <span class="psw">Forgot <a href="#">password?</a></span> -->
                    </form>
                    <p>Click here to 
                        <a href="#" class="open_login" data-toggle="modal" data-target="#modalLogin" data-dismiss="modal"> Login</a>
                    </p>
                </div>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!--Section: Live preview-->
<div id="main-header">
<div class="top-bar d-none d-lg-block">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="w3social-icons">
                    <ul>
                        <li><a href="#" class="rounded-circle"><i class="fa fa-facebook-f"></i></a></li>
                        <li><a href="#" class="rounded-circle"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" class="rounded-circle"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#" class="rounded-circle"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="personal-info">
                    <p id="p-info"><i class="fa fa-envelope"></i> - info@expertmindz.com</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Top Bar -->
<!-- header -->
<header id="sticky-top">
    <div class="main-top">
    <nav id="top-nav" class="navbar navbar-expand-lg navbar-light fixed-navi1 serch">
        <div class="container-fluid">
            <!-- logo -->
            <h1>
                <a id="logo" class="navbar-brand" href="<?= BASE_URL ?>">
                    <?php echo $this->Html->image('logo.png', ['alt' => 'mindzpro']);?><!--<img src="../img/logo.png" alt="mindzpro">-->
                </a>
            </h1>
            <!-- //logo -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="inner">
                <form action="#" method="post" class="disply-flex">
                    <span class="search-icon"><i class="fa fa-search" aria-hidden="true"></i></span>
                    <input type="text" id="myInput" class="form-control" onkeyup="myFunction()" placeholder="Type something...">
                    <button type="submit" class="btn btn-lg btn-search">Search</button>
                </form>
                <div class="content-list" id="myUL">
                    <ul>
                        <li><a href="#">Adele</a></li>
                        <li><a href="#">Agnes</a></li>
                        <li><a href="#">Billy</a></li>
                        <li><a href="#">Bob</a></li>
                        <li><a href="#">Calvin</a></li>
                        <li><a href="#">Christina</a></li>
                        <li><a href="#">Cindy</a></li>
                    </ul>
                </div>
            </div>
            <!-- Search Box End -->
            <div class="collapse navbar-collapse text-center d-none d-lg-block">
                <ul class="navbar-nav m-nav ml-lg-auto">
                    <li class="ml-lg-0 mb-lg-0">
                        <a href="#" class="reqe-button">Business Packages</a>
                    </li>
                    <li class="ml-lg-0 mb-lg-0">
                        <a href="#" class="reqe-button">Make Money</a>
                    </li>
                    <li class="ml-lg-0 mb-lg-0">
                        <a href="#" class="reqe-button">Talk to Us</a>
                    </li>
                    <li class="ml-lg-0 mb-lg-0">
                        <div class="btn-group">
                            <a data-toggle="dropdown" class="test"><i class="fa fa-bars"></i></a>
                            <ul class="dropdown-menu dots-menu rounded">
                                <?php if ($this->Session->read('Auth.User')){
                                    echo '<li>';
                                    echo $this->Html->link(
                                        " Profile",
                                        ['controller' => 'Users', 'action' => 'profile'],['class'=>'fa fa-user']
                                    );
                                    echo '</li><li>';
                                    echo $this->Html->link(
                                        " Signout",
                                        ['controller' => 'Users', 'action' => 'signout'],['class'=>'fa fa-sign-out']
                                    );
                                    echo '</li>';
                                    }else{
                                    echo '<li><a href="#" class="abc" data-toggle="modal" data-target="#modalLogin" ><i class="fa fa-user" aria-hidden="true"></i> Login</a></li>
                                    ';
                                    }?>
                                <li><a href="<?php echo $this->Url->build([ 'controller' => 'Users', 'action' => 'signup']) ?>" ><i class="fa fa-sign-in" aria-hidden="true"></i> Sign Up</a></li>
                            </ul>
                    </li>
                </ul>
                </div>
            </div>
    </nav>
    </div>
    <!-- //navigation -->
    <!-- navigation -->
    <div class="container-fluid">
    <div class="main-top">
        <nav class="navbar navbar-expand-lg navbar-light fixed-navi bg-lightpurple">
            <div class="container-fluid">
            <!--  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar10">
                <span class="navbar-toggler-icon"></span>
                </button> -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav nav-fill w-100" id="main-nav">
                        <li class="nav-item d-block d-lg-none">
                            <a href="#" class="nav-link">Business Packages</a>
                        </li>
                        <li class="nav-item d-block d-lg-none">
                            <a href="#" class="nav-link">Make Money</a>
                        </li>
                        <li class="nav-item d-block d-lg-none">
                            <a href="#" class="nav-link">Talk T Us</a>
                        </li>

                        <?php
                            $mainCate =$this->Site->getAllCategories();
                                foreach( $mainCate as $key => $brand ){
        if ($brand->parent_id ==null){
            if(($brand->name=='E-Filling')){



echo '    <li class="dropdown simple-menu position-static" id="superMenu">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.trim($brand->name).'</a>
                            <ul class="dropdown-menu border-0 m-0 p-0" aria-labelledby="navbarDropdown">';
                             foreach( $brand->child_categories as $key1 => $subCate ){
                                            if($subCate->delete_status==1){
                                                echo '<li class="dropdown has-submenu">
                                <a class="dropdown-toggle" style="color:#000 !important;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.trim($subCate->name).'</a>
                               
                                
           
                                <ul class="submenu w-80 border-0 m-0 p-0" aria-labelledby="navbarDropdown">
                                    <div class="container-fluid pd-0">
                                   
                                        <div class="row menu-bg w-100">';
                                     foreach( $subCate->product_categories as $key1 => $products ){
                                                                    if($products->product->delete_status==1){
                                                                        echo '<div class="col-md-6">
                                <li><a  class="text-dark" tabindex="-1" href="'.$mbaseUrl.'/service-details/'.urlencode($products->product->slug).'">'.trim($products->product->menu_title).'</a></li></div>';

                                                                    }
                                                                }
                                                        echo '</div></div></ul></li>';
                                                    }
                                                } 
                                            echo '</ul></li>';
                                        }
else if(($brand->name=='Graphics & Video')){

                        echo   '<li class="nav-item dropdown position-static" id="superMenu">
                            <a class="nav-link " href="#" data-id="'.trim($brand->id).'" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.trim($brand->name).'</a>';
                                        echo '<div class="dropdown-menu w-100 border-0 m-0 p-0" aria-labelledby="navbarDropdown">
                                                    <div class="container-fluid pd-0">
                                                        <div class="row menu-bg w-100">';
                                                            foreach( $brand->child_categories as $key1 => $subCate ){
                                                                if($subCate->delete_status==1){
                                                                    echo '<div class="col-lg-2 col-md-2">
                                                                            <p class="">'.trim($subCate->name).'</p>
                                                                               <ul class="list-unstyled">
                                                                                                <div class="row">';


                                                                                            $i=0;
                                                                                            foreach( $subCate->product_categories as $key1 => $products ){
                                                                                                $sDiv='';$eDiv='';
                                                                                                if($i%2==0 || $i==0){
                                                                                                    $sDiv='<div class="col-md-12">';
                                                                                                    $eDiv='</div>';    
                                                                                                }
                                                                                                $i++;     
                                                                                                if($products->product->delete_status==1){
                                                                                                    if($i==1){
                                                                                                        echo $sDiv.'<li><a class="text-dark" href="'.$mbaseUrl.'/service-details/'.urlencode($products->product->slug).'">'.trim($products->product->menu_title).'</a></li>';
                                                                                                    }else{
                                                                                                        echo $eDiv.$sDiv.'<li><a class="text-dark" href="'.$mbaseUrl.'/service-details/'.urlencode($products->product->slug).'">'.trim($products->product->menu_title).'</a></li>';
                                                                                                    }
                                                                                                }

                                                                                            }
                                                                                echo '</div> </ul>
                                                                        </div>';
                                                                }
                                                            }
                                            echo '      </div>
                                                    </div>
                                                </div>' ;
                                    echo '</li>';
                                        }

                                                 else if(($brand->id == 5)){
                                            echo   '<li class="nav-item dropdown position-static" id="superMenu">
                            <a class="nav-link " href="#" id="navbarDropdown" data-id="'.trim($brand->id).'" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.trim($brand->name).'</a>';
                                        echo '<div class="dropdown-menu w-100 border-0 m-0 p-0" aria-labelledby="navbarDropdown">
                                                    <div class="container-fluid pd-0">
                                                        <div class="row menu-bg w-100">';
                                                            foreach( $brand->child_categories as $key1 => $subCate ){
                                                                if($subCate->delete_status==1){
                                                                    echo '<div class="col-lg-12 col-md-12">
                                                                            <p class="">'.trim($subCate->name).'</p>
                                                                                <ul class="list-unstyled">
                                                                                    <div class="row"> ';
                                                                                    foreach( $subCate->product_categories as $key1 => $products ){
                                                                                        if($products->product->delete_status==1){
                                                                                            echo '<div class="col-md-3"><li><a class="text-dark"   href="'.$mbaseUrl.'/service-details/'.urlencode($products->product->slug).'">'.trim($products->product->menu_title).'</a></li></div>';
                                                                                        }
                                                                                    }
                                                                    echo '   </div>   </ul>
                                                                        </div>';
                                                                }
                                                            }
                                            echo '      </div>
                                                    </div>
                                                </div>' ;
                                    echo '</li>';
                                        }
                                             else if(($brand->id == 7)){
                                            echo   '<li class="nav-item dropdown position-static" id="superMenu">
                            <a class="nav-link " href="#" data-id="'.trim($brand->id).'"  id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.trim($brand->name).'</a>';
                                        echo '<div class="dropdown-menu w-100 border-0 m-0 p-0" aria-labelledby="navbarDropdown">
                                                    <div class="container-fluid pd-0">
                                                        <div class="row menu-bg w-100">';
                                                            foreach( $brand->child_categories as $key1 => $subCate ){
                                                                if($subCate->delete_status==1){
                                                                    echo '<div class="col-lg-4 col-md-4">
                                                                            <p class="">'.trim($subCate->name).'</p>
                                                                                <ul class="list-unstyled">
                                                                                                <div class="row">';


                                                                                            $i=0;
                                                                                            foreach( $subCate->product_categories as $key1 => $products ){
                                                                                                $sDiv='';$eDiv='';
                                                                                                if($i%1==0 || $i==0){
                                                                                                    $sDiv='<div class="col-md-12">';
                                                                                                    $eDiv='</div>';    
                                                                                                }
                                                                                                $i++;     
                                                                                                if($products->product->delete_status==1){
                                                                                                    if($i==1){
                                                                                                        echo $sDiv.'<li><a class="text-dark"   href="'.$mbaseUrl.'/service-details/'.urlencode($products->product->slug).'">'.trim($products->product->menu_title).'</a></li>';
                                                                                                    }else{
                                                                                                        echo $eDiv.$sDiv.'<li><a class="text-dark"   href="'.$mbaseUrl.'/service-details/'.urlencode($products->product->slug).'">'.trim($products->product->menu_title).'</a></li>';
                                                                                                    }
                                                                                                }

                                                                                            }
                                                                                echo '</div> </ul>
                                                                        </div>';
                                                                }
                                                            }
                                            echo '      </div>
                                                    </div>
                                                </div>' ;
                                    echo '</li>';
                                        }
                                         else if(($brand->id == 9)){
                                            echo   '<li class="nav-item dropdown position-static" id="superMenu">
                            <a class="nav-link " href="#" id="navbarDropdown" role="button"data-id="'.trim($brand->id).'" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.trim($brand->name).'</a>';
                                        echo '<div class="dropdown-menu w-100 border-0 m-0 p-0" aria-labelledby="navbarDropdown">
                                                    <div class="container-fluid pd-0">
                                                        <div class="row menu-bg w-100">';
                                                            foreach( $brand->child_categories as $key1 => $subCate ){
                                                                if($subCate->delete_status==1){
                                                                    echo '<div class="col-lg-4 col-md-4">
                                                                            <p class="">'.trim($subCate->name).'</p>
                                                                                <ul class="list-unstyled">
                                                                                    <div class="row"> ';
                                                                                    foreach( $subCate->product_categories as $key1 => $products ){
                                                                                        if($products->product->delete_status==1){
                                                                                            echo '<div class="col-md-6"><li><a class="text-dark" href="'.$mbaseUrl.'/service-details/'.urlencode($products->product->slug).'">'.trim($products->product->menu_title).'</a></li></div>';
                                                                                        }
                                                                                    }
                                                                    echo '   </div>   </ul>
                                                                        </div>';
                                                                }
                                                            }
                                            echo '      </div>
                                                    </div>
                                                </div>' ;
                                    echo '</li>';
                                        }
                                              else if(($brand->id == 1)){
                                            echo   '<li class="nav-item dropdown position-static" id="superMenu">
                            <a class="nav-link " href="#" id="navbarDropdown" data-id="'.trim($brand->id).'" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.trim($brand->name).'</a>';
                                        echo '<div class="dropdown-menu w-100 border-0 m-0 p-0" aria-labelledby="navbarDropdown">
                                                    <div class="container-fluid pd-0">
                                                        <div class="row menu-bg w-100">';
                                                            foreach( $brand->child_categories as $key1 => $subCate ){
                                                                if($subCate->delete_status==1){
                                                                    echo '<div class="col-lg-3 col-md-3">
                                                                            <p class="">'.trim($subCate->name).'</p>
                                                                                <ul class="list-unstyled">
                                                                                                <div class="row">';


                                                                                            $i=0;
                                                                                            foreach( $subCate->product_categories as $key1 => $products ){
                                                                                                $sDiv='';$eDiv='';
                                                                                                if($i%6==0 || $i==0){
                                                                                                    $sDiv='<div class="col-md-12">';
                                                                                                    $eDiv='</div>';    
                                                                                                }
                                                                                                $i++;     
                                                                                                if($products->product->delete_status==1){
                                                                                                    if($i==1){
                                                                                                        echo $sDiv.'<li><a class="text-dark" href="'.$mbaseUrl.'/service-details/'.urlencode($products->product->slug).'">'.trim($products->product->menu_title).'</a></li>';
                                                                                                    }else{
                                                                                                        echo $eDiv.$sDiv.'<li><a class="text-dark" href="'.$mbaseUrl.'/service-details/'.urlencode($products->product->slug).'">'.trim($products->product->menu_title).'</a></li>';
                                                                                                    }
                                                                                                }

                                                                                            }
                                                                                echo '</div> </ul>
                                                                        </div>';
                                                                }
                                                            }
                                            echo '      </div>
                                                    </div>
                                                </div>' ;
                                    echo '</li>';
                                        }
                                     
                                         else if(($brand->id == 6)){
                                            echo   '<li class="nav-item dropdown position-static" id="superMenu">
                            <a class="nav-link " href="#" id="navbarDropdown" role="button" data-id="'.trim($brand->id).'" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.trim($brand->name).'</a>';
                                        echo '<div class="dropdown-menu w-100 border-0 m-0 p-0" aria-labelledby="navbarDropdown">
                                                    <div class="container-fluid pd-0">
                                                        <div class="row menu-bg w-100">';
                                                            foreach( $brand->child_categories as $key1 => $subCate ){
                                                                if($subCate->delete_status==1){
                                                                    echo '<div class="col-lg-6 col-md-6">
                                                                            <p class="">'.trim($subCate->name).'</p>
                                                                                <ul class="list-unstyled">
                                                                                                <div class="row">';


                                                                                            $i=0;
                                                                                            foreach( $subCate->product_categories as $key1 => $products ){
                                                                                                $sDiv='';$eDiv='';
                                                                                                if($i%5==0 || $i==0){
                                                                                                    $sDiv='<div class="col-md-6">';
                                                                                                    $eDiv='</div>';    
                                                                                                }
                                                                                                $i++;     
                                                                                                if($products->product->delete_status==1){
                                                                                                    if($i==1){
                                                                                                        echo $sDiv.'<li><a class="text-dark" href="'.$mbaseUrl.'/service-details/'.urlencode($products->product->slug).'">'.trim($products->product->menu_title).'</a></li>';
                                                                                                    }else{
                                                                                                        echo $eDiv.$sDiv.'<li><a class="text-dark" href="'.$mbaseUrl.'/service-details/'.urlencode($products->product->slug).'">'.trim($products->product->menu_title).'</a></li>';
                                                                                                    }
                                                                                                }

                                                                                            }
                                                                                echo '</div> </ul>
                                                                        </div>';
                                                                }
                                                            }
                                            echo '      </div>
                                                    </div>
                                                </div>' ;
                                    echo '</li>';
                                        }




                                            else if(($brand->name=='Business Support')){
                                            echo   '<li class="nav-item dropdown position-static" id="superMenu">
                            <a class="nav-link " href="#" id="navbarDropdown" role="button" data-id="'.trim($brand->id).'" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.trim($brand->name).'</a>';
                                        echo '<div class="dropdown-menu w-100 border-0 m-0 p-0" aria-labelledby="navbarDropdown">
                                                    <div class="container-fluid pd-0">
                                                        <div class="row menu-bg w-100">';
                                                            foreach( $brand->child_categories as $key1 => $subCate ){
                                                                if($subCate->delete_status==1){
                                                                    echo '<div class="col-lg-12 col-md-12">
                                                                            <p class="">'.trim($subCate->name).'</p>
                                                                                <ul class="list-unstyled">
                                                                                    <div class="row"> ';
                                                                                    foreach( $subCate->product_categories as $key1 => $products ){
                                                                                        if($products->product->delete_status==1){
                                                                                            echo '<div class="col-md-3"><li><a class="text-dark" href="'.$mbaseUrl.'/service-details/'.urlencode($products->product->slug).'">'.trim($products->product->menu_title).'</a></li></div>';
                                                                                        }
                                                                                    }
                                                                    echo '   </div>   </ul>
                                                                        </div>';
                                                                }
                                                            }
                                            echo '      </div>
                                                    </div>
                                                </div>' ;
                                    echo '</li>';
                                        }
                                           else if(($brand->id == 2)){
                echo   '<li class="nav-item dropdown position-static" id="superMenu">
                            <a class="nav-link " href="#" id="navbarDropdown" data-id="'.trim($brand->id).'" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.trim($brand->name).'</a>';
                                        echo '<div class="dropdown-menu w-100 border-0 m-0 p-0" aria-labelledby="navbarDropdown">
                                                    <div class="container-fluid pd-0">
                                                        <div class="row menu-bg w-100">';
                                                            foreach( $brand->child_categories as $key1 => $subCate ){
                                                                if($subCate->delete_status==1){


                                                                    echo '<div class="col-lg-6 col-md-6">
                                                                                        <p class="">'.trim($subCate->name).'</p>
                                                                                            <ul class="list-unstyled">
                                                                                                <div class="row">';


                                                                                            $i=0;
                                                                                            foreach( $subCate->product_categories as $key1 => $products ){
                                                                                                $sDiv='';$eDiv='';
                                                                                                if($i%8==0 || $i==0){
                                                                                                    $sDiv='<div class="col-md-6">';
                                                                                                    $eDiv='</div>';    
                                                                                                }
                                                                                                $i++;     
                                                                                                if($products->product->delete_status==1){
                                                                                                    if($i==1){
                                                                                                        echo $sDiv.'<li><a class="text-dark" href="'.$mbaseUrl.'/service-details/'.urlencode($products->product->slug).'">'.trim($products->product->menu_title).'</a></li>';
                                                                                                    }else{
                                                                                                        echo $eDiv.$sDiv.'<li><a class="text-dark" href="'.$mbaseUrl.'/service-details/'.urlencode($products->product->slug).'">'.trim($products->product->menu_title).'</a></li>';
                                                                                                    }
                                                                                                }

                                                                                            }
                                                                                echo '</div> </div>     </ul>
                                                                                </div>';
                                                                   
                                                                }
                                                            }
                                            echo '      </div>
                                                    </div>
                                                </div>' ;
                                    echo '</li>';
                             }

            else{
                echo   '<li class="nav-item dropdown position-static" id="superMenu">
                            <a class="nav-link " href="#" id="navbarDropdown" data-id="'.trim($brand->id).'" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.trim($brand->name).'</a>';
                                        echo '<div class="dropdown-menu w-100 border-0 m-0 p-0" aria-labelledby="navbarDropdown">
                                                    <div class="container-fluid pd-0">
                                                        <div class="row menu-bg w-100">';
                                                            foreach( $brand->child_categories as $key1 => $subCate ){
                                                                if($subCate->delete_status==1){


                                                                    echo '<div class="col-lg-6 col-md-6">
                                                                                        <p class="">'.trim($subCate->name).'</p>
                                                                                            <ul class="list-unstyled">
                                                                                                <div class="row">';


                                                                                            $i=0;
                                                                                            foreach( $subCate->product_categories as $key1 => $products ){
                                                                                                $sDiv='';$eDiv='';
                                                                                                if($i%6==0 || $i==0){
                                                                                                    $sDiv='<div class="col-md-4">';
                                                                                                    $eDiv='</div>';    
                                                                                                }
                                                                                                $i++;     
                                                                                                if($products->product->delete_status==1){
                                                                                                    if($i==1){
                                                                                                        echo $sDiv.'<li><a class="text-dark" href="'.$mbaseUrl.'/service-details/'.urlencode($products->product->slug).'">'.trim($products->product->menu_title).'</a></li>';
                                                                                                    }else{
                                                                                                        echo $eDiv.$sDiv.'<li><a class="text-dark" href="'.$mbaseUrl.'/service-details/'.urlencode($products->product->slug).'">'.trim($products->product->menu_title).'</a></li>';
                                                                                                    }
                                                                                                }

                                                                                            }
                                                                                echo '</div> </div>     </ul>
                                                                                </div>';
                                                                   
                                                                }
                                                            }
                                            echo '      </div>
                                                    </div>
                                                </div>' ;
                                    echo '</li>';
                             }
                        }
                    }
      
                        ?>
                           
                         
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <!-- //navigation -->
</header>
<!-- //header -->
</div>
<style type="text/css">
    @media only screen and (min-width: 767px){
.simple-menu .dropdown-menu {
    position: absolute;
    top: 100%;
    left: 22%;
    min-width: 180px;
    /*display: block;*/
}
.simple-menu .dropdown-menu li a {

        font-size: 16px;
        color: #5f6368!important;
       
        font-weight: 600;
        /*padding: 4px 10px 2px;*/
        padding: 3px 20px;
        display: block !important;
    }
 .simple-menu .dropdown-menu li .text-dark{
   text-decoration: none;
    font-size: 13px;
    color: #5f6368!important;
    font-weight: normal;
 }   
    }
    .simple-menu .dropdown-menu .submenu li a{
        padding: 0px;
    }
   /* .simple-menu .dropdown-menu .submenu {
  display: none;
  position: absolute;
  left: 100%;
  background: #fff;
  top: 0;
  width: 180px;
}*/
 .simple-menu .dropdown-menu .has-submenu:hover .submenu {
  display: block;
}
@media only screen and (min-width: 767px){
.simple-menu .dropdown-menu ul {
    position: absolute;
    top: 0;
    left: 100%;
    min-width: 790px;
    background: #fff;
    display: none;
    box-shadow: 0 2px 10px rgba(0,0,0,.1);
}

/*.simple-menu .dropdown-menu:hover .submenu {
  display: block;
}*/
/*#menu ul.menus .submenu {
  display: none;
  position: absolute;
  left: 180px;
  background: #111;
  top: 0;
  width: 180px;
}*/
}
</style>
