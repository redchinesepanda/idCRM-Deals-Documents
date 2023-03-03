<?php

namespace idcrmdeals\includes\api;

use idcrmdeals\idCRMDeals;

use idcrmdeals\includes\actions\idCRMDealsActionLanguage;

class idCRMDealsApiDeals
{
    const ACTION = 'idcrmdeals_deals_list';

    const NONCE = 'idcrmdeals-deals-ajax';

    public function register_script()
    {
        wp_register_script( 'idcrmdeals_ajax_deals_manage', idCRMDeals::IDCRMDEALS_URL . 'public/js/api/idcrmdeals-deals-manage.js', [ 'jquery' ] );

        wp_enqueue_script( 'idcrmdeals_ajax_deals_manage' );
        
        wp_register_script('idcrmdeals_ajax_deals_api', idCRMDeals::IDCRMDEALS_URL . 'public/js/api/idcrmdeals-deals-api.js', [ 'jquery' ] );

        wp_localize_script( 'idcrmdeals_ajax_deals_api', 'idcrmdeals_deals_ajax_data', $this->get_ajax_data() );

        wp_enqueue_script( 'idcrmdeals_ajax_deals_api' );
    }

    private function get_ajax_data()
    {
        return [
            'action' => self::ACTION,

            'nonce' => wp_create_nonce( idCRMDealsApiDeals::NONCE )
        ];
    }

    public static function register()
    {
        $handler = new self();
        
        add_action('wp_ajax_' . self::ACTION, [ $handler, 'idcrmdeals_deals_list' ] );

        add_action('wp_ajax_nopriv_' . self::ACTION, [ $handler, 'idcrmdeals_deals_list' ] );

        // add_action('wp_enqueue_scripts', [ $handler, 'register_script' ] );
    }

    public static function idcrmdeals_deals_list_render () {
        echo 'idcrmdeals_deals_list_render';
        load_template(
            idCRMDeals::IDCRMDEALS_PATH . 'templates/template-parts/idcrm-deals-loop-deals.php',

            false,

            self::idcrmdeals_deals_list_get()
        );
    }
    
    public static function idcrmdeals_deals_list( $mode = 'direct' ) {
        $result['mode'] = $mode;

        if ( array_key_exists( 'mode', $_GET ) ) {
            if ( $_GET['mode'] == 'ajax' ) {
                $result['mode'] = $_GET['mode'];
            }
        }

        if ( $result['mode'] == 'ajax' ) {
            // check_ajax_referer( self::NONCE );
        }

        if ( $result['post_id'] != 0 ) {
            self::idcrmdeals_deals_list_render();
        }

        if ($mode == 'ajax') {
            die();
        }
    }

    public static function idcrmdeals_deals_list_get()
	{
		$args['data'] = [];

		$posts = get_posts( [
			'numberposts' => -1,

			'post_type' => 'idrcm_deal',
		] );

		if ( !empty( $posts ) ) {
			foreach ( $posts as $post ) {
                $args['data'][] = [
                    'post_url' => get_post_permalink( $post->ID ),

                    'post_title' => $post->post_title,

                    'post_content' => $post->post_content,

                    'post_thumbnail' => idCRMDeals::IDCRMDEALS_URL . 'templates/images/no-user.jpg',

                    'post_date' => date_i18n('d.m.Y H:i', $post->post_date ),

                    'post_icon' = 'note',
                ]
			}
		} else {
            $args['message'] = __( 'There are no Deals', idCRMDealsActionLanguage::TEXTDOMAIN );
		}

		return $args;
	}

    public function idcrmdeals_deals_add()
    {
        check_ajax_referer(self::NONCE);

        $result['code'] = 0;

        $result['status'] = 'success';

        $post_id = 0;

        if ( carray_key_exists( 'post_id', $_POST ) ) {
            $post_id = $_POST['post_id'];
        }

        $result['message'][] = '$post_id: ' . $post_id;

        $company_id = 0;

        if ( array_key_exists( 'company_id', $_POST ) ) {
            $company_id = $_POST['company_id'];
        }

        $result['message'][] = '$company_id: ' . $company_id;

        if ( $post_id != 0 && $company_id != 0 ) {
            if ( update_post_meta( $post_id, 'idcrm_contact_company', $company_id ) === false ) {
                $result['code'] = 1;

                $result['status'] = 'fail update post';
            }
        }

        echo json_encode($result);

        die();
    }
}

?>