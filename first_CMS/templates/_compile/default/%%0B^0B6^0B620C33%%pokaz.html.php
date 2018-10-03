<?php /* Smarty version 2.6.13, created on 2017-06-22 13:11:58
         compiled from petycje/pokaz.html */ ?>
<meta property="og:url"           content="<?php echo $this->_tpl_vars['article']['url']; ?>
" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="<?php echo $this->_tpl_vars['article']['title']; ?>
" />
<meta property="og:description"   content="<?php echo $this->_tpl_vars['article']['content']; ?>
" />
<meta property="og:image"         content="<?php echo $this->_tpl_vars['article']['photo']['photo']; ?>
" />


<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/css/progress_style.css" />
<section class="body">
    <div class="container">
        <div class="petition no-padding single col-md-6">
            <div class="img_container">
                <?php if ($this->_tpl_vars['article']['photo']['photo']): ?>
                <img class="news-foto" src="<?php echo $this->_tpl_vars['article']['photo']['small']; ?>
" alt="<?php echo $this->_tpl_vars['article']['title']; ?>
" />
                <?php else: ?>
                <img src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/img/slide1.jpg"/>
                <?php endif; ?>
                <span class="petitionTitle"><?php echo $this->_tpl_vars['article']['title']; ?>
</span>
                <span class="progress"><?php echo $this->_tpl_vars['article']['progress']; ?>
%</span>
                <span class="info">Zebraliśmy </br><strong><?php echo $this->_tpl_vars['article']['comm']; ?>
</strong> </br>podpisów</span>
            </div>
            <div class="content">
                <?php echo $this->_tpl_vars['article']['content']; ?>
    
            </div>

        </div>
        <div class="petition padding-left-50 single col-md-6">
            <div class="petitionCountManager">
                <span class="title large">Podpisz</span>
                <span class="title medium">Liczy sie każdy głos</span>
                <div class="progress_container">
                    <div class="progress_bar">
                        <div id="myProgress">
                            <div style="width: 0%;" id="myBar" data-left="<?php echo $this->_tpl_vars['article']['progress']; ?>
"></div>
                            <span class="progressPin" style="display: none; left: calc(<?php echo $this->_tpl_vars['article']['progress']; ?>
% - 25px);"><?php echo $this->_tpl_vars['article']['progress']; ?>
%</span>
                        </div>

                    </div>
                    <span class="label first pull-left no-padding">0</span>
                    <span class="label first pull-right no-padding"><?php echo $this->_tpl_vars['article']['limit']; ?>
</span>
                    <div class="counter pull-left">
                        <span class="counterBox label white no-padding  pull-left" data-value="<?php echo $this->_tpl_vars['article']['comm']; ?>
" ><?php echo $this->_tpl_vars['article']['comm']; ?>
</span>
                        <span class="label normall no-padding  pull-left">&nbsp;PODPISAŁO, NIECH BĘDZIE NAS <?php echo $this->_tpl_vars['article']['limit']; ?>
</span>
                    </div>
                </div>
            </div>
            <?php if ($this->_tpl_vars['show_comments']): ?>
            <?php if ($this->_tpl_vars['CONF']['votes_system'] == 1): ?>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "misc/podpisz.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            <?php else: ?>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "misc/podpisz2.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            <?php endif; ?>
            <?php endif; ?>
            <div class="singleInfoLabel"><spam>Prosimy !</spam></br>udostępnij link tej kampani</br> na Faceboku lub Twitterze</div>
        </div>
        <?php if ($this->_tpl_vars['gallery']): ?>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "galeria/pokaz-podstrona.html", 'smarty_include_vars' => array('gal' => $this->_tpl_vars['gallery'],'gallery' => $this->_tpl_vars['galleries'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php endif; ?>
    </div>
    <script>
	<?php echo '
	$(document).ready(function () {
	    var progres = $("#myBar").data(\'left\');
	    $("#myBar").animate({
		width: progres + "%"
	    }, 3000, function () {
		$(".progressPin").fadeIn(150);
	    });
	});
	'; ?>

    </script>
</section>
<?php if ($this->_tpl_vars['article']['fbshare']):  $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "misc/socials.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  endif; ?>