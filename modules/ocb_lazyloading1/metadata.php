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
    'id'           => 'ocb_lazyloading1',
    'title'        => 'OXID Cookbook :: Lazyloading - Part 1',
    'description'  => 'Adds a new field to oxarticle objects',
    'thumbnail'    => 'cookbook.jpg',
    'version'      => '1.0',
    'author'       => 'Joscha Krug',
    'url'          => 'http://www.oxid-kochbuch.de',
    'email'        => 'krug@marmalade.de',
    'extend'       => array(
    ),
    'blocks'       => array(
        array(
            'template'  => 'article_main.tpl',
            'block'     => 'admin_article_main_form',
            'file'      => 'blocks/ocb_lazyloading.tpl',
        ),
    )
);
