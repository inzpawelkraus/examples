<?php /* Smarty version 2.6.13, created on 2017-05-09 15:14:08
         compiled from galeria/edytuj.html */ ?>
<div id="content-header">
    <div id="breadcrumb"> <a href="/admin" title="Panel" class="tip-bottom"><i class="icon-home"></i> Panel</a> <a>Galeria</a><a class="current">Edycja</a> </div>
    <h1><?php echo $this->_tpl_vars['pageTitle']; ?>
</h1>
</div>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                <h5>Formularz edycji galerii</h5>
            </div>
            <div class="widget-content nopadding">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
" enctype="multipart/form-data" class="form-horizontal">
                    <table class="special" cellspacing="1" cellpadding="0">

                        <!--				<div id="opcje" class="hidden">
                                            <div class="seo-title"><strong>Opcje TITLE:</strong><br /><small>możliwość wyboru odpowiedniego TITLE w nagłówku strony</small></div>
                                            <input type="radio" id="ot1" name="op_page_title" value="1" <?php if ($this->_tpl_vars['article']['op_page_title'] == '1'): ?>checked="checked" <?php endif; ?> />
                                            <label for="ot1">Konfiguracja główna CMS</label>
                                            <div class="seo-konf"><?php echo $this->_tpl_vars['CONF']['page_title']; ?>
</div>
                                            <input type="radio" id="ot2" name="op_page_title" value="2" <?php if ($this->_tpl_vars['article']['op_page_title'] == '2'): ?>checked="checked" <?php endif; ?> />
                                            <label for="ot2">Automatyczna z tytułu strony</label><br />
                                            <input type="radio" id="ot3" name="op_page_title" value="3" <?php if ($this->_tpl_vars['article']['op_page_title'] == '3'): ?>checked="checked" <?php endif; ?> />
                                            <label for="ot3">Automatyczna z tytułu strony + Konfiguracja główna CMS</label><br />
                                            <input type="radio" id="ot4" name="op_page_title" value="4" <?php if ($this->_tpl_vars['article']['op_page_title'] == '4'): ?>checked="checked" <?php endif; ?> />
                                            <label for="ot4">Ręczna [proszę niżej wpisać tekst]</label><br />
                                            <input type="radio" id="ot5" name="op_page_title" value="5" <?php if ($this->_tpl_vars['article']['op_page_title'] == '5'): ?>checked="checked" <?php endif; ?> />
                                            <label for="ot5">Ręczna [proszę niżej wpisać tekst] + Konfiguracja główna CMS</label><br />
                                            <textarea class="seo-konf" name="page_title"><?php echo $this->_tpl_vars['article']['page_title']; ?>
</textarea><br />
                                            
                                            <div class="seo-title"><strong>Opcje KEYWORDS:</strong><br /><small>możliwość wyboru odpowiedniego KEYWORDS w nagłówku strony</small></div>
                                            <input type="radio" id="ok1" name="op_page_keywords" value="1" <?php if ($this->_tpl_vars['article']['op_page_keywords'] == '1'): ?>checked="checked" <?php endif; ?> />
                                            <label for="ok1">Konfiguracja główna CMS</label>
                                            <div class="seo-konf"><?php echo $this->_tpl_vars['CONF']['page_keywords']; ?>
</div>
                                            <input type="radio" id="ok2" name="op_page_keywords" value="2" <?php if ($this->_tpl_vars['article']['op_page_keywords'] == '2'): ?>checked="checked" <?php endif; ?> />
                                            <label for="ok2">Automatyczna z tytułu strony</label><br />
                                            <input type="radio" id="ok3" name="op_page_keywords" value="3" <?php if ($this->_tpl_vars['article']['op_page_keywords'] == '3'): ?>checked="checked" <?php endif; ?> />
                                            <label for="ok3">Automatyczna z tytułu strony + Konfiguracja główna CMS</label><br />
                                            <input type="radio" id="ok4" name="op_page_keywords" value="4" <?php if ($this->_tpl_vars['article']['op_page_keywords'] == '4'): ?>checked="checked" <?php endif; ?> />
                                            <label for="ok4">Ręczna [proszę niżej wpisać tekst, frazy odzielone przecinkami]</label><br />
                                            <input type="radio" id="ok5" name="op_page_keywords" value="5" <?php if ($this->_tpl_vars['article']['op_page_keywords'] == '5'): ?>checked="checked" <?php endif; ?> />
                                            <label for="ok5">Ręczna [proszę niżej wpisać tekst, frazy odzielone przecinkami] + Konfiguracja główna CMS</label><br />
                                            <textarea class="seo-konf" name="page_keywords"><?php echo $this->_tpl_vars['article']['page_keywords']; ?>
