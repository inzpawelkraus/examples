<?php /* Smarty version 2.6.13, created on 2017-06-06 09:51:04
         compiled from misc/kontakt.html */ ?>
<section class="body page">
    <div class="container petitions">
        <div id="page-title"><h1>Dodaj nową petycję</h1></div>
        <div class="alert alert-danger" style="display: none;"></div>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
" enctype="multipart/form-data" id="contact_form" class="newpetition">
            <div class="control-group">
                <div class="controls">
                    <input class="text required" type="text" name="imie" value="<?php echo $_POST['imie']; ?>
" placeholder="<?php echo $this->_tpl_vars['LANG']['_KONTAKT_IMIE']; ?>
" />
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <input class="text required" type="text" name="email" value="<?php echo $_POST['email']; ?>
" placeholder="<?php echo $this->_tpl_vars['LANG']['_KONTAKT_EMAIL']; ?>
" />
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <input class="text input required" type="number" name="age" value="" placeholder="Wiek wnioskodawcy" />
                </div>
            </div>
            <div class="control-group">
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
                    <input class="text title required" type="text" name="title[<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j1']['index']]['id']; ?>
]" placeholder="Proponowany tytuł petycji"/>
                    <?php endfor; endif; ?>
                </div>
            </div>
            <div class="control-group"> 
                <label class="control-label">Sugerowane zdjęcie </label>
                <div class="controls">
                    <input class="file" type="file" name="photo" size="80" /><br />
                </div>
            </div>
            <div class="control-group">
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
                    <textarea class="seo-konf required" rows="6" name="content_short[<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j3']['index']]['id']; ?>
]" placeholder="Proponowany krótki opis"></textarea>
                    <?php endfor; endif; ?>
                </div>
            </div>
            <div class="control-group">
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
                    <textarea id="edytor_<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j4']['index']]['id']; ?>
" class="required" name="content[<?php echo $this->_tpl_vars['JEZYK'][$this->_sections['j4']['index']]['id']; ?>
]" placeholder="Treść"></textarea>
                    <?php endfor; endif; ?>
                </div>
            </div>
            <div class="form-actions">
                <input type="submit" class="addNewPetition" name="action" value="Dodaj" disabpled="disabled"/>
                <input type="hidden" name="front" value="1" />
            </div>
        </form>
        <p>* <?php echo $this->_tpl_vars['LANG']['_KONTAKT_WYPELNIJ']; ?>
</p>
    </div>
</section>
<script>
    <?php echo '
    $(".addNewPetition").click(function () {
	form = $(this).parents("#contact_form");
	form.find(".required").removeClass("error");
	alertContainer = $(".alert");
	errors = 0;
	form.find(".required").each(function () {
	    if ($(this).val() == \'\') {
		errors++;
		$(this).addClass("error");
	    }
	});
	if (errors > 0) {
	    alertContainer.fadeIn(200);
	    alertContainer.html("Wypełnij wymagane pola");
	    return false;
	}
    });
    '; ?>

</script>