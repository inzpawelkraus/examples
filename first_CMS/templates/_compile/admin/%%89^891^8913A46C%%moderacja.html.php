<?php /* Smarty version 2.6.13, created on 2017-05-15 14:00:38
         compiled from komentarze/moderacja.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'komentarze/moderacja.html', 32, false),array('modifier', 'nl2br', 'komentarze/moderacja.html', 36, false),)), $this); ?>
<div id="content-header">
    <div id="breadcrumb"> <a href="/admin" title="Panel" class="tip-bottom"><i class="icon-home"></i> Panel</a> <a>Komentarze</a><a class="current">Moderacja</a> </div>
    <h1><?php echo $this->_tpl_vars['pageTitle']; ?>
</h1>
</div>
<div class="container-fluid">
    <div class="alert alert-info">
        Aby edytować i kasować komentarze należy odnaleźć żądany komentarz i użyć odpowiedniej opcji.<br />
        Wybierz odpowiednią grupe komentarzy.
    </div>

    <div class="center">
        <a style="margin: 10px; dispaly: inline; font-size: 10pt; font-weight: bold;" href="?group=pages" title="pokaż komentarze">Podstrony</a>
        <a style="margin: 10px; dispaly: inline; font-size: 10pt; font-weight: bold;" href="?group=aktualnosci" title="pokaż komentarze">Aktualności</a>
        <a style="margin: 10px; dispaly: inline; font-size: 10pt; font-weight: bold;" href="?group=galeria" title="pokaż komentarze">Galeria</a>
    </div>
    <br class="clear" />


    <table class="table table-bordered table-striped">
        <thead>
        <th width="1%" align="center">Lp.</th>
        <th width="1%" align="center">Id.</th>
        <th width="150">Tytuł</th>
        <th>Treść</th>
        <th>Autor</th>
        <th>Grupa</th>
        <th width="110">Data</th>
        <th width="40">Opcje</th>
        </thead>
        <tbody>
            <?php unset($this->_sections['c']);
$this->_sections['c']['name'] = 'c';
$this->_sections['c']['loop'] = is_array($_loop=$this->_tpl_vars['comments']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['c']['show'] = true;
$this->_sections['c']['max'] = $this->_sections['c']['loop'];
$this->_sections['c']['step'] = 1;
$this->_sections['c']['start'] = $this->_sections['c']['step'] > 0 ? 0 : $this->_sections['c']['loop']-1;
if ($this->_sections['c']['show']) {
    $this->_sections['c']['total'] = $this->_sections['c']['loop'];
    if ($this->_sections['c']['total'] == 0)
        $this->_sections['c']['show'] = false;
} else
    $this->_sections['c']['total'] = 0;
if ($this->_sections['c']['show']):

            for ($this->_sections['c']['index'] = $this->_sections['c']['start'], $this->_sections['c']['iteration'] = 1;
                 $this->_sections['c']['iteration'] <= $this->_sections['c']['total'];
                 $this->_sections['c']['index'] += $this->_sections['c']['step'], $this->_sections['c']['iteration']++):
$this->_sections['c']['rownum'] = $this->_sections['c']['iteration'];
$this->_sections['c']['index_prev'] = $this->_sections['c']['index'] - $this->_sections['c']['step'];
$this->_sections['c']['index_next'] = $this->_sections['c']['index'] + $this->_sections['c']['step'];
$this->_sections['c']['first']      = ($this->_sections['c']['iteration'] == 1);
$this->_sections['c']['last']       = ($this->_sections['c']['iteration'] == $this->_sections['c']['total']);
?>
            <tr class="<?php echo smarty_function_cycle(array('values' => "shadow_dark,shadow_light"), $this);?>
">
                <td align="center"><?php echo $this->_sections['c']['iteration']+$this->_tpl_vars['interval']; ?>
.</td>
                 <td><?php echo $this->_tpl_vars['comments'][$this->_sections['c']['index']]['id']; ?>
</td>
                 <td><strong><?php echo $this->_tpl_vars['comments'][$this->_sections['c']['index']]['title']; ?>
</strong></td>
                 <td><?php echo ((is_array($_tmp=$this->_tpl_vars['comments'][$this->_sections['c']['index']]['content'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</td>	
                 <td class="center"><?php echo $this->_tpl_vars['comments'][$this->_sections['c']['index']]['author']; ?>
</td>
                 <td class="center"><span class="not-important"><?php if ($this->_tpl_vars['group'] == 'pages'): ?>Podstrony<?php endif;  if ($this->_tpl_vars['group'] == 'aktualnosci'): ?>Aktualności<?php endif;  if ($this->_tpl_vars['group'] == 'galeria'): ?>Galeria<?php endif; ?></span></td>
                 <td class="center"><span class="not-important"><?php echo $this->_tpl_vars['comments'][$this->_sections['c']['index']]['date_add']; ?>
</span></td>
                 <td width="100">
                     <a class="btn btn"  onclick="toggle('id<?php echo $this->_tpl_vars['comments'][$this->_sections['c']['index']]['id']; ?>
'); return false;" title="Edytuj">
                         <i class="icon-edit"></i>
                     </a>
                     <a class="btn btn"  href="?c_page=<?php echo $this->_tpl_vars['c_page']; ?>
&amp;action=delete&amp;id=<?php echo $this->_tpl_vars['comments'][$this->_sections['c']['index']]['id']; ?>
&amp;group=<?php echo $_GET['group']; ?>
" title="Kasuj">
                         <i class="icon-trash"></i>
                     </a>
                 </td>
             </tr>
             <tr id="id<?php echo $this->_tpl_vars['comments'][$this->_sections['c']['index']]['id']; ?>
" style="display: none;">
                 <td colspan="8">
                     <div style=" float: left; width: 100%;">
                         <div id="div_<?php echo $this->_tpl_vars['comments'][$this->_sections['c']['index']]['id']; ?>
">
                             <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
" class="form-horizontal">
                                 <div class="control-group">
                                     <label class="control-label">Tytuł :</label>
                                     <div class="controls">
                                         <input class="text" type="text" name="title" value="<?php echo $this->_tpl_vars['comments'][$this->_sections['c']['index']]['title']; ?>
" size="50" />
                                     </div>
                                 </div>
                                 <div class="control-group">
                                     <label class="control-label">Treść :</label>
                                     <div class="controls">
                                         <textarea cols="50" rows="10" name="content"><?php echo $this->_tpl_vars['comments'][$this->_sections['c']['index']]['content']; ?>
</textarea>
                                     </div>
                                 </div>
                                 <div class="control-group">
                                     <label class="control-label">Autor :</label>
                                     <div class="controls">
                                         <input type="text" class="text" name="author" value="<?php echo $this->_tpl_vars['comments'][$this->_sections['c']['index']]['author']; ?>
" size="30" />
                                     </div>
                                 </div>
                                 <div class="form-actions">
                                     <input class="btn btn-success" type="submit" value="Zapisz zmiany" />
                                     <input type="hidden" name="action" value="edit" />
                                     <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['comments'][$this->_sections['c']['index']]['id']; ?>
" />
                                     <input type="hidden" name="group" value="<?php echo $_GET['group']; ?>
" />
                                 </div>
                             </form>				
                         </div>
                     </div>
                 </td>
             </tr>
             <?php endfor; else: ?>
             <tr><td colspan="8" style="text-align: center;">Brak komentarzy w bazie.</td></tr>
             <?php endif; ?>
            </tbody>
        </table>
        <?php if ($this->_tpl_vars['pages'] > 1): ?>
        <p align="center">
            <?php if ($this->_tpl_vars['page'] > 1): ?><a href="?page=<?php echo $this->_tpl_vars['page']-1; ?>
&amp;group=<?php echo $_GET['group']; ?>
">&laquo; Poprzednia</a><?php else: ?>&laquo; Poprzednia<?php endif; ?>
            | Strona <?php echo $this->_tpl_vars['page']; ?>
 z <?php echo $this->_tpl_vars['pages']; ?>
 |
            <?php if ($this->_tpl_vars['page'] < $this->_tpl_vars['pages']): ?><a href="?page=<?php echo $this->_tpl_vars['page']+1; ?>
&amp;group=<?php echo $_GET['group']; ?>
">Następna &raquo;</a><?php else: ?>Następna &raquo;<?php endif; ?>
        </p>
        <?php endif; ?>
    </div>
</div>
<?php echo '
<script>
    function toggle(e)
    {
	$("#" + e).fadeToggle();
    }
</script>
'; ?>