<?php /* Smarty version 2.6.13, created on 2017-03-17 13:26:21
         compiled from galeria/wszystko.html */ ?>
<div id="page-title"><h1><?php echo $this->_tpl_vars['LANG']['_PAGE_GALLERY']; ?>
</h1></div>

<div id="page-content">
   <?php unset($this->_sections['g']);
$this->_sections['g']['name'] = 'g';
$this->_sections['g']['loop'] = is_array($_loop=$this->_tpl_vars['galleries']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
			<div class="gal2">
				<?php if ($this->_tpl_vars['galleries'][$this->_sections['g']['index']]['show_title']): ?><h2><a href="<?php echo $this->_tpl_vars['galleries'][$this->_sections['g']['index']]['url']; ?>
" title="<?php echo $this->_tpl_vars['galleries'][$this->_sections['g']['index']]['title']; ?>
"><?php echo $this->_tpl_vars['galleries'][$this->_sections['g']['index']]['title']; ?>
</a></h2><?php endif; ?>
				<a href="<?php echo $this->_tpl_vars['galleries'][$this->_sections['g']['index']]['url']; ?>
" title="<?php echo $this->_tpl_vars['galleries'][$this->_sections['g']['index']]['title']; ?>
">
               <img class="gal-img" src="<?php echo $this->_tpl_vars['galleries'][$this->_sections['g']['index']]['photo']['src']; ?>
" alt="<?php echo $this->_tpl_vars['galleries'][$this->_sections['g']['index']]['title']; ?>
" /></a><br />
				<span class="gal-opis"><?php echo $this->_tpl_vars['galleries'][$this->_sections['g']['index']]['content_short']; ?>
</span>
			</div>
		<?php if ($this->_sections['g']['last']): ?></div><?php endif; ?>
   <?php endfor; else: ?>
      <p class="center error"><?php echo $this->_tpl_vars['LANG']['_PAGE_NO_GALLERY']; ?>
</p>
   <?php endif; ?>
</div>