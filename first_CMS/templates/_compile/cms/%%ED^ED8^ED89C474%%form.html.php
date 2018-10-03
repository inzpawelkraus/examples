<?php /* Smarty version 2.6.13, created on 2017-03-17 13:26:16
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

<form class="formularz" method="get" action="<?php echo $this->_tpl_vars['BASE_URL']; ?>
/szukaj.html">
	<label><?php echo $this->_tpl_vars['LANG']['_PAGE_WYSZUKAJ']; ?>
</label>
	<input class="text" type="text" id="keyword" name="keyword" value="<?php if ($_GET['keyword']):  echo $_GET['keyword'];  else:  echo $this->_tpl_vars['LANG']['_PAGE_WPISZ'];  endif; ?>" />
	<input class="submit" type="submit" value="OK" />
</form>