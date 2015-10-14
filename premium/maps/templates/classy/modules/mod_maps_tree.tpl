<ul>

{foreach key=key item=item from=$items}

    {if $item.NSLevel < $last_level}
        {math equation="x - y" x=$last_level y=$item.NSLevel assign="tail"}
        {section name=foo start=0 loop=$tail step=1}
            </ul></li>
        {/section}
    {/if}
    {if $item.NSRight - $item.NSLeft == 1}
        <li>
                    <a href="/maps/{$item.seolink}">{$item.title}</a>
        </li>
    {else}
        <li>
            <a href="/maps/{$item.seolink}">{$item.title}</a>
        <ul>
    {/if}
    {assign var="last_level" value=$item.NSLevel}

{/foreach}
</ul>
