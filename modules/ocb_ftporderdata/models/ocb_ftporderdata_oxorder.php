<?php

class ocb_ftporderdata_oxorder extends ocb_ftporderdata_oxorder_parent
{
    /**
     * Sets the order status and triggers the FTP export.
     * 
     * @param string $sStatus
     */
    protected function _setOrderStatus( $sStatus )
    {
        parent::_setOrderStatus( $sStatus );
        
        if( $sStatus == 'OK' && $this->oxorder__ocbexported->value != '1' )
        {
            $this->_exportOrderToRemote();
        }
        
    }
    
    /**
     * Triggers the file generation and then
     * exports the order to your remote server.
     */
    protected function _exportOrderToRemote()
    {
        $xml = $this->_generateOrderFile();
        
        $oFtp       = oxNew('ocb_ftpconnector');

        $exported   = $oFtp->putFileToServer( $xml );

        if( $exported )
        {
            $oDb = oxDb::getDb();
            $sQ = 'UPDATE oxorder SET ocbexported = 1 WHERE oxid = ' . $oDb->quote( $this->getId() );
            $oDb->execute( $sQ );

            $this->oxorder__ocbexported->setValue(1, oxField::T_RAW );
        }
    }
    
    /**
     * Generates the XML file on your server and returns its name.
     * @return string
     */
    protected function _generateOrderFile()
    {
        $sFileName      = date('YmdHi_') . $this->oxorder__oxordernr->value . '.xml';
        
        // For security reasons we store the data outside of the shoproot 
        // (should be outside of the webroot)!
        $sPath          = getShopBasePath() . '../export/order/' . $sFileName;
        
        if( !is_dir( dirname( $sPath ) ) )
        {
            mkdir( dirname( $sPath ), 0777, true );
        }
        
        $rFile  = fopen( $sPath, 'w' );
        
        $xml    = $this->_buildXml();
        
        fputs(  $rFile, $xml );
        
        fclose( $rFile  );
        
        return $sPath;
    }
    
    /**
     * Returns the XML content as you need id on your remote system
     * 
     * @return string
     */
    protected function _buildXml()
    {
        $xml = new SimpleXMLElement("<?xml version='1.0' standalone='yes'?><order/>");
        
        $xml->addChild('orderhead');
        
        $xml->orderhead->addChild('ordernumber', $this->oxorder__oxordernr->value);
        $xml->orderhead->addChild('orderdate', $this->oxorder__oxorderdate->value);
        $xml->orderhead->addChild('billname', $this->oxorder__oxbillfname->value . ' ' . $this->oxorder__oxbilllname->value);
        
        return $xml->asXML();
    }
}