</textarea><br />
                                            
                                            <div class="seo-title"><strong>Opcje DESCRIPTION:</strong><br /><small>możliwość wyboru odpowiedniego DESCRIPTION w nagłówku strony</small></div>
                                            <input type="radio" id="od1" name="op_page_description" value="1" <?php if ($this->_tpl_vars['article']['op_page_description'] == '1'): ?>checked="checked" <?php endif; ?> />
                                            <label for="od1">Konfiguracja główna CMS</label>
                                            <div class="seo-konf"><?php echo $this->_tpl_vars['CONF']['page_description']; ?>
</div>
                                            <input type="radio" id="od2" name="op_page_description" value="2" <?php if ($this->_tpl_vars['article']['op_page_description'] == '2'): ?>checked="checked" <?php endif; ?> />
                                            <label for="od2">Automatyczna z tytułu strony</label><br />
                                            <input type="radio" id="od3" name="op_page_description" value="3" <?php if ($this->_tpl_vars['article']['op_page_description'] == '3'): ?>checked="checked" <?php endif; ?> />
                                            <label for="od3">Automatyczna z tytułu strony + Konfiguracja główna CMS</label><br />
                                            <input type="radio" id="od4" name="op_page_description" value="4" <?php if ($this->_tpl_vars['article']['op_page_description'] == '4'): ?>checked="checked" <?php endif; ?> />
                                            <label for="od4">Automatyczna z treści strony</label><br />
                                            <input type="radio" id="od5" name="op_page_description" value="5" <?php if ($this->_tpl_vars['article']['op_page_description'] == '5'): ?>checked="checked" <?php endif; ?> />
                                            <label for="od5">Automatyczna z treści strony + Konfiguracja główna CMS</label><br />
                                            <input type="radio" id="od6" name="op_page_description" value="6" <?php if ($this->_tpl_vars['article']['op_page_description'] == '6'): ?>checked="checked" <?php endif; ?> />
                                            <label for="od6">Ręczna [proszę niżej wpisać tekst]</label><br />
                                            <input type="radio" id="od7" name="op_page_description" value="7" <?php if ($this->_tpl_vars['article']['op_page_description'] == '7'): ?>checked="checked" <?php endif; ?> />
                                            <label for="od7">Ręczna [proszę niżej wpisać tekst] + Konfiguracja główna CMS</label><br />
                                            <textarea class="seo-konf" name="page_description"><?php echo $this->_tpl_vars['article']['page_description']; ?>
</textarea><br />
                        
                                        </div>-->

                        <div class="control-group">
                            <label class="control-label">Tytuł galerii :</label>
                            <div class="controls">
                                <?php unset($this->_sections['j1']);
$this->_sections['j1']['name'] = 'j1';
$this->_sections['j1']['loop'] = is_array($_loop=$this->_tpl_vars['JEZYK']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['j1']['show'] = true;
$this->_sections['j1']['max'] = $this->_sections['j1']['loop'];
$this->_sections['j1']['step'] = 1;
$this->_sections['j1']['start'] = $this->_sections['j1']['step'] > 0 ? 0 : $this->_sections['j1']['loop']-1;
if ($this->_sections['j1']['show']) {
    $this->_sections['j1']['total'] = $this->_sections['j1']['loop'];
    if ($this->_sections['j1']['total'] == 0)
        $this->_sections['j1']['show'] = false;
} else
    $this->_sections['j1']['total'] = 0;
if ($this->_sections['j1']['show']):

            for ($this->_sections['j1']['index'] = $this->_sections['j1']['start'], $this->_sections['j1']['iteration'] = 1;
                 $this->_sections['j1']['iteration'] <= $this->_sections['j1']['total'];
                 $this->_sections['j1']['index'] += $this->_sections['j1']['step'], $this->_sections['j1']['iteration']++):
$this->_sections['j1']['rownum'] = $this->_sections['j1']['iteration'];
$this->_sections['j1']['index_prev'] = $this->_sections['j1']['index'] - $this->_sections['j1']['step'];
$this->_sections['j1']['index_next'] = $this->_sections['j1']['index'] + $this->_sections['j1']['step'];
$this->_sections['j1']['first']      = ($this->_sections['j1']['iteration'] == 1);
$this->_sections['j1']['last']       = ($this->_sections['j1']['iteration'] == $this->_sections['j1']['total']);
?>
                                <input class="text title" type="text" name="title[<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j1']['index']]['id']; ?>
]" placeholder="<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j1']['index']]['name']; ?>
" value="<?php echo $this->_tpl_vars['opis'][$this->_sections['j1']['index']]['title']; ?>
" />
                                <input type="hidden" name="old_title_url[<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j1']['index']]['id']; ?>
]" value="<?php echo $this->_tpl_vars['opis'][$this->_sections['j1']['index']]['title_url']; ?>
" /> 
                                <?php endfor; endif; ?>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Szerokość miniaturki :</label>
                            <div class="controls">
                                <input class="text" type="text" name="width" value="<?php echo $this->_tpl_vars['article']['width']; ?>
" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Wysokość miniaturki :</label>
                            <div class="controls">
                                <input class="text" type="text" name="height" value="<?php echo $this->_tpl_vars['article']['height']; ?>
" />
                            </div>
                        </div>
                        <!--                        <tr <?php if ($_SESSION['user']['admin'] != 1): ?>style="display:none;"<?php endif; ?>><th>Szerokość miniaturki:</th></tr>
                                                <tr <?php if ($_SESSION['user']['admin'] != 1): ?>style="display:none;"<?php endif; ?>><td><input class="text" type="text" name="width" value="<?php echo $this->_tpl_vars['article']['width']; ?>
" /><br /></td></tr>
                                                <tr <?php if ($_SESSION['user']['admin'] != 1): ?>style="display:none;"<?php endif; ?>><th>Wysokość miniaturki:</th></tr>
                                                <tr <?php if ($_SESSION['user']['admin'] != 1): ?>style="display:none;"<?php endif; ?>><td><input class="text" type="text" name="height" value="<?php echo $this->_tpl_vars['article']['height']; ?>
" /><br /></td></tr>
                                                <tr <?php if ($_SESSION['user']['admin'] != 1): ?>style="display:none;"<?php endif; ?>><td>Wpisanie dwóch wymiarów spowoduje skalowanie miniaturek wg dłuższego boku. Ustawienie jednego z wymiarów na '0' spowoduje tworzenie miniaturek
                                                        o zadanym drugim wymiarze.</td></tr>
                                                <tr <?php if ($_SESSION['user']['admin'] != 1): ?>style="display:none;"<?php endif; ?>><th>Kadrowanie:</th></tr>
                                                <tr <?php if ($_SESSION['user']['admin'] != 1): ?>style="display:none;"<?php endif; ?>><td><input id="kadruj" type="checkbox" name="kadruj" value="1" <?php if ($this->_tpl_vars['article']['kadruj']): ?>checked="true" <?php endif; ?> /></td></tr>
                                                <tr <?php if ($_SESSION['user']['admin'] != 1): ?>style="display:none;"<?php endif; ?>><th>Znak wodny:</th></tr>
                                                <tr <?php if ($_SESSION['user']['admin'] != 1): ?>style="display:none;"<?php endif; ?>><td><input id="watermark" type="checkbox" name="watermark" value="1" <?php if ($this->_tpl_vars['article']['watermark']): ?>checked="true" <?php endif; ?> /></td></tr>
                                                <tr <?php if ($_SESSION['user']['admin'] != 1): ?>style="display:none;"<?php endif; ?>><th>Plik znaku wodnego:</th></tr>
                                                <tr <?php if ($_SESSION['user']['admin'] != 1): ?>style="display:none;"<?php endif; ?>><td><input class="text" type="text" name="watermark_file" value="<?php echo $this->_tpl_vars['article']['watermark_file']; ?>
" /></td></tr>
                                                <tr <?php if ($_SESSION['user']['admin'] != 1): ?>style="display:none;"<?php endif; ?>><th>Pozycja X znaku wodnego:</th></tr>
                                                <tr <?php if ($_SESSION['user']['admin'] != 1): ?>style="display:none;"<?php endif; ?>><td><input class="text" type="text" name="watermark_x" value="<?php echo $this->_tpl_vars['article']['watermark_x']; ?>
" /></td></tr>
                                                <tr <?php if ($_SESSION['user']['admin'] != 1): ?>style="display:none;"<?php endif; ?>><th>Pozycja Y znaku wodnego:</th></tr>
                                                <tr <?php if ($_SESSION['user']['admin'] != 1): ?>style="display:none;"<?php endif; ?>><td><input class="text" type="text" name="watermark_y" value="<?php echo $this->_tpl_vars['article']['watermark_y']; ?>
