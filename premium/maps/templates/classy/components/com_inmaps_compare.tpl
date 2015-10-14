<h1 class="con_heading">{$LANG.MAPS_COMPARE}</h1>

{if $items}

    <table cellpadding="0" cellspacing="0" border="0" class="compare_table">
        
        <tr>
            <td>&nbsp;</td>
            {foreach key=num item=item from=$items}
                <td class="item_title">
                    <a href="/maps/{$item.seolink}.html">{$item.title}</a>
                </td>
            {/foreach}
        </tr>
        
        <tr>
            <td>&nbsp;</td>
            {foreach key=num item=item from=$items}
                <td class="item_image">
                    <a href="/maps/{$item.seolink}.html">
                        <img src="/images/photos/small/{$item.filename}" border="0" />
                    </a>
                </td>
            {/foreach}
        </tr>

        <tr>
            <td>&nbsp;</td>
            {foreach key=num item=item from=$items}
                <td>
                    <div class="compare_remove">
                        <a href="/maps/compare/remove/{$item.id}">{$LANG.MAPS_COMPARE_REMOVE}</a>
                    </div>
                </td>
            {/foreach}
        </tr>

        {foreach key=char_title item=cmp from=$cmp_chars}
            <tr class="char_row">
                <td class="char_title">{$char_title}:</td>
                {foreach key=item_id item=item from=$items}
                    <td class="char_value">{if $cmp[$item.id]}{$cmp[$item.id]}{else}&mdash;{/if}</td>
                {/foreach}
            </tr>
        {/foreach}
        
    </table>

    <script type="text/javascript">
        {literal}
            $('.compare_table tr.char_row:even').css('background-color', '#ECECEC');
        {/literal}
    </script>


{else}

    <p>{$LANG.MAPS_COMPARE_EMPTY}</p>
   
{/if}

<p>
    <input type="button" value="{$LANG.BACK}" onclick="window.location.href='{$last_url}';" />
</p>