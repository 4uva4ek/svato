{if $root_cat.id != 1}
    <div class="float_bar">
        {if $is_auth}
            <a class="v_addlink" href="/video/{$root_cat.id}/add.html">{$LANG.MOVIE_ADD}</a>
        {/if}
        {if $is_can_add_rubric}
            <a class="v_addrubric" href="/video/add_rubric.html">{$LANG.RUBRIC_ADD}</a>
        {/if}
        <a class="v_table" href="javascript:void(0)" rel="nofollow" onclick="getViewCats('table', '{$root_cat.cat_link}')" title="{$LANG.VIEW_MODE}: {$LANG.VIEW_MODE_TABLE}">{if $cat_view_type=='table'}<strong>{$LANG.VIEW_MODE_TABLE}</strong>{else}{$LANG.VIEW_MODE_TABLE}{/if}</a>
        <a class="v_list" href="javascript:void(0)" rel="nofollow" onclick="getViewCats('list', '{$root_cat.cat_link}')" title="{$LANG.VIEW_MODE}: {$LANG.VIEW_MODE_LIST}">{if $cat_view_type=='list'}<strong>{$LANG.VIEW_MODE_LIST}</strong>{else}{$LANG.VIEW_MODE_LIST}{/if}</a>
    </div>
{/if}

{if $menuid!=1}
<h1 class="con_heading">{$root_cat.title} <a href="/rss/video/{if $root_cat.id==1}all{else}{$root_cat.id}{/if}/feed.rss" title="{$LANG.RSS_LENTA_DESCR}"><img alt="rss" src="/templates/{template}/images/icons/rss.png" /></a></h1>
{/if}

{if $root_cat.description}
    <div class="photo_descr">
    	{$root_cat.description}
    </div>
{/if}

{if $subcats}
    <ul class="video_cat_list">
        {foreach key=tid item=cat from=$subcats}
            <li class="video_cat_item" style="background:url(/images/photos/small/{$cat.icon}) no-repeat left top;">
                <div><a href="{$cat.cat_link}">{$cat.title}</a>{if $cfg.show_subcat_count} <sup>{$cat.movie_count}</sup>{/if}</div>
                {if $cat.subcats && $cfg.show_subcats}
                    <div class="subcats">
                        {foreach key=num item=subcat from=$cat.subcats}
                            <a href="{$subcat.cat_link}">{$subcat.title}</a>{if $num<sizeof($cat.subcats)-1}, {/if}
                        {/foreach}
                    </div>
                {/if}
            </li>
        {/foreach}
    </ul>
{/if}

{if $root_cat.id!=1}

  {if $root_cat.orderform}
      <ul class="tabs">
          <li {if $orderby=='hits'}class="act"{/if}>
              <a href="javascript:void(0)" rel="nofollow" onclick="orderMovieBy('hits', '{$root_cat.id}')">{$LANG.BY_HITS}</a>
          </li>
          <li {if $orderby=='rating'}class="act"{/if}>
              <a href="javascript:void(0)" rel="nofollow" onclick="orderMovieBy('rating', '{$root_cat.id}')">{$LANG.BY_RATING}</a>
          </li>
          <li {if $orderby=='pubdate'}class="act"{/if}>
              <a href="javascript:void(0)" rel="nofollow" onclick="orderMovieBy('pubdate', '{$root_cat.id}')">{$LANG.BY_DATE}</a>
          </li>
          <li {if $orderby=='ordering'}class="act"{/if}>
              <a href="javascript:void(0)" rel="nofollow" onclick="orderMovieBy('ordering', '{$root_cat.id}')">{$LANG.BY_ORDERING}</a>
          </li>
          <li>
              <a href="#" rel="nofollow" data-cat_id="{$root_cat.id}" onclick="return displaySearchForm(this);" title="{$LANG.SEARCH_MOVIE}">{$LANG.SEARCH}</a>
          </li>
      </ul>
      <div class="tabSearch">

          <div id="old_content">
              <a href="javascript:void(0)" rel="nofollow" onclick="orderMovieTo('all', '{$root_cat.id}')" {if !$period}class="sel">{$LANG.ALL_TIME} ({$total}){else}>{$LANG.ALL_TIME}{/if}</a> | <a href="javascript:void(0)" rel="nofollow" onclick="orderMovieTo('month', '{$root_cat.id}')" {if $period=='month'}class="sel">{$LANG.PER_MONTH} ({$total}){else}>{$LANG.PER_MONTH}{/if}</a> | <a href="javascript:void(0)" rel="nofollow" onclick="orderMovieTo('week', '{$root_cat.id}')" {if $period=='week'}class="sel">{$LANG.PER_WEEK} ({$total}){else}>{$LANG.PER_WEEK}{/if}</a> | <a href="javascript:void(0)" rel="nofollow" onclick="orderMovieTo('today', '{$root_cat.id}')" {if $period=='today'}class="sel">{$LANG.PER_TODAY} ({$total}){else}>{$LANG.PER_TODAY}{/if}</a>
          </div>

      </div>
  {/if}

