<?php /* Smarty version 2.6.13, created on 2017-04-12 08:39:20
         compiled from misc/haslo.html */ ?>
<div id="content-header">
    <div id="breadcrumb"> <a href="/admin" title="Panel" class="tip-bottom"><i class="icon-home"></i> Panel</a> <a>Ustawienia</a><a class="current">Zmiana hasła</a> </div>
    <h1><?php echo $this->_tpl_vars['pageTitle']; ?>
</h1>
</div>
<div class="container-fluid">
    <?php if ($this->_tpl_vars['pass_error']): ?>
    <div class="alert alert-danger"><?php echo $this->_tpl_vars['pass_error']; ?>
</div>
    <?php endif; ?>
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-edit"></i> </span>
            <h5>Formularz mziany hasła</h5>
        </div>
        <div class="widget-content nopadding">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
" class="form-horizontal">
                <div class="control-group">
                    <label class="control-label">Stare hasło :</label>
                    <div class="controls">
                        <input type="password" class="text" size="20" name="old" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Nowe hasło :</label>
                    <div class="controls">
                        <input type="password" class="text" size="20" name="new1" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Powtórz nowe hasło :</label>
                    <div class="controls">
                        <input type="password" class="text" size="20" name="new2" />
                    </div>
                </div>
                <div class="form-actions">
                    <input class="btn btn-success" type="submit" value="Zmień hasło" />
                    <input type="hidden" name="action" value="save_pass" />
                </div>
            </form>
        </div>
    </div>
</div>