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
    'id'           => 'ocb_newimagesize',
    'title'        => 'OXID Cookbook :: New Image size',
    'description'  => 'Add a new image size to your product objects',
    'thumbnail'    => 'cookbook.jpg',
    'version'      => '1.0',
    'author'       => 'Joscha Krug',
    'url'          => 'http://www.oxid-kochbuch.de',
    'email'        => 'krug@marmalade.de',
    'extend'       => array(
        'oxarticle'         => 'ocb_newimagesize/models/ocb_newimagesize_oxarticle',
        'oxpicturehandler'  => 'ocb_newimagesize/core/ocb_newimagesize_oxpicturehandler',
        'start'             => 'ocb_newimagesize/controllers/ocb_newimagesize_start',
    ),
    'templates'      => array(
        'ocb_start.tpl'     => 'ocb_newimagesize/views/ocb_start.tpl'
    ),
    'settings'       => array(
        array(
            'group'     => 'main',
            'name'      => 'sAdditionalImageSize',
            'type'      => 'str',
            'value'     => '368*368'
        ),
    )
);
