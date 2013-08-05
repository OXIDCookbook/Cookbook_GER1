<?php

class ocb_rssfeed_oxviewconfig extends ocb_rssfeed_oxviewconfig_parent
{
    
    /**
     * RSS Content
     *
     * @var array
     */
    protected $_aRssContent = array();
	
    /**
     * Returns RSS Content
     *
     * @return array
     */
    public function getRssContent()
    {
        $oConf       = oxRegistry::getConfig();
        $iMaxEntries = $oConf->getShopConfVar( 'iRssLimit',null,'module:ocb_rssfeed' );
        $sRssSource  = $this->getRssSource();
        $index = 0;

        try
        {
            $oRSS = @new SimpleXMLElement($sRssSource, null, true);
        }
        catch (Exception $e)
        {
            $oEx = oxNew('oxException');
            $sMsg = "\n---------\nFehler beim Laden des RSS-Feeds\n";
            $sMsg .= $e->getMessage() . "\n---------\n\n";
            oxRegistry::getUtils()->writeToLog( $sMsg , $oEx->getLogFileName() );
        }
        
        if(is_object($oRSS) )
        {
            foreach($oRSS->channel[0]->item as $oEntry)
            {
                if($index < $iMaxEntries) {
                    $this->_aRssContent[$index]['title'] = $oEntry->title;
                    $this->_aRssContent[$index]['link'] = $oEntry->link;
                    //$this->_aRssContent[$index]['description'] = $oEntry->description;
	                 // shorten the rss feed down to 150 characters, will also keep a picture if it starts with one
	                 $description = strip_tags($oEntry->description,"<img><br/><br>");
	                 $stop = ( strpos($description,">") !== false && strpos($description,">") < 150 ) ? strpos($description,">")+150 : 150;
                    $this->_aRssContent[$index]['description'] = substr($description,0,$stop)."&hellip;";
                    $index++;
                }
            }
        }
        return $this->_aRssContent;
    }
    
    public function getRssSource()
    {
        return oxRegistry::getConfig()->getShopConfVar('sRssSource',null,'module:ocb_rssfeed');
    }
    
}