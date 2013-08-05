<?php

if(false)
{
    class ocb_cms2product_details_parent extends Details{}
}

class ocb_cms2product_details extends ocb_cms2product_details_parent
{
    /**
     * 
     * @return object oxContentList
     */
    public function getCmsEntries()
    {
        $oCmsList = oxNew('oxcontentlist');
        
        $oCmsList->loadProductContents( $this->getProduct()->oxarticles__oxid->value );
        
        return $oCmsList;
    }
}