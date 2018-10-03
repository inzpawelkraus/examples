<?php /* Smarty version 2.6.13, created on 2017-06-06 09:38:27
         compiled from misc/podpisz.inc.html */ ?>
<div class="container-form full">
    <h3>Podpisywanie petycji</h3>
    <div class="container">
        <span style="font-weight: bold; color: #566d8e;">Każdy może pomóc.</span></br>
        <span style="color: #959595;">Wystarczy, że wypełnisz poniższy formularz.</br><small style="color: red;">(Wszystkie pola są wymagane)</small></span></br>
        <div class="alert alert-danger" style="display: none;"><?php echo $this->_tpl_vars['info']; ?>
</div></br></br>
        <?php if ($this->_tpl_vars['info']): ?><div class="alert"><strong><?php echo $this->_tpl_vars['info']; ?>
</strong></div><?php endif; ?>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
" id="contact_form" name="contact_form" enctype="multipart/form-data" onsubmit="required()">
            <input type="text" class="text input required" name="author" value="<?php echo $_POST['author']; ?>
" size="120" placeholder="Imię i Nazwisko"/>
            <input class="text input required" type="text" name="email" value="" placeholder="E-mail" />
            <select class="text input required" name="state">
                <option value="">-Województwo-</option>
                <option value="dolnoslaskie">Dolnośląskie</option>
                <option value="kujawskopomorskie">Kujawsko-Pomorskie</option>
                <option value="lubelskie">Lubelskie</option>
                <option value="lubuskie">Lubuskie</option>
                <option value="lodzkie">Łódzkie</option>
                <option value="malopolskie">Małopolskie</option>
                <option value="mazowiecke">Mazowiedzkie</option>
                <option value="opolskie">Opolskie</option>
                <option value="podkarpackie">Podkarpackie</option>
                <option value="podlaskie">Podlaskie</option>
                <option value="pomorskie">Pomorskie</option>
                <option value="slaskie">Śląskie</option>
                <option value="swietokrzyskie">Świętokrzyskie</option>
                <option value="warminskomazurskie">Warmińsko-Mazurskie</option>
                <option value="wielkopolskie">Wielkopolskie</option>
                <option value="zachodniopomorskie">Zachodnio-Pomorskie</option>
            </select> 
            <input class="text input required" type="number" name="age" value="" placeholder="Wiek" />
            <label class="switch sex female" data-sex="male">
                <input class="input sex female required" type="checkbox" name="female">
                <div class="slider"><i class="fa fa-female"></i> <i class="fa fa-female"></i></div>
            </label>
            <label class="switch sex male" data-sex="female">
                <input class="inputsex male required" type="checkbox" name="male">
                <div class="slider"><i class="fa fa-male"></i> <i class="fa fa-male"></i></div>
            </label>
            <br />
            Przepisz kod z prawej strony: 
            <br />
            <input type="text" class="text" name="token" id="token" style="background: url('<?php echo $this->_tpl_vars['BASE_URL']; ?>
/js/token/token.php?n=<?php echo $this->_tpl_vars['tokenid']; ?>
') no-repeat right center"/>
            <input type="hidden" name="tokenid" value="<?php echo $this->_tpl_vars['tokenid']; ?>
" /><br /><br />
            <input class="submit pull-right addNewPetition" type="submit" value="Dodaj"/>
            <input type="hidden" name="action" value="add" />
        </form>
    </div>
</div>
<script>
    <?php echo '
    $(".close").click(function () {
        $(".confirmDialogBox").fadeOut(300);
        if($(this).data("page") == "reload"){
            window.location = window.location.href;
        }
    });
    $(".addNewPetition").click(function () {
	form = $(this).parents("#contact_form");
	form.find(".required").removeClass("error");
	alertContainer = $(".alert");
	errors = 0;
	form.find(".required").each(function () {
	    if ($(this).val() == \'\') {
		errors++;
        $(".alert-info").hide();
		$(this).addClass("error");
	    }
	});
	if (errors > 0) {
	    alertContainer.fadeIn(200);
	    alertContainer.html("Wypełnij wymagane pola");
        $(".alert-info").hide();
	    return false;
	}
    });
    '; ?>

</script>