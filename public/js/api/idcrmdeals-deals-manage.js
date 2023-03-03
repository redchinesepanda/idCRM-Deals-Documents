var idcrmdealsDealsManage = ( function($) {
    "use strict";

    return {
        list: function ()
        {
            idcrmdealsDealsApi.list();

            console.log( 'idcrmdealsDealsManage.list' );
        }
    }
} )( jQuery );