<?php

/**
 * This file is part of a OXID Cookbook project
 *
 * Version:    1.0
 * Author:     Joscha Krug <krug@marmalade.de>
 * Author URI: http://oxid-kochbuch.de
 */

/**
 * Metadata version
 */
$sMetadataVersion = '1.1';
 
/**
 * Module information
 */
$aModule = array(
    'id'           => 'ocb_frontendediting',
    'title'        => 'OXID Cookbook :: Frontend Editing',
    'description'  => 'Enables Frontendediting for Products on the details pages',
    'thumbnail'    => 'cookbook.jpg',
    'version'      => '1.0',
    'author'       => 'Joscha Krug',
    'url'          => 'http://www.oxid-kochbuch.de',
    'email'        => 'krug@marmalade.de',
    'extend'       => array(
    ),
    'files'       => array(
        'ocb_fe_save'      => 'ocb_frontendediting/controllers/ocb_fe_save.php',
    ),
    'blocks' => array(
        array(
            'template'  => 'layout/base.tpl',
            'block'     => 'head_css',
            'file'      => '/views/blocks/header.tpl'
        ),
        array(
            'template'  => 'page/details/inc/productmain.tpl',
            'block'     => 'details_productmain_title',
            'file'      => '/views/blocks/alohafields_title.tpl'
        ),
        array(
            'template'  => 'page/details/inc/tabs.tpl',
            'block'     => 'details_tabs_longdescription',
            'file'      => '/views/blocks/alohafields_longdesc.tpl'
        ),
    )
);
