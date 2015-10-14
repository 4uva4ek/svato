<?php /* Smarty version 2.6.28, created on 2015-05-19 16:13:44
         compiled from com_clubs_view_album.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'csrf_token', 'com_clubs_view_album.tpl', 2, false),array('function', 'math', 'com_clubs_view_album.tpl', 14, false),array('modifier', 'escape', 'com_clubs_view_album.tpl', 16, false),array('modifier', 'truncate', 'com_clubs_view_album.tpl', 19, false),)), $this); ?>
<?php if ($this->_tpl_vars['is_admin'] || $this->_tpl_vars['is_moder'] || $this->_tpl_vars['is_member']): ?>
<div class="float_bar"><?php if ($this->_tpl_vars['is_admin'] || $this->_tpl_vars['is_moder']): ?><a class="ajaxlink usr_edit_album" href="javascript:void(0)" onclick="clubs.renameAlbum(<?php echo $this->_tpl_vars['album']['id']; ?>
);return false;"><?php echo $this->_tpl_vars['LANG']['RENAME_ALBUM']; ?>
</a> | <a class="ajaxlink usr_del_album" href="javascript:void(0)" onclick="clubs.deleteAlbum(<?php echo $this->_tpl_vars['album']['id']; ?>
, '<?php echo smarty_function_csrf_token(array(), $this);?>
');return false;"><?php echo $this->_tpl_vars['LANG']['DELETE_ALBUM']; ?>
</a> | <?php endif; ?><a class="photo_add_link" href="/clubs/addphoto<?php echo $this->_tpl_vars['album']['id']; ?>
.html"><?php echo $this->_tpl_vars['LANG']['ADD_PHOTO_TO_ALBUM']; ?>
</a></div>
<?php endif; ?>

<h1 class="con_heading"><span id="album_title"><?php echo $this->_tpl_vars['album']['title']; ?>
</span> (<?php echo $this->_tpl_vars['total']; ?>
)</h1>
<div class="clear"></div>
		
<?php if ($this->_tpl_vars['photos']): ?>
<?php $this->assign('col', '1'); ?>
<div class="photo_gallery">
    <table cellpadding="0" cellspacing="0" border="0">
        <?php $_from = $this->_tpl_vars['photos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tid'] => $this->_tpl_vars['con']):
?>
            <?php if ($this->_tpl_vars['col'] == 1): ?> <tr> <?php endif; ?>
            <td align="center" valign="middle" width="<?php echo smarty_function_math(array('equation' => "100/x",'x' => $this->_tpl_vars['cfg']['photo_maxcols']), $this);?>
%">
                <div class="photo_thumb" align="center">
                    <a class="lightbox-enabled" rel="lightbox-galery" href="/images/photos/medium/<?php echo $this->_tpl_vars['con']['file']; ?>
" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['con']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
">
                        <img class="photo_thumb_img" src="/images/photos/small/<?php echo $this->_tpl_vars['con']['file']; ?>
" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['con']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" border="0" />
                    </a><br />
                    <a href="/clubs/photo<?php echo $this->_tpl_vars['con']['id']; ?>
.html" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['con']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['con']['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 18) : smarty_modifier_truncate($_tmp, 18)); ?>
</a>
                    <?php if (! $this->_tpl_vars['con']['published']): ?>
                    	<div style="color:#F00; font-size:12px"><?php echo $this->_tpl_vars['LANG']['WAIT_MODERING']; ?>
</div>
                    <?php endif; ?>
            	</div>
            </td>
        <?php if ($this->_tpl_vars['col'] == $this->_tpl_vars['cfg']['photo_maxcols']): ?> </tr> <?php $this->assign('col', '1'); ?> <?php else: ?> <?php echo smarty_function_math(array('equation' => "x + 1",'x' => $this->_tpl_vars['col'],'assign' => 'col'), $this);?>
 <?php endif; ?>
        <?php endforeach; endif; unset($_from); ?>
        <?php if ($this->_tpl_vars['col'] > 1): ?> 
            <td colspan="<?php echo smarty_function_math(array('equation' => "x - y + 1",'x' => $this->_tpl_vars['col'],'y' => $this->_tpl_vars['cfg']['photo_maxcols']), $this);?>
">&nbsp;</td></tr>
        <?php endif; ?>
   </table>
</div>
<?php echo $this->_tpl_vars['pagebar']; ?>

<?php else: ?>
<p><?php echo $this->_tpl_vars['LANG']['NOT_PHOTOS_IN_ALBUM']; ?>
</p>    
<?php endif; ?>