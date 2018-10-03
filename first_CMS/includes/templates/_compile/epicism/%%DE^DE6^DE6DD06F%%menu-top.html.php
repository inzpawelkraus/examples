<?php /* Smarty version 2.6.13, created on 2017-04-21 20:56:49
         compiled from misc/menu-top.html */ ?>
<div class="nav">
    <ul id="menu-primary" class="menu">
        <?php unset($this->_sections['mt']);
$this->_sections['mt']['name'] = 'mt';
$this->_sections['mt']['loop'] = is_array($_loop=$this->_tpl_vars['mt']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['mt']['show'] = true;
$this->_sections['mt']['max'] = $this->_sections['mt']['loop'];
$this->_sections['mt']['step'] = 1;
$this->_sections['mt']['start'] = $this->_sections['mt']['step'] > 0 ? 0 : $this->_sections['mt']['loop']-1;
if ($this->_sections['mt']['show']) {
    $this->_sections['mt']['total'] = $this->_sections['mt']['loop'];
    if ($this->_sections['mt']['total'] == 0)
        $this->_sections['mt']['show'] = false;
} else
    $this->_sections['mt']['total'] = 0;
if ($this->_sections['mt']['show']):

            for ($this->_sections['mt']['index'] = $this->_sections['mt']['start'], $this->_sections['mt']['iteration'] = 1;
                 $this->_sections['mt']['iteration'] <= $this->_sections['mt']['total'];
                 $this->_sections['mt']['index'] += $this->_sections['mt']['step'], $this->_sections['mt']['iteration']++):
$this->_sections['mt']['rownum'] = $this->_sections['mt']['iteration'];
$this->_sections['mt']['index_prev'] = $this->_sections['mt']['index'] - $this->_sections['mt']['step'];
$this->_sections['mt']['index_next'] = $this->_sections['mt']['index'] + $this->_sections['mt']['step'];
$this->_sections['mt']['first']      = ($this->_sections['mt']['iteration'] == 1);
$this->_sections['mt']['last']       = ($this->_sections['mt']['iteration'] == $this->_sections['mt']['total']);
?>
        <li <?php if ($this->_tpl_vars['menu_selected'] == $this->_tpl_vars['mt'][$this->_sections['mt']['index']]['url']): ?>class="current_page_item"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['mt'][$this->_sections['mt']['index']]['url']; ?>
" title="<?php echo $this->_tpl_vars['mt'][$this->_sections['mt']['index']]['name']; ?>
" <?php if ($this->_tpl_vars['mt'][$this->_sections['mt']['index']]['target'] == 1): ?>target="_blank"<?php endif; ?>><?php echo $this->_tpl_vars['mt'][$this->_sections['mt']['index']]['name']; ?>
</a></li>
        <?php endfor; endif; ?>
    </ul>
</div>                    
<a class="open" href="#menu-primary">Menu</a>