<?php /* Smarty version 2.6.13, created on 2017-04-22 00:00:52
         compiled from sklep/edytuj.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'math', 'sklep/edytuj.html', 118, false),)), $this); ?>
<div id="content-header">
    <div id="breadcrumb"> <a href="/admin" title="Panel" class="tip-bottom"><i class="icon-home"></i> Panel</a> <a>Sklep</a> <a>Produkty</a><a class="current">Edycja produktu</a> </div>
    <h1>
        <?php echo $this->_tpl_vars['pageTitle']; ?>

    
    </h1>
</div>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                <h5>Formularz edycji aktualności</h5>
            </div>
            <div class="widget-content nopadding">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
" enctype="multipart/form-data" class="form-horizontal">
                    <table class="special" cellspacing="1" cellpadding="0">
                        <div class="control-group">
                            <label class="control-label">Nazwa :</label>
                            <div class="controls">
                                <?php unset($this->_sections['j1']);
$this->_sections['j1']['name'] = 'j1';
$this->_sections['j1']['loop'] = is_array($_loop=$this->_tpl_vars['JEZYK']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['j1']['show'] = true;
$this->_sections['j1']['max'] = $this->_sections['j1']['loop'];
$this->_sections['j1']['step'] = 1;
$this->_sections['j1']['start'] = $this->_sections['j1']['step'] > 0 ? 0 : $this->_sections['j1']['loop']-1;
if ($this->_sections['j1']['show']) {
    $this->_sections['j1']['total'] = $this->_sections['j1']['loop'];
    if ($this->_sections['j1']['total'] == 0)
        $this->_sections['j1']['show'] = false;
} else
    $this->_sections['j1']['total'] = 0;
if ($this->_sections['j1']['show']):

            for ($this->_sections['j1']['index'] = $this->_sections['j1']['start'], $this->_sections['j1']['iteration'] = 1;
                 $this->_sections['j1']['iteration'] <= $this->_sections['j1']['total'];
                 $this->_sections['j1']['index'] += $this->_sections['j1']['step'], $this->_sections['j1']['iteration']++):
$this->_sections['j1']['rownum'] = $this->_sections['j1']['iteration'];
$this->_sections['j1']['index_prev'] = $this->_sections['j1']['index'] - $this->_sections['j1']['step'];
$this->_sections['j1']['index_next'] = $this->_sections['j1']['index'] + $this->_sections['j1']['step'];
$this->_sections['j1']['first']      = ($this->_sections['j1']['iteration'] == 1);
$this->_sections['j1']['last']       = ($this->_sections['j1']['iteration'] == $this->_sections['j1']['total']);
?>
                                <input class="text title" type="text" name="title[<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j1']['index']]['id']; ?>
]" placeholder="<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j1']['index']]['name']; ?>
" value="<?php echo $this->_tpl_vars['opis'][$this->_sections['j1']['index']]['title']; ?>
" />
                                <input type="hidden" name="old_title_url[<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j1']['index']]['id']; ?>
]" value="<?php echo $this->_tpl_vars['opis'][$this->_sections['j1']['index']]['title_url']; ?>
" /> 
                                <?php endfor; endif; ?>
                            </div>
                        </div>
                        <input class="text" type="hidden" name="date_add" id="date_add" Value="<?php echo $this->_tpl_vars['article']['date_add']; ?>
" />

                        <div class="control-group">
                            <div class="controls">
                                <label>
                                    <input id="active" type="checkbox" name="active" value="1" <?php if ($this->_tpl_vars['article']['active']): ?>checked="true" <?php endif; ?> />
                                           Produkt widoczny w serwisie</label>
                                <label>
                                    <input type="checkbox" id="comments" name="comments" value="1" <?php if ($this->_tpl_vars['article']['comments']): ?>checked="true" <?php endif; ?> />
                                           Zezwól na komentowanie</label>
                                <label>
                                    <input id="auth" type="checkbox" name="auth" value="1" <?php if ($this->_tpl_vars['article']['auth']): ?>checked="true" <?php endif; ?> />
                                           Tylko dla zalogowanych</label>
                                <label>
                                    <input id="fbshare" type="checkbox" name="fbshare" value="1" <?php if ($this->_tpl_vars['article']['fbshare']): ?>checked="true" <?php endif; ?> />
                                           Udostępnij na portalach społecznościowych</label>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Cena :</label>
                            <div class="controls">
                                <input class="text title" type="text" name="price" placeholder="PLN" value="<?php echo $this->_tpl_vars['opis']['price']; ?>
" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Zdjęcie :</label>
                            <div class="controls">
                                <input class="file" type="file" name="photo" size="80" />
                            </div>
                        </div>
                        <?php unset($this->_sections['j2']);
$this->_sections['j2']['name'] = 'j2';
$this->_sections['j2']['loop'] = is_array($_loop=$this->_tpl_vars['JEZYK']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['j2']['show'] = true;
$this->_sections['j2']['max'] = $this->_sections['j2']['loop'];
$this->_sections['j2']['step'] = 1;
$this->_sections['j2']['start'] = $this->_sections['j2']['step'] > 0 ? 0 : $this->_sections['j2']['loop']-1;
if ($this->_sections['j2']['show']) {
    $this->_sections['j2']['total'] = $this->_sections['j2']['loop'];
    if ($this->_sections['j2']['total'] == 0)
        $this->_sections['j2']['show'] = false;
} else
    $this->_sections['j2']['total'] = 0;
if ($this->_sections['j2']['show']):

            for ($this->_sections['j2']['index'] = $this->_sections['j2']['start'], $this->_sections['j2']['iteration'] = 1;
                 $this->_sections['j2']['iteration'] <= $this->_sections['j2']['total'];
                 $this->_sections['j2']['index'] += $this->_sections['j2']['step'], $this->_sections['j2']['iteration']++):
$this->_sections['j2']['rownum'] = $this->_sections['j2']['iteration'];
$this->_sections['j2']['index_prev'] = $this->_sections['j2']['index'] - $this->_sections['j2']['step'];
$this->_sections['j2']['index_next'] = $this->_sections['j2']['index'] + $this->_sections['j2']['step'];
$this->_sections['j2']['first']      = ($this->_sections['j2']['iteration'] == 1);
$this->_sections['j2']['last']       = ($this->_sections['j2']['iteration'] == $this->_sections['j2']['total']);
?>
                        <div class="control-group">
                            <label class="control-label">Tagi :</label>
                            <div class="controls">
                                <input class="text tagi" type="text" name="tagi[<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j2']['index']]['id']; ?>
]" value="<?php echo $this->_tpl_vars['opis'][$this->_sections['j2']['index']]['tagi']; ?>
" />
                            </div>
                        </div>
                        <?php endfor; endif; ?>

                        <div class="control-group">
                            <label class="control-label">Galeria :</label>
                            <div class="controls">
                                <select name="gallery_id">
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
                                    <option value="<?php echo $this->_tpl_vars['galleries'][$this->_sections['g']['index']]['id']; ?>
" <?php if ($this->_tpl_vars['article']['gallery_id'] == $this->_tpl_vars['galleries'][$this->_sections['g']['index']]['id']): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['galleries'][$this->_sections['g']['index']]['title']; ?>
</option>
                                    <?php endfor; endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Krótki opis :</label>
                            <div class="controls">
                                <?php unset($this->_sections['j3']);
$this->_sections['j3']['name'] = 'j3';
$this->_sections['j3']['loop'] = is_array($_loop=$this->_tpl_vars['JEZYK']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['j3']['show'] = true;
$this->_sections['j3']['max'] = $this->_sections['j3']['loop'];
$this->_sections['j3']['step'] = 1;
$this->_sections['j3']['start'] = $this->_sections['j3']['step'] > 0 ? 0 : $this->_sections['j3']['loop']-1;
if ($this->_sections['j3']['show']) {
    $this->_sections['j3']['total'] = $this->_sections['j3']['loop'];
    if ($this->_sections['j3']['total'] == 0)
        $this->_sections['j3']['show'] = false;
} else
    $this->_sections['j3']['total'] = 0;
if ($this->_sections['j3']['show']):

            for ($this->_sections['j3']['index'] = $this->_sections['j3']['start'], $this->_sections['j3']['iteration'] = 1;
                 $this->_sections['j3']['iteration'] <= $this->_sections['j3']['total'];
                 $this->_sections['j3']['index'] += $this->_sections['j3']['step'], $this->_sections['j3']['iteration']++):
$this->_sections['j3']['rownum'] = $this->_sections['j3']['iteration'];
$this->_sections['j3']['index_prev'] = $this->_sections['j3']['index'] - $this->_sections['j3']['step'];
$this->_sections['j3']['index_next'] = $this->_sections['j3']['index'] + $this->_sections['j3']['step'];
$this->_sections['j3']['first']      = ($this->_sections['j3']['iteration'] == 1);
$this->_sections['j3']['last']       = ($this->_sections['j3']['iteration'] == $this->_sections['j3']['total']);
?>
                                <textarea class="seo-konf" rows="6" name="content_short[<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j3']['index']]['id']; ?>
]" placeholder="<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j3']['index']]['name']; ?>
"><?php echo $this->_tpl_vars['opis'][$this->_sections['j3']['index']]['content_short']; ?>
</textarea>
                                <?php endfor; endif; ?>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Treść :</label>
                            <div class="controls">
                                <?php unset($this->_sections['j4']);
$this->_sections['j4']['name'] = 'j4';
$this->_sections['j4']['loop'] = is_array($_loop=$this->_tpl_vars['JEZYK']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['j4']['show'] = true;
$this->_sections['j4']['max'] = $this->_sections['j4']['loop'];
$this->_sections['j4']['step'] = 1;
$this->_sections['j4']['start'] = $this->_sections['j4']['step'] > 0 ? 0 : $this->_sections['j4']['loop']-1;
if ($this->_sections['j4']['show']) {
    $this->_sections['j4']['total'] = $this->_sections['j4']['loop'];
    if ($this->_sections['j4']['total'] == 0)
        $this->_sections['j4']['show'] = false;
} else
    $this->_sections['j4']['total'] = 0;
if ($this->_sections['j4']['show']):

            for ($this->_sections['j4']['index'] = $this->_sections['j4']['start'], $this->_sections['j4']['iteration'] = 1;
                 $this->_sections['j4']['iteration'] <= $this->_sections['j4']['total'];
                 $this->_sections['j4']['index'] += $this->_sections['j4']['step'], $this->_sections['j4']['iteration']++):
$this->_sections['j4']['rownum'] = $this->_sections['j4']['iteration'];
$this->_sections['j4']['index_prev'] = $this->_sections['j4']['index'] - $this->_sections['j4']['step'];
$this->_sections['j4']['index_next'] = $this->_sections['j4']['index'] + $this->_sections['j4']['step'];
$this->_sections['j4']['first']      = ($this->_sections['j4']['iteration'] == 1);
$this->_sections['j4']['last']       = ($this->_sections['j4']['iteration'] == $this->_sections['j4']['total']);
?>
                                <span><?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j4']['index']]['name']; ?>
</span></br>
                                <textarea id="edytor_<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j4']['index']]['id']; ?>
" name="content[<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j4']['index']]['id']; ?>
]"><?php echo $this->_tpl_vars['opis'][$this->_sections['j4']['index']]['content']; ?>
</textarea>
                                <?php endfor; endif; ?>
                            </div>
                        </div>
                        <div class="form-actions">
                            <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['article']['id']; ?>
" />
                            <input class="btn btn-success" type="submit" name="action" value="Zapisz" />
                            <input class="btn btn-info" type="submit" name="action" value="Zapisz i kontynuuj edycję" />
                            <input class="btn btn-danger" type="submit" name="action" value="Porzuć zmiany" />
                        </div>
                    </table>
                </form>
            </div>


        </div>




        <?php if ($this->_tpl_vars['article']['photo']): ?>
        <div class="widget-box">
            <div class="widget-content nopadding">
                <div class="span6">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                            <h5>Zdjęcie wyróżniające</h5>
                        </div>
                        <div class="widget-content nopadding" style="height: 300px; display: table-cell; vertical-align: middle; text-align: center;">
                            <?php if ($this->_tpl_vars['article']['photo']['photo']): ?>
                            <img style="max-width: 500px;" src="<?php echo $this->_tpl_vars['article']['photo']['photo']; ?>
?<?php echo smarty_function_math(array('equation' => 'rand(0, 10000)'), $this);?>
" alt="<?php echo $this->_tpl_vars['article']['title']; ?>
" />
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="span6">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                            <h5>Miniaturka</h5>
                        </div>
                        <div class="widget-content nopadding" style="height: 300px; width: 100%; display: table-cell; vertical-align: middle; text-align: center;">
                            <?php if ($this->_tpl_vars['article']['photo']['small']): ?>
                            <a href="?action=edit_thumb&amp;type=small&amp;id=<?php echo $this->_tpl_vars['article']['id']; ?>
" title="Edytuj miniaturę dla listy">
                                <img style="max-width: 500px;" src="<?php echo $this->_tpl_vars['article']['photo']['small']; ?>
?<?php echo smarty_function_math(array('equation' => 'rand(0, 10000)'), $this);?>
" alt="<?php echo $this->_tpl_vars['article']['title']; ?>
" />
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <!--                <table style="border: 1px solid #898d6c; border-collapse: collapse;" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td style="border: 1px solid #898d6c;">Zdjęcie normalne</td>
                                        <td style="border: 1px solid #898d6c;">
                                            <?php if ($this->_tpl_vars['article']['photo']['photo']): ?>
                                            <img style="max-width: 500px;" src="<?php echo $this->_tpl_vars['article']['photo']['photo']; ?>
?<?php echo smarty_function_math(array('equation' => 'rand(0, 10000)'), $this);?>
" alt="<?php echo $this->_tpl_vars['article']['title']; ?>
" />
                                            <?php endif; ?>
                                        </td>
                                        <td style="border: 1px solid #898d6c; width: 100px;" rowspan="2">
                                            <a href="?action=delete_photo&amp;id=<?php echo $this->_tpl_vars['article']['id']; ?>
" onclick="return confirmDelete();">
                                                <img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
/templates/admin/img/delete.png" alt="Usuń z serwera" />
                                                <span> Usuń z serwera</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #898d6c;">Miniatura dla listy ofert</td>
                                        <td style="border: 1px solid #898d6c;">
                                            <?php if ($this->_tpl_vars['article']['photo']['small']): ?>
                                            <a href="?action=edit_thumb&amp;type=small&amp;id=<?php echo $this->_tpl_vars['article']['id']; ?>
" title="Edytuj miniaturę dla listy">
                                                <img style="max-width: 500px;" src="<?php echo $this->_tpl_vars['article']['photo']['small']; ?>
?<?php echo smarty_function_math(array('equation' => 'rand(0, 10000)'), $this);?>
" alt="<?php echo $this->_tpl_vars['article']['title']; ?>
" />
                                            </a>
                                            <?php else: ?>
                                            <a href="?action=edit_thumb&amp;type=small&amp;id=<?php echo $this->_tpl_vars['article']['id']; ?>
">dodaj miniaturkę dla listy</a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                </table>-->
            </div>
        </div>
        <?php endif; ?>




        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                <h5>Pliki do pobrania</h5>
            </div>
            <div class="widget-content nopadding">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="40px">Lp.</th>
                            <th>Plik</th>
                            <th width="110px">Opcje</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $_from = $this->_tpl_vars['pliki']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['pp'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['pp']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['plik']):
        $this->_foreach['pp']['iteration']++;
?>
                        <tr class="shadow_light">
                            <td><?php echo $this->_foreach['pp']['iteration']; ?>
</td>
                            <td><a href="<?php echo $this->_tpl_vars['plik']['url']; ?>
" target="_blank"><?php echo $this->_tpl_vars['plik']['filename']; ?>
</a></td>
                            <td class="opcje">
                                <a class="btn btn"  href="?action=delete_plik&amp;id=<?php echo $this->_tpl_vars['plik']['id']; ?>
&amp;parent_id=<?php echo $this->_tpl_vars['article']['id']; ?>
" title="Kasuj">
                                    <i class="icon-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; else: ?>
                        <tr><td colspan="3">Brak plików w bazie. Aby dodać plik użyj formularza poniżej.</td></tr>
                        <?php endif; unset($_from); ?>
                        <tr><td colspan="3">
                                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="control-group">
                                        <label class="control-label">Dodaj nowy plik :</label>
                                        <div class="controls">
                                            <input class="file" type="file" name="plik" size="40" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Nazwaa :</label>
                                        <div class="controls">
                                            <?php unset($this->_sections['j1']);
$this->_sections['j1']['name'] = 'j1';
$this->_sections['j1']['loop'] = is_array($_loop=$this->_tpl_vars['JEZYK']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['j1']['show'] = true;
$this->_sections['j1']['max'] = $this->_sections['j1']['loop'];
$this->_sections['j1']['step'] = 1;
$this->_sections['j1']['start'] = $this->_sections['j1']['step'] > 0 ? 0 : $this->_sections['j1']['loop']-1;
if ($this->_sections['j1']['show']) {
    $this->_sections['j1']['total'] = $this->_sections['j1']['loop'];
    if ($this->_sections['j1']['total'] == 0)
        $this->_sections['j1']['show'] = false;
} else
    $this->_sections['j1']['total'] = 0;
if ($this->_sections['j1']['show']):

            for ($this->_sections['j1']['index'] = $this->_sections['j1']['start'], $this->_sections['j1']['iteration'] = 1;
                 $this->_sections['j1']['iteration'] <= $this->_sections['j1']['total'];
                 $this->_sections['j1']['index'] += $this->_sections['j1']['step'], $this->_sections['j1']['iteration']++):
$this->_sections['j1']['rownum'] = $this->_sections['j1']['iteration'];
$this->_sections['j1']['index_prev'] = $this->_sections['j1']['index'] - $this->_sections['j1']['step'];
$this->_sections['j1']['index_next'] = $this->_sections['j1']['index'] + $this->_sections['j1']['step'];
$this->_sections['j1']['first']      = ($this->_sections['j1']['iteration'] == 1);
$this->_sections['j1']['last']       = ($this->_sections['j1']['iteration'] == $this->_sections['j1']['total']);
?>
                                            <input class="text title2" type="text" name="name[<?php echo $this->_tpl_vars['lang_id']; ?>
]" placeholder="<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j1']['index']]['name']; ?>
" />
                                            <?php endfor; endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <input type="hidden" name="parent_type" value="<?php echo $this->_tpl_vars['files_type']; ?>
" />
                                        <input type="hidden" name="parent_id" value="<?php echo $this->_tpl_vars['article']['id']; ?>
" />
                                        <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['article']['id']; ?>
" />
                                        <input class="btn btn-success" type="submit" name="action" value="Dodaj plik" />
                                    </div>
                                </form></td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>