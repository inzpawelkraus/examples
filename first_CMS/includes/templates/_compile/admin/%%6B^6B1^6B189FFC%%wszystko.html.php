<?php /* Smarty version 2.6.13, created on 2017-05-11 09:29:46
         compiled from slownik/wszystko.html */ ?>
<div id="content-header">
    <div id="breadcrumb"> <a href="/admin" title="Panel" class="tip-bottom"><i class="icon-home"></i> Panel</a> <a>Ustawienia</a><a class="current">Słownik</a> </div>
    <h1><?php echo $this->_tpl_vars['pageTitle']; ?>
</h1>
</div>
<div class="container-fluid">
    <a class="btn" href="?action=add"><i class="icon-plus"></i>   Dodaj nowy wyraz</a></br></br>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
" class="form-horizontal">
        <div class="control-group"></br>
            <input type="text" class="text" name="keyword" value="<?php echo $_POST['keyword']; ?>
"/>
            <input type="hidden" name="action" value="szukaj" />
        </div>
        <div class="control-group"></br>
            <input class="btn btn-success" type="submit"  value="Szukaj" />
        </div>
    </form>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
" class="form-horizontal">
        <div class="widget-box collapsible">
            <?php unset($this->_sections['a1']);
$this->_sections['a1']['name'] = 'a1';
$this->_sections['a1']['loop'] = is_array($_loop=$this->_tpl_vars['articles']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['a1']['show'] = true;
$this->_sections['a1']['max'] = $this->_sections['a1']['loop'];
$this->_sections['a1']['step'] = 1;
$this->_sections['a1']['start'] = $this->_sections['a1']['step'] > 0 ? 0 : $this->_sections['a1']['loop']-1;
if ($this->_sections['a1']['show']) {
    $this->_sections['a1']['total'] = $this->_sections['a1']['loop'];
    if ($this->_sections['a1']['total'] == 0)
        $this->_sections['a1']['show'] = false;
} else
    $this->_sections['a1']['total'] = 0;
if ($this->_sections['a1']['show']):

            for ($this->_sections['a1']['index'] = $this->_sections['a1']['start'], $this->_sections['a1']['iteration'] = 1;
                 $this->_sections['a1']['iteration'] <= $this->_sections['a1']['total'];
                 $this->_sections['a1']['index'] += $this->_sections['a1']['step'], $this->_sections['a1']['iteration']++):
$this->_sections['a1']['rownum'] = $this->_sections['a1']['iteration'];
$this->_sections['a1']['index_prev'] = $this->_sections['a1']['index'] - $this->_sections['a1']['step'];
$this->_sections['a1']['index_next'] = $this->_sections['a1']['index'] + $this->_sections['a1']['step'];
$this->_sections['a1']['first']      = ($this->_sections['a1']['iteration'] == 1);
$this->_sections['a1']['last']       = ($this->_sections['a1']['iteration'] == $this->_sections['a1']['total']);
?>
            <div class="widget-title"> <a data-toggle="collapse" href="#collapse<?php echo $this->_tpl_vars['articles'][$this->_sections['a1']['index']]['id']; ?>
"> <span class="icon"><i class="icon-arrow-right"></i></span>
                    <h5>Klucz: " <?php echo $this->_tpl_vars['articles'][$this->_sections['a1']['index']]['label']; ?>
 "</h5>
                </a> </div>
            <div id="collapse<?php echo $this->_tpl_vars['articles'][$this->_sections['a1']['index']]['id']; ?>
" class="collapse">
                <div class="widget-content"><textarea class="pl" name="pl[<?php echo $this->_tpl_vars['articles'][$this->_sections['a1']['index']]['id']; ?>
]" style="width: 100%;"><?php echo $this->_tpl_vars['articles'][$this->_sections['a1']['index']]['pl']; ?>
</textarea></div>
            </div>
            <?php endfor; endif; ?>
        </div>
        <div class="form-actions">
            <input type="hidden" name="page" value="<?php echo $this->_tpl_vars['page']; ?>
" />
            <input type="hidden" name="action" value="save_all" />
            <input class="btn btn-success" type="submit"  value="Zapisz" />
        </div>
    </form>
    <?php if ($this->_tpl_vars['pages'] > 1): ?>
    <div class="pagination"><ul>
            <?php if ($this->_tpl_vars['page'] > 1): ?>
            <li><a class="link" href="?page=<?php echo $this->_tpl_vars['page']-1; ?>
">&laquo; Poprzednia</a></li>
            <?php else: ?>
            <li><span class="inactive">&laquo; Poprzednia</span></li>
            <?php endif; ?>
            <?php unset($this->_sections['p']);
$this->_sections['p']['name'] = 'p';
$this->_sections['p']['start'] = (int)1;
$this->_sections['p']['loop'] = is_array($_loop=$this->_tpl_vars['pages']+1) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['p']['show'] = true;
$this->_sections['p']['max'] = $this->_sections['p']['loop'];
$this->_sections['p']['step'] = 1;
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
            <?php $this->assign('i', $this->_sections['p']['index']); ?>
            <?php if ($this->_tpl_vars['i'] < $this->_tpl_vars['page']-4 && $this->_tpl_vars['i'] == 1): ?><li><a class="link" href="?page=<?php echo $this->_tpl_vars['i']; ?>
"> <?php echo $this->_tpl_vars['i']; ?>
 </a></li><?php if ($this->_tpl_vars['i'] != $this->_tpl_vars['page']-5): ?><li><a>...</a></li><?php endif;  endif; ?>
            <?php if ($this->_tpl_vars['i'] < $this->_tpl_vars['page']+5 && $this->_tpl_vars['i'] > $this->_tpl_vars['page']-5): ?>
            <?php if ($this->_tpl_vars['i'] == $this->_tpl_vars['page']): ?><li><span class="inactive"> <?php echo $this->_tpl_vars['page']; ?>
 </span></li><?php else: ?><li><a class="link" href="?page=<?php echo $this->_tpl_vars['i']; ?>
"> <?php echo $this->_tpl_vars['i']; ?>
 </a></li><?php endif; ?>
            <?php endif; ?>
            <?php if ($this->_tpl_vars['i'] > $this->_tpl_vars['page']+4 && $this->_tpl_vars['i'] == $this->_tpl_vars['pages']):  if ($this->_tpl_vars['i'] != $this->_tpl_vars['page']+5): ?><li><a>...</li></a><?php endif; ?><li><a class="link" href="?page=<?php echo $this->_tpl_vars['i']; ?>
"> <?php echo $this->_tpl_vars['i']; ?>
 </a></li><?php endif; ?>
            <?php endfor; endif; ?>
            <?php if ($this->_tpl_vars['page'] < $this->_tpl_vars['pages']): ?>
            <li><a class="link" href="?page=<?php echo $this->_tpl_vars['page']+1; ?>
">Następna &raquo;</a></li>
            <?php else: ?>
            <li><span class="inactive">Następna &raquo;</span></li>
            <?php endif; ?>
        </ul></div>
    <?php endif; ?>
</div>