<div class="con_heading">
	<a href="/clubs/{$club.id}">{$club.title}</a> &rarr; {$LANG.CONFIG}
</div>

{add_js file='includes/jquery/tabs/jquery.ui.min.js'}
{add_css file='includes/jquery/tabs/tabs.css'}

<form name="configform" id="club_config_form" action="" method="post" enctype="multipart/form-data">
<input type="hidden" name="csrf_token" value="{csrf_token}" />
<div id="configtabs" style="margin-top:20px" class="uitabs">
	<ul id="tabs">
		<li><a href="#about"><span>{$LANG.CLUB_DESC}</span></a></li>
		<li><a href="#moders"><span>{$LANG.MODERATORS}</span></a></li>
		<li><a href="#members"><span>Налаштування членства</span></a></li>
		<li><a href="#premembers"><span>Заявки на участь</span></a></li>
		{if $club.enabled_photos || $club.enabled_blogs}
            <li><a href="#limits"><span>{$LANG.LIMITS}</span></a></li>
		{/if}
        
	</ul>

	<div id="about">
		<table width="100%" border="0" cellspacing="0" cellpadding="10" style="border-bottom:solid 1px silver;margin-bottom:20px">
			<tr>
				<td colspan="2">
				  <strong>{$LANG.CLUB_NAME}: </strong>
				  </td>
				<td>
					<input name="title"  type="text" style="width:270px;" value="{$club.title|escape:'html'}" />
				</td>
			</tr>
			<tr>
				<td width="48">
					<div style="padding:2px; border: solid 1px silver">
						<img src="/images/clubs/small/{$club.f_imageurl}" border="0" alt="{$club.title|escape:'html'}"/>
					</div>
				</td>
				<td width="120">
					<label>{$LANG.UPLOAD_LOGO}:</label>
				</td>
				<td>
					<input name="picture" type="file" id="picture" style="width:270px;" />
				</td>
			</tr>
		</table>
		{wysiwyg name='description' value=$club.description height=350 width='100%'}
	</div>

	<div id="moders">
		<table width="500" border="0" cellspacing="0" cellpadding="10" id="multiuserscfg">
			<tr>
				<td colspan="3">
					<div class="hint">{$LANG.MODERATE_TEXT}</div>
				</td>
			</tr>
			<tr>
				<td align="center" valign="top">
					<p><strong>{$LANG.CLUB_MODERATORS}: </strong></p>
					<select name="moderslist[]" size="10" multiple id="moderslist" style="width:200px">
						{$moders_list}
					</select>
				</td>
				<td align="center">
					<div><input name="moderator_add" type="button" id="moderator_add" value="&lt;&lt;"></div>
					<div><input name="moderator_remove" type="button" id="moderator_remove" value="&gt;&gt;" style="margin-top:4px"></div>
				</td>
				<td align="center" valign="top">
					<p><strong>{$LANG.MY_FRIENDS_AND_CLUB_USERS}:</strong></p>
					<select name="userslist1" size="10" multiple id="userslist1" style="width:200px">
						{$fr_members_list}
					</select>
				</td>
			</tr>
		</table>
	</div>

	<div id="members">
		<table width="550" border="0" cellspacing="0" cellpadding="10">
			<tr>
			  <td>{$LANG.MAX_MEMBERS}:<br/><span style="color:#5F98BF">{$LANG.MAX_MEMBERS_TEXT}</span> </td>
			  <td><input name="maxsize" type="text" style="width:200px"  value="{$club.maxsize}"/></td>
		  </tr>
			<tr>
				<td>
					<label>{$LANG.SELECT_CLUB_TYPE}:</label>
				</td>
				<td width="200">
					<select name="clubtype" id="clubtype" style="width:200px" onchange="$('#minkarma').toggle();">
                        <option value="public" {if $club.clubtype=='public'}selected="selected"{/if}>{$LANG.PUBLIC} (public)</option>
                        <option value="private" {if $club.clubtype=='private'}selected="selected"{/if}>{$LANG.PRIVATE} (private)</option>
                     </select>
				</td>
			</tr>
			<tr>
				<td>
					<label>Тип спільноти за змістом:</label>
				</td>
				<td width="200">
					<select name="typeofclub" id="typeofclub" style="width:200px" >
                        <option value="m" {if $club.typeofclub=='m'}selected="selected"{/if}>Для бійців</option>
                        <option value="v" {if $club.typeofclub=='v'}selected="selected"{/if}>Для волонтерів</option>
                     </select>
				</td>
			</tr>
		</table>
		<table width="550" border="0" cellspacing="0" id="minkarma" cellpadding="10" {if $club.clubtype!='public'}style="display:none;"{/if}>
			<tr>
			  <td>{$LANG.USE_LIMITS_KARMA}: <br/><span style="color:#5F98BF">{$LANG.USE_LIMITS_KARMA_TEXT}</span></td>
			  <td valign="top">
					<input name="join_karma_limit" type="radio" value="1" {if $club.join_karma_limit}checked{/if}/> {$LANG.YES}
					<input name="join_karma_limit" type="radio" value="0" {if !$club.join_karma_limit}checked{/if}/> {$LANG.NO}
			  </td>
		  </tr>
			<tr>
				<td>
					{$LANG.LIMITS_KARMA}: <br/><span style="color:#5F98BF">{$LANG.LIMITS_KARMA_TEXT}</span>
				</td>
				<td width="200" valign="top">
					&ge; <input name="join_min_karma" type="text" style="width:60px" value="{$club.join_min_karma}"/> {$LANG.POINTS}
				</td>
			</tr>
		</table>
		{*<table width="550" border="0" cellspacing="0" cellpadding="10" id="members">
			<tr>
				<td align="center" valign="top">
					<p><strong>{$LANG.CLUB_MEMBERS}: </strong></p>
					<select name="memberslist[]" size="10" multiple id="memberslist" style="width:200px">
						{$members_list}
					</select>
				</td>
				<td align="center">
					<div><input name="member_add" type="button" id="member_add" value="&lt;&lt;"></div>
					<div><input name="member_remove" type="button" id="member_remove" value="&gt;&gt;" style="margin-top:4px"></div>
				</td>
				<td align="center" valign="top">
					<p><strong>{$LANG.MY_FRIENDS_ARE}:</strong></p>
					<select name="userslist2" size="10" multiple id="userslist2" style="width:200px">
						{$friends_list}
					</select>
				</td>
			</tr>
		</table>*}
		
		
	</div>
	
	
	
	<div id="premembers">
		 
		 <table width="550" border="0" cellspacing="0" cellpadding="10" id="members">
			<tr>
				<td align="center" valign="top">
					<p><strong>{$LANG.CLUB_MEMBERS}: </strong></p>
					<select name="memberslist[]" size="10" multiple id="memberslist" style="width:200px">
						{$members_list}
					</select>
				</td>
				<td align="center">
					<div><input name="member_add" type="button" id="member_add" value="Додати до учасників"></div>
					<br>
					<div><input name="member_remove" type="button" id="member_remove" value="Видалити з учасників" style="margin-top:4px"></div>
				</td>
				<td align="center" valign="top">
					<p><strong>Заявителі:</strong></p>
					<select name="prememberslist[]" size="10" multiple id="userslist2" style="width:200px">
						{$premembers_list}
					</select>
					 
				</td>
			</tr>
		</table>

	</div>
	
	
	

	{if $club.enabled_photos || $club.enabled_blogs}
	<div id="limits">
		<table width="500" border="0" cellspacing="0" cellpadding="10">
			{if $club.enabled_blogs}
			<tr>
				<td>
					<label><strong>{$LANG.PREMODER_POSTS_IN_BLOGS}:</strong></label>
				</td>
				<td width="150">
					<input name="blog_premod" type="radio" value="1" {if $club.blog_premod}checked{/if}/> {$LANG.YES}
					<input name="blog_premod" type="radio" value="0" {if !$club.blog_premod}checked{/if}/> {$LANG.NO}
				</td>
			</tr>
			{/if}
			{if $club.enabled_photos}
			<tr>
				<td>
					<label><strong>{$LANG.PREMODER_PHOTOS}:</strong></label>
				</td>
				<td width="150">
					<input name="photo_premod" type="radio" value="1" {if $club.photo_premod}checked{/if}/> {$LANG.YES}
					<input name="photo_premod" type="radio" value="0" {if !$club.photo_premod}checked{/if}/> {$LANG.NO}
				</td>
			</tr>
			{/if}
			{if $club.enabled_blogs}
			<tr>
				<td>
					<label>{$LANG.KARMA_LIMITS_FOR_NEW_POSTS}:</label>
				</td>
				<td width="150">&ge; <input name="blog_min_karma" type="text" style="width:60px" value="{$club.blog_min_karma}"/> {$LANG.POINTS}
			  </td></tr>
			{/if}
			{if $club.enabled_photos}
			<tr>
				<td>
					<label>{$LANG.KARMA_LIMITS_FOR_ADD_PHOTOS}:</label>
				</td>
				<td width="150">
					&ge;
					<input name="photo_min_karma" type="text" style="width:60px" value="{$club.photo_min_karma}"/> {$LANG.POINTS}
				</td>
			</tr>
			{/if}
			{if $club.enabled_photos}
			<tr>
				<td>
					<label>{$LANG.KARMA_LIMITS_NEW_PHOTOALBUM}:</label>
				</td>
				<td width="150">
					&ge; <input name="album_min_karma" type="text" style="width:60px" value="{$club.album_min_karma}"/> {$LANG.POINTS}
			  </td>
			</tr>
			{/if}
		</table>
	</div>
	{/if}

	 

