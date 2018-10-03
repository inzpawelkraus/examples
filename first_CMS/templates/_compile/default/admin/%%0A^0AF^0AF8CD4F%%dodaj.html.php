<?php /* Smarty version 2.6.13, created on 2017-02-27 15:44:47
         compiled from onepage/dodaj.html */ ?>
<div class="page-title">
    <div class="title_left">
        <h3>
            <?php echo $this->_tpl_vars['pageTitle']; ?>

        </h3>
    </div>
</div>
<div class="page-content">
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
" enctype="multipart/form-data" class="form-horizontal form-label-left">
        <div id="opcje" class="hidden">
            <div class="seo-title"><strong>Opcje TITLE:</strong><br /><small>możliwość wyboru odpowiedniego TITLE w nagłówku strony</small></div>
            <input type="radio" id="ot1" name="op_page_title" value="1" <?php if ($this->_tpl_vars['opcje']['op_page_title'] == '1'): ?>checked="checked" <?php endif; ?> />
                   <label for="ot1">Konfiguracja główna CMS</label>
            <div class="seo-konf"><?php echo $this->_tpl_vars['CONF']['page_title']; ?>
</div>
            <input type="radio" id="ot2" name="op_page_title" value="2" <?php if ($this->_tpl_vars['opcje']['op_page_title'] == '2'): ?>checked="checked" <?php endif; ?> />
                   <label for="ot2">Automatyczna z tytułu strony</label><br />
            <input type="radio" id="ot3" name="op_page_title" value="3" <?php if ($this->_tpl_vars['opcje']['op_page_title'] == '3'): ?>checked="checked" <?php endif; ?> />
                   <label for="ot3">Automatyczna z tytułu strony + Konfiguracja główna CMS</label><br />
            <input type="radio" id="ot4" name="op_page_title" value="4" <?php if ($this->_tpl_vars['opcje']['op_page_title'] == '4'): ?>checked="checked" <?php endif; ?> />
                   <label for="ot4">Ręczna [proszę niżej wpisać tekst]</label><br />
            <input type="radio" id="ot5" name="op_page_title" value="5" <?php if ($this->_tpl_vars['opcje']['op_page_title'] == '5'): ?>checked="checked" <?php endif; ?> />
                   <label for="ot5">Ręczna [proszę niżej wpisać tekst] + Konfiguracja główna CMS</label><br />
            <textarea class="seo-konf" name="page_title"><?php echo $_POST['page_title']; ?>
</textarea><br />

            <div class="seo-title"><strong>Opcje KEYWORDS:</strong><br /><small>możliwość wyboru odpowiedniego KEYWORDS w nagłówku strony</small></div>
            <input type="radio" id="ok1" name="op_page_keywords" value="1" <?php if ($this->_tpl_vars['opcje']['op_page_keywords'] == '1'): ?>checked="checked" <?php endif; ?> />
                   <label for="ok1">Konfiguracja główna CMS</label>
            <div class="seo-konf"><?php echo $this->_tpl_vars['CONF']['page_keywords']; ?>
</div>
            <input type="radio" id="ok2" name="op_page_keywords" value="2" <?php if ($this->_tpl_vars['opcje']['op_page_keywords'] == '2'): ?>checked="checked" <?php endif; ?> />
                   <label for="ok2">Automatyczna z tytułu strony</label><br />
            <input type="radio" id="ok3" name="op_page_keywords" value="3" <?php if ($this->_tpl_vars['opcje']['op_page_keywords'] == '3'): ?>checked="checked" <?php endif; ?> />
                   <label for="ok3">Automatyczna z tytułu strony + Konfiguracja główna CMS</label><br />
            <input type="radio" id="ok4" name="op_page_keywords" value="4" <?php if ($this->_tpl_vars['opcje']['op_page_keywords'] == '4'): ?>checked="checked" <?php endif; ?> />
                   <label for="ok4">Ręczna [proszę niżej wpisać tekst, frazy odzielone przecinkami]</label><br />
            <input type="radio" id="ok5" name="op_page_keywords" value="5" <?php if ($this->_tpl_vars['opcje']['op_page_keywords'] == '5'): ?>checked="checked" <?php endif; ?> />
                   <label for="ok5">Ręczna [proszę niżej wpisać tekst, frazy odzielone przecinkami] + Konfiguracja główna CMS</label><br />
            <textarea class="seo-konf" name="page_keywords"><?php echo $_POST['page_keywords']; ?>
