<?php /* Smarty version 2.6.13, created on 2017-05-15 17:59:10
         compiled from statystyki/odwiedziny-wpisy.html */ ?>
<div class="widget-box">
    <div class="widget-title"> <span class="icon"> <i class="icon-eye-open"></i> </span>
        <h5>Najczęściej głosowane  [Top 10]</h5>
    </div>
    <div class="widget-content">
        <div class="error_ex">
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th>Tytuł</th>
                        <th>Data utworzenia</th>
                        <th>Odwiedziny</th>
                        <th>Głosy</th>
                    </tr>
                </thead>
                <tbody>
                    <?php unset($this->_sections['o']);
$this->_sections['o']['name'] = 'o';
$this->_sections['o']['loop'] = is_array($_loop=$this->_tpl_vars['wodwiedz']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['o']['show'] = true;
$this->_sections['o']['max'] = $this->_sections['o']['loop'];
$this->_sections['o']['step'] = 1;
$this->_sections['o']['start'] = $this->_sections['o']['step'] > 0 ? 0 : $this->_sections['o']['loop']-1;
if ($this->_sections['o']['show']) {
    $this->_sections['o']['total'] = $this->_sections['o']['loop'];
    if ($this->_sections['o']['total'] == 0)
        $this->_sections['o']['show'] = false;
} else
    $this->_sections['o']['total'] = 0;
if ($this->_sections['o']['show']):

            for ($this->_sections['o']['index'] = $this->_sections['o']['start'], $this->_sections['o']['iteration'] = 1;
                 $this->_sections['o']['iteration'] <= $this->_sections['o']['total'];
                 $this->_sections['o']['index'] += $this->_sections['o']['step'], $this->_sections['o']['iteration']++):
$this->_sections['o']['rownum'] = $this->_sections['o']['iteration'];
$this->_sections['o']['index_prev'] = $this->_sections['o']['index'] - $this->_sections['o']['step'];
$this->_sections['o']['index_next'] = $this->_sections['o']['index'] + $this->_sections['o']['step'];
$this->_sections['o']['first']      = ($this->_sections['o']['iteration'] == 1);
$this->_sections['o']['last']       = ($this->_sections['o']['iteration'] == $this->_sections['o']['total']);
?>
                    <tr>
                        <td><a href="<?php echo $this->_tpl_vars['odwiedz'][$this->_sections['o']['index']]['title_url']; ?>
" target="_blank"><b><?php echo $this->_tpl_vars['wodwiedz'][$this->_sections['o']['index']]['title']; ?>
</b></a></td>
                        <td><?php echo $this->_tpl_vars['wodwiedz'][$this->_sections['o']['index']]['date_add']; ?>
</td>
                        <td class="center important"><strong><?php echo $this->_tpl_vars['wodwiedz'][$this->_sections['o']['index']]['count']; ?>
</strong></td>	
                        <td class="center important"><strong><?php echo $this->_tpl_vars['wodwiedz'][$this->_sections['o']['index']]['votes']; ?>
</strong></td>	
                    </tr>
                    <?php endfor; endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>