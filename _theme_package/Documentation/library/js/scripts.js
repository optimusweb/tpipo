$(document).ready(function(){

// LIGHTBOX
if ( $.fn.magnificPopup ) {

    $( 'a.lightbox' ).magnificPopup({
        type: 'image',
        gallery: {
            enabled: true
        }
    });

}

});