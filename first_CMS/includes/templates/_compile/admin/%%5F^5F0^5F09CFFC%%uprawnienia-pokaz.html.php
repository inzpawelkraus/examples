<?php /* Smarty version 2.6.13, created on 2017-04-21 21:34:02
         compiled from uzytkownicy/uprawnienia-pokaz.html */ ?>
<div id="content-header">
    <div id="breadcrumb"> <a href="/admin" title="Panel" class="tip-bottom"><i class="icon-home"></i> Panel</a> <a>Ustawienia</a> <a>Użytkownicy</a><a class="current">Uprawnienia</a> </div>
    <h1><?php echo $this->_tpl_vars['pageTitle']; ?>
</h1>
</div>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                <h5>Uprawnienia grup uzytkowników</h5>
            </div>
            <div class="widget-content nopadding">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Uprawnienie</th>
                            <th width="100">Akcje</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php unset($this->_sections['pri']);
$this->_sections['pri']['name'] = 'pri';
$this->_sections['pri']['loop'] = is_array($_loop=$this->_tpl_vars['privileges']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['pri']['show'] = true;
$this->_sections['pri']['max'] = $this->_sections['pri']['loop'];
$this->_sections['pri']['step'] = 1;
$this->_sections['pri']['start'] = $this->_sections['pri']['step'] > 0 ? 0 : $this->_sections['pri']['loop']-1;
if ($this->_sections['pri']['show']) {
    $this->_sections['pri']['total'] = $this->_sections['pri']['loop'];
    if ($this->_sections['pri']['total'] == 0)
        $this->_sections['pri']['show'] = false;
} else
    $this->_sections['pri']['total'] = 0;
if ($this->_sections['pri']['show']):

            for ($this->_sections['pri']['index'] = $this->_sections['pri']['start'], $this->_sections['pri']['iteration'] = 1;
                 $this->_sections['pri']['iteration'] <= $this->_sections['pri']['total'];
                 $this->_sections['pri']['index'] += $this->_sections['pri']['step'], $this->_sections['pri']['iteration']++):
$this->_sections['pri']['rownum'] = $this->_sections['pri']['iteration'];
$this->_sections['pri']['index_prev'] = $this->_sections['pri']['index'] - $this->_sections['pri']['step'];
$this->_sections['pri']['index_next'] = $this->_sections['pri']['index'] + $this->_sections['pri']['step'];
$this->_sections['pri']['first']      = ($this->_sections['pri']['iteration'] == 1);
$this->_sections['pri']['last']       = ($this->_sections['pri']['iteration'] == $this->_sections['pri']['total']);
?>
                        <tr class="odd gradeX">
                            <td>
                                <b><?php echo $this->_tpl_vars['privileges'][$this->_sections['pri']['index']]['name']; ?>
</b><br />
                                <?php echo $this->_tpl_vars['privileges'][$this->_sections['pri']['index']]['description']; ?>

                                <div id="id<?php echo $this->_sections['pri']['index']; ?>
" style="display: none;">
                                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
" class="form-horizontal">
                                        <div class="control-group">
                                            <label class="control-label">Nazwa :</label>
                                            <div class="controls">
                                                <input type="text" name="name" readonly="" value="<?php echo $this->_tpl_vars['privileges'][$this->_sections['pri']['index']]['name']; ?>
" size="50" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Opis :</label>
                                            <div class="controls">
                                                <input type="text" name="description" value="<?php echo $this->_tpl_vars['privileges'][$this->_sections['pri']['index']]['description']; ?>
" size="50" />
                                            </div>
                                        </div>

                                        <div class="form-actions">
                                            <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['privileges'][$this->_sections['pri']['index']]['id']; ?>
" />
                                            <input class="btn btn-success" type="submit" value="Zapisz" />
                                            <input type="hidden" name="action" value="edit_privilege" />
                                        </div>
                                    </form>
                                </div>
                            </td>
                            <td width="100">
                                <a class="btn btn" href="#" onclick="toggle('id<?php echo $this->_sections['pri']['index']; ?>
'); return false;" title="Edytuj">
                                    <i class="icon-edit"></i>
                                </a>
                                <a class="btn btn" href="?action=delete_privilege&amp;privilege_id=<?php echo $this->_tpl_vars['privileges'][$this->_sections['pri']['index']]['id']; ?>
" title="Kasuj">
                                    <i class="icon-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endfor; else: ?>
                        <tr class="odd gradeX">
                            <td colspan="2">
                                Brak zdefiniowanych uprawnień !
                            </td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php echo '
        <script>
        function toggle(e)
        {
        $("#" + e).slideToggle();
        }
        </script>
        '; ?>

    </div>
</div>