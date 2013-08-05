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
    'id'           => 'ocb_ftporderdata',
    'title'        => 'OXID Cookbook :: Submit orders via FTP',
    'description'  => 'Submit your orders as XML-File to a remote server using the File Transfer Protocol.',
    'thumbnail'    => 'cookbook.jpg',
    'version'      => '1.0',
    'author'       => 'Joscha Krug',
    'url'          => 'http://www.oxid-kochbuch.de',
    'email'        => 'krug@marmalade.de',
    'extend'       => array(
        'oxorder'       => 'ocb_ftporderdata/models/ocb_ftporderdata_oxorder'
    ),
    'files'         => array(
        'ocb_ftpconnector' => 'ocb_ftporderdata/models/ocb_ftpconnector.php'
    ),
    'settings'       => array(
        array(
            'group'     => 'main',
            'name'      => 'sFtpServer',
            'type'      => 'str',
            'value'     => ''
        ),
        array(
            'group'     => 'main',
            'name'      => 'sFtpUser',
            'type'      => 'str',
            'value'     => ''
        ),
        array(
            'group'     => 'main',
            'name'      => 'sFtpPassword',
            'type'      => 'str',
            'value'     => ''
        ),
        array(
            'group'     => 'main',
            'name'      => 'sFtpDirectory',
            'type'      => 'str',
            'value'     => ''
        )
    )
);
