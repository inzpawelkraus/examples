<?php /* Smarty version 2.6.13, created on 2017-04-19 15:14:06
         compiled from misc/zmieniarka.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'math', 'misc/zmieniarka.html', 16, false),)), $this); ?>
<?php echo '
    <script type="text/javascript">
        $(\'#zmieniarka-';  echo $this->_tpl_vars['label'];  echo '\').cycle({
            fx: \'';  echo $this->_tpl_vars['fx'];  echo '\',
            speed: ';  echo $this->_tpl_vars['speed'];  echo ',
            timeout: ';  echo $this->_tpl_vars['timeout'];  echo ',
            pause: ';  echo $this->_tpl_vars['pause'];  echo ',
            delay: ';  echo $this->_tpl_vars['delay'];  echo ',
            slideExpr: \'.zmieniarka-';  echo $this->_tpl_vars['label'];  echo '-item\'
        });
    </script>
'; ?>



    <?php unset($this->_sections['zz']);
$this->_sections['zz']['name'] = 'zz';
$this->_sections['zz']['loop'] = is_array($_loop=$this->_tpl_vars['zmieniarka']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['zz']['show'] = true;
$this->_sections['zz']['max'] = $this->_sections['zz']['loop'];
$this->_sections['zz']['step'] = 1;
$this->_sections['zz']['start'] = $this->_sections['zz']['step'] > 0 ? 0 : $this->_sections['zz']['loop']-1;
if ($this->_sections['zz']['show']) {
    $this->_sections['zz']['total'] = $this->_sections['zz']['loop'];
    if ($this->_sections['zz']['total'] == 0)
        $this->_sections['zz']['show'] = false;
} else
    $this->_sections['zz']['total'] = 0;
if ($this->_sections['zz']['show']):

            for ($this->_sections['zz']['index'] = $this->_sections['zz']['start'], $this->_sections['zz']['iteration'] = 1;
                 $this->_sections['zz']['iteration'] <= $this->_sections['zz']['total'];
                 $this->_sections['zz']['index'] += $this->_sections['zz']['step'], $this->_sections['zz']['iteration']++):
$this->_sections['zz']['rownum'] = $this->_sections['zz']['iteration'];
$this->_sections['zz']['index_prev'] = $this->_sections['zz']['index'] - $this->_sections['zz']['step'];
$this->_sections['zz']['index_next'] = $this->_sections['zz']['index'] + $this->_sections['zz']['step'];
$this->_sections['zz']['first']      = ($this->_sections['zz']['iteration'] == 1);
$this->_sections['zz']['last']       = ($this->_sections['zz']['iteration'] == $this->_sections['zz']['total']);
?>
        <img class="zmieniarka-<?php echo $this->_tpl_vars['label']; ?>
-item zmieniarka-<?php echo $this->_tpl_vars['label']; ?>
-size" alt="<?php echo $this->_tpl_vars['zmieniarka'][$this->_sections['zz']['index']]['alt']; ?>
" src="<?php echo $this->_tpl_vars['zmieniarka'][$this->_sections['zz']['index']]['src']['photo']; ?>
?<?php echo smarty_function_math(array('equation' => 'rand(0, 10000)'), $this);?>
" />
    <?php endfor; endif; ?>