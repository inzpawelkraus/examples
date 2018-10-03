<?php /* Smarty version 2.6.13, created on 2017-03-18 10:51:48
         compiled from galeria/pokaz-podstrona.html */ ?>
<?php unset($this->_sections['g']);
$this->_sections['g']['name'] = 'g';
$this->_sections['g']['loop'] = is_array($_loop=$this->_tpl_vars['gallery']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['g']['show'] = true;
$this->_sections['g']['max'] = $this->_sections['g']['loop'];
$this->_sections['g']['step'] = 1;
$this->_sections['g']['start'] = $this->_sections['g']['step'] > 0 ? 0 : $this->_sections['g']['loop']-1;
if ($this->_sections['g']['show']) {
    $this->_sections['g']['total'] = $this->_sections['g']['loop'];
    if ($this->_sections['g']['total'] == 0)
        $this->_sections['g']['show'] = false;
} else
    $this->_sections['g']['total'] = 0;
if ($this->_sections['g']['show']):

            for ($this->_sections['g']['index'] = $this->_sections['g']['start'], $this->_sections['g']['iteration'] = 1;
                 $this->_sections['g']['iteration'] <= $this->_sections['g']['total'];
                 $this->_sections['g']['index'] += $this->_sections['g']['step'], $this->_sections['g']['iteration']++):
$this->_sections['g']['rownum'] = $this->_sections['g']['iteration'];
$this->_sections['g']['index_prev'] = $this->_sections['g']['index'] - $this->_sections['g']['step'];
$this->_sections['g']['index_next'] = $this->_sections['g']['index'] + $this->_sections['g']['step'];
$this->_sections['g']['first']      = ($this->_sections['g']['iteration'] == 1);
$this->_sections['g']['last']       = ($this->_sections['g']['iteration'] == $this->_sections['g']['total']);
?>
	<?php if ($this->_sections['g']['first']): ?><div class="gal"><?php endif; ?>
	<div class="gal3">
		<a href="<?php echo $this->_tpl_vars['gallery'][$this->_sections['g']['index']]['url']; ?>
" title="<?php if ($this->_tpl_vars['gallery'][$this->_sections['g']['index']]['title']):  echo $this->_tpl_vars['gallery'][$this->_sections['g']['index']]['title'];  else:  echo $this->_tpl_vars['gallery'][$this->_sections['g']['index']]['anchor'];  endif; ?>" class="fancybox" rel="fancybox">
			<img class="gal-img2" src="<?php echo $this->_tpl_vars['gallery'][$this->_sections['g']['index']]['src']; ?>
" alt="<?php if ($this->_tpl_vars['gallery'][$this->_sections['g']['index']]['title']):  echo $this->_tpl_vars['gallery'][$this->_sections['g']['index']]['title'];  else:  echo $this->_tpl_vars['gallery'][$this->_sections['g']['index']]['anchor'];  endif; ?>" />
		</a>
	</div>
   <?php if ($this->_sections['g']['last']): ?></div><div class="clear"></div><?php endif;  endfor; endif; ?>