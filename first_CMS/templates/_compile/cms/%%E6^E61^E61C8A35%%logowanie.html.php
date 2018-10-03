<?php /* Smarty version 2.6.13, created on 2017-03-17 13:26:22
         compiled from uzytkownik/logowanie.html */ ?>
<div id="page-title"><h1><?php echo $this->_tpl_vars['LANG']['_PAGE_LOGIN_USER']; ?>
</h1></div>

<div id="page-content">
	<?php if ($this->_tpl_vars['user_error']): ?><p class="error center"><?php echo $this->_tpl_vars['user_error']; ?>
</p><?php endif; ?>
	<table align="center">
	<tr>
		<td width="400">
			<b><?php echo $this->_tpl_vars['LANG']['_PAGE_NEW_USER']; ?>
</b><br />
			<?php echo $this->_tpl_vars['LANG']['_PAGE_REGISTER_INFO']; ?>
<br /><br />
			<div class="center">
				<b><a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
/rejestracja.html" title="<?php echo $this->_tpl_vars['LANG']['_PAGE_REGISTER']; ?>
"><?php echo $this->_tpl_vars['LANG']['_PAGE_REGISTER']; ?>
</a></b>
			</div>		
		</td>
		<td width="100">
			<b><?php echo $this->_tpl_vars['LANG']['_PAGE_I_REGISTER']; ?>
</b><br />
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "uzytkownik/login-form.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><br />
			<div class="center"><b><a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
/konto/przypomnienie-hasla.html" title="<?php echo $this->_tpl_vars['LANG']['_PAGE_NEW_REMINDER']; ?>
"><?php echo $this->_tpl_vars['LANG']['_PAGE_NEW_REMINDER']; ?>
</a></b></div>	
		</td>
	</tr>
	</table>
</div>