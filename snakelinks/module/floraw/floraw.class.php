<?php
/**
 *
 * SnakeLinks 0.1.201107200446
 * Copyright (c) 2011 Snooey.NET
 *
 * @brief floraw class module file.
 *
 **/
 
class floraw
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
     * @brief get Complete url.
     * @param array $url.
     * @return null.
     *
     **/
    function getCompleteUrl($url)
    {
        $output = "http://www.floraw.com/bbs/board.php?bo_table=#--1--#&wr_id=#--2--#";
                
        #리턴 형식에서 필드 정리.
        list($arr_key, $arr_val) = makeReplaceArray($url);
        
        $output = preg_replace($arr_key, $arr_val, $output);
        return $output;
    }
}
?>