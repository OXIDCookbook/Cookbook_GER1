<?php

class ocb_staticcache_oxoutput extends ocb_staticcache_oxoutput_parent
{
    
    public function process($sValue, $sClassName)
    {
        $sValue = parent::process($sValue, $sClassName);
        
        if(!isAdmin())
        {
            $oCache = oxNew('ocb_staticcache');
            $oCache->buildCache( $sValue );
        }
        
        return $sValue;
    }
    
}