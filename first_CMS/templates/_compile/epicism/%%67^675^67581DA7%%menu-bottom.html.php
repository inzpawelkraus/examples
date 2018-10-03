<?php /* Smarty version 2.6.13, created on 2017-04-21 20:56:49
         compiled from misc/menu-bottom.html */ ?>
<ul>
    <?php unset($this->_sections['mb']);
$this->_sections['mb']['name'] = 'mb';
$this->_sections['mb']['loop'] = is_array($_loop=$this->_tpl_vars['mb']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['mb']['show'] = true;
$this->_sections['mb']['max'] = $this->_sections['mb']['loop'];
$this->_sections['mb']['step'] = 1;
$this->_sections['mb']['start'] = $this->_sections['mb']['step'] > 0 ? 0 : $this->_sections['mb']['loop']-1;
if ($this->_sections['mb']['show']) {
    $this->_sections['mb']['total'] = $this->_sections['mb']['loop'];
    if ($this->_sections['mb']['total'] == 0)
        $this->_sections['mb']['show'] = false;
} else
    $this->_sections['mb']['total'] = 0;
if ($this->_sections['mb']['show']):

            for ($this->_sections['mb']['index'] = $this->_sections['mb']['start'], $this->_sections['mb']['iteration'] = 1;
                 $this->_sections['mb']['iteration'] <= $this->_sections['mb']['total'];
                 $this->_sections['mb']['index'] += $this->_sections['mb']['step'], $this->_sections['mb']['iteration']++):
$this->_sections['mb']['rownum'] = $this->_sections['mb']['iteration'];
$this->_sections['mb']['index_prev'] = $this->_sections['mb']['index'] - $this->_sections['mb']['step'];
$this->_sections['mb']['index_next'] = $this->_sections['mb']['index'] + $this->_sections['mb']['step'];
$this->_sections['mb']['first']      = ($this->_sections['mb']['iteration'] == 1);
$this->_sections['mb']['last']       = ($this->_sections['mb']['iteration'] == $this->_sections['mb']['total']);
?>
    <li><a style='font-size: 8pt;' <?php if ($this->_tpl_vars['menu_selected'] == $this->_tpl_vars['mb'][$this->_sections['mb']['index']]['url']): ?>class="selected"<?php endif; ?> href="<?php echo $this->_tpl_vars['mb'][$this->_sections['mb']['index']]['url']; ?>
" title="<?php echo $this->_tpl_vars['mb'][$this->_sections['mb']['index']]['name']; ?>
" <?php if ($this->_tpl_vars['mb'][$this->_sections['mb']['index']]['target'] == 1): ?>target="_blank"<?php endif; ?>><?php echo $this->_tpl_vars['mb'][$this->_sections['mb']['index']]['name']; ?>
</a></li>
    <?php endfor; endif; ?>
</ul>