<?php /* Smarty version 2.6.13, created on 2017-03-22 10:24:53
         compiled from misc/sciezka.html */ ?>
<strong><?php echo $this->_tpl_vars['LANG']['_PAGE_HERE']; ?>
 </strong>
	<?php unset($this->_sections['pp']);
$this->_sections['pp']['name'] = 'pp';
$this->_sections['pp']['loop'] = is_array($_loop=$this->_tpl_vars['path']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['pp']['show'] = true;
$this->_sections['pp']['max'] = $this->_sections['pp']['loop'];
$this->_sections['pp']['step'] = 1;
$this->_sections['pp']['start'] = $this->_sections['pp']['step'] > 0 ? 0 : $this->_sections['pp']['loop']-1;
if ($this->_sections['pp']['show']) {
    $this->_sections['pp']['total'] = $this->_sections['pp']['loop'];
    if ($this->_sections['pp']['total'] == 0)
        $this->_sections['pp']['show'] = false;
} else
    $this->_sections['pp']['total'] = 0;
if ($this->_sections['pp']['show']):

            for ($this->_sections['pp']['index'] = $this->_sections['pp']['start'], $this->_sections['pp']['iteration'] = 1;
                 $this->_sections['pp']['iteration'] <= $this->_sections['pp']['total'];
                 $this->_sections['pp']['index'] += $this->_sections['pp']['step'], $this->_sections['pp']['iteration']++):
$this->_sections['pp']['rownum'] = $this->_sections['pp']['iteration'];
$this->_sections['pp']['index_prev'] = $this->_sections['pp']['index'] - $this->_sections['pp']['step'];
$this->_sections['pp']['index_next'] = $this->_sections['pp']['index'] + $this->_sections['pp']['step'];
$this->_sections['pp']['first']      = ($this->_sections['pp']['iteration'] == 1);
$this->_sections['pp']['last']       = ($this->_sections['pp']['iteration'] == $this->_sections['pp']['total']);
?>
		<a href="<?php echo $this->_tpl_vars['path'][$this->_sections['pp']['index']]['url']; ?>
" title="<?php echo $this->_tpl_vars['path'][$this->_sections['pp']['index']]['name']; ?>
"><?php echo $this->_tpl_vars['path'][$this->_sections['pp']['index']]['name']; ?>
</a>
		<?php if (! $this->_sections['pp']['last']): ?>&raquo;<?php endif; ?> 
	<?php endfor; endif; ?>