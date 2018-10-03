<?php /* Smarty version 2.6.13, created on 2017-04-05 14:38:52
         compiled from szukaj/form.html */ ?>
<script type="text/javascript">
   <?php echo '
   $(function() {
      $(\'#keyword\').click(function(){
         $(\'#keyword\').val(\'\');
      });
	});
   '; ?>

</script>

<form id="contact_form" class="formularz" method="get" action="<?php echo $this->_tpl_vars['BASE_URL']; ?>
/szukaj.html">
	<input class="text" type="text" id="keyword" name="keyword" value="<?php if ($_GET['keyword']):  echo $_GET['keyword'];  endif; ?>" placeholder="Wpisz frazę" />
	<input class="submit" type="submit" value="Wyszukaj" />
</form>