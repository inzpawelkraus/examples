<?php /* Smarty version 2.6.13, created on 2017-04-18 09:55:32
         compiled from newsletter/potwierdzenie.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'newsletter/potwierdzenie.html', 9, false),)), $this); ?>
<div id="content-header">
    <div id="breadcrumb"> <a href="/admin" title="Panel" class="tip-bottom"><i class="icon-home"></i> Panel</a> <a>Newsletter</a><a class="current">Wysyłka</a> </div>
    <h1><?php echo $this->_tpl_vars['pageTitle']; ?>
</h1>
</div>
<div class="container-fluid">
    <div class="row-fluid">
        <p><a class="btn" href="javascript: history.back(-1);"><i class="icon-step-backward"></i> Powrót</a></p>
        <div class="alert alert-info"><?php if ($_POST['send'] == one): ?>Biuletyn wysyłany na adres: <b><?php echo $_POST['email']; ?>
</b>
            <?php else: ?>Biuletyn wysyłany na <b><?php echo ((is_array($_tmp=@$this->_tpl_vars['stats']['active'])) ? $this->_run_mod_handler('default', true, $_tmp, '0') : smarty_modifier_default($_tmp, '0')); ?>
</b> aktywnych adresów e-mail.<?php endif; ?>
        </div>
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
                <h5>Tytuł biuletynu: <?php echo $_POST['mailing_subject']; ?>
</h5>
            </div>
            <div class="widget-content">
                <form method="post" class="form-horizontal">
                    <div class="control-group">
                        <label class="control-label">Treść: </label>
                        <div class="controls">
                            <textarea id="edytor" name="mailing_content"><?php echo $this->_tpl_vars['template']; ?>
</textarea>
                            <input type="hidden" name="mailing_subject" value="<?php echo $_POST['mailing_subject']; ?>
" />
                            <input type="hidden" name="send" value="<?php echo $_POST['send']; ?>
" />
                            <input type="hidden" name="email" value="<?php echo $_POST['email']; ?>
" />
                            <input type="hidden" name="action" value="send_mailing" />	
                            <input type="hidden" name="id" value="<?php echo $_POST['id']; ?>
" />
                            <input type="hidden" name="date_add" value="<?php echo $_POST['date_add']; ?>
" />
                        </div>
                    </div>
                    <div class="form-actions">
                        <input class="btn btn-success" type="submit" value="Wyślij biuletyn" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>