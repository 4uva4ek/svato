<?php /* Smarty version 2.6.28, created on 2015-08-16 14:02:36
         compiled from com_clubs_view_club.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'csrf_token', 'com_clubs_view_club.tpl', 35, false),array('function', 'profile_url', 'com_clubs_view_club.tpl', 141, false),array('modifier', 'escape', 'com_clubs_view_club.tpl', 93, false),array('modifier', 'truncate', 'com_clubs_view_club.tpl', 93, false),)), $this); ?>


<div class="con_heading"><?php echo $this->_tpl_vars['club']['title']; ?>
</div>
 <div class="description">
                    <?php echo $this->_tpl_vars['club']['description']; ?>

                </div>

				
				<?php if ($this->_tpl_vars['club']['clubtype'] !== 'public' || $this->_tpl_vars['club']['clubtype'] == 'public'): ?>
<table class="club_full_entry" cellpadding="0" cellspacing="0">
    <tr>
        <td valign="top"  class="club-left-c" >
            <div class="image"><img src="/images/clubs/<?php echo $this->_tpl_vars['club']['f_imageurl']; ?>
" border="0"/></div>
			
			   
			   
			 <div class="data">
                
               
                <?php if ($this->_tpl_vars['is_member'] || $this->_tpl_vars['is_admin'] || $this->_tpl_vars['is_moder'] || $this->_tpl_vars['user_id']): ?>
                <div class="clubmenu">
                    <?php if ($this->_tpl_vars['is_admin'] || $this->_tpl_vars['is_moder']): ?>
                       <a  href="/clubs/<?php echo $this->_tpl_vars['club']['id']; ?>
/config.html"><?php echo $this->_tpl_vars['LANG']['CONFIG_CLUB']; ?>
</a><br>
                    	<a class="ajaxlink" href="javascript:void(0)" onclick="clubs.sendMessages(<?php echo $this->_tpl_vars['club']['id']; ?>
);return false;" title="<?php echo $this->_tpl_vars['LANG']['SEND_MESSAGE_TO_MEMBERS']; ?>
"><?php echo $this->_tpl_vars['LANG']['SEND_MESSAGE']; ?>
</a>
                    <?php endif; ?>
                    <?php if ($this->_tpl_vars['user_id']): ?> <br>
                        <?php if (( $this->_tpl_vars['is_member'] || $this->_tpl_vars['is_admin'] || $this->_tpl_vars['is_moder'] ) && $this->_tpl_vars['club']['clubtype'] == 'public'): ?>
                        	
							<a class="ajaxlink" href="javascript:void(0)" onclick="clubs.intive(<?php echo $this->_tpl_vars['club']['id']; ?>
);return false;"><?php echo $this->_tpl_vars['LANG']['INVITE']; ?>
</a>
						 
                        <?php endif; ?><br>
                        <?php if ($this->_tpl_vars['is_member']): ?>
                        	 
							<a class="ajaxlink" href="javascript:void(0)" onclick="clubs.leaveClub(<?php echo $this->_tpl_vars['club']['id']; ?>
, '<?php echo smarty_function_csrf_token(array(), $this);?>
');return false;"><?php echo $this->_tpl_vars['LANG']['LEAVE_CLUB']; ?>
</a>
							
                        <?php elseif (( $this->_tpl_vars['club']['admin_id'] != $this->_tpl_vars['user_id'] ) && $this->_tpl_vars['club']['clubtype'] == 'public' && ! $this->_tpl_vars['is_moder']): ?>
                        	 
							<a class="ajaxlink" href="javascript:void(0)" onclick="clubs.joinClub(<?php echo $this->_tpl_vars['club']['id']; ?>
);return false;"><?php echo $this->_tpl_vars['LANG']['JOIN_CLUB']; ?>
</a>
							
						<?php elseif ($this->_tpl_vars['is_premember']): ?>
								<br>
								<p>Вы вже подали заявку на вступ до спільноти. Очікуйте.</p>
						<?php elseif ($this->_tpl_vars['club']['clubtype'] !== 'public' && ! $this->_tpl_vars['is_member'] && ! $this->_tpl_vars['is_moder'] && $this->_tpl_vars['club']['admin_id'] != $this->_tpl_vars['user_id']): ?>
						<br>
						   
							<a class="ajaxlink" href="javascript:void(0)" onclick="clubs.prejoinClub(<?php echo $this->_tpl_vars['club']['id']; ?>
);return false;">Подати заявку на вступ</a>
							 
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            </div>
			   <hr>
			   <br>
			   
			   
			   
                <div class="blog">
                    <?php if ($this->_tpl_vars['club']['typeofclub'] == 'm'): ?> 
                    <div class="content">
					<a class="usr_wall_header" href="/clubs/<?php echo $this->_tpl_vars['club']['id']; ?>
/problem.html">Проблемы</a>
					<br>
					<a class="usr_wall_header" href="/clubs/<?php echo $this->_tpl_vars['club']['id']; ?>
/needs.html">Потреби</a>
					<br>
					<a class="usr_wall_header" href="/clubs/<?php echo $this->_tpl_vars['club']['id']; ?>
/propos.html">Пропозиції</a>
					<br>
					<?php elseif ($this->_tpl_vars['club']['typeofclub'] == 'v'): ?> 
					
					<a class="usr_wall_header" href="/clubs/<?php echo $this->_tpl_vars['club']['id']; ?>
/volhelp.html">Чим можемо допомогти</a>
					 <?php endif; ?>
             

                    <br /> 

                    <hr>  <br /> 
                </div>
				</div>
                
				 <div class="clubcontent">
                <?php if ($this->_tpl_vars['club']['enabled_blogs']): ?>
                <div class="blog">
					<?php if ($this->_tpl_vars['club']['typeofclub'] == 'm'): ?>
                    <div><a class="usr_wall_header" href="/clubs/<?php echo $this->_tpl_vars['club']['id']; ?>
_blog"><?php echo $this->_tpl_vars['LANG']['CLUB_BLOG']; ?>
</a></div>
					<?php elseif ($this->_tpl_vars['club']['typeofclub'] == 'v'): ?>
					<div><a class="usr_wall_header" href="/clubs/<?php echo $this->_tpl_vars['club']['id']; ?>
_blog">Реалізовані проекти</a></div>
					<?php endif; ?>	
					<br>
                    <div class="content">
                    <?php if ($this->_tpl_vars['club']['blog_posts']): ?>
                        <?php $_from = $this->_tpl_vars['club']['blog_posts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['post']):
?>
					 
                       <a href="<?php echo $this->_tpl_vars['post']['url']; ?>
" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['post']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" class="club_post_title"><?php echo ((is_array($_tmp=$this->_tpl_vars['post']['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 40) : smarty_modifier_truncate($_tmp, 40)); ?>
</a> 
                         <br>
                        <?php endforeach; endif; unset($_from); ?>
					<?php else: ?>
                        <div class="usr_albums_block">
                            <ul class="usr_albums_list">
                                <li class="no_albums"><?php echo $this->_tpl_vars['LANG']['NO_BLOG_POSTS']; ?>
</li>
                            </ul>
                        </div>
                    <?php endif; ?>
 
             
                    <?php if ($this->_tpl_vars['is_admin'] || $this->_tpl_vars['is_moder'] || $this->_tpl_vars['is_blog_karma_enabled']): ?>
                    	<span><a href="/clubs/<?php echo $this->_tpl_vars['club']['id']; ?>
/newpost.html" class="service"><?php echo $this->_tpl_vars['LANG']['NEW_POST']; ?>
</a></span>
                    <?php endif; ?>
                     

                    </div>
                </div>
                <?php endif; ?>
				<br>
				<hr>
					<br>
                <?php if ($this->_tpl_vars['club']['enabled_photos']): ?>
                <div class="album">
                    <span class="usr_wall_header"><?php echo $this->_tpl_vars['LANG']['PHOTOALBUMS']; ?>
 </span>
                    <div class="content">
                        <div id="album_list"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'com_clubs_albums.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
                        <p>
                        <?php if ($this->_tpl_vars['club']['all_albums'] > $this->_tpl_vars['cfg']['club_album_perpage']): ?>
                        	<span><a href="/clubs/<?php echo $this->_tpl_vars['club']['id']; ?>
/photoalbums"><?php echo $this->_tpl_vars['LANG']['ALL_ALBUMS']; ?>
 (<strong id="count_photo"><?php echo $this->_tpl_vars['club']['all_albums']; ?>
</strong>)</a></span>
                        <?php endif; ?>
                        <?php if ($this->_tpl_vars['is_admin'] || $this->_tpl_vars['is_moder'] || $this->_tpl_vars['is_photo_karma_enabled']): ?>
                        	<span><a class="service ajaxlink" href="javascript:void(0)" onclick="clubs.addAlbum(<?php echo $this->_tpl_vars['club']['id']; ?>
);"><?php echo $this->_tpl_vars['LANG']['ADD_PHOTOALBUM']; ?>
</a></span>
                        <?php endif; ?>
                        </p>
                    </div>
                </div>
				  <?php endif; ?>
									<br>
				<hr>
					<br>
                
            </div>
				
			
            <div class="members_list">
                <div class="usr_wall_header"><?php echo $this->_tpl_vars['LANG']['CLUB_ADMINISTRATION']; ?>
:</div>
                <div class="list"><a href="<?php echo cmsSmartyProfileURL(array('login' => $this->_tpl_vars['club']['login']), $this);?>
"><img border="0" class="usr_img_small" src="<?php echo $this->_tpl_vars['club']['admin_avatar']; ?>
" style="float:left; margin: 0 7px 0 0;" /> <?php echo $this->_tpl_vars['club']['nickname']; ?>
</a><br /><em style="font-size:10px"><?php echo $this->_tpl_vars['LANG']['CLUB_ADMIN']; ?>
</em><br /><?php echo $this->_tpl_vars['club']['flogdate']; ?>
</div>
                <?php if ($this->_tpl_vars['club']['moderators']): ?>
                	<?php $_from = $this->_tpl_vars['club']['moderators_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tid'] => $this->_tpl_vars['moderator']):
?>
						<div class="list">
							<a href="<?php echo cmsSmartyProfileURL(array('login' => $this->_tpl_vars['moderator']['login']), $this);?>
">
							<img border="0" class="usr_img_small" src="<?php echo $this->_tpl_vars['moderator']['admin_avatar']; ?>
" style="float:left; margin: 0 7px 0 0;" />
								<?php echo $this->_tpl_vars['moderator']['nickname']; ?>
</a><br />
							<em style="font-size:10px"><?php echo $this->_tpl_vars['LANG']['MODERATOR']; ?>
</em>
							<?php if ($this->_tpl_vars['moderator']['is_online']): ?><br>
							<span class="online"><?php echo $this->_tpl_vars['LANG']['ONLINE']; ?>
</span>
							<?php endif; ?>
						</div>
                    <?php endforeach; endif; unset($_from); ?>
                <?php endif; ?>
            </div>
				<br>
				<hr>
					<br>
            <?php if ($this->_tpl_vars['club']['members_list']): ?>
                <div class="members_list">
                    <div class="usr_wall_header">
                    	<?php if ($this->_tpl_vars['club']['members']-$this->_tpl_vars['club']['moderators'] > $this->_tpl_vars['cfg']['club_perpage']): ?>
                    		<a href="/clubs/<?php echo $this->_tpl_vars['club']['id']; ?>
/members-1"><?php echo $this->_tpl_vars['LANG']['CLUB_MEMBERS']; ?>
 (<?php echo $this->_tpl_vars['club']['members']-$this->_tpl_vars['club']['moderators']; ?>
):</a>
                        <?php else: ?>
                        	<?php echo $this->_tpl_vars['LANG']['CLUB_MEMBERS']; ?>
 (<?php echo $this->_tpl_vars['club']['members']-$this->_tpl_vars['club']['moderators']; ?>
):
                    <?php endif; ?>
                </div>
				
                    <div class="list">
                    <?php $_from = $this->_tpl_vars['club']['members_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tid'] => $this->_tpl_vars['member']):
?>
						 
                        <div class="member_list" align="center">
						<div align="center">
						<a href="<?php echo cmsSmartyProfileURL(array('login' => $this->_tpl_vars['member']['login']), $this);?>
">
						<img border="0" class="usr_img_small" src="<?php echo $this->_tpl_vars['member']['admin_avatar']; ?>
" /></a><br />
						</div>
						<div align="center">
						<a class="friend_link" href="<?php echo cmsSmartyProfileURL(array('login' => $this->_tpl_vars['member']['login']), $this);?>
" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['member']['nickname'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
"><?php echo $this->_tpl_vars['member']['nickname']; ?>
</a>
						<?php if ($this->_tpl_vars['member']['is_online']): ?><span class="online"><?php echo $this->_tpl_vars['LANG']['ONLINE']; ?>
</span><?php endif; ?>
							</div>
						</div>
						 
                    <?php endforeach; endif; unset($_from); ?>
                    </div>
                </div>
            <?php endif; ?>
        </td>
        <td class="pd-l-10" valign="top">
        
		
		
		
            <div class="wall">
		


		<?php if ($this->_tpl_vars['club']['premembers_list']): ?> 
           <div class="premembers">
		   <h2>Заявки на участь в спільності</h2>
		 <?php $_from = $this->_tpl_vars['club']['premembers_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tid'] => $this->_tpl_vars['premember']):
?>
						
						
						<div class="list">
							
							
							<div class="member_list" align="center">
							<div align="center">
							<a href="<?php echo cmsSmartyProfileURL(array('login' => $this->_tpl_vars['premember']['login']), $this);?>
">
							<img border="0" class="usr_img_small" src="<?php echo $this->_tpl_vars['premember']['admin_avatar']; ?>
" /></a><br />
							</div>
							<div align="center">
							<a class="friend_link" href="<?php echo cmsSmartyProfileURL(array('login' => $this->_tpl_vars['premember']['login']), $this);?>
" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['premember']['nickname'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
"><?php echo $this->_tpl_vars['premember']['nickname']; ?>
</a>
							
							 
							
								</div>
								<a title="Голосувати" class="ajaxlink" href="javascript:void(0)" onclick="clubs.joinPreUser(<?php echo $this->_tpl_vars['club']['id']; ?>
,<?php echo $this->_tpl_vars['premember']['user_id']; ?>
,<?php echo $this->_tpl_vars['user_id']; ?>
);return false;">★ <?php echo $this->_tpl_vars['premember']['vote_points']; ?>
</a>
							
							</div>
							
							
						 
						</div>
						
						
                    <?php endforeach; endif; unset($_from); ?>
		   
		   </div>
		   <p>Для того щоб уникнути участі в спільноті людей, які не мають до неї відношення, проголосуйте за тих, кого ви знаєте особисто. Після п'яти голосів вони стануть учасниками спільноти.</p>
			<?php endif; ?> 
      





	  <div <?php if ($this->_tpl_vars['club']['typeofclub'] == 'm'): ?>id="usertitle"<?php elseif ($this->_tpl_vars['club']['typeofclub'] == 'v'): ?>id="usertitle_vol"<?php endif; ?> >
				
		 Стіна спільноти
		 		 <?php if (( $this->_tpl_vars['is_member'] || $this->_tpl_vars['is_admin'] || $this->_tpl_vars['is_moder'] )): ?>
		<a href="javascript:void(0)" id="addlink" class="ajaxlink" onclick="addWall('clubs', '<?php echo $this->_tpl_vars['club']['id']; ?>
');return false;">
                            <?php echo $this->_tpl_vars['LANG']['WRITE_ON_WALL']; ?>

                        </a>
		<?php endif; ?>
		 </div>
                    <div class="club_wall_addlink">
                        
                    </div>
                 
                <div class="body">
                    <div class="wall_body"><?php echo $this->_tpl_vars['club']['wall_html']; ?>
</div>
                </div>
            </div>
        </td>
    </tr>
</table>

<?php endif; ?>