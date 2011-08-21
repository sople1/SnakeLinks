<?php
/**
 *
 * SnakeLinks 0.1.201107200446
 * Copyright (c) 2011 Snooey.NET
 *
 * @brief admin model module file.
 *
 **/
 
class adminModel extends admin
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
     * @brief get main var.
     * @param object $args.
     * @return object.
     *
     **/
    function getMainVar($args=null) {
        global $cfg;
        
        if ($args) $output = &$args;
        
        $output->data = array(
                    "app_title" => $cfg->default["app_title"],
                    "module_list" => $this->getModuleList() 
                        );
        return $output;
    }
    

    /**
     *
     * @brief get module list.
     * @param object $args.
     * @return array.
     *
     **/
    function getModuleList($args=null) {
        global $cfg;
        $output = $cfg->modules;
        return $output;
    }
    
}
?>