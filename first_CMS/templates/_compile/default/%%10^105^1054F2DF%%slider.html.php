<?php /* Smarty version 2.6.13, created on 2017-06-06 09:37:32
         compiled from petycje/slider.html */ ?>
<div  id="mainSlider"  class="fadeOut owl-carousel owl-theme">
    <?php unset($this->_sections['aa']);
$this->_sections['aa']['name'] = 'aa';
$this->_sections['aa']['loop'] = is_array($_loop=$this->_tpl_vars['articlesslider']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
    <div class="item">
        <a href="<?php echo $this->_tpl_vars['articlesslider'][$this->_sections['aa']['index']]['url']; ?>
" title="Oddaj głos na petycjię: <?php echo $this->_tpl_vars['articlesslider'][$this->_sections['aa']['index']]['title']; ?>
">
            <?php if ($this->_tpl_vars['articlesslider'][$this->_sections['aa']['index']]['photo']['photo']): ?>
            <img src="<?php echo $this->_tpl_vars['articlesslider'][$this->_sections['aa']['index']]['photo']['small']; ?>
"/>
            <?php else: ?>
            <img src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/img/slide1.jpg"/>
            <?php endif; ?>

            <span class="slideTitle"><?php echo $this->_tpl_vars['articlesslider'][$this->_sections['aa']['index']]['title']; ?>
</span>
            <span class="progress"><span class="counterBox"><?php echo $this->_tpl_vars['articlesslider'][$this->_sections['aa']['index']]['progress']; ?>
</span>%</span>
            <span class="info">Zebraliśmy </br><strong class="counterBox"><?php echo $this->_tpl_vars['articlesslider'][$this->_sections['aa']['index']]['comm']; ?>
</strong> </br>podpisów</span>
            <span class="vote">Podpisz petycję</span>
        </a>
    </div>
    <?php endfor; endif; ?>
</div>
<script>
    <?php echo '
    $(document).ready(function () {
            var owl = $(\'.fadeOut\');
            owl.owlCarousel({
                items:1,
                loop:true,
                animateOut: \'fadeOut\',
                autoplay:true,
                autoplayTimeout:3000,
                autoplayHoverPause:true
            });
    });
    '; ?>

</script>