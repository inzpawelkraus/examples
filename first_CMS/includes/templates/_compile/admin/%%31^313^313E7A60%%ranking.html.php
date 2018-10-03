<?php /* Smarty version 2.6.13, created on 2017-04-10 21:01:14
         compiled from misc/ranking.html */ ?>
<div id="content-header">
    <div id="breadcrumb"> <a href="/admin" title="Panel" class="tip-bottom"><i class="icon-home"></i> Panel</a> <a>Ustawienia</a><a class="current">Frazy Google</a> </div>
    <h1><?php echo $this->_tpl_vars['pageTitle']; ?>
</h1>
</div>
<div class="container-fluid">
    <div class="alert alert-info">
        Ranking pozycji w Google na podane frazy (słowa kluczowe), max można dodać 10 fraz.<br />
        System automatycznie sprawdza pozycję w wyszukiwarce google i zapisuje dane do systemu.
    </div>
    <div class="alert alert-<?php if ($this->_tpl_vars['CONF']['check_google'] == 1): ?>success<?php else: ?>warning<?php endif; ?>">
        Aktualnie automat sprawdzający jest: <?php if ($this->_tpl_vars['CONF']['check_google'] == 1): ?><strong class="not-important">włączony</strong><?php else: ?><strong class="important">wyłączony</strong><?php endif; ?> dla domeny: <strong><?php echo $this->_tpl_vars['CONF']['server_addr']; ?>
</strong>
    </div>
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"><i class="icon-list-ul"></i></span>
            <h5>Aktualności serwisu</h5>
        </div>
        <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="40">Lp.</th>
                        <th>Fraza</th>
                        <th>Pozycja</th>
                        <th></th>
                        <th>Opcje</th>
                    </tr>
                </thead>
                <tbody>
                    <?php unset($this->_sections['aa']);
$this->_sections['aa']['name'] = 'aa';
$this->_sections['aa']['loop'] = is_array($_loop=$this->_tpl_vars['anchory']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                    <tr class="shadow_light">
                        <td style="text-align: center"><?php echo $this->_sections['aa']['iteration']; ?>
</td>
                        <td><a href="./ranking.php?id=<?php echo $this->_tpl_vars['anchory'][$this->_sections['aa']['index']]['id']; ?>
&action=pokaz" title="Pokaż wyniki"><?php echo $this->_tpl_vars['anchory'][$this->_sections['aa']['index']]['anchor']; ?>
</a></td>
                        <td class="center"><strong><?php echo $this->_tpl_vars['anchory'][$this->_sections['aa']['index']]['pozycja']; ?>
</strong></td>
                        <td>
                            <div id="edit_<?php echo $this->_tpl_vars['anchory'][$this->_sections['aa']['index']]['id']; ?>
" style="display: none;">
                                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
" class="form-horizontal">
                                    <div class="control-group">
                                        <label class="control-label">&nbsp;</label>
                                        <div class="controls">
                                            <input class="text" type="text" name="anchor" value="<?php echo $this->_tpl_vars['anchory'][$this->_sections['aa']['index']]['anchor']; ?>
" />
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <input type="hidden" name="action" value="edit_anchor" />
                                        <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['anchory'][$this->_sections['aa']['index']]['id']; ?>
" />
                                        <input class="btn btn-success" type="submit" name="submit" value="Zapisz" />
                                    </div>
                                </form>
                            </div>
                        </td>
                        <td width='130' style="text-align: center">
                            <a class="btn btn"  href="./ranking.php?id=<?php echo $this->_tpl_vars['anchory'][$this->_sections['aa']['index']]['id']; ?>
&action=pokaz" title="Pokaż wyniki">
                                <i class="icon-bar-chart"></i>
                            </a>
                            <a class="btn btn" href="#" onclick="toggle('edit_<?php echo $this->_tpl_vars['anchory'][$this->_sections['aa']['index']]['id']; ?>
'); return false;" title="Edytuj">
                                <i class="icon-edit"></i>
                            </a>		
                            <a class="btn btn"  href="./ranking.php?id=<?php echo $this->_tpl_vars['anchory'][$this->_sections['aa']['index']]['id']; ?>
&action=del_anchor" title="Kasuj">
                                <i class="icon-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endfor; else: ?>
                    <tr><td colspan="4">Brak pozycji.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <?php if ($this->_tpl_vars['liczba'] < 10): ?>
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                <h5>Dodaj nową frazę</h5>
            </div>
            <div class="widget-content nopadding">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
" class="form-horizontal">
                    <div class="control-group">
                        <label class="control-label">Fraza :</label>
                        <div class="controls">
                            <input class="text" type="text" name="anchor" />
                        </div>
                    </div>
                    <div class="form-actions">
                        <input type="hidden" name="action" value="add_anchor" />
                        <input class="btn btn-success" type="submit" value="Dodaj" />
                    </div>
                </form>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php echo '
<script>
    function toggle(e)
    {
	$("#" + e).slideToggle();
    }
</script>
'; ?>