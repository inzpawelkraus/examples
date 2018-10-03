<?php /* Smarty version 2.6.13, created on 2017-05-04 21:59:22
         compiled from strona.html */ ?>
<header class="inner" id="header" role="header">
    <div id="header_image" style="background: url(<?php echo $this->_tpl_vars['TPL_URL']; ?>
/assets/img/about1.jpg) top center no-repeat;">
        <div class="boxed">
            <div id="tagline" class="textcenter animated bounceInUp">
                <h1 class="tagline"><?php echo $this->_tpl_vars['page']['title']; ?>
</h1>
            </div>
        </div>                    
    </div>                        
</header>
<div id="content">
    <section id="page">
        <div class="boxed">


            <?php if ($this->_tpl_vars['page']['show_title']): ?>
            <div id="page-title"><h1><?php echo $this->_tpl_vars['page']['title']; ?>
</h1></div>
            <?php endif; ?>

            <div id="page-content">
                <?php echo $this->_tpl_vars['page']['content']; ?>

            </div>

            <?php if ($this->_tpl_vars['CONF']['show_tagi'] == 1): ?>
            <?php unset($this->_sections['t']);
$this->_sections['t']['name'] = 't';
$this->_sections['t']['loop'] = is_array($_loop=$this->_tpl_vars['page']['tagi']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['t']['show'] = true;
$this->_sections['t']['max'] = $this->_sections['t']['loop'];
$this->_sections['t']['step'] = 1;
$this->_sections['t']['start'] = $this->_sections['t']['step'] > 0 ? 0 : $this->_sections['t']['loop']-1;
if ($this->_sections['t']['show']) {
    $this->_sections['t']['total'] = $this->_sections['t']['loop'];
    if ($this->_sections['t']['total'] == 0)
        $this->_sections['t']['show'] = false;
} else
    $this->_sections['t']['total'] = 0;
if ($this->_sections['t']['show']):

            for ($this->_sections['t']['index'] = $this->_sections['t']['start'], $this->_sections['t']['iteration'] = 1;
                 $this->_sections['t']['iteration'] <= $this->_sections['t']['total'];
                 $this->_sections['t']['index'] += $this->_sections['t']['step'], $this->_sections['t']['iteration']++):
$this->_sections['t']['rownum'] = $this->_sections['t']['iteration'];
$this->_sections['t']['index_prev'] = $this->_sections['t']['index'] - $this->_sections['t']['step'];
$this->_sections['t']['index_next'] = $this->_sections['t']['index'] + $this->_sections['t']['step'];
$this->_sections['t']['first']      = ($this->_sections['t']['iteration'] == 1);
$this->_sections['t']['last']       = ($this->_sections['t']['iteration'] == $this->_sections['t']['total']);
?>
            <?php if ($this->_sections['t']['first']): ?><div class="tagi"><?php endif; ?>
                <a style="margin: 0 10px;" href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
/szukaj/<?php echo $this->_tpl_vars['page']['tagi_url'][$this->_sections['t']['index']]; ?>
" title="<?php echo $this->_tpl_vars['page']['tagi'][$this->_sections['t']['index']]; ?>
"><?php echo $this->_tpl_vars['page']['tagi'][$this->_sections['t']['index']]; ?>
</a>
                <?php if ($this->_sections['t']['last']): ?></div><?php endif; ?>
            <?php endfor; endif; ?>		
            <?php endif; ?>

            <?php if ($this->_tpl_vars['gallery']): ?>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "galeria/pokaz-podstrona.html", 'smarty_include_vars' => array('gal' => $this->_tpl_vars['gallery'],'gallery' => $this->_tpl_vars['galleries'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            <?php endif; ?>
        </div>
    </section>
</div>