{else}

    <div class="top_movie">
        <h3>{$LANG.MOVIES}</h3>
        {if $is_auth}
            <div class="right-nav">
                <a class="v_addlink" href="/video/add.html">{$LANG.MOVIE_ADD}</a>
            </div>
        {/if}
        <div class="tabs" id="tabs_recommended">
            <input id="menu_id" type="hidden" name="menu_id" value="{$menuid}" />
            <ul>
                <li class="{if $orderby=='hits'}act {/if}first" onclick="sortHome('hits');"><span class="firstcont"><a href="javascript:">{$LANG.TOP_BY_HITS}</a></span></li>
                <li {if $orderby=='rating'}class="act"{/if} onclick="sortHome('rating');"><span><a href="javascript:">{$LANG.TOP_BY_RATING}</a></span></li>
                <li class="{if $orderby=='pubdate'}act {/if}last" onclick="sortHome('pubdate');"><span class="lastcont"><a href="javascript:">{$LANG.MOVIE_LATEST}</a></span></li>
            </ul>
        </div>
    </div>

{/if}
{if $movies}
	{if $rubrics}
        {assign var="rubric_count" value=$rubrics|@count}
        {add_js file='components/video/js/owl-carousel/owl.carousel.min.js'}
        {add_css file='components/video/js/owl-carousel/owl.carousel.css'}
		<script type="text/javascript">
        {literal}
            $(document).ready(function() {
              $("#owl").owlCarousel({
                  autoPlay: 4000,
                  stopOnHover : true,
                  pagination: true,
                  paginationNumbers: true,
                  navigation: true,
                  navigationText : [LANG_PREVIOUS,LANG_NEXT],
                  items : 4
              });
              $('#owl .owl-controls').prepend('<h2>'+LANG_RUBRICS+'</h2>');
            });
		{/literal}
        </script>
        <div id="owl" class="owl">
            {foreach key=tid item=rubric from=$rubrics}
                <div class="item">
                    <a href="{$rubric.rubric_link}" {if $rubric_count < 3}class="a_img1_2"{elseif $rubric_count == 3}class="a_img3"{/if}>
                        <img src="{$rubric.image_url}" alt="{$rubric.title|escape:'html'}" />
                    </a>
                    <h3><a title="{$rubric.title|escape:'html'}" href="{$rubric.rubric_link}">{$rubric.title|truncate:20}</a></h3>
                    <div class="minfo">
                        <span class="icn-rating">{$rubric.rating}</span>
                        <span class="icn-movies" title="{$rubric.movie_count|spellcount:$LANG.MOVIE1:$LANG.MOVIE2:$LANG.MOVIE10}">{$rubric.movie_count}</span>
                    </div>
                    {if $rubric.strip_tags_text && $rubric_count < 4}
                        <div class="owl_descr{if $rubric_count == 3} owl_descr3{/if}">
                            {$rubric.strip_tags_text|truncate:$cfg.rub_num_cut}
                        </div>
                    {/if}
                </div>
            {/foreach}
        </div>
	{/if}
<div class="mod-v">
     <ul id="movie_view" class="{if $cat_view_type=='table' || $root_cat.id==1}{else}v-all {/if}v-list v-com">
      {foreach key=tid item=movie from=$movies}
          <li>
              <div class="v-block">
                  <table class="v-table">
                      <tr>
                          <td style="width: 120px">
                              <div class="v-img">
                                  <a href="{$movie.movie_link}" title="{$movie.title|escape:'html'}"><img src="/upload/video/thumbs/small/{$movie.img}" alt="{$movie.title|escape:'html'}" /></a>
                                  {if $movie.is_adult}<span class="censored">18+</span>{/if}
                                  {if $movie.orig_duration}<span class="duration">{$movie.duration}</span>{/if}
                              </div>
                          </td>
                          <td>
                              <div class="v-title">
                                  <h5><a href="{$movie.movie_link}">{$movie.s_title}</a></h5>
                                  <div class="list_description">{$movie.description|strip_tags|truncate:100}</div>
                              </div>
                          </td>
                      </tr>
                  </table>
                  <div class="v-info">
                      {if $cfg.showtype=='full_list'}
                          <span class="icn-date">{$movie.fpubdate}</span>
                      {/if}
                      <span class="icn-views">{$movie.hits}</span>
                      <span class="icn-rating">{$movie.rating}</span>
                      <span class="icn-comments">{$movie.comments}</span>
                      <span class="icn-cat"><a href="{$movie.cat_link}" title="{$movie.cat_title|escape:'html'}">{$movie.cat_title|truncate:18}</a></span>
                  </div>
              </div>
          </li>
      {/foreach}
      <li class="cb"></li>
      </ul>
    </div>
      {$pagebar}
{else}
    <p class="not_found">{$LANG.SEARCH_NOT_FOUND}...</p>
{/if}

{literal}
    <script>
        $(document).ready(function(){
            rn();
        });
        window.onresize = function(){
            rn();
        };
        function rn()
        {
            var wh = $('.video_cat_list').width();

            if(wh>900)
                $('.video_cat_list').addClass('lr');
            if(wh>=500&&wh<=900)
                $('.video_cat_list').addClass('cr');
            if(wh<500)
                $('.video_cat_list').addClass('sr');

            var wh = $('.video-search-block').width();

            if(wh<=900)
                $('.video-search-block').addClass('cr');
            else
                $('.video-search-block').removeClass('cr');
        }
    </script>
{/literal}