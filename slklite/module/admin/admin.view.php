<?php
/**
 *
 * SnakeLinks 0.1.201107200446
 * Copyright (c) 2011 Snooey.NET
 *
 * @brief admin view module file.
 *
 **/
 
class adminView extends admin
{

    /**
     *
     * @brief init module.
     * @params object $args.
     * @return null.
     *
     **/
    function init($args=null)
    {
    }
    
    /**
     *
     * @brief main view module.
     * @params object $args.
     * @return string.
     *
     **/
    function viewMain($args=null)
    {
        global $SLK, $cfg;
        
        $oModelModule = &loadModule("admin","model");
        $param = $oModelModule->getMainVar();
        $html = loadTpl("main", "admin", $param);
        
        return $html;
    }
}
?>