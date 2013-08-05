<?php

class ocb_tourdates_admin_main extends oxAdminView
{

    /**
     * Current class template name.
     * @var string
     */
    protected $_sThisTemplate = 'ocb_tourdates_admin_main.tpl';
    
        /**
     * Loads contents info, passes it to Smarty engine and
     * returns name of template file "content_main.tpl".
     *
     * @return string
     */
    public function render()
    {
        $myConfig = $this->getConfig();

        parent::render();

        $soxId = $this->_aViewData["oxid"] = $this->getEditObjectId();

        // Product
        $oProductList = oxNew( "oxArticleList" );
        $oProductList->selectString("SELECT * FROM oxarticles WHERE oxparentid = '' AND oxactive = 1 ORDER BY oxtitle");

        $oTourDate = oxNew( "ocb_tourdates" );
        if ( $soxId != "-1" && isset( $soxId)) {
            // load object
            $oTourDate->loadInLang( $this->_iEditLang, $soxId );

            $oOtherLang = $oTourDate->getAvailableInLangs();
            if (!isset($oOtherLang[$this->_iEditLang])) {
                // echo "language entry doesn't exist! using: ".key($oOtherLang);
                $oTourDate->loadInLang( key($oOtherLang), $soxId );
            }

            // remove already created languages
            $aLang = array_diff ( oxRegistry::getLang()->getLanguageNames(), $oOtherLang );
            if ( count( $aLang))
                $this->_aViewData["posslang"] = $aLang;
            foreach ( $oOtherLang as $id => $language) {
                $oLang= new stdClass();
                $oLang->sLangDesc = $language;
                $oLang->selected = ($id == $this->_iEditLang);
                $this->_aViewData["otherlang"][$id] =  clone $oLang;
            }

        }

        $this->_aViewData["edit"] = $oTourDate;
        $this->_aViewData["productlist"] = $oProductList;

        return $this->_sThisTemplate;
    }
    
    public function save()
    {
        parent::save();

        $soxId = $this->getEditObjectId();
        
        $aParams = oxConfig::getParameter( "editval");
        
        if ( $soxId == "-1")
        {
            $aParams['ocb_tourdates__oxid'] = null;
        }
        
        $oTourDate = oxNew('ocb_tourdates');
        $oTourDate->setLanguage(0);
        $oTourDate->assign($aParams);
        $oTourDate->setLanguage($this->_iEditLang);
        $oTourDate->save();

        // set oxid if inserted
        $this->setEditObjectId( $oTourDate->getId() );
    }
    
    
    /**
     * Saves content data to different language (eg. english).
     *
     * @return null
     */
    public function saveinnlang()
    {
        parent::save();

        $soxId = $this->getEditObjectId();
        
        $aParams = oxConfig::getParameter("editval");

        $oTourDate = oxNew( "ocb_tourdates" );

        if ( $soxId != "-1")
        {
            $oTourDate->loadInLang( $this->_iEditLang, $soxId );
        }
        else
        {
            $aParams['ocb_tourdates__oxid'] = null;
        }
        $oTourDate->setLanguage(0);
        $oTourDate->assign($aParams);

        // apply new language
        $oTourDate->setLanguage( oxConfig::getParameter( "new_lang" ) );
        $oTourDate->save();

        // set oxid if inserted
        $this->setEditObjectId( $oTourDate->getId() );
    }
    
}
