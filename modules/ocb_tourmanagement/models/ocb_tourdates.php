<?php

class ocb_tourdates extends oxI18n
{
    /**
     * Current class name
     *
     * @var string
     */
    protected $_sClassName = 'ocb_tourdates';
    
    protected $_sCoreTable = 'ocb_tourdates';
    
    /**
     * Class constructor, sets shop ID for article (oxconfig::getShopId()),
     * initiates parent constructor (parent::oxI18n()).
     *
     * @param array $aParams The array of names and values of oxArticle instance properties to be set on object instantiation
     *
     * @return null
     */
    public function __construct()
    {
        parent::__construct();
        $this->init();
    }
}