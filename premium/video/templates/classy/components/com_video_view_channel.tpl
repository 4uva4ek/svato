<div class="top_movie">
    <h3>{$LANG.YOU_SEE_CHANNEL} {$usr.nickname} <a href="/rss/video/{$usr.login}/feed.rss" title="{$LANG.CHANNELS_RSS}"><img alt="rss" src="/templates/{template}/images/icons/rss.png" /></a></h3>
        {if $access.myprofile && $access.is_auth}
        <div class="right-nav">
            <a class="v_addlink" href="/video/add.html">{$LANG.MOVIE_ADD}</a>
        </div>
        {elseif !$access.myprofile}
        <div class="channel-subscription-container">
            <strong class="{if !$user_subscribed}icn-subskr{else}icn-unsubskr{/if}" id="subscription_link">
            {if $access.is_auth}
                {if !$user_subscribed}
                    <a href="#" onclick="subscribe('{$usr.id}');return false;">{$LANG.SUBSCRIBE}</a>
                    <a style="display: none" href="#" onclick="subscribe('{$usr.id}');return false;">{$LANG.UNSUBSCRIBE}</a>
                {else}
                    <a href="#" onclick="subscribe('{$usr.id}');return false;">{$LANG.UNSUBSCRIBE}</a>
                    <a style="display: none" href="#" onclick="subscribe('{$usr.id}');return false;">{$LANG.SUBSCRIBE}</a>
                {/if}
            {else}
                <a href="#" rel="nofollow" onclick="core.alert('{$LANG.REGISTERED_ACCESS_SUBSCRIBE|escape:html}', '{$LANG.ATTENTION}');return false;">{$LANG.SUBSCRIBE}</a>
            {/if}
            </strong><span id="count_subscribe"> &middot; {$channel.count_subscribe|spellcount:$LANG.SUBSCRIBER1:$LANG.SUBSCRIBER2:$LANG.SUBSCRIBER10}</span>
        </div>
        {/if}
    <div class="tabs" id="tabs_recommended">
        <ul>
            <li class="{if $channel.view=='latest'}act {/if}first" onclick="viewChannel('latest', '{$usr.login}');"><span class="firstcont"><a title="{$LANG.MOVIE_LATEST}" href="javascript:">{$channel.title_movies|escape:'html'} {if $channel.view=='latest'}({$total}){/if}</a></span></li>
            <li class="{if $channel.view=='fav'}act{/if}" onclick="viewChannel('fav', '{$usr.login}');"><span><a title="{$LANG.FAVORITES_MOVIE}" href="javascript:">{$LANG.FAVORITES_MOVIE} {if $channel.view=='fav'}({$total}){/if}</a></span></li>
            {if $access.myprofile && $access.is_auth}
                <li class="{if $channel.view=='on_convert'}act {/if}last" onclick="viewChannel('on_convert', '{$usr.login}');"><span class="lastcont"><a title="{$LANG.MOVIE_ON_CONVERT}" href="javascript:">{$LANG.MOVIE_ON_CONVERT} {if $channel.view=='on_convert'}({$total}){/if}</a></span></li>
            {/if}
            {if !$access.myprofile}
                <li class="{if $channel.view=='actions'}act {/if}last" onclick="viewChannelActions('{$usr.login}');"><span class="lastcont"><a title="{$LANG.ACTIONS_MOVIE}" href="javascript:">{$LANG.ACTIONS_MOVIE}</a></span></li>
            {/if}
        </ul>
    </div>
