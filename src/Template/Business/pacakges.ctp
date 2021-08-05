<?php
   /**
    * @var \App\View\AppView $this
    * @var \App\Model\Entity\Product[]|\Cake\Collection\CollectionInterface $products
    */
   ?>
<style>
body {
    padding: 0;
    margin: 0;
    background: #FFF;
    font-family: Source Sans Pro, Helvetica, sans-serif;
    overflow-x: hidden !important;
}

body a {
    transition: 0.5s all;
    -webkit-transition: 0.5s all;
    -moz-transition: 0.5s all;
    -o-transition: 0.5s all;
    -ms-transition: 0.5s all;
    text-decoration: none;
}

body a:hover {
    text-decoration: none;
    transition: 0.5s all;
    -webkit-transition: 0.5s all;
    -moz-transition: 0.5s all;
    -o-transition: 0.5s all;
    -ms-transition: 0.5s all;
}

.sub-curated-packages-nav-box .nav-tabs>li.active>a,
.sub-curated-packages-nav-box .nav-tabs>li.active>a:focus,
.sub-curated-packages-nav-box .nav-tabs>li.active>a:hover {
    border: 2px solid #f36 !important;
    border-bottom: none;
    background: #fff;
    box-shadow: none;
    color: #f36;
}

.package-card.standard-new-service {
    border: none;
    height: 410px;
}

.package-card {
    position: relative;
    height: 480px;
    border-radius: 6px;
    border: 1px solid #eaeaea;
    margin-bottom: 30px;
}

.standard-new-service .package-card-header {
    height: 50px;
    background-color: #d3baf1;
}

.package-card-header {
    background-color: #41d2d2;
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 10px;
}

.package-card-body-box {
    padding-bottom: 5px;
    border-bottom-left-radius: 6px;
    border-bottom-right-radius: 6px;
}

.package-card-body-box,
.standard-new-service .package-card-body,
.standard-new-service .profile-card-footer {
    background-color: #fff1e8;
}

.package-card-body-box,
.standard-new-service .package-card-body,
.standard-new-service .profile-card-footer {
    background-color: #fff1e8;
}

.package-card-body {
    padding: 10px;
}

.package-text {
    height: 200px;
    overflow-y: scroll;
}

body a:focus,
a:hover {
    text-decoration: none;
}

body.modal-open {
    padding-right: 0 !important;
}

.modal-open .modal {
    padding-right: 0 !important;
}

html {
    overflow-y: scroll !important;
}

.list-group-item,
.list-group-item:hover {
    z-index: auto;
}

input[type="button"],
input[type="submit"] {
    transition: 0.5s all;
    -webkit-transition: 0.5s all;
    -moz-transition: 0.5s all;
    -o-transition: 0.5s all;
    -ms-transition: 0.5s all;
}

input[type="button"]:hover,
input[type="submit"]:hover {
    transition: 0.5s all;
    -webkit-transition: 0.5s all;
    -moz-transition: 0.5s all;
    -o-transition: 0.5s all;
    -ms-transition: 0.5s all;
}

h1,
h2,
h3,
h4,
h5,
h6 {
    margin: 0;
    padding: 0;
}

p {
    margin: 0;
    padding: 0;
    font-size: 16px;
    line-height: 1.5;
    color: #222;
}

ul,
ol {
    margin: 0;
    padding: 0;
}

label {
    margin: 0;
}

.form-control:focus {
    outline: none;
    box-shadow: none;
}

.form-control {
    font-family: Source Sans Pro, Helvetica, sans-serif;
}

.btn:focus {
    outline: none;
    box-shadow: none;
}

a:focus,
button,
img {
    outline: none;
}

a:focus,
a:hover {
    text-decoration: none;
    outline: none
}

#main-header {
    background: #fff !important;
}

#sticky-top {
    background-color: #fff;
    transition: 0.3s;
    position: fixed;
    width: 100%;
    top: 45px;
    z-index: 1;
}

#sticky-top #logo img {
    text-decoration: none;
    transition: 0.3s;
}

#sticky-top #top-nav {
    padding: 15px 25px;
    transition: 0.3s;
}

.main-cont {
    margin-top: 9.7%;
}

/* bottom-to-top */
#toTop {
    display: none;
    text-decoration: none;
    position: fixed;
    bottom: 24px;
    right: 3%;
    border-radius: 50%;
    overflow: hidden;
    z-index: 999;
    width: 35px;
    height: 35px;
    border: none;
    text-indent: 100%;
    background: url(../images/move-top.png) no-repeat 0px 0px;
}

#toTopHover {
    width: 32px;
    height: 32px;
    display: block;
    overflow: hidden;
    float: right;
    opacity: 0;
    -moz-opacity: 0;
    filter: alpha(opacity=0);
}

/* //bottom-to-top */
.left-text-sc {
    text-align: left;
    float: left;
    list-style: none;
    color: #000 !important;
    padding: 0px 10px;
}

.navbar {
    padding: .5rem 0;
}

a.navbar-brand {
    font-size: 36px;
    color: #8e43e7;
    text-shadow: 2px 5px 3px rgba(0, 0, 0, 0.06);
}

.navbar-light .navbar-brand,
.navbar-light .navbar-brand:hover,
.navbar-light .navbar-brand:focus {
    color: #8e43e7;
}

.navbar-light .navbar-nav .nav-link {
    padding: 4px 10px 2px;
    color: #565656;
    font-size: 14px;
    font-weight: 500;
}

.navbar-expand-lg .navbar-nav .dropdown-menu {
    margin-top: 6px;
}

.dropdown-menu {
    font-size: 13px;
}

.navbar-light .navbar-nav .show>.nav-link,
.navbar-light .navbar-nav .active>.nav-link,
.navbar-light .navbar-nav .nav-link.show,
.navbar-light .navbar-nav .nav-link.active,
.navbar-light .navbar-nav .nav-link:hover,
.navbar-light .navbar-nav .nav-link:focus {
    color: #8e43e7;
}

.dropdown-item.active,
.dropdown-item:active {
    background-color: #000;
}

/* fixed nav */
nav.fixed-navi ul {
    list-style: none;
    margin: 0;
    padding: 0;
}

.full-nav ul {
    margin: auto;
}

nav.fixed-navi ul li {}

nav.navbar.navbar-expand-lg.navbar-light.fixed-navi {
    box-shadow: 1px 1px 1px 1px rgba(8, 8, 8, 0.08);
}

.m-nav {
    margin-top: 5px;
}

.m-nav li {
    margin-right: 5px;
}

.top-menu {
    border-bottom: 1px solid #ebebeb;
}

.serch {
    padding: 15px 25px;
    border-bottom: 1px solid #ebebeb;
}

.middle-top {
    margin: 0 auto !important;
}

* {
    box-sizing: border-box;
}

.pcolumns {
    float: left;
    width: 100%;
    padding: 8px;
}

.price {
    list-style-type: none;
    border: 1px solid #eee;
    margin: 0;
    padding: 0;
    -webkit-transition: 0.3s;
    transition: 0.3s;
}

.price:hover {
    box-shadow: 0 8px 12px 0 rgba(0, 0, 0, 0.2)
}

.price .header {
    background-color: #8e43e7;
    color: white;
    font-size: 25px;
}

.price li {
    border-bottom: 1px solid #eee;
    padding: 20px;
    text-align: center;
}

.price .grey {
    background-color: #eee;
    font-size: 20px;
}

.pbutton {
    background-color: #8e43e7;
    border: none;
    color: white;
    padding: 10px 25px;
    text-align: center;
    text-decoration: none;
    font-size: 18px;
}

.pbutton:hover {
    color: #fff;
}

.isFixed {
    position: relative;
    top: 0;
    left: 0;
    right: 0;
    background: #fff;
    transition: all 1.5s ease;
}

/* search */
li.search {
    margin-left: 17em;
}

.search i {
    color: #8c8b8b;
    font-size: 20px;
}

a.reqe-button {
    color: #62646a;
    border: 1px solid #8e43e7;
    padding: 9px 10px;
    border-radius: 5px;
    font-size: 13px;
    font-weight: 500;
    text-transform: uppercase;
}

a.reqe-button:hover {
    background-color: #8e43e7;
    color: #fff;
}

/* //search */
/* banner */
.banner-img {
    background: url(../images/main.jpg) no-repeat bottom;
    background-size: cover;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    -ms-background-size: cover;
    min-height: 44vw;
    border-radius: 203px 0 0 400px;
}

.style-banner {
    padding: 6em 6em 0 6em;
}

.style-banner h1 {
    font-size: 48px;
    line-height: 1.3;
    position: relative;
}

.style-banner h1:after,
h2.middle-title-w3:after {
    content: "";
    background: #8e43e7;
    width: 100px;
    height: 2px;
    position: absolute;
    bottom: -25px;
    left: 0;
}

.style-banner h1 span {
    color: #8e43e7;
}

.button-style {
    padding: 12px 23px;
    border: none;
    color: #fff;
    font-size: 14px;
    text-transform: uppercase;
    border: 2px solid #8e43e7;
    background: #8e43e7;
}

.button-style:hover {
    opacity: .9;
    color: #fff;
}

/* //banner text */
h3.title-w3 {
    font-size: 30px;
    position: relative;
    font-weight: 600 !important;
}

h3.title-w3:after {
    content: "";
    border-bottom: 5px solid #8e43e7;
    width: 70px;
    height: 2px;
    position: absolute;
    bottom: -18px;
    left: 45%;
    right: auto;
}

h3.title-w3:before {
    content: "";
    border-bottom: 5px dotted #8e43e7;
    width: 49px;
    height: 2px;
    position: absolute;
    bottom: -18px;
    left: 51.9%;
    right: auto;
}

#testi h3.title-w3:after,
#testi h3.title-w3:before {
    display: none;
}

ul.list-unstyled.brands li {
    display: inline-block;
    width: 18%;
    border: 1px solid #e6e6e6;
    margin: 0 9px;
    padding: 20px 0;
    cursor: pointer;
    border-radius: 10px;
}

ul.list-unstyled.brands li:hover {
    background: #f5f5f5;
}

ul.list-unstyled.brands li i {
    color: #e8e8e8;
    font-size: 70px;
    transition: 0.5s all;
    -webkit-transition: 0.5s all;
    -moz-transition: 0.5s all;
    -o-transition: 0.5s all;
    -ms-transition: 0.5s all;
}

ul.list-unstyled.brands li.active i,
ul.list-unstyled.brands li:hover i {
    color: #8e43e7;
    transition: 0.5s all;
    -webkit-transition: 0.5s all;
    -moz-transition: 0.5s all;
    -o-transition: 0.5s all;
    -ms-transition: 0.5s all;
}

/* //brands */
/* services */
.about-in .card {
    padding: 0;
    border: 1px solid transparent;
    -webkit-transition: box-shadow 0.3s ease-in-out;
    -moz-transition: box-shadow 0.3s ease-in-out;
    -ms-transition: box-shadow 0.3s ease-in-out;
    -o-transition: box-shadow 0.3s ease-in-out;
    transition: box-shadow 0.3s ease-in-out;
    background: #FDF8FF;
    border: 1px solid #e2dbff;
    border-radius: 15px;
}

.about-in .card:hover,
.about-in .card.active {
    background: #f6f6f6;
    -webkit-box-shadow: 0px 0px 18.69px 2.31px rgba(204, 204, 223, 0.5);
    -moz-box-shadow: 0px 0px 18.69px 2.31px rgba(204, 204, 223, 0.5);
    box-shadow: 0px 0px 18.69px 2.31px rgba(204, 204, 223, 0.5);
    border-radius: 15px;
}

.about-in .card i {
    font-size: 25px;
    color: #000;
    width: 55px;
    height: 55px;
    background: #d3baf1;
    border-radius: 50%;
    line-height: 55px;
    transition: all 0.5s ease-in-out;
}

