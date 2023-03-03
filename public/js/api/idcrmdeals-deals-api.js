var idcrmdealsDealsApi = ( function($) {
    "use strict";

    return {
        list: function () {
            $.ajax( {
                type: 'POST',

                url: idcrmdeals_ajax_data.ajax_url,

                cache: false,

                data: {
                    action: idcrmdeals_deals_ajax_data.action,

                    _ajax_nonce: idcrmdeals_deals_ajax_data.nonce,
                },

                success: function( data ) {
                    let result = '';

                    if( data ) {
                        try {
                            result = JSON.stringify( JSON.parse( data ) );
                        } catch( e ) {
                            result = data;

                            $( '#' + idcrmdeals_ajax_data.ajax_url ).html( data )
                        }
                    }

                    console.log( 'idcrmdealsDealsApi.list result: ' + result );

                    toastr.success( wp_ajax_toastr.strings.idcrmCommentSent );

                    $('#comment-textarea').val('');
                },

                error: function( xhr ) {
                    console.log('idcrmdealsDealsApi.list xhr.responseText: ' + xhr.responseText);

                    toastr.error( wp_ajax_toastr.strings.idcrmError );

                    return;
                }

                // complete: function() {
                //     console.log('idcrmdealsDealsApi.list complete callAjaxRefreshComments');

                //     // idcrmCommentApi.callAjaxRefreshComments(allData.postId);

                //     // $( '#send-comment-button' ).prop( "disabled", false );

                //     if ( $( "#respond #ajax-loader" ) ) {
                //         $( "#respond #ajax-loader" ).remove();
                //     }
                // }
            } );
        }
    }
})( jQuery );