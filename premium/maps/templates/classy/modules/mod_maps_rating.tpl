{if $items}
    <div class="ratObjBlock">
        {foreach key=id item=item from=$items}
            <div class="ratObjItem" style="background: url('/components/maps/images/markers/{$item.marker}') left center no-repeat;">
                <a class="allProLink" href="/maps/{$item.seolink}.html">{$item.title}</a>
            </div>

        {/foreach}
    </div>
{else}
	<div class="allProText">Нет объектов для отображения</div>
{/if}


{*{if $items}*}
	{*<table class="contentlist" cellspacing="2" border="0" width="100%">*}
		{*{foreach key=id item=item from=$items}*}
            {*<tr>*}
					{*<td width="24">*}
                        {*<img src="/components/maps/images/markers/{$item.marker}" border="0" class="con_icon"/>*}
                    {*</td>*}
					{*<td width="40%">*}
						{*<div style="font-size:16px"><a href="/maps/{$item.seolink}.html" class="con_titlelink">{$item.title}</a></div>*}
					{*</td>*}
                    {*<td>*}
                        {*{if $item.address}*}
                            {*<div style="color:gray;font-size:10px">{$item.address}</div>*}
                        {*{/if}*}
                    {*</td>*}
                    {*<td width="20" align="center" style="font-size:10px">*}
                        {*{$item.rating}*}
                    {*</td>*}
                    {*<td width="90" align="right">*}
                        {*{$item.rating_img}*}
                    {*</td>*}
            {*</tr>*}
		{*{/foreach}*}
	{*</table>*}
{*{else}*}
	{*<p>Нет объектов для отображения</p>*}
{*{/if}*}
