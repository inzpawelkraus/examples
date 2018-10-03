<?php /* Smarty version 2.6.13, created on 2017-04-21 22:59:27
         compiled from aktualnosci/wszystko.html */ ?>
<header class="inner" id="header" role="header">
    <div id="header_image" style="background: url(<?php echo $this->_tpl_vars['TPL_URL']; ?>
/assets/img/about1.jpg) top center no-repeat;">
        <div class="boxed">
            <div id="tagline" class="textcenter animated bounceInUp">
                <h1 class="tagline"><?php echo $this->_tpl_vars['LANG']['_PAGE_NEWS']; ?>
</h1>
            </div>
        </div>                    
    </div>                        
</header>
<div id="content">
    <section id="articles">
        <div class="boxed">
            <?php unset($this->_sections['aa']);
$this->_sections['aa']['name'] = 'aa';
$this->_sections['aa']['loop'] = is_array($_loop=$this->_tpl_vars['articles']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
            <article class="post animated bounceInLeft">			    
                <div class="one_third">
                    <h4><a href="<?php echo $this->_tpl_vars['articles'][$this->_sections['aa']['index']]['url']; ?>
"><?php echo $this->_tpl_vars['articles'][$this->_sections['aa']['index']]['title']; ?>
</a></h4>
                    <ul class="postmeta nolist muted">	
                        <li class="date">Data: <strong><?php echo $this->_tpl_vars['articles'][$this->_sections['aa']['index']]['date_add']; ?>
</strong></li>
                        <li class="comments">Wyświetleń: <strong><?php echo $this->_tpl_vars['articles'][$this->_sections['aa']['index']]['count']; ?>
</strong></li>	
                    </ul>    				    
                </div>
                <div class="two_third">
                    <div class="featured_image">
                        <a href="<?php echo $this->_tpl_vars['articles'][$this->_sections['aa']['index']]['url']; ?>
">
                            <img class="featured" src="<?php echo $this->_tpl_vars['articles'][$this->_sections['aa']['index']]['photo']['small']; ?>
" alt="Summer outdoors." />
                        </a>
                    </div>
                    <p><?php echo $this->_tpl_vars['articles'][$this->_sections['aa']['index']]['content_short']; ?>
</p>
                </div>
            </article>

            <?php endfor; else: ?>
            <p class="center error"><?php echo $this->_tpl_vars['LANG']['_PAGE_NO_NEWS']; ?>
</p>
            <?php endif; ?>

        </div>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "misc/stronicowanie.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </section>
</div>