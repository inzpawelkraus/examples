<?php /* Smarty version 2.6.13, created on 2017-04-05 13:39:29
         compiled from szukaj/wyniki.html */ ?>
<header class="inner" id="header" role="header">
    <div id="header_image" style="background: url(<?php echo $this->_tpl_vars['TPL_URL']; ?>
/assets/img/about1.jpg) top center no-repeat;">
        <div class="boxed">
            <div id="tagline" class="textcenter animated bounceInUp">
                <h1 class="tagline"><?php echo $this->_tpl_vars['LANG']['_PAGE_SZUKAJ_WYNIKI']; ?>
</h1>
            </div>
        </div>                    
    </div>                        
</header>
<div id="content">
    <section id="page">
        <div class="boxed">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "szukaj/form.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

        <?php if (! $this->_tpl_vars['wyniki'] == 1): ?>
        <div class="szukaj-brak"><?php echo $this->_tpl_vars['LANG']['_PAGE_SZUKAJ_BRAK']; ?>
</div>

        <?php else: ?>
        <div class="szukaj-fraza"><?php echo $this->_tpl_vars['LANG']['_PAGE_SZUKAJ_KEYWORDS']; ?>
 <strong><?php echo $this->_tpl_vars['keyword']; ?>
</strong></div>

        <?php $_from = $this->_tpl_vars['aStrony']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['s'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['s']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
        $this->_foreach['s']['iteration']++;
?>
        <?php if (($this->_foreach['s']['iteration'] <= 1)):  echo $this->_tpl_vars['LANG']['_PAGE_ILE_POD']; ?>
: <strong><?php echo $this->_tpl_vars['c_strony']; ?>
</strong><?php endif; ?>
        <div class="szukaj-wynik">
            <h1><a href="<?php echo $this->_tpl_vars['v']['url']; ?>
" title="<?php echo $this->_tpl_vars['v']['title']; ?>
"><?php echo $this->_tpl_vars['v']['title']; ?>
</a></h1>
            <?php echo $this->_tpl_vars['v']['content_short']; ?>

            <a onclick="location.href = '<?php echo $this->_tpl_vars['v']['url']; ?>
'" class="szukaj-link" rel="nofollow" title="<?php echo $this->_tpl_vars['v']['title']; ?>
"><?php echo $this->_tpl_vars['v']['url']; ?>
</a>
        </div>
        <?php endforeach; endif; unset($_from); ?>

        <?php $_from = $this->_tpl_vars['aAktualnosci']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['s'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['s']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
        $this->_foreach['s']['iteration']++;
?>
        <?php if (($this->_foreach['s']['iteration'] <= 1)):  echo $this->_tpl_vars['LANG']['_PAGE_ILE_AKT']; ?>
 <strong><?php echo $this->_tpl_vars['c_aktualnosci']; ?>
</strong><?php endif; ?>
        <div class="szukaj-wynik">
            <h1><a href="<?php echo $this->_tpl_vars['v']['url']; ?>
" title="<?php echo $this->_tpl_vars['v']['title']; ?>
"><?php echo $this->_tpl_vars['v']['title']; ?>
</a></h1>
            <?php echo $this->_tpl_vars['v']['content_short']; ?>

            <a onclick="location.href = '<?php echo $this->_tpl_vars['v']['url']; ?>
'" class="szukaj-link" rel="nofollow" title="<?php echo $this->_tpl_vars['v']['title']; ?>
"><?php echo $this->_tpl_vars['v']['url']; ?>
</a>
        </div>
        <?php endforeach; endif; unset($_from); ?>

        <?php $_from = $this->_tpl_vars['aGaleria']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['s'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['s']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
        $this->_foreach['s']['iteration']++;
?>
        <?php if (($this->_foreach['s']['iteration'] <= 1)):  echo $this->_tpl_vars['LANG']['_PAGE_ILE_GAL']; ?>
 <strong><?php echo $this->_tpl_vars['c_galeria']; ?>
</strong><?php endif; ?>
        <div class="szukaj-wynik">
            <h1><a href="<?php echo $this->_tpl_vars['v']['url']; ?>
" title="<?php echo $this->_tpl_vars['v']['title']; ?>
"><?php echo $this->_tpl_vars['v']['title']; ?>
</a></h1>
            <?php echo $this->_tpl_vars['v']['content_short']; ?>

            <a onclick="location.href = '<?php echo $this->_tpl_vars['v']['url']; ?>
'" class="szukaj-link" rel="nofollow" title="<?php echo $this->_tpl_vars['v']['title']; ?>
"><?php echo $this->_tpl_vars['v']['url']; ?>
</a>
        </div>
        <?php endforeach; endif; unset($_from); ?>

        <?php endif; ?>
        </div>
        </section>
</div>