{literal}
    <script>
    $(document).ready(function(){
        rn();
    });
    window.onresize = function(){
        rn();
    };
    function rn()
    {
        var wh = $('.video-search-block').width();

        if(wh<=900)
            $('.video-search-block').addClass('cr');
        else
            $('.video-search-block').removeClass('cr');

    }
</script>
{/literal}

<div class="video-search-block">
    <div class="v-search">
        <form class="search_form_module" name="search_form_module" method="get" action="/video/search" autocomplete="off">
            {if $cfg.auto_cat && !$cfg.is_custom_search}
                <input type="hidden" name="cat_id" value="{$params.cat_id}" />
                <input type="hidden" name="cat_link" value="{$current_seolink}" />
            {/if}
            <div class="go_search{if $cfg.is_show_custom_search} go_search_replace{/if}">
                <input type="submit" class="find-btn" value="{$LANG.FIND}">
            </div>
            <div class="input_search">
                <input type="text" id="vautocomplete" name="title" value="{$params.title|escape:html}" placeholder="{$LANG.SEARCH_BY_CAT_TEXT}...">
                {if $cfg.is_custom_search && !$cfg.is_show_custom_search}
                    <div><a class="ajax_link" href="#" onclick="$('.custom_search').toggleClass('hid');$(this).toggleClass('ajaxlink');$('.go_search').toggleClass('go_search_replace');return false;">{$LANG.CUSTOM_SEARCH}</a></div>
                {/if}
                <div id="sel-ajax"></div>
            </div>
            {if $cfg.is_custom_search}
                <div class="custom_search{if !$cfg.is_show_custom_search} hid{/if}">
                    <dl>
                        <dt>{$LANG.CAT_SITES}:</dt>
                        <dd>
                            <select name="cat_id" id="cat_id" tabindex="4" onchange="getRubric();">
                                <option value="">{$LANG.SELECT_CAT}</option>
                                {html_options options=$opt_cats selected=$params.cat_id}
                            </select>
                        </dd>
                        <dt>{$LANG.RUBRIC}:</dt>
                        <dd>
                            <select name="rubric_id" id="rubric_id" tabindex="5" disabled="disabled">
                                <option value="">{$LANG.SELECT_RUBRIC}</option>
                            </select>
                        </dd>
                    </dl>
                    <dl class="next">
                        <dt>{$LANG.VIDEO_GEO}:</dt>
                        <dd class="list">
                            {html_options name=countries options=$countries selected=$params.countries onchange="changeParent(this, 'regions')"}
                        </dd>
                        <dt class="list">
                            <select name="regions" onchange="changeParent(this, 'cities')" {if !$regions}disabled="disabled"{/if}>
                                {if !$regions}
                                    <option value="0">{$LANG.GEO_SELECT_REGION}</option>
                                {else}
                                    {html_options options=$regions selected=$params.regions}
                                {/if}
                            </select>
                        </dt>
                        <dt class="list">
                            <select name="cities" {if !$cities}disabled="disabled"{/if}>
                                {if !$cities}
                                    <option value="0">{$LANG.GEO_SELECT_CITY}</option>
                                {else}
                                    {html_options options=$cities selected=$params.cities}
                                {/if}
                            </select>
                        </dt>
                    </dl>
                    <dl class="next">
                        <dt>{$LANG.RECORDDATE}:</dt>
                        <dd>
                            <input name="start_date" class="date-pick" id="start-date" tabindex="11" type="text" value="{$params.start_date}" placeholder="{$LANG.FROM}" style="width: 70px !important;" /> - <input name="end_date" class="date-pick" id="end-date" tabindex="12" placeholder="{$LANG.UNTIL}" type="text" value="{$params.end_date}" style="width: 70px !important;" />
                        </dd>
                        <dt><label><input name="is_vib_red" type="checkbox" value="1" {if $params.is_vib_red}checked="checked"{/if}> {$LANG.EDITORS_CHOICE}</label></dt>
                        <dt><label><input name="safesearch" type="checkbox" value="1" {if $params.safesearch}checked="checked"{/if}> {$LANG.SAFESEARCH}</label></dt>
                    </dl>
                    <dl class="next">
                        <dt>{$LANG.ORDERS}:</dt>
                        <dd>
                            {html_options name=orderby options=$orderby selected=$params.orderby tabindex="4"}
                        </dd>
                        <dt>
                            {html_options name=orderto options=$orderto selected=$params.orderto tabindex="5"}
                        </dt>
                        <dt>
                            {html_options name=period options=$period selected=$params.period tabindex="6"}
                        </dt>
                    </dl>
                </div>
            {/if}
        </form>
        {if $cfg.alfabeta_ru || $cfg.alfabeta_en}
            <div class="video-sm">
                {if $cfg.alfabeta_ru}
                    <ul>
                        {foreach key=key item=ru from=$ru_alfabet}
                            <li><a href="/video/first_letter-{$ru|urlencode}" {if $params.first_letter == $ru}class="lsel"{/if}>{$ru}</a></li>
                        {/foreach}
                    </ul>
                {/if}
                {if $cfg.alfabeta_en}
                    <ul>
                        {foreach key=key item=en from=$en_alfabet}
                            <li><a href="/video/first_letter-{$en|urlencode}" {if $params.first_letter == $en}class="lsel"{/if}>{$en}</a></li>
                        {/foreach}
                    </ul>
                {/if}
            </div>
        {/if}
    </div>
    <div class="v-add-block">
        <a href="/video/add.html">+ Добавить видео</a>
    </div>
