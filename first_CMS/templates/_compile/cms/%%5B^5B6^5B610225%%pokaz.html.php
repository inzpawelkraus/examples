<?php /* Smarty version 2.6.13, created on 2017-03-17 13:32:42
         compiled from aktualnosci/pokaz.html */ ?>
<?php if ($this->_tpl_vars['article']['show_title']): ?>
    <div id="page-title">
        <h1><?php echo $this->_tpl_vars['LANG']['_PAGE_NEWS']; ?>
 &raquo; <?php echo $this->_tpl_vars['article']['title']; ?>
</h1>
    </div>
<?php endif; ?>
<div id="page-content">
    <?php if ($this->_tpl_vars['article']['photo']['photo']): ?>
        <a href="<?php echo $this->_tpl_vars['article']['photo']['photo']; ?>
" title="<?php echo $this->_tpl_vars['article']['title']; ?>
" class="fancybox" rel="fancybox">
            <img class="news-foto" src="<?php echo $this->_tpl_vars['article']['photo']['small']; ?>
" alt="<?php echo $this->_tpl_vars['article']['title']; ?>
" />
        </a>
    <?php endif; ?>
    <?php echo $this->_tpl_vars['article']['content']; ?>

</div>  

<br class="clear" />
<?php if ($this->_tpl_vars['CONF']['show_tagi'] == 1): ?>
    <?php unset($this->_sections['t']);
$this->_sections['t']['name'] = 't';
$this->_sections['t']['loop'] = is_array($_loop=$this->_tpl_vars['article']['tagi']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
        <?php if ($this->_sections['t']['first']): ?>
            <div class="tagi">
            <?php endif; ?>
            <a style="margin: 0 10px;" href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
/szukaj/<?php echo $this->_tpl_vars['article']['tagi_url'][$this->_sections['t']['index']]; ?>
" title="<?php echo $this->_tpl_vars['article']['tagi'][$this->_sections['t']['index']]; ?>
"><?php echo $this->_tpl_vars['article']['tagi'][$this->_sections['t']['index']]; ?>
</a>
            <?php if ($this->_sections['t']['last']): ?>
            </div>
        <?php endif; ?>
    <?php endfor; endif; ?>		
<?php endif; ?>

<?php if ($this->_tpl_vars['pliki']): ?>
    <div>
        <div><?php echo $this->_tpl_vars['LANG']['_FILES_HEADER']; ?>
</div>
        <?php unset($this->_sections['pp']);
$this->_sections['pp']['name'] = 'pp';
$this->_sections['pp']['loop'] = is_array($_loop=$this->_tpl_vars['pliki']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['pp']['show'] = true;
$this->_sections['pp']['max'] = $this->_sections['pp']['loop'];
$this->_sections['pp']['step'] = 1;
$this->_sections['pp']['start'] = $this->_sections['pp']['step'] > 0 ? 0 : $this->_sections['pp']['loop']-1;
if ($this->_sections['pp']['show']) {
    $this->_sections['pp']['total'] = $this->_sections['pp']['loop'];
    if ($this->_sections['pp']['total'] == 0)
        $this->_sections['pp']['show'] = false;
} else
    $this->_sections['pp']['total'] = 0;
if ($this->_sections['pp']['show']):

            for ($this->_sections['pp']['index'] = $this->_sections['pp']['start'], $this->_sections['pp']['iteration'] = 1;
                 $this->_sections['pp']['iteration'] <= $this->_sections['pp']['total'];
                 $this->_sections['pp']['index'] += $this->_sections['pp']['step'], $this->_sections['pp']['iteration']++):
$this->_sections['pp']['rownum'] = $this->_sections['pp']['iteration'];
$this->_sections['pp']['index_prev'] = $this->_sections['pp']['index'] - $this->_sections['pp']['step'];
$this->_sections['pp']['index_next'] = $this->_sections['pp']['index'] + $this->_sections['pp']['step'];
$this->_sections['pp']['first']      = ($this->_sections['pp']['iteration'] == 1);
$this->_sections['pp']['last']       = ($this->_sections['pp']['iteration'] == $this->_sections['pp']['total']);
?>
            <a class="main-link" href="<?php echo $this->_tpl_vars['pliki'][$this->_sections['pp']['index']]['url']; ?>
" title="<?php echo $this->_tpl_vars['pliki'][$this->_sections['pp']['index']]['name']; ?>
"><?php echo $this->_tpl_vars['pliki'][$this->_sections['pp']['index']]['name']; ?>
</a>
        <?php endfor; endif; ?>
    </div>
<?php endif; ?>

<?php if ($this->_tpl_vars['gallery']): ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "galeria/pokaz-podstrona.html", 'smarty_include_vars' => array('gal' => $this->_tpl_vars['gallery'],'gallery' => $this->_tpl_vars['galleries'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  endif; ?>

<?php if ($this->_tpl_vars['CONF']['show_back'] == 1): ?><div class="back"><a href="<?php echo $_SERVER['HTTP_REFERER']; ?>
" title="<?php echo $this->_tpl_vars['LANG']['_PAGE_BACK']; ?>
">&laquo; <?php echo $this->_tpl_vars['LANG']['_PAGE_BACK']; ?>
</a></div><?php endif; ?>

<?php if ($this->_tpl_vars['show_comments']): ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "misc/komentarze.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  endif; ?>