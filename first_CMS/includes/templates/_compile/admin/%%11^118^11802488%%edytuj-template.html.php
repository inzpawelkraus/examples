<?php /* Smarty version 2.6.13, created on 2017-05-11 10:32:36
         compiled from newsletter/edytuj-template.html */ ?>
<div id="content-header">
    <div id="breadcrumb"> <a href="/admin" title="Panel" class="tip-bottom"><i class="icon-home"></i> Panel</a> <a>Newsletter</a> <a>Szablony</a><a class="current">Edycja szablonu</a> </div>
    <h1><?php echo $this->_tpl_vars['pageTitle']; ?>
</h1>
</div>
<div class="container-fluid">
    <div class="row-fluid">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
" class="form-horizontal">
            <div class="control-group">
                <label class="control-label">Nazwa :</label>
                <div class="controls">
                    <input class="text title" type="text" name="name" size="70" value="<?php echo $this->_tpl_vars['mail']['name']; ?>
" />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Opis :</label>
                <div class="controls">
                   <input class="text" type="text" name="description" size="70" value="<?php echo $this->_tpl_vars['mail']['description']; ?>
" />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Opis :</label>
                <div class="controls">
                   <textarea id="edytor" name="value"><?php echo $this->_tpl_vars['mail']['value']; ?>
</textarea>
                </div>
            </div>
            <div class="form-actions">
                <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['mail']['id']; ?>
" /><br />
            <input class="btn btn-success" type="submit" name="action" value="Zapisz" />
            <input class="btn btn-info" type="submit" name="action" value="Zapisz i kontynuuj edycję" />
            <input class="btn btn-danger" type="submit" name="action" value="Porzuć zmiany" />
            </div>
        </form>
    </div>
</div>