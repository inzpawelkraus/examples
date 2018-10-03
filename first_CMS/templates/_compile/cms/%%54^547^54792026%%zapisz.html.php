<?php /* Smarty version 2.6.13, created on 2017-03-17 13:26:28
         compiled from newsletter/zapisz.html */ ?>
	<div id="page-title"><h1><?php echo $this->_tpl_vars['LANG']['_PAGE_NEWSLETTER']; ?>
</h1></div>
	
			<div id="page-content">
				<?php echo $this->_tpl_vars['informacja']; ?>

				<hr />
                <?php if ($this->_tpl_vars['newsletter_error']): ?><p align="center" class="error"><?php echo $this->_tpl_vars['newsletter_error']; ?>
</p><?php endif; ?>
				<form class="formularz" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
">
                    <table align="center">
                    <tr>
                        <td><?php echo $this->_tpl_vars['LANG']['_PAGE_NAME']; ?>
</td>                    
                        <td><input class="text" type="text" name="first_name" value="<?php echo $_POST['first_name']; ?>
" /></td>
                    </tr><tr>
                        <td><?php echo $this->_tpl_vars['LANG']['_PAGE_LASTNAME']; ?>
</td>
                        <td><input class="text" type="text" name="last_name" value="<?php echo $_POST['last_name']; ?>
" /></td>
                    </tr><tr>
                        <td><?php echo $this->_tpl_vars['LANG']['_PAGE_EMAIL']; ?>
</td>
                        <td><input class="text" type="text" name="email1" value="<?php echo $_POST['email1']; ?>
" /></td>
                    </tr><tr>
                        <td><?php echo $this->_tpl_vars['LANG']['_PAGE_REPEAT_EMAIL']; ?>
</td>
                        <td><input class="text" type="text" name="email2" value="<?php echo $_POST['email2']; ?>
" /></td>
                    </tr><tr>
                        <td colspan="2"><input id="rules" type="checkbox" name="rules" value="1" />
                        <label for="rules"><?php echo $this->_tpl_vars['LANG']['_NEWSLETTER_ACCEPT']; ?>
 
                        <a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
/newsletter.html?show=rules" class="fancybox" rel="fancybox" title="<?php echo $this->_tpl_vars['LANG']['_NEWSLETTER_ACCEPT2']; ?>
">
												<strong><?php echo $this->_tpl_vars['LANG']['_NEWSLETTER_ACCEPT2']; ?>
</strong></a>.</label>
                    </tr><tr>
                        <td></td>
                        <td><input class="submit" type="submit" value="<?php echo $this->_tpl_vars['LANG']['_NEWSLETTER_SAVE']; ?>
" /></td>
                     </tr><tr>
                         <td colspan="2"><p align="center"><a href="?show=remove"><?php echo $this->_tpl_vars['LANG']['_NEWSLETTER_UNSUBSCRIBE']; ?>
</a></p></td>
                    </tr>                        
                    </table>				
                    <input type="hidden" name="action" value="add_email" />
				</form>
			</div>