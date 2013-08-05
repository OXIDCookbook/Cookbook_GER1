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
    'id'           => 'ocb_landingpage',
    'title'        => 'OXID Cookbook :: Landingpage',
    'description'  => 'Add a new pagetype landingpage for action products',
    'thumbnail'    => 'cookbook.jpg',
    'version'      => '1.0',
    'author'       => 'Joscha Krug',
    'url'          => 'http://www.oxid-kochbuch.de',
    'email'        => 'krug@marmalade.de',
    'extend'       => array(
        'actions_main'  => 'ocb_landingpage/controllers/admin/ocb_landingpage_actions_main',
    ),
    'files'        => array(
        'ocb_landingpage' => 'ocb_landingpage/controllers/ocb_landingpage.php'
    ),
    'templates'    => array(
        'ocb_landingpage.tpl' => 'ocb_landingpage/views/ocb_landingpage.tpl'
    ),
    'blocks'       => array(
        array(
            'template'  => 'actions_main.tpl',
            'block'     => 'admin_actions_main_form',
            'file'      => '/views/blocks/admin_actions_main_form.tpl',
        ),
    )
);
