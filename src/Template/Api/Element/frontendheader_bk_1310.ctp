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
                <a id="logo" class="navbar-brand" href="index.html">
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
                                    
                                    <li><a href="#" data-toggle="modal" data-target="#modalSignup"  ><i class="fa fa-sign-in" aria-hidden="true"></i> Sign Up As Customer</a></li>';
                                    }?>
                                <li><a href="users/seller" ><i class="fa fa-sign-in" aria-hidden="true"></i> Sign Up As Seller</a></li>
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
                                <li><a href="#" class="text-dark" tabindex="-1">'.trim($products->product->title).'</a></li></div>';

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
                                                                                                        echo $sDiv.'<li><a class="text-dark" href="#">'.trim($products->product->title).'</a></li>';
                                                                                                    }else{
                                                                                                        echo $eDiv.$sDiv.'<li><a class="text-dark" href="#">'.trim($products->product->title).'</a></li>';
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
                                                                                            echo '<div class="col-md-3"><li><a class="text-dark" href="#">'.trim($products->product->title).'</a></li></div>';
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
                                                                                                        echo $sDiv.'<li><a class="text-dark" href="#">'.trim($products->product->title).'</a></li>';
                                                                                                    }else{
                                                                                                        echo $eDiv.$sDiv.'<li><a class="text-dark" href="#">'.trim($products->product->title).'</a></li>';
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
                                                                                            echo '<div class="col-md-6"><li><a class="text-dark" href="#">'.trim($products->product->title).'</a></li></div>';
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
                                                                                                        echo $sDiv.'<li><a class="text-dark" href="#">'.trim($products->product->title).'</a></li>';
                                                                                                    }else{
                                                                                                        echo $eDiv.$sDiv.'<li><a class="text-dark" href="#">'.trim($products->product->title).'</a></li>';
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
                                                                                                        echo $sDiv.'<li><a class="text-dark" href="#">'.trim($products->product->title).'</a></li>';
                                                                                                    }else{
                                                                                                        echo $eDiv.$sDiv.'<li><a class="text-dark" href="#">'.trim($products->product->title).'</a></li>';
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
                                                                                            echo '<div class="col-md-3"><li><a class="text-dark" href="#">'.trim($products->product->title).'</a></li></div>';
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
                                                                                                        echo $sDiv.'<li><a class="text-dark" href="#">'.trim($products->product->title).'</a></li>';
                                                                                                    }else{
                                                                                                        echo $eDiv.$sDiv.'<li><a class="text-dark" href="#">'.trim($products->product->title).'</a></li>';
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
                                                                                                        echo $sDiv.'<li><a class="text-dark" href="#">'.trim($products->product->title).'</a></li>';
                                                                                                    }else{
                                                                                                        echo $eDiv.$sDiv.'<li><a class="text-dark" href="#">'.trim($products->product->title).'</a></li>';
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
                           
                         
                       <!--  <li class="nav-item dropdown position-static" id="superMenu">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">E-Filling
                            </a>
                            <div class="dropdown-menu dropdown-efilling w-80 border-0 m-0 p-0 "  style="height: auto !important;" aria-labelledby="navbarDropdown" >
                                <div class="container-fluid pd-0">
                                    <div class="row menu-bg w-100">
                                        <div class="col-lg-2 col-md-2">
                                            <a href="#">
                                                <p class="income_dropdown">Income<span><span style="color:#fff;">_</span>Tax<span class="caret" style="font-size: 18px; "><span style="color:#fff;">_</span>&#8250;<span style="color:#fff;">_</span></span></p>
                                                </span>
                                            </a>
                                            <a href="#">
                                                <p class="gst_dropdown">GST<span class="caret" style="font-size: 18px; "><span style="color:#fff;">_</span>&#8250;<span style="color:#fff;">_</span></span></p>
                                            </a>
                                            <a href="#">
                                                <p class="roc_dropdown">ROC<span class="caret" style="font-size: 18px; "><span style="color:#fff;">_</span>&#8250;<span style="color:#fff;">_</span></span></p>
                                            </a>
                                        </div>
                                        <div class="col-lg-10 col-md-10 income_menu" style="display:none;">
                                            <ul class="dropdown-submenu">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <li><a class="text-dark" href="#">Salaried individual(Lite) ITR</a></li>
                                                        <li><a class="text-dark" href="#">Salaried individual(Premium)ITR</a></li>
                                                        <li><a class="text-dark" href="#"> Individual having Income from Capital Gains or Tax Relief Under Section 89 ITR</a></li>
                                                        <li><a class="text-dark" href="#">Filling of ITR for sale of ESOP or RSU</a></li>
                                                        <li><a class="text-dark" href="#">Firm ITR</a></li>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <li><a class="text-dark" href="#">Residents eith foreign Income ITR</a></li>
                                                        <li><a class="text-dark" href="#">Non Resident Indian (NRI)ITR</a></li>
                                                        <li><a class="text-dark" href="#">TDS/TCS Return</a></li>
                                                        <li><a class="text-dark" href="#">Bulk Return Filling</a></li>
                                                        <li><a class="text-dark" href="#">Special Finacial Transaction Return</a></li>
                                                        <li><a class="text-dark" href="#">Tax Adult form</a></li>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <li><a class="text-dark" href="#">Pvt.Ltd.Company ITR</a></li>
                                                        <li><a class="text-dark" href="#">Limited Company ITR</a></li>
                                                        <li><a class="text-dark" href="#">Trust ITR</a></li>
                                                        <li><a class="text-dark" href="#">AOP ITR</a></li>
                                                        <li><a class="text-dark" href="#">Society ITR</a></li>
                                                    </div>
                                                </div>
                                            </ul>
                                        </div>
                                        <div class="col-lg-10 col-md-10 gst_menu" style="display:none;">
                                            <ul class="list-unstyled">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <li><a class="text-dark" href="#">GST Filling-GSTR-1,3B(3months)</a></li>
                                                        <li><a class="text-dark" href="#">GST Filling-GSTR-1(3months)</a></li>
                                                        <li><a class="text-dark" href="#">Letter Of Undertaking(LUT)</a></li>
                                                        <li><a class="text-dark" href="#">GST Filling-GSTR-3B(3months)</a></li>
                                                        <li><a class="text-dark" href="#">GST Filling-GSTR-4(Composition Supplier Quarterly)</a></li>
                                                        <li><a class="text-dark" href="#">Accounting and GST Filling(Quraterly)</a></li>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <li><a class="text-dark" href="#">GST E-way Bill Service(upto 500 e-waybills annually)</a></li>
                                                        <li><a class="text-dark" href="#">GST E-way Bill Service(upto 1000 e-waybills annually)</a></li>
                                                        <li><a class="text-dark" href="#">GST E-way Bill Service(upto 5000 e-waybills annually)</a></li>
                                                        <li><a class="text-dark" href="#">GST Returns(Lite)</a></li>
                                                        <li><a class="text-dark" href="#">GST E-way bill Registration  and one E-way Bill generation</a></li>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <li><a class="text-dark" href="#">GSTR 9 Filling-Basic</a></li>
                                                        <li><a class="text-dark" href="#">GSTR 9 Filling-Premium</a></li>
                                                        <li><a class="text-dark" href="#">GSTR 9 Filling-Topup</a></li>
                                                        <li><a class="text-dark" href="#">cancellation or surrender of GST Registration</a></li>
                                                        <li><a class="text-dark" href="#">All-In-One GST-ITR-TDS kit for CAs & Experts(Expert Pack)-1 year and 3000 Invoices/Year/Client with 5 users</a></li>
                                                    </div>
                                                </div>
                                            </ul>
                                        </div>
                                        <div class="col-lg-10 col-md-10 roc_menu" style="display:none;">
                                            <ul class="list-unstyled">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <li><a class="text-dark" href="#">Director's Identification Number(DIN)</a></li>
                                                        <li><a class="text-dark" href="#">Removal of Director</a></li>
                                                        <li><a class="text-dark" href="#">LLP Annual Return</a></li>
                                                        <li><a class="text-dark" href="#">Form20A-Filling of a declaration for Commencement od business</a></li>
                                                        <li><a class="text-dark" href="#">Form INC 22A</a></li>
                                                        <li><a class="text-dark" href="#">Resoultion/Agreement for Specified Mattters</a></li>
                                                        <li><a class="text-dark" href="#">Alteration nN MOA/AOA</a></li>
                                                        <li><a class="text-dark" href="#">Appointment/Resignation of Diresctor</a></li>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <li><a class="text-dark" href="#">Appointment of Subsequent Auditor(Expert First Auditor)</a></li>
                                                        <li><a class="text-dark" href="#">Resignation of Auditor</a></li>
                                                        <li><a class="text-dark" href="#">Audited FINANCIAL STATEMENT(DIRECTORS'REPORT,BAL SHEET,P&L)</a></li>
                                                        <li><a class="text-dark" href="#">Regularisation of Additional Director</a></li>
                                                        <li><a class="text-dark" href="#">MSME-Companies to Repprt If Payment to Micro & Small Enterprise Exceed 45Days</a></li>
                                                        <li><a class="text-dark" href="#">Report For Deposits/Non-Deposits in Company(DPT-3)</a></li>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <li><a class="text-dark" href="#">Annunal Return</a></li>
                                                        <li><a class="text-dark" href="#">Digital Signature Certificate(DSC)</a></li>
                                                        <li><a class="text-dark" href="#">Increase in Auth.Capital</a></li>
                                                        <li><a class="text-dark" href="#">Increase in Paid-up.Capital</a></li>
                                                        <li><a class="text-dark" href="#">Change in registered office</a></li>
                                                        <li><a class="text-dark" href="#">Change in the Name of Company</a></li>
                                                        <li><a class="text-dark" href="#">KYC of Director</a></li>
                                                        <li><a class="text-dark" href="#">Report for Dequalification of Director</a></li>
                                                        <li><a class="text-dark" href="#">Significant Benefical Ownership</a></li>
                                                    </div>
                                                </div>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li> -->
                        <!-- <li class="nav-item dropdown position-static" id="superMenu">
                            <a class="nav-link " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Form An Entity
                            </a>
                            <div class="dropdown-menu w-100 border-0 m-0 p-0" aria-labelledby="navbarDropdown">
                                <div class="container-fluid pd-0">
                                    <div class="row menu-bg w-100">
                                        <div class="col-lg-3 col-md-3">
                                            <p class="">Incorporate Your Business</p>
                                            <ul class="list-unstyled">
                                                <li><a class="text-dark" href="#">Private Limited Company</a></li>
                                                <li>
                                                    <a class="text-dark" href="#">Limited Liability Partnership (LLP)
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="text-dark" href="#"> Partnership Firm </a>
                                                </li>
                                                <li>
                                                    <a class="text-dark" href="#">Proprietorship Firm</a>
                                                </li>
                                                <li>
                                                    <a class="text-dark" href="#">Public Limited Company</a>
                                                </li>
                                                <li>
                                                    <a class="text-dark" href="#">One Person Company(OPC)</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-3 col-md-3">
                                            <p class="">Special Entity(MSME/SSI)</p>
                                            <ul class="list-unstyled">
                                                <li><a class="text-dark" href="#">Nidhi Company</a></li>
                                                <li><a class="text-dark" href="#">Subsidiary of Indian Company</a></li>
                                                <li><a class="text-dark" href="#">Subsidiary of Foreign Company</a></li>
                                                <li><a class="text-dark" href="#">Section 8 Company/NGO</a></li>
                                                <li><a class="text-dark" href="#">India Entity</a></li>
                                                <li><a class="text-dark" href="#">Non Banking Financial Company(NBFC)</a></li>
                                                <li><a class="text-dark" href="#">Producer Company</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-3 col-md-3">
                                            <p class="">Company Conversion</p>
                                            <ul class="list-unstyled">
                                                <li><a class="text-dark" href="#">Convert Partnership to LLP</a></li>
                                                <li><a class="text-dark" href="#">Convert Private Ltd Company to Public Ltd.Company</a></li>
                                                <li><a class="text-dark" href="#">Convert Proprietorship to Pvt Ltd Company</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-3 col-md-3">
                                            <p class="">Others</p>
                                            <ul class="list-unstyled">
                                                <li><a class="text-dark" href="#">Branch Office of Foreign Company</a></li>
                                                <li><a class="text-dark" href="#">Liaison Office of Foreign Company</a></li>
                                                <li><a class="text-dark" href="#">Project Office of Foreign Company</a></li>
                                                <li><a class="text-dark" href="#">Society</a></li>
                                                <li><a class="text-dark" href="#">Private Trust</a></li>
                                                <li><a class="text-dark" href="#">Public Trust</a></li>
                                                <li><a class="text-dark" href="#">Closure of Entity</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown position-static" id="superMenu">
                            <a class="nav-link " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Govt.Registrations 
                            </a>
                            <div class="dropdown-menu w-100 border-0 m-0 p-0" aria-labelledby="navbarDropdown">
                                <div class="container-fluid pd-0">
                                    <div class="row menu-bg w-100">
                                        <div class="col-lg-3 col-md-3">
                                            <p class="">Trademark/Patent</p>
                                            <ul class="list-unstyled">
                                                <li><a class="text-dark" href="#">Trademark Registration(Individual)</a></li>
                                                <li><a class="text-dark" href="#">Trademark(Non Individual)</a></li>
                                                <li><a class="text-dark" href="#"> Trademark with Logo Designers(Individual)</a></li>
                                                <li><a class="text-dark" href="#">Trademark with Logo Designers(Non Individual)</a></li>
                                                <li><a class="text-dark" href="#">Trademark Objection Management(Individual)</a></li>
                                                <li><a class="text-dark" href="#">Design</a></li>
                                                <li><a class="text-dark" href="#">MSME</a></li>
                                                <li><a class="text-dark" href="#">Patent</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-3 col-md-3">
                                            <p class="">Food Licence</p>
                                            <ul class="list-unstyled">
                                                <li><a class="text-dark" href="#">FSSAI(Food License)-Basic Registration For Sales<10 L P A</a></li>
                                                <li><a class="text-dark" href="#">FSSAI(Food License)-State Registration For Sales 10 L-2 Cr Per Year</a></li>
                                                <li><a class="text-dark" href="#">FSSAI(Food License)-Central Registration For Sales above 2 Cr.</a></li>
                                                <li><a class="text-dark" href="#">Drug Licence(pharmacy)</a></li>
                                                <li><a class="text-dark" href="#">Eating House License Resgistartion</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <p class="">Licence(IFC)</p>
                                            <ul class="list-unstyled ">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <li><a class="text-dark" href="#">Import Export Code </a></li>
                                                        <li><a class="text-dark" href="#">ISO</a></li>
                                                        <li><a class="text-dark" href="#">Trade Licence</a></li>
                                                        <li><a class="text-dark" href="#">APEDA</a></li>
                                                        <li><a class="text-dark" href="#">Warehouse</a></li>
                                                        <li><a class="text-dark" href="#">Stratup</a></li>
                                                        <li><a class="text-dark" href="#">Udyam Registration</a></li>
                                                        <li><a class="text-dark" href="#">Employee state Insurance (ESI)</a></li>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <li><a class="text-dark" href="#">Provident Fund (PF)</a></li>
                                                        <li><a class="text-dark" href="#">Goods and Services Tax Identification Number(GSTIN)</a></li>
                                                        <li><a class="text-dark" href="#">Professional Tax</a></li>
                                                        <li><a class="text-dark" href="#">Permanent Account Number (PAN)</a></li>
                                                        <li><a class="text-dark" href="#">Tax Deduction Account Number (TAN)</a></li>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <li><a class="text-dark" href="#">Barcode</a></li>
                                                        <li><a class="text-dark" href="#">Private Security</a></li>
                                                        <li><a class="text-dark" href="#">Shop and Establishment</a></li>
                                                        <li><a class="text-dark" href="#">Gumasta Licence</a></li>
                                                        <li><a class="text-dark" href="#">Amendments</a></li>
                                                        <li><a class="text-dark" href="#">Renewals</a></li>
                                                        <li><a class="text-dark" href="#">Real Estate Project Registration Under State RERA</a></li>
                                                    </div>
                                                </div>
                                            </ul>
                                        </div>
                                        <div class="col-lg-3 col-md-3">
                                            <p class="">Copyright</p>
                                            <ul class="list-unstyled">
                                                <li><a class="text-dark" href="#">Copyright</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown position-static" id="superMenu">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">E-Filling
                            </a>
                            <div class="dropdown-menu dropdown-efilling w-80 border-0 m-0 p-0 "  style="height: auto !important;" aria-labelledby="navbarDropdown" >
                                <div class="container-fluid pd-0">
                                    <div class="row menu-bg w-100">
                                        <div class="col-lg-2 col-md-2">
                                            <a href="#">
                                                <p class="income_dropdown">Income<span><span style="color:#fff;">_</span>Tax<span class="caret" style="font-size: 18px; "><span style="color:#fff;">_</span>&#8250;<span style="color:#fff;">_</span></span></p>
                                                </span>
                                            </a>
                                            <a href="#">
                                                <p class="gst_dropdown">GST<span class="caret" style="font-size: 18px; "><span style="color:#fff;">_</span>&#8250;<span style="color:#fff;">_</span></span></p>
                                            </a>
                                            <a href="#">
                                                <p class="roc_dropdown">ROC<span class="caret" style="font-size: 18px; "><span style="color:#fff;">_</span>&#8250;<span style="color:#fff;">_</span></span></p>
                                            </a>
                                        </div>
                                        <div class="col-lg-10 col-md-10 income_menu" style="display:none;">
                                            <ul class="dropdown-submenu">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <li><a class="text-dark" href="#">Salaried individual(Lite) ITR</a></li>
                                                        <li><a class="text-dark" href="#">Salaried individual(Premium)ITR</a></li>
                                                        <li><a class="text-dark" href="#"> Individual having Income from Capital Gains or Tax Relief Under Section 89 ITR</a></li>
                                                        <li><a class="text-dark" href="#">Filling of ITR for sale of ESOP or RSU</a></li>
                                                        <li><a class="text-dark" href="#">Firm ITR</a></li>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <li><a class="text-dark" href="#">Residents eith foreign Income ITR</a></li>
                                                        <li><a class="text-dark" href="#">Non Resident Indian (NRI)ITR</a></li>
                                                        <li><a class="text-dark" href="#">TDS/TCS Return</a></li>
                                                        <li><a class="text-dark" href="#">Bulk Return Filling</a></li>
                                                        <li><a class="text-dark" href="#">Special Finacial Transaction Return</a></li>
                                                        <li><a class="text-dark" href="#">Tax Adult form</a></li>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <li><a class="text-dark" href="#">Pvt.Ltd.Company ITR</a></li>
                                                        <li><a class="text-dark" href="#">Limited Company ITR</a></li>
                                                        <li><a class="text-dark" href="#">Trust ITR</a></li>
                                                        <li><a class="text-dark" href="#">AOP ITR</a></li>
                                                        <li><a class="text-dark" href="#">Society ITR</a></li>
                                                    </div>
                                                </div>
                                            </ul>
                                        </div>
                                        <div class="col-lg-10 col-md-10 gst_menu" style="display:none;">
                                            <ul class="list-unstyled">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <li><a class="text-dark" href="#">GST Filling-GSTR-1,3B(3months)</a></li>
                                                        <li><a class="text-dark" href="#">GST Filling-GSTR-1(3months)</a></li>
                                                        <li><a class="text-dark" href="#">Letter Of Undertaking(LUT)</a></li>
                                                        <li><a class="text-dark" href="#">GST Filling-GSTR-3B(3months)</a></li>
                                                        <li><a class="text-dark" href="#">GST Filling-GSTR-4(Composition Supplier Quarterly)</a></li>
                                                        <li><a class="text-dark" href="#">Accounting and GST Filling(Quraterly)</a></li>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <li><a class="text-dark" href="#">GST E-way Bill Service(upto 500 e-waybills annually)</a></li>
                                                        <li><a class="text-dark" href="#">GST E-way Bill Service(upto 1000 e-waybills annually)</a></li>
                                                        <li><a class="text-dark" href="#">GST E-way Bill Service(upto 5000 e-waybills annually)</a></li>
                                                        <li><a class="text-dark" href="#">GST Returns(Lite)</a></li>
                                                        <li><a class="text-dark" href="#">GST E-way bill Registration  and one E-way Bill generation</a></li>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <li><a class="text-dark" href="#">GSTR 9 Filling-Basic</a></li>
                                                        <li><a class="text-dark" href="#">GSTR 9 Filling-Premium</a></li>
                                                        <li><a class="text-dark" href="#">GSTR 9 Filling-Topup</a></li>
                                                        <li><a class="text-dark" href="#">cancellation or surrender of GST Registration</a></li>
                                                        <li><a class="text-dark" href="#">All-In-One GST-ITR-TDS kit for CAs & Experts(Expert Pack)-1 year and 3000 Invoices/Year/Client with 5 users</a></li>
                                                    </div>
                                                </div>
                                            </ul>
                                        </div>
                                        <div class="col-lg-10 col-md-10 roc_menu" style="display:none;">
                                            <ul class="list-unstyled">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <li><a class="text-dark" href="#">Director's Identification Number(DIN)</a></li>
                                                        <li><a class="text-dark" href="#">Removal of Director</a></li>
                                                        <li><a class="text-dark" href="#">LLP Annual Return</a></li>
                                                        <li><a class="text-dark" href="#">Form20A-Filling of a declaration for Commencement od business</a></li>
                                                        <li><a class="text-dark" href="#">Form INC 22A</a></li>
                                                        <li><a class="text-dark" href="#">Resoultion/Agreement for Specified Mattters</a></li>
                                                        <li><a class="text-dark" href="#">Alteration nN MOA/AOA</a></li>
                                                        <li><a class="text-dark" href="#">Appointment/Resignation of Diresctor</a></li>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <li><a class="text-dark" href="#">Appointment of Subsequent Auditor(Expert First Auditor)</a></li>
                                                        <li><a class="text-dark" href="#">Resignation of Auditor</a></li>
                                                        <li><a class="text-dark" href="#">Audited FINANCIAL STATEMENT(DIRECTORS'REPORT,BAL SHEET,P&L)</a></li>
                                                        <li><a class="text-dark" href="#">Regularisation of Additional Director</a></li>
                                                        <li><a class="text-dark" href="#">MSME-Companies to Repprt If Payment to Micro & Small Enterprise Exceed 45Days</a></li>
                                                        <li><a class="text-dark" href="#">Report For Deposits/Non-Deposits in Company(DPT-3)</a></li>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <li><a class="text-dark" href="#">Annunal Return</a></li>
                                                        <li><a class="text-dark" href="#">Digital Signature Certificate(DSC)</a></li>
                                                        <li><a class="text-dark" href="#">Increase in Auth.Capital</a></li>
                                                        <li><a class="text-dark" href="#">Increase in Paid-up.Capital</a></li>
                                                        <li><a class="text-dark" href="#">Change in registered office</a></li>
                                                        <li><a class="text-dark" href="#">Change in the Name of Company</a></li>
                                                        <li><a class="text-dark" href="#">KYC of Director</a></li>
                                                        <li><a class="text-dark" href="#">Report for Dequalification of Director</a></li>
                                                        <li><a class="text-dark" href="#">Significant Benefical Ownership</a></li>
                                                    </div>
                                                </div>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown position-static" id="superMenu">
                            <a class="nav-link " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Legal & Taxation
                            </a>
                            <div class="dropdown-menu w-100 border-0 m-0 p-0" aria-labelledby="navbarDropdown">
                                <div class="container-fluid pd-0">
                                    <div class="row menu-bg w-100">
                                        <div class="col-lg-6 col-md-6">
                                            <p class="">Legal Agreement</p>
                                            <ul class="list-unstyled">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <li><a class="text-dark" href="#">Non Disclosure agreement</a></li>
                                                        <li><a class="text-dark" href="#">Employment contract</a></li>
                                                        <li><a class="text-dark" href="#"> Founders'Agreement</a></li>
                                                        <li><a class="text-dark" href="#">Shareholders'Aggreement</a></li>
                                                        <li><a class="text-dark" href="#">Share Purchase Agreement</a></li>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <li><a class="text-dark" href="#">Vendore Agreement</a></li>
                                                        <li><a class="text-dark" href="#">Service Legal Agreement</a></li>
                                                        <li><a class="text-dark" href="#">Franchise Agreement</a></li>
                                                        <li><a class="text-dark" href="#">MOU</a></li>
                                                        <li><a class="text-dark" href="#">Joint Venture</a></li>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <li><a class="text-dark" href="#">Partnership Deed</a></li>
                                                        <li><a class="text-dark" href="#">Sale Deed</a></li>
                                                        <li><a class="text-dark" href="#">Gift Deed</a></li>
                                                        <li><a class="text-dark" href="#">Extension of agreement </a></li>
                                                        <li><a class="text-dark" href="#">Independent Contractor Agreement</a></li>
                                                    </div>
                                                </div>
                                            </ul>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <p class="">Legal Administration</p>
                                            <ul class="list-unstyled">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <li><a class="text-dark" href="#">Property Possession Delay-RERA </a></li>
                                                        <li><a class="text-dark" href="#">Property Booking Refund-State RERA</a></li>
                                                        <li><a class="text-dark" href="#">Property Booking Refund-NCLT</a></li>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <li><a class="text-dark" href="#">litigation</a></li>
                                                        <li><a class="text-dark" href="#">ESOP</a></li>
                                                        <li><a class="text-dark" href="#">Term sheet</a></li>
                                                        <li><a class="text-dark" href="#">Privacy Policy</a></li>
                                                        <li><a class="text-dark" href="#">Marriage Certificate</a></li>
                                                        <li><a class="text-dark" href="#">Affidavits</a></li>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <li><a class="text-dark" href="#">Power of Attorney</a></li>
                                                        <li><a class="text-dark" href="#">Property Regisration</a></li>
                                                        <li><a class="text-dark" href="#">Property Verification</a></li>
                                                        <li><a class="text-dark" href="#">Name Change</a></li>
                                                        <li><a class="text-dark" href="#">Make a Will</a></li>
                                                        <li><a class="text-dark" href="#">Website Policy</a></li>
                                                    </div>
                                                </div>
                                            </ul>
                                        </div>
                                        <div class="col-lg-8 col-md-8">
                                            <p class="">Legal Notice</p>
                                            <ul class="list-unstyled">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <li><a class="text-dark" href="#">Legal Drafting</a></li>
                                                        <li><a class="text-dark" href="#">Legal Vetting</a></li>
                                                        <li><a class="text-dark" href="#">Cheque Bounce Complaint</a></li>
                                                        <li><a class="text-dark" href="#">Traffic Challan</a></li>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <li><a class="text-dark" href="#">Legal Notice</a></li>
                                                        <li><a class="text-dark" href="#">Consumer Matters</a></li>
                                                        <li><a class="text-dark" href="#">Domestic Violence</a></li>
                                                        <li><a class="text-dark" href="#">Divorce with Consent</a></li>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <li><a class="text-dark" href="#">Right to Information(RIT)</a></li>
                                                        <li><a class="text-dark" href="#">Notice to Vacate Tenant</a></li>
                                                        <li><a class="text-dark" href="#">Debt Recovery Notice</a></li>
                                                        <li><a class="text-dark" href="#">GST Notice Mnagement</a></li>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <li><a class="text-dark" href="#">Income Tax Assessement Representation</a></li>
                                                        <li><a class="text-dark" href="#">GST Assessement Representation</a></li>
                                                    </div>
                                                </div>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown position-static" id="superMenu">
                            <a class="nav-link " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Audit & Bookeeping
                            </a>
                            <div class="dropdown-menu w-100 border-0 m-0 p-0" aria-labelledby="navbarDropdown">
                                <div class="container-fluid pd-0">
                                    <div class="row menu-bg w-100">
                                        <div class="col-lg-12 col-md-12">
                                            <ul class="list-unstyled">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <li><a class="dropdown-item" href="#">Accounting & Bookkeeping (Yearly Once - Lite)</a></li>
                                                        <li><a class="dropdown-item" href="#">Accounting & Bookkeeping (Yearly Once - Premium)</a></li>
                                                        <li><a class="dropdown-item" href="#">Secretarial Records & Bookkeeping (Lite)</a></li>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <li><a class="dropdown-item" href="#">Secretarial Records & Bookkeeping (Premium)</a></li>
                                                        <li><a class="dropdown-item" href="#">Internal Audit</a></li>
                                                        <li><a class="dropdown-item" href="#">Secretarial Audit</a></li>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <li><a class="dropdown-item" href="#">Management Audit</a></li>
                                                        <li><a class="dropdown-item" href="#">Company Health check up</a></li>
                                                        <li><a class="dropdown-item" href="#">Statutory Audit</a></li>
                                                    </div>
                                                </div>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown position-static" id="superMenu">
                            <a class="nav-link " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Digital Marketing
                            </a>
                            <div class="dropdown-menu w-100 border-0 m-0 p-0" aria-labelledby="navbarDropdown">
                                <div class="container-fluid pd-0">
                                    <div class="row menu-bg w-100">
                                        <div class="col-lg-8 col-md-8">
                                            <p class="">Marketing Services</p>
                                            <ul class="list-unstyled">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <li><a class="text-dark" href="#">Social Media Marketing</a></li>
                                                        <li><a class="text-dark" href="#">Facebook Ads</a></li>
                                                        <li><a class="text-dark" href="#"> Google Ads</a></li>
                                                        <li><a class="text-dark" href="#">SEO Audit Report</a></li>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <li><a class="text-dark" href="#">Complete SEO Package</a></li>
                                                        <li><a class="text-dark" href="#">Email Marketing</a></li>
                                                        <li><a class="text-dark" href="#">Video Marketing </a></li>
                                                        <li><a class="text-dark" href="#">E-Commerce Marekting</a></li>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <li><a class="text-dark" href="#">Local SEO</a></li>
                                                        <li><a class="text-dark" href="#">Podcast Marketing</a></li>
                                                        <li><a class="text-dark" href="#">Web Traffic</a></li>
                                                        <li><a class="text-dark" href="#">Mobile Marketing & Advertising</a></li>
                                                    </div>
                                                </div>
                                            </ul>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <p class="">Content Writing</p>
                                            <ul class="list-unstyled">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <li><a class="text-dark" href="#">Article Blog & Posts</a></li>
                                                        <li><a class="text-dark" href="#">Transalation Services</a></li>
                                                        <li><a class="text-dark" href="#">Proof Reading & Editing</a></li>
                                                        <li><a class="text-dark" href="#">Social Media Contents</a></li>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <li><a class="text-dark" href="#">Website Contents</a></li>
                                                        <li><a class="text-dark" href="#">Product Descriptions</a></li>
                                                        <li><a class="text-dark" href="#">Resume Writing</a></li>
                                                        <li><a class="text-dark" href="#">Podcast Writing</a></li>
                                                    </div>
                                                </div>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown position-static" id="superMenu">
                            <a class="nav-link " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Website & Apps
                            </a>
                            <div class="dropdown-menu w-100 border-0 m-0 p-0" aria-labelledby="navbarDropdown">
                                <div class="container-fluid pd-0">
                                    <div class="row menu-bg w-100">
                                        <div class="col-lg-12 col-md-12">
                                            <ul class="list-unstyled">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <li><a class="text-dark" href="#">Wordpress Website Development</a></li>
                                                        <li><a class="text-dark" href="#">Magento Website Development</a></li>
                                                        <li><a class="text-dark" href="#">Shopify Website Development</a></li>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <li><a class="text-dark" href="#">Blog Website Development</a></li>
                                                        <li><a class="text-dark" href="#">Business Website Development</a></li>
                                                        <li><a class="text-dark" href="#">E-Commerce Website Development</a></li>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <li><a class="text-dark" href="#">Mobile Apps (Android, IOS) Development</a></li>
                                                        <li><a class="text-dark" href="#">Support & IT</a></li>
                                                        <li><a class="text-dark" href="#">Web Traffic</a></li>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <li><a class="text-dark" href="#">Mobile Marketing & Advertising</a></li>
                                                    </div>
                                                </div>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown position-static" id="superMenu">
                            <a class="nav-link " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Graphics & Video
                            </a>
                            <div class="dropdown-menu w-100 border-0 m-0 p-0" aria-labelledby="navbarDropdown">
                                <div class="container-fluid pd-0">
                                    <div class="row menu-bg w-100">
                                        <div class="col-lg-2 col-md-2">
                                            <p class="">Logo & Brand Identity</p>
                                            <ul class="list-unstyled">
                                                <li><a href="#" class="text-dark">Logo Design</a></li>
                                                <li><a href="#" class="text-dark">Website Banners Design</a></li>
                                                <li><a href="#" class="text-dark">Business Cards & Stationery</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <p class="">Print Design</p>
                                            <ul class="list-unstyled">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <li><a class="text-dark" href="#">Menu Design</a></li>
                                                        <li><a class="text-dark" href="#">Catalog Design</a></li>
                                                        <li><a class="text-dark" href="#">Invitation Card Design</a></li>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <li><a class="text-dark" href="#">Flyer/leaflet Design</a></li>
                                                        <li><a class="text-dark" href="#">Standee Design</a></li>
                                                        <li><a class="text-dark" href="#">Social Media Design</a></li>
                                                    </div>
                                                </div>
                                            </ul>
                                        </div>
                                        <div class="col-lg-2 col-md-2">
                                            <p class="">Web & Mobile - UI Design</p>
                                            <ul class="list-unstyled">
                                                <li><a class="text-dark" href="#">Website UI Design</a></li>
                                                <li><a class="text-dark" href="#">Mobile UI Design</a></li>
                                                <li><a class="text-dark" href="#">Social Media Design</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-2 col-md-2">
                                            <p class="">Packaging & Label</p>
                                            <ul class="list-unstyled">
                                                <li><a class="text-dark" href="#">Packaging Design</a></li>
                                                <li><a class="text-dark" href="#">Book/Album Cover Design</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-2 col-md-2">
                                            <p class="">Photoshop Editing</p>
                                            <ul class="list-unstyled">
                                                <li><a class="text-dark" href="#">Photoshop Editing</a></li>
                                                <li><a class="text-dark" href="#">Ecommerce Site Photo Editing</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <p class="">Video & Animation</p>
                                            <ul class="list-unstyled">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <li><a class="text-dark" href="#">Logo Animation</a></li>
                                                        <li><a class="text-dark" href="#">Video Editing</a></li>
                                                        <li><a class="text-dark" href="#">Voice Over</a></li>
                                                        <li><a class="text-dark" href="#">Social Media Videos</a></li>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <li><a class="text-dark" href="#">Product/Business Explainer Video</a></li>
                                                        <li><a class="text-dark" href="#">Mobile/Website App Demo Video</a></li>
                                                        <li><a class="text-dark" href="#">Short Video Ads</a></li>
                                                    </div>
                                                </div>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown position-static" id="superMenu">
                            <a class="nav-link " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Industry
                            </a>
                            <div class="dropdown-menu w-100 border-0 m-0 p-0" aria-labelledby="navbarDropdown">
                                <div class="container-fluid pd-0">
                                    <div class="row menu-bg w-100">
                                        <div class="col-lg-4 col-md-4">
                                            <p class="">Gaming</p>
                                            <ul class="list-unstyled">
                                                <li><a href="#" class="text-dark">Game Development</a></li>
                                                <li><a href="#" class="text-dark">Character Design</a></li>
                                                <li><a href="#" class="text-dark">Producers & Composers</a></li>
                                                <li><a href="#" class="text-dark">Sound Effects</a></li>
                                                <li><a href="#" class="text-dark">Character Modeling</a></li>
                                                <li><a href="#" class="text-dark">Character Animation</a></li>
                                                <li><a href="#" class="text-dark">Game Trailers</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <p class="">Ecommerce Listings</p>
                                            <ul class="list-unstyled">
                                                <li><a href="#" class="text-dark">Product Listing/Cataloging</a></li>
                                                <li><a href="#" class="text-dark">Amazon Seller Account Management</a></li>
                                                <li><a href="#" class="text-dark">Flipkart Seller Account Management</a></li>
                                                <li><a href="#" class="text-dark">Amazon/Flipkart Photo Editing</a></li>
                                                <li><a href="#" class="text-dark">Product Research</a></li>
                                                <li><a href="#" class="text-dark">Amazon Expert</a></li>
                                                <li><a href="#" class="text-dark">Flipkart Expert</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <p class="">Architecture</p>
                                            <ul class="list-unstyled">
                                                <li><a href="#" class="text-dark">2D Drawing & Floor Plans</a></li>
                                                <li><a href="#" class="text-dark">3D Modeling & Rendering</a></li>
                                                <li><a href="#" class="text-dark">Planning & Design</a></li>
                                                <li><a href="#" class="text-dark">Diagrams & Mapping</a></li>
                                                <li><a href="#" class="text-dark">Virtual Staging</a></li>
                                            </ul>
                                        </div>
                        <li class="nav-item dropdown position-static" id="superMenu">
                            <a class="nav-link " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Business Support
                            </a>
                            <div class="dropdown-menu w-100 border-0 m-0 p-0" aria-labelledby="navbarDropdown">
                                <div class="container-fluid pd-0">
                                    <div class="row menu-bg w-100">
                                        <div class="col-lg-12 col-md-12">
                                            <ul class="list-unstyled">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <li><a href="#" class="text-dark">Game Development</a></li>
                                                        <li><a class="text-dark" href="#">Business Funding</a></li>
                                                        <li><a class="text-dark" href="#">Business Valuation</a></li>
                                                        <li><a class="text-dark" href="#">Virtual CFO</a></li>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <li><a class="text-dark" href="#">Business Analysis</a></li>
                                                        <li><a class="text-dark" href="#">Financial Planning</a></li>
                                                        <li><a class="text-dark" href="#">Tax Planning </a></li>
                                                        <li><a class="text-dark" href="#">Business Structuring</a></li>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <li><a class="text-dark" href="#">Corporate Governance</a></li>
                                                        <li><a class="text-dark" href="#">Competitors' Strategy</a></li>
                                                        <li><a class="text-dark" href="#">Preserve Wealth/Money</a></li>
                                                        <li><a class="text-dark" href="#">Cross Border Structuring & Taxation</a></li>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <li><a class="text-dark" href="#">Foreign Client Support</a></li>
                                                        <li><a class="text-dark" href="#">Business & Investment Plan</a></li>
                                                        <li><a class="text-dark" href="#">Asset Tracing</a></li>
                                                    </div>
                                                </div>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li> -->
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
