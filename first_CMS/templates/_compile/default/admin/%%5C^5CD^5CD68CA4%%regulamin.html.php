<?php /* Smarty version 2.6.13, created on 2017-05-16 11:19:42
         compiled from newsletter/regulamin.html */ ?>
<div id="content-header">
    <div id="breadcrumb"> <a href="/admin" title="Panel" class="tip-bottom"><i class="icon-home"></i> Panel</a> <a>Newsletter</a> <a class="current">Regulamin</a> </div>
    <h1><?php echo $this->_tpl_vars['pageTitle']; ?>
</h1>
</div>
<div class="container-fluid">
    <div class="row-fluid">
        <form class="formularz" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
" class="form-horizontal">
            <div class="control-group">
                <label class="control-label"><?php echo $this->_tpl_vars['JEZYK'][$this->_sections['jj']['index']]['name']; ?>
</label>
                <div class="controls">
                    <textarea style="width:100%; max-width: 100%" id="edytor" name="newsletter_rules"><?php echo $this->_tpl_vars['newsletter_rules']; ?>
</textarea>
                </div>
            </div>
            <div class="form-actions">
                <input class="btn btn-success" type="submit" value="Zapisz zmiany" />
		<input type="hidden" name="action" value="update_rules" />
            </div>
        </form>
    </div>
</div>