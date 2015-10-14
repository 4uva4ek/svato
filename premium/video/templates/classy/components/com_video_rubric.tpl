{if $rubric_cats || $rubric.r_group || $is_auth}
<div class="float_bar">
	{if $rubric_cats}
    	{foreach key=tid item=rubric_cat from=$rubric_cats}
        	<a href="{$rubric_cat.cat_link}" class="folder">{$rubric_cat.title}</a>
    	{/foreach}
    {/if}
    {if $rubric.r_group}<a href="{$rubric.group_url}" class="rubric_group">{$rubric.r_group}</a>{/if}
    {if $is_can_edit_rubric}
        <a class="v_editrubric" href="/video/edit_rubric{$rubric.id}.html">{$LANG.RUBRIC_EDIT}</a>
    {/if}
    {if $is_auth}
        <a class="v_addlink" href="/video{if $rubric_cats}/{$rubric_cat.cat_id}{/if}/add{$rubric.id}.html">{$LANG.MOVIE_ADD}</a>
    {/if}
</div>
{/if}
<h1 class="con_heading">{$rubric.title}</h1>
{if $rubric.image}
    {if $rubric.more_img_array}
        <div class="rubric_img" onclick="nextImg();" style="width: {$poster_size.0}px; height: {$poster_size.1}px; cursor: help;">
            <!--noindex-->
            <div class="more_info" style="display: block;">
                {$rubric.more_img_array|@count|spellcount:$LANG.POSTER1:$LANG.POSTER2:$LANG.POSTER10}, {$LANG.CLICK_TO_VIEW}
            </div>
            <script type="text/javascript">
                var more_img_array = ['{$rubric.img_path}',
                {foreach key=tid item=more_img from=$rubric.more_img_path}
                    '{$more_img}',
                {/foreach}
                    ];
                var current = 1;
                var count   = more_img_array.length-1;
                {literal}
                function nextImg(){
                    var new_img = new Image();
                    new_img_src = more_img_array[current];
                    new_img.src = new_img_src;
                    $('#more_img').animate({
                        opacity: 0.0
                    }, 350, function(){
                        $('#more_img').attr('src', new_img_src);
                    });
                    new_img.onload = function(){
                            $('#more_img').animate({
                                opacity: 1.0
                            }, 350);
                        };
                    if (current == count) {
                        current = 0;
                    } else {
                        current += 1;
                    }
                }
                {/literal}
            </script>
            <!--/noindex-->
            <img id="more_img" src="{$rubric.img_path}" alt="{$rubric.title|escape:'html'}"/>
        </div>
    {else}
        <div class="rubric_img">
            <img id="more_img" src="{$rubric.img_path}" alt="{$rubric.title|escape:'html'}"/>
        </div>
    {/if}
{/if}

{if $rubric.is_rating}
	<div class="rubric_rating">{$karma_form}</div>
{/if}
{if $rubric.description}
<div class="rubric_descr">
    {$rubric.description}
</div>
{/if}
<div class="rubric_cut"></div>
{if $movies}
     <ul id="movie_view" class="sort">
      {foreach key=tid item=movie from=$movies}
          <li>
          <a title="{$LANG.VIEW_MOVIE} - {$movie.title|escape:'html'}" href="{$movie.movie_link}" class="thumb" {if $cfg.lightbox_on_cat}onclick="getMovieLightboxNoNav(this);return false;" id="{$movie.id}"{/if}><img src="/upload/video/thumbs/medium/{$movie.img}" {if $movie.is_viewed}class="watched_img"{/if} alt="{$movie.title|escape:'html'}" />{if $movie.is_adult}<span class="censored">18+</span>{/if}{if $movie.orig_duration}<span title="{$LANG.DURATION}" class="duration">{$movie.duration}</span>{/if}<span class="thumb_hover"></span>{if $movie.is_viewed}<span class="watched">{$LANG.IS_VIEWED}</span>{/if}</a>
            <h5><a href="{$movie.movie_link}">{$movie.s_title}</a></h5>
              <p>
                  <span class="icn-views">{$movie.hits}</span>
                  <span class="icn-rating">{$movie.rating}</span>
                  <span class="icn-comments">{$movie.comments}</span>
                  {if $is_nested}
                  <span><a href="{$movie.cat_link}" onclick="viewChannelCat({$movie.cat_id}, '{$usr.login}'); return false;">{$movie.cat_title}</a></span>
                  {/if}
              </p>
          </li>
      {/foreach}
      <li class="cb"></li>
      </ul>
      {$pagebar}
<div class="rubric_cut"></div>
{if $rubric.is_comments}
    {comments target='video_rubric' target_id=$rubric.id}
{/if}
{else}
    <p class="not_found">{$LANG.MOVIE_NOT_FOUND_IN_RUBRIC}...</p>
{/if}