.about-in .card:hover.card i {
    transform: rotate(360deg);
    transition: all 0.5s ease-in-out;
    background: #8e43e7;
    color: #fff;
}

.about-in .card h5.card-title {
    font-size: 15px;
    font-weight: 500;
    color: #404145;
    margin-bottom: 0 !important;
}

p.title-para {
    max-width: 800px;
}

/* //services */
/* middle section */
.right-side-img-w3 {
    background: url(../images/bg.jpg) no-repeat center;
    background-size: cover;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    -ms-background-size: cover;
    min-height: 40vw;
    float: right;
    width: 55%;
    border-radius: 250px 0 0 250px;
}

.left-build-wthree {
    float: left;
    width: 40%;
    padding: 3em 3.5em;
}

h2.middle-title-w3 {
    font-size: 35px;
    position: relative;
    line-height: 1.4;
}

.left-build-wthree h6 {
    font-size: 20px;
    color: #525252;
    line-height: 1.6;
}

ul.list-beach li p {
    font-size: 15px;
}

.left-build-wthree ul li i {
    color: #8e43e7;
    font-size: 22px;
}

/* //middle section */
.some-another {
    background: url(../images/bg2.jpg) no-repeat center;
    background-size: cover;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    -moz-background-size: cover;
    min-height: 42vw;
    position: relative;
    border-radius: 0 230px 230px 0;
    margin-right: 6em;
    margin-bottom: 15em;
}

.grid-single {
    position: absolute;
    bottom: -40%;
    max-width: 700px;
    margin: 0 auto;
    right: -101px;
    left: 0;
    box-shadow: 0px 0px 15.69px 3.31px rgba(204, 204, 223, 0.44);
}

h3.title-w3-2:before {
    left: 254px;
}

.grid-single p {
    font-size: 18px;
}

/* // */
.steps-reach-w3l span {
    line-height: 0;
}

.steps-reach-w3l span span {
    color: #fff;
    font-size: 28px;
    width: 100px;
    height: 100px;
    border: 2px solid #fff;
    line-height: 3.5;
    border-radius: 50%;
}

.steps-reach-w3l span span.fa.fa-gift {
    background: #8e43e7;
    cursor: pointer;
    animation: scale 1.3s alternate infinite ease-in;
}

.steps-reach-w3l span span.fa.fa-check-square-o {
    background: #ff4f81;
    cursor: pointer;
    animation: scale 1.5s alternate infinite ease-in;
}

.steps-reach-w3l span span.fa.fa-volume-control-phone {
    background: #3b9fec;
    cursor: pointer;
    animation: scale 1.8s alternate infinite ease-in;
}

.steps-reach-w3l span span.fa.fa-calendar {
    background: #2dde98;
    cursor: pointer;
    animation: scale 2.1s alternate infinite ease-in;
}

.steps-reach-w3l span.fa.fa-smile-o {
    background: #ffc168;
    cursor: pointer;
}

.steps-reach-w3l span span.fa.fa-comments {
    background: #8e43e7;
    cursor: pointer;
    animation: scale 2.4s alternate infinite ease-in;
}

.steps-reach-w3l p {
    color: #404145;
    font-size: 16px;
    font-weight: 500;
    line-height: 18px;
    cursor: pointer;
}

.steps-reach-w3l {
    position: relative;
    text-align: center;
}

@keyframes scale {
    0% {
        transform: scale(.8);
    }

    100% {
        transform: scale(1.2);
    }
}

@-webkit-keyframes bounce {

    0%,
    20%,
    50%,
    80%,
    100% {
        -webkit-transform: translateY(0);
    }

    40% {
        -webkit-transform: translateY(-30px);
    }

    60% {
        -webkit-transform: translateY(-15px);
    }
}

@-moz-keyframes bounce {

    0%,
    20%,
    50%,
    80%,
    100% {
        -moz-transform: translateY(0);
    }

    40% {
        -moz-transform: translateY(-30px);
    }

    60% {
        -moz-transform: translateY(-15px);
    }
}

@-o-keyframes bounce {

    0%,
    20%,
    50%,
    80%,
    100% {
        -o-transform: translateY(0);
    }

    40% {
        -o-transform: translateY(-30px);
    }

    60% {
        -o-transform: translateY(-15px);
    }
}

@keyframes bounce {

    0%,
    20%,
    50%,
    80%,
    100% {
        transform: translateY(0);
    }

    40% {
        transform: translateY(-30px);
    }

    60% {
        transform: translateY(-15px);
    }
}

.style-agile-border {
    position: absolute;
    top: 43px;
    right: -49px;
}

h3.title-w3-3 {
    margin: 0 auto;
}

h3.title-w3-3:before {}

/* testimonials */
.testimonials {
    background: url(../images/bg3.jpg) no-repeat center fixed;
    background-size: cover;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    -moz-background-size: cover;
}

.w3_testimonials_grid h5 {
    color: #8e43e7;
    font-size: 23px;
}

.w3_testimonials_grid h4 {
    max-width: 700px;
    font-size: 17px;
    margin: 0 auto;
    line-height: 1.4;
    color: #d4d4d4 !important;
}

.carousel-indicators li {
    width: 8px;
    height: 8px;
    background-color: transparent;
    border: 4px solid #fff;
    border-radius: 50%;
    cursor: pointer;
    margin: 0 5px;
}

.carousel-indicators .active {
    border: 4px solid #9854E7;
}

.carousel-indicators {
    position: absolute;
    right: 0;
    bottom: -12px;
}

/* //testimonials */
/* blog */
.blogs-bottom {
    box-shadow: 0px 2px 10px 1px rgba(0, 0, 0, 0.13);
}

.blog-w3 {
    -webkit-transition: all 0.5s;
    -moz-transition: all 0.5s;
    -o-transition: all 0.5s;
    -ms-transition: all 0.5s;
    transition: all 0.5s;
}

.blog-w3:hover {
    transform: scale(1.1);
    -webkit-transform: scale(1.1);
    -ms-transform: scale(1.1);
}

.blogs-bottom.p-4 h3 {
    font-size: 18px;
    color: #525050;
}

.blogs-bottom h4 {
    font-size: 16px;
    line-height: 20px;
    font-weight: 600;
}

.blogs-bottom i {
    color: #8e43e7;
}

.blogs-bottom a {
    color: #999;
    font-size: 14px;
}

.blogs-bottom a:Hover {
    color: #000;
}

.f-rt {
    text-align: right;
    margin: -20px 0 20px;
    display: block;
}

.button-style1 {
    color: #8e43e7;
    font-size: 14px;
}

/* //blog */
/* footer */
/* copyright */
p.copy-right-grids {
    font-size: 14px;
    color: #000;
    border-top: 1px solid #f5f5f5;
    padding-top: 10px;
}

p.copy-right-grids a {
    color: #8e43e7;
}

/* //copyright */
/* social-icons */
.w3social-icons ul li {
    display: inline-block;
}

.w3social-icons ul li a {
    color: #000;
    font-size: 14px;
    display: block;
    -webkit-box-shadow: 0px 0px 1px 0px #fff;
    -moz-box-shadow: 0px 0px 1px 0px #fff;
    box-shadow: 0px 0px 1px 0px rgba(19, 18, 18, 0.33);
    width: 25px;
    height: 25px;
    text-align: center;
    line-height: 23px;
    border: 1px solid #929292;
}

.w3social-icons ul li a:hover {
    color: #8e43e7;
    -webkit-box-shadow: 0px 0px 13px 2px #8e43e7;
    -moz-box-shadow: 0px 0px 13px 2px #8e43e7;
    box-shadow: 0px 0px 13px 2px #8e43e7;
}

/* //social-icons */
/* footer nav */
.footer h6 {
    font-size: 16px;
    font-weight: 600;
    margin-bottom: 10px;
}

ul.footer-nav-wthree li {
    display: block;
}

ul.footer-nav-wthree li a {
    color: #424242;
    font-size: 14px;
    padding: 0 0px;
    font-weight: 400;
    line-height: 30px;
}

ul.footer-nav-wthree li a:hover {
    color: #8e43e7;
}

/* //footer nav */
/* //footer */
/* inner pages */
.banner-w3ls-2 {
    background: url(../images/bg2.jpg) no-repeat center;
    background-size: cover;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    -ms-background-size: cover;
    min-height: 300px;
}

/* page details */
.breadcrumb li a {
    color: #8e43e7;
    font-weight: bold;
}

.breadcrumb li {
    color: #000;
}

/* //page details */
/* about page */
h1.tittle {
    text-shadow: 2px 2px 2px rgba(41, 41, 41, 0.15);
    font-size: 3em;
    color: #333338;
}

h2.sub-tittle {
    font-size: 16px;
    color: #8e43e7;
}

/* team */
.box16 {
    text-align: center;
    color: #fff;
    position: relative
}

.box16 .box-content,
.box16:after {
    width: 100%;
    position: absolute;
    left: 0
}

.box16:after {
    content: "";
    height: 100%;
    background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0, rgba(0, 0, 0, .08) 69%, rgba(0, 0, 0, .76) 100%);
    top: 0;
    transition: all .5s ease 0s
}

.box16 .post,
.box16 .title {
    transform: translateY(145px);
    transition: all .4s cubic-bezier(.13, .62, .81, .91) 0s
}

.box16:hover:after {
    background: linear-gradient(to bottom, rgba(0, 0, 0, .01) 0, rgba(0, 0, 0, .09) 11%, rgba(0, 0, 0, .12) 13%, rgba(0, 0, 0, .19) 20%, rgba(0, 0, 0, .29) 28%, rgba(0, 0, 0, .29) 29%, rgba(0, 0, 0, .42) 38%, rgba(0, 0, 0, .46) 43%, rgba(0, 0, 0, .53) 47%, rgba(0, 0, 0, .75) 69%, rgba(0, 0, 0, .87) 84%, rgba(0, 0, 0, .98) 99%, rgba(0, 0, 0, .94) 100%)
}

.box16 img {
    width: 100%;
    height: auto
}

.box16 .box-content {
    padding: 20px;
    margin-bottom: 20px;
    bottom: 0;
    z-index: 1
}

.box16 .title {
    font-size: 22px;
    font-weight: 700;
    margin: 0 0 10px
}

.box16 .post {
    display: block;
    padding: 8px 0;
    font-size: 15px
}

.box16 .social li a,
.box17 .icon li a {
    border-radius: 50%;
    font-size: 20px;
    color: #fff
}

.box16:hover .post,
.box16:hover .title {
    transform: translateY(0)
}

.box16 .social {
    list-style: none;
    padding: 0 0 5px;
    margin: 40px 0 25px;
    opacity: 0;
    position: relative;
    transform: perspective(500px) rotateX(-90deg) rotateY(0) rotateZ(0);
    transition: all .6s cubic-bezier(0, 0, .58, 1) 0s
}

.box16:hover .social {
    opacity: 1;
    transform: perspective(500px) rotateX(0) rotateY(0) rotateZ(0)
}

.box16 .social:before {
    content: "";
    width: 50px;
    height: 2px;
    background: #fff;
    margin: 0 auto;
    position: absolute;
    top: -23px;
    left: 0;
    right: 0
}

.box16 .social li {
    display: inline-block
}

.box16 .social li a {
    display: block;
    width: 40px;
    height: 40px;
    line-height: 40px;
    background: #8e43e7;
    margin-right: 10px;
    transition: 0.5s all;
    -webkit-transition: 0.5s all;
    -moz-transition: 0.5s all;
    -o-transition: 0.5s all;
    -ms-transition: 0.5s all;
}

.box17 .icon li,
.box17 .icon li a {
    display: inline-block
}

.box16 .social li a:hover {
    background: #fff;
    color: #8e43e7;
    transition: 0.5s all;
    -webkit-transition: 0.5s all;
    -moz-transition: 0.5s all;
    -o-transition: 0.5s all;
    -ms-transition: 0.5s all;
}

.box16 .social li:last-child a {
    margin-right: 0
}

/************New Css***************/
.join-w3l1 {
    background: #f8f9fa;
}

