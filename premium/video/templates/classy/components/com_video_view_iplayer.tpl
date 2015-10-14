<div id="player_code">
    <div id="player_container" style="width: {$sizes.width}px; height: {$sizes.height}px;">
        {if $show_title}
            <div id="movie_embed_title"><a href="{$cfg.host}{$movie.movie_link}" target="_blank">{$movie.title}</a></div>
        {/if}
        {if $is_share_info}
            <div class="movie_id_view" title="{$LANG.MOVIE_ID}"># {$movie.id}</div>
        {/if}
        {if !$movie.ad_html}
        	<div class="player_play"></div>
        	<div class="poster_img" style="background: url(/upload/video/thumbs/medium/{$movie.img}) no-repeat center center; background-size: cover;"></div>
        {else}
            <div id="pseudo_ad_body">{$movie.ad_html}</div>
        {/if}
        {if $movie.orig_duration}
            <div class="duration"><span title="{$LANG.DURATION}">{$movie.duration}</span>{if $movie.size}<span title="{$LANG.SIZE}"> / {$movie.size}</span>{/if}</div>
        {/if}
    </div>
    {if $is_share_info}
    <div class="player_share" onclick="showShare();return false;">{$LANG.SHARE}</div>
    <div class="player_share_close hid" onclick="hideShare();return false;"></div>
    <div class="share_info hid">
        <div class="share_code">
            <p><strong>{$LANG.MOVIE_LINK}:</strong></p>
            <input type="text" readonly="readonly" onclick="$(this).select();" class="site_link" value="{$movie.link_movie|escape:'html'}"/>
        </div>
        {if $movie.movie_code}
            <div class="share_code">
                {if $cfg.embed_type == 'mixed'}
                    <div id="mixed_type_links"><a href="javascript:;" onclick="$('.share_code textarea').html(i_template);$('#mixed_type_links a').removeClass('selected');$(this).addClass('selected');" class="selected">iframe</a> | <a href="javascript:;" onclick="$('.share_code textarea').html(n_template);$('#mixed_type_links a').removeClass('selected');$(this).addClass('selected');">native</a></div>
                    <textarea id="i_template" readonly="readonly" class="hid">{$movie.movie_code|escape:'html'}</textarea>
                    <textarea id="n_template" readonly="readonly" class="hid">{$movie.movie_code_native|escape:'html'}</textarea>
                {/if}
                <p><strong>{$LANG.MOVIE_CODE}:</strong></p>
                <textarea readonly="readonly" id="view_embed_code" onclick="$(this).select();">{$movie.movie_code|escape:'html'}</textarea>
                <div class="share-size-options">
                    <label for="embed-layout-options">{$LANG.VIDEO_SIZE}:</label>
                    <select id="embed-layout-options">
                      <option value="default" data-width="420" data-height="315">420 × 315</option>
                      <option value="medium" data-width="480" data-height="360">480 × 360</option>
                      <option value="large" data-width="640" data-height="480">640 × 480</option>
                      <option value="hd720" data-width="960" data-height="720">960 × 720</option>
                      <option value="custom">{$LANG.OTHER_VIDEO_SIZE}</option>
                    </select>
                    <span id="share-embed-customize" class="hid">
                        <input type="text" maxlength="4" id="embed_w" value="420" onkeyup="makeCode()"> × <input type="text" maxlength="4" id="embed_h" value="315" onkeyup="makeCode()"> <a class="ajax_link" href="javascript:void(0);" onclick="$('#share-embed-customize').hide();$('#embed-layout-options').fadeIn();">{$LANG.CANCEL}</a>
                    </span>
                    {if !$movie.is_embed}
                        <span style="color: red;"> {$LANG.USER_IS_DISABLE_EMBED}</span>
                    {/if}
                </div>
            </div>
            <script type="text/javascript">
            {if $cfg.embed_type == 'mixed'}
                var i_template = $('#i_template').html();
                var n_template = $('#n_template').html()
            {/if}
            {literal}
                $(document).ready(function(){
                    makeCode();
                    {/literal}{if !$movie.is_embed}
                        $('#embed-layout-options, #share-embed-customize, #view_embed_code').prop('disabled', true);
                    {/if}{literal}
                });
                function makeCode(w,h){
                    var template = $(".share_code textarea").html();
                    if(!w || !h){
                        var w = $('#embed_w').val();
                        var h = $('#embed_h').val();
                    }
                    $(".share_code textarea").html(template.replace(/width="([0-9]+)/ig, 'width="'+w).replace(/height="([0-9]+)/ig, 'height="'+h));
                }
                $('#embed-layout-options').change(function () {
                    width  = $("#embed-layout-options option:selected").data('width');
                    height = $("#embed-layout-options option:selected").data('height');
                    if(!width || !height){
                        $("#embed-layout-options").hide();
                        $("#share-embed-customize").fadeIn();
                        $("#embed_w").focus();
                    } else {
                        makeCode(width, height);
                    }
                });
            </script>
            {/literal}
        {/if}
    </div>
    {/if}
    <script type="text/javascript">
    var movie_id = '{$movie.id}';
    {if $cfg.autoplay}
    {literal}
        $(document).ready(function(){
            playMovie(movie_id);
        });
    {/literal}
    {else}
    {literal}
        $(document).ready(function(){
            $('.player_play').bind( "click", function() {
                playMovie(movie_id);
            });
        });
    {/literal}
    {/if}
    </script>
</div>