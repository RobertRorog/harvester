<?php

use Core\Router;

Router::get('',                  'Controllers\Harvester@start');
Router::get('index.html',        'Controllers\Harvester@start');
Router::get('getTabsImg.html',   'Controllers\Harvester@getTabsImg');

Router::$fallback = false;
Router::dispatch();