.top-bar {
    background: #FDF8FF;
    padding: 10px 25px 6px;
    border-bottom: 1px solid #e6e6e6;
    position: relative;
    left: 0;
    right: 0;
    top: 0;
    z-index: 111;
}

.top-bar .personal-info p {
    color: #000;
    text-align: right;
    font-size: 14px;
    font-weight: 400;
}

.top-bar .personal-info p i {
    color: #8e43e7;
}

.social {
    text-align: right;
    margin: 0px;
    padding: 0px;
}

.top-bar .social li {
    display: inline-block;
}

.top-bar.social li i {
    margin-right: 5px;
}

.top-bar .social li a {
    width: 25px;
    height: 25px;
    line-height: 25px;
    padding: 0px;
    display: inline-block;
    text-align: center;
    color: #555555;
    font-size: 14px;
    border-radius: 3px;
    background: #e6e6e6;
}

.top-bar .social li a:hover {
    color: #9c1c20;
}

.sticky {
    position: fixed;
    top: 0;
    width: 100%;
}

.sticky+.main-w3pvt {
    padding-top: 60px;
}

.inner {
    width: 35%;
    margin: 0px 0px 0 100px;
    position: relative;
}

.content-list {
    width: 100%;
    background: #FFF;
    display: inline-block;
    ;
    border-bottom: 1px solid #E1E1E1;
    -moz-box-shadow: 0 3px 5px 0 rgba(0, 0, 0, 0.25);
    -webkit-box-shadow: 0 3px 5px 0 rgba(0, 0, 0, 0.25);
    box-shadow: 0 3px 5px 0 rgba(0, 0, 0, 0.25);
    margin-bottom: 8px;
    display: none;
}

.search-icon {
    font-size: 18px;
    color: #8e43e7;
    ;
    left: 8px;
    top: 5px;
    position: absolute;
    width: 24px;
    height: 24px;
}

#myInput {
    width: 80%;
    font-size: 14px;
    font-family: Source Sans Pro, Helvetica, sans-serif;
    font-weight: 300;
    padding: 18px 20px 18px 30px;
    border: 2px solid #ddd;
    border-right: 0;
    margin-bottom: 0px;
    border-radius: .25rem 0 0 .25rem;
}

#myUL {
    list-style-type: none;
    padding: 0;
    margin: 2px 0 0;
    position: absolute;
    z-index: 11;
}

#myUL li a {
    border: 1px solid #ddd;
    margin-top: -1px;
    background-color: #f6f6f6;
    padding: 7px 12px;
    text-decoration: none;
    font-size: 15px;
    color: #000;
    display: block
}

#myUL li a:hover:not(.header) {
    background-color: #eee;
}

.btn-search {
    font-family: Source Sans Pro, Helvetica, sans-serif;
    background: #d3baf1;
    color: #000;
    border: 2px solid #d3baf1;
    padding: 0 1rem;
    border-radius: 0 .25rem .25rem 0;
    outline: none;
    box-shadow: 0;
    font-size: 14px;
    font-weight: normal;
}

.btn-search:focus {
    outline: none;
    box-shadow: none;
}

.btn-search:active,
.btn-search:hover {
    background: #8e43e7;
    color: #fff;
    border: 2px solid #8e43e7;
}

.carousel-item {
    height: auto;
    min-height: 420px;
    background: no-repeat center center scroll;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}

#carouselExampleIndicators .carousel-indicators {
    bottom: 10px;
}

#carouselExampleIndicators .carousel-caption {
    bottom: 20%;
}

#carouselExampleIndicators .carousel-caption p {
    color: #000;
}

.carousel-control-next,
.carousel-control-prev {
    display: none;
}

#testi .carousel-item {
    height: 100%;
    min-height: 100%;
}

#testi .button-style {
    padding: 12px 35px;
    border: none;
    color: #fff;
    font-size: 14px;
    text-transform: uppercase;
    border: 2px solid #8e43e7;
    background: #8e43e7;
}

#testi .button-style:hover {
    opacity: .9;
    color: #fff;
}

.footer {
    background: #E2DBFF;
}

.copy {
    border-top: 1px solid #d3d3d3;
}

.copy span {
    font-size: 14px;
    font-weight: 400;
    color: #a6a6a7;
}

.f-soc {
    margin-top: 30px;
}

.bg-lightpurple {
    background: #FDF8FF;
}

.test {
    margin: -10px 0 0 10px;
    cursor: pointer;
    padding: 0;
    font-size: 28px;
    text-align: center;
}

.test i {
    color: #62646a;
    line-height: 34px;
    transition: all linear 0.3s;
}

.test i:hover {
    color: #8e43e7;
}

#services,
#get-work,
#popular-services,
#how-it-work,
#get-inspired,
#testi,
#blog {
    padding-top: 20px !important;
    padding-bottom: 20px !important;
}

a.reqe-button i {
    font-size: 18px;
}

.dots-menu {
    left: -118px;
    right: auto;
    padding: 5px 0 !important;
}

.dots-menu li {
    list-style: none;
    padding: 3px 0px;
}

.dots-menu li a {
    font-size: 14px;
    font-weight: 400;
    color: #212529;
    display: block;
    padding: 3px 10px;
}

.dots-menu li a:hover {
    color: #fff !important;
    text-decoration: none;
    background-color: #8e43e7;
}

.bg-gray {
    background: #f8f9fa;
}

#popular-services {
    padding-bottom: 40px !important;
}

#popular-services .carousel-item {
    min-height: auto;
    height: auto;
}

#popular-services .carousel-control-next,
#popular-services .carousel-control-prev {
    display: block;
    width: auto;
    top: 46%;
}

#popular-services .carousel-control-next-icon,
#popular-services .carousel-control-prev-icon {
    background-color: #ddd;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    margin: 0 -20px;
    background-image: none;
    line-height: 30px;
}

#popular-services .l-arr i {
    font-size: 30px !important;
    color: #000;
}

#popular-services .pop,
.mlr {
    margin: 0 15px;
}

.slide-box {
    display: flex;
    justify-content: space-between;
}

.slide-box img {
    -ms-flex: 0 0 19%;
    flex: 0 0 19%;
    max-width: 20%;
}

#get-started {
    position: relative;
}

/*.image-content{position: absolute; top: 32%; left: 13%; right:40%; z-index: 11;}*/
.bg-darkred {
    background: #4a0d1f;
}

.image-cont {
    padding: 60px 20px;
}

.image-cont h4 {
    font-size: 26px !important;
}

.image-content {
    text-align: right;
}

#get-work h4 {
    font-size: 22px;
    font-weight: 600;
}

.work-area {
    padding: 0px 0 0px;
}

.work-heading {
    font-size: 18px;
    font-weight: 600;
    padding-top: 30px;
}

.work-heading i {
    color: #8e43e7;
    /*animation:shake 2s ease-in-out 2s infinite alternate;*/
    animation-name: spin;
    animation-duration: 5000ms;
    animation-iteration-count: infinite;
    animation-timing-function: linear;
}

@keyframes spin {
    from {
        transform: rotate(0deg);
    }

    to {
        transform: rotate(360deg);
    }
}

@-webkit-keyframes shake {

    0%,
    100% {
        -webkit-transform: translateX(0);
    }

    10%,
    30%,
    50%,
    70%,
    90% {
        -webkit-transform: translateX(-5px);
    }

    20%,
    40%,
    60%,
    80% {
        -webkit-transform: translateX(5px);
    }
}

@keyframes shake {

    0%,
    100% {
        transform: translateX(0);
    }

    10%,
    30%,
    50%,
    70%,
    90% {
        transform: translateX(-5px);
    }

    20%,
    40%,
    60%,
    80% {
        transform: translateX(5px);
    }
}

.work-area p {
    font-weight: 400;
    font-size: 15px;
    color: #4e4e4e;
    line-height: 20px;
}

.collapsed span,
.collapsed p {
    cursor: pointer;
}

.hastip {
    font-size: 14px;
    font-weight: 300;
    padding: 20px 10px;
}

.collapse.arrow-top {
    position: relative;
}

.collapse.arrow-top:after {
    content: " ";
    position: absolute;
    left: 8%;
    top: -15px;
    border-top: none;
    border-right: 15px solid transparent;
    border-left: 15px solid transparent;
    border-bottom: 15px solid #8e43e7;
}

.collapse.arrow-top1 {
    position: relative;
}

.collapse.arrow-top1:after {
    content: " ";
    position: absolute;
    left: 29%;
    top: -15px;
    border-top: none;
    border-right: 15px solid transparent;
    border-left: 15px solid transparent;
    border-bottom: 15px solid #ff4f81;
}

.collapse.arrow-top2 {
    position: relative;
}

.collapse.arrow-top2:after {
    content: " ";
    position: absolute;
    left: 49;
    top: -15px;
    border-top: none;
    border-right: 15px solid transparent;
    border-left: 15px solid transparent;
    border-bottom: 15px solid #3b9fec;
    ;
}

.collapse.arrow-top3 {
    position: relative;
}

.collapse.arrow-top3:after {
    content: " ";
    position: absolute;
    left: 69%;
    top: -15px;
    border-top: none;
    border-right: 15px solid transparent;
    border-left: 15px solid transparent;
    border-bottom: 15px solid #8e43e7;
}

.collapse.arrow-top4 {
    position: relative;
}

.collapse.arrow-top4:after {
    content: " ";
    position: absolute;
    left: 89%;
    top: -15px;
    border-top: none;
    border-right: 15px solid transparent;
    border-left: 15px solid transparent;
    border-bottom: 15px solid #2dde98;
}

.w-16 {
    -webkit-box-flex: 0;
    -ms-flex: 0 0 14%;
    flex: 0 0 14%;
    max-width: 14%;
}

.about-in {
    margin: 0 34px 40px;
}

.carousel {
    z-index: 0;
}

.carousel-wrap {
    margin: 0px auto;
    padding: 0 1.3%;
    width: 100%;
    position: relative;
    z-index: 0;
}

.owl-item {
    padding-bottom: 10px;
}

.owl-carousel .item {
    position: relative;
    z-index: 100;
    -webkit-backface-visibility: hidden;
    box-shadow: 0 1px 2px #898989;
    border-radius: 5px;
    transition: all linear 0.3s;
    cursor: pointer;
}

.owl-carousel .item:hover {
    box-shadow: 0 4px 4px #898989;
}

.owl-carousel .item:hover .img-cap {
    background: rgba(255, 255, 255, 1);
}

.owl-carousel .item img {
    border-radius: 5px;
}

.owl-nav>div {
    margin-top: -26px;
    position: absolute;
    top: 50%;
    color: #cdcbcd;
}

.owl-nav i {
    font-size: 30px;
    color: #8e43e7;
}

.owl-nav .owl-prev {
    left: -15px;
    position: absolute;
    top: 35%;
    background: #fff !important;
    width: 30px;
    height: 30px;
    line-height: 30px;
    border-radius: 50%;
    outline: none;
}

.owl-nav .owl-next {
    right: -15px;
    position: absolute;
    top: 35%;
    background: #fff !important;
    width: 30px;
    height: 30px;
    line-height: 30px;
    border-radius: 50%;
    outline: none;
}

.owl-carousel .owl-dots.disabled,
.owl-carousel .owl-nav.disabled {
    display: block;
}

.img-cap {
    background: rgba(255, 255, 255, 0.9);
    padding: 10px;
    position: absolute;
    left: 0;
    right: 0;
    bottom: 0;
    border-radius: 0 0 5px 5px;
}

.img-cap h6 {
    font-size: 15px;
    font-weight: 600;
}

.img-cap small {
    color: #4e4e4e;
}

.panel {
    border: 1px solid #d3baf1;
    background: #eee1fe;
    padding: 20px;
    border-radius: 5px;
    text-align: left;
    width: 98%;
    margin: 0 auto;
}

.panel-body {
    padding: 15px;
}

