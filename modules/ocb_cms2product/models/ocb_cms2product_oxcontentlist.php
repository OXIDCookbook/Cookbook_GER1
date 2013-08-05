<?php

class ocb_cms2product_oxcontentlist extends ocb_cms2product_oxcontentlist_parent
{
    /**
     * Load the CMS-pages that are assigned to a product
     * 
     * @param string $productId
     */
    public function loadProductContents( $productId )
    {
        $sViewName = $this->getBaseObject()->getViewName();
        
        $sSql = "SELECT {$sViewName}.* 
                 FROM {$sViewName} 
                 JOIN ocbcms2product ON {$sViewName}.OXID = ocbcms2product.OCBCMSID 
                 WHERE ocbcms2product.OCBPRODUCTID='{$productId}' AND `oxactive` = '1' AND `oxshopid` = '$this->_sShopID'";
        
        $aData = oxDb::getDb( oxDb::FETCH_MODE_ASSOC )->getAll( $sSql );
        
        $this->assignArray( $aData );
    }
}