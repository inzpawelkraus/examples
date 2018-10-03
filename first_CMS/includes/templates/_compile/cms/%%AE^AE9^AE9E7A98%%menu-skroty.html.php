<?php /* Smarty version 2.6.13, created on 2017-03-17 09:24:26
         compiled from misc/menu-skroty.html */ ?>
<?php unset($this->_sections['skroty']);
$this->_sections['skroty']['name'] = 'skroty';
$this->_sections['skroty']['loop'] = is_array($_loop=$this->_tpl_vars['skroty']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['skroty']['show'] = true;
$this->_sections['skroty']['max'] = $this->_sections['skroty']['loop'];
$this->_sections['skroty']['step'] = 1;
$this->_sections['skroty']['start'] = $this->_sections['skroty']['step'] > 0 ? 0 : $this->_sections['skroty']['loop']-1;
if ($this->_sections['skroty']['show']) {
    $this->_sections['skroty']['total'] = $this->_sections['skroty']['loop'];
    if ($this->_sections['skroty']['total'] == 0)
        $this->_sections['skroty']['show'] = false;
} else
    $this->_sections['skroty']['total'] = 0;
if ($this->_sections['skroty']['show']):

            for ($this->_sections['skroty']['index'] = $this->_sections['skroty']['start'], $this->_sections['skroty']['iteration'] = 1;
                 $this->_sections['skroty']['iteration'] <= $this->_sections['skroty']['total'];
                 $this->_sections['skroty']['index'] += $this->_sections['skroty']['step'], $this->_sections['skroty']['iteration']++):
$this->_sections['skroty']['rownum'] = $this->_sections['skroty']['iteration'];
$this->_sections['skroty']['index_prev'] = $this->_sections['skroty']['index'] - $this->_sections['skroty']['step'];
$this->_sections['skroty']['index_next'] = $this->_sections['skroty']['index'] + $this->_sections['skroty']['step'];
$this->_sections['skroty']['first']      = ($this->_sections['skroty']['iteration'] == 1);
$this->_sections['skroty']['last']       = ($this->_sections['skroty']['iteration'] == $this->_sections['skroty']['total']);
?>
	<?php if ($this->_sections['skroty']['first']): ?><ul><li><strong>Zobacz również:</strong></li><?php endif; ?>
		<li>
		<a href="<?php echo $this->_tpl_vars['skroty'][$this->_sections['skroty']['index']]['url']; ?>
" title="<?php echo $this->_tpl_vars['skroty'][$this->_sections['skroty']['index']]['name']; ?>
" <?php if ($this->_tpl_vars['skroty'][$this->_sections['skroty']['index']]['target'] == 1): ?>target="_blank"<?php endif; ?>><?php echo $this->_tpl_vars['skroty'][$this->_sections['skroty']['index']]['name']; ?>
</a><?php if (! $this->_sections['skroty']['last']): ?>,<?php endif; ?></li>
	<?php if ($this->_sections['skroty']['last']): ?></ul><?php endif;  endfor; endif; ?>