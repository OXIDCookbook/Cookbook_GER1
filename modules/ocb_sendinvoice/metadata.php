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
    'id'           => 'ocb_sendinvoice',
    'title'        => 'OXID Cookbook :: Send Invoice',
    'description'  => 'Send the invoice to the customer if the order is already paid.',
    'thumbnail'    => 'cookbook.jpg',
    'version'      => '1.0',
    'author'       => 'Jens Richter / Joscha Krug',
    'url'          => 'http://www.oxid-kochbuch.de',
    'email'        => 'support@marmalade.de',
    'extend'       => array(
        'oxorder'       => 'ocb_sendinvoice/models/ocb_sendinvoice_oxorder',
        'oxemail'       => 'ocb_sendinvoice/core/ocb_sendinvoice_oxemail',
    ),
    'settings'     => array(
        array('group' => 'general', 'name' => 'sFilePath', 'type' => 'str', 'value' => 'export/invoice/')
    )
);
