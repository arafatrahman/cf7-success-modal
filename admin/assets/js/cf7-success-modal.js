jQuery( document ).ready( function( $ ) {
    $( document ).on( 'wpcf7mailsent', function( event ) {
        // Open success modal
        openSuccessModal();
    } );
    function openSuccessModal() {
        var modal = $('#cf7-success-modal');
        modal.show();
    }

    // Close success modal when user clicks on x
    $('.close').click( function() {
        $('#cf7-success-modal').hide();
    } );
} );
