<?php /* Smarty version 2.6.13, created on 2017-03-18 10:14:48
         compiled from statystyki/logowania-panel.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'statystyki/logowania-panel.html', 23, false),)), $this); ?>
<div id="content-header">
    <div id="breadcrumb"> <a href="/admin" title="Panel" class="tip-bottom"><i class="icon-home"></i> Panel</a> <a>Statystyki</a><a class="current">Logowania do Panelu</a> </div>
    <h1><?php echo $this->_tpl_vars['pageTitle']; ?>
</h1>
</div>
<div class="container-fluid">
    <?php unset($this->_sections['l']);
$this->_sections['l']['name'] = 'l';
$this->_sections['l']['loop'] = is_array($_loop=$this->_tpl_vars['log']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['l']['show'] = true;
$this->_sections['l']['max'] = $this->_sections['l']['loop'];
$this->_sections['l']['step'] = 1;
$this->_sections['l']['start'] = $this->_sections['l']['step'] > 0 ? 0 : $this->_sections['l']['loop']-1;
if ($this->_sections['l']['show']) {
    $this->_sections['l']['total'] = $this->_sections['l']['loop'];
    if ($this->_sections['l']['total'] == 0)
        $this->_sections['l']['show'] = false;
} else
    $this->_sections['l']['total'] = 0;
if ($this->_sections['l']['show']):

            for ($this->_sections['l']['index'] = $this->_sections['l']['start'], $this->_sections['l']['iteration'] = 1;
                 $this->_sections['l']['iteration'] <= $this->_sections['l']['total'];
                 $this->_sections['l']['index'] += $this->_sections['l']['step'], $this->_sections['l']['iteration']++):
$this->_sections['l']['rownum'] = $this->_sections['l']['iteration'];
$this->_sections['l']['index_prev'] = $this->_sections['l']['index'] - $this->_sections['l']['step'];
$this->_sections['l']['index_next'] = $this->_sections['l']['index'] + $this->_sections['l']['step'];
$this->_sections['l']['first']      = ($this->_sections['l']['iteration'] == 1);
$this->_sections['l']['last']       = ($this->_sections['l']['iteration'] == $this->_sections['l']['total']);
?>
    <?php if ($this->_sections['l']['first']): ?>
    <table class="special" cellspacing="1">
        <thead>
            <tr>
                <td width="1%" align="center">Lp.</td>
                <td>Login</td>
                <td>Imię</td>
                <td>Nazwisko</td>
                <td>ID użytkownika</td>
                <td>Grupa</td>
                <td>Data</td>
                <td>Host</td>
            </tr>
        </thead>
        <tbody>
            <?php endif; ?>
            <tr class="<?php echo smarty_function_cycle(array('values' => "shadow_dark,shadow_light"), $this);?>
">
                <td align="center"><?php echo $this->_sections['l']['iteration']+$this->_tpl_vars['interval']; ?>
.</td>
                 <td><b><?php echo $this->_tpl_vars['log'][$this->_sections['l']['index']]['login']; ?>
</b></td>
                 <td><?php echo $this->_tpl_vars['log'][$this->_sections['l']['index']]['first_name']; ?>
</td>
                 <td><?php echo $this->_tpl_vars['log'][$this->_sections['l']['index']]['last_name']; ?>
</td>	
                 <td class="center"><span class="not-important"><?php echo $this->_tpl_vars['log'][$this->_sections['l']['index']]['user_id']; ?>
</span></td>
                 <td class="center"><span class="not-important"><?php echo $this->_tpl_vars['log'][$this->_sections['l']['index']]['group_id']; ?>
</span></td>
                 <td class="center"><span class="not-important"><?php echo $this->_tpl_vars['log'][$this->_sections['l']['index']]['date_add']; ?>
</span></td>
                 <td class="center"><?php echo $this->_tpl_vars['log'][$this->_sections['l']['index']]['host']; ?>
</td>
             </tr>
             <?php if ($this->_sections['l']['last']): ?>
            </tbody>
        </table>
        <?php endif; ?>
        <?php endfor; else: ?>
        <p class="center error">Brak wpisów w bazie.</p>
        <?php endif; ?>

        <?php if ($this->_tpl_vars['pages'] > 1): ?>
        <div class="center">
            <?php if ($this->_tpl_vars['page'] > 1): ?>
            <a class="link" href="?page=<?php echo $this->_tpl_vars['page']-1; ?>
&amp;type=<?php echo $_GET['type']; ?>
">&laquo; Poprzednia</a>
            <?php else: ?>
            <span class="inactive">&laquo; Poprzednia</span>
            <?php endif; ?>
            | <?php unset($this->_sections['p']);
$this->_sections['p']['name'] = 'p';
$this->_sections['p']['start'] = (int)1;
$this->_sections['p']['loop'] = is_array($_loop=$this->_tpl_vars['pages']+1) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['p']['show'] = true;
$this->_sections['p']['max'] = $this->_sections['p']['loop'];
$this->_sections['p']['step'] = 1;
if ($this->_sections['p']['start'] < 0)
    $this->_sections['p']['start'] = max($this->_sections['p']['step'] > 0 ? 0 : -1, $this->_sections['p']['loop'] + $this->_sections['p']['start']);
else
    $this->_sections['p']['start'] = min($this->_sections['p']['start'], $this->_sections['p']['step'] > 0 ? $this->_sections['p']['loop'] : $this->_sections['p']['loop']-1);
if ($this->_sections['p']['show']) {
    $this->_sections['p']['total'] = min(ceil(($this->_sections['p']['step'] > 0 ? $this->_sections['p']['loop'] - $this->_sections['p']['start'] : $this->_sections['p']['start']+1)/abs($this->_sections['p']['step'])), $this->_sections['p']['max']);
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
            <?php $this->assign('i', $this->_sections['p']['index']); ?>
            <?php if ($this->_tpl_vars['i'] == $this->_tpl_vars['page']): ?><span class="inactive"> <?php echo $this->_tpl_vars['page']; ?>
 </span><?php else: ?>
            <a class="link" href="?page=<?php echo $this->_tpl_vars['i']; ?>
&amp;type=<?php echo $_GET['type']; ?>
"> <?php echo $this->_tpl_vars['i']; ?>
 </a><?php endif; ?>
            <?php endfor; endif; ?> | 
            <?php if ($this->_tpl_vars['page'] < $this->_tpl_vars['pages']): ?>
            <a class="link" href="?page=<?php echo $this->_tpl_vars['page']+1; ?>
&amp;type=<?php echo $_GET['type']; ?>
">Następna &raquo;</a>
            <?php else: ?>
            <span class="inactive">Następna &raquo;</span>
            <?php endif; ?>
        </div>
        <?php endif; ?>
    </div>