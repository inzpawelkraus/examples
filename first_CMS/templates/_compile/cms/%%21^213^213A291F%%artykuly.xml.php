<?php /* Smarty version 2.6.13, created on 2017-03-17 13:26:32
         compiled from rss/artykuly.xml */ ?>
<?php echo '<?xml'; ?>
 version="1.0" encoding="utf-8"<?php echo '?>'; ?>

<rss version="2.0">
<channel>
	<title><?php echo $this->_tpl_vars['CONF']['page_title']; ?>
</title>
	<link><?php echo $this->_tpl_vars['CONF']['server_addr']; ?>
</link>
	<description><?php echo $this->_tpl_vars['CONF']['page_description']; ?>
</description>
	<language>pl</language>

	<?php unset($this->_sections['a']);
$this->_sections['a']['name'] = 'a';
$this->_sections['a']['loop'] = is_array($_loop=$this->_tpl_vars['aktualnosci_art']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
	<item>
		<guid><?php echo $this->_tpl_vars['aktualnosci_art'][$this->_sections['a']['index']]['url']; ?>
</guid>		
		<link><?php echo $this->_tpl_vars['aktualnosci_art'][$this->_sections['a']['index']]['url']; ?>
</link>
		<title><?php echo $this->_tpl_vars['aktualnosci_art'][$this->_sections['a']['index']]['title']; ?>
</title>
		<description><?php echo $this->_tpl_vars['aktualnosci_art'][$this->_sections['a']['index']]['content_short']; ?>
</description>
		<category><?php echo $this->_tpl_vars['aktualnosci_art'][$this->_sections['a']['index']]['category_name']; ?>
</category>
	</item>
	<?php endfor; endif; ?>
	
	<?php unset($this->_sections['p']);
$this->_sections['p']['name'] = 'p';
$this->_sections['p']['loop'] = is_array($_loop=$this->_tpl_vars['pages_art']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['p']['show'] = true;
$this->_sections['p']['max'] = $this->_sections['p']['loop'];
$this->_sections['p']['step'] = 1;
$this->_sections['p']['start'] = $this->_sections['p']['step'] > 0 ? 0 : $this->_sections['p']['loop']-1;
if ($this->_sections['p']['show']) {
    $this->_sections['p']['total'] = $this->_sections['p']['loop'];
    if ($this->_sections['p']['total'] == 0)
        $this->_sections['p']['show'] = false;
} else
    $this->_sections['p']['total'] = 0;
if ($this->_sections['p']['show']):

            for ($this->_sections['p']['index'] = $this->_sections['p']['start'], $this->_sections['p']['iteration'] = 1;
                 $this->_sections['p']['iteration'] <= $this->_sections['p']['total'];
                 $this->_sections['p']['index'] += $this->_sections['p']['step'], $this->_sections['p']['iteration']++):
$this->_sections['p']['rownum'] = $this->_sections['p']['iteration'];
$this->_sections['p']['index_prev'] = $this->_sections['p']['index'] - $this->_sections['p']['step'];
$this->_sections['p']['index_next'] = $this->_sections['p']['index'] + $this->_sections['p']['step'];
$this->_sections['p']['first']      = ($this->_sections['p']['iteration'] == 1);
$this->_sections['p']['last']       = ($this->_sections['p']['iteration'] == $this->_sections['p']['total']);
?>
	<item>
		<guid><?php echo $this->_tpl_vars['pages_art'][$this->_sections['p']['index']]['url']; ?>
</guid>		
		<link><?php echo $this->_tpl_vars['pages_art'][$this->_sections['p']['index']]['url']; ?>
</link>
		<title><?php echo $this->_tpl_vars['pages_art'][$this->_sections['p']['index']]['title']; ?>
</title>
		<description><?php echo $this->_tpl_vars['pages_art'][$this->_sections['p']['index']]['content_short']; ?>
</description>
		<category><?php echo $this->_tpl_vars['pages_art'][$this->_sections['p']['index']]['category_name']; ?>
</category>
	</item>
	<?php endfor; endif; ?>
	
	<?php unset($this->_sections['g']);
$this->_sections['g']['name'] = 'g';
$this->_sections['g']['loop'] = is_array($_loop=$this->_tpl_vars['gallery_art']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
	<item>
		<guid><?php echo $this->_tpl_vars['gallery_art'][$this->_sections['g']['index']]['url']; ?>
</guid>		
		<link><?php echo $this->_tpl_vars['gallery_art'][$this->_sections['g']['index']]['url']; ?>
</link>
		<title><?php echo $this->_tpl_vars['gallery_art'][$this->_sections['g']['index']]['title']; ?>
</title>
		<description><?php echo $this->_tpl_vars['gallery_art'][$this->_sections['g']['index']]['content']; ?>
</description>
		<category><?php echo $this->_tpl_vars['gallery_art'][$this->_sections['g']['index']]['category_name']; ?>
</category>
	</item>
	<?php endfor; endif; ?>

</channel>
</rss>