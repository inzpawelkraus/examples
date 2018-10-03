<?php /* Smarty version 2.6.13, created on 2017-04-21 22:59:27
         compiled from misc/stronicowanie.html */ ?>
<?php if ($this->_tpl_vars['pages'] > 1): ?>
<div class="pagination">
    <div class="boxed">
        <?php if ($this->_tpl_vars['page'] < $this->_tpl_vars['pages']): ?>
        <a class="prev page-numbers" href="?page=<?php echo $this->_tpl_vars['page']+1; ?>
"><?php echo $this->_tpl_vars['LANG']['_PAGE_PREV']; ?>
</a> |
        <?php else:  endif; ?>
        <?php unset($this->_sections['p']);
$this->_sections['p']['name'] = 'p';
$this->_sections['p']['start'] = (int)$this->_tpl_vars['pages'];
$this->_sections['p']['step'] = ((int)-1) == 0 ? 1 : (int)-1;
$this->_sections['p']['loop'] = is_array($_loop=$this->_tpl_vars['pages']+1) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['p']['show'] = true;
$this->_sections['p']['max'] = $this->_sections['p']['loop'];
if ($this->_sections['p']['start'] < 0)
    $this->_sections['p']['start'] = max($this->_sections['p']['step'] > 0 ? 0 : -1, $this->_sections['p']['loop'] + $this->_sections['p']['start']);
else
    $this->_sections['p']['start'] = min($this->_sections['p']['start'], $this->_sections['p']['step'] > 0 ? $this->_sections['p']['loop'] : $this->_sections['p']['loop']-1);
if ($this->_sections['p']['show']) {
    $this->_sections['p']['total'] = min(ceil(($this->_sections['p']['step'] > 0 ? $this->_sections['p']['loop'] - $this->_sections['p']['start'] : $this->_sections['p']['start']+1)/abs($this->_sections['p']['step'])), $this->_sections['p']['max']);
    if ($this->_sections['p']['total'] == 0)
        $this->_sections['p']['show'] = false;
} else
    $this->_sections['p']['total'] = 0;
if ($this->_sections['p']['show']):

            for ($this->_sections['p']['index'] = $this->_sections['p']['start'], $this->_sections['p']['iteration'] = 1;
                 $this->_sections['p']['iteration'] <= $this->_sections['p']['total'];
                 $this->_sections['p']['index'] += $this->_sections['p']['step'], $this->_sections['p']['iteration']++):
$this->_sections['p']['rownum'] = $this->_sections['p']['iteration'];
$this->_sections['p']['index_prev'] = $this->_sections['p']['index'] - $this->_sections['p']['step'];
$this->_sections['p']['index_next'] = $this->_sections['p']['index'] + $this->_sections['p']['step'];
$this->_sections['p']['first']      = ($this->_sections['p']['iteration'] == 1);
$this->_sections['p']['last']       = ($this->_sections['p']['iteration'] == $this->_sections['p']['total']);
?>
        <?php if (! $this->_sections['p']['last']): ?>
        <?php $this->assign('i', $this->_sections['p']['index']); ?>
        <?php if ($this->_tpl_vars['i'] < $this->_tpl_vars['page']-4 && $this->_tpl_vars['i'] == 1):  if ($this->_tpl_vars['i'] != $this->_tpl_vars['page']+5): ?>...<?php endif; ?><a class="link" href="?page=<?php echo $this->_tpl_vars['i']; ?>
"> <?php echo $this->_tpl_vars['i']; ?>
 </a><?php endif; ?>
        <?php if ($this->_tpl_vars['i'] < $this->_tpl_vars['page']+5 && $this->_tpl_vars['i'] > $this->_tpl_vars['page']-5): ?>
        <?php if ($this->_tpl_vars['i'] == $this->_tpl_vars['page']): ?><span class="page-numbers current"> <?php echo $this->_tpl_vars['pages']-$this->_tpl_vars['i']+1; ?>
 </span><?php else: ?><a class="page-numbers" href="?page=<?php echo $this->_tpl_vars['i']; ?>
"> <?php echo $this->_tpl_vars['pages']-$this->_tpl_vars['i']+1; ?>
 </a><?php endif; ?>
        <?php endif; ?>
        <?php if ($this->_tpl_vars['i'] > $this->_tpl_vars['page']+4 && $this->_tpl_vars['i'] == $this->_tpl_vars['pages']): ?><a class="link" href="?page=<?php echo $this->_tpl_vars['i']; ?>
"> <?php echo $this->_tpl_vars['i']; ?>
 </a><?php if ($this->_tpl_vars['i'] != $this->_tpl_vars['page']-5): ?>...<?php endif;  endif; ?>
        <?php endif; ?>
        <?php endfor; endif; ?> 
        <?php if ($this->_tpl_vars['page'] > 1): ?>
        | <a class="next page-numbers" href="?page=<?php echo $this->_tpl_vars['page']-1; ?>
"><?php echo $this->_tpl_vars['LANG']['_PAGE_NEXT']; ?>
</a>
        <?php else:  endif; ?>
    </div>
</div>
<?php endif; ?>