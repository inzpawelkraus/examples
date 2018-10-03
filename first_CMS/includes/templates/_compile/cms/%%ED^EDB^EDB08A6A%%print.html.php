<?php /* Smarty version 2.6.13, created on 2017-02-27 10:03:45
         compiled from misc/print.html */ ?>
<?php echo '<?xml'; ?>
 version="1.0" encoding="utf-8"<?php echo '?>'; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<title><?php echo $this->_tpl_vars['CONF']['page_title'];  if ($this->_tpl_vars['page']['title']): ?> - <?php echo $this->_tpl_vars['page']['title'];  endif; ?></title>
	<?php echo '
	<style type="text/css">
	/* <![CDATA[ */
	body { font-size: 9pt; font-family: Verdana,Arial,Helvetica; margin: 0px; padding: 0px; color: #333; }
	img { border: 0px; margin: 5px; }
	div { padding: 10px; }
	h1, h2, h3, h4, h5, h6 { padding: 10px 5px; margin: 0px; }
	h1.title { border-left: 5px solid #ccc; color: #666; margin-bottom: 10px; background-color: #eee; }
	#copyright { border-bottom: 1px solid #ebebeb; background: #f9f9f9; }
	#copyright h1{ font-size: 18pt; margin: 0px; padding-left: 20px; color: #555; }
	#content { width: 998px; }	
	#footer { font-size: 8pt; color: #666; border-top: 1px solid #ebebeb; background: #f9f9f9; }
	#footer a { color: #666; }
	a,a:hover,a:visited,a:active { color: #333; text-decoration: underline; }
	/* ]]> */	
	</style>
	'; ?>

</head>
<body>

<div id="content">
<h1 class="title"><?php echo $this->_tpl_vars['article']['title']; ?>
</h1>
<?php if ($this->_tpl_vars['article']['photo']['photo_small']): ?>
	<img src="<?php echo $this->_tpl_vars['article']['photo']['photo_small']; ?>
" alt="Zdjęcie" align="left" />
<?php endif;  echo $this->_tpl_vars['article']['content']; ?>

</div>

<div id="footer">
	<?php echo $this->_tpl_vars['CONF']['copyright']; ?>
 <?php echo $this->_tpl_vars['CONF']['footer']; ?>

</div>

<p style="margin-left: 10px;">
<a href="javascript:print();document.location.href='<?php echo $_SERVER['REDIRECT_URL']; ?>
';"><strong><?php echo $this->_tpl_vars['LANG']['_PAGE_PRINT']; ?>
</strong></a>
</p>

</body>
</html>