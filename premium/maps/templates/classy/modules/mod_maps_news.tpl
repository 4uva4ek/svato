{if $items}
    <div class="modEvBlock">
        {foreach key=n item=news from=$items}
            <div class="modEvItem">
                <div class="modEvItemImage">
                    <a href="/maps/{$news.obj_seolink}.html#tab_news" title="{$news.obj_title|escape:'html'}">
                        <img src="/images/photos/small/{$news.filename}" width="70" border="0" />
                    </a>
                </div>
                <div class="modEvElse">
                    {if $cfg.show_date || $cfg.show_city || $cfg.show_object}
                        <div class="evElseDate">
                            {if $cfg.show_date}{$news.pubdate}{/if}
                            {if $cfg.show_city}в городе {$news.obj_city}{/if}
                            {if $cfg.show_object}
                                <a href="/maps/{$news.obj_seolink}.html#tab_news" title="{$news.obj_title|escape:'html'}">({$news.obj_title|escape:'html'})</a>
                            {/if}
                        </div>
                    {/if}
                    <div class="evElseLink">
                        <a class="allProLink" href="/maps/news/{$news.id}.html">{$news.title}</a>
                    </div>
                </div>
            </div>
        {/foreach}
        <div class="workLinkBlock">
            <a class="workLink" href="/maps/news">Все новости</a>
        </div>
    </div>
{else}
    <div class="allProText">{$LANG.MAPS_NO_NEWS}</div>
{/if}


{*{if $items}*}
{*<div class="mod_maps_news">*}
{*{foreach key=n item=news from=$items}*}
{*<div class="item">*}
{*<div class="title"><a href="/maps/news/{$news.id}.html">{$news.title}</a></div>*}
{*{if $cfg.show_date || $cfg.show_city}*}
{*<div class="pubdate">*}
{*{if $cfg.show_date}{$news.pubdate}{/if}*}
{*{if $cfg.show_date && $cfg.show_city} - {/if}*}
{*{if $cfg.show_city}{$news.obj_city}{/if}*}
{*</div>*}
{*{/if}*}
{*{if $cfg.show_object}*}
{*<div class="object"><a href="/maps/{$news.obj_seolink}.html#tab_news" title="{$news.obj_title|escape:'html'}">{$news.obj_title|escape:'html'}</a></div>*}
{*{/if}*}
{*</div>*}
{*{/foreach}*}
{*</div>*}
{*<div style="text-align: right"><a href="/maps/news">Все новости</a></div>*}
{*{else}*}
{*<p>{$LANG.MAPS_NO_NEWS}</p>*}
{*{/if}*}



