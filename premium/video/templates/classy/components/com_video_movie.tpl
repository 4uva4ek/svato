{if $access.is_auth}
{if $access.is_author || $access.is_admin || $access.is_moder}
<div class="float_bar">
      <span><a href="javascript:void(0)" onclick="operationMovie('{$movie.id}', 'edit');">{$LANG.EDIT}</a></span>
      <span><a class="ajax_link_orig" href="javascript:void(0)" onclick="core.confirm('{$LANG.DEL_MOVIES_CONFIRM}', null, function() {literal}{{/literal} operationMovie('{$movie.id}', 'delete'); {literal}}{/literal})">{$LANG.DELETE}</a></span>
</div>
{/if}
{/if}
<h1 {if $movie.is_vib_red}class="con_heading editors_choice" title="{$LANG.EDITORS_CHOICE}!"{else}class="con_heading"{/if}>{$movie.title}</h1>

{literal}
    <script>
        $(document).ready(function(){
            var wh = $('.m-block').width();
            if(wh<1000)
                $('.m-block').addClass('sr');
        });
    </script>
{/literal}
<div class="m-block">
<div class="vv-block">
    <div class="vv-one">
            <div id="watch-user-header">
                <a href="{profile_url login=$movie.login}" title="{$LANG.MOVIE_AUTHOR}" class="watch-user-avatar"><img src="{$movie.user_avatar}" alt="{$movie.nickname|escape:'html'}" /></a>
                <a href="/video/channel/{$movie.login}.html" title="{$LANG.VIEW_TO_CHANNEL}"  class="watch-user-name"><strong>{$movie.nickname}</strong><span> &middot; {$movie.video_count|spellcount:$LANG.MOVIE1:$LANG.MOVIE2:$LANG.MOVIE10}</span></a><br>
                <div class="watch-subscription-container">
                    <strong class="{if !$user_subscribed}icn-subskr{else}icn-unsubskr{/if}" id="subscription_link">
                        {if $access.is_auth}
                            {if !$access.is_author}
                                {if !$user_subscribed}
                                    <a href="#" onclick="subscribe('{$movie.user_id}', 1);return false;">{$LANG.SUBSCRIBE}</a>
                                    <a href="#" style="display: none" onclick="subscribe('{$movie.user_id}', 1);return false;">{$LANG.UNSUBSCRIBE}</a>
                                {else}
                                    <a href="#" onclick="subscribe('{$movie.user_id}', 1);return false;">{$LANG.UNSUBSCRIBE}</a>
                                    <a href="#" style="display: none" onclick="subscribe('{$movie.user_id}', 1);return false;">{$LANG.SUBSCRIBE}</a>
                                {/if}
                            {else}
                                {$LANG.SUBSCRIBED_TO_CHANNEL}
                            {/if}
                        {else}
                            <a href="#" rel="nofollow" onclick="core.alert('{$LANG.REGISTERED_ACCESS_SUBSCRIBE|escape:html}', '{$LANG.ATTENTION}');return false;">{$LANG.SUBSCRIBE}</a>
                        {/if}
                    </strong><span id="count_subscribe"> &middot; {$movie.count_subscribe|spellcount:$LANG.SUBSCRIBER1:$LANG.SUBSCRIBER2:$LANG.SUBSCRIBER10}</span>
                </div>
            </div>
            <div class="clear"></div>

            <div style="text-align: center">
                <div style="display: inline-block; max-width: 100%">
                    {$movie.player_code}
                </div>
            </div>

            <div id="watch-views-info">
                <span class="watch-view-count" title="{$movie.hits|spellcount:$LANG.HITS1:$LANG.HITS2:$LANG.HITS10}">{$movie.hits}{if $cfg.ratings}<span> / </span><span id="movie_rating" title="{$LANG.SUMM_RATING}">{$movie.ratings.rating}</span>{/if}</span>
                {if $cfg.ratings}
                    <div class="watch-sparkbars">
                        <div style="width: {$movie.ratings.like_percent}%" class="watch-sparkbar-likes" title="{$LANG.LIKE} {$movie.ratings.like|spellcount:$LANG.USER1:$LANG.USER10:$LANG.USER10}"></div>
                        <div style="width: {$movie.ratings.unlike_percent}%" class="watch-sparkbar-dislikes" title="{$LANG.NOT_LIKE} {$movie.ratings.unlike|spellcount:$LANG.USER1:$LANG.USER10:$LANG.USER10}"></div>
                    </div>
                    <div>
                        {if $movie.ratings.like && $movie.ratings.unlike}
                            {$LANG.LIKED}: {$movie.ratings.like}, {$LANG.DO_NOT} {$LANG.LIKED}: {$movie.ratings.unlike}
                        {elseif $movie.ratings.like && !$movie.ratings.unlike}
                            {$LANG.MOVIE1} {$LANG.EVERYBODY} ({$movie.ratings.like}) {$LANG.LIKE}!
                        {elseif !$movie.ratings.like && $movie.ratings.unlike}
                            {$LANG.MOVIE1} {$LANG.NOBODY} ({$movie.ratings.unlike}) {$LANG.DO_NOT} {$LANG.LIKE}!
                        {else}
                            {$LANG.MOVIE_NOT_VOTED}...
                        {/if}
                    </div>
                {/if}
            </div>
            <!--noindex-->
            <div id="watch-action">
                {if $cfg.ratings}
                    <div id="watch-sentiment-actions">
                        <div id="karma_mov">
                            {if $access.is_auth || $cfg.vote_for_guests}
                                {if !$movie.ratings.is_karmed && !$access.is_author}
                                    <a class="liked like" href="javascript:void(0);" onclick="plusKarma('{$movie.id}')" rel="nofollow">{$LANG.LIKE}</a>
                                    <a class="liked unlike" href="javascript:void(0);" title="{$LANG.NOT_LIKE}" onclick="minusKarma('{$movie.id}')" rel="nofollow">&nbsp;</a>
                                {elseif $movie.ratings.is_karmed == '-1'}
                                    <em class="liked unlike_sel">{$LANG.YOU_NOT_LIKE}!</em>
                                {elseif $movie.ratings.is_karmed == '1'}
                                    <em class="liked like_sel">{$LANG.YOU_LIKE}!</em>
                                {/if}
                            {else}
                                <a class="liked like" href="#" onclick="core.alert('{$LANG.AUTH_TO_VOTE_MOVIE|escape:html}', '{$LANG.ATTENTION}');return false;" rel="nofollow">{$LANG.LIKE}</a>
                                <a class="liked unlike" href="#" onclick="core.alert('{$LANG.AUTH_TO_VOTE_MOVIE|escape:html}', '{$LANG.ATTENTION}');return false;" rel="nofollow" title="{$LANG.NOT_LIKE}"></a>
                            {/if}
                        </div>
                    </div>
                {/if}
                <div id="watch-secondary-actions">
                    <span><button role="button" onclick="getInfo(this);return false;" class="action-panel-trigger" type="button"><span>{$LANG.ABOUT_VIDEO}</span></button></span>
                    <span><button role="button" onclick="getShareInfo(this);return false;" class="action-panel-trigger all" type="button"><span>{$LANG.SHARE}</span></button></span>
                    {if !$access.is_author && !$access.is_admin}
                        <span><button role="button" title="{$LANG.MOVIE_FLAG_AS} {$LANG.OR} {$LANG.MOVIE_PLAYBACKISSUE}" onclick="reportMovie(this);return false;" class="action-panel-trigger all" type="button"><span>{$LANG.MOVIE_FLAG_AS}</span></button></span>
                    {/if}
                    <span><button role="button" class="action-panel-trigger all" type="button" id="lightsoff"><span>{$LANG.LIGHT_OFF}</span></button></span>
                    {if $access.is_auth}
                        <span id="favorites">
                            <button role="button" class="action-panel-trigger all" id="favorites_add" type="button" onclick="favorites('{$movie.id}', 'add');return false;"><span class="icn-fav">{$LANG.MOVIE_ADD_FAV}</span></button>
                            <button role="button" class="action-panel-trigger all hid" id="favorites_delete" type="button" onclick="favorites('{$movie.id}', 'delete');return false;"><span class="icn-fav">{$LANG.MOVIE_DEL_FAV}</span></button>
                        </span>
                    {else}
                        <button role="button" class="action-panel-trigger all" id="favorites_add" type="button"  onclick="core.alert('{$LANG.AUTH_OR_REGISTERED|escape:html}', '{$LANG.ATTENTION}');return false;"><span class="icn-fav">{$LANG.MOVIE_ADD_FAV}</span></button>
                    {/if}

                </div>
            </div>
            <!--/noindex-->
            <div id="watch-action-panels">
                <div class="action-panel-content" id="action-panel-details">
                    <p class="video_params"><strong>{$LANG.CAT_MOVIE}:</strong> <span><a href="{$cat.cat_link}">{$cat.title}</a></span></p>
                    {if $rubric}
                        <p class="video_params"><strong>{$LANG.RUBRIC}:</strong> <span><a href="{$rubric.rubric_link}" title="{$rubric.r_group|escape:'html'}">{$rubric.title}</a></span></p>
                    {/if}
                    {if $formsdata}
                        {include file='com_video_movie_form_view.tpl'}
                    {/if}
                    {if $movie.tags}
                        <p class="video_params"><strong>{$LANG.TAGS}:</strong> <span>{$movie.tags}</span></p>
                    {/if}
                    {if $movie.city}
                        <p class="video_params"><strong>{$LANG.CITY}:</strong> <span><a class="ajaxlink" href="#" onclick="openMap(this, '{$movie.title|escape:'html'}');return false;" title="{$LANG.DISPLAY_CITY}">{$movie.city}</a></span></p>
                    {/if}
                    {if $movie.description}
                        <div class="photo_descr">
                            {$movie.description}
                        </div>
                    {/if}
                    <div id="movie_pubdate">
                        <span class="icn-date" title="{$LANG.MOVIES_DATE}">{if $movie.published}<time>{$movie.fpubdate}</time>{if $movie.frecorddate} | <span title="{$LANG.RECORD_DATE}">{$movie.frecorddate}</span>{/if}{else}<strong style="color:#F00" title="{$LANG.MOVIE_VISIBLE_ONLY_YOU}">{$LANG.ON_MODERATE}</strong> {if $access.is_admin}, <span id="published_yes"><a href="javascript:void(0)" onclick="publishMovie('{$movie.id}', '{$movie.fpubdate}');" style="color:#093">{$LANG.PUBLISH}</a></span>{/if}{/if}</span>
                    </div>
                </div>
                <div class="action-panel-content hid" id="action-panel-share">
                    <div id="share_text"></div>
                    {if $access.is_auth}
                        {if $movie.my_friends}
                            {add_js file="includes/jquery/jquery.form.js"}
                            <div class="share_code" id="recommend_form">
                                <form action="/video/recommend.html" method="post">
                                    <input type="hidden" name="id" value="{$movie.id}" />
                                    <strong>{$LANG.SELECT_FRIEND}</strong>
                                    <select name="to_id" id="to_id" style="width:130px;">
                                        {$movie.my_friends}
                                    </select> <input type="button" id="do_recommend" value="{$LANG.TO_RECOMMEND}" onclick="recommend();" />
                                </form>
                            </div>
                        {/if}
                    {/if}
                </div>
                <div class="action-panel-content hid" id="action-panel-report"></div>
            </div>

            <script type="text/javascript">
                {literal}
                $(document).ready(function () {
                    checkHeightDescr();
                });
                {/literal}
            </script>
    </div>
