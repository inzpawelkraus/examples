<?php /* Smarty version 2.6.13, created on 2017-05-11 12:15:17
         compiled from galeria/zdjecia.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'math', 'galeria/zdjecia.html', 47, false),)), $this); ?>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
/js/jquery-1.6.2.min.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
/js/uploadify/swfobject.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
/js/uploadify/jquery.uploadify.v2.1.0.min.js"></script>
<?php echo '
<script type="text/javascript">
    $.noConflict();
    jQuery(document).ready(function($) {
    $(\'#multiuploader\').uploadify({
    '; ?>

        'uploader': '<?php echo $this->_tpl_vars['BASE_URL']; ?>
/js/uploadify/uploadify.swf',
        'script': '<?php echo $this->_tpl_vars['BASE_URL']; ?>
/js/uploadify/uploadify.php',
        'folder': '<?php echo $this->_tpl_vars['path']; ?>
/upload/<?php echo $this->_tpl_vars['gal_dir']; ?>
/<?php echo $this->_tpl_vars['gal']['id']; ?>
',
        'buttonText':'Wybierz pliki',
        'multi': true,
        'auto': true,
        'sizeLimit': 2000000,
        'onAllComplete'  : <?php echo 'function(){ '; ?>
 window.location.replace("?action=show_gallery&id=<?php echo $this->_tpl_vars['gal']['id']; ?>
") <?php echo ' },'; ?>

    'cancelImg': '<?php echo $this->_tpl_vars['BASE_URL']; ?>
/js/uploadify/cancel.png'
    <?php echo '
    });
    });</script>
'; ?>


<div id="content-header">
    <div id="breadcrumb"> <a href="/admin" title="Panel" class="tip-bottom"><i class="icon-home"></i> Panel</a> <a>Aktualności</a><a class="current">Dodj nową</a> </div>
    <h1><?php echo $this->_tpl_vars['pageTitle']; ?>
</h1>
</div>
<div class="container-fluid">
    <div class="row-fluid">
        <a class="btn" href="?"><i class="icon-step-backward"></i> Powrót do listy galerii</a>
        </br></br>
        <div class="info">
            <?php echo $this->_tpl_vars['gal']['content_short']; ?>

        </div>
        </br>
        <div class="center">
            <a class="btn btn"  href="?action=edit_gallery&amp;id=<?php echo $this->_tpl_vars['gal']['id']; ?>
" title="Edytuj"><i class="icon-edit"></i> Edytuj galerię</a>
            <a class="btn btn"  href="?action=delete_gallery&amp;id=<?php echo $this->_tpl_vars['gal']['id']; ?>
" title="Usuń" onclick="return confirmDelete();"><i class="icon-trash"></i> Usuń galerię</a>
        </div>
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-picture"></i> </span>
                <h5>Gallery</h5>
            </div>
            <div class="widget-content">
                <ul class="thumbnails">
                    <?php unset($this->_sections['g']);
$this->_sections['g']['name'] = 'g';
$this->_sections['g']['loop'] = is_array($_loop=$this->_tpl_vars['gallery']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['g']['show'] = true;
$this->_sections['g']['max'] = $this->_sections['g']['loop'];
$this->_sections['g']['step'] = 1;
$this->_sections['g']['start'] = $this->_sections['g']['step'] > 0 ? 0 : $this->_sections['g']['loop']-1;
if ($this->_sections['g']['show']) {
    $this->_sections['g']['total'] = $this->_sections['g']['loop'];
    if ($this->_sections['g']['total'] == 0)
        $this->_sections['g']['show'] = false;
} else
    $this->_sections['g']['total'] = 0;
if ($this->_sections['g']['show']):

            for ($this->_sections['g']['index'] = $this->_sections['g']['start'], $this->_sections['g']['iteration'] = 1;
                 $this->_sections['g']['iteration'] <= $this->_sections['g']['total'];
                 $this->_sections['g']['index'] += $this->_sections['g']['step'], $this->_sections['g']['iteration']++):
$this->_sections['g']['rownum'] = $this->_sections['g']['iteration'];
$this->_sections['g']['index_prev'] = $this->_sections['g']['index'] - $this->_sections['g']['step'];
$this->_sections['g']['index_next'] = $this->_sections['g']['index'] + $this->_sections['g']['step'];
$this->_sections['g']['first']      = ($this->_sections['g']['iteration'] == 1);
$this->_sections['g']['last']       = ($this->_sections['g']['iteration'] == $this->_sections['g']['total']);
?>  
                    <li class="span2"> <a> <img src="<?php echo $this->_tpl_vars['gallery'][$this->_sections['g']['index']]['src']; ?>
?<?php echo smarty_function_math(array('equation' => 'rand(0, 10000)'), $this);?>
" alt="<?php echo $this->_tpl_vars['gal']['title']; ?>
" /> </a>
                        <div class="actions"> 
                            <?php if (! $this->_sections['g']['first']): ?>
                            <a href="?id=<?php echo $this->_tpl_vars['gallery'][$this->_sections['g']['index']]['id']; ?>
&gallery_id=<?php echo $this->_tpl_vars['gal']['id']; ?>
&action=up" title="Przenieś w górę">
                                <i class="icon-sort-up"></i>
                            </a>
                            <?php endif; ?>
                            <a class="lightbox_trigger" href="<?php echo $this->_tpl_vars['gallery'][$this->_sections['g']['index']]['url']; ?>
"><i class="icon-search"></i></a> 
                            <a href="?delete_photo=<?php echo $this->_tpl_vars['gallery'][$this->_sections['g']['index']]['name']; ?>
&amp;id=<?php echo $this->_tpl_vars['gal']['id']; ?>
"><i class="icon-trash"></i></a>
                            <?php if (! $this->_sections['g']['last']): ?>
                            <a href="?id=<?php echo $this->_tpl_vars['gallery'][$this->_sections['g']['index']]['id']; ?>
&gallery_id=<?php echo $this->_tpl_vars['gal']['id']; ?>
&action=down" title="Przenieś w dół">
                                <i class="icon-sort-down"></i>
                            </a>
                            <?php endif; ?>
                        </div>
                    </li>
                    <?php endfor; else: ?>
                    <div class="alert alert-warning">Aktualnie brak zdjęć w galerii.</div>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-picture"></i> </span>
                <h5>Pliki do dołączenia</h5>
            </div>
            <div class="widget-content">
                <div class="alert alert-info">
                    Wybierz zdjęcia i załaduj je na serwer [można wybrać większą liczbe zdjęć]:
                </div>
                <div id="multiuploader"></div>
                </br>
                <form method="post" name="gal_zdjecia" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>
" class="form-horizontal">
                    <ul class="thumbnails">
                        <?php $_from = $this->_tpl_vars['aPliki']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['p'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['p']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['val']):
        $this->_foreach['p']['iteration']++;
?>
                        <li class="span2" style="text-align: center;">
                            <img src="<?php echo $this->_tpl_vars['gal_url']; ?>
/<?php echo $this->_tpl_vars['gal']['id']; ?>
/<?php echo $this->_tpl_vars['val']; ?>
" width="130" alt=""/>
                            <div class="actions"> 
                                <a href="javascript:void(0)">
                                    <input type="checkbox" name="new_foto_<?php echo $this->_tpl_vars['k']; ?>
" id="new_foto_<?php echo $this->_tpl_vars['k']; ?>
" value="1" checked="checked" />
                                    <input type="hidden" name="temp_<?php echo $this->_tpl_vars['k']; ?>
" id="temp_<?php echo $this->_tpl_vars['k']; ?>
" value="temp"/>
                                </a>
                                <a href="?action=delete_serv_photo&plik=<?php echo $this->_tpl_vars['val']; ?>
&id=<?php echo $this->_tpl_vars['gal']['id']; ?>
" title="Usuń zdjęcie z serwera" onclick="return confirmDelete();"><i class="icon-trash"></i></a>
                            </div>
                        </li>
                        <?php endforeach; endif; unset($_from); ?>
                    </ul>
                    <input class="btn btn-success" type="submit" value="Dodaj zdjęcia" />
                    <input type="hidden" name="action" value="add_photo" />
                    <input type="hidden" name="gallery_id" value="<?php echo $this->_tpl_vars['gal']['id']; ?>
" />
                    <input type="hidden" name="title_url" value="<?php echo $this->_tpl_vars['gal']['title_url']; ?>
" />
                </form>


            </div>
        </div>
    </div>
</div>
