
<style type="text/css">
.abcRioButton.abcRioButtonLightBlue {
	width: 50% !important;
}
.g-signin2 {
	width: 100%;
	float: left;
	margin-top: 2%;
}
.navbar-nav.nav-fill li:last-child.n-dropdown .dropdown-menu {
    transform: translateX(-42%) !important;
}

.navbar-nav.nav-fill li:nth-child(4).cn-dropdown .dropdown-menu {
    transform: translateX(-3%) !important;
}

.navbar-nav.nav-fill li:nth-child(5).cn-dropdown .dropdown-menu {
    transform: translateX(-25%) !important;
}

.navbar-nav.nav-fill li:nth-last-child(2).cn-dropdown .dropdown-menu {
    transform: translateX(-58%) !important;
}

li#superMenu>a:after {
    content: "\f107";
    font-family: 'FontAwesome';
    font-size: 20px;
    color: #8e43e7;
    position: absolute;
    top: 1px;
    margin-left: 2px;
    transition: .7s;
}

li#superMenu:hover>a:after {
    transform: rotate(180deg);
    transition: .3s;
}

li#superMenu>a {
    position: relative;
}

.menu-bg>div {
    width: 25%;
}

#superMenu.n-dropdown .menu-bg>div {
    width: 100% !important;
}

#superMenu.cn-dropdown .menu-bg>div {
    width: 50% !important;
}

.n3-dropdown .dropdown-menu .menu-bg>div {
    width: 33%;
}

.menu-bg h5 {
    font-weight: 600;
    font-size: 12px;
    margin-bottom: 5px;
}

.menu-bg>div:last-child,
.menu-bg>div:nth-last-child(2) {
    margin-bottom: 0;
}

.menu-bg>div {
    margin-bottom: 10px;
}

.dropdown-submenu {
    position: relative;
}

#superMenu.n-dropdown {
    position: relative !important;
}

#superMenu.n-dropdown .dropdown-menu {
    top: 32.56249px;
    min-width: 20em;
}

.cn-dropdown {
    position: relative !important;
}

#superMenu.cn-dropdown .dropdown-menu {
    min-width: 42em !important;
    transform: translateX(-32%);
    width: 100%;
    top: 32.56249px;
}

body.modal-open {
    height: 100%;
    overflow: hidden;
}

.modal-open .modal {
    overflow-x: hidden;
    overflow-y: hidden !important;
}

.dropdown-menu {
    box-shadow: 0 2px 10px rgba(0, 0, 0, .1);
}

.dropdown-submenu>.dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: -6px;
}

.dropdown-menu a,
.dropdown-menu ul li a {
    text-decoration: none;
    font-size: 12px;
    color: #5f6368 !important;
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
    display: none;
    /* Hidden by default */
    position: fixed;
    /* Stay in place */
    z-index: 1050;
    /* Sit on top */
    left: 0;
    top: 0;
    width: 100%;
    /* Full width */
    height: 100%;
    /* Full height */
    overflow: auto;
    /* Enable scroll if needed */
    background-color: rgb(0, 0, 0);
    /* Fallback color */
    background-color: rgba(0, 0, 0, 0.4);
    /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    border: unset;
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
    color: #8E43E7;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {
        -webkit-transform: scale(0)
    }

    to {
        -webkit-transform: scale(1)
    }
}

