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
        include_once($SLK[root]."/templet.php");
        return 0;
    }
}
?>