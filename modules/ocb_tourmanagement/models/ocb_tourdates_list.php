<?php

class ocb_tourdates_list extends oxList
{
    
    /**
     * List Object class name
     *
     * @var string
     */
    protected $_sObjectsInListName = 'ocb_tourdates';
    
    public function getTourdatesForProduct( $productId )
    {
        $sTable = getViewName('ocb_tourdates');
                
        $sSelect  = "SELECT * FROM $sTable ";
        $sSelect .= "WHERE OCBTICKET = '" . $productId . "'";
        
        $this->selectString($sSelect);
    }
}