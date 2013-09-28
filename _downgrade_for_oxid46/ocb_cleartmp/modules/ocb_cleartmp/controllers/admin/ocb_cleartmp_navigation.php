<?php

class ocb_cleartmp_navigation extends ocb_cleartmp_navigation_parent
{
    
    public function render()
    {
        $sTpl = parent::render();
        
        $this->_aViewData['prodmode'] = $this->getConfig()->isProductiveMode();
        
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
        $oConf = $this->getConfig();
        $sShopId = $oConf->getShopId();
        
        $blDevMode = 0;
        if(false != $oConf->getParameter('devmode'))
        {
            $blDevMode = $oConf->getParameter('devmode');
        }
        $oConf->saveShopConfVar('bool', 'blDevMode', $blDevMode, $sShopId, 'module:ocb_cleartmp');
        
        $this->deleteFiles();
        
        return;
    }
    
    public function isDevMode()
    {
        return $this->getConfig()->getShopConfVar('blDevMode',null,'module:ocb_cleartmp');
    }
    
    public function deleteFiles()
    {
        $oConf   = $this->getConfig();
        $option  = $oConf->getParameter('clearoption');
        $sTmpDir = realpath($oConf->getShopConfVar('sCompileDir'));
        
        switch($option)
        {
            case 'smarty':
                $aFiles = glob($sTmpDir.'/*.tpl.php');
                break;
            case 'language':
            	$oUtils = oxUtils::getInstance();
                $oUtils->resetLanguageCache();
                break;
            case 'database':
                $aFiles = glob($sTmpDir.'/*{_allfields_,i18n,_aLocal,allviews}*',GLOB_BRACE);
                break;
            case 'complete':
                $aFiles = glob($sTmpDir.'/*{.php,.txt}',GLOB_BRACE);
                $aFiles = array_merge($aFiles, glob($sTmpDir.'/*.tpl.php'));
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