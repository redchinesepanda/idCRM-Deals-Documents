<?php
/**
 * @link              https://idresult.ru
 * @since             1.0.0
 * @package           idcrm-deals-documents
 *
 * @wordpress-plugin
<<<<<<< HEAD
 * Plugin Name:       id:СRM Deals & Documents
=======
 * Plugin Name:       id:СRM Deals! & Documents!!!
>>>>>>> develope
 * Description:       id:CRM module for deals and documents.
 * Version:           1.0.0
 * Author:            id:Result
 * Author URI:        https://idresult.ru/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       idcrm-deals-documents
 * Domain Path:       /languages
 */

namespace idcrmdeals; 

if ( ! defined( 'WPINC' ) ) {
	die;
}

require_once('includes/idCRMContactsCompanyCpt.php'); 
// require_once('includes/idCRMContactsScheduleCpt.php');
// require_once('includes/idCRMContactsUserCpt.php');
// require_once('includes/idCRMContactsActivator.php');
// require_once('includes/idCRMContactsDeactivator.php');
// require_once('includes/idCRMContactsMain.php');

use \idcrm\includes\idCRMContactsMain;

define( 'IDCRM_DEALS_VERSION', '1.0.0' );
define( 'IDCRM_DEALS_PATH', plugin_dir_path( __FILE__ ) );
define( 'IDCRM_DEALS_URL', plugin_dir_url( __FILE__ ) );
define( 'IDCRM_DEALS_FILE', plugin_basename( __FILE__ ) );

class idCRMDeals
{
	const IDCRMDEALS_VERSION = \IDCRM_DEALS_VERSION;

	const IDCRMDEALS_PATH = \IDCRM_DEALS_PATH;

	const IDCRMDEALS_URL = \IDCRM_DEALS_URL;

	const IDCRMDEALS_FILE = \IDCRM_DEALS_FILE;

	public static function register()
	{
		register_activation_hook( __FILE__, array('\idcrm\includes\idCRMContactsActivator', 'activate') );

		register_activation_hook( __FILE__, array('\idcrm\includes\idCRMContactsDeactivator', 'deactivate') );

		idCRMDealsMain::register();
	}
}

idCRMDeals::register();

?>