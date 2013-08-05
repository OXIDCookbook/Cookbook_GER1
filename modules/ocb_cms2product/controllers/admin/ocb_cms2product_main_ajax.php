<?php

class ocb_cms2product_main_ajax extends ajaxListComponent
{
    /**
     * Columns array
     * 
     * @var array 
     */
    protected $_aColumns = array( 'container1' => array(    // field , table,  visible, multilanguage, ident
                                        array( 'oxtitle',   'oxcontents', 1, 0, 0 ),
                                        array( 'oxloadid',  'oxcontents', 1, 0, 0 ),
                                        array( 'oxid',      'oxcontents', 0, 0, 1 )
                                        ),
                                    'container2' => array(
                                        array( 'oxtitle',   'oxcontents', 1, 0, 0 ),
                                        array( 'oxloadid',   'oxcontents', 1, 0, 0 ),
                                        array( 'oxid',      'oxcontents', 0, 0, 1 ),
                                        array( 'oxid',      'ocbcms2product', 0, 0, 1 ),
                                        )
                                );

    /**
     * Returns SQL query for data to fetch
     *
     * @return string
     */
    protected function _getQuery()
    {
        $myConfig = $this->getConfig();

        // looking for table/view
        $sContentsTable = $this->_getViewName( 'oxcontents' );
        $oDb = oxDb::getDb();
        $sContentId      = oxConfig::getParameter( 'oxid' );
        $sSyncContentId = oxConfig::getParameter( 'synchoxid' );

        // category selected or not ?
        if ( !$sContentId ) {
            $sQAdd  = " from $sContentsTable where 1 ";
        } else {
            $sQAdd  = " from $sContentsTable, ocbcms2product where $sContentsTable.oxid=ocbcms2product.ocbcmsid and ";
            $sQAdd .= " ocbcms2product.ocbproductid = ".$oDb->quote( $sContentId );
        }

        if ( $sSyncContentId && $sSyncContentId != $sContentId) {
            $sQAdd .= " and $sContentsTable.oxid not in ( select $sContentsTable.oxid from $sContentsTable, ocbcms2product where $sContentsTable.oxid=ocbcms2product.ocbcmsid and ";
            $sQAdd .= " ocbcms2product.ocbproductid = ".$oDb->quote( $sSyncContentId );
            if (!$myConfig->getConfigParam( 'blMallUsers' ) )
                $sQAdd .= " and $sContentsTable.oxshopid = '".$myConfig->getShopId()."' ";
            $sQAdd .= " ) ";
        }

        if ( !$myConfig->getConfigParam( 'blMallUsers' ) )
            $sQAdd .= " and $sContentsTable.oxshopid = '".$myConfig->getShopId()."' ";
        
        return $sQAdd;
    }

    /**
     * Removes CMS page from product
     *
     * @return null
     */
    public function removeCms()
    {
        $aRemoveCms = $this->_getActionIds( 'ocbcms2product.oxid' );

        if ( oxConfig::getParameter( 'all' ) ) {

            $sQ = $this->_addFilter( "delete ocbcms2product.* ".$this->_getQuery() );
            oxDb::getDb()->Execute( $sQ );

        } elseif ( $aRemoveCms && is_array( $aRemoveCms ) ) {
            $sQ = "delete from ocbcms2product where ocbcms2product.oxid in (" . implode( ", ", oxDb::getInstance()->quoteArray( $aRemoveCms ) ) . ") ";
            oxDb::getDb()->Execute( $sQ );
        }
    }

    /**
     * Adds User to group
     *
     * @return null
     */
    public function addCms()
    {
        $aAddCms = $this->_getActionIds( 'oxcontents.oxid' );
        $soxId     = oxConfig::getParameter( 'synchoxid' );

        if ( oxConfig::getParameter( 'all' ) ) {
            $sContentTable = $this->_getViewName( 'oxcontent' );
            $aAddCms = $this->_getAll( $this->_addFilter( "select $sContentTable.oxid ".$this->_getQuery() ) );
        }
        if ( $soxId && $soxId != "-1" && is_array( $aAddCms ) ) {
            foreach ($aAddCms as $sAddCms) {
                
                $sOxId = oxRegistry::get('oxUtilsObject')->generateUId();
                $sSqlAdd  = "INSERT INTO ocbcms2product (oxid, ocbcmsid, ocbproductid) VALUES ('$sOxId','$sAddCms','$soxId')";
                oxDb::getDb()->Execute( $sSqlAdd );
            }
        }
    }
}
