<?php /* Smarty version 2.6.13, created on 2017-04-20 15:13:51
         compiled from uzytkownicy/dodaj.html */ ?>
<div id="content-header">
    <div id="breadcrumb"> <a href="/admin" title="Panel" class="tip-bottom"><i class="icon-home"></i> Panel</a> <a>Użytkownicy</a><a class="current">Nowy</a> </div>
    <h1><?php echo $this->_tpl_vars['pageTitle']; ?>
</h1>
</div>
<div class="container-fluid">
    <div class="row-fluid">
        <a class="btn" href="?"><i class="icon-step-backward"></i> Powrót</a></br></br>

        <?php if ($this->_tpl_vars['register_error']): ?>
        <div class="alert alert-danger">
            <?php echo $this->_tpl_vars['register_error']; ?>

        </div>
        <?php endif; ?>
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                <h5>Formularz dodawania aktualności</h5>
            </div>
            <div class="widget-content nopadding">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
" class="form-horizontal">
                    <div class="control-group span6">
                        <label class="control-label">Login :</label>
                        <div class="controls">
                            <input class="text" type="text" name="login" value="<?php echo $_POST['login']; ?>
" size="40" />
                        </div>
                        <label class="control-label">E-mail :</label>
                        <div class="controls">
                            <input class="text" type="text" name="email1" value="<?php echo $_POST['email1']; ?>
" size="40" />
                        </div>
                        <label class="control-label">Powtórz E-mail :</label>
                        <div class="controls">
                            <input class="text" type="text" name="email2" value="<?php echo $_POST['email2']; ?>
" size="40" />
                        </div>
                        <label class="control-label">Imię :</label>
                        <div class="controls">
                            <input class="text" type="text" name="first_name" value="<?php echo $_POST['first_name']; ?>
" size="40" />
                        </div>
                        <label class="control-label">Nazwisko :</label>
                        <div class="controls">
                            <input class="text" type="text" name="last_name" value="<?php echo $_POST['last_name']; ?>
" size="40" />
                        </div>
                        <div class="controls">
                            <label>
                                <input id="b0" type="radio" name="business" value="0"<?php if ($_POST['business'] == 0): ?> checked="true"<?php endif; ?> />
                                       Osoba fizyczna</label>
                            <label>
                                <input id="b1" type="radio" name="business" value="1"<?php if ($_POST['business'] == 1): ?> checked="true"<?php endif; ?>  />
                                       Firma</label>
                        </div>
                        <label class="control-label">Ulica :</label>
                        <div class="controls">
                            <input class="text" type="text" name="street" value="<?php echo $_POST['street']; ?>
" size="40" />
                        </div>
                        <label class="control-label">Nr budynku/lokalu :</label>
                        <div class="controls">
                            <input class="text" style="width: 60px;" type="text" name="nr_bud" value="<?php echo $_POST['nr_bud']; ?>
" size="15" /> / <input class="text" style="width: 60px;" type="text" name="nr_lok" value="<?php echo $_POST['nr_lok']; ?>
" size="15" />
                        </div>
                        <label class="control-label">Kod pocztowy :</label>
                        <div class="controls">
                            <input class="text" type="text" name="post_code" value="<?php echo $_POST['post_code']; ?>
" size="6" maxlength="6" placeholder="XX-XXX"/>
                        </div>
                        <div class="controls">
                            <input type="hidden" name="action" value="add_user" />
                            <input class="btn btn-success pull-right" type="submit" value="Dodaj użytkownika" /></br></br>
                        </div>
                    </div>
                    <div class="control-group span6">
                        <label class="control-label">Hasło :</label>
                        <div class="controls">
                            <input class="text" type="password" name="pass1" value="" size="40" />
                        </div>
                        <label class="control-label">Potwierdż hasło :</label>
                        <div class="controls">
                            <input class="text" type="password" name="pass2" value="" size="40" />
                        </div>
                        <label class="control-label">Status konta :</label>
                        <div class="controls">
                            <select name="active">
                                <option value="0"<?php if ($_POST['active'] == 0): ?> selected="true"<?php endif; ?>>NIEAKTYWNE</option>
                                <option value="1"<?php if ($_POST['active'] == 1): ?> selected="true"<?php endif; ?>>AKTYWNE</option>
                            </select>
                        </div>
                        <label class="control-label">Logowanie do panelu :</label>
                        <div class="controls">
                            <select name="admin_login">
                                <option value="0"<?php if ($_POST['admin_login'] == 0): ?> selected="true"<?php endif; ?>>NIE</option>
                                <option value="1"<?php if ($_POST['admin_login'] == 1): ?> selected="true"<?php endif; ?>>TAK</option>
                            </select>
                        </div>
                        <label class="control-label">Grupa :</label>
                        <div class="controls">
                            <select name="group_id">
                                <option value="">- wybierz -</option> 
                                <?php unset($this->_sections['g']);
