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
    'id'           => 'ocb_tourmanagement',
    'title'        => 'OXID Cookbook :: Tour management',
    'description'  => 'Adds new objects for tour dates to the shop.',
    'thumbnail'    => 'cookbook.jpg',
    'version'      => '1.0',
    'author'       => 'Joscha Krug',
    'url'          => 'http://www.oxid-kochbuch.de',
    'email'        => 'krug@marmalade.de',
    'extend'       => array(
        'details'   => 'ocb_tourmanagement/controllers/ocb_tourmanagement_details'
    ),
    'files'        => array(
        'ocb_tourdates'                 => 'ocb_tourmanagement/models/ocb_tourdates.php',
        'ocb_tourdates_list'            => 'ocb_tourmanagement/models/ocb_tourdates_list.php',
        'ocb_tourdates_admin'           => 'ocb_tourmanagement/controllers/admin/ocb_tourdates_admin.php',
        'ocb_tourdates_admin_main'      => 'ocb_tourmanagement/controllers/admin/ocb_tourdates_admin_main.php',
        'ocb_tourdates_admin_list'      => 'ocb_tourmanagement/controllers/admin/ocb_tourdates_admin_list.php',
    ),
    'templates'   => array(
        'ocb_tourdates_admin.tpl'       => 'ocb_tourmanagement/views/admin/ocb_tourdates_admin.tpl',
        'ocb_tourdates_admin_main.tpl'  => 'ocb_tourmanagement/views/admin/ocb_tourdates_admin_main.tpl',
        'ocb_tourdates_admin_list.tpl'  => 'ocb_tourmanagement/views/admin/ocb_tourdates_admin_list.tpl'
    ),
    'blocks'      => array(
        array(
            'template'  => 'page/details/inc/productmain.tpl',
            'block'     => 'details_productmain_social',
            'file'      => '/views/blocks/tourdates.tpl'
        ),
    )
);
