<?php /* Smarty version 2.6.13, created on 2017-06-06 15:22:10
         compiled from petycje/pokaz.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'petycje/pokaz.html', 35, false),)), $this); ?>
<div id="content-header">
    <div id="breadcrumb"> <a href="/admin" title="Panel" class="tip-bottom"><i class="icon-home"></i> Panel</a> <a>Petycje</a><a class="current">Zarządzanie</a> </div>
    <h1><?php echo $this->_tpl_vars['pageTitle']; ?>
</h1>
</div>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="alert alert-info">
        Pomarańczowym kolorem oznaczone są propozycje petycji dodane przez internautów</br>
        Zielonym kolorem oznaczone są petycje w realizacji
        </div>
        <a href="?action=add" title="Nowa aktualność" class="btn"><i class="icon-plus"></i>   Dodaj nową</a>
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-list-ul"></i></span>
                <h5>Petycje serwisu</h5>
            </div>
            <div class="widget-content nopadding">
                <table class="table table-bordered table-striped">
                    <thead>
                        <th align="left">Treść</th>
                        <th width='100'>Data utworzenia</th>
                        <th width='80'>Aktywna</th>
                        <th width='80'>Głosowanie</th>
                        <th width='80'>Galeria</th>
                        <th width='120'>Akcje</th>
                        </thead>
                    <tbody>
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
                        <tr <?php if ($this->_tpl_vars['articles'][$this->_sections['a1']['index']]['front'] == 1): ?> class="front"<?php endif;  if ($this->_tpl_vars['articles'][$this->_sections['a1']['index']]['done'] == 1): ?> class="done"<?php endif; ?>>
                            <td align="left">
                                <a href="?action=edit&amp;id=<?php echo $this->_tpl_vars['articles'][$this->_sections['a1']['index']]['id']; ?>
">
                                    <?php if ($this->_tpl_vars['articles'][$this->_sections['a1']['index']]['auth'] == 1): ?>
                                    <i class="icon-lock" title="Dostępna dla zalogowanych"></i>
                                    <?php endif; ?>
                                    <b><?php echo $this->_tpl_vars['articles'][$this->_sections['a1']['index']]['title']; ?>
</b></a><br />
                                <?php echo ((is_array($_tmp=$this->_tpl_vars['articles'][$this->_sections['a1']['index']]['content_short'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 350, "...", true) : smarty_modifier_truncate($_tmp, 350, "...", true)); ?>

                            </td>
                            <td width='100'><?php echo $this->_tpl_vars['articles'][$this->_sections['a1']['index']]['date_add']; ?>
</td>
                            <td width='80'><?php if ($this->_tpl_vars['articles'][$this->_sections['a1']['index']]['active'] == 1): ?><i class="icon-eye-open"><?php else: ?>
                                <i class="icon-eye-close"><?php endif; ?></td>
                            <td width='80'><?php if ($this->_tpl_vars['articles'][$this->_sections['a1']['index']]['comments'] == 1): ?><i class="icon-check"><?php else: ?>
                                <i class="icon-check-empty"><?php endif; ?></td>
                            <td width='80'><?php if ($this->_tpl_vars['articles'][$this->_sections['a1']['index']]['gallery_id'] > 0): ?><i class="icon-film"></i><?php else: ?>
                                <i class="icon-remove"><?php endif; ?></td>
                            <td width='120'>
                                <a class="btn btn"  href="<?php echo $this->_tpl_vars['articles'][$this->_sections['a1']['index']]['title_url']; ?>
" title="Podgląd">
                                  <i class="icon-search"></i>
                                </a>
                                <a class="btn btn"  href="?action=edit&amp;id=<?php echo $this->_tpl_vars['articles'][$this->_sections['a1']['index']]['id']; ?>
" title="Edytuj">
                                    <i class="icon-edit"></i>
                                </a>
                                <a class="btn btn"  href="?action=delete&amp;id=<?php echo $this->_tpl_vars['articles'][$this->_sections['a1']['index']]['id']; ?>
" title="Kasuj">
                                    <i class="icon-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endfor; else: ?>
                        <tr><td colspan="5">Brak aktualności w bazie. Aby stworzyć nową artykuł użyj opcji powyżej.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php if ($this->_tpl_vars['pages'] > 1): ?>
        <div class="center">
            <?php if ($this->_tpl_vars['page'] > 1): ?>
            <a class="link" href="?page=<?php echo $this->_tpl_vars['page']-1; ?>
">&laquo; Poprzednia</a>
            <?php else: ?>
            <span class="inactive">&laquo; Poprzednia</span>
            <?php endif; ?>
            | <?php unset($this->_sections['p']);
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
            <?php if ($this->_tpl_vars['i'] < $this->_tpl_vars['page']-4 && $this->_tpl_vars['i'] == 1): ?><a class="link" href="?page=<?php echo $this->_tpl_vars['i']; ?>
"> <?php echo $this->_tpl_vars['i']; ?>
 </a><?php if ($this->_tpl_vars['i'] != $this->_tpl_vars['page']-5): ?>...<?php endif;  endif; ?>
            <?php if ($this->_tpl_vars['i'] < $this->_tpl_vars['page']+5 && $this->_tpl_vars['i'] > $this->_tpl_vars['page']-5): ?>
            <?php if ($this->_tpl_vars['i'] == $this->_tpl_vars['page']): ?><span class="inactive"> <?php echo $this->_tpl_vars['page']; ?>
 </span><?php else: ?><a class="link" href="?page=<?php echo $this->_tpl_vars['i']; ?>
"> <?php echo $this->_tpl_vars['i']; ?>
 </a><?php endif; ?>
            <?php endif; ?>
            <?php if ($this->_tpl_vars['i'] > $this->_tpl_vars['page']+4 && $this->_tpl_vars['i'] == $this->_tpl_vars['pages']):  if ($this->_tpl_vars['i'] != $this->_tpl_vars['page']+5): ?>...<?php endif; ?><a class="link" href="?page=<?php echo $this->_tpl_vars['i']; ?>
"> <?php echo $this->_tpl_vars['i']; ?>
 </a><?php endif; ?>
            <?php endfor; endif; ?> | 
            <?php if ($this->_tpl_vars['page'] < $this->_tpl_vars['pages']): ?>
            <a class="link" href="?page=<?php echo $this->_tpl_vars['page']+1; ?>
">Następna &raquo;</a>
            <?php else: ?>
            <span class="inactive">Następna &raquo;</span>
            <?php endif; ?>
        </div>
        <?php endif; ?>
    </div>
</div>