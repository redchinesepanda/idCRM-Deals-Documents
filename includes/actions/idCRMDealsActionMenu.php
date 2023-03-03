<?php

namespace idcrmdeals\includes\actions;

use idcrmdeals\includes\actions\idCRMDealsActionLanguage;

class idCRMDealsActionMenu
{
	public static function register()
	{
		$handler = new self();

		add_action( 'admin_menu', [ $handler, 'idrcm_deal_submenu_page' ], 40 );
	}

	public function idrcm_deal_submenu_page()
	{
		add_submenu_page(
			'idcrm-contacts',

			__( 'Deals', idCRMDealsActionLanguage::TEXTDOMAIN ),

			__( 'Deals', idCRMDealsActionLanguage::TEXTDOMAIN ),

			'edit_user_contacts',

			'edit.php?post_type=idrcm_deal',

			false,

			100
		);
	}
}

?>