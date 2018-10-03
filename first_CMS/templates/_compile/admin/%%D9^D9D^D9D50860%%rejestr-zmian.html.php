<?php /* Smarty version 2.6.13, created on 2017-05-15 19:15:30
         compiled from statystyki/rejestr-zmian.html */ ?>
<div class="widget-box">
    <div class="widget-title"> <span class="icon"> <i class="icon-time"></i> </span>
        <h5>Ostatnie działania</h5>
    </div>
    <div class="widget-content">
        <div class="error_ex" style='overflow-x: auto'>
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Akcja</th>
                        <th>Ścieżka</th>
                        <th>Autor</th>
                    </tr>
                </thead>
                <tbody>
                    <?php unset($this->_sections['z']);
$this->_sections['z']['name'] = 'z';
$this->_sections['z']['loop'] = is_array($_loop=$this->_tpl_vars['rejestr']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['z']['show'] = true;
$this->_sections['z']['max'] = $this->_sections['z']['loop'];
$this->_sections['z']['step'] = 1;
$this->_sections['z']['start'] = $this->_sections['z']['step'] > 0 ? 0 : $this->_sections['z']['loop']-1;
if ($this->_sections['z']['show']) {
    $this->_sections['z']['total'] = $this->_sections['z']['loop'];
    if ($this->_sections['z']['total'] == 0)
        $this->_sections['z']['show'] = false;
} else
    $this->_sections['z']['total'] = 0;
if ($this->_sections['z']['show']):

            for ($this->_sections['z']['index'] = $this->_sections['z']['start'], $this->_sections['z']['iteration'] = 1;
                 $this->_sections['z']['iteration'] <= $this->_sections['z']['total'];
                 $this->_sections['z']['index'] += $this->_sections['z']['step'], $this->_sections['z']['iteration']++):
$this->_sections['z']['rownum'] = $this->_sections['z']['iteration'];
$this->_sections['z']['index_prev'] = $this->_sections['z']['index'] - $this->_sections['z']['step'];
$this->_sections['z']['index_next'] = $this->_sections['z']['index'] + $this->_sections['z']['step'];
$this->_sections['z']['first']      = ($this->_sections['z']['iteration'] == 1);
$this->_sections['z']['last']       = ($this->_sections['z']['iteration'] == $this->_sections['z']['total']);
?>
                    <tr>
                        <td width="150"><?php echo $this->_tpl_vars['rejestr'][$this->_sections['z']['index']]['date_add']; ?>
</td>
                        <td width="100"><span class="label label-<?php if ($this->_tpl_vars['rejestr'][$this->_sections['z']['index']]['action'] == 'dodano'): ?>success<?php endif;  if ($this->_tpl_vars['rejestr'][$this->_sections['z']['index']]['action'] == 'zmieniono'): ?>info<?php endif;  if ($this->_tpl_vars['rejestr'][$this->_sections['z']['index']]['action'] == 'usunięto'): ?>important<?php endif; ?>"><?php echo $this->_tpl_vars['rejestr'][$this->_sections['z']['index']]['action']; ?>
</span></td>
                        <td><a href="<?php echo $this->_tpl_vars['rejestr'][$this->_sections['z']['index']]['url']; ?>
" title="<?php echo $this->_tpl_vars['rejestr'][$this->_sections['z']['index']]['title']; ?>
"><?php echo $this->_tpl_vars['rejestr'][$this->_sections['z']['index']]['title']; ?>
</a></td>
                        <td><?php echo $this->_tpl_vars['rejestr'][$this->_sections['z']['index']]['login']; ?>
</td>
                    </tr>
                    <?php endfor; endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>