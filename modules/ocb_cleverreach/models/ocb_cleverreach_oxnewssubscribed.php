<?php

/**
 * This file is part of a OXID Cookbook project
 *
 * Version:    1.0
 * Author:     Joscha Krug <krug@marmalade.de>
 * Author URI: http://oxid-kochbuch.de
 */

/**
 * OXID
 * OXUSERID
 * OXSAL
 * OXFNAME
 * OXLNAME
 * OXEMAIL
 * OXDBOPTIN
 * OXEMAILFAILED
 * OXSUBSCRIBED
 * OXUNSUBSCRIBED
 * OXTIMESTAMP
 */
class ocb_cleverreach_oxnewssubscribed extends ocb_cleverreach_oxnewssubscribed_parent
{
    
    protected $_oSoapClient = null;
    
    protected $_sCleverreachListId = null;
    
    protected $_sCleverreachApiKey = null;
    
    public function __construct()
    {
        $config     = oxRegistry::get('oxConfig');
        
        $this->_sCleverreachListId = $config->getConfigParam('sCleverreachListId');
        
        $this->_sCleverreachApiKey = $config->getConfigParam('sCleverreachApiKey');
                
        parent::__construct();

        //if you replace all methods you could remove this as well
        $this->init( 'oxnewssubscribed' );
    }
    
    public function getSoapClient()
    {
        if($this->_oSoapClient == null)
        {
            $config     = oxRegistry::get('oxConfig');
            $soapWsdl   = $config->getConfigParam('sCleverreachWsdlUrl');
            
            $this->_oSoapClient = new SoapClient($soapWsdl);
        }
        return $this->_oSoapClient;
    }
    
    /**
     * Getter to retrieve the newsletterstatus from Cleverreach
     * @return int
     */
    public function getOptInStatus()
    {
        $result = $this->getSoapClient()->receiverGetByEmail($this->_sCleverreachApiKey, $this->_sCleverreachListId, $this->oxnewssubscribed__oxemail->value, 3);
        var_dump($result);
        
        //return $this->oxnewssubscribed__oxdboptin->value;
    }
    
    /**
     * Set the users mailadress
     * @param string $sEmailAddress
     * @return boolean
     */
    public function loadFromEmail( $sEmailAddress )
    {
        $result = $this->getSoapClient()->receiverGetByEmail($this->_sCleverreachApiKey, $this->_sCleverreachListId, $sEmailAddress, 3);
        //$this->oxnewssubscribed__oxemail->setValue($value = null);
        if($result->status == 'ERROR')
        {
            return false;
        }
        var_dump($result);
        die();
        $this->oxnewssubscribed__oxid           = new oxField($result->data->id, oxField::T_RAW);
        $this->oxnewssubscribed__oxuserid       = new oxField(null, oxField::T_RAW);
        $this->oxnewssubscribed__oxsal          = new oxField(null, oxField::T_RAW);
        $this->oxnewssubscribed__oxfname        = new oxField($result->data->attributes[2]->variable, oxField::T_RAW);
        $this->oxnewssubscribed__oxlname        = new oxField($result->data->attributes[0]->variable, oxField::T_RAW);
        $this->oxnewssubscribed__oxemail        = new oxField($sEmailAddress, oxField::T_RAW);
        $this->oxnewssubscribed__oxdboptin      = new oxField(date( 'Y-m-d H:i:s' ), oxField::T_RAW);
        $this->oxnewssubscribed__oxemailfailed  = new oxField(date( 'Y-m-d H:i:s' ), oxField::T_RAW);
        $this->oxnewssubscribed__oxsubscribed   = new oxField(date( 'Y-m-d H:i:s' ), oxField::T_RAW);
        $this->oxnewssubscribed__oxunsubscribed = new oxField(date( 'Y-m-d H:i:s' ), oxField::T_RAW);
        $this->oxnewssubscribed__oxtimestamp    = new oxField(date( 'Y-m-d H:i:s' ), oxField::T_RAW);
        die();
        return true;
    }

    /**
     * Set the users mailadress
     * @param string $sEmailAddress
     * @return boolean
     */
    public function loadFromUserId( $sOxUserId )
    {
        $oUser = oxNew('oxuser');
        $oUser->load($sOxUserId);
        
        $result = $this->loadFromEmail($oUser->oxuser__oxusername->value);
        
        return $result;
    }
    
    public function setOptInStatus( $iStatus )
    {
        $oSoap = $this->getSoapClient();
        
        switch($iStatus)
        {
            //Unsubscribe
            case 0:
                break;
            //Set as subscribed
            case 1:
                break;
            //Subscribe and send DBOption Mail
            case 2:
                $aUserData = $this->getUserArray();
                $oSoap->receiverAdd($this->_sCleverreachApiKey, $this->_sCleverreachListId, $aUserData);
                break;
        }
    }
    
    
    public function getUserArray()
    {
        $user = array(
            "email" => $this->_sUserMail,
            "registered" => time(),
            "activated" => time(),
            "source" => "OXID eShop",
            "attributes" => array(
                0 => array("key" => "firstname", "value" => "Bruce"),
                1 => array("key" => "lastname", "value" => "Whayne"),
            )
        );
    }
}
