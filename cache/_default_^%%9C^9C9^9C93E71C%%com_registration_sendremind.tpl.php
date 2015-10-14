<?php /* Smarty version 2.6.28, created on 2015-05-20 13:48:12
         compiled from com_registration_sendremind.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'csrf_token', 'com_registration_sendremind.tpl', 3, false),)), $this); ?>
<h1 class="con_heading"><?php echo $this->_tpl_vars['LANG']['REMINDER_PASS']; ?>
</h1>
<form name="prform" action="" method="POST">
<input type="hidden" name="csrf_token" value="<?php echo smarty_function_csrf_token(array(), $this);?>
" />
<table style="background-color:#EBEBEB" border="0" cellspacing="0" cellpadding="9"><tr>
<td><?php echo $this->_tpl_vars['LANG']['WRITE_REGISTRATION_EMAIL']; ?>
: </td>
<td><input name="email" type="text" size="25" class="text-input" /></td>
<td><input name="goremind" type="submit" value="<?php echo $this->_tpl_vars['LANG']['SEND']; ?>
"/></td>
</tr></table>
</form>