.panel-body .heading-sm {
    font-size: 26px;
    font-weight: 600;
}

.agile_gallery_grids {
    padding: 0 2em;
}

.demo>li {
    list-style-type: none;
    margin: 6px;
    display: inline-block;
    max-width: 355px;
}

.picshade {
    position: fixed;
    left: 0;
    top: 0;
    width: 100%;
    height: 100% !important;
    background-color: #000;
    opacity: 0.91;
    filter: alpha(opacity=91);
    z-index: 99;
    display: none;
}

.pictures_eyes_close {
    position: fixed;
    top: 30px;
    right: 30px;
    display: inline-block;
    width: 30px;
    height: 30px;
    background: url(../images/close.png) no-repeat;
    z-index: 100;
    display: none;
}

.pictures_eyes {
    position: fixed;
    width: 100%;
    left: 0;
    top: 0;
    z-index: 199;
    display: none;
}

.pictures_eyes_in {
    position: relative;
    text-align: center;
}

.pictures_eyes_in img {
    max-height: 500px;
    max-width: 640px;
}

.pictures_eyes_in .prev,
.pictures_eyes_in .next {
    position: absolute;
    top: 50%;
    width: 51px;
    height: 51px;
    cursor: pointer;
}

.pictures_eyes_in .prev {
    left: 35px;
    background: url(../images/left1.png) no-repeat;
}

.pictures_eyes_in .next {
    right: 35px;
    background: url(../images/right1.png) no-repeat;
}

.pictures_eyes_indicators {
    position: fixed;
    left: 0;
    bottom: 15px;
    width: 100%;
    text-align: center;
    z-index: 299;
}

.pictures_eyes_indicators a {
    display: inline-block;
    width: 50px;
    height: 50px;
    margin: 6px 3px 0 3px;
    border: 1px solid #ddd;
    border-radius: 10px;
    box-shadow: 0 0 2px #000;
    filter: alpha(opacity=50);
    opacity: 0.5;
    overflow: hidden;
}

.pictures_eyes_indicators img {
    height: 50px;
}

.pictures_eyes_indicators .current {
    filter: alpha(opacity=100);
    opacity: 1;
}

.gallery-grid1 {
    position: relative;
    overflow: hidden;
    cursor: pointer;
}

.gallery-grid1 .p-mask,
.row .product .vm-product-media-container .p-mask {
    opacity: 0;
    visibility: hidden;
    background: rgba(25, 24, 24, 0.8);
    bottom: 0%;
    position: absolute;
    padding: 1em 1em;
    width: 100%;
    -webkit-transform: translate3d(0px, 100%, 0px);
    -moz-transform: translate3d(0px, 100%, 0px);
    -ms-transform: translate3d(0px, 100%, 0px);
    -o-transform: translate3d(0px, 100%, 0px);
    transform: translate3d(0px, 100%, 0px);
    -webkit-transition: all .5s ease 0s;
    -moz-transition: all .5s ease 0s;
    transition: all .5s ease 0s;
    text-align: center;
    border-bottom: 5px solid #8e43e7;
}

.gallery-grid1 .p-mask .p-desc {
    color: #a3a3a3;
    position: relative;
    display: block;
    margin-bottom: 10px;
    padding-bottom: 10px;
    font-size: 1em;
}

.gallery-grid1:hover .p-mask,
.row .product:hover .p-mask {
    opacity: 1;
    visibility: visible;
    -webkit-transform: translate3d(0px, 0px, 0px);
    -moz-transform: translate3d(0px, 0px, 0px);
    -ms-transform: translate3d(0px, 0px, 0px);
    -o-transform: translate3d(0px, 0px, 0px);
    transform: translate3d(0px, 0px, 0px);
}

.p-mask h4,
.p-mask h2,
.p-mask h1 {
    color: #fff;
    font-size: 26px;
    font-weight: 600;
    letter-spacing: 1px;
}

.p-mask p {
    color: #f5f5f5;
    font-size: 13px;
    margin-top: 5px;
}

.pictures_eyes_in {
    position: relative;
    text-align: center;
}

.pictures_eyes_in img {
    width: 100%;
}

/* //gallery page */
/* contact page */
/* contact form */
.contact-top1 h1 {
    font-size: 28px;
}

form.contact-wthree .form-control {
    border-radius: 0;
    background: #eee;
    border: none;
    font-size: 15px;
}

form.contact-wthree label {
    width: 45px;
    height: 45px;
    text-align: center;
    background: #8e43e7;
    line-height: 45px;
    color: #eee;
    margin-bottom: 0;
}

.contact-top1 button {
    background: #8e43e7;
    border-radius: 0px;
    transition: 0.5s all;
    -webkit-transition: 0.5s all;
    -moz-transition: 0.5s all;
    -o-transition: 0.5s all;
    -ms-transition: 0.5s all;
}

.contact-top1 button:hover {
    opacity: .8;
    transition: 0.5s all;
    -webkit-transition: 0.5s all;
    -moz-transition: 0.5s all;
    -o-transition: 0.5s all;
    -ms-transition: 0.5s all;
}

/* //contact form */
/* contact details */
.contact-right-w3ls span {
    background: #fff;
    width: 40px;
    height: 40px;
    line-height: 40px;
}

.fv3-contact span {
    color: #fff;
    background: #8e43e7;
    width: 35px;
    height: 35px;
    line-height: 35px;
    text-align: center;
    border-radius: 50%;
}

.fv3-contact p,
.fv3-contact h2 {
    display: inline-block;
    vertical-align: middle;
    color: #333;
}

.fv3-contact h2 {
    font-size: 16px;
}

/* //contact details */
.map iframe {
    width: 100%;
    border: none;
    height: 400px;
}

/* //contact page */
/* Banner Search */
.search-container {
    position: relative;
    display: inline-block;
    cursor: pointer;
    margin: -1px 0px;
    height: 50px;
    vertical-align: bottom;
}

.search {
    position: absolute;
    transition: 0.2s linear;
    width: 300px;
    right: 0;
    height: 40px;
}

.search.toggle-off {
    width: 22px;
    transition: 0.2s linear;
}

.search .searchicon {
    width: 50px;
    height: 49px;
    position: absolute;
    right: 0;
    cursor: pointer;
    font-size: 22px;
    margin: 0;
    padding: 13px;
    background: #8e43e7;
    border-radius: 5px;
    transition: 0.3s;
}

.search input[type=text] {
    width: calc(100% - 89px);
    border: 1px solid #8e43e7;
    background: #ebe1f7;
    height: 49px;
    border-radius: 5px;
    padding: 0 10px;
    font-size: 14px;
    font-weight: normal;
}

/* Banner Search */
.w-20 {
    -webkit-box-flex: 0;
    -ms-flex: 0 0 20%;
    flex: 0 0 20%;
    max-width: 20%;
}

#how-it-work .modal-body {
    padding: 0;
}

.navbar-light .navbar-toggler {
    outline: none;
}

.modal-header .close {
    background: #8e43e7;
    outline: none;
}

.modal-header .close:focus {
    outline: none;
}

/***********Mega Menu*******************/
.dropdown.open>a {
    color: #8e43e7 !important;
}

.dropdown.open>a:after {
    color: #8e43e7 !important;
}

.dropdown-menu {
    border-radius: 0;
    border: 0;
}

.menu-bg {
    margin: 0;
    overflow: hidden;
    padding: 10px;
    border-radius: 0;
}

.menu-bg p {
    color: #404145;
    font-weight: 600;
}

/*.menu-bg:after {content: '';display: block;  position: absolute;left: -90px;right: 0;margin-left: auto;margin-right: auto;bottom: 100%;width: 0;height: 0;border-bottom: 30px solid #f8f7fb;border-top: 30px solid transparent;border-left: 30px solid transparent;border-right: 30px solid transparent;}*/
/*.menu-bg.arrow-top {margin-top: 0px;}
   .menu-bg.arrow-top:after {content: " ";position: absolute;right: 51%;top: -28px;border-top: none;border-right: 30px solid transparent;border-left: 30px solid transparent;border-bottom: 30px solid #f8f7fb;}
   */
.bg-hlight {
    background: #a3a3a3;
    padding: 3px 5px;
    margin-bottom: 8px;
}

.dropdown-menu ul li {
    line-height: 26px;
}

.dropdown-menu a,
.dropdown-menu ul li a {
    text-decoration: none;
    font-size: 14px;
    color: #5f6368 !important;
}

.dropdown-menu ul li a:hover,
.dropdown-menu ul li a.active,
.dropdown-menu ul li a:focus {
    color: #8e43e7 !important;
}

.popular {
    font-size: 14px;
    line-height: 27px;
    font-weight: 600;
    color: #fff;
    padding: 24px 0 0 70px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
}

.popular ul {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    width: 100%;
    margin-left: 12px;
}

.popular ul li {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    margin-right: 12px;
    white-space: nowrap;
}

.popular ul a {
    background-color: transparent;
    line-height: 24px;
    font-weight: 600;
    color: #fff;
    padding: 1px 12px 0;
    border: 1px solid #fff;
    border-radius: 40px;
    -webkit-transition: all .2s ease-in-out;
    -o-transition: all .2s ease-in-out;
    transition: all .2s ease-in-out;
}

.popular ul a:hover {
    background-color: #fff;
    color: #404145;
    text-decoration: none;
}

#how-it-work {
    outline: solid 3px #8e43e7;
    outline-offset: -15px;
}

.sw-theme-dots>ul.step-anchor {
    display: none;
}

.sw-theme-dots .step-content {
    padding: 0 0 10px !important;
}

.sw-theme-dots .sw-toolbar {
    padding-bottom: 10px !important;
}

/***********Mega Menu*******************/
/* responsive */
@media(min-width: 1600px) {
    .carousel-item {
        height: auto;
        min-height: 420px;
        background: no-repeat center center scroll;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }

    #carouselExampleIndicators .carousel-caption {
        width: 30%;
        margin: 0 auto;
        bottom: 12%;
    }

    .main-cont {
        margin-top: 8.7%;
    }
}

@media only screen and (min-width:1200px) and (max-width: 1340px) {
    .navbar-light .navbar-nav .nav-link {
        padding: 4px 9px 2px;
        font-size: 12px;
    }

    .side-open {
        display: block;
    }
}

@media only screen and (min-width:992px) and (max-width: 1199px) {
    .navbar-light .navbar-nav .nav-link {
        font-size: 11px;
        padding: 4px 5px 2px;
    }

    a.navbar-brand {
        font-size: 34px;
    }

    a.reqe-button {
        font-size: 12px;
        padding: 15px 10px;
        text-transform: uppercase;
        font-weight: 500;
    }

    .style-banner {
        padding: 5em 2em 0 2em;
    }

    .style-banner h1 {
        font-size: 38px;
    }

    .banner-img {
        border-radius: 130px 0 0 250px;
    }

    h3.title-w3:after {
        left: 43%;
    }

    h3.title-w3:before {
        left: 51%;
    }

    .about-in .card {
        padding: 1em .5em;
    }

    .left-build-wthree {
        width: 100%;
        float: none;
        padding: 0 3.5em;
    }

    .right-side-img-w3 {
        min-height: 520px;
        width: 90%;
        border-radius: 200px 0 0 200px;
        margin-top: 2em;
    }

    h3.title-w3-2:before {
        left: 254px;
    }

    .some-another {
        min-height: 44vw;
        margin-right: 2em;
        border-radius: 0 200px 200px 0;
    }

    .grid-single {
        right: -61px;
    }

    .blogs-bottom h4 {
        font-size: 15px;
    }

    .blogs-bottom.p-4 h3 {
        font-size: 16px;
    }

    .blogs-bottom a {
        font-size: 13px;
    }

    h1.tittle {
        font-size: 2.5em;
    }

    .demo>li {
        max-width: 295px;
    }

    .map iframe {
        height: 320px;
    }

    .contact-bottom {
        padding: 0;
    }

    .carousel-item {
        min-height: 390px;
        height: auto;
    }

    #carouselExampleIndicators .carousel-caption {
        padding: 10px;
        bottom: 7%;
    }

    ul.list-unstyled.brands li {
        width: 17%;
    }

    .inner {
        width: 33%;
        margin: 0px 0px 0 24px;
    }

    .top-bar .personal-info p {
        font-size: 14px;
    }

    .about-in {
        margin: 0 8px 10px;
    }

    .w-16 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 15%;
        flex: 0 0 15%;
        max-width: 15%;
    }

    .style-banner h1 {
        font-size: 36px;
    }

    h3.title-w3 {
        font-size: 26px;
    }

    #services,
    #get-work,
    #popular-services,
    #how-it-work,
    #get-inspired,
    #testi,
    #blog {
        padding: 20px 0 !important;
    }

    .card-body {
        padding: 0 10px;
    }

    .about-in .card h5.card-title {
        font-size: 15px;
        margin-bottom: 0 !important;
    }

    .side-open {
        display: block;
    }

    .popular {
        padding: 24px 0 0;
    }
}

