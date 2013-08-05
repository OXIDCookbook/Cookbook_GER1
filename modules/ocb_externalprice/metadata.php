<?php

/**
 * This file is part of a OXID Cookbook project
 *
 * Version:    1.0
 * Author:     Joscha Krug <krug@marmalade.de>
 * Author URI: http://www.marmalade.de
 */

/**
 * Metadata version
 */
$sMetadataVersion = '1.1';
 
/**
 * Module information
 */
$aModule = array(
    'id'           => 'ocb_externalprice',
    'title'        => 'OXID Cookbook :: External Price',
    'description'  => 'Loads your product prices by EAN code from a different datebase.',
    'thumbnail'    => 'cookbook.jpg',
    'version'      => '1.0',
    'author'       => 'Joscha Krug',
    'url'          => 'http://www.oxid-kochbuch.de',
    'email'        => 'krug@marmalade.de',
    'extend'       => array(
        'oxarticle'   => 'ocb_externalprice/models/ocb_externalprice_oxarticle'
    ),
    'files'         => array(
        'ocb_externaldb'    => 'ocb_externalprice/core/ocb_externaldb.php'
    ),
    'settings'       => array(
        array(
            'group'     => 'main',
            'name'      => 'sDbName',
            'type'      => 'str',
            'value'     => ''
        ),
        array(
            'group'     => 'main',
            'name'      => 'sDbHost',
            'type'      => 'str',
            'value'     => 'localhost'
        ),
        array(
            'group'     => 'main',
            'name'      => 'sDbUser',
            'type'      => 'str',
            'value'     => ''
        ),
        array(
            'group'     => 'main',
            'name'      => 'sDbPassword',
            'type'      => 'str',
            'value'     => ''
        ),
    )
);
