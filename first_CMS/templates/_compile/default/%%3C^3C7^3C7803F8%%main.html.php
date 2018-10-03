<?php /* Smarty version 2.6.13, created on 2017-06-06 09:37:32
         compiled from main.html */ ?>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['TPL_URL']; ?>
/js/pl-mapa.js"></script> 
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "petycje/slider.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="row">
    <div class="container informations">
        <div class="information box col-md-4 no-padding">
            <div class="information head">
                Nasza społeczność
            </div>

            <div class="information content map">
                <div id="map-pl">
                    <ul id="polska">
                                                <li id="pl1"><a href="#dolnoslaskie">Dolnośląskie</br>121236 głosów</a></li>
                        <li id="pl2"><a href="#kujawsko-pomorskie">Kujawsko-pomorskie</br>40785 głosów</a></li>
                        <li id="pl3"><a href="#lubelskie">Lubelskie</br>16610 głosów</a></li>
                        <li id="pl4"><a href="#lubuskie">Lubuskie</br>17546 głosów</a></li>
                        <li id="pl5"><a href="#lodzkie">Łódzkie</br>37845 głosów</a></li>
                        <li id="pl6"><a href="#malopolskie">Małopolskie</br>65981 głosów</a></li>
                        <li id="pl7"><a href="#mazowieckie">Mazowieckie</br>12557 głosów</a></li>
                        <li id="pl8"><a href="#opolskie">Opolskie</br>98654 głosów</a></li>
                        <li id="pl9"><a href="#podkarpackie">Podkarpackie</br>65233 głosów</a></li>
                        <li id="pl10"><a href="#podlaskie">Podlaskie</br>124722 głosów</a></li>
                        <li id="pl11"><a href="#pomorskie">Pomorskie</br>34231 głosów</a></li>
                        <li id="pl12"><a href="#slaskie">Śląskie</br>10005 głosów</a></li>
                        <li id="pl13"><a href="#swietokrzyskie">Świętokrzyskie</br>2472 głosów</a></li>
                        <li id="pl14"><a href="#warminsko-mazurskie">Warmińsko-mazurskie</br>5669 głosów</a></li>
                        <li id="pl15"><a href="#wielkopolskie">Wielkopolskie</br>12356 głosów</a></li>
                        <li id="pl16"><a href="#zachodniopomorskie">Zachodniopomorskie</br>25421 głosów</a></li>
                    </ul>
                </div>
                                <span class="title"><span class="counterBox">691323</span> osób</br> w całej Polsce.</span>
                <span class="subtitle">Najedź na mapę, by poznać ilość </br>członków. Nazwa w danym regionie.</span>
            </div>
        </div>
        <div class="information box last col-md-4 no-padding">
            <div class="information head">
                W tej chwili podpisują
            </div>
            <div class="information content">
                <div id="tableHolder"></div>

                <div class="shadow"></div>
            </div>
            <script>
        <?php echo '
        $(document).ready(function () {
            refreshTable();
        });
        $s = Math.floor((Math.random() * 10) + 1);
        function refreshTable() {
            $(\'#tableHolder\').fadeOut(300);
            $(\'#tableHolder\').load(\'checkVotes.php\', function () {
            setTimeout(refreshTable, $s * 2 + \'000\');
            });
            $(\'#tableHolder\').fadeIn(300);
        }
        '; ?>

            </script>
        </div>
        <div class="information box col-md-3 no-padding banner">
            <div class="information content">
                <span class="info">Nasza społeczność tworzy kampanie dając ludziom władzę w najważniejszych dla świata sprawach</span>
                                <span class="count counterBox">691323</span>
                <small>w całej polsce</small>
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "newsletter/form.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            </div>
        </div>
    </div>
    <div class="container petitions">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "petycje/glowna.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </div>
</div>