</div>

<div style="margin: 15px 0 0;">
	<input type="submit" class="button" name="save" value="{$LANG.SAVE}"/>
	<input type="button" class="button" name="back" value="{$LANG.CANCEL}" onclick="window.history.go(-1)"/>
</div>

</form>

{literal}
	<script type="text/javascript">
		$(".uitabs").tabs();
		$("#club_config_form").submit(function() {
		$('#moderslist').each(function(){
				$('#moderslist option').prop("selected", true);
			});
			$('#memberslist').each(function(){
				$('#memberslist option').prop("selected", true);
			});
		});
		$().ready(function() {
		  $('#moderator_remove').click(function() {

				var user = new Array;

				$('#moderslist option:selected').each(function () {
					user.push(this);
				});

				while (user.length){
					opt     = user.pop();
					opt2    = $(opt).clone();
					$(opt).remove().appendTo('#userslist1');
					$(opt2).remove();
				}

		  });
		  $('#moderator_add').click(function() {

				var user_id = new Array;

				$('#userslist1 option:selected').each(function () {
					user_id.push(this.value);
				});

				$('#userslist1 option:selected').remove().appendTo('#moderslist');

				while (user_id.length){
					id = user_id.pop();
					$('#userslist2 option[value='+id+']').remove();
				}

		  });

		  $('#member_remove').click(function() {
				var user = new Array;

				$('#memberslist option:selected').each(function () {
					user.push(this);
				});

				var user_id = new Array;

				$('#memberslist option:selected').each(function () {
					user_id.push(this.value);
				});

				while (user.length){
					opt     = user.pop();
					opt2    = $(opt).clone();
					$(opt).remove().appendTo('#userslist1');
					$(opt2).remove();
				}

				while (user_id.length){
					id = user_id.pop();
					$('#moderslist option[value='+id+']').remove();
				}

		  });

		  $('#member_add').click(function() {

				var user_id = new Array;

				$('#userslist2 option:selected').each(function () {
					user_id.push(this.value);
				});

				$('#userslist2 option:selected').remove().appendTo('#memberslist');

		  });

		  $("#addform").submit(function() {
				$('#moderslist').each(function(){
					$('#moderslist option').prop("selected", true);
				});
				$('#memberslist').each(function(){
					$('#memberslist option').prop("selected", true);
				});
		  });

		});
	</script>
{/literal}