</div>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top" id="field_for_movie_content">
{if $cat.description}
    <div class="photo_descr">
    	{$cat.description}
    </div>
{/if}
{if $album.id && $access.myprofile && $access.is_auth}
    <div align="right">
        <a href="javascript:void(0)" onclick="$('#edit_album').show();$('#album_description').hide();$('#title').focus();" class="v_edit">{$LANG.EDIT_ALBUM}</a>
        <a href="/video/delete_album{$album.id}.html" onclick="if(!confirm('{$LANG.DEL_ALBUM_CONFIRM}')){literal}{ return false; }{/literal}" class="v_edit">{$LANG.DELETE_ALBUM}</a>
    </div>
    <div class="photo_descr" id="edit_album" style="display:none; clear:both;">
	<form action="/video/operations_album.html" method="post">
        <input type="hidden" name="csrf_token" value="{csrf_token}" />
        <table border="0" cellspacing="0" cellpadding="2" width="100%">
          <tr>
            <td width="150px"><label for="album_title">{$LANG.ALBUM_TITLE}:</label></td>
            <td><input type="text" class="text-input" id="title" name="title" value="{$album.title|escape:'html'}" style="width:100%;" /></td>
          </tr>
          <tr>
            <td><label for="description">{$LANG.ALBUM_DESCS}:</label></td>
            <td><textarea name="description" cols="1" rows="5" style="width:100%;">{$album.description}</textarea></td>
          </tr>
        </table>
        <p>
        	<input type="hidden" name="edit_album" value="1" />
            <input type="hidden" name="album_id" value="{$album.id}" />
           <input type="submit" name="save_album" value="{$LANG.SAVE}"/>
           <input name="Button" type="button" value="{$LANG.CANCEL}" onclick="$('#edit_album').hide();$('#album_description').show();"/>
        </p>
      </form>
    </div>
{/if}
{if $album.description}
    <div class="photo_descr" id="album_description">
    	{$album.description|nl2br}
    </div>
{/if}
{if $movies}

	{if $channel.channel_view=='review' && $channel.view!='on_convert'}
    	<div style="min-height:380px" id="view_movie_div">
        	{include file='com_video_view_code.tpl'}
        </div>
    {/if}

    {if $channel.view=='latest' && $access.is_auth && ($access.myprofile || $access.is_admin || $access.is_moder)}
        <form action="/video/operations_movies" method="post" id="operations_form">
    {/if}

    <ul class="sort" id="movie_view">
      {foreach key=tid item=movie from=$movies}
          <li>
          {if $channel.view=='latest' && $access.is_auth && ($access.myprofile || $access.is_admin || $access.is_moder)}<label for="mid_{$movie.id}">{/if}
          <a title="{$LANG.VIEW_MOVIE} - {$movie.title|escape:'html'}" href="{$movie.movie_link}" onclick="{if $channel.channel_view=='review'}getMovieToView{else}getMovieLightbox{/if}('{$movie.id}');return false;" class="thumb"><img src="/upload/video/thumbs/medium/{$movie.img}" {if $movie.is_viewed}class="watched_img"{/if} alt="{$movie.title|escape:'html'}" />{if $movie.is_adult}<span class="censored">18+</span>{/if}{if $movie.orig_duration}<span title="{$LANG.DURATION}" class="duration">{$movie.duration}</span>{/if}<span class="thumb_hover"></span>{if $movie.is_viewed}<span class="watched">{$LANG.IS_VIEWED}</span>{/if}</a>
            <h5><a href="{$movie.movie_link}">{$movie.s_title}</a></h5>
              <p>
                  <span class="icn-views">{$movie.hits}</span>
                  <span class="icn-rating">{$movie.rating}</span>
                  <span class="icn-comments">{$movie.comments}</span>
                  <span><a href="{$movie.cat_link}" onclick="viewChannelCat({$movie.cat_id}, '{$usr.login}'); return false;">{$movie.cat_title}</a></span>
              </p>
              {if $channel.view=='latest' && $access.is_auth && ($access.myprofile || $access.is_admin || $access.is_moder)}
              	<input type="checkbox" class="movie_id" name="movies[]" id="mid_{$movie.id}" value="{$movie.id}" onclick="toggleButtons('mid_{$movie.id}');" /></label>
              {/if}
          </li>
      {/foreach}
      <li class="cb"></li>
      </ul>

      {if $channel.view=='latest' && $access.is_auth && ($access.myprofile || $access.is_admin || $access.is_moder)}
          <div class="usr_photo_sel_bar bar">
              {$LANG.SELECTED_ITEMS}<span id="selected_items"></span>:
              {if $cfg.allow_edit || $access.is_admin || $access.is_moder}
              	<input class="sel_pub" type="submit" name="edit" id="edit_btn" value="{$LANG.EDIT}" disabled="disabled" />
              {/if}
              <input class="sel_pub" type="button" id="mov_btn" value="{$LANG.MOVE}" disabled="disabled" onclick="$('.sel_move').toggle();$('.sel_pub').toggle();" />
              <input class="sel_pub" type="submit" name="delete" id="delete_btn" value="{$LANG.DELETE}" disabled="disabled" onclick="core.confirm('{$LANG.DEL_MOVIES_CONFIRM}', null, function() {literal}{{/literal} $('#operations_form').append('<input type=\'hidden\' name=\'delete\' value=\'1\' />').submit(); {literal}}{/literal}); return false;" />

			  <span style="display:none" class="sel_move"> {$LANG.MOVE_TO_ALBUM}: </span>
              {if $channel.albums}
              <select style="display:none" class="sel_move" name="move_album_id" id="move_cat_id" style="width:250px">
                {foreach key=tid item=users_album from=$channel.albums}
                	<option value="{$users_album.id}">{$users_album.title}</option>
                {/foreach}
              </select>
              {else}
              	<span style="display:none" class="sel_move">{$LANG.NOT_VIDEOALBUMS}, <a href="javascript:;" class="ajaxlink" onclick="addAlbum();$('.sel_move').toggle();$('.sel_pub').toggle();">{$LANG.ADD_ALBUM}</a></span>
              {/if}
              <input class="sel_move" style="display:none" name="mov" type="submit" name="" value="{$LANG.CONTINUE}" />
              <input class="sel_move" style="display:none" type="button" name="" value="{$LANG.CANCEL}" onclick="$('.sel_move').toggle();$('.sel_pub').toggle();" />
          </div>
          </form>
      {/if}

      {$pagebar}

