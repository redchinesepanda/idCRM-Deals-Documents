<?php

namespace idcrmdeals\includes\actions;

use idcrmdeals\idCRMDeals;

class idCRMDealsActionLanguage
{
	const TEXTDOMAIN = 'idcrm-deals-documents';

	public static function register()
	{
		$handler = new self();
		add_action( 'init', array($handler, 'idcrmContactsLoadTextdomain') );
	}

	public static function idcrmContactsLoadTextdomain()
	{
		foreach ( apply_filters( 'idcrm_textdomain', [ self::TEXTDOMAIN => idCRMDeals::IDCRMDEALS_PATH ] ) as $domain => $path ) {
			$locale = apply_filters( 'plugin_locale', get_locale(), $domain );

			load_textdomain( $domain, $path . '/languages/' . $domain . '-' . $locale . '.mo' );

			load_plugin_textdomain( $domain, false, $path . '/languages/' );
		}

	}
}

?>