$(function() {

// internationalization
$.extend($.colorbox.settings, {
current: LANG_CBOX_IMAGE + " {current} " + LANG_CBOX_FROM + " {total}",
previous: LANG_CBOX_PREVIOUS,
next: LANG_CBOX_NEXT,
close: LANG_CBOX_CLOSE,
xhrError: LANG_CBOX_XHR_ERROR,
slideshowStop: LANG_CBOX_SLIDESHOWSTOP,
slideshowStart: LANG_CBOX_SLIDESHOWSTART,
imgError: LANG_CBOX_IMG_ERROR
});

//подхватываем от lightbox
$( '.lightbox-enabled' ).colorbox({ transition: "none"});

// ========================================================================== //
//Подключение colorbox вместо lightbox

// для лучших фото
$( '.photo_thumb_img' ).each( function( idx ){
	var regex = /small\//;
	var orig = $( this ).attr( "src" ).replace( regex, 'medium/' );
	var ss = $( this ).parent( 'a' );
	ss.attr( "rel", "gal" ).attr( "href", orig ).addClass( 'photobox' );
});

//статьи анонсы и основной текст
$( '.con_text img, .con_desc img' ).not('a img:first-child').wrap( function(){
	var ahref = $( '<a href="' + $( this ).attr( 'src' ) + '" />').colorbox({ transition: "none" });
	return ahref;
});
//добавление класса вручную в шаблоне
$( 'a.photobox' ).colorbox({ rel: 'gal', transition: "none", slideshow: true, width: "650px", height: "650px" });

//клубные фотоальбомы
$( '#view_photo' ).each( function(){
	var image = $( this );
	var link = $( this ).attr( 'src' );
    image.wrap( '<a class="club_photo" href="' + link + '" />' );
    $( '.club_photo').colorbox({ transition: "none" });
});

$( '.bd_image_small' ).each( function(){
	var regex = /(small\/|medium\/)/;
	var link = $( this ).attr( 'src' );
    $( this ).wrap( '<a class="orig" href="' + link.replace( regex, 'medium/' ) + '" />' );
    $( '.orig').colorbox({ transition: "none" });
});

//для вставленых через бб-редактор
$( '.bb_img img' ).not('a img:first-child').each( function(){
	var link = $( this ).attr( 'src' );
    $( this ).wrap( '<a class="bb_photo" href="' + link + '" />' );
    $( '.bb_photo').colorbox({ transition: "none" });
});

//для бб-редактора вставленные с уменьшением
$( '.forum_zoom a' ).each( function(){
    $( this ).colorbox({ transition: "none" });
});

});