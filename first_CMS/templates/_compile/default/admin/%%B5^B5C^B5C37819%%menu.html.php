<?php /* Smarty version 2.6.13, created on 2017-06-06 15:22:16
         compiled from misc/menu.html */ ?>
<div id="content-header">
    <div id="breadcrumb"> <a href="/admin" title="Panel" class="tip-bottom"><i class="icon-home"></i> Panel</a> <a class="current">Menu</a> </div>
    <h1><?php echo $this->_tpl_vars['pageTitle']; ?>
</h1>
</div>
<div class="container-fluid">
    <div class="row-fluid">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
">
            <div class="control-group">
                <label class="control-label">Wybierz menu:</label>
                <div class="controls">
                    <?php unset($this->_sections['mm']);
$this->_sections['mm']['name'] = 'mm';
$this->_sections['mm']['loop'] = is_array($_loop=$this->_tpl_vars['mm']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['mm']['show'] = true;
$this->_sections['mm']['max'] = $this->_sections['mm']['loop'];
$this->_sections['mm']['step'] = 1;
$this->_sections['mm']['start'] = $this->_sections['mm']['step'] > 0 ? 0 : $this->_sections['mm']['loop']-1;
if ($this->_sections['mm']['show']) {
    $this->_sections['mm']['total'] = $this->_sections['mm']['loop'];
    if ($this->_sections['mm']['total'] == 0)
        $this->_sections['mm']['show'] = false;
} else
    $this->_sections['mm']['total'] = 0;
if ($this->_sections['mm']['show']):

            for ($this->_sections['mm']['index'] = $this->_sections['mm']['start'], $this->_sections['mm']['iteration'] = 1;
                 $this->_sections['mm']['iteration'] <= $this->_sections['mm']['total'];
                 $this->_sections['mm']['index'] += $this->_sections['mm']['step'], $this->_sections['mm']['iteration']++):
$this->_sections['mm']['rownum'] = $this->_sections['mm']['iteration'];
$this->_sections['mm']['index_prev'] = $this->_sections['mm']['index'] - $this->_sections['mm']['step'];
$this->_sections['mm']['index_next'] = $this->_sections['mm']['index'] + $this->_sections['mm']['step'];
$this->_sections['mm']['first']      = ($this->_sections['mm']['iteration'] == 1);
$this->_sections['mm']['last']       = ($this->_sections['mm']['iteration'] == $this->_sections['mm']['total']);
?>
                    <?php if ($this->_sections['mm']['first']): ?>
                    <select class="change-menu" name="group" onchange="this.form.submit()">
                        <?php endif; ?>
                        <option value="<?php echo $this->_tpl_vars['mm'][$this->_sections['mm']['index']]['typ']; ?>
"<?php if ($this->_tpl_vars['group'] == $this->_tpl_vars['mm'][$this->_sections['mm']['index']]['typ']): ?> selected="true"<?php endif; ?>><?php echo $this->_tpl_vars['mm'][$this->_sections['mm']['index']]['nazwa']; ?>
</option>
                        <?php if ($this->_sections['mm']['last']): ?>
                    </select>
                    <?php endif; ?>
                    <?php endfor; endif; ?>
                    <input type="hidden" name="action" value="change_menu" />
                </div>
            </div>
        </form>
        <div class="alert alert-info">
            Dodaj nowy element z formularza.</br>
            <?php if(empty($_GET['pid'])){echo 'Aby dodać podmenu wejdż w menu klikająć <i class="icon-indent-right"></i> i dodaj pozycje.';} ?>
            <?php if(!empty($_GET['pid'])){echo 'Aby wyjść z folderu kliknij tutja <a href="javascript:void(0);" onClick="history.go(-1); return false;"><i class="icon-fast-backward"> </i>&nbsp;Wyjdź wyżej</a>';} ?>
        </div>
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-list-ul"></i></span>
                <h5>Elementy <?php if ($this->_tpl_vars['group'] == 'top'): ?>MENU górne<?php endif;  if ($this->_tpl_vars['group'] == 'left'): ?>MENU główne<?php endif;  if ($this->_tpl_vars['group'] == 'bottom'): ?>MENU dolne<?php endif; ?>-go</h5>
            </div>
            <div class="widget-content nopadding">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th align="left">Nazwa</th>
                            <th width="170" align="right">Akcje</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php unset($this->_sections['m1']);
$this->_sections['m1']['name'] = 'm1';
$this->_sections['m1']['loop'] = is_array($_loop=$this->_tpl_vars['menu']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['m1']['show'] = true;
$this->_sections['m1']['max'] = $this->_sections['m1']['loop'];
$this->_sections['m1']['step'] = 1;
$this->_sections['m1']['start'] = $this->_sections['m1']['step'] > 0 ? 0 : $this->_sections['m1']['loop']-1;
if ($this->_sections['m1']['show']) {
    $this->_sections['m1']['total'] = $this->_sections['m1']['loop'];
    if ($this->_sections['m1']['total'] == 0)
        $this->_sections['m1']['show'] = false;
} else
    $this->_sections['m1']['total'] = 0;
if ($this->_sections['m1']['show']):

            for ($this->_sections['m1']['index'] = $this->_sections['m1']['start'], $this->_sections['m1']['iteration'] = 1;
                 $this->_sections['m1']['iteration'] <= $this->_sections['m1']['total'];
                 $this->_sections['m1']['index'] += $this->_sections['m1']['step'], $this->_sections['m1']['iteration']++):
$this->_sections['m1']['rownum'] = $this->_sections['m1']['iteration'];
$this->_sections['m1']['index_prev'] = $this->_sections['m1']['index'] - $this->_sections['m1']['step'];
$this->_sections['m1']['index_next'] = $this->_sections['m1']['index'] + $this->_sections['m1']['step'];
$this->_sections['m1']['first']      = ($this->_sections['m1']['iteration'] == 1);
$this->_sections['m1']['last']       = ($this->_sections['m1']['iteration'] == $this->_sections['m1']['total']);
?>
                        <tr>
                            <td align="left">
                                <?php if ($this->_tpl_vars['menu'][$this->_sections['m1']['index']]['parent_id'] == 0): ?>
                                <a class="btn btn" href="./menu.php?pid=<?php echo $this->_tpl_vars['menu'][$this->_sections['m1']['index']]['id']; ?>
&group=<?php echo $this->_tpl_vars['group']; ?>
">
                                    <i class="icon-indent-right"></i>
                                </a>
                                <?php else: ?>
                                <img class="folder" src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
/templates/admin/img/folder.png" alt="Element" />
                                <?php endif; ?>
                                <?php echo $this->_tpl_vars['menu'][$this->_sections['m1']['index']]['name']; ?>

                                <?php if ($this->_tpl_vars['opis'][0]['id'] == $this->_tpl_vars['menu'][$this->_sections['m1']['index']]['id']): ?>
                                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
" class="form-horizontal">	
                                    <input type="hidden" name="action" value="edit" />
                                    <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['menu'][$this->_sections['m1']['index']]['id']; ?>
" />
                                    <input type="hidden" name="pid" value="<?php echo $this->_tpl_vars['pid']; ?>
" />
                                    <input type="hidden" name="group" value="<?php echo $this->_tpl_vars['group']; ?>
" />
                                    <input type="hidden" id="url" name="url" value="<?php echo $this->_tpl_vars['menu'][$this->_sections['m1']['index']]['select']; ?>
" />
                                    <div class="control-group">
                                        <label class="control-label">Nazwa :</label>
                                        <div class="controls">
                                            <?php unset($this->_sections['j1']);
$this->_sections['j1']['name'] = 'j1';
$this->_sections['j1']['loop'] = is_array($_loop=$this->_tpl_vars['opis']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                                            <input type="text" class="span11" name="name[<?php echo $this->_tpl_vars['opis'][$this->_sections['j1']['index']]['language_id']; ?>
]" value="<?php echo $this->_tpl_vars['opis'][$this->_sections['j1']['index']]['name']; ?>
"  placeholder="<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j1']['index']]['name']; ?>
"/>
                                            <?php endfor; endif; ?>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Nawiguje do :</label>
                                        <div class="controls">
                                            <div class="accordion" id="collapse-group">
                                                <div class="accordion-group widget-box">
                                                    <div class="accordion-heading">
                                                        <div class="widget-title"> 
                                                            <a data-parent="#collapse-group" href="#collapseGOne" data-toggle="collapse" class='adMenuType'  data-type="url"> 
                                                                <span class="icon"><i class="icon-magnet"></i></span>
                                                                <h5>Link</h5>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="collapse accordion-body <?php if ($this->_tpl_vars['menu'][$this->_sections['m1']['index']]['type'] == 'url'): ?>in<?php endif; ?>" id="collapseGOne">
                                                        <div class="widget-content">
                                                            Podaj zewnętrzny URL, rozpocznij od http://<br />
                                                            <input type="checkbox" id="target_<?php echo $this->_tpl_vars['menu'][$this->_sections['m1']['index']]['id']; ?>
" name="target" value=1 <?php if ($this->_tpl_vars['menu'][$this->_sections['m1']['index']]['target'] == 1): ?>checked="true"<?php endif; ?> /><label for="target_<?php echo $this->_tpl_vars['menu'][$this->_sections['m1']['index']]['id']; ?>
">wyświetlaj stronę w nowym oknie <em>_blank</em></label><br />

                                                            <?php unset($this->_sections['j2']);
$this->_sections['j2']['name'] = 'j2';
$this->_sections['j2']['loop'] = is_array($_loop=$this->_tpl_vars['opis']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                                                            <img src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/img/<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j2']['index']]['directory']; ?>
/<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j2']['index']]['code']; ?>
.gif" alt="<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j2']['index']]['name']; ?>
" title="<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j2']['index']]['name']; ?>
" />
                                                            <input class="text" type="text" name="url_addr[<?php echo $this->_tpl_vars['opis'][$this->_sections['j2']['index']]['language_id']; ?>
]" size="40" value="<?php if ($this->_tpl_vars['menu'][$this->_sections['m1']['index']]['type'] == 'url'):  echo $this->_tpl_vars['opis'][$this->_sections['j2']['index']]['url'];  else: ?>http://<?php endif; ?>" /><br />
                                                            <?php endfor; endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-group widget-box">
                                                    <div class="accordion-heading">
                                                        <div class="widget-title">
                                                            <a data-parent="#collapse-group" href="#collapseGTwo" data-toggle="collapse" class='adMenuType'  data-type="page"> 
                                                                <span class="icon"><i class="icon-magnet"></i></span>
                                                                <h5>Stronę</h5>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="collapse accordion-body <?php if ($this->_tpl_vars['menu'][$this->_sections['m1']['index']]['type'] == 'page'): ?>in<?php endif; ?>" id="collapseGTwo">
                                                        <div class="widget-content">
                                                            Wybierz stronę na którą ma odsyłać element<br />
                                                            <?php unset($this->_sections['j5']);
$this->_sections['j5']['name'] = 'j5';
$this->_sections['j5']['loop'] = is_array($_loop=$this->_tpl_vars['JEZYK']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['j5']['show'] = true;
$this->_sections['j5']['max'] = $this->_sections['j5']['loop'];
$this->_sections['j5']['step'] = 1;
$this->_sections['j5']['start'] = $this->_sections['j5']['step'] > 0 ? 0 : $this->_sections['j5']['loop']-1;
if ($this->_sections['j5']['show']) {
    $this->_sections['j5']['total'] = $this->_sections['j5']['loop'];
    if ($this->_sections['j5']['total'] == 0)
        $this->_sections['j5']['show'] = false;
} else
    $this->_sections['j5']['total'] = 0;
if ($this->_sections['j5']['show']):

            for ($this->_sections['j5']['index'] = $this->_sections['j5']['start'], $this->_sections['j5']['iteration'] = 1;
                 $this->_sections['j5']['iteration'] <= $this->_sections['j5']['total'];
                 $this->_sections['j5']['index'] += $this->_sections['j5']['step'], $this->_sections['j5']['iteration']++):
$this->_sections['j5']['rownum'] = $this->_sections['j5']['iteration'];
$this->_sections['j5']['index_prev'] = $this->_sections['j5']['index'] - $this->_sections['j5']['step'];
$this->_sections['j5']['index_next'] = $this->_sections['j5']['index'] + $this->_sections['j5']['step'];
$this->_sections['j5']['first']      = ($this->_sections['j5']['iteration'] == 1);
$this->_sections['j5']['last']       = ($this->_sections['j5']['iteration'] == $this->_sections['j5']['total']);
?>
                                                            <select name="url_page_<?php echo $this->_sections['j5']['iteration']; ?>
">
                                                                <?php echo $this->_tpl_vars['options_pages'][$this->_sections['j5']['index']]; ?>

                                                            </select>
                                                            <?php endfor; endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-group widget-box">
                                                    <div class="accordion-heading">
                                                        <div class="widget-title">
                                                            <a data-parent="#collapse-group" href="#collapseGThree" data-toggle="collapse" class='adMenuType'  data-type="module"> 
                                                                <span class="icon"><i class="icon-magnet"></i></span>
                                                                <h5>Moduł</h5>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="collapse accordion-body <?php if ($this->_tpl_vars['menu'][$this->_sections['m1']['index']]['type'] == 'module'): ?>in<?php endif; ?>" id="collapseGThree">
                                                        <div class="widget-content">
                                                            Wybierz moduł na serwerze do którego ma odsyłać element<br />
                                                            <select name="url_module">
                                                                <?php echo $this->_tpl_vars['options_modules']; ?>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input id="type" type="hidden" name="type" value=""/>
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-success">Aktualizuj</button>
                                    </div>
                                </form>
                                <?php endif; ?>
                            </td>
                            <td width="170" align="right">
                                <?php if (! $this->_sections['m1']['first']): ?>
                                <a class="btn btn" href="./menu.php?pid=<?php echo $this->_tpl_vars['pid']; ?>
&id=<?php echo $this->_tpl_vars['menu'][$this->_sections['m1']['index']]['id']; ?>
&group=<?php echo $this->_tpl_vars['group']; ?>
&action=up" title="Przenieś w górę">
                                    <i class="icon-chevron-up"></i>
                                </a>
                                <?php endif; ?>
                                <?php if (! $this->_sections['m1']['last']): ?>
                                <a class="btn btn" href="./menu.php?pid=<?php echo $this->_tpl_vars['pid']; ?>
&id=<?php echo $this->_tpl_vars['menu'][$this->_sections['m1']['index']]['id']; ?>
&group=<?php echo $this->_tpl_vars['group']; ?>
&action=down" title="Przenieś w dół">
                                    <i class="icon-chevron-down"></i>
                                </a>
                                <?php endif; ?>
                                <a class="btn btn"  href="./menu.php?pid=<?php echo $this->_tpl_vars['pid']; ?>
&amp;id=<?php echo $this->_tpl_vars['menu'][$this->_sections['m1']['index']]['id']; ?>
&amp;group=<?php echo $this->_tpl_vars['group']; ?>
&amp;action=show_edit" title="Edytuj">
                                    <i class="icon-edit"></i>
                                </a>		
                                <a class="btn btn"  href="./menu.php?pid=<?php echo $this->_tpl_vars['pid']; ?>
&amp;id=<?php echo $this->_tpl_vars['menu'][$this->_sections['m1']['index']]['id']; ?>
&amp;group=<?php echo $this->_tpl_vars['group']; ?>
&action=delete" title="Kasuj" onclick="return confirmDelete()">
                                    <i class="icon-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endfor; else: ?>
                        <tr>
                            <td colspan="2" style="text-align: center;">
                                Menu jest puste. Aby dodać tutaj nowy element wypełnij formularz poniżej.</br>
                            </td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-list-ul"></i></span>
                <h5>Nowa pozycja</h5>
            </div>
            <div class="widget-content nopadding">  
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
" class="form-horizontal">	
                    <div class="control-group">
                        <label class="control-label">Nazwa :</label>
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
                            <input type="text" class="span5" name="name[<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j4']['index']]['id']; ?>
]" placeholder="<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j4']['index']]['name']; ?>
"/>
                            <?php endfor; endif; ?>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Nawiguje do :</label>
                        <div class="controls">
                            <div class="accordion" id="collapse-group">
                                <div class="accordion-group widget-box">
                                    <div class="accordion-heading">
                                        <div class="widget-title"> 
                                            <a data-parent="#collapse-group" href="#collapseNGOne" data-toggle="collapse" class='adMenuType'  data-type="url"> 
                                                <span class="icon"><i class="icon-magnet"></i></span>
                                                <h5>Link</h5>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="collapse accordion-body" id="collapseNGOne">
                                        <div class="widget-content">
                                            Podaj zewnętrzny URL, rozpocznij od http://<br />
                                            <input type="checkbox" id="target_<?php echo $this->_tpl_vars['menu'][$this->_sections['m1']['index']]['id']; ?>
" name="target" value=1 <?php if ($this->_tpl_vars['menu'][$this->_sections['m1']['index']]['target'] == 1): ?>checked="true"<?php endif; ?> /><label for="target_<?php echo $this->_tpl_vars['menu'][$this->_sections['m1']['index']]['id']; ?>
">wyświetlaj stronę w nowym oknie <em>_blank</em></label><br />

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
                                            <input class="text" type="text" name="url_addr[<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j3']['index']]['id']; ?>
]" size="40" value="http://<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j3']['index']]['name']; ?>
 adres" />
                                            <?php endfor; endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-group widget-box">
                                    <div class="accordion-heading">
                                        <div class="widget-title">
                                            <a data-parent="#collapse-group" href="#collapseNGTwo" data-toggle="collapse" class='adMenuType'  data-type="page"> 
                                                <span class="icon"><i class="icon-magnet"></i></span>
                                                <h5>Stronę</h5>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="collapse accordion-body" id="collapseNGTwo">
                                        <div class="widget-content">
                                            Wybierz stronę na którą ma odsyłać element<br />
                                            <?php unset($this->_sections['j5']);
$this->_sections['j5']['name'] = 'j5';
$this->_sections['j5']['loop'] = is_array($_loop=$this->_tpl_vars['JEZYK']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['j5']['show'] = true;
$this->_sections['j5']['max'] = $this->_sections['j5']['loop'];
$this->_sections['j5']['step'] = 1;
$this->_sections['j5']['start'] = $this->_sections['j5']['step'] > 0 ? 0 : $this->_sections['j5']['loop']-1;
if ($this->_sections['j5']['show']) {
    $this->_sections['j5']['total'] = $this->_sections['j5']['loop'];
    if ($this->_sections['j5']['total'] == 0)
        $this->_sections['j5']['show'] = false;
} else
    $this->_sections['j5']['total'] = 0;
if ($this->_sections['j5']['show']):

            for ($this->_sections['j5']['index'] = $this->_sections['j5']['start'], $this->_sections['j5']['iteration'] = 1;
                 $this->_sections['j5']['iteration'] <= $this->_sections['j5']['total'];
                 $this->_sections['j5']['index'] += $this->_sections['j5']['step'], $this->_sections['j5']['iteration']++):
$this->_sections['j5']['rownum'] = $this->_sections['j5']['iteration'];
$this->_sections['j5']['index_prev'] = $this->_sections['j5']['index'] - $this->_sections['j5']['step'];
$this->_sections['j5']['index_next'] = $this->_sections['j5']['index'] + $this->_sections['j5']['step'];
$this->_sections['j5']['first']      = ($this->_sections['j5']['iteration'] == 1);
$this->_sections['j5']['last']       = ($this->_sections['j5']['iteration'] == $this->_sections['j5']['total']);
?>
                                            <select name="url_page_<?php echo $this->_sections['j5']['iteration']; ?>
">
                                                <?php echo $this->_tpl_vars['options_pages'][$this->_sections['j5']['index']]; ?>

                                            </select>
                                            <?php endfor; endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-group widget-box">
                                    <div class="accordion-heading">
                                        <div class="widget-title">
                                            <a data-parent="#collapse-group" href="#collapseNGThree" data-toggle="collapse" class='adMenuType'  data-type="module"> 
                                                <span class="icon"><i class="icon-magnet"></i></span>
                                                <h5>Moduł</h5>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="collapse accordion-body" id="collapseNGThree">
                                        <div class="widget-content">
                                            Wybierz moduł na serwerze do którego ma odsyłać element<br />
                                            <select name="url_module">
                                                <?php echo $this->_tpl_vars['options_modules']; ?>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-actions">
                            <input id="type" type="hidden" name="type" value=""/>
                            <input type="hidden" name="group" value="<?php echo $this->_tpl_vars['group']; ?>
" />
                            <input type="hidden" name="pid" value="<?php echo $this->_tpl_vars['pid']; ?>
" />
                            <input type="hidden" name="action" value="add" />
                            <input class="btn btn-success" type="submit" value="Dodaj" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>