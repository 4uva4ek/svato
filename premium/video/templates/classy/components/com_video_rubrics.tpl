{strip}

    <div class="float_bar">
        {if $is_can_add_rubric}
            <a class="v_addrubric" href="/video/add_rubric.html">{$LANG.RUBRIC_ADD}</a>
        {/if}
    	{if $group}
    		<a class="v_rall" href="/video/rubrics/search/all" rel="nofollow">{$LANG.ALL_RUBRICS}</a>
        {/if}
    	<a class="v_table" href="javascript:void(0)" rel="nofollow" onclick="getViewRubrics('table')" title="{$LANG.VIEW_MODE}: {$LANG.VIEW_MODE_TABLE}">{if $rub_view=='table'}<strong>{$LANG.VIEW_MODE_TABLE}</strong>{else}{$LANG.VIEW_MODE_TABLE}{/if}</a>
        <a class="v_list" href="javascript:void(0)" rel="nofollow" onclick="getViewRubrics('list')" title="{$LANG.VIEW_MODE}: {$LANG.VIEW_MODE_LIST}">{if $rub_view=='list'}<strong>{$LANG.VIEW_MODE_LIST}</strong>{else}{$LANG.VIEW_MODE_LIST}{/if}</a>
    </div>

<h1 class="con_heading">{$LANG.RUBRICS}{if $group} :: {$group}{/if}</h1>

{if $rubrics}

    {assign var="last_group" value=''}

	{if $rub_view=='table'}
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
                    {$rubric.strip_tags_text|truncate:$cfg.rub_num_cut}
                </div>
                {/if}
                  <p class="rubric_icons">
                      <span class="icn-rating">{$rubric.rating}</span>
                      <span class="icn-comments">
                          {if $rubric.comments_count}{$rubric.comments_count|spellcount:$LANG.COMMENT1:$LANG.COMMENT2:$LANG.COMMENT10}{else}{$LANG.NO} {$LANG.COMMENT10}{/if}</span>
                      <span class="icn-movies">{$rubric.movie_count|spellcount:$LANG.MOVIE1:$LANG.MOVIE2:$LANG.MOVIE10}</span>
                  </p>
                <div class="rubric_cut"></div>
              {assign var="last_group" value=$rubric.r_group}
          {/foreach}

      {/if}
      {$pagebar}
{else}
<p class="not_found">{$LANG.MOVIE_NOT_FOUND_IN_RUBRIC}...</p>
{/if}
{/strip}