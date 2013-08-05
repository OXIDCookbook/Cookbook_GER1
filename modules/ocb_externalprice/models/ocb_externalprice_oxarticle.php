<?php

class ocb_externalprice_oxarticle extends ocb_externalprice_oxarticle_parent
{
    
    protected $externalDb = null;
    
    /**
     * Loads the price from a different database
     * @param double $dAmount
     * @return double Price for a single product
     */
    public function getBasePrice( $dAmount = 1 )
    {
        $sQ = "SELECT price FROM products WHERE EAN = '" . $this->oxarticles__oxean->value ."'";
        
        $oExternalDb = $this->getExternalDb();
        
        $oStatement = $oExternalDb->query($sQ);
        
        $oStatement->execute();
        
        $dPrice = (double)$oStatement->fetchColumn();
        return $dPrice;
    }
    
    /**
     * Returns the PDO object
     * @return PDO object
     */
    protected function getExternalDb()
    {
        if($this->externalDb === null)
        {
            $this->externalDb = oxRegistry::get('ocb_externaldb')->getExtDb();
        }
        return $this->externalDb;
    }
    
    /**
     * Returns the BasePrice.
     * Better you extend your external DB with that information
     * 
     * @return double
     */
    protected function _getVarMinPrice()
    {
        return $this->getBasePrice();
    }
}