<?php
/**
 *
 * SnakeLinks 0.1.201107200446
 * Copyright (c) 2011 Snooey.NET
 *
 * @brief code view module file.
 *
 **/
 
class codeView extends code
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
        
        $oModelModule = &loadModule("code","model");
            var_export($oCodeModel->getCode("30","4"));
        
        return $html;
    }
}
?>