@media only screen and (min-width:768px) and (max-width: 991px) {
    #top-nav {
        padding: 5px 25px 5px !important;
    }

    #sticky-top {
        top: 0 !important;
    }

    .inner {
        width: 100%;
        margin: 10px auto 0;
    }

    .navbar {
        padding: 0;
    }

    .navbar-light .navbar-nav .nav-link {
        padding: 8px 0 2px;
    }

    .carousel-item {
        min-height: 390px;
        height: auto;
    }

    .carousel-fade .carousel-item {
        min-height: auto;
        height: auto;
    }

    #carouselExampleIndicators .carousel-caption {
        bottom: 6%;
        left: 10%;
        right: 10%;
    }

    #carouselExampleIndicators .carousel-caption h2 {
        font-size: 1.8rem;
    }

    .inner {
        padding-bottom: 10px;
    }

    .about-in {
        margin: 0 6px 10px;
    }

    .w-16 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 15%;
        flex: 0 0 15%;
        max-width: 15%;
    }

    ul.list-unstyled.brands li {
        width: 17%;
        margin: 0px 2px 10px;
        padding: 12px 0;
    }

    .card-body {
        padding: 10px;
    }

    .about-in .card h5.card-title {
        font-size: 15px;
        margin-bottom: 0 !important;
    }

    .style-banner h1 {
        font-size: 34px;
    }

    .button-style {
        font-size: 13px;
    }

    .banner-img {
        border-radius: 140px 0 0 240px;
        min-height: 56vw;
        margin-left: 10em;
    }

    .right-side-img-w3 {
        min-height: 410px;
        border-radius: 150px 0 0 150px;
    }

    .banner-w3ls-2 {
        min-height: 200px;
    }

    .some-another {
        margin-right: 1em;
    }

    .w3_testimonials_grid h4 {
        font-size: 15px;
    }

    h3.title-w3::after {
        left: 41.2%;
    }

    .image-cont {
        padding: 54px 40px;
    }

    h3.title-w3 {
        font-size: 30px;
    }

    .style-agile-border {
        display: none;
    }

    .steps-reach-w3l p {
        font-size: 14px;
    }

    #services,
    #get-work,
    #popular-services,
    #how-it-work,
    #get-inspired,
    #testi,
    #blog {
        padding: 20px 0 !important;
    }

    .work-heading {
        font-size: 16px;
        font-weight: 700;
        padding-top: 10px;
    }

    .work-area p {
        font-size: 14px;
        padding-bottom: 20px;
    }

    .blog-w3ls {
        padding: 0 20px;
    }

    .clps img {
        width: 60%;
        margin: 20px 0;
    }

    .side-open {
        display: block;
    }

    .search:focus {
        width: 210px;
        padding: 0 24px 0 10px;
    }

    .modal-dialog {
        max-width: 95%;
    }

    .popular {
        padding: 24px 0 0;
    }
}

@media(max-width: 767px) {
    body {
        overflow-x: hidden !important;
    }

    #top-nav {
        padding: 5px 25px 5px !important;
    }

    #sticky-top {
        top: 0 !important;
    }

    .nav.fixed-navi ul {
        padding: 10px 0 !important;
    }

    .inner {
        width: 100%;
        margin: 5px auto 0;
        padding-bottom: 5px;
    }

    .w-16 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 47%;
        flex: 0 0 47%;
        max-width: 47%;
    }

    .style-banner h1 {
        font-size: 28px;
    }

    p {
        font-size: 16px;
        line-height: 20px;
    }

    .navbar {
        padding: 0rem 1rem;
    }

    .style-banner {
        padding: 2em 2em 2em;
    }

    h3.title-w3 {
        font-size: 26px;
    }

    h3.title-w3::after {
        left: 36%;
        width: 50px;
        bottom: -10px;
    }

    h3.title-w3:before {
        left: 50%;
        bottom: -10px;
    }

    h3.title-w3-3,
    h3.title-w3-2 {
        font-size: 24px;
    }

    .navbar-light .navbar-nav .nav-link {
        padding: 8px 0;
    }

    .carousel-item {
        min-height: 500px;
    }

    #carouselExampleIndicators .carousel-caption {
        bottom: 0%;
        left: 10%;
        right: 10%;
    }

    #carouselExampleIndicators .carousel-caption h2 {
        font-size: 1.5rem;
    }

    .banner-w3ls-2 {
        min-height: 120px;
    }

    #services,
    #get-work,
    #popular-services,
    #how-it-work,
    #get-inspired,
    #testi,
    #blog {
        padding: 20px 0 !important;
    }

    #get-work h4 {
        font-size: 20px;
        font-weight: 700;
    }

    .work-heading {
        font-size: 18px;
        font-weight: 700;
        padding-bottom: 10px;
    }

    .work-area p {
        font-size: 14px;
    }

    .slide-box1 img {
        margin-top: 20px;
    }

    .steps-reach-w3l {
        margin-bottom: 30px;
    }

    .style-agile-border {
        display: none;
    }

    .collapse.arrow-top::after,
    .collapse.arrow-top1::after,
    .collapse.arrow-top2::after,
    .collapse.arrow-top3::after {
        left: 45%;
        right: auto;
    }

    .about-in {
        margin: 0 auto 10px;
    }

    ul.list-unstyled.brands li {
        width: 17%;
        margin: 0px 2px 10px;
        padding: 12px 0;
    }

    .card-body {
        padding: 10px;
        margin: 0 10px;
    }

    .steps-reach-w3l p {
        font-size: 15px;
        font-weight: 600;
        padding: 0 14px;
    }

    .about-in .card h5.card-title {
        font-size: 17px;
        margin-bottom: 0 !important;
    }

    .carousel-control-next,
    .carousel-control-prev {
        display: none;
    }

    .txt-ctr {
        text-align: center !important;
    }

    .owl-carousel .item {
        width: 265px;
        margin: 0 auto;
    }

    .owl-nav .owl-prev {
        left: 0;
        top: 40%;
    }

    .owl-nav .owl-next {
        right: 0;
        top: 40%;
    }

    .carousel-wrap {
        margin: 20px auto 0;
    }

    .btn-search {
        padding: 0 5px;
    }

    .image-cont {
        padding: 20px 20px;
    }

    .f-rt {
        text-align: center;
        margin: 44px 0 -14px;
    }

    .f-rt1 {
        text-align: center;
        margin: 44px 0 10px;
    }

    .footer-nav-wthree {
        margin-bottom: 20px;
    }

    .side-open {
        display: block;
    }

    .search-container {
        margin: 20px 0 0 255px;
    }

    .search:focus {
        width: 160px;
        padding: 0 24px 0 10px;
    }

    .w-20 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 48%;
        flex: 0 0 48%;
        max-width: 48%;
    }

    .copy {
        text-align: center;
        padding: 10px 0;
    }

    .copy .navbar-brand {
        margin-right: 0;
    }

    .f-soc {
        margin: 20px 0;
    }

    #how-it-work {
        outline-offset: -10px;
    }

    .popular {
        padding: 10px 0 0 0px;
        display: inline-block;
    }

    .popular ul {
        display: inline-block;
        width: auto;
        margin-left: 0px;
    }

    .popular ul li {
        display: inline-block;
        margin-right: 0;
    }
}

.hidden {
    display: none
}

/* //responsive */
.ty-mainbox-title {
    margin-bottom: 20px;
    font-size: 24px;
    letter-spacing: normal;
    text-transform: Capitalize;
}

.ty-control-group {
    margin-bottom: 10px;
    margin: 0 0 12px 0;
    vertical-align: middle;
}

.ty-control-group__title {
    display: block;
    padding: 6px 0;
    font-weight: bold;
    font-size: 14px;
}

.ty-mainbox-container {
    padding: 20px;
    box-shadow: 2px 2px 20px rgba(0, 0, 0, .1);
    margin-top: 0px;
    margin-bottom: 50px;
}

.btn-save:active,
.btn-save:hover {
    background: #d3baf1;
    color: #000;
    border: 10px solid #d3baf1;
}

.btn-save {
    background: #8e43e7;
    color: #fff;
    border: 10px solid #8e43e7;
    padding: 1px 25px;
    border-radius: .25rem;
    outline: none;
    font-size: 16px;
}

.side-card-heading {
    font-size: 21px;
    text-align: center;
}

@media only screen and (min-width: 768px) and (max-width: 991px) {
    .side-card-heading {
        font-size: 16px;
    }

    .text-bold {
        font-size: 13px;
    }

    .para {
        font-size: 13px;
    }

    .text-note {
        font-size: 10px;
    }
}

.icon-box {
    color: #fff;
    margin: 0 auto;
    left: 0;
    right: 0;
    width: 95px;
    height: 95px;
    border-radius: 50%;
    z-index: 9;
    background: #82ce34;
    padding: 15px;
    text-align: center;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
}

.icon-box i {
    font-size: 58px;
    position: relative;
    top: 3px;
}

.site-header__title {
    text-align: center;
    font-size: 60px;
    font-weight: 700;
    padding-top: 20px;
}

@media only screen and (max-width:768px) {
    .icon-box {
        width: 70px;
        height: 70px;
    }

    .icon-box i {
        font-size: 40px;
    }

    .site-header__title {
        font-size: 28px;
    }
}

@import url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');

#team {
    background: #fff !important;
}

section .section-title {
    text-align: center;
    color: #007b5e;
    margin-bottom: 50px;
    text-transform: uppercase;
}

#team .card {
    border: none;
    box-shadow:
}

.image-flip:hover .backside,
.image-flip.hover .backside {
    -webkit-transform: rotateY(0deg);
    -moz-transform: rotateY(0deg);
    -o-transform: rotateY(0deg);
    -ms-transform: rotateY(0deg);
    transform: rotateY(0deg);
    border-radius: .25rem;
    box-shadow: 0px 0px 10px rgb(158, 158, 158);
}

.image-flip:hover .frontside,
.image-flip.hover .frontside {
    -webkit-transform: rotateY(180deg);
    -moz-transform: rotateY(180deg);
    -o-transform: rotateY(180deg);
    transform: rotateY(90deg);
}

.mainflip {
    -webkit-transition: 1s;
    -webkit-transform-style: preserve-3d;
    -ms-transition: 1s;
    -moz-transition: 1s;
    -moz-transform: perspective(1000px);
    -moz-transform-style: preserve-3d;
    -ms-transform-style: preserve-3d;
    transition: 1s;
    transform-style: preserve-3d;
    position: relative;
}

.frontside {
    position: relative;
    -webkit-transform: rotateY(0deg);
    -ms-transform: rotateY(0deg);
    z-index: 2;
    margin-bottom: 30px;
}

.backside {
    position: absolute;
    top: 0;
    left: 0;
    background: white;
    -webkit-transform: rotateY(-180deg);
    -moz-transform: rotateY(-180deg);
    -o-transform: rotateY(-180deg);
    -ms-transform: rotateY(-180deg);
    transform: rotateY(-180deg);
    -webkit-box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
    -moz-box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
    width: 100%;
}

