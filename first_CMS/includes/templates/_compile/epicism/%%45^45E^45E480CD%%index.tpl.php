<?php /* Smarty version 2.6.13, created on 2017-04-21 20:56:49
         compiled from index.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
    <head>
        <title><?php echo $this->_tpl_vars['pageTitle']; ?>
</title>
        <meta charset="utf-8"/>
        <meta name="keywords" content="<?php echo $this->_tpl_vars['pageKeywords']; ?>
" />
        <meta name="description" content="<?php echo $this->_tpl_vars['pageDescription']; ?>
" />
        <meta name="author" content="PKDevelop"/>
        <meta name="viewport" content="width=device-width,initial-scale = 1.0,maximum-scale=1.0,user-scalable=no" />
        <meta http-equiv="X-UA-Compatible" content="IE=9,chrome=1"/>
        <link rel="stylesheet" href='<?php echo $this->_tpl_vars['TPL_URL']; ?>
/assets/css/style.css' type="text/css" media="screen" />
        <script type="text/javascript" src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/assets/js/jquery.js"></script>
    </head>
    <body id="index" class="<?php if ($this->_tpl_vars['glowna']): ?>home <?php endif; ?>page">
        <div id="wrapper">
            <div id="fixed-nav">
                <div id="social">
                    <div class="boxed">
                        <ul class="nolist">
                            <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>  
                            <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>  
                            <li class="gplus"><a href="#"><i class="fa fa-google-plus"></i></a></li>  
                            <li class="dribbble"><a href="#"><i class="fa fa-dribbble"></i></a></li>  
                            <li class="pinterest"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                            <li class="youtube"><a href="#"><i class="fa fa-youtube"></i></a></li>
                            <li class="vimeo"><a href="#"><i class="fa fa-vimeo"></i></a></li>
                            <li class="skype"><a href="#"><i class="fa fa-skype"></i></a></li>
                        </ul>
                    </div>  
                </div>
                <nav id="primary">
                    <div class="boxed">
                        <div id="logo" class="animated bounceInDown">
                            <a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
/" title="<?php echo $this->_tpl_vars['CONF']['alt_img']; ?>
">
                                <h1>Epicism.</h1>
                            </a>
                        </div>
                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "misc/menu-top.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                    </div>
                </nav>
            </div>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['body'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            <footer id="foot">
                <div class="boxed">
                    <div class="one_quarter widget animated slideInLeft">
                        <h6>Welcome to Epicism.</h6>
                        <div class="textwidget">
                            <p>A beautifully responsive, pixel perfect, multi-purpose theme that you'll love.</p>
                            <p>Native WordPress customizer, tons of shortcodes & classes, widgets and modules, creating your site, your way is easy.</p>
                        </div>
                    </div>		
                    <div class="one_quarter widget animated slideInLeft">
                        <h6>Latest News.</h6>
                        <ul>
                            <li><a href="single-post.html">Summer outdoors.</a></li>
                            <li><a href="single-post.html">The Jezabels.</a></li>
                            <li><a href="single-post.html">Grinding the crack Zeb Corliss.</a></li>
                            <li><a href="single-post.html">Working on some typography.</a></li>
                            <li><a href="single-post.html">Our minimalistic office space.</a></li>
                        </ul>
                    </div>
                    <div class="one_quarter widget animated slideInLeft">
                        <h6>Popular Categories.</h6>
                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "misc/menu-bottom.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                    </div>
                    <div class="one_quarter widget animated slideInLeft">
                        <h6>Popular Tags</h6>
                        <div class="tagcloud">
                            <a href='blog.html' title='apple topic' style='font-size: 8pt;'>apple</a>
                            <a href='blog.html' title='corliss topic' style='font-size: 8pt;'>corliss</a>
                            <a href='blog.html' title='design topic' style='font-size: 8pt;'>design</a>
                            <a href='blog.html' title='format topic' style='font-size: 8pt;'>format</a>
                            <a href='blog.html' title='jezabels topic' style='font-size: 8pt;'>jezabels</a>
                            <a href='blog.html' title='minimal topic' style='font-size: 8pt;'>minimal</a>
                            <a href='blog.html' title='music topic' style='font-size: 8pt;'>music</a>
                            <a href='blog.html' title='nature topic' style='font-size: 8pt;'>nature</a>
                            <a href='blog.html' title='office topic' style='font-size: 8pt;'>office</a>
                            <a href='blog.html' title='outdoors topic' style='font-size: 8pt;'>outdoors</a>
                            <a href='blog.html' title='post topic' style='font-size: 8pt;'>post</a>
                            <a href='blog.html' title='searching topic' style='font-size: 8pt;'>searching</a>
                            <a href='blog.html' title='standard topic' style='font-size: 8pt;'>standard</a>
                            <a href='blog.html' title='typography topic' style='font-size: 8pt;'>typography</a>
                            <a href='blog.html' title='zeb topic' style='font-size: 8pt;'>zeb</a>
                        </div>
                    </div>            	
                </div>
                <hr>
                    <section id="copyright" class="animated slideInRight textcenter">
                        <?php echo $this->_tpl_vars['LANG']['_PAGE_FOOTER']; ?>

                    </section>
            </footer>
        </div>
        <script type='text/javascript' src='<?php echo $this->_tpl_vars['TPL_URL']; ?>
/assets/js/plugins.js'></script>
        <script type='text/javascript' src='<?php echo $this->_tpl_vars['TPL_URL']; ?>
/assets/js/application.js'></script>
    </body> 
</html>