@keyframes animatezoom {
    from {
        transform: scale(0)
    }

    to {
        transform: scale(1)
    }
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

.btn-login {
    font-family: 'Poppins', sans-serif;
    background: #8E43E7;
    color: #fff;
    padding: 0 1rem;
    outline: none;
    box-shadow: 0;
    font-size: 14px;
    font-weight: normal;
    width: 90px;
}

.btn-login:hover {
    background: #d3baf1;
    color: #000;
}

.imgcontainer h2 {
    color: #9D369B;
    text-shadow: 0 0 5px #9E389C;
    font-weight: bold;
    margin-top: 0;
}

.imgcontainer p {
    color: #8E43E7;
    margin-bottom: 30px;
}

.dropdown-efilling {
    margin-left: 258px !important;
}

@media(min-width:1520px) {
    .dropdown-efilling {
        margin-left: 346px !important;
    }
}

.signup_account {
    margin-bottom: 10px;
    text-align: center;
}

.btn-default {
    border: 1px solid lightgray;
    border-radius: 0;
    padding: 10px 40px;
}

.btn-default:hover {
    background: #AA72ED;
    color: #fff;
}


.n3-dropdown {
    position: relative !important;
}

.n3-dropdown .dropdown-menu {
    position: absolute !important;
    width: 46rem !important;
    transform: translatex(-40%);
    top: 33px;
}
#top-nav {
    padding: 0px 25px !important;
}

/* .navbar-collapse{
    margin-right:-65px;
    }*/
</style>

