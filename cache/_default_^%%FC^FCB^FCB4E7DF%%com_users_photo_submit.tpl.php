<?php /* Smarty version 2.6.28, created on 2015-05-25 11:28:10
         compiled from com_users_photo_submit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'com_users_photo_submit.tpl', 80, false),)), $this); ?>
<h1 class="con_heading"><?php echo $this->_tpl_vars['LANG']['PHOTOS_CONFIG']; ?>
</h1>

<script type="text/javascript">
    <?php echo '
    function togglePhoto(id){
        if ($(\'#delete\'+id).prop(\'checked\')){
            $(\'#photo\'+id+\' .text-input\').prop(\'disabled\', true);
            $(\'#photo\'+id+\' select\').prop(\'disabled\', true);
        } else {
            $(\'#photo\'+id+\' .text-input\').prop(\'disabled\', false);
            $(\'#photo\'+id+\' select\').prop(\'disabled\', false);
        }
    }
    '; ?>

</script>

<form action="" method="post">

    <div id="usr_photos_upload_album">
        <table border="0" cellpadding="0" cellspacing="0">
            <?php if ($this->_tpl_vars['albums']): ?>
            <tr>
                <td width="23" height="30"><input type="radio" name="new_album" id="new_album_0" value="0" checked="checked" onclick="$('#description').hide();" /></td>
                <td><label for="new_album_0"><?php echo $this->_tpl_vars['LANG']['SAVE_TO_ALBUM']; ?>
:</label></td>
                <td style="padding-left: 10px" colspan="3">
                    <select name="album_id" class="select-input">
                        <?php $_from = $this->_tpl_vars['albums']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['ak'] => $this->_tpl_vars['album']):
?>
                            <option value="<?php echo $this->_tpl_vars['album']['id']; ?>
" <?php if ($this->_tpl_vars['album_id'] == $this->_tpl_vars['album']['id']): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['album']['title']; ?>
</option>
                        <?php endforeach; endif; unset($_from); ?>
                    </select>
                </td>
            </tr>
            <?php endif; ?>
            <tr>
                <td width="23" height="30"><input type="radio" name="new_album" id="new_album_1" value="1" <?php if (! $this->_tpl_vars['albums']): ?>checked="checked"<?php endif; ?> onclick="$('#description').show();" /></td>
                <td><label for="new_album_1"><?php echo $this->_tpl_vars['LANG']['CREATE_NEW_ALBUM']; ?>
:</label></td>
                <td style="padding:0px 10px">
                    <input type="text" class="text-input" name="album_title" onclick="$('#description').show();$('#new_album_1').prop('checked', true);" />
                </td>
                <td width="80"><?php echo $this->_tpl_vars['LANG']['SHOW']; ?>
:</td>
                <td>
                    <select name="album_allow_who" id="album_allow_who">
                        <option value="all"><?php echo $this->_tpl_vars['LANG']['TO_ALL']; ?>
</option>
                        <option value="registered"><?php echo $this->_tpl_vars['LANG']['TO_REGISTERED']; ?>
</option>
                        <option value="friends"><?php echo $this->_tpl_vars['LANG']['TO_MY_FRIEND']; ?>
</option>
                    </select>
                </td>
            </tr>
            <tr id="description" <?php if ($this->_tpl_vars['albums']): ?>style="display:none;"<?php endif; ?> >
                <td width="23" height="30"></td>
                <td><label for="description"><?php echo $this->_tpl_vars['LANG']['ALBUM_DESCRIPTION']; ?>
:</label></td>
                <td style="padding-left: 10px" colspan="3">
					<textarea name="description" class="text-input" style="width:488px; height:45px;"></textarea>
                </td>
            </tr>
        </table>
    </div>

    <div class="usr_photos_submit_list">
        <?php $_from = $this->_tpl_vars['photos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['pk'] => $this->_tpl_vars['photo']):
?>
        <div id="photo<?php echo $this->_tpl_vars['photo']['id']; ?>
" class="usr_photos_submit_one">
            <div class="float_bar">
                <table>
                    <tr>
                        <td width="20"><input type="checkbox" name="delete[]" value="<?php echo $this->_tpl_vars['photo']['id']; ?>
" id="delete<?php echo $this->_tpl_vars['photo']['id']; ?>
" onclick="togglePhoto(<?php echo $this->_tpl_vars['photo']['id']; ?>
)"/></td>
                        <td><label for="delete<?php echo $this->_tpl_vars['photo']['id']; ?>
"><?php echo $this->_tpl_vars['LANG']['DELETE']; ?>
</label></td>
                    </tr>
                </table>
            </div>
            <table border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td width="120" height="110">
                        <div class="ph_thumb"><img src="/images/users/photos/small/<?php echo $this->_tpl_vars['photo']['imageurl']; ?>
" /></div>
                    </td>
                    <td>

                        <table border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <td width="100" height="30"><?php echo $this->_tpl_vars['LANG']['TITLE']; ?>
:</td>
                                <td><input type="text" name="title[<?php echo $this->_tpl_vars['photo']['id']; ?>
]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['photo']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" class="text-input" /></td>
                            </tr>
                            <tr>
                                <td height="30"><?php echo $this->_tpl_vars['LANG']['DESCRIPTION']; ?>
:</td>
                                <td><input type="text" name="desc[<?php echo $this->_tpl_vars['photo']['id']; ?>
]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['photo']['description'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" class="text-input" /></td>
                            </tr>
                            <tr>
                                <td height="30"><?php echo $this->_tpl_vars['LANG']['SHOW']; ?>
:</td>
                                <td>
                                    <select name="allow[<?php echo $this->_tpl_vars['photo']['id']; ?>
]">
                                        <option value="all" <?php if ($this->_tpl_vars['photo']['allow_who'] == 'all'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['TO_ALL']; ?>
</option>
                                        <option value="registered" <?php if ($this->_tpl_vars['photo']['allow_who'] == 'registered'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['TO_REGISTERED']; ?>
</option>
                                        <option value="friends" <?php if ($this->_tpl_vars['photo']['allow_who'] == 'friends'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['TO_MY_FRIEND']; ?>
</option>
                                    </select>
                                </td>
                            </tr>
                        </table>

                    </td>
                </tr>
            </table>
        </div>
        <?php endforeach; endif; unset($_from); ?>
    </div>
    <div id="usr_photos_submit_btn">
    	<input type="hidden" name="is_edit" value="<?php echo $this->_tpl_vars['is_edit']; ?>
" />
        <input type="submit" name="submit" value="<?php echo $this->_tpl_vars['LANG']['SAVE']; ?>
" /> <?php echo $this->_tpl_vars['LANG']['AND_GO_TO_ALBUM']; ?>

    </div>
</form>