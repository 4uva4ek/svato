<?php /* Smarty version 2.6.28, created on 2015-06-25 16:04:59
         compiled from com_battleways_add.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'com_battleways_add.tpl', 25, false),)), $this); ?>

<div class="con_heading"><?php echo $this->_tpl_vars['title']; ?>
</div>
<br/>
<a href='/battleways/' style='margin-left:10px;'>Всі записи</a>
<br/>
<form style="margin-top:15px" action="/battleways/add.html" method="post" name="msgform" >

	<table width="100%" border="0" cellpadding="6" cellspacing="0">
		<tr>
			<td width="160"><strong>Назва запису: </strong></td>
		  	<td><input name="title" class="text-input" type="text" id="title" style="width:400px" value=""/></td>
		</tr>
			<tr><td colspan="2"><strong>Повний опис вашого запису:</strong><br/>
				<div class="usr_msg_bbcodebox"><?php echo $this->_tpl_vars['bb_toolbar']; ?>
</div>
				<?php echo $this->_tpl_vars['smilies']; ?>

				<?php echo $this->_tpl_vars['autogrow']; ?>

				<div class="cm_editor"><textarea class="ajax_autogrowarea" name="full" id="message"><?php echo ((is_array($_tmp=$this->_tpl_vars['mod']['describe_full'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</textarea></div>
			</td>
		</tr>
	</table>
	<p>
		<input name="goadd" type="submit" id="goadd" value="Створити" />
		<input name="cancel" type="button" onclick="window.history.go(-1)" value="Відміна" />
	</p>
</form>