<?php //$mbaseUrl="http://localhost/marketplace/";
$mbaseUrl = BASE_URL; ?>
<script src="https://apis.google.com/js/platform.js" async defer></script>
<meta name="google-signin-client_id" content="839894906232-87o6qqjg8a5oo7mkvp1vnic24leofrs0.apps.googleusercontent.com">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/validate-js/2.0.1/validate.min.js" integrity="sha512-8GLIg5ayTvD6F9ML/cSRMD19nHqaLPWxISikfc5hsMJyX7Pm+IIbHlhBDY2slGisYLBqiVNVll+71CYDD5RBqA==" crossorigin="anonymous"></script>
<!--Modal: Login-->
<div class="modal fade top" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" data-backdrop="true">
    <div class="modal-dialog modal-frame modal-top modal-notify modal-success" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Body-->
            
            <div class="modal-body">
                <div class="row d-flex justify-content-center align-items-center">
                    <?=$this
    ->Form
    ->create(NULL, array(
    'url' => '/users/chklogin',
    'class' => 'modal-content animate'
)) ?>
                    <div class="imgcontainer">
                        <span data-dismiss="modal" class="close" title="Close Modal">&times;</span>
                        <!--<img src="../assets/images/login.jpg" alt="Avatar" width="100">-->
                        <?php echo $this
    ->Html
    ->image('login.jpg', ['alt' => 'mindzpro', 'width' => "100"]); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this
    ->Form
    ->text('username', ['class' => 'form-control', 'placeholder' => "E-mail"]); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this
    ->Form
    ->password('password', ['class' => 'form-control', 'placeholder' => "Password", 'id' => "password"]); ?>
                    </div>
                    <button type="submit" class="form-control btn btn-sm btn-login ">Login</button>
                    <label>
                        <span class="psw"><a href="<?=BASE_URL; ?>users/forgot-password">Forgot password?</a></span>
                        </form>
                        
                </div>
            </div>
            <div class="g-signin2"  onclick="ClickLogin()"  data-onsuccess="onSignIn"></div>    
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
                    <?=$this->Form->create(NULL, array('url' => '/users/add','class' => 'modal-content animate')) ?>
                    <div class="imgcontainer">
                        <span data-dismiss="modal" class="close" title="Close Modal">&times;</span>
                        <h2 class="text">Sign Up</h2>
                        <p>Please fill in this form to create an account!</p>
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                        </div>
                        <!--<input type="text" name="" class="form-control" placeholder="Username"/>-->
                        <?php echo $this
    ->Form
    ->text('first_name', ['class' => 'form-control', 'placeholder' => "Name"]); ?>
                    </div>
                    <br />
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                        </div>
                        <?php echo $this
    ->Form
    ->text('username', ['type' => 'email', 'class' => 'form-control', 'placeholder' => "E-mail"]); ?>
                    </div>
                    <br />
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-lock"></i></span>
                        </div>
                        <!--<input type="text" name="" class="form-control" placeholder="password"/>-->
                        <?php echo $this
    ->Form
    ->password('password', ['class' => 'form-control', 'placeholder' => "Password"]); ?>
                    </div>
                    <br />
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-phone"></i></span>
                        </div>
                        <?php echo $this
    ->Form
    ->text('phone', ['class' => 'form-control', 'placeholder' => "Phone Number"]); ?>
                    </div>
                    <br />
                    <div class="signup_account">
                        <a href="#" class="btn btn-default">Sign-Up as a User</a><a href="#"
                            class="btn btn-default">Sign-Up as a Seller</a>
                    </div>
                    <button type="submit" class="form-control btn btn-sm btn-login ">Sign Up</button>
                    <!-- <span class="psw">Forgot <a href="#">password?</a></span> -->
                    </form>
                    <p>Click here to
                        <a href="#" class="open_login" data-toggle="modal" data-target="#modalLogin"
                            data-dismiss="modal"> Login</a>
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
                            <li><a href="#" class="rounded-circle"><i class="fa fa-youtube"></i></a></li>
                            <li><a href="#" class="rounded-circle"><i class="fa fa-pinterest"></i></a></li>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="personal-info">
                        <p id="p-info"><i class="fa fa-envelope"></i> welcome@easifyy.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Top Bar -->
    <!-- header -->
    <header id="sticky-top">
        <div class="main-top">
            <nav id="top-nav" class="navbar navbar-expand-lg navbar-light fixed-navi1 serch" style="padding: 0px 25px;">
                <div class="container-fluid">
                    <!-- logo -->
                    <h1>
                        <a id="logo" class="navbar-brand" href="<?=BASE_URL?>">
                            <?php echo $this
    ->Html
    ->image('logo.png', ['alt' => 'mindzpro']); ?>
                            <!--<img src="../img/logo.png" alt="mindzpro">-->
                        </a>
                    </h1>
                    <!-- //logo -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="inner">
                        <?php
                    echo $this->Form->create(NULL,array('url'=>'https://easifyy.com/serach-service'));?>
                        <span class="search-icon"><i class="fa fa-search" aria-hidden="true"></i></span>
                        <input name="title" type="text" id="myInput" class="form-control" onkeyup="myFunction()"
                            placeholder="Type something...">
                        <script>
                        var SuperPlaceholder = function(options) {
                            this.options = options;
                            this.element = options.element
                            this.placeholderIdx = 0;
                            this.charIdx = 0;


                            this.setPlaceholder = function() {
                                placeholder = options.placeholders[this.placeholderIdx];
                                var placeholderChunk = placeholder.substring(0, this.charIdx + 1);
                                document.querySelector(this.element).setAttribute("placeholder", this.options
                                    .preText + " " + placeholderChunk)
                            };

                            this.onTickReverse = function(afterReverse) {
                                if (this.charIdx === 0) {
                                    afterReverse.bind(this)();
                                    clearInterval(this.intervalId);
                                    this.init();
                                } else {
                                    this.setPlaceholder();
                                    this.charIdx--;
                                }
                            };

                            this.goReverse = function() {
                                clearInterval(this.intervalId);
                                this.intervalId = setInterval(this.onTickReverse.bind(this, function() {
                                    this.charIdx = 0;
                                    this.placeholderIdx++;
                                    if (this.placeholderIdx === options.placeholders.length) {
                                        // end of all placeholders reached
                                        this.placeholderIdx = 0;
                                    }
                                }), this.options.speed)
                            };

                            this.onTick = function() {
                                var placeholder = options.placeholders[this.placeholderIdx];
                                if (this.charIdx === placeholder.length) {
                                    // end of a placeholder sentence reached
                                    setTimeout(this.goReverse.bind(this), this.options.stay);
                                }

                                this.setPlaceholder();

                                this.charIdx++;
                            }

                            this.init = function() {
                                this.intervalId = setInterval(this.onTick.bind(this), this.options.speed);
                            }

                            this.kill = function() {
                                clearInterval(this.intervalId);
                            }
                        }


                        window.onload = function() {
                            var sp = new SuperPlaceholder({
                                placeholders: [
                                    "Private Limited Company Registration ",
                                    "Limited Liability Partnership (LLP) ",
                                    "Legal Administration ",
                                    "GST Registration",
                                    "Mobile Marketing & Advertising",
                                    "Digital Marketing",
                                    "Website Development",
                                ],
                                preText: "Try ",
                                stay: 1000,
                                speed: 100,
                                element: '#myInput'
                            });
                            sp.init();
                        }
                        </script>
                        <button type="submit" class="btn btn-lg btn-search">Search</button>
                        <?php    
                    echo $this->Form->end();?>
                        <div class="content-list" id="services-results">
                            <!--<ul>
                        <li><a href="#">Adele</a></li>
                        <li><a href="#">Agnes</a></li>
                        <li><a href="#">Billy</a></li>
                        <li><a href="#">Bob</a></li>
                        <li><a href="#">Calvin</a></li>
                        <li><a href="#">Christina</a></li>
                        <li><a href="#">Cindy</a></li>
                    </ul>-->
                        </div>
                    </div>
                    <!-- Search Box End -->
                    <div class="collapse navbar-collapse text-center d-none d-lg-block">
                        <ul class="navbar-nav m-nav ml-lg-auto">
                            <li class="ml-lg-0 mb-lg-0">
                                <?php // echo $this->Url->build([ 'controller' => 'Business', 'action' => 'pacakges'])
 ?>
                                <a href="<?php echo BASE_URL; ?>business/pacakges" class="reqe-button">Business
                                    Packages</a>
                            </li>
                            <li class="ml-lg-0 mb-lg-0">
                                <a href="#" class="reqe-button">Make Money</a>
                            </li>
                            <li class="ml-lg-0 mb-lg-0">
                                <a href="<?php echo BASE_URL; ?>pages/contactUs" class="reqe-button">Talk to Us</a>
                            </li>
                            <li class="ml-lg-0 mb-lg-0">
                                <div class="btn-group">
                                    <a data-toggle="dropdown" class="test"><i class="fa fa-bars"></i></a>
                                    <ul class="dropdown-menu dots-menu rounded">
                                        <?php
                                    if ($this->Session->read('Auth.User')){
                                        $userData = $this->Session->read('Auth.User');
                                        if ($userData['role'] == 'admin'){
                                            echo '<li>' . $this
                                                ->Html
                                                ->link(" Dashboard", ['controller' => 'Users', 'action' => 'dashboard', 'prefix' => 'admin'], ['class' => 'fa fa-dashboard']) . '</li>';
                                            echo '<li>' . $this
                                                ->Html
                                                ->link(" Profile", ['controller' => 'Merchants', 'action' => 'profilePreview', 'prefix' => 'admin'], ['class' => 'fa fa-user']) . '</li>';
                                        }elseif ($userData['role'] == 'superadmin'){
                                            echo '<li>' . $this
                                            ->Html
                                            ->link(" Dashboard", ['controller' => 'Users', 'action' => 'dashboard', 'prefix' => 'superadmin'], ['class' => 'fa fa-dashboard']) . '</li>';
                                        }else{
                                            echo '<li>' . $this
                                                ->Html
                                                ->link(" Dashboard", ['controller' => 'Users', 'action' => 'dashboard'], ['class' => 'fa fa-dashboard']) . '</li>';
                                            echo '<li>';
                                            echo $this
                                                ->Html
                                                ->link(" Profile", ['controller' => 'Users', 'action' => 'profile'], ['class' => 'fa fa-user']);
                                            echo '</li>';
                                        }

                                        echo '<li>' . $this
                                            ->Html
                                            ->link(" Signout", ['controller' => 'Users', 'action' => 'signout'], ['class' => 'fa fa-sign-out']) . '</li>';
                                        }
                                        else
                                        {
                                            echo '<li><a href="#" class="abc" data-toggle="modal" data-target="#modalLogin" ><i class="fa fa-user" aria-hidden="true"></i> Login</a></li>';
                                            echo '<li><a href="' . $this
                                                ->Url
                                                ->build(['controller' => 'Users', 'action' => 'signup']) . '" ><i class="fa fa-sign-in" aria-hidden="true"></i> Sign Up</a></li>';
                                        } ?>
                                    </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <!-- //navigation -->
        <!-- navigation -->
        <div class="container-fluid px-0" id="cakephp">
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
                                    $className="";
                                    $mainCate = $this->Site->getAllCategories();
                                    foreach ($mainCate as $key => $brand){
                                        if ($brand->parent_id == null){
                                            switch (trim($brand->name)) {
                                                case "Audit & Bookeeping":
                                                    $className="n-dropdown";
                                                  break;
                                                case "Digital Marketing":
                                                    $className="cn-dropdown";
                                                    break;
                                                case "Website & Apps":
                                                    $className="n3-dropdown";
                                                    break;
                                                default:
                                                    $className="";
                                                  break;  
                                                } 
                                ?>
                                <li class="nav-item dropdown position-static <?=$className?>" id="superMenu">
                                    <a class="nav-link " href="#" data-id="7" id="navbarDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false"><?=trim($brand->name)?></a>
                                    <div class="dropdown-menu w-100 border-0 m-0 p-0" aria-labelledby="navbarDropdown">
                                        <div class="container-fluid pd-0">
                                            <div class="row menu-bg w-100">
                                                <?php 
                                                foreach ($brand->child_categories as $key1 => $subCate){
                                                    if ($subCate->delete_status == 1 and $subCate->status == 1 and $subCate->user_id == NULL){?>
                                                <div class="">
                                                    <h5><?= trim($subCate->name)?></h5>
                                                    <ul>
                                                        <?php 
                                                                foreach ($subCate->product_categories as $key1 => $products){
                                                                    if ($products->product->delete_status == 1 and $products->product->status == 1){?>
                                                        <li><a
                                                                href="<?php echo  $mbaseUrl.'service-details/'.urlencode($products->product->slug)?>"><?=trim($products->product->menu_title)?></a>
                                                        </li>
                                                        <?php 
                                                                    }
                                                                }
                                                            ?>
                                                    </ul>
                                                </div>
                                                <?php   }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <?php 
                                        }
                                    }
                                ?>
                               
                                <li class="nav-item dropdown position-static n-dropdown" id="superMenu">
                                    <!--<a class="nav-link " href="<?php echo $this->Url->build(['controller' => 'Business', 'action' => 'index']) ?>" id="navbarDropdown" role="button">
                                        Business Support
                                    </a>-->
                                    <a class="nav-link " href="#" data-id="9" id="navbarDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Business
                                        Support
                                    </a>
                                    <div class="dropdown-menu w-100 border-0 m-0 p-0" aria-labelledby="navbarDropdown">
                                        <div class="container-fluid">
                                            <div class="row menu-bg w-100">
                                                <div>
                                                    <ul>
                                                        <?php $allBusinessSupports = $this->Site->getAllBusinessSupport();
                                                    //print_r($allBusinessSupports);
                                                    //die();
                                                    foreach ($allBusinessSupports as $businessSupport){
                                                        //echo $businessSupport->name;
                                                        ?>
                                                        <li><a
                                                                href="/business-package/<?=$businessSupport->slug?>"><?=$businessSupport->name?></a>
                                                        </li>
                                                        <?php }
                                                   ?>
                                                        <!--<li><a href="/business-package/Business Funding">Business Funding</a></li>
                                                       <li><a href="/business-package/Cross Border Structuring & Taxation">Cross Border Structuring & Taxation</a></li>
                                                       <li><a href="/business-package/Business Structuring">Business Structuring</a></li>
                                                       <li><a href="/business-package/Virtual CFO">Virtual CFO</a></li>
                                                       <li><a href="/business-package/Asset Tracing">Asset Tracing</a></li>
                                                       <li><a href="/business-package/Preserve Wealth">Preserve Wealth/Money</a></li>
                                                       <li><a href="/business-package/Tax Planning">Tax Planning</a></li>
                                                       <li><a href="/business-package/Business Valuation">Business Valuation</a></li>
                                                       <li><a href="/business-package/Business & Investment Plan">Business & Investment Plan</a></li>
                                                       <li><a href="/business-package/Competitors Strategy">Competitors' Strategy</a></li>
                                                       <li><a href="/business-package/Financial Planning">Financial Planning</a></li>
                                                       <li><a href="/business-package/Foreign Client Support">Foreign Client Support</a></li>
                                                       <li><a href="/business-package/Corporate Governance">Corporate Governance</a></li>
                                                       <li><a href="/business-package/Business Analysis">Business Analysis</a></li>-->
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
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
@media only screen and (min-width: 767px) {
    .simple-menu .dropdown-menu {
        position: absolute;
        top: 100%;
        left: 22%;
        min-width: 180px;
        /*display: block;*/
    }

    .simple-menu .dropdown-menu li a {

        font-size: 16px;
        color: #5f6368 !important;

        font-weight: 600;
        /*padding: 4px 10px 2px;*/
        padding: 3px 20px;
        display: block !important;
    }

    .simple-menu .dropdown-menu li .text-dark {
        text-decoration: none;
        font-size: 13px;
        color: #5f6368 !important;
        font-weight: normal;
    }
}

.simple-menu .dropdown-menu .submenu li a {
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

@media only screen and (min-width: 767px) {
    .simple-menu .dropdown-menu ul {
        position: absolute;
        top: 0;
        left: 100%;
        min-width: 790px;
        background: #fff;
        display: none;
        box-shadow: 0 2px 10px rgba(0, 0, 0, .1);
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

<script>
    var clicked=false;//Global Variable
    function ClickLogin()
    {
        clicked=true;
    }

    function onSignIn(googleUser) {
        
        if (clicked) {
            var csrfToken = <?php echo json_encode($this->request->param('_csrfToken')) ?>;
            var profile = googleUser.getBasicProfile();
            
            if(profile.getId()!=""){
                console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
                console.log('Name: ' + profile.getName());
                console.log('token :' + csrfCustomerToken);
                console.log('Image URL: ' + profile.getImageUrl());
                console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
                jQuery.ajax({
                    type: "POST",
                    headers: {
                        'X-CSRF-Token': csrfToken,
                    },
                    url: 'https://easifyy.com/users/googleloginmain',
                    data: {
                        id: profile.getId(),
                        first_name:profile.getName(),
                        username:profile.getEmail(),
                    },
                    success: function (data, textStatus){
                        console.log('finalData',data);
                        if(data=="Already"){
                            //location.reload();
                            alert('Email Already Registerd');
                        } else if(data=="new User") {
                            alert("User Not Registered");
                            //window.location.replace("https://easifyy.com/users/dashboard");
                        } else if(data=="success") {
                            alert('Logged In Successfully');
                            window.location.replace("https://easifyy.com/users/dashboard");
                        } else if(data=="admin") {
                            alert('Logged In Successfully');
                            window.location.replace("https://easifyy.com/admin/users/dashboard");
                        } else {
                            alert('Logged In Successfully');
                            window.location.replace("https://easifyy.com/users/dashboard");
                        }
                       //location.reload();
                    },
                });
            }else{
                console.log('not Logged IN ');
            }
        }
    }
    </script>
    <script>
    $(document).ready(function() {
        $(".alert").fadeTo(2000, 500).slideUp(500, function(){
            $(".alert").slideUp(500);
        });
    });
</script>