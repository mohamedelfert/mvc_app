<?php

return [
    'template' => [
        'warpperstart' => TEMPLATE_PATH . 'wrapperstart.php',
        'nav'          => TEMPLATE_PATH . 'nav.php',
        'sidbar'       => TEMPLATE_PATH . 'sidbar.php',
        ':view'        => ':action_view',
        'warpperend'   => TEMPLATE_PATH . 'wrapperend.php'
    ],
    'header_resources' => [
        'css' => [
            'bootstrap'     => CSS . 'bootstrap.min.css',
            'font-awesome'  => CSS . 'font-awesome.min.css',
            'util'          => CSS . 'util.css',
            'main'          => CSS . 'main.css',
            'style'         => CSS . 'style.css',
            'style2'        => CSS . 'style2.css',
            'style3'        => CSS . 'style3.css',
            'shop-homepage' => CSS . 'shop-homepage.css',
            'Order'         => CSS . 'Order.css',
            'normalize'     => CSS . 'normalize.css',
            'fawsome'       => CSS . 'fawsome.min.css',
            'gicons'        => CSS . 'googleicons.css',
            'add_emp_form'  => CSS . 'add_emp_form.css'
        ],
        'js'  => [
            'Order'       => JS . 'Order.js',
            'modernizr'   => JS . 'vendor/modernizr-2.8.3.min.js',
            'jquery'      => JS . 'jquery.min.js'
        ]
    ],
    'footer_resources' => [
        'jquery'            => JS . 'jquery.min.js',
        'bootstrap_bundle'  => JS . 'bootstrap.bundle.min.js',
        'bootstrap'         => JS . 'bootstrap.min.js',
        'form'              => JS . 'form.js',
        'site_js'           => JS . 'site_js.min.js',
        'jquery2'           => JS . 'vendor/jquery-1.12.0.min.js',
        'helper'            => JS . 'helper.js',
        'datatables'        => JS . 'datatables' . $_SESSION['lang'] . '.js',
        'main'              => JS . 'main.js'
    ]
];