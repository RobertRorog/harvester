<?php

 /* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Helpers;
 
class MyCurl{

    private $url;
    private $timeout;
     
    public function __construct(){
    }
    
    public function setUrlAndTimeout($url, $timeout){
        $this->url      = $url;
        $this->timeout  = $timeout;
    }
        
    public function getData() {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $this->timeout);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }

    
}