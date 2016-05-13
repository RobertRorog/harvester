<?php

use Core\Router;

Router::get('',                  'Controllers\Harvester@start');
Router::get('getTabsImg.html',   'Controllers\harvester@getTabsImg');

Router::$fallback = false;
Router::dispatch();