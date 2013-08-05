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
    'id'           => 'ocb_staticcache',
    'title'        => 'OXID Cookbook :: Static Cache',
    'description'  => 'Caches some pages as static files.',
    'thumbnail'    => 'cookbook.jpg',
    'version'      => '1.0',
    'author'       => 'Joscha Krug',
    'url'          => 'http://www.oxid-kochbuch.de',
    'email'        => 'krug@marmalade.de',
    'extend'       => array(
        'oxshopcontrol' => 'ocb_staticcache/core/ocb_staticcache_oxshopcontrol',
        'oxoutput'      => 'ocb_staticcache/core/ocb_staticcache_oxoutput',
    ),
    'files'        => array(
        'ocb_staticcache' => 'ocb_staticcache/core/ocb_staticcache.php'
    ),
    'settings'       => array(
        array(
            'group'     => 'main',
            'name'      => 'iCacheLifetime',
            'type'      => 'str',
            'value'     => '10'
        ),
    )
);
