<?php /* Smarty version 2.6.13, created on 2017-03-17 13:32:23
         compiled from galeria/pokaz.html */ ?>
<?php if ($this->_tpl_vars['gal']['show_title']): ?>
	<div id="page-title">
		<h1><?php echo $this->_tpl_vars['LANG']['_PAGE_GALLERY']; ?>
 &raquo; <?php echo $this->_tpl_vars['gal']['title']; ?>
</h1>
	</div>
<?php endif; ?>

<div id="page-content"> 
		<?php echo $this->_tpl_vars['gal']['content']; ?>

	
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
			<div class="gal2">
					<a href="<?php echo $this->_tpl_vars['gallery'][$this->_sections['g']['index']]['url']; ?>
" title="<?php if ($this->_tpl_vars['gallery'][$this->_sections['g']['index']]['title']):  echo $this->_tpl_vars['gallery'][$this->_sections['g']['index']]['title'];  else:  echo $this->_tpl_vars['gallery'][$this->_sections['g']['index']]['anchor'];  endif; ?>" class="fancybox" rel="fancybox">
						<img class="gal-img" src="<?php echo $this->_tpl_vars['gallery'][$this->_sections['g']['index']]['src']; ?>
" alt="<?php if ($this->_tpl_vars['gallery'][$this->_sections['g']['index']]['title']):  echo $this->_tpl_vars['gallery'][$this->_sections['g']['index']]['title'];  else:  echo $this->_tpl_vars['gallery'][$this->_sections['g']['index']]['anchor'];  endif; ?>" />
					</a>
			</div>
			<?php if ($this->_sections['g']['last']): ?></div><?php endif; ?>
		<?php endfor; else: ?>
			<p class="center error">Przepraszamy, ale aktualnie brak zdjęć w galerii.</p>
		<?php endif; ?>
</div>

		<br class="clear" />
	<?php if ($this->_tpl_vars['CONF']['show_tagi'] == 1): ?>
		<?php unset($this->_sections['t']);
$this->_sections['t']['name'] = 't';
$this->_sections['t']['loop'] = is_array($_loop=$this->_tpl_vars['gal']['tagi']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['t']['show'] = true;
$this->_sections['t']['max'] = $this->_sections['t']['loop'];
$this->_sections['t']['step'] = 1;
$this->_sections['t']['start'] = $this->_sections['t']['step'] > 0 ? 0 : $this->_sections['t']['loop']-1;
if ($this->_sections['t']['show']) {
    $this->_sections['t']['total'] = $this->_sections['t']['loop'];
    if ($this->_sections['t']['total'] == 0)
        $this->_sections['t']['show'] = false;
} else
    $this->_sections['t']['total'] = 0;
if ($this->_sections['t']['show']):

            for ($this->_sections['t']['index'] = $this->_sections['t']['start'], $this->_sections['t']['iteration'] = 1;
                 $this->_sections['t']['iteration'] <= $this->_sections['t']['total'];
                 $this->_sections['t']['index'] += $this->_sections['t']['step'], $this->_sections['t']['iteration']++):
$this->_sections['t']['rownum'] = $this->_sections['t']['iteration'];
$this->_sections['t']['index_prev'] = $this->_sections['t']['index'] - $this->_sections['t']['step'];
$this->_sections['t']['index_next'] = $this->_sections['t']['index'] + $this->_sections['t']['step'];
$this->_sections['t']['first']      = ($this->_sections['t']['iteration'] == 1);
$this->_sections['t']['last']       = ($this->_sections['t']['iteration'] == $this->_sections['t']['total']);
?>
			<?php if ($this->_sections['t']['first']): ?><div class="tagi"><?php endif; ?>
				<a style="margin: 0 10px;" href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
/szukaj/<?php echo $this->_tpl_vars['gal']['tagi_url'][$this->_sections['t']['index']]; ?>
" title="<?php echo $this->_tpl_vars['gal']['tagi'][$this->_sections['t']['index']]; ?>
"><?php echo $this->_tpl_vars['gal']['tagi'][$this->_sections['t']['index']]; ?>
</a>
			<?php if ($this->_sections['t']['last']): ?></div><?php endif; ?>
		<?php endfor; endif; ?>		
	<?php endif; ?>

	<?php if ($this->_tpl_vars['CONF']['show_back'] == 1): ?><div class="back"><a href="<?php echo $_SERVER['HTTP_REFERER']; ?>
" title="<?php echo $this->_tpl_vars['LANG']['_PAGE_BACK']; ?>
">&laquo; <?php echo $this->_tpl_vars['LANG']['_PAGE_BACK']; ?>
</a></div><?php endif; ?>
	
<?php if ($this->_tpl_vars['show_comments']): ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "misc/komentarze.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  endif; ?>