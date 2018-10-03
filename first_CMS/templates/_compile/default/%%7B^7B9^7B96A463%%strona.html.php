<?php /* Smarty version 2.6.13, created on 2017-06-06 09:52:45
         compiled from strona.html */ ?>
<section class="body page">
    <div class="container petitions">
            <?php if ($this->_tpl_vars['page']['show_title']): ?>
            <div id="page-title"><h1><?php echo $this->_tpl_vars['page']['title']; ?>
</h1></div>
            <?php endif; ?>

            <div id="page-content">
                <?php echo $this->_tpl_vars['page']['content']; ?>

            </div>

            <?php if ($this->_tpl_vars['gallery']): ?>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "galeria/pokaz-podstrona.html", 'smarty_include_vars' => array('gal' => $this->_tpl_vars['gallery'],'gallery' => $this->_tpl_vars['galleries'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            <?php endif; ?>

    </div>
</section>