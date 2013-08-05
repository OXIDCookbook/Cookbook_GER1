<?php

class ocb_exception_main extends oxAdminView{

    /**
     *
     * @var string
     */
    protected $_sThisTemplate = 'ocb_exception_main.tpl';


    
    public function getExceptionsFromLogfile()
    {
        
        $sContent = $this->_readExceptionFile();
        
        $aExceptions = explode("---------------------------------------------", $sContent);
        
        $aExceptionList = array();
        
        foreach(array_reverse($aExceptions) as $sException)
        {
            if('' != trim($sException))
            {
                $aExceptionList[] = $this->_prepareException($sException);
            }
        }
                
        return $aExceptionList;
    }
    
    /**
     * Deletes logfile
     * 
     * @return array
     */    
    public function deleteExceptionFile()
    {
        $sLogFileName = oxNew('oxException')->getLogFileName();
        $sLogFilePath = oxRegistry::getConfig()->getLogsDir() . $sLogFileName;
        if(unlink($sLogFilePath))
        {
            oxRegistry::get("oxUtilsView")->addErrorToDisplay( 'OCB_EXCEPTION_DELETE_OK' );
        }
        else
        {
            oxRegistry::get("oxUtilsView")->addErrorToDisplay( 'OCB_EXCEPTION_DELETE_ERROR' );
        }
    }
    
    /**
     * Reads the content from the Logfile
     * 
     * @return string
     */
    protected function _readExceptionFile()
    {
        $sLogFileName = oxNew('oxException')->getLogFileName();
        $sLogFilePath = oxRegistry::getConfig()->getLogsDir() . $sLogFileName;
        if(file_exists($sLogFilePath))
        {
            $sContent = file_get_contents($sLogFilePath);
        }
        return $sContent;
    }
    
    protected function _prepareException($sException)
    {
        preg_match("!(\d{4})-(\d{2})-(\d{2}) (\d{2}):(\d{2}):(\d{2})!", $sException, $datetime);
                
        preg_match("!(\[0\]).*!", $sException, $exceptionErrors);

        if(strpos($exceptionErrors[0],"Requested file not found")) {
            $exceptionType = 'FILENOTFOUND';
        }
        elseif(strpos($exceptionErrors[0],"EXCEPTION_SYSTEMCOMPONENT_CLASSNOTFOUND ")) {
            $exceptionType = 'CLASSNOTFOUND';
        }
        elseif(strpos($exceptionErrors[0],"ERROR_MESSAGE_SYSTEMCOMPONENT_FUNCTIONNOTFOUND")) {
            $exceptionType = 'FUNCTIONNOTFOUND';
        }
        elseif(strpos($exceptionErrors[0],"Template block file")) {
            $exceptionType = 'TPLBLOCK';
        }
        elseif(strpos($exceptionErrors[0],"Could not instantiate mail function")) {
            $exceptionType = 'NOMAIL';
        }
        elseif(strpos($exceptionErrors[0],"Function")) {
            $exceptionType = 'FUNCTIONNOTFOUND_TPL';
        }
        elseif(strpos($exceptionErrors[0],"EXCEPTION_CONNECTION_NODB")) {
            $exceptionType = 'NODB';
        }
        else {
            $exceptionType = 'UNDEFINED';
        }
        
        return array('type' => $exceptionType, 'msg' => $sException, 'datetime' => $datetime[0]);
    }
}