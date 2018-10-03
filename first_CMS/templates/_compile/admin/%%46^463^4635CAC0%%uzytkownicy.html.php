<?php /* Smarty version 2.6.13, created on 2017-04-20 15:43:29
         compiled from uzytkownicy/uzytkownicy.html */ ?>
<div id="content-header">
    <div id="breadcrumb"> <a href="/admin" title="Panel" class="tip-bottom"><i class="icon-home"></i> Panel</a> <a>Użytkownicy</a><a class="current">Zarządzanie</a> </div>
    <h1><?php echo $this->_tpl_vars['pageTitle']; ?>
</h1>
</div>
<div class="container-fluid">
    <div class="row-fluid">

        <div class="info">W polach tekstowych można stosować "maski": % zastępuje dowolny ciąg, _ pojedynczy znak.<br />
            Na przykład: wpisanie "P%" w pole imię spowoduje wyświetlenie wszystkich użytkowników o imieniu zaczynającym się na 
            literę P.</div>

        <form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>
">
            <b>Filtr:</b> <br />	
            <table>
                <tr>
                    <td>Login:</td>
                    <td><input class="text medium" type="text" name="login" value="<?php echo $_GET['login']; ?>
" size="30" /></td>
                    <td>Imię:</td>
                    <td><input class="text medium" type="text" name="first_name" value="<?php echo $_GET['first_name']; ?>
" size="30" /></td>
                </tr>
                <tr>
                    <td>E-mail:</td>
                    <td><input class="text medium" type="text" name="email" value="<?php echo $_GET['email']; ?>
" size="30" /></td>
                    <td>Nazwisko:</td>
                    <td><input class="text medium" type="text" name="last_name" value="<?php echo $_GET['last_name']; ?>
" size="30" /></td>
                </tr>
            </table>

            <b>Pokaż konta:</b>&nbsp;&nbsp;&nbsp;
            <select name="active">
                <option value="%"<?php if ($_GET['active'] == "%"): ?> selected="true"<?php endif; ?>>- wszystkie -</option>
                <option value="0"<?php if ($_GET['active'] == '0'): ?> selected="true"<?php endif; ?>>nieaktywne</option>
                <option value="1"<?php if ($_GET['active'] == '1'): ?> selected="true"<?php endif; ?>>aktywne</option>	
            </select>
            <select name="admin_login">
                <option value="%"<?php if ($_GET['admin_login'] == "%"): ?> selected="true"<?php endif; ?>>- wszystkie -</option>
                <option value="0"<?php if ($_GET['admin_login'] == '0'): ?> selected="true"<?php endif; ?>>bez dostępu do panelu admina</option>
                <option value="1"<?php if ($_GET['admin_login'] == '1'): ?> selected="true"<?php endif; ?>>z dostępem do panelu admina</option>	
            </select>
            <select name="group_id">
                <option value="%">- wszystkie -</option>
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
"<?php if ($_GET['group_id'] == $this->_tpl_vars['groups'][$this->_sections['g']['index']]['id']): ?> selected="true"<?php endif; ?>><?php echo $this->_tpl_vars['groups'][$this->_sections['g']['index']]['name']; ?>
</option>
                <?php endfor; endif; ?>	
            </select>
            <br />
            <b>Sortowanie:</b>&nbsp;&nbsp;&nbsp;
            Ilość użytkowników na stronę: 
            <input class="text small" type="text" name="limit" value="<?php echo $_GET['limit']; ?>
" size="3" />
            Sortuj według: 
            <select name="order_field">
                <option value="">- wybierz -</option>
                <option value="id"<?php if ($_GET['order_field'] == 'id'): ?> selected="true"<?php endif; ?>>id użytkownika</option>
                <option value="login"<?php if ($_GET['order_field'] == 'login'): ?> selected="true"<?php endif; ?>>loginu</option>		
                <option value="first_name"<?php if ($_GET['order_field'] == 'first_name'): ?> selected="true"<?php endif; ?>>imię</option>
                <option value="last_name"<?php if ($_GET['order_field'] == 'last_name'): ?> selected="true"<?php endif; ?>>nazwiska</option>
                <option value="firm_name"<?php if ($_GET['order_field'] == 'firm_name'): ?> selected="true"<?php endif; ?>>nazwy firmy</option>
                <option value="email"<?php if ($_GET['order_field'] == 'email'): ?> selected="true"<?php endif; ?>>adresu e-mail</option>
            </select>
            <select name="order_type">
                <option value="">- wybierz -</option>
                <option value="ASC"<?php if ($_GET['order_type'] == 'ASC'): ?> selected="true"<?php endif; ?>>rosnąco</option>
                <option value="DESC"<?php if ($_GET['order_type'] == 'DESC'): ?> selected="true"<?php endif; ?>>malejąco</option>	
            </select><br />
            <input class="btn btn-success" type="submit" value="Zastosuj" />
            <a class="btn btn-danger" href="?">Pokaż wszystkie konta</a>
        </form>
        <br />
        <hr />

        <p class="center"><a href="?action=add_user"><img src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/img/add_user.png" alt="Użytkownik" /> <strong>Dodaj nowego użytkownika</strong></a></p>


        <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-list-ul"></i></span>
                <h5>Uzytkownicy serwisu</h5>
            </div>
            <div class="widget-content nopadding">
                <table class="table table-bordered table-striped">
                    <thead>
                    <th align="left">Login</th>
                    <th align="left">&nbsp;</th>
                    <th align="left">Firma</th>
                    <th align="left">E-mail</th>
                    <th width='80'>Dostęp do panelu</th>
                    <th width='100'>Grupa</th>
                    <th width='80'>Użytkownik aktywny</th>
                    <th width='120'>Akcje</th>
                    </thead>
                    <tbody>
                        <?php unset($this->_sections['u1']);
