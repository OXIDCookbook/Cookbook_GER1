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
    'id'           => 'ocb_shortcheckout',
    'title'        => 'OXID Cookbook :: Short Checkout',
    'description'  => 'Skip the payment step in your checkout process.',
    'thumbnail'    => 'cookbook.jpg',
    'version'      => '1.0',
    'author'       => 'Joscha Krug',
    'url'          => 'http://www.oxid-kochbuch.de',
    'email'        => 'krug@marmalade.de',
    'extend'       => array(
        'oxcmp_user'      => 'ocb_shortcheckout/components/ocb_shortcheckout_oxcmp_user',
        'payment'         => 'ocb_shortcheckout/controllers/ocb_shortcheckout_payment',
    ),
    'blocks'      => array(
        array(
            'template'  => 'page/checkout/inc/steps.tpl',
            'block'     => 'checkout_steps_pay',
            'file'      => '/views/blocks/step_send.tpl'
        ),
    ),
    'settings'       => array(
        array(
            'group'     => 'main',
            'name'      => 'sShippingId',
            'type'      => 'str',
            'value'     => 'oxidstandard'
        ),
        array(
            'group'     => 'main',
            'name'      => 'sPaymentId',
            'type'      => 'str',
            'value'     => 'oxidinvoice'
        ),
    )
);
