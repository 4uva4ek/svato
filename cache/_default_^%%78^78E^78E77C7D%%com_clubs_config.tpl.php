<?php /* Smarty version 2.6.28, created on 2015-06-18 16:49:45
         compiled from com_clubs_config.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'add_js', 'com_clubs_config.tpl', 5, false),array('function', 'add_css', 'com_clubs_config.tpl', 6, false),array('function', 'csrf_token', 'com_clubs_config.tpl', 9, false),array('function', 'wysiwyg', 'com_clubs_config.tpl', 46, false),array('modifier', 'escape', 'com_clubs_config.tpl', 29, false),)), $this); ?>
<div class="con_heading">
	<a href="/clubs/<?php echo $this->_tpl_vars['club']['id']; ?>
"><?php echo $this->_tpl_vars['club']['title']; ?>
</a> &rarr; <?php echo $this->_tpl_vars['LANG']['CONFIG']; ?>

</div>

<?php echo cmsSmartyAddJS(array('file' => 'includes/jquery/tabs/jquery.ui.min.js'), $this);?>

<?php echo cmsSmartyAddCSS(array('file' => 'includes/jquery/tabs/tabs.css'), $this);?>


<form name="configform" id="club_config_form" action="" method="post" enctype="multipart/form-data">
<input type="hidden" name="csrf_token" value="<?php echo smarty_function_csrf_token(array(), $this);?>
" />
<div id="configtabs" style="margin-top:20px" class="uitabs">
	<ul id="tabs">
		<li><a href="#about"><span><?php echo $this->_tpl_vars['LANG']['CLUB_DESC']; ?>
</span></a></li>
		<li><a href="#moders"><span><?php echo $this->_tpl_vars['LANG']['MODERATORS']; ?>
</span></a></li>
		<li><a href="#members"><span>Налаштування членства</span></a></li>
		<li><a href="#premembers"><span>Заявки на участь</span></a></li>
		<?php if ($this->_tpl_vars['club']['enabled_photos'] || $this->_tpl_vars['club']['enabled_blogs']): ?>
            <li><a href="#limits"><span><?php echo $this->_tpl_vars['LANG']['LIMITS']; ?>
</span></a></li>
		<?php endif; ?>
        
	</ul>

	<div id="about">
		<table width="100%" border="0" cellspacing="0" cellpadding="10" style="border-bottom:solid 1px silver;margin-bottom:20px">
			<tr>
				<td colspan="2">
				  <strong><?php echo $this->_tpl_vars['LANG']['CLUB_NAME']; ?>
: </strong>
				  </td>
				<td>
					<input name="title"  type="text" style="width:270px;" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['club']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" />
				</td>
			</tr>
			<tr>
				<td width="48">
					<div style="padding:2px; border: solid 1px silver">
						<img src="/images/clubs/small/<?php echo $this->_tpl_vars['club']['f_imageurl']; ?>
" border="0" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['club']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
"/>
					</div>
				</td>
				<td width="120">
					<label><?php echo $this->_tpl_vars['LANG']['UPLOAD_LOGO']; ?>
:</label>
				</td>
				<td>
					<input name="picture" type="file" id="picture" style="width:270px;" />
				</td>
			</tr>
		</table>
		<?php echo cmsSmartyWysiwyg(array('name' => 'description','value' => $this->_tpl_vars['club']['description'],'height' => 350,'width' => '100%'), $this);?>

	</div>

	<div id="moders">
		<table width="500" border="0" cellspacing="0" cellpadding="10" id="multiuserscfg">
			<tr>
				<td colspan="3">
					<div class="hint"><?php echo $this->_tpl_vars['LANG']['MODERATE_TEXT']; ?>
</div>
				</td>
			</tr>
			<tr>
				<td align="center" valign="top">
					<p><strong><?php echo $this->_tpl_vars['LANG']['CLUB_MODERATORS']; ?>
: </strong></p>
					<select name="moderslist[]" size="10" multiple id="moderslist" style="width:200px">
						<?php echo $this->_tpl_vars['moders_list']; ?>

					</select>
				</td>
				<td align="center">
					<div><input name="moderator_add" type="button" id="moderator_add" value="&lt;&lt;"></div>
					<div><input name="moderator_remove" type="button" id="moderator_remove" value="&gt;&gt;" style="margin-top:4px"></div>
				</td>
				<td align="center" valign="top">
					<p><strong><?php echo $this->_tpl_vars['LANG']['MY_FRIENDS_AND_CLUB_USERS']; ?>
:</strong></p>
					<select name="userslist1" size="10" multiple id="userslist1" style="width:200px">
						<?php echo $this->_tpl_vars['fr_members_list']; ?>

					</select>
				</td>
			</tr>
		</table>
	</div>

	<div id="members">
		<table width="550" border="0" cellspacing="0" cellpadding="10">
			<tr>
			  <td><?php echo $this->_tpl_vars['LANG']['MAX_MEMBERS']; ?>
:<br/><span style="color:#5F98BF"><?php echo $this->_tpl_vars['LANG']['MAX_MEMBERS_TEXT']; ?>
</span> </td>
			  <td><input name="maxsize" type="text" style="width:200px"  value="<?php echo $this->_tpl_vars['club']['maxsize']; ?>
"/></td>
		  </tr>
			<tr>
				<td>
					<label><?php echo $this->_tpl_vars['LANG']['SELECT_CLUB_TYPE']; ?>
:</label>
				</td>
				<td width="200">
					<select name="clubtype" id="clubtype" style="width:200px" onchange="$('#minkarma').toggle();">
                        <option value="public" <?php if ($this->_tpl_vars['club']['clubtype'] == 'public'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['PUBLIC']; ?>
 (public)</option>
                        <option value="private" <?php if ($this->_tpl_vars['club']['clubtype'] == 'private'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['PRIVATE']; ?>
 (private)</option>
                     </select>
				</td>
			</tr>
			<tr>
				<td>
					<label>Тип спільноти за змістом:</label>
				</td>
				<td width="200">
					<select name="typeofclub" id="typeofclub" style="width:200px" >
                        <option value="m" <?php if ($this->_tpl_vars['club']['typeofclub'] == 'm'): ?>selected="selected"<?php endif; ?>>Для бійців</option>
                        <option value="v" <?php if ($this->_tpl_vars['club']['typeofclub'] == 'v'): ?>selected="selected"<?php endif; ?>>Для волонтерів</option>
                     </select>
				</td>
			</tr>
		</table>
		<table width="550" border="0" cellspacing="0" id="minkarma" cellpadding="10" <?php if ($this->_tpl_vars['club']['clubtype'] != 'public'): ?>style="display:none;"<?php endif; ?>>
			<tr>
			  <td><?php echo $this->_tpl_vars['LANG']['USE_LIMITS_KARMA']; ?>
: <br/><span style="color:#5F98BF"><?php echo $this->_tpl_vars['LANG']['USE_LIMITS_KARMA_TEXT']; ?>
</span></td>
			  <td valign="top">
					<input name="join_karma_limit" type="radio" value="1" <?php if ($this->_tpl_vars['club']['join_karma_limit']): ?>checked<?php endif; ?>/> <?php echo $this->_tpl_vars['LANG']['YES']; ?>

					<input name="join_karma_limit" type="radio" value="0" <?php if (! $this->_tpl_vars['club']['join_karma_limit']): ?>checked<?php endif; ?>/> <?php echo $this->_tpl_vars['LANG']['NO']; ?>

			  </td>
		  </tr>
			<tr>
				<td>
					<?php echo $this->_tpl_vars['LANG']['LIMITS_KARMA']; ?>
: <br/><span style="color:#5F98BF"><?php echo $this->_tpl_vars['LANG']['LIMITS_KARMA_TEXT']; ?>
</span>
				</td>
				<td width="200" valign="top">
					&ge; <input name="join_min_karma" type="text" style="width:60px" value="<?php echo $this->_tpl_vars['club']['join_min_karma']; ?>
"/> <?php echo $this->_tpl_vars['LANG']['POINTS']; ?>

				</td>
			</tr>
		</table>
				
		
	</div>
	
	
	
	<div id="premembers">
		 
		 <table width="550" border="0" cellspacing="0" cellpadding="10" id="members">
			<tr>
				<td align="center" valign="top">
					<p><strong><?php echo $this->_tpl_vars['LANG']['CLUB_MEMBERS']; ?>
: </strong></p>
					<select name="memberslist[]" size="10" multiple id="memberslist" style="width:200px">
						<?php echo $this->_tpl_vars['members_list']; ?>

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
						<?php echo $this->_tpl_vars['premembers_list']; ?>

					</select>
					 
				</td>
			</tr>
		</table>

	</div>
	
	
	

	<?php if ($this->_tpl_vars['club']['enabled_photos'] || $this->_tpl_vars['club']['enabled_blogs']): ?>
	<div id="limits">
		<table width="500" border="0" cellspacing="0" cellpadding="10">
			<?php if ($this->_tpl_vars['club']['enabled_blogs']): ?>
			<tr>
				<td>
					<label><strong><?php echo $this->_tpl_vars['LANG']['PREMODER_POSTS_IN_BLOGS']; ?>
:</strong></label>
				</td>
				<td width="150">
					<input name="blog_premod" type="radio" value="1" <?php if ($this->_tpl_vars['club']['blog_premod']): ?>checked<?php endif; ?>/> <?php echo $this->_tpl_vars['LANG']['YES']; ?>

					<input name="blog_premod" type="radio" value="0" <?php if (! $this->_tpl_vars['club']['blog_premod']): ?>checked<?php endif; ?>/> <?php echo $this->_tpl_vars['LANG']['NO']; ?>

				</td>
			</tr>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['club']['enabled_photos']): ?>
			<tr>
				<td>
					<label><strong><?php echo $this->_tpl_vars['LANG']['PREMODER_PHOTOS']; ?>
:</strong></label>
				</td>
				<td width="150">
					<input name="photo_premod" type="radio" value="1" <?php if ($this->_tpl_vars['club']['photo_premod']): ?>checked<?php endif; ?>/> <?php echo $this->_tpl_vars['LANG']['YES']; ?>

					<input name="photo_premod" type="radio" value="0" <?php if (! $this->_tpl_vars['club']['photo_premod']): ?>checked<?php endif; ?>/> <?php echo $this->_tpl_vars['LANG']['NO']; ?>

				</td>
			</tr>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['club']['enabled_blogs']): ?>
			<tr>
				<td>
					<label><?php echo $this->_tpl_vars['LANG']['KARMA_LIMITS_FOR_NEW_POSTS']; ?>
:</label>
				</td>
				<td width="150">&ge; <input name="blog_min_karma" type="text" style="width:60px" value="<?php echo $this->_tpl_vars['club']['blog_min_karma']; ?>
"/> <?php echo $this->_tpl_vars['LANG']['POINTS']; ?>

			  </td></tr>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['club']['enabled_photos']): ?>
			<tr>
				<td>
					<label><?php echo $this->_tpl_vars['LANG']['KARMA_LIMITS_FOR_ADD_PHOTOS']; ?>
:</label>
				</td>
				<td width="150">
					&ge;
					<input name="photo_min_karma" type="text" style="width:60px" value="<?php echo $this->_tpl_vars['club']['photo_min_karma']; ?>
"/> <?php echo $this->_tpl_vars['LANG']['POINTS']; ?>

				</td>
			</tr>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['club']['enabled_photos']): ?>
			<tr>
				<td>
					<label><?php echo $this->_tpl_vars['LANG']['KARMA_LIMITS_NEW_PHOTOALBUM']; ?>
:</label>
				</td>
				<td width="150">
					&ge; <input name="album_min_karma" type="text" style="width:60px" value="<?php echo $this->_tpl_vars['club']['album_min_karma']; ?>
"/> <?php echo $this->_tpl_vars['LANG']['POINTS']; ?>

			  </td>
			</tr>
			<?php endif; ?>
		</table>
	</div>
	<?php endif; ?>

	 

</div>

<div style="margin: 15px 0 0;">
	<input type="submit" class="button" name="save" value="<?php echo $this->_tpl_vars['LANG']['SAVE']; ?>
"/>
	<input type="button" class="button" name="back" value="<?php echo $this->_tpl_vars['LANG']['CANCEL']; ?>
" onclick="window.history.go(-1)"/>
</div>

</form>

<?php echo '
	<script type="text/javascript">
		$(".uitabs").tabs();
		$("#club_config_form").submit(function() {
		$(\'#moderslist\').each(function(){
				$(\'#moderslist option\').prop("selected", true);
			});
			$(\'#memberslist\').each(function(){
				$(\'#memberslist option\').prop("selected", true);
			});
		});
		$().ready(function() {
		  $(\'#moderator_remove\').click(function() {

				var user = new Array;

				$(\'#moderslist option:selected\').each(function () {
					user.push(this);
				});

				while (user.length){
					opt     = user.pop();
					opt2    = $(opt).clone();
					$(opt).remove().appendTo(\'#userslist1\');
					$(opt2).remove();
				}

		  });
		  $(\'#moderator_add\').click(function() {

				var user_id = new Array;

				$(\'#userslist1 option:selected\').each(function () {
					user_id.push(this.value);
				});

				$(\'#userslist1 option:selected\').remove().appendTo(\'#moderslist\');

				while (user_id.length){
					id = user_id.pop();
					$(\'#userslist2 option[value=\'+id+\']\').remove();
				}

		  });

		  $(\'#member_remove\').click(function() {
				var user = new Array;

				$(\'#memberslist option:selected\').each(function () {
					user.push(this);
				});

				var user_id = new Array;

				$(\'#memberslist option:selected\').each(function () {
					user_id.push(this.value);
				});

				while (user.length){
					opt     = user.pop();
					opt2    = $(opt).clone();
					$(opt).remove().appendTo(\'#userslist1\');
					$(opt2).remove();
				}

				while (user_id.length){
					id = user_id.pop();
					$(\'#moderslist option[value=\'+id+\']\').remove();
				}

		  });

		  $(\'#member_add\').click(function() {

				var user_id = new Array;

				$(\'#userslist2 option:selected\').each(function () {
					user_id.push(this.value);
				});

				$(\'#userslist2 option:selected\').remove().appendTo(\'#memberslist\');

		  });

		  $("#addform").submit(function() {
				$(\'#moderslist\').each(function(){
					$(\'#moderslist option\').prop("selected", true);
				});
				$(\'#memberslist\').each(function(){
					$(\'#memberslist option\').prop("selected", true);
				});
		  });

		});
	</script>
'; ?>