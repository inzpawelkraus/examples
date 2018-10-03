<?php /* Smarty version 2.6.13, created on 2017-04-05 14:06:38
         compiled from misc/komentarze.inc.html */ ?>
<section id="commentbox">
    <div class="boxed">
        <?php if (! $this->_tpl_vars['can_see_comments']): ?>
        <p class="error center">Tylko zalogowani użytkownicy mogą przeglądać komentarze.</p>
        <?php else: ?>
        <ul class="nolist" id="comments">
            <?php $_from = $this->_tpl_vars['comments']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['com'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['com']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['comment']):
        $this->_foreach['com']['iteration']++;
?>
            <li class="comment odd alt thread-odd thread-alt depth-1">
                <div id="div-comment-14" class="comment-body">
                    <div class="comment-author vcard">
                        <cite class=""><?php echo $this->_tpl_vars['comment']['author']; ?>
</cite>	
                    </div>
                    <div class="comment-meta">
                        <a href="#"><?php echo $this->_tpl_vars['comment']['date_add']; ?>
</a>
                    </div>
                    <p><?php echo $this->_tpl_vars['comment']['title']; ?>
</p>
                    <div class="reply">
                    </div>
                </div>
            </li>
            <?php endforeach; else: ?>
            <p class="center important">Brak komentarzy.</p>
            <?php endif; unset($_from); ?>
        </ul>

        <div id="respond" class="comment-respond">
            <h3 id="reply-title" class="comment-reply-title">
                Dodaj komentarz
            </h3>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
" id="commentform" class="comment-form">
                <p class="comment-form-comment">
                    <?php if ($this->_tpl_vars['logged']): ?>
                    <input type="hidden" name="author" value="<?php echo $_SESSION['user']['login']; ?>
" />
                    <?php else: ?>
                    <input placeholder="Login" type="text" class="text" name="author" value="<?php echo $_POST['author']; ?>
" size="30" />
                    <?php endif; ?>
                    <input class="text tytul" type="text" name="title" value="<?php echo $_POST['title']; ?>
" required placeholder="Tytuł"/>
                    <textarea name="content">Treść komentarza</textarea>
                    <input placeholder="Przepisz kod z prawej strony" type="text" class="text" name="token" id="token" style="background: #f1f1f1 url('<?php echo $this->_tpl_vars['BASE_URL']; ?>
/js/token/token.php?n=<?php echo $this->_tpl_vars['tokenid']; ?>
') no-repeat right center"/>
                    <input type="hidden" name="tokenid" value="<?php echo $this->_tpl_vars['tokenid']; ?>
" />
                </p>						
                <p class="form-submit">
                    <input name="submit" class="submit" type="submit" id="submit" value="Dodaj komentarz" />
                    <input type="hidden" name="action" value="add" />
                </p>
            </form>
        </div>
        <?php endif; ?>
    </div>
</section>