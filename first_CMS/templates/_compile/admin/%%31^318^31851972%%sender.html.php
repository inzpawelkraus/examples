<?php /* Smarty version 2.6.13, created on 2017-04-20 11:06:40
         compiled from newsletter/sender.html */ ?>
<div id="content-header">
    <div id="breadcrumb"> <a href="/admin" title="Panel" class="tip-bottom"><i class="icon-home"></i> Panel</a> <a>Newsletter</a><a class="current">Wysyłka</a> </div>
    <h1><?php echo $this->_tpl_vars['pageTitle']; ?>
</h1>
</div>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="alert alert-success">
            <?php echo $this->_tpl_vars['i']; ?>

            Wysłano <b>11</b> wiadomości.
        </div>

<!--        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                <h5>Wczytaj szablon wiadomości</h5>
            </div>
            <div class="widget-content nopadding">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
" class="form-horizontal">
                    <div class="control-group">
                        <label class="control-label">Dostępne szablony: </label>
                        <div class="controls">
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
                            <?php if ($this->_sections['m']['first']): ?><select name="template">
                                <option value=""<?php if ($_POST['template'] == ''): ?> selected="true"<?php endif; ?>>- wybierz -</option>
                                <?php endif; ?>
                                <option value="<?php echo $this->_tpl_vars['mail_tpl'][$this->_sections['m']['index']]['id']; ?>
"<?php if ($_POST['template'] == "'{".($this->_tpl_vars['mail_tpl'][$this->_sections['m']['index']]).".id"): ?>'} selected="true"<?php endif; ?>><?php echo $this->_tpl_vars['mail_tpl'][$this->_sections['m']['index']]['name']; ?>
</option>
                                <?php if ($this->_sections['m']['last']): ?></select>
                            <?php endif; ?>
                            <?php endfor; endif; ?>
                        </div>
                    </div>
                    <div class="form-actions">
                        <input class="btn btn-success" type="submit" value="Wczytaj" />
                        <input type="hidden" name="action" value="load_template" />
                    </div>
                </form>
            </div>
        </div>-->


<!--        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                <h5>Wysyłka</h5>
            </div>
            <div class="widget-content nopadding">-->
                <!--                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
" class="form-horizontal">
                                    <div class="control-group">
                                        <label class="control-label">Dostępne szablony: </label>
                                        <div class="controls">
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
                                            <?php if ($this->_sections['m']['first']): ?><select name="template">
                                                <option value=""<?php if ($_POST['template'] == ''): ?> selected="true"<?php endif; ?>>- wybierz -</option>
                                                <?php endif; ?>
                                                <option value="<?php echo $this->_tpl_vars['mail_tpl'][$this->_sections['m']['index']]['id']; ?>
"<?php if ($_POST['template'] == "'{".($this->_tpl_vars['mail_tpl'][$this->_sections['m']['index']]).".id"): ?>'} selected="true"<?php endif; ?>><?php echo $this->_tpl_vars['mail_tpl'][$this->_sections['m']['index']]['name']; ?>
</option>
                                                <?php if ($this->_sections['m']['last']): ?></select>
                                            <?php endif; ?>
                                            <?php endfor; endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <input class="btn btn-success" type="submit" value="Wczytaj.." />
                                        <input type="hidden" name="action" value="load_template" />
                                    </div>
                                </form>-->
<!--                <form method="post" class="form-horizontal">
                    <div class="control-group">
                        <label class="control-label">Wyślij do:</label>
                        <div class="controls">
                            <input type="radio" name="send" value="all" id="send_all"/> Wszystkich zapisanych<br />
                            <input type="radio" name="send" value="one" id="send_one"/> Na podany adres
                            <div id="send_one_email">
                                Podaj adres, na jaki wysłać biuletyn: <input class="text" type="text" name="email" size="20" />	
                            </div>

                                                    </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Tytuł biuletynu:</label>
                        <div class="controls">
                            <input class="text" type="text" name="mailing_subject" size="70" value="<?php echo $this->_tpl_vars['template']['name']; ?>
" <?php if ($this->_tpl_vars['template']): ?>readonly<?php endif; ?>/><br />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Treść:</label>
                        <div class="controls">
                            <?php if ($this->_tpl_vars['template']): ?>
                            <div style="height:300px; overflow:auto; border:1px solid #ccc; padding:5px;">
                                <?php echo $this->_tpl_vars['template']['value_org']; ?>
                  
                            </div>
                            <input type="hidden" name="mailing_content" value="<?php echo $this->_tpl_vars['template']['value']; ?>
"/>
                            <?php else: ?>
                            <textarea id="edytor" name="mailing_content" ><?php echo $this->_tpl_vars['template']['value']; ?>
</textarea>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-actions">
                        <input type="hidden" name="action" value="send" />	
                        <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['template']['id']; ?>
" />
                        <input type="hidden" name="date_add" value="<?php echo $this->_tpl_vars['template']['date_add']; ?>
" />
                        <input class="btn btn-success" type="submit" value="Wyślij biuletyn" />
                    </div>
                </form>
            </div>
        </div>-->




    </div>
</div>