" /></td></tr>
                                                <tr <?php if ($_SESSION['user']['admin'] != 1): ?>style="display:none;"<?php endif; ?>><th>Punkt startowy znaku wodnego:</th></tr>
                                                <tr <?php if ($_SESSION['user']['admin'] != 1): ?>style="display:none;"<?php endif; ?>><td><select size="1" name="watermark_position">
                                                            <option value="1" <?php if ($this->_tpl_vars['article']['watermark_position'] == 1): ?>selected<?php endif; ?>>lewa góra</option>
                                                            <option value="2" <?php if ($this->_tpl_vars['article']['watermark_position'] == 2): ?>selected<?php endif; ?>>prawa góra</option>
                                                            <option value="3" <?php if ($this->_tpl_vars['article']['watermark_position'] == 3): ?>selected<?php endif; ?>>lewa dół</option>
                                                            <option value="4" <?php if ($this->_tpl_vars['article']['watermark_position'] == 4): ?>selected<?php endif; ?>>prawa dół</option>
                                                        </select></td></tr>-->


                        <div class="control-group">
                            <div class="controls">
                                <label>
                                    <input id="show_title" type="checkbox" name="show_title" value="1" checked="true" <?php if ($this->_tpl_vars['article']['show_title']): ?>checked="true" <?php endif; ?> />
                                           Pokazuj tytuł</label>
                                <label>
                                    <input id="active" type="checkbox" name="active" value="1" <?php if ($this->_tpl_vars['article']['active']): ?>checked="true" <?php endif; ?> />
                                           Aktywna</label>
                                <label>
                                    <input id="show_page" type="checkbox" name="show_page" value="1" <?php if ($this->_tpl_vars['article']['show_page']): ?>checked="true" <?php endif; ?> />
                                           Dołączana na stronach</label>
                                <label>
                                    <input type="checkbox" id="comments" name="comments" value="1" <?php if ($this->_tpl_vars['article']['comments']): ?>checked="true" <?php endif; ?> />
                                           Pozwól komentować</label>
                                <label>
                                    <input id="auth" type="checkbox" name="auth" value="1" <?php if ($this->_tpl_vars['article']['auth']): ?>checked="true" <?php endif; ?> />
                                           Dostępna dla zalogowanych</label>
                            </div>
                        </div>

                        <!--                        <?php unset($this->_sections['j2']);
$this->_sections['j2']['name'] = 'j2';
$this->_sections['j2']['loop'] = is_array($_loop=$this->_tpl_vars['JEZYK']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['j2']['show'] = true;
$this->_sections['j2']['max'] = $this->_sections['j2']['loop'];
$this->_sections['j2']['step'] = 1;
$this->_sections['j2']['start'] = $this->_sections['j2']['step'] > 0 ? 0 : $this->_sections['j2']['loop']-1;
if ($this->_sections['j2']['show']) {
    $this->_sections['j2']['total'] = $this->_sections['j2']['loop'];
    if ($this->_sections['j2']['total'] == 0)
        $this->_sections['j2']['show'] = false;
} else
    $this->_sections['j2']['total'] = 0;
if ($this->_sections['j2']['show']):

            for ($this->_sections['j2']['index'] = $this->_sections['j2']['start'], $this->_sections['j2']['iteration'] = 1;
                 $this->_sections['j2']['iteration'] <= $this->_sections['j2']['total'];
                 $this->_sections['j2']['index'] += $this->_sections['j2']['step'], $this->_sections['j2']['iteration']++):
$this->_sections['j2']['rownum'] = $this->_sections['j2']['iteration'];
$this->_sections['j2']['index_prev'] = $this->_sections['j2']['index'] - $this->_sections['j2']['step'];
$this->_sections['j2']['index_next'] = $this->_sections['j2']['index'] + $this->_sections['j2']['step'];
$this->_sections['j2']['first']      = ($this->_sections['j2']['iteration'] == 1);
$this->_sections['j2']['last']       = ($this->_sections['j2']['iteration'] == $this->_sections['j2']['total']);
?>
                                                <tr>
                                                    <th><img src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/img/<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j2']['index']]['directory']; ?>
/<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j2']['index']]['code']; ?>
.gif" alt="<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j2']['index']]['name']; ?>
" /> <small>[<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j2']['index']]['name']; ?>
]</small> <strong>Tagi:</strong><br /><small>tagi odzielone znakiem <b class="important">|</b> wstawiane pod artykułem jako linki</small></th>
                                                </tr><tr>
                                                    <td><input class="text tagi" type="text" name="tagi[<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j2']['index']]['id']; ?>
]" value="<?php echo $this->_tpl_vars['opis'][$this->_sections['j2']['index']]['tagi']; ?>
" />
                                                </tr>
                                                <?php endfor; endif; ?>-->

                        <div class="control-group">
                            <label class="control-label">Krótki opis :</label>
                            <div class="controls">
                                <?php unset($this->_sections['j3']);
