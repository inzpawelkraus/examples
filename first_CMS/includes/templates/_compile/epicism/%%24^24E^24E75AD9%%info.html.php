<?php /* Smarty version 2.6.13, created on 2017-04-06 08:41:03
         compiled from misc/info.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'misc/info.html', 4, false),)), $this); ?>
<div id="page-title"><h1><?php echo $this->_tpl_vars['LANG']['_PAGE_INFO']; ?>
</h1></div>
	
<div id="page-content">
   <?php echo ((is_array($_tmp=@$this->_tpl_vars['info'])) ? $this->_run_mod_handler('default', true, $_tmp, "Operacja wykonana prawidłowo.") : smarty_modifier_default($_tmp, "Operacja wykonana prawidłowo.")); ?>
<br /><br /><?php echo $this->_tpl_vars['LANG']['_PAGE_GO_MAIN']; ?>

</div>