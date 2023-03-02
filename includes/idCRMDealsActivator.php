<?php

namespace idcrmdeals\includes;

require_once ('idCRMDealsRoles.php');

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

		do_action( 'idcrmpro_pages' );
		
		flush_rewrite_rules();

		idCRMDealsRoles::activate();
	}

	public static function create_pages()
	{
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