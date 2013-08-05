<?php

include_once __DIR__.'/../libs/php-markdown/markdown.php';

class ocb_markdown extends oxAdminView
{
    protected $_sThisTemplate = 'ocb_markdown.tpl';
    
    protected $_oModule = null;
    
    public function render()
    {
	    $myConfig = oxRegistry::getConfig();
        if ( $myConfig->getRequestParameter("moduleId") ) {
            $sModuleId = $myConfig->getRequestParameter("moduleId");
        } else {
            $sModuleId = $this->getEditObjectId();
        }
        
        $oModule = oxNew('oxModule');
        if ( $sModuleId ) {
            if ( $oModule->load( $sModuleId ) ) {
                $this->_oModule = $oModule;
            } else {
                oxRegistry::get("oxUtilsView")->addErrorToDisplay( new oxException('EXCEPTION_MODULE_NOT_LOADED') );
            }
        }
        
        return parent::render();
    }
    
    public function getReadmeAsHtml()
    {
        if($this->getReadmeFileName())
        {
            $readmeRaw  = file_get_contents($this->getReadmeFileName());
            return Markdown($readmeRaw);
        }
        
        return false;
    }
    
    public function getReadmeFileName()
    {
        $absModUrl      =  oxRegistry::getConfig()->getModulesDir(true).$this->_oModule->getModulePath() . '/';
        
        $editlangAbbr   =  oxRegistry::getLang()->getLanguageAbbr( $this->_iEditLang );
        
        $mdFiles = glob($absModUrl . '*.md');
        
        $localFilename = strtolower($absModUrl.'readme_' . $editlangAbbr . '.md');
        $defaultFilename = strtolower($absModUrl.'readme.md');
        
        $defaultReadme = false;
        
        foreach($mdFiles as $file) {
            $lowername = strtolower($file);
            if ( $lowername == $localFilename) {
                return $file;
            }
            elseif($lowername == $defaultFilename)
            {
                $defaultReadme = $file;
            }
        }
        
        return $defaultReadme;
    }
    
}