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
    'id'           => 'ocb_lazyloading',
    'title'        => 'OXID Cookbook :: Lazyloading',
    'description'  => 'Enables lazy loading for categories',
    'thumbnail'    => 'cookbook.jpg',
    'version'      => '1.0',
    'author'       => 'Joscha Krug',
    'url'          => 'http://www.oxid-kochbuch.de',
    'email'        => 'krug@marmalade.de',
    'extend'       => array(
        'oxcategory'  => 'ocb_lazyloading/models/ocb_lazyloading_oxcategory',
    ),
    'blocks'       => array(
        array(
            'template'  => 'category_main.tpl',
            'block'     => 'admin_category_main_form',
            'file'      => 'blocks/ocb_lazyloading.tpl',
        ),
    )
);
