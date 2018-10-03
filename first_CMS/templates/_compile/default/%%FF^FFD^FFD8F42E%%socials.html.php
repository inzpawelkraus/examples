<?php /* Smarty version 2.6.13, created on 2017-06-22 13:14:40
         compiled from misc/socials.html */ ?>
<div id="fb-root"></div>
<?php echo '
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pl_PL/sdk.js#xfbml=1&version=v2.9&appId=1909727775977398";
  fjs.parentNode.insertBefore(js, fjs);
}(document, \'script\', \'facebook-jssdk\'));</script>

'; ?>



<section class="socials">
    <div class="container">
        <div class="socials_bar">
            <strong>Zrób dobry uczynek</strong> i pomóż nam zebrac podpisy. Wystarczy że udostępnisz akcje
            <a class="social_button twitter pull-right" target="blank" href="http://twitter.com/intent/tweet?status=<?php echo $this->_tpl_vars['CONF']['server_addr'];  echo $this->_tpl_vars['article']['url']; ?>
+<?php echo $this->_tpl_vars['CONF']['server_addr'];  echo $this->_tpl_vars['article']['title']; ?>
"><i class="fa fa-twitter"></i><span>Udostępnij na Twitter</span></a>
            <a target="_blank" class="social_button facebook pull-right" href="http://www.facebook.com/sharer/sharer.php?u=<?php echo $this->_tpl_vars['CONF']['server_addr'];  echo $this->_tpl_vars['article']['url']; ?>
&title=<?php echo $this->_tpl_vars['article']['title']; ?>
&description=<?php echo $this->_tpl_vars['article']['content']; ?>
&photo=<?php echo $this->_tpl_vars['article']['photo']['photo']; ?>
"><i class="fa fa-facebook"></i><span>Udostępnij na Facebooku</span></a>
        </div>
    </div>
</section>