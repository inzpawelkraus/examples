<?php /* Smarty version 2.6.13, created on 2017-03-17 13:26:18
         compiled from aktualnosci/wszystko.html */ ?>
<div id="page-title"><h1><?php echo $this->_tpl_vars['LANG']['_PAGE_NEWS']; ?>
</h1></div>

<div id="page-content">
	<?php unset($this->_sections['aa']);
$this->_sections['aa']['name'] = 'aa';
$this->_sections['aa']['loop'] = is_array($_loop=$this->_tpl_vars['articles']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['aa']['show'] = true;
$this->_sections['aa']['max'] = $this->_sections['aa']['loop'];
$this->_sections['aa']['step'] = 1;
$this->_sections['aa']['start'] = $this->_sections['aa']['step'] > 0 ? 0 : $this->_sections['aa']['loop']-1;
if ($this->_sections['aa']['show']) {
    $this->_sections['aa']['total'] = $this->_sections['aa']['loop'];
    if ($this->_sections['aa']['total'] == 0)
        $this->_sections['aa']['show'] = false;
} else
    $this->_sections['aa']['total'] = 0;
if ($this->_sections['aa']['show']):

            for ($this->_sections['aa']['index'] = $this->_sections['aa']['start'], $this->_sections['aa']['iteration'] = 1;
                 $this->_sections['aa']['iteration'] <= $this->_sections['aa']['total'];
                 $this->_sections['aa']['index'] += $this->_sections['aa']['step'], $this->_sections['aa']['iteration']++):
$this->_sections['aa']['rownum'] = $this->_sections['aa']['iteration'];
$this->_sections['aa']['index_prev'] = $this->_sections['aa']['index'] - $this->_sections['aa']['step'];
$this->_sections['aa']['index_next'] = $this->_sections['aa']['index'] + $this->_sections['aa']['step'];
$this->_sections['aa']['first']      = ($this->_sections['aa']['iteration'] == 1);
$this->_sections['aa']['last']       = ($this->_sections['aa']['iteration'] == $this->_sections['aa']['total']);
?>
		<?php if ($this->_sections['aa']['first']): ?><div class="art"><?php endif; ?>
			<div class="art2">
				<?php if ($this->_tpl_vars['articles'][$this->_sections['aa']['index']]['photo']['photo']): ?><a onclick="location.href='<?php echo $this->_tpl_vars['articles'][$this->_sections['aa']['index']]['url']; ?>
'" class="kursor" rel="nofollow" title="<?php echo $this->_tpl_vars['articles'][$this->_sections['aa']['index']]['title']; ?>
"><img class="news-foto" src="<?php echo $this->_tpl_vars['articles'][$this->_sections['aa']['index']]['photo']['small']; ?>
" alt="<?php echo $this->_tpl_vars['articles'][$this->_sections['aa']['index']]['title']; ?>
" /></a><?php endif; ?>
				<a href="<?php echo $this->_tpl_vars['articles'][$this->_sections['aa']['index']]['url']; ?>
" title="<?php echo $this->_tpl_vars['articles'][$this->_sections['aa']['index']]['title']; ?>
"><strong><?php echo $this->_tpl_vars['articles'][$this->_sections['aa']['index']]['title']; ?>
</strong></a><br />
				<?php echo $this->_tpl_vars['articles'][$this->_sections['aa']['index']]['content_short']; ?>
<br />
				<div class="data"><?php echo $this->_tpl_vars['articles'][$this->_sections['aa']['index']]['date_add']; ?>
</div>
				<div class="wiecej"><a onclick="location.href='<?php echo $this->_tpl_vars['articles'][$this->_sections['aa']['index']]['url']; ?>
'" class="kursor" rel="nofollow" title="<?php echo $this->_tpl_vars['articles'][$this->_sections['aa']['index']]['title']; ?>
"><?php echo $this->_tpl_vars['LANG']['_PAGE_MORE']; ?>
</a></div>
			</div>
		<?php if ($this->_sections['aa']['last']): ?></div><?php endif; ?>
	<?php endfor; else: ?>
		<p class="center error"><?php echo $this->_tpl_vars['LANG']['_PAGE_NO_NEWS']; ?>
</p>
	<?php endif; ?>
		
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "misc/stronicowanie.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

</div>