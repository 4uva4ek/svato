


<div class="con_heading"><H3>{$text}</H3></div>

{if $posts}
	<div class="blog_entries">
		{foreach key=tid item=post from=$posts}
			<div class="blog_entry">
				<table width="100%" cellspacing="0" cellpadding="0" class="blog_records">
					<tr>
						<td width="" class="blog_entry_title_td">
							<div class="blog_entry_title">
                                {if $post.blog_url}
                                    <a href="{$post.blog_url}" style="color:gray">{$post.blog_title}</a> &rarr;
                                {/if}
                                <a href="{$post.url}">{$post.title}</a>
                            </div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="blog_entry_text">{$post.content_html}</div>
							<div class="blog_comments">
                                <a class="blog_user" href="{profile_url login=$post.login}">{$post.author}</a>
                                <span class="blog_entry_date">{if !$post.published}<span style="color:#CC0000">{$LANG.ON_MODERATE}</span>{else}{$post.fpubdate}{/if}</span>
                                <span class="post_karma">{$post.rating|rating}</span>
								{if ($post.comments_count > 0)}
									<a class="blog_comments_link" href="{$post.url}#c">{$post.comments_count|spellcount:$LANG.COMMENT:$LANG.COMMENT2:$LANG.COMMENT10}</a>
								{else}
									<a class="blog_comments_link" href="{$post.url}#c">{$LANG.NOT_COMMENTS}</a>
								{/if}
							{if $post.tagline != false}
								 <span class="tagline">{$post.tagline}</span>
							{/if}
							</div>
						</td>
					</tr>
				</table>
			</div>
		{/foreach}
	</div>

	{$pagination}
{else}
	<p style="clear:both">{$LANG.NOT_POSTS}</p>
{/if}

<div style="clear:both"></div>

