<?php

include('../../../bootstrap.php');

$ocbAutosuggest = oxNew('ocb_autosuggest');
$ocbAutosuggest->search();

class ocb_autosuggest
{
    
    public function search()
    {
       echo (json_encode($this->_getProductResult()));
    }
    
    /**
     * Selects the productdata and returns a minimal array
     * 
     * @return array
     */
    protected function _getProductResult()
    {
        $term = oxRegistry::getConfig()->getRequestParameter('term');
        
        $aResult = array();
            
        $oSearch = oxNew('oxSearch');
        
        $oArtList = $oSearch->getSearchArticles($term);
        
        if($oArtList != NULL)
        {
            foreach($oArtList as $oArticle)
            {
                $aResult[] = array(
                    'label'     => $oArticle->oxarticles__oxtitle->value,
                    'value'     => $oArticle->oxarticles__oxtitle->value,
                    'link'      => $oArticle->getMainLink(),
                    'image'     => $oArticle->getIconUrl(),
                    'category'  => 'Produkte'
                );
            }
        }
        
        return $aResult;
        
    }
}