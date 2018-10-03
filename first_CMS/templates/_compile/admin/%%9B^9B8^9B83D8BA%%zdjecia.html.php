<?php /* Smarty version 2.6.13, created on 2017-02-27 14:16:22
         compiled from zmieniarka/zdjecia.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'math', 'zmieniarka/zdjecia.html', 194, false),)), $this); ?>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
/js/jquery-1.6.2.min.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
/js/uploadify/swfobject.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
/js/uploadify/jquery.uploadify.v2.1.0.min.js"></script>

<?php echo '
<script type="text/javascript">

    $(document).ready(function() {
    $(\'#multiuploader\').uploadify({
    '; ?>

    'uploader': '<?php echo $this->_tpl_vars['BASE_URL']; ?>
/js/uploadify/uploadify.swf',
    'script': '<?php echo $this->_tpl_vars['BASE_URL']; ?>
/js/uploadify/uploadify.php',
    'folder': '<?php echo $this->_tpl_vars['path']; ?>
/upload/<?php echo $this->_tpl_vars['gal_dir']; ?>
/<?php echo $this->_tpl_vars['gal']['id']; ?>
',
    'buttonText':'Wybierz pliki',
    'multi': true,
    'auto': true,
    'sizeLimit': 2000000,
    'onAllComplete'  : <?php echo 'function(){ '; ?>
 window.location.replace("?action=show_gallery&id=<?php echo $this->_tpl_vars['gal']['id']; ?>
") <?php echo ' },'; ?>

    'cancelImg': '<?php echo $this->_tpl_vars['BASE_URL']; ?>
/js/uploadify/cancel.png'
    <?php echo '
    });
    });
</script>
'; ?>


<?php if ($this->_tpl_vars['kadrowanie_znacznik']):  echo '
<script type="text/javascript">

        '; ?>

        var gal_width="<?php echo $this->_tpl_vars['gal']['width']; ?>
";
        var gal_height="<?php echo $this->_tpl_vars['gal']['height']; ?>
";
        <?php echo '


        var znacznik_hold = 0;
        var akt_kadr = 0;

        $(function()
            {

            }
        );

        function showKadr(nr)
        {
            var img_width = parseInt($("#zdjecie_cont_"+nr).children("a").children("img").width());
            var img_height = parseInt($("#zdjecie_cont_"+nr).children("a").children("img").height());
            var kadr_width=0;
            var kadr_height=0;
            akt_kadr = nr;


            var pos_y = 0;//$("#zdjecie_cont_"+akt_kadr).get(0).offsetTop - $("#zdjecia_lista").get(0).offsetTop;
            var pos_x = 0;//$("#zdjecie_cont_"+akt_kadr).get(0).offsetLeft; //- $("#zdjecia_lista").get(0).offsetLeft;
            $("#foto_kadr_x_"+akt_kadr).val(pos_x);
            $("#foto_kadr_y_"+akt_kadr).val(pos_y);
            $("#zdjecie_kadr_"+akt_kadr).css("left", pos_x);
            $("#zdjecie_kadr_"+akt_kadr).css("top", pos_y);

            gal_width=parseInt(gal_width);
            gal_height=parseInt(gal_height);

            if(img_height >= img_width)
            {
                if(gal_width >= gal_height)
                {
                    //alert("1");
                    kadr_width = img_width;
                    kadr_height = parseInt(gal_height*img_width/gal_width);
                }
                else
                {
                    //alert("2");
                    kadr_width = parseInt(gal_width*img_height/gal_height);
                    kadr_width = gal_width*img_height/gal_height;
                    kadr_height = img_height;
                }
            }
            else
            {

                ratio_x = img_width / gal_width;
                ratio_y = img_height / gal_height;


                if(ratio_y > ratio_x)
                {
                    //alert("4");
                    kadr_width = img_width;
                    kadr_height = parseInt(gal_height*ratio_x);
                }
                else
                {
                    //alert("3");
                    kadr_width = gal_width*ratio_y;
                    kadr_height = img_height;

                    //alert(gal_width+" - "+ratio_y);
                }

            }

            $("#zdjecie_kadr_"+nr).css("width", kadr_width);
            $("#zdjecie_kadr_"+nr).css("height", kadr_height);

            $("#zdjecie_kadr_"+nr).show();

            $("#zdjecie_kadr_"+nr).draggable({ containment: \'parent\' });
            $("#zdjecie_kadr_"+nr).bind( "drag", function(event, ui) {
                    $("#foto_kadr_x_"+nr).val(parseInt(ui.offset.left-$("#zdjecie_cont_"+nr).get(0).offsetLeft - 248));
                    $("#foto_kadr_y_"+nr).val(parseInt(ui.offset.top-$("#zdjecie_cont_"+nr).get(0).offsetTop - 81));
            });

        }

</script>
'; ?>

<?php endif; ?>



<div class="page-title"><h1><?php echo $this->_tpl_vars['pageTitle']; ?>
 | <?php echo $this->_tpl_vars['gal']['title']; ?>
</h1></div>

<div class="page-content" id="gal_zdj_page_content">
	<p><a href="?">&laquo; Powrót do spisu galerii</a></p>
	<div class="info"><?php echo $this->_tpl_vars['gal']['content_short']; ?>
</div>
		
        <?php if ($_SESSION['user']['admin'] == 1): ?>
	<div class="center">
            <a href="?action=edit_gallery&amp;id=<?php echo $this->_tpl_vars['gal']['id']; ?>
" title="Edytuj"><img src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/img/edit.png" alt="Edytuj" /> Edytuj galerię</a>
            <hr />
	</div>
        <?php endif; ?>

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
				<div style="margin: 3px; padding: 3px; border: 1px solid #aaa; text-align: center; float: left;">
				<?php if ($this->_tpl_vars['gallery'][$this->_sections['g']['index']]['url']): ?>
					<a href="<?php echo $this->_tpl_vars['gallery'][$this->_sections['g']['index']]['url']; ?>
" title="<?php echo $this->_tpl_vars['gal']['title']; ?>
" class="fancybox" rel="fancybox"><img src="<?php echo $this->_tpl_vars['gallery'][$this->_sections['g']['index']]['src']; ?>
" alt="<?php echo $this->_tpl_vars['gal']['title']; ?>
" /></a>
				<?php else: ?><b>Brak zdjęcia!</b><?php endif; ?>
				<br />

				<?php if (! $this->_sections['g']['first']): ?>
					<a href="?id=<?php echo $this->_tpl_vars['gallery'][$this->_sections['g']['index']]['id']; ?>
&gallery_id=<?php echo $this->_tpl_vars['gal']['id']; ?>
&action=up" title="Przenieś w górę"><img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
/templates/admin/img/moveUp.png" alt="Przenieś w górę" /></a>
				<?php endif; ?>
				<?php if (! $this->_sections['g']['last']): ?>
					<a href="?id=<?php echo $this->_tpl_vars['gallery'][$this->_sections['g']['index']]['id']; ?>
&gallery_id=<?php echo $this->_tpl_vars['gal']['id']; ?>
&action=down" title="Przenieś w dół"><img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
/templates/admin/img/moveDown.png" alt="Przenieś w dół" /></a>
				<?php endif; ?>
					<a href="?delete_photo=<?php echo $this->_tpl_vars['gallery'][$this->_sections['g']['index']]['name']; ?>
&amp;id=<?php echo $this->_tpl_vars['gal']['id']; ?>
"	onclick="return confirmDelete();"><img src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/img/delete.png" alt="Usuń zdjęcie" /></a>

                                        <a href="#" onclick="showHide('fot_<?php echo $this->_sections['g']['index']; ?>
'); return false;" title="Edytuj opis"><img src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/img/edit.png" alt="Edytuj opis" /></a>

                                        <div id="fot_<?php echo $this->_sections['g']['index']; ?>
" class="fot_id hidden">
                                                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
" style="text-align:left;" enctype="multipart/form-data">
                                                    Tytuł[PL]: <input type="text" name="title_1" style="width:200px;" value="<?php echo $this->_tpl_vars['gallery'][$this->_sections['g']['index']]['title_1']; ?>
"/><br><br>
                                                    Tytuł[EN]: <input type="text" name="title_2" style="width:200px;" value="<?php echo $this->_tpl_vars['gallery'][$this->_sections['g']['index']]['title_2']; ?>
"/><br><br>
                                                    Tytuł[GER]: <input type="text" name="title_3" style="width:200px;" value="<?php echo $this->_tpl_vars['gallery'][$this->_sections['g']['index']]['title_3']; ?>
"/><br><br>
                                                    Tytuł[RU]: <input type="text" name="title_4" style="width:200px;" value="<?php echo $this->_tpl_vars['gallery'][$this->_sections['g']['index']]['title_4']; ?>
"/><br><br>
                                                    <br>
                                                        <input type="hidden" name="foto_id" value="<?php echo $this->_tpl_vars['gallery'][$this->_sections['g']['index']]['id']; ?>
" />
                                                        <input type="hidden" name="gal_id" value="<?php echo $this->_tpl_vars['gal']['id']; ?>
" />
                                                        <input type="hidden" name="action" value="zmien_opis" />

                                                        <div class="right"><input class="submit" type="submit" value="Zapisz zmiany" /></div>
                                                </form>
                                        </div>                                         
                                        
					</div>

                            <?php if ($this->_sections['g']['iteration'] % $this->_tpl_vars['lista_ile_row'] == 0): ?>
                            <br style="clear:both;"/>
                            <?php endif; ?>

			<?php endfor; else: ?>
				<p align="center">Aktualnie brak zdjęć w galerii.</p>
			<?php endif; ?>
			

       <br class="clear" /><hr /><br />
       Wybierz zdjęcia i załaduj je na serwer [można wybrać większą liczbe zdjęć]:<br />
       <div id="multiuploader"></div>

       <?php $_from = $this->_tpl_vars['aPliki']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['p'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['p']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['val']):
        $this->_foreach['p']['iteration']++;
?>
          <?php if (($this->_foreach['p']['iteration'] <= 1)): ?>
           <form method="post" name="gal_zdjecia" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>
">
                <br /><hr /><br />
                <span>Wybierz zdjęcia do galerii [po kliknięciu na zdjęcie można ustawić obszar kadrowania, jeśli dana galeria ma włączoną taką opcje]:</span>
                <table id="zdjecia_lista">
                <tr>
            <?php endif; ?>

          <td align="center">
              <div class="zdjecie_cont" id="zdjecie_cont_<?php echo $this->_tpl_vars['k']; ?>
">
                <a href="javascript:void(0)" onclick="<?php if ($this->_tpl_vars['kadrowanie_znacznik']): ?>showKadr(<?php echo $this->_tpl_vars['k']; ?>
);<?php endif; ?> $('#new_foto_<?php echo $this->_tpl_vars['k']; ?>
').attr('checked', 'true');"><img src="<?php echo $this->_tpl_vars['gal_url']; ?>
/<?php echo $this->_tpl_vars['gal']['id']; ?>
/<?php echo $this->_tpl_vars['val']; ?>
?<?php echo smarty_function_math(array('equation' => 'rand(0, 10000)'), $this);?>
" width="130" alt=""/></a>
                <div class="zdjecie_kadr" id="zdjecie_kadr_<?php echo $this->_tpl_vars['k']; ?>
"></div>
              </div>
              <br>
              <input type="checkbox" name="new_foto_<?php echo $this->_tpl_vars['k']; ?>
" id="new_foto_<?php echo $this->_tpl_vars['k']; ?>
" value="1" checked="checked" />
              <input type="hidden" name="foto_kadr_x_<?php echo $this->_tpl_vars['k']; ?>
" id="foto_kadr_x_<?php echo $this->_tpl_vars['k']; ?>
" value="0"/>
              <input type="hidden" name="foto_kadr_y_<?php echo $this->_tpl_vars['k']; ?>
" id="foto_kadr_y_<?php echo $this->_tpl_vars['k']; ?>
" value="0"/>
              <input type="hidden" name="temp_<?php echo $this->_tpl_vars['k']; ?>
" id="temp_<?php echo $this->_tpl_vars['k']; ?>
" value="temp"/>

              <br />
              <a href="?action=delete_serv_photo&plik=<?php echo $this->_tpl_vars['val']; ?>
&id=<?php echo $this->_tpl_vars['gal']['id']; ?>
" title="Usuń zdjęcie z serwera" onclick="return confirmDelete();">Usuń</a>
              <br>
          </td>

          <?php if ($this->_foreach['p']['iteration']%5 == 0 && ! ($this->_foreach['p']['iteration'] == $this->_foreach['p']['total'])): ?>
          </tr>
          <tr>
          <?php endif; ?>

          <?php if (($this->_foreach['p']['iteration'] == $this->_foreach['p']['total'])): ?>
             </tr>
             </table>

               <br /><br />
               <input class="submit" type="submit" value="Dodaj zdjęcia" />
               <input type="hidden" name="action" value="add_photo" />
               <input type="hidden" name="gallery_id" value="<?php echo $this->_tpl_vars['gal']['id']; ?>
" />
               <input type="hidden" name="title_url" value="<?php echo $this->_tpl_vars['gal']['title_url']; ?>
" />
        </form>
            <?php endif; ?>
          <?php endforeach; endif; unset($_from); ?>
</div>
		