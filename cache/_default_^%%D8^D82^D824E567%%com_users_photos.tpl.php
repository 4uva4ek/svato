<?php /* Smarty version 2.6.28, created on 2015-05-19 13:07:13
         compiled from com_users_photos.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'profile_url', 'com_users_photos.tpl', 12, false),array('function', 'math', 'com_users_photos.tpl', 87, false),array('modifier', 'escape', 'com_users_photos.tpl', 20, false),array('modifier', 'nl2br', 'com_users_photos.tpl', 45, false),)), $this); ?>
<?php if (( $this->_tpl_vars['my_profile'] || $this->_tpl_vars['is_admin'] ) && $this->_tpl_vars['album_type'] == 'private'): ?>
    <div class="float_bar">
        <?php if ($this->_tpl_vars['my_profile']): ?>
            <a href="/users/addphoto.html" class="usr_photo_add"><?php echo $this->_tpl_vars['LANG']['ADD_PHOTO']; ?>
</a>
        <?php endif; ?>
        <a href="javascript:void(0)" onclick="$('#usr_photos_upload_album').show();" class="usr_edit_album"><span class="ajaxlink"><?php echo $this->_tpl_vars['LANG']['EDIT_ALBUM']; ?>
</span></a>
        <a href="/users/<?php echo $this->_tpl_vars['user_id']; ?>
/delalbum<?php echo $this->_tpl_vars['album']['id']; ?>
.html" onclick="if(!confirm('<?php echo $this->_tpl_vars['LANG']['DELETE_ALBUM_CONFIRM']; ?>
'))<?php echo '{ return false; }'; ?>
" class="usr_del_album"><span class="ajaxlink"><?php echo $this->_tpl_vars['LANG']['DELETE_ALBUM']; ?>
</span></a>
    </div>
<?php endif; ?>

<div class="con_heading">
    <a href="<?php echo cmsSmartyProfileURL(array('login' => $this->_tpl_vars['usr']['login']), $this);?>
"><?php echo $this->_tpl_vars['usr']['nickname']; ?>
</a> &rarr; <?php echo $this->_tpl_vars['page_title']; ?>

</div>
<?php if (( $this->_tpl_vars['my_profile'] || $this->_tpl_vars['is_admin'] ) && $this->_tpl_vars['album_type'] == 'private'): ?>
    <div id="usr_photos_upload_album" style="display:none;">
	<form action="/users/<?php echo $this->_tpl_vars['usr']['id']; ?>
/editalbum<?php echo $this->_tpl_vars['album']['id']; ?>
.html" method="post">
        <table border="0" cellspacing="0" cellpadding="2">
          <tr>
            <td><label for="album_title"><?php echo $this->_tpl_vars['LANG']['ALBUM_TITLE']; ?>
:</label></td>
            <td><input type="text" class="text-input" name="album_title" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['album']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" /></td>
            <td><?php echo $this->_tpl_vars['LANG']['SHOW']; ?>
:
                    <select name="album_allow_who" id="album_allow_who">
                       <option value="all" <?php if ($this->_tpl_vars['album']['allow_who'] == 'all'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['EVERYBODY']; ?>
</option>
                       <option value="registered" <?php if ($this->_tpl_vars['album']['allow_who'] == 'registered'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['REGISTERED']; ?>
</option>
                       <option value="friends" <?php if ($this->_tpl_vars['album']['allow_who'] == 'friends'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['MY_FRIENDS']; ?>
</option>
                    </select>
            </td>
          </tr>
          <tr>
            <td><label for="description"><?php echo $this->_tpl_vars['LANG']['ALBUM_DESCRIPTION']; ?>
:</label></td>
            <td colspan="2"><textarea name="description" style="width:465px; height:45px;"><?php echo $this->_tpl_vars['album']['description']; ?>
</textarea></td>
          </tr>
        </table>
        <div class="usr_photo_sel_bar bar">
           <input type="submit" name="save_album" value="<?php echo $this->_tpl_vars['LANG']['SAVE']; ?>
"/>
           <input name="Button" type="button" value="<?php echo $this->_tpl_vars['LANG']['CANCEL']; ?>
" onclick="<?php echo '$(\'#usr_photos_upload_album\').hide();'; ?>
"/>
        </div>
      </form>
    </div>
<?php endif; ?>
<?php if ($this->_tpl_vars['album_type'] == 'public'): ?>
    <div class="usr_photos_notice"><?php echo $this->_tpl_vars['LANG']['IS_PUBLIC_ALBUM']; ?>
 <a href="<?php if (! $this->_tpl_vars['album']['NSDiffer']): ?>/photos/<?php echo $this->_tpl_vars['album']['id']; ?>
<?php else: ?>/clubs/photoalbum<?php echo $this->_tpl_vars['album']['id']; ?>
<?php endif; ?>"><?php echo $this->_tpl_vars['LANG']['ALL_PUBLIC_PHOTOS']; ?>
</a></div>
<?php endif; ?>
<?php if ($this->_tpl_vars['album_type'] == 'private' && $this->_tpl_vars['album']['description']): ?>
    <div id="usr_photos_upload_album"><?php echo ((is_array($_tmp=$this->_tpl_vars['album']['description'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</div>
<?php endif; ?>
<?php if ($this->_tpl_vars['photos']): ?>

        <?php if (( $this->_tpl_vars['is_admin'] || $this->_tpl_vars['my_profile'] ) && $this->_tpl_vars['album_type'] == 'private'): ?>
        <form action="/users/<?php echo $this->_tpl_vars['user_id']; ?>
/photos/editlist" method="post">
            <input type="hidden" name="album_id" value="<?php echo $this->_tpl_vars['album']['id']; ?>
" />
            <script type="text/javascript">
                <?php echo '
                function toggleButtons(){
                    var is_sel = $(\'.photo_id:checked\').length;
                    if (is_sel > 0) {
                        $(\'#edit_btn, #delete_btn\').prop(\'disabled\', false);
                    } else {
                        $(\'#edit_btn, #delete_btn\').prop(\'disabled\', true);
                    }
                }
                '; ?>

            </script>
        <?php endif; ?>

		<table width="" cellpadding="0" cellspacing="0" border="0">

            <?php $this->assign('maxcols', '7'); ?>
            <?php $this->assign('col', '1'); ?>

			<?php $_from = $this->_tpl_vars['photos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['photo']):
?>
				<?php if ($this->_tpl_vars['col'] == 1): ?> <tr> <?php endif; ?>
				<td valign="top" width="">
					<div class="usr_photo_thumb">
                        <a class="usr_photo_link" href="<?php echo $this->_tpl_vars['photo']['url']; ?>
" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['photo']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
">
                            <img border="0" src="<?php echo $this->_tpl_vars['photo']['file']; ?>
" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['photo']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
"/>
                        </a>
                        <div>
                            <span class="usr_photo_date"><?php echo $this->_tpl_vars['photo']['fpubdate']; ?>
</span>
                            <span class="usr_photo_hits"><strong><?php echo $this->_tpl_vars['LANG']['HITS']; ?>
:</strong> <?php echo $this->_tpl_vars['photo']['hits']; ?>
</span>
                        </div>
                        <?php if (( $this->_tpl_vars['is_admin'] || $this->_tpl_vars['my_profile'] ) && $this->_tpl_vars['album_type'] == 'private'): ?>
                            <input type="checkbox" name="photos[]" class="photo_id" value="<?php echo $this->_tpl_vars['photo']['id']; ?>
" onclick="toggleButtons()" />
                        <?php endif; ?>
                    </div>
				</td>
				<?php if ($this->_tpl_vars['col'] == $this->_tpl_vars['maxcols']): ?> </tr> <?php $this->assign('col', '1'); ?> <?php else: ?> <?php echo smarty_function_math(array('equation' => "x + 1",'x' => $this->_tpl_vars['col'],'assign' => 'col'), $this);?>
 <?php endif; ?>
			<?php endforeach; endif; unset($_from); ?>

            <?php if ($this->_tpl_vars['col'] > 1): ?>
				<td colspan="<?php echo smarty_function_math(array('equation' => "x - y + 1",'x' => $this->_tpl_vars['col'],'y' => $this->_tpl_vars['maxcols']), $this);?>
">&nbsp;</td></tr>
			<?php endif; ?>

		</table>

        <?php if (( $this->_tpl_vars['is_admin'] || $this->_tpl_vars['my_profile'] ) && $this->_tpl_vars['album_type'] == 'private'): ?>
            <div class="usr_photo_sel_bar bar">
                <?php echo $this->_tpl_vars['LANG']['SELECTED_ITEMS']; ?>
:
                <input type="submit" name="edit" id="edit_btn" value="<?php echo $this->_tpl_vars['LANG']['EDIT']; ?>
" disabled="disabled" />
                <input type="submit" name="delete" id="delete_btn" value="<?php echo $this->_tpl_vars['LANG']['DELETE']; ?>
" disabled="disabled" />
            </div>
            </form>
        <?php endif; ?>

		<?php echo $this->_tpl_vars['pagebar']; ?>


<?php else: ?>
    <p><?php echo $this->_tpl_vars['LANG']['NOT_PHOTOS']; ?>
</p>
<?php endif; ?>