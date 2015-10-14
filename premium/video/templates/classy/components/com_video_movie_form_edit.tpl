<div class="cat_form">
{foreach key=tid item=form from=$formsdata}
    <h4>{$form.title}:{if $form.mustbe} <span class="regstar" title="{$LANG.THIS_REQUIRED_FIELD}">*</span>{/if}</h4>
    <div class="input_val">
        <div class="input_val_value">
            {$form.field}
        </div>
    </div>
{/foreach}
</div>