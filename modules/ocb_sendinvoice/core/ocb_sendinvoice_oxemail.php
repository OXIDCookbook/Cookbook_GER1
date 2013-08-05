<?php

/**
 * Version:    2.0
 * Author:     Jens Richter / Joscha Krug
 * Author URI: http://oxid-kochbuch.de
 */
class ocb_sendinvoice_oxemail extends ocb_sendinvoice_oxemail_parent
{

    /**
     * set global variables before calling parent
     * @param type $oOrder
     * @param type $sSubject
     * @return type
     */
    public function sendOrderEmailToUser($oOrder, $sSubject = null)
    {
        $sFilename = $oOrder->oxorder__oxbillnr->value. ".pdf";
        $sFilename = str_replace(" ", "_", $sFilename);

        $oConf      = oxRegistry::getConfig();
        $basePath   = $oConf->getConfigParam('sShopDir');
        $path       = $oConf->getShopConfVar('sFilePath', null, 'module:ocb_sendinvoice');

        $this->marmFileName = $basePath.$path.$sFilename;

        return parent::sendOrderEMailToUser($oOrder, $sSubject);
    }

    /**
     * add attachment if order email to user
     * @return type
     */
    public function send()
    {
        if (file_exists($this->marmFileName))
        {
            $this->addAttachment($this->marmFileName, basename($this->marmFileName));
        }
        
        return parent::send();
    }
}