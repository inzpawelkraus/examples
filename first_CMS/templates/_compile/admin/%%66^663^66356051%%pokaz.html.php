<?php /* Smarty version 2.6.13, created on 2017-05-16 11:20:21
         compiled from galeria/pokaz.html */ ?>
<div id="content-header">
    <div id="breadcrumb"> <a href="/admin" title="Panel" class="tip-bottom"><i class="icon-home"></i> Panel</a> <a>Aktualności</a><a class="current">Zarządzanie</a> </div>
    <h1><?php echo $this->_tpl_vars['pageTitle']; ?>
</h1>
</div>
<div class="container-fluid">
    <div class="row-fluid">
        <a href="?action=add_gallery" title="Nowa galeria" class="btn"><i class="icon-plus"></i>   Dodaj nową</a>
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-list-ul"></i></span>
                <h5>Galerie serwisu</h5>
            </div>
            <div class="widget-content nopadding">
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
                <?php if ($this->_sections['g']['first']): ?>
                <table class="table table-bordered table-striped">
                    <thead>
                    <th align="left">Zdjęcie główne</th>
                    <th width='80'>Opis</th>
                    <th width='120'>Akcje</th>
                    </thead>
                    <tbody>
                        <?php endif; ?>
                        <tr>
                            <td width="250"><a href="?action=show_gallery&amp;id=<?php echo $this->_tpl_vars['galleries'][$this->_sections['g']['index']]['id']; ?>
">
                                    <?php if ($this->_tpl_vars['galleries'][$this->_sections['g']['index']]['photo']['src']): ?><img style="margin: 5px;" src="<?php echo $this->_tpl_vars['galleries'][$this->_sections['g']['index']]['photo']['src']; ?>
" alt="Dodaj zdjęcia" title="Dodaj zdjęcia" />
                                    <?php else: ?><strong>Dodaj zdjęcia</strong><?php endif; ?></a></td>
                            <td>
                                <a href="?action=show_gallery&amp;id=<?php echo $this->_tpl_vars['galleries'][$this->_sections['g']['index']]['id']; ?>
"><b><?php echo $this->_tpl_vars['galleries'][$this->_sections['g']['index']]['title']; ?>
</b></a><br />
                                <?php echo $this->_tpl_vars['galleries'][$this->_sections['g']['index']]['content_short']; ?>

                            </td>
                            <td width='120'>
                                <?php if ($this->_sections['g']['index'] != 0): ?>
                                <a href="./galeria.php?id=<?php echo $this->_tpl_vars['galleries'][$this->_sections['g']['index']]['id']; ?>
&action=up_gal" title="Przenieś w górę"><img border="0" src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
/templates/admin/img/moveUp.png" alt="Przenieś w górę" /></a>
                                <?php else: ?>
                                <?php endif; ?>
                                <?php if ($this->_sections['g']['last'] != 1): ?>
                                <a href="./galeria.php?id=<?php echo $this->_tpl_vars['galleries'][$this->_sections['g']['index']]['id']; ?>
&action=down_gal" title="Przenieś w dół"><img border="0" src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
/templates/admin/img/moveDown.png" alt="Przenieś w dół" /></a>
                                <?php else: ?>
                                <?php endif; ?>
                                </a>
                                <a class="btn btn"  href="?action=edit_gallery&amp;id=<?php echo $this->_tpl_vars['galleries'][$this->_sections['g']['index']]['id']; ?>
" title="Edytuj">
                                    <i class="icon-edit"></i>
                                </a>
                                <a class="btn btn"  href="?action=delete_gallery&amp;id=<?php echo $this->_tpl_vars['galleries'][$this->_sections['g']['index']]['id']; ?>
" title="Kasuj">
                                    <i class="icon-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php if ($this->_sections['g']['last']): ?>
                    </tbody>	
                </table>
                <?php endif; ?>
                <?php endfor; else: ?>
                <p class="center error">Nie utworzono jeszcze galerii.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>