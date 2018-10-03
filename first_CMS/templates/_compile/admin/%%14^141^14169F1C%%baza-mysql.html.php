<?php /* Smarty version 2.6.13, created on 2017-05-16 11:32:35
         compiled from misc/baza-mysql.html */ ?>
<div id="content-header">
    <div id="breadcrumb"> <a href="/admin" title="Panel" class="tip-bottom"><i class="icon-home"></i> Panel</a> <a>Ustawienia</a><a class="current">MySQL</a> </div>
    <h1><?php echo $this->_tpl_vars['pageTitle']; ?>
</h1>
</div>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="alert alert-info">
            Automatyczny zrzut bazy danych wykonywany jest raz w miesiącu. Aby exportować bazę danych ręcznie do pliku należy użyć funkcji poniżej EXPORT. 
            Dostępne pliki można również pobrać.
        </div>
        <form class="formularz" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
" class="form-horizontal">
            <div class="form-actions">
                <input class="btn btn-info" type="submit" onclick="javascript:loaddiv();" value="Zrób kopie bazy" />	
            </div>
            <input type="hidden" name="action" value="export" />
        </form>
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                <h5>Lista plików zawierających zrzuty bazy danych. Nazwa pliku określa datę utworzenie kopii bazy danych.</h5>
            </div>
            <div class="widget-content nopadding">
                <div class="widget-content">
                    <div class="row-fluid">
                        <div class="span12 btn-icon-pg">
                            <ul>
                                <?php unset($this->_sections['f']);
$this->_sections['f']['name'] = 'f';
$this->_sections['f']['loop'] = is_array($_loop=$this->_tpl_vars['file']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['f']['show'] = true;
$this->_sections['f']['max'] = $this->_sections['f']['loop'];
$this->_sections['f']['step'] = 1;
$this->_sections['f']['start'] = $this->_sections['f']['step'] > 0 ? 0 : $this->_sections['f']['loop']-1;
if ($this->_sections['f']['show']) {
    $this->_sections['f']['total'] = $this->_sections['f']['loop'];
    if ($this->_sections['f']['total'] == 0)
        $this->_sections['f']['show'] = false;
} else
    $this->_sections['f']['total'] = 0;
if ($this->_sections['f']['show']):

            for ($this->_sections['f']['index'] = $this->_sections['f']['start'], $this->_sections['f']['iteration'] = 1;
                 $this->_sections['f']['iteration'] <= $this->_sections['f']['total'];
                 $this->_sections['f']['index'] += $this->_sections['f']['step'], $this->_sections['f']['iteration']++):
$this->_sections['f']['rownum'] = $this->_sections['f']['iteration'];
$this->_sections['f']['index_prev'] = $this->_sections['f']['index'] - $this->_sections['f']['step'];
$this->_sections['f']['index_next'] = $this->_sections['f']['index'] + $this->_sections['f']['step'];
$this->_sections['f']['first']      = ($this->_sections['f']['iteration'] == 1);
$this->_sections['f']['last']       = ($this->_sections['f']['iteration'] == $this->_sections['f']['total']);
?>
                                <a href="?action=pobierz&amp;name=<?php echo $this->_tpl_vars['file'][$this->_sections['f']['index']]['name']; ?>
"><li><i class="icon-download"></i>  <?php echo $this->_tpl_vars['file'][$this->_sections['f']['index']]['name']; ?>
 - [<?php echo $this->_tpl_vars['file'][$this->_sections['f']['index']]['size']; ?>
 kB]</li></a>
                                <?php endfor; else: ?>
                                <div class="alert alert-warning">
                                    Brak szablonów w bazie!
                                </div>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="alert alert-info">
            Import danych z pliku do bazy, należy wybrać odpowiedni plik i użyć funkcji IMPORT.
        </div>
        <form class="formularz" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
" class="form-horizontal">
            <div class="control-group">
                <label class="control-label">Kopie bazy :</label>
                <div class="controls">
                    <select name="name_file">
                        <option value="0">Wybierz plik</option>
                        <?php unset($this->_sections['ff']);
$this->_sections['ff']['name'] = 'ff';
$this->_sections['ff']['loop'] = is_array($_loop=$this->_tpl_vars['file']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['ff']['show'] = true;
$this->_sections['ff']['max'] = $this->_sections['ff']['loop'];
$this->_sections['ff']['step'] = 1;
$this->_sections['ff']['start'] = $this->_sections['ff']['step'] > 0 ? 0 : $this->_sections['ff']['loop']-1;
if ($this->_sections['ff']['show']) {
    $this->_sections['ff']['total'] = $this->_sections['ff']['loop'];
    if ($this->_sections['ff']['total'] == 0)
        $this->_sections['ff']['show'] = false;
} else
    $this->_sections['ff']['total'] = 0;
if ($this->_sections['ff']['show']):

            for ($this->_sections['ff']['index'] = $this->_sections['ff']['start'], $this->_sections['ff']['iteration'] = 1;
                 $this->_sections['ff']['iteration'] <= $this->_sections['ff']['total'];
                 $this->_sections['ff']['index'] += $this->_sections['ff']['step'], $this->_sections['ff']['iteration']++):
$this->_sections['ff']['rownum'] = $this->_sections['ff']['iteration'];
$this->_sections['ff']['index_prev'] = $this->_sections['ff']['index'] - $this->_sections['ff']['step'];
$this->_sections['ff']['index_next'] = $this->_sections['ff']['index'] + $this->_sections['ff']['step'];
$this->_sections['ff']['first']      = ($this->_sections['ff']['iteration'] == 1);
$this->_sections['ff']['last']       = ($this->_sections['ff']['iteration'] == $this->_sections['ff']['total']);
?>
                        <option value="<?php echo $this->_tpl_vars['file'][$this->_sections['ff']['index']]['name']; ?>
"><?php echo $this->_tpl_vars['file'][$this->_sections['ff']['index']]['name']; ?>
</option>
                        <?php endfor; endif; ?>
                    </select>
                </div>
            </div>
            <input class="btn btn-success" type="submit" onclick="javascript:loaddiv();" value="Importuj" />	
            <input type="hidden" name="action" value="import" />
        </form>
    </div> 
</div> 