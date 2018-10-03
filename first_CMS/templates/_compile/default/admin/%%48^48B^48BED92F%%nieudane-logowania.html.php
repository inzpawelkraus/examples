<?php /* Smarty version 2.6.13, created on 2017-06-06 15:43:48
         compiled from statystyki/nieudane-logowania.html */ ?>
<div class="widget-box">
    <div class="widget-title"> <span class="icon"> <i class="icon-lock"></i> </span>
        <h5>Nieudane logowania</h5>
    </div>
    <div class="widget-content">
        <div class="error_ex" style='overflow-x: auto'>
                <table class="table table-bordered data-table">
                    <thead>
                        <tr>
                            <th>Login</th>
                            <th>Hasło</th>
                            <th>Powód odrzucenia</th>
                            <th>Data</th>
                            <th>Host</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php unset($this->_sections['l']);
$this->_sections['l']['name'] = 'l';
$this->_sections['l']['loop'] = is_array($_loop=$this->_tpl_vars['log']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['l']['show'] = true;
$this->_sections['l']['max'] = $this->_sections['l']['loop'];
$this->_sections['l']['step'] = 1;
$this->_sections['l']['start'] = $this->_sections['l']['step'] > 0 ? 0 : $this->_sections['l']['loop']-1;
if ($this->_sections['l']['show']) {
    $this->_sections['l']['total'] = $this->_sections['l']['loop'];
    if ($this->_sections['l']['total'] == 0)
        $this->_sections['l']['show'] = false;
} else
    $this->_sections['l']['total'] = 0;
if ($this->_sections['l']['show']):

            for ($this->_sections['l']['index'] = $this->_sections['l']['start'], $this->_sections['l']['iteration'] = 1;
                 $this->_sections['l']['iteration'] <= $this->_sections['l']['total'];
                 $this->_sections['l']['index'] += $this->_sections['l']['step'], $this->_sections['l']['iteration']++):
$this->_sections['l']['rownum'] = $this->_sections['l']['iteration'];
$this->_sections['l']['index_prev'] = $this->_sections['l']['index'] - $this->_sections['l']['step'];
$this->_sections['l']['index_next'] = $this->_sections['l']['index'] + $this->_sections['l']['step'];
$this->_sections['l']['first']      = ($this->_sections['l']['iteration'] == 1);
$this->_sections['l']['last']       = ($this->_sections['l']['iteration'] == $this->_sections['l']['total']);
?>
                        <tr>
                            <td><b><?php echo $this->_tpl_vars['log'][$this->_sections['l']['index']]['login']; ?>
</b></td>
                            <td class="not-important"><?php echo $this->_tpl_vars['log'][$this->_sections['l']['index']]['pass']; ?>
</td>
                            <td><?php echo $this->_tpl_vars['log'][$this->_sections['l']['index']]['reason']; ?>
</td>	
                            <td class="center"><span class="not-important"><?php echo $this->_tpl_vars['log'][$this->_sections['l']['index']]['date_add']; ?>
</span></td>
                            <td class="center"><span class="not-important"><?php echo $this->_tpl_vars['log'][$this->_sections['l']['index']]['host']; ?>
</span></td>
                        </tr>
                        <?php endfor; endif; ?>
                    </tbody>
                </table>
        </div>
    </div>
</div>