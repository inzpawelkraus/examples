<?php /* Smarty version 2.6.13, created on 2017-04-11 15:33:28
         compiled from newsletter/edytuj.html */ ?>
<div id="content-header">
    <div id="breadcrumb"> <a href="/admin" title="Panel" class="tip-bottom"><i class="icon-home"></i> Panel</a> <a>Newsletter</a><a class="current">Educja użytkownika</a> </div>
    <h1><?php echo $this->_tpl_vars['pageTitle']; ?>
 - <?php echo $this->_tpl_vars['u']['first_name']; ?>
 <?php echo $this->_tpl_vars['u']['last_name']; ?>
</h1>
</div>
<div class="container-fluid">
    <div class="row-fluid">
        <a class="btn" href="?action=user"><i class="icon-step-backward"></i> Powrót do listy</a>
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                <h5>Edytuj dane</h5>
            </div>
            <div class="widget-content nopadding">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
" class="form-horizontal">
                    <div class="control-group">
                        <label class="control-label">Imię :</label>
                        <div class="controls">
                            <input class="text" type="text" name="first_name" value="<?php echo $this->_tpl_vars['u']['first_name']; ?>
" size="40" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Nazwisko :</label>
                        <div class="controls">
                            <input class="text" type="text" name="last_name" value="<?php echo $this->_tpl_vars['u']['last_name']; ?>
" size="40" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Email :</label>
                        <div class="controls">
                            <input class="text" type="text" name="email" value="<?php echo $this->_tpl_vars['u']['email']; ?>
" size="40" />
                        </div>
                    </div>
					<div class="control-group">
                        <label class="control-label">Status :</label>
                        <div class="controls">
                            <select name="active">
                                <option value="0"<?php if ($this->_tpl_vars['u']['active'] == 0): ?> selected="true"<?php endif; ?>>Nieaktywny</option>
                                <option value="1"<?php if ($this->_tpl_vars['u']['active'] == 1): ?> selected="true"<?php endif; ?>>Aktywny</option>
                            </select>	
                        </div>
                    </div>
                    <div class="form-actions">
                        <input type="hidden" name="action" value="save_user" />
                        <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['u']['id']; ?>
" /><br />
                        <input class="btn btn-success" type="submit" value="Zapisz zmiany" />
                    </div>
                </form>  
            </div>
        </div>
    </div>