</div>
<div class="vv-side" id="movie_view_sidebar">
    {if $plugins}
        {foreach key=id item=plugin from=$plugins}
            <div id="plugin_{$plugin.name}">{$plugin.html}</div>
        {/foreach}
    {/if}
</div>
<div class="clear"></div>
</div>

<div>
    {if $is_comments}
        <div class="pre_comments"></div>
        {comments target='movie' target_id=$movie.id}
    {/if}
</div>

<script type="text/javascript">
{literal}
$(document).ready(function () {
    $("input, textarea").focus(function () {
        $(this).select();
    }).mouseup(function(e){
        e.preventDefault();
    });
    lightsoff();
    favorites('{/literal}{$movie.id}{literal}', 'load');
    $sidebar_td = $('#movie_view_sidebar');
    sidebar_html = $sidebar_td.children().length;
    if(!sidebar_html){
        $sidebar_td.remove();
        $('#player_container').css({width:$('.movie_view_content').width()});
    }
    setTimeout(function (){
        window.share_html = $('div.share_info').html();
    }, 300);
    $(".player_play").click(function() {
        autoLightsoff();
    });
});
function autoLightsoff(){
    idleTimer = null;
    idleState = false;
    idleWait  = 20000;
    $(document).bind('mousemove keydown scroll', function(){
        clearTimeout(idleTimer); // отменяем прежний временной отрезок
        if(idleState == true){
            $('#lightsoff-background')
            .fadeOut(function() {
                $('.lightsoff-background').remove();
                $('#player_code').css({'z-index' : 0 });
            });
        }
        idleState = false;
        idleTimer = setTimeout(function(){
            $('#player_code').css({ 'visibility' : 'visible', 'position' : 'relative', 'z-index' : 1999 });
            $('body').prepend('<div class="lightsoff-background" id="lightsoff-background" title="'+LANG_CLICK_LIGHT_ON+'"></div>');
            $('#lightsoff-background').css({ height: $(document).height() }).fadeIn();
            $('#lightsoff-background').show();
          idleState = true;
        }, idleWait);
    });
    $("body").trigger("mousemove");
}
function getInfo(obj){
    toggleButton(obj);
    $('.action-panel-content').hide();
    $('#action-panel-details').fadeIn();
}
function getShareInfo(obj){
    toggleButton(obj);
    $('div.share_info').remove();
    $('.action-panel-content').hide();
    $('#share_text').html(share_html);
    $('#action-panel-share').fadeIn();
}
function toggleButton(obj){
    $('.action-panel-trigger').addClass('all');
    $(obj).removeClass('all');
}
function recommend(){
    $('#do_recommend').prop('disabled', true).val('{/literal}{$LANG.LOADING}{literal}');
    var options = {
        success: doRecommend
    };
    $('#recommend_form form').ajaxSubmit(options);
}
function doRecommend(result, statusText, xhr, $form){
    if(statusText == 'success'){
        if(result.error == false){
            core.alert(result.info, '{/literal}{$LANG.ATTENTION}{literal}');
            $('#recommend_form').hide();
        }
    } else {
        core.alert(statusText, '{/literal}{$LANG.ATTENTION}{literal}');
    }
}
function reportMovie(obj){
    toggleButton(obj);
    $('.action-panel-content').hide();
    $('#action-panel-report').html('<div class="player_play_loading"></div>').show();
	$.post('/components/video/ajax/report.php', {id: {/literal}{$movie.id}{literal}}, function(data){
        $('#action-panel-report').html(data).fadeIn();
	});
}
{/literal}
</script>