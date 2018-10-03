<?php /* Smarty version 2.6.13, created on 2017-03-17 13:26:30
         compiled from uzytkownik/rejestracja.html */ ?>
<?php echo '
    <script type="text/javascript">
    <!-- <![CDATA[
        window.onload = function()
        {
            var f = document.getElementById(\'register\');
            var d = document.getElementById(\'typ_konta\');

            if (f.business.checked == true)
            {
                d.style.display = \'block\';
            } else
            {
    ';  if ($_POST['business'] != 1):  echo '
                                        d.style.display = \'none\';
    ';  endif;  echo '
                                    }
                                }

    // ]CDATA]> -->
    </script>
'; ?>


<!-- page-title -->  
<div id="page-title"><h1><?php echo $this->_tpl_vars['LANG']['_PAGE_REGISTER']; ?>
</h1></div><!-- koniec: page-title -->

<!-- page-content -->
<div id="page-content">
    <p>
        <?php echo $this->_tpl_vars['LANG']['USER_REGISTER_INFO']; ?>
		
    </p>
    <p class="center"><b>
            <?php echo $this->_tpl_vars['LANG']['_USER_STAR']; ?>
		
        </b></p>

    <?php if ($this->_tpl_vars['register_error']): ?>
        <p class="center error"><?php echo $this->_tpl_vars['register_error']; ?>
</p>
    <?php endif; ?>
    <form method="post" id="register" action="<?php echo $_SERVER['PHP_SELF']; ?>
">
        <table align="center">
            <tr>
                <td width="250"><b><?php echo $this->_tpl_vars['LANG']['_PAGE_LOGIN']; ?>
</b> <span class="important">*</span><br /><small><?php echo $this->_tpl_vars['LANG']['_USER_NAME_ACCOUNT']; ?>
</small></td>
                <td><input type="text" class="text" name="login" value="<?php echo $_POST['login']; ?>
" size="30" /></td>			
            </tr><tr>
                <td><b><?php echo $this->_tpl_vars['LANG']['_PAGE_NEW_PASS']; ?>
</b> <span class="important">*</span><br /><small><?php echo $this->_tpl_vars['LANG']['_USER_MIN_SING']; ?>
</small></td>		
                <td><input type="password" class="text" name="pass1" value="<?php echo $_POST['pass1']; ?>
" size="30" /></td>	
            </tr><tr>
                <td><b><?php echo $this->_tpl_vars['LANG']['_PAGE_REPEAT_PASS']; ?>
</b> <span class="important">*</span><br /><small><?php echo $this->_tpl_vars['LANG']['_USER_BAD_BOTH_PASS']; ?>
</small></td>
                <td><input type="password" class="text" name="pass2"  value="<?php echo $_POST['pass2']; ?>
" size="30" /></td>
            </tr><tr>
                <td><b><?php echo $this->_tpl_vars['LANG']['_USER_TYPE_ACCOUNT']; ?>
</b><br /><small><?php echo $this->_tpl_vars['LANG']['_USER_CHECK_TRUE']; ?>
</small></td>
                <td>
                    <input id="b0" type="radio" name="business" onclick="hide('typ_konta');" value="0"<?php if ($_POST['business'] == 0): ?> checked="true"<?php endif; ?> />
                    <label for="b0"><?php echo $this->_tpl_vars['LANG']['_USER_PERSON']; ?>
</label><br />
                    <input id="b1" type="radio" name="business" onclick="show('typ_konta');" value="1"<?php if ($_POST['business'] == 1): ?> checked="true"<?php endif; ?>  />
                    <label for="b1"><?php echo $this->_tpl_vars['LANG']['_USER_FIRM']; ?>
</label><br />				
                </td>			
            </tr><tr>
                <td colspan="2">
                    <table id="typ_konta" cellpaddin="0" cellspacing="0">	
                        <tr>
                            <td width="250"><b><?php echo $this->_tpl_vars['LANG']['_USER_FIRM_NAME']; ?>
</b> <span class="important">*</span></td>
                            <td>
                                <input type="text" class="text" name="firm_name" value="<?php echo $_POST['firm_name']; ?>
" size="30" /></td>
                        </tr><tr>
                            <td><b><?php echo $this->_tpl_vars['LANG']['_USER_NIP']; ?>
</b> <span class="important">*</span><br /><small><?php echo $this->_tpl_vars['LANG']['_USER_VAT']; ?>
</small></td>
                            <td><input type="text" class="text" name="nip" value="<?php echo $_POST['nip']; ?>
" maxlength="10" size="10" /></td> 
                        </tr>
                    </table>
                </td>
            </tr><tr>
                <td><b><?php echo $this->_tpl_vars['LANG']['_PAGE_NAME']; ?>
</b> <span class="important">*</span></td>
                <td><input type="text" class="text" name="first_name" value="<?php echo $_POST['first_name']; ?>
" size="30" /></td>
            </tr><tr>
                <td><b><?php echo $this->_tpl_vars['LANG']['_PAGE_LASTNAME']; ?>
</b> <span class="important">*</span></td>
                <td><input type="text" class="text" name="last_name" value="<?php echo $_POST['last_name']; ?>
" size="30" /></td>			
            </tr><tr>
                <td><b><?php echo $this->_tpl_vars['LANG']['_PAGE_STREET']; ?>
</b> <span class="important">*</span></td>
                <td><input type="text" class="text" name="street" value="<?php echo $_POST['street']; ?>
" size="30" /></td>		
            </tr><tr>
                <td><b><?php echo $this->_tpl_vars['LANG']['_PAGE_NR_BUD']; ?>
</b> <span class="important">*</span></td>
                <td><input type="text" class="text" name="nr_bud" value="<?php echo $_POST['nr_bud']; ?>
" size="10" /> <input type="text" class="text" name="nr_lok" value="<?php echo $_POST['nr_lok']; ?>
" size="10" /></td>		
            </tr><tr>
                <td><b><?php echo $this->_tpl_vars['LANG']['_PAGE_POSTCODE']; ?>
</b> <span class="important">*</span><br /><small><?php echo $this->_tpl_vars['LANG']['_PAGE_POSTCODE_TRUE']; ?>
</small></td>
                <td><input type="text" class="text" name="post_code" value="<?php echo $_POST['post_code']; ?>
" size="6" maxlength="6" /></td>			
            </tr><tr>
                <td><b><?php echo $this->_tpl_vars['LANG']['_PAGE_CITY']; ?>
</b> <span class="important">*</span></td>
                <td><input type="text" class="text" name="city" value="<?php echo $_POST['city']; ?>
" size="30" /></td>			
            </tr><tr>
                <td><b><?php echo $this->_tpl_vars['LANG']['_PAGE_PHONE']; ?>
</b></td>
                <td><input type="text" class="text" name="phone" value="<?php echo $_POST['phone']; ?>
" size="30" /></td>
            </tr><tr>
                <td><b><?php echo $this->_tpl_vars['LANG']['_PAGE_EMAIL']; ?>
</b> <span class="important">*</span></td>
                <td><input type="text" class="text" name="email1" value="<?php echo $_POST['email1']; ?>
" size="30" /></td>			
            </tr><tr>
                <td><b><?php echo $this->_tpl_vars['LANG']['_PAGE_REPEAT_EMAIL']; ?>
</b><br /><small><?php echo $this->_tpl_vars['LANG']['_USER_BOTH_EMAIL']; ?>
</small></td>
                <td><input type="text" class="text" name="email2" value="<?php echo $_POST['email2']; ?>
" size="30" /></td>
            </tr><tr>
                <td></td>
                <td>
                    <input type="hidden" name="action" value="register" />
                    <input class="submit" type="submit" value="<?php echo $this->_tpl_vars['LANG']['_PAGE_REG']; ?>
" />				
                </td>			
            </tr>
        </table>
    </form>
</div><!-- end page-content -->  