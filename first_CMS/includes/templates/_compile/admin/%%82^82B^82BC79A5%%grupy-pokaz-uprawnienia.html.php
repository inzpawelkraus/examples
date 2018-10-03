<?php /* Smarty version 2.6.13, created on 2017-04-21 21:35:08
         compiled from uzytkownicy/grupy-pokaz-uprawnienia.html */ ?>
<div id="content-header">
    <div id="breadcrumb"> <a href="/admin" title="Panel" class="tip-bottom"><i class="icon-home"></i> Panel</a> <a>Ustawienia</a> <a>Użytkownicy</a><a class="current">Grupy użytkowników</a> </div>
    <h1><?php echo $this->_tpl_vars['pageTitle']; ?>
</h1>
</div>
<div class="container-fluid">
    <div class="row-fluid">
        <a class="btn" href="?"><i class="icon-step-backward"></i> Powrót</a>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
" class="form-horizontal"></br>
            <div class="control-group"></br>
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
" <?php if ($this->_tpl_vars['privileges'][$this->_sections['pri']['index']]['status'] == 1): ?>checked="checked"<?php endif; ?> />
                           <b><?php echo $this->_tpl_vars['privileges'][$this->_sections['pri']['index']]['name']; ?>
</b> <small><?php echo $this->_tpl_vars['privileges'][$this->_sections['pri']['index']]['description']; ?>
</small></label>
                <?php endfor; else: ?>
                <p class="center error">Brak uprawnień w bazie!</p>
                <?php endif; ?>
            </div>
            <div class="form-actions">
                <input class="btn btn-success" type="submit" value="Zapisz zmiany" />
                <input type="hidden" name="action" value="edit_group" />
                <input type="hidden" name="group_id" value="<?php echo $_GET['group_id']; ?>
" />
            </div>
        </form>
    </div>
</div>