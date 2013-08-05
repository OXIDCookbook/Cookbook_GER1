<?php

class ocb_cleartmp_navigation extends ocb_cleartmp_navigation_parent
{
    
    public function render()
    {
        $sTpl = parent::render();
        
        $this->_aViewData['prodmode'] = oxRegistry::getConfig()->isProductiveMode();
        
        if( 'header.tpl' == $sTpl )
        {
            return 'ocb_header.tpl';
        }
        else
        {
            return $sTpl;
        }
    }
    
    public function cleartmp()
    {
        $oConf = oxRegistry::getConfig();
        $sShopId = $oConf->getShopId();
        
        $blDevMode = 0;
        if(false != $oConf->getRequestParameter('devmode'))
        {
            $blDevMode = $oConf->getRequestParameter('devmode');
        }
        $oConf->saveShopConfVar('bool', 'blDevMode', $blDevMode, $sShopId, 'module:ocb_cleartmp');
        
        $this->deleteFiles();
        
        return;
    }
    
    public function isDevMode()
    {
        return oxRegistry::getConfig()->getShopConfVar('blDevMode',null,'module:ocb_cleartmp');
    }
    
    public function deleteFiles()
    {
        $oConf   = oxRegistry::getConfig();
        $option  = $oConf->getRequestParameter('clearoption');
        $sTmpDir = realpath($oConf->getShopConfVar('sCompileDir'));
        
        switch($option)
        {
            case 'smarty':
                $aFiles = glob($sTmpDir.'/smarty/*.php');
                break;
            case 'language':
                oxRegistry::get('oxUtils')->resetLanguageCache();
                break;
            case 'database':
                $aFiles = glob($sTmpDir.'/*{_allfields_,i18n,_aLocal,allviews}*',GLOB_BRACE);
                break;
            case 'complete':
                $aFiles = glob($sTmpDir.'/*{.php,.txt}',GLOB_BRACE);
                $aFiles = array_merge($aFiles, glob($sTmpDir.'/smarty/*.php'));
                break;
            case 'seo':
                $aFiles = glob($sTmpDir.'/*seo.txt');
                break;
            case 'none':
            default:
                return;
        }
        
        if(count($aFiles) > 0)
        {
            foreach($aFiles as $file) {
                @unlink($file);
            }
        }
    }
}