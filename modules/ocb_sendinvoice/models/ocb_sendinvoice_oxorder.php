<?php

/**
 * Version:    2.0
 * Author:     Jens Richter / Joscha Krug
 * Author URI: http://oxid-kochbuch.de
 */
class ocb_sendinvoice_oxorder extends ocb_sendinvoice_oxorder_parent
{
    /**
     * triggers generation and sends invoice pdf if order is paid
     * @param type $sStatus
     */
    public function _setOrderStatus( $sStatus )
    {
		parent::_setOrderStatus( $sStatus );
	
		$oDb = oxDb::getDb();
		
		$oDb->startTransaction();
		
		$sQ = "SELECT oxbillnr FROM oxorder WHERE oxid = " . $oDb->quote( $this->oxorder__oxid->value ) . " AND ocbbillgenerated = 0 FOR UPDATE";
		
		if ($this->oxorder__oxbillnr->value || ($oDb->getOne( $sQ, false, false) === false ) )
		{
			$oDb->commitTransaction();
			return;
		}            
		
		$this->oxorder__ocbbillgenerated = new oxField(1);
		$sSql = "UPDATE oxorder SET ocbbillgenerated=1 WHERE oxid = ". $oDb->quote( $this->oxorder__oxid->value );
		$oDb->Execute($sSql);
		
		$oDb->commitTransaction();
		
		$oConf = oxRegistry::getConfig();
		
		$iLang = $this->getOrderLanguage();

		if ( !$this->oxorder__oxbillnr->value )
		{
			$billnr = $this->getNextBillNum();
			$this->oxorder__oxbillnr = new oxField($billnr);
			$this->oxorder__oxbilldate = new oxField( date( 'd.m.Y', mktime( 0, 0, 0, date ( 'm' ), date ( 'd' ) + 7, date( 'Y' ) ) ) );
			$this->save();
		}
		
		$sFilename  = $this->oxorder__oxbillnr->value. ".pdf";
		$sFilename  = str_replace(" ", "_", $sFilename);
		
		$basePath   = $oConf->getConfigParam('sShopDir');
		$path       = $oConf->getShopConfVar('sFilePath', null, 'module:ocb_sendinvoice');
		$filePath   = $basePath.$path;
		
		//generate pdf
		$this->ocbGenPdf($filePath.$sFilename, $iLang, true);
    }

    /**
     * calls parent if called from backend or generates and saves invoice pdf to file
     * @param type $sFilename
     * @param type $iSelLang
     * @param type $outputToFile
     */
    public function ocbGenPdf($sFilename, $iSelLang = 0 , $outputToFile = false)
    {
        if (!$outputToFile)
        {
            parent::genPdf($sFilename, $iSelLang);
        }
        else
        {
            // setting pdf language
            $this->_iSelectedLang = $iSelLang;

            // initiating pdf engine
            $oPdf = oxNew( 'oxPDF' );
            $oPdf->setPrintHeader( false );
            $oPdf->open();

            // adding header
            $this->pdfHeader( $oPdf );
            $this->exportStandart( $oPdf );

            // adding footer
            $this->pdfFooter( $oPdf );

            // outputting file
            if (!file_exists(dirname($sFilename)))
            {
                mkdir(dirname($sFilename), 0755, true);
            }
            $oPdf->output( $sFilename, "F" );
        }
    }
}