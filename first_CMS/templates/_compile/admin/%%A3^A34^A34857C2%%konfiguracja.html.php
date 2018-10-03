<?php /* Smarty version 2.6.13, created on 2017-05-15 14:00:34
         compiled from komentarze/konfiguracja.html */ ?>
<div id="content-header">
    <div id="breadcrumb"> <a href="/admin" title="Panel" class="tip-bottom"><i class="icon-home"></i> Panel</a> <a>Komentarze</a><a class="current">Konfiguracja</a> </div>
    <h1><?php echo $this->_tpl_vars['pageTitle']; ?>
</h1>
</div>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            </div>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
?mm=<?php echo $_GET['mm']; ?>
" class="form-horizontal">
                <div class="control-group">
                    <label class="control-label" title="Widoczne dla niezalogowanych">Publiczne komentarze :</label>
                    <div class="controls">
                        <select name="comments_not_logged">
                            <option value="0"<?php if ($this->_tpl_vars['comments_not_logged'] == 0): ?> selected="true"<?php endif; ?>>nie</option>
                            <option value="1"<?php if ($this->_tpl_vars['comments_not_logged'] == 1): ?> selected="true"<?php endif; ?>>tak</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" title="Możliwośc komentowania przez niezalogowanych">Wolne komentarzee :</label>
                    <div class="controls">
                        <select name="comments_not_logged_post">
                            <option value="0"<?php if ($this->_tpl_vars['comments_not_logged_post'] == 0): ?> selected="true"<?php endif; ?>>nie</option>
                            <option value="1"<?php if ($this->_tpl_vars['comments_not_logged_post'] == 1): ?> selected="true"<?php endif; ?>>tak</option>
                        </select>
                    </div>
                </div>
                <div class="form-actions">
                    <input class="btn btn-success" type="submit" value="Zapisz" />
                    <input type="hidden" name="action" value="save" />
                </div>
            </form>
        </div>
    </div>
</div>