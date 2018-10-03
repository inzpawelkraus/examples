<?php /* Smarty version 2.6.13, created on 2017-03-18 14:48:40
         compiled from statystyki/statystyka-biuletyn.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'statystyki/statystyka-biuletyn.html', 20, false),)), $this); ?>
<div class="page-title"><h1><?php echo $this->_tpl_vars['pageTitle']; ?>
</h1></div>

<div class="page-content">
	<?php unset($this->_sections['m']);
$this->_sections['m']['name'] = 'm';
$this->_sections['m']['loop'] = is_array($_loop=$this->_tpl_vars['mail_tpl']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
	<?php if ($this->_sections['m']['first']): ?>
		<table class="special" cellspacing="1">
		<thead>
			<tr>
				<td width="1%" align="center">Lp.</td>
				<td>Tytuł</td>
				<td>Data utworzenia</td>
				<td>Opis</td>
				<td>Wysłane</td>
				<td>Odebrane</td>
				<td>Kliknięte linki</td>
			</tr>
		</thead>
		<tbody>
		<?php endif; ?>
		<tr class="<?php echo smarty_function_cycle(array('values' => "shadow_dark,shadow_light"), $this);?>
">
			<td align="center"><?php echo $this->_sections['m']['iteration']+$this->_tpl_vars['interval']; ?>
.</td>
			<td><b><?php echo $this->_tpl_vars['mail_tpl'][$this->_sections['m']['index']]['name']; ?>
</b></td>
			<td><?php echo $this->_tpl_vars['mail_tpl'][$this->_sections['m']['index']]['date']; ?>
</td>
			<td><?php echo $this->_tpl_vars['mail_tpl'][$this->_sections['m']['index']]['description']; ?>
</td>
			<td class="center important"><strong><?php echo $this->_tpl_vars['mail_tpl'][$this->_sections['m']['index']]['send']; ?>
</strong></td>
			<td class="center important"><strong><?php echo $this->_tpl_vars['mail_tpl'][$this->_sections['m']['index']]['odebrano']; ?>
</strong></td>
			<td class="center important"><strong><?php echo $this->_tpl_vars['mail_tpl'][$this->_sections['m']['index']]['clik']; ?>
</strong></td>
		</tr>
		<?php if ($this->_sections['m']['last']): ?>
		</tbody>
		</table>
		<?php endif; ?>
	<?php endfor; else: ?>
		<p class="center error">Brak wpisów w bazie.</p>
	<?php endif; ?>
</div>