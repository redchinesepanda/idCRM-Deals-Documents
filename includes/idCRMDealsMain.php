<?php

namespace idcrmdeals\includes;

require_once('idCRMDealsTemplate.php');

require_once('idCRMDealsCpt.php');

require_once('actions/idCRMDealsActionMain.php');

require_once('api/idCRMDealsApiMain.php');

use \idcrmdeals\includes\actions\idCRMDealsActionMain;

class idCRMDealsMain
{
    public static function register()
    {
        idCRMDealsTemplate::register();

        idCRMDealsCpt::register();

        idCRMDealsActionMain::register();

        idCRMDealsApiMain::register();
    }
}

?>