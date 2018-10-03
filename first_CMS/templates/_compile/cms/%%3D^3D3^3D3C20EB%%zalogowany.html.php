<?php /* Smarty version 2.6.13, created on 2016-04-07 08:15:03
         compiled from uzytkownik/zalogowany.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'uzytkownik/zalogowany.html', 4, false),)), $this); ?>
<div id="page-title"><h1><?php echo $this->_tpl_vars['LANG']['_PAGE_LOGGED']; ?>
</h1></div>

<div id="page-content">
	<?php echo $this->_tpl_vars['LANG']['_PAGE_WELCOME']; ?>
 <b><?php echo ((is_array($_tmp=@$this->_tpl_vars['user']['first_name'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['user']['login']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['user']['login'])); ?>
</b>!<br />	
	<?php echo $this->_tpl_vars['LANG']['_PAGE_LOGGED_INFO']; ?>
 <a href="<?php echo $_POST['referrer']; ?>
" title="<?php echo $this->_tpl_vars['LANG']['_PAGE_BACK']; ?>
"><?php echo $this->_tpl_vars['LANG']['_PAGE_BACK']; ?>
</a>.
</div>