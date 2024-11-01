jQuery( document ).ready( function ( e ) {
    e('.ticker').hover( function() {
        e(this).toggleClass('pause-scroll');
    })
});