
<div class="con_heading">{$title}</div>
<br/>
<a href='/battleways/' style='margin-left:10px;'>Всі записи</a>
<br/>
<form style="margin-top:15px" action="/battleways/add.html" method="post" name="msgform" >

	<table width="100%" border="0" cellpadding="6" cellspacing="0">
		<tr>
			<td width="160"><strong>Назва запису: </strong></td>
		  	<td><input name="title" class="text-input" type="text" id="title" style="width:400px" value=""/></td>
		</tr>
	{*	<tr>
			<td width="160"><strong>Мітка запису: </strong></td>
		  	<td><input name="type" id="type" class="text-input" type="text" style="width:100px" value=""/> {$mark_insert}</td>
		</tr> 
		<tr>
			<td width="160"><strong>Цвет: </strong></td>
		  	<td><select name='color' style="width:400px">{$select_color}</select></td>
		</tr> *}
		<tr><td colspan="2"><strong>Повний опис вашого запису:</strong><br/>
				<div class="usr_msg_bbcodebox">{$bb_toolbar}</div>
				{$smilies}
				{$autogrow}
				<div class="cm_editor"><textarea class="ajax_autogrowarea" name="full" id="message">{$mod.describe_full|escape:'html'}</textarea></div>
			</td>
		</tr>
	</table>
	<p>
		<input name="goadd" type="submit" id="goadd" value="Створити" />
		<input name="cancel" type="button" onclick="window.history.go(-1)" value="Відміна" />
	</p>
</form>