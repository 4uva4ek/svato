{if $total}
	<table class="contentlist" cellspacing="2" border="0" width="">
		<tr>
		<div class="float_bar">
		<a class="usr_article_add" href="/content/add.html">Додати статтю</a>
		</div>
		 </tr>
		{foreach key=id item=article from=$articles}
	
            <tr>
                <td width="20">
                    <img src="/images/markers/article.png" border="0" class="con_icon"/>
                </td>
                <td>
                    <a href="{$article.url}" class="con_titlelink">{$article.title}</a>
                </td>
            </tr>
		{/foreach}
	</table>
{else}
	<p>{$LANG.PU_USER_NO_ADD_ART}</p>
	<table class="contentlist" cellspacing="2" border="0" width="">
		<tr>
		<div class="float_bar">
		<a class="usr_article_add" href="/content/add.html">Додати статтю</a>
		</div>
		 </tr>

	</table>
{/if}