$this->_sections['g']['name'] = 'g';
$this->_sections['g']['loop'] = is_array($_loop=$this->_tpl_vars['groups']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['g']['show'] = true;
$this->_sections['g']['max'] = $this->_sections['g']['loop'];
$this->_sections['g']['step'] = 1;
$this->_sections['g']['start'] = $this->_sections['g']['step'] > 0 ? 0 : $this->_sections['g']['loop']-1;
if ($this->_sections['g']['show']) {
    $this->_sections['g']['total'] = $this->_sections['g']['loop'];
    if ($this->_sections['g']['total'] == 0)
        $this->_sections['g']['show'] = false;
} else
    $this->_sections['g']['total'] = 0;
if ($this->_sections['g']['show']):

            for ($this->_sections['g']['index'] = $this->_sections['g']['start'], $this->_sections['g']['iteration'] = 1;
                 $this->_sections['g']['iteration'] <= $this->_sections['g']['total'];
                 $this->_sections['g']['index'] += $this->_sections['g']['step'], $this->_sections['g']['iteration']++):
$this->_sections['g']['rownum'] = $this->_sections['g']['iteration'];
$this->_sections['g']['index_prev'] = $this->_sections['g']['index'] - $this->_sections['g']['step'];
$this->_sections['g']['index_next'] = $this->_sections['g']['index'] + $this->_sections['g']['step'];
$this->_sections['g']['first']      = ($this->_sections['g']['iteration'] == 1);
$this->_sections['g']['last']       = ($this->_sections['g']['iteration'] == $this->_sections['g']['total']);
?>
                                <option value="<?php echo $this->_tpl_vars['groups'][$this->_sections['g']['index']]['id']; ?>
"<?php if ($this->_tpl_vars['groups'][$this->_sections['g']['index']]['id'] == $_POST['group_id']): ?> selected="true"<?php endif; ?>><?php echo $this->_tpl_vars['groups'][$this->_sections['g']['index']]['name']; ?>
</option> 
                                <?php endfor; endif; ?>					
                            </select>
                        </div>
                        <label class="control-label">Nazwa firmy:</label>
                        <div class="controls">
                            <input class="text" type="text" name="firm_name" value="<?php echo $_POST['firm_name']; ?>
" size="40" />
                        </div>
                        <label class="control-label">NIP :</label>
                        <div class="controls">
                            <input class="text" type="text" name="nip" value="<?php echo $_POST['nip']; ?>
" size="40" />
                        </div>
                        <label class="control-label">Miejscowość :</label>
                        <div class="controls">
                            <input class="text" type="text" name="city" value="<?php echo $_POST['city']; ?>
" size="40" />
                        </div>
                        <label class="control-label">Telefon :</label>
                        <div class="controls">
                            <input class="text" type="text" name="phone" value="<?php echo $_POST['phone']; ?>
" size="40" />
                        </div>
                    </div>

                    <!--            <table class="">
                                    <tr>
                                        <td width="40%"><b>Login:</b><br /><small>Nazwa konta / użytkownika</small></td>
                                        <td><input class="text" type="text" name="login" value="<?php echo $_POST['login']; ?>
" size="40" /></td>			
                                    </tr><tr>
                                        <td><b>Hasło:</b></td>
                                        <td><input class="text" type="password" name="pass1" value="<?php echo $_POST['pass1']; ?>
" size="40" /></td>
                                    </tr><tr>
                                        <td><b>Powtórz hasło:</b></td>
                                        <td><input class="text" type="password" name="pass2" value="<?php echo $_POST['pass2']; ?>
" size="40" /></td>
                                    </tr><tr>
                                        <td><b>E-mail:</b></td>
                                        <td><input class="text" type="text" name="email1" value="<?php echo $_POST['email1']; ?>
" size="40" /></td>
                                    </tr><tr>
                                        <td><b>Powtórz e-mail:</b></td>
                                        <td><input class="text" type="text" name="email2" value="<?php echo $_POST['email2']; ?>
" size="40" /></td>			
                                    </tr><tr>
                                        <td><b>Status konta:</b></td>
                                        <td>
                                            <select name="active">
                                                <option value="0"<?php if ($_POST['active'] == 0): ?> selected="true"<?php endif; ?>>nieaktywne</option>
                                                <option value="1"<?php if ($_POST['active'] == 1): ?> selected="true"<?php endif; ?>>aktywne</option>
                                            </select>				
                                        </td>
                                    </tr><tr>
                                        <td><b>Logowanie do panelu administratora:</b></td>
                                        <td>
                                            <select name="admin_login">
                                                <option value="0"<?php if ($_POST['admin_login'] == 0): ?> selected="true"<?php endif; ?>>NIE</option>
                                                <option value="1"<?php if ($_POST['admin_login'] == 1): ?> selected="true"<?php endif; ?>>TAK</option>
                                            </select>				
                                        </td>
                                    </tr><tr>
                                        <td><b>Grupa:</b></td>
                                        <td>
                                            <select name="group_id">
                                                <option value="">nie wybrano grupy</option> 
                                                <?php unset($this->_sections['g']);
$this->_sections['g']['name'] = 'g';
$this->_sections['g']['loop'] = is_array($_loop=$this->_tpl_vars['groups']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['g']['show'] = true;
$this->_sections['g']['max'] = $this->_sections['g']['loop'];
$this->_sections['g']['step'] = 1;
$this->_sections['g']['start'] = $this->_sections['g']['step'] > 0 ? 0 : $this->_sections['g']['loop']-1;
if ($this->_sections['g']['show']) {
    $this->_sections['g']['total'] = $this->_sections['g']['loop'];
    if ($this->_sections['g']['total'] == 0)
        $this->_sections['g']['show'] = false;
} else
    $this->_sections['g']['total'] = 0;
if ($this->_sections['g']['show']):

            for ($this->_sections['g']['index'] = $this->_sections['g']['start'], $this->_sections['g']['iteration'] = 1;
                 $this->_sections['g']['iteration'] <= $this->_sections['g']['total'];
                 $this->_sections['g']['index'] += $this->_sections['g']['step'], $this->_sections['g']['iteration']++):
$this->_sections['g']['rownum'] = $this->_sections['g']['iteration'];
$this->_sections['g']['index_prev'] = $this->_sections['g']['index'] - $this->_sections['g']['step'];
$this->_sections['g']['index_next'] = $this->_sections['g']['index'] + $this->_sections['g']['step'];
$this->_sections['g']['first']      = ($this->_sections['g']['iteration'] == 1);
$this->_sections['g']['last']       = ($this->_sections['g']['iteration'] == $this->_sections['g']['total']);
?>
                                                <option value="<?php echo $this->_tpl_vars['groups'][$this->_sections['g']['index']]['id']; ?>
"<?php if ($this->_tpl_vars['groups'][$this->_sections['g']['index']]['id'] == $_POST['group_id']): ?> selected="true"<?php endif; ?>><?php echo $this->_tpl_vars['groups'][$this->_sections['g']['index']]['name']; ?>
</option> 
                                                <?php endfor; endif; ?>					
                                            </select>				
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Imię:</b></td>
                                        <td><input class="text" type="text" name="first_name" value="<?php echo $_POST['first_name']; ?>
" size="40" /></td>
                                    </tr><tr>
                                        <td><b>Nazwisko:</b></td>
                                        <td><input class="text" type="text" name="last_name" value="<?php echo $_POST['last_name']; ?>
" size="40" /></td>			
                                    </tr><tr>
                                        <td><b>Typ konta</b><br /><small>Proszę zaznaczyć właściwe</small></td>
                                        <td>
                                            <input id="b0" type="radio" name="business" value="0"<?php if ($_POST['business'] == 0): ?> checked="true"<?php endif; ?> />
                                                   <label for="b0">osoba fizyczna</label><br />
                                            <input id="b1" type="radio" name="business" value="1"<?php if ($_POST['business'] == 1): ?> checked="true"<?php endif; ?>  />
                                                   <label for="b1">firma</label><br />				
                                        </td>			
                                    </tr><tr>
                                        <td><b>Nazwa firmy:</b></td>
                                        <td><input class="text" type="text" name="firm_name" value="<?php echo $_POST['firm_name']; ?>
" size="40" /></td>			
                                    </tr><tr>
                                        <td><b>Numer NIP:</b></td>
                                        <td><input class="text" type="text" name="nip" value="<?php echo $_POST['nip']; ?>
" size="40" /></td>			
                                    </tr><tr>
                                        <td><b>Ulica:</b></td>
                                        <td><input class="text" type="text" name="street" value="<?php echo $_POST['street']; ?>
" size="40" /></td>		
                                    </tr><tr>
                                        <td><b>Nr budynku/lokalu:</b></td>
                                        <td><input class="text" type="text" name="nr_bud" value="<?php echo $_POST['nr_bud']; ?>
" size="15" /> <input class="text" type="text" name="nr_lok" value="<?php echo $_POST['nr_lok']; ?>
" size="15" /></td>		
                                    </tr><tr>
                                        <td><b>Kod pocztowy:</b><br /><small>Poprawny kod pocztowy: xx-xxx</small></td>
                                        <td><input class="text" type="text" name="post_code" value="<?php echo $_POST['post_code']; ?>
" size="6" maxlength="6" /></td>			
                                    </tr><tr>
                                        <td><b>Miejscowość:</b></td>
                                        <td><input class="text" type="text" name="city" value="<?php echo $_POST['city']; ?>
" size="40" /></td>			
                                    </tr><tr>
                                        <td><b>Telefon:</b></td>
                                        <td><input class="text" type="text" name="phone" value="<?php echo $_POST['phone']; ?>
" size="40" /></td>
                                    </tr><tr>
                                        <td></td>
                                        <td>
                                            <input type="hidden" name="action" value="add_user" />
                                            <input class="submit" type="submit" value="Dodaj użytkownika" />				
                                        </td>			
                                    </tr>
                                </table>-->
                </form>  
            </div>
        </div>
    </div>
</div>