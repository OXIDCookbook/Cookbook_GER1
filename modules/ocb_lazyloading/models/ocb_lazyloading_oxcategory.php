<?php

class ocb_lazyloading_oxcategory extends ocb_lazyloading_oxcategory_parent {
    
    public function __construct()
    {
        $this->_blUseLazyLoading = true;
        self::$_blDisableFieldCaching[get_class($this)] = true;
        parent::__construct();

    }
    
}