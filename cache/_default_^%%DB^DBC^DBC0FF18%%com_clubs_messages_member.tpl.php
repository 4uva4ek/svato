<?php /* Smarty version 2.6.28, created on 2015-06-08 20:18:53
         compiled from com_clubs_messages_member.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'csrf_token', 'com_clubs_messages_member.tpl', 5, false),array('modifier', 'escape', 'com_clubs_messages_member.tpl', 17, false),)), $this); ?>
<script type="text/javascript" src="/includes/jquery/jquery.form.js"></script>
<p style="margin:6px 0;" id="text_mes"><?php echo $this->_tpl_vars['LANG']['SEND_MESSAGE_TEXT']; ?>
 "<?php echo $this->_tpl_vars['club']['title']; ?>
".</p>
<form action="/clubs/<?php echo $this->_tpl_vars['club']['id']; ?>
/message-members.html" method="POST" name="msgform" id="send_messages">
<input type="hidden" name="gosend" value="1" />
<input type="hidden" name="csrf_token" value="<?php echo smarty_function_csrf_token(array(), $this);?>
" />
<div class="usr_msg_bbcodebox"><?php echo $this->_tpl_vars['bbcodetoolbar']; ?>
</div>
<?php echo $this->_tpl_vars['smilestoolbar']; ?>

<div class="cm_editor"><textarea class="ajax_autogrowarea" name="content" id="message"></textarea></div>
<div style="margin:0 0 4px;">
	<label><input id="only_mod" name="only_mod" type="checkbox" value="1" onclick="mod_text()" /> <?php echo $this->_tpl_vars['LANG']['MESSAGE_ONLY_MODERS']; ?>
</label>
</div>
</form>
<?php echo '
<script type="text/javascript">
function mod_text(){
	if ($(\'#only_mod\').prop(\'checked\')){
		$(\'#text_mes\').html(\''; ?>
<?php echo $this->_tpl_vars['LANG']['SEND_MESSAGE_TEXT_MOD']; ?>
 "<?php echo ((is_array($_tmp=$this->_tpl_vars['club']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
"<?php echo '.\');
	} else {
		$(\'#text_mes\').html(\''; ?>
<?php echo $this->_tpl_vars['LANG']['SEND_MESSAGE_TEXT']; ?>
 "<?php echo ((is_array($_tmp=$this->_tpl_vars['club']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
".<?php echo '\');
	}
}
$(document).ready(function(){
	$(\'.ajax_autogrowarea\').focus();
});
</script>
'; ?>