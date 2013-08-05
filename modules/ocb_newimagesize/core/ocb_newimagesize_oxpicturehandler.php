<?php

/**
 * This file is part of a OXID Cookbook project
 *
 * Version:    1.0
 * Author:     Joscha Krug <krug@marmalade.de>
 * Author URI: http://www.marmalade.de
 */

class ocb_newimagesize_oxpicturehandler extends ocb_newimagesize_oxpicturehandler_parent
{
    
    public function checkProductPictureDir( $sSize, $iIndex )
    {
        $aSize   = explode( '*', $sSize );
        $aSize[] = $this->getConfig()->getShopConfVar( 'sDefaultImageQuality',null,'module:ocb_newimagesize' );
        
        $sPath = $this->getConfig()->getPictureDir( false ) . 'generated/product/';
        $sPath .= $iIndex . '/' . $aSize[0] . '_' . $aSize[1] . '_' . $aSize[2];
        
        if(!is_dir($sPath))
        {
            mkdir($sPath, 0777);
        }
    }
    
}
