<?php /* Smarty version 2.6.13, created on 2017-06-22 13:00:22
         compiled from galeria/pokaz-podstrona.html */ ?>
<div class="singleGallery col-md-12 no-padding">
    <?php unset($this->_sections['g']);
$this->_sections['g']['name'] = 'g';
$this->_sections['g']['loop'] = is_array($_loop=$this->_tpl_vars['gallery']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
    <div class="col-md-6 ">
        <a class="lightbox_trigger" href="<?php echo $this->_tpl_vars['gallery'][$this->_sections['g']['index']]['src']; ?>
">
            <img class="gal-img2" src="<?php echo $this->_tpl_vars['gallery'][$this->_sections['g']['index']]['src']; ?>
" alt="<?php if ($this->_tpl_vars['gallery'][$this->_sections['g']['index']]['title']):  echo $this->_tpl_vars['gallery'][$this->_sections['g']['index']]['title'];  else:  echo $this->_tpl_vars['gallery'][$this->_sections['g']['index']]['anchor'];  endif; ?>" />
        </a>
    </div>
    <?php endfor; endif; ?>
</div>
<script>
    <?php echo '
    $(\'.lightbox_trigger\').click(function (e) {

	e.preventDefault();

	var image_href = $(this).attr("href");

	if ($(\'#lightbox\').length > 0) {

	    $(\'#imgbox\').html(\'<img src="\' + image_href + \'" /><p><i class="icon-remove icon-white"></i></p>\');

	    $(\'#lightbox\').slideDown(500);
	} else {
	    var lightbox =
		    \'<div id="lightbox" style="display:none;">\' +
		    \'<div id="imgbox"><img src="\' + image_href + \'" />\' +
		    \'<p><i onclick="closeLightbox()" style="color: #ffffff;" class="fa fa-times" aria-hidden="true" ></i></p>\' +
		    \'</div>\' +
		    \'</div>\';

	    $(\'body\').append(lightbox);
	    $(\'#lightbox\').slideDown(500);
	}

    });
    function closeLightbox() {
	$(\'#lightbox\').hide(200);
    }
    '; ?>

</script>