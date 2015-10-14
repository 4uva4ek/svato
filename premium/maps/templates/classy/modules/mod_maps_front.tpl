{add_js file='templates/classy/js/jcarousellite_1.0.1.js'}

{if !$items}
    <div class="allProText">{$LANG.MAPS_FRONT_EMPTY}</div>
{/if}

{if $items}
    <div class="modFrontBlock">
        <a href="#" class="frontUp"></a>
        <div class="modFrontCar">
            <ul>
                {foreach key=tid item=item from=$items}
                <li>
                    <div class="frontImage">
                        <a href="/maps/{$item.seolink}.html" title="{$item.title|htmlspecialchars}">
                            <img src="/images/photos/medium/{$item.filename}" border="0"/>
                        </a>
                    </div>
                    <div class="outFrontLink">
                        <div class="frontLink">
                            <a class="allProLink" href="/maps/{$item.seolink}.html">{$item.title|htmlspecialchars}</a>
                        </div>
                    </div>
                </li>
                {/foreach}
            </ul>
        </div>
        <a href="#" class="frontDown"></a>
    </div>
{/if}



{literal}
    <script type='text/javascript' >
        $(function() {
            $(".modFrontBlock  .modFrontCar").jCarouselLite({
                btnNext: ".modFrontBlock .frontUp",
                btnPrev: ".modFrontBlock .frontDown",
                vertical: true,
                visible: 5,
                auto: 5000,
                speed: 500,
                circular: true
            });
        });
    </script>
{/literal}












{*{if !$items}*}
    {*<p>{$LANG.MAPS_FRONT_EMPTY}</p>*}
{*{/if}*}

{*{if $items}*}

    {*<table width="100%" cellpadding="0" cellspacing="0" border="0" class="mod_inmaps_front">*}
        {*{assign var="col" value="1"}*}
        {*{foreach key=tid item=item from=$items}*}
            {*{if $col==1} <tr> {/if}*}
				{*<td valign="top" width="{$colwidth}%">*}

                    {*<div class="item_wrap">*}

                        {*<table border="0" cellpadding="0" cellspacing="0" width="100%">*}
                            {*<tr>*}
                                {*<td>*}
                                    {*{if $cfg.show_title}*}
                                    {*<div class="title">*}
                                        {*<a href="/maps/{$item.seolink}.html">{$item.title|htmlspecialchars}</a>*}
                                    {*</div>*}
                                    {*{/if}*}
                                    {*<div class="image">*}
                                        {*<a href="/maps/{$item.seolink}.html" title="{$item.title|htmlspecialchars}">*}
                                            {*<img src="/images/photos/small/{$item.filename}" border="0"/>*}
                                        {*</a>*}
                                    {*</div>*}
                                {*</td>*}
                            {*</tr>*}
                        {*</table>*}
                    {*</div>*}

				{*</td>*}
				{*{if $col==$cfg.cols} </tr> {assign var="col" value="1"} {else} {math equation="x + 1" x=$col assign="col"} {/if}*}
			{*{/foreach}*}
			{*{if $col>1}*}
				{*<td colspan="{math equation="x - y + 1" x=$col y=$cfg.cols}">&nbsp;</td></tr>*}
			{*{/if}*}
    {*</table>*}

{*{/if}*}