<?php
/**
 *
 * SnakeLinks 0.1.201107200446
 * Copyright (c) 2011 Snooey.NET
 *
 * @brief link view module file.
 *
 **/
 
class linkView extends link
{

    /**
     *
     * @brief init module.
     * @param object $args.
     * @return null.
     *
     **/
    function init($args=null)
    {
    }
    
    /**
     *
     * @brief main view module.
     * @param object $args.
     * @return int.
     *
     **/
    function viewMain($args=null)
    {
        return 0;
    }
    
    /**
     *
     * @brief jump to link.
     * @param object $args.
     * @return int.
     *
     **/
    function jumpLink($args=null)
    {
        global $SLK;
        
        $oModelModule = &loadModule("link","model");
        $res = $oModelModule->getRedirectRes();
        
        $url_check = explode("|",$res->data[url]);
        if (count($url_check)>1) {
            $oParseModule = loadModule("$url_check[0]");
            $res->data[url] = $oParseModule->getCompleteUrl($url_check);
        }
        
        $res->data[title] = "flr.kr";
        $res->data[subtitle] = "FLORAW 단축주소 서비스";
        
        header("Cache-Control: no-cache, must-revalidate");
        header('HTTP/1.1 301 Moved Permanently');
        header("Location: ".$res->data[url]);
        
        $html = loadTpl("redirect", "link", $res);
        return $html;
    }
}
?>