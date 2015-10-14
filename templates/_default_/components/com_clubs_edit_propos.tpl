<div class="con_heading">{$club.title} - Редагування "Пропозиції"</div>
 
 
<form name="configform" id="club_config_form" action="" method="post" enctype="multipart/form-data">
<input type="hidden" name="csrf_token" value="{csrf_token}" />
  
	<div id="about">
	 
		{wysiwyg name='propos' value=$club.propos height=350 width='100%'}
	</div>
  
<div style="margin: 15px 0 0;">
	<input type="submit" class="button" name="save" value="{$LANG.SAVE}"/>
	<input type="button" class="button" name="back" value="{$LANG.CANCEL}" onclick="window.history.go(-1)"/>
</div>

</form>
