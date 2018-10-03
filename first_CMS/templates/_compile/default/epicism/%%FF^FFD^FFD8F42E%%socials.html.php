<?php /* Smarty version 2.6.13, created on 2017-04-21 15:58:51
         compiled from misc/socials.html */ ?>
<meta property="og:image" content="<?php echo $this->_tpl_vars['CONF']['server_addr'];  echo $this->_tpl_vars['article']['photo']['photo']; ?>
"/>
<meta property="og:title" content="<?php echo $this->_tpl_vars['article']['title']; ?>
"/>
<meta property="og:description" content="<?php echo $this->_tpl_vars['article']['content_short']; ?>
"/>
<meta property="og:type" content="website"/>
<script src="https://apis.google.com/js/platform.js" async defer></script>

<div id="fb-root"></div>
<?php echo '
<script>
    (function (d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id))
	    return;
	js = d.createElement(s);
	js.id = id;
	js.src = "//connect.facebook.net/pl_PL/sdk.js#xfbml=1&version=v2.9&appId=979495432096115";
	fjs.parentNode.insertBefore(js, fjs);
    }(document, \'script\', \'facebook-jssdk\'));
    !function (d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? \'http\' : \'https\';
	if (!d.getElementById(id)) {
	    js = d.createElement(s);
	    js.id = id;
	    js.src = p + \'://platform.twitter.com/widgets.js\';
	    fjs.parentNode.insertBefore(js, fjs);
	}
    }(document, \'script\', \'twitter-wjs\');
    window.___gcfg = {
	lang: \'pl-PL\',
	parsetags: \'onload\'
    };
</script>

'; ?>

<div class="fb-like" data-href="<?php echo $this->_tpl_vars['CONF']['server_addr'];  echo $this->_tpl_vars['article']['url']; ?>
" data-width="250" data-layout="button_count" data-action="like" data-size="large" data-show-faces="false" data-share="true"></div>
<a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo $this->_tpl_vars['CONF']['server_addr'];  echo $this->_tpl_vars['article']['url']; ?>
" data-text="Polecam:" data-size="large">Tweet</a>
<div class="g-plusone"></div>