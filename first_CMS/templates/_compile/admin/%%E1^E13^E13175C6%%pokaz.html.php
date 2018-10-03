<?php /* Smarty version 2.6.13, created on 2017-05-15 21:57:08
         compiled from strony/pokaz.html */ ?>
<div id="content-header">
    <div id="breadcrumb"> <a href="/admin" title="Panel" class="tip-bottom"><i class="icon-home"></i> Panel</a> <a>Strony</a><a class="current">Zarządzanie</a> </div>
    <h1><?php echo $this->_tpl_vars['pageTitle']; ?>
</h1>
</div>
<div class="container-fluid">
    <div class="row-fluid">
        <a href="?action=add" title="Nowa strona" class="btn"><i class="icon-plus"></i>   Dodaj nową</a>
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-list-ul"></i></span>
                <h5>Strony serwisu</h5>
            </div>
            <div class="widget-content nopadding">
                <table class="table table-bordered table-striped">
                    <thead>
                        <th align="left">Treść</th>
                        <th width='100'>Data utworzenia</th>
                        <th width='80'>Aktywna</th>
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
                        <tr>
                            <td align="left">
                                <a href="?action=edit&amp;id=<?php echo $this->_tpl_vars['articles'][$this->_sections['a1']['index']]['id']; ?>
">
                                    <?php if ($this->_tpl_vars['articles'][$this->_sections['a1']['index']]['auth'] == 1): ?>
                                    <img border="0" src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
/templates/admin/img/encrypted.png" alt="Zabezpieczona hasłem" />
                                    <?php endif; ?>
                                    <b><?php echo $this->_tpl_vars['articles'][$this->_sections['a1']['index']]['title']; ?>
</b></a><br />
                                <?php echo $this->_tpl_vars['articles'][$this->_sections['a1']['index']]['content_short']; ?>

                            </td>
                            <td width='100'><?php echo $this->_tpl_vars['articles'][$this->_sections['a1']['index']]['date_add']; ?>
</td>
                            <td width='80'><?php if ($this->_tpl_vars['articles'][$this->_sections['a1']['index']]['active'] == 1): ?><i class="icon-eye-open"><?php else: ?>
                                <i class="icon-eye-close"><?php endif; ?></td>
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
                        <tr><td colspan="2" class="center">Brak stron w bazie. Aby stworzyć nową artykuł użyj opcji powyżej.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>