.frontside,
.backside {
    -webkit-backface-visibility: hidden;
    -moz-backface-visibility: hidden;
    -ms-backface-visibility: hidden;
    backface-visibility: hidden;
    -webkit-transition: 1s;
    -webkit-transform-style: preserve-3d;
    -moz-transition: 1s;
    -moz-transform-style: preserve-3d;
    -o-transition: 1s;
    -o-transform-style: preserve-3d;
    -ms-transition: 1s;
    -ms-transform-style: preserve-3d;
    transition: 1s;
    transform-style: preserve-3d;
}

/*.frontside .card,
   .backside .card {
   min-height: 320px;
   }*/
.backside .card {
    padding: 10px 0px 10px 0px;
    background-color: #fff;
}

.backside .card a {
    color: #000 !important;
}

.frontside .card a {
    color: #000;
}

.frontside .card {
    padding: 10px 0px 10px 0px;
    background-color: #FDF8FF;
}

.frontside .card .card-title,
.backside .card .card-title {
    color: #000 !important;
    margin-top: 30px;
    text-transform: uppercase;
    font-size: 18px;
}

.frontside .card .card-body img {
    width: 120px;
    height: 120px;
    border-radius: 50%;
}

.backside .card .card-body img {
    width: 120px;
    height: 120px;
    border-radius: 50%;
}

.income_points li::before {
    content: "✓";
    color: rgb(57, 206, 130);
    font-size: 16px;
    margin: 5px;
}

.income_points li {
    list-style: none;
}

.income_points {
    padding-left: 0px !important;
}

.flex-grow-1 {
    font-weight: 700;
}

/*.card-body{
   margin-top: 10px;
   }*/
.add {
    border: 1px solid #fff;
    background-color: #fff;
    font-weight: 600;
    width: 0px;
    color: #979797;
}

.add:hover,
.sub:hover {
    color: #000;
}

.add:focus {
    outline: none;
}

.sub:focus {
    outline: none;
}

.sub {
    border: 1px solid #fff;
    background-color: #fff;
    font-weight: 600;
    width: 22px;
    color: #979797;
}

#qty {
    border: 1px solid #eee;
    width: 45px;
    height: 25px;
    text-align: center;
}

#qty:focus {
    outline: none;
}

.time_style {
    color: #929292;
    font-size: 14px;
}

.chat_box:hover {
    background-color: #8E43E7;
    color: #fff !important;
}

.image-gallery-slide img {
    max-width: 100%;
    height: 100%;
    object-fit: contain;
    margin: auto;
}

.image-gallery-slide.center {
    position: relative;
}

.image-gallery-slide {
    background: 0 0 !important;
}

.image-gallery-slide {
    background: #fff;
    left: 0;
    position: absolute;
    top: 0;
    width: 100%;
}

[role=button] {
    cursor: pointer;
}

.image-gallery-fullscreen-button {
    right: 0;
}

.image-gallery-fullscreen-button,
.image-gallery-play-button {
    bottom: 0;
}

.image-gallery-fullscreen-button,
.image-gallery-left-nav,
.image-gallery-play-button,
.image-gallery-right-nav {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    background-color: transparent;
    border: 0;
    cursor: pointer;
    outline: none;
    position: absolute;
    z-index: 4;
}

.image-gallery-slide img {
    width: 100%;
}

img {
    vertical-align: middle;
}

img {
    border: 0;
}

@media (max-width: 768px) {
    .flex-grow-1 {
        line-height: 1.8 !important;
    }

    .image-gallery-image {
        height: 220px;
        line-height: 220px;
        overflow: hidden;
    }
}

.heading {
    margin-bottom: 20px;
    margin-top: 20px;
    font-size: 24px;
    font-weight: 700;
}

.about_section {
    font-size: 22px;
    font-weight: 800;
    float: left;
}

.gig-panel {
    background-color: #fff;
    border: 1px solid #fff;
    box-shadow: 0 2px 10px rgba(0, 0, 0, .1);
    text-align: left;
}

.description p {
    color: #98a4aa;
    text-rendering: optimizeLegibility;
    font-size: 14px;
    line-height: 1.4;
}

.heading {
    font-size: 24px;
}

.list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.list li {
    position: relative;
    margin-bottom: 10px;
}

._content h4 {
    font-size: 1rem;
    margin-bottom: .5rem;
    margin-top: .7rem;
}

._content-text {
    font-size: 14px;
    font-style: italic;
    padding-left: 10px;
    color: #fff;
}

.plan_section {
    padding: 20px;
    margin-bottom: 50px;
    border: 1px solid #dfdfdf;
    border-radius: 2px;
    box-shadow: 0 1px 3px 0 hsla(0, 0%, 78%, .5);
}

.plan_section:hover {
    box-shadow: 2px 2px 20px rgba(0, 0, 0, .1)
}

.list-display li {
    margin-bottom: .4rem;
    font-size: 1.1rem;
}

.list-display {
    padding-left: 1.5rem;
}

.list-checkmarks {
    padding-left: 2.25rem;
    padding-top: 1.5rem;
    padding-right: 1.5rem;
}

.list-checkmarks li,
.list-display li {
    list-style-type: none;
    font-size: 14px;
    margin-bottom: .4rem;
}

.view-details .btn-save {
    font-size: 14px;
}

.query .btn {
    font-size: 14px;
}

@media(min-width: 768px) {
    .main-cont {
        padding: 0 50px;
    }

    .view-details .btn-save {
        margin-top: 0px;
    }

    /*.list-checkmarks {
   border-right: 1px solid #eee;
   }*/
    .view-details p {
        padding-top: 66px;
        font-size: 14px;
    }
}

@media(max-width: 767px) {
    .query {
        display: none;
    }

    .main-cont {
        padding: 0 10px;
    }

    .view-details p {
        padding-top: 20px;
        font-size: 14px;
    }

    .view-details .btn-save {
        margin-top: 10px;
    }
}

.query {
    padding: 15px 20px;
    border: 1px solid #dfdfdf;
    border-radius: 2px;
    box-shadow: 0 1px 3px 0 hsla(0, 0%, 78%, .5);
}

.query1 {
    padding: 15px 20px;
    margin-top: 10px;
    margin-bottom: 10px;
    border: 1px solid #dfdfdf;
    border-radius: 2px;
    box-shadow: 0 1px 3px 0 hsla(0, 0%, 78%, .5);
}

.query h5,
.query1 h5 {
    margin-bottom: 10px;
    line-height: 1.5;
    font-weight: 600;
}

.query form {
    margin-top: 15px;
}

@media(min-width: 768px) and (max-width: 1200px) {

    .query .btn,
    .query h5,
    .query label {
        font-size: 12px;
    }
}

.list-checkmarks .list_more:before {
    content: "";
}

.list-checkmarks .list_more1:before {
    content: "";
}

.list-checkmarks .list_more2:before {
    content: "";
}

.list_more,
.list_more1,
.list_more2 {
    margin-left: -6px;
    font-size: 16px;
}

.hide_list,
.hide_list1,
.hide_list2 {
    display: none;
}

.assurance-ul li {
    /* margin-top: 10px;
   margin-bottom: 5px;*/
    margin-left: 0;
    font-size: 14px;
    font-weight: bold;
    list-style: none;
}

.assurance-ul li>img {
    vertical-align: middle;
    margin: 10px 10px 10px 0;
}

._1s7Acb {
    margin-top: 15px;
}

._1s7Acb ul {
    margin: 0;
    position: relative;
}

._1s7Acb ul li:after {
    content: " ";
    width: 1px;
    height: 30px;
    background: #ccc;
    display: block;
    margin: 0 -35px;
}

._1s7Acb ul li {
    list-style-image: none;
    list-style-type: none;
    background-image: url(../images/PDP-section-process-state-blue.svg);
    background-size: 28px;
    background-repeat: no-repeat;
    line-height: 30px;
    padding-left: 48px;
    margin-bottom: 0;
    font-size: 15px;
}

._1s7Acb ul li:last-child:after {
    bottom: 30px;
    position: absolute;
}

.stepper-horizontal {
    display: flex;
    align-items: center;
    /* background: #d3baf1;*/
    height: 50px;
    justify-content: center;
    margin-left: 0;
    margin-bottom: 0;
    margin-top: 10px;
}

.list-inline>li {
    padding-right: 5px;
    padding-left: 5px;
}

.stepper-horizontal li span .fa-star {
    color: gold;
}

.about-list-arrows {
    font-size: 15px;
    height: 20px;
    width: 20px;
    line-height: 18px;
    text-align: center;
    color: #8e43e7;
    border-radius: 50%;
    margin: 0 0 0 -35px;
    float: left;
    border: 1px solid;
    transition: 0.5s;
    -webkit-transition: 0.5s;
    -moz-transition: 0.5s;
    -ms-transition: 0.5s;
    -o-transition: 0.5s;
}

.stepper-horizontal li span {
    background: #FDF8FF;
    color: #8e43e7;
    font-weight: 600;
    font-size: 14px;
    border: 1.5px solid #8e43e7;
    padding: 12px 15px;
    border-radius: 25px;
}

.btn-callback {
    background: #8E43E7;
    color: #fff;
    border: 2px solid #8E43E7 !important;
    border-radius: 5px !important;
}

.btn-callback:hover {
    background: #d3baf1 !important;
    border: 1px solid #d3baf1 !important;
    color: #000 !important;
}

.plan_price {
    border: 1px solid #007bff;
    background: #007bff;
    text-align: center;
    margin-top: 5px;
    color: #fff;
}

#home p {
    font-size: 14px;
    line-height: 1.4;
}

#home h3,
#info h3,
#faq h3,
#work h3 {
    padding-top: 1.5rem;
    padding-bottom: 1.5rem;
}

#work {
    margin-bottom: 30px;
}

#faq b,
#faq p {
    font-size: 14px;
    line-height: 1.4;
}

#faq .faq_answer {
    color: #666;
}

.description p {
    color: #000;
    text-rendering: optimizeLegibility;
    font-size: 17px;
    line-height: 1.4;
}

.heading {
    font-size: 24px;
}

@media(min-width: 768px) {
    .main-cont {
        padding: 0 50px;
    }

    .view-details .btn-save {
        margin-top: 0px;
    }
}

@media(max-width: 767px) {
    .query {
        display: none;
    }

    .main-cont {
        padding: 0 10px;
    }
}

@media(min-width: 768px) and (max-width: 1200px) {

    .query .btn,
    .query h5,
    .query label {
        font-size: 12px;
    }
}

.query .form-control,
.query label {
    font-size: 14px;
}

.nav-tabs {
    /*box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 3px 1px -2px rgba(0,0,0,0.12), 0 1px 5px 0 rgba(0,0,0,0.2);*/
    border-top: 1px solid #dee2e6;
    border-right: 1px solid #dee2e6;
    border-left: 1px solid #dee2e6;
}

.nav-tabs .nav-link {
    border: none;
    border-radius: 0;
    transition: color .2s ease-out;
}

.tabs-dark .nav-link {
    color: #000;
    padding: 15px 93px;
}

.tabs-light .nav-link {
    color: rgba(0, 0, 0, .5);
}

.tabs-dark .nav-link:not(.active):hover {
    color: #aeb0b3;
}

.tabs-light .nav-link:not(.active):hover {
    color: #495057;
}

.nav-pills .nav-link {
    border-radius: 2px;
    color: #495057;
    transition: color .2s ease-out, box-shadow .2s;
}

.nav-link {
    padding: 15px;
}

.nav-link.active {
    font-weight: bold;
}

.nav-pills.pills-dark .nav-link.active {
    background-color: #343a40 !important;
    box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.12), 0 1px 5px 0 rgba(0, 0, 0, 0.2);
}

