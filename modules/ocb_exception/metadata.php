<?php

/**
 * Metadata version
 */
$sMetadataVersion = '1.1';
 
/**
 * Module information
 */
$aModule = array(
    'id'           => 'ocb_exception',
    'title'        => 'OXID Cookbook :: Display Exceptions',
    'description'  => 'Displays the exeptionlog in the backend of your shop.',
    'thumbnail'    => 'cookbook.jpg',
    'version'      => '1.0',
    'author'       => 'Joscha Krug & Konstantin Kuznetsov',
    'url'          => 'http://www.oxid-kochbuch.de',
    'email'        => 'support@marmalade.de',
    'extend'       => array(),

    'files'        => array(
        'ocb_exception_main' => 'ocb_exception/controllers/admin/ocb_exception_main.php',
    ),
    'templates'    => array(
        'ocb_exception_main.tpl' => 'ocb_exception/views/admin/tpl/ocb_exception_main.tpl',
    ),
);