<div class="maps_many_short">

    <div class="address">
        <span>{$items[0].address}</span>
    </div>

    <ul class="items_list">
        {foreach key=i item=item from=$items}
            <li>
                <a href="/maps/{$item.seolink}.html">{$item.title}</a>
            </li>
        {/foreach}
    </ul>

</div>
