<?php /* Smarty version 2.6.13, created on 2017-02-27 15:44:51
         compiled from onepage/pokaz.html */ ?>
<div class="page-title">
    <div class="title_left">
        <h3>
            <?php echo $this->_tpl_vars['pageTitle']; ?>

        </h3>
    </div>
</div>

<div class="page-content">
    <p><a href="?action=add" title="Nowa podstrona"><strong class="btn btn-default">Dodaj nową podstronę</strong></a></p>

    <!--        <table class="special" cellspacing="1" cellpadding="0">
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
                    <?php if ((1 & $this->_sections['a1']['index'])): ?>
                    <tr class="shadow_dark">
                        <?php else: ?>
                    <tr class="shadow_light">
                        <?php endif; ?>
                        <td>
                            <a href="?action=edit&amp;id=<?php echo $this->_tpl_vars['articles'][$this->_sections['a1']['index']]['id']; ?>
">
                                <?php if ($this->_tpl_vars['articles'][$this->_sections['a1']['index']]['auth'] == 1): ?>
                                <img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
/templates/admin/img/encrypted.png" alt="Zabezpieczona hasłem" />
                                <?php endif; ?>
                                <b><?php echo $this->_tpl_vars['articles'][$this->_sections['a1']['index']]['title']; ?>
</b></a><br />
                            <?php echo $this->_tpl_vars['articles'][$this->_sections['a1']['index']]['content_short']; ?>

                        </td>
                        <td width="60" class="center not-important"><?php echo $this->_tpl_vars['articles'][$this->_sections['a1']['index']]['date_add']; ?>
</td>
                        <td class="center"><?php if ($this->_tpl_vars['articles'][$this->_sections['a1']['index']]['active'] == 1): ?><img src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/img/visible.png" alt="Widoczna" title="Widoczna" /><?php else: ?>
                            <img src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/img/novisible.png" alt="Niewidoczna" title="Niewidoczna" /><?php endif; ?></td>
                        <td class="center"><?php if ($this->_tpl_vars['articles'][$this->_sections['a1']['index']]['gallery_id'] > 0): ?><img src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/img/visible.png" alt="Dołączona galeria: <?php echo $this->_tpl_vars['articles'][$this->_sections['a1']['index']]['gallery_id']; ?>
" title="Dołączona galeria: <?php echo $this->_tpl_vars['articles'][$this->_sections['a1']['index']]['gallery_id']; ?>
" /><?php else: ?>
                            <img src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/img/novisible.png" alt="Brak galerii" title="Brak galerii" /><?php endif; ?></td>
                        <td class="opcje">
                            <a href="<?php echo $this->_tpl_vars['articles'][$this->_sections['a1']['index']]['title_url']; ?>
" target="_blank" title="Podgląd"><img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
/templates/admin/img/html.png" alt="Podgląd online" /></a>
                            <a href="?action=edit&amp;id=<?php echo $this->_tpl_vars['articles'][$this->_sections['a1']['index']]['id']; ?>
" title="Edytuj"><img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
/templates/admin/img/edit.png" alt="Edytuj" /></a>
                            <a href="?action=delete&amp;id=<?php echo $this->_tpl_vars['articles'][$this->_sections['a1']['index']]['id']; ?>
" title="Kasuj" onclick="return confirmDelete()"><img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
/templates/admin/img/delete.png" alt="Kasuj" /></a>
                        </td>
                    </tr>
                    <?php endfor; else: ?>
                    <tr><td colspan="2">Brak artykułów w bazie. Aby stworzyć nową artykuł użyj opcji powyżej.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>-->

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Tytuł</th>
                <th>Wprowadzenie</th>
                <th>Data utworzenia</th>
                <th>Publikacja</th>
                <th>Sekcja</th>
                <th>Galeria</th>
                <th style="text-align: right">Akcje</th>
            </tr>
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
            <?php if ((1 & $this->_sections['a1']['index'])): ?>
            <tr class="">
                <?php else: ?>
            <tr class="">
                <?php endif; ?>
                <td width="300">
                    <a href="?action=edit&amp;id=<?php echo $this->_tpl_vars['articles'][$this->_sections['a1']['index']]['id']; ?>
">
                        <?php if ($this->_tpl_vars['articles'][$this->_sections['a1']['index']]['auth'] == 1): ?>
                        <img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
/templates/admin/img/encrypted.png" alt="Zabezpieczona hasłem" />
                        <?php endif; ?>
                        <b><?php echo $this->_tpl_vars['articles'][$this->_sections['a1']['index']]['title']; ?>
</b></a><br />
                </td>
                <td>
                    <?php echo $this->_tpl_vars['articles'][$this->_sections['a1']['index']]['content_short']; ?>

                </td>
                <td width="200" class="center not-important"><?php echo $this->_tpl_vars['articles'][$this->_sections['a1']['index']]['date_add']; ?>
</td>
                <td width="100" class="center"><?php if ($this->_tpl_vars['articles'][$this->_sections['a1']['index']]['active'] == 1): ?><i class="fa fa-eye" aria-hidden="true"></i><?php else: ?>
                    <i class="fa fa-eye-slash" aria-hidden="true"></i><?php endif; ?></td>
                <td><?php echo $this->_tpl_vars['articles'][$this->_sections['a1']['index']]['section']; ?>
</td>
                <td width="100" class="center"><?php if ($this->_tpl_vars['articles'][$this->_sections['a1']['index']]['gallery_id'] > 0): ?><i class="fa fa-picture-o" aria-hidden="true"></i><?php else: ?>
                    Brak<?php endif; ?></td>
                <td width="100" class="akcje" align="right">
                    <a href="<?php echo $this->_tpl_vars['articles'][$this->_sections['a1']['index']]['title_url']; ?>
" target="_blank" title="Podgląd"><i class="fa fa-search" aria-hidden="true"></i></a>
                    <a href="?action=edit&amp;id=<?php echo $this->_tpl_vars['articles'][$this->_sections['a1']['index']]['id']; ?>
" title="Edytuj"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    <a href="?action=delete&amp;id=<?php echo $this->_tpl_vars['articles'][$this->_sections['a1']['index']]['id']; ?>
" title="Kasuj" onclick="return confirmDelete()"><i class="fa fa-trash" aria-hidden="true"></i></a>
                </td>
            </tr>
            <?php endfor; else: ?>
            <tr><td colspan="2">Brak artykułów w bazie. Aby stworzyć nową artykuł użyj opcji powyżej.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>

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