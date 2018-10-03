<?php /* Smarty version 2.6.13, created on 2017-05-16 10:58:16
         compiled from strony/edytuj.html */ ?>
<div id="content-header">
    <div id="breadcrumb"> <a href="/admin" title="Panel" class="tip-bottom"><i class="icon-home"></i> Panel</a> <a>Strony</a><a class="current">Edycja</a> </div>
    <h1><?php echo $this->_tpl_vars['pageTitle']; ?>
</h1>
</div>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                <h5>Formularz edycji strony</h5>
            </div>
            <div class="widget-content nopadding">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
" enctype="multipart/form-data" class="form-horizontal">
                    <div class="control-group">
                        <label class="control-label">Tytuł strony :</label>
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
                    <div class="control-group">
                        <div class="controls">
                            <label>
                                <input id="show_title" type="checkbox" name="show_title" value="1" <?php if ($this->_tpl_vars['article']['show_title']): ?>checked="true" <?php endif; ?> />
                                       Pokazuj tytuł</label>
                            <label>
                                <input id="active" type="checkbox" name="active" value="1" <?php if ($this->_tpl_vars['article']['active']): ?>checked="true" <?php endif; ?> />
                                       Pokazuj podstronę w serwisie</label>
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
                                <option value="">- brak -</option>
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
                </form>
            </div>
        </div>
    </div>
</div>