<?php

namespace idcrmdeals\includes;

use idcrmdeals\includes\actions\idCRMDealsActionLanguage;

class idCRMDealsCpt
{
	public static function activate()
	{
		self::idrcm_deal_custom_post_type();

		self::idrcm_deal_custom_taxonomy();

		self::idrcm_deal_default_status_create();
	}

	public static function register()
	{
		$handler = new self();

		add_action( 'init', [ $handler, 'idrcm_deal_custom_post_type' ] );

		add_action( 'init', [ $handler, 'idrcm_deal_custom_taxonomy' ] );

		add_action( 'add_meta_boxes', [ $handler, 'idrcm_deal_metabox_add' ] );

		add_action( 'save_post', [ $handler, 'idrcm_deal_metabox_save' ], 10, 2 );
	}

	public static function idrcm_deal_custom_post_type()
	{
		$message['function'] = 'idrcm_deal_custom_post_type';

		if ( !post_type_exists( 'idrcm_deal' ) ) {
			$message['register_post_type'] = register_post_type(
				'idrcm_deal',
				[
					'label' => __( 'Deals', idCRMDealsActionLanguage::TEXTDOMAIN ),

					'public' => true,
					
					'show_ui' => true,
	
					// 'show_in_menu' => false,
	
					'capability_type' => [ 'idrcm_deal', 'idrcm_deals' ],
	
					// 'capabilities' => [
					// 	'delete_posts' => 'delete_idrcm_deals',
	
					// 	'delete_published_posts' => 'delete_idrcm_deals',
	
					// 	'delete_private_posts' => 'delete_idrcm_deals',
	
					// 	'delete_others_posts' => 'delete_idrcm_deals',
	
					// 	'read_post' => 'read_idrcm_deal',
	
					// 	'edit_post' => 'edit_idrcm_deal',
	
					// 	'delete_post' => 'delete_idrcm_deal',
					// ],
	
					// 'map_meta_cap' => true,
	
					// 'supports' => [ 'title', 'editor', 'comments', 'revisions', 'author', 'excerpt', 'custom-fields', 'thumbnail' ],
	
					// 'has_archive' => true,
	
					// 'rewrite' => [
					// 	'slug' => 'idrcm-deals',
	
					// 	'feeds' => false,
	
					// 	'feed' => false,
					// ],
				]
			);
	
			flush_rewrite_rules();

			echo '<pre>' . print_r( $message, true ) . '</pre>';
		}
	}

	public static function idrcm_deal_custom_taxonomy()
	{
		$labels = [
			'name' => __( 'Deal Statuses', 'taxonomy general name', idCRMDealsActionLanguage::TEXTDOMAIN ),

			'singular_name' => __( 'Deal Status', 'taxonomy singular name', idCRMDealsActionLanguage::TEXTDOMAIN ),

			'search_items' => __( 'Search Deal Statuses', idCRMDealsActionLanguage::TEXTDOMAIN ),

			'all_items' => __( 'All Deal Statuses', idCRMDealsActionLanguage::TEXTDOMAIN ),

			'parent_item' => __( 'Parent Deal Status', idCRMDealsActionLanguage::TEXTDOMAIN ),

			'parent_item_colon' => __( 'Parent Deal Status:', idCRMDealsActionLanguage::TEXTDOMAIN ),

			'edit_item' => __( 'Edit Deal Status', idCRMDealsActionLanguage::TEXTDOMAIN ),

			'update_item' => __( 'Update Deal Status', idCRMDealsActionLanguage::TEXTDOMAIN ),

			'add_new_item' => __( 'Add New Deal Status', idCRMDealsActionLanguage::TEXTDOMAIN ),

			'new_item_name' => __( 'New Deal Status Name', idCRMDealsActionLanguage::TEXTDOMAIN ),

			'menu_name' => __( 'Deal Statuses', idCRMDealsActionLanguage::TEXTDOMAIN ),
		];

		if ( !taxonomy_exists( 'idrcm_deal_status' ) ) {
			$args = [
				'hierarchical' => true,

				'show_ui' => true,

				'show_admin_column' => true,

				'query_var' => true,

				'rewrite' => [
					'slug'  => 'idrcm-deal/idrcm-deal-status',

					'feeds' => false,

					'feed'  => false,
				],

				'labels' => $labels,

				'sort' => true,

				'capabilities' => [
					'manage_terms' => 'edit_idrcm_deal_status',

					'edit_terms'   => 'edit_idrcm_deal_status',

					'delete_terms' => 'edit_idrcm_deal_status',

					'assign_terms' => 'edit_idrcm_deal_status',
				]
			];

			$taxonomy = register_taxonomy( 'idrcm_deal_status', 'idrcm_deal', $args );
		}
	}

	public function idrcm_deal_metabox_render( $post )
	{
		wp_nonce_field( 'idrcm_deal_fields', '_idrcm_deal' );

		$notes = get_post_meta( $post->ID, 'idrcm_deal_facebook', true );

		echo '<div class="idrcm_deal_information">
			<div class="first_block">
			<p>
				<label for="idcrm_company_notes">' . __( 'Notes', idCRMDealsActionLanguage::TEXTDOMAIN ) . '</label>
				<input type="text" id="idcrm_company_notes" name="idcrm_company_notes" value="' . $notes . '"></input>
			</p>
		</div>';
	}

	public function idrcm_deal_metabox_add()
	{
		add_meta_box(
			'idcrm_deal_settings',

			__( 'Deal Info', idCRMDealsActionLanguage::TEXTDOMAIN ),

			[ $this, 'idrcm_deal_metabox_render' ],

			'idcrm_deal',

			'normal',

			'high'
		);
	}

	public function idrcm_deal_metabox_save( $post_id )
	{
		if ( ! isset( $_POST['_idrcm_deal'] ) || ! wp_verify_nonce( $_POST['_idrcm_deal'], 'idrcm_deal_fields' ) ) {
			return $post_id;
		}

		if ( empty( $_POST['idcrm_company_notes'] ) ) {
			delete_post_meta( $post_id, 'idcrm_company_notes' );
		} else {
			update_post_meta( $post_id, 'idcrm_company_notes', sanitize_text_field( wp_unslash( $_POST['idcrm_company_notes'] ) ) );
		}

		return $post_id;
	}
	
	public static function idrcm_deal_default_status_create()
	{
		if ( taxonomy_exists( 'idrcm_deal_status' ) ) {
			wp_suspend_cache_invalidation( true );

			$check = term_exists( 'idrcm-deal-important', 'idrcm_deal_status' );

			if ( empty( $check ) ) {
				wp_insert_term(
					esc_html__( 'Important', idCRMDealsActionLanguage::TEXTDOMAIN ),

					'idrcm_deal_status',

					[ 'slug' => 'idrcm-deal-important' ]
				);
			}

			wp_suspend_cache_invalidation( false );
		}
	}
}

?>