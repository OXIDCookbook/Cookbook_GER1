<?php

/**
 * Metadata version
 */
$sMetadataVersion = '1.1';
 
/**
 * Module information
 */
$aModule = array(
    'id'           => 'ocb_cms2product',
    'title'        => 'OXID Cookbook :: Cms2Product',
    'description'  => 'Add CMS entires to you products.',
    'thumbnail'    => 'cookbook.jpg',
    'version'      => '1.0',
    'author'       => 'Joscha Krug',
    'url'          => 'http://www.oxid-kochbuch.de',
    'email'        => 'support@marmalade.de',
    'extend'       => array(
        'details'           => 'ocb_cms2product/controllers/ocb_cms2product_details',
        'oxcontentlist'     => 'ocb_cms2product/models/ocb_cms2product_oxcontentlist',
        'article_extend'    => 'ocb_cms2product/controllers/admin/ocb_cms2product_article_extend',
    ),
    'files'       => array(
        'ocb_cms2product_main_ajax' => 'ocb_cms2product/controllers/admin/ocb_cms2product_main_ajax.php',
    ),
    'templates'   => array(
        'ocb_cms2product_main_ajax.tpl'  => 'ocb_cms2product/views/admin/popups/ocb_cms2product_main_ajax.tpl',
        'ocb_article_extend.tpl'         => 'ocb_cms2product/views/admin/ocb_article_extend.tpl'
    ),
    'blocks'      => array(
        array(
            'template'  => 'page/details/inc/tabs.tpl',
            'block'     => 'details_tabs_media',
            'file'      => '/views/blocks/cmscontents.tpl'
        ),
    )
);