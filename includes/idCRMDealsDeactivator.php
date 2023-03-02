<?php

namespace idcrmdeals\includes;

/**
 * Fired during plugin deactivation.
 *
 * @since      1.0.0
 * @package    idcrm-contacts
 * @subpackage idcrm-contacts/includes
 * @author     id:Result <info@idresult.ru>
 */

class idCRMDealsDeactivator
{
	public static function deactivate()
	{
		flush_rewrite_rules();
	}

}

?>