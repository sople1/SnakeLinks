<?php
/**
 *
 * SnakeLinks 0.1.201107200446
 * Copyright (c) 2011 Snooey.NET
 *
 * @brief link model module file.
 *
 **/
 
class linkModel extends link
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
     * @brief get link resource. not redirect resource.
     * @param object $args.
     * @return int.
     *
     **/
    function getLinkRes($args)
    {
        global $cfg;
        
        if (!$args->link) {
            $output->code = "302";
            $output->msg = "default_redirect";
            $output->host = $cfg->default["host"];
            $output->key = "DEFAULT";
        }
        else {
            #정보가 존재하는가?
            #존재하지 않는다면 만들자
            #존재한다면 가져오자
        }
        
        return $output;
    }
}
?>