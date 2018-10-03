<?php /* Smarty version 2.6.13, created on 2017-06-06 09:29:22
         compiled from newsletter/form.html */ ?>
<script type="text/javascript">
    <?php echo '
    $(function () {
        $(\'#email1\').click(function () {
            $(\'#email1\').val(\'\');
        });
    });
    '; ?>

</script>

<form class="newsletter_form pull-left" method="post" action="<?php echo $this->_tpl_vars['BASE_URL']; ?>
/newsletter.html">
    <h3>Dołącz do nas</h3>
    <input class="text" type="text" id="email1" name="email1" value="<?php if ($_POST['email1']):  echo $_POST['email1'];  else:  echo $this->_tpl_vars['LANG']['_PAGE_PODAJ_EMAIL'];  endif; ?>" placeholder="E-mail:">
    <input class="submit" type="submit" value="" />
    <div class="doots"></div>
</form>