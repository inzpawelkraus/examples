<?php /* Smarty version 2.6.13, created on 2017-05-11 15:33:04
         compiled from petycje/miniatura.html */ ?>
<div id="content-header">
    <div id="breadcrumb"> <a href="/admin" title="Panel" class="tip-bottom"><i class="icon-home"></i> Panel</a> <a>Aktualności</a><a class="current">Edycja miniaturki</a> </div>
    <h1><?php echo $this->_tpl_vars['pageTitle']; ?>
</h1>
</div>
<div class="container-fluid">
    <div class="row-fluid">
        <?php echo '
        <style>
            div.zdjecie_cont {
                position: relative;
                width: 100%;
                max-width: 130px;
            }
            div.zdjecie_cont div.zdjecie_kadr {
                background: rgba(174, 11, 176, 0.4);
                cursor: pointer;
                display: none;
                left: 0;
                position: absolute;
                top: 0;
            }
        </style>
        <script type="text/javascript">
	    var gal_width = "';  echo $this->_tpl_vars['thumb']['width'];  echo '";
	    var gal_height = "';  echo $this->_tpl_vars['thumb']['height'];  echo '";

	    function showKadr()
	    {
		var img_width = parseInt($("#zdjecie_cont").children("a").children("img").width());
		var img_height = parseInt($("#zdjecie_cont").children("a").children("img").height());
		var kadr_width = 0;
		var kadr_height = 0;

		var pos_y = 0;
		var pos_x = 0;
		$("#foto_kadr_x").val(pos_x);
		$("#foto_kadr_y").val(pos_y);
		$("#zdjecie_kadr").css("left", pos_x);
		$("#zdjecie_kadr").css("top", pos_y);

		gal_width = parseInt(gal_width);
		gal_height = parseInt(gal_height);

		if (img_height >= img_width)
		{
		    if (gal_width >= gal_height)
		    {
//            alert("1");
			kadr_width = img_width;
			kadr_height = parseInt(gal_height * img_width / gal_width);
		    } else
		    {
//            alert("2");
			kadr_width = parseInt(gal_width * img_height / gal_height);
			kadr_width = gal_width * img_height / gal_height;
//            kadr_height = img_height;
		    }
		} else
		{

		    ratio_x = img_width / gal_width;
		    ratio_y = img_height / gal_height;


		    if (ratio_y > ratio_x)
		    {
//            alert("4");
			kadr_width = img_width;
			kadr_height = parseInt(gal_height * ratio_x);
//            alert(kadr_height);
		    } else
		    {
//            alert("3");
			kadr_width = gal_width * ratio_y;
			kadr_height = gal_height;

//            alert(gal_width+" - "+ratio_y);
		    }

		}

		$("#zdjecie_kadr").css("width", kadr_width);
		$("#zdjecie_kadr").css("height", kadr_height);
		$("#zdjecie_kadr").show();

		$("#zdjecie_kadr").draggable({containment: \'parent\'});
		$("#zdjecie_kadr").bind("drag", function (event, ui) {
		    $("#foto_kadr_x").val(parseInt(ui.offset.left - $("#zdjecie_cont").get(0).offsetLeft));
//            alert()
		    $("#foto_kadr_y").val(parseInt(ui.offset.top - $("#zdjecie_cont").get(0).offsetTop - 40));
		});
	    }
        </script>
        '; ?>

        <div class="page-content">
            <div class="alert alert-info">Aby wykadrować miniaturkę kliknij na nią. Po kliknięciu pojawi się obszar kadrowania, który mozna przesuwać za pomocą myszki klikając na niego i trzymając wciśnięty jej lewy przycisk myszki. Gdy obszar znajdzie się w odpowienim miejscu kliknij "Zapisz miniaturę".</div>

            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
" enctype="multipart/form-data" class="form-horizontal">
                <!--<table class="special" cellspacing="1" cellpadding="0">-->
                <!--                    <tr>
                                        <td align="center">
                                            <div class="zdjecie_cont" id="zdjecie_cont">
                                                <a href="javascript:void(0)" onclick="showKadr(); $('#new_foto').attr('value', '1');">
                                                    <img src="<?php echo $this->_tpl_vars['article']['photo']['photo']; ?>
" alt=""/>
                                                </a>
                                                <div class="zdjecie_kadr" id="zdjecie_kadr"></div>
                                            </div>
                                            <br>
                                            <input type="hidden" name="new_foto" id="new_foto" value="0" />
                                            <input type="hidden" name="foto_kadr_x" id="foto_kadr_x" value="0"/>
                                            <input type="hidden" name="foto_kadr_y" id="foto_kadr_y" value="0"/>
                                            <input type="hidden" name="temp" id="temp" value="temp"/>
                                        </td>
                                    </tr>-->
                <!--                    <tr>
                                        <td colspan="2">
                                            <input type="hidden" name="return" value="<?php echo $this->_tpl_vars['article']['id']; ?>
" />
                                            <input type="hidden" name="type" value="<?php echo $this->_tpl_vars['type']; ?>
" />
                                            <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['article']['id']; ?>
" />
                                            <input class="submit" type="submit" name="action" value="Zapisz miniturę" /> &nbsp;&nbsp;
                                            <input class="submit" type="submit" name="action" value="Porzuć zmiany" />
                                        </td>
                                    </tr>-->
               <div class="form-actions">
                    <div class="zdjecie_cont" id="zdjecie_cont">
                        <a href="javascript:void(0)" onclick="showKadr(); $('#new_foto').attr('value', '1');">
                            <img src="<?php echo $this->_tpl_vars['article']['photo']['photo']; ?>
" alt=""/>
                        </a>
                        <div class="zdjecie_kadr" id="zdjecie_kadr"></div>
                    </div>
                    <input type="hidden" name="new_foto" id="new_foto" value="0" />
                    <input type="hidden" name="foto_kadr_x" id="foto_kadr_x" value="0"/>
                    <input type="hidden" name="foto_kadr_y" id="foto_kadr_y" value="0"/>
                    <input type="hidden" name="temp" id="temp" value="temp"/>
                </div>
                <div class="form-actions">
                    <input type="hidden" name="return" value="<?php echo $this->_tpl_vars['article']['id']; ?>
" />
                    <input type="hidden" name="type" value="<?php echo $this->_tpl_vars['type']; ?>
" />
                    <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['article']['id']; ?>
" />
                    <input class="btn btn-success" type="submit" name="action" value="Zapisz miniturę" />
                    <input class="btn btn-danger" type="submit" name="action" value="Porzuć zmiany" />
                </div>
                <!--</table>-->
            </form>
        </div>




    </div>
</div>