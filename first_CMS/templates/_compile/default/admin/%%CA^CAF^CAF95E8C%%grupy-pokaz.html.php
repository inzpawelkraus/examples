<?php /* Smarty version 2.6.13, created on 2017-04-21 21:35:05
         compiled from uzytkownicy/grupy-pokaz.html */ ?>
<div id="content-header">
    <div id="breadcrumb"> <a href="/admin" title="Panel" class="tip-bottom"><i class="icon-home"></i> Panel</a> <a>Ustawienia</a> <a>Użytkownicy</a><a class="current">Grupy użytkowników</a> </div>
    <h1><?php echo $this->_tpl_vars['pageTitle']; ?>
</h1>
</div>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-group"></i> </span>
                <h5>Grup uzytkowników</h5>
            </div>
            <div class="widget-content nopadding">
                <table class="table table-bordered table-striped">
                    <thead>
                    <th>Grupa</th>
                    <th width='120'>Akcje</th>
                    </thead>
                    <tbody>
                        <?php unset($this->_sections['grp']);
$this->_sections['grp']['name'] = 'grp';
$this->_sections['grp']['loop'] = is_array($_loop=$this->_tpl_vars['groups']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['grp']['show'] = true;
$this->_sections['grp']['max'] = $this->_sections['grp']['loop'];
$this->_sections['grp']['step'] = 1;
$this->_sections['grp']['start'] = $this->_sections['grp']['step'] > 0 ? 0 : $this->_sections['grp']['loop']-1;
if ($this->_sections['grp']['show']) {
    $this->_sections['grp']['total'] = $this->_sections['grp']['loop'];
    if ($this->_sections['grp']['total'] == 0)
        $this->_sections['grp']['show'] = false;
} else
    $this->_sections['grp']['total'] = 0;
if ($this->_sections['grp']['show']):

            for ($this->_sections['grp']['index'] = $this->_sections['grp']['start'], $this->_sections['grp']['iteration'] = 1;
                 $this->_sections['grp']['iteration'] <= $this->_sections['grp']['total'];
                 $this->_sections['grp']['index'] += $this->_sections['grp']['step'], $this->_sections['grp']['iteration']++):
$this->_sections['grp']['rownum'] = $this->_sections['grp']['iteration'];
$this->_sections['grp']['index_prev'] = $this->_sections['grp']['index'] - $this->_sections['grp']['step'];
$this->_sections['grp']['index_next'] = $this->_sections['grp']['index'] + $this->_sections['grp']['step'];
$this->_sections['grp']['first']      = ($this->_sections['grp']['iteration'] == 1);
$this->_sections['grp']['last']       = ($this->_sections['grp']['iteration'] == $this->_sections['grp']['total']);
?>
                        <tr>
                            <td>
                                <b><?php echo $this->_tpl_vars['groups'][$this->_sections['grp']['index']]['name']; ?>
</b>
                                <div id="id<?php echo $this->_sections['grp']['index']; ?>
" style="display: none;">
                                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
" class="form-horizontal">
                                        <div class="control-group">
                                            <label class="control-label">Nazwa :</label>
                                            <div class="controls">
                                                <input class="text" style="margin-bottom: 0;" type="text" name="name" value="<?php echo $this->_tpl_vars['groups'][$this->_sections['grp']['index']]['name']; ?>
" size="25" />
                                                <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['groups'][$this->_sections['grp']['index']]['id']; ?>
" />
                                                <input class="btn btn-success" type="submit" value="Zmień nazwę" />
                                                <input type="hidden" name="action" value="change_name" />
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </td>
                            <td width="120">
                                <a class="btn btn" href="?group_id=<?php echo $this->_tpl_vars['groups'][$this->_sections['grp']['index']]['id']; ?>
&amp;action=load_group" title="Zarządzaj uprawnieniami"><i class="icon-lock"></i></a>
                                <a class="btn btn" href="#" title="Zmień nazwę" onclick="toggle('id<?php echo $this->_sections['grp']['index']; ?>
'); return false;"><i class="icon-edit"></i></a>
                                <a class="btn btn" href="?action=delete_group&amp;id=<?php echo $this->_tpl_vars['groups'][$this->_sections['grp']['index']]['id']; ?>
" title="Kasuj"><i class="icon-trash"></i></a>
                            </td>
                        </tr>
                        <?php endfor; else: ?>
                        <tr class="odd gradeX">
                            <td colspan="2">
                                Brak zdefiniowanych grup !
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

        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-plus"></i> </span>
                <h5>Dodaj nową grupę</h5>
            </div>
            <div class="widget-content nopadding">
                <form method="post" name="new_group" action="<?php echo $_SERVER['PHP_SELF']; ?>
" class="form-horizontal">
                    <div class="control-group">
                        <label class="control-label">Nazwa grupy :</label>
                        <div class="controls">
                            <input class="text" type="text" name="name" size="50" />
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
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
                            <label>
                                <input id="in<?php echo $this->_sections['pri']['index']; ?>
" type="checkbox" name="privileges[]" value="<?php echo $this->_tpl_vars['privileges'][$this->_sections['pri']['index']]['id']; ?>
" />
                                <b><?php echo $this->_tpl_vars['privileges'][$this->_sections['pri']['index']]['name']; ?>
</b> <small><?php echo $this->_tpl_vars['privileges'][$this->_sections['pri']['index']]['description']; ?>
</small></label>
                            <?php endfor; else: ?>
                            <p class="center error">Brak uprawnień w bazie!</p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-actions">
                        <input class="btn btn-success" type="submit" value="Dodaj grupę" />
                        <input type="hidden" name="action" value="add_group" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>