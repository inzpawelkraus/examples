<?php /* Smarty version 2.6.13, created on 2017-05-11 15:31:51
         compiled from misc/konfiguracja.html */ ?>
<div id="content-header">
    <div id="breadcrumb"> <a href="/admin" title="Panel" class="tip-bottom"><i class="icon-home"></i> Panel</a> <a>Ustawienia</a><a class="current">Konfiguracja</a> </div>
    <h1><?php echo $this->_tpl_vars['pageTitle']; ?>
</h1>
</div>
<div class="container-fluid">
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
">
        <div class="widget-box collapsible">
            <?php unset($this->_sections['cc']);
$this->_sections['cc']['name'] = 'cc';
$this->_sections['cc']['loop'] = is_array($_loop=$this->_tpl_vars['config']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['cc']['show'] = true;
$this->_sections['cc']['max'] = $this->_sections['cc']['loop'];
$this->_sections['cc']['step'] = 1;
$this->_sections['cc']['start'] = $this->_sections['cc']['step'] > 0 ? 0 : $this->_sections['cc']['loop']-1;
if ($this->_sections['cc']['show']) {
    $this->_sections['cc']['total'] = $this->_sections['cc']['loop'];
    if ($this->_sections['cc']['total'] == 0)
        $this->_sections['cc']['show'] = false;
} else
    $this->_sections['cc']['total'] = 0;
if ($this->_sections['cc']['show']):

            for ($this->_sections['cc']['index'] = $this->_sections['cc']['start'], $this->_sections['cc']['iteration'] = 1;
                 $this->_sections['cc']['iteration'] <= $this->_sections['cc']['total'];
                 $this->_sections['cc']['index'] += $this->_sections['cc']['step'], $this->_sections['cc']['iteration']++):
$this->_sections['cc']['rownum'] = $this->_sections['cc']['iteration'];
$this->_sections['cc']['index_prev'] = $this->_sections['cc']['index'] - $this->_sections['cc']['step'];
$this->_sections['cc']['index_next'] = $this->_sections['cc']['index'] + $this->_sections['cc']['step'];
$this->_sections['cc']['first']      = ($this->_sections['cc']['iteration'] == 1);
$this->_sections['cc']['last']       = ($this->_sections['cc']['iteration'] == $this->_sections['cc']['total']);
?>
            <div class="widget-title"> <a data-toggle="collapse" href="#collapse_<?php echo $this->_tpl_vars['config'][$this->_sections['cc']['index']]['name']; ?>
"> <span class="icon"><i class="icon-arrow-right"></i></span>
                    <h5><?php echo $this->_tpl_vars['config'][$this->_sections['cc']['index']]['name']; ?>
 / <?php echo $this->_tpl_vars['config'][$this->_sections['cc']['index']]['description']; ?>
</h5>
                </a> </div>
            <div id="collapse_<?php echo $this->_tpl_vars['config'][$this->_sections['cc']['index']]['name']; ?>
" class="collapse">
                <div class="widget-content">
                    <input type="hidden" name="conf_name_<?php echo $this->_sections['cc']['iteration']; ?>
" value="<?php echo $this->_tpl_vars['config'][$this->_sections['cc']['index']]['name']; ?>
" />
                    <textarea name="conf_value_<?php echo $this->_sections['cc']['iteration']; ?>
"><?php echo $this->_tpl_vars['config'][$this->_sections['cc']['index']]['value']; ?>
</textarea>
                </div>
            </div>
            <?php endfor; else: ?>
            <p class="center error">Brak opcji konfiguracyjnych!</p>
            <?php endif; ?>
        </div>
        <div class="form-actions">
            <input type="hidden" name="ile_all" value="<?php echo $this->_sections['cc']['total']; ?>
" />
            <input type="hidden" name="action" value="save_all" />
            <input class="btn btn-success" type="submit"  value="Zapisz" />
        </div>
    </form>
    <br />
    <?php if ($this->_tpl_vars['user']['superadmin'] == 1): ?>
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Dodaj nową opcję</h5>
        </div>
        <div class="widget-content nopadding">
            <form action="#" method="get" class="form-horizontal">
                <div class="control-group">
                    <label class="control-label">Klucz :</label>
                    <div class="controls">
                        <input class="text" type="text" name="conf_name" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Wartość :</label>
                    <div class="controls">
                        <textarea class="conf-d" name="conf_value"></textarea>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Opis :</label>
                    <div class="controls">
                        <textarea class="conf-d" name="conf_description"></textarea>
                    </div>
                </div>
                <div class="form-actions">
                    <input type="hidden" value="dodaj" />
                    <input type="hidden" name="action" value="new_option" />
                    <input type="hidden" name="conf_table" value="config" />
                    <button type="submit" class="btn btn-success">Dodaj</button>
                </div>
            </form>
        </div>
    </div>
    <?php endif; ?>
</div>