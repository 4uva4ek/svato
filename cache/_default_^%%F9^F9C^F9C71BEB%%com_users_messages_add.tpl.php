<?php /* Smarty version 2.6.28, created on 2015-06-25 14:34:16
         compiled from com_users_messages_add.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'profile_url', 'com_users_messages_add.tpl', 5, false),array('function', 'csrf_token', 'com_users_messages_add.tpl', 10, false),)), $this); ?>
<script type="text/javascript" src="/includes/jquery/jquery.form.js"></script>
<?php if ($this->_tpl_vars['is_reply_user']): ?>
  <div class="usr_msgreply_source">
    <div class="usr_msgreply_sourcetext"><?php echo $this->_tpl_vars['msg']['message']; ?>
</div>
    <div class="usr_msgreply_author"><?php echo $this->_tpl_vars['LANG']['ORIGINAL_MESS']; ?>
: <a href="<?php echo cmsSmartyProfileURL(array('login' => $this->_tpl_vars['msg']['login']), $this);?>
"><?php echo $this->_tpl_vars['msg']['nickname']; ?>
</a>, <?php echo $this->_tpl_vars['msg']['senddate']; ?>
</div>
  </div>
<?php endif; ?>
<form action="" method="POST" name="msgform" id="send_msgform">
    <input type="hidden" name="gosend" value="1" />
    <input type="hidden" name="csrf_token" value="<?php echo smarty_function_csrf_token(array(), $this);?>
" />
    <div class="usr_msg_bbcodebox"><?php echo $this->_tpl_vars['bbcodetoolbar']; ?>
</div>
    <?php echo $this->_tpl_vars['smilestoolbar']; ?>

    <div class="cm_editor">
        <textarea class="ajax_autogrowarea" name="message" id="message"></textarea>
    </div>
    <div style="margin-top:6px; display:block">
    <?php if (! $this->_tpl_vars['id'] && $this->_tpl_vars['friends']): ?>
        <strong><?php echo $this->_tpl_vars['LANG']['SEND_TO']; ?>
: </strong>
        <select name="user_id" id="user_id" class="s_usr" style="width:160px;" onchange="changeFriendTo();">
            <option value="0"></option>
            <?php $_from = $this->_tpl_vars['friends']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['gid'] => $this->_tpl_vars['friend']):
?>
                <option value="<?php echo $this->_tpl_vars['friend']['id']; ?>
" <?php if ($this->_tpl_vars['id'] == $this->_tpl_vars['friend']['id']): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['friend']['nickname']; ?>
</option>
            <?php endforeach; endif; unset($_from); ?>
        </select>
    <?php else: ?>
        <select name="user_id" id="user_id" style="display: none;">
            <option value="<?php echo $this->_tpl_vars['id']; ?>
" selected="selected"></option>
        </select>
    <?php endif; ?>
    <?php if ($this->_tpl_vars['id_admin'] && ! $this->_tpl_vars['is_reply_user']): ?>
        <?php if (! $this->_tpl_vars['id']): ?>
        <select name="group_id" class="s_grp" id="group_id" style="width:160px; display:none">
            <?php $_from = $this->_tpl_vars['groups']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['gid'] => $this->_tpl_vars['group']):
?>
                <option value="<?php echo $this->_tpl_vars['group']['id']; ?>
"><?php echo $this->_tpl_vars['group']['title']; ?>
</option>
            <?php endforeach; endif; unset($_from); ?>
        </select>
        <input type="hidden" name="send_to_group" id="send_to_group" value="0" />
        <a href="javascript:" class="s_usr ajaxlink" onclick="<?php echo '$(\'.s_grp\').fadeIn();$(\'.s_usr\').hide();$(\'#send_to_group\').val(1);'; ?>
">
            <?php echo $this->_tpl_vars['LANG']['SEND_TO_GROUP']; ?>

        </a>
        <a href="javascript:" class="s_grp ajaxlink" onclick="<?php echo '$(\'.s_grp\').hide();$(\'.s_usr\').fadeIn();$(\'#send_to_group\').val(0);'; ?>
" style="display:none">
            <?php echo $this->_tpl_vars['LANG']['SEND_TO_FRIEND']; ?>

        </a>
        <?php endif; ?>
        <label>
            <input name="massmail" type="checkbox" value="1"  />
            <?php echo $this->_tpl_vars['LANG']['SEND_TO_ALL']; ?>

        </label>
    <?php endif; ?>
    </div>
</form>
<?php echo '
<script type="text/javascript">
$(document).ready(function(){
	$(\'.ajax_autogrowarea\').focus();
});
function changeFriendTo(){
    fr_to = $("#user_id option:selected").html();
    $(\'#popup_title\').html(\''; ?>
<?php echo $this->_tpl_vars['LANG']['WRITE_MESS']; ?>
<?php echo ': \'+fr_to);
}
</script>
'; ?>
