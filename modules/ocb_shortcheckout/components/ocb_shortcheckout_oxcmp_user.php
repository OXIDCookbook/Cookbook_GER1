<?php

/**
 * This file is part of a OXID Cookbook project
 *
 * Version:    1.0
 * Author:     Joscha Krug <krug@marmalade.de>
 * Author URI: http://oxid-kochbuch.de
 */

class ocb_shortcheckout_oxcmp_user extends ocb_shortcheckout_oxcmp_user_parent
{
    
    public function changeUser()
    {
        $blRet = parent::changeUser();
        if($blRet !== 'payment')
        {
            return $blRet;
        }
        else
        {
            $this->_setShippingAndPayment();
            return 'order';
        }
    }
    
    protected function _setShippingAndPayment()
    {
        $oConf      = oxRegistry::getConfig();
        $oSession   = $this->getSession();
        $oBasket    = $oSession->getBasket();
        $sPaymentId = $oConf->getShopConfVar( 'sPaymentId',null,'module:ocb_shortcheckout' );
        $sShipSetId = $oConf->getShopConfVar( 'sShippingId',null,'module:ocb_shortcheckout' );
        
        $oSession->setVariable( 'paymentid', $sPaymentId );
        $oBasket->setPayment(null);
        $oBasket->setShipping($sShipSetId);
    }
}
