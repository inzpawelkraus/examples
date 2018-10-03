<?php /* Smarty version 2.6.13, created on 2017-03-17 13:26:22
         compiled from uzytkownik/login-form.html */ ?>
<form method="post" action="<?php echo $this->_tpl_vars['BASE_URL']; ?>
/logowanie.html">
	<table align="center">
		<tr>
			<td><?php echo $this->_tpl_vars['LANG']['_PAGE_LOGIN']; ?>
</td><td><input class="text" type="text" name="login" style="width:100px" /></td>
		</tr><tr>
			<td><?php echo $this->_tpl_vars['LANG']['_PAGE_NEW_PASS']; ?>
</td><td><input class="text" type="password" name="pass" style="width:100px" /></td>		
		</tr><tr>
			<td></td>
			<td>
				<input type="submit" class="submit" value="<?php echo $this->_tpl_vars['LANG']['_PAGE_LOGGED2']; ?>
" />
			</td>		
		</tr>
	</table>
	<input type="hidden" name="referrer" value="<?php echo $_SERVER['HTTP_REFERER']; ?>
" />
</form>