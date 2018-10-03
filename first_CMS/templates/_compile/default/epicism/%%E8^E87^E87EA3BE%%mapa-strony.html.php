<?php /* Smarty version 2.6.13, created on 2017-05-04 21:59:20
         compiled from misc/mapa-strony.html */ ?>
<header class="inner" id="header" role="header">
    <div id="header_image" style="background: url(<?php echo $this->_tpl_vars['TPL_URL']; ?>
/assets/img/about1.jpg) top center no-repeat;">
        <div class="boxed">
            <div id="tagline" class="textcenter animated bounceInUp">
                <h1 class="tagline"><?php echo $this->_tpl_vars['LANG']['_PAGE_SITEMAP']; ?>
</h1>
            </div>
        </div>                    
    </div>                        
</header>
<div id="content">
    <section id="articles">
        <div class="boxed">
            <ul>
                <?php unset($this->_sections['m']);
$this->_sections['m']['name'] = 'm';
$this->_sections['m']['loop'] = is_array($_loop=$this->_tpl_vars['map']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['m']['show'] = true;
$this->_sections['m']['max'] = $this->_sections['m']['loop'];
$this->_sections['m']['step'] = 1;
$this->_sections['m']['start'] = $this->_sections['m']['step'] > 0 ? 0 : $this->_sections['m']['loop']-1;
if ($this->_sections['m']['show']) {
    $this->_sections['m']['total'] = $this->_sections['m']['loop'];
    if ($this->_sections['m']['total'] == 0)
        $this->_sections['m']['show'] = false;
} else
    $this->_sections['m']['total'] = 0;
if ($this->_sections['m']['show']):

            for ($this->_sections['m']['index'] = $this->_sections['m']['start'], $this->_sections['m']['iteration'] = 1;
                 $this->_sections['m']['iteration'] <= $this->_sections['m']['total'];
                 $this->_sections['m']['index'] += $this->_sections['m']['step'], $this->_sections['m']['iteration']++):
$this->_sections['m']['rownum'] = $this->_sections['m']['iteration'];
$this->_sections['m']['index_prev'] = $this->_sections['m']['index'] - $this->_sections['m']['step'];
$this->_sections['m']['index_next'] = $this->_sections['m']['index'] + $this->_sections['m']['step'];
$this->_sections['m']['first']      = ($this->_sections['m']['iteration'] == 1);
$this->_sections['m']['last']       = ($this->_sections['m']['iteration'] == $this->_sections['m']['total']);
?>
                <li><a class="site1" href="<?php echo $this->_tpl_vars['map'][$this->_sections['m']['index']]['url']; ?>
" title="<?php echo $this->_tpl_vars['map'][$this->_sections['m']['index']]['name']; ?>
" <?php if ($this->_tpl_vars['map'][$this->_sections['m']['index']]['target'] == 1): ?>target="_blank"<?php endif; ?>><?php echo $this->_tpl_vars['map'][$this->_sections['m']['index']]['name']; ?>
</a></li>
                <?php if ($this->_tpl_vars['map'][$this->_sections['m']['index']]['submenu']): ?>
                <ul>
                    <?php unset($this->_sections['mm']);
$this->_sections['mm']['name'] = 'mm';
$this->_sections['mm']['loop'] = is_array($_loop=$this->_tpl_vars['map'][$this->_sections['m']['index']]['submenu']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['mm']['show'] = true;
$this->_sections['mm']['max'] = $this->_sections['mm']['loop'];
$this->_sections['mm']['step'] = 1;
$this->_sections['mm']['start'] = $this->_sections['mm']['step'] > 0 ? 0 : $this->_sections['mm']['loop']-1;
if ($this->_sections['mm']['show']) {
    $this->_sections['mm']['total'] = $this->_sections['mm']['loop'];
    if ($this->_sections['mm']['total'] == 0)
        $this->_sections['mm']['show'] = false;
} else
    $this->_sections['mm']['total'] = 0;
if ($this->_sections['mm']['show']):

            for ($this->_sections['mm']['index'] = $this->_sections['mm']['start'], $this->_sections['mm']['iteration'] = 1;
                 $this->_sections['mm']['iteration'] <= $this->_sections['mm']['total'];
                 $this->_sections['mm']['index'] += $this->_sections['mm']['step'], $this->_sections['mm']['iteration']++):
$this->_sections['mm']['rownum'] = $this->_sections['mm']['iteration'];
$this->_sections['mm']['index_prev'] = $this->_sections['mm']['index'] - $this->_sections['mm']['step'];
$this->_sections['mm']['index_next'] = $this->_sections['mm']['index'] + $this->_sections['mm']['step'];
$this->_sections['mm']['first']      = ($this->_sections['mm']['iteration'] == 1);
$this->_sections['mm']['last']       = ($this->_sections['mm']['iteration'] == $this->_sections['mm']['total']);
?>
                    <li><a class="site2" href="<?php echo $this->_tpl_vars['map'][$this->_sections['m']['index']]['submenu'][$this->_sections['mm']['index']]['url']; ?>
" title="<?php echo $this->_tpl_vars['map'][$this->_sections['m']['index']]['submenu'][$this->_sections['mm']['index']]['name']; ?>
" <?php if ($this->_tpl_vars['map'][$this->_sections['m']['index']]['submenu'][$this->_sections['mm']['index']]['target'] == 1): ?>target="_blank"<?php endif; ?>><?php echo $this->_tpl_vars['map'][$this->_sections['m']['index']]['submenu'][$this->_sections['mm']['index']]['name']; ?>
</a></li>
                    <?php endfor; endif; ?>
                </ul>
                <?php endif; ?>

                <?php if ($this->_tpl_vars['map'][$this->_sections['m']['index']]['typ'] == 'aktualnosci'): ?>
                <ul>
                    <?php unset($this->_sections['a']);
$this->_sections['a']['name'] = 'a';
$this->_sections['a']['loop'] = is_array($_loop=$this->_tpl_vars['aktualnoscimap']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['a']['show'] = true;
$this->_sections['a']['max'] = $this->_sections['a']['loop'];
$this->_sections['a']['step'] = 1;
$this->_sections['a']['start'] = $this->_sections['a']['step'] > 0 ? 0 : $this->_sections['a']['loop']-1;
if ($this->_sections['a']['show']) {
    $this->_sections['a']['total'] = $this->_sections['a']['loop'];
    if ($this->_sections['a']['total'] == 0)
        $this->_sections['a']['show'] = false;
} else
    $this->_sections['a']['total'] = 0;
if ($this->_sections['a']['show']):

            for ($this->_sections['a']['index'] = $this->_sections['a']['start'], $this->_sections['a']['iteration'] = 1;
                 $this->_sections['a']['iteration'] <= $this->_sections['a']['total'];
                 $this->_sections['a']['index'] += $this->_sections['a']['step'], $this->_sections['a']['iteration']++):
$this->_sections['a']['rownum'] = $this->_sections['a']['iteration'];
$this->_sections['a']['index_prev'] = $this->_sections['a']['index'] - $this->_sections['a']['step'];
$this->_sections['a']['index_next'] = $this->_sections['a']['index'] + $this->_sections['a']['step'];
$this->_sections['a']['first']      = ($this->_sections['a']['iteration'] == 1);
$this->_sections['a']['last']       = ($this->_sections['a']['iteration'] == $this->_sections['a']['total']);
?>
                    <li><a class="site2" href="<?php echo $this->_tpl_vars['aktualnoscimap'][$this->_sections['a']['index']]['url']; ?>
" title="<?php echo $this->_tpl_vars['aktualnoscimap'][$this->_sections['a']['index']]['title']; ?>
"><?php echo $this->_tpl_vars['aktualnoscimap'][$this->_sections['a']['index']]['title']; ?>
</a></li>
                    <?php endfor; endif; ?>
                </ul>
                <?php endif; ?>

                <?php if ($this->_tpl_vars['map'][$this->_sections['m']['index']]['typ'] == 'galeria'): ?>
                <ul>
                    <?php unset($this->_sections['g']);
$this->_sections['g']['name'] = 'g';
$this->_sections['g']['loop'] = is_array($_loop=$this->_tpl_vars['gallerymap']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['g']['show'] = true;
$this->_sections['g']['max'] = $this->_sections['g']['loop'];
$this->_sections['g']['step'] = 1;
$this->_sections['g']['start'] = $this->_sections['g']['step'] > 0 ? 0 : $this->_sections['g']['loop']-1;
if ($this->_sections['g']['show']) {
    $this->_sections['g']['total'] = $this->_sections['g']['loop'];
    if ($this->_sections['g']['total'] == 0)
        $this->_sections['g']['show'] = false;
} else
    $this->_sections['g']['total'] = 0;
if ($this->_sections['g']['show']):

            for ($this->_sections['g']['index'] = $this->_sections['g']['start'], $this->_sections['g']['iteration'] = 1;
                 $this->_sections['g']['iteration'] <= $this->_sections['g']['total'];
                 $this->_sections['g']['index'] += $this->_sections['g']['step'], $this->_sections['g']['iteration']++):
$this->_sections['g']['rownum'] = $this->_sections['g']['iteration'];
$this->_sections['g']['index_prev'] = $this->_sections['g']['index'] - $this->_sections['g']['step'];
$this->_sections['g']['index_next'] = $this->_sections['g']['index'] + $this->_sections['g']['step'];
$this->_sections['g']['first']      = ($this->_sections['g']['iteration'] == 1);
$this->_sections['g']['last']       = ($this->_sections['g']['iteration'] == $this->_sections['g']['total']);
?>
                    <li><a class="site2" href="<?php echo $this->_tpl_vars['gallerymap'][$this->_sections['g']['index']]['url']; ?>
" title="<?php echo $this->_tpl_vars['gallerymap'][$this->_sections['g']['index']]['title']; ?>
"><?php echo $this->_tpl_vars['gallerymap'][$this->_sections['g']['index']]['title']; ?>
</a></li>
                    <?php endfor; endif; ?>
                </ul>
                <?php endif; ?>
                <?php endfor; endif; ?>		
            </ul>
    </section>
</div>