.nav-tabs .nav-item.show .nav-link,
.nav-tabs .nav-link.active {
    background-color: #d3baf1;
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
    box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.12), 0 1px 5px 0 rgba(0, 0, 0, 0.2);
    position: absolute;
}

.list-display li {
    margin-bottom: .4rem;
    font-size: 1.1rem;
}

.list-display {
    padding-left: 1.5rem;
}

.services {
    padding-top: 2rem;
    padding-bottom: 2rem;
}

.list-numbers {
    padding-top: 1rem;
    padding-left: 1rem;
}

.list-numbers li {
    font-size: 14px;
    border-bottom: 1px solid #ededed;
    padding: 15px 5px;
}

/*.list-checkmarks {
   padding-left:2.2rem;
   padding-top: 0.3rem;
   padding-right: 1.5rem;
   }*/
.list-checkmarks li,
.list-display li {
    list-style-type: none;
    font-size: 14px;
    margin-bottom: .4rem;
}

.faq-list {
    padding-left: 1.6rem;
    font-size: 14px;
}

.faq_que li .faq_question:before {
    background-image: url(../images/information.png);
    margin: 0;
    padding: 0;
    left: 38px;
    width: 18px;
    height: 20px;
    content: " ";
    position: absolute;
    background-size: 100%;
    background-repeat: no-repeat;
}

.faq_que {
    list-style: none;
    padding-left: 2rem;
}

.faq_que li .faq_answer:before {
    background-image: url(../images/arrows.png);
    margin: 0;
    padding: 0;
    left: 38px;
    width: 18px;
    height: 20px;
    content: " ";
    position: absolute;
    background-size: 100%;
    background-repeat: no-repeat;
}

.faq_answer {
    list-style: none;
    padding-left: 10px;
}

.faq_question {
    font-weight: 600;
    color: #000;
    padding-bottom: 15px;
    padding-left: 10px;
}

.review_section {
    padding: 25px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, .1);
    border: 1px solid #e8eef3;
}

.review_section h3 {
    font-size: 35px;
    font-weight: 600;
    line-height: 1.3em;
    margin-top: 0;
    margin-bottom: 30px;
}

.text-name {
    margin-bottom: -10px;
    font-weight: 600;
    font-size: 20px;
}

.text-para-reviews {
    color: #000;
    font-size: 14px;
}

.text-para-reviews {
    padding-bottom: 25px;
}

.review_section .fa-star {
    color: gold;
    font-size: 14px;
    margin-right: 3px;
}

.para {
    font-size: 14px;
}

.dot-pink {
    color: #8f41e8;
}

._1s7Acb ul {
    margin: 0;
    position: relative;
}

._1s7Acb ul li:after {
    content: " ";
    width: 1px;
    height: 30px;
    background: #ccc;
    display: block;
    margin: 0 -34px;
}

._1s7Acb ul li {
    list-style-image: none;
    list-style-type: none;
    background-image: url(../images/PDP-section-process-state-blue.svg);
    background-size: 28px;
    background-repeat: no-repeat;
    line-height: 30px;
    padding-left: 48px;
    margin-bottom: 0;
    font-size: 14px;
}

