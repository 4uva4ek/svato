<div class="float_bar">{$LANG.FOUND} {$total|spellcount:$LANG.RESULT1:$LANG.RESULT2:$LANG.RESULT10} | <a href="#" rel="nofollow" data-cat_id="0" class="ajaxlink" onclick="return displaySearchForm(this);" title="{$LANG.SEARCH_MOVIE}">{$LANG.NEW_SEARCH}</a></div>

<h1 class="con_heading">{$LANG.SEARCH_MOVIE}</h1>

{if $movies}

     <ul id="movie_view" class="sort_list">
      {foreach key=tid item=movie from=$movies}
          <li>
              <a title="{$LANG.VIEW_MOVIE} - {$movie.title|escape:'html'}" href="{$movie.movie_link}" class="thumb" {if $cfg.lightbox_on_cat}onclick="getMovieLightboxNoNav(this);return false;" id="{$movie.id}"{/if}><img src="/upload/video/thumbs/medium/{$movie.img}" {if $movie.is_viewed}class="watched_img"{/if} alt="{$movie.title|escape:'html'}" />{if $movie.is_adult}<span class="censored">18+</span>{/if}{if $movie.orig_duration}<span title="{$LANG.DURATION}" class="duration">{$movie.duration}</span>{/if}<span class="thumb_hover"></span>{if $movie.is_viewed}<span class="watched">{$LANG.IS_VIEWED}</span>{/if}</a>
          <div class="li_descr">
            <h5><a href="{$movie.movie_link}">{$movie.s_title}</a></h5>
            <div class="list_description">{$movie.description|strip_tags|truncate:300}</div>
            <p>
                <span class="icn-views">{$movie.hits}</span>
                <span class="icn-rating">{$movie.rating}</span>
                <span class="icn-comments">{$movie.comments}</span>
                <span class="icn-date">{$movie.fpubdate}</span>
                <span class="icn-cat"><a href="{$movie.cat_link}" title="{$movie.cat_title|escape:'html'}">{$movie.cat_title|truncate:18}</a></span>
                {if $movie.city}
                    <span class="icn-city"> <a class="ajaxlink" href="#" onclick="openMap(this, '{$movie.title|escape:'html'}');return false;" title="{$LANG.DISPLAY_CITY}">{$movie.city}</a></span>
                {/if}
            </p>
          </div>
          </li>
      {/foreach}
      <li class="cb"></li>
      </ul>
      {$pagebar}
{if $params.search_query}
    {add_js file='components/video/js/jquery.highlight.js'}
    <script type="text/javascript">
    var hl = {$params.search_query};
    {literal}
    $(document).ready(function(){
        $('.component').highlight(hl);
    });
    </script>
{/literal}{/if}
{else}
    <p class="not_found">{$LANG.SEARCH_NOT_FOUND}...</p>
{/if}