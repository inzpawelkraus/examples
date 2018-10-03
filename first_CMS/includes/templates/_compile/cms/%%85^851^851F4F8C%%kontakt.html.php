<?php /* Smarty version 2.6.13, created on 2017-03-17 13:26:19
         compiled from misc/kontakt.html */ ?>
<div id="page-title"><h1><?php echo $this->_tpl_vars['LANG']['_PAGE_CONTAKT']; ?>
</h1></div>
<div id="page-content">
	<p class="error center"><?php echo $this->_tpl_vars['error_contact']; ?>
</p>
		<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
">
			<table>
				<tr><td><?php echo $this->_tpl_vars['LANG']['_KONTAKT_IMIE']; ?>
*</td><td><input class="text" type="text" name="imie" value="<?php echo $_POST['imie']; ?>
" /></td></tr>
				<tr><td><?php echo $this->_tpl_vars['LANG']['_KONTAKT_EMAIL']; ?>
*</td><td><input class="text" type="text" name="email" value="<?php echo $_POST['email']; ?>
" /></td></tr>
				<tr><td valign="top"><?php echo $this->_tpl_vars['LANG']['_KONTAKT_TRESC']; ?>
*</td><td><textarea name="tresc" rows="10" cols="50"><?php echo $_POST['tresc']; ?>
</textarea></td></tr>
				<tr><td><?php echo $this->_tpl_vars['LANG']['_KONTAKT_KOD']; ?>
*</td><td><input type="text" class="text" name="token" id="token" />
					<img style="border: 1px solid #666; position: relative; top: 5px; left: 10px;" src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
/js/token/token.php?n=<?php echo $this->_tpl_vars['tokenid']; ?>
" alt="Token" />
					<input type="hidden" name="tokenid" value="<?php echo $this->_tpl_vars['tokenid']; ?>
" /></td></tr>
				<tr><td></td><td class="right"><input type="hidden" name="action" value="send" /><input class="submit" type="submit" value="<?php echo $this->_tpl_vars['LANG']['_KONTAKT_WYSLIJ']; ?>
" /></td></tr>
			</table>
		</form>
	<p>* <?php echo $this->_tpl_vars['LANG']['_KONTAKT_WYPELNIJ']; ?>
</p>
</div>