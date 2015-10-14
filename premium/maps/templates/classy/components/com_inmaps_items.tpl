{if $items}

    {if $cfg.ratings}
        {add_js file='components/maps/js/rating/jquery.MetaData.js'}
        {add_js file='components/maps/js/rating/jquery.rating.js'}
        {add_css file='components/maps/js/rating/jquery.rating.css'}
    {/if}

    <div class="maps_items_list" style="clear:both">
        <div class="mapsItem">
            {foreach key=num item=item from=$items}
                <div class="mapsItemRow">
                    <div class="mirLeft">
                        {if $cfg.show_thumb}
                            <div class="imageMapBlock">
                                <a href="/maps/{$item.seolink}.html">
                                    <img src="/images/photos/small/{$item.filename}" border="0" />
                                </a>
                            </div>
                            {if $cfg.ratings}
                                <div class="rating">
                                    <form action="/maps/rate" method="POST">
                                        <input type="hidden" name="item_id" value="{$item.id}" />
                                        {section name=rate start=1 loop=6 step=1}
                                            <input name="rate" type="radio" class="star" value="{$smarty.section.rate.index}" {if $item.rating>=$smarty.section.rate.index}checked="checked"{/if} {if !$is_user || $item.user_voted}disabled="disabled"{/if} />
                                        {/section}
                                    </form>
                                    {if $item.rating}
                                        <span class="ratSpan">{$item.rating}</span>
                                    {/if}
                                </div>
                            {/if}
                        {/if}
                    </div>
                    <div class="mirRight">
                        <div class="details">
                            <div class="mapsTitle">
                                <a class="allProLink" href="/maps/{$item.seolink}.html">{$item.title}</a>
                                {if $cfg.show_vendors && $item.vendor}/ <a href="/maps/vendors/{$item.vendor_id}" class="vendor">{$item.vendor}</a>{/if}
                                {if $cfg.show_compare || $item.can_edit}
                                    <div class="floatBar floatBarSm">
                                        <div class="btn-group">
                                            <button class="btn btn-default btn-xs dropdown-toggle" type="button" data-toggle="dropdown">
                                                Техническое меню <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                {if $cfg.show_compare}
                                                    {if !$item.is_in_compare}
                                                        <li class="inmapsCompare">
                                                            <a href="/maps/compare/{$item.id}">
                                                                {$LANG.MAPS_COMPARE_ADD}
                                                            </a>
                                                        </li>
                                                    {else}
                                                        <li class="inmapsCompare">
                                                            <a href="/maps/compare.html">
                                                                {$LANG.MAPS_COMPARE_ITEM_IN} {$LANG.MAPS_COMPARE_IN}
                                                            </a>
                                                        </li>
                                                    {/if}
                                                {/if}
                                                {if $item.can_edit}
                                                    <li class="inmapsEdit">
                                                        <a href="/maps/edit{$item.category_id}-{$item.id}.html">
                                                            {$LANG.MAPS_EDIT_OBJECT}
                                                        </a>
                                                    </li>
                                                {/if}
                                            </ul>
                                        </div>
                                    </div>
                                {/if}
                            </div>

                            <div class="addressBlock" id="addr_main{$item.id}">
                                <span>
                                    {if $cfg.mode=='world'}
                                        {$item.address}
                                    {else}
                                        {$item.map_address}
                                    {/if}
                                </span>
                                {if sizeof($item.addresses) > 1}
                                    <a href="javascript:" class="evElseDate" onclick="{literal}${/literal}('#addr_main{$item.id}').hide();{literal}${/literal}('#addr_all{$item.id}').show();">все адреса</a>
                                {/if}
                            </div>

                            <div class="addresses" style="display:none" id="addr_all{$item.id}">
                                {foreach key=m item=address from=$item.addresses}
                                    <div class="addressBlock">
                                    <span>
                                        {if $cfg.mode=='world'}
                                            {$address.full}
                                        {else}
                                            {$address.short}
                                        {/if}
                                    </span>
                                    </div>
                                {/foreach}
                            </div>

                            {if $cfg.show_desc}
                                <div class="desc">{$item.shortdesc}</div>
                            {/if}

                            {if $cfg.comments}
                                <div class="evElseDate">
                                    <a href="/maps/{$item.seolink}.html#c">
                                        {$item.comments|spellcount:$LANG.COMMENT:$LANG.COMMENT2:$LANG.COMMENT10}
                                    </a>
                                </div>
                            {/if}

                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            {*<table cellpadding="0" cellspacing="0" border="0" class="maps_item">*}
                {*<tr>*}
                    {*{if $cfg.show_thumb}*}
                    {*<td valign="top" class="image_td">*}
                        {*<div class="image">*}
                            {*<a href="/maps/{$item.seolink}.html">*}
                                {*<img src="/images/photos/small/{$item.filename}" border="0" />*}
                            {*</a>*}
                        {*</div>*}
                        {*{if $cfg.ratings}*}
                            {*<div class="rating">*}
                                {*<form action="/maps/rate" method="POST">*}
                                    {*<input type="hidden" name="item_id" value="{$item.id}" />*}
                                    {*{section name=rate start=1 loop=6 step=1}*}
                                        {*<input name="rate" type="radio" class="star" value="{$smarty.section.rate.index}" {if $item.rating>=$smarty.section.rate.index}checked="checked"{/if} {if !$is_user || $item.user_voted}disabled="disabled"{/if} />*}
                                    {*{/section}*}
                                {*</form>*}
                                {*{if $item.rating}*}
                                    {*<small>{$item.rating}</small>*}
                                {*{/if}*}
                            {*</div>*}
                        {*{/if}*}
                    {*</td>*}
                    {*{/if}*}
                    {*<td valign="top" class="details_td">*}
                        {*<div class="details">*}
                            {*<div class="title">*}
                                {*<a href="/maps/{$item.seolink}.html">{$item.title}</a>*}
                                {*{if $cfg.show_vendors && $item.vendor}/ <a href="/maps/vendors/{$item.vendor_id}" class="vendor">{$item.vendor}</a>{/if}*}
                                {*{if $cfg.show_compare}*}
                                    {*<span class="compare">*}
                                        {*{if !$item.is_in_compare}*}
                                        {*<a class="add" href="/maps/compare/{$item.id}">{$LANG.MAPS_COMPARE_ADD}</a>*}
                                        {*{else}*}
                                        {*{$LANG.MAPS_COMPARE_ITEM_IN} <a href="/maps/compare.html">{$LANG.MAPS_COMPARE_IN}</a>*}
                                        {*{/if}*}
                                    {*</span>*}
                                {*{/if}*}
                                {*{if $item.can_edit}*}
                                    {*<span class="edit">*}
                                        {*<a href="/maps/edit{$item.category_id}-{$item.id}.html">{$LANG.MAPS_EDIT_OBJECT}</a>*}
                                    {*</span>*}
                                {*{/if}*}
                            {*</div>*}

                            {*<div class="address" id="addr_main{$item.id}">*}
                                {*<span>*}
                                    {*{if $cfg.mode=='world'}*}
                                        {*{$item.address}*}
                                    {*{else}*}
                                        {*{$item.map_address}*}
                                    {*{/if}*}
                                {*</span>*}
                                {*{if sizeof($item.addresses) > 1}*}
                                    {*<a href="javascript:" class="ajaxlink" onclick="{literal}${/literal}('#addr_main{$item.id}').hide();{literal}${/literal}('#addr_all{$item.id}').show();">все адреса</a>*}
                                {*{/if}*}
                            {*</div>*}

                            {*<div class="addresses" style="display:none" id="addr_all{$item.id}">*}
                            {*{foreach key=m item=address from=$item.addresses}*}
                                {*<div class="address">*}
                                    {*<span>*}
                                        {*{if $cfg.mode=='world'}*}
                                            {*{$address.full}*}
                                        {*{else}*}
                                            {*{$address.short}*}
                                        {*{/if}*}
                                    {*</span>*}
                                {*</div>*}
                            {*{/foreach}*}
                            {*</div>*}

                            {*{if $cfg.show_desc}*}
                                {*<div class="desc">{$item.shortdesc}</div>*}
                            {*{/if}*}

                            {*{if $cfg.comments}*}
                                {*<div class="comments">*}
                                    {*<a href="/maps/{$item.seolink}.html#c">*}
                                        {*{$item.comments|spellcount:$LANG.COMMENT:$LANG.COMMENT2:$LANG.COMMENT10}*}
                                    {*</a>*}
                                {*</div>*}
                            {*{/if}*}

                        {*</div>*}
                    {*</td>*}
                {*</tr>*}
            {*</table>*}
            {/foreach}
        </div>
    </div>
    {if $pages>1}
        <div class="maps_pages">
            {$pagebar}
        </div>
    {/if}

    {if $cfg.ratings}
        <script type="text/javascript">
        {literal}
            $('.star').rating({
                callback: function(value, link){
                    this.form.submit();
                }
            });
        {/literal}
        </script>
    {/if}

{/if}