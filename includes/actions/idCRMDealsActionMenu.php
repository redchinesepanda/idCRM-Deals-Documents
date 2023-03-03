<?php

namespace idcrmdeals\includes\actions;

use idcrmdeals\includes\actions\idCRMDealsActionLanguage;

class idCRMDealsActionMenu
{
	public static function register()
	{
		$handler = new self();

		add_action( 'admin_menu', [ $handler, 'idrcm_deal_submenu_page' ], 40 );
		
		add_action( 'admin_menu', [ $handler, 'idrcm_deal_status_submenu_page' ], 45 );
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

		
		add_submenu_page(
			'idcrm-contacts',

			__( 'Add Deal', idCRMDealsActionLanguage::TEXTDOMAIN ),

			__( 'Add Deal', idCRMDealsActionLanguage::TEXTDOMAIN ),

			'edit_user_contacts',

			'post-new.php?post_type=idrcm_deal',

			false,

			105
		);
	}

	public function idrcm_deal_status_submenu_page()
	{
		add_submenu_page(
			'idcrm-contacts',

			__( 'Deal Statuses', idCRMDealsActionLanguage::TEXTDOMAIN ),

			__( 'Deal Statuses', idCRMDealsActionLanguage::TEXTDOMAIN ),

			'edit_user_contacts',

			'edit-tags.php?taxonomy=idrcm_deal_status',

			false,

			110
		);
	}
}

?>