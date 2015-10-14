

<div class="con_heading">{$club.title}</div>
 <div class="description">
                    {$club.description}
                </div>

				
				{*if $is_access*}
{if $club.clubtype!=='public' || $club.clubtype=='public'}
<table class="club_full_entry" cellpadding="0" cellspacing="0">
    <tr>
        <td valign="top"  class="club-left-c" >
            <div class="image"><img src="/images/clubs/{$club.f_imageurl}" border="0"/></div>
			
			   
			   
			 <div class="data">
                
               
                {if $is_member || $is_admin || $is_moder || $user_id}
                <div class="clubmenu">
                    {if $is_admin || $is_moder}
                       <a  href="/clubs/{$club.id}/config.html">{$LANG.CONFIG_CLUB}</a><br>
                    	<a class="ajaxlink" href="javascript:void(0)" onclick="clubs.sendMessages({$club.id});return false;" title="{$LANG.SEND_MESSAGE_TO_MEMBERS}">{$LANG.SEND_MESSAGE}</a>
                    {/if}
                    {if $user_id} <br>
                        {if ($is_member || $is_admin || $is_moder) && $club.clubtype=='public'}
                        	
							<a class="ajaxlink" href="javascript:void(0)" onclick="clubs.intive({$club.id});return false;">{$LANG.INVITE}</a>
						 
                        {/if}<br>
                        {if $is_member}
                        	 
							<a class="ajaxlink" href="javascript:void(0)" onclick="clubs.leaveClub({$club.id}, '{csrf_token}');return false;">{$LANG.LEAVE_CLUB}</a>
							
                        {elseif ($club.admin_id != $user_id) && $club.clubtype=='public' && !$is_moder}
                        	 
							<a class="ajaxlink" href="javascript:void(0)" onclick="clubs.joinClub({$club.id});return false;">{$LANG.JOIN_CLUB}</a>
							
						{elseif $is_premember}
								<br>
								<p>Вы вже подали заявку на вступ до спільноти. Очікуйте.</p>
						{elseif $club.clubtype!=='public' && !$is_member && !$is_moder && $club.admin_id != $user_id }
						<br>
						   
							<a class="ajaxlink" href="javascript:void(0)" onclick="clubs.prejoinClub({$club.id});return false;">Подати заявку на вступ</a>
							 
                        {/if}
                    {/if}
                </div>
                {/if}
            </div>
			   <hr>
			   <br>
			   
			   
			   
                <div class="blog">
                    {if $club.typeofclub == "m"} 
                    <div class="content">
					<a class="usr_wall_header" href="/clubs/{$club.id}/problem.html">Проблемы</a>
					<br>
					<a class="usr_wall_header" href="/clubs/{$club.id}/needs.html">Потреби</a>
					<br>
					<a class="usr_wall_header" href="/clubs/{$club.id}/propos.html">Пропозиції</a>
					<br>
					{elseif $club.typeofclub == "v"} 
					
					<a class="usr_wall_header" href="/clubs/{$club.id}/volhelp.html">Чим можемо допомогти</a>
					 {/if}
             

                    <br /> 

                    <hr>  <br /> 
                </div>
				</div>
                
				 <div class="clubcontent">
                {if $club.enabled_blogs}
                <div class="blog">
					{if $club.typeofclub == "m"}
                    <div><a class="usr_wall_header" href="/clubs/{$club.id}_blog">{$LANG.CLUB_BLOG}</a></div>
					{elseif $club.typeofclub == "v"}
					<div><a class="usr_wall_header" href="/clubs/{$club.id}_blog">Реалізовані проекти</a></div>
					{/if}	
					<br>
                    <div class="content">
                    {if $club.blog_posts}
                        {foreach key=id item=post from=$club.blog_posts}
					 
                       <a href="{$post.url}" title="{$post.title|escape:'html'}" class="club_post_title">{$post.title|truncate:40}</a> 
                         <br>
                        {/foreach}
					{else}
                        <div class="usr_albums_block">
                            <ul class="usr_albums_list">
                                <li class="no_albums">{$LANG.NO_BLOG_POSTS}</li>
                            </ul>
                        </div>
                    {/if}
 
             
                    {if $is_admin || $is_moder || $is_blog_karma_enabled}
                    	<span><a href="/clubs/{$club.id}/newpost.html" class="service">{$LANG.NEW_POST}</a></span>
                    {/if}
                     

                    </div>
                </div>
                {/if}
				<br>
				<hr>
					<br>
                {if $club.enabled_photos}
                <div class="album">
                    <span class="usr_wall_header">{$LANG.PHOTOALBUMS} </span>
                    <div class="content">
                        <div id="album_list">{include file='com_clubs_albums.tpl'}</div>
                        <p>
                        {if $club.all_albums > $cfg.club_album_perpage}
                        	<span><a href="/clubs/{$club.id}/photoalbums">{$LANG.ALL_ALBUMS} (<strong id="count_photo">{$club.all_albums}</strong>)</a></span>
                        {/if}
                        {if $is_admin || $is_moder || $is_photo_karma_enabled}
                        	<span><a class="service ajaxlink" href="javascript:void(0)" onclick="clubs.addAlbum({$club.id});">{$LANG.ADD_PHOTOALBUM}</a></span>
                        {/if}
                        </p>
                    </div>
                </div>
				  {/if}
									<br>
				<hr>
					<br>
                
            </div>
				
			
            <div class="members_list">
                <div class="usr_wall_header">{$LANG.CLUB_ADMINISTRATION}:</div>
                <div class="list"><a href="{profile_url login=$club.login}"><img border="0" class="usr_img_small" src="{$club.admin_avatar}" style="float:left; margin: 0 7px 0 0;" /> {$club.nickname}</a><br /><em style="font-size:10px">{$LANG.CLUB_ADMIN}</em><br />{$club.flogdate}</div>
                {if $club.moderators}
                	{foreach key=tid item=moderator from=$club.moderators_list}
						<div class="list">
							<a href="{profile_url login=$moderator.login}">
							<img border="0" class="usr_img_small" src="{$moderator.admin_avatar}" style="float:left; margin: 0 7px 0 0;" />
								{$moderator.nickname}</a><br />
							<em style="font-size:10px">{$LANG.MODERATOR}</em>
							{if $moderator.is_online}<br>
							<span class="online">{$LANG.ONLINE}</span>
							{/if}
						</div>
                    {/foreach}
                {/if}
            </div>
				<br>
				<hr>
					<br>
            {if $club.members_list}
                <div class="members_list">
                    <div class="usr_wall_header">
                    	{if $club.members-$club.moderators > $cfg.club_perpage}
                    		<a href="/clubs/{$club.id}/members-1">{$LANG.CLUB_MEMBERS} ({$club.members-$club.moderators}):</a>
                        {else}
                        	{$LANG.CLUB_MEMBERS} ({$club.members-$club.moderators}):
                    {/if}
                </div>
				
                    <div class="list">
                    {foreach key=tid item=member from=$club.members_list}
						 
                        <div class="member_list" align="center">
						<div align="center">
						<a href="{profile_url login=$member.login}">
						<img border="0" class="usr_img_small" src="{$member.admin_avatar}" /></a><br />
						</div>
						<div align="center">
						<a class="friend_link" href="{profile_url login=$member.login}" title="{$member.nickname|escape:'html'}">{$member.nickname}</a>
						{if $member.is_online}<span class="online">{$LANG.ONLINE}</span>{/if}
							</div>
						</div>
						 
                    {/foreach}
                    </div>
                </div>
            {/if}
        </td>
        <td class="pd-l-10" valign="top">
        
		
		
		
            <div class="wall">
		


		{if $club.premembers_list} 
           <div class="premembers">
		   <h2>Заявки на участь в спільності</h2>
		 {foreach key=tid item=premember from=$club.premembers_list}
						
						
						<div class="list">
							
							
							<div class="member_list" align="center">
							<div align="center">
							<a href="{profile_url login=$premember.login}">
							<img border="0" class="usr_img_small" src="{$premember.admin_avatar}" /></a><br />
							</div>
							<div align="center">
							<a class="friend_link" href="{profile_url login=$premember.login}" title="{$premember.nickname|escape:'html'}">{$premember.nickname}</a>
							
							 
							
								</div>
								<a title="Голосувати" class="ajaxlink" href="javascript:void(0)" onclick="clubs.joinPreUser({$club.id},{$premember.user_id},{$user_id});return false;">★ {$premember.vote_points}</a>
							
							</div>
							
							
						 
						</div>
						
						
                    {/foreach}
		   
		   </div>
		   <p>Для того щоб уникнути участі в спільноті людей, які не мають до неї відношення, проголосуйте за тих, кого ви знаєте особисто. Після п'яти голосів вони стануть учасниками спільноти.</p>
			{/if} 
      





	  <div {if $club.typeofclub=="m"}id="usertitle"{elseif $club.typeofclub=="v"}id="usertitle_vol"{/if} >
				
		 Стіна спільноти
		 {*&& $club.clubtype=='public'*}
		 {if ($is_member || $is_admin || $is_moder) }
		<a href="javascript:void(0)" id="addlink" class="ajaxlink" onclick="addWall('clubs', '{$club.id}');return false;">
                            {$LANG.WRITE_ON_WALL}
                        </a>
		{/if}
		 </div>
                    <div class="club_wall_addlink">
                        
                    </div>
                 
                <div class="body">
                    <div class="wall_body">{$club.wall_html}</div>
                </div>
            </div>
        </td>
    </tr>
</table>

{/if}