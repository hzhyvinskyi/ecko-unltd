<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Ecko Unltd.</title>
    <link href="/template/css/bootstrap.min.css" rel="stylesheet">
    <link href="/template/css/font-awesome.min.css" rel="stylesheet">
    <link href="/template/css/prettyPhoto.css" rel="stylesheet">
    <link href="/template/css/price-range.css" rel="stylesheet">
    <link href="/template/css/animate.css" rel="stylesheet">
    <link href="/template/css/main.css" rel="stylesheet">
    <link href="/template/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="/template/js/html5shiv.js"></script>
    <script src="/template/js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="/template/img/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/template/img/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/template/img/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/template/img/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/template/img/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->
<body>
<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> +38 070 000 07 24</a></li>
                            <li>
								<a href="mailto:hzhyvinskyi@gmail.com">
									<i class="fa fa-envelope"></i>
									hzhyvinskyi@gmail.com
								</a>
							</li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a></li>
							<li><a href="https://plus.google.com" target="_blank"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="https://twitter.com" target="_blank"><i class="fa fa-twitter"></i></a></li>
							<li><a href="https://www.linkedin.com/" target="_blank"><i class="fa fa-linkedin"></i></a></li>
							<li><a href="https://dribbble.com/" target="_blank"><i class="fa fa-dribbble"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->
    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="/"><img src="/template/img/home/logo.png" alt="" /></a>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <li>
								<a href="/cart">
									<i class="fa fa-shopping-cart"></i> Shopping basket
									<span id="cart-count">(<?=Cart::countItems()?>)</span>
								</a>
							</li>&nbsp;
							<?php if (User::isGuest()): ?>
							<li><a href="/user/login"><i class="fa fa-lock"></i> Sign In</a></li>
							<li><a href="/user/register">Don't have an account?</a></li>
							<?php else: ?>
                            <li><a href="/cabinet"><i class="fa fa-user"></i> Profile</a></li>
							<li><a href="/user/logout"><i class="fa fa-unlock"></i> Log out</a></li>
							<?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->
    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="/">Home</a></li>
                            <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="/catalog/">Goods catalog</a></li>
                                    <li><a href="/cart/">Shopping basket</a></li>
                                </ul>
                            </li>
                            <li><a href="/blog/">Blog</a></li>
                            <li><a href="/about/">About</a></li>
                            <li><a href="/contacts/">Contacts</a></li>
							<?php if (!User::isGuest()): ?>
								<li><a href="/admin">Admin</a></li>
							<?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->