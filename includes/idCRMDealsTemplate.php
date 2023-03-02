<?php

namespace idcrmdeals\includes;

use idcrmdeals\idCRMDeals;

class idCRMDealsTemplate
{
	public static function register()
	{
		add_filter( 'idcrm_templates', function( $templates ) {
			return array_merge( $templates, [
				'templates/idcrm-deals.php' => 'idCRM Deals',
			] );
		});
		add_filter( 'idcrm_templates_path', function( $paths ) {
			return array_merge( $paths, [
				idCRMDeals::IDCRMDEALS_PATH => [
					'templates/idcrm-deals.php' => 'idCRM Deals',
				]
			] );
		});
	}
}

?>