._1s7Acb ul li:last-child {
    background-image: url(https://d2s63alnkuz6gf.cloudfront.net/assets/website/ui_icons/PDP/PDP-section-process-state-green.svg);
}

._1s7Acb ul li:last-child:after {
    bottom: 30px;
    position: absolute;
}

.section_img {
    height: 36px;
    width: auto;
    margin-right: 10px;
}

.nav-pill ul {
    border: 1px solid #e3e3e3;
}

.tab-content {
    padding: 20px;
    border-left: 1px solid #e3e3e3;
    border-right: 1px solid #e3e3e3;
    border-bottom: 1px solid #e3e3e3;
}

.talk_us {
    padding: 70px 0;
    box-shadow: 2px 2px 20px rgba(0, 0, 0, .1);
    margin-top: 30px;
    margin-bottom: 50px;
    background: #FDF8FF;
    background: url(../assets/images/contact-center.jpg) no-repeat center fixed;
    background-size: cover;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    -moz-background-size: cover;
}

.nav-pills .nav-link.active,
.nav-pills .show>.nav-link {
    color: #000 !important;
    background-color: #d3baf1 !important;
}

.income_points li:before {
    color: #8E43E7;
}

/*@media(max-width: 1390px){
   .dropdown-menu a, .dropdown-menu ul li a{
   font-size: 12px !important;
   }
   .dropdown-menu ul li {
   line-height: 22px;
   }
   }*/
/*@media(min-width:448px) and (max-width: 708px){
   .stepper-horizontal li span{
   font-size: 8px;
   padding: 7px;	
   }
   }*/
@media(min-width:768px) and (max-width: 788px) {
    .stepper-horizontal li span {
        font-size: 13px;
        padding: 12px 15px;
    }
}

@media(min-width:357px) and (max-width: 447px) {
    .stepper-horizontal li span {
        font-size: 6px;
        padding: 5px;
    }
}

@media(max-width:523px) {
    .stepper-horizontal {
        display: block;
        margin-bottom: 65px;
    }

    .stepper-horizontal li span {
        font-size: 9px;
        padding: 3px 6px;
    }
}

@media(min-width:523px) and (max-width: 655px) {
    .stepper-horizontal li span {
        font-size: 9px;
        padding: 3px;
    }
}

@media(min-width:655px) and (max-width: 908px) {
    .stepper-horizontal li span {
        font-size: 12px;
        padding: 5px;
    }
}

@media(max-width: 356px) {
    .stepper-horizontal li span {
        display: block;
    }
}

@media(min-width:768px) and (max-width: 1305px) {
    .view-details .btn-save {
        padding: 0;
        font-size: 12px;
    }
}

@media(min-width:1341px) and (max-width:1435px) {
    .navbar-light .navbar-nav .nav-link {
        font-size: 12px;
    }
}

@media(max-width:619px) {
    .search {
        left: -126px;
    }
}

.service_section {
    border: 1px solid #dfdfdf;
    border-radius: 2px;
    box-shadow: 0 1px 3px 0 hsla(0, 0%, 78%, .5);
    height: 100px;
    margin: 0 5px 5px;
    padding: 25px 10px;
}

.service_section:hover {
    box-shadow: 0 2px 10px rgba(0, 0, 0, .1);
}

.service_title {
    text-align: center;
}

.service_icon {
    height: 50px;
    width: 50px;
    border-radius: 50px;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: auto;
    background: #FDF8FF;
    border: 1px solid #eee;
    margin-left: 5px;
}

.package-card-body .btn-link:focus,
.package-card-body .btn-link:hover {
    color: #f36;
}

.text-price {
    color: #000;
    font-size: 18px;
}

.actual-price,
.save-price {
    font-size: 14px;
    font-family: SofiaLight;
}

.actual-price {
    color: #979797;
    margin-right: 6px;
}

.save-price {
    color: #00f;
}

.package-card-body-box,
.standard-new-service .package-card-body,
.standard-new-service .profile-card-footer {
    background-color: #fdf8ff;
}

.package-card .hire-designer-button {
    font-size: 16px;
    padding: 8px 12px;
    text-align: center;
}

.hire-designer-button {
    padding: 8px 10px;
    background: #d3baf1;
    text-align: left;
    color: #000;
    font-size: 16px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    font-family: bold !important;
    width: 100%;
    background: #d3baf1;
}

.how-it-work-box {
    margin-top: 10px;
    height: 400px;
    background-color: #fff9e5;
    padding: 30px 60px;
    border-radius: 6px;
}

.message-item::before {
    background: #e8eef3;
    border-radius: 0;
    bottom: -30px;
    content: "";
    height: 100%;
    left: -29px;
    position: absolute;
    width: 1.2px;
}

.rating-assured-label,
.reviews-box-ui .rating-ui-label {
    vertical-align: middle;
    padding: 12px 25px;
    border-radius: 25px;
    font-family: SofiaLight;
    color: #000;
}

.reviews-box-ui .rating-ui-label {
    background: #f2eb59;
    font-size: 18px;
}

.reviews-box-ui .rating-ui-label .fa-star {
    color: #255dea;
}

.text-name {
    margin-bottom: -10px;
}

.text-para-reviews {
    color: #000;
    font-size: 18px;
    margin-top: 15px;
}

.text-name .fa-star {
    color: gold;
    font-size: 14px;
    margin-left: 5px;
}

.panel {
    border: 1px solid #d3baf1;
    background: #eee1fe;
    padding: 20px;
    border-radius: 5px;
    text-align: left;
    width: 98%;
    margin: 0 auto;
    margin-bottom: 30px;
}
</style>
<div class="container main-w3pvt main-cont">
    <section id="team" class="py-5">
        <div class="container">
            <div class="row">
                <div class="container-fluid">
                    <div class="main-w3pvt">
                        <div class="ty-mainbox-container clearfix" style="background-color:#ddd3ee">
                            <div class="row text-center">
                                <div class="col-md-12">
                                    <span class="heading">
                                        Business Packages
                                    </span>
                                    <div class="description">
                                        <p>
                                            You select the package and we assign our top-rated website expert.
                                            Request for samples, Pay in instalments, track work delivery with 100%
                                            assurance.
                                        </p>
                                    </div>
                                    <ul class="list-inline stepper-horizontal">
                                        <li><span>100% Assured</span></li>
                                        <li><span><i class="fa fa-star"></i> 4.9 &nbsp;400+ Reviews</span>
                                        </li>
                                        <li><span>Refund Protection </span></li>
                                        <li class="hidden-xs hidden-sm"><span>Dedicated Support</span></li>
                                        <li class="hidden-xs hidden-sm"><span>Secure</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--<div class="row">
                     <div class="col-md-12">
                        <div>
                           <ul class="nav nav-tabs tabs-dark " id="myTab" role="tablist">
                              <li class="nav-item">
                                 <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false">Website Development</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" id="work-tab" data-toggle="tab" href="#work" role="tab" aria-controls="home" aria-selected="false">Content Writing</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">Marketing</a>
                              </li>
                           </ul>
                        </div>
                        <div class="tab-content">
                           <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                              <div class="row services">
                                 <div class="col-md-12 text-center">
                                    <h2>Select Product</h2>
                                    <ul class="list-inline stepper-horizontal">
                                       <li><span><img width="33" src="https://wizcounsel.s3.amazonaws.com/product_logo/91/General_website.png" alt="Complete SEO Package"> General Business Website</span></li>
                                       <li><span><img width="33" src="https://wizcounsel.s3.amazonaws.com/product_logo/89/Ecomerce_website.png" alt="Complete SEO Package"> Ecommerce Website</span>
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           <div class="tab-pane" id="work" role="tabpanel" aria-labelledby="info-tab">
                              <div class="col-md-12 text-center mt-4">
                                 <h2>Select Product</h2>
                                 <ul class="list-inline stepper-horizontal">
                                    <li><span><img width="33" src="https://wizcounsel.s3.amazonaws.com/product_logo/121/General_business_blog.png" alt="Complete SEO Package"> General Business Blogs</span></li>
                                    <li><span><img width="33" src="https://wizcounsel.s3.amazonaws.com/product_logo/115/Website_content.png" alt="Complete SEO Package"> Google Ads</span>
                                    </li>
                                    <li><span><img width="33" src="https://wizcounsel.s3.amazonaws.com/product_logo/127/Social_media_content.png" alt="Complete SEO Package">Social Media Marketing </span></li>
                                 </ul>
                              </div>
                           </div>
                           <div class="tab-pane" id="info" role="tabpanel" aria-labelledby="info-tab">
                              <div class="col-md-12 text-center mt-4">
                                 <h2>Select Product</h2>
                                 <ul class="list-inline stepper-horizontal">
                                    <li><span><img width="33" src="https://wizcounsel.s3.amazonaws.com/product_logo/149/Complete_SEO.png" alt="Complete SEO Package"> Complete SEO Package</span></li>
                                    <li><span><img width="33" src="https://wizcounsel.s3.amazonaws.com/product_logo/130/adg.png" alt="Complete SEO Package"> Google Ads</span>
                                    </li>
                                    <li><span><img width="33" src="https://wizcounsel.s3.amazonaws.com/product_logo/128/Social_media_Marketing.png" alt="Complete SEO Package">Social Media Marketing </span></li>
                                    <li class="hidden-xs hidden-sm"><span><img width="33" src="https://wizcounsel.s3.amazonaws.com/product_logo/129/Facebook_ADS.png" alt="Complete SEO Package"> Facebook Ads</span></li>
                                 </ul>
                              </div>
                           </div>
                           <div class="tab-pane active" id="faq" role="tabpanel" aria-labelledby="contact-tab">
                              <div class="col-md-12 text-center mt-4">
                                 <h2>Select Product</h2>
                                 <ul class="list-inline stepper-horizontal">
                                    <li><span><img width="33" src="https://wizcounsel.s3.amazonaws.com/product_logo/66/Logo_Design.png" alt="Complete SEO Package"> Logo Design</span></li>
                                    <li><span><img width="33" src="https://wizcounsel.s3.amazonaws.com/product_logo/104/Ctalogue_deign.png" alt="Complete SEO Package"> Catalog Design</span>
                                    </li>
                                    <li><span><img width="33" src="https://wizcounsel.s3.amazonaws.com/product_logo/69/Menu_design.png" alt="Complete SEO Package">Menu Design </span></li>
                                    <li class="hidden-xs hidden-sm"><span><img width="33" src="https://wizcounsel.s3.amazonaws.com/product_logo/67/Packaging_design.png" alt="Complete SEO Package"> Packaging Design</span></li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>-->
                    </div>
                </div>
            </div>
            <div class="container">
                <?php 
               $count=1; 
               //foreach ($pacakges as $rService):
               if(!is_null($rService[0])){ 
            ?>

                <?php
                  $mymodal = '';
                  $myUrl = '../order/' . base64_encode($rService[0]->id);
                  $myUrlBas = $myUrl . '/' . base64_encode("1");
                  $myUrlStd = $myUrl . '/' . base64_encode("2");
                  $myUrlPre = $myUrl . '/' . base64_encode("3");
                  $bkAmount = base64_encode("0");
                  $fullAmount = base64_encode("1");
                  $basicPoints = 0;
                  $stPoints = 0;
                  $prPints = 0;
                  ?>

                <div id="tab_content_37815" class="tab-pane in active">
                    <h4 class="heading-sm text-center my-4"><?= $rService[0]->title?></h4>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="package-card standard-new-service" id="see_more_package_info0_37815">
                                <div class="package-card-header">
                                    <p class="package-head-name">Basic</p>
                                </div>
                                <div class="package-card-body-box">
                                    <div class="package-card-body">
                                        <div class="package-text">
                                            <span>
                                                <ul>
                                                    <!--<li>1 Initial Logo Design Concept</li>
                                          <li>3 Revisions of Selected Concept</li>
                                          <li>High Resolution</li>
                                          <li>All File Formats ( PNG, JPEG)</li>-->
                                                    <?php $incPoints = explode("\n", trim($rService[0]->_basic_price_desc)); ?>
                                                    <?php foreach ($incPoints as $incPoint) : ?>
                                                    <li><?= $incPoint ?></li>
                                                    <?php $basicPoints++;
                                          endforeach; ?>
                                                </ul>
                                            </span>
                                            <!--<a class="btn btn-link" id="see_more_package_info_hide_0_37815">See more</a>-->
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <ul class="list-inline text-left"
                                            style="border-bottom: 2px solid rgb(234, 234, 234); margin-left: 0px;"></ul>
                                        <p class="text-price">
                                            <strike class="actual-price">Rs. <?=$rService[0]->_basic_price?></strike>
                                            Rs. <?=$rService[0]->_basic_plan_price?><span class="inclusive-price">All
                                                Inclusive</span><br />
                                            <span class="save-price">Save Rs.
                                                <?php echo round($rService[0]->_basic_price - $rService[0]->_basic_plan_price);?></span>
                                        </p>
                                    </div>
                                </div>
                                <?php if ($rService[0]->_basic_booking_price != 0) { ?>
                                <a align="left" class="btn btn-primary btn-block btn-price"
                                    href="<?= $myUrlBas . '/' . $bkAmount ?>">
                                    <span style="font-weight:600;">Pay Booking Amt Rs.</span><span class="service-price"
                                        price="<?php echo h($rService[0]->_basic_booking_price) ?>">
                                        <?php echo h($rService[0]->_basic_booking_price) ?></span>
                                </a>
                                <?php } ?>

                                <!--div class="profile-card-footer">
                              <button class="btn hire-designer-button">Pay Booking Amount Rs. 500</button>
                           </div>-->
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="package-card standard-new-service" id="see_more_package_info1_37815">
                                <div class="package-card-header">
                                    <p class="package-head-name">Standard</p>
                                </div>
                                <div class="package-card-body-box">
                                    <div class="package-card-body">
                                        <div class="package-text">
                                            <span>
                                                <ul>
                                                    <?php $incPoints = explode("\n", trim($rService[0]->_standard_price_desc)); ?>
                                                    <?php foreach ($incPoints as $incPoint) : ?>
                                                    <li><?php
                                                if ($stPoints >= $basicPoints) {
                                                   echo "<b>" . $incPoint . "</b>";
                                                } else {
                                                   echo $incPoint;
                                                }
                                                ?></li>
                                                    <?php $stPoints++;
                                       endforeach; ?>
                                                </ul>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <ul class="list-inline text-left"
                                            style="border-bottom: 2px solid rgb(234, 234, 234); margin-left: 0px;"></ul>
                                        <p class="text-price">
                                            <strike class="actual-price">Rs.
                                                <?php echo h($rService[0]->_standard_price) ?></strike> Rs.
                                            <?=$rService[0]->_standard_plan_price?><span class="inclusive-price">All
                                                Inclusive</span><br />
                                            <span class="save-price">Save Rs.
                                                <?php echo round($rService[0]->_standard_price - $rService[0]->_standard_plan_price)?></span>
                                        </p>
                                    </div>
                                </div>
                                <?php if ($rService[0]->_standard_booking_price != 0) { ?>
                                <a align="left" class="btn btn-primary btn-block btn-price"
                                    href="<?= $myUrlStd . '/' . $bkAmount ?>">
                                    <span style="font-weight:600; ">Booking Amount Rs.</span><span class="service-price"
                                        price="<?php echo h($rService[0]->_standard_booking_price) ?>">
                                        <?php echo h($rService[0]->_standard_booking_price) ?></span>
                                </a>
                                <?php } ?>
                                <!--
                              <div class="profile-card-footer">
                                 <button class="btn hire-designer-button">Pay Booking Amount Rs. 500</button>
                              </div>
                                    -->
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="package-card standard-new-service" id="see_more_package_info2_37815">
                                <div class="package-card-header">
                                    <p class="package-head-name">Premium</p>
                                </div>
                                <div class="package-card-body-box">
                                    <div class="package-card-body">
                                        <div class="package-text">
                                            <span>
                                                <ul>
                                                    <?php $incPoints = explode("\n", trim($rService[0]->_premium_price_desc)); ?>
                                                    <?php foreach ($incPoints as $incPoint) : ?>
                                                    <li>
                                                        <?php
                                                if ($prPints >= $stPoints) {
                                                   echo "<b>" . $incPoint . "</b>";
                                                } else {
                                                   echo $incPoint;
                                                }
                                                ?>
                                                    </li>
                                                    <?php $prPints++;
                                             endforeach; ?>
                                                </ul>
                                            </span>

                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <ul class="list-inline text-left"
                                            style="border-bottom: 2px solid rgb(234, 234, 234); margin-left: 0px;"></ul>
                                        <p class="text-price">
                                            <strike class="actual-price">Rs.
                                                <?php echo h($rService[0]->_premium_price) ?></strike> Rs.
                                            <?php echo h($rService[0]->_premium_plan_price) ?><span
                                                class="inclusive-price">All Inclusive</span><br />
                                            <span class="save-price">Save Rs.
                                                <?php echo round($rService[0]->_premium_price - $rService[0]->_premium_plan_price)?></span>
                                        </p>
                                    </div>
                                </div>
                                <?php if ($rService[0]->_premium_booking_price != 0) { ?>
                                <a align="left" class="btn btn-primary btn-block btn-price"
                                    href="<?= $myUrlPre . '/' . $bkAmount ?>">
                                    <span style="font-weight:600;">Booking Amount Rs.</span><span class="service-price"
                                        price="<?php echo h($rService[0]->_premium_booking_price) ?>">
                                        <?php echo h($rService[0]->_premium_booking_price) ?></span>
                                </a>
                                <?php } ?>
                                <!--<div class="profile-card-footer"><button class="btn hire-designer-button">Pay Booking Amount Rs. 500</button></div>-->
                            </div>
                        </div>
                    </div>
                </div>
                <?php $count++;} ?>
            </div>
        </div>
    </section>
    <div class="container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner slider-img">
                <div class="carousel-item active">
                    <img class="d-block w-100"
                        src="https://file-examples-com.github.io/uploads/2017/10/file_example_JPG_1MB.jpg"
                        alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100"
                        src="https://file-examples-com.github.io/uploads/2017/10/file_example_JPG_2500kB.jpg"
                        alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100"
                        src="https://file-examples-com.github.io/uploads/2017/10/file_example_JPG_2500kB.jpg"
                        alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <section class="talk_us text-center py-5" style="background-image: url('../assets/images/purple.jpg');">
        <div class="container">
            <div class="row text-center">
                <a href="#" class="btn button-style mt-sm-4 mt-4 mb-4 mx-auto" style="padding: 12px 50px;">Talk to
                    us</a>
            </div>
        </div>
    </section>
    <section class="page-contant">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="public_reviews">
                        <div class="panel panel-default reviews-box-ui">
                            <div class="panel-body">
                                <h2 class="scope-heading" style="margin-bottom: 10px;">Reviews <span
                                        class="rating-ui-label"> <i class="fa fa-star"></i>&nbsp;5/5&nbsp;based on 1k+
                                        Booked</span></h2>
                                <div class="reviews-box">
                                    <ul class="list-unstyled reviews-list">
                                        <?php 
                              if (!is_null($rService[0]->product_reviews)) {
                                 foreach ($rService[0]->product_reviews as $review) : ?>
                                        <li>
                                            <p class="text-name">
                                                <?= $review->reviewer_name ?>
                                                <?php if ($review->rating == 1) { ?>
                                                <span class="fa fa-star"></span>
                                                <?php } elseif ($review->rating == 2) { ?>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <?php } elseif ($review->rating == 3) { ?>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <?php } elseif ($review->rating == 4) { ?>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <?php } elseif ($review->rating == 5) { ?>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <?php } ?>
                                            </p>
                                            <p class="text-para-reviews"><?= $review->review_text ?></p>
                                        </li>
                                        <?php endforeach;
                              } ?>
                                        <!--<li>
                                 <p class="text-name">Shardul Aswal 
                                    <span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span>
                                 </p>
                                 <p class="text-para-reviews">Ankhil is a very Quick and responsive Professional. 
                                    He takes complete information and process diligently with complete  satisfaction.
                                 </p>
                              </li>
                              <li>
                                 <p class="text-name">Abhay Singh <span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></p>
                                 <p class="text-para-reviews">Prompt Response to all queries. Very good experience</p>
                              </li>
                              <li>
                                 <p class="text-name">Deep Chatterjee <span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></p>
                                 <p class="text-para-reviews">on time Delivary,Good Skill and Knowledge..</p>
                              </li>
                              <li>
                                 <p class="text-name">Ropan Mandal <span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></p>
                                 <p class="text-para-reviews">It was a pleasure working with Shubham. He understood the requirement perfectly and delivered on time. He is innovative and added value to the project with his insights. Wishing him the best :)</p>
                              </li>-->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>