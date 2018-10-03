<?php /* Smarty version 2.6.13, created on 2017-11-28 09:46:34
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
        <meta name="author" content="PKDEVELOP"/>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,700&amp;subset=latin-ext" rel="stylesheet"/> 
        <link href="https://fonts.googleapis.com/css?family=Anton&amp;subset=latin-ext" rel="stylesheet"/> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/css/font-awesome.css"/>
        <link rel="stylesheet" href="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/css/owl.carousel.min.css"/>
        <link rel="stylesheet" href="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/css/owl.theme.default.min.css"/>
        <link rel="stylesheet" type="text/css" media="screen,projection" href="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/css/pl-mapa-500px.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/css/main.min.css" />
        <link rel="shortcut icon" href="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/img/send-button-bg.png" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/js/jquery.min.js"></script>
        <script src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/js/owl.carousel.js"></script>
        <script type="text/javascript" src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/js/main.min.js"></script>
        
               
    </head>
    <body>
        <section class="head">
            <div class="container">
                <a href="/"><div id="logo"></div></a>
                <a class="menuToggle"><i class="fa fa-bars"></i></a>
                <div id="main_menu">
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "misc/menu-top.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                </div>
            </div>
        </section>
        <section class="body">
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['body'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "misc/infoDialogBox.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        </section>
        <section class="foot">
            <div class="container">
                <a href="/"><div id="logo_foot"></div></a>
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "newsletter/form.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                <div id="both_menu" class="pull-left">
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "misc/menu-top.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                </div>
                <div class="socials pull-right">
                    <a class="facebook" href="#"><i class="fa fa-facebook"></i></a>
                    <a class="twitter" href="#"><i class="fa fa-twitter"></i></a>
                </div>
                <div class="col-xs-12 realization">Realizacja: <a href="http://www.pkdevelop.pl/" title="PKDEVELOP - Paweł Kraus Usługi Pgorgrmistyczne">PKDEVELOP</a></div>
            </div>
        </section>
    </body>
</html>