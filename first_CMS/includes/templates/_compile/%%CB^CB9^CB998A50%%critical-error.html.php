<?php /* Smarty version 2.6.13, created on 2017-04-20 00:08:47
         compiled from critical-error.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'critical-error.html', 53, false),)), $this); ?>
<?php echo '<?xml'; ?>
 version="1.0" encoding="utf-8"<?php echo '?>'; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<title>Krytyczny błąd</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php echo '
	<style type="text/css">
	<!--
	/* <![CDATA[ */
		body{
			text-align: center;
			background: #eee;
			font-family: sans-serif, Helvetica, Arial;
			font-size: 10pt;
			color: #000;
			margin: 30px;
		}
		div#main-container{
			width: 750px;
			border: 1px solid #aaa;
			background: #fff;
			padding: 30px 20px;
			margin: 0px auto;
		}
		div{
			text-align: left;
		}
		div#page-title{
			border-left: 5px solid #c00;
			margin-bottom: 20px;
			padding-left: 5px;
			font-size: 14pt;
			font-weight: bold;
		}
		hr{
			border: 0px;
			color: #ccc;
			background: #ccc;
			height: 1px;
		}
	/* ]]> */
	-->	
	</style>
'; ?>
	
</head>
<body>

<div id="main-container">
			<!-- page-title -->  
			<div id="page-title"><?php echo ((is_array($_tmp=@$this->_tpl_vars['errorTitle'])) ? $this->_run_mod_handler('default', true, $_tmp, "Informacja o błędzie") : smarty_modifier_default($_tmp, "Informacja o błędzie")); ?>
</div><!-- koniec: page-title -->
			<!-- page-content -->
			<div id="page-content" class="error"><?php echo $this->_tpl_vars['error']; ?>
</div><!-- koniec: page-content -->		
</div><!-- koniec: main-container -->

</body>
</html>