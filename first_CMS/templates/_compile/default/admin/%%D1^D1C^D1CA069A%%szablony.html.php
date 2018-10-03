<?php /* Smarty version 2.6.13, created on 2017-05-15 21:57:31
         compiled from misc/szablony.html */ ?>
<div id="content-header">
    <div id="breadcrumb"> <a href="/admin" title="Panel" class="tip-bottom"><i class="icon-home"></i> Panel</a> <a>Ustawienia</a><a class="current">Szablony strony</a> </div>
    <h1><?php echo $this->_tpl_vars['pageTitle']; ?>
</h1>
</div>
<div class="container-fluid">
    <div class="row-fluid">
        <form class="formularz" method="post">
            <div class="control-group">
                <label class="control-label">Szablon :</label>
                <div class="controls">
                    <select name="template" onchange="this.form.submit()">
                        <?php unset($this->_sections['t0']);
$this->_sections['t0']['name'] = 't0';
$this->_sections['t0']['loop'] = is_array($_loop=$this->_tpl_vars['templates']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['t0']['show'] = true;
$this->_sections['t0']['max'] = $this->_sections['t0']['loop'];
$this->_sections['t0']['step'] = 1;
$this->_sections['t0']['start'] = $this->_sections['t0']['step'] > 0 ? 0 : $this->_sections['t0']['loop']-1;
if ($this->_sections['t0']['show']) {
    $this->_sections['t0']['total'] = $this->_sections['t0']['loop'];
    if ($this->_sections['t0']['total'] == 0)
        $this->_sections['t0']['show'] = false;
} else
    $this->_sections['t0']['total'] = 0;
if ($this->_sections['t0']['show']):

            for ($this->_sections['t0']['index'] = $this->_sections['t0']['start'], $this->_sections['t0']['iteration'] = 1;
                 $this->_sections['t0']['iteration'] <= $this->_sections['t0']['total'];
                 $this->_sections['t0']['index'] += $this->_sections['t0']['step'], $this->_sections['t0']['iteration']++):
$this->_sections['t0']['rownum'] = $this->_sections['t0']['iteration'];
$this->_sections['t0']['index_prev'] = $this->_sections['t0']['index'] - $this->_sections['t0']['step'];
$this->_sections['t0']['index_next'] = $this->_sections['t0']['index'] + $this->_sections['t0']['step'];
$this->_sections['t0']['first']      = ($this->_sections['t0']['iteration'] == 1);
$this->_sections['t0']['last']       = ($this->_sections['t0']['iteration'] == $this->_sections['t0']['total']);
?>
                        <option value="<?php echo $this->_tpl_vars['templates'][$this->_sections['t0']['index']]['name']; ?>
"<?php if ($this->_tpl_vars['currTpl'] == $this->_tpl_vars['templates'][$this->_sections['t0']['index']]['name']): ?> selected="true"<?php endif; ?>>
                                <?php echo $this->_tpl_vars['templates'][$this->_sections['t0']['index']]['name']; ?>
</option>
                        <?php endfor; endif; ?>
                    </select>
                </div>
                <div class="form-actions">
                    <input class="btn btn-success" type="submit" value="Zapisz" />
                    <input type="hidden" name="action" value="save" />
                </div>
            </div>
        </form>
    </div>
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            <h5>Szablony serwisu</h5>
        </div>
        <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
                <tr class="shadow_selected"><th>Nazwa szablonu</th><th align="center">Katalog kompilacji</th><th align="center">Katalog cache</th></tr>
                <?php unset($this->_sections['t1']);
$this->_sections['t1']['name'] = 't1';
$this->_sections['t1']['loop'] = is_array($_loop=$this->_tpl_vars['templates']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['t1']['show'] = true;
$this->_sections['t1']['max'] = $this->_sections['t1']['loop'];
$this->_sections['t1']['step'] = 1;
$this->_sections['t1']['start'] = $this->_sections['t1']['step'] > 0 ? 0 : $this->_sections['t1']['loop']-1;
if ($this->_sections['t1']['show']) {
    $this->_sections['t1']['total'] = $this->_sections['t1']['loop'];
    if ($this->_sections['t1']['total'] == 0)
        $this->_sections['t1']['show'] = false;
} else
    $this->_sections['t1']['total'] = 0;
if ($this->_sections['t1']['show']):

            for ($this->_sections['t1']['index'] = $this->_sections['t1']['start'], $this->_sections['t1']['iteration'] = 1;
                 $this->_sections['t1']['iteration'] <= $this->_sections['t1']['total'];
                 $this->_sections['t1']['index'] += $this->_sections['t1']['step'], $this->_sections['t1']['iteration']++):
$this->_sections['t1']['rownum'] = $this->_sections['t1']['iteration'];
$this->_sections['t1']['index_prev'] = $this->_sections['t1']['index'] - $this->_sections['t1']['step'];
$this->_sections['t1']['index_next'] = $this->_sections['t1']['index'] + $this->_sections['t1']['step'];
$this->_sections['t1']['first']      = ($this->_sections['t1']['iteration'] == 1);
$this->_sections['t1']['last']       = ($this->_sections['t1']['iteration'] == $this->_sections['t1']['total']);
?>
                <?php if ((1 & $this->_sections['t1']['index'])): ?>
                <tr class="shadow_dark">
                    <?php else: ?>
                <tr class="shadow_light">
                    <?php endif; ?>
                    <td>
                        <?php echo $this->_tpl_vars['templates'][$this->_sections['t1']['index']]['name']; ?>

                    </td>
                    <td align="center">
                        <?php if ($this->_tpl_vars['templates'][$this->_sections['t1']['index']]['compile']): ?><span class="green_font">OK</span>
                        <?php else: ?>
                        <span class="red_font">
                            <b>BŁĄD!</b><br />
                            Nadaj uprawnienia do zapisu (chmod 777) lub stwórz katalog 
                            <?php echo $this->_tpl_vars['ROOT_PATH']; ?>
/templates/_compile/<?php echo $this->_tpl_vars['templates'][$this->_sections['t0']['index']]['name']; ?>

                        </span>
                        <?php endif; ?>
                    </td>
                    <td align="center">
                        <?php if ($this->_tpl_vars['templates'][$this->_sections['t1']['index']]['cache']): ?><span class="green_font">OK</td>
                    <?php else: ?>
                <span class="red_font">
                    <b>BŁĄD!</b><br />
                    Nadaj uprawnienia do zapisu (chmod 777) lub stwórz katalog 
                    <?php echo $this->_tpl_vars['ROOT_PATH']; ?>
/templates/_cache/<?php echo $this->_tpl_vars['templates'][$this->_sections['t0']['index']]['name']; ?>

                </span>
                </span>
                <?php endif; ?>
                </td>
                </tr>
                <?php endfor; endif; ?>
            </table>
        </div>
    </div>
</div>