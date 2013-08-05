<?php

class ocb_ftpconnector
{
    protected $_hFtpHandle = null;
    
    protected function _getFtpConnection()
    {
        if( $this->_hFtpHandle === null )
        {
            $oConf = oxRegistry::getConfig();
            
            $sShopId = $oConf->getShopId();

            $host = $oConf->getShopConfVar('sFtpServer', $sShopId, 'module:ocb_ftporderdata');
            $user = $oConf->getShopConfVar('sFtpUser', $sShopId, 'module:ocb_ftporderdata');
            $pw   = $oConf->getShopConfVar('sFtpPassword', $sShopId, 'module:ocb_ftporderdata');
        
            $this->_hFtpHandle  = ftp_connect($host);
            
            $bConnected         = ftp_login($this->_hFtpHandle, $user, $pw);
            
            if($bConnected)
            {
                ftp_pasv($this->_hFtpHandle, true);
            }
            else
            {
                $message = date('Y-m-d H:i:s') . " ocb_ftpconnector \nNo Connection to FTP remote '" . $host . "'\n---------------------------------------------\n";
                
                $sLogFileName = 'EXCEPTION_LOG.txt';
                
                oxRegistry::getUtils()->writeToLog($message, $sLogFileName);
                
                $this->_hFtpHandle = null;
            }
        }
        
        return $this->_hFtpHandle;
    }
    
    public function putFileToServer( $sFile )
    {
        $handle = $this->_getFtpConnection();
        
        $oConf = oxRegistry::getConfig();
        
        $sPath   = $oConf->getShopConfVar('sFtpDirectory', $sShopId, 'module:ocb_ftporderdata');
        
        if ($handle !== null)
        {
            $target     = $sPath . basename( $sFile );
            $success    = @ftp_put($handle, $target, $sFile, FTP_BINARY);
        }
        else
        {
            $success = false;
        }

        return $success;
    }
    
    public function __destruct()
    {
        ftp_close($this->_hFtpHandle);
    }
    
}