</textarea><br />
            <div class="seo-title"><strong>Opcje DESCRIPTION:</strong><br /><small>możliwość wyboru odpowiedniego DESCRIPTION w nagłówku strony</small></div>
            <input type="radio" id="od1" name="op_page_description" value="1" <?php if ($this->_tpl_vars['opcje']['op_page_description'] == '1'): ?>checked="checked" <?php endif; ?> />
                   <label for="od1">Konfiguracja główna CMS</label>
            <div class="seo-konf"><?php echo $this->_tpl_vars['CONF']['page_description']; ?>
</div>
            <input type="radio" id="od2" name="op_page_description" value="2" <?php if ($this->_tpl_vars['opcje']['op_page_description'] == '2'): ?>checked="checked" <?php endif; ?> />
                   <label for="od2">Automatyczna z tytułu strony</label><br />
            <input type="radio" id="od3" name="op_page_description" value="3" <?php if ($this->_tpl_vars['opcje']['op_page_description'] == '3'): ?>checked="checked" <?php endif; ?> />
                   <label for="od3">Automatyczna z tytułu strony + Konfiguracja główna CMS</label><br />
            <input type="radio" id="od4" name="op_page_description" value="4" <?php if ($this->_tpl_vars['opcje']['op_page_description'] == '4'): ?>checked="checked" <?php endif; ?> />
                   <label for="od4">Automatyczna z treści strony</label><br />
            <input type="radio" id="od5" name="op_page_description" value="5" <?php if ($this->_tpl_vars['opcje']['op_page_description'] == '5'): ?>checked="checked" <?php endif; ?> />
                   <label for="od5">Automatyczna z treści strony + Konfiguracja główna CMS</label><br />
            <input type="radio" id="od6" name="op_page_description" value="6" <?php if ($this->_tpl_vars['opcje']['op_page_description'] == '6'): ?>checked="checked" <?php endif; ?> />
                   <label for="od6">Ręczna [proszę niżej wpisać tekst]</label><br />
            <input type="radio" id="od7" name="op_page_description" value="7" <?php if ($this->_tpl_vars['opcje']['op_page_description'] == '7'): ?>checked="checked" <?php endif; ?> />
                   <label for="od7">Ręczna [proszę niżej wpisać tekst] + Konfiguracja główna CMS</label><br />
            <textarea class="seo-konf" name="page_description"><?php echo $_POST['page_description']; ?>
</textarea><br />

        </div>
        <div class="col-md-7 col-sm-12 col-xs-12 form-group">
            <strong>Tytuł strony:</strong>
            <div class="accordion" id="accordion3" role="tablist" aria-multiselectable="true">
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
                <div class="panel">
                    <a class="panel-heading collapsed" role="tab" id="heading_<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j1']['index']]['id']; ?>
" data-toggle="collapse" data-parent="#accordion3" href="#collapse3_<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j1']['index']]['id']; ?>
" aria-expanded="false" aria-controls="collapse_<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j1']['index']]['id']; ?>
">
                        <h4 class="panel-title"><?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j1']['index']]['name']; ?>
</h4>
                    </a>
                    <div id="collapse3_<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j1']['index']]['id']; ?>
" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j1']['index']]['id']; ?>
">
                        <div class="panel-body">
                            <input name="title[<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j1']['index']]['id']; ?>
]" type="text" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                </div>

                <?php endfor; endif; ?>
            </div>      
        </div>      
        <div class="col-md-7 col-sm-12 col-xs-12 form-group">
            <strong>Opcje dodatkowe:</strong>
            <div class="checkbox">
                <label>
                    <input id="show_title" type="checkbox" name="show_title" class="flat" value="1" checked="checked"> Pokazuj tytuł
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input id="active" type="checkbox" name="active" value="1" class="flat" checked="checked"/> Pokazuj podstronę w serwisie
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input id="comments" type="checkbox" name="comments" value="1" class="flat"/> Użytkownicy mogą komentować
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input id="auth" type="checkbox" name="auth" value="1" class="flat"/> Dostępna tylko dla zalogowanych
                </label>
            </div>
        </div>
        <div class="col-md-7 col-sm-12 col-xs-12 form-group">
            <strong>Zdjęcie:</strong>
            <small>nie większe niż 800x600 px</small>
            <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" />
        </div>
        <div class="col-md-7 col-sm-12 col-xs-12 form-group">
            <strong>Galeria:</strong>
            <small>wybrana galeria będzie dołączona do artykułu</small>
            <select class="select2_single form-control" tabindex="-1" name="gallery_id">
                <option value="">- brak -</option>
                <?php unset($this->_sections['g']);
$this->_sections['g']['name'] = 'g';
$this->_sections['g']['loop'] = is_array($_loop=$this->_tpl_vars['galleries']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                <option value="<?php echo $this->_tpl_vars['galleries'][$this->_sections['g']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['galleries'][$this->_sections['g']['index']]['title']; ?>
</option>
                <?php endfor; endif; ?>
            </select>

        </div>
        <div class="col-md-7 col-sm-12 col-xs-12 form-group">
            <strong>Krótki opis:</strong>
            <div class="accordion" id="accordion2" role="tablist" aria-multiselectable="true">

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
                <div class="panel">
                    <a class="panel-heading collapsed" role="tab" id="heading_<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j3']['index']]['id']; ?>
" data-toggle="collapse" data-parent="#accordion2" href="#collapse2_<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j3']['index']]['id']; ?>
" aria-expanded="false" aria-controls="collapse_<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j3']['index']]['id']; ?>
">
                        <h4 class="panel-title"><?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j3']['index']]['name']; ?>
</h4>
                    </a>
                    <div id="collapse2_<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j3']['index']]['id']; ?>
" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j3']['index']]['id']; ?>
">
                        <div class="panel-body">
                            <textarea class="seo-konf" rows="6" name="content_short[<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j3']['index']]['id']; ?>
]"></textarea>
                        </div>
                    </div>
                </div>
                <?php endfor; endif; ?>
            </div>
        </div>
        <div class="col-md-7 col-sm-12 col-xs-12 form-group">
            <strong>Treść:</strong>
            <div class="accordion" id="accordion1" role="tablist" aria-multiselectable="true">

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
                <div class="panel">
                    <a class="panel-heading collapsed" role="tab" id="heading_<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j4']['index']]['id']; ?>
" data-toggle="collapse" data-parent="#accordion1" href="#collapse1_<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j4']['index']]['id']; ?>
" aria-expanded="false" aria-controls="collapse_<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j4']['index']]['id']; ?>
">
                        <h4 class="panel-title"><?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j4']['index']]['name']; ?>
</h4>
                    </a>
                    <div id="collapse1_<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j4']['index']]['id']; ?>
" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j4']['index']]['id']; ?>
">
                        <div class="panel-body">
                            <textarea id="edytor_<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j4']['index']]['id']; ?>
" name="content[<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j4']['index']]['id']; ?>
]"></textarea>
                        </div>
                    </div>
                </div>
                <?php endfor; endif; ?>
            </div>
        </div>
        <div class="col-md-7 col-sm-12 col-xs-12 form-group">
            <input class="btn btn-primary" type="submit" name="action" value="Dodaj podstronę" />
            <input class="btn btn-default" type="submit" name="action" value="Porzuć zmiany" />
        </div>
    </form>
</div>