<?php

namespace idcrmdeals\includes\actions;

require_once('idCRMDealsActionLanguage.php');

require_once('idCRMDealsActionMenu.php');

class idCRMDealsActionMain
{
    public static function register()
    {
        idCRMDealsActionLanguage::register();
        
        idCRMDealsActionMenu::register();
    }
}

?>