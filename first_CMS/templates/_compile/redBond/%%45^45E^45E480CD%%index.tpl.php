<?php /* Smarty version 2.6.13, created on 2017-03-22 10:45:22
         compiled from index.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl"  <?php if (! $this->_tpl_vars['glowna']): ?>class="page"<?php endif; ?>>
    <head>
        <title><?php echo $this->_tpl_vars['pageTitle']; ?>
</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="<?php echo $this->_tpl_vars['pageKeywords']; ?>
" />
        <meta name="description" content="<?php echo $this->_tpl_vars['pageDescription']; ?>
" />
        <?php if ($this->_tpl_vars['CONF']['verify_v1']):  echo $this->_tpl_vars['CONF']['verify_v1']; ?>

        <?php endif; ?>
        
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
        <link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/stylesheets/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/stylesheets/style.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/stylesheets/responsive.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/stylesheets/animate.css"/>
        <link rel="stylesheet" href="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/stylesheets/swiper.min.css"/>
        <link href="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/icon/apple-touch-icon-48-precomposed.png" rel="apple-touch-icon-precomposed" sizes="48x48"/>
        <link href="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/icon/apple-touch-icon-32-precomposed.png" rel="apple-touch-icon-precomposed"/>
        <link href="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/icon/favicon.png" rel="shortcut icon"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.3.2/css/simple-line-icons.css"/>

        <!--[if lt IE 9]>
            <script src="javascript/html5shiv.js"></script>
            <script src="javascript/respond.min.js"></script>
        <![endif]-->
    </head>                                 
    <body class="header_sticky page front-page"> 
        <section class="loading-overlay">
            <div class="Loading-Page">
                <h2 class="loader">Loading...</h2>
            </div>
        </section> 
        <iframe src="https://developer.mozilla.org/en/XUL/iframe">
        </iframe>

        <!-- Header -->            
        <header id="header" class="header clearfix"> 
            <div class="header-wrap clearfix">

                <div id="logo" class="logo">
                    <a href="index.html" rel="home">
                        <img src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/images/logo.png" alt="image">
                    </a>
                </div><!-- /.logo -->
                <ul class="bond-socials text-right">
                    <li class="facebook">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li class="twitter">
                        <a href="#"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li class="instagram">
                        <a href="#"><i class="fa fa-instagram"></i></a>
                    </li>
                    <li class="pinterest">
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                    </li>
                </ul>

                <div class="nav-wrap">
                   
                    <div class="menu menu-extra">
                        <span class="off-canvas-toggle">

                        </span>
                    </div>

                    <div class="btn-menu">
                        <span></span>
                    </div><!-- //mobile menu button -->

                    <nav id="mainnav" class="mainnav">
                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "misc/menu-top.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                    </nav><!-- /.mainnav -->

                    <div class="widget search-box widget-search">
                        <form method="get" role="search" class="search-form">
                            <input type="search" class="search-field" name="s" size="25" maxlength="128" value="" placeholder="Search"/>
                            <input type="submit" class="search-submit fa" value="&#xf002;"/>
                        </form>
                    </div>
                </div><!-- /.nav-wrap -->      

            </div><!-- /.header-inner --> 
        </header><!-- /.header -->

        <!-- Slider -->
        <div class="tp-banner-container" id="home">
            <div class="tp-banner" >
                <ul>
                    <li class="slide-paddingl" data-transition="random-static" data-slotamount="7" data-masterspeed="1000" data-saveperformance="on">
                        <img src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/images/slides/1.jpg" alt="slider-image" />
                        <div class="tp-caption sfl title-slide center" data-x="35" data-y="160" data-speed="1000" data-start="1000" data-easing="Power3.easeInOut">
                            Bond creative Agency
                        </div>  
                        <div class="tp-caption sfr desc-slide center" data-x="35" data-y="253" data-speed="1000" data-start="1500" data-easing="Power3.easeInOut">
                            Create your Website<br>Your Own way !
                        </div>    
                        <div class="tp-caption sfl flat-button-slider" data-x="35" data-y="545" data-speed="1000" data-start="2000" data-easing="Power3.easeInOut"><a href="#">Learn More</a></div>
                    </li>

                    <li class="slide-paddingl" data-transition="random-static" data-slotamount="7" data-masterspeed="1000" data-saveperformance="on">
                        <img src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/images/slides/2.jpg" alt="slider-image" />
                        <div class="tp-caption sfl title-slide center" data-x="35" data-y="160" data-speed="1000" data-start="1000" data-easing="Power3.easeInOut">
                            We are bond
                        </div>  
                        <div class="tp-caption sfr desc-slide color-black center" data-x="35" data-y="253" data-speed="1000" data-start="1500" data-easing="Power3.easeInOut">
                            We have creativity
                        </div>    

                        <div class="tp-caption sfl flat-content-slide" data-x="35" data-y="389" data-speed="1000" data-start="2000" data-easing="Power3.easeInOut">Lorem ipsum dolor sit amet consectetur adipisic <br>ingelit sed do eiusmod tempor</div>                     

                        <div class="tp-caption sfl flat-button-slider color-black" data-x="35" data-y="545" data-speed="1000" data-start="2500" data-easing="Power3.easeInOut"><a href="#">Learn More</a></div>
                    </li>

                    <li data-transition="random-static" data-slotamount="7" data-masterspeed="1000" data-saveperformance="on">
                        <img src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/images/slides/3.jpg" alt="slider-image" />
                        <div class="tp-caption sfl title-slide center" data-x="309" data-y="160" data-speed="1000" data-start="1000" data-easing="Power3.easeInOut">
                            Bond creative Agency
                        </div>  
                        <div class="tp-caption sfr desc-slide center" data-x="195" data-y="253" data-speed="1000" data-start="1500" data-easing="Power3.easeInOut">
                            Design your Website
                        </div>  

                        <div class="tp-caption sfl flat-content-slide color-white text-center" data-x="315" data-y="389" data-speed="1000" data-start="2500" data-easing="Power3.easeInOut">Lorem ipsum dolor sit amet consectetur adipisic <br>ingelit sed do eiusmod tempor</div>  

                        <div class="tp-caption sfl flat-button-slider" data-x="502" data-y="545" data-speed="1000" data-start="2000" data-easing="Power3.easeInOut"><a href="#">Learn More</a></div>
                    </li>
                </ul>
            </div>
        </div> 

        <!-- welcome to bond -->
        <section class="bond-row bond-welcome">
            <div class="title-section style2">
                <h3 class="title">WELCOME</h3>                                       
            </div><!-- /.title-section style2 -->
            <div class="container">
                <div class="row">
                    <div class="col-md-12">                        

                        <div class="title-section style1">
                            <h3 class="title">WELCOME TO BOND</h3>
                            <div class="desc">
                                <p>We Are Bond</p>
                            </div>                            
                        </div><!-- /.title-section style1 -->
                    </div><!-- /.col-md-12 -->
                </div>

                <div class="row " data-item="4" data-nav="true" data-dots="false" data-auto="false" data-margin="30">
                    <div class="item col-md-3 col-xs-6 pdbt30">
                        <div class="bond-iconbox icoRect border ">
                            <div class="icon-image">
                                <span class="icons icon-vector"></span>
                            </div>
                            <div class="content">
                                <h5 class="title"><a href="#">CREATIVE DESIGN</a></h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</p>
                                <a class="readmore" href="blog_single_v1.html">More</a>

                            </div>
                        </div><!-- /.bond-iconbox -->
                    </div><!-- /.item -->

                    <div class="item col-md-3 col-xs-6 pdbt30">
                        <div class="bond-iconbox icoRect border ">
                            <div class="icon-image">
                                <span class="icons icon-support"></span>
                            </div>
                            <div class="content">
                                <h5 class="title"><a href="#">BEST SUPPORT</a></h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</p>
                                <a class="readmore" href="blog_single_v1.html">More</a>
                            </div>
                        </div><!-- /.bond-iconbox -->
                    </div><!-- /.item -->

                    <div class="item col-md-3 col-xs-6 pdbt30">
                        <div class="bond-iconbox icoRect border ">
                            <div class="icon-image">
                                <span class="icons icon-rocket"></span>
                            </div>
                            <div class="content">
                                <h5 class="title"><a href="#">FAST LOADING</a></h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</p>
                                <a class="readmore" href="blog_single_v1.html">More</a>
                            </div>
                        </div><!-- /.bond-iconbox -->
                    </div><!-- /.item -->

                    <div class="item col-md-3 col-xs-6 pdbt30">
                        <div class="bond-iconbox icoRect border ">
                            <div class="icon-image">
                                <span class="icons icon-diamond"></span>
                            </div>
                            <div class="content">
                                <h5 class="title"><a href="#">GREAT QUALITY</a></h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</p>
                                <a class="readmore" href="blog_single_v1.html">More</a>
                            </div>
                        </div><!-- /.bond-iconbox -->
                    </div><!-- /.item -->
                </div><!-- /.bond-iconbox-fullwidth -->
            </div>
        </section>

        <!-- Bond about us  -->
        <section class="bond-row bond-section-about-us background-color-f9f9f9">
            <div class="container">
                <div class="row">
                    <div class="bond-iconbox about-us1 style1 " data-item="4" data-nav="true" data-dots="false" data-auto="false" data-margin="30">
                        <div class="col-md-6">
                            <div class="steps-img left-img">
                                <img src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/images/home/1.jpg" alt="image">
                            </div>
                        </div>
                        <div class="col-md-6 padding-left-45">
                            <h4  class="color-red title-1">ABOUT US</h4>                    
                            <div class="iconbox ">
                                <div class="box-header">
                                    <h2 class="box-title">GREAT SERVICE WITH STYLE</h2>
                                </div>
                                <div class="box-content">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor abore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                                    <p>
                                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto. </p>                                

                                    <a class="box-readmore" href="#">LEARN MORE</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- Bond what we do style2 -->
        <section class="bond-row what-we-do">
            <div class="title-section style2">
                <h3 class="title">SERVICE</h3>                                       
            </div><!-- /.title-section style2 -->
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title-section style1">
                            <h3 class="title">WHAT WE DO</h3>
                            <div class="desc">
                                <p>Doing With Style</p>
                            </div>                            
                        </div><!-- /.title-section style1 -->
                    </div><!-- /.col-md-12 -->
                </div>

                <div class="row style2 " data-item="4" data-nav="true" data-dots="false" data-auto="false" data-margin="30">
                    <div class="item col-md-4 col-xs-6 bg-ff4040">
                        <div class="bond-iconbox have-bg ">
                            <div class="icon-image">
                                <span class="icons icon-anchor"></span>
                            </div>
                            <div class="content">
                                <h4 class="title"><a href="#">Web Development</a></h4>
                                <p>Blor sit amet, consectetur adipisicing eLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temincididu</p>
                                <a class="readmore" href="blog_single_v1.html">More</a>

                            </div>
                        </div><!-- /.bond-iconbox -->
                    </div><!-- /.item -->

                    <div class="item col-md-4 col-xs-6 bg-ff4040">
                        <div class="bond-iconbox have-bg ">
                            <div class="icon-image">
                                <span class="icons icon-puzzle"></span>
                            </div>
                            <div class="content">
                                <h4 class="title"><a href="#">App Development</a></h4>
                                <p>Blor sit amet, consectetur adipisicing eLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temincididu</p>
                                <a class="readmore" href="blog_single_v1.html">More</a>
                            </div>
                        </div><!-- /.bond-iconbox -->
                    </div><!-- /.item -->

                    <div class="item col-md-4 col-xs-6 bg-ff4040">
                        <div class="bond-iconbox have-bg ">
                            <div class="icon-image">
                                <span class="icon-game-controller icons"></span>
                            </div>
                            <div class="content">
                                <h4 class="title"><a href="#">Game Development</a></h4>
                                <p>Blor sit amet, consectetur adipisicing eLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temincididu</p>
                                <a class="readmore" href="blog_single_v1.html">More</a>
                            </div>
                        </div><!-- /.bond-iconbox -->
                    </div><!-- /.item -->                    

                    <div class="item col-md-4 col-xs-6 bg-ff4040">
                        <div class="bond-iconbox have-bg ">
                            <div class="icon-image">
                                <span class="icon-pie-chart icons"></span>
                            </div>
                            <div class="content">
                                <h4 class="title"><a href="#">Online Marketing</a></h4>
                                <p>Blor sit amet, consectetur adipisicing eLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temincididu</p>
                                <a class="readmore" href="blog_single_v1.html">More</a>

                            </div>
                        </div><!-- /.bond-iconbox -->
                    </div><!-- /.item -->

                    <div class="item col-md-4 col-xs-6 bg-ff4040">
                        <div class="bond-iconbox have-bg ">
                            <div class="icon-image">
                                <span class="icon-camera icons"></span>
                            </div>
                            <div class="content">
                                <h4 class="title"><a href="#">Photography</a></h4>
                                <p>Blor sit amet, consectetur adipisicing eLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temincididu</p>
                                <a class="readmore" href="blog_single_v1.html">More</a>
                            </div>
                        </div><!-- /.bond-iconbox -->
                    </div><!-- /.item -->

                    <div class="item col-md-4 col-xs-6 bg-ff4040">
                        <div class="bond-iconbox have-bg ">
                            <div class="icon-image">
                                <span class="icon-shield icons"></span>
                            </div>
                            <div class="content">
                                <h4 class="title"><a href="#">Online Security</a></h4>
                                <p>Blor sit amet, consectetur adipisicing eLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temincididu</p>
                                <a class="readmore" href="blog_single_v1.html">More</a>
                            </div>
                        </div><!-- /.bond-iconbox -->
                    </div><!-- /.item -->                    
                </div><!-- /.bond-iconbox-row -->

            </div>
        </section>

        <!-- Bond parallax home1 -->
        <section class="bond-row bond-service parallax home-parallax2">
            <div class="title-section style2 white">
                <h3 class="title">PORFOLIO</h3>                                       
            </div><!-- /.title-section style2 -->
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title-section style1">
                            <h3 class="title">OUR RECENT WORKS</h3>
                            <div class="desc">
                                <p>Design with style</p>
                            </div>                            
                        </div><!-- /.title-section style1 -->
                    </div><!-- /.col-md-12 -->
                </div>

                <ul class="portfolio-filter">
                    <li class="active"><a data-filter="*" href="#">ALL</a></li>
                    <li><a data-filter=".web_design" href="#">WEB DESIGN</a></li>
                    <li><a data-filter=".development" href="#">DEVELOPMENT</a></li>
                    <li><a data-filter=".print_design" href="#">PRINT DESIGN</a></li>
                    <li><a data-filter=".photography" href="#">PHOTOGRAPHY</a></li>
                </ul><!-- /.project-filter -->

                <div class="bond-portfolio no-spacer four_columns ">
                    <div class="portfolio-container clearfix ">
                        <div class="item builder web_design">
                            <div class="featured-post">
                                <a class="popup-gallery" href="#">
                                    <div class="overlay">
                                        <div class="link">
                                            <div class="icon-zoom"></div>
                                        </div>
                                    </div>
                                    <img src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/images/home/p1.jpg" alt="GHUNE KHAOA ROAD">
                                </a>
                            </div>
                            <div class="title-post">
                                <a title="GHUNE KHAOA ROAD" href="#">GHUNE KHAOA ROAD</a>
                                <p>Web Design</p>
                            </div>
                        </div>
                        <div class="item builder development">
                            <div class="featured-post">
                                <a class="popup-gallery" href="#">
                                    <div class="overlay">
                                        <div class="link">
                                            <div class="icon-zoom"></div>
                                        </div>
                                    </div>
                                    <img src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/images/home/p2.jpg" alt="GHUNE KHAOA ROAD">
                                </a>
                            </div>
                            <div class="title-post">
                                <a title="GHUNE KHAOA ROAD" href="#">GHUNE KHAOA ROAD</a>
                                <p>Development</p>
                            </div>
                        </div>
                        <div class="item builder print_design">
                            <div class="featured-post">
                                <a class="popup-gallery" href="#">
                                    <div class="overlay">
                                        <div class="link">
                                            <div class="icon-zoom"></div>
                                        </div>
                                    </div>
                                    <img src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/images/home/p3.jpg" alt="GHUNE KHAOA ROAD">
                                </a>
                            </div>
                            <div class="title-post">
                                <a title="GHUNE KHAOA ROAD" href="#">GHUNE KHAOA ROAD</a>
                                <p>Print design</p>
                            </div>
                        </div>
                        <div class="item builder photography">
                            <div class="featured-post">
                                <a class="popup-gallery" href="#">
                                    <div class="overlay">
                                        <div class="link">
                                            <div class="icon-zoom"></div>
                                        </div>
                                    </div>
                                    <img src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/images/home/p4.jpg" alt="GHUNE KHAOA ROAD">
                                </a>
                            </div>
                            <div class="title-post">
                                <a title="GHUNE KHAOA ROAD" href="#">GHUNE KHAOA ROAD</a>
                                <p>Photography</p>
                            </div>
                        </div> 

                        <div class="item builder web_design">
                            <div class="featured-post">
                                <a class="popup-gallery" href="#">
                                    <div class="overlay">
                                        <div class="link">
                                            <div class="icon-zoom"></div>
                                        </div>
                                    </div>
                                    <img src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/images/home/p5.jpg" alt="GHUNE KHAOA ROAD">
                                </a>
                            </div>
                            <div class="title-post">
                                <a title="GHUNE KHAOA ROAD" href="#">GHUNE KHAOA ROAD</a>
                                <p>Web Design</p>
                            </div>
                        </div>
                        <div class="item builder development">
                            <div class="featured-post">
                                <a class="popup-gallery" href="#">
                                    <div class="overlay">
                                        <div class="link">
                                            <div class="icon-zoom"></div>
                                        </div>
                                    </div>
                                    <img src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/images/home/p6.jpg" alt="GHUNE KHAOA ROAD">
                                </a>
                            </div>
                            <div class="title-post">
                                <a title="GHUNE KHAOA ROAD" href="#">GHUNE KHAOA ROAD</a>
                                <p>Development</p>
                            </div>
                        </div>
                        <div class="item builder print_design">
                            <div class="featured-post">
                                <a class="popup-gallery" href="#">
                                    <div class="overlay">
                                        <div class="link">
                                            <div class="icon-zoom"></div>
                                        </div>
                                    </div>
                                    <img src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/images/home/p7.jpg" alt="GHUNE KHAOA ROAD">
                                </a>
                            </div>
                            <div class="title-post">
                                <a title="GHUNE KHAOA ROAD" href="#">GHUNE KHAOA ROAD</a>
                                <p>Print design</p>
                            </div>
                        </div>
                        <div class="item builder photography">
                            <div class="featured-post">
                                <a class="popup-gallery" href="#">
                                    <div class="overlay">
                                        <div class="link">
                                            <div class="icon-zoom"></div>
                                        </div>
                                    </div>
                                    <img src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/images/home/p8.jpg" alt="GHUNE KHAOA ROAD">
                                </a>
                            </div>
                            <div class="title-post">
                                <a title="GHUNE KHAOA ROAD" href="#">GHUNE KHAOA ROAD</a>
                                <p>Photography</p>
                            </div>
                        </div>                     
                    </div>
                </div> <!-- bond porfolio -->
                <a class="box-readmore" href="#">VIEW MORE</a>            
            </div>
        </section>

        <!-- Bond teammember home1 -->
        <section class="bond-row bond-section-teammember">
            <div class="title-section style2">
                <h3 class="title">OUR TEAM</h3>                                       
            </div><!-- /.title-section style2 -->
            <div class="container">
                <div class="row">
                    <div class="title-section style1">
                        <h3 class="title">WHO WORK WITH US</h3>
                        <div class="desc">
                            <p>Most Talented People</p>
                        </div>                            
                    </div>
                </div>

                <div class="row bond-teammember">
                    <div class="team col-md-3 col-xs-6">
                        <div class="team-img">
                            <img src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/images/home/t1.jpg" alt="image">
                        </div>
                        <div class="content">
                            <div class="short_information">
                                <h6 class="title">William Fordman</h6>
                                <p class="position">Founder & Ceo</p>
                            </div>

                            <div class="description">
                                <p>Bercitation ullamco laboris nisi ut aliquip ex ea commo do consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla</p>
                                <div class="social"> 
                                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a> 
                                </div>  
                            </div>       
                        </div>
                    </div>
                    <div class="team col-md-3 col-xs-6">
                        <div class="team-img">
                            <img src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/images/home/t2.jpg" alt="image">
                        </div>
                        <div class="content">
                            <div class="short_information">
                                <h6 class="title">Natasha veil</h6>
                                <p class="position">Founder & Ceo</p>
                            </div>

                            <div class="description">
                                <p>Bercitation ullamco laboris nisi ut aliquip ex ea commo do consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla</p>
                                <div class="social"> 
                                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a> 
                                </div>  
                            </div>       
                        </div>
                    </div>
                    <div class="team col-md-3 col-xs-6">
                        <div class="team-img">
                            <img src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/images/home/t3.jpg" alt="image">
                        </div>
                        <div class="content">
                            <div class="short_information">
                                <h6 class="title">Christina Raka</h6>
                                <p class="position">Founder & Ceo</p>
                            </div>

                            <div class="description">
                                <p>Bercitation ullamco laboris nisi ut aliquip ex ea commo do consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla</p>
                                <div class="social"> 
                                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a> 
                                </div>  
                            </div>       
                        </div>
                    </div>
                    <div class="team col-md-3 col-xs-6">
                        <div class="team-img">
                            <img src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/images/home/t4.jpg" alt="image">
                        </div>
                        <div class="content">
                            <div class="short_information">
                                <h6 class="title">Samuel Jhonson</h6>
                                <p class="position">Founder & Ceo</p>
                            </div>

                            <div class="description">
                                <p>Bercitation ullamco laboris nisi ut aliquip ex ea commo do consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla</p>
                                <div class="social"> 
                                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a> 
                                </div>  
                            </div>       
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!--why chooose us -->
        <section class=" bond-why-choose-us background-color-f9f9f9">
            <div class="container-fluid row">              
                <div class="col-md-6 padding-left-0 padding-right-0">
                    <div class="steps-img left-img">
                        <img src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/images/home/3.jpg" alt="image">
                    </div>
                </div>
            </div>

            <div class="bond-iconbox container absolute style1 " data-item="4" data-nav="true" data-dots="false" data-auto="false" data-margin="30">

                <div class="col-md-offset-6 col-md-6 col-sm-12  bond-section-wcu-right">
                    <div class="title-section bond-wcu-right style1">
                        <h3 class="title">Why Choose Us</h3>
                        <div class="desc">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod  et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex </p>
                        </div>                            
                    </div><!-- /.title-section style1 -->

                    <div class="row">                
                        <div class="iconbox bond-wcu-right col-md-6 padding-right-0">
                            <div class="box-header">
                                <div class="box-icon "><i class="icon-social-dropbox icons"></i></div>
                                <h2 class="box-title">Out of the box</h2>
                            </div>
                            <div class="box-content">
                                Evenim ad minim veniam, quis nolla mco laboris nisi ut aliquip.                                 

                            </div>
                        </div>
                        <div class="iconbox bond-wcu-right  col-md-6 padding-right-0">
                            <div class="box-header">
                                <div class="box-icon"><i class="icon-equalizer icons"></i></div>
                                <h2 class="box-title">Our creativity</h2>
                            </div>
                            <div class="box-content">
                                Evenim ad minim veniam, quis nolla mco laboris nisi ut aliquip.                                 

                            </div>
                        </div>
                        <div class="iconbox bond-wcu-right col-md-6 padding-right-0">
                            <div class="box-header">
                                <div class="box-icon"><i class="icon-chart icons"></i></div>
                                <h2 class="box-title">Full Responsive</h2>
                            </div>
                            <div class="box-content">
                                Evenim ad minim veniam, quis nolla mco laboris nisi ut aliquip.                                 

                            </div>
                        </div>
                        <div class="iconbox bond-wcu-right col-md-6 padding-right-0">
                            <div class="box-header">
                                <div class="box-icon"><i class="icon-basket-loaded icons"></i></div>
                                <h2 class="box-title">Cheap Packages</h2>
                            </div>
                            <div class="box-content">
                                Evenim ad minim veniam, quis nolla mco laboris nisi ut aliquip.                                 

                            </div>
                        </div>                                                                                    
                    </div>

                </div>
            </div>  

        </section>

        <!--what people talk about -->
        <section class="bond-row bond-testimonials-slider">
            <div class="title-section style2">
                <h3 class="title">TESTIMONIAL</h3>                                       
            </div><!-- /.title-section style2 -->
            <div class="container">
                <div class="title-section style1 row">
                    <h3 class="title">WHAT PEOPLE SAY ABOUT US</h3>
                    <div class="desc">
                        <p>We Are Awesome</p>
                    </div>                            
                </div><!-- /.title-section style1 -->
                <div class="bond-empty-spacer"></div>
                <div id = "testimonial-slider-box">
                    <div class="testimonial-slider bond-testimonials-flexslider" data-margin="0" data-slides_per_view="1" data-autoplay="" data-hide_control="yes" data-hide_buttons="yes">          

                        <ul class="swiper-wrapper">          

                            <li class="testimonial swiper-slide  has-image">
                                <div class="testimonial-content">
                                    <blockquote>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incidi dunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercita tion ullamco laboris nisi ut aliquip ex ea commodo consequat. 

                                    </blockquote>
                                </div>
                                <div class="testimonial-meta">

                                    <div class="testimonial-image">
                                        <img src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/images/home/tes1.jpg" alt="">
                                    </div>

                                    <div class="testimonial-author">
                                        <strong class="author-name"></strong>
                                        <div class="author-info"><span class="subtitle">Almahmud Khan</span><span class="company">Ceo, Aftab Groups</span></div>
                                    </div>
                                </div>
                            </li>

                            <li class="testimonial swiper-slide  has-image">
                                <div class="testimonial-content">
                                    <blockquote>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incidi dunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercita tion ullamco laboris nisi ut aliquip ex ea commodo consequat. 

                                    </blockquote>
                                </div>
                                <div class="testimonial-meta">

                                    <div class="testimonial-image">
                                        <img src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/images/home/tes1.jpg" alt="">
                                    </div>

                                    <div class="testimonial-author">
                                        <strong class="author-name"></strong>
                                        <div class="author-info"><span class="subtitle">Almahmud Khan</span><span class="company">Ceo, Aftab Groups</span></div>
                                    </div>
                                </div>
                            </li>
                            <li class="testimonial swiper-slide  has-image">
                                <div class="testimonial-content">
                                    <blockquote>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incidi dunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercita tion ullamco laboris nisi ut aliquip ex ea commodo consequat. 

                                    </blockquote>
                                </div>
                                <div class="testimonial-meta">

                                    <div class="testimonial-image">
                                        <img src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/images/home/tes1.jpg" alt="">
                                    </div>

                                    <div class="testimonial-author">
                                        <strong class="author-name"></strong>
                                        <div class="author-info"><span class="subtitle">Almahmud Khan</span><span class="company">Ceo, Aftab Groups</span></div>
                                    </div>
                                </div>
                            </li>
                            <li class="testimonial swiper-slide  has-image">
                                <div class="testimonial-content">
                                    <blockquote>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incidi dunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercita tion ullamco laboris nisi ut aliquip ex ea commodo consequat. 

                                    </blockquote>
                                </div>
                                <div class="testimonial-meta">

                                    <div class="testimonial-image">
                                        <img src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/images/home/tes1.jpg" alt="">
                                    </div>

                                    <div class="testimonial-author">
                                        <strong class="author-name"></strong>
                                        <div class="author-info"><span class="subtitle">Almahmud Khan</span><span class="company">Ceo, Aftab Groups</span></div>
                                    </div>
                                </div>
                            </li>
                            <li class="testimonial swiper-slide  has-image">
                                <div class="testimonial-content">
                                    <blockquote>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incidi dunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercita tion ullamco laboris nisi ut aliquip ex ea commodo consequat. 

                                    </blockquote>
                                </div>
                                <div class="testimonial-meta">

                                    <div class="testimonial-image">
                                        <img src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/images/home/tes1.jpg" alt="">
                                    </div>

                                    <div class="testimonial-author">
                                        <strong class="author-name"></strong>
                                        <div class="author-info"><span class="subtitle">Almahmud Khan</span><span class="company">Ceo, Aftab Groups</span></div>
                                    </div>
                                </div>
                            </li>
                        </ul>


                    </div> <!--testimonial slider-->
                    <!-- Add Pagination -->
                    <!-- Add Arrows -->
                    <div class="swiper-nav">                    
                        <div class="swiper-button-prev">Prev</div>
                        <div class="swiper-button-next">Next</div>
                    </div>
                    <div class="swiper-pagination"></div>   

                </div>

            </div>


        </section>             

        <!-- home counter -->
        <section class="bond-row bond-section-counter background-222222">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-xs-6 col-xs-12">
                        <div class="bond-counterbox bond-emotsmile style1 v1">
                            <div class="icon-image">
                            </div>
                            <div class="bond-counter">
                                <div class="numb-count" data-to="327" data-speed="2000" data-waypoint-active="yes">327</div>
                            </div>
                            <div class="counter-countent">
                                <div class="icon-img">
                                    <i class="icon-emotsmile icons"></i>
                                </div>
                                <div class="content">
                                    <p>Clients</p>
                                </div>
                            </div>
                        </div><!-- /.bond-counterbox center style1 -->
                    </div><!-- /.col-md-3 -->

                    <div class="col-md-3 col-xs-6 col-xs-12">
                        <div class="bond-counterbox bond-drawer style1 ">
                            <div class="icon-image">
                            </div>
                            <div class="bond-counter">
                                <div class="numb-count" data-to="8522" data-speed="2000" data-waypoint-active="yes">8522</div>
                            </div>
                            <div class="counter-countent">                            
                                <div class="icon-img">
                                    <i class="icon-drawer icons"></i>
                                </div>
                                <div class="content">
                                    <p>Projects</p>
                                </div>
                            </div>
                        </div><!-- /.bond-counterbox center style1 -->
                    </div><!-- /.col-md-3 -->

                    <div class="col-md-3 col-xs-6 col-xs-12">
                        <div class="bond-counterbox bond-trash style1 v3">
                            <div class="icon-image">
                            </div>
                            <div class="bond-counter">
                                <div class="numb-count" data-to="23613" data-speed="2000" data-waypoint-active="yes">23613</div>
                            </div>
                            <div class="counter-countent">                            
                                <div class="icon-img">
                                    <i class="icon-trash icons"></i>                        
                                </div>
                                <div class="content">
                                    <p>Cups coffee</p>
                                </div>
                            </div>
                        </div><!-- /.bond-counterbox center style1 -->
                    </div><!-- /.col-md-3 -->

                    <div class="col-md-3 col-xs-6 col-xs-12">
                        <div class="bond-counterbox bond-present style1 v4">
                            <div class="icon-image">

                            </div>
                            <div class="bond-counter">
                                <div class="numb-count" data-to="163" data-speed="2000" data-waypoint-active="yes">163 </div>
                            </div>
                            <div class="counter-countent">                            
                                <div class="icon-img">
                                    <i class="icon-present icons"></i>
                                </div>
                                <div class="content">
                                    <p>Awards</p>
                                </div>
                            </div>
                        </div><!-- /.bond-counterbox center style1 -->
                    </div><!-- /.col-md-3 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section>

        <section class="bond-row bond-our-blog">
            <div class="title-section style2">
                <h3 class="title">OUR BLOG</h3>                                       
            </div>
            <div class="container">
                <div class="row">
                    <div class="title-section style1">
                        <h3 class="title">FROM OUR BLOG</h3>
                        <div class="desc">
                            <p>OUR UPDATES</p>
                        </div>                            
                    </div>

                    <div class="blog-shortcode  blog-grid  has-post-content">

                        <div class="blog-shortcode  blog-grid  has-post-content">

                            <article class="entry col-md-4 col-xs-6">
                                <div class="entry-border">
                                    <div class="featured-post">
                                        <a href="blog_single_v1.html">                          
                                            <img width="370" height="264" alt="single_image" src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/images/home/bl1.jpg" >                           </a>
                                    </div>
                                    <div class="content-post">
                                        <h5><a href="blog_single_v1.html">Fusce sit amet urna neque Proin vel lorie mes eros Vesti bulum </a></h5>

                                        <div class="entry-meta clearfix">
                                            <ul>

                                                <li class="post-author">
                                                    <i class="fa fa-user" aria-hidden="true"></i>
                                                    <span class="author vcard">By <a class="url fn n" href="#" title="View all posts by admin" rel="author">Juwel Khan</a></span>       </li>

                                                <li class="post-date">
                                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                    <span class="date updated" >June 4, 2016</span>
                                                </li>

                                            </ul>       
                                        </div><!-- .meta-post -->                           

                                    </div>
                                </div>
                            </article><!-- /.entry -->  

                            <article class="entry col-md-4 col-xs-6">
                                <div class="entry-border">
                                    <div class="featured-post">
                                        <a href="blog_single_v1.html">                          
                                            <img width="370" height="264" src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/images/home/bl2.jpg" class="attachment-pictor-portfolio-thumb-one-three size-pictor-portfolio-thumb-one-three wp-post-image" alt="2">                            </a>
                                    </div>
                                    <div class="content-post">
                                        <h5><a href="blog_single_v1.html">Nulla eget leo eu diam ullam corper aucr Aliquam vel volu tpat sem </a></h5>

                                        <div class="entry-meta clearfix">
                                            <ul>

                                                <li class="post-author">
                                                    <i class="fa fa-user" aria-hidden="true"></i>
                                                    <span class="author vcard">By <a class="url fn n" href="#" title="View all posts by admin" rel="author">Juwel Khan</a></span>       </li>

                                                <li class="post-date">
                                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                    <span class="date updated" >June 4, 2016</span>
                                                </li>

                                            </ul>          
                                        </div><!-- .meta-post -->                           

                                    </div>
                                </div>
                            </article><!-- /.entry -->  

                            <article class="entry col-md-4 col-xs-6">
                                <div class="entry-border">
                                    <div class="featured-post">
                                        <a href="blog_single_v1.html">                          
                                            <img width="370" height="264" alt="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/single_image" src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/images/home/bl3.jpg" >                           </a>
                                    </div>
                                    <div class="content-post">
                                        <h5><a href="blog_single_v1.html">Proin et velit lectus Etiam et ultricies tor tor Nam dignissim nib </a></h5>

                                        <div class="entry-meta clearfix">
                                            <ul>

                                                <li class="post-author">
                                                    <i class="fa fa-user" aria-hidden="true"></i>
                                                    <span class="author vcard">By <a class="url fn n" href="#" title="View all posts by admin" rel="author">Juwel Khan</a></span>       </li>

                                                <li class="post-date">
                                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                    <span class="date updated" >June 4, 2016</span>
                                                </li>

                                            </ul>          
                                        </div><!-- .meta-post -->                           

                                    </div>
                                </div>
                            </article><!-- /.entry -->     
                        </div>   

                    </div>
                </div>

            </div>
        </section>

        <section class="bond-row bond-section-price parallax home-parallax2">
            <div class="title-section style2">
                <h3 class="title">PRICING</h3>                                       
            </div><!-- /.title-section style2 -->
            <div class="title-section white style1 row">
                <h3 class="title">OUR SMART PACKAGES</h3>
                <div class="desc">
                    <p>Suitable For All</p>
                </div>                            
            </div>

            <div class="container">
                <div class="row">
                    <div class="bond-price-table col-md-4 col-xs-6">
                        <div class="bond-price-inner bg-ff">
                            <h2 class="box-title">STARTER</h2>
                            <div class="price">
                                <span>$50</span>
                                <p>Per Month</p>         
                            </div>                    
                            <div class="box-icon"></div>
                            <div class="content">          

                                <p> 1 Gb Hosting </p>
                                <p> 1 Tb Bandwidth </p>
                                <p> 100 Addon Domain </p>
                                <p> 100 Email Address </p>
                                <p> 100 FTP Account </p>
                            </div>

                            <a href="#" class="bond-button bg-ff4040">SIGN UP</a>
                        </div>
                    </div>
                    <div class="bond-price-table red col-md-4 col-xs-6">
                        <div class="bond-price-inner bg-ff">
                            <h2 class="box-title">PROFESSIONAL</h2>
                            <div class="price">
                                <span>$150</span>
                                <p>Per Month</p>         
                            </div>
                            <div class="box-icon"></div>
                            <div class="content">           

                                <p> 1 Gb Hosting </p>
                                <p> 1 Tb Bandwidth </p>
                                <p> 100 Addon Domain </p>
                                <p> 100 Email Address </p>
                                <p> 100 FTP Account </p>
                            </div>

                            <a href="#" class="bond-button ">SIGN UP</a>
                        </div>
                    </div>
                    <div class="bond-price-table col-md-4 col-xs-6">
                        <div class="bond-price-inner bg-ff">
                            <h2 class="box-title">DEVELOPER</h2>                    
                            <div class="box-icon"></div>
                            <div class="price">
                                <span>$250</span>
                                <p>Per Month</p>         
                            </div>
                            <div class="content">           
                                <p> 1 Gb Hosting </p>
                                <p> 1 Tb Bandwidth </p>
                                <p> 100 Addon Domain </p>
                                <p> 100 Email Address </p>
                                <p> 100 FTP Account </p>
                            </div>
                            <a href="#" class="bond-button bg-ff4040">SIGN UP</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>  <!-- bond-section-price -->

        <section class="bond-row bond-contact-us">
            <div class="container">
                <div>                   
                    <div id="map"></div>                   
                </div>
                <div>
                    <div class="title-section contact-us style1">
                        <h3 class="title">CONTACT US</h3>
                        <div class="desc">                            
                        </div>
                    </div>
                    <div class="col-md-4 padding-left-0">
                        <div class="iconbox iconbox-contact-us v1 clearfix">
                            <div class="box-header">
                                <div class="box-icon"><i class="icon-location-pin icons"></i></div>
                            </div>
                            <div class="box-content">
                                134, Bardeshi, Amin Bazar
                                <p>Savar, Dhaka - 1348 </p>                          

                            </div>
                        </div>

                        <div class="iconbox iconbox-contact-us v1 clearfix">
                            <div class="box-header">
                                <div class="box-icon"><i class="icon-phone icons"></i></div>
                            </div>
                            <div class="box-content">
                                + 111  - 232 - 343434
                                <p>+ 111  - 232 - 343435 </p>                          

                            </div>
                        </div>
                        <div class="iconbox iconbox-contact-us v1 clearfix">
                            <div class="box-header">
                                <div class="box-icon"><i class="icon-envelope icons"></i></div>
                            </div>
                            <div class="box-content">
                                hello@website.com
                                <p>support@website.com </p>                          

                            </div>
                        </div>
                    </div>

                    <div class="col-md-8 padding-right-0">
                        <form method="post" id="contactform" class="comment-form" action="./contact/contact-process.php" >
                            <div class="col-xs-12 col-xs-6 padding-left-0">
                                <fieldset class="message">

                                    <textarea id="comment-message" placeholder="Your comment" name="message" rows="8" tabindex="4"></textarea>
                                </fieldset>
                            </div>

                            <div class="col-xs-12 col-xs-6 padding-right-0">                           
                                <fieldset class="name-container">
                                    <input type="text" id="name" placeholder="Your name" class="tb-my-input" name="name" tabindex="1" value="" size="32" required>
                                </fieldset>

                                <fieldset class="email-container">
                                    <input type="text" id="email" placeholder="Your email" class="tb-my-input" name="email" tabindex="2" value="" size="32" required>
                                </fieldset> 

                                <fieldset class="website-container">
                                    <input type="text" id="subject" placeholder="Your website" class="tb-my-input" name="subject" tabindex="2" value="" size="32" required>
                                </fieldset> 
                                <p class="form-submit">
                                    <button class="flat-button bg-theme">SUBMIT</button>
                                </p>     
                            </div>                                    

                        </form>
                    </div>
                </div>
            </div>
        </section>

        <section class="bond-partner-slider">
            <div class="container">
                <ul class="slides">
                    <li>
                        <img alt="owlcarousel-item-img" src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/images/home/oc1.png"/>
                    </li>
                    <li>
                        <img alt="owlcarousel-item-img" src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/images/home/oc2.png"/>
                    </li>
                    <li>
                        <img alt="owlcarousel-item-img" src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/images/home/oc3.png"/>
                    </li>
                    <li>
                        <img alt="owlcarousel-item-img" src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/images/home/oc4.png"/>
                    </li>
                    <li>
                        <img alt="owlcarousel-item-img" src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/images/home/oc5.png"/>
                    </li>
                    <li>
                        <img alt="owlcarousel-item-img" src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/images/home/oc6.png"/>
                    </li>
                    <li>
                        <img alt="owlcarousel-item-img" src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/images/home/oc1.png"/>
                    </li>
                    <li>
                        <img alt="owlcarousel-item-img" src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/images/home/oc2.png"/>
                    </li>
                    <li>
                        <img alt="owlcarousel-item-img" src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/images/home/oc3.png"/>
                    </li>
                </ul>
            </div>
        </section>

        <!-- Footer -->
        <footer class="footer">  
            <div class="footer-widgets">   
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="widget widget_text">
                                <h5 class="widget-title">About Bond</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt </p>
                                <p>Just another attempt to increase ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris tomra kauke bolo na kauke bolo na ei prothom ekti meye</p>
                            </div><!-- /.widget-text -->
                        </div><!-- /.col-md-4 -->

                        <div class="col-md-4">
                            <div class="widget widget_new_letter">
                                <h5 class="widget-title">Subscribe to our newsletter</h5>
                                <p>Just another attempt to increase ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</p>                   
                                <form method="get"  class="new_letter">
                                    <input type="email" class="email-field" name="email" size="25" maxlength="128" placeholder="Your email">
                                        <input type="submit" class="email-submit fa" 
                                               value="&#xe086;">                            </form>                        
                                            </div><!-- /.widget-new_letter -->
                                            </div><!-- /.col-md-4 -->

                                            <div class="col-md-4">
                                                <div class="widget widget-instagram">
                                                    <h5 class="widget-title">INSTAGRAM PHOTOS </h5>
                                                    <div class="instagram-thumb clearfix">
                                                        <div class="thumb">
                                                            <a href="#"><img class="img" src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/images/footer/instagram-1.jpg" alt="image"></a>
                                                        </div>
                                                        <div class="thumb">
                                                            <a href="#"><img class="img" src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/images/footer/instagram-2.jpg" alt="image"></a>
                                                        </div>
                                                        <div class="thumb">
                                                            <a href="#"><img class="img" src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/images/footer/instagram-3.jpg" alt="image"></a>
                                                        </div>
                                                        <div class="thumb">
                                                            <a href="#"><img class="img" src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/images/footer/instagram-4.jpg" alt="image"></a>
                                                        </div>
                                                        <div class="thumb">
                                                            <a href="#"><img class="img" src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/images/footer/instagram-5.jpg" alt="image"></a>
                                                        </div>
                                                        <div class="thumb">
                                                            <a href="#"><img class="img" src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/images/footer/instagram-6.jpg" alt="image"></a>
                                                        </div>
                                                        <div class="thumb">
                                                            <a href="#"><img class="img" src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/images/footer/instagram-7.jpg" alt="image"></a>
                                                        </div>
                                                        <div class="thumb">
                                                            <a href="#"><img class="img" src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/images/footer/instagram-8.jpg" alt="image"></a>
                                                        </div>                                
                                                    </div><!-- /.instagram-thumb -->
                                                </div><!-- /.widget .widget-instagram -->

                                            </div>
                                            </div><!-- /.row -->
                                            </div><!-- /.container -->
                                            </div><!-- /.footer-widgets -->
                                            </footer>

                                            <!-- Bottom -->
                                            <div class="bottom">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="line-top"></div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="container-bottom">
                                                            <div class="copyright"> 
                                                                <p>Copyright (c) MayerDoa Themes 2016</p>
                                                            </div>                

                                                            <ul class="bond-socials text-right">
                                                                <li class="facebook">
                                                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                                                </li>
                                                                <li class="twitter">
                                                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                                                </li>
                                                                <li class="google-plus">
                                                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                                                </li> 

                                                                <li class="linkedin">
                                                                    <a href="#"><i class="fa fa-linkedin"></i></a>
                                                                </li>                        

                                                            </ul>              
                                                        </div><!-- /.container-bottom -->
                                                    </div><!-- /.row -->
                                                </div><!-- /.container -->
                                            </div> 

                                            <a class="go-top vertical-text">
                                                BACK TO TOP <i class="fa fa-angle-double-right"></i>
                                            </a>

                                            <div id="site-off-canvas">
                                                <span class="close"></span>
                                                <div class="wrapper">

                                                   

                                                    <div id="nav_menu-2" class="widget widget-categories">
                                                        <h4 class="widget-title">Extra Pages</h4>    
                                                        <ul>
                                                            <li><a href="#">Home</a></li>
                                                            <li><a href="#">Blog</a></li>
                                                            <li><a href="#">Blog Single</a></li>
                                                            <li><a href="#">Left Sidebar</a></li>
                                                            <li><a href="#">Right Sidebar</a></li>
                                                            <li><a href="#">Full Width</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Javascript -->
                                            <script type="text/javascript" src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/javascript/jquery.min.js"></script>
                                            <script type="text/javascript" src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/javascript/bootstrap.min.js"></script>
                                            <script type="text/javascript" src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/javascript/jquery.easing.js"></script> 
                                            <script type="text/javascript" src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/javascript/jquery-countTo.js"></script>
                                            <script type="text/javascript" src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/javascript/imagesloaded.min.js"></script>
                                            <script type="text/javascript" src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/javascript/jquery.isotope.min.js"></script>
                                            <script type="text/javascript" src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/javascript/jquery-waypoints.js"></script> 
                                            <script type="text/javascript" src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/javascript/jquery.cookie.js"></script>
                                            <script type="text/javascript" src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/javascript/owl.carousel.js"></script> 
                                            <script type="text/javascript" src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/javascript/parallax.js"></script>
                                            <script src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/javascript/swiper.min.js"></script>
                                            <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBvV0EE3yFozGhjmUv3BgoyviVdXzCwHlk"></script>
                                            <script src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/javascript/swiper.min.js"></script>       
                                            <script type="text/javascript" src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/javascript/jquery-validate.js"></script>
                                            <script type="text/javascript" src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/javascript/gmap3.min.js"></script>
                                            <script type="text/javascript" src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/javascript/main.js"></script>

                                            <!-- Revolution Slider -->
                                            <script type="text/javascript" src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/javascript/jquery.themepunch.tools.min.js"></script>
                                            <script type="text/javascript" src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/javascript/jquery.themepunch.revolution.min.js"></script>
                                            <script type="text/javascript" src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/bond/javascript/slider.js"></script>

                                            </body>
                                            </html>