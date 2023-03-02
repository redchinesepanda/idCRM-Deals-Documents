<?php

namespace idcrmdeals\includes;

/**
 * Fired during plugin activation.
 *
 * @since      1.0.0
 * @package    idcrm-deals
 * @subpackage idcrm-deals/includes
 * @author     id:Result <info@idresult.ru>
 */

class idCRMDealsActivator
{
	public static function activate()
	{
		self::create_pages();

		// require idCRM Contacts & Companies activated

		do_action( 'idcrmpro_pages' );
		
		flush_rewrite_rules();

		// wp_die( 'idCRMDealsActivator::activate end' );
	}

	public static function create_pages()
	{
		// require idCRM Contacts & Companies activated

		add_filter( 'idcrm_pages', function ( $pages ) {
			return [
				'idcrm-deals' => [
					'name' => 'idCRM Deals',

					'textdomain' => 'idcrm-deals'
				],
			];
		} );
	}
}

?>