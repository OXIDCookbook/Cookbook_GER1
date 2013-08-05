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
    'id'           => 'ocb_rssfeed',
    'title'        => 'OXID Cookbook :: RSS Feed',
    'description'  => 'Display the newsfeed of your blog in your shops sidebar.',
    'thumbnail'    => 'cookbook.jpg',
    'version'      => '1.0',
    'author'       => 'Joscha Krug',
    'url'          => 'http://www.oxid-kochbuch.de',
    'email'        => 'krug@marmalade.de',
    'extend'       => array(
        'oxviewconfig'      => 'ocb_rssfeed/core/ocb_rssfeed_oxviewconfig',
    ),
    'blocks'      => array(
        array(
            'template'  => 'layout/sidebar.tpl',
            'block'     => 'sidebar',
            'file'      => '/views/blocks/sidebar.tpl'
        ),
    ),
    'settings'       => array(
        array(
            'group'     => 'main',
            'name'      => 'sRssSource',
            'type'      => 'str',
            'value'     => ''
        ),
        array(
            'group'     => 'main',
            'name'      => 'iRssLimit',
            'type'      => 'str',
            'value'     => '5'
        ),
    )
);
