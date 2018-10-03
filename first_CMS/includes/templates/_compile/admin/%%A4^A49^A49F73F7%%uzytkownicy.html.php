<?php /* Smarty version 2.6.13, created on 2017-05-11 10:20:48
         compiled from newsletter/uzytkownicy.html */ ?>
<div id="content-header">
    <div id="breadcrumb"> <a href="/admin" title="Panel" class="tip-bottom"><i class="icon-home"></i> Panel</a> <a>Newsletter</a><a class="current">Użytkownicy</a> </div>
    <h1><?php echo $this->_tpl_vars['pageTitle']; ?>
</h1>
</div>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                <h5>Filtry</h5>
            </div>
            <div class="widget-content nopadding">
                <form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>
" class="form-horizontal">
                    <div class="control-group">
                        <label class="control-label">Imię :</label>
                        <div class="controls">
                            <input class="text medium" type="text" name="first_name" value="<?php echo $_GET['first_name']; ?>
" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Nazwisko :</label>
                        <div class="controls">
                            <input class="text medium" type="text" name="last_name" value="<?php echo $_GET['last_name']; ?>
" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Email :</label>
                        <div class="controls">
                            <input class="text medium" type="text" name="email" value="<?php echo $_GET['email']; ?>
" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Aktywność :</label>
                        <div class="controls">
                            <select name="active">
                                <option value="%"<?php if ($_GET['active'] == "%"): ?> selected="true"<?php endif; ?>>- wszystkie -</option>
                                <option value="0"<?php if ($_GET['active'] == '0'): ?> selected="true"<?php endif; ?>>Nie</option>
                                <option value="1"<?php if ($_GET['active'] == '1'): ?> selected="true"<?php endif; ?>>Tak</option>	
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Sortowanie :</label>
                        <div class="controls">
                            <select name="order_field">
                                <option value="">- wybierz -</option>
                                <option value="first_name"<?php if ($_GET['order_field'] == 'first_name'): ?> selected="true"<?php endif; ?>>Imię</option>
                                <option value="last_name"<?php if ($_GET['order_field'] == 'last_name'): ?> selected="true"<?php endif; ?>>Nazwisko</option>
                                <option value="email"<?php if ($_GET['order_field'] == 'email'): ?> selected="true"<?php endif; ?>>adresu e-mail</option>
                            </select>
                            <select name="order_type">
                                <option value="">- wybierz -</option>
                                <option value="ASC"<?php if ($_GET['order_type'] == 'ASC'): ?> selected="true"<?php endif; ?>>Rosnąco</option>
                                <option value="DESC"<?php if ($_GET['order_type'] == 'DESC'): ?> selected="true"<?php endif; ?>>Malejąco</option>	
                            </select>
                        </div>

                        <div class="form-actions">
                            <input type="hidden" name="action" value="user" />
                            <input class="btn btn-success" type="submit" value="Zastosuj" />
                        </div>
                </form>
            </div>
        </div>

        <table class="table table-bordered table-striped">
            <thead>
            <th>Imię</th>
            <th>Nazwisko</th>
            <th>Email</th>
            <th>Aktywność</th>
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
                    <td>
                        <?php echo $this->_tpl_vars['users'][$this->_sections['u1']['index']]['first_name']; ?>

                    </td><td>
                        <?php echo $this->_tpl_vars['users'][$this->_sections['u1']['index']]['last_name']; ?>

                    </td>
                    <td><?php echo $this->_tpl_vars['users'][$this->_sections['u1']['index']]['email']; ?>
</td>	
                    <td class="center">
                        <?php if ($this->_tpl_vars['users'][$this->_sections['u1']['index']]['active'] == 1): ?><i class="icon-check"></i>
                        <?php else: ?><i class="icon-check-empty"></i><?php endif; ?>		
                    </td>
                    <td align="center">
                        <a class="btn btn"   href="?action=edit_user&amp;id=<?php echo $this->_tpl_vars['users'][$this->_sections['u1']['index']]['id']; ?>
&mm=<?php echo $_GET['mm']; ?>
" title="Edytuj"><i class="icon-edit"></i></a>
                        <a class="btn btn"   href="?action=delete_user&amp;id=<?php echo $this->_tpl_vars['users'][$this->_sections['u1']['index']]['id']; ?>
&mm=<?php echo $_GET['mm']; ?>
" title="Kasuj"><i class="icon-trash"></i></a>
                    </td>		
                </tr>
                <?php endfor; endif; ?>
            </tbody>
        </table>
    </div>
</div>