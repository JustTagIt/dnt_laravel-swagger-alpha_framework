<?php

return array(
    'paths' => array(
        app_path().'/controllers',
        app_path().'/models'
    ),
    'excludePath' => array(),
    'getResourceListOptions' => array(),
    'getResourceOptions' => array(
        'defaultBasePath' => ''
    ),
    'prefix' => '/api/docs',
    'showDemo' => true
);
