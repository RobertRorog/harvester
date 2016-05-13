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
    private $header = '<h1>Harvester menu</h1>';
    private $menu = '<a href="index.html">Index</a> - <a href="getTabsImg.html">Click & Get Tab Img</a><hr>';

    public function __construct()
    {
        $this->setUrlAndTimeout('http://kinoman.tv', '10');
    }

    private function headHTML(){
        return $this->header.$this->menu;        
    }
    public function start()
    {
        echo $this->headHTML();
    }
    
    public function getTabsImg()
    {
        echo $this->headHTML();
        $this->displayImgData($this->getDataHtml());        
    }
    
    private function getImgData($date){
        $tab =  $this->parseWebInput($date, '<div class="inside-tabs v3">','<\/div><\/div><\/div>','','');        
        $tabImg = $this->parseWebInput(implode('',$tab), '<img','\/>','','');  
        return $tabImg;
    }
        
    private function displayImgData($date){
        $tabImg = $this->getImgData($date); 
        foreach ($tabImg as $val) {
            $retSrc = $this->parseWebInput($val, 'src="','"','',''); 
            $retTitle = $this->parseWebInput($val, 'title="','"','',''); 
            echo '<br>Url Img: '.$retSrc[0].' Title img: '.$retTitle[0];
        }
    }
    
    private function parseWebInput ($data, $before, $after, $first, $last){            
        
        $data = str_replace("\n",'',$data);
        $clause = $before."(.*?)".$after;
        preg_match_all('/'.$clause.'/ius', $data, $return);         
        
        $ret = $return[1];
        $ile = count($ret);
        if ($first == 1) { 
            array_shift($ret);
        }
        if ($last == 1) { 
                array_pop($ret);             
        }
        return $ret;
    }    
} 
 
 
