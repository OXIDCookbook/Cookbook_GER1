<?php

class ocb_tourmanagement_details extends ocb_tourmanagement_details_parent
{
    public function getTourdates()
    {
        $tourdates = oxNew('ocb_tourdates_list');
        
        $productId = $this->getProduct()->oxarticles__oxid->value;
        
        $tourdates->getTourdatesForProduct($productId);
        
        return $tourdates;
    }
}