{else}
    	<p class="not_found">
        {if $channel.view=='latest'}
        	{$LANG.NOT_AVAILABLE_MOVIE}
        {elseif $channel.view=='fav'}
        	{$LANG.NOT_FAV_MOVIE}
        {elseif $channel.view=='on_convert'}
        	{$LANG.NOT_MOVIE_ON_CONVERT}
		{/if}
        </p>
{/if}
    </td>
    <td width="240px" valign="top">
        <div class="video_menu">
        	<div class="corn_t"><div class="tl"></div><div class="tr"></div></div>
            <div class="cont_player">
                <!--автор канала-->
                <div class="ch_block_none_border">
                    <h3>{$LANG.CHANNELS_AUTHOR}</h3>
                    <table width="100%" border="0" cellspacing="0" cellpadding="2" style="margin:5px 0 0 0;">
                      <tr>
                        <td width="75px" valign="middle" align="center"><a href="{profile_url login=$usr.login}" title="{$usr.nickname|escape:'html'}"><img src="{$usr.imageurl}" alt="{$usr.nickname|escape:'html'}" border="0"/></a></td>
                        <td valign="top">
                            <ul class="user-info">
                                <li class="profile_link"><a href="{profile_url login=$usr.login}" title="{$usr.nickname|escape:'html'}">{$usr.nickname}</a></li>
                                {if !$access.myprofile && $access.is_auth}
                                    {add_js file='components/users/js/profile.js'}
                                    <li><a class="ajaxlink" href="javascript:void(0)" title="{$LANG.WRITE_MESSAGE}: {$usr.nickname|escape:'html'}" onclick="users.sendMess('{$usr.id}', 0, this);return false;">{$LANG.WRITE_MESSAGE}</a></li>
                                    {if $access.is_friend}
                                    	<li class="del_friend_ajax"><a href="javascript:void(0)" title="{$usr.nickname|escape:'html'}" onclick="users.delFriend('{$usr.id}', this);return false;" class="ajaxlink">{$LANG.MOV_STOP_FRIENDLY}</a></li>
                                        <li class="add_friend_ajax" style="display: none;"><a class="ajaxlink" href="javascript:void(0)" title="{$usr.nickname|escape:'html'}" onclick="users.addFriend('{$usr.id}', this);return false;">{$LANG.MOV_ADD_TO_FRIEND}</a></li>
                                    {else}
                                    	<li><a class="ajaxlink" href="javascript:void(0)" title="{$usr.nickname|escape:'html'}" onclick="users.addFriend('{$usr.id}', this);return false;">{$LANG.MOV_ADD_TO_FRIEND}</a></li>
                                    {/if}
                                {/if}
                            </ul>
                        </td>
                      </tr>
                    </table>
                </div>
                <div class="ch_block">
                	<h3>{$LANG.OPTIONS_VIEW}</h3>
					<p>{$LANG.MOVIE_PERPAGE}: <select name="perpage" id="perpage" onchange="perpage('{$usr.login}', '{$channel.view}');" style="width: 33%;">
                    	<option value="6" {if $channel.perpage=='6'} selected {/if}>6</option>
                    	<option value="12" {if $channel.perpage=='12'} selected {/if}>12</option>
                        <option value="15" {if $channel.perpage=='15'} selected {/if}>15</option>
                        <option value="18" {if $channel.perpage=='18'} selected {/if}>18</option>
                        <option value="21" {if $channel.perpage=='21'} selected {/if}>21</option></select></p>
                    <p>{$LANG.VIEW_CHANNEL}: <select name="channel_view" id="channel_view" onchange="viewChannelType('{$usr.login}');" style="width:84%"><option value="list" {if $channel.channel_view=='list'} selected {/if}>{$LANG.CHANNEL_LIST}</option><option value="review" {if $channel.channel_view=='review'} selected {/if}>{$LANG.CHANNEL_REVIEW}</option></select></p>
                    <div id="p_query_channel">
                        <p><input name="query_channel" id="query_channel" type="text" value="{$channel.query_channel}" class="text-input" style="width:97%; color:#666" placeholder="{$LANG.SEARCH_BY_CHANNEL}" /></p>
                        {if $channel.query_channel && $channel.query_channel != $LANG.SEARCH_BY_CHANNEL}
                            <p><a href="javascript:;" class="ajaxlink" onclick="clearChannelSearch('{$usr.login}');">{$LANG.CANSEL_SEARCH}</a></p>
                        {/if}
                    </div>
				</div>
                <!--список альбомов пользователя-->
                <div class="ch_block">
                    <h3>{$LANG.VIDEOALBUMS}</h3>
                    <div id="view_albums">
                        {if $channel.albums}
                        <ul class="video_cat_list">
                        <li><a href="javascript:;" class="ajax_link_orig" onclick="viewChannel('latest', '{$usr.login}');">{if !$album.id}<strong>{$LANG.ALL_VIDEOALBUMS}</strong>{else}{$LANG.ALL_VIDEOALBUMS}{/if}</a></li>
                        {foreach key=tid item=users_album from=$channel.albums}
                            <li class="folder_album"><a class="ajax_link_orig" href="javascript:;" onclick="viewChannelAlbum({$users_album.id}, '{$usr.login}'); return false;">{if $album.id == $users_album.id} <strong>{$users_album.title}</strong>{else}{$users_album.title}{/if}</a></li>
                        {/foreach}
                        </ul>
                        {else}
                            <p class="not_found">{$LANG.NOT_VIDEOALBUMS}...</p>
                        {/if}
                    </div>
                    {if $access.myprofile && $access.is_auth}
                        <span id="add_album_link" class="icn-add"><a href="javascript:;" class="ajaxlink" onclick="addAlbum();">{$LANG.ADD_ALBUM}</a></span>
                    {/if}
                </div>
                {if $channel.cats}
                <div class="ch_block">
                    <h3>{$LANG.CATS}</h3>
                 	<ul class="video_cat_list">
                    <li><a href="javascript:;" class="ajax_link_orig" onclick="viewChannel('latest', '{$usr.login}');">{if !$cat.id}<strong>{$LANG.ALL_CATS}</strong>{else}{$LANG.ALL_CATS}{/if}</a></li>
                    {foreach key=tid item=users_cat from=$channel.cats}
						<li class="folder"><a href="javascript:;" class="ajax_link_orig" onclick="viewChannelCat({$users_cat.id}, '{$usr.login}'); return false;">{if $cat.id == $users_cat.id} <strong>{$users_cat.title} ({$users_cat.movie_count})</strong>{else}{$users_cat.title} ({$users_cat.movie_count}){/if}</a></li>
                    {/foreach}
                    </ul>
                </div>
                {/if}
                <!--список подписчиков канала-->
                <div class="ch_block" id="chan_subscr">
					{include file='com_video_subscribe.tpl'}
                </div>
            </div>
    		<div class="corn_b"><div class="bl"></div><div class="br"></div></div>
		</div>
    </td>
  </tr>
