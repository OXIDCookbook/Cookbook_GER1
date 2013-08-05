<?php

class ocb_staticcache_oxshopcontrol extends ocb_staticcache_oxshopcontrol_parent
{
    
    protected function _process( $sClass, $sFunction, $aParams = null, $aViewsChain = null )
    {
        if(!isAdmin())
        {
            $oCache = oxNew('ocb_staticcache');
            $oCache->sClassName = $sClass;
            $oCache->sFunction = $sFunction;
            $oCache->processCache();
        }
        parent::_process( $sClass, $sFunction, $aParams = null, $aViewsChain = null );
    }
    
}
