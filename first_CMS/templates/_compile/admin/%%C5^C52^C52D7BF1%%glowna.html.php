<?php /* Smarty version 2.6.13, created on 2017-05-05 22:05:10
         compiled from strony/glowna.html */ ?>
<div id="content-header">
    <div id="breadcrumb"> <a href="/admin" title="Panel" class="tip-bottom"><i class="icon-home"></i> Panel</a> <a>Strony</a><a class="current">Główna</a> </div>
    <h1><?php echo $this->_tpl_vars['pageTitle']; ?>
</h1>
</div>
<div class="container-fluid">
    <div class="row-fluid">
        <form class="formularz" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
" class="form-horizontal">
            <?php unset($this->_sections['jj']);
$this->_sections['jj']['name'] = 'jj';
$this->_sections['jj']['loop'] = is_array($_loop=$this->_tpl_vars['JEZYK']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['jj']['show'] = true;
$this->_sections['jj']['max'] = $this->_sections['jj']['loop'];
$this->_sections['jj']['step'] = 1;
$this->_sections['jj']['start'] = $this->_sections['jj']['step'] > 0 ? 0 : $this->_sections['jj']['loop']-1;
if ($this->_sections['jj']['show']) {
    $this->_sections['jj']['total'] = $this->_sections['jj']['loop'];
    if ($this->_sections['jj']['total'] == 0)
        $this->_sections['jj']['show'] = false;
} else
    $this->_sections['jj']['total'] = 0;
if ($this->_sections['jj']['show']):

            for ($this->_sections['jj']['index'] = $this->_sections['jj']['start'], $this->_sections['jj']['iteration'] = 1;
                 $this->_sections['jj']['iteration'] <= $this->_sections['jj']['total'];
                 $this->_sections['jj']['index'] += $this->_sections['jj']['step'], $this->_sections['jj']['iteration']++):
$this->_sections['jj']['rownum'] = $this->_sections['jj']['iteration'];
$this->_sections['jj']['index_prev'] = $this->_sections['jj']['index'] - $this->_sections['jj']['step'];
$this->_sections['jj']['index_next'] = $this->_sections['jj']['index'] + $this->_sections['jj']['step'];
$this->_sections['jj']['first']      = ($this->_sections['jj']['iteration'] == 1);
$this->_sections['jj']['last']       = ($this->_sections['jj']['iteration'] == $this->_sections['jj']['total']);
?>
            <div class="control-group">
                <label class="control-label"><?php echo $this->_tpl_vars['JEZYK'][$this->_sections['jj']['index']]['name']; ?>
</label>
                <div class="controls">
                    <textarea style="width:100%; max-width: 100%; min-height: 240px;" id="edytor_<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['jj']['index']]['id']; ?>
" name="main_page[<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['jj']['index']]['id']; ?>
]"><?php echo $this->_tpl_vars['main_page'][$this->_sections['jj']['index']]; ?>
</textarea>
                </div>
            </div>
            <?php endfor; endif; ?>	
            <div class="form-actions">
                <input type="hidden" name="action" value="save" />
                <button type="submit" class="btn btn-success">Zapisz</button>
            </div>
        </form>
    </div>
</div>