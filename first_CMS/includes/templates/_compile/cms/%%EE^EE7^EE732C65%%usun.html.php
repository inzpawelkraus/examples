<?php /* Smarty version 2.6.13, created on 2017-02-27 10:38:58
         compiled from newsletter/usun.html */ ?>
	<div id="page-title"><h1><?php echo $this->_tpl_vars['LANG']['_PAGE_UNSUBSCRIBE']; ?>
</h1></div>

			<div id="page-content">
				<form class="formularz" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
">
                    <table align="center">
                    <tr>
                        <td><?php echo $this->_tpl_vars['LANG']['_NEWSLETTER_DEL_EMAIL2']; ?>
</td>
                        <td><input class="text" type="text" name="email" value="<?php echo $_POST['email1']; ?>
" /></td>
                    </tr><tr>
                        <td></td>
                        <td>
                           <input type="hidden" name="action" value="remove_email" />
                           <input class="submit" type="submit" value="<?php echo $this->_tpl_vars['LANG']['_NEWSLETTER_DELETE']; ?>
" />
                        </td>
                    </tr>                        
                    </table>                   
				</form>
			</div> 