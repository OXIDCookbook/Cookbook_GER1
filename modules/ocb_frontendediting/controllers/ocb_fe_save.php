<?php

include('./../../../bootstrap.php'); 

$ocbFeSave = oxNew('ocb_fe_save');
$ocbFeSave->save();

class ocb_fe_save
{
    /**
     * Assign table to object.
     * Needed for the oxartextends construct if you want to extend this.
     * 
     * @var array
     */
    protected $_aTableToObject = array(
        'oxarticles'    => 'oxarticle',
    );
    
    protected $_oEditObject = null;
    
    /**
     * Save the Object to the Database.
     * 
     * return string with success or error message.
     */
    public function save()
    {
        $this->checkUserRights();
        
        $oConf = oxRegistry::getConfig();
        
        $sTableField = $oConf->getParameter( 'tableField' );
        $aTableField = explode('__', $sTableField); 
        $table       = $aTableField[0];
        $oxId        = $oConf->getRequestParameter( 'oxId' );
        $content     = $oConf->getRequestParameter('content', true);
        
        $this->_oEditObject = oxNew($this->_aTableToObject[$table]);
        $this->_oEditObject->load($oxId);
        
        $aParam[$sTableField] = $content;
        
        if( $sTableField == 'oxarticles__oxlongdesc' )
        {
            $this->_oEditObject->setArticleLongDesc($content);
        }
        else
        {
            $this->_oEditObject->assign($aParam);
        }
        
        $success = $this->_oEditObject->save();
        
        
        if ( $success != false )
        {
            echo 'Inhalt gespeichert.';
        }
        else
        {
            echo '<h1>Fehler: Der Inhalt wurde nicht gespeichert.</h1>Folgende Daten wurden gesendet:<pre>';
            print_r($_REQUEST);
            echo '</pre>';
        }
    }
    
    /**
     * Check, wether the User is allowd to Edit oor not.
     * If not, die with a message.
     * 
     * return void
     */
    public function checkUserRights()
    {
        $oUser = oxRegistry::get('oxSuperCfg')->getUser();

        if($oUser->oxuser__oxrights->value != 'malladmin') {
            exit('<h1>Sie haben leider nicht das Recht den Artikel zu bearbeiten.</h1>');
        } 
    }
}