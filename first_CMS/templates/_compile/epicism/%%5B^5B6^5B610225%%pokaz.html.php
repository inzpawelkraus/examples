<?php /* Smarty version 2.6.13, created on 2017-04-21 15:58:51
         compiled from aktualnosci/pokaz.html */ ?>
<header class="inner" id="header" role="header">
    <div id="header_image" style="background: url(<?php echo $this->_tpl_vars['TPL_URL']; ?>
/assets/img/about1.jpg) top center no-repeat;">
        <div class="boxed">
            <div id="tagline" class="textcenter animated bounceInUp">
                <h1 class="tagline"><?php echo $this->_tpl_vars['article']['title']; ?>
</h1>
            </div>
        </div>                    
    </div>                        
</header>
<div id="content">
    <section id="single">
        <div class="boxed">
            <article class="post single_post animated bounceInLeft">  
                <div class="one_third">
                    <h4><?php echo $this->_tpl_vars['article']['title']; ?>
</h4>
                    <hr>
                    <ul class="postmeta nolist muted">	
                        <li class="date">Data: <strong><?php echo $this->_tpl_vars['article']['date_add']; ?>
</strong></li>
                        <li class="comments">Wyświetleń: <strong><?php echo $this->_tpl_vars['article']['count']; ?>
</strong></li>	
                        <li>Tagi: <strong>
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
                                <a style="margin: 0 10px;" href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
/szukaj/<?php echo $this->_tpl_vars['article']['tagi_url'][$this->_sections['t']['index']]; ?>
" title="<?php echo $this->_tpl_vars['article']['tagi'][$this->_sections['t']['index']]; ?>
"><?php echo $this->_tpl_vars['article']['tagi'][$this->_sections['t']['index']]; ?>
</a>
                                <?php endfor; endif; ?>		
                                <?php endif; ?>
                                </a></strong>
                        </li>
                        <?php if ($this->_tpl_vars['article']['fbshare']): ?>
                        <li>
                            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "misc/socials.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                        </li>
                        <?php endif; ?>
                    </ul>            				
                    <hr>
                    <div class="postnavi">
                        <ul class="nolist">
                            <li><a href="?" rel="Wstecz"><span class="tooltip-s" title="">&lsaquo; <small>Powrót do listy Aktualności</small></span></a></li>
                            <li></li>
                        </ul>
                    </div>    				    
                </div>
                <div class="two_third">
                    <div class="featured_image">
                        <a rel="prettyPhoto" href="<?php echo $this->_tpl_vars['article']['photo']['photo']; ?>
" title="<?php echo $this->_tpl_vars['article']['photo']['photo']; ?>
">
                            <img class="featured" src="<?php echo $this->_tpl_vars['article']['photo']['photo']; ?>
" alt="<?php echo $this->_tpl_vars['article']['photo']['photo']; ?>
" />
                        </a>
                    </div>
                    <p></p>
                    <p><?php echo $this->_tpl_vars['article']['content']; ?>
</p>
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
                    <div class='page-galery'>
                        <?php if ($this->_tpl_vars['gallery']): ?>
                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "galeria/pokaz-podstrona.html", 'smarty_include_vars' => array('gal' => $this->_tpl_vars['gallery'],'gallery' => $this->_tpl_vars['galleries'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                        <?php endif; ?>
                    </div>
                </div>
            </article>
        </div>
    </section>
    <?php if ($this->_tpl_vars['show_comments']): ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "misc/komentarze.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php endif; ?>
</div>