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
    'id'           => 'ocb_cleartmp',
    'title'        => 'OXID Cookbook :: Clear tmp',
    'description'  => 'Clear the tmp directory from the backend.',
    'thumbnail'    => 'cookbook.jpg',
    'version'      => '1.0',
    'author'       => 'Joscha Krug',
    'url'          => 'http://www.oxid-kochbuch.de',
    'email'        => 'krug@marmalade.de',
    'extend'       => array(
        'navigation'    => 'ocb_cleartmp/controllers/admin/ocb_cleartmp_navigation',
        'oxshopcontrol' => 'ocb_cleartmp/core/ocb_cleartmp_oxshopcontrol',
    ),
    'templates' => array(
        'ocb_header.tpl'     => 'ocb_cleartmp/views/admin/ocb_header.tpl'
    )
);
