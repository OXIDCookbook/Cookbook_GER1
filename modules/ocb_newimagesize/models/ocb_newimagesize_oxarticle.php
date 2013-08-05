<?php

/**
 * This file is part of a OXID Cookbook project
 *
 * Version:    1.0
 * Author:     Joscha Krug <krug@marmalade.de>
 * Author URI: http://www.marmalade.de
 */

class ocb_newimagesize_oxarticle extends ocb_newimagesize_oxarticle_parent
{

    public function getMyPictureUrl( $iIndex = 1 )
    {
        if ( $iIndex ) {
            $sImgName = false;
            if ( !$this->_isFieldEmpty( "oxarticles__oxpic".$iIndex ) ) {
                $sImgName = basename( $this->{"oxarticles__oxpic$iIndex"}->value );
            }
            
            $sSize = oxRegistry::getConfig()->getShopConfVar("sAdditionalImageSize",null,"module:ocb_newimagesize");
            
            $oPicHandler = oxRegistry::get('oxPictureHandler');
            
            $oPicHandler->checkProductPictureDir( $sSize, $iIndex );
            
            return $oPicHandler->getProductPicUrl( "product/{$iIndex}/", $sImgName, $sSize, 'oxpic'.$iIndex );
        }
    }
    
}