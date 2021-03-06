<?php /* Smarty version 2.6.13, created on 2017-05-16 08:40:02
         compiled from newsletter/pokaz-template.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'nl2br', 'newsletter/pokaz-template.html', 19, false),array('modifier', 'truncate', 'newsletter/pokaz-template.html', 19, false),)), $this); ?>
<div id="content-header">
    <div id="breadcrumb"> <a href="/admin" title="Panel" class="tip-bottom"><i class="icon-home"></i> Panel</a> <a>Newsletter</a><a class="current">Szablony</a> </div>
    <h1><?php echo $this->_tpl_vars['pageTitle']; ?>
</h1>
</div>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="alert alert-info">
            Kliknij na szablon do edycji lub dodaj nowy z fomrularza.
        </div>
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                <h5>Zdefiniowane szablony</h5>
            </div>
            <div class="widget-content">
                <div class="row-fluid">
                    <div class="span12 btn-icon-pg">
                        <ul>
                            <?php unset($this->_sections['m']);
$this->_sections['m']['name'] = 'm';
$this->_sections['m']['loop'] = is_array($_loop=$this->_tpl_vars['mail_tpl']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['m']['show'] = true;
$this->_sections['m']['max'] = $this->_sections['m']['loop'];
$this->_sections['m']['step'] = 1;
$this->_sections['m']['start'] = $this->_sections['m']['step'] > 0 ? 0 : $this->_sections['m']['loop']-1;
if ($this->_sections['m']['show']) {
    $this->_sections['m']['total'] = $this->_sections['m']['loop'];
    if ($this->_sections['m']['total'] == 0)
        $this->_sections['m']['show'] = false;
} else
    $this->_sections['m']['total'] = 0;
if ($this->_sections['m']['show']):

            for ($this->_sections['m']['index'] = $this->_sections['m']['start'], $this->_sections['m']['iteration'] = 1;
                 $this->_sections['m']['iteration'] <= $this->_sections['m']['total'];
                 $this->_sections['m']['index'] += $this->_sections['m']['step'], $this->_sections['m']['iteration']++):
$this->_sections['m']['rownum'] = $this->_sections['m']['iteration'];
$this->_sections['m']['index_prev'] = $this->_sections['m']['index'] - $this->_sections['m']['step'];
$this->_sections['m']['index_next'] = $this->_sections['m']['index'] + $this->_sections['m']['step'];
$this->_sections['m']['first']      = ($this->_sections['m']['iteration'] == 1);
$this->_sections['m']['last']       = ($this->_sections['m']['iteration'] == $this->_sections['m']['total']);
?>
                            <a href="?action=edit&amp;id=<?php echo $this->_tpl_vars['mail_tpl'][$this->_sections['m']['index']]['id']; ?>
"><li><i class="icon-eye-open"></i>  <?php echo $this->_tpl_vars['mail_tpl'][$this->_sections['m']['index']]['name']; ?>
 - <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['mail_tpl'][$this->_sections['m']['index']]['description'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 60) : smarty_modifier_truncate($_tmp, 60)); ?>
</li></a>
                            <?php endfor; else: ?>
                            <div class="alert alert-warning">
                                Brak szablonów w bazie!
                            </div>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                <h5>Dodaj nowy szablon</h5>
            </div>
            <div class="widget-content nopadding">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
" class="form-horizontal">
                    <div class="control-group">
                        <label class="control-label">Nazwa :</label>
                        <div class="controls">
                            <input class="text" type="text" name="name" size="20" value="" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Opis :</label>
                        <div class="controls">
                            <input class="text" type="text" name="description" size="30" value="" />
                        </div>
                    </div>
                    <div class="form-actions">
                        <input class="btn btn-success" type="submit" name="action" value="Dodaj szablon" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>