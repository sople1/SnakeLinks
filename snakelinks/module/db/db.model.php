<?php
/**
 *
 * SnakeLinks 0.1.201107200446
 * Copyright (c) 2011 Snooey.NET
 *
 * @brief db class model module file.
 * @brief it is based mysql 5.1.
 *
 **/
 
class dbModel
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
     * @brief make Where Strings for db.
     * @param array $args.
     * @return string.
     *
     **/
    function makeWhereString($list){
        foreach($list as $k=>$v) {
            if ($output) {
                $output .= ", ";
            }
            else {
                $output = " and ";
            }
            $output .= "`".$k."`='".$v."'";
        }
        return $output;
    }

    /**
     *
     * @brief make field Strings for db.
     * @param array $args.
     * @return string.
     *
     **/
    function makeFieldString($list=null){
        if (!$list) {
            $output = "*";
        }
        else {
            foreach($list as $k=>$v) {
                if ($output) {
                    $output .= ", ";
                }
                else {
                    $output = "";
                }
                $output .= "`".$v."`";
            }
        }
        return $output;
    }

    /**
     *
     * @brief make set Strings for db.
     * @param array $args.
     * @return string.
     *
     **/
    function makeSetString($list){
        foreach($list as $k=>$v) {
            if ($output) {
                $output .= ", ";
            }
            else {
                $output = " set ";
            }
            $output .= "`".$k."`='".$v."'";
        }

        return $output;
    }

    /**
     *
     * @brief resource to named array.
     * @param resource $res.
     * @return array.
     *
     **/
    function res2NameArray(&$res){
        $output = mysql_fetch_assoc($res);
        
        return $output;
    }

    /**
     *
     * @brief resource to row.
     * @param resource $res.
     * @return array.
     *
     **/
    function res2Row(&$res){
        $output = mysql_fetch_row($res);
        
        return $output;
    }
    
}
?>