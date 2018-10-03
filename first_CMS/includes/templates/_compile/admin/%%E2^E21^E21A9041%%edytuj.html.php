<?php /* Smarty version 2.6.13, created on 2017-02-27 15:44:53
         compiled from onepage/edytuj.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'math', 'onepage/edytuj.html', 199, false),)), $this); ?>
<div class="page-title">
    <div class="title_left">
        <h3>
            <?php echo $this->_tpl_vars['pageTitle']; ?>

        </h3>
    </div>
</div>
<div class="page-content">
    <div class="zakladki">
        <div id="zakladka-label-glowna" class="zakladka-label<?php if ($this->_tpl_vars['zakladka_selected'] == 'glowna'): ?> zakladka-label-selected<?php endif; ?>">Treść</div>
        <?php if ($this->_tpl_vars['article']['photo']): ?>
        <div id="zakladka-label-miniaturki" class="zakladka-label<?php if ($this->_tpl_vars['zakladka_selected'] == 'miniaturki'): ?> zakladka-label-selected<?php endif; ?>">Miniaturki</div>
        <?php endif; ?>
        <div id="zakladka-label-pliki" class="zakladka-label<?php if ($this->_tpl_vars['zakladka_selected'] == 'pliki'): ?> zakladka-label-selected<?php endif; ?>">Pliki</div>
        <div class="clear"></div>
    </div>
    <div id="zakladka-glowna" class="zakladka">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
" enctype="multipart/form-data" class="form-horizontal form-label-left">
            <table class="special" cellspacing="1" cellpadding="0">
                <!--                <tr>
                                    <td>
                                        <div id="opcje" class="hidden">
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
                
                                        </div>
                                    </td>
                                </tr>-->
                <!--
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
                                    <tr>
                                        <th><img src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/img/<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j1']['index']]['directory']; ?>
/<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j1']['index']]['code']; ?>
.gif" alt="<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j1']['index']]['name']; ?>
" title="<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j1']['index']]['name']; ?>
" /> <small>[<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j1']['index']]['name']; ?>
]</small> Tytuł strony:</th>
                                    </tr>
                                    <tr>
                                        <td>			
                                            <input class="text title" type="text" name="title[<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j1']['index']]['id']; ?>
]" Value="<?php echo $this->_tpl_vars['opis'][$this->_sections['j1']['index']]['title']; ?>
" />
                                            <input type="hidden" name="old_title_url[<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j1']['index']]['id']; ?>
]" value="<?php echo $this->_tpl_vars['opis'][$this->_sections['j1']['index']]['title_url']; ?>
" /> 
                                        </td>
                                    </tr>
                                <?php endfor; endif; ?>
                -->




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
                                    <input class="form-control col-md-7 col-xs-12" type="text" name="title[<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j1']['index']]['id']; ?>
]" Value="<?php echo $this->_tpl_vars['opis'][$this->_sections['j1']['index']]['title']; ?>
"/>
                                    <input type="hidden" name="old_title_url[<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j1']['index']]['id']; ?>
]" value="<?php echo $this->_tpl_vars['opis'][$this->_sections['j1']['index']]['title_url']; ?>
" /> 
                                </div>
                            </div>
                        </div>

                        <?php endfor; endif; ?>
                    </div>      
                </div>     







                <div class="col-md-7 col-sm-12 col-xs-12 form-group">
                    <strong>Data dodania:</strong>
                    <fieldset>
                        <div class="control-group">
                            <div class="controls">
                                <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                                    <input type="text" class="form-control has-feedback-left" id="single_cal4" placeholder="First Name" aria-describedby="inputSuccess2Status4">
                                    <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                    <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>


                <!--                <tr>
                                    <th>Data dodania:</th>
                                </tr>
                                <tr>
                                    <td>
                                        <input class="text" type="text" name="date_add" id="date_add" Value="<?php echo $this->_tpl_vars['article']['date_add']; ?>
" />
                                    </td>
                                </tr>-->
                <!--                <script type="text/javascript">
                                    <?php echo '
                                    $(function () {
                                        $(\'#date_add\').datepicker({
                                            changeMonth: true,
                                            changeYear: true
                                        });
                                    });
                                    '; ?>

                                </script>-->

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
                <!--                <tr>
                                    <th>Opcje DODATKOWE:</th>
                                </tr>
                                <tr>
                                    <td>			
                                        <input id="show_title" type="checkbox" name="show_title" value="1" <?php if ($this->_tpl_vars['article']['show_title']): ?>checked="true" <?php endif; ?> />
                                               <label for="show_title">pokazuj tytuł</label><br />
                                        <input id="active" type="checkbox" name="active" value="1" <?php if ($this->_tpl_vars['article']['active']): ?>checked="true" <?php endif; ?> />
                                               <label for="active">pokazuj podstronę w serwisie</label><br />
                                        <input type="checkbox" id="comments" name="comments" value="1" <?php if ($this->_tpl_vars['article']['comments']): ?>checked="true" <?php endif; ?> />
                                               <label for="comments">użytkownicy mogą komentować</label><br />
                                        <input id="auth" type="checkbox" name="auth" value="1" <?php if ($this->_tpl_vars['article']['auth']): ?>checked="true" <?php endif; ?> />
                                               <label for="auth"> dostępna tylko dla zalogowanych</label><br />
                                    </td>
                                </tr>-->
                <tr>
                    <th>Zdjęcie: <small>[nie większe niż 800x600 px, nowe zastąpi już istniejącą]</small></th>
                </tr>
                <tr>
                    <td><input class="file" type="file" name="photo" size="80" /></td>
                </tr>
                <tr>
                    <td class="right">
                        <?php if ($this->_tpl_vars['article']['photo']): ?><a href="<?php echo $this->_tpl_vars['article']['photo']['photo']; ?>
" title="<?php echo $this->_tpl_vars['article']['title']; ?>
" class="fancybox" rel="fancybox"><img class="miniaturka" src="<?php echo $this->_tpl_vars['article']['photo']['small']; ?>
?<?php echo smarty_function_math(array('equation' => 'rand(0, 10000)'), $this);?>
" alt="<?php echo $this->_tpl_vars['article']['title']; ?>
" /></a><br />
                        <a href="?action=delete_photo&amp;id=<?php echo $this->_tpl_vars['article']['id']; ?>
" onclick="return confirmDelete();"><img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
/templates/admin/img/delete.png" alt="Usuń z serwera" /> Usuń z serwera</a><?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <th><strong>Galeria:</strong><br /><small>wybrana galeria będzie dołączona do artykułu</small></th>
                </tr>
                <tr>
                    <td>
                        <select name="gallery_id">
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
" <?php if ($this->_tpl_vars['article']['gallery_id'] == $this->_tpl_vars['galleries'][$this->_sections['g']['index']]['id']): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['galleries'][$this->_sections['g']['index']]['title']; ?>
</option>
                            <?php endfor; endif; ?>
                        </select>
                    </td>
                </tr>



                <!--                <?php unset($this->_sections['j3']);
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
                                <tr>
                                    <th><img src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/img/<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j3']['index']]['directory']; ?>
/<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j3']['index']]['code']; ?>
.gif" alt="<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j3']['index']]['name']; ?>
" /> <small>[<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j3']['index']]['name']; ?>
]</small> Krótki opis:</th>
                                </tr>
                                <tr>
                                    <td><textarea class="seo-konf" rows="6" name="content_short[<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j3']['index']]['id']; ?>
]"><?php echo $this->_tpl_vars['opis'][$this->_sections['j3']['index']]['content_short']; ?>
</textarea></td>
                                </tr>
                                <?php endfor; endif; ?>
                
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
                                <tr>
                                    <th><img src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/img/<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j4']['index']]['directory']; ?>
/<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j4']['index']]['code']; ?>
.gif" alt="<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j4']['index']]['name']; ?>
" /> <small>[<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j4']['index']]['name']; ?>
]</small> Treść:</th>
                                </tr>
                                <tr>
                                    <td><textarea id="edytor_<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j4']['index']]['id']; ?>
" name="content[<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j4']['index']]['id']; ?>
]"><?php echo $this->_tpl_vars['opis'][$this->_sections['j4']['index']]['content']; ?>
</textarea></td>
                                </tr>
                                <?php endfor; endif; ?>-->


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
]"><?php echo $this->_tpl_vars['opis'][$this->_sections['j3']['index']]['content_short']; ?>
</textarea>
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
]"><?php echo $this->_tpl_vars['opis'][$this->_sections['j4']['index']]['content']; ?>
</textarea>
                                </div>
                            </div>
                        </div>
                        <?php endfor; endif; ?>
                    </div>
                </div>

                <tr>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['article']['id']; ?>
" />		
                        <input class="submit" type="submit" name="action" value="Zapisz i kontynuuj edycję" /> &nbsp;&nbsp;
                        <input class="submit" type="submit" name="action" value="Zapisz" /> &nbsp;&nbsp;
                        <input class="submit" type="submit" name="action" value="Porzuć zmiany" />
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <?php if ($this->_tpl_vars['article']['photo']): ?>
    <div id="zakladka-miniaturki" class="zakladka">
        <div class="info">Aby wykadrować miniaturkę kliknij na nią. Otworzy to formularz kadrowania miniatury.</div>
        <br />
        <table style="border: 1px solid #898d6c; border-collapse: collapse;" cellpadding="0" cellspacing="0">
            <tr>
                <td style="border: 1px solid #898d6c;">Zdjęcie normalne</td>
                <td style="border: 1px solid #898d6c;">
                    <?php if ($this->_tpl_vars['article']['photo']['photo']): ?>
                    <img style="max-width: 500px;" src="<?php echo $this->_tpl_vars['article']['photo']['photo']; ?>
?<?php echo smarty_function_math(array('equation' => 'rand(0, 10000)'), $this);?>
" alt="<?php echo $this->_tpl_vars['article']['title']; ?>
" />
                    <?php endif; ?>
                </td>
                <td style="border: 1px solid #898d6c; width: 100px;" rowspan="2">
                    <a href="?action=delete_photo&amp;id=<?php echo $this->_tpl_vars['article']['id']; ?>
" onclick="return confirmDelete();">
                        <img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
/templates/admin/img/delete.png" alt="Usuń z serwera" />
                        <span> Usuń z serwera</span>
                    </a>
                </td>
            </tr>
            <tr>
                <td style="border: 1px solid #898d6c;">Miniatura dla listy ofert</td>
                <td style="border: 1px solid #898d6c;">
                    <?php if ($this->_tpl_vars['article']['photo']['small']): ?>
                    <a href="?action=edit_thumb&amp;type=small&amp;id=<?php echo $this->_tpl_vars['article']['id']; ?>
" title="Edytuj miniaturę dla listy">
                        <img style="max-width: 500px;" src="<?php echo $this->_tpl_vars['article']['photo']['small']; ?>
?<?php echo smarty_function_math(array('equation' => 'rand(0, 10000)'), $this);?>
" alt="<?php echo $this->_tpl_vars['article']['title']; ?>
" />
                    </a>
                    <?php else: ?>
                    <a href="?action=edit_thumb&amp;type=small&amp;id=<?php echo $this->_tpl_vars['article']['id']; ?>
">dodaj miniaturkę dla listy</a>
                    <?php endif; ?>
                </td>
            </tr>
        </table>
    </div>
    <?php endif; ?>
    <div id="zakladka-pliki" class="zakladka">
        <table class="special" cellspacing="1" cellpadding="0">
            <tr>
                <th colspan="3">Pliki do pobrania wyświetlane na stronie:</th>
            </tr>
            <?php $_from = $this->_tpl_vars['pliki']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['pp'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['pp']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['plik']):
        $this->_foreach['pp']['iteration']++;
?>
            <?php if (($this->_foreach['pp']['iteration'] <= 1)): ?>
            <tr>
                <th width="40px">Lp.</th>
                <th>Plik</th>
                <th width="110px">Opcje</th>
            </tr>
            <?php endif; ?>
            <tr class="shadow_light">
                <td><?php echo $this->_foreach['pp']['iteration']; ?>
</td>
                <td><a href="<?php echo $this->_tpl_vars['plik']['url']; ?>
" target="_blank"><?php echo $this->_tpl_vars['plik']['filename']; ?>
</a></td>
                <td class="opcje">
                    <a href="javascript:void(0)" onclick="showHide('edit_plik_<?php echo $this->_tpl_vars['plik']['id']; ?>
');
                            return false;" title="Edytuj"><img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
/templates/admin/img/edit.png" alt="Edytuj" /></a>
                    <a href="?action=delete_plik&amp;id=<?php echo $this->_tpl_vars['plik']['id']; ?>
&amp;parent_id=<?php echo $this->_tpl_vars['article']['id']; ?>
" title="Kasuj" onclick="return confirmDelete()"><img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
/templates/admin/img/delete.png" alt="Usuń" /></a>
                </td>
            </tr>
            <tr id="edit_plik_<?php echo $this->_tpl_vars['plik']['id']; ?>
" class="shadow_light" style="display: none;">
                <td colspan="4">
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
" enctype="multipart/form-data">
                        <table class="special" cellspacing="1" cellpadding="0">
                            <tr>
                                <td colspan="2">Plik <small>[nowy zastąpi stary]</small>:</td>
                            </tr>
                            <tr>
                                <td colspan="2"><input class="file" type="file" name="plik" size="94" /></td>
                            </tr>
                            <tr>
                                <td colspan="2">Nazwa wyświetlana:</td>
                            </tr>
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
                            <?php $this->assign('lang_id', $this->_tpl_vars['JEZYK'][$this->_sections['j1']['index']]['id']); ?>
                            <tr>
                                <td style="width: 80px;"><img src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/img/<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j1']['index']]['directory']; ?>
/<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j1']['index']]['code']; ?>
.gif" alt="<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j1']['index']]['name']; ?>
" title="<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j1']['index']]['name']; ?>
" /> <small>[<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j1']['index']]['name']; ?>
]</small></td>
                                <td>
                                    <input class="text title2" type="text" name="name[<?php echo $this->_tpl_vars['lang_id']; ?>
]" value="<?php echo $this->_tpl_vars['plik']['opis'][$this->_tpl_vars['lang_id']]['name']; ?>
"/>
                                </td>
                            </tr>
                            <?php endfor; endif; ?>
                            <tr>
                                <td></td>
                                <td>
                                    <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['plik']['id']; ?>
" />
                                    <input type="hidden" name="parent_type" value="<?php echo $this->_tpl_vars['plik']['parent_type']; ?>
" />
                                    <input type="hidden" name="parent_id" value="<?php echo $this->_tpl_vars['plik']['parent_id']; ?>
" />
                                    <input class="submit" type="submit" name="action" value="Zapisz plik" />
                                </td>
                            </tr>
                        </table>
                    </form>
                </td>
            </tr>
            <?php endforeach; else: ?>
            <tr><td colspan="3">Brak plików w bazie. Aby dodać plik użyj formularza poniżej.</td></tr>
            <?php endif; unset($_from); ?>
        </table>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
" enctype="multipart/form-data">
            <table class="special" cellspacing="1" cellpadding="0">
                <tr>
                    <td colspan="2">&nbsp;</td>
                </tr>
                <tr>
                    <th colspan="2">Formularz dodawania pliku:</th>
                </tr>
                <tr>
                    <td>Plik:</td>
                    <td><input class="file" type="file" name="plik" size="40" /></td>
                </tr>
                <tr>
                    <td colspan="2">Nazwa wyświetlana:</td>
                </tr>
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
                <?php $this->assign('lang_id', $this->_tpl_vars['JEZYK'][$this->_sections['j1']['index']]['id']); ?>
                <tr>
                    <td style="width: 80px;"><img src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/img/<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j1']['index']]['directory']; ?>
/<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j1']['index']]['code']; ?>
.gif" alt="<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j1']['index']]['name']; ?>
" title="<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j1']['index']]['name']; ?>
" /> <small>[<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j1']['index']]['name']; ?>
]</small></td>
                    <td>
                        <input class="text title2" type="text" name="name[<?php echo $this->_tpl_vars['lang_id']; ?>
]" />
                    </td>
                </tr>
                <?php endfor; endif; ?>
                <tr>
                    <td></td>
                    <td>
                        <input type="hidden" name="parent_type" value="<?php echo $this->_tpl_vars['files_type']; ?>
" />
                        <input type="hidden" name="parent_id" value="<?php echo $this->_tpl_vars['article']['id']; ?>
" />
                        <input class="submit" type="submit" name="action" value="Dodaj plik" />
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<!--    <script type="text/javascript" src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
/js/tinymce/tiny_mce.js"></script>
    <script type="text/javascript" src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
/js/tinymce.init.js"></script>
    <script type="text/javascript">
                        // <![CDATA[
                        _editor_url = "<?php echo $this->_tpl_vars['BASE_URL']; ?>
/js/tinymce/";
                        var BASE_URL = "<?php echo $this->_tpl_vars['BASE_URL']; ?>
";
                        var SERVER_URL = "<?php echo $this->_tpl_vars['CONF']['server_addr']; ?>
";
                        // ]]>
    </script>-->