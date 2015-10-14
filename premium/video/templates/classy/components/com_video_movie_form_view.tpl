{foreach key=tid item=form from=$formsdata}
    {if $form.field}
        <p class="video_params"><strong>{$form.title}:</strong> <span>{$form.field}</span></p>
    {/if}
{/foreach}