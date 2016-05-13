<?php

 /* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Controllers;

use Helpers\MyCurl;
 
 
class Harvester extends MyCurl
{

    public function __construct()
    {
        $this->setUrlAndTimeout('http://kinoman.tv', '10');
    }

    public function start()
    {
        echo '<h1>Harvester menu</h1>';
        echo '<a href="getTabsImg.html">Click & Get Tab Img</h1>';
    }
    
    public function getTabsImg()
    {
        echo $this->url;
    }
    
} 
 
 