$this->_sections['j3']['name'] = 'j3';
$this->_sections['j3']['loop'] = is_array($_loop=$this->_tpl_vars['JEZYK']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['j3']['show'] = true;
$this->_sections['j3']['max'] = $this->_sections['j3']['loop'];
$this->_sections['j3']['step'] = 1;
$this->_sections['j3']['start'] = $this->_sections['j3']['step'] > 0 ? 0 : $this->_sections['j3']['loop']-1;
if ($this->_sections['j3']['show']) {
    $this->_sections['j3']['total'] = $this->_sections['j3']['loop'];
    if ($this->_sections['j3']['total'] == 0)
        $this->_sections['j3']['show'] = false;
} else
    $this->_sections['j3']['total'] = 0;
if ($this->_sections['j3']['show']):

            for ($this->_sections['j3']['index'] = $this->_sections['j3']['start'], $this->_sections['j3']['iteration'] = 1;
                 $this->_sections['j3']['iteration'] <= $this->_sections['j3']['total'];
                 $this->_sections['j3']['index'] += $this->_sections['j3']['step'], $this->_sections['j3']['iteration']++):
$this->_sections['j3']['rownum'] = $this->_sections['j3']['iteration'];
$this->_sections['j3']['index_prev'] = $this->_sections['j3']['index'] - $this->_sections['j3']['step'];
$this->_sections['j3']['index_next'] = $this->_sections['j3']['index'] + $this->_sections['j3']['step'];
$this->_sections['j3']['first']      = ($this->_sections['j3']['iteration'] == 1);
$this->_sections['j3']['last']       = ($this->_sections['j3']['iteration'] == $this->_sections['j3']['total']);
?>
                                <textarea class="seo-konf" rows="6" name="content_short[<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j3']['index']]['id']; ?>
]" placeholder="<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j3']['index']]['name']; ?>
"><?php echo $this->_tpl_vars['opis'][$this->_sections['j3']['index']]['content_short']; ?>
</textarea>
                                <?php endfor; endif; ?>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Treść :</label>
                            <div class="controls">
                                <?php unset($this->_sections['j4']);
$this->_sections['j4']['name'] = 'j4';
$this->_sections['j4']['loop'] = is_array($_loop=$this->_tpl_vars['JEZYK']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['j4']['show'] = true;
$this->_sections['j4']['max'] = $this->_sections['j4']['loop'];
$this->_sections['j4']['step'] = 1;
$this->_sections['j4']['start'] = $this->_sections['j4']['step'] > 0 ? 0 : $this->_sections['j4']['loop']-1;
if ($this->_sections['j4']['show']) {
    $this->_sections['j4']['total'] = $this->_sections['j4']['loop'];
    if ($this->_sections['j4']['total'] == 0)
        $this->_sections['j4']['show'] = false;
} else
    $this->_sections['j4']['total'] = 0;
if ($this->_sections['j4']['show']):

            for ($this->_sections['j4']['index'] = $this->_sections['j4']['start'], $this->_sections['j4']['iteration'] = 1;
                 $this->_sections['j4']['iteration'] <= $this->_sections['j4']['total'];
                 $this->_sections['j4']['index'] += $this->_sections['j4']['step'], $this->_sections['j4']['iteration']++):
$this->_sections['j4']['rownum'] = $this->_sections['j4']['iteration'];
$this->_sections['j4']['index_prev'] = $this->_sections['j4']['index'] - $this->_sections['j4']['step'];
$this->_sections['j4']['index_next'] = $this->_sections['j4']['index'] + $this->_sections['j4']['step'];
$this->_sections['j4']['first']      = ($this->_sections['j4']['iteration'] == 1);
$this->_sections['j4']['last']       = ($this->_sections['j4']['iteration'] == $this->_sections['j4']['total']);
?>
                                <span><?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j4']['index']]['name']; ?>
</span></br>
                                <textarea id="edytor_<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j4']['index']]['id']; ?>
" name="content[<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j4']['index']]['id']; ?>
]"><?php echo $this->_tpl_vars['opis'][$this->_sections['j4']['index']]['content']; ?>
</textarea>
                                <?php endfor; endif; ?>
                            </div>
                        </div>
                        <div class="form-actions">
                            <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['article']['id']; ?>
" />
                            <input class="btn btn-success" type="submit" name="action" value="Zapisz" />
                            <input class="btn btn-info" type="submit" name="action" value="Zapisz i kontynuuj edycję" />
                            <input class="btn btn-danger" type="submit" name="action" value="Porzuć zmiany" />
                        </div>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>