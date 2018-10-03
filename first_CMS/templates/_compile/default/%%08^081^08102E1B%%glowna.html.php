<?php /* Smarty version 2.6.13, created on 2017-06-06 09:37:32
         compiled from petycje/glowna.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'petycje/glowna.html', 19, false),)), $this); ?>
<section class="body page">
    <div class="container petitions">

        <?php unset($this->_sections['aa']);
$this->_sections['aa']['name'] = 'aa';
$this->_sections['aa']['loop'] = is_array($_loop=$this->_tpl_vars['articlesglowna']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['aa']['show'] = true;
$this->_sections['aa']['max'] = $this->_sections['aa']['loop'];
$this->_sections['aa']['step'] = 1;
$this->_sections['aa']['start'] = $this->_sections['aa']['step'] > 0 ? 0 : $this->_sections['aa']['loop']-1;
if ($this->_sections['aa']['show']) {
    $this->_sections['aa']['total'] = $this->_sections['aa']['loop'];
    if ($this->_sections['aa']['total'] == 0)
        $this->_sections['aa']['show'] = false;
} else
    $this->_sections['aa']['total'] = 0;
if ($this->_sections['aa']['show']):

            for ($this->_sections['aa']['index'] = $this->_sections['aa']['start'], $this->_sections['aa']['iteration'] = 1;
                 $this->_sections['aa']['iteration'] <= $this->_sections['aa']['total'];
                 $this->_sections['aa']['index'] += $this->_sections['aa']['step'], $this->_sections['aa']['iteration']++):
$this->_sections['aa']['rownum'] = $this->_sections['aa']['iteration'];
$this->_sections['aa']['index_prev'] = $this->_sections['aa']['index'] - $this->_sections['aa']['step'];
$this->_sections['aa']['index_next'] = $this->_sections['aa']['index'] + $this->_sections['aa']['step'];
$this->_sections['aa']['first']      = ($this->_sections['aa']['iteration'] == 1);
$this->_sections['aa']['last']       = ($this->_sections['aa']['iteration'] == $this->_sections['aa']['total']);
?>
        <div class="petition col-xs-6">
            <a href="<?php echo $this->_tpl_vars['articlesglowna'][$this->_sections['aa']['index']]['url']; ?>
" title="Przejdź do petycji: <?php echo $this->_tpl_vars['articlesglowna'][$this->_sections['aa']['index']]['title']; ?>
" style="color: #333;">
                <div class="img_container">
                    <?php if ($this->_tpl_vars['articlesglowna'][$this->_sections['aa']['index']]['photo']['small']): ?>
                    <img src="<?php echo $this->_tpl_vars['articlesglowna'][$this->_sections['aa']['index']]['photo']['small']; ?>
"/>
                    <?php else: ?>
                    <img src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/img/petition1.jpg"/>
                    <?php endif; ?>

                    <span class="petitionTitle"><?php echo $this->_tpl_vars['articlesglowna'][$this->_sections['aa']['index']]['title']; ?>
</span>
                    <span class="progress"><spam class="counterBox"><?php echo $this->_tpl_vars['articlesglowna'][$this->_sections['aa']['index']]['progress']; ?>
</spam>%</span>
                    <span class="info">Zebraliśmy </br><strong class="counterBox"><?php echo $this->_tpl_vars['articlesglowna'][$this->_sections['aa']['index']]['comm']; ?>
</strong> </br>podpisów</span>
                </div>
                <div class="content">
                    <?php echo ((is_array($_tmp=$this->_tpl_vars['articlesglowna'][$this->_sections['aa']['index']]['content_short'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 340, "...", true) : smarty_modifier_truncate($_tmp, 340, "...", true)); ?>

                    <a class="more" href="<?php echo $this->_tpl_vars['articlesglowna'][$this->_sections['aa']['index']]['url']; ?>
" title="Przejdź do petycji: <?php echo $this->_tpl_vars['articlesglowna'][$this->_sections['aa']['index']]['title']; ?>
">Czytaj wiecej</a>
                </div>
            </a>
        </div>
        <?php endfor; else: ?>
        <p class="center error"><?php echo $this->_tpl_vars['LANG']['_PAGE_NO_NEWS']; ?>
</p>
        <?php endif; ?>
    </div>
</section>