</table>
{if $channel.channel_view=='list'}
	{assign var="selector" value="#popup_message"}
{else}
	{assign var="selector" value="#view_movie_div"}
{/if}
{if $search_query}
    <script type="text/javascript" src="/components/video/js/jquery.highlight.js"></script>
    <script type="text/javascript">
    var hl = {$search_query};
    {literal}
    $(document).ready(function(){
        $('.component').highlight(hl);
    });
    </script>
{/literal}{/if}
<script type="text/javascript">
{literal}
$(document).ready(function(){
	$('#query_channel').bind('keypress', function(e){
		 if(e.keyCode==13){
			  channelSearch('{/literal}{$usr.login}{literal}');
		 }
	});
    $('.lightsoff_channel').fadeIn();
});

function getMovieToView(movie_id){
    if(typeof timeout_id != 'undefined'){
        clearTimeout(timeout_id);
    }
	view  = {/literal}'{$channel.view}';
	var channel_view = '{$channel.channel_view}';
	login = '{$usr.login}';
	page  = +'{$page}';
	last_mov_id  = +'{$movie.id}';
	selector     = '{$selector}';
	first_mov_id = +'{$first_movie_id}';{literal}
	next_page=~~page+1;
	prev_page=~~page-1;
	if(movie_id < last_mov_id){
		if (channel_view=='list'){
            getMovieCode(movie_id, selector);
        }
		paginations(next_page, login, view, false, function () { if(channel_view == 'list'){ $('.lightsoff_channel').hide(); } });
	} else if(movie_id > first_mov_id && prev_page>0){
		if (channel_view=='list'){
            getMovieCode(movie_id, selector);
        }
		paginations(prev_page, login, view, movie_id, function () { if(channel_view == 'list'){ $('.lightsoff_channel').hide(); } });
	} else {
        getMovieCode(movie_id, selector, function () { if(channel_view == 'review'){ $('.lightsoff_channel').fadeIn(); } });
	}
}
{/literal}
</script>
<input type="hidden" name="p_album_id" value="{$album.id}" />
<input type="hidden" name="p_cat_id" value="{$cat.id}" />
<input type="hidden" name="p_user_id" value="{$usr.id}" />