<?php /* Smarty version 2.6.28, created on 2015-05-25 11:28:26
         compiled from com_users_avatar_upload.tpl */ ?>
<div class="float_bar"><a class="usr_avatars_lib_link" href="/users/<?php echo $this->_tpl_vars['id']; ?>
/select-avatar.html"><?php echo $this->_tpl_vars['LANG']['SELECT_AVATAR_FROM_COLL']; ?>
</a></div>

<div class="con_heading"><?php echo $this->_tpl_vars['LANG']['LOAD_AVATAR']; ?>
</div>

<form enctype="multipart/form-data" action="/users/<?php echo $this->_tpl_vars['id']; ?>
/avatar.html" method="POST">
	<p><?php echo $this->_tpl_vars['LANG']['SELECT_UPLOAD_FILE']; ?>
: </p>
		<input name="upload" type="hidden" value="1"/>
		<input name="userid" type="hidden" value="<?php echo $this->_tpl_vars['id']; ?>
"/>
		<input name="picture" type="file" id="picture" size="30" />
	<p style="margin-top:10px">
		<input type="submit" value="<?php echo $this->_tpl_vars['LANG']['UPLOAD']; ?>
"> <input type="button" onclick="window.history.go(-1);" value="<?php echo $this->_tpl_vars['LANG']['CANCEL']; ?>
"/>
	</p>
</form>
