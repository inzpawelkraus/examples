<?php /* Smarty version 2.6.13, created on 2017-03-17 09:24:26
         compiled from misc/menu-left.html */ ?>
<?php unset($this->_sections['ml']);
$this->_sections['ml']['name'] = 'ml';
$this->_sections['ml']['loop'] = is_array($_loop=$this->_tpl_vars['ml']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['ml']['show'] = true;
$this->_sections['ml']['max'] = $this->_sections['ml']['loop'];
$this->_sections['ml']['step'] = 1;
$this->_sections['ml']['start'] = $this->_sections['ml']['step'] > 0 ? 0 : $this->_sections['ml']['loop']-1;
if ($this->_sections['ml']['show']) {
    $this->_sections['ml']['total'] = $this->_sections['ml']['loop'];
    if ($this->_sections['ml']['total'] == 0)
        $this->_sections['ml']['show'] = false;
} else
    $this->_sections['ml']['total'] = 0;
if ($this->_sections['ml']['show']):

            for ($this->_sections['ml']['index'] = $this->_sections['ml']['start'], $this->_sections['ml']['iteration'] = 1;
                 $this->_sections['ml']['iteration'] <= $this->_sections['ml']['total'];
                 $this->_sections['ml']['index'] += $this->_sections['ml']['step'], $this->_sections['ml']['iteration']++):
$this->_sections['ml']['rownum'] = $this->_sections['ml']['iteration'];
$this->_sections['ml']['index_prev'] = $this->_sections['ml']['index'] - $this->_sections['ml']['step'];
$this->_sections['ml']['index_next'] = $this->_sections['ml']['index'] + $this->_sections['ml']['step'];
$this->_sections['ml']['first']      = ($this->_sections['ml']['iteration'] == 1);
$this->_sections['ml']['last']       = ($this->_sections['ml']['iteration'] == $this->_sections['ml']['total']);
?>
	<a <?php if ($this->_tpl_vars['menu_selected'] == $this->_tpl_vars['ml'][$this->_sections['ml']['index']]['url']): ?>class="selected"<?php endif; ?> href="<?php echo $this->_tpl_vars['ml'][$this->_sections['ml']['index']]['url']; ?>
" title="<?php echo $this->_tpl_vars['ml'][$this->_sections['ml']['index']]['name']; ?>
" <?php if ($this->_tpl_vars['ml'][$this->_sections['ml']['index']]['target'] == 1): ?>target="_blank"<?php endif; ?>><?php echo $this->_tpl_vars['ml'][$this->_sections['ml']['index']]['name']; ?>
</a>
	<?php if (! $this->_sections['ml']['last']):  endif;  endfor; endif; ?>