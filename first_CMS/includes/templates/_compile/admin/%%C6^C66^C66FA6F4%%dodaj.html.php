<?php /* Smarty version 2.6.13, created on 2017-05-11 09:30:19
         compiled from slownik/dodaj.html */ ?>
<div id="content-header">
    <div id="breadcrumb"> <a href="/admin" title="Panel" class="tip-bottom"><i class="icon-home"></i> Panel</a> <a>Słownik</a><a class="current">Dodj nowy wyraz</a> </div>
    <h1><?php echo $this->_tpl_vars['pageTitle']; ?>
</h1>
</div>
<div class="container-fluid">
    <div class="row-fluid">
        <a class="btn" href="?"><i class="icon-step-backward"></i> Powrót do slownika</a>
        <?php if ($this->_tpl_vars['register_error']): ?>
        <div class="error"><?php echo $this->_tpl_vars['register_error']; ?>
</div>
        <?php endif; ?>
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                <h5>Dodaj nową pozycje</h5>
            </div>
            <div class="widget-content nopadding">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
" class="form-horizontal">
                    <div class="control-group">
                        <label class="control-label">Klucz :</label>
                        <div class="controls">
                            <input class="text" type="text" name="label" value="<?php echo $_POST['label']; ?>
" size="40" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Wartość :</label>
                        <div class="controls">
                            <textarea class="pl" name="pl" cols="60" rows="10"><?php echo $_POST['pl']; ?>
</textarea>
                        </div>
                    </div>
                    <div class="form-actions">
                        <input type="hidden" name="action" value="save_new" />
                        <input class="btn btn-success" type="submit" value="Dodaj wyraz" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>