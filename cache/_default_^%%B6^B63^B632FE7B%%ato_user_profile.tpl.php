<?php /* Smarty version 2.6.28, created on 2015-08-16 13:59:40
         compiled from ato_user_profile.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'ato_user_profile.tpl', 10, false),array('modifier', 'spellcount', 'ato_user_profile.tpl', 150, false),array('modifier', 'NoSpam', 'ato_user_profile.tpl', 256, false),array('function', 'template', 'ato_user_profile.tpl', 54, false),array('function', 'profile_url', 'ato_user_profile.tpl', 181, false),array('function', 'math', 'ato_user_profile.tpl', 187, false),array('function', 'add_js', 'ato_user_profile.tpl', 253, false),)), $this); ?>


    <div class="con_heading" id="nickname"  >
        <?php echo $this->_tpl_vars['usr']['nickname']; ?>
 <?php if ($this->_tpl_vars['usr']['banned']): ?><span style="color:red; font-size:12px;"><?php echo $this->_tpl_vars['LANG']['USER_IN_BANLIST']; ?>
</span><?php endif; ?>
    </div>
	<div class="usr_status_bar">
	
	<?php if ($this->_tpl_vars['usr']['status_text']): ?>
    <div class="usr_status_text" >
        <span><?php echo ((is_array($_tmp=$this->_tpl_vars['usr']['status_text'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</span>
        <span class="usr_status_date" >(<?php echo $this->_tpl_vars['usr']['status_date']; ?>
 <?php echo $this->_tpl_vars['LANG']['BACK']; ?>
)</span>
    </div>
	<?php endif; ?>
	
    <?php if ($this->_tpl_vars['myprofile'] || $this->_tpl_vars['is_admin']): ?>
        <div class="usr_status_link"><a href="javascript:" onclick="setStatus(<?php echo $this->_tpl_vars['usr']['id']; ?>
)"><?php echo $this->_tpl_vars['LANG']['CHANGE_STATUS']; ?>
</a></div>
    <?php endif; ?>
</div>
		


<table width="100%" border="0" cellspacing="0" cellpadding="0"  >
	<tr>
		<td  class="club-left-c" valign="top">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td align="center" valign="middle">
                        <div class="usr_avatar">
                            <img alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['usr']['nickname'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" class="usr_img" src="<?php echo $this->_tpl_vars['usr']['avatar']; ?>
" />
                        </div>

						<?php if ($this->_tpl_vars['is_auth']): ?>
							<div id="usermenu"  >
                            <div class="usr_profile_menu">
							<table cellpadding="0" cellspacing="6" ><tr>

							<?php if (! $this->_tpl_vars['myprofile']): ?>
                                <tr>
                                    <td> </td>
                                    <td><a class="ajaxlink" href="javascript:void(0)" title="<?php echo $this->_tpl_vars['LANG']['WRITE_MESS']; ?>
: <?php echo ((is_array($_tmp=$this->_tpl_vars['usr']['nickname'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" onclick="users.sendMess('<?php echo $this->_tpl_vars['usr']['id']; ?>
', 0, this);return false;"><?php echo $this->_tpl_vars['LANG']['WRITE_MESS']; ?>
</a></td>
                                </tr>
							<?php endif; ?>

                            <?php if (! $this->_tpl_vars['myprofile']): ?>
                            	<?php if (! $this->_tpl_vars['usr']['isfriend']): ?>
                                    <tr>
                                        <td> </td>
                                        <td><a class="ajaxlink" href="javascript:void(0)" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['usr']['nickname'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" onclick="users.addFriend('<?php echo $this->_tpl_vars['usr']['id']; ?>
', this);return false;"><?php echo $this->_tpl_vars['LANG']['ADD_TO_FRIEND']; ?>
</a></td>
                                    </tr>
                                <?php else: ?>
                                <tr>
                                    <td class="add_friend_ajax" style="display: none;"> </td>
                                    <td class="add_friend_ajax" style="display: none;"><a class="ajaxlink" href="javascript:void(0)" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['usr']['nickname'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" onclick="users.addFriend('<?php echo $this->_tpl_vars['usr']['id']; ?>
', this);return false;"><?php echo $this->_tpl_vars['LANG']['ADD_TO_FRIEND']; ?>
</a></td>
                                    <td class="del_friend_ajax"><img src="/templates/<?php echo cmsSmartyCurrentTemplate(array(), $this);?>
/images/icons/profile/nofriends.png" border="0"/></td>
                                    <td class="del_friend_ajax"><a id="del_friend" class="ajaxlink" href="javascript:void(0)" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['usr']['nickname'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" onclick="users.delFriend('<?php echo $this->_tpl_vars['usr']['id']; ?>
', this);return false;"><?php echo $this->_tpl_vars['LANG']['STOP_FRIENDLY']; ?>
</a></td>
                                </tr>
                                <?php endif; ?>
                            <?php endif; ?>
                         	<?php if ($this->_tpl_vars['myprofile']): ?>
                            	<?php if ($this->_tpl_vars['cfg']['sw_msg']): ?>
                                <tr>
                                    <td> </td>
                                    <td><a href="/users/<?php echo $this->_tpl_vars['usr']['id']; ?>
/messages.html" title="<?php echo $this->_tpl_vars['LANG']['MY_MESS']; ?>
"><?php echo $this->_tpl_vars['LANG']['MY_MESS']; ?>
</a></td>
                                </tr>
                                <?php endif; ?>
                                <?php if ($this->_tpl_vars['cfg']['sw_photo']): ?>
                                <tr>
                                    <td> </td>
                                    <td><a href="/users/addphoto.html" title="<?php echo $this->_tpl_vars['LANG']['ADD_PHOTO']; ?>
"><?php echo $this->_tpl_vars['LANG']['ADD_PHOTO']; ?>
</a></td>
                                </tr>
                                <?php endif; ?>
                                <tr>
                                    <td> </td>
                                    <td><a href="/users/<?php echo $this->_tpl_vars['usr']['id']; ?>
/avatar.html" title="<?php echo $this->_tpl_vars['LANG']['SET_AVATAR']; ?>
"><?php echo $this->_tpl_vars['LANG']['SET_AVATAR']; ?>
</a></td>
                                </tr>
								<?php if ($this->_tpl_vars['usr']['invites_count']): ?>
                                <tr>
                                    <td> </td>
                                    <td><a href="/users/invites.html" title="<?php echo $this->_tpl_vars['LANG']['MY_INVITES']; ?>
"><?php echo $this->_tpl_vars['LANG']['MY_INVITES']; ?>
</a> <?php echo $this->_tpl_vars['usr']['invites_count']; ?>
</td>
                                </tr>
								<?php endif; ?>
                                <tr>
                                    <td> </td>
                                    <td><a href="/users/<?php echo $this->_tpl_vars['usr']['id']; ?>
/editprofile.html" title="<?php echo $this->_tpl_vars['LANG']['CONFIG_PROFILE']; ?>
"><?php echo $this->_tpl_vars['LANG']['MY_CONFIG']; ?>
</a></td>
                                </tr>
                            <?php endif; ?>
                            <?php if ($this->_tpl_vars['is_admin'] && ! $this->_tpl_vars['myprofile']): ?>
                            <tr>
                                <td> </td>
                                <td><a href="/users/<?php echo $this->_tpl_vars['usr']['id']; ?>
/editprofile.html" title="<?php echo $this->_tpl_vars['LANG']['CONFIG_PROFILE']; ?>
"><?php echo $this->_tpl_vars['LANG']['CONFIG_PROFILE']; ?>
</a></td>
                            </tr>
                            <?php endif; ?>
                           
							<?php if (! $this->_tpl_vars['myprofile']): ?>
                            	<?php if ($this->_tpl_vars['is_admin']): ?>
                                	<?php if (! $this->_tpl_vars['usr']['banned']): ?>
                                    
                                    <?php if ($this->_tpl_vars['usr']['id'] != 1): ?>
                                    <tr>
                                        <td> </td>
                                        <td><a href="/admin/index.php?view=userbanlist&do=add&to=<?php echo $this->_tpl_vars['usr']['id']; ?>
" title="<?php echo $this->_tpl_vars['LANG']['TO_BANN']; ?>
"><?php echo $this->_tpl_vars['LANG']['TO_BANN']; ?>
</a></td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                <?php if ($this->_tpl_vars['usr']['id'] != 1): ?>
                                    <tr>
                                        <td> </td>
                                        <td><a href="/users/<?php echo $this->_tpl_vars['usr']['id']; ?>
/delprofile.html" title="<?php echo $this->_tpl_vars['LANG']['DEL_PROFILE']; ?>
"><?php echo $this->_tpl_vars['LANG']['DEL_PROFILE']; ?>
</a></td>
                                    </tr>
                                <?php endif; ?>
                                <?php endif; ?>
                         	<?php endif; ?>

                            </table></div>
                            </div>
						<?php endif; ?>
					</td>
				</tr>
			</table>
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td>

                       <?php if ($this->_tpl_vars['usr']['albums']): ?>
                            <div class="usr_albums_block usr_profile_block">
                                <?php if ($this->_tpl_vars['usr']['albums_total'] > $this->_tpl_vars['usr']['albums_show']): ?>
                                    <div class="float_bar">
                                        <a href="/users/<?php echo $this->_tpl_vars['usr']['id']; ?>
/photoalbum.html"><?php echo $this->_tpl_vars['LANG']['ALL_ALBUMS']; ?>
</a> (<?php echo $this->_tpl_vars['usr']['albums_total']; ?>
)
                                    </div>
                                <?php endif; ?>
                                <div class="usr_wall_header">
                                    <?php if (! $this->_tpl_vars['myprofile']): ?>
                                        <?php echo $this->_tpl_vars['LANG']['USER_PHOTOS']; ?>

                                    <?php else: ?>
                                        <?php echo $this->_tpl_vars['LANG']['MY_PHOTOS']; ?>

                                    <?php endif; ?>
                                </div>
                                <ul class="usr_albums_list">
                                    <?php $_from = $this->_tpl_vars['usr']['albums']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['album']):
?>
                                        <li>
                                            <div class="usr_album_thumb">
                                                <a href="/users/<?php echo $this->_tpl_vars['usr']['login']; ?>
/photos/<?php echo $this->_tpl_vars['album']['type']; ?>
<?php echo $this->_tpl_vars['album']['id']; ?>
.html" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['album']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
">
                                                    <img src="<?php echo $this->_tpl_vars['album']['imageurl']; ?>
" width="64" height="64" border="0" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['album']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" />
                                                </a>
                                            </div>
                                            <div class="usr_album">
                                                <div class="link">
                                                    <a href="/users/<?php echo $this->_tpl_vars['usr']['login']; ?>
/photos/<?php echo $this->_tpl_vars['album']['type']; ?>
<?php echo $this->_tpl_vars['album']['id']; ?>
.html"><?php echo $this->_tpl_vars['album']['title']; ?>
</a>
                                                </div>
                                                <div class="count"><?php echo ((is_array($_tmp=$this->_tpl_vars['album']['photos_count'])) ? $this->_run_mod_handler('spellcount', true, $_tmp, $this->_tpl_vars['LANG']['PHOTO'], $this->_tpl_vars['LANG']['PHOTO2'], $this->_tpl_vars['LANG']['PHOTO10']) : smarty_modifier_spellcount($_tmp, $this->_tpl_vars['LANG']['PHOTO'], $this->_tpl_vars['LANG']['PHOTO2'], $this->_tpl_vars['LANG']['PHOTO10'])); ?>
</div>
                                                <div class="date"><?php echo $this->_tpl_vars['album']['pubdate']; ?>
</div>
                                            </div>
                                        </li>
                                    <?php endforeach; endif; unset($_from); ?>
                                 </ul>
                            </div>
                        <?php endif; ?>

                        <?php if ($this->_tpl_vars['usr']['friends']): ?>
                            <div class="usr_friends_block usr_profile_block">
                                
                                <div class="usr_wall_header">
                                    <?php if (! $this->_tpl_vars['myprofile']): ?>
                                        <?php echo $this->_tpl_vars['LANG']['USER_FRIENDS']; ?>

                                    <?php else: ?>
                                        <?php echo $this->_tpl_vars['LANG']['MY_FRIENDS']; ?>

                                    <?php endif; ?>
									 <?php if ($this->_tpl_vars['usr']['friends_total'] > 5): ?>
                                     
                                     <a href="/users/<?php echo $this->_tpl_vars['usr']['id']; ?>
/friendlist.html"><?php echo $this->_tpl_vars['LANG']['ALL_FRIENDS']; ?>
</a> (<?php echo $this->_tpl_vars['usr']['friends_total']; ?>
)
                                    
                                <?php endif; ?>
                                </div>
                                <?php $this->assign('col', '1'); ?>
                                <table width="" cellpadding="5" cellspacing="0" border="0" class="usr_friends_list" align="left">
                                  <?php $_from = $this->_tpl_vars['usr']['friends']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tid'] => $this->_tpl_vars['friend']):
?>
                                  <?php if ($this->_tpl_vars['col'] == 1): ?><tr><?php endif; ?>
                                             
                                <div class="usr_friend_cell">
                                    
                                    <div align="center"><a href="<?php echo cmsSmartyProfileURL(array('login' => $this->_tpl_vars['friend']['login']), $this);?>
"><img border="0" class="usr_img_small" src="<?php echo $this->_tpl_vars['friend']['avatar']; ?>
" /></a></div>
                                    <div align="center"><?php echo $this->_tpl_vars['friend']['flogdate']; ?>
</div>
									<div align="center"><a class="friend_link" href="<?php echo cmsSmartyProfileURL(array('login' => $this->_tpl_vars['friend']['login']), $this);?>
"><?php echo $this->_tpl_vars['friend']['nickname']; ?>
</a></div>
                                </div>
                                            

                                      <?php if ($this->_tpl_vars['col'] == 6): ?> </tr> <?php $this->assign('col', '1'); ?> <?php else: ?> <?php echo smarty_function_math(array('equation' => "x + 1",'x' => $this->_tpl_vars['col'],'assign' => 'col'), $this);?>
 <?php endif; ?>
                                  <?php endforeach; endif; unset($_from); ?>
							
								  
                                  <?php if ($this->_tpl_vars['col'] > 1): ?><td colspan="<?php echo smarty_function_math(array('equation' => "x - 6 + 1",'x' => $this->_tpl_vars['col']), $this);?>
">&nbsp;</td></tr><?php endif; ?>
                                </table>
                            </div>
                        <?php endif; ?>

					</td>
				</tr>
			</table>
	    </td>
    	<td valign="top" class="pdl-10">
		 
		 
					
		 <div id="usertitle">
		 Особисті данні
		 </div>
		 
		 
		 
					<div class="user_profile_data">

						<div class="field">
							<div class="title"><?php echo $this->_tpl_vars['LANG']['LAST_VISIT']; ?>
:</div>
							<div class="value"><?php echo $this->_tpl_vars['usr']['flogdate']; ?>
</div>
						</div>
						<div class="field">
							<div class="title"><?php echo $this->_tpl_vars['LANG']['DATE_REGISTRATION']; ?>
:</div>
							<div class="value">
                                <?php echo $this->_tpl_vars['usr']['fregdate']; ?>

                            </div>
						</div>
						
						<?php if ($this->_tpl_vars['usr']['showbirth'] && $this->_tpl_vars['usr']['fbirthdate']): ?>
						<div class="field">
							<div class="title"><?php echo $this->_tpl_vars['LANG']['BIRTH']; ?>
:</div>
							<div class="value"><?php echo $this->_tpl_vars['usr']['fbirthdate']; ?>
</div>
						</div>
						<?php endif; ?>

						<?php if ($this->_tpl_vars['usr']['fgender']): ?>
						<div class="field">
							<div class="title"><?php echo $this->_tpl_vars['LANG']['SEX']; ?>
:</div>
							<div class="value"><?php echo $this->_tpl_vars['usr']['fgender']; ?>
</div>
						</div>
						<?php endif; ?>
                       
                        <?php if ($this->_tpl_vars['usr']['city']): ?>
						<div class="field">
							<div class="title"><?php echo $this->_tpl_vars['LANG']['CITY']; ?>
:</div>
                            <div class="value"><a href="/users/city/<?php echo ((is_array($_tmp=$this->_tpl_vars['usr']['cityurl'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
"><?php echo $this->_tpl_vars['usr']['city']; ?>
</a></div>
						</div>
                        <?php endif; ?>
						 
						 <?php if ($this->_tpl_vars['usr']['residence'] && ( $this->_tpl_vars['usr']['isfriend'] || $this->_tpl_vars['is_admin'] )): ?>
						<div class="field"><div class="title"><?php echo $this->_tpl_vars['LANG']['RESIDENCE']; ?>
:</div><div class="value"><?php echo $this->_tpl_vars['usr']['residence']; ?>
</div></div>
							<?php endif; ?>
							
							<?php if ($this->_tpl_vars['usr']['phones'] && ( $this->_tpl_vars['usr']['isfriend'] || $this->_tpl_vars['is_admin'] )): ?>
							<div class="field"><div class="title"><?php echo $this->_tpl_vars['LANG']['PHONES']; ?>
:</div><div class="value"><?php echo $this->_tpl_vars['usr']['phones']; ?>
</div></div>
							<?php endif; ?>
							
							<?php if (( $this->_tpl_vars['usr']['isfriend'] || $this->_tpl_vars['is_admin'] )): ?>					
							<?php echo cmsSmartyAddJS(array('file' => 'includes/jquery/jquery.nospam.js'), $this);?>

							<div class="field">
								<div class="title">E-mail:</div>
								<div class="value"><a href="#" rel="<?php echo ((is_array($_tmp=$this->_tpl_vars['usr']['email'])) ? $this->_run_mod_handler('NoSpam', true, $_tmp) : smarty_modifier_NoSpam($_tmp)); ?>
" class="email"><?php echo $this->_tpl_vars['usr']['email']; ?>
</a></div>
							</div>
							<?php echo '
								<script>
										$(\'.email\').nospam({ replaceText: true });
								</script>
							'; ?>

						    <?php endif; ?>
						<?php if ($this->_tpl_vars['usr']['kinscontacts'] && ( $this->_tpl_vars['usr']['isfriend'] || $this->_tpl_vars['is_admin'] )): ?>
						<div class="field"><div class="title"><?php echo $this->_tpl_vars['LANG']['KINSCONTACTS']; ?>
:</div><div class="value"><?php echo $this->_tpl_vars['usr']['kinscontacts']; ?>
</div></div>
						<?php endif; ?>
						
						
						<?php if ($this->_tpl_vars['usr']['armedgroup']): ?><div class="field"><div class="title"><?php echo $this->_tpl_vars['LANG']['ARMEDGROUP']; ?>
:</div><div class="value"><?php echo $this->_tpl_vars['usr']['armedgroup']; ?>
</div></div><?php else: ?>
						<?php if ($this->_tpl_vars['usr']['otharmedgroup']): ?><div class="field"><div class="title"><?php echo $this->_tpl_vars['LANG']['OTHARMEDGROUP']; ?>
:</div><div class="value"><?php echo $this->_tpl_vars['usr']['otharmedgroup']; ?>
</div></div><?php endif; ?><?php endif; ?>
						<?php if ($this->_tpl_vars['usr']['atospecialty'] && ( $this->_tpl_vars['usr']['isfriend'] || $this->_tpl_vars['is_admin'] )): ?><div class="field"><div class="title"><?php echo $this->_tpl_vars['LANG']['ATOSPECIALTY']; ?>
:</div><div class="value"><?php echo $this->_tpl_vars['usr']['atospecialty']; ?>
</div></div><?php endif; ?>
						<?php if ($this->_tpl_vars['usr']['preatospecialty'] && ( $this->_tpl_vars['usr']['isfriend'] || $this->_tpl_vars['is_admin'] )): ?><div class="field"><div class="title"><?php echo $this->_tpl_vars['LANG']['PREATOSPECIALTY']; ?>
:</div><div class="value"><?php echo $this->_tpl_vars['usr']['preatospecialty']; ?>
</div></div><?php endif; ?>
						
						
						
						<?php if ($this->_tpl_vars['cfg']['privforms'] && $this->_tpl_vars['usr']['form_fields']): ?>
							<?php $_from = $this->_tpl_vars['usr']['form_fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tid'] => $this->_tpl_vars['field']):
?>
                                <div class="field">
                                    <div class="title"><?php echo $this->_tpl_vars['field']['title']; ?>
:</div>
                                    <div class="value"><?php if ($this->_tpl_vars['field']['field']): ?><?php echo $this->_tpl_vars['field']['field']; ?>
<?php else: ?><em><?php echo $this->_tpl_vars['LANG']['NOT_SET']; ?>
</em><?php endif; ?></div>
                                </div>
                            <?php endforeach; endif; unset($_from); ?>
						<?php endif; ?>

					</div>
					
					  
		    <?php if (( $this->_tpl_vars['usr']['isfriend'] || $this->_tpl_vars['is_admin'] )): ?>	
			<div id="profiletabs" class="uitabs">
				<ul id="tabs">
					<li><a href="#upr_profile"><span>Стіна</span></a></li>
					<?php if ($this->_tpl_vars['myprofile'] && $this->_tpl_vars['cfg']['sw_feed']): ?>
						<li><a href="/actions/my_friends" title="upr_feed"><span><?php echo $this->_tpl_vars['LANG']['FEED']; ?>
</span></a></li>
					<?php endif; ?>
					                    
			
					<?php $_from = $this->_tpl_vars['plugins']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['plugin']):
?>
					
               <li><a href="<?php if ($this->_tpl_vars['plugin']['ajax_link']): ?><?php echo $this->_tpl_vars['plugin']['ajax_link']; ?>
<?php else: ?>#upr_<?php echo $this->_tpl_vars['plugin']['name']; ?>
<?php endif; ?>" title="<?php echo $this->_tpl_vars['plugin']['name']; ?>
"><span><?php echo $this->_tpl_vars['plugin']['title']; ?>
</span></a></li>
                  
					<?php endforeach; endif; unset($_from); ?>
				</ul>

				<div id="upr_profile">
					 
					<div>
                        <div class="usr_profile_block">
                            <div class="usr_wall_header">
                                <?php if (! $this->_tpl_vars['myprofile']): ?>
                                    <?php echo $this->_tpl_vars['LANG']['USER_CONTENT']; ?>

                                <?php else: ?>
                                    <?php echo $this->_tpl_vars['LANG']['MY_CONTENT']; ?>

                                <?php endif; ?>
                            </div>
                            <div id="usr_links">
                                
                                <?php if ($this->_tpl_vars['cfg']['sw_files']): ?>
                                    <div id="usr_files">
                                        <a href="/users/<?php echo $this->_tpl_vars['usr']['id']; ?>
/files.html"><?php echo $this->_tpl_vars['LANG']['FILES']; ?>
</a> <sup><?php echo $this->_tpl_vars['usr']['files_count']; ?>
</sup>
                                    </div>
                                <?php endif; ?>
                                <?php if ($this->_tpl_vars['cfg']['sw_board'] && $this->_tpl_vars['usr']['board_count']): ?>
                                                                   <?php endif; ?>
                                <?php if ($this->_tpl_vars['cfg']['sw_forum'] && $this->_tpl_vars['cfg_forum']['component_enabled'] && $this->_tpl_vars['usr']['forum_count']): ?>
                                    <div id="usr_forum">
                                        <a href="/forum/<?php echo $this->_tpl_vars['usr']['login']; ?>
_activity.html" title="<?php echo $this->_tpl_vars['LANG']['MY_ACTIVITY_ON_FORUM']; ?>
"><?php echo $this->_tpl_vars['LANG']['FORUM']; ?>
</a> <sup title="<?php echo $this->_tpl_vars['LANG']['MESS_IN_FORUM']; ?>
"><?php echo $this->_tpl_vars['usr']['forum_count']; ?>
</sup>
                                    </div>
                                <?php endif; ?>
                                <?php if ($this->_tpl_vars['cfg']['sw_comm'] && $this->_tpl_vars['usr']['comments_count']): ?>
                                    <div id="usr_comments">
                                        <a href="/comments/by_user_<?php echo $this->_tpl_vars['usr']['login']; ?>
" title="<?php echo $this->_tpl_vars['LANG']['READ']; ?>
"><?php echo $this->_tpl_vars['LANG']['COMMENTS']; ?>
</a> <sup><?php echo $this->_tpl_vars['usr']['comments_count']; ?>
</sup>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                       

						<?php if ($this->_tpl_vars['cfg']['sw_wall']): ?>
							<div class="usr_wall usr_profile_block">
								<div class="usr_wall_header">
                                    <?php echo $this->_tpl_vars['LANG']['USER_WALL']; ?>

                                    <div class="usr_wall_addlink" style="float:right">
                                        <a href="javascript:void(0)" id="addlink" class="ajaxlink" onclick="addWall('users', '<?php echo $this->_tpl_vars['usr']['id']; ?>
');return false;">
                                            <span><?php echo $this->_tpl_vars['LANG']['WRITE_ON_WALL']; ?>
</span>
                                        </a>
                                    </div>
                                </div>
								<div class="usr_wall_body" style="clear:both">
								
                                    <div class="wall_body"><?php echo $this->_tpl_vars['usr']['wall_html']; ?>
</div>
                                </div>
							</div>
						<?php endif; ?>
					</div>
				</div>
				
				<?php if ($this->_tpl_vars['myprofile'] && $this->_tpl_vars['cfg']['sw_feed']): ?>
					<div id="upr_feed">

					</div>
				<?php endif; ?>

			 
             
			 
			 <?php $_from = $this->_tpl_vars['plugins']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['plugin']):
?>
                    <div id="upr_<?php echo $this->_tpl_vars['plugin']['name']; ?>
">
					
					<?php echo $this->_tpl_vars['plugin']['html']; ?>

					
					
					</div>
              <?php endforeach; endif; unset($_from); ?>
			 

			</div>
			<?php else: ?>
			 <span class="little-gray">Більш детальна інформація доступна тільки друзям користувача</span>
			<?php endif; ?>
	</td>
  </tr>
</table>