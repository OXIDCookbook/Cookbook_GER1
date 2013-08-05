<?php

/**
 * This file is part of a OXID Cookbook project
 *
 * Version:    1.0
 * Author:     Joscha Krug <krug@marmalade.de>
 * Author URI: http://oxid-kochbuch.de
 */

class ocb_shortcheckout_payment extends ocb_shortcheckout_payment_parent
{
    public function render()
    {
        $oConf = oxRegistry::getConfig();
        oxRegistry::getUtils()->redirect( $oConf->getShopHomeURL() .'cl=user', false, 302 );
    }
}