<h1 style="color:#900">{$LANG.MOVIE_NOTIFICATION}!</h1>
<form class="accept_form" style="display:none;" method="post" action="{$movie.movie_link}">
<input type="hidden" name="csrf_token" value="{csrf_token}" />
<input type="hidden" name="accept" value="{$code}" />
</form>
<p>{$LANG.MOVIE_NOTIFICATION_TEXT}</p>
<br />
<p><strong>{$LANG.MOVIE_IAM_18},</strong>  <noindex><a rel="nofollow" style="color:#060" href="javascript:;" onclick="$('form.accept_form').submit();">{$LANG.MOVIE_CONTINUE_VIEW}</a></noindex></p>
<br />
<p><strong>{$LANG.MOVIE_IAM_NO_18}, </strong> <a style="color:#900" href="{$cat.cat_link}">{$LANG.MOVIE_STOP_VIEW}</a></p>
{if $is_auth}
<br />
<p>{$LANG.MOVIE_NOTIFICATION_BDAY}</p>
{/if}