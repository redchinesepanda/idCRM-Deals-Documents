<?php

namespace idcrmdeals\includes\api;

require_once('idCRMDealsApiDeals.php');

use idcrmdeals\idCRMDeals;

use idcrmdeals\includes\actions\idCRMDealsActionLanguage;

class idCRMDealsApiMain
{
    public static function register()
    {
        $handler = new self();

        add_action( 'wp_enqueue_scripts', [ $handler, 'register_script' ] );

        idCRMDealsApiDeals::register();
    }

    public function register_script()
    {
        wp_register_script( 'idcrmdeals_ajax_main', idCRMDeals::IDCRMDEALS_URL . 'public/js/api/idcrmdeals_ajax_main.js', [ 'jquery', 'toastr' ] );

        wp_localize_script( 'idcrmdeals_ajax_main', 'idcrmdeals_ajax_data', $this->get_data() );

        wp_localize_script( 'idcrmdeals_ajax_main', 'idcrmdeals_ajax_toastr', $this->get_toastr() );

        wp_enqueue_script( 'idcrmdeals_ajax_main' );
        
    }
    
    private function get_data()
    {
        return [
            'ajax_url' => admin_url( 'admin-ajax.php' )
        ];
    }

    private function get_toastr()
    {
        return [
            'strings' => [
                'idcrmdealsSomethingNew' => __( 'idcrmdealsSomethingNew', idCRMDealsActionLanguage::TEXTDOMAIN ),
            ]
        ];
    }
}

?>