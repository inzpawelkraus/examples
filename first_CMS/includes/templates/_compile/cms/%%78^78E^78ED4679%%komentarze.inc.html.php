<?php /* Smarty version 2.6.13, created on 2017-03-17 13:33:00
         compiled from misc/komentarze.inc.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'misc/komentarze.inc.html', 16, false),array('modifier', 'nl2br', 'misc/komentarze.inc.html', 25, false),)), $this); ?>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
/js/showHide.js"></script>

<div id="comments">
	<?php if (! $this->_tpl_vars['can_see_comments']): ?>
		<p class="error center">Tylko zalogowani użytkownicy mogą przeglądać komentarze.</p>
	<?php else: ?>
		<?php if ($this->_tpl_vars['info']): ?><br /><p class="error center"><strong><?php echo $this->_tpl_vars['info']; ?>
</strong></p><?php endif; ?>
		<h1>Wasze komentarze
			<a href="#add-comment" onclick="showCommentForm('new-comment');">+ dodaj komentarz</a>
		</h1>
			
		<?php $_from = $this->_tpl_vars['comments']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['com'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['com']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['comment']):
        $this->_foreach['com']['iteration']++;
?>
		<?php if (($this->_foreach['com']['iteration'] <= 1)): ?>
		<ul>
		<?php endif; ?>
			<li class="<?php echo smarty_function_cycle(array('values' => "row-clear,row-dark"), $this);?>
">
			<h2>
				<div class="author">
					(<?php echo $this->_tpl_vars['comment']['date_add']; ?>
)<br />
					<b><?php echo $this->_tpl_vars['comment']['author']; ?>
</b>
				</div>
				<b><?php echo $this->_tpl_vars['comment']['title']; ?>
</b>
			</h2>
			
			<?php echo ((is_array($_tmp=$this->_tpl_vars['comment']['content'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>

				<br />

		<div id="add-comment-<?php echo ($this->_foreach['com']['iteration']-1); ?>
" class="hidden"></div>				
			</li>
		<?php if (($this->_foreach['com']['iteration'] == $this->_foreach['com']['total'])): ?>
		</ul>
		<?php endif; ?>
		<?php endforeach; else: ?>
			<p class="center important">Brak komentarzy.</p>
		<?php endif; unset($_from); ?>
		<?php if ($this->_tpl_vars['c_pages'] > 1): ?>
		<p>
			<div class="navbar-back">
				<?php if ($this->_tpl_vars['c_page'] > 1): ?>
					<a href="?c_page=<?php echo $this->_tpl_vars['c_page']-1; ?>
#comments">&laquo; Poprzednie</a>
				<?php else: ?>
					<span class="not-important">&laquo; Poprzednie</span>
				<?php endif; ?>			
			</div>
			<div class="navbar-next">
				<?php if ($this->_tpl_vars['c_page'] < $this->_tpl_vars['c_pages']): ?>
					<a href="?c_page=<?php echo $this->_tpl_vars['c_page']+1; ?>
#comments">Następne &raquo;</a>
				<?php else: ?>
					<span class="not-important">Następne &raquo;</span>
				<?php endif; ?>		
			</div>
			<div class="center">Strona <b><?php echo $this->_tpl_vars['c_page']; ?>
</b> z <b><?php echo $this->_tpl_vars['c_pages']; ?>
</b></div>
		</p>
		<?php endif; ?>
		
		<div id="new-comment" class="hidden"></div>
	<?php endif; ?>
</div>

<?php echo '
<script type="text/javascript">
// <![CDATA[
	';  if ($this->_tpl_vars['info'] && $this->_tpl_vars['info'] != 'Dziękujemy! Twój komentarz został dodany.'): ?> jQuery(showCommentForm('new-comment')); <?php endif;  echo '
	
	function showCommentForm(strObjectId, parentId){ '; ?>

		var parentId = parentId || 0;
		var commentForm = '<h1 class="add-comment">Dodaj komentarz</h1>' +
		'<?php if (! $this->_tpl_vars['can_write_comments']): ?><p class="error center">Tylko zalogowani użytkownicy mogą pisać komentarze.</p>' + 
		'<?php else: ?>' +
			'<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
">'+
			'<table align="center">'+
				'<tr>'+
					'<td>Tytuł:</td>'+
				'</tr><tr>'+
					'<td><input class="text tytul" type="text" name="title" value="<?php echo $_POST['title']; ?>
" /></td>'+				
				'</tr><tr>'+
					'<td>Twój komentarz:</td>'+
				'</tr><tr>'+
					'<td>'+
						'<textarea name="content"><?php echo $_POST['content']; ?>
</textarea>'+				
					'</td>	'+		
				'</tr><tr>'+
					'<td>'+
						'Autor: '+
						'<?php if ($this->_tpl_vars['logged']): ?>'+
							'<b><?php echo $_SESSION['user']['login']; ?>
</b>'+
							'<input type="hidden" name="author" value="<?php echo $_SESSION['user']['login']; ?>
" />'+
						'<?php else: ?>'+
							'<br />'+
							'<input type="text" class="text" name="author" value="<?php echo $_POST['author']; ?>
" size="30" />'+
						'<?php endif; ?>'+
					'</td>'+
				'</tr><tr>'+
					'<td>'+
						'Przepisz kod z obrazka: '+
							'<br />'+
							'<input type="text" class="text" name="token" id="token"/>'+
							'<img style="border: 1px solid #B9B9B9; position: relative; top: 5px; left: 10px;" src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
/js/token/token.php?n=<?php echo $this->_tpl_vars['tokenid']; ?>
" alt="Token" />'+
							'<input type="hidden" name="tokenid" value="<?php echo $this->_tpl_vars['tokenid']; ?>
" /><br /><br />'+
					'</td>'+
				'</tr><tr>'+
					'<td class="center">'+
						'<input class="submit" type="submit" value="Dodaj" />'+
						'<input type="hidden" name="action" value="add" />'+
					'</td>'+			
				'</tr>'+
			'</table>'+
			'</form>'+		
		'<?php endif; ?>';<?php echo '
		
		jQuery(\'#\' + strObjectId).html(commentForm).toggle(\'slow\');
		location.href = \'#\' + strObjectId;
	} 
// ]]>
</script>
'; ?>