$this->_sections['u1']['name'] = 'u1';
$this->_sections['u1']['loop'] = is_array($_loop=$this->_tpl_vars['users']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['u1']['show'] = true;
$this->_sections['u1']['max'] = $this->_sections['u1']['loop'];
$this->_sections['u1']['step'] = 1;
$this->_sections['u1']['start'] = $this->_sections['u1']['step'] > 0 ? 0 : $this->_sections['u1']['loop']-1;
if ($this->_sections['u1']['show']) {
    $this->_sections['u1']['total'] = $this->_sections['u1']['loop'];
    if ($this->_sections['u1']['total'] == 0)
        $this->_sections['u1']['show'] = false;
} else
    $this->_sections['u1']['total'] = 0;
if ($this->_sections['u1']['show']):

            for ($this->_sections['u1']['index'] = $this->_sections['u1']['start'], $this->_sections['u1']['iteration'] = 1;
                 $this->_sections['u1']['iteration'] <= $this->_sections['u1']['total'];
                 $this->_sections['u1']['index'] += $this->_sections['u1']['step'], $this->_sections['u1']['iteration']++):
$this->_sections['u1']['rownum'] = $this->_sections['u1']['iteration'];
$this->_sections['u1']['index_prev'] = $this->_sections['u1']['index'] - $this->_sections['u1']['step'];
$this->_sections['u1']['index_next'] = $this->_sections['u1']['index'] + $this->_sections['u1']['step'];
$this->_sections['u1']['first']      = ($this->_sections['u1']['iteration'] == 1);
$this->_sections['u1']['last']       = ($this->_sections['u1']['iteration'] == $this->_sections['u1']['total']);
?>
                        <tr>
                            <!-- nazwa -->
                            <td><a href="?action=edit_user&amp;id=<?php echo $this->_tpl_vars['users'][$this->_sections['u1']['index']]['id']; ?>
"><b><?php echo $this->_tpl_vars['users'][$this->_sections['u1']['index']]['login']; ?>
</b></a></td>
                            <td>
                                <b>Nazwisko:</b> <?php echo $this->_tpl_vars['users'][$this->_sections['u1']['index']]['last_name']; ?>
<br />
                                <b>Imię:</b> <?php echo $this->_tpl_vars['users'][$this->_sections['u1']['index']]['first_name']; ?>

                            </td>
                            <!-- firma -->
                            <td><?php echo $this->_tpl_vars['users'][$this->_sections['u1']['index']]['firm_name']; ?>
</td>	
                            <!-- email -->
                            <td><?php echo $this->_tpl_vars['users'][$this->_sections['u1']['index']]['email']; ?>
</td>	
                            <!-- typ konta -->
                            <td class="center">
                                <?php if ($this->_tpl_vars['users'][$this->_sections['u1']['index']]['admin_login'] == 1): ?><span class="user-active">Tak</span>
                                <?php else: ?><span class="user-inactive">Nie</span><?php endif; ?>
                            </td>
                            <!-- grupa -->
                            <td class="center"><?php echo $this->_tpl_vars['users'][$this->_sections['u1']['index']]['group_name']; ?>
</td>
                            <!-- status -->
                            <td class="center">
                                <?php if ($this->_tpl_vars['users'][$this->_sections['u1']['index']]['active'] == 1): ?><span class="active">Tak</span>
                                <?php else: ?><span class="important">Nie</span><?php endif; ?>		
                            </td>
                            <!-- opcje -->
                            <td align="center">
                                <a class="btn btn"  href="?action=edit_user&amp;id=<?php echo $this->_tpl_vars['users'][$this->_sections['u1']['index']]['id']; ?>
" title="Edytuj">
                                    <i class="icon-edit"></i>
                                </a>
                                <a class="btn btn"  href="?action=delete_user&amp;id=<?php echo $this->_tpl_vars['users'][$this->_sections['u1']['index']]['id']; ?>
" title="Kasuj">
                                    <i class="icon-trash"></i>
                                </a>
                            </td>		
                        </tr>
                        <?php endfor; else: ?>
                    <p class="center error">Brak użytkowników o podanych kryteriach w bazie.</p>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>