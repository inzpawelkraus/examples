<?php /* Smarty version 2.6.13, created on 2017-03-20 10:32:34
         compiled from mailing/edytuj.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'nl2br', 'mailing/edytuj.html', 9, false),)), $this); ?>
<div id="content-header">
    <div id="breadcrumb"> <a href="/admin" title="Panel" class="tip-bottom"><i class="icon-home"></i> Panel</a> <a>Ustawienia</a> <a>szablony E-mail</a><a class="current">Edycja</a> </div>
    <h1><?php echo $this->_tpl_vars['pageTitle']; ?>
</h1>
</div>
<div class="container-fluid">
    <div class="row-fluid">
        <a class="btn" href="?"><i class="icon-step-backward"></i> Powrót</a>
        <form method="post" class="form-horizontal"></br>
                        <p><?php echo ((is_array($_tmp=$this->_tpl_vars['description'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</p>
            <div class="control-group">
                <textarea style="width:100%; max-width: 100%; min-height: 200px;" id="edytor" name="mail_value"><?php echo $this->_tpl_vars['mail_value']; ?>
</textarea></br>
            </div>
            <div class="form-actions">
                <input type="hidden" name="action" value="save" />
                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>
" />
                <input class="btn btn-success" type="submit" value="Zapisz zmiany" />
            </div>
        </form>
    </div>
</div>