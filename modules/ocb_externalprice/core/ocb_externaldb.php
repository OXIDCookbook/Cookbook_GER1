<?php

class ocb_externaldb
{
    protected $_oPdo = null;
    
    public function getExtDb()
    {
        
        if($this->_oPdo === null)
        {
            $oConf = oxRegistry::getConfig();
            
            $sShopId = $oConf->getShopId();
            
            $host = $oConf->getShopConfVar('sDbHost', $sShopId, 'module:ocb_externalprice');
            $name = $oConf->getShopConfVar('sDbName', $sShopId, 'module:ocb_externalprice');
            $user = $oConf->getShopConfVar('sDbUser', $sShopId, 'module:ocb_externalprice');
            $pw   = $oConf->getShopConfVar('sDbPassword', $sShopId, 'module:ocb_externalprice');
            
            
            $sDb = sprintf(
                    'mysql:host=%s;dbname=%s;charset=utf8',
                    $host,
                    $name
            );
            $this->_oPdo = new PDO($sDb, $user, $pw);
        }
        
        return $this->_oPdo;
    }
}
