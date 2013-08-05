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
    'id'           => 'ocb_markdown',
    'title'        => 'OXID Cookbook :: Markdown',
    'description'  => 'Renders README.md files in the backend',
    'thumbnail'    => 'cookbook.jpg',
    'version'      => '1.0',
    'author'       => 'Joscha Krug',
    'url'          => 'http://www.oxid-kochbuch.de',
    'email'        => 'krug@marmalade.de',
    'extend'       => array(
    ),
    'files'       => array(
        'ocb_markdown'      => 'ocb_markdown/controllers/ocb_markdown.php',
    ),
    'templates' => array(
        'ocb_markdown.tpl' => 'ocb_markdown/views/admin/tpl/ocb_markdown.tpl'
    )
);
