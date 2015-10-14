{if $cfg.karusel == 'imageflow'}
    {literal}
        <script type="text/javascript">
            $(document).ready(function(){
                var editors_choice = new ImageFlow();
                editors_choice.init({ ImageFlowID: 'editors_choice',
                                         slideshow: true,
                                         reflectPath: '/modules/mod_video_karusel/imageflow/',
                                         reflectionGET: '&bgc=ffffff&fade_start=20%',
                                         slideshowSpeed: 5000,
                                         aspectRatio: 2.333,
                                         circular: true,
                                         imagesM: 0.9,
                                         imageCursor: 'pointer',
                                         slideshowAutoplay: {/literal}{$cfg.is_autoplay}{literal},
                                         slider: false });
                        });
        </script>
    {/literal}

    <div id="editors_choice" class="imageflow">
    {foreach key=tid item=movie from=$items_mod}
        <img src="/upload/video/thumbs/medium/{$movie.img}" longdesc="{$movie.movie_link}" width="450" height="350" alt="{$movie.title|escape:'html'}" />
    {/foreach}
    </div>
{elseif $cfg.karusel == 'bkosborne'}
    {literal}
        <script type="text/javascript">
		  $(document).ready(function() {
			$("#carousel").featureCarousel({
				largeFeatureWidth:390,
				largeFeatureHeight:225,
				smallFeatureWidth:240,
				smallFeatureHeight:180,
				topPadding:0,
				sidePadding:0,
				autoPlay: {/literal}{if $cfg.is_autoplay}4000{else}0{/if}{literal},
				smallFeatureOffset:25
			});
		  });
        </script>
    {/literal}

    <div id="carousel-container">

      <div id="carousel">
        {foreach key=tid item=movie from=$items_mod}
        <div class="carousel-feature">
          <a href="{$movie.movie_link}" class="thumb"><img class="carousel-image" alt="{$movie.title|escape:'html'}" src="/upload/video/thumbs/medium/{$movie.img}">{if $movie.orig_duration}<span class="duration_mod">{$movie.duration}</span>{/if}<span class="thumb_hover_mod"></span></a>
          <div class="carousel-caption">
          {if $movie.description}
            <p>{$movie.description|strip_tags}</p>
		  {/if}
          </div>
          <h3>{$movie.title}</h3>
        </div>

        {/foreach}
      </div>

    </div>
{else}
<link rel="stylesheet" href="/templates/{template}/css/invideo.css" type="text/css" />
     <ul class="sort">
      {foreach key=tid item=movie from=$items_mod}
          <li>
          <a title="{$movie.title|escape:'html'}" href="{$movie.movie_link}" class="thumb"><img src="/upload/video/thumbs/small/{$movie.img}" alt="{$movie.title|escape:'html'}" />{if $movie.orig_duration}<span class="duration">{$movie.duration}</span>{/if}<span class="thumb_hover"></span></a>
            <h5><a href="{$movie.movie_link}">{$movie.s_title}</a></h5>
              <p>
                  <span class="icn-views">{$movie.hits}</span>
                  <span class="icn-rating">{$movie.rating}</span>
                  <span class="icn-comments">{$movie.comments}</span>
              </p>
          </li>
      {/foreach}
      <li class="cb"></li>
      </ul>
{/if}