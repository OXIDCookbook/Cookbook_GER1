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
    'id'           => 'ocb_cleverreach',
    'title'        => 'OXID Cookbook :: Cleverreach',
    'description'  => 'Store newslettersubscriptions directly in Cleverreach',
    'thumbnail'    => 'cookbook.jpg',
    'version'      => '1.0',
    'author'       => 'Joscha Krug',
    'url'          => 'http://www.oxid-kochbuch.de',
    'email'        => 'krug@marmalade.de',
    'extend'       => array(
        'oxnewssubscribed'  => 'ocb_cleverreach/models/ocb_cleverreach_oxnewssubscribed',
        'oxemail'           => 'ocb_cleverreach/models/ocb_cleverreach_oxemail',
    ),
    'settings' => array(
        array(
                'group' => 'main',
                'name'  => 'sCleverreachApiKey',
                'type'  => 'str', 
                'value' => ''
        ),
        array(
                'group' => 'main',
                'name'  => 'sCleverreachListId',
                'type'  => 'str',
                'value' => ''
        ),
        array(
                'group' => 'main',
                'name'  => 'sCleverreachWsdlUrl',
                'type'  => 'str',
                'value' => ''
        ),
    )
);
