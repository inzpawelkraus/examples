<?php /* Smarty version 2.6.13, created on 2017-04-05 13:28:17
         compiled from misc/kontakt.html */ ?>
<!--<div id="page-title"><h1><?php echo $this->_tpl_vars['LANG']['_PAGE_CONTAKT']; ?>
</h1></div>
<div id="page-content">
    <p class="error center"><?php echo $this->_tpl_vars['error_contact']; ?>
</p>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
">
            <table>
                <tr><td><?php echo $this->_tpl_vars['LANG']['_KONTAKT_IMIE']; ?>
*</td><td><input class="text" type="text" name="imie" value="<?php echo $_POST['imie']; ?>
" /></td></tr>
                <tr><td><?php echo $this->_tpl_vars['LANG']['_KONTAKT_EMAIL']; ?>
*</td><td><input class="text" type="text" name="email" value="<?php echo $_POST['email']; ?>
" /></td></tr>
                <tr><td valign="top"><?php echo $this->_tpl_vars['LANG']['_KONTAKT_TRESC']; ?>
*</td><td><textarea name="tresc" rows="10" cols="50"><?php echo $_POST['tresc']; ?>
</textarea></td></tr>
                <tr><td><?php echo $this->_tpl_vars['LANG']['_KONTAKT_KOD']; ?>
*</td><td><input type="text" class="text" name="token" id="token" />
                    <img style="border: 1px solid #666; position: relative; top: 5px; left: 10px;" src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
/js/token/token.php?n=<?php echo $this->_tpl_vars['tokenid']; ?>
" alt="Token" />
                    <input type="hidden" name="tokenid" value="<?php echo $this->_tpl_vars['tokenid']; ?>
" /></td></tr>
                <tr><td></td><td class="right"><input type="hidden" name="action" value="send" /><input class="submit" type="submit" value="<?php echo $this->_tpl_vars['LANG']['_KONTAKT_WYSLIJ']; ?>
" /></td></tr>
            </table>
        </form>
    <p>* <?php echo $this->_tpl_vars['LANG']['_KONTAKT_WYPELNIJ']; ?>
</p>
</div>-->
<header class="inner" id="header" role="header">
    <div id="header_image" style="background: url(<?php echo $this->_tpl_vars['TPL_URL']; ?>
/assets/img/about1.jpg) top center no-repeat;">
        <div class="boxed">
            <div id="tagline" class="textcenter animated bounceInUp">
                <h1 class="tagline"><?php echo $this->_tpl_vars['LANG']['_PAGE_CONTAKT']; ?>
</h1>
            </div>
        </div>                    
    </div>                        
</header>
<div id="content">

    <!-- page content -->
    <section id="page">
        <div class="boxed">

            <div class="one_third">	
                <h5>Dane adresowe</h5>
                <p>Suspendisse dictum feugiat nisl ut dapibus. Mauris iaculis porttitor posuere. Etiam at risus et justo dignissim congue. Donec congue lacinia dui.</p>
                <p class="error center"><?php echo $this->_tpl_vars['error_contact']; ?>
</p>
            </div>

            <!-- form -->
            <div class="two_third">
                <h5>Formularz kontaktowy</h5>

                <form id="contact_form" name="contact_form" method="post" action="#" enctype="multipart/form-data">
                    <label for="name"><?php echo $this->_tpl_vars['LANG']['_KONTAKT_IMIE']; ?>
*</label>
                    <input class="text" type="text" name="imie" value="<?php echo $_POST['imie']; ?>
" required />

                    <label for="email"><?php echo $this->_tpl_vars['LANG']['_KONTAKT_EMAIL']; ?>
*</label>
                    <input class="text" type="text" name="email" value="<?php echo $_POST['email']; ?>
" required />

                    <label for="message"><?php echo $this->_tpl_vars['LANG']['_KONTAKT_TRESC']; ?>
*</label>
                    <textarea name="tresc" rows="10" cols="50" required><?php echo $_POST['tresc']; ?>
</textarea>

                    <label for="phone"><?php echo $this->_tpl_vars['LANG']['_KONTAKT_KOD']; ?>
*</label>
                    <input type="text" class="text" name="token" id="token" style="background: #f1f1f1 url('<?php echo $this->_tpl_vars['BASE_URL']; ?>
/js/token/token.php?n=<?php echo $this->_tpl_vars['tokenid']; ?>
') no-repeat right center" required/>
                    <input type="hidden" name="tokenid" value="<?php echo $this->_tpl_vars['tokenid']; ?>
" />
                    
                    <input class="submit" type="submit" value="<?php echo $this->_tpl_vars['LANG']['_KONTAKT_WYSLIJ']; ?>
" />
                </form>
            </div>
            <!-- /form -->

        </div>

    </section>
</div>