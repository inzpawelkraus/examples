<?php /* Smarty version 2.6.13, created on 2017-05-19 10:59:22
         compiled from index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'index.tpl', 4, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
    <head>
        <title>Panel administracyjny | <?php echo ((is_array($_tmp=@$this->_tpl_vars['pageTitle'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['CONF']['page_title']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['CONF']['page_title'])); ?>
</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="keywords" content="<?php echo $this->_tpl_vars['pageKeywords']; ?>
" />
        <meta name="description" content="<?php echo $this->_tpl_vars['pageDescription']; ?>
" />
        <link rel="stylesheet" href="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/css/matrix-style.css" />
        <link rel="stylesheet" href="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/css/matrix-media.css" />
        <link href="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'/>
            <link rel="shortcut icon" href="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/img/favicon.png" />
    </head>
    <body>
        <div id="header">
            <h1><a href="dashboard.html">Matrix Admin</a></h1>
        </div>
        <div id="user-nav" class="navbar navbar-inverse">
            <ul class="nav">
                <li class=""><a title="" href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
/admin"><i class="icon-cog"></i> <span class="text">Panel</span></a></li>
                <li class=""><a title="" href="<?php echo $this->_tpl_vars['CONF']['base_url']; ?>
/" target="_blank"><i class="icon-eye-open"></i> <span class="text">Podgląd strony</span></a></li>
                <li class=""><a title="" href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
/admin/wyloguj.php"><i class="icon icon-share-alt"></i> <span class="text">Wyloguj [ <b><?php echo $this->_tpl_vars['user']['login']; ?>
</b> ]</span></a></li>
            </ul>
        </div>
        <div id="sidebar"> 
            <a href="#" class="visible-phone"><i class="icon icon-info-sign"></i> MENU</a>
            <ul>
                <?php if ($this->_tpl_vars['user']['privileges']['menu_administration']): ?>
                    <li <?php if ($this->_tpl_vars['menu_selected'] == 'menu'): ?>class="active"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['CONF']['base_url']; ?>
/admin/menu.php"><i class="icon-reorder"></i> <span>Zarządzanie menu</span></a> </li>
                    <?php endif; ?>
                    <?php if ($this->_tpl_vars['user']['privileges']['strony_administration']): ?>
                    <li class="submenu <?php if ($this->_tpl_vars['menu_selected'] == 'strony'): ?>open active<?php endif; ?>"><a href="#"><i class="icon icon-copy"></i> <span>Strony</span></a>
                        <ul>
                            <li><a href="<?php echo $this->_tpl_vars['CONF']['base_url']; ?>
/admin/strony.php?action=add">Dodaj nową</a></li>
                            <li><a href="<?php echo $this->_tpl_vars['CONF']['base_url']; ?>
/admin/strony.php">Zarządzanie</a></li>
                        </ul>
                    </li>
                <?php endif; ?>
                <?php if ($this->_tpl_vars['user']['privileges']['petycje_administration']): ?>
                    <li class="submenu <?php if ($this->_tpl_vars['menu_selected'] == 'petycje'): ?>open active<?php endif; ?>"><a href="#"><i class="icon icon-globe"></i> <span>Petycje</span></a>
                        <ul>
                            <li><a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
/admin/petycje.php?action=add">Dodaj nową</a></li>
                            <li><a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
/admin/petycje.php">Zarządzanie</a></li>
                        </ul>
                    </li>
                <?php endif; ?>
                <?php if ($this->_tpl_vars['user']['privileges']['biuletyn_administration']): ?>
                    <li class="submenu  <?php if ($this->_tpl_vars['menu_selected'] == 'newsletter'): ?>open active<?php endif; ?>"><a href="#"><i class="icon icon-heart"></i> <span>Newsletter</span></a>
                        <ul>
                            <li><a href="<?php echo $this->_tpl_vars['CONF']['base_url']; ?>
/admin/newsletter.php?action=edit_info">Informacje</a></li>
                            <li><a href="<?php echo $this->_tpl_vars['CONF']['base_url']; ?>
/admin/newsletter.php?action=edit_rules">Regulamin</a></li>
                            <li><a href="<?php echo $this->_tpl_vars['CONF']['base_url']; ?>
/admin/newsletter.php?action=user">Subskrybenci</a></li>
                            <li><a href="<?php echo $this->_tpl_vars['CONF']['base_url']; ?>
/admin/mailing.php">Szablony wiadomości</a></li>
                            <li><a href="<?php echo $this->_tpl_vars['CONF']['base_url']; ?>
/admin/newsletter.php?action=mailing">Wysyłka</a></li>
                        </ul>
                    </li>
                <?php endif; ?>
                <?php if ($this->_tpl_vars['user']['privileges']['galeria_administration']): ?>
                    <li class="submenu  <?php if ($this->_tpl_vars['menu_selected'] == 'galeria'): ?>open active<?php endif; ?>"><a href="#"><i class="icon icon-picture"></i> <span>Galeria</span></a>
                        <ul>
                            <li><a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
/admin/galeria.php?action=add_gallery">Dodaj nową</a></li>
                            <li><a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
/admin/galeria.php">Zarządzanie</a></li>
                        </ul>
                    </li>
                <?php endif; ?>
                <?php if ($this->_tpl_vars['user']['privileges']['page_config']): ?>
                    <li class="submenu  <?php if ($this->_tpl_vars['menu_selected'] == 'ustawienia'): ?>open active<?php endif; ?>"><a href="#"><i class="icon icon-cog"></i> <span>Ustawienia</span></a>
                        <ul>
                            <li><a href="<?php echo $this->_tpl_vars['CONF']['base_url']; ?>
/admin/slownik.php">Słownik</a></li>
                            <li><a href="<?php echo $this->_tpl_vars['CONF']['base_url']; ?>
/admin/konfiguracja.php">Konfiguracja</a></li>
                            <li><a href="<?php echo $this->_tpl_vars['CONF']['base_url']; ?>
/admin/ranking.php">Google</a></li>
                            <li><a href="<?php echo $this->_tpl_vars['CONF']['base_url']; ?>
/admin/seo-konfiguracja.php">SEO</a></li>
                            <li><a href="<?php echo $this->_tpl_vars['CONF']['base_url']; ?>
/admin/szablony.php">Szablony strony</a></li>
                            <li><a href="<?php echo $this->_tpl_vars['CONF']['base_url']; ?>
/admin/uzytkownicy-mailing.php">Szablony email</a></li>
                            <li><a href="<?php echo $this->_tpl_vars['CONF']['base_url']; ?>
/admin/haslo.php">Zmiana hasła</a></li>
                            <li><a href="<?php echo $this->_tpl_vars['CONF']['base_url']; ?>
/admin/export-import-mysql.php">MySQL</a></li>
                        </ul>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
        <div id="content">
            <?php if ($this->_tpl_vars['body']): ?>
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['body'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            <?php else: ?>
                <div id="content-header">
                    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Panel</a> </div>
                    <h1>Panel główny</h1>
                </div>         
                <div class="container-fluid">
                    <div class="row-fluid">
                        <div class="span4">
                            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "statystyki/odwiedziny-strony.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "statystyki/odwiedziny-wpisy.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                        </div>
                        <div class="span8">
                            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "statystyki/rejestr-zmian.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                        </div>
                        <div class="span8">
                            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "statystyki/nieudane-logowania.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="row-fluid">
                <div id="footer" class="span12">
                    <?php echo $this->_tpl_vars['CONF']['footer']; ?>
</br>
                Realizacja: <a href="http://www.pkdevelop.pl/" title="PKDEVELOP - Paweł Kraus Usługi Pgorgrmistyczne">PKDEVELOP</a>
                </div>
            </div>
            <script src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/js/jquery.min.js"></script> 
            <script src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/js/jquery.ui.custom.js"></script> 
            <script src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/js/bootstrap.min.js"></script> 
            <script src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/js/matrix.js"></script>
            <script type="text/javascript" src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
/js/tinymce/tiny_mce.js"></script>
            <script type="text/javascript" src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
/js/tinymce.init.js"></script>
    </body>
</html>