</div>





{if $cfg.is_autocomplete}

    {add_js file='includes/jquery/autocomplete/jquery.autocomplete.min.js'}

    <script type="text/javascript">
    var cat_link = '{$current_seolink}';
    var cat_id   = '{$params.cat_id}';
    {literal}
    $("#vautocomplete").autocomplete({
                    url: "/components/video/ajax/get_autocomplete.php",
                    remoteDataType: "json",
                    minChars: 2,
                    maxItemsToShow: 10,
                    selectFirst: false,
                    mustMatch: true,
                    filterResults: false,
                    delay: 800,
                    extraParams: {cat_link: cat_link, cat_id: cat_id},
                    showResult: function(value, data) {
                        return '<img src="'+data.img+'"/><h3>'+data.title+'</h3><p><span class="icn-views">'+data.hits+'</span><span class="icn-rating">'+data.rating+'</span><span class="icn-comments">'+data.comments_count+'</span><span class="icn-date">'+data.pubdate+'</span></p>';
                    },
                    onItemSelect: function(item) {
                        $( ".component" ).load(item.data.link);
                        window.history.pushState('', item.data.title, item.data.link);
                    }
                }
            );
    </script>{/literal}
{/if}

{if $cfg.is_custom_search}

<script type="text/javascript">
    var rubric_id = '{$params.rubric_id}';
{literal}
$(document).ready(function(){

    $( "#start-date" ).datepicker({
      defaultDate: "+1w",
      numberOfMonths: 2,
      dateFormat: 'yy-mm-dd',
      maxDate: 0,
      showButtonPanel: true,
      onClose: function( selectedDate ) {
        $( "#end-date" ).datepicker( "option", "minDate", selectedDate );
      }
    });
    $( "#end-date" ).datepicker({
      defaultDate: "+1w",
      numberOfMonths: 2,
      dateFormat: 'yy-mm-dd',
      maxDate: 0,
      showButtonPanel: true,
      onClose: function( selectedDate ) {
        $( "#start-date" ).datepicker( "option", "maxDate", selectedDate );
      }
    });
    getRubric();
});
function getRubric(){

	var cat_id      = $('#cat_id').val();
    var rubric_list = $('#rubric_id');

	if(cat_id != 0){

		$.post("/components/video/ajax/get_form.php", {value: cat_id, rubric_id: rubric_id}, function(data) {

			if(data != 1){

                if(data.rubric){

                    rubric_list.html('<option value="">'+LANG_SELECT_RUBRIC+'</option>');

                    for(var item_id in data.rubric){

                        rubric_list.append( '<option value="'+ item_id +'" '+ data.rubric[item_id].selected +'>' + data.rubric[item_id].title +'</option>' );

                    }

                    rubric_list.prop('disabled', false);

                } else {

                    rubric_list.prop('disabled', true);
                }

			} else {

                rubric_list.prop('disabled', true);

			}

		}, 'json');

	} else {

        rubric_list.prop('disabled', true);

	}
}
function changeParent (list, child_list_id) {

    var id = $(list).val();

    var child_list = $('select[name='+child_list_id+']');

    if (id == 0) {
        child_list.prop('disabled', true);
        if (child_list_id=='regions'){
            $('select[name=cities]').prop('disabled', true);
        }
        return false;
    }

    $.post('/geo/get', {type: child_list_id, parent_id: id}, function(result){

        if (result.error) { return false; }

        child_list.html('');

        for(var item_id in result.items){

            var item_name = result.items[item_id];

            child_list.append( '<option value="'+ item_id +'">' + item_name +'</option>' );

        }

        child_list.prop('disabled', false);;

        if (child_list_id != 'cities'){
            changeParent(child_list, 'cities');
        }

    }, 'json');

}
</script>
{/literal}{/if}