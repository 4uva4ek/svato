{if $cfg.rub_view == 'table'}

    <ul class="last_rubrics">
      {foreach key=tid item=rubric from=$rubrics}
      {if !$group && $rubric.r_group != $last_group}
        <li class="rubric_groups"><h2><a href="{$rubric.group_url}">{$rubric.r_group}</a></h2></li>
      {/if}
          <li>
            <div class="more_info">
                <span class="icn-rating">{$rubric.rating}</span>
                <span class="icn-movies">{$rubric.movie_count|spellcount:$LANG.MOVIE1:$LANG.MOVIE2:$LANG.MOVIE10}</span>
            </div>
              <a class="cover_img" href="{$rubric.rubric_link}" style="background: url({$rubric.image_url}) no-repeat center center; background-size: cover;"></a>
            <h3>
                <a title="{$rubric.title|escape:'html'}" href="{$rubric.rubric_link}">{$rubric.title|truncate:20}</a>
            </h3>
          </li>
          {assign var="last_group" value=$rubric.r_group}
      {/foreach}
    </ul>
    <script type="text/javascript">
        {literal}
        $(document).ready(function(){
            $rubrics   = $('.last_rubrics');
            var width  = $rubrics.width();
            var margin = 5; // значение margin в .last_rubrics li
            var count  = width > 720 ? 4 : (width >= 580 ? 3 : 2);
            $rubrics.find('li').width((width - margin*count)/count);
        });
    {/literal}
    </script>
{elseif $cfg.rub_view == 'slider'}

    {assign var="rubric_count" value=$rubrics|@count}
    {add_js file='components/video/js/owl-carousel/owl.carousel.min.js'}
    {add_css file='components/video/js/owl-carousel/owl.carousel.css'}
    <script type="text/javascript">
        var module_id = '{$module_id}';
        var is_pag    = {$cfg.is_pag};
        var is_nav    = {$cfg.is_nav};
        var autoplay  = {$cfg.autoplay};
    {literal}
        $(document).ready(function() {
          $('#owl'+module_id).owlCarousel({
              autoPlay: autoplay,
              stopOnHover : true,
              pagination: is_pag,
              paginationNumbers: true,
              navigation: is_nav,
              navigationText : [LANG_PREVIOUS,LANG_NEXT],
              items : 3
          });
          $('#owl'+module_id+' .owl-controls').prepend('<h2>'+LANG_RUBRICS+'</h2>');
        });
    {/literal}
    </script>
    <div id="owl{$module_id}" class="owl">
        {foreach key=tid item=rubric from=$rubrics}
            <div class="item">
                <a href="{$rubric.rubric_link}" {if $rubric_count < 3}class="a_img1_2"{elseif $rubric_count < 5}class="a_img3"{/if}>
                    <img src="{$rubric.image_url}" alt="{$rubric.title|escape:'html'}" />
                </a>
                <h3><a title="{$rubric.title|escape:'html'}" href="{$rubric.rubric_link}">{$rubric.title|truncate:20}</a></h3>
                <div class="minfo">
                    <span class="icn-rating">{$rubric.rating}</span>
                    <span class="icn-movies" title="{$rubric.movie_count|spellcount:$LANG.MOVIE1:$LANG.MOVIE2:$LANG.MOVIE10}">{$rubric.movie_count}</span>
                </div>
                {if $rubric.strip_tags_text && $rubric_count < 5}
                    <div class="owl_descr{if $rubric_count == 3 || $rubric_count == 4} owl_descr3{/if}">
                        {$rubric.strip_tags_text|truncate:$component_cfg.rub_num_cut}
                    </div>
                {/if}
            </div>
        {/foreach}
    </div>

{else}

    {foreach key=tid item=rubric from=$rubrics}
    {if !$group && $rubric.r_group != $last_group}
    <h2 class="rubric_groups_title"><a href="{$rubric.group_url}">{$rubric.r_group}</a></h2>
    {/if}
        <a title="" href="{$rubric.rubric_link}"><img class="rubric_img" src="{$rubric.image_url}" alt="{$rubric.title|escape:'html'}"/></a>
        <h3 class="rubric_title">
            <a href="{$rubric.rubric_link}">{$rubric.title}</a>
        </h3>
        {if $rubric.strip_tags_text}
        <div class="rubric_descr">
            {$rubric.strip_tags_text|truncate:$component_cfg.rub_num_cut}
        </div>
        {/if}
          <p class="rubric_icons">
              <span class="icn-rating">{$rubric.rating}</span>
              <span class="icn-movies">{$rubric.movie_count|spellcount:$LANG.MOVIE1:$LANG.MOVIE2:$LANG.MOVIE10}</span>
          </p>
        <div class="rubric_cut"></div>
      {assign var="last_group" value=$rubric.r_group}
    {/foreach}

{/if}