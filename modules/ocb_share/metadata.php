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
    'id'           => 'ocb_share',
    'title'        => 'OXID Cookbook :: Additional share functions',
    'description'  => 'Adds more share options to the details page.',
    'thumbnail'    => 'cookbook.jpg',
    'version'      => '1.0',
    'author'       => 'Joscha Krug',
    'url'          => 'http://www.oxid-kochbuch.de',
    'email'        => 'krug@marmalade.de',
    'extend'       => array(
    ),
    'blocks'      => array(
        array(
            'template'  => 'page/details/inc/productmain.tpl',
            'block'     => 'details_productmain_social',
            'file'      => '/views/blocks/social.tpl'
        ),
    )
);
