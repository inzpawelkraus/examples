<?php /* Smarty version 2.6.13, created on 2017-05-15 19:15:26
         compiled from misc/loguj.html */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
    <head>
        <title>Panel administracyjny | <?php echo $this->_tpl_vars['CONF']['page_title']; ?>
</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="<?php echo $this->_tpl_vars['CONF']['page_keywords']; ?>
" />
        <meta name="description" content="<?php echo $this->_tpl_vars['CONF']['page_description']; ?>
" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
/templates/admin/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
/templates/admin/css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
/templates/admin/css/matrix-login.css" />
        <link href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
/templates/admin/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'/>
        <link rel="shortcut icon" href="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/img/favixdxdcon.ico" />
    </head>
    <body>
        
        <div id="particles-holder">
            <canvas id="the-sea-canvas"></canvas>
        </div>
        
        <div id="loginbox">   
            <form id="loginform" class="form-vertical" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
">
                <div class="control-group normal_text"> <h3><img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
/templates/admin/img/logo.png" alt="Logo" /></h3></div>
                <div class="control-group">
                    <?php if ($this->_tpl_vars['user_error']): ?>
                    <div class="alert alert-error">
                        <button class="close" data-dismiss="alert">×</button>
                        <?php echo $this->_tpl_vars['user_error']; ?>

                    </div>
                    <?php endif; ?>
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"> </i></span><input id="login" type="text" placeholder="Login" name="login"/>
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" placeholder="Hasło" name="pass" />
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-right"><input class="image btn btn-success" type="image" value="Zaloguj"/></span>
                    <input type="hidden" name="act" value="log_in" />
                </div>
                <div class="control-group"><strong><?php echo $this->_tpl_vars['CONF']['footer']; ?>
</strong></div>
            </form>
        </div>
        <script src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
/templates/admin/js/jquery.min.js"></script>  
        <script src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
/templates/admin/js/matrix.login.js"></script> 
        <script src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
/templates/admin/js/particles-dark.js" type="text/javascript"></script>
        <?php echo '
        <script type="text/javascript">
        $(document).ready(function () {
        $("#login").focus();
        });